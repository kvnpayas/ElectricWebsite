@extends('layouts.auth')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

@php
$stats = [
    [
        'label'     => 'Total Users',
        'value'     => '1,247',
        'delta'     => '+12.5%',
        'deltaDir'  => 'up',
        'sub'       => 'vs. last month',
        'iconPath'  => 'M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z',
        'iconColor' => '#3B82F6',
        'iconBg'    => '#EFF6FF',
    ],
    [
        'label'     => 'Published Posts',
        'value'     => '84',
        'delta'     => '+3 this week',
        'deltaDir'  => 'up',
        'sub'       => '6 drafts pending',
        'iconPath'  => 'M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z',
        'iconColor' => '#22C55E',
        'iconBg'    => '#F0FDF4',
    ],
    [
        'label'     => 'Media Files',
        'value'     => '2,391',
        'delta'     => '+47 new',
        'deltaDir'  => 'up',
        'sub'       => '8.4 GB used',
        'iconPath'  => 'M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z',
        'iconColor' => '#8B5CF6',
        'iconBg'    => '#F5F3FF',
    ],
    [
        'label'     => 'Active Services',
        'value'     => '6',
        'delta'     => 'All running',
        'deltaDir'  => 'neutral',
        'sub'       => 'No interruptions',
        'iconPath'  => 'M13 10V3L4 14h7v7l9-11h-7z',
        'iconColor' => '#E76727',
        'iconBg'    => 'rgba(231,103,39,0.1)',
    ],
];

$recentPosts = [
    ['title' => 'June 2026 Power Rate Update', 'category' => 'Announcement', 'author' => 'Admin', 'date' => 'Jun 7, 2026', 'status' => 'Published', 'statusColor' => '#22C55E', 'statusBg' => '#F0FDF4'],
    ['title' => 'Scheduled Maintenance – Zone A', 'category' => 'Advisory', 'author' => 'Operator', 'date' => 'Jun 6, 2026', 'status' => 'Published', 'statusColor' => '#22C55E', 'statusBg' => '#F0FDF4'],
    ['title' => 'New Payment Center Partners', 'category' => 'News', 'author' => 'Admin', 'date' => 'Jun 5, 2026', 'status' => 'Draft', 'statusColor' => '#D97706', 'statusBg' => '#FFFBEB'],
    ['title' => 'Senior Citizen Discount Guide', 'category' => 'Services', 'author' => 'Editor', 'date' => 'Jun 3, 2026', 'status' => 'Published', 'statusColor' => '#22C55E', 'statusBg' => '#F0FDF4'],
    ['title' => 'Emergency Restoration Protocol', 'category' => 'Advisory', 'author' => 'Operator', 'date' => 'Jun 1, 2026', 'status' => 'Scheduled', 'statusColor' => '#3B82F6', 'statusBg' => '#EFF6FF'],
];

$recentUsers = [
    ['initials' => 'MS', 'name' => 'Maria Santos', 'email' => 'maria.s@email.com', 'role' => 'Customer', 'joined' => 'Jun 7, 2026', 'color' => '#E76727'],
    ['initials' => 'JR', 'name' => 'Jose Reyes', 'email' => 'jose.r@email.com', 'role' => 'Customer', 'joined' => 'Jun 6, 2026', 'color' => '#3B82F6'],
    ['initials' => 'AC', 'name' => 'Ana Cruz', 'email' => 'ana.c@email.com', 'role' => 'Operator', 'joined' => 'Jun 5, 2026', 'color' => '#8B5CF6'],
    ['initials' => 'PD', 'name' => 'Pedro Dela Cruz', 'email' => 'pedro.d@email.com', 'role' => 'Customer', 'joined' => 'Jun 4, 2026', 'color' => '#22C55E'],
];

$systemHealth = [
    ['label' => 'Database',        'status' => 'Online',   'color' => '#22C55E', 'bg' => '#F0FDF4', 'detail' => 'Response: 12ms'],
    ['label' => 'File Storage',    'status' => 'Warning',  'color' => '#D97706', 'bg' => '#FFFBEB', 'detail' => '63% capacity'],
    ['label' => 'SMTP Email',      'status' => 'Online',   'color' => '#22C55E', 'bg' => '#F0FDF4', 'detail' => 'Queue: 0'],
    ['label' => 'Payment Gateway', 'status' => 'Online',   'color' => '#22C55E', 'bg' => '#F0FDF4', 'detail' => 'API connected'],
    ['label' => 'API Service',     'status' => 'Online',   'color' => '#22C55E', 'bg' => '#F0FDF4', 'detail' => 'Uptime: 99.9%'],
];

