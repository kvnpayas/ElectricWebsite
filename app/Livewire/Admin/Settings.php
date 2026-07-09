<?php

namespace App\Livewire\Admin;

use App\Models\ActivityLog;
use App\Models\Setting;
use App\Models\SettingEmail;
use App\Models\SettingPhone;
use App\Models\SettingSocial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.auth')]
#[Title('Settings — TEI Admin')]
class Settings extends Component
{
    // ── Address ───────────────────────────────────────────────
    public string $address = '';

    // ── Site Notice ───────────────────────────────────────────
    public bool   $noticeEnabled     = false;
    public string $noticeMessage     = '';
    public string $noticeType        = 'info';
    public string $noticeExpiresAt   = '';
    public bool   $noticeDismissible = true;

    // ── Shared drawer ─────────────────────────────────────────
    public bool   $showModal = false;
    public string $formMode  = 'add';
    public string $formType  = 'phone'; // phone | email | social
    public ?int   $formId    = null;

    // ── Phone form ────────────────────────────────────────────
    public string $formNumber    = '';
    public string $formPhoneType = 'cellphone';
    public string $formLabel     = '';
    public bool   $formIsPrimary = false;

    // ── Email form ────────────────────────────────────────────
    public string $formAddress    = '';
    public string $formEmailLabel = '';

    // ── Social form ───────────────────────────────────────────
    public string $formPlatform = 'Facebook';
    public string $formUrl      = '';

    // ── Delete ────────────────────────────────────────────────
    public ?int   $deleteTarget = null;
    public string $deleteType   = '';

    // ── Computed ──────────────────────────────────────────────

    #[Computed]
    public function phones()
    {
        return SettingPhone::orderByDesc('is_primary')->orderBy('sort_order')->get();
    }

    #[Computed]
    public function emails()
    {
        return SettingEmail::orderBy('sort_order')->get();
    }

    #[Computed]
    public function socials()
    {
        return SettingSocial::orderBy('sort_order')->get();
    }

    // ── Mount ─────────────────────────────────────────────────

    public function mount(): void
    {
        $this->address           = Setting::get('address', '');
        $this->noticeEnabled     = (bool) Setting::get('notice_enabled', '0');
        $this->noticeMessage     = Setting::get('notice_message', '');
        $this->noticeType        = Setting::get('notice_type', 'info');
        $this->noticeExpiresAt   = Setting::get('notice_expires_at', '');
        $this->noticeDismissible = (bool) Setting::get('notice_dismissible', '1');
    }

    // ── Address ───────────────────────────────────────────────

    public function saveAddress(): void
    {
        $this->validate(['address' => ['nullable', 'string', 'max:500']],
            attributes: ['address' => 'address']);

        Setting::set('address', trim($this->address));
        $this->logSettingsChange('Address');
        $this->dispatch('toast', message: 'Address saved.');
    }

    // ── Site Notice ───────────────────────────────────────────

    public function saveNotice(): void
    {
        $this->validate([
            'noticeMessage'  => ['required_if:noticeEnabled,true', 'nullable', 'string', 'max:300'],
            'noticeType'     => ['required', 'in:info,warning,alert'],
            'noticeExpiresAt' => ['nullable', 'date'],
        ], attributes: [
            'noticeMessage'  => 'notice message',
            'noticeExpiresAt' => 'expiry date',
        ]);

        Setting::set('notice_enabled',     $this->noticeEnabled     ? '1' : '0');
        Setting::set('notice_message',     trim($this->noticeMessage));
        Setting::set('notice_type',        $this->noticeType);
        Setting::set('notice_expires_at',  $this->noticeExpiresAt ?: '');
        Setting::set('notice_dismissible', $this->noticeDismissible ? '1' : '0');
        Setting::set('notice_version',     (int) Setting::get('notice_version', '0') + 1);

        $this->logSettingsChange('Site Notice');
        $this->dispatch('toast', message: 'Site notice saved.');
    }

    // ── Drawer open / close ───────────────────────────────────

    public function openAdd(string $type): void
    {
        $this->formType    = $type;
        $this->formMode    = 'add';
        $this->formId      = null;
        $this->formNumber  = '';
        $this->formPhoneType = 'cellphone';
        $this->formLabel   = '';
        $this->formIsPrimary = false;
        $this->formAddress    = '';
        $this->formEmailLabel = '';
        $this->formPlatform   = 'Facebook';
        $this->formUrl        = '';
        $this->showModal   = true;
        $this->resetErrorBag();
    }

    public function openEdit(string $type, int $id): void
    {
        $this->formType = $type;
        $this->formMode = 'edit';
        $this->formId   = $id;
        $this->showModal = true;
        $this->resetErrorBag();

        match ($type) {
            'phone' => $this->loadPhone($id),
            'email' => $this->loadEmail($id),
            'social' => $this->loadSocial($id),
        };
    }

    private function loadPhone(int $id): void
    {
        $p = SettingPhone::findOrFail($id);
        $this->formNumber    = $p->number;
        $this->formPhoneType = $p->type;
        $this->formLabel     = $p->label ?? '';
        $this->formIsPrimary = $p->is_primary;
    }

    private function loadEmail(int $id): void
    {
        $e = SettingEmail::findOrFail($id);
        $this->formAddress    = $e->address;
        $this->formEmailLabel = $e->label ?? '';
    }

