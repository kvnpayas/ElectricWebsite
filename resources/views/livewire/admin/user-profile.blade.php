<div>

  {{-- ── Page header ──────────────────────────────────────── --}}
  <div class="admin-page-header mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
    <div>
      <h1 class="text-2xl font-black text-tei-blue-dark font-display">My Profile</h1>
      <p class="text-sm mt-0.5 text-tei-gray">Manage your account information and password.</p>
    </div>
  </div>

  <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- ── Left: Avatar + Login History ───────────────────── --}}
    <div>
      <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden">

        {{-- Avatar + details --}}
        <div class="px-6 pt-8 pb-6 flex flex-col items-center text-center border-b border-tei-blue/6">
          <div
            class="size-20 rounded-full bg-linear-to-br from-tei-orange to-tei-orange-dark flex items-center justify-center text-white text-3xl font-black font-display shadow-lg mb-4">
            {{ strtoupper(substr($user->name, 0, 1)) }}
          </div>
          <h2 class="text-base font-bold text-tei-blue-dark">{{ $user->name }}</h2>
          <p class="text-sm text-tei-gray mt-0.5">{{ $user->email }}</p>
          <span
            class="mt-3 inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-tei-blue/10 text-tei-blue">
            {{ ucfirst($user->role ?? 'Admin') }}
          </span>
        </div>

        {{-- Login history --}}
        <div class="px-5 py-4">
          <p class="text-[10px] font-bold uppercase tracking-widest text-tei-gray-light mb-3">Recent Logins</p>
          @if ($loginHistory->isNotEmpty())
            <ul class="space-y-3">
              @foreach ($loginHistory as $log)
                <li class="flex items-start justify-between gap-2">
                  <div class="min-w-0">
                    <p class="text-xs font-medium text-tei-blue-dark">
                      {{ $log->created_at?->format('M d, Y') }}
                    </p>
                    <p class="text-[11px] text-tei-gray-light">
                      {{ $log->created_at?->format('g:i A') }} · {{ $log->ip_address ?? '—' }}
                    </p>
                  </div>
                  <span
                    class="shrink-0 text-[10px] font-bold px-2 py-0.5 rounded-full bg-info/10 text-info">Login</span>
                </li>
              @endforeach
            </ul>
          @else
            <p class="text-xs text-tei-gray-light text-center py-4">No login history found.</p>
          @endif
        </div>

      </div>
    </div>

    {{-- ── Right: Forms ─────────────────────────────────────── --}}
    <div class="xl:col-span-2 space-y-6">

      {{-- Account Information --}}
      <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-tei-blue/6">
          <p class="text-sm font-bold text-tei-blue-dark">Account Information</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Update your display name and email address.</p>
        </div>
        <form wire:submit="saveProfile" class="px-5 py-5 space-y-4" novalidate>

          <div>
            <label class="block text-sm font-semibold mb-1.5 text-tei-blue">
              Full Name <span class="text-danger">*</span>
            </label>
            <input wire:model="name" type="text" placeholder="Your full name"
              class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
              style="border-color: {{ $errors->has('name') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
              onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
              onblur="this.style.borderColor='{{ $errors->has('name') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
            @error('name')
              <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $message }}
              </p>
            @enderror
          </div>

          <div>
            <label class="block text-sm font-semibold mb-1.5 text-tei-blue">
              Email Address <span class="text-danger">*</span>
            </label>
            <input wire:model="email" type="email" placeholder="you@tarlacelectric.com"
              class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
              style="border-color: {{ $errors->has('email') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
              onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
              onblur="this.style.borderColor='{{ $errors->has('email') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
            @error('email')
              <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $message }}
              </p>
            @enderror
          </div>

          <div class="flex justify-end pt-1">
            <x-button type="submit" loading="Saving…">Save Changes</x-button>
          </div>

        </form>
      </div>

      {{-- Change Password --}}
      <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-tei-blue/6">
          <p class="text-sm font-bold text-tei-blue-dark">Change Password</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Choose a strong password with at least 8 characters.</p>
        </div>
        <form wire:submit="changePassword" class="px-5 py-5 space-y-4" novalidate>

          <div>
            <label class="block text-sm font-semibold mb-1.5 text-tei-blue">
              Current Password <span class="text-danger">*</span>
            </label>
            <input wire:model="currentPassword" type="password" autocomplete="current-password"
              placeholder="••••••••"
              class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
              style="border-color: {{ $errors->has('currentPassword') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
              onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
              onblur="this.style.borderColor='{{ $errors->has('currentPassword') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
            @error('currentPassword')
              <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
                <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $message }}
              </p>
            @enderror
          </div>

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-semibold mb-1.5 text-tei-blue">
                New Password <span class="text-danger">*</span>
              </label>
              <input wire:model="newPassword" type="password" autocomplete="new-password" placeholder="••••••••"
                class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
                style="border-color: {{ $errors->has('newPassword') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
                onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                onblur="this.style.borderColor='{{ $errors->has('newPassword') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
              @error('newPassword')
                <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
                  <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ $message }}
                </p>
              @enderror
            </div>
            <div>
              <label class="block text-sm font-semibold mb-1.5 text-tei-blue">
                Confirm Password <span class="text-danger">*</span>
              </label>
              <input wire:model="newPasswordConfirmation" type="password" autocomplete="new-password"
                placeholder="••••••••"
                class="w-full px-4 py-3 rounded-xl border text-sm outline-none transition-all duration-200"
                style="border-color: {{ $errors->has('newPasswordConfirmation') ? '#EF4444' : '#E5E7EB' }}; background: #FAFAFA; color: #111827;"
                onfocus="this.style.borderColor='#E76727'; this.style.backgroundColor='white'; this.style.boxShadow='0 0 0 3px rgba(231,103,39,0.10)'"
                onblur="this.style.borderColor='{{ $errors->has('newPasswordConfirmation') ? '#EF4444' : '#E5E7EB' }}'; this.style.backgroundColor='#FAFAFA'; this.style.boxShadow='none'">
              @error('newPasswordConfirmation')
                <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
                  <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ $message }}
                </p>
              @enderror
            </div>
          </div>

          <div class="flex justify-end pt-1">
            <x-button type="submit" loading="Updating…">Update Password</x-button>
          </div>

        </form>
      </div>

    </div>

  </div>

</div>
