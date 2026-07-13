<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\AdvisoryDocument;
use App\Models\PowerInterruptionSchedule;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.auth')]
#[Title('Dashboard — TEI Admin')]
class Dashboard extends Component
{
    public function render(): \Illuminate\View\View
    {
        $ongoing   = PowerInterruptionSchedule::where('status', 'ongoing')->count();
        $scheduled = PowerInterruptionSchedule::where('status', 'scheduled')->count();

        return view('livewire.admin.dashboard', [
            'userName'          => Auth::user()?->name ?? 'Admin',
            'userCount'         => User::count(),
            'publishedDocs'     => AdvisoryDocument::published()->count(),
            'interruptionTotal' => $ongoing + $scheduled,
            'ongoingCount'      => $ongoing,
            'scheduledCount'    => $scheduled,
            'streamEnabled'     => (bool) Setting::get('stream_enabled', '0'),
            'recentActivity'    => ActivityLog::latest()->take(8)->get(),
            'modules' => [
                ['label' => 'Rates & Advisories',       'sub' => 'Documents & rate schedules',  'route' => 'admin.rates-advisories',         'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',          'iconBg' => 'bg-tei-blue/10',    'iconColor' => 'text-tei-blue'],
                ['label' => 'Power Interruption',       'sub' => 'Scheduled outages',           'route' => 'admin.power-interruption',        'icon' => 'M13 10V3L4 14h7v7l9-11h-7z',                                                                                                        'iconBg' => 'bg-warning/10',     'iconColor' => 'text-warning'],
                ['label' => 'Media Library',            'sub' => 'Livestream management',       'route' => 'admin.media-library',             'icon' => 'M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z', 'iconBg' => 'bg-danger/10',      'iconColor' => 'text-danger'],
                ['label' => 'Homepage Banners',         'sub' => 'Hero slider images',          'route' => 'admin.home-banners',              'icon' => 'M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z', 'iconBg' => 'bg-tei-orange/10',  'iconColor' => 'text-tei-orange'],
                ['label' => 'About Documents',          'sub' => 'Governance & disclosures',    'route' => 'admin.about-documents',           'icon' => 'M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z',                                                                    'iconBg' => 'bg-tei-blue/10',    'iconColor' => 'text-tei-blue'],
                ['label' => 'Profile Documents',        'sub' => 'Articles & by-laws',          'route' => 'admin.profile-documents',         'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',          'iconBg' => 'bg-info/10',        'iconColor' => 'text-info'],
                ['label' => 'Hosting Capacity',         'sub' => 'Grid capacity data',          'route' => 'admin.hosting-capacity',          'icon' => 'M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z',                                         'iconBg' => 'bg-tei-sky/10',     'iconColor' => 'text-tei-sky'],
                ['label' => 'Power Supply Proc.',       'sub' => 'CSP bid management',          'route' => 'admin.csp-procurement',           'icon' => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',          'iconBg' => 'bg-tei-gray/10',    'iconColor' => 'text-tei-gray'],
                ['label' => 'Procurement Opps.',        'sub' => 'Open opportunities',          'route' => 'admin.procurement-opportunities', 'icon' => 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z', 'iconBg' => 'bg-tei-gray/10',    'iconColor' => 'text-tei-gray'],
                ['label' => 'Settings',                 'sub' => 'Contact info & notices',      'route' => 'admin.settings',                  'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z', 'iconBg' => 'bg-tei-gray/10',    'iconColor' => 'text-tei-gray'],
                ['label' => 'Activity Log',             'sub' => 'Full audit trail',            'route' => 'admin.activity-log',              'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01',               'iconBg' => 'bg-tei-gray/10',    'iconColor' => 'text-tei-gray'],
                ['label' => 'Users',                    'sub' => 'Admin accounts',              'route' => 'admin.users.index',               'icon' => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',                'iconBg' => 'bg-tei-blue/10',    'iconColor' => 'text-tei-blue'],
            ],
        ]);
    }
}
