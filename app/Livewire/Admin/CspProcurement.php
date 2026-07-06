<?php

namespace App\Livewire\Admin;

use App\Models\CspBid;
use App\Models\CspBidCapacityRow;
use App\Models\CspBidDocument;
use App\Models\CspBidTimelineRow;
use App\Models\CspBidUpdate;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.auth')]
#[Title('CSP Procurement — TEI Admin')]
class CspProcurement extends Component
{
    use WithFileUploads;

    // ── Screen ───────────────────────────────────────────────
    public string $screen        = 'list';
    public ?int   $activeBidId   = null;
    public string $statusFilter  = 'all';

    // ── Bid drawer ───────────────────────────────────────────
    public bool   $showBidDrawer            = false;
    public ?int   $editBidId                = null;
    public string $bidCode                  = '';
    public string $bidStatus                = 'ongoing';
    public string $bidTitle                 = '';
    public string $bidPostedDate            = '';
    public string $bidContractDescription   = '';
    public int    $bidSortOrder             = 0;
    public bool   $bidIsPublished           = true;

    // ── Capacity row modal ───────────────────────────────────
    public bool   $showCapModal  = false;
    public ?int   $editCapId     = null;
    public string $capPeriodFrom = '';
    public string $capPeriodTo   = '';
    public string $capMw         = '';
    public int    $capSortOrder  = 0;

    // ── Timeline row modal ───────────────────────────────────
    public bool   $showTlModal  = false;
    public ?int   $editTlId     = null;
    public string $tlLabel      = '';
    public string $tlValue      = '';
    public string $tlLinkUrl    = '';
    public        $tlFile       = null;
    public bool   $tlHasFile    = false;
    public int    $tlSortOrder  = 0;

    // ── Document / bid-bulletin modal ────────────────────────
    public bool   $showDocModal = false;
    public ?int   $editDocId    = null;
    public string $docType      = 'document';
    public string $docLabel     = '';
    public        $docFile      = null;
    public bool   $docHasFile   = false;
    public int    $docSortOrder = 0;

    // ── Update modal ─────────────────────────────────────────
    public bool   $showUpdModal = false;
    public ?int   $editUpdId    = null;
    public string $updDate      = '';
    public string $updLabel     = '';
    public        $updFile      = null;
    public bool   $updHasFile   = false;
    public int    $updSortOrder = 0;

    // ── Delete modal ─────────────────────────────────────────
    public bool   $showDeleteModal = false;
    public string $deleteType      = '';
    public ?int   $deleteId        = null;

    // ═══════════════════════════════════════════════
    //  Computed — list screen
    // ═══════════════════════════════════════════════

    #[Computed]
    public function bids(): Collection
    {
        return CspBid::when($this->statusFilter !== 'all', fn ($q) => $q->where('status', $this->statusFilter))
            ->orderBy('sort_order')
            ->orderByDesc('posted_date')
            ->get();
    }

    public function setStatusFilter(string $status): void
    {
        $this->statusFilter = $status;
        unset($this->bids);
    }

    #[Computed]
    public function counts(): array
    {
        $raw = CspBid::selectRaw('status, count(*) as total')
            ->groupBy('status')
            ->pluck('total', 'status')
            ->all();

        return [
            'total'     => array_sum($raw),
            'ongoing'   => $raw['ongoing']   ?? 0,
            'completed' => $raw['completed'] ?? 0,
            'failed'    => $raw['failed']    ?? 0,
        ];
    }

    // ═══════════════════════════════════════════════
    //  Computed — detail screen
    // ═══════════════════════════════════════════════

    #[Computed]
    public function activeBid(): ?CspBid
    {
        return $this->activeBidId ? CspBid::find($this->activeBidId) : null;
    }

    #[Computed]
    public function capacityRows(): Collection
    {
        return $this->activeBidId
            ? CspBidCapacityRow::where('bid_id', $this->activeBidId)->orderBy('sort_order')->get()
            : collect();
    }

