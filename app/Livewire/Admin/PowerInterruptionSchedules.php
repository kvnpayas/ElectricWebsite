<?php

namespace App\Livewire\Admin;

use App\Models\PowerInterruptionFile;
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
    public string $formTitle      = 'Scheduled Power Interruption';
    public string $formDate       = '';
    public string $formExpiryDate = '';
    public string $formReason     = '';
    public string $formStatus     = 'scheduled';
    public array  $formImages     = [];

    // ── Delete ────────────────────────────────────────────────
    public ?int $deleteTarget = null;

    // ── Computed ──────────────────────────────────────────────

    #[Computed]
    public function schedules()
    {
        return PowerInterruptionSchedule::query()
            ->when($this->statusFilter !== 'all', fn ($q) => $q->where('status', $this->statusFilter))
            ->when($this->search, fn ($q) => $q->where(function ($q) {
                $q->where('title', 'like', "%{$this->search}%")
                  ->orWhere('reason', 'like', "%{$this->search}%");
            }))
            ->withCount('files')
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

    #[Computed]
    public function existingFiles()
    {
        if (! $this->formId) {
            return collect();
        }

        return PowerInterruptionFile::where('schedule_id', $this->formId)
            ->orderBy('sort_order')
            ->get();
    }

    // ── Status filter ─────────────────────────────────────────

    public function setStatus(string $status): void
    {
        $this->statusFilter = $status;
        $this->deleteTarget = null;
    }

    // ── Drawer open / close ───────────────────────────────────

    public function openAdd(): void
    {
        $this->formId         = null;
        $this->formTitle      = 'Scheduled Power Interruption';
        $this->formDate       = now()->format('Y-m-d\TH:i');
        $this->formExpiryDate = '';
        $this->formReason     = '';
        $this->formStatus     = 'scheduled';
        $this->formImages     = [];
        $this->formMode       = 'add';
        $this->showModal      = true;
        $this->resetErrorBag();
        unset($this->existingFiles);
    }

    public function openEdit(int $id): void
    {
        $schedule = PowerInterruptionSchedule::findOrFail($id);

        $this->formId         = $schedule->id;
        $this->formTitle      = $schedule->title;
        $this->formDate       = $schedule->scheduled_date->format('Y-m-d\TH:i');
        $this->formExpiryDate = $schedule->expiry_date?->format('Y-m-d\TH:i') ?? '';
        $this->formReason     = $schedule->reason;
        $this->formStatus     = $schedule->status;
        $this->formImages     = [];
        $this->formMode       = 'edit';
        $this->showModal      = true;
        $this->resetErrorBag();
        unset($this->existingFiles);
    }

    public function closeModal(): void
    {
        $this->showModal  = false;
        $this->formImages = [];
        $this->resetErrorBag();
    }

    // ── Save (create / update) ────────────────────────────────

    public function save(): void
    {
        $this->validate([
            'formTitle'      => ['required', 'string', 'max:200'],
            'formDate'       => ['required', 'date'],
            'formExpiryDate' => ['nullable', 'date', 'after_or_equal:formDate'],
            'formReason'     => ['required', 'min:5'],
            'formStatus'     => ['required', 'in:scheduled,ongoing,resolved'],
            'formImages'     => ['nullable', 'array'],
            'formImages.*'   => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,pdf', 'max:10240'],
        ], attributes: [
            'formTitle'      => 'title',
            'formDate'       => 'scheduled date',
            'formExpiryDate' => 'expiry date',
            'formReason'     => 'reason',
            'formImages.*'   => 'file',
        ]);

        $data = [
            'title'          => $this->formTitle,
            'status'         => $this->formStatus,
            'scheduled_date' => \Carbon\Carbon::parse($this->formDate),
            'expiry_date'    => $this->formExpiryDate ? \Carbon\Carbon::parse($this->formExpiryDate) : null,
            'reason'         => trim($this->formReason),
            'upd_user'       => Auth::id(),
        ];

        $grouped = false;

        if ($this->formMode === 'add') {
            // Auto-group: if same date + reason already exists, attach files to it
            $existing = PowerInterruptionSchedule::whereDate('scheduled_date', \Carbon\Carbon::parse($this->formDate)->toDateString())
                ->where('reason', trim($this->formReason))
                ->first();

            if ($existing) {
                $existing->update($data);
                $schedule = $existing;
                $grouped  = true;
            } else {
                $data['ctrd_user'] = Auth::id();
                $schedule = PowerInterruptionSchedule::create($data);
            }
        } else {
            $schedule = PowerInterruptionSchedule::findOrFail($this->formId);
            $schedule->update($data);
        }

        // Store new uploaded files
        foreach ($this->formImages as $file) {
            $safeName = preg_replace('/[^a-zA-Z0-9._-]/', '-', $file->getClientOriginalName());
            $path     = $file->storeAs('power-interruptions', $safeName, 'public');
            PowerInterruptionFile::create([
                'schedule_id' => $schedule->id,
                'file_path'   => $path,
                'file_name'   => $file->getClientOriginalName(),
                'sort_order'  => $schedule->files()->count(),
            ]);
        }

        $this->formImages = [];
        $this->closeModal();
        unset($this->schedules, $this->existingFiles);

        $msg = $grouped
            ? "Files added to existing schedule for {$schedule->scheduled_date->format('M j, Y')}."
            : ($this->formMode === 'add' ? "Schedule added." : "Schedule updated.");

        $this->dispatch('toast', message: $msg);
    }

    // ── File management ───────────────────────────────────────

    public function removeFile(int $fileId): void
    {
        $file = PowerInterruptionFile::find($fileId);

        if ($file) {
            Storage::disk('public')->delete($file->file_path);
            $file->delete();
            unset($this->existingFiles, $this->schedules);
            $this->dispatch('toast', message: 'File removed.');
        }
    }

    // ── Delete schedule ───────────────────────────────────────

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

        // Delete all attached files from storage
        foreach ($schedule->files as $file) {
            Storage::disk('public')->delete($file->file_path);
        }

        $title = $schedule->title;
        $schedule->delete(); // files cascade via DB constraint

        unset($this->schedules);
        $this->dispatch('toast', message: "\"{$title}\" was deleted.");
        $this->deleteTarget = null;
    }

    // ── Render ────────────────────────────────────────────────

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.power-interruption-schedules');
    }
}