$quickActions = [
    ['label' => 'New Post',      'sub' => 'Write & publish', 'iconPath' => 'M12 4v16m8-8H4', 'color' => '#3B82F6', 'bg' => '#EFF6FF'],
    ['label' => 'Upload Media',  'sub' => 'Add to library',  'iconPath' => 'M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12', 'color' => '#8B5CF6', 'bg' => '#F5F3FF'],
    ['label' => 'Edit Hero',     'sub' => 'Update homepage', 'iconPath' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z', 'color' => '#E76727', 'bg' => 'rgba(231,103,39,0.1)'],
    ['label' => 'New Advisory',  'sub' => 'Post interruption', 'iconPath' => 'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z', 'color' => '#EF4444', 'bg' => '#FEF2F2'],
];
@endphp

{{-- ─── Welcome banner ─────────────────────────────────── --}}
<div class="mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-4" id="dash-header">
    <div>
        <h1 class="text-2xl font-black" style="font-family: var(--font-display); color: #082840;">
            Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 18 ? 'afternoon' : 'evening') }}, Admin
        </h1>
        <p class="text-sm mt-1" style="color: #56565A;">
            {{ now()->format('l, F j, Y') }} &mdash; Here's what's happening on the TEI platform.
        </p>
    </div>
    <a href="#"
       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-sm font-bold shadow-md transition-[box-shadow,background-color] duration-200 cursor-pointer shrink-0"
       style="background-color: #E76727; color: white;"
       onmouseover="this.style.backgroundColor='#C45218'; this.style.boxShadow='0 8px 24px rgba(231,103,39,0.35)'"
       onmouseout="this.style.backgroundColor='#E76727'; this.style.boxShadow=''">
        <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="16" height="16">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
        </svg>
        New Post
    </a>
</div>


{{-- ─── Stat cards ─────────────────────────────────────── --}}
<div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-6" id="dash-stats">
    @foreach ($stats as $stat)
    <div class="bg-white rounded-2xl p-5 border transition-[box-shadow] duration-200 cursor-default"
         style="border-color: #F3F4F6; box-shadow: 0 1px 4px rgba(8,40,64,0.05);"
         onmouseover="this.style.boxShadow='0 8px 24px rgba(8,40,64,0.10)'"
         onmouseout="this.style.boxShadow='0 1px 4px rgba(8,40,64,0.05)'">
        <div class="flex items-start justify-between mb-4">
            <div class="size-11 rounded-xl flex items-center justify-center shrink-0"
                 style="background-color: {{ $stat['iconBg'] }};">
                <svg class="size-5" fill="none" stroke="{{ $stat['iconColor'] }}"
                     viewBox="0 0 24 24" width="20" height="20">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="1.75" d="{{ $stat['iconPath'] }}"/>
                </svg>
            </div>
            <span class="text-xs font-semibold px-2 py-0.5 rounded-full shrink-0"
                  style="{{ $stat['deltaDir'] === 'up' ? 'color: #15803D; background-color: #F0FDF4;' : ($stat['deltaDir'] === 'down' ? 'color: #B91C1C; background-color: #FEF2F2;' : 'color: #374151; background-color: #F9FAFB;') }}">
                {{ $stat['delta'] }}
            </span>
        </div>
        <p class="text-3xl font-black mb-0.5" style="font-family: var(--font-display); color: #082840;">
            {{ $stat['value'] }}
        </p>
        <p class="text-sm font-semibold" style="color: #082840;">{{ $stat['label'] }}</p>
        <p class="text-xs mt-0.5" style="color: #A7A8AA;">{{ $stat['sub'] }}</p>
    </div>
    @endforeach
</div>


