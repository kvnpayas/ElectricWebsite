<div>

  <x-admin.partials.page-header
      title="Hosting Capacity"
      subtitle="Manage the Net Metering and Distributed Energy Resources hosting capacity tables shown on the public customer pages." />


  {{-- ─── Page Settings ───────────────────────────────────── --}}
  <div class="bg-white rounded-2xl shadow-sm border border-tei-blue/8 mb-6">

    <div class="px-6 py-4 border-b border-tei-blue/6 flex items-center justify-between">
      <div>
        <h3 class="text-sm font-bold text-tei-blue">Page Settings</h3>
        <p class="text-xs text-tei-gray-light mt-0.5">
          Set the "As of" date for the currently selected tab — it will appear on the public page for that section.
        </p>
      </div>
      @if ($settingSaved)
        <span class="inline-flex items-center gap-1.5 text-xs font-semibold text-success">
          <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
          </svg>
          Saved
        </span>
      @endif
    </div>

    <div class="px-6 py-5 flex items-end gap-4">

      @if ($typeFilter === 'net-metering')
        <div wire:key="settings-nm" class="w-56">
          <label class="block text-xs font-semibold text-tei-blue mb-1.5">Net Metering — As of Date</label>
          <input wire:model="settingNetMeteringAsOfDate" type="date"
            class="w-full px-3 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                   outline-none transition-all duration-200
                   focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          @error('settingNetMeteringAsOfDate')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>
      @else
        <div wire:key="settings-der" class="w-56">
          <label class="block text-xs font-semibold text-tei-blue mb-1.5">DER — As of Date</label>
          <input wire:model="settingDerAsOfDate" type="date"
            class="w-full px-3 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                   outline-none transition-all duration-200
                   focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          @error('settingDerAsOfDate')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>
      @endif

      <x-button variant="secondary" wire:click="saveSettings" loading="Saving…">
        Save
      </x-button>

    </div>

  </div>


  {{-- ─── Stat cards ──────────────────────────────────────── --}}
  <div class="grid grid-cols-3 gap-4 mb-6">

    <x-stat-card wire:click="setType('net-metering')"
        color="tei-blue"
        icon="M13 10V3L4 14h7v7l9-11h-7z"
        :value="$this->counts['net-metering']"
        label="Net Metering"
        class="cursor-pointer {{ $typeFilter === 'net-metering' ? 'ring-2 ring-tei-blue/30' : '' }}" />

    <x-stat-card wire:click="setType('der-feeder')"
        color="tei-orange"
        icon="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
        :value="$this->counts['der-feeder']"
        label="DER — Per Feeder"
        class="cursor-pointer {{ $typeFilter === 'der-feeder' ? 'ring-2 ring-tei-orange/30' : '' }}" />

    <x-stat-card wire:click="setType('der-substation')"
        color="tei-blue"
        icon="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 00-1-1h-2a1 1 0 00-1 1v5m4 0H9"
        :value="$this->counts['der-substation']"
        label="DER — Per Substation"
        class="cursor-pointer {{ $typeFilter === 'der-substation' ? 'ring-2 ring-tei-blue/30' : '' }}" />

  </div>


  {{-- ─── Table card ──────────────────────────────────────── --}}
  <x-table-container
      :title="match($typeFilter) {
          'net-metering'   => 'Net Metering Rows',
          'der-feeder'     => 'DER Per-Feeder Rows',
          'der-substation' => 'DER Per-Substation Rows',
      }"
      :count="$this->rows->count()">

    <x-slot:toolbar>
      {{-- Search --}}
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input wire:model.live.debounce.300ms="search" type="search" placeholder="Search label or value…"
          class="pl-9 pr-4 py-2 w-52 text-sm rounded-xl border border-gray-200 bg-gray-50 text-gray-900
                 outline-none transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
      </div>

      {{-- Type filter --}}
      <select wire:model.live="typeFilter"
        class="py-2 pl-3 pr-8 text-sm rounded-xl border border-gray-200 bg-gray-50 text-tei-gray
               outline-none cursor-pointer transition-all duration-200
               focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15">
        <option value="net-metering">Net Metering</option>
        <option value="der-feeder">DER — Per Feeder</option>
        <option value="der-substation">DER — Per Substation</option>
      </select>

      <x-button variant="secondary" wire:click="openAdd" icon="M12 4v16m8-8H4">Add Row</x-button>
    </x-slot:toolbar>

    {{-- Table --}}
    <x-table>
      <x-table.head>
        @if ($typeFilter === 'net-metering')
          <x-table.th>Transformer Rating (kVA)</x-table.th>
          <x-table.th>Hosting Capacity (kWac)</x-table.th>
        @elseif ($typeFilter === 'der-feeder')
          <x-table.th>Feeder Name</x-table.th>
          <x-table.th>Max Capacity (kW)</x-table.th>
        @else
          <x-table.th>Substation Name</x-table.th>
          <x-table.th>Max Capacity (kW)</x-table.th>
        @endif
        <x-table.th hidden="sm">Kind</x-table.th>
        <x-table.th hidden="sm">Sort</x-table.th>
        <x-table.th align="right">Actions</x-table.th>
      </x-table.head>

      <x-table.body>
        @forelse ($this->rows as $row)
          <tr class="transition-colors duration-150 hover:bg-gray-50">

            <x-table.td>
              <p class="font-semibold text-sm text-tei-blue-dark">{{ $row->label }}</p>
            </x-table.td>

            <x-table.td>
              @if ($row->is_note)
                <p class="text-sm italic text-tei-gray-light">{{ $row->value }}</p>
              @else
                <p class="text-sm font-bold text-tei-orange">{{ $row->value }}</p>
              @endif
            </x-table.td>

            <x-table.td hidden="sm">
              @if ($row->is_note)
                <span class="inline-flex text-xs font-semibold px-2.5 py-1 rounded-full bg-warning/10 text-warning">
                  Note
                </span>
              @else
                <span class="inline-flex text-xs font-semibold px-2.5 py-1 rounded-full bg-success/10 text-success">
                  Value
                </span>
              @endif
            </x-table.td>

            <x-table.td hidden="sm">
              <span class="text-xs text-tei-gray font-mono">{{ $row->sort_order }}</span>
            </x-table.td>

            <x-table.td align="right">
              <div class="flex items-center justify-end gap-1">
                <x-button-icon wire:click="openEdit({{ $row->id }})" title="Edit"
                  icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete({{ $row->id }})" title="Delete" variant="danger"
                  icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </div>
            </x-table.td>

          </tr>
        @empty
          <tr>
            <td colspan="5" class="px-5 py-14 text-center">
              <div class="flex flex-col items-center gap-3">
                <div class="size-12 rounded-2xl bg-tei-blue/6 flex items-center justify-center">
                  <svg class="size-6 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                  </svg>
                </div>
                <p class="text-sm font-semibold text-tei-blue">No rows yet</p>
                <p class="text-xs text-tei-gray-light">Click "Add Row" to add the first entry.</p>
              </div>
            </td>
          </tr>
        @endforelse
      </x-table.body>
    </x-table>

  </x-table-container>


  {{-- ─── Add / Edit Drawer ──────────────────────────────── --}}
  <x-drawer show="showDrawer" close="closeDrawer" width="max-w-md">

    <x-drawer.header
        :title="$editId ? 'Edit Row' : 'Add Row'"
        :subtitle="match($formType) {
            'net-metering'   => 'Net Metering',
            'der-feeder'     => 'DER — Per Feeder',
            'der-substation' => 'DER — Per Substation',
            default          => '',
        }"
        icon="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" 
        close="closeDrawer"/>

    <form wire:submit.prevent="save" id="hosting-capacity-form" class="flex-1 overflow-y-auto px-6 py-6 space-y-5">

      {{-- Type --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Table <span class="text-danger">*</span>
        </label>
        <select wire:model.live="formType"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                 outline-none cursor-pointer transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          <option value="net-metering">Net Metering</option>
          <option value="der-feeder">DER — Per Feeder</option>
          <option value="der-substation">DER — Per Substation</option>
        </select>
        @error('formType')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Label (column 1) --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          @if ($formType === 'net-metering')
            Transformer Rating (kVA) <span class="text-danger">*</span>
          @elseif ($formType === 'der-feeder')
            Feeder Name <span class="text-danger">*</span>
          @else
            Substation Name <span class="text-danger">*</span>
          @endif
        </label>
        <input wire:model="formLabel" type="text"
          placeholder="{{ $formType === 'net-metering' ? 'e.g. 100' : ($formType === 'der-feeder' ? 'e.g. LIPIEWP' : 'e.g. LIP Substation') }}"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                 outline-none transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        @error('formLabel')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Value (column 2) --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          @if ($formType === 'net-metering')
            Hosting Capacity (kWac) <span class="text-danger">*</span>
          @else
            Max Capacity (kW) <span class="text-danger">*</span>
          @endif
          <span class="ml-1 text-xs font-normal text-tei-gray-light">can be a note when "Is Note" is on</span>
        </label>
        <input wire:model="formValue" type="text"
          placeholder="{{ $formType === 'net-metering' ? 'e.g. 40' : 'e.g. 2,700 or Two (2) embedded plants — 5.5 MW' }}"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                 outline-none transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        @error('formValue')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Is Note toggle (DER feeder only, but available for all) --}}
      <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">
        <div>
          <p class="text-sm font-semibold text-tei-blue">Is Note / Remark</p>
          <p class="text-xs text-tei-gray-light mt-0.5">When on, the value is shown in italics instead of bold orange</p>
        </div>
        <label class="relative inline-flex items-center cursor-pointer shrink-0 ml-4">
          <input wire:model="formIsNote" type="checkbox" class="sr-only peer">
          <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-tei-orange/30
                      rounded-full peer peer-checked:after:translate-x-5 peer-checked:after:border-white
                      after:content-[''] after:absolute after:top-[2px] after:left-[2px]
                      after:bg-white after:border-gray-300 after:border after:rounded-full
                      after:h-5 after:w-5 after:transition-all peer-checked:bg-tei-orange"></div>
        </label>
      </div>

      {{-- Sort Order --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Sort Order
        </label>
        <input wire:model="formSortOrder" type="number" min="0" step="1"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                 outline-none transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        <p class="mt-1.5 text-xs text-tei-gray-light">Lower numbers appear first in the table.</p>
      </div>

    </form>

    <x-drawer.footer>
      <x-button variant="ghost" size="lg" @click="$wire.set('showDrawer', false)">Cancel</x-button>
      <x-button variant="secondary" size="lg" wire:click="save" loading="Saving…">
        {{ $editId ? 'Save Changes' : 'Add Row' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>


  {{-- ─── Delete Confirmation Modal ──────────────────────── --}}
  <x-confirm-modal
      show="showDeleteModal"
      cancel="cancelDelete"
      title="Delete Row?"
      message="This row will be permanently removed from the public hosting capacity table.">
    <x-button variant="ghost" wire:click="cancelDelete">Cancel</x-button>
    <x-button loading="Deleting…" variant="danger" wire:click="delete">Yes, Delete</x-button>
  </x-confirm-modal>

</div>
