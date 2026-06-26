<?php

namespace App\Livewire\Admin;

use App\Models\AdvisoryDocument;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.auth')]
#[Title('Rates & Advisories — TEI Admin')]
class RatesAdvisories extends Component
{
    use WithFileUploads;

    public string $categoryFilter = 'all';
    public string $search         = '';
    public string $statusFilter   = 'all';
    public bool   $showModal      = false;
    public string $formMode       = 'add';
    public ?int   $formId         = null;
    public string $formCategory   = 'advisories';
    public string $formTitle      = '';
    public string $formDate       = '';
    public string $formStatus     = 'published';
    public string $formUrl        = '';
    public        $formFile       = null;
    public ?int   $deleteTarget   = null;

    // ── Computed ──────────────────────────────────────────────

    #[Computed]
    public function documents()
    {
        return AdvisoryDocument::query()
            ->when($this->categoryFilter !== 'all', fn($q) => $q->where('category', $this->categoryFilter))
            ->when($this->search, fn($q) => $q->where('title', 'like', "%{$this->search}%"))
            ->when($this->statusFilter !== 'all', fn($q) => $q->where('status', $this->statusFilter))
            ->orderByDesc('document_date')
            ->orderBy('sort_order')
            ->get();
    }

    #[Computed]
    public function counts(): array
    {
        $raw = AdvisoryDocument::query()
            ->selectRaw('category, count(*) as total')
            ->groupBy('category')
            ->pluck('total', 'category')
            ->all();

        foreach (['advisories', 'rate-schedule', 'others'] as $cat) {
            $raw[$cat] ??= 0;
        }

        $raw['all'] = array_sum($raw);

        return $raw;
    }

    // ── Category filter (stat cards) ──────────────────────────

    public function setCategory(string $category): void
    {
        $this->categoryFilter = $category;
        $this->deleteTarget   = null;
    }

    // ── Auto-slug from title ──────────────────────────────────

    public function updatedFormTitle(string $value): void
    {
        if ($this->formMode === 'add' || $this->formUrl === '') {
            $this->formUrl = Str::slug($value);
        }
    }

    // ── Drawer open / close ───────────────────────────────────

    public function openAdd(): void
    {
        $this->reset(['formId', 'formTitle', 'formDate', 'formStatus', 'formUrl', 'formFile']);
        $this->formCategory = $this->categoryFilter !== 'all' ? $this->categoryFilter : 'advisories';
        $this->formDate     = now()->format('Y-m-d');
        $this->formStatus   = 'published';
        $this->formMode     = 'add';
        $this->showModal    = true;
        $this->resetErrorBag();
    }

    public function openEdit(int $id): void
    {
        $doc = AdvisoryDocument::findOrFail($id);

        $this->formId       = $doc->id;
        $this->formCategory = $doc->category;
        $this->formTitle    = $doc->title;
        $this->formDate     = $doc->document_date->format('Y-m-d');
        $this->formStatus   = $doc->status;
        $this->formUrl      = $doc->url ?? '';
        $this->formFile     = null;
        $this->formMode     = 'edit';
        $this->showModal    = true;
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
        $uniqueSlug = Rule::unique('advisory_documents', 'url')
            ->ignore($this->formId);

        $this->validate([
            'formCategory' => ['required', 'in:advisories,rate-schedule,others'],
            'formTitle'    => ['required', 'min:3'],
            'formDate'     => ['required', 'date'],
            'formStatus'   => ['required', 'in:published,draft'],
            'formUrl'      => ['nullable', 'alpha_dash', $uniqueSlug],
            'formFile'     => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ]);

        $data = [
            'category'      => $this->formCategory,
            'title'         => $this->formTitle,
            'document_date' => $this->formDate,
            'status'        => $this->formStatus,
            'url'           => $this->formUrl ?: null,
            'upd_user'      => Auth::id(),
        ];

        if ($this->formFile) {
            $folder = $this->categoryFolder();

            // Delete the old file before storing the replacement
            if ($this->formMode === 'edit') {
                $existing = AdvisoryDocument::find($this->formId);
                if ($existing?->file_path) {
                    Storage::delete($existing->file_path);
                }
            }

            $data['file_path'] = $this->formFile->storeAs("rate-advisories/{$folder}", $this->formFile->getClientOriginalName());
            $data['file_name'] = $this->formFile->getClientOriginalName();
            $this->formFile    = null; // temp file was moved; clear so render doesn't call getSize() on deleted path
        }

        if ($this->formMode === 'add') {
            $data['ctrd_user'] = Auth::id();
            $doc = AdvisoryDocument::create($data);
            $this->dispatch('toast', message: "Document \"{$doc->title}\" was added.");
        } else {
            $doc = AdvisoryDocument::findOrFail($this->formId);
            $doc->update($data);
            $this->dispatch('toast', message: "Document \"{$doc->title}\" was updated.");
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
        $doc = AdvisoryDocument::find($this->deleteTarget);

        if (! $doc) {
            $this->deleteTarget = null;
            return;
        }

        $title = $doc->title;

        if ($doc->file_path) {
            Storage::delete($doc->file_path);
        }

        $doc->delete();

        $this->dispatch('toast', message: "\"{$title}\" was deleted.");
        $this->deleteTarget = null;
    }

    // ── Helpers ───────────────────────────────────────────────

    private function categoryFolder(): string
    {
        return match ($this->formCategory) {
            'rate-schedule' => 'rate',
            'others'        => 'other',
            default         => 'advisories',
        };
    }

    // ── Render ────────────────────────────────────────────────

    public function render()
    {
        return view('livewire.admin.rates-advisories');
    }
}
