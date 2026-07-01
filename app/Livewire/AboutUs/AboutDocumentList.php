<?php

namespace App\Livewire\AboutUs;

use App\Models\AboutDocument;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.guest')]
class AboutDocumentList extends Component
{
    use WithPagination;

    public string $category = 'corporate-governance';
    public string $search = '';

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    private const CONFIG = [
        'corporate-governance' => [
            'title'    => 'Corporate Governance',
            'badge'    => 'About TEI',
            'subtitle' => 'Official corporate governance documents, policies, and compliance filings of Tarlac Electric Inc. (TEI) as required by regulatory authorities.',
            'route'    => 'about-us.corporate-governance',
        ],
        'disclosures' => [
            'title'    => 'Disclosures',
            'badge'    => 'About TEI',
            'subtitle' => 'Mandatory public disclosures and transparency reports filed by TEI in compliance with applicable laws and regulatory requirements.',
            'route'    => 'about-us.disclosures',
        ],
        'investor-relations' => [
            'title'    => 'Investor Relations',
            'badge'    => 'About TEI',
            'subtitle' => 'Financial reports, annual reports, and other investor-related documents and publications of Tarlac Electric Inc.',
            'route'    => 'about-us.investor-relations',
        ],
        'press-materials' => [
            'title'    => 'Press Materials / News',
            'badge'    => 'About TEI',
            'subtitle' => 'Official press releases, news updates, and media materials published by Tarlac Electric Inc.',
            'route'    => 'about-us.press-materials',
        ],
    ];

    public function mount(): void
    {
        $this->category = match (request()->route()->getName()) {
            'about-us.disclosures'         => 'disclosures',
            'about-us.investor-relations'  => 'investor-relations',
            'about-us.press-materials'     => 'press-materials',
            default                        => 'corporate-governance',
        };
    }

    #[Computed]
    public function documents()
    {
        return AboutDocument::query()
            ->where('category', $this->category)
            ->where('status', 'published')
            ->when($this->search, fn ($q) => $q->where('title', 'like', '%' . $this->search . '%'))
            ->orderByDesc('document_date')
            ->paginate(15);
    }

    public function render()
    {
        $config = self::CONFIG[$this->category];
        return view('livewire.about-us.about-document-list', compact('config'))
            ->title($config['title'] . ' — TEI Tarlac Electric');
    }
}