    #[Computed]
    public function timelineRows(): Collection
    {
        return $this->activeBidId
            ? CspBidTimelineRow::where('bid_id', $this->activeBidId)->orderBy('sort_order')->get()
            : collect();
    }

    #[Computed]
    public function documents(): Collection
    {
        return $this->activeBidId
            ? CspBidDocument::where('bid_id', $this->activeBidId)->where('type', 'document')->orderBy('sort_order')->get()
            : collect();
    }

    #[Computed]
    public function bidBulletins(): Collection
    {
        return $this->activeBidId
            ? CspBidDocument::where('bid_id', $this->activeBidId)->where('type', 'bid-bulletin')->orderBy('sort_order')->get()
            : collect();
    }

    #[Computed]
    public function updates(): Collection
    {
        return $this->activeBidId
            ? CspBidUpdate::where('bid_id', $this->activeBidId)->orderBy('sort_order')->get()
            : collect();
    }

    // ═══════════════════════════════════════════════
    //  Screen navigation
    // ═══════════════════════════════════════════════

    public function goToDetail(int $bidId): void
    {
        $this->activeBidId = $bidId;
        $this->screen      = 'detail';
        $this->closeAllModals();
    }

    public function goToList(): void
    {
        $this->screen      = 'list';
        $this->activeBidId = null;
        $this->closeAllModals();
    }

    // ═══════════════════════════════════════════════
    //  Bid CRUD
    // ═══════════════════════════════════════════════

    public function openAddBid(): void
    {
        $this->editBidId              = null;
        $this->bidCode                = '';
        $this->bidStatus              = 'ongoing';
        $this->bidTitle               = '';
        $this->bidPostedDate          = now()->format('Y-m-d');
        $this->bidContractDescription = '';
        $this->bidSortOrder           = $this->bids->count();
        $this->showBidDrawer          = true;
        $this->resetErrorBag();
    }

    public function openEditBid(int $id): void
    {
        $bid = CspBid::findOrFail($id);

        $this->editBidId              = $bid->id;
        $this->bidCode                = $bid->code;
        $this->bidStatus              = $bid->status;
        $this->bidTitle               = $bid->title;
        $this->bidPostedDate          = $bid->getRawOriginal('posted_date') ?? '';
        $this->bidContractDescription = $bid->contract_description ?? '';
        $this->bidSortOrder           = $bid->sort_order;
        $this->bidIsPublished         = (bool) $bid->is_published;
        $this->showBidDrawer          = true;
        $this->resetErrorBag();
    }

    public function saveBid(): void
    {
        $this->validate([
            'bidCode'                => 'required|string|max:50',
            'bidStatus'              => 'required|in:ongoing,completed,failed',
            'bidTitle'               => 'required|string|max:500',
            'bidPostedDate'          => 'required|date',
            'bidContractDescription' => 'nullable|string',
            'bidSortOrder'           => 'required|integer|min:0',
        ]);

        $data = [
            'code'                 => $this->bidCode,
            'status'               => $this->bidStatus,
            'title'                => $this->bidTitle,
            'posted_date'          => $this->bidPostedDate,
            'contract_description' => $this->bidContractDescription ?: null,
            'sort_order'           => $this->bidSortOrder,
            'is_published'         => $this->bidIsPublished,
        ];

        if ($this->editBidId) {
            $bid = CspBid::findOrFail($this->editBidId);
            $bid->update($data);
            $this->dispatch('toast', message: "Bid \"{$bid->code}\" updated.");

            if ($this->screen === 'detail') {
                $this->activeBidId = $bid->id;
            }
        } else {
            $bid = CspBid::create($data);
            $this->dispatch('toast', message: "Bid \"{$bid->code}\" created.");
        }

        $this->showBidDrawer = false;
        unset($this->bids, $this->counts, $this->activeBid);
    }

    public function closeBidDrawer(): void
    {
        $this->showBidDrawer = false;
        $this->resetErrorBag();
    }

