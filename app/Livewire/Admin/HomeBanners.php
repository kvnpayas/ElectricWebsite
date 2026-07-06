<?php

namespace App\Livewire\Admin;

use App\Models\HomeBanner;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('layouts.auth')]
#[Title('Homepage Banners — TEI Admin')]
class HomeBanners extends Component
{
    use WithFileUploads, WithPagination;

    // ── Filters ──────────────────────────────────────────
    public string $search       = '';
    public string $statusFilter = 'all';

    // ── Drawer fields ────────────────────────────────────
    public bool   $showDrawer       = false;
    public ?int   $editId           = null;
    public string $bannerLabel      = '';
    public string $bannerHeadline   = '';
    public string $bannerSub        = '';
    public string $bannerCtaText    = '';
    public string $bannerCtaHref    = '';
    public int    $bannerSortOrder  = 0;
    public bool   $bannerIsPublished = true;

    // ── Image uploads ────────────────────────────────────
    public        $imageFile      = null;
    public bool   $imageHasFile   = false;
    public        $bgImageFile    = null;
    public bool   $bgImageHasFile = false;

    // ── Delete modal ─────────────────────────────────────
    public bool $showDeleteModal = false;
    public ?int $deleteId        = null;

    // ═══════════════════════════════════════════════
    //  Computed
    // ═══════════════════════════════════════════════

