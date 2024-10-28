<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <x-input-label for="name" :value="__('Name')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Password -->
    <div class="mt-4 mb-4 relative">
        <x-input-label for="password" :value="__('Password')" />

        <div class="flex item-center-relative">
            <x-text-input id="registerpassword" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />
            <button type="button" class="absolute inset-y-0 right-1 flex items-center pl-3 -mb-6" onclick="togglePassword(document.getElementById('registerpassword'), document.getElementById('toggleregisterPasswordIcon'))">
                <i id="toggleregisterPasswordIcon" class="far fa-eye me-3 dark:text-gray-400 text-gray-600"></i>
            </button>
        </div>

        <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>

    <!-- Confirm Password -->
    <div class="mt-4 mb-4 relative">
        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

        <div class="flex item-center-relative">
            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />
            <button type="button" class="absolute inset-y-0 right-1 flex items-center pl-3 -mb-6" onclick="togglePassword(document.getElementById('password_confirmation'), document.getElementById('togglePasswordConfirmIcon'))">
                <i id="togglePasswordConfirmIcon" class="far fa-eye me-3 dark:text-gray-400 text-gray-600"></i>
            </button>
        </div>

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>

    <div class="flex items-center justify-end mt-4 gap-3">
        <button
        id="loginrModalButton" data-modal-target="loginrModal" data-modal-hide="loginModal" data-modal-toggle="loginrModal" type="button"
        class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
        >
        {{__('Sudah punya akun?')}}
        </button>

        <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button>
    </div>
</form>
