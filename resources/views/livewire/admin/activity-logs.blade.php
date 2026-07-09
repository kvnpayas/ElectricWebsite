<div>

  <x-admin.partials.page-header
      title="Activity Log"
      subtitle="Track admin logins and all record create, update, and delete actions across the system." />


  {{-- ─── Filters ─────────────────────────────────────────── --}}
  <x-table-container title="Activity Log" :count="$this->logs->total()">

    <x-slot:toolbar>

      {{-- User search --}}
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input wire:model.live.debounce.300ms="search" type="search" placeholder="Search user…"
          class="pl-9 pr-4 py-2 w-44 text-sm rounded-xl border border-gray-200 bg-gray-50 text-gray-900
                 outline-none transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
      </div>

      {{-- Action filter --}}
      <select wire:model.live="actionFilter"
        class="py-2 pl-3 pr-8 text-sm rounded-xl border border-gray-200 bg-gray-50 text-tei-gray
               outline-none cursor-pointer transition-all duration-200
               focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15">
        <option value="all">All Actions</option>
        <option value="login">Login</option>
        <option value="created">Created</option>
        <option value="updated">Updated</option>
        <option value="deleted">Deleted</option>
      </select>

      {{-- Date range --}}
      <input wire:model.live="dateFrom" type="date"
        class="py-2 px-3 text-sm rounded-xl border border-gray-200 bg-gray-50 text-tei-gray
               outline-none transition-all duration-200
               focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15"
        placeholder="From">
      <input wire:model.live="dateTo" type="date"
        class="py-2 px-3 text-sm rounded-xl border border-gray-200 bg-gray-50 text-tei-gray
               outline-none transition-all duration-200
               focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15"
        placeholder="To">

    </x-slot:toolbar>

    <x-table>
      <x-table.head>
        <x-table.th>User</x-table.th>
        <x-table.th>Action</x-table.th>
        <x-table.th hidden="sm">Subject</x-table.th>
        <x-table.th hidden="md">IP Address</x-table.th>
        <x-table.th align="right">Date & Time</x-table.th>
      </x-table.head>

      <x-table.body>
        @forelse ($this->logs as $log)
          <tr class="transition-colors duration-150 hover:bg-gray-50">

            {{-- User --}}
            <x-table.td>
              <div class="flex items-center gap-2.5">
                <div class="size-7 rounded-full flex items-center justify-center text-white text-[10px] font-bold shrink-0"
                     style="background: linear-gradient(135deg, #082840, #0e4060);">
                  {{ strtoupper(substr($log->user_name ?? '?', 0, 1)) }}
                </div>
                <span class="text-sm font-semibold text-tei-blue-dark">{{ $log->user_name ?? '—' }}</span>
              </div>
            </x-table.td>

            {{-- Action badge --}}
            <x-table.td>
              @php
                [$cls, $label] = match ($log->action) {
                    'login'   => ['bg-tei-blue/10 text-tei-blue',   'Login'],
                    'created' => ['bg-success/10 text-success',      'Created'],
                    'updated' => ['bg-warning/10 text-warning',      'Updated'],
                    'deleted' => ['bg-danger/10 text-danger',        'Deleted'],
                    default   => ['bg-gray-100 text-tei-gray',       ucfirst($log->action)],
                };
              @endphp
              <span class="inline-flex items-center gap-1 text-xs font-bold px-2.5 py-1 rounded-full {{ $cls }}">
                {{ $label }}
              </span>
            </x-table.td>

            {{-- Subject --}}
            <x-table.td hidden="sm">
              @if ($log->subject_type)
                <p class="text-xs font-semibold text-tei-blue-dark">{{ $log->subject_type }}</p>
                @if ($log->subject_label)
                  <p class="text-xs text-tei-gray-light mt-0.5 truncate max-w-48">{{ $log->subject_label }}</p>
                @endif
              @else
                <span class="text-xs text-tei-gray-light italic">—</span>
              @endif
            </x-table.td>

            {{-- IP --}}
            <x-table.td hidden="md">
              <span class="text-xs font-mono text-tei-gray">{{ $log->ip_address ?? '—' }}</span>
            </x-table.td>

            {{-- Date & time --}}
            <x-table.td align="right">
              <p class="text-xs font-semibold text-tei-blue-dark">{{ $log->created_at->format('M j, Y') }}</p>
              <p class="text-xs text-tei-gray-light">{{ $log->created_at->format('g:i A') }}</p>
            </x-table.td>

          </tr>
        @empty
          <tr>
            <td colspan="5" class="px-5 py-14 text-center">
              <div class="flex flex-col items-center gap-3">
                <div class="size-12 rounded-2xl bg-tei-blue/6 flex items-center justify-center">
                  <svg class="size-6 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                      d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                  </svg>
                </div>
                <p class="text-sm font-semibold text-tei-blue">No activity found</p>
                <p class="text-xs text-tei-gray-light">Try adjusting your filters.</p>
              </div>
            </td>
          </tr>
        @endforelse
      </x-table.body>
    </x-table>

    {{-- Pagination --}}
    @if ($this->logs->hasPages())
      <div class="px-5 py-4 border-t border-gray-100">
        {{ $this->logs->links() }}
      </div>
    @endif

  </x-table-container>

</div>
