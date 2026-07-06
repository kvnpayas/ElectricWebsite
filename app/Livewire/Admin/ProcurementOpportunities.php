<?php

namespace App\Livewire\Admin;

use App\Models\ProcurementGlobalDownload;
use App\Models\ProcurementOpportunity;
use App\Models\ProcurementOpportunityDocument;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('layouts.auth')]
#[Title('Procurement Opportunities — TEI Admin')]
class ProcurementOpportunities extends Component
{
    use WithFileUploads, WithPagination;

    // ── Search + filter ──────────────────────────────────────
    public string $search       = '';
    public string $statusFilter = 'all';

    // ── Opportunity drawer ───────────────────────────────────
    public bool   $showOppDrawer             = false;
    public ?int   $editOppId                 = null;
    public string $oppCode                   = '';
    public string $oppTitle                  = '';
    public string $oppPostingDate            = '';
    public string $oppPreBidConference       = '';
    public string $oppEoiDeadline            = '';
    public string $oppBidSubmissionDeadline  = '';
    public string $oppStatus                 = 'ongoing';
    public int    $oppSortOrder              = 0;
    public bool   $oppIsPublished            = true;

    // ── Document modal ───────────────────────────────────────
    public bool   $showDocModal  = false;
    public ?int   $editDocId     = null;
    public string $docLabel      = '';
    public        $docFile       = null;
    public bool   $docHasFile    = false;
    public int    $docSortOrder  = 0;

    // ── Global Download drawer ───────────────────────────────
    public bool   $showGdDrawer = false;
    public ?int   $editGdId     = null;
    public string $gdLabel      = '';
    public        $gdFile       = null;
    public bool   $gdHasFile    = false;
    public int    $gdSortOrder  = 0;

    // ── Delete modal ─────────────────────────────────────────
    public bool   $showDeleteModal = false;
    public string $deleteType      = '';
    public ?int   $deleteId        = null;

    // ═══════════════════════════════════════════════
    //  Computed
    // ═══════════════════════════════════════════════

    #[Computed]
    public function opportunities()
    {
        return ProcurementOpportunity::when(
            $this->search,
            fn ($q) => $q->where(
                fn ($sq) => $sq->where('code', 'like', "%{$this->search}%")
                               ->orWhere('title', 'like', "%{$this->search}%")
            )
        )
            ->when($this->statusFilter !== 'all', fn ($q) => $q->where('status', $this->statusFilter))
            ->orderBy('sort_order')
            ->orderByDesc('posting_date')
            ->paginate(15);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
        unset($this->opportunities);
    }

    public function setStatusFilter(string $status): void
    {
        $this->statusFilter = $status;
        $this->resetPage();
        unset($this->opportunities);
    }

    #[Computed]
    public function counts(): array
    {
        $raw = ProcurementOpportunity::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->all();

        return [
            'total'       => array_sum($raw),
            'ongoing'     => $raw['ongoing']     ?? 0,
            'awarded'     => $raw['awarded']      ?? 0,
            'bid_failure' => $raw['bid_failure']  ?? 0,
            'cancelled'   => $raw['cancelled']    ?? 0,
        ];
    }

    #[Computed]
    public function activeOppDocuments(): Collection
    {
        return $this->editOppId
            ? ProcurementOpportunityDocument::where('opportunity_id', $this->editOppId)
                ->orderBy('sort_order')
                ->get()
            : collect();
    }

    #[Computed]
    public function globalDownloads(): Collection
    {
        return ProcurementGlobalDownload::orderBy('sort_order')->get();
    }

    // ═══════════════════════════════════════════════
    //  Opportunity CRUD
    // ═══════════════════════════════════════════════

    public function openAddOpp(): void
    {
        $this->editOppId                = null;
        $this->oppCode                  = '';
        $this->oppTitle                 = '';
        $this->oppPostingDate           = now()->format('Y-m-d');
        $this->oppPreBidConference      = '';
        $this->oppEoiDeadline           = '';
        $this->oppBidSubmissionDeadline = '';
        $this->oppStatus                = 'ongoing';
        $this->oppSortOrder             = ProcurementOpportunity::count();
        $this->oppIsPublished           = true;
        $this->showOppDrawer            = true;
        $this->resetErrorBag();
    }

    public function openEditOpp(int $id): void
    {
        $opp = ProcurementOpportunity::findOrFail($id);

        $this->editOppId                = $opp->id;
        $this->oppCode                  = $opp->code;
        $this->oppTitle                 = $opp->title;
        $this->oppPostingDate           = $opp->getRawOriginal('posting_date') ?? '';
        $this->oppPreBidConference      = $opp->pre_bid_conference ?? '';
        $this->oppEoiDeadline           = $opp->eoi_deadline ?? '';
        $this->oppBidSubmissionDeadline = $opp->bid_submission_deadline ?? '';
        $this->oppStatus                = $opp->status;
        $this->oppSortOrder             = $opp->sort_order;
        $this->oppIsPublished           = (bool) $opp->is_published;
        $this->showOppDrawer            = true;
        unset($this->activeOppDocuments);
        $this->resetErrorBag();
    }

