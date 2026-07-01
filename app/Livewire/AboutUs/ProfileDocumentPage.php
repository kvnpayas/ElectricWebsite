<?php

namespace App\Livewire\AboutUs;

use App\Models\ProfileDocument;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class ProfileDocumentPage extends Component
{
    public string $type = 'articles-of-incorporation';

    private const CONFIG = [
        'articles-of-incorporation' => [
            'title'    => 'Articles of Incorporation',
            'badge'    => 'Company Profile',
            'subtitle' => 'Official Articles of Incorporation of Tarlac Electric Inc. (TEI) as filed with the Securities and Exchange Commission (SEC).',
            'route'    => 'about-us.profile.articles-of-incorporation',
        ],
        'by-laws' => [
            'title'    => 'By Laws',
            'badge'    => 'Company Profile',
            'subtitle' => 'Internal rules and regulations governing the management and operations of Tarlac Electric Inc.',
            'route'    => 'about-us.profile.by-laws',
        ],
    ];

    public function mount(): void
    {
        $this->type = match (request()->route()->getName()) {
            'about-us.profile.by-laws' => 'by-laws',
            default                    => 'articles-of-incorporation',
        };
    }

    #[Computed]
    public function grouped()
    {
        return ProfileDocument::query()
            ->where('type', $this->type)
            ->where('status', 'published')
            ->orderBy('sort_order')
            ->orderByDesc('document_date')
            ->get()
            ->groupBy('category');
    }

    public function render()
    {
        $config = self::CONFIG[$this->type];
        return view('livewire.about-us.profile-document-page', compact('config'))
            ->title($config['title'] . ' — TEI Tarlac Electric');
    }
}