    public function togglePublished(int $id): void
    {
        $bid      = CspBid::findOrFail($id);
        $newValue = ! $bid->is_published;
        $bid->update(['is_published' => $newValue]);
        unset($this->bids);
        $this->dispatch('toast', message: $newValue ? "Bid published." : "Bid unpublished.");
    }

    // ═══════════════════════════════════════════════
    //  Capacity row CRUD
    // ═══════════════════════════════════════════════

    public function openAddCapacity(): void
    {
        $this->editCapId    = null;
        $this->capPeriodFrom = '';
        $this->capPeriodTo   = '';
        $this->capMw         = '';
        $this->capSortOrder  = $this->capacityRows->count();
        $this->showCapModal  = true;
        $this->resetErrorBag();
    }

    public function openEditCapacity(int $id): void
    {
        $row = CspBidCapacityRow::findOrFail($id);

        $this->editCapId     = $row->id;
        $this->capPeriodFrom = $row->period_from;
        $this->capPeriodTo   = $row->period_to;
        $this->capMw         = $row->capacity_mw;
        $this->capSortOrder  = $row->sort_order;
        $this->showCapModal  = true;
        $this->resetErrorBag();
    }

    public function saveCapacity(): void
    {
        $this->validate([
            'capPeriodFrom' => 'required|string|max:20',
            'capPeriodTo'   => 'required|string|max:20',
            'capMw'         => 'required|string|max:10',
            'capSortOrder'  => 'required|integer|min:0',
        ]);

        $data = [
            'bid_id'      => $this->activeBidId,
            'period_from' => $this->capPeriodFrom,
            'period_to'   => $this->capPeriodTo,
            'capacity_mw' => $this->capMw,
            'sort_order'  => $this->capSortOrder,
        ];

        if ($this->editCapId) {
            CspBidCapacityRow::findOrFail($this->editCapId)->update($data);
        } else {
            CspBidCapacityRow::create($data);
        }

        $this->showCapModal = false;
        unset($this->capacityRows);
        $this->dispatch('toast', message: 'Capacity row saved.');
    }

    public function closeCapModal(): void
    {
        $this->showCapModal = false;
        $this->resetErrorBag();
    }

    // ═══════════════════════════════════════════════
    //  Timeline row CRUD
    // ═══════════════════════════════════════════════

    public function openAddTimeline(): void
    {
        $this->editTlId    = null;
        $this->tlLabel     = '';
        $this->tlValue     = '';
        $this->tlLinkUrl   = '';
        $this->tlFile      = null;
        $this->tlHasFile   = false;
        $this->tlSortOrder = $this->timelineRows->count();
        $this->showTlModal = true;
        $this->resetErrorBag();
    }

    public function openEditTimeline(int $id): void
    {
        $row = CspBidTimelineRow::findOrFail($id);

        $this->editTlId    = $row->id;
        $this->tlLabel     = $row->label;
        $this->tlValue     = $row->value;
        $this->tlLinkUrl   = $row->link_url ?? '';
        $this->tlFile      = null;
        $this->tlHasFile   = (bool) $row->file_path;
        $this->tlSortOrder = $row->sort_order;
        $this->showTlModal = true;
        $this->resetErrorBag();
    }

    public function saveTimeline(): void
    {
        $this->validate([
            'tlLabel'    => 'required|string|max:100',
            'tlValue'    => 'required|string|max:200',
            'tlLinkUrl'  => 'nullable|url|max:500',
            'tlFile'     => 'nullable|file|mimes:pdf|max:10240',
            'tlSortOrder'=> 'required|integer|min:0',
        ]);

        $data = [
            'bid_id'     => $this->activeBidId,
            'label'      => $this->tlLabel,
            'value'      => $this->tlValue,
            'link_url'   => $this->tlLinkUrl ?: null,
            'sort_order' => $this->tlSortOrder,
        ];

        if ($this->tlFile) {
            if ($this->editTlId) {
                $existing = CspBidTimelineRow::find($this->editTlId);
                if ($existing?->file_path) Storage::disk('public')->delete($existing->file_path);
            }
            $data['file_path'] = $this->tlFile->storeAs("csp/bid-{$this->activeBidId}/timeline", $this->tlFile->getClientOriginalName(), 'public');
            $data['file_name'] = $this->tlFile->getClientOriginalName();
            $this->tlFile = null;
        }

        if ($this->editTlId) {
            CspBidTimelineRow::findOrFail($this->editTlId)->update($data);
        } else {
            CspBidTimelineRow::create($data);
        }

        $this->showTlModal = false;
        unset($this->timelineRows);
        $this->dispatch('toast', message: 'Timeline row saved.');
    }