    public function saveOpp(): void
    {
        $this->validate([
            'oppCode'                  => 'required|string|max:60',
            'oppTitle'                 => 'required|string|max:500',
            'oppPostingDate'           => 'required|date',
            'oppPreBidConference'      => 'nullable|string|max:255',
            'oppEoiDeadline'           => 'nullable|string|max:255',
            'oppBidSubmissionDeadline' => 'nullable|string|max:255',
            'oppStatus'                => 'required|in:ongoing,awarded,bid_failure,cancelled',
            'oppSortOrder'             => 'required|integer|min:0',
        ]);

        $data = [
            'code'                    => $this->oppCode,
            'title'                   => $this->oppTitle,
            'posting_date'            => $this->oppPostingDate,
            'pre_bid_conference'      => $this->oppPreBidConference ?: null,
            'eoi_deadline'            => $this->oppEoiDeadline ?: null,
            'bid_submission_deadline' => $this->oppBidSubmissionDeadline ?: null,
            'status'                  => $this->oppStatus,
            'sort_order'              => $this->oppSortOrder,
            'is_published'            => $this->oppIsPublished,
        ];

        if ($this->editOppId) {
            ProcurementOpportunity::findOrFail($this->editOppId)->update($data);
            $this->dispatch('toast', message: "Opportunity \"{$this->oppCode}\" updated.");
        } else {
            ProcurementOpportunity::create($data);
            $this->dispatch('toast', message: "Opportunity \"{$this->oppCode}\" created.");
        }

        $this->showOppDrawer = false;
        unset($this->opportunities, $this->counts);
    }

    public function closeOppDrawer(): void
    {
        $this->showOppDrawer = false;
        $this->resetErrorBag();
    }

    public function togglePublished(int $id): void
    {
        $opp      = ProcurementOpportunity::findOrFail($id);
        $newValue = ! $opp->is_published;
        $opp->update(['is_published' => $newValue]);
        unset($this->opportunities);
        $this->dispatch('toast', message: $newValue ? 'Opportunity published.' : 'Opportunity unpublished.');
    }

    // ═══════════════════════════════════════════════
    //  Document CRUD
    // ═══════════════════════════════════════════════

    public function openAddDoc(): void
    {
        $this->editDocId    = null;
        $this->docLabel     = '';
        $this->docFile      = null;
        $this->docHasFile   = false;
        $this->docSortOrder = $this->activeOppDocuments->count();
        $this->showDocModal = true;
        $this->resetErrorBag();
    }

    public function openEditDoc(int $id): void
    {
        $doc = ProcurementOpportunityDocument::findOrFail($id);

        $this->editDocId    = $doc->id;
        $this->docLabel     = $doc->label;
        $this->docFile      = null;
        $this->docHasFile   = (bool) $doc->file_path;
        $this->docSortOrder = $doc->sort_order;
        $this->showDocModal = true;
        $this->resetErrorBag();
    }

    public function saveDoc(): void
    {
        $this->validate([
            'docLabel'     => 'required|string|max:255',
            'docFile'      => 'nullable|file|mimes:pdf|max:10240',
            'docSortOrder' => 'required|integer|min:0',
        ]);

        $data = [
            'opportunity_id' => $this->editOppId,
            'label'          => $this->docLabel,
            'sort_order'     => $this->docSortOrder,
        ];

        if ($this->docFile) {
            if ($this->editDocId) {
                $existing = ProcurementOpportunityDocument::find($this->editDocId);
                if ($existing?->file_path) Storage::disk('public')->delete($existing->file_path);
            }
            $data['file_path'] = $this->docFile->storeAs(
                "procurement/opp-{$this->editOppId}/documents",
                $this->docFile->getClientOriginalName(),
                'public'
            );
            $data['file_name'] = $this->docFile->getClientOriginalName();
            $this->docFile     = null;
        }

        if ($this->editDocId) {
            ProcurementOpportunityDocument::findOrFail($this->editDocId)->update($data);
        } else {
            ProcurementOpportunityDocument::create($data);
        }

        $this->showDocModal = false;
        unset($this->activeOppDocuments);
        $this->dispatch('toast', message: 'Document saved.');
    }

