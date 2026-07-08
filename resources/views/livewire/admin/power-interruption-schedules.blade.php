<div>

  <x-admin.partials.page-header
      title="Power Interruption Schedules"
      subtitle="Manage scheduled and ongoing power interruptions. Files are grouped by date and reason automatically." />


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
        <input wire:model.live.debounce.300ms="search" type="search" placeholder="Search title or reason…"
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
        <x-table.th>Title / Reason</x-table.th>
        <x-table.th hidden="sm">Date</x-table.th>
        <x-table.th>Status</x-table.th>
        <x-table.th hidden="md">Expiry</x-table.th>
        <x-table.th hidden="md" align="center">Files</x-table.th>
        <x-table.th align="right">Actions</x-table.th>
      </x-table.head>

      <x-table.body>
        @forelse ($this->schedules as $schedule)
          <tr class="transition-colors duration-150 hover:bg-gray-50">

            {{-- Title + reason --}}
            <x-table.td>
              <p class="font-semibold text-sm text-tei-blue-dark leading-snug">{{ $schedule->title }}</p>
              <p class="text-xs text-tei-gray-light mt-0.5 line-clamp-1">{{ $schedule->reason }}</p>
            </x-table.td>

            {{-- Date --}}
            <x-table.td hidden="sm">
              <span class="text-xs font-semibold text-tei-blue">{{ $schedule->scheduled_date->format('M j, Y') }}</span>
              <span class="text-xs text-tei-gray-light">{{ $schedule->scheduled_date->format('g:i A') }}</span>
            </x-table.td>

            {{-- Status --}}
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

            {{-- Expiry date --}}
            <x-table.td hidden="md">
              @if ($schedule->expiry_date)
                <span class="text-xs text-tei-gray">{{ $schedule->expiry_date->format('M j, Y') }}</span>
                <span class="text-xs text-tei-gray-light">{{ $schedule->expiry_date->format('g:i A') }}</span>
              @else
                <span class="text-xs text-tei-gray-light italic">—</span>
              @endif
            </x-table.td>

            {{-- File count --}}
            <x-table.td hidden="md" align="center">
              @if ($schedule->files_count > 0)
                <span class="inline-flex items-center gap-1 text-xs font-bold text-tei-blue">
                  <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                  {{ $schedule->files_count }}
                </span>
              @else
                <span class="text-xs text-tei-gray-light">—</span>
              @endif
            </x-table.td>

            {{-- Actions --}}
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
        :title="$formMode === 'add' ? 'Add Schedule' : 'Edit Schedule'"
        :subtitle="$formMode === 'add'
            ? 'If the same date and reason already exists, new files will be added to that record.'
            : 'Update schedule details or attach additional notice files.'"
        icon="M13 10V3L4 14h7v7l9-11h-7z"
        close="closeModal" />

    <div class="flex-1 overflow-y-auto px-6 py-6 space-y-5">

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

      {{-- Scheduled Date & Time --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Scheduled Date & Time <span class="text-danger">*</span>
        </label>
        <input wire:model="formDate" type="datetime-local"
               class="w-full px-3 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                      outline-none transition-all duration-200
                      focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        @error('formDate')
          <p class="mt-1 text-xs text-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Expiry Date & Time --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Expiry Date & Time
        </label>
        <input wire:model="formExpiryDate" type="datetime-local"
               class="w-full px-3 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                      outline-none transition-all duration-200
                      focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        @error('formExpiryDate')
          <p class="mt-1 text-xs text-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- Reason --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Reason <span class="text-danger">*</span>
          <span class="ml-1 text-xs font-normal text-tei-gray-light">used to group notices with the same date</span>
        </label>
        <textarea wire:model="formReason" rows="3"
                  placeholder="e.g. Reconfiguration of primary pole along F. Tañedo St."
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
        <p class="mt-1.5 text-xs text-tei-gray-light">Auto-resolved by cron when expiry date passes.</p>
      </div>

      {{-- Existing files (edit mode) --}}
      @if ($formMode === 'edit' && $this->existingFiles->count() > 0)
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-2">Attached Files</label>
          <div class="space-y-2">
            @foreach ($this->existingFiles as $file)
              <div class="flex items-center justify-between px-3 py-2.5 rounded-xl border border-gray-200 bg-gray-50">
                <div class="flex items-center gap-2 min-w-0">
                  <svg class="size-4 shrink-0 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                  <span class="text-xs font-medium text-tei-blue truncate">{{ $file->file_name }}</span>
                </div>
                <button wire:click="removeFile({{ $file->id }})" type="button"
                  class="text-xs font-semibold text-danger hover:underline cursor-pointer shrink-0 ml-3">
                  Remove
                </button>
              </div>
            @endforeach
          </div>
        </div>
      @endif

      {{-- Upload new files --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          {{ $formMode === 'edit' ? 'Add More Files' : 'Notice Files' }}
          <span class="ml-1 text-xs font-normal text-tei-gray-light">images or PDF · multiple allowed · max 10 MB each</span>
        </label>

        <label for="pi-images"
               class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl transition-colors duration-150 cursor-pointer
                      {{ count($formImages) > 0 ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
          <svg class="size-9 shrink-0 {{ count($formImages) > 0 ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <div class="min-w-0 flex-1">
            @if (count($formImages) > 0)
              <p class="text-sm font-medium text-tei-orange">{{ count($formImages) }} file(s) selected</p>
              <ul class="mt-1 space-y-0.5">
                @foreach ($formImages as $img)
                  <li class="text-xs text-tei-gray-light truncate">{{ $img->getClientOriginalName() }}</li>
                @endforeach
              </ul>
            @else
              <p class="text-sm font-medium text-tei-blue">Click to upload notice files</p>
              <p class="text-xs text-tei-gray-light mt-0.5">JPG, PNG, WebP, PDF · Multiple allowed</p>
            @endif
          </div>
          <input id="pi-images" wire:model="formImages" type="file"
                 accept=".jpg,.jpeg,.png,.webp,.pdf" multiple class="sr-only">
        </label>

        @error('formImages.*')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeModal">Cancel</x-button>
      <x-button variant="secondary" wire:click="save" loading="Saving…">
        {{ $formMode === 'add' ? 'Add Schedule' : 'Save Changes' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>


  {{-- ── DELETE CONFIRMATION ──────────────────────────────── --}}
  <x-confirm-modal
    title="Delete Schedule?"
    message="This action cannot be undone. The schedule and all attached files will be permanently removed.">
    <x-button variant="ghost" wire:click="cancelDelete">Cancel</x-button>
    <x-button loading="Deleting…" variant="danger" wire:click="delete">Yes, Delete</x-button>
  </x-confirm-modal>

</div>
