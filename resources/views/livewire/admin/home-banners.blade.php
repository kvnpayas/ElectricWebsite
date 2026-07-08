<div>

  <x-admin.partials.page-header
    title="Homepage Banners"
    subtitle="Manage the hero carousel slides shown on the homepage." />


  {{-- ── BANNERS TABLE ────────────────────────────────────────── --}}
  <x-table-container title="Banners" :count="$this->banners->total()">

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
          placeholder="Search headline or label…"
          class="w-full rounded-xl border border-gray-200 bg-gray-50 pl-9 pr-4 py-2 text-sm text-tei-blue placeholder-tei-gray-light focus:outline-none focus:ring-2 focus:ring-tei-blue/20 focus:border-tei-blue/30 transition" />
      </div>

      {{-- Status filter --}}
      <select wire:model.live="statusFilter"
        class="py-2 pl-3 pr-8 text-sm rounded-xl border border-gray-200 bg-gray-50 text-tei-gray
               outline-none cursor-pointer transition-all duration-200
               focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15">
        <option value="all">All Status</option>
        <option value="published">Published</option>
        <option value="draft">Draft</option>
      </select>

      <x-button variant="secondary" wire:click="openAdd" icon="M12 4v16m8-8H4">Add Banner</x-button>
    </x-slot:toolbar>

    <x-table>
      <x-table.head>
        <x-table.th>Headline</x-table.th>
        <x-table.th hidden="sm">Label</x-table.th>
        <x-table.th hidden="md">CTA</x-table.th>
        <x-table.th align="center">Published</x-table.th>
        <x-table.th align="right">Actions</x-table.th>
      </x-table.head>

      <x-table.body>
        @forelse ($this->banners as $banner)
          <tr class="transition-colors duration-150 hover:bg-gray-50">

            {{-- Headline + thumbnail --}}
            <x-table.td>
              <div class="flex items-center gap-3">
                @if ($banner->image_path || $banner->bg_image_path)
                  @php $thumb = $banner->image_path ?? $banner->bg_image_path; @endphp
                  <div class="size-10 rounded-lg overflow-hidden border border-gray-200 bg-gray-50 shrink-0">
                    <img src="{{ Storage::url($thumb) }}" alt="" class="w-full h-full object-cover" />
                  </div>
                @else
                  <div class="size-10 rounded-lg border border-dashed border-gray-200 bg-gray-50 flex items-center justify-center shrink-0">
                    <svg class="size-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                  </div>
                @endif
                <div class="min-w-0">
                  <p class="font-semibold text-sm text-tei-blue-dark leading-snug line-clamp-2">
                    {{ $banner->headline }}
                  </p>
                  @if ($banner->sub)
                    <p class="text-xs mt-0.5 line-clamp-1 text-tei-gray-light">{{ $banner->sub }}</p>
                  @endif
                </div>
              </div>
            </x-table.td>

            {{-- Label --}}
            <x-table.td hidden="sm">
              <span class="text-xs text-tei-gray">{{ $banner->label ?: '—' }}</span>
            </x-table.td>

            {{-- CTA --}}
            <x-table.td hidden="md">
              @if ($banner->cta_text)
                <span class="inline-flex items-center text-xs font-semibold px-2.5 py-1 rounded-full bg-tei-orange/10 text-tei-orange truncate">
                  {{ $banner->cta_text }}
                </span>
              @else
                <span class="text-xs text-tei-gray-light">—</span>
              @endif
            </x-table.td>

            {{-- Published toggle --}}
            <x-table.td align="center">
              <label class="relative inline-flex items-center cursor-pointer shrink-0">
                <input wire:click="togglePublished({{ $banner->id }})" type="checkbox"
                  {{ $banner->is_published ? 'checked' : '' }} class="sr-only peer">
                <div class="w-10 h-5 rounded-full bg-gray-300 peer-checked:bg-success transition-colors duration-200
                            after:content-[''] after:absolute after:top-0.5 after:left-0.5
                            after:w-4 after:h-4 after:rounded-full after:bg-white after:shadow
                            after:transition-transform after:duration-200
                            peer-checked:after:translate-x-5">
                </div>
              </label>
            </x-table.td>

            {{-- Actions --}}
            <x-table.td align="right">
              <div class="flex items-center justify-end gap-1">
                <x-button-icon wire:click="openEdit({{ $banner->id }})" title="Edit"
                  icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete({{ $banner->id }})" title="Delete" variant="danger"
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
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
                <p class="text-sm font-semibold text-tei-blue">No banners yet</p>
                <p class="text-xs text-tei-gray-light">Click "Add Banner" to create the first carousel slide.</p>
              </div>
            </td>
          </tr>
        @endforelse
      </x-table.body>
    </x-table>

    @if ($this->banners->hasPages())
      <div class="px-5 py-4 border-t border-gray-100">
        {{ $this->banners->links() }}
      </div>
    @endif

  </x-table-container>


  {{-- ════════════════════════════════════════════════════
       ADD / EDIT DRAWER
  ════════════════════════════════════════════════════ --}}
  <x-drawer show="showDrawer" close="closeDrawer" width="max-w-xl">

    <x-drawer.header
      :title="$editId ? 'Edit Banner' : 'Add Banner'"
      :subtitle="$editId ? 'Update the slide content and images.' : 'Fill in the details for the new carousel slide.'"
      icon="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
      close="closeDrawer" />

    <div class="flex-1 overflow-y-auto px-6 py-5 space-y-5">

      {{-- Label --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Label
          <span class="ml-1 text-xs font-normal text-tei-gray-light">optional — small text above headline</span>
        </label>
        <input wire:model="bannerLabel" type="text" maxlength="100"
          placeholder="e.g. Powering Tarlac Since 1949"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                 outline-none transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15" />
        @error('bannerLabel')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Headline --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Headline <span class="text-danger">*</span>
          <span class="ml-1 text-xs font-normal text-tei-gray-light">use Enter for line breaks</span>
        </label>
        <textarea wire:model="bannerHeadline" rows="3" maxlength="200"
          placeholder="Reliable Power, Every Day."
          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                 outline-none transition-all duration-200 resize-none
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15"></textarea>
        @error('bannerHeadline')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Subtitle --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Subtitle
          <span class="ml-1 text-xs font-normal text-tei-gray-light">optional</span>
        </label>
        <textarea wire:model="bannerSub" rows="3" maxlength="1000"
          placeholder="Brief description shown below the headline…"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                 outline-none transition-all duration-200 resize-none
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15"></textarea>
        @error('bannerSub')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- CTA --}}
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Button Text</label>
          <input wire:model="bannerCtaText" type="text" maxlength="60" placeholder="Learn More"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                   outline-none transition-all duration-200
                   focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15" />
          @error('bannerCtaText')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ $message }}
            </p>
          @enderror
        </div>
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">Button URL</label>
          <input wire:model="bannerCtaHref" type="text" maxlength="500"
            placeholder="/rates-and-advisories or https://docs.google.com/…"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                   outline-none transition-all duration-200
                   focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15" />
          @error('bannerCtaHref')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ $message }}
            </p>
          @enderror
          {{-- Open in new tab toggle --}}
          <label class="mt-2.5 flex items-center gap-2.5 cursor-pointer select-none">
            <div class="relative shrink-0">
              <input wire:model="bannerCtaExternal" type="checkbox" class="sr-only peer" />
              <div class="w-8 h-4 rounded-full bg-gray-300 peer-checked:bg-tei-orange transition-colors duration-200
                          after:content-[''] after:absolute after:top-0.5 after:left-0.5
                          after:w-3 after:h-3 after:rounded-full after:bg-white after:shadow
                          after:transition-transform after:duration-200
                          peer-checked:after:translate-x-4"></div>
            </div>
            <span class="text-xs font-medium text-tei-gray">Open in new tab <span class="text-tei-gray-light">(for external links like Google Docs)</span></span>
          </label>
        </div>
      </div>

      {{-- Sort Order --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">Sort Order</label>
        <input wire:model="bannerSortOrder" type="number" min="0"
          class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                 outline-none transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15" />
        @error('bannerSortOrder')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Card Image Dimensions --}}
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">
            Image Width
            <span class="ml-1 text-xs font-normal text-tei-gray-light">px · optional</span>
          </label>
          <input wire:model="bannerImageWidth" type="number" min="50" max="1200" placeholder="500"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                   outline-none transition-all duration-200
                   focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15" />
          @error('bannerImageWidth')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ $message }}
            </p>
          @enderror
        </div>
        <div>
          <label class="block text-sm font-semibold text-tei-blue mb-1.5">
            Image Height
            <span class="ml-1 text-xs font-normal text-tei-gray-light">px · optional</span>
          </label>
          <input wire:model="bannerImageHeight" type="number" min="50" max="1600" placeholder="660"
            class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                   outline-none transition-all duration-200
                   focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15" />
          @error('bannerImageHeight')
            <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
              <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ $message }}
            </p>
          @enderror
        </div>
      </div>

      {{-- Published toggle row --}}
      <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">
        <div>
          <p class="text-sm font-semibold text-tei-blue">Published</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Show on the homepage carousel</p>
        </div>
        <label class="relative inline-flex items-center cursor-pointer shrink-0">
          <input wire:model="bannerIsPublished" type="checkbox" class="sr-only peer">
          <div class="w-10 h-5 rounded-full bg-gray-300 peer-checked:bg-tei-orange transition-colors duration-200
                      after:content-[''] after:absolute after:top-0.5 after:left-0.5
                      after:w-4 after:h-4 after:rounded-full after:bg-white after:shadow
                      after:transition-transform after:duration-200
                      peer-checked:after:translate-x-5">
          </div>
        </label>
      </div>

      {{-- Card Image --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Card Image
          <span class="ml-1 text-xs font-normal text-tei-gray-light">right side panel · any ratio · max 5 MB</span>
        </label>

        @if ($imageHasFile && $editId && !$imageFile)
          @php $b = App\Models\HomeBanner::find($editId); @endphp
          <div class="flex items-center justify-between px-4 py-3 rounded-xl border border-success/30 bg-success/5 mb-2">
            <div class="flex items-center gap-2">
              <svg class="size-4 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-xs font-semibold text-success truncate">{{ $b?->image_name ?? 'File uploaded' }}</span>
            </div>
            <button wire:click="removeImage('image')" type="button"
              class="text-xs font-semibold text-danger hover:underline cursor-pointer shrink-0 ml-3">Remove</button>
          </div>
        @endif

        <label for="banner-card-image"
          class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl transition-colors duration-150 cursor-pointer
                 {{ $imageFile ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
          <svg class="size-9 shrink-0 {{ $imageFile ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <div class="min-w-0 flex-1">
            @if ($imageFile)
              <p class="text-sm font-medium text-tei-orange truncate">{{ $imageFile->getClientOriginalName() }}</p>
              <p class="text-xs text-tei-gray-light mt-0.5">click to change</p>
            @else
              <p class="text-sm font-medium text-tei-blue">Click to upload card image</p>
              <p class="text-xs text-tei-gray-light mt-0.5">Images only · Max 5 MB</p>
            @endif
          </div>
          <input id="banner-card-image" wire:model="imageFile" type="file" accept="image/*" class="sr-only" />
        </label>
        @error('imageFile')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Background Image --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Background Image
          <span class="ml-1 text-xs font-normal text-tei-gray-light">full-bleed · landscape recommended · max 10 MB</span>
        </label>

        @if ($bgImageHasFile && $editId && !$bgImageFile)
          @php $b = $b ?? App\Models\HomeBanner::find($editId); @endphp
          <div class="flex items-center justify-between px-4 py-3 rounded-xl border border-success/30 bg-success/5 mb-2">
            <div class="flex items-center gap-2">
              <svg class="size-4 text-success shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-xs font-semibold text-success truncate">{{ $b?->bg_image_name ?? 'File uploaded' }}</span>
            </div>
            <button wire:click="removeImage('bg')" type="button"
              class="text-xs font-semibold text-danger hover:underline cursor-pointer shrink-0 ml-3">Remove</button>
          </div>
        @endif

        <label for="banner-bg-image"
          class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl transition-colors duration-150 cursor-pointer
                 {{ $bgImageFile ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
          <svg class="size-9 shrink-0 {{ $bgImageFile ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none"
            stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
              d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <div class="min-w-0 flex-1">
            @if ($bgImageFile)
              <p class="text-sm font-medium text-tei-orange truncate">{{ $bgImageFile->getClientOriginalName() }}</p>
              <p class="text-xs text-tei-gray-light mt-0.5">click to change</p>
            @else
              <p class="text-sm font-medium text-tei-blue">Click to upload background image</p>
              <p class="text-xs text-tei-gray-light mt-0.5">Images only · Max 10 MB</p>
            @endif
          </div>
          <input id="banner-bg-image" wire:model="bgImageFile" type="file" accept="image/*" class="sr-only" />
        </label>
        @error('bgImageFile')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

    </div>

    <x-drawer.footer>
      <x-button variant="ghost" wire:click="closeDrawer">Cancel</x-button>
      <x-button loading="Saving…" variant="primary" wire:click="save">
        {{ $editId ? 'Save Changes' : 'Create Banner' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>


  {{-- ── DELETE CONFIRM ──────────────────────────────────────── --}}
  <x-confirm-modal show="showDeleteModal" cancel="cancelDelete"
    title="Delete Banner"
    message="This action cannot be undone. The slide and all uploaded images will be permanently removed.">
    <x-button variant="ghost" wire:click="cancelDelete">Cancel</x-button>
    <x-button loading="Deleting…" variant="danger" wire:click="delete">Yes, Delete</x-button>
  </x-confirm-modal>

</div>
