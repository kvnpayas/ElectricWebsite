<form wire:submit.prevent="authenticate" class="space-y-5" novalidate>

    {{-- Email --}}
    <div class="login-field">
        <label for="email" class="block text-sm font-semibold mb-2 text-tei-blue">Email Address</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <svg class="w-5 h-5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </div>
            <input wire:model="email"
                   id="email"
                   type="email"
                   autocomplete="email"
                   placeholder="admin@tarlacelectric.com"
                   @class([
                       'w-full pl-12 pr-4 py-3.5 rounded-xl border text-sm text-gray-900 bg-gray-50',
                       'outline-none transition-all duration-200',
                       'focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15',
                       'border-danger' => $errors->has('email'),
                       'border-gray-200' => ! $errors->has('email'),
                   ])>
        </div>
        @error('email')
        <p class="mt-1.5 text-xs text-danger flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
        </p>
        @enderror
    </div>

    {{-- Password with Alpine.js show/hide toggle --}}
    <div class="login-field" x-data="{ showPass: false }">
        <label for="password" class="block text-sm font-semibold mb-2 text-tei-blue">Password</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                <svg class="w-5 h-5 text-tei-gray-light" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </div>
            <input wire:model="password"
                   id="password"
                   :type="showPass ? 'text' : 'password'"
                   autocomplete="current-password"
                   placeholder="••••••••••"
                   @class([
                       'w-full pl-12 pr-12 py-3.5 rounded-xl border text-sm text-gray-900 bg-gray-50',
                       'outline-none transition-all duration-200',
                       'focus:border-tei-orange focus:bg-white focus:ring-2 focus:ring-tei-orange/15',
                       'border-danger' => $errors->has('password'),
                       'border-gray-200' => ! $errors->has('password'),
                   ])>
            <button type="button"
                    @click="showPass = !showPass"
                    class="absolute inset-y-0 right-0 flex items-center pr-4 cursor-pointer text-tei-gray-light hover:text-tei-orange transition-colors duration-150"
                    aria-label="Toggle password visibility">
                <svg x-show="!showPass" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <svg x-show="showPass" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/>
                </svg>
            </button>
        </div>
        @error('password')
        <p class="mt-1.5 text-xs text-danger flex items-center gap-1.5">
            <svg class="w-3.5 h-3.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ $message }}
        </p>
        @enderror
    </div>

    {{-- Remember me + Forgot password --}}
    <div id="login-extras" class="flex items-center justify-between">
        <label class="flex items-center gap-2.5 cursor-pointer select-none">
            <div class="relative flex items-center justify-center w-4.5 h-4.5 rounded border-2 transition-all duration-150 shrink-0"
                 :class="$wire.remember ? 'border-tei-orange bg-tei-orange' : 'border-gray-300 bg-white'">
                <input wire:model="remember" type="checkbox" class="sr-only">
                <svg x-show="$wire.remember" class="w-2.5 h-2.5" fill="none" stroke="white" stroke-width="3.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <span class="text-sm text-gray-500">Remember me</span>
        </label>
    </div>

    {{-- Submit --}}
    <div class="login-field pt-1">
        <x-button
            id="login-btn"
            type="submit"
            variant="secondary"
            size="lg"
            class="w-full"
            loading="Signing in…"
            icon="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
            Sign In to Dashboard
        </x-button>
    </div>

</form>
