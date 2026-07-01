<?php

namespace App\Livewire\Admin;

use App\Models\Barangay;
use App\Models\BarangayArea;
use App\Models\PowerInterruptionSchedule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.auth')]
#[Title('Power Interruption Schedules — TEI Admin')]
class PowerInterruptionSchedules extends Component
{
    use WithFileUploads;

    // ── Filters ───────────────────────────────────────────────
    public string $statusFilter = 'all';
    public string $search       = '';

    // ── Drawer ────────────────────────────────────────────────
    public bool   $showModal = false;
    public string $formMode  = 'add';
    public ?int   $formId    = null;

    // ── Form fields ───────────────────────────────────────────
    public string $formTitle     = '';
    public string $formDate      = '';
    public string $formStartTime = '';
    public string $formEndTime   = '';
    public string $formEndDate    = '';   // blank = same day as formDate
    public string $formExpiryTime = '';   // blank = fall back to formEndTime
    // Each entry: ['barangay' => '', 'areas' => []]
    public array  $formAreas     = [];
    public string $formReason    = '';
    public string $formStatus    = 'scheduled';
    public        $formImage     = null;

    // ── Delete ────────────────────────────────────────────────
    public ?int $deleteTarget = null;

    // ── Computed ──────────────────────────────────────────────

    #[Computed]
    public function schedules()
    {
        return PowerInterruptionSchedule::query()
            ->when($this->statusFilter !== 'all', fn ($q) => $q->where('status', $this->statusFilter))
            ->when($this->search, fn ($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->orderByDesc('scheduled_date')
            ->orderBy('sort_order')
            ->get();
    }

    #[Computed]
    public function counts(): array
    {
        $raw = PowerInterruptionSchedule::query()
            ->selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->all();

        foreach (['scheduled', 'ongoing', 'resolved'] as $s) {
            $raw[$s] ??= 0;
        }

        $raw['all'] = array_sum($raw);

        return $raw;
    }

    // ── Status filter ─────────────────────────────────────────

    public function setStatus(string $status): void
    {
        $this->statusFilter = $status;
        $this->deleteTarget = null;
    }

    // ── Barangay entry helpers ────────────────────────────────

    public function addBarangayEntry(): void
    {
        $this->formAreas[] = ['barangay' => '', 'areas' => []];
    }

    public function removeBarangayEntry(int $index): void
    {
        array_splice($this->formAreas, $index, 1);
        $this->formAreas = array_values($this->formAreas);
    }

    public function addAreaToEntry(int $entryIndex, string $areaName): void
    {
        $name = trim($areaName);
        if (! $name || ! isset($this->formAreas[$entryIndex])) {
            return;
        }
        if (! in_array($name, $this->formAreas[$entryIndex]['areas'])) {
            $this->formAreas[$entryIndex]['areas'][] = $name;
        }
    }

    public function removeAreaFromEntry(int $entryIndex, int $areaIndex): void
    {
        if (! isset($this->formAreas[$entryIndex]['areas'][$areaIndex])) {
            return;
        }
        array_splice($this->formAreas[$entryIndex]['areas'], $areaIndex, 1);
        $this->formAreas[$entryIndex]['areas'] = array_values($this->formAreas[$entryIndex]['areas']);
    }

    // ── Drawer open / close ───────────────────────────────────

    public function openAdd(): void
    {
        $this->reset(['formId', 'formStartTime', 'formEndTime', 'formEndDate', 'formExpiryTime', 'formReason', 'formImage']);
        $this->formTitle  = 'Scheduled Power Interruption';
        $this->formAreas  = [['barangay' => '', 'areas' => []]];
        $this->formDate   = now()->format('Y-m-d');
        $this->formStatus = 'scheduled';
        $this->formMode   = 'add';
        $this->showModal  = true;
        $this->resetErrorBag();
    }

    public function openEdit(int $id): void
    {
        $schedule = PowerInterruptionSchedule::findOrFail($id);

        $this->formId        = $schedule->id;
        $this->formTitle     = $schedule->title;
        $this->formDate      = $schedule->scheduled_date->format('Y-m-d');
        $this->formStartTime = substr($schedule->start_time, 0, 5);
        $this->formEndTime   = substr($schedule->end_time, 0, 5);
        $this->formEndDate    = $schedule->end_date?->format('Y-m-d') ?? '';
        $this->formExpiryTime = substr($schedule->expiry_time ?? '', 0, 5);
        $this->formAreas     = ! empty($schedule->areas) ? $schedule->areas : [['barangay' => '', 'areas' => []]];
        $this->formReason    = $schedule->reason;
        $this->formStatus    = $schedule->status;
        $this->formImage     = null;
        $this->formMode      = 'edit';
        $this->showModal     = true;
        $this->resetErrorBag();
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetErrorBag();
    }

    // ── Save (create / update) ────────────────────────────────

    public function save(): void
    {
        // Drop entries where barangay was left blank
        $this->formAreas = array_values(
            array_filter($this->formAreas, fn ($e) => trim($e['barangay'] ?? '') !== '')
        );

        $this->validate(
            [
                'formTitle'            => ['required', 'min:3'],
                'formDate'             => ['required', 'date'],
                'formStartTime'        => ['required'],
                'formEndTime'          => ['required'],
                'formEndDate'          => ['nullable', 'date', 'after_or_equal:formDate'],
                'formExpiryTime'       => ['nullable'],
                'formAreas'            => ['required', 'array', 'min:1'],
                'formAreas.*.barangay' => ['required', 'string'],
                'formReason'           => ['required', 'min:5'],
                'formStatus'           => ['required', 'in:scheduled,ongoing,resolved'],
                'formImage'            => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            ],
            attributes: [
                'formTitle'            => 'title',
                'formDate'             => 'scheduled date',
                'formStartTime'        => 'start time',
                'formEndTime'          => 'end time',
                'formEndDate'          => 'end date',
                'formExpiryTime'       => 'expiry time',
                'formAreas'            => 'affected barangays',
                'formAreas.*.barangay' => 'barangay name',
                'formReason'           => 'reason',
                'formImage'            => 'image',
            ]
        );

        $data = [
            'title'          => $this->formTitle,
            'status'         => $this->formStatus,
            'scheduled_date' => $this->formDate,
            'start_time'     => $this->formStartTime,
            'end_time'       => $this->formEndTime,
            'end_date'       => $this->formEndDate ?: null,
            'expiry_time'    => $this->formExpiryTime ?: null,
            'areas'          => $this->formAreas,
            'reason'         => $this->formReason,
            'upd_user'       => Auth::id(),
        ];

        if ($this->formImage) {
            if ($this->formMode === 'edit') {
                $existing = PowerInterruptionSchedule::find($this->formId);
                if ($existing?->image_path) {
                    Storage::disk('public')->delete($existing->image_path);
                }
            }

            $originalName       = $this->formImage->getClientOriginalName();
            $safeName           = preg_replace('/[^a-zA-Z0-9._-]/', '-', $originalName);
            $data['image_path'] = $this->formImage->storeAs('power-interruptions', $safeName, 'public');
            $data['image_name'] = $originalName;
            $this->formImage    = null;
        }

        // Register new barangay names and link areas to their barangay for future suggestions
        Barangay::syncFromAreas(array_column($this->formAreas, 'barangay'));

        foreach ($this->formAreas as $entry) {
            if (! empty($entry['areas'])) {
                BarangayArea::syncFromNames($entry['areas'], $entry['barangay']);
            }
        }

        if ($this->formMode === 'add') {
            $data['ctrd_user'] = Auth::id();
            $schedule = PowerInterruptionSchedule::create($data);
            $this->dispatch('toast', message: "Schedule \"{$schedule->title}\" was added.");
        } else {
            $schedule = PowerInterruptionSchedule::findOrFail($this->formId);
            $schedule->update($data);
            $this->dispatch('toast', message: "Schedule \"{$schedule->title}\" was updated.");
        }

        $this->closeModal();
    }

    // ── Delete ────────────────────────────────────────────────

    public function confirmDelete(int $id): void
    {
        $this->deleteTarget = $id;
    }

    public function cancelDelete(): void
    {
        $this->deleteTarget = null;
    }

    public function delete(): void
    {
        $schedule = PowerInterruptionSchedule::find($this->deleteTarget);

        if (! $schedule) {
            $this->deleteTarget = null;
            return;
        }

        $title = $schedule->title;

        if ($schedule->image_path) {
            Storage::disk('public')->delete($schedule->image_path);
        }

        $schedule->delete();

        $this->dispatch('toast', message: "\"{$title}\" was deleted.");
        $this->deleteTarget = null;
    }

    // ── Render ────────────────────────────────────────────────

    public function render()
    {
        return view('livewire.admin.power-interruption-schedules', [
            'barangaySuggestions'     => Barangay::orderBy('name')->pluck('name')->all(),
            'areaSuggestionsByBarangay' => BarangayArea::whereNotNull('barangay_name')
                ->orderBy('name')
                ->get()
                ->groupBy('barangay_name')
                ->map(fn ($g) => $g->pluck('name')->values()->all())
                ->all(),
        ]);
    }
}
