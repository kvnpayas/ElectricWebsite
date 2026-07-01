<?php

namespace App\Livewire\Admin;

use App\Models\ProfileDocument;
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
#[Title('Profile Documents — TEI Admin')]
class ProfileDocuments extends Component
{
    use WithFileUploads;

    public string $typeFilter     = 'all';
    public string $search         = '';
    public string $statusFilter   = 'all';
    public bool   $showModal      = false;
    public string $formMode       = 'add';
    public ?int   $formId         = null;
    public string $formType       = 'articles-of-incorporation';
    public string $formCategory   = '';
    public string $formTitle      = '';
    public string $formDate       = '';
    public string $formStatus     = 'published';
    public string $formUrl        = '';
    public bool   $formDownloadable = false;
    public        $formFile       = null;
    public ?int   $deleteTarget   = null;

    // ── Computed ──────────────────────────────────────────────

    #[Computed]
    public function documents()
    {
        return ProfileDocument::query()
            ->when($this->typeFilter !== 'all', fn ($q) => $q->where('type', $this->typeFilter))
            ->when($this->search, fn ($q) => $q->where(function ($q) {
                $q->where('title', 'like', "%{$this->search}%")
                  ->orWhere('category', 'like', "%{$this->search}%");
            }))
            ->when($this->statusFilter !== 'all', fn ($q) => $q->where('status', $this->statusFilter))
            ->orderBy('type')
            ->orderBy('sort_order')
            ->orderByDesc('document_date')
            ->get();
    }

    #[Computed]
    public function counts(): array
    {
        $raw = ProfileDocument::query()
            ->selectRaw('type, count(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type')
            ->all();

        foreach (['articles-of-incorporation', 'by-laws'] as $t) {
            $raw[$t] ??= 0;
        }

        $raw['all'] = array_sum($raw);

        return $raw;
    }

    #[Computed]
    public function categories(): array
    {
        return ProfileDocument::query()
            ->when($this->formType, fn ($q) => $q->where('type', $this->formType))
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->all();
    }

    // ── Auto-slug from title ──────────────────────────────────

    public function updatedFormTitle(string $value): void
    {
        if ($this->formMode === 'add' || $this->formUrl === '') {
            $this->formUrl = Str::slug($value);
        }
    }

    // ── Type filter ───────────────────────────────────────────

    public function setType(string $type): void
    {
        $this->typeFilter  = $type;
        $this->deleteTarget = null;
    }

    // ── Drawer open / close ───────────────────────────────────

    public function openAdd(): void
    {
        $this->reset(['formId', 'formCategory', 'formTitle', 'formDate', 'formStatus', 'formUrl', 'formDownloadable', 'formFile']);
        $this->formType   = $this->typeFilter !== 'all' ? $this->typeFilter : 'articles-of-incorporation';
        $this->formDate   = now()->format('Y-m-d');
        $this->formStatus = 'published';
        $this->formMode   = 'add';
        $this->showModal  = true;
        $this->resetErrorBag();
    }

    public function openEdit(int $id): void
    {
        $doc = ProfileDocument::findOrFail($id);

        $this->formId           = $doc->id;
        $this->formType         = $doc->type;
        $this->formCategory     = $doc->category;
        $this->formTitle        = $doc->title;
        $this->formDate         = $doc->document_date->format('Y-m-d');
        $this->formStatus       = $doc->status;
        $this->formUrl          = $doc->url ?? '';
        $this->formDownloadable = (bool) $doc->is_downloadable;
        $this->formFile         = null;
        $this->formMode         = 'edit';
        $this->showModal        = true;
        $this->resetErrorBag();
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetErrorBag();
    }

    // ── Save ──────────────────────────────────────────────────

    public function save(): void
    {
        $uniqueSlug = Rule::unique('profile_documents', 'url')->ignore($this->formId);

        $this->validate([
            'formType'     => ['required', 'in:articles-of-incorporation,by-laws'],
            'formCategory' => ['required', 'min:2'],
            'formTitle'    => ['required', 'min:3'],
            'formDate'     => ['required', 'date'],
            'formStatus'   => ['required', 'in:published,draft'],
            'formUrl'      => ['nullable', 'alpha_dash', $uniqueSlug],
            'formFile'     => ['nullable', 'file', 'mimes:pdf', 'max:10240'],
        ]);

        $data = [
            'type'            => $this->formType,
            'category'        => $this->formCategory,
            'title'           => $this->formTitle,
            'document_date'   => $this->formDate,
            'status'          => $this->formStatus,
            'url'             => $this->formUrl ?: null,
            'is_downloadable' => $this->formDownloadable,
            'upd_user'        => Auth::id(),
        ];

        if ($this->formFile) {
            if ($this->formMode === 'edit') {
                $existing = ProfileDocument::find($this->formId);
                if ($existing?->file_path) {
                    Storage::delete($existing->file_path);
                }
            }

            $folder            = $this->formType;
            $data['file_path'] = $this->formFile->storeAs("profile-documents/{$folder}", $this->formFile->getClientOriginalName());
            $data['file_name'] = $this->formFile->getClientOriginalName();
            $this->formFile    = null;
        }

        if ($this->formMode === 'add') {
            $data['ctrd_user'] = Auth::id();
            $doc = ProfileDocument::create($data);
            $this->dispatch('toast', message: "Document \"{$doc->title}\" was added.");
        } else {
            $doc = ProfileDocument::findOrFail($this->formId);
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
        $doc = ProfileDocument::find($this->deleteTarget);

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

    // ── Render ────────────────────────────────────────────────

    public function render()
    {
        return view('livewire.admin.profile-documents');
    }
}