    public function removeTimelineFile(int $id): void
    {
        $row = CspBidTimelineRow::findOrFail($id);
        if ($row->file_path) {
            Storage::disk('public')->delete($row->file_path);
            $row->update(['file_path' => null, 'file_name' => null]);
        }
        $this->tlHasFile = false;
        unset($this->timelineRows);
        $this->dispatch('toast', message: 'File removed.');
    }

    public function closeTlModal(): void
    {
        $this->showTlModal = false;
        $this->tlFile = null;
        $this->resetErrorBag();
    }

    // ═══════════════════════════════════════════════
    //  Document / Bid-Bulletin CRUD
    // ═══════════════════════════════════════════════

    public function openAddDoc(string $type = 'document'): void
    {
        $this->editDocId    = null;
        $this->docType      = $type;
        $this->docLabel     = '';
        $this->docFile      = null;
        $this->docHasFile   = false;
        $this->docSortOrder = $type === 'document'
            ? $this->documents->count()
            : $this->bidBulletins->count();
        $this->showDocModal = true;
        $this->resetErrorBag();
    }

    public function openEditDoc(int $id): void
    {
        $doc = CspBidDocument::findOrFail($id);

        $this->editDocId    = $doc->id;
        $this->docType      = $doc->type;
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
            'docType'      => 'required|in:document,bid-bulletin',
            'docLabel'     => 'required|string|max:255',
            'docFile'      => 'nullable|file|mimes:pdf|max:10240',
            'docSortOrder' => 'required|integer|min:0',
        ]);

        $data = [
            'bid_id'     => $this->activeBidId,
            'type'       => $this->docType,
            'label'      => $this->docLabel,
            'sort_order' => $this->docSortOrder,
        ];

        if ($this->docFile) {
            if ($this->editDocId) {
                $existing = CspBidDocument::find($this->editDocId);
                if ($existing?->file_path) Storage::disk('public')->delete($existing->file_path);
            }
            $folder = $this->docType === 'bid-bulletin' ? 'bulletins' : 'documents';
            $data['file_path'] = $this->docFile->storeAs("csp/bid-{$this->activeBidId}/{$folder}", $this->docFile->getClientOriginalName(), 'public');
            $data['file_name'] = $this->docFile->getClientOriginalName();
            $this->docFile = null;
        }

        if ($this->editDocId) {
            CspBidDocument::findOrFail($this->editDocId)->update($data);
        } else {
            CspBidDocument::create($data);
        }

        $this->showDocModal = false;
        unset($this->documents, $this->bidBulletins);
        $this->dispatch('toast', message: 'Document saved.');
    }

    public function removeDocFile(int $id): void
    {
        $doc = CspBidDocument::findOrFail($id);
        if ($doc->file_path) {
            Storage::disk('public')->delete($doc->file_path);
            $doc->update(['file_path' => null, 'file_name' => null]);
        }
        $this->docHasFile = false;
        unset($this->documents, $this->bidBulletins);
        $this->dispatch('toast', message: 'File removed.');
    }

    public function closeDocModal(): void
    {
        $this->showDocModal = false;
        $this->docFile = null;
        $this->resetErrorBag();
    }

    // ═══════════════════════════════════════════════
    //  Update CRUD
    // ═══════════════════════════════════════════════

    public function openAddUpdate(): void
    {
        $this->editUpdId    = null;
        $this->updDate      = now()->format('Y-m-d');
        $this->updLabel     = '';
        $this->updFile      = null;
        $this->updHasFile   = false;
        $this->updSortOrder = $this->updates->count();
        $this->showUpdModal = true;
        $this->resetErrorBag();
    }

    public function openEditUpdate(int $id): void
    {
        $upd = CspBidUpdate::findOrFail($id);

        $this->editUpdId    = $upd->id;
        $this->updDate      = $upd->getRawOriginal('update_date') ?? '';
        $this->updLabel     = $upd->label;
        $this->updFile      = null;
        $this->updHasFile   = (bool) $upd->file_path;
        $this->updSortOrder = $upd->sort_order;
        $this->showUpdModal = true;
        $this->resetErrorBag();
    }

    public function saveUpdate(): void
    {
        $this->validate([
            'updDate'      => 'required|date',
            'updLabel'     => 'required|string|max:255',
            'updFile'      => 'nullable|file|mimes:pdf|max:10240',
            'updSortOrder' => 'required|integer|min:0',
        ]);

        $data = [
            'bid_id'      => $this->activeBidId,
            'update_date' => $this->updDate,
            'label'       => $this->updLabel,
            'sort_order'  => $this->updSortOrder,
        ];

        if ($this->updFile) {
            if ($this->editUpdId) {
                $existing = CspBidUpdate::find($this->editUpdId);
                if ($existing?->file_path) Storage::disk('public')->delete($existing->file_path);
            }
            $data['file_path'] = $this->updFile->storeAs("csp/bid-{$this->activeBidId}/updates", $this->updFile->getClientOriginalName(), 'public');
            $data['file_name'] = $this->updFile->getClientOriginalName();
            $this->updFile = null;
        }

        if ($this->editUpdId) {
            CspBidUpdate::findOrFail($this->editUpdId)->update($data);
        } else {
            CspBidUpdate::create($data);
        }

        $this->showUpdModal = false;
        unset($this->updates);
        $this->dispatch('toast', message: 'Update saved.');
    }

    public function removeUpdFile(int $id): void
    {
        $upd = CspBidUpdate::findOrFail($id);
        if ($upd->file_path) {
            Storage::disk('public')->delete($upd->file_path);
            $upd->update(['file_path' => null, 'file_name' => null]);
        }
        $this->updHasFile = false;
        unset($this->updates);
        $this->dispatch('toast', message: 'File removed.');
    }

    public function closeUpdModal(): void
    {
        $this->showUpdModal = false;
        $this->updFile = null;
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
            'bid'      => $this->deleteBid(),
            'capacity' => $this->deleteRecord(CspBidCapacityRow::class, 'capacityRows'),
            'timeline' => $this->deleteRecord(CspBidTimelineRow::class, 'timelineRows', true),
            'document' => $this->deleteRecord(CspBidDocument::class, 'documents', true),
            'update'   => $this->deleteRecord(CspBidUpdate::class, 'updates', true),
            default    => null,
        };

        $this->showDeleteModal = false;
        $this->deleteType      = '';
        $this->deleteId        = null;
    }

    private function deleteBid(): void
    {
        $bid = CspBid::find($this->deleteId);
        if (! $bid) return;

        $label = $bid->code;
        $bid->delete();
        $this->screen      = 'list';
        $this->activeBidId = null;
        unset($this->bids, $this->counts);
        $this->dispatch('toast', message: "Bid \"{$label}\" deleted.");
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

        if ($computed === 'documents' || $computed === 'bidBulletins') {
            unset($this->documents, $this->bidBulletins);
        }

        $this->dispatch('toast', message: 'Item deleted.');
    }

    // ═══════════════════════════════════════════════
    //  Helpers
    // ═══════════════════════════════════════════════

    private function closeAllModals(): void
    {
        $this->showBidDrawer   = false;
        $this->showCapModal    = false;
        $this->showTlModal     = false;
        $this->showDocModal    = false;
        $this->showUpdModal    = false;
        $this->showDeleteModal = false;
        $this->tlFile = $this->docFile = $this->updFile = null;
        $this->resetErrorBag();
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.csp-procurement');
    }
}
