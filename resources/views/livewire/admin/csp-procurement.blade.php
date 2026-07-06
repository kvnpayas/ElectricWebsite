<div>

  {{-- ─── Page header ────────────────────────────────────── --}}
  <x-admin.partials.page-header
      :title="$screen === 'detail' ? ($this->activeBid?->code ?? 'Bid Detail') : 'CSP Procurement'"
      :subtitle="$screen === 'detail'
          ? 'Manage capacity, timeline, documents, bid bulletins and updates for this bid.'
          : 'Manage Power Supply Procurement bids for the Competitive Selection Process.'">

    @if ($screen === 'detail')
      <div class="flex items-center gap-3">
        <button wire:click="goToList"
                class="inline-flex items-center gap-1.5 text-sm font-semibold text-tei-blue hover:text-tei-orange transition-colors duration-150 cursor-pointer">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
          </svg>
          All Bids
        </button>
        <x-button variant="secondary" wire:click="openEditBid({{ $activeBidId }})">Edit Bid Info</x-button>
        <x-button variant="danger" wire:click="confirmDelete('bid', {{ $activeBidId }})">Delete Bid</x-button>
      </div>
    @endif

  </x-admin.partials.page-header>


  {{-- ═══════════════════════════════════════════════
     LIST SCREEN
  ═══════════════════════════════════════════════ --}}
  @if ($screen === 'list')

    {{-- Stat cards --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-6">

      <x-stat-card wire:click="setStatusFilter('all')"
          color="tei-blue"
          icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
          :value="$this->counts['total']"
          label="Total Bids"
          class="cursor-pointer {{ $statusFilter === 'all' ? 'ring-2 ring-tei-blue/30' : '' }}" />

      <x-stat-card wire:click="setStatusFilter('ongoing')"
          color="tei-orange"
          icon="M13 10V3L4 14h7v7l9-11h-7z"
          :value="$this->counts['ongoing']"
          label="Ongoing"
          class="cursor-pointer {{ $statusFilter === 'ongoing' ? 'ring-2 ring-tei-orange/30' : '' }}" />

      <x-stat-card wire:click="setStatusFilter('completed')"
          color="tei-blue"
          icon="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
          :value="$this->counts['completed']"
          label="Completed"
          class="cursor-pointer {{ $statusFilter === 'completed' ? 'ring-2 ring-tei-blue/30' : '' }}" />

      <x-stat-card wire:click="setStatusFilter('failed')"
          color="tei-blue"
          icon="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
          :value="$this->counts['failed']"
          label="Failed"
          class="cursor-pointer {{ $statusFilter === 'failed' ? 'ring-2 ring-tei-blue/30' : '' }}" />

    </div>

    {{-- Bid table --}}
    <x-table-container title="Procurement Bids" :count="$this->bids->count()">

      <x-slot:toolbar>
        <select wire:model.live="statusFilter"
          class="py-2 pl-3 pr-8 text-sm rounded-xl border border-gray-200 bg-gray-50 text-tei-gray outline-none cursor-pointer transition-all duration-200 focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15">
          <option value="all">All Status</option>
          <option value="ongoing">Ongoing</option>
          <option value="completed">Completed</option>
          <option value="failed">Failed</option>
        </select>
        <x-button variant="secondary" wire:click="openAddBid" icon="M12 4v16m8-8H4">Add Bid</x-button>
      </x-slot:toolbar>

      <x-table>
        <x-table.head>
          <x-table.th>Code</x-table.th>
          <x-table.th>Title</x-table.th>
          <x-table.th hidden="sm">Status</x-table.th>
          <x-table.th hidden="md">Posted</x-table.th>
          <x-table.th align="center">Published</x-table.th>
          <x-table.th align="right">Actions</x-table.th>
        </x-table.head>

        <x-table.body>
          @forelse ($this->bids as $bid)
            <tr class="transition-colors duration-150 hover:bg-gray-50">

              <x-table.td>
                <span class="font-mono text-xs font-bold text-tei-blue">{{ $bid->code }}</span>
              </x-table.td>

              <x-table.td>
                <p class="font-semibold text-sm text-tei-blue-dark leading-snug line-clamp-2">{{ $bid->title }}</p>
              </x-table.td>

              <x-table.td hidden="sm">
                @php
                  [$bg, $dot, $label] = match($bid->status) {
                      'ongoing'   => ['bg-success/10 text-success',   'bg-success',  'Ongoing'],
                      'failed'    => ['bg-danger/10 text-danger',     'bg-danger',   'Failed'],
                      'completed' => ['bg-tei-blue/10 text-tei-blue', 'bg-tei-blue', 'Completed'],
                      default     => ['bg-gray-100 text-gray-500',    'bg-gray-400', ucfirst($bid->status)],
                  };
                @endphp
                <span class="inline-flex items-center gap-1.5 text-xs font-bold px-2.5 py-1 rounded-full {{ $bg }}">
                  <span class="size-1.5 rounded-full {{ $dot }}"></span>
                  {{ $label }}
                </span>
              </x-table.td>

              <x-table.td hidden="md">
                <span class="text-xs text-tei-gray">{{ $bid->posted_date->format('M j, Y') }}</span>
              </x-table.td>

              <x-table.td align="center">
                <button type="button" wire:click="togglePublished({{ $bid->id }})"
                        title="{{ $bid->is_published ? 'Click to unpublish' : 'Click to publish' }}"
                        class="relative inline-flex h-5 w-9 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out {{ $bid->is_published ? 'bg-success' : 'bg-gray-200' }}">
                  <span class="pointer-events-none inline-block h-4 w-4 transform rounded-full bg-white shadow transition duration-200 ease-in-out {{ $bid->is_published ? 'translate-x-4' : 'translate-x-0' }}"></span>
                </button>
              </x-table.td>

              <x-table.td align="right">
                <div class="flex items-center justify-end gap-1">
                  <x-button-icon wire:click="openEditBid({{ $bid->id }})" title="Edit"
                    icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                  <x-button-icon wire:click="goToDetail({{ $bid->id }})" title="Manage" variant="secondary"
                    icon="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <x-button-icon wire:click="confirmDelete('bid', {{ $bid->id }})" title="Delete" variant="danger"
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
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                  </div>
                  <p class="text-sm font-semibold text-tei-blue">No bids found</p>
                  <p class="text-xs text-tei-gray-light">Click "Add Bid" to create the first procurement bid.</p>
                </div>
              </td>
            </tr>
          @endforelse
        </x-table.body>
      </x-table>

    </x-table-container>

  @endif


  {{-- ═══════════════════════════════════════════════
     DETAIL SCREEN
  ═══════════════════════════════════════════════ --}}
  @if ($screen === 'detail' && $this->activeBid)

    {{-- Bid info card --}}
    <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm mb-6">
      <div class="px-6 py-4 border-b border-tei-blue/6">
        <p class="text-[10px] font-black text-tei-orange uppercase tracking-widest mb-0.5">Bid Information</p>
        <div class="flex flex-wrap items-center gap-2 mt-2">
          <span class="font-mono text-xs font-bold text-tei-blue">{{ $this->activeBid->code }}</span>
          @php
            [$bg, $dot, $statusLabel] = match($this->activeBid->status) {
                'ongoing'   => ['bg-success/10 text-success',   'bg-success',  'Ongoing'],
                'failed'    => ['bg-danger/10 text-danger',     'bg-danger',   'Failed'],
                'completed' => ['bg-tei-blue/10 text-tei-blue', 'bg-tei-blue', 'Completed'],
                default     => ['bg-gray-100 text-gray-500',    'bg-gray-400', ucfirst($this->activeBid->status)],
            };
          @endphp
          <span class="inline-flex items-center gap-1.5 text-xs font-bold px-2.5 py-1 rounded-full {{ $bg }}">
            <span class="size-1.5 rounded-full {{ $dot }}"></span>
            {{ $statusLabel }}
          </span>
          <span class="text-xs text-tei-gray-light sm:ml-auto">Posted: {{ $this->activeBid->posted_date->format('d M Y') }}</span>
        </div>
        <p class="text-sm font-black text-tei-blue-dark mt-2">{{ $this->activeBid->title }}</p>
        @if ($this->activeBid->contract_description)
          <p class="text-xs text-tei-gray mt-1">{{ $this->activeBid->contract_description }}</p>
        @endif
      </div>
    </div>

    <div class="space-y-6">

      {{-- ─── Capacity Schedule ──────────────────── --}}
      <x-table-container title="Capacity Schedule" :count="$this->capacityRows->count()"
          icon="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z">
        <x-slot:toolbar>
          <p class="text-xs text-tei-gray-light hidden sm:block">Leave empty for bids without an escalation table.</p>
          <x-button variant="secondary" wire:click="openAddCapacity" icon="M12 4v16m8-8H4">Add Row</x-button>
        </x-slot:toolbar>

        <x-table>
          <x-table.head>
            <x-table.th>Period From</x-table.th>
            <x-table.th>Period To</x-table.th>
            <x-table.th align="center">Capacity (MW)</x-table.th>
            <x-table.th align="center">Order</x-table.th>
            <x-table.th align="right">Actions</x-table.th>
          </x-table.head>
          <x-table.body>
            @forelse ($this->capacityRows as $row)
              <tr class="transition-colors duration-150 hover:bg-gray-50">
                <x-table.td><span class="font-semibold text-tei-blue-dark">{{ $row->period_from }}</span></x-table.td>
                <x-table.td><span class="text-tei-gray">{{ $row->period_to }}</span></x-table.td>
                <x-table.td align="center"><span class="font-bold text-tei-blue">{{ $row->capacity_mw }}</span></x-table.td>
                <x-table.td align="center"><span class="text-tei-gray-light">{{ $row->sort_order }}</span></x-table.td>
                <x-table.td align="right">
                  <div class="flex items-center justify-end gap-1">
                    <x-button-icon wire:click="openEditCapacity({{ $row->id }})" title="Edit"
                      icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    <x-button-icon wire:click="confirmDelete('capacity', {{ $row->id }})" title="Delete" variant="danger"
                      icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </div>
                </x-table.td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-5 py-12 text-center">
                  <div class="flex flex-col items-center gap-2">
                    <div class="size-10 rounded-2xl bg-tei-blue/6 flex items-center justify-center">
                      <svg class="size-5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                      </svg>
                    </div>
                    <p class="text-sm font-semibold text-tei-blue">No capacity rows</p>
                    <p class="text-xs text-tei-gray-light">This bid has no escalation table on the public page.</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </x-table.body>
        </x-table>
      </x-table-container>

      {{-- ─── Timeline ───────────────────────────── --}}
      <x-table-container title="Timeline" :count="$this->timelineRows->count()"
          icon="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
        <x-slot:toolbar>
          <x-button variant="secondary" wire:click="openAddTimeline" icon="M12 4v16m8-8H4">Add Row</x-button>
        </x-slot:toolbar>

        <x-table>
          <x-table.head>
            <x-table.th>Label</x-table.th>
            <x-table.th>Value</x-table.th>
            <x-table.th hidden="sm">Link / File</x-table.th>
            <x-table.th align="center">Order</x-table.th>
            <x-table.th align="right">Actions</x-table.th>
          </x-table.head>
          <x-table.body>
            @forelse ($this->timelineRows as $row)
              <tr class="transition-colors duration-150 hover:bg-gray-50">
                <x-table.td><span class="font-semibold text-tei-blue-dark">{{ $row->label }}</span></x-table.td>
                <x-table.td><span class="text-tei-gray">{{ $row->value }}</span></x-table.td>
                <x-table.td hidden="sm">
                  @if ($row->link_url)
                    <span class="text-xs text-tei-orange font-semibold truncate max-w-40 block">{{ $row->link_url }}</span>
                  @elseif ($row->file_name)
                    <span class="inline-flex items-center gap-1 text-xs text-success">
                      <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                      </svg>
                      {{ $row->file_name }}
                    </span>
                  @else
                    <span class="text-xs text-tei-gray-light">—</span>
                  @endif
                </x-table.td>
                <x-table.td align="center"><span class="text-tei-gray-light">{{ $row->sort_order }}</span></x-table.td>
                <x-table.td align="right">
                  <div class="flex items-center justify-end gap-1">
                    <x-button-icon wire:click="openEditTimeline({{ $row->id }})" title="Edit"
                      icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    <x-button-icon wire:click="confirmDelete('timeline', {{ $row->id }})" title="Delete" variant="danger"
                      icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </div>
                </x-table.td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-5 py-12 text-center">
                  <div class="flex flex-col items-center gap-2">
                    <div class="size-10 rounded-2xl bg-tei-blue/6 flex items-center justify-center">
                      <svg class="size-5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                      </svg>
                    </div>
                    <p class="text-sm font-semibold text-tei-blue">No timeline rows yet</p>
                    <p class="text-xs text-tei-gray-light">Add contract terms, dates, and deadlines.</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </x-table.body>
        </x-table>
      </x-table-container>

      {{-- ─── Documents ──────────────────────────── --}}
      <x-table-container title="Documents" :count="$this->documents->count()"
          icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
        <x-slot:toolbar>
          <p class="text-xs text-tei-gray-light hidden sm:block">PDF files shown in the Documents section on the public page.</p>
          <x-button variant="secondary" wire:click="openAddDoc('document')" icon="M12 4v16m8-8H4">Add Document</x-button>
        </x-slot:toolbar>

        <x-table>
          <x-table.head>
            <x-table.th>Label</x-table.th>
            <x-table.th>File</x-table.th>
            <x-table.th align="center">Order</x-table.th>
            <x-table.th align="right">Actions</x-table.th>
          </x-table.head>
          <x-table.body>
            @forelse ($this->documents as $doc)
              <tr class="transition-colors duration-150 hover:bg-gray-50">
                <x-table.td><span class="font-semibold text-tei-blue-dark">{{ $doc->label }}</span></x-table.td>
                <x-table.td>
                  @if ($doc->file_name)
                    <span class="inline-flex items-center gap-1.5 text-xs text-success">
                      <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                      </svg>
                      {{ $doc->file_name }}
                    </span>
                  @else
                    <span class="text-xs text-warning font-semibold">No file uploaded</span>
                  @endif
                </x-table.td>
                <x-table.td align="center"><span class="text-tei-gray-light">{{ $doc->sort_order }}</span></x-table.td>
                <x-table.td align="right">
                  <div class="flex items-center justify-end gap-1">
                    <x-button-icon wire:click="openEditDoc({{ $doc->id }})" title="Edit"
                      icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    <x-button-icon wire:click="confirmDelete('document', {{ $doc->id }})" title="Delete" variant="danger"
                      icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </div>
                </x-table.td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="px-5 py-12 text-center">
                  <div class="flex flex-col items-center gap-2">
                    <div class="size-10 rounded-2xl bg-tei-blue/6 flex items-center justify-center">
                      <svg class="size-5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                      </svg>
                    </div>
                    <p class="text-sm font-semibold text-tei-blue">No documents yet</p>
                    <p class="text-xs text-tei-gray-light">Add PDF files for this procurement bid.</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </x-table.body>
        </x-table>
      </x-table-container>

      {{-- ─── Bid Bulletins ──────────────────────── --}}
      <x-table-container title="Bid Bulletins" :count="$this->bidBulletins->count()"
          icon="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z">
        <x-slot:toolbar>
          <p class="text-xs text-tei-gray-light hidden sm:block">PDF bulletins shown in the Bid Bulletins section on the public page.</p>
          <x-button variant="secondary" wire:click="openAddDoc('bid-bulletin')" icon="M12 4v16m8-8H4">Add Bulletin</x-button>
        </x-slot:toolbar>

        <x-table>
          <x-table.head>
            <x-table.th>Label</x-table.th>
            <x-table.th>File</x-table.th>
            <x-table.th align="center">Order</x-table.th>
            <x-table.th align="right">Actions</x-table.th>
          </x-table.head>
          <x-table.body>
            @forelse ($this->bidBulletins as $doc)
              <tr class="transition-colors duration-150 hover:bg-gray-50">
                <x-table.td><span class="font-semibold text-tei-blue-dark">{{ $doc->label }}</span></x-table.td>
                <x-table.td>
                  @if ($doc->file_name)
                    <span class="inline-flex items-center gap-1.5 text-xs text-success">
                      <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                      </svg>
                      {{ $doc->file_name }}
                    </span>
                  @else
                    <span class="text-xs text-warning font-semibold">No file uploaded</span>
                  @endif
                </x-table.td>
                <x-table.td align="center"><span class="text-tei-gray-light">{{ $doc->sort_order }}</span></x-table.td>
                <x-table.td align="right">
                  <div class="flex items-center justify-end gap-1">
                    <x-button-icon wire:click="openEditDoc({{ $doc->id }})" title="Edit"
                      icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    <x-button-icon wire:click="confirmDelete('document', {{ $doc->id }})" title="Delete" variant="danger"
                      icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </div>
                </x-table.td>
              </tr>
            @empty
              <tr>
                <td colspan="4" class="px-5 py-12 text-center">
                  <div class="flex flex-col items-center gap-2">
                    <div class="size-10 rounded-2xl bg-tei-blue/6 flex items-center justify-center">
                      <svg class="size-5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                      </svg>
                    </div>
                    <p class="text-sm font-semibold text-tei-blue">No bid bulletins yet</p>
                    <p class="text-xs text-tei-gray-light">Add PDF bulletins for this procurement bid.</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </x-table.body>
        </x-table>
      </x-table-container>

      {{-- ─── Updates ────────────────────────────── --}}
      <x-table-container title="Updates" :count="$this->updates->count()"
          icon="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
        <x-slot:toolbar>
          <x-button variant="secondary" wire:click="openAddUpdate" icon="M12 4v16m8-8H4">Add Update</x-button>
        </x-slot:toolbar>

        <x-table>
          <x-table.head>
            <x-table.th>Date</x-table.th>
            <x-table.th>Label</x-table.th>
            <x-table.th hidden="sm">File</x-table.th>
            <x-table.th align="center">Order</x-table.th>
            <x-table.th align="right">Actions</x-table.th>
          </x-table.head>
          <x-table.body>
            @forelse ($this->updates as $upd)
              <tr class="transition-colors duration-150 hover:bg-gray-50">
                <x-table.td><span class="text-xs text-tei-gray-light whitespace-nowrap">{{ $upd->update_date->format('M j, Y') }}</span></x-table.td>
                <x-table.td><span class="font-semibold text-tei-blue-dark">{{ $upd->label }}</span></x-table.td>
                <x-table.td hidden="sm">
                  @if ($upd->file_name)
                    <span class="inline-flex items-center gap-1.5 text-xs text-success">
                      <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                      </svg>
                      {{ $upd->file_name }}
                    </span>
                  @else
                    <span class="text-xs text-warning font-semibold">No file uploaded</span>
                  @endif
                </x-table.td>
                <x-table.td align="center"><span class="text-tei-gray-light">{{ $upd->sort_order }}</span></x-table.td>
                <x-table.td align="right">
                  <div class="flex items-center justify-end gap-1">
                    <x-button-icon wire:click="openEditUpdate({{ $upd->id }})" title="Edit"
                      icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    <x-button-icon wire:click="confirmDelete('update', {{ $upd->id }})" title="Delete" variant="danger"
                      icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </div>
                </x-table.td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="px-5 py-12 text-center">
                  <div class="flex flex-col items-center gap-2">
                    <div class="size-10 rounded-2xl bg-tei-blue/6 flex items-center justify-center">
                      <svg class="size-5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                      </svg>
                    </div>
                    <p class="text-sm font-semibold text-tei-blue">No updates yet</p>
                    <p class="text-xs text-tei-gray-light">Add dated updates like Notice of Award or Errata.</p>
                  </div>
                </td>
              </tr>
            @endforelse
          </x-table.body>
        </x-table>
      </x-table-container>

    </div>
  @endif


  {{-- ═══════════════════════════════════════════════
     DRAWERS & MODALS
  ═══════════════════════════════════════════════ --}}

  {{-- ─── Bid drawer ─────────────────────────────── --}}
  <x-drawer show="showBidDrawer" close="$wire.closeBidDrawer()" width="max-w-lg">

    <x-drawer.header
      :title="$editBidId ? 'Edit Bid' : 'Add Bid'"
      subtitle="Manage basic bid information and publication settings."
      icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
      close="$wire.closeBidDrawer()" />

    <div class="px-6 py-5 space-y-5 overflow-y-auto flex-1">

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Bid Code <span class="text-danger">*</span></label>
        <input wire:model="bidCode" type="text" placeholder="TEI-CSP-OT-2025-001"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('bidCode')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Status <span class="text-danger">*</span></label>
        <select wire:model="bidStatus"
                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark outline-none cursor-pointer focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
          <option value="ongoing">Ongoing</option>
          <option value="completed">Completed</option>
          <option value="failed">Failed</option>
        </select>
        @error('bidStatus')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Title <span class="text-danger">*</span></label>
        <input wire:model="bidTitle" type="text" placeholder="BASELOAD POWER SUPPLY TO THE CAPTIVE MARKET OF TEI"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('bidTitle')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Date Posted <span class="text-danger">*</span></label>
        <input wire:model="bidPostedDate" type="date"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('bidPostedDate')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Contract Capacity Description</label>
        <p class="text-xs text-tei-gray-light mb-1.5">Optional. Fill this in only for bids that have an escalation table (Capacity Schedule rows). Leave blank for simple bids.</p>
        <textarea wire:model="bidContractDescription" rows="3" placeholder="10MW Supply from 26 December 2026 to 25 December 2041 with escalation…"
                  class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200 resize-none"></textarea>
        @error('bidContractDescription')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Sort Order</label>
        <input wire:model.number="bidSortOrder" type="number" min="0"
               class="w-32 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
      </div>

      <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">
        <div>
          <p class="text-sm font-semibold text-tei-blue">Published</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Visible on the public Power Supply Procurement page.</p>
        </div>
        <label class="relative inline-flex items-center cursor-pointer shrink-0">
          <input wire:model="bidIsPublished" type="checkbox" class="sr-only peer">
          <div class="w-10 h-5 rounded-full bg-gray-300 peer-checked:bg-success transition-colors duration-200
                      after:content-[''] after:absolute after:top-0.5 after:left-0.5
                      after:w-4 after:h-4 after:rounded-full after:bg-white after:shadow
                      after:transition-transform after:duration-200
                      peer-checked:after:translate-x-5">
          </div>
        </label>
      </div>

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeBidDrawer">Cancel</x-button>
      <x-button variant="primary" wire:click="saveBid" loading="Saving…">
        {{ $editBidId ? 'Save Changes' : 'Create Bid' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>

  {{-- ─── Capacity row drawer ─────────────────────── --}}
  <x-drawer show="showCapModal" close="$wire.closeCapModal()" width="max-w-md">

    <x-drawer.header
      :title="$editCapId ? 'Edit Capacity Row' : 'Add Capacity Row'"
      subtitle="Escalation table entry — Period From / To and MW."
      icon="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
      close="$wire.closeCapModal()" />

    <div class="px-6 py-5 space-y-5 overflow-y-auto flex-1">

      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Period From <span class="text-danger">*</span></label>
          <input wire:model="capPeriodFrom" type="text" placeholder="26-Dec-26"
                 class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
          @error('capPeriodFrom')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              {{ $message }}
            </p>
          @enderror
        </div>
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Period To <span class="text-danger">*</span></label>
          <input wire:model="capPeriodTo" type="text" placeholder="25-Dec-27"
                 class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
          @error('capPeriodTo')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              {{ $message }}
            </p>
          @enderror
        </div>
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Contracted Capacity (MW) <span class="text-danger">*</span></label>
        <input wire:model="capMw" type="text" placeholder="10"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('capMw')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Sort Order</label>
        <input wire:model.number="capSortOrder" type="number" min="0"
               class="w-32 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
      </div>

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeCapModal">Cancel</x-button>
      <x-button variant="primary" wire:click="saveCapacity" loading="Saving…">Save</x-button>
    </x-drawer.footer>

  </x-drawer>

  {{-- ─── Timeline row drawer ─────────────────────── --}}
  <x-drawer show="showTlModal" close="$wire.closeTlModal()" width="max-w-lg">

    <x-drawer.header
      :title="$editTlId ? 'Edit Timeline Row' : 'Add Timeline Row'"
      subtitle="Contract terms, dates, deadlines. Optional file or link."
      icon="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"
      close="$wire.closeTlModal()" />

    <div class="px-6 py-5 space-y-5 overflow-y-auto flex-1">

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Label <span class="text-danger">*</span></label>
        <input wire:model="tlLabel" type="text" placeholder="Date of Publication"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('tlLabel')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Value <span class="text-danger">*</span></label>
        <input wire:model="tlValue" type="text" placeholder="02 September 2025"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('tlValue')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Link URL <span class="text-xs font-normal text-tei-gray-light">(optional — external URL)</span>
        </label>
        <input wire:model="tlLinkUrl" type="url" placeholder="https://…"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('tlLinkUrl')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Attach PDF <span class="text-xs font-normal text-tei-gray-light">(optional — overrides link URL)</span>
        </label>
        @if ($tlHasFile && $editTlId)
          <div class="flex items-center gap-3 p-3 mb-3 bg-tei-surface rounded-xl border border-tei-blue/8">
            <svg class="w-4 h-4 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
            </svg>
            <span class="text-xs text-success flex-1">File attached</span>
            <button wire:click="removeTimelineFile({{ $editTlId }})" class="text-xs text-danger hover:underline cursor-pointer">Remove</button>
          </div>
        @endif
        <label for="tl-pdf"
          class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl transition-colors duration-150 cursor-pointer
                 {{ $tlFile ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
          <svg class="size-9 shrink-0 {{ $tlFile ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
          </svg>
          <div class="min-w-0 flex-1">
            @if ($tlFile)
              <p class="text-sm font-medium text-tei-orange truncate">{{ $tlFile->getClientOriginalName() }}</p>
              <p class="text-xs text-tei-gray-light mt-0.5">{{ number_format($tlFile->getSize() / 1024, 0) }} KB · click to change</p>
            @else
              <p class="text-sm font-medium text-tei-blue">Click to upload PDF</p>
              <p class="text-xs text-tei-gray-light mt-0.5">PDF only · Max 10 MB</p>
            @endif
          </div>
          <input id="tl-pdf" wire:model="tlFile" type="file" accept=".pdf" class="sr-only">
        </label>
        @error('tlFile')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Sort Order</label>
        <input wire:model.number="tlSortOrder" type="number" min="0"
               class="w-32 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
      </div>

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeTlModal">Cancel</x-button>
      <x-button variant="primary" wire:click="saveTimeline" loading="Saving…">Save</x-button>
    </x-drawer.footer>

  </x-drawer>

  {{-- ─── Document / Bid Bulletin drawer ─────────── --}}
  <x-drawer show="showDocModal" close="$wire.closeDocModal()" width="max-w-lg">

    <x-drawer.header
      :title="($editDocId ? 'Edit' : 'Add') . ' ' . ($docType === 'bid-bulletin' ? 'Bid Bulletin' : 'Document')"
      :subtitle="$docType === 'bid-bulletin' ? 'PDF bulletin shown in the Bid Bulletins section.' : 'PDF file shown in the Documents section.'"
      icon="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"
      close="$wire.closeDocModal()" />

    <div class="px-6 py-5 space-y-5 overflow-y-auto flex-1">

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Label <span class="text-danger">*</span></label>
        <input wire:model="docLabel" type="text" placeholder="Invitation to Bid (ITB) – 1st Round"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('docLabel')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          PDF File <span class="text-xs font-normal text-tei-gray-light">(optional)</span>
        </label>
        @if ($docHasFile && $editDocId)
          <div class="flex items-center gap-3 p-3 mb-3 bg-tei-surface rounded-xl border border-tei-blue/8">
            <svg class="w-4 h-4 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
            </svg>
            <span class="text-xs text-success flex-1">File attached</span>
            <button wire:click="removeDocFile({{ $editDocId }})" class="text-xs text-danger hover:underline cursor-pointer">Remove</button>
          </div>
        @endif
        <label for="doc-pdf"
          class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl transition-colors duration-150 cursor-pointer
                 {{ $docFile ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
          <svg class="size-9 shrink-0 {{ $docFile ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
          </svg>
          <div class="min-w-0 flex-1">
            @if ($docFile)
              <p class="text-sm font-medium text-tei-orange truncate">{{ $docFile->getClientOriginalName() }}</p>
              <p class="text-xs text-tei-gray-light mt-0.5">{{ number_format($docFile->getSize() / 1024, 0) }} KB · click to change</p>
            @else
              <p class="text-sm font-medium text-tei-blue">Click to upload PDF</p>
              <p class="text-xs text-tei-gray-light mt-0.5">PDF only · Max 10 MB</p>
            @endif
          </div>
          <input id="doc-pdf" wire:model="docFile" type="file" accept=".pdf" class="sr-only">
        </label>
        @error('docFile')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Sort Order</label>
        <input wire:model.number="docSortOrder" type="number" min="0"
               class="w-32 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
      </div>

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeDocModal">Cancel</x-button>
      <x-button variant="primary" wire:click="saveDoc" loading="Saving…">Save</x-button>
    </x-drawer.footer>

  </x-drawer>

  {{-- ─── Update drawer ───────────────────────────── --}}
  <x-drawer show="showUpdModal" close="$wire.closeUpdModal()" width="max-w-lg">

    <x-drawer.header
      :title="$editUpdId ? 'Edit Update' : 'Add Update'"
      subtitle="Dated updates: Notice of Award, Errata, and similar notices."
      icon="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
      close="$wire.closeUpdModal()" />

    <div class="px-6 py-5 space-y-5 overflow-y-auto flex-1">

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Date <span class="text-danger">*</span></label>
        <input wire:model="updDate" type="date"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('updDate')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Label <span class="text-danger">*</span></label>
        <input wire:model="updLabel" type="text" placeholder="Notice of Award"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
        @error('updLabel')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          PDF File <span class="text-xs font-normal text-tei-gray-light">(optional)</span>
        </label>
        @if ($updHasFile && $editUpdId)
          <div class="flex items-center gap-3 p-3 mb-3 bg-tei-surface rounded-xl border border-tei-blue/8">
            <svg class="w-4 h-4 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
            </svg>
            <span class="text-xs text-success flex-1">File attached</span>
            <button wire:click="removeUpdFile({{ $editUpdId }})" class="text-xs text-danger hover:underline cursor-pointer">Remove</button>
          </div>
        @endif
        <label for="upd-pdf"
          class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl transition-colors duration-150 cursor-pointer
                 {{ $updFile ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
          <svg class="size-9 shrink-0 {{ $updFile ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
          </svg>
          <div class="min-w-0 flex-1">
            @if ($updFile)
              <p class="text-sm font-medium text-tei-orange truncate">{{ $updFile->getClientOriginalName() }}</p>
              <p class="text-xs text-tei-gray-light mt-0.5">{{ number_format($updFile->getSize() / 1024, 0) }} KB · click to change</p>
            @else
              <p class="text-sm font-medium text-tei-blue">Click to upload PDF</p>
              <p class="text-xs text-tei-gray-light mt-0.5">PDF only · Max 10 MB</p>
            @endif
          </div>
          <input id="upd-pdf" wire:model="updFile" type="file" accept=".pdf" class="sr-only">
        </label>
        @error('updFile')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Sort Order</label>
        <input wire:model.number="updSortOrder" type="number" min="0"
               class="w-32 px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm outline-none focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15 transition-all duration-200">
      </div>

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeUpdModal">Cancel</x-button>
      <x-button variant="primary" wire:click="saveUpdate" loading="Saving…">Save</x-button>
    </x-drawer.footer>

  </x-drawer>

  {{-- ─── Delete confirmation ─────────────────────── --}}
  <x-confirm-modal
      show="showDeleteModal"
      cancel="cancelDelete"
      title="Delete Item"
      message="This action cannot be undone.">
    <x-button variant="ghost" wire:click="cancelDelete">Cancel</x-button>
    <x-button loading="Deleting…" variant="danger" wire:click="delete">Yes, Delete</x-button>
  </x-confirm-modal>

</div>
