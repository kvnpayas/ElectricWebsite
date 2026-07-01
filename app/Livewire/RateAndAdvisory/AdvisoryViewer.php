<?php

namespace App\Livewire\RateAndAdvisory;

use App\Models\AboutDocument;
use App\Models\AdvisoryDocument;
use App\Models\ProfileDocument;
use Illuminate\Support\Facades\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class AdvisoryViewer extends Component
{
    public $document;
    public bool $isAbout   = false;
    public bool $isProfile = false;

    public function mount(string $slug): void
    {
        $doc = AdvisoryDocument::where('url', $slug)->where('status', 'published')->first()
            ?? AboutDocument::where('url', $slug)->where('status', 'published')->first()
            ?? ProfileDocument::where('url', $slug)->where('status', 'published')->first();

        abort_if(! $doc, 404);

        $this->document  = $doc;
        $this->isAbout   = $doc instanceof AboutDocument;
        $this->isProfile = $doc instanceof ProfileDocument;
    }

    #[Computed]
    public function categoryLabel(): string
    {
        if ($this->isProfile) {
            return $this->document->category;
        }

        if ($this->isAbout) {
            return match ($this->document->category) {
                'disclosures'        => 'Disclosures',
                'investor-relations' => 'Investor Relations',
                'press-materials'    => 'Press Materials / News',
                default              => 'Corporate Governance',
            };
        }

        return match ($this->document->category) {
            'rate-schedule' => 'Rate Schedule / Customer Class',
            'others'        => 'Other Documents',
            default         => 'Advisories',
        };
    }

    #[Computed]
    public function backUrl(): string
    {
        if ($this->isProfile) {
            return $this->document->type === 'by-laws'
                ? route('about-us.profile.by-laws')
                : route('about-us.profile.articles-of-incorporation');
        }

        if ($this->isAbout) {
            return match ($this->document->category) {
                'disclosures'        => route('about-us.disclosures'),
                'investor-relations' => route('about-us.investor-relations'),
                'press-materials'    => route('about-us.press-materials'),
                default              => route('about-us.corporate-governance'),
            };
        }

        return match ($this->document->category) {
            'rate-schedule' => route('rate-and-advisories.rate-schedule'),
            'others'        => route('rate-and-advisories.other-documents'),
            default         => route('rate-and-advisories.advisories'),
        };
    }

    #[Computed]
    public function breadcrumbs(): array
    {
        if ($this->isProfile) {
            $typeRoute = $this->document->type === 'by-laws'
                ? 'about-us.profile.by-laws'
                : 'about-us.profile.articles-of-incorporation';
            $typeLabel = $this->document->type === 'by-laws' ? 'By Laws' : 'Articles of Incorporation';

            return [
                ['name' => 'About Us',             'route_name' => 'about-us'],
                ['name' => 'Profile',               'route_name' => 'about-us.profile'],
                ['name' => $typeLabel,              'route_name' => $typeRoute],
                ['name' => $this->document->title, 'route_name' => ''],
            ];
        }

        if ($this->isAbout) {
            $categoryRoute = match ($this->document->category) {
                'disclosures'        => 'about-us.disclosures',
                'investor-relations' => 'about-us.investor-relations',
                'press-materials'    => 'about-us.press-materials',
                default              => 'about-us.corporate-governance',
            };

            return [
                ['name' => 'About Us',            'route_name' => 'about-us'],
                ['name' => $this->categoryLabel,  'route_name' => $categoryRoute],
                ['name' => $this->document->title,'route_name' => ''],
            ];
        }

        $categoryRoute = match ($this->document->category) {
            'rate-schedule' => 'rate-and-advisories.rate-schedule',
            'others'        => 'rate-and-advisories.other-documents',
            default         => 'rate-and-advisories.advisories',
        };

        return [
            ['name' => 'Rates And Advisories', 'route_name' => 'rate-and-advisories'],
            ['name' => $this->categoryLabel,   'route_name' => $categoryRoute],
            ['name' => $this->document->title, 'route_name' => ''],
        ];
    }

    #[Computed]
    public function pdfRoute(): ?string
    {
        if (! $this->document->url || ! $this->document->file_path) {
            return null;
        }

        if ($this->isProfile) {
            return route('profile-documents.pdf', $this->document->url);
        }

        $routeName = $this->isAbout ? 'about-us.pdf' : 'rate-and-advisories.pdf';

        return route($routeName, $this->document->url);
    }

    public function render()
    {
        View::share('isAboutViewer', $this->isAbout);

        return view('livewire.rate-and-advisory.advisory-viewer')
            ->title($this->document->title . ' — TEI Tarlac Electric');
    }
}
