<x-layouts.app>
  {{-- <x-layouts.auth> --}}
  {{-- <x-auth-card> --}}
      {{-- <x-slot name="logo">
          <a href="/">
              <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
          </a>
      </x-slot> --}}

      <div class="mb-4 text-sm text-gray-600">
          {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
      </div>

      <!-- Session Status -->
      <x-auth-session-status class="mb-4" :status="session('status')" />

      <!-- Validation Errors -->
      <x-auth-validation-errors class="mb-4" :errors="$errors" />
      <section class="section is-large">
        <div class="container">
          <div class="columns is-centered">
            <div class="column is-4">
              <div class="card" >
                <p class="title is-4 p-3">Login</p>
                <div class="card-content">
                  <div class="content">

      <form method="POST" action="{{ route('password.email') }}">
          @csrf

          <!-- Email Address -->
          <div>
              <x-label for="email" :value="__('Email')" />

              <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
          </div>

          <div class="flex items-center justify-end mt-4">
              <x-button>
                  {{ __('Email Password Reset Link') }}
              </x-button>
          </div>
      </form>
                  </div></div></div></div></div></div></section>
  {{-- </x-auth-card> --}}
</x-layouts.app>
