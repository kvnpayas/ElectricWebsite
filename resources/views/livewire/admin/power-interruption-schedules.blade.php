<div>

  <x-admin.partials.page-header
      title="Power Interruption Schedules"
      subtitle="Manage scheduled, ongoing, and resolved power interruptions with affected barangays." />


  {{-- ─── Stat cards ──────────────────────────────────────── --}}
  <div class="grid grid-cols-4 gap-4 mb-6">

    <x-stat-card wire:click="setStatus('all')"
        color="tei-blue"
        icon="M13 10V3L4 14h7v7l9-11h-7z"
        :value="$this->counts['all']"
        label="All Schedules"
        class="cursor-pointer {{ $statusFilter === 'all' ? 'ring-2 ring-tei-blue/30' : '' }}" />

    <x-stat-card wire:click="setStatus('scheduled')"
        color="warning"
        icon="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
        :value="$this->counts['scheduled']"
        label="Scheduled"
        class="cursor-pointer {{ $statusFilter === 'scheduled' ? 'ring-2 ring-warning/30' : '' }}" />

    <x-stat-card wire:click="setStatus('ongoing')"
        color="danger"
        icon="M13 10V3L4 14h7v7l9-11h-7z"
        :value="$this->counts['ongoing']"
        label="Ongoing"
        class="cursor-pointer {{ $statusFilter === 'ongoing' ? 'ring-2 ring-danger/30' : '' }}" />

    <x-stat-card wire:click="setStatus('resolved')"
        color="success"
        icon="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
        :value="$this->counts['resolved']"
        label="Resolved"
        class="cursor-pointer {{ $statusFilter === 'resolved' ? 'ring-2 ring-success/30' : '' }}" />

  </div>


  {{-- ─── Table card ──────────────────────────────────────── --}}
  <x-table-container title="Power Interruption Schedules" :count="$this->schedules->count()">

    <x-slot:toolbar>

      {{-- Search --}}
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input wire:model.live.debounce.300ms="search" type="search" placeholder="Search schedules…"
          class="pl-9 pr-4 py-2 w-52 text-sm rounded-xl border border-gray-200 bg-gray-50 text-gray-900
                 outline-none transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
      </div>

      {{-- Status filter --}}
      <select wire:model.live="statusFilter"
        class="py-2 pl-3 pr-8 text-sm rounded-xl border border-gray-200 bg-gray-50 text-tei-gray
               outline-none cursor-pointer transition-all duration-200
               focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15">
        <option value="all">All Status</option>
        <option value="scheduled">Scheduled</option>
        <option value="ongoing">Ongoing</option>
        <option value="resolved">Resolved</option>
      </select>

      <x-button variant="secondary" wire:click="openAdd" icon="M12 4v16m8-8H4">Add Schedule</x-button>

    </x-slot:toolbar>

    <x-table>
      <x-table.head>
        <x-table.th>Title</x-table.th>
        <x-table.th hidden="sm">Schedule</x-table.th>
        <x-table.th>Status</x-table.th>
        <x-table.th hidden="md">Barangays</x-table.th>
        <x-table.th hidden="md">Image</x-table.th>
        <x-table.th align="right">Actions</x-table.th>
      </x-table.head>

      <x-table.body>
        @forelse ($this->schedules as $schedule)
          <tr class="transition-colors duration-150 hover:bg-gray-50">

            <x-table.td>
              <p class="font-semibold text-sm text-tei-blue-dark leading-snug line-clamp-2">{{ $schedule->title }}</p>
            </x-table.td>

            <x-table.td hidden="sm">
              <div class="flex flex-col gap-0.5">
                <span class="text-xs font-semibold text-tei-blue">{{ $schedule->scheduled_date->format('M j, Y') }}</span>
                <span class="text-xs text-tei-gray">{{ $schedule->formatted_time }}</span>
              </div>
            </x-table.td>

            <x-table.td>
              @php
                [$badgeClass, $dotClass, $label] = match ($schedule->status) {
                    'scheduled' => ['bg-warning/10 text-warning',   'bg-warning', 'Scheduled'],
                    'ongoing'   => ['bg-danger/10 text-danger',     'bg-danger',  'Ongoing'],
                    default     => ['bg-success/10 text-success',   'bg-success', 'Resolved'],
                };
              @endphp
              <span class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full {{ $badgeClass }}">
                <span class="size-1.5 rounded-full {{ $dotClass }}"></span>
                {{ $label }}
              </span>
            </x-table.td>

            <x-table.td hidden="md">
              @php
                $entries       = $schedule->areas ?? [];
                $barangayNames = array_column($entries, 'barangay');
                $shown         = array_slice($barangayNames, 0, 2);
                $extra         = count($barangayNames) - count($shown);
              @endphp
              <div class="flex flex-wrap gap-1">
                @foreach ($shown as $name)
                  <span class="text-xs px-2 py-0.5 rounded-full bg-tei-blue/8 text-tei-blue font-medium">{{ $name }}</span>
                @endforeach
                @if ($extra > 0)
                  <span class="text-xs px-2 py-0.5 rounded-full bg-gray-100 text-tei-gray-light font-medium">+{{ $extra }} more</span>
                @endif
              </div>
            </x-table.td>

            <x-table.td hidden="md">
              @if ($schedule->image_url)
                <img src="{{ $schedule->image_url }}" alt="{{ $schedule->title }}"
                     class="h-10 w-16 object-cover rounded-lg border border-gray-200">
              @else
                <span class="text-xs text-tei-gray-light italic">No image</span>
              @endif
            </x-table.td>

            <x-table.td align="right">
              <div class="flex items-center justify-end gap-1">
                <x-button-icon wire:click="openEdit({{ $schedule->id }})" title="Edit"
                    icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete({{ $schedule->id }})" title="Delete" variant="danger"
                    icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </div>
            </x-table.td>

          </tr>
        @empty
          <tr>
            <td colspan="6" class="px-5 py-14 text-center">
              <div class="flex flex-col items-center gap-3">
                <div class="size-12 rounded-2xl bg-tei-blue/6 flex items-center justify-center">
                  <svg class="size-6 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" />
                  </svg>
                </div>
                <p class="text-sm font-semibold text-tei-blue">No schedules yet</p>
                <p class="text-xs text-tei-gray-light">Click "Add Schedule" to post the first interruption notice.</p>
              </div>
            </td>
          </tr>
        @endforelse
      </x-table.body>
    </x-table>

  </x-table-container>


  {{-- ─── Add / Edit Drawer ──────────────────────────────── --}}
  <x-drawer width="max-w-lg">

    <x-drawer.header
        title="{{ $formMode === 'add' ? 'Add Power Interruption' : 'Edit Schedule' }}"
        subtitle="Fill in the schedule details and optionally upload the official notice image."
        icon="M13 10V3L4 14h7v7l9-11h-7z" />

    <form wire:submit.prevent="save" class="flex-1 overflow-y-auto px-6 py-6 space-y-5">

      {{-- Title --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Title <span class="text-danger">*</span>
        </label>
        <input wire:model="formTitle" type="text" list="interruption-titles"
               placeholder="Scheduled Power Interruption"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                      outline-none transition-all duration-200
                      focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        <datalist id="interruption-titles">
          <option value="Scheduled Power Interruption">
          <option value="Emergency Power Interruption">
          <option value="Unplanned Power Interruption">
        </datalist>
        @error('formTitle')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Date / Start Time / End Time (displayed on advisory) --}}
      <div class="grid grid-cols-3 gap-3">
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">
            Date <span class="text-danger">*</span>
          </label>
          <input wire:model="formDate" type="date"
                 class="w-full px-3 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          @error('formDate')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">
            Start Time <span class="text-danger">*</span>
          </label>
          <input wire:model="formStartTime" type="time"
                 class="w-full px-3 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          @error('formStartTime')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">
            End Time <span class="text-danger">*</span>
          </label>
          <input wire:model="formEndTime" type="time"
                 class="w-full px-3 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          @error('formEndTime')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>
      </div>

      {{-- Auto-resolve (expiry) — optional --}}
      <div class="rounded-xl border border-dashed border-gray-200 bg-gray-50/60 px-4 py-3">
        <p class="text-xs font-semibold text-tei-gray mb-2.5">
          Auto-resolve
          <span class="ml-1 font-normal text-tei-gray-light">(optional — leave blank to resolve at end time)</span>
        </p>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block text-xs font-semibold text-tei-gray mb-1">Expiry Date</label>
            <input wire:model="formEndDate" type="date"
                   class="w-full px-3 py-2.5 rounded-lg border border-gray-200 bg-white text-sm text-tei-blue-dark
                          outline-none transition-all duration-200
                          focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15">
            @error('formEndDate')
              <p class="mt-1 text-xs text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div>
            <label class="block text-xs font-semibold text-tei-gray mb-1">Expiry Time</label>
            <input wire:model="formExpiryTime" type="time"
                   class="w-full px-3 py-2.5 rounded-lg border border-gray-200 bg-white text-sm text-tei-blue-dark
                          outline-none transition-all duration-200
                          focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15">
            @error('formExpiryTime')
              <p class="mt-1 text-xs text-danger">{{ $message }}</p>
            @enderror
          </div>
        </div>
      </div>

      {{-- Affected Barangays (repeater: barangay combobox + specific areas tag input) --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Affected Barangays <span class="text-danger">*</span>
        </label>

        <div class="space-y-3">
          @foreach ($formAreas as $entryIndex => $entry)
            <div wire:key="area-entry-{{ $entryIndex }}"
                 x-data="{
                     barangay: @js($entry['barangay']),
                     allByBarangay: @js($areaSuggestionsByBarangay),
                     get areaSuggestions() { return this.allByBarangay[this.barangay] ?? []; },
                     search: '',
                     open: false,
                     get filtered() {
                         const q = this.search.toLowerCase().trim();
                         const s = this.areaSuggestions;
                         if (!q) return s.slice(0, 8);
                         return s.filter(n => n.toLowerCase().includes(q)).slice(0, 8);
                     },
                     addTag(name) {
                         const n = name.trim();
                         if (!n) return;
                         this.search = '';
                         this.open   = false;
                         $wire.addAreaToEntry({{ $entryIndex }}, n);
                     }
                 }"
                 class="border border-gray-200 rounded-xl p-4 bg-white relative">

              {{-- Remove button (hidden when only one entry) --}}
              @if (count($formAreas) > 1)
                <button type="button" wire:click="removeBarangayEntry({{ $entryIndex }})"
                        class="absolute top-2.5 right-2.5 size-6 rounded-full bg-gray-100 hover:bg-danger/10
                               text-tei-gray-light hover:text-danger transition-colors cursor-pointer
                               flex items-center justify-center">
                  <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              @endif

              <div class="space-y-3 {{ count($formAreas) > 1 ? 'pr-8' : '' }}">

                {{-- Barangay: text input with datalist (select existing OR type new) --}}
                <div>
                  <label class="block text-xs font-semibold text-tei-gray mb-1">Barangay</label>
                  <input wire:model="formAreas.{{ $entryIndex }}.barangay"
                         type="text"
                         list="brgy-list-{{ $entryIndex }}"
                         placeholder="Type or select barangay…"
                         @input="barangay = $el.value"
                         class="w-full px-3 py-2.5 rounded-lg border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                                outline-none transition-all duration-200
                                focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
                  <datalist id="brgy-list-{{ $entryIndex }}">
                    @foreach ($barangaySuggestions as $brgy)
                      <option value="{{ $brgy }}">
                    @endforeach
                  </datalist>
                  @error('formAreas.' . $entryIndex . '.barangay')
                    <p class="mt-1 text-xs text-danger">{{ $message }}</p>
                  @enderror
                </div>

                {{-- Specific Areas: self-building tag input (optional) --}}
                <div>
                  <label class="block text-xs font-semibold text-tei-gray mb-1">
                    Specific Areas
                    <span class="font-normal text-tei-gray-light">(optional)</span>
                  </label>

                  <div class="relative" @click.outside="open = false">

                    <div class="flex flex-wrap gap-1.5 min-h-10 px-3 py-2 rounded-lg border border-gray-200 bg-gray-50
                                transition-all duration-200 focus-within:border-tei-orange focus-within:bg-white
                                focus-within:ring-2 focus-within:ring-tei-orange/15 cursor-text"
                         @click="$refs.areaInput{{ $entryIndex }}.focus()">

                      @foreach ($entry['areas'] as $areaIndex => $area)
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs font-semibold bg-tei-orange/10 text-tei-orange shrink-0">
                          {{ $area }}
                          <button type="button" wire:click="removeAreaFromEntry({{ $entryIndex }}, {{ $areaIndex }})"
                                  class="text-tei-orange/50 hover:text-danger transition-colors cursor-pointer">
                            <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                          </button>
                        </span>
                      @endforeach

                      <input wire:ignore
                             x-ref="areaInput{{ $entryIndex }}"
                             x-model="search"
                             @focus="open = true"
                             @input="open = true"
                             @keydown.enter.prevent="if (search.trim()) addTag(search)"
                             @keydown.escape="open = false; search = ''"
                             type="text"
                             placeholder="{{ count($entry['areas']) === 0 ? 'Type area and press Enter…' : '' }}"
                             class="flex-1 min-w-24 bg-transparent text-xs text-tei-blue-dark placeholder:text-tei-gray-light outline-none py-0.5">
                    </div>

                    <div wire:ignore
                         x-show="open"
                         x-cloak
                         class="absolute top-full left-0 right-0 z-50 mt-1 bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden">

                      <template x-if="filtered.length === 0 && !search.trim()">
                        <p class="px-4 py-2.5 text-xs text-tei-gray-light italic">
                          No saved areas for this barangay yet — type and press Enter.
                        </p>
                      </template>

                      <template x-for="name in filtered" :key="name">
                        <button type="button" @click="addTag(name)"
                                class="w-full px-4 py-2 text-left text-sm text-tei-blue-dark hover:bg-tei-orange/6 transition-colors duration-100 cursor-pointer">
                          <span x-text="name"></span>
                        </button>
                      </template>

                      <template x-if="search.trim() && !filtered.some(f => f.toLowerCase() === search.toLowerCase().trim())">
                        <button type="button" @click="addTag(search)"
                                class="w-full px-4 py-2 text-left text-sm font-semibold text-tei-orange hover:bg-tei-orange/6 transition-colors duration-100 border-t border-gray-100 cursor-pointer">
                          Add "<span x-text="search.trim()"></span>"
                        </button>
                      </template>

                    </div>
                  </div>
                </div>

              </div>
            </div>
          @endforeach
        </div>

        <button type="button" wire:click="addBarangayEntry"
                class="mt-3 w-full py-2.5 text-sm font-semibold text-tei-orange rounded-xl border-2 border-dashed
                       border-tei-orange/40 hover:border-tei-orange/60 hover:bg-tei-orange/4 transition-colors duration-150 cursor-pointer">
          + Add Another Barangay
        </button>

        @error('formAreas')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Reason --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Reason <span class="text-danger">*</span>
        </label>
        <textarea wire:model="formReason" rows="3"
                  placeholder="Reconfiguration of primary pole along F. Tañedo St."
                  class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light resize-none
                         outline-none transition-all duration-200
                         focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15"></textarea>
        @error('formReason')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Status --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-2">Status</label>
        <div class="flex gap-5">
          @foreach (['scheduled' => 'Scheduled', 'ongoing' => 'Ongoing', 'resolved' => 'Resolved'] as $val => $lbl)
            <label class="flex items-center gap-2 cursor-pointer">
              <input wire:model="formStatus" type="radio" value="{{ $val }}" class="accent-tei-orange">
              <span class="text-sm font-medium text-tei-gray">{{ $lbl }}</span>
            </label>
          @endforeach
        </div>
        <p class="mt-1.5 text-xs text-tei-gray-light">Auto-updated by the cron job based on date and time.</p>
      </div>

      {{-- Image Upload --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Official Notice Image</label>
        <label for="pi-image"
               class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl transition-colors duration-150 cursor-pointer
                      {{ $formImage ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
          <svg class="size-9 shrink-0 {{ $formImage ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <div class="min-w-0 flex-1">
            @if ($formImage)
              <p class="text-sm font-medium text-tei-orange truncate">{{ $formImage->getClientOriginalName() }}</p>
              <p class="text-xs text-tei-gray-light mt-0.5">{{ number_format($formImage->getSize() / 1024, 0) }} KB · click to change</p>
            @else
              <p class="text-sm font-medium text-tei-blue">Click to upload image</p>
              <p class="text-xs text-tei-gray-light mt-0.5">JPG, PNG, WebP · Max 5 MB</p>
            @endif
          </div>
          <input id="pi-image" wire:model="formImage" type="file" accept=".jpg,.jpeg,.png,.webp" class="sr-only">
        </label>
        @error('formImage')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

    </form>

    <x-drawer.footer>
      <x-button variant="ghost" size="lg" @click="$wire.closeModal()">Cancel</x-button>
      <x-button variant="secondary" size="lg" wire:click="save" loading="Saving…">
        {{ $formMode === 'add' ? 'Add Schedule' : 'Save Changes' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>

  {{-- ══════════════════════════════════════════
         DELETE CONFIRMATION MODAL
    ══════════════════════════════════════════ --}}
  <x-confirm-modal
    title="Delete Schedule?"
    message="This action cannot be undone. The schedule and its uploaded image will be permanently removed."
  >
    <x-button variant="ghost" wire:click="cancelDelete">Cancel</x-button>
    <x-button loading="Deleting…" variant="danger" wire:click="delete">Yes, Delete</x-button>
  </x-confirm-modal>

</div>
