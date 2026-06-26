<?php

namespace App\Livewire\RateAndAdvisory;

use App\Models\AdvisoryDocument;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class AdvisoryList extends Component
{
    public string $category = 'advisories';

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
            ->orderByDesc('document_date')
            ->get();
    }

    public function render()
    {
        $config = self::CONFIG[$this->category];
        return view('livewire.rate-and-advisory.advisory-list', compact('config'));
    }
}
