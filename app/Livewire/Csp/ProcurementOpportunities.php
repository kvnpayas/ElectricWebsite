<?php

namespace App\Livewire\Csp;

use App\Models\ProcurementGlobalDownload;
use App\Models\ProcurementOpportunity;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.guest')]
#[Title('Procurement Opportunities — TEI Tarlac Electric')]
class ProcurementOpportunities extends Component
{
    use WithPagination;

    public string $search       = '';
    public string $statusFilter = 'all';

    public function updatedSearch(): void
    {
        $this->resetPage();
        unset($this->opportunities);
    }

    public function updatedStatusFilter(): void
    {
        $this->resetPage();
        unset($this->opportunities);
    }

    #[Computed]
    public function opportunities()
    {
        return ProcurementOpportunity::with('documents')
            ->where('is_published', true)
            ->when($this->search, fn ($q) => $q->where(
                fn ($sq) => $sq->where('code', 'like', "%{$this->search}%")
                               ->orWhere('title', 'like', "%{$this->search}%")
            ))
            ->when($this->statusFilter !== 'all', fn ($q) => $q->where('status', $this->statusFilter))
            ->orderByDesc('posting_date')
            ->orderByDesc('sort_order')
            ->paginate(10);
    }

    #[Computed]
    public function globalDownloads()
    {
        return ProcurementGlobalDownload::orderBy('sort_order')->get();
    }

    public function render()
    {
        return view('livewire.csp.procurement-opportunities');
    }
}
