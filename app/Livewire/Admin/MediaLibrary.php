<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.auth')]
#[Title('Media Library — TEI Admin')]
class MediaLibrary extends Component
{
    public bool   $streamEnabled     = false;
    public string $streamUrl         = '';
    public string $streamTitle       = '';
    public string $streamDescription = '';

    public function mount(): void
    {
        $this->streamEnabled     = (bool) Setting::get('stream_enabled', '0');
        $this->streamUrl         = Setting::get('stream_url', '');
        $this->streamTitle       = Setting::get('stream_title', '');
        $this->streamDescription = Setting::get('stream_description', '');
    }

    public function toggleStream(): void
    {
        $this->streamEnabled = ! $this->streamEnabled;

        if ($this->streamEnabled && ! $this->streamUrl) {
            $this->streamEnabled = false;
            $this->addError('streamUrl', 'Please enter a YouTube URL before enabling the livestream.');
            return;
        }

        Setting::set('stream_enabled', $this->streamEnabled ? '1' : '0');

        $userId   = Auth::id();
        $userName = Auth::user()?->name ?? 'System';
        $ip       = request()->ip();

        ActivityLog::create([
            'user_id'       => $userId,
            'user_name'     => $userName,
            'action'        => 'updated',
            'subject_type'  => 'Settings',
            'subject_id'    => null,
            'subject_label' => 'Livestream ' . ($this->streamEnabled ? 'Enabled' : 'Disabled'),
            'ip_address'    => $ip,
        ]);

        $this->dispatch('toast', message: $this->streamEnabled ? 'Livestream is now live.' : 'Livestream disabled.');
    }

    public function saveStream(): void
    {
        $this->validate([
            'streamUrl'         => ['nullable', 'url', 'max:500'],
            'streamTitle'       => ['nullable', 'string', 'max:200'],
            'streamDescription' => ['nullable', 'string', 'max:500'],
        ], attributes: [
            'streamUrl'         => 'YouTube URL',
            'streamTitle'       => 'stream title',
            'streamDescription' => 'description',
        ]);

        Setting::set('stream_enabled',     $this->streamEnabled ? '1' : '0');
        Setting::set('stream_url',         trim($this->streamUrl));
        Setting::set('stream_title',       trim($this->streamTitle));
        Setting::set('stream_description', trim($this->streamDescription));

        $userId   = Auth::id();
        $userName = Auth::user()?->name ?? 'System';
        $ip       = request()->ip();

        ActivityLog::create([
            'user_id'       => $userId,
            'user_name'     => $userName,
            'action'        => 'updated',
            'subject_type'  => 'Settings',
            'subject_id'    => null,
            'subject_label' => 'Livestream',
            'ip_address'    => $ip,
        ]);

        Log::channel('user-logs')->info(\sprintf(
            '[UPDATED] %s (ID:%s) — Settings "Livestream" from %s',
            $userName, $userId ?? '—', $ip
        ));

        $this->dispatch('toast', message: 'Livestream settings saved.');
    }

    public static function toEmbedUrl(string $url): ?string
    {
        if (str_contains($url, 'youtube.com/embed/')) {
            return $url;
        }
        if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1] . '?rel=0&modestbranding=1';
        }
        if (preg_match('/youtube\.com\/live\/([a-zA-Z0-9_-]+)/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1] . '?rel=0&modestbranding=1';
        }
        if (preg_match('/[?&]v=([a-zA-Z0-9_-]+)/', $url, $m)) {
            return 'https://www.youtube.com/embed/' . $m[1] . '?rel=0&modestbranding=1';
        }
        return null;
    }

    public function render(): \Illuminate\View\View
    {
        $embedUrl = $this->streamUrl ? static::toEmbedUrl($this->streamUrl) : null;

        return view('livewire.admin.media-library', compact('embedUrl'));
    }
}
