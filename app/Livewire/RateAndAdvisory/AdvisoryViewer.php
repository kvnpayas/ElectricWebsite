<?php

namespace App\Livewire\RateAndAdvisory;

use App\Models\AdvisoryDocument;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.guest')]
class AdvisoryViewer extends Component
{
    public AdvisoryDocument $document;

    public function mount(string $slug): void
    {
        $this->document = AdvisoryDocument::where('url', $slug)
            ->where('status', 'published')
            ->firstOrFail();
    }

    #[Computed]
    public function categoryLabel(): string
    {
        return match ($this->document->category) {
            'rate-schedule' => 'Rate Schedule / Customer Class',
            'others'        => 'Other Documents',
            default         => 'Advisories',
        };
    }

    #[Computed]
    public function backUrl(): string
    {
        return match ($this->document->category) {
            'rate-schedule' => route('rate-and-advisories.rate-schedule'),
            'others'        => route('rate-and-advisories.other-documents'),
            default         => route('rate-and-advisories.advisories'),
        };
    }

    public function render()
    {
        return view('livewire.rate-and-advisory.advisory-viewer');
    }
}
