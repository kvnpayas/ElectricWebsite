<div>

    {{-- ══════════════════════════════════════════
         PAGE HEADER
    ══════════════════════════════════════════ --}}
    <div id="page-header" class="mb-6">
        <nav class="flex items-center gap-2 text-xs mb-3" aria-label="Breadcrumb" style="color: #9CA3AF;">
            <a href="{{ route('admin.dashboard') }}" wire:navigate
               class="transition-colors duration-150"
               style="color: #9CA3AF;"
               onmouseover="this.style.color='#E76727'"
               onmouseout="this.style.color='#9CA3AF'">Dashboard</a>
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
            </svg>
            <span style="color: #374151; font-weight: 600;">User Maintenance</span>
        </nav>

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div>
                <h1 class="text-2xl font-black" style="font-family: var(--font-display); color: var(--color-tei-blue);">
                    User Maintenance
                </h1>
                <p class="text-sm mt-0.5" style="color: #6B7280;">
                    Manage system accounts, roles, and access permissions.
                </p>
            </div>
            <div class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-medium shrink-0"
                 style="background: rgba(5,150,105,0.08); color: #059669; border: 1px solid rgba(5,150,105,0.15);">
                <span class="w-1.5 h-1.5 rounded-full" style="background-color: #059669;"></span>
                System Online
            </div>
        </div>
    </div>


    {{-- ══════════════════════════════════════════
         TOAST
    ══════════════════════════════════════════ --}}
    @if (session()->has('success'))
    <div x-data="{ show: true }"
         x-show="show"
         x-init="setTimeout(() => show = false, 4000)"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-3"
         class="fixed top-6 right-6 z-[60] flex items-center gap-3 px-5 py-3.5 rounded-xl shadow-xl max-w-sm"
         style="background-color: #059669; color: white;"
         role="alert" aria-live="polite">
        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/>
        </svg>
        <span class="text-sm font-medium">{{ session('success') }}</span>
        <button @click="show = false" class="ml-auto cursor-pointer opacity-70 hover:opacity-100 transition-opacity" aria-label="Dismiss">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    @endif


    {{-- ══════════════════════════════════════════
         STAT CARDS
    ══════════════════════════════════════════ --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

        @php
        $statCards = [
            ['label'=>'Total Users',    'value'=>$this->stats['total'],  'icon'=>'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'iconColor'=>'#0F3D5C', 'iconBg'=>'rgba(15,61,92,0.1)',   'trend'=>'+2 this month'],
            ['label'=>'Active',         'value'=>$this->stats['active'], 'icon'=>'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',                                                                                                                                                                                                                    'iconColor'=>'#059669', 'iconBg'=>'rgba(5,150,105,0.1)',  'trend'=>'Currently online'],
            ['label'=>'Administrators', 'value'=>$this->stats['admins'], 'icon'=>'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',                                                              'iconColor'=>'#E76727', 'iconBg'=>'rgba(231,103,39,0.1)', 'trend'=>'Full access'],
            ['label'=>'Staff',          'value'=>$this->stats['staff'],  'icon'=>'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z',                                                                                  'iconColor'=>'#7C3AED', 'iconBg'=>'rgba(124,58,237,0.1)','trend'=>'Limited access'],
        ];
        @endphp

        @foreach ($statCards as $card)
        <div class="stat-card bg-white rounded-2xl p-5 flex items-start gap-4"
             style="border: 1px solid rgba(15,61,92,0.07); box-shadow: 0 2px 12px rgba(15,61,92,0.05);">
            <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
                 style="background-color: {{ $card['iconBg'] }};">
                <svg class="w-5 h-5" fill="none" stroke="{{ $card['iconColor'] }}" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $card['icon'] }}"/>
                </svg>
            </div>
            <div class="min-w-0">
                <div class="text-2xl font-black" style="font-family: var(--font-display); color: var(--color-tei-blue);">
                    {{ $card['value'] }}
                </div>
                <div class="text-sm font-semibold truncate" style="color: #374151;">{{ $card['label'] }}</div>
                <div class="text-xs mt-0.5 truncate" style="color: #9CA3AF;">{{ $card['trend'] }}</div>
            </div>
        </div>
        @endforeach

    </div>


    {{-- ══════════════════════════════════════════
         MAIN TABLE CARD
    ══════════════════════════════════════════ --}}
    <div class="bg-white rounded-2xl overflow-hidden"
         style="border: 1px solid rgba(15,61,92,0.07); box-shadow: 0 2px 16px rgba(15,61,92,0.06);">

        {{-- Table toolbar --}}
        <div class="px-5 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-4"
             style="border-bottom: 1px solid #F3F4F6;">
            <div class="flex items-center gap-3 shrink-0">
                <h2 class="text-base font-bold" style="color: var(--color-tei-blue);">All Users</h2>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-bold"
                      style="background: rgba(231,103,39,0.1); color: var(--color-tei-orange);">
                    {{ count($this->filteredUsers) }}
                </span>
            </div>

            <div class="flex flex-wrap items-center gap-2.5">

                {{-- Search --}}
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4" fill="none" stroke="#9CA3AF" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input wire:model.live.debounce.300ms="search"
                           type="search"
                           placeholder="Search name or email…"
                           class="pl-9 pr-4 py-2 text-sm rounded-xl border outline-none transition-all duration-200 w-52"
                           style="border-color: #E5E7EB; background: #FAFAFA; color: #111827;"
                           onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                           onblur="this.style.borderColor='#E5E7EB'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
                </div>

                {{-- Role filter --}}
                <select wire:model.live="roleFilter"
                        class="py-2 pl-3 pr-8 text-sm rounded-xl border outline-none cursor-pointer transition-all duration-200"
                        style="border-color: #E5E7EB; background: #FAFAFA; color: #374151;"
                        onfocus="this.style.borderColor='#E76727'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                        onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'">
                    <option value="all">All Roles</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="customer">Customer</option>
                </select>

                {{-- Status filter --}}
                <select wire:model.live="statusFilter"
                        class="py-2 pl-3 pr-8 text-sm rounded-xl border outline-none cursor-pointer transition-all duration-200"
                        style="border-color: #E5E7EB; background: #FAFAFA; color: #374151;"
                        onfocus="this.style.borderColor='#E76727'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                        onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'">
                    <option value="all">All Status</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

                {{-- Add user button --}}
                <button wire:click="openAdd"
                        class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-sm font-bold text-white cursor-pointer transition-all duration-200 min-h-[36px]"
                        style="background-color: var(--color-tei-orange); box-shadow: 0 4px 12px rgba(231,103,39,0.3);"
                        onmouseover="this.style.backgroundColor='#C45218'; this.style.transform='translateY(-1px)'"
                        onmouseout="this.style.backgroundColor='var(--color-tei-orange)'; this.style.transform='translateY(0)'">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add User
                </button>

            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr style="background-color: #FAFAFA; border-bottom: 1px solid #F3F4F6;">
                        <th class="px-5 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: #9CA3AF;">User</th>
                        <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: #9CA3AF;">Role</th>
                        <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider" style="color: #9CA3AF;">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider hidden md:table-cell" style="color: #9CA3AF;">Last Login</th>
                        <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wider hidden lg:table-cell" style="color: #9CA3AF;">Joined</th>
                        <th class="px-4 py-3 text-right text-xs font-bold uppercase tracking-wider" style="color: #9CA3AF;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($this->filteredUsers as $user)
                    @php
                        $initials     = collect(explode(' ', $user['name']))->map(fn($p) => strtoupper($p[0]))->take(2)->join('');
                        $avatarColors = ['admin'=>['bg'=>'rgba(15,61,92,0.12)','text'=>'#0F3D5C'],'staff'=>['bg'=>'rgba(124,58,237,0.12)','text'=>'#7C3AED'],'customer'=>['bg'=>'rgba(5,150,105,0.12)','text'=>'#059669']];
                        $av           = $avatarColors[$user['role']] ?? ['bg'=>'rgba(107,114,128,0.12)','text'=>'#6B7280'];
                        $roleBadge    = ['admin'=>['bg'=>'rgba(15,61,92,0.1)','text'=>'#0F3D5C','label'=>'Admin'],'staff'=>['bg'=>'rgba(124,58,237,0.1)','text'=>'#7C3AED','label'=>'Staff'],'customer'=>['bg'=>'rgba(5,150,105,0.1)','text'=>'#059669','label'=>'Customer']];
                        $rb           = $roleBadge[$user['role']] ?? ['bg'=>'rgba(107,114,128,0.1)','text'=>'#6B7280','label'=>ucfirst($user['role'])];
                    @endphp
                    <tr style="border-bottom: 1px solid #F9FAFB; transition: background-color 0.15s ease;"
                        onmouseover="this.style.backgroundColor='#FFFCFB'"
                        onmouseout="this.style.backgroundColor='transparent'">

                        <td class="px-5 py-3.5">
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-xl flex items-center justify-center text-sm font-bold shrink-0"
                                     style="background-color: {{ $av['bg'] }}; color: {{ $av['text'] }};">
                                    {{ $initials }}
                                </div>
                                <div class="min-w-0">
                                    <div class="font-semibold truncate" style="color: #111827;">{{ $user['name'] }}</div>
                                    <div class="text-xs truncate" style="color: #9CA3AF;">{{ $user['email'] }}</div>
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-3.5">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold"
                                  style="background-color: {{ $rb['bg'] }}; color: {{ $rb['text'] }};">
                                {{ $rb['label'] }}
                            </span>
                        </td>

                        <td class="px-4 py-3.5">
                            @if ($user['status'] === 'active')
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold" style="color: #059669;">
                                <span class="w-1.5 h-1.5 rounded-full" style="background-color: #059669;"></span>
                                Active
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 text-xs font-semibold" style="color: #9CA3AF;">
                                <span class="w-1.5 h-1.5 rounded-full" style="background-color: #D1D5DB;"></span>
                                Inactive
                            </span>
                            @endif
                        </td>

                        <td class="px-4 py-3.5 hidden md:table-cell text-xs" style="color: #6B7280;">
                            {{ $user['last_login'] }}
                        </td>

                        <td class="px-4 py-3.5 hidden lg:table-cell text-xs" style="color: #6B7280;">
                            {{ $user['joined'] }}
                        </td>

                        <td class="px-4 py-3.5">
                            <div class="flex items-center justify-end gap-1">

                                <button wire:click="toggleStatus({{ $user['id'] }})"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center cursor-pointer transition-all duration-150 min-h-[32px] min-w-[32px]"
                                        style="color: #9CA3AF;"
                                        onmouseover="this.style.backgroundColor='rgba(5,150,105,0.1)'; this.style.color='#059669'"
                                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#9CA3AF'"
                                        aria-label="{{ $user['status'] === 'active' ? 'Deactivate user' : 'Activate user' }}"
                                        title="{{ $user['status'] === 'active' ? 'Deactivate' : 'Activate' }}">
                                    @if ($user['status'] === 'active')
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    @else
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    @endif
                                </button>

                                <button class="w-8 h-8 rounded-lg flex items-center justify-center cursor-pointer transition-all duration-150 min-h-[32px] min-w-[32px]"
                                        style="color: #9CA3AF;"
                                        onmouseover="this.style.backgroundColor='rgba(15,61,92,0.08)'; this.style.color='#0F3D5C'"
                                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#9CA3AF'"
                                        aria-label="Edit user {{ $user['name'] }}"
                                        title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </button>

                                <button wire:click="confirmDelete({{ $user['id'] }})"
                                        class="w-8 h-8 rounded-lg flex items-center justify-center cursor-pointer transition-all duration-150 min-h-[32px] min-w-[32px]"
                                        style="color: #9CA3AF;"
                                        onmouseover="this.style.backgroundColor='rgba(239,68,68,0.08)'; this.style.color='#EF4444'"
                                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#9CA3AF'"
                                        aria-label="Delete user {{ $user['name'] }}"
                                        title="Delete">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-20 text-center">
                            <div class="flex flex-col items-center gap-3">
                                <div class="w-14 h-14 rounded-2xl flex items-center justify-center"
                                     style="background: rgba(231,103,39,0.08);">
                                    <svg class="w-7 h-7" fill="none" stroke="#E76727" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                                <p class="font-semibold text-sm" style="color: #374151;">No users found</p>
                                <p class="text-xs" style="color: #9CA3AF;">Try adjusting your search or filters</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-5 py-3 flex items-center justify-between"
             style="border-top: 1px solid #F3F4F6;">
            <p class="text-xs" style="color: #9CA3AF;">
                Showing <span class="font-semibold" style="color: #374151;">{{ count($this->filteredUsers) }}</span>
                of <span class="font-semibold" style="color: #374151;">{{ count($allUsers) }}</span> users
            </p>
            <p class="text-xs" style="color: #9CA3AF;">TEI User Registry</p>
        </div>

    </div>


    {{-- ══════════════════════════════════════════
         ADD USER DRAWER
    ══════════════════════════════════════════ --}}
    <div x-show="$wire.showModal" x-cloak style="z-index: 50;">

        <div class="fixed inset-0 bg-black/40 z-40"
             x-show="$wire.showModal"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="$wire.closeModal()">
        </div>

        <div class="fixed top-0 right-0 bottom-0 z-50 w-full max-w-md flex flex-col"
             style="background: white; box-shadow: -8px 0 40px rgba(15,61,92,0.12);"
             x-show="$wire.showModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="translate-x-full opacity-0"
             x-transition:enter-end="translate-x-0 opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="translate-x-0 opacity-100"
             x-transition:leave-end="translate-x-full opacity-0"
             role="dialog" aria-modal="true" aria-labelledby="drawer-title">

            <div class="flex items-center justify-between px-6 py-5 shrink-0"
                 style="border-bottom: 1px solid #F3F4F6;">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center"
                         style="background: rgba(231,103,39,0.1);">
                        <svg class="w-5 h-5" fill="none" stroke="#E76727" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                    </div>
                    <div>
                        <h2 id="drawer-title" class="text-base font-bold" style="color: var(--color-tei-blue);">
                            Add New User
                        </h2>
                        <p class="text-xs" style="color: #9CA3AF;">Fill in the details below</p>
                    </div>
                </div>
                <button wire:click="closeModal"
                        class="w-8 h-8 rounded-lg flex items-center justify-center cursor-pointer transition-colors duration-150"
                        style="color: #9CA3AF;"
                        onmouseover="this.style.backgroundColor='#F3F4F6'; this.style.color='#374151'"
                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#9CA3AF'"
                        aria-label="Close drawer">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <form wire:submit.prevent="saveUser" class="flex-1 overflow-y-auto px-6 py-6 space-y-5" novalidate>

                <div>
                    <label for="formName" class="block text-sm font-semibold mb-1.5"
                           style="color: var(--color-tei-blue);">Full Name <span style="color:#EF4444;">*</span></label>
                    <input wire:model="formName" id="formName" type="text" placeholder="e.g. Maria Santos"
                           class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
                           style="border-color: {{ $errors->has('formName') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
                           onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                           onblur="this.style.borderColor='{{ $errors->has('formName') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
                    @error('formName')
                    <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #EF4444;">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div>
                    <label for="formEmail" class="block text-sm font-semibold mb-1.5"
                           style="color: var(--color-tei-blue);">Email Address <span style="color:#EF4444;">*</span></label>
                    <input wire:model="formEmail" id="formEmail" type="email" placeholder="name@tarlacelectric.com"
                           class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
                           style="border-color: {{ $errors->has('formEmail') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
                           onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                           onblur="this.style.borderColor='{{ $errors->has('formEmail') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
                    @error('formEmail')
                    <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #EF4444;">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="formRole" class="block text-sm font-semibold mb-1.5"
                               style="color: var(--color-tei-blue);">Role</label>
                        <select wire:model="formRole" id="formRole"
                                class="w-full px-4 py-3 rounded-xl border text-sm outline-none cursor-pointer transition-all duration-200"
                                style="border-color: #E5E7EB; background: #FAFAFA; color: #374151;"
                                onfocus="this.style.borderColor='#E76727'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                                onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'">
                            <option value="admin">Admin</option>
                            <option value="staff">Staff</option>
                            <option value="customer">Customer</option>
                        </select>
                    </div>
                    <div>
                        <label for="formStatus" class="block text-sm font-semibold mb-1.5"
                               style="color: var(--color-tei-blue);">Status</label>
                        <select wire:model="formStatus" id="formStatus"
                                class="w-full px-4 py-3 rounded-xl border text-sm outline-none cursor-pointer transition-all duration-200"
                                style="border-color: #E5E7EB; background: #FAFAFA; color: #374151;"
                                onfocus="this.style.borderColor='#E76727'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                                onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div x-data="{ showPass: false }">
                    <label for="formPassword" class="block text-sm font-semibold mb-1.5"
                           style="color: var(--color-tei-blue);">Password <span style="color:#EF4444;">*</span></label>
                    <div class="relative">
                        <input wire:model="formPassword" id="formPassword"
                               :type="showPass ? 'text' : 'password'"
                               placeholder="Min. 8 characters"
                               class="w-full pl-4 pr-11 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
                               style="border-color: {{ $errors->has('formPassword') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
                               onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                               onblur="this.style.borderColor='{{ $errors->has('formPassword') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
                        <button type="button" @click="showPass = !showPass"
                                class="absolute inset-y-0 right-0 flex items-center pr-4 cursor-pointer transition-colors duration-150"
                                style="color: #9CA3AF;"
                                onmouseover="this.style.color='#E76727'"
                                onmouseout="this.style.color='#9CA3AF'"
                                aria-label="Toggle password">
                            <svg x-show="!showPass" class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            <svg x-show="showPass" x-cloak class="w-[18px] h-[18px]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                            </svg>
                        </button>
                    </div>
                    @error('formPassword')
                    <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #EF4444;">
                        <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $message }}
                    </p>
                    @enderror
                </div>

            </form>

            <div class="flex items-center justify-end gap-3 px-6 py-5 shrink-0"
                 style="border-top: 1px solid #F3F4F6;">
                <button wire:click="closeModal" type="button"
                        class="px-5 py-2.5 rounded-xl text-sm font-semibold cursor-pointer transition-all duration-150 min-h-[44px]"
                        style="background: #F3F4F6; color: #374151;"
                        onmouseover="this.style.backgroundColor='#E5E7EB'"
                        onmouseout="this.style.backgroundColor='#F3F4F6'">
                    Cancel
                </button>
                <button wire:click="saveUser" wire:loading.attr="disabled" type="button"
                        class="px-5 py-2.5 rounded-xl text-sm font-bold text-white cursor-pointer transition-all duration-150 min-h-[44px]"
                        style="background-color: var(--color-tei-orange); box-shadow: 0 4px 12px rgba(231,103,39,0.3);"
                        onmouseover="this.style.backgroundColor='#C45218'"
                        onmouseout="this.style.backgroundColor='var(--color-tei-orange)'"
                        wire:loading.class="opacity-70 cursor-not-allowed">
                    <span wire:loading.remove>Save User</span>
                    <span wire:loading class="flex items-center gap-2">
                        <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                        </svg>
                        Saving…
                    </span>
                </button>
            </div>

        </div>
    </div>


    {{-- ══════════════════════════════════════════
         DELETE CONFIRMATION MODAL
    ══════════════════════════════════════════ --}}
    <div x-show="$wire.deleteTarget !== null" x-cloak style="z-index: 50;">

        <div class="fixed inset-0 bg-black/50 z-40"
             x-show="$wire.deleteTarget !== null"
             x-transition:enter="transition ease-out duration-150"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-100"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             @click="$wire.cancelDelete()">
        </div>

        <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div class="w-full max-w-sm rounded-2xl p-6"
                 style="background: white; box-shadow: 0 20px 60px rgba(15,61,92,0.18);"
                 x-show="$wire.deleteTarget !== null"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="scale-95 opacity-0"
                 x-transition:enter-end="scale-100 opacity-100"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="scale-100 opacity-100"
                 x-transition:leave-end="scale-95 opacity-0"
                 role="alertdialog" aria-modal="true" aria-labelledby="delete-title">

                <div class="flex items-start gap-4">
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0"
                         style="background: rgba(239,68,68,0.1);">
                        <svg class="w-5 h-5" fill="none" stroke="#EF4444" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                        </svg>
                    </div>
                    <div>
                        <h3 id="delete-title" class="text-base font-bold mb-1" style="color: #111827;">Delete User?</h3>
                        <p class="text-sm leading-relaxed" style="color: #6B7280;">
                            This action cannot be undone. The user's account and all associated data will be permanently removed.
                        </p>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-3 mt-6">
                    <button wire:click="cancelDelete"
                            class="px-4 py-2.5 rounded-xl text-sm font-semibold cursor-pointer transition-colors duration-150 min-h-[44px]"
                            style="background: #F3F4F6; color: #374151;"
                            onmouseover="this.style.backgroundColor='#E5E7EB'"
                            onmouseout="this.style.backgroundColor='#F3F4F6'">
                        Cancel
                    </button>
                    <button wire:click="deleteUser" wire:loading.attr="disabled"
                            class="px-4 py-2.5 rounded-xl text-sm font-bold text-white cursor-pointer transition-all duration-150 min-h-[44px]"
                            style="background-color: #EF4444; box-shadow: 0 4px 12px rgba(239,68,68,0.3);"
                            onmouseover="this.style.backgroundColor='#DC2626'"
                            onmouseout="this.style.backgroundColor='#EF4444'"
                            wire:loading.class="opacity-70 cursor-not-allowed">
                        <span wire:loading.remove>Yes, Delete</span>
                        <span wire:loading class="flex items-center gap-1.5">
                            <svg class="animate-spin w-4 h-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                            </svg>
                            Deleting…
                        </span>
                    </button>
                </div>

            </div>
        </div>
    </div>

</div>

@script
<script>
    if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        gsap.timeline({ defaults: { ease: 'power2.out' } })
            .from('#page-header', { y: -16, opacity: 0, duration: 0.4 })
            .from('.stat-card',   { y: 20,  opacity: 0, duration: 0.35, stagger: 0.07 }, '-=0.2');
    }
</script>
@endscript
