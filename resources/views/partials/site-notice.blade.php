@php
    use App\Models\Setting;
    use Carbon\Carbon;

    $enabled     = Setting::get('notice_enabled', '0') === '1';
    $message     = Setting::get('notice_message', '');
    $type        = Setting::get('notice_type', 'info');
    $expiresAt   = Setting::get('notice_expires_at', '');
    $dismissible = Setting::get('notice_dismissible', '1') === '1';

    if ($expiresAt) {
        $enabled = $enabled && now()->lt(Carbon::parse($expiresAt));
    }
@endphp

@if ($enabled && $message)
  @php
    $version   = Setting::get('notice_version', '1');
    $noticeKey = 'tei-notice-v' . $version;

    [$bgStyle, $textClass, $closeClass, $iconPath] = match ($type) {
        'warning' => [
            'background-color:#d97706; color:#fff;',
            'text-white',
            'text-white/80 hover:text-white',
            'M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z',
        ],
        'alert' => [
            'background-color:#dc2626; color:#fff;',
            'text-white',
            'text-white/80 hover:text-white',
            'M13 10V3L4 14h7v7l9-11h-7z',
        ],
        default => [
            'background-color:#e8f0f7; color:#082840;',
            'text-tei-blue',
            'text-tei-blue/50 hover:text-tei-blue',
            'M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
    };
  @endphp

  <div
    x-data="{ show: localStorage.getItem('{{ $noticeKey }}') !== 'true' }"
    x-show="show"
    x-cloak
    style="{{ $bgStyle }}"
    class="w-full">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-2 flex items-center gap-3">

      <svg class="w-4 h-4 shrink-0 {{ $textClass }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $iconPath }}" />
      </svg>

      <p class="flex-1 text-xs font-medium {{ $textClass }}">{{ $message }}</p>

      @if ($dismissible)
        <button
          @click="show = false; localStorage.setItem('{{ $noticeKey }}', 'true')"
          class="shrink-0 size-5 rounded-full flex items-center justify-center transition-colors duration-150 cursor-pointer {{ $closeClass }}"
          aria-label="Dismiss">
          <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      @endif

    </div>
  </div>
@endif
