<?php

namespace App\Livewire\RateAndAdvisory;

use App\Models\AdvisoryDocument;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.guest')]
class AdvisoryList extends Component
{
    use WithPagination;

    public string $category = 'advisories';
    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    private const CONFIG = [
        'advisories' => [
            'title'    => 'Advisories',
            'subtitle' => 'Official advisories and notices filed with the Energy Regulatory Commission (ERC). All documents are published in PDF format in compliance with transparency and public disclosure requirements.',
        ],
        'rate-schedule' => [
            'title'    => 'Rate Schedule / Customer Class',
            'subtitle' => 'Current approved electricity rates per customer class as authorized by the ERC. Rate schedules cover residential, commercial, industrial, and other applicable consumer categories.',
        ],
        'others' => [
            'title'    => 'Other Documents',
            'subtitle' => 'ERC orders, resolutions, and other relevant regulatory publications and official issuances applicable to TEI customers.',
        ],
    ];

    public function mount(): void
    {
        $this->category = match (request()->route()->getName()) {
            'rate-and-advisories.rate-schedule'   => 'rate-schedule',
            'rate-and-advisories.other-documents' => 'others',
            default                               => 'advisories',
        };
    }

    #[Computed]
    public function documents()
    {
        return AdvisoryDocument::query()
            ->where('category', $this->category)
            ->where('status', 'published')
            ->when($this->search, fn ($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->orderByDesc('document_date')
            ->paginate(15);
    }

    public function render()
    {
        $config = self::CONFIG[$this->category];
        return view('livewire.rate-and-advisory.advisory-list', compact('config'))
            ->title($config['title'] . ' — TEI Tarlac Electric');
    }
}
