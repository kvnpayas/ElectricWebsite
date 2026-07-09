<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.auth')]
#[Title('Activity Log — TEI Admin')]
class ActivityLogs extends Component
{
    use WithPagination;

    public string $search     = '';
    public string $actionFilter = 'all';
    public string $dateFrom   = '';
    public string $dateTo     = '';

    public function updatingSearch(): void    { $this->resetPage(); }
    public function updatingActionFilter(): void { $this->resetPage(); }
    public function updatingDateFrom(): void  { $this->resetPage(); }
    public function updatingDateTo(): void    { $this->resetPage(); }

    #[Computed]
    public function logs()
    {
        return ActivityLog::query()
            ->when($this->search, fn ($q) => $q->where('user_name', 'like', "%{$this->search}%"))
            ->when($this->actionFilter !== 'all', fn ($q) => $q->where('action', $this->actionFilter))
            ->when($this->dateFrom, fn ($q) => $q->whereDate('created_at', '>=', $this->dateFrom))
            ->when($this->dateTo,   fn ($q) => $q->whereDate('created_at', '<=', $this->dateTo))
            ->orderByDesc('created_at')
            ->paginate(50);
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.activity-logs');
    }
}
