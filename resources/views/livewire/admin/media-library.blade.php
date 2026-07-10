<div>

  <x-admin.partials.page-header
      title="Media Library"
      subtitle="Manage your public livestream settings." />

  <div class="grid grid-cols-1 xl:grid-cols-2 gap-6">

    {{-- ── Livestream Settings ─────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
      <div class="px-5 py-4 border-b border-gray-100 flex items-center gap-2">
        <span class="inline-flex size-2 rounded-full {{ $streamEnabled ? 'bg-red-500 animate-pulse' : 'bg-gray-300' }}"></span>
        <p class="text-sm font-bold text-tei-blue">Livestream</p>
      </div>

      <div class="p-5 space-y-5">

        {{-- Enable toggle --}}
        <div class="flex items-center justify-between py-1">
          <div>
            <p class="text-sm font-semibold text-tei-blue">Enable Livestream</p>
            <p class="text-xs text-tei-gray mt-0.5">Shows the stream page and "Live" indicator on the navigation.</p>
          </div>
          <button wire:click="toggleStream" type="button"
                  class="relative inline-flex h-6 w-11 shrink-0 cursor-pointer rounded-full border-2 border-transparent
                         transition-colors duration-200 focus:outline-none
                         {{ $streamEnabled ? 'bg-red-500' : 'bg-gray-200' }}">
            <span class="pointer-events-none inline-block size-5 rounded-full bg-white shadow transform
                         transition duration-200 {{ $streamEnabled ? 'translate-x-5' : 'translate-x-0' }}"></span>
          </button>
        </div>

        {{-- Title --}}
        <div>
          <label class="block text-xs font-semibold text-tei-blue mb-1.5">Stream Title</label>
          <input wire:model="streamTitle" type="text"
                 placeholder="e.g. Public Hearing on Rate Adjustment"
                 class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        placeholder:text-tei-gray-light outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15" />
          @error('streamTitle')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>

        {{-- YouTube URL --}}
        <div>
          <label class="block text-xs font-semibold text-tei-blue mb-1.5">YouTube URL</label>
          <input wire:model.live="streamUrl" type="url"
                 placeholder="https://www.youtube.com/live/..."
                 class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                        placeholder:text-tei-gray-light outline-none transition-all duration-200
                        focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15" />
          <p class="mt-1.5 text-[11px] text-tei-gray">
            Accepts: <span class="font-mono">youtube.com/watch?v=</span>, <span class="font-mono">youtu.be/</span>, <span class="font-mono">youtube.com/live/</span>
          </p>
          @error('streamUrl')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>

        {{-- Description --}}
        <div>
          <label class="block text-xs font-semibold text-tei-blue mb-1.5">Description <span class="text-tei-gray font-normal">(optional)</span></label>
          <textarea wire:model="streamDescription" rows="3"
                    placeholder="Brief description of what viewers will watch…"
                    class="w-full px-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                           placeholder:text-tei-gray-light resize-none outline-none transition-all duration-200
                           focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15"></textarea>
          @error('streamDescription')
            <p class="mt-1 text-xs text-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="flex justify-end pt-1">
          <x-button variant="primary" wire:click="saveStream" loading="Saving…">Save Livestream</x-button>
        </div>

      </div>
    </div>

    {{-- ── Preview ──────────────────────────────────────── --}}
    <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
      <div class="px-5 py-4 border-b border-gray-100">
        <p class="text-sm font-bold text-tei-blue">Preview</p>
      </div>

      <div class="p-5">
        @if ($embedUrl)
          <div class="rounded-xl overflow-hidden" style="aspect-ratio:16/9;">
            <iframe src="{{ $embedUrl }}"
                    class="w-full h-full"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
          </div>
          @if ($streamTitle)
            <p class="mt-3 text-sm font-bold text-tei-blue">{{ $streamTitle }}</p>
          @endif
          @if ($streamDescription)
            <p class="mt-1 text-xs text-tei-gray leading-relaxed">{{ $streamDescription }}</p>
          @endif
        @else
          <div class="flex flex-col items-center justify-center py-16 text-center" style="aspect-ratio:16/9;">
            <div class="size-12 rounded-2xl flex items-center justify-center mb-3" style="background:rgba(15,61,92,0.06)">
              <svg class="size-6 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
              </svg>
            </div>
            <p class="text-sm font-semibold text-tei-blue">No preview</p>
            <p class="text-xs text-tei-gray mt-1">Enter a YouTube URL to see a preview.</p>
          </div>
        @endif
      </div>
    </div>

  </div>

</div>
