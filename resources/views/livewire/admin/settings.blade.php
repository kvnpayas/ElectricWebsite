<div x-data="{ tab: 'contact' }">

  <x-admin.partials.page-header
      title="Settings"
      subtitle="Manage contact information and site-wide notices." />


  {{-- ── Tabs ─────────────────────────────────────────────── --}}
  <div class="flex gap-1 mb-6 bg-gray-100 p-1 rounded-xl w-fit">
    <button @click="tab = 'contact'"
            :class="tab === 'contact' ? 'bg-white shadow-sm text-tei-blue font-bold' : 'text-tei-gray hover:text-tei-blue'"
            class="px-5 py-2 rounded-lg text-sm transition-all duration-200 cursor-pointer">
      Contact Info
    </button>
    <button @click="tab = 'notice'"
            :class="tab === 'notice' ? 'bg-white shadow-sm text-tei-blue font-bold' : 'text-tei-gray hover:text-tei-blue'"
            class="px-5 py-2 rounded-lg text-sm transition-all duration-200 cursor-pointer">
      Site Notice
    </button>
    <button @click="tab = 'site'"
            :class="tab === 'site' ? 'bg-white shadow-sm text-tei-blue font-bold' : 'text-tei-gray hover:text-tei-blue'"
            class="px-5 py-2 rounded-lg text-sm transition-all duration-200 cursor-pointer">
      Site Status
    </button>
    <button @click="tab = 'theme'"
            :class="tab === 'theme' ? 'bg-white shadow-sm text-tei-blue font-bold' : 'text-tei-gray hover:text-tei-blue'"
            class="px-5 py-2 rounded-lg text-sm transition-all duration-200 cursor-pointer">
      Theme
    </button>
  </div>


  {{-- ══ CONTACT INFO TAB ══════════════════════════════════════ --}}
  <div x-show="tab === 'contact'" x-cloak>
    <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

      {{-- ── Address ──────────────────────────────────────── --}}
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-gray-100">
          <p class="text-sm font-bold text-tei-blue">Office Address</p>
        </div>
        <div class="p-5 space-y-4">
          <textarea wire:model="address" rows="3"
                    placeholder="e.g. Mabini st., Brgy. Mabini, Tarlac City, Tarlac"
                    class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                           placeholder:text-tei-gray-light resize-none outline-none transition-all duration-200
                           focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15"></textarea>
          @error('address')
            <p class="text-xs text-danger">{{ $message }}</p>
          @enderror
          <div class="flex justify-end">
            <x-button variant="secondary" wire:click="saveAddress" loading="Saving…">Save Address</x-button>
          </div>
        </div>
      </div>

      {{-- ── Phone Numbers ────────────────────────────────── --}}
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
          <p class="text-sm font-bold text-tei-blue">Phone Numbers</p>
          <x-button variant="secondary" wire:click="openAdd('phone')" icon="M12 4v16m8-8H4">Add Number</x-button>
        </div>
        <div class="divide-y divide-gray-50">
          @forelse ($this->phones as $phone)
            <div class="flex items-center gap-3 px-5 py-3.5">
              {{-- Type icon --}}
              <div class="size-8 rounded-lg flex items-center justify-center shrink-0
                          {{ $phone->type === 'cellphone' ? 'bg-tei-blue/8' : 'bg-gray-100' }}">
                @if ($phone->type === 'cellphone')
                  <svg class="size-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                      d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                  </svg>
                @else
                  <svg class="size-4 text-tei-gray" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                @endif
              </div>

              {{-- Info --}}
              <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 flex-wrap">
                  <span class="text-sm font-semibold text-tei-blue-dark">{{ $phone->number }}</span>
                  @if ($phone->is_primary)
                    <span class="text-[10px] font-bold px-1.5 py-0.5 rounded-full bg-tei-orange/10 text-tei-orange">Primary</span>
                  @endif
                </div>
                <div class="flex items-center gap-2 mt-0.5">
                  <span class="text-xs text-tei-gray-light capitalize">{{ $phone->type }}</span>
                  @if ($phone->label)
                    <span class="text-[10px] text-tei-gray-light">· {{ $phone->label }}</span>
                  @endif
                </div>
              </div>

              {{-- Actions --}}
              <div class="flex items-center gap-1 shrink-0">
                @if (!$phone->is_primary)
                  <button wire:click="setPrimary({{ $phone->id }})" title="Set as primary"
                          class="size-7 rounded-lg flex items-center justify-center text-tei-gray-light
                                 hover:bg-tei-orange/8 hover:text-tei-orange transition-colors cursor-pointer">
                    <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                    </svg>
                  </button>
                @endif
                <x-button-icon wire:click="openEdit('phone', {{ $phone->id }})" title="Edit"
                    icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete('phone', {{ $phone->id }})" title="Delete" variant="danger"
                    icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </div>
            </div>
          @empty
            <div class="px-5 py-8 text-center">
              <p class="text-xs text-tei-gray-light">No phone numbers yet.</p>
            </div>
          @endforelse
        </div>
      </div>

      {{-- ── Email Addresses ──────────────────────────────── --}}
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
          <p class="text-sm font-bold text-tei-blue">Email Addresses</p>
          <x-button variant="secondary" wire:click="openAdd('email')" icon="M12 4v16m8-8H4">Add Email</x-button>
        </div>
        <div class="divide-y divide-gray-50">
          @forelse ($this->emails as $email)
            <div class="flex items-center gap-3 px-5 py-3.5">
              <div class="size-8 rounded-lg bg-tei-blue/8 flex items-center justify-center shrink-0">
                <svg class="size-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-tei-blue-dark truncate">{{ $email->address }}</p>
                @if ($email->label)
                  <p class="text-xs text-tei-gray-light mt-0.5">{{ $email->label }}</p>
                @endif
              </div>
              <div class="flex items-center gap-1 shrink-0">
                <x-button-icon wire:click="openEdit('email', {{ $email->id }})" title="Edit"
                    icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete('email', {{ $email->id }})" title="Delete" variant="danger"
                    icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </div>
            </div>
          @empty
            <div class="px-5 py-8 text-center">
              <p class="text-xs text-tei-gray-light">No email addresses yet.</p>
            </div>
          @endforelse
        </div>
      </div>

      {{-- ── Social Links ──────────────────────────────────── --}}
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
        <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
          <p class="text-sm font-bold text-tei-blue">Social Media Links</p>
          <x-button variant="secondary" wire:click="openAdd('social')" icon="M12 4v16m8-8H4">Add Link</x-button>
        </div>
        <div class="divide-y divide-gray-50">
          @forelse ($this->socials as $social)
            <div class="flex items-center gap-3 px-5 py-3.5">
              <div class="size-8 rounded-lg bg-tei-blue/8 flex items-center justify-center shrink-0">
                <svg class="size-4 text-tei-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75"
                    d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
              </div>
              <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-tei-blue-dark">{{ $social->platform }}</p>
                <p class="text-xs text-tei-gray-light truncate mt-0.5">{{ $social->url }}</p>
              </div>
              <div class="flex items-center gap-1 shrink-0">
                <x-button-icon wire:click="openEdit('social', {{ $social->id }})" title="Edit"
                    icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete('social', {{ $social->id }})" title="Delete" variant="danger"
                    icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </div>
            </div>
          @empty
            <div class="px-5 py-8 text-center">
              <p class="text-xs text-tei-gray-light">No social links yet.</p>
            </div>
          @endforelse
        </div>
      </div>

    </div>
  </div>


  {{-- ══ SITE NOTICE TAB ════════════════════════════════════════ --}}
  <div x-show="tab === 'notice'" x-cloak>
    <div class="max-w-2xl">
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100">
          <p class="text-sm font-bold text-tei-blue">Global Site Notice</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Appears as a banner across all public pages when enabled.</p>
        </div>

        <div class="p-5 space-y-5">

          {{-- Enable toggle --}}
          <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 bg-gray-50">
            <div>
              <p class="text-sm font-semibold text-tei-blue">Enable Notice</p>
              <p class="text-xs text-tei-gray-light mt-0.5">Show this banner on the public site</p>
            </div>
            <button wire:click="$toggle('noticeEnabled')" type="button"
                    class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent
                           transition-colors duration-200 ease-in-out focus:outline-none
                           {{ $noticeEnabled ? 'bg-tei-orange' : 'bg-gray-200' }}">
              <span class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform
                           transition duration-200 ease-in-out
                           {{ $noticeEnabled ? 'translate-x-5' : 'translate-x-0' }}"></span>
            </button>
          </div>

          {{-- Message --}}
          <div>
            <label class="block text-sm font-semibold text-tei-blue mb-1.5">
              Message <span class="text-danger">*</span>
            </label>
            <textarea wire:model="noticeMessage" rows="2"
                      placeholder="e.g. Our office will be closed on July 4 due to a public holiday."
                      class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                             placeholder:text-tei-gray-light resize-none outline-none transition-all duration-200
                             focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15"></textarea>
            @error('noticeMessage')
              <p class="mt-1 text-xs text-danger">{{ $message }}</p>
            @enderror
          </div>

          {{-- Type --}}
          <div>
            <label class="block text-sm font-semibold text-tei-blue mb-2">Type</label>
            <div class="grid grid-cols-3 gap-3">
              @foreach (['info' => ['bg-tei-blue/8 border-tei-blue/20 text-tei-blue', 'ℹ Info'], 'warning' => ['bg-warning/8 border-warning/20 text-warning', '⚠ Warning'], 'alert' => ['bg-danger/8 border-danger/20 text-danger', '⚡ Alert']] as $val => $meta)
                <button type="button" wire:click="$set('noticeType', '{{ $val }}')"
                        class="px-4 py-3 rounded-xl border-2 text-sm font-bold transition-all duration-150 cursor-pointer
                               {{ $noticeType === $val ? $meta[0] . ' border-current' : 'border-gray-200 text-tei-gray hover:border-gray-300' }}">
                  {{ $meta[1] }}
                </button>
              @endforeach
            </div>
          </div>

          {{-- Expires at --}}
          <div>
            <label class="block text-sm font-semibold text-tei-blue mb-1.5">
              Auto-hide After
              <span class="ml-1 text-xs font-normal text-tei-gray-light">leave blank to keep showing until manually disabled</span>
            </label>
            <input wire:model="noticeExpiresAt" type="datetime-local"
                   class="w-full px-3 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                          outline-none transition-all duration-200
                          focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
            @error('noticeExpiresAt')
              <p class="mt-1 text-xs text-danger">{{ $message }}</p>
            @enderror
          </div>

          {{-- Dismissible --}}
          <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 bg-gray-50">
            <div>
              <p class="text-sm font-semibold text-tei-blue">Dismissible</p>
              <p class="text-xs text-tei-gray-light mt-0.5">Show a close button so visitors can hide it</p>
            </div>
            <button wire:click="$toggle('noticeDismissible')" type="button"
                    class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent
                           transition-colors duration-200 ease-in-out focus:outline-none
                           {{ $noticeDismissible ? 'bg-tei-orange' : 'bg-gray-200' }}">
              <span class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform
                           transition duration-200 ease-in-out
                           {{ $noticeDismissible ? 'translate-x-5' : 'translate-x-0' }}"></span>
            </button>
          </div>

          {{-- Preview --}}
          @if ($noticeMessage)
            <div>
              <p class="text-xs font-semibold text-tei-gray-light uppercase tracking-wider mb-2">Preview</p>
              <div class="rounded-xl px-4 py-3 flex items-center gap-3
                {{ $noticeType === 'info'    ? 'bg-tei-blue/8 border border-tei-blue/15' : '' }}
                {{ $noticeType === 'warning' ? 'bg-warning/8 border border-warning/15'   : '' }}
                {{ $noticeType === 'alert'   ? 'bg-danger/8 border border-danger/15'     : '' }}">
                <span class="text-sm
                  {{ $noticeType === 'info'    ? 'text-tei-blue'  : '' }}
                  {{ $noticeType === 'warning' ? 'text-warning'   : '' }}
                  {{ $noticeType === 'alert'   ? 'text-danger'    : '' }}">
                  {{ $noticeMessage }}
                </span>
                @if ($noticeDismissible)
                  <span class="ml-auto text-xs font-bold px-2 py-0.5 rounded-full bg-white/60 text-tei-gray-light shrink-0">✕</span>
                @endif
              </div>
            </div>
          @endif

          <div class="flex justify-end pt-1">
            <x-button variant="secondary" wire:click="saveNotice" loading="Saving…">Save Notice Settings</x-button>
          </div>

        </div>
      </div>
    </div>
  </div>


  {{-- ══ SITE STATUS TAB ══════════════════════════════════════ --}}
  <div x-show="tab === 'site'" x-cloak>
    <div class="max-w-2xl">
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100">
          <p class="text-sm font-bold text-tei-blue">Website Availability</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Control whether the public website is accessible to visitors.</p>
        </div>

        <div class="p-5 space-y-5">

          {{-- Warning banner when disabled --}}
          @if (!$siteEnabled)
            <div class="flex items-start gap-3 px-4 py-3.5 rounded-xl bg-danger/8 border border-danger/15">
              <svg class="w-4.5 h-4.5 text-danger shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
              </svg>
              <p class="text-sm text-danger font-medium">
                The website is currently <strong>offline</strong>. Visitors see a maintenance page. Only admins can access the site.
              </p>
            </div>
          @endif

          {{-- Toggle --}}
          <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 bg-gray-50">
            <div>
              <p class="text-sm font-semibold text-tei-blue">Enable Website</p>
              <p class="text-xs text-tei-gray-light mt-0.5">
                When disabled, visitors see a maintenance page instead of the site
              </p>
            </div>
            <button wire:click="$toggle('siteEnabled')" type="button"
                    class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent
                           transition-colors duration-200 ease-in-out focus:outline-none
                           {{ $siteEnabled ? 'bg-tei-orange' : 'bg-gray-200' }}">
              <span class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform
                           transition duration-200 ease-in-out
                           {{ $siteEnabled ? 'translate-x-5' : 'translate-x-0' }}"></span>
            </button>
          </div>

          {{-- Status indicator --}}
          <div class="flex items-center gap-2.5 px-4 py-3 rounded-xl
            {{ $siteEnabled ? 'bg-success/8 border border-success/15' : 'bg-danger/8 border border-danger/15' }}">
            <span class="w-2 h-2 rounded-full shrink-0
              {{ $siteEnabled ? 'bg-success animate-pulse' : 'bg-danger' }}"></span>
            <span class="text-sm font-semibold
              {{ $siteEnabled ? 'text-success' : 'text-danger' }}">
              Website is currently {{ $siteEnabled ? 'Online' : 'Offline (Maintenance Mode)' }}
            </span>
          </div>

          {{-- Admin note --}}
          <div class="flex items-start gap-2.5 px-4 py-3 rounded-xl bg-tei-blue/6 border border-tei-blue/12">
            <svg class="w-4 h-4 text-tei-blue shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="text-xs text-tei-blue leading-relaxed">
              Logged-in admins always see the website regardless of this setting.
              To verify maintenance mode, open an <strong>incognito / private window</strong> while logged out.
            </p>
          </div>

          <div class="flex justify-end pt-1">
            <x-button variant="{{ $siteEnabled ? 'secondary' : 'danger' }}" wire:click="saveSiteStatus" loading="Saving…">
              Save Settings
            </x-button>
          </div>

        </div>
      </div>
    </div>
  </div>


  {{-- ══ THEME TAB ═════════════════════════════════════════════ --}}
  <div x-show="tab === 'theme'" x-cloak>
    <div class="max-w-2xl">
      <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">

        <div class="px-5 py-4 border-b border-gray-100">
          <p class="text-sm font-bold text-tei-blue">Header Theme</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Choose the background tone for the nav bar, hero, and footer across the public site.</p>
        </div>

        <div class="p-5">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">

            @foreach (['primary' => 'Primary', 'light' => 'Light'] as $preset => $label)
              @php
                $vars = \App\Models\Setting::THEME_PRESETS[$preset];
              @endphp
              <button type="button" wire:click="saveTheme('{{ $preset }}')"
                      class="text-left rounded-xl border-2 overflow-hidden transition-all duration-150 cursor-pointer
                             {{ $themePreset === $preset ? 'border-tei-orange' : 'border-gray-200 hover:border-gray-300' }}">
                <div class="h-16"
                     style="background: linear-gradient(135deg, {{ $vars['--color-brand-hero-start'] }} 0%, {{ $vars['--color-brand-hero-mid'] }} 100%);"></div>
                <div class="px-4 py-3 flex items-center justify-between">
                  <span class="text-sm font-semibold text-tei-blue">{{ $label }}</span>
                  @if ($themePreset === $preset)
                    <span class="inline-flex items-center gap-1 text-xs font-bold text-tei-orange">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                      </svg>
                      Active
                    </span>
                  @endif
                </div>
              </button>
            @endforeach

          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- ── ADD / EDIT DRAWER ────────────────────────────────── --}}
  <x-drawer width="max-w-md">

    <x-drawer.header
        :title="($formMode === 'add' ? 'Add ' : 'Edit ') . match($formType) { 'phone' => 'Phone Number', 'email' => 'Email Address', 'social' => 'Social Link', default => '' }"
        subtitle=""
        icon="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z"
        close="closeModal" />

    <div class="flex-1 overflow-y-auto px-6 py-6 space-y-5">

      {{-- Phone fields --}}
      @if ($formType === 'phone')
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">
            Phone Number <span class="text-danger">*</span>
          </label>
          <input wire:model="formNumber" type="text" placeholder="e.g. (045) 606-1834"
                 class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        placeholder:text-tei-gray-light outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          @error('formNumber')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-2">Type <span class="text-danger">*</span></label>
          <div class="flex gap-4">
            @foreach (['landline' => 'Landline', 'cellphone' => 'Cellphone'] as $val => $lbl)
              <label class="flex items-center gap-2 cursor-pointer">
                <input wire:model="formPhoneType" type="radio" value="{{ $val }}" class="accent-tei-orange">
                <span class="text-sm font-medium text-tei-gray">{{ $lbl }}</span>
              </label>
            @endforeach
          </div>
        </div>

        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Label</label>
          <input wire:model="formLabel" type="text" placeholder="e.g. Billing, General Inquiries"
                 class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        placeholder:text-tei-gray-light outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        </div>

        <div class="flex items-center justify-between p-4 rounded-xl border border-gray-200 bg-gray-50">
          <div>
            <p class="text-sm font-semibold text-tei-blue">Set as Primary</p>
            <p class="text-xs text-tei-gray-light mt-0.5">Displayed as the main contact number</p>
          </div>
          <button wire:click="$toggle('formIsPrimary')" type="button"
                  class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent
                         transition-colors duration-200 ease-in-out
                         {{ $formIsPrimary ? 'bg-tei-orange' : 'bg-gray-200' }}">
            <span class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform
                         transition duration-200 ease-in-out
                         {{ $formIsPrimary ? 'translate-x-5' : 'translate-x-0' }}"></span>
          </button>
        </div>
      @endif

      {{-- Email fields --}}
      @if ($formType === 'email')
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">
            Email Address <span class="text-danger">*</span>
          </label>
          <input wire:model="formAddress" type="email" placeholder="e.g. info@tei.com.ph"
                 class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        placeholder:text-tei-gray-light outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          @error('formAddress')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Label</label>
          <input wire:model="formEmailLabel" type="text" placeholder="e.g. General Inquiries, Billing"
                 class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        placeholder:text-tei-gray-light outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        </div>
      @endif

      {{-- Social fields --}}
      @if ($formType === 'social')
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">
            Platform <span class="text-danger">*</span>
          </label>
          <select wire:model="formPlatform"
                  class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                         outline-none transition-all duration-200 cursor-pointer
                         focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
            @foreach (['Facebook', 'X', 'Instagram', 'YouTube', 'LinkedIn', 'TikTok'] as $p)
              <option value="{{ $p }}">{{ $p }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">
            URL <span class="text-danger">*</span>
          </label>
          <input wire:model="formUrl" type="url" placeholder="https://facebook.com/tei.ph"
                 class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        placeholder:text-tei-gray-light outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          @error('formUrl')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>
      @endif

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeModal">Cancel</x-button>
      <x-button variant="secondary" wire:click="save" loading="Saving…">
        {{ $formMode === 'add' ? 'Add' : 'Save Changes' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>


  {{-- ── DELETE CONFIRMATION ──────────────────────────────── --}}
  <x-confirm-modal
      title="Remove this entry?"
      message="This will be permanently removed and cannot be undone.">
    <x-button variant="ghost" wire:click="cancelDelete">Cancel</x-button>
    <x-button variant="danger" loading="Removing…" wire:click="delete">Yes, Remove</x-button>
  </x-confirm-modal>

</div>
