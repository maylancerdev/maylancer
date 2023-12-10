<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        <h3 class="font-semibold text-center text-slate-900 mt-3 text-3xl"> {{ __('Forgot your password?') }}</h3>
        <p class="leading-relaxed text-center text-slate-600 mb-8 py-2">
            {{ __('Please enter your account email address. We will send you a link to reset your password.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">

            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>



        </div>
       <div class="flex justify-center mt-10">
           {{ __('Remember password?') }}
        <a class="underline text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 ml-1" href="{{ route('login') }}">
           Sign in
        </a>
       </div>
    </form>
</x-guest-layout>
