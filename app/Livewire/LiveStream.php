<?php

namespace App\Livewire;

use App\Livewire\Admin\MediaLibrary;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.guest')]
#[Title('Live Stream — TEI Tarlac Electric')]
class LiveStream extends Component
{
    public function render(): \Illuminate\View\View
    {
        $enabled     = (bool) Setting::get('stream_enabled', '0');
        $url         = Setting::get('stream_url', '');
        $title       = Setting::get('stream_title', '');
        $description = Setting::get('stream_description', '');
        $embedUrl    = ($enabled && $url) ? MediaLibrary::toEmbedUrl($url) : null;

        return view('livewire.live-stream', compact('enabled', 'title', 'description', 'embedUrl'));
    }
}