    #[Computed]
    public function banners()
    {
        return HomeBanner::query()
            ->when($this->search, fn ($q) => $q
                ->where('headline', 'like', "%{$this->search}%")
                ->orWhere('label', 'like', "%{$this->search}%"))
            ->when($this->statusFilter === 'published', fn ($q) => $q->where('is_published', true))
            ->when($this->statusFilter === 'draft', fn ($q) => $q->where('is_published', false))
            ->orderBy('sort_order')
            ->orderByDesc('created_at')
            ->paginate(20);
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedStatusFilter(): void
    {
        $this->resetPage();
    }

    // ═══════════════════════════════════════════════
    //  Banner CRUD
    // ═══════════════════════════════════════════════

    public function openAdd(): void
    {
        $this->editId            = null;
        $this->bannerLabel       = '';
        $this->bannerHeadline    = '';
        $this->bannerSub         = '';
        $this->bannerCtaText     = '';
        $this->bannerCtaHref     = '';
        $this->bannerSortOrder   = HomeBanner::count();
        $this->bannerIsPublished = true;
        $this->imageFile         = null;
        $this->imageHasFile      = false;
        $this->bgImageFile       = null;
        $this->bgImageHasFile    = false;
        $this->showDrawer        = true;
        $this->resetErrorBag();
    }

    public function openEdit(int $id): void
    {
        $banner = HomeBanner::findOrFail($id);

        $this->editId            = $banner->id;
        $this->bannerLabel       = $banner->label ?? '';
        $this->bannerHeadline    = $banner->headline;
        $this->bannerSub         = $banner->sub ?? '';
        $this->bannerCtaText     = $banner->cta_text ?? '';
        $this->bannerCtaHref     = $banner->cta_href ?? '';
        $this->bannerSortOrder   = $banner->sort_order;
        $this->bannerIsPublished = (bool) $banner->is_published;
        $this->imageFile         = null;
        $this->imageHasFile      = (bool) $banner->image_path;
        $this->bgImageFile       = null;
        $this->bgImageHasFile    = (bool) $banner->bg_image_path;
        $this->showDrawer        = true;
        $this->resetErrorBag();
    }

    public function save(): void
    {
        $this->validate([
            'bannerHeadline'  => 'required|string|max:200',
            'bannerLabel'     => 'nullable|string|max:100',
            'bannerSub'       => 'nullable|string|max:1000',
            'bannerCtaText'   => 'nullable|string|max:60',
            'bannerCtaHref'   => 'nullable|string|max:500',
            'bannerSortOrder' => 'required|integer|min:0',
            'imageFile'       => 'nullable|image|max:5120',
            'bgImageFile'     => 'nullable|image|max:10240',
        ]);

        $data = [
            'label'        => $this->bannerLabel ?: null,
            'headline'     => $this->bannerHeadline,
            'sub'          => $this->bannerSub ?: null,
            'cta_text'     => $this->bannerCtaText ?: null,
            'cta_href'     => $this->bannerCtaHref ?: null,
            'sort_order'   => $this->bannerSortOrder,
            'is_published' => $this->bannerIsPublished,
        ];

        if ($this->imageFile) {
            if ($this->editId) {
                $old = HomeBanner::find($this->editId);
                if ($old?->image_path) Storage::disk('public')->delete($old->image_path);
            }
            $data['image_path'] = $this->imageFile->storeAs('banners/images', $this->imageFile->getClientOriginalName(), 'public');
            $data['image_name'] = $this->imageFile->getClientOriginalName();
            $this->imageFile    = null;
        }

        if ($this->bgImageFile) {
            if ($this->editId) {
                $old = HomeBanner::find($this->editId);
                if ($old?->bg_image_path) Storage::disk('public')->delete($old->bg_image_path);
            }
            $data['bg_image_path'] = $this->bgImageFile->storeAs('banners/backgrounds', $this->bgImageFile->getClientOriginalName(), 'public');
            $data['bg_image_name'] = $this->bgImageFile->getClientOriginalName();
            $this->bgImageFile     = null;
        }

        if ($this->editId) {
            HomeBanner::findOrFail($this->editId)->update($data);
            $this->dispatch('toast', message: 'Banner updated.');
        } else {
            HomeBanner::create($data);
            $this->dispatch('toast', message: 'Banner created.');
        }

        $this->showDrawer = false;
        unset($this->banners);
    }

    public function closeDrawer(): void
    {
        $this->showDrawer  = false;
        $this->imageFile   = null;
        $this->bgImageFile = null;
        $this->resetErrorBag();
    }

    public function removeImage(string $type): void
    {
        $banner = HomeBanner::findOrFail($this->editId);

        if ($type === 'image' && $banner->image_path) {
            Storage::disk('public')->delete($banner->image_path);
            $banner->update(['image_path' => null, 'image_name' => null]);
            $this->imageHasFile = false;
        }

        if ($type === 'bg' && $banner->bg_image_path) {
            Storage::disk('public')->delete($banner->bg_image_path);
            $banner->update(['bg_image_path' => null, 'bg_image_name' => null]);
            $this->bgImageHasFile = false;
        }

        unset($this->banners);
        $this->dispatch('toast', message: 'Image removed.');
    }

    public function togglePublished(int $id): void
    {
        $banner   = HomeBanner::findOrFail($id);
        $newValue = ! $banner->is_published;
        $banner->update(['is_published' => $newValue]);
        unset($this->banners);
        $this->dispatch('toast', message: $newValue ? 'Banner published.' : 'Banner unpublished.');
    }

    // ═══════════════════════════════════════════════
    //  Delete
    // ═══════════════════════════════════════════════

    public function confirmDelete(int $id): void
    {
        $this->deleteId        = $id;
        $this->showDeleteModal = true;
    }

    public function cancelDelete(): void
    {
        $this->showDeleteModal = false;
        $this->deleteId        = null;
    }

    public function delete(): void
    {
        $banner = HomeBanner::find($this->deleteId);

        if ($banner) {
            if ($banner->image_path)    Storage::disk('public')->delete($banner->image_path);
            if ($banner->bg_image_path) Storage::disk('public')->delete($banner->bg_image_path);
            $banner->delete();
            unset($this->banners);
            $this->dispatch('toast', message: 'Banner deleted.');
        }

        $this->showDeleteModal = false;
        $this->deleteId        = null;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.home-banners');
    }
}
