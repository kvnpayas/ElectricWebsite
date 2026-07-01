<div>

  <x-admin.partials.page-header
      title="About Documents"
      subtitle="Manage PDF documents for Corporate Governance, Disclosures, Investor Relations, and Press Materials." />


  {{-- ─── Stat cards ──────────────────────────────────────── --}}
  <div class="grid grid-cols-2 lg:grid-cols-5 gap-4 mb-6">

    <x-stat-card wire:click="setCategory('all')"
        color="tei-blue"
        icon="M4 6h16M4 10h16M4 14h16M4 18h16"
        :value="$this->counts['all']"
        label="All Documents"
        class="cursor-pointer {{ $categoryFilter === 'all' ? 'ring-2 ring-tei-blue/30' : '' }}" />

    <x-stat-card wire:click="setCategory('corporate-governance')"
        color="tei-blue"
        icon="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"
        :value="$this->counts['corporate-governance']"
        label="Corporate Governance"
        class="cursor-pointer {{ $categoryFilter === 'corporate-governance' ? 'ring-2 ring-tei-blue/30' : '' }}" />

    <x-stat-card wire:click="setCategory('disclosures')"
        color="tei-orange"
        icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"
        :value="$this->counts['disclosures']"
        label="Disclosures"
        class="cursor-pointer {{ $categoryFilter === 'disclosures' ? 'ring-2 ring-tei-orange/30' : '' }}" />

    <x-stat-card wire:click="setCategory('investor-relations')"
        color="tei-blue"
        icon="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"
        :value="$this->counts['investor-relations']"
        label="Investor Relations"
        class="cursor-pointer {{ $categoryFilter === 'investor-relations' ? 'ring-2 ring-tei-blue/30' : '' }}" />

    <x-stat-card wire:click="setCategory('press-materials')"
        color="tei-blue"
        icon="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"
        :value="$this->counts['press-materials']"
        label="Press Materials / News"
        class="cursor-pointer {{ $categoryFilter === 'press-materials' ? 'ring-2 ring-tei-blue/30' : '' }}" />

  </div>


  {{-- ─── Table card ──────────────────────────────────────── --}}
  <x-table-container title="Documents" :count="$this->documents->count()">

    <x-slot:toolbar>
      {{-- Search --}}
      <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
          <svg class="w-4 h-4 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <input wire:model.live.debounce.300ms="search" type="search" placeholder="Search documents…"
          class="pl-9 pr-4 py-2 w-52 text-sm rounded-xl border border-gray-200 bg-gray-50 text-gray-900
                 outline-none transition-all duration-200
                 focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
      </div>

      {{-- Category filter --}}
      <select wire:model.live="categoryFilter"
        class="py-2 pl-3 pr-8 text-sm rounded-xl border border-gray-200 bg-gray-50 text-tei-gray
               outline-none cursor-pointer transition-all duration-200
               focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15">
        <option value="all">All Categories</option>
        <option value="corporate-governance">Corporate Governance</option>
        <option value="disclosures">Disclosures</option>
        <option value="investor-relations">Investor Relations</option>
        <option value="press-materials">Press Materials / News</option>
      </select>

      {{-- Status filter --}}
      <select wire:model.live="statusFilter"
        class="py-2 pl-3 pr-8 text-sm rounded-xl border border-gray-200 bg-gray-50 text-tei-gray
               outline-none cursor-pointer transition-all duration-200
               focus:border-tei-orange focus:ring-2 focus:ring-tei-orange/15">
        <option value="all">All Status</option>
        <option value="published">Published</option>
        <option value="draft">Draft</option>
      </select>

      {{-- Add Document button --}}
      <x-button variant="secondary" wire:click="openAdd" icon="M12 4v16m8-8H4">Add Document</x-button>
    </x-slot:toolbar>

    {{-- Table --}}
    <x-table>
      <x-table.head>
        <x-table.th>Title</x-table.th>
        <x-table.th hidden="sm">Category</x-table.th>
        <x-table.th hidden="sm">Date</x-table.th>
        <x-table.th>Status</x-table.th>
        <x-table.th hidden="md">File</x-table.th>
        <x-table.th align="right">Actions</x-table.th>
      </x-table.head>

      <x-table.body>
        @forelse ($this->documents as $doc)
          <tr class="transition-colors duration-150 hover:bg-gray-50">

            <x-table.td>
              <p class="font-semibold text-sm text-tei-blue-dark leading-snug line-clamp-2">{{ $doc->title }}</p>
            </x-table.td>

            <x-table.td hidden="sm">
              @php
                $catLabels = [
                  'corporate-governance' => 'Corporate Governance',
                  'disclosures'          => 'Disclosures',
                  'investor-relations'   => 'Investor Relations',
                  'press-materials'      => 'Press Materials / News',
                ];
                $catColors = [
                  'corporate-governance' => 'bg-tei-blue/10 text-tei-blue',
                  'disclosures'          => 'bg-tei-orange/10 text-tei-orange',
                  'investor-relations'   => 'bg-success/10 text-success',
                  'press-materials'      => 'bg-info/10 text-info',
                ];
              @endphp
              <span class="inline-flex text-xs font-semibold px-2.5 py-1 rounded-full truncate {{ $catColors[$doc->category] ?? 'bg-gray-100 text-tei-gray' }}">
                {{ $catLabels[$doc->category] ?? $doc->category }}
              </span>
            </x-table.td>

            <x-table.td hidden="sm">
              <span class="text-xs text-tei-gray">{{ $doc->document_date->format('M j, Y') }}</span>
            </x-table.td>

            <x-table.td>
              <div class="flex flex-col gap-1.5">
                @if ($doc->status === 'published')
                  <span class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full bg-success/10 text-success">
                    <span class="size-1.5 rounded-full bg-success"></span>Published
                  </span>
                @else
                  <span class="inline-flex items-center gap-1 text-xs font-semibold px-2.5 py-1 rounded-full bg-warning/10 text-warning">
                    <span class="size-1.5 rounded-full bg-warning"></span>Draft
                  </span>
                @endif
                @if ($doc->is_downloadable)
                  <span class="inline-flex items-center gap-1 text-xs font-medium px-2.5 py-1 rounded-full bg-tei-blue/8 text-tei-blue">
                    <svg class="size-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                    </svg>
                    Downloadable
                  </span>
                @endif
              </div>
            </x-table.td>

            <x-table.td hidden="md">
              <div class="flex flex-col gap-1">
                @if ($doc->public_url)
                  <a href="{{ $doc->public_url }}" target="_blank" rel="noopener"
                     class="inline-flex items-center gap-1.5 text-xs font-medium text-tei-blue hover:text-tei-orange transition-colors duration-150">
                    <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <span class="truncate max-w-36">{{ $doc->file_name }}</span>
                  </a>
                @endif
                @if ($doc->url)
                  <span class="inline-flex items-center gap-1 font-mono text-xs text-tei-gray-light">
                    <svg class="size-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                    </svg>
                    /{{ $doc->url }}
                  </span>
                @endif
                @if (!$doc->public_url && !$doc->url)
                  <span class="text-xs text-tei-gray-light italic">No file yet</span>
                @endif
              </div>
            </x-table.td>

            <x-table.td align="right">
              <div class="flex items-center justify-end gap-1">
                <x-button-icon wire:click="openEdit({{ $doc->id }})" title="Edit"
                    icon="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                <x-button-icon wire:click="confirmDelete({{ $doc->id }})" title="Delete" variant="danger"
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
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                  </svg>
                </div>
                <p class="text-sm font-semibold text-tei-blue">No documents yet</p>
                <p class="text-xs text-tei-gray-light">Click "Add Document" to upload the first file.</p>
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
        title="{{ $formMode === 'add' ? 'Add New Document' : 'Edit Document' }}"
        subtitle="{{ ['corporate-governance' => 'Corporate Governance', 'disclosures' => 'Disclosures', 'investor-relations' => 'Investor Relations', 'press-materials' => 'Press Materials / News'][$formCategory] ?? '' }}"
        icon="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />

    <form wire:submit.prevent="save" id="about-doc-form" class="flex-1 overflow-y-auto px-6 py-6 space-y-5">

      {{-- Category --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Category <span class="text-danger">*</span>
        </label>
        <select wire:model.live="formCategory"
                class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                       outline-none cursor-pointer transition-all duration-200
                       focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
          <option value="corporate-governance">Corporate Governance</option>
          <option value="disclosures">Disclosures</option>
          <option value="investor-relations">Investor Relations</option>
          <option value="press-materials">Press Materials / News</option>
        </select>
        @error('formCategory')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Title --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Document Title <span class="text-danger">*</span>
        </label>
        <input wire:model.live.debounce.400ms="formTitle" type="text"
               placeholder="Annual Report 2025"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark placeholder:text-tei-gray-light
                      outline-none transition-all duration-200
                      focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        @error('formTitle')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- Date --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          Document Date <span class="text-danger">*</span>
        </label>
        <input wire:model="formDate" type="date"
               class="w-full px-4 py-3 rounded-xl border border-gray-200 bg-gray-50 text-sm text-tei-blue-dark
                      outline-none transition-all duration-200
                      focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15">
        @error('formDate')
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
        <div class="flex gap-4">
          @foreach (['published' => 'Published', 'draft' => 'Draft'] as $val => $lbl)
            <label class="flex items-center gap-2 cursor-pointer">
              <input wire:model="formStatus" type="radio" value="{{ $val }}" class="accent-tei-orange">
              <span class="text-sm font-medium text-tei-gray">{{ $lbl }}</span>
            </label>
          @endforeach
        </div>
      </div>

      {{-- Downloadable toggle --}}
      <div class="flex items-center justify-between rounded-xl border border-gray-200 bg-gray-50 px-4 py-3">
        <div>
          <p class="text-sm font-semibold text-tei-blue">Allow Download</p>
          <p class="text-xs text-tei-gray-light mt-0.5">Users can download this PDF from the public page</p>
        </div>
        <label class="relative inline-flex items-center cursor-pointer shrink-0">
          <input wire:model="formDownloadable" type="checkbox" class="sr-only peer">
          <div class="w-10 h-5 rounded-full bg-gray-300 peer-checked:bg-tei-orange transition-colors duration-200
                      after:content-[''] after:absolute after:top-0.5 after:left-0.5
                      after:w-4 after:h-4 after:rounded-full after:bg-white after:shadow
                      after:transition-transform after:duration-200
                      peer-checked:after:translate-x-5"></div>
        </label>
      </div>

      {{-- PDF Upload --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">PDF File</label>
        <label for="about-doc-pdf"
               class="flex items-center gap-3 px-4 py-4 border-2 border-dashed rounded-xl transition-colors duration-150 cursor-pointer
                      {{ $formFile ? 'border-tei-orange/60 bg-tei-orange/4' : 'border-gray-200 hover:border-tei-orange/40' }}">
          <svg class="size-9 shrink-0 {{ $formFile ? 'text-tei-orange' : 'text-tei-gray-light' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                  d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
          </svg>
          <div class="min-w-0 flex-1">
            @if ($formFile)
              <p class="text-sm font-medium text-tei-orange truncate">{{ $formFile->getClientOriginalName() }}</p>
              <p class="text-xs text-tei-gray-light mt-0.5">{{ number_format($formFile->getSize() / 1024, 0) }} KB · click to change</p>
            @else
              <p class="text-sm font-medium text-tei-blue">Click to upload PDF</p>
              <p class="text-xs text-tei-gray-light mt-0.5">PDF only · Max 10 MB</p>
            @endif
          </div>
          <input id="about-doc-pdf" wire:model="formFile" type="file" accept=".pdf" class="sr-only">
        </label>
        @error('formFile')
          <p class="mt-1.5 text-xs text-danger flex items-center gap-1">
            <svg class="size-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
          </p>
        @enderror
      </div>

      {{-- URL Slug --}}
      <div>
        <label class="block text-sm font-semibold text-tei-blue mb-1.5">
          URL Slug
          <span class="ml-1 text-xs font-normal text-tei-gray-light">auto-generated · must be unique</span>
        </label>
        <div class="flex items-center rounded-xl border border-gray-200 bg-gray-50 overflow-hidden
                    transition-all duration-200 focus-within:border-tei-orange focus-within:bg-white focus-within:ring-2 focus-within:ring-tei-orange/15">
          <span class="px-3 py-3 text-sm text-tei-gray-light border-r border-gray-200 bg-gray-100 select-none shrink-0">/</span>
          <input wire:model="formUrl" type="text"
                 placeholder="annual-report-2025"
                 class="flex-1 px-3 py-3 text-sm text-tei-blue-dark placeholder:text-tei-gray-light bg-transparent outline-none font-mono">
        </div>
        @error('formUrl')
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
        {{ $formMode === 'add' ? 'Add Document' : 'Save Changes' }}
      </x-button>
    </x-drawer.footer>

  </x-drawer>


  {{-- ─── Delete Confirmation Modal ──────────────────────── --}}
  <x-confirm-modal
    title="Delete Document?"
    message="This action cannot be undone. The document and its uploaded file will be permanently removed."
  >
    <x-button variant="ghost" wire:click="cancelDelete">Cancel</x-button>
    <x-button loading="Deleting…" variant="danger" wire:click="delete">Yes, Delete</x-button>
  </x-confirm-modal>

</div>
