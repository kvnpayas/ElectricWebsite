<div>

  <x-admin.partials.page-header
    title="Procurement Opportunities"
    subtitle="Manage ERC-compliant procurement bids, documents, and global download forms." />


  {{-- ── STAT CARDS ──────────────────────────────────────────── --}}
  <div class="grid grid-cols-2 sm:grid-cols-5 gap-4 mb-6">

    <x-stat-card
      wire:click="setStatusFilter('all')"
      :value="$this->counts['total']"
      label="Total"
      color="tei-blue"
      icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
      class="cursor-pointer {{ $statusFilter === 'all' ? 'ring-2 ring-tei-blue/30' : '' }}" />

    <x-stat-card
      wire:click="setStatusFilter('ongoing')"
      :value="$this->counts['ongoing']"
      label="Open"
      color="tei-orange"
      icon="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
      class="cursor-pointer {{ $statusFilter === 'ongoing' ? 'ring-2 ring-tei-orange/30' : '' }}" />

    <x-stat-card
      wire:click="setStatusFilter('awarded')"
      :value="$this->counts['awarded']"
      label="Awarded"
      color="info"
      icon="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
      class="cursor-pointer {{ $statusFilter === 'awarded' ? 'ring-2 ring-info/30' : '' }}" />

    <x-stat-card
      wire:click="setStatusFilter('bid_failure')"
      :value="$this->counts['bid_failure']"
      label="Bid Failure"
      color="danger"
      icon="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"
      class="cursor-pointer {{ $statusFilter === 'bid_failure' ? 'ring-2 ring-danger/30' : '' }}" />

    <x-stat-card
      wire:click="setStatusFilter('cancelled')"
      :value="$this->counts['cancelled']"
      label="Cancelled"
      color="tei-gray"
      icon="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
      class="cursor-pointer {{ $statusFilter === 'cancelled' ? 'ring-2 ring-tei-gray/30' : '' }}" />

  </div>


  {{-- ── OPPORTUNITIES TABLE ─────────────────────────────────── --}}
  <x-table-container title="Procurement Opportunities" :count="$this->opportunities->total()" class="mb-6">

    <x-slot:toolbar>
      {{-- Search --}}
      <div class="relative flex-1 max-w-xs">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
          <svg class="size-4 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z" />
          </svg>
        </div>
        <input
          wire:model.live.debounce.300ms="search"
          type="search"
          placeholder="Search code or title…"
          class="w-full rounded-xl border border-gray-200 bg-gray-50 pl-9 pr-4 py-2 text-sm text-tei-blue placeholder-tei-gray-light focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/30 transition" />
      </div>
      <x-button variant="secondary" wire:click="openAddOpp"
        icon="M12 4v16m8-8H4">
        Add Opportunity
      </x-button>
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
        @forelse ($this->opportunities as $opp)
          @php
            [$statusBg, $statusText, $statusLabel] = match($opp->status) {
              'awarded'     => ['bg-info/10',    'text-info',           'Awarded'],
              'bid_failure' => ['bg-danger/10',  'text-danger',         'Bid Failure'],
              'cancelled'   => ['bg-gray-100',   'text-tei-gray-light', 'Cancelled'],
              default       => ['bg-tei-orange/10', 'text-tei-orange',  'Open'],
            };
          @endphp
          <tr class="transition-colors duration-150 hover:bg-gray-50">
            <x-table.td>
              <span class="font-mono text-xs font-bold text-tei-blue">{{ $opp->code }}</span>
            </x-table.td>
            <x-table.td>
              <p class="text-sm text-tei-blue font-medium leading-snug max-w-xs truncate" title="{{ $opp->title }}">
                {{ $opp->title }}
              </p>
            </x-table.td>
            <x-table.td hidden="sm">
              <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold {{ $statusBg }} {{ $statusText }}">
                <span class="size-1.5 rounded-full bg-current"></span>
                {{ $statusLabel }}
              </span>
            </x-table.td>
            <x-table.td hidden="md">
              <span class="text-xs text-tei-gray">{{ $opp->posting_date->format('d M Y') }}</span>
            </x-table.td>
            <x-table.td align="center">
              <label class="relative inline-flex items-center cursor-pointer shrink-0">
                <input wire:click="togglePublished({{ $opp->id }})" type="checkbox"
                  {{ $opp->is_published ? 'checked' : '' }} class="sr-only peer">
                <div class="w-10 h-5 rounded-full bg-gray-300 peer-checked:bg-success transition-colors duration-200
                            after:content-[''] after:absolute after:top-0.5 after:left-0.5
                            after:w-4 after:h-4 after:rounded-full after:bg-white after:shadow
                            after:transition-transform after:duration-200
                            peer-checked:after:translate-x-5">
                </div>
              </label>
            </x-table.td>
            <x-table.td align="right">
              <div class="flex items-center justify-end gap-1">
                <x-button-icon wire:click="openEditOpp({{ $opp->id }})" title="Edit"
                  icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete('opportunity', {{ $opp->id }})" title="Delete"
                  variant="danger"
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
                <p class="text-sm font-semibold text-tei-blue">No opportunities found</p>
              </div>
            </td>
          </tr>
        @endforelse
      </x-table.body>
    </x-table>

    @if ($this->opportunities->hasPages())
      <div class="px-5 py-4 border-t border-gray-100">
        {{ $this->opportunities->links() }}
      </div>
    @endif

  </x-table-container>


  {{-- ── GLOBAL DOWNLOADS TABLE ──────────────────────────────── --}}
  <x-table-container title="Global Downloads" subtitle="Procurement forms available to all bidders"
    :count="$this->globalDownloads->count()" class="scroll-reveal">

    <x-slot:toolbar>
      <x-button variant="secondary" wire:click="openAddGd"
        icon="M12 4v16m8-8H4">
        Add Download
      </x-button>
    </x-slot:toolbar>

    <x-table>
      <x-table.head>
        <x-table.th>Label</x-table.th>
        <x-table.th hidden="sm">File</x-table.th>
        <x-table.th align="right">Actions</x-table.th>
      </x-table.head>
      <x-table.body>
        @forelse ($this->globalDownloads as $gd)
          <tr class="transition-colors duration-150 hover:bg-gray-50">
            <x-table.td>
              <span class="text-sm font-medium text-tei-blue">{{ $gd->label }}</span>
            </x-table.td>
            <x-table.td hidden="sm">
              @if ($gd->file_path)
                <a href="{{ Storage::url($gd->file_path) }}" target="_blank"
                  class="inline-flex items-center gap-1.5 text-xs font-semibold text-tei-orange hover:underline">
                  <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  {{ $gd->file_name }}
                </a>
              @else
                <span class="text-xs text-tei-gray-light italic">No file uploaded</span>
              @endif
            </x-table.td>
            <x-table.td align="right">
              <div class="flex items-center justify-end gap-1">
                <x-button-icon wire:click="openEditGd({{ $gd->id }})" title="Edit"
                  icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete('global-download', {{ $gd->id }})" title="Delete"
                  variant="danger"
                  icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </div>
            </x-table.td>
          </tr>
        @empty
          <tr>
            <td colspan="3" class="px-5 py-10 text-center">
              <p class="text-sm text-tei-gray-light">No downloads added yet.</p>
            </td>
          </tr>
        @endforelse
      </x-table.body>
    </x-table>

  </x-table-container>


  {{-- ════════════════════════════════════════════════════
       OPPORTUNITY DRAWER (Add / Edit)
  ════════════════════════════════════════════════════ --}}
  <x-drawer show="showOppDrawer" close="closeOppDrawer" width="max-w-xl">

    <x-drawer.header
      :title="$editOppId ? 'Edit Opportunity' : 'Add Opportunity'"
      :subtitle="$editOppId ? 'Update bid details and manage documents.' : 'Fill in the details for the new bid.'"
      icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
      close="closeOppDrawer" />

    <div class="flex-1 overflow-y-auto px-6 py-5 space-y-5">

      {{-- Code + Status --}}
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Bid Code <span class="text-danger">*</span></label>
          <input wire:model="oppCode" type="text" placeholder="TEI-ePROC-2025-001"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
          @error('oppCode')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>{{ $message }}
            </p>
          @enderror
        </div>
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Status <span class="text-danger">*</span></label>
          <select wire:model="oppStatus"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition bg-white">
            <option value="ongoing">Open</option>
            <option value="awarded">Awarded</option>
            <option value="bid_failure">Bid Failure</option>
            <option value="cancelled">Cancelled</option>
          </select>
          @error('oppStatus')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>{{ $message }}
            </p>
          @enderror
        </div>
      </div>

      {{-- Title --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Title <span class="text-danger">*</span></label>
        <textarea wire:model="oppTitle" rows="3" placeholder="Full title of the procurement bid…"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition resize-none"></textarea>
        @error('oppTitle')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>{{ $message }}
          </p>
        @enderror
      </div>

      {{-- Posting Date + Sort Order --}}
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Posting Date <span class="text-danger">*</span></label>
          <input wire:model="oppPostingDate" type="date"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
          @error('oppPostingDate')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>{{ $message }}
            </p>
          @enderror
        </div>
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Sort Order</label>
          <input wire:model="oppSortOrder" type="number" min="0"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
        </div>
      </div>

      {{-- Timeline fields --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Pre-Bid Conference</label>
        <input wire:model="oppPreBidConference" type="text"
          placeholder="e.g. August 7, 2025, 10:30 AM via MS Teams"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">EOI Deadline</label>
        <input wire:model="oppEoiDeadline" type="text"
          placeholder="e.g. August 5, 2025, 5:00 PM"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
      </div>
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Bid Submission Deadline</label>
        <input wire:model="oppBidSubmissionDeadline" type="text"
          placeholder="e.g. August 22, 2025, 5:00 PM"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
      </div>

      {{-- Published --}}
      <div class="flex items-center justify-between py-3 border-t border-gray-100">
        <div>
          <p class="text-sm font-semibold text-tei-blue">Published</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Visible on the public procurement page</p>
        </div>
        <label class="relative inline-flex items-center cursor-pointer shrink-0">
          <input wire:model="oppIsPublished" type="checkbox" class="sr-only peer">
          <div class="w-10 h-5 rounded-full bg-gray-300 peer-checked:bg-success transition-colors duration-200
                      after:content-[''] after:absolute after:top-0.5 after:left-0.5
                      after:w-4 after:h-4 after:rounded-full after:bg-white after:shadow
                      after:transition-transform after:duration-200
                      peer-checked:after:translate-x-5">
          </div>
        </label>
      </div>

      {{-- Documents section — only shown when editing an existing opportunity --}}
      @if ($editOppId)
        <div class="border-t border-gray-100 pt-5">
          <div class="flex items-center justify-between mb-3">
            <div>
              <p class="text-sm font-bold text-tei-blue">Documents</p>
              <p class="text-xs text-tei-gray-light mt-0.5">{{ $this->activeOppDocuments->count() }} {{ Str::plural('document', $this->activeOppDocuments->count()) }}</p>
            </div>
            <button wire:click="openAddDoc"
              class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg bg-tei-blue/6 hover:bg-tei-blue/12 text-xs font-semibold text-tei-blue transition-colors duration-150 cursor-pointer">
              <svg class="size-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
              </svg>
              Add Document
            </button>
          </div>

          @if ($this->activeOppDocuments->isEmpty())
            <div class="rounded-xl border border-dashed border-gray-200 px-4 py-6 text-center">
              <p class="text-xs text-tei-gray-light">No documents yet. Click "Add Document" to attach one.</p>
            </div>
          @else
            <div class="rounded-xl border border-gray-100 overflow-hidden divide-y divide-gray-100">
              @foreach ($this->activeOppDocuments as $doc)
                <div class="flex items-center gap-3 px-4 py-3 {{ $loop->odd ? 'bg-white' : 'bg-gray-50/60' }}">
                  <div class="flex-1 min-w-0">
                    <p class="text-xs font-semibold text-tei-blue truncate">{{ $doc->label }}</p>
                    @if ($doc->file_path)
                      <a href="{{ Storage::url($doc->file_path) }}" target="_blank"
                        class="text-[11px] text-tei-orange hover:underline truncate block">{{ $doc->file_name }}</a>
                    @else
                      <span class="text-[11px] text-tei-gray-light italic">No file uploaded</span>
                    @endif
                  </div>
                  <div class="flex items-center gap-1 shrink-0">
                    <x-button-icon wire:click="openEditDoc({{ $doc->id }})" title="Edit"
                      icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    <x-button-icon wire:click="confirmDelete('document', {{ $doc->id }})" title="Delete"
                      variant="danger"
                      icon="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      @endif

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeOppDrawer">Cancel</x-button>
      <x-button loading="Saving…" variant="primary" wire:click="saveOpp">
        {{ $editOppId ? 'Save Changes' : 'Create Opportunity' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>


  {{-- ════════════════════════════════════════════════════
       DOCUMENT MODAL (nested above the drawer)
  ════════════════════════════════════════════════════ --}}
  <div
    x-data="{ open: @entangle('showDocModal') }"
    x-show="open" x-cloak
    class="fixed inset-0 flex items-center justify-center p-4"
    style="z-index: 60;">

    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"
      x-transition:enter="transition ease-out duration-150"
      x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
      x-transition:leave="transition ease-in duration-100"
      x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
      @click="$wire.closeDocModal()"></div>

    {{-- Panel --}}
    <div class="relative z-10 w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden"
      x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-150"
      x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
      @click.stop>

      {{-- Header --}}
      <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
        <div class="flex items-center gap-3">
          <div class="size-9 rounded-xl flex items-center justify-center bg-tei-orange/10">
            <svg class="size-5 text-tei-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <div>
            <h3 class="text-base font-bold text-tei-blue">{{ $editDocId ? 'Edit Document' : 'Add Document' }}</h3>
            <p class="text-xs text-tei-gray-light">Attach a PDF file to this bid</p>
          </div>
        </div>
        <button @click="$wire.closeDocModal()"
          class="size-8 rounded-lg flex items-center justify-center text-tei-gray-light hover:bg-gray-100 hover:text-tei-gray transition-colors cursor-pointer">
          <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      {{-- Body --}}
      <div class="px-6 py-5 space-y-4">

        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Label <span class="text-danger">*</span></label>
          <input wire:model="docLabel" type="text" placeholder="e.g. Invitation to Bid (ITB)"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
          @error('docLabel')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>{{ $message }}
            </p>
          @enderror
        </div>

        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Sort Order</label>
          <input wire:model="docSortOrder" type="number" min="0"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
        </div>

        {{-- File upload --}}
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">PDF File</label>
          @if ($docHasFile && ! $docFile)
            <div class="flex items-center justify-between px-4 py-3 rounded-xl border border-success/30 bg-success/5 mb-2">
              <div class="flex items-center gap-2">
                <svg class="size-4 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="text-xs font-semibold text-success">File already uploaded</span>
              </div>
              <button wire:click="removeDocFile({{ $editDocId }})"
                class="text-xs font-semibold text-danger hover:underline cursor-pointer">Remove</button>
            </div>
          @endif
          <label for="doc-pdf"
            class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl cursor-pointer {{ $docFile ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
            <svg class="size-9 shrink-0 {{ $docFile ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            <div class="min-w-0 flex-1">
              @if ($docFile)
                <p class="text-sm font-medium text-tei-orange truncate">{{ $docFile->getClientOriginalName() }}</p>
              @else
                <p class="text-sm font-medium text-tei-blue">Click to upload PDF</p>
                <p class="text-xs text-tei-gray-light mt-0.5">PDF only · Max 10 MB</p>
              @endif
            </div>
            <input id="doc-pdf" wire:model="docFile" type="file" accept=".pdf" class="sr-only">
          </label>
          @error('docFile')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>{{ $message }}
            </p>
          @enderror
        </div>

      </div>

      {{-- Footer --}}
      <div class="flex items-center justify-end gap-3 px-6 py-4 border-t border-gray-100">
        <x-button variant="ghost" wire:click="closeDocModal">Cancel</x-button>
        <x-button loading="Saving…" variant="primary" wire:click="saveDoc">Save Document</x-button>
      </div>

    </div>
  </div>


  {{-- ════════════════════════════════════════════════════
       GLOBAL DOWNLOAD DRAWER (Add / Edit)
  ════════════════════════════════════════════════════ --}}
  <x-drawer show="showGdDrawer" close="closeGdDrawer" width="max-w-md">

    <x-drawer.header
      :title="$editGdId ? 'Edit Download' : 'Add Download'"
      subtitle="Procurement form available to all bidders."
      icon="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
      close="closeGdDrawer" />

    <div class="flex-1 overflow-y-auto px-6 py-5 space-y-5">

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Label <span class="text-danger">*</span></label>
        <input wire:model="gdLabel" type="text" placeholder="e.g. Standard Application Form (SAF)"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
        @error('gdLabel')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>{{ $message }}
          </p>
        @enderror
      </div>

      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Sort Order</label>
        <input wire:model="gdSortOrder" type="number" min="0"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 text-sm text-tei-blue focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/40 transition" />
      </div>

      {{-- File upload --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">PDF File</label>
        @if ($gdHasFile && ! $gdFile)
          <div class="flex items-center justify-between px-4 py-3 rounded-xl border border-success/30 bg-success/5 mb-2">
            <div class="flex items-center gap-2">
              <svg class="size-4 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-xs font-semibold text-success">File already uploaded</span>
            </div>
            <button wire:click="removeGdFile({{ $editGdId }})"
              class="text-xs font-semibold text-danger hover:underline cursor-pointer">Remove</button>
          </div>
        @endif
        <label for="gd-pdf"
          class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl cursor-pointer {{ $gdFile ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
          <svg class="size-9 shrink-0 {{ $gdFile ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          <div class="min-w-0 flex-1">
            @if ($gdFile)
              <p class="text-sm font-medium text-tei-orange truncate">{{ $gdFile->getClientOriginalName() }}</p>
            @else
              <p class="text-sm font-medium text-tei-blue">Click to upload PDF</p>
              <p class="text-xs text-tei-gray-light mt-0.5">PDF only · Max 10 MB</p>
            @endif
          </div>
          <input id="gd-pdf" wire:model="gdFile" type="file" accept=".pdf" class="sr-only">
        </label>
        @error('gdFile')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>{{ $message }}
          </p>
        @enderror
      </div>

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeGdDrawer">Cancel</x-button>
      <x-button loading="Saving…" variant="primary" wire:click="saveGd">
        {{ $editGdId ? 'Save Changes' : 'Add Download' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>


  {{-- ── DELETE CONFIRM ──────────────────────────────────────── --}}
  <x-confirm-modal show="showDeleteModal" cancel="cancelDelete"
    title="Delete Item"
    message="This action cannot be undone. All associated files will also be removed.">
    <x-button variant="ghost" wire:click="cancelDelete">Cancel</x-button>
    <x-button loading="Deleting…" variant="danger" wire:click="delete">Yes, Delete</x-button>
  </x-confirm-modal>

</div>
