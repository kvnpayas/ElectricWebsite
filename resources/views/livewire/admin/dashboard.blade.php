<div>

  {{-- ── Greeting ─────────────────────────────────────────── --}}
  <div class="admin-page-header mb-6 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
    <div>
      <h1 class="text-2xl font-black text-tei-blue-dark font-display">
        Good {{ now()->hour < 12 ? 'morning' : (now()->hour < 18 ? 'afternoon' : 'evening') }}, {{ $userName }}
      </h1>
      <p class="text-sm mt-0.5 text-tei-gray">
        {{ now()->format('l, F j, Y') }} — Here's an overview of the TEI platform.
      </p>
    </div>
  </div>


  {{-- ── Stat cards ──────────────────────────────────────── --}}
  <div class="grid grid-cols-2 xl:grid-cols-4 gap-4 mb-6">

    <x-stat-card
      color="tei-blue"
      icon="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
      :value="$userCount"
      label="Admin Users"
      trend="System accounts"
    />

    <x-stat-card
      color="tei-orange"
      icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
      :value="$publishedDocs"
      label="Published Documents"
      trend="Advisories & rate schedules"
    />

    <x-stat-card
      :color="$interruptionTotal > 0 ? 'warning' : 'success'"
      icon="M13 10V3L4 14h7v7l9-11h-7z"
      :value="$interruptionTotal"
      label="Power Interruptions"
      :trend="$ongoingCount . ' ongoing · ' . $scheduledCount . ' scheduled'"
    />

    <x-stat-card
      :color="$streamEnabled ? 'danger' : 'tei-gray'"
      icon="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"
      :value="$streamEnabled ? 'Live' : 'Offline'"
      label="Livestream"
      :trend="$streamEnabled ? 'Stream is active' : 'No active stream'"
    />

  </div>


  {{-- ── Quick Access ─────────────────────────────────────── --}}
  <div class="mb-6">
    <h2 class="text-xs font-bold uppercase tracking-widest text-tei-gray-light mb-3">Quick Access</h2>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-6 gap-3">
      @foreach ($modules as $module)
        <a href="{{ route($module['route']) }}" wire:navigate
          class="group flex flex-col items-center gap-2.5 bg-white rounded-2xl p-4 border border-tei-blue/8
                 hover:border-tei-orange/30 hover:shadow-lg hover:-translate-y-0.5
                 transition-all duration-200 text-center">
          <div class="w-11 h-11 rounded-xl flex items-center justify-center shrink-0 {{ $module['iconBg'] }} transition-colors duration-200 group-hover:scale-110">
            <svg class="w-5 h-5 {{ $module['iconColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="{{ $module['icon'] }}" />
            </svg>
          </div>
          <div class="min-w-0 w-full">
            <p class="text-xs font-bold text-tei-blue-dark leading-snug">{{ $module['label'] }}</p>
            <p class="text-[10px] text-tei-gray-light mt-0.5 leading-snug">{{ $module['sub'] }}</p>
          </div>
        </a>
      @endforeach
    </div>
  </div>


  {{-- ── Two-column: Activity Log + Site Status ─────────── --}}
  <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">

    {{-- Activity Log (wider) --}}
    <div class="xl:col-span-2 bg-white rounded-2xl border border-tei-blue/8 overflow-hidden shadow-sm">
      <div class="flex items-center justify-between px-5 py-4 border-b border-tei-blue/6">
        <div>
          <p class="text-sm font-bold text-tei-blue-dark">Recent Activity</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Last 8 actions across all modules</p>
        </div>
        <a href="{{ route('admin.activity-log') }}" wire:navigate
          class="text-xs font-bold px-3 py-1.5 rounded-lg bg-tei-orange/8 text-tei-orange hover:bg-tei-orange/15 transition-colors duration-150">
          View all
        </a>
      </div>

      @if ($recentActivity->isEmpty())
        <div class="flex flex-col items-center justify-center py-14 text-center">
          <div class="w-12 h-12 rounded-2xl bg-tei-blue/5 flex items-center justify-center mb-3">
            <svg class="w-6 h-6 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>
          </div>
          <p class="text-sm font-semibold text-tei-blue">No activity yet</p>
        </div>
      @else
        @php
          $actionBadge = [
            'login'   => ['bg-info/10',    'text-info'],
            'created' => ['bg-success/10', 'text-success'],
            'updated' => ['bg-warning/10', 'text-warning'],
            'deleted' => ['bg-danger/10',  'text-danger'],
          ];
        @endphp
        <ul class="divide-y divide-tei-blue/[0.04]">
          @foreach ($recentActivity as $log)
            @php [$badgeBg, $badgeText] = $actionBadge[$log->action] ?? ['bg-tei-gray/10', 'text-tei-gray']; @endphp
            <li class="flex items-center gap-3 px-5 py-3 hover:bg-tei-blue/[0.02] transition-colors duration-100">
              {{-- Avatar --}}
              <div class="w-8 h-8 rounded-full bg-tei-blue/10 flex items-center justify-center shrink-0 text-xs font-bold text-tei-blue">
                {{ strtoupper(substr($log->user_name ?? 'S', 0, 1)) }}
              </div>
              {{-- Detail --}}
              <div class="min-w-0 flex-1">
                <p class="text-sm text-tei-blue-dark leading-snug">
                  <span class="font-semibold">{{ $log->user_name ?? 'System' }}</span>
                  @if ($log->subject_label)
                    <span class="text-tei-gray"> — {{ $log->subject_label }}</span>
                  @endif
                </p>
                <p class="text-xs text-tei-gray-light mt-0.5">{{ $log->created_at?->diffForHumans() }}</p>
              </div>
              {{-- Action badge --}}
              <span class="shrink-0 text-[10px] font-bold px-2 py-0.5 rounded-full {{ $badgeBg }} {{ $badgeText }}">
                {{ ucfirst($log->action) }}
              </span>
            </li>
          @endforeach
        </ul>
      @endif
    </div>

    {{-- Site Status (narrower) --}}
    <div class="flex flex-col gap-4">

      {{-- Livestream status --}}
      <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-tei-blue/6">
          <p class="text-sm font-bold text-tei-blue-dark">Livestream</p>
        </div>
        <div class="px-5 py-4 flex items-center justify-between">
          <div class="flex items-center gap-2.5">
            <span class="relative flex size-2.5">
              @if ($streamEnabled)
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-danger opacity-75"></span>
              @endif
              <span class="relative inline-flex size-2.5 rounded-full {{ $streamEnabled ? 'bg-danger' : 'bg-tei-gray-light' }}"></span>
            </span>
            <span class="text-sm font-semibold {{ $streamEnabled ? 'text-danger' : 'text-tei-gray' }}">
              {{ $streamEnabled ? 'Live Now' : 'Offline' }}
            </span>
          </div>
          <a href="{{ route('admin.media-library') }}" wire:navigate
            class="text-xs font-bold text-tei-orange hover:underline">
            Manage
          </a>
        </div>
      </div>

      {{-- Power Interruptions --}}
      <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-tei-blue/6 flex items-center justify-between">
          <p class="text-sm font-bold text-tei-blue-dark">Power Interruptions</p>
          <a href="{{ route('admin.power-interruption') }}" wire:navigate
            class="text-xs font-bold text-tei-orange hover:underline">
            Manage
          </a>
        </div>
        <div class="divide-y divide-tei-blue/[0.04]">
          <div class="flex items-center justify-between px-5 py-3">
            <div class="flex items-center gap-2">
              <span class="size-2 rounded-full bg-danger"></span>
              <span class="text-sm text-tei-blue-dark">Ongoing</span>
            </div>
            <span class="text-sm font-bold {{ $ongoingCount > 0 ? 'text-danger' : 'text-tei-gray-light' }}">
              {{ $ongoingCount }}
            </span>
          </div>
          <div class="flex items-center justify-between px-5 py-3">
            <div class="flex items-center gap-2">
              <span class="size-2 rounded-full bg-warning"></span>
              <span class="text-sm text-tei-blue-dark">Scheduled</span>
            </div>
            <span class="text-sm font-bold {{ $scheduledCount > 0 ? 'text-warning' : 'text-tei-gray-light' }}">
              {{ $scheduledCount }}
            </span>
          </div>
        </div>
      </div>

      {{-- Module count summary --}}
      <div class="bg-white rounded-2xl border border-tei-blue/8 shadow-sm overflow-hidden">
        <div class="px-5 py-4 border-b border-tei-blue/6">
          <p class="text-sm font-bold text-tei-blue-dark">Content Summary</p>
        </div>
        <div class="divide-y divide-tei-blue/[0.04]">
          <div class="flex items-center justify-between px-5 py-3">
            <span class="text-sm text-tei-blue-dark">Published Advisories</span>
            <span class="text-sm font-bold text-tei-blue">{{ $publishedDocs }}</span>
          </div>
          <div class="flex items-center justify-between px-5 py-3">
            <span class="text-sm text-tei-blue-dark">Admin Users</span>
            <span class="text-sm font-bold text-tei-blue">{{ $userCount }}</span>
          </div>
        </div>
      </div>

    </div>
  </div>

</div>