    private function loadSocial(int $id): void
    {
        $s = SettingSocial::findOrFail($id);
        $this->formPlatform = $s->platform;
        $this->formUrl      = $s->url;
    }

    public function closeModal(): void
    {
        $this->showModal = false;
        $this->resetErrorBag();
    }

    // ── Save ──────────────────────────────────────────────────

    public function save(): void
    {
        match ($this->formType) {
            'phone'  => $this->savePhone(),
            'email'  => $this->saveEmail(),
            'social' => $this->saveSocial(),
        };
    }

    private function savePhone(): void
    {
        $this->validate([
            'formNumber'    => ['required', 'string', 'max:30'],
            'formPhoneType' => ['required', 'in:landline,cellphone'],
            'formLabel'     => ['nullable', 'string', 'max:100'],
        ], attributes: ['formNumber' => 'phone number', 'formPhoneType' => 'type', 'formLabel' => 'label']);

        // If marking as primary, clear existing primary first
        if ($this->formIsPrimary) {
            SettingPhone::where('is_primary', true)->update(['is_primary' => false]);
        }

        $data = [
            'number'     => $this->formNumber,
            'type'       => $this->formPhoneType,
            'label'      => $this->formLabel ?: null,
            'is_primary' => $this->formIsPrimary,
        ];

        if ($this->formMode === 'add') {
            $data['sort_order'] = SettingPhone::count();
            SettingPhone::create($data);
        } else {
            SettingPhone::findOrFail($this->formId)->update($data);
        }

        $this->closeModal();
        unset($this->phones);
        $this->dispatch('toast', message: $this->formMode === 'add' ? 'Phone number added.' : 'Phone number updated.');
    }

    private function saveEmail(): void
    {
        $this->validate([
            'formAddress'    => ['required', 'email', 'max:255'],
            'formEmailLabel' => ['nullable', 'string', 'max:100'],
        ], attributes: ['formAddress' => 'email address', 'formEmailLabel' => 'label']);

        $data = [
            'address' => $this->formAddress,
            'label'   => $this->formEmailLabel ?: null,
        ];

        if ($this->formMode === 'add') {
            $data['sort_order'] = SettingEmail::count();
            SettingEmail::create($data);
        } else {
            SettingEmail::findOrFail($this->formId)->update($data);
        }

        $this->closeModal();
        unset($this->emails);
        $this->dispatch('toast', message: $this->formMode === 'add' ? 'Email address added.' : 'Email address updated.');
    }

    private function saveSocial(): void
    {
        $this->validate([
            'formPlatform' => ['required', 'string', 'max:50'],
            'formUrl'      => ['required', 'url', 'max:500'],
        ], attributes: ['formPlatform' => 'platform', 'formUrl' => 'URL']);

        $data = [
            'platform' => $this->formPlatform,
            'url'      => $this->formUrl,
        ];

        if ($this->formMode === 'add') {
            $data['sort_order'] = SettingSocial::count();
            SettingSocial::create($data);
        } else {
            SettingSocial::findOrFail($this->formId)->update($data);
        }

        $this->closeModal();
        unset($this->socials);
        $this->dispatch('toast', message: $this->formMode === 'add' ? 'Social link added.' : 'Social link updated.');
    }

    // ── Set primary phone ─────────────────────────────────────

    public function setPrimary(int $id): void
    {
        SettingPhone::where('is_primary', true)->update(['is_primary' => false]);
        SettingPhone::findOrFail($id)->update(['is_primary' => true]);
        unset($this->phones);
        $this->dispatch('toast', message: 'Primary number updated.');
    }

    // ── Delete ────────────────────────────────────────────────

    public function confirmDelete(string $type, int $id): void
    {
        $this->deleteType   = $type;
        $this->deleteTarget = $id;
    }

    public function cancelDelete(): void
    {
        $this->deleteTarget = null;
        $this->deleteType   = '';
    }

    public function delete(): void
    {
        match ($this->deleteType) {
            'phone'  => SettingPhone::find($this->deleteTarget)?->delete(),
            'email'  => SettingEmail::find($this->deleteTarget)?->delete(),
            'social' => SettingSocial::find($this->deleteTarget)?->delete(),
        };

        unset($this->phones, $this->emails, $this->socials);
        $this->dispatch('toast', message: ucfirst($this->deleteType) . ' removed.');
        $this->cancelDelete();
    }

    // ── Logging ───────────────────────────────────────────────

    private function logSettingsChange(string $label): void
    {
        $userId   = Auth::id();
        $userName = Auth::user()?->name ?? 'System';
        $ip       = request()->ip();

        ActivityLog::create([
            'user_id'       => $userId,
            'user_name'     => $userName,
            'action'        => 'updated',
            'subject_type'  => 'Settings',
            'subject_id'    => null,
            'subject_label' => $label,
            'ip_address'    => $ip,
        ]);

        Log::channel('user-logs')->info(sprintf(
            '[UPDATED] %s (ID:%s) — Settings "%s" from %s',
            $userName, $userId ?? '—', $label, $ip
        ));
    }

    // ── Render ────────────────────────────────────────────────

    public function render(): \Illuminate\View\View
    {
        return view('livewire.admin.settings');
    }
}
