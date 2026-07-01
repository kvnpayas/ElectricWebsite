<div>

  <x-admin.partials.page-header id="page-header" title="User Maintenance"
    subtitle="Manage system accounts, roles, and access permissions.">
    <div
      class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-medium shrink-0 bg-success/15 text-success border border-success/20">
      <span class="w-1.5 h-1.5 rounded-full bg-success"></span>
      System Online
    </div>
  </x-admin.partials.page-header>


  {{-- ══════════════════════════════════════════
         STAT CARDS
    ══════════════════════════════════════════ --}}
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">

    @php
      $statCards = [
          [
              'label' => 'Total Users',
              'value' => $this->stats['total'],
              'icon' =>
                  'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z',
              'iconColor' => 'var(--color-tei-blue)',
              'iconBg' => 'tei-blue',
              'trend' => 'Currently user count',
          ],
          [
              'label' => 'Active',
              'value' => $this->stats['active'],
              'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
              'iconColor' => 'var(--color-success)',
              'iconBg' => 'success',
              'trend' => 'Currently online',
          ],
          [
              'label' => 'Administrators',
              'value' => $this->stats['admins'],
              'icon' =>
                  'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z',
              'iconColor' => 'var(--color-tei-orange)',
              'iconBg' => 'tei-orange',
              'trend' => 'Full access',
          ],
          [
              'label' => 'Editor',
              'value' => $this->stats['editor'],
              'icon' =>
                  'M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zM19.5 7.125L16.875 4.5M18 14.25v4.125A1.125 1.125 0 0116.875 19.5H5.625A1.125 1.125 0 014.5 18.375V7.125A1.125 1.125 0 015.625 6H9.75',
              'iconColor' => 'var(--color-info)',
              'iconBg' => 'info',
              'trend' => 'Limited access',
          ],
      ];
    @endphp


    @foreach ($statCards as $card)
      <x-stat-card color="{{ $card['iconBg'] }}" icon="{{ $card['icon'] }}" value="{{ $card['value'] }}"
        label="{{ $card['label'] }}" trend="{{ $card['trend'] }}" />
    @endforeach

  </div>


  {{-- ══════════════════════════════════════════
         MAIN TABLE CARD
    ══════════════════════════════════════════ --}}

  <x-table-container title="All Users" :count="$this->stats['total']">

    <x-slot:toolbar>
      {{-- Search --}}
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4" fill="none" stroke="#9CA3AF" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input wire:model.live.debounce.300ms="search" type="search" placeholder="Search name or email…"
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
        <option value="administrator">Admin</option>
        <option value="editor">Editor</option>
      </select>

      {{-- Status filter --}}
      <select wire:model.live="statusFilter"
        class="py-2 pl-3 pr-8 text-sm rounded-xl border outline-none cursor-pointer transition-all duration-200"
        style="border-color: #E5E7EB; background: #FAFAFA; color: #374151;"
        onfocus="this.style.borderColor='#E76727'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
        onblur="this.style.borderColor='#E5E7EB'; this.style.boxShadow='none'">
        <option value="all">All Status</option>
        <option value="Active">Active</option>
        <option value="Inactive">Inactive</option>
      </select>

      {{-- Add user button --}}
      <x-button variant="secondary" wire:click="openAdd" icon="M12 4v16m8-8H4">Add User</x-button>

    </x-slot:toolbar>

    <x-table>
      <x-table.head>
        <x-table.th>User</x-table.th>
        <x-table.th>Role</x-table.th>
        <x-table.th>Status</x-table.th>
        <x-table.th hidden="md">Last Login</x-table.th>
        <x-table.th hidden="lg">Joined</x-table.th>
        <x-table.th :align="'right'">Actions</x-table.th>
      </x-table.head>
      <x-table.body>
        @forelse ($this->users as $user)
          @php
            $avatarColors = [
                'administrator' => ['bg' => 'bg-tei-blue/12', 'text' => 'text-tei-blue'],
                'editor' => ['bg' => 'bg-success/12', 'text' => 'text-success'],
            ];
            $av = $avatarColors[$user['role']] ?? ['bg' => 'bg-tei-neutral/12', 'text' => 'text-tei-neutral'];
            $roleBadge = [
                'administrator' => ['bg' => 'bg-tei-blue/12', 'text' => 'text-tei-blue'],
                'editor' => ['bg' => 'bg-success/12', 'text' => 'text-success'],
            ];
            $rb = $roleBadge[$user['role']] ?? ['bg' => 'bg-tei-neutral/12', 'text' => 'text-tei-neutral'];
          @endphp
          <tr style="border-bottom: 1px solid #F9FAFB; transition: background-color 0.15s ease;"
            onmouseover="this.style.backgroundColor='#FFFCFB'" onmouseout="this.style.backgroundColor='transparent'">

            <x-table.td>
              <div class="flex items-center gap-3">
                <div
                  class="w-9 h-9 rounded-xl flex items-center justify-center text-sm font-bold shrink-0 {{ $av['bg'] }} {{ $av['text'] }}">
                  {{ get_initials($user->name) }}
                </div>
                <div class="min-w-0">
                  <div class="font-semibold truncate" style="color: #111827;">{{ $user->name }}</div>
                  <div class="text-xs truncate" style="color: #9CA3AF;">{{ $user->email }}</div>
                </div>
              </div>
            </x-table.td>

            <x-table.td>
              <span
                class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-bold {{ $rb['bg'] }} {{ $rb['text'] }}">
                {{ $user->role ? ucfirst($user->role) : 'N/A' }}
              </span>
            </x-table.td>

            <x-table.td>
              @php
                $statusColor = [
                    'Active' => ['bg' => 'bg-success', 'text' => 'text-success'],
                    'Inactive' => ['bg' => 'bg-danger', 'text' => 'text-danger'],
                ];
                $sc = $statusColor[$user['status']] ?? ['bg' => 'bg-tei-neutral', 'text' => 'text-tei-neutral'];
              @endphp
              <span class="inline-flex items-center gap-1.5 text-xs font-semibold {{ $sc['text'] }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $sc['bg'] }}"></span>
                {{ $user->status }}
              </span>
            </x-table.td>

            <x-table.td hidden="md" class="text-xs text-tei-gray">
              @if ($user->last_login)
                {{ date('M j, Y g:i A', strtotime($user->last_login)) }}
              @else
                <span class="text-xs italic text-danger">Never logged in</span>
              @endif
            </x-table.td>

            <x-table.td hidden="lg" class="text-xs text-tei-gray">
              {{ date('M j, Y g:i A', strtotime($user->created_at)) }}
            </x-table.td>
            <x-table.td>
              <div class="flex items-center justify-end gap-1">
                @php
                  $toggle = [
                      'icon' =>
                          $user['status'] === 'Active'
                              ? 'M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z'
                              : 'M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
                      'color' => $user['status'] === 'Active' ? 'success' : 'danger',
                      'title' => $user['status'] === 'Active' ? 'Deactivate' : 'Activate',
                  ];
                @endphp
                <x-button-icon wire:click="toggleStatus({{ $user['id'] }})" :fillColor="true"
                  loading="toggleStatus({{ $user['id'] }})" variant="{{ $toggle['color'] }}"
                  title="{{ $toggle['title'] }}" icon="{{ $toggle['icon'] }}" />
                <x-button-icon wire:click="openEdit({{ $user['id'] }})" title="Edit"
                  icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete({{ $user['id'] }})" title="Delete" variant="danger"
                  icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </div>
            </x-table.td>
          </tr>
        @empty
          <tr>
            <x-table.td colspan="100" class="py-20 text-center">
              <div class="flex flex-col items-center gap-3">
                <div class="w-14 h-14 rounded-2xl flex items-center justify-center bg-tei-orange/10">
                  <svg class="w-7 h-7" fill="none" stroke="var(--color-tei-orange)" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                </div>
                <p class="font-semibold text-sm" style="color: #374151;">No users found</p>
                <p class="text-xs" style="color: #9CA3AF;">Try adjusting your search or filters</p>
              </div>
            </x-table.td>
          </tr>
        @endforelse
      </x-table.body>
    </x-table>
    <x-slot:pagination>
      {{ $this->users->links() }}
    </x-slot:pagination>
  </x-table-container>

  {{-- ══════════════════════════════════════════
         ADD/UPDATE USER DRAWER
    ══════════════════════════════════════════ --}}
  <x-drawer>

    <x-drawer.header title="{{ $formMode == 'add' ? 'Add New User' : 'Edit User' }}"
      subtitle="Fill in the details below"
      icon="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />

    <form wire:submit.prevent="saveUser" class="flex-1 overflow-y-auto px-6 py-6 space-y-5" novalidate>

      <div>
        <label for="formName" class="block text-sm font-semibold mb-1.5 text-tei-blue">Full
          Name <span class="text-danger">*</span></label>
        <input wire:model="formName" id="formName" type="text" placeholder="e.g. Maria Santos"
          class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
          style="border-color: {{ $errors->has('formName') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
          onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
          onblur="this.style.borderColor='{{ $errors->has('formName') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
        @error('formName')
          <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #EF4444;">
            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label for="formEmail" class="block text-sm font-semibold mb-1.5" style="color: var(--color-tei-blue);">Email
          Address <span style="color:#EF4444;">*</span></label>
        <input wire:model="formEmail" id="formEmail" type="email" placeholder="name@tarlacelectric.com"
          class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
          style="border-color: {{ $errors->has('formEmail') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
          onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
          onblur="this.style.borderColor='{{ $errors->has('formEmail') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
        @error('formEmail')
          <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #EF4444;">
            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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
            <option value="administrator">Administrator</option>
            <option value="editor">Editor</option>
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
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
          </select>
        </div>
      </div>

      <div x-data="{ showPass: false }"class="{{ $formMode == 'edit' ? 'hidden' : '' }}">
        <label for="formPassword" class="block text-sm font-semibold mb-1.5"
          style="color: var(--color-tei-blue);">Password <span style="color:#EF4444;">*</span></label>
        <div class="relative">
          <input wire:model="formPassword" id="formPassword" :type="showPass ? 'text' : 'password'"
            placeholder="Min. 8 characters"
            class="w-full pl-4 pr-11 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
            style="border-color: {{ $errors->has('formPassword') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
            onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
            onblur="this.style.borderColor='{{ $errors->has('formPassword') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
          <button type="button" @click="showPass = !showPass"
            class="absolute inset-y-0 right-0 flex items-center pr-4 cursor-pointer transition-colors duration-150"
            style="color: #9CA3AF;" onmouseover="this.style.color='#E76727'" onmouseout="this.style.color='#9CA3AF'"
            aria-label="Toggle password">
            <svg x-show="!showPass" class="w-[18px] h-[18px]" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            <svg x-show="showPass" x-cloak class="w-[18px] h-[18px]" fill="none" stroke="currentColor"
              viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
            </svg>
          </button>
        </div>
        @error('formPassword')
          <p class="mt-1.5 text-xs flex items-center gap-1" style="color: #EF4444;">
            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>



    </form>

    <x-drawer.footer>
      <x-button variant="ghost" size="lg" @click="$wire.closeModal()">Cancel</x-button>
      <x-button variant="secondary" size="lg" wire:click="{{ $formMode == 'add' ? 'saveUser' : 'updateUser' }}"
        loading="Saving…">
        {{ $formMode == 'add' ? 'Save User' : 'Update User' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>


  {{-- ══════════════════════════════════════════
         DELETE CONFIRMATION MODAL
    ══════════════════════════════════════════ --}}
  <x-confirm-modal title="Delete User?"
    message="This action cannot be undone. The user's account and all associated data will be permanently removed.">
    <x-button variant="ghost" wire:click="cancelDelete">Cancel</x-button>
    <x-button loading="Deleting…" variant="danger" wire:click="delete">Yes, Delete</x-button>
  </x-confirm-modal>

</div>