{{-- ─── Quick actions ───────────────────────────────────── --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-3 mb-6" id="dash-actions">
    @foreach ($quickActions as $action)
    <button class="flex items-center gap-3 bg-white rounded-2xl px-4 py-3.5 border text-left transition-[box-shadow,border-color] duration-200 cursor-pointer w-full"
            style="border-color: #F3F4F6; box-shadow: 0 1px 4px rgba(8,40,64,0.04);"
            onmouseover="this.style.boxShadow='0 6px 20px rgba(8,40,64,0.10)'; this.style.borderColor='rgba(231,103,39,0.2)'"
            onmouseout="this.style.boxShadow='0 1px 4px rgba(8,40,64,0.04)'; this.style.borderColor='#F3F4F6'">
        <div class="size-9 rounded-xl flex items-center justify-center shrink-0"
             style="background-color: {{ $action['bg'] }};">
            <svg class="size-4" fill="none" stroke="{{ $action['color'] }}"
                 viewBox="0 0 24 24" width="16" height="16">
                <path stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="2" d="{{ $action['iconPath'] }}"/>
            </svg>
        </div>
        <div class="min-w-0">
            <p class="text-sm font-bold truncate" style="color: #082840;">{{ $action['label'] }}</p>
            <p class="text-xs truncate" style="color: #A7A8AA;">{{ $action['sub'] }}</p>
        </div>
    </button>
    @endforeach
</div>


{{-- ─── Main two-column content ────────────────────────── --}}
<div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- Recent posts table (wider column) --}}
    <div class="xl:col-span-2 bg-white rounded-2xl border overflow-hidden"
         style="border-color: #F3F4F6; box-shadow: 0 1px 4px rgba(8,40,64,0.05);" id="dash-posts">
        <div class="flex items-center justify-between px-5 py-4 border-b" style="border-color: #F9FAFB;">
            <div>
                <h2 class="text-base font-bold" style="color: #082840;">Recent Posts</h2>
                <p class="text-xs" style="color: #A7A8AA;">Latest published and pending content</p>
            </div>
            <a href="#"
               class="text-xs font-bold px-3 py-1.5 rounded-lg transition-colors duration-150 cursor-pointer"
               style="color: #E76727; background-color: rgba(231,103,39,0.08);"
               onmouseover="this.style.backgroundColor='rgba(231,103,39,0.15)'"
               onmouseout="this.style.backgroundColor='rgba(231,103,39,0.08)'">View all</a>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm" style="border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #FAFAFA;">
                        <th class="text-left px-5 py-3 text-xs font-semibold uppercase tracking-wider"
                            style="color: #A7A8AA;">Title</th>
                        <th class="text-left px-3 py-3 text-xs font-semibold uppercase tracking-wider hidden md:table-cell"
                            style="color: #A7A8AA;">Category</th>
                        <th class="text-left px-3 py-3 text-xs font-semibold uppercase tracking-wider hidden lg:table-cell"
                            style="color: #A7A8AA;">Date</th>
                        <th class="text-left px-3 py-3 text-xs font-semibold uppercase tracking-wider"
                            style="color: #A7A8AA;">Status</th>
                        <th class="px-5 py-3 text-xs font-semibold uppercase tracking-wider text-right"
                            style="color: #A7A8AA;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentPosts as $post)
                    <tr class="border-t transition-colors duration-150"
                        style="border-color: #F9FAFB;"
                        onmouseover="this.style.backgroundColor='#FAFAFA'"
                        onmouseout="this.style.backgroundColor='transparent'">
                        <td class="px-5 py-3.5">
                            <p class="font-semibold text-sm leading-tight line-clamp-1"
                               style="color: #082840;">{{ $post['title'] }}</p>
                            <p class="text-xs mt-0.5" style="color: #A7A8AA;">by {{ $post['author'] }}</p>
                        </td>
                        <td class="px-3 py-3.5 hidden md:table-cell">
                            <span class="text-xs font-medium" style="color: #56565A;">{{ $post['category'] }}</span>
                        </td>
                        <td class="px-3 py-3.5 hidden lg:table-cell">
                            <span class="text-xs" style="color: #A7A8AA;">{{ $post['date'] }}</span>
                        </td>
                        <td class="px-3 py-3.5">
                            <span class="inline-flex items-center gap-1 text-xs font-semibold px-2 py-0.5 rounded-full"
                                  style="color: {{ $post['statusColor'] }}; background-color: {{ $post['statusBg'] }};">
                                <span class="size-1.5 rounded-full" style="background-color: {{ $post['statusColor'] }};"></span>
                                {{ $post['status'] }}
                            </span>
                        </td>
                        <td class="px-5 py-3.5 text-right">
                            <div class="flex items-center justify-end gap-1">
                                {{-- Edit --}}
                                <button class="size-7 rounded-lg flex items-center justify-center transition-colors duration-150 cursor-pointer"
                                        style="color: #56565A;"
                                        onmouseover="this.style.backgroundColor='#EFF6FF'; this.style.color='#3B82F6'"
                                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#56565A'"
                                        aria-label="Edit">
                                    <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>
                                {{-- Delete --}}
                                <button class="size-7 rounded-lg flex items-center justify-center transition-colors duration-150 cursor-pointer"
                                        style="color: #56565A;"
                                        onmouseover="this.style.backgroundColor='#FEF2F2'; this.style.color='#EF4444'"
                                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#56565A'"
                                        aria-label="Delete">
                                    <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" width="14" height="14">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Right column: System Health + Recent Users --}}
    <div class="space-y-6">

        {{-- System Health --}}
        <div class="bg-white rounded-2xl border overflow-hidden"
             style="border-color: #F3F4F6; box-shadow: 0 1px 4px rgba(8,40,64,0.05);" id="dash-health">
            <div class="flex items-center justify-between px-5 py-4 border-b" style="border-color: #F9FAFB;">
                <h2 class="text-base font-bold" style="color: #082840;">System Health</h2>
                <div class="flex items-center gap-1.5">
                    <span class="size-2 rounded-full" style="background-color: #22C55E;"></span>
                    <span class="text-xs font-medium" style="color: #22C55E;">Operational</span>
                </div>
            </div>
            <div class="divide-y" style="border-color: #F9FAFB;">
                @foreach ($systemHealth as $service)
                <div class="flex items-center justify-between px-5 py-3">
                    <div>
                        <p class="text-sm font-semibold" style="color: #082840;">{{ $service['label'] }}</p>
                        <p class="text-xs" style="color: #A7A8AA;">{{ $service['detail'] }}</p>
                    </div>
                    <span class="text-xs font-semibold px-2.5 py-1 rounded-full"
                          style="color: {{ $service['color'] }}; background-color: {{ $service['bg'] }};">
                        {{ $service['status'] }}
                    </span>
                </div>
                @endforeach
            </div>
        </div>

        {{-- Recent Users --}}
        <div class="bg-white rounded-2xl border overflow-hidden"
             style="border-color: #F3F4F6; box-shadow: 0 1px 4px rgba(8,40,64,0.05);" id="dash-users">
            <div class="flex items-center justify-between px-5 py-4 border-b" style="border-color: #F9FAFB;">
                <h2 class="text-base font-bold" style="color: #082840;">Recent Users</h2>
                <a href="#"
                   class="text-xs font-bold px-3 py-1.5 rounded-lg transition-colors duration-150 cursor-pointer"
                   style="color: #E76727; background-color: rgba(231,103,39,0.08);"
                   onmouseover="this.style.backgroundColor='rgba(231,103,39,0.15)'"
                   onmouseout="this.style.backgroundColor='rgba(231,103,39,0.08)'">Manage</a>
            </div>
            <div class="divide-y" style="border-color: #F9FAFB;">
                @foreach ($recentUsers as $user)
                <div class="flex items-center gap-3 px-5 py-3 transition-colors duration-150"
                     onmouseover="this.style.backgroundColor='#FAFAFA'"
                     onmouseout="this.style.backgroundColor='transparent'">
                    <div class="size-8 rounded-full flex items-center justify-center text-white text-xs font-bold shrink-0"
                         style="background-color: {{ $user['color'] }};">{{ $user['initials'] }}</div>
                    <div class="min-w-0 flex-1">
                        <p class="text-sm font-semibold truncate" style="color: #082840;">{{ $user['name'] }}</p>
                        <p class="text-xs truncate" style="color: #A7A8AA;">{{ $user['email'] }}</p>
                    </div>
                    <span class="text-[10px] font-semibold px-2 py-0.5 rounded-full shrink-0"
                          style="background-color: #F3F4F6; color: #56565A;">{{ $user['role'] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof gsap === 'undefined') return;

    gsap.timeline({ defaults: { ease: 'power2.out' } })
        .from('#dash-header', { opacity: 0, y: -16, duration: 0.45 })
        .from('#dash-stats .bg-white',  { opacity: 0, y: 24, duration: 0.4, stagger: 0.07 }, '-=0.2')
        .from('#dash-actions button',   { opacity: 0, y: 16, duration: 0.35, stagger: 0.06 }, '-=0.15')
        .from('#dash-posts',            { opacity: 0, y: 20, duration: 0.4 }, '-=0.1')
        .from('#dash-health',           { opacity: 0, y: 20, duration: 0.4 }, '<')
        .from('#dash-users',            { opacity: 0, y: 20, duration: 0.4 }, '-=0.2');
});
</script>
@endpush
