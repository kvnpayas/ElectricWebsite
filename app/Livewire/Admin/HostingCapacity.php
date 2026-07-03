<?php

namespace App\Livewire\Admin;

use App\Models\HostingCapacityRow;
use App\Models\HostingCapacitySetting;
use Illuminate\Support\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.auth')]
#[Title('Hosting Capacity — TEI Admin')]
class HostingCapacity extends Component
{
    public string $typeFilter = 'net-metering';
    public string $search     = '';

    // Page settings
    public string $settingAsOfDate = '';
    public bool   $settingSaved    = false;

    // Drawer
    public bool   $showDrawer    = false;
    public ?int   $editId        = null;
    public string $formType      = 'net-metering';
    public string $formLabel     = '';
    public string $formValue     = '';
    public bool   $formIsNote    = false;
    public int    $formSortOrder = 0;

    // Delete modal
    public bool $showDeleteModal = false;
    public ?int $deleteId        = null;

    public function mount(): void
    {
        $s = HostingCapacitySetting::firstOrCreate([]);
        $this->settingAsOfDate = $s->as_of_date?->format('Y-m-d') ?? '';
    }

    public function saveSettings(): void
    {
        $this->validate([
            'settingAsOfDate' => 'nullable|date',
        ]);

        HostingCapacitySetting::updateOrCreate([], [
            'as_of_date' => $this->settingAsOfDate ?: null,
        ]);

        $this->settingSaved = true;
        $this->js("setTimeout(() => \$wire.set('settingSaved', false), 2500)");
    }

    public function setType(string $type): void
    {
        $this->typeFilter = $type;
        $this->search     = '';
    }

    #[Computed]
    public function rows(): Collection
    {
        return HostingCapacityRow::where('type', $this->typeFilter)
            ->when($this->search, fn ($q) => $q->where('label', 'like', '%' . $this->search . '%')
                ->orWhere('value', 'like', '%' . $this->search . '%'))
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    #[Computed]
    public function counts(): array
    {
        $all = HostingCapacityRow::selectRaw('type, count(*) as total')
            ->groupBy('type')
            ->pluck('total', 'type');

        return [
            'net-metering'   => $all['net-metering']   ?? 0,
            'der-feeder'     => $all['der-feeder']     ?? 0,
            'der-substation' => $all['der-substation'] ?? 0,
        ];
    }

    public function openAdd(): void
    {
        $this->editId        = null;
        $this->formType      = $this->typeFilter;
        $this->formLabel     = '';
        $this->formValue     = '';
        $this->formIsNote    = false;
        $this->formSortOrder = $this->rows->count();
        $this->showDrawer    = true;
        $this->resetErrorBag();
    }

    public function openEdit(int $id): void
    {
        $row = HostingCapacityRow::findOrFail($id);
        $this->editId        = $id;
        $this->formType      = $row->type;
        $this->formLabel     = $row->label;
        $this->formValue     = $row->value;
        $this->formIsNote    = (bool) $row->is_note;
        $this->formSortOrder = $row->sort_order;
        $this->showDrawer    = true;
        $this->resetErrorBag();
    }

    public function save(): void
    {
        $this->validate([
            'formType'      => 'required|in:net-metering,der-feeder,der-substation',
            'formLabel'     => 'required|string|max:100',
            'formValue'     => 'required|string|max:200',
            'formSortOrder' => 'required|integer|min:0',
        ]);

        $data = [
            'type'       => $this->formType,
            'label'      => $this->formLabel,
            'value'      => $this->formValue,
            'is_note'    => $this->formIsNote,
            'sort_order' => $this->formSortOrder,
        ];

        if ($this->editId) {
            HostingCapacityRow::findOrFail($this->editId)->update($data);
        } else {
            HostingCapacityRow::create($data);
        }

        $this->typeFilter = $this->formType;
        $this->showDrawer = false;
    }

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
        if ($this->deleteId) {
            HostingCapacityRow::findOrFail($this->deleteId)->delete();
        }

        $this->showDeleteModal = false;
        $this->deleteId        = null;
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.hosting-capacity');
    }
}