    public function removeDocFile(int $id): void
    {
        $doc = ProcurementOpportunityDocument::findOrFail($id);
        if ($doc->file_path) {
            Storage::disk('public')->delete($doc->file_path);
            $doc->update(['file_path' => null, 'file_name' => null]);
        }
        $this->docHasFile = false;
        unset($this->activeOppDocuments);
        $this->dispatch('toast', message: 'File removed.');
    }

    public function closeDocModal(): void
    {
        $this->showDocModal = false;
        $this->docFile      = null;
        $this->resetErrorBag();
    }

    // ═══════════════════════════════════════════════
    //  Global Download CRUD
    // ═══════════════════════════════════════════════

    public function openAddGd(): void
    {
        $this->editGdId     = null;
        $this->gdLabel      = '';
        $this->gdFile       = null;
        $this->gdHasFile    = false;
        $this->gdSortOrder  = $this->globalDownloads->count();
        $this->showGdDrawer = true;
        $this->resetErrorBag();
    }

    public function openEditGd(int $id): void
    {
        $gd = ProcurementGlobalDownload::findOrFail($id);

        $this->editGdId     = $gd->id;
        $this->gdLabel      = $gd->label;
        $this->gdFile       = null;
        $this->gdHasFile    = (bool) $gd->file_path;
        $this->gdSortOrder  = $gd->sort_order;
        $this->showGdDrawer = true;
        $this->resetErrorBag();
    }

    public function saveGd(): void
    {
        $this->validate([
            'gdLabel'     => 'required|string|max:255',
            'gdFile'      => 'nullable|file|mimes:pdf|max:10240',
            'gdSortOrder' => 'required|integer|min:0',
        ]);

        $data = [
            'label'      => $this->gdLabel,
            'sort_order' => $this->gdSortOrder,
        ];

        if ($this->gdFile) {
            if ($this->editGdId) {
                $existing = ProcurementGlobalDownload::find($this->editGdId);
                if ($existing?->file_path) Storage::disk('public')->delete($existing->file_path);
            }
            $data['file_path'] = $this->gdFile->storeAs(
                'procurement/global-downloads',
                $this->gdFile->getClientOriginalName(),
                'public'
            );
            $data['file_name'] = $this->gdFile->getClientOriginalName();
            $this->gdFile      = null;
        }

        if ($this->editGdId) {
            ProcurementGlobalDownload::findOrFail($this->editGdId)->update($data);
        } else {
            ProcurementGlobalDownload::create($data);
        }

        $this->showGdDrawer = false;
        unset($this->globalDownloads);
        $this->dispatch('toast', message: 'Download saved.');
    }

    public function removeGdFile(int $id): void
    {
        $gd = ProcurementGlobalDownload::findOrFail($id);
        if ($gd->file_path) {
            Storage::disk('public')->delete($gd->file_path);
            $gd->update(['file_path' => null, 'file_name' => null]);
        }
        $this->gdHasFile = false;
        unset($this->globalDownloads);
        $this->dispatch('toast', message: 'File removed.');
    }

    public function closeGdDrawer(): void
    {
        $this->showGdDrawer = false;
        $this->gdFile       = null;
        $this->resetErrorBag();
    }

    // ═══════════════════════════════════════════════
    //  Delete
    // ═══════════════════════════════════════════════

    public function confirmDelete(string $type, int $id): void
    {
        $this->deleteType      = $type;
        $this->deleteId        = $id;
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->deleteType      = '';
        $this->deleteId        = null;
    }

    public function delete(): void
    {
        match ($this->deleteType) {
            'opportunity'     => $this->deleteOpportunity(),
            'document'        => $this->deleteRecord(ProcurementOpportunityDocument::class, 'activeOppDocuments', true),
            'global-download' => $this->deleteRecord(ProcurementGlobalDownload::class, 'globalDownloads', true),
            default           => null,
        };

        $this->showDeleteModal = false;
        $this->deleteType      = '';
        $this->deleteId        = null;
    }

    private function deleteOpportunity(): void
    {
        $opp = ProcurementOpportunity::find($this->deleteId);
        if (! $opp) return;

        $label = $opp->code;
        foreach ($opp->documents as $doc) {
            if ($doc->file_path) Storage::disk('public')->delete($doc->file_path);
        }
        $opp->delete();
        unset($this->opportunities, $this->counts);
        $this->dispatch('toast', message: "Opportunity \"{$label}\" deleted.");
    }

    private function deleteRecord(string $model, string $computed, bool $hasFile = false): void
    {
        $record = $model::find($this->deleteId);
        if (! $record) return;

        if ($hasFile && $record->file_path) {
            Storage::disk('public')->delete($record->file_path);
        }

        $record->delete();
        unset($this->{$computed});
        $this->dispatch('toast', message: 'Item deleted.');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.procurement-opportunities');
    }
}
