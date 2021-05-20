<x-layouts.auth>
  {{-- <div class="card">
    <p class="title is-4">{{ $title }}</p>
    <div class="card-content">
      <div class="content"> --}}
        <section class="section is-large">
          <div class="container">
            <div class="columns is-centered">
              <div class="column is-4">
                <div class="card" >
                  <p class="title is-4 p-3">Confirm Password</p>
                  <div class="card-content">
                    <div class="content">
        <form method="POST" action="{{ route('login') }}">
          @csrf

          <div class="field">
              <label class="label" for="email">{{ __('E-Mail Address') }}</label>
              <div class="control">
                  <input id="email" type="email" class="input @error('email') is-danger @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
              </div>
              @error('email')
                  <p class="help is-danger" role="alert">
                      {{ $message }}
                  </p>
              @enderror
          </div>

          <div class="field">
              <label class="label" for="password">{{ __('Password') }}</label>
              <div class="control">
                  <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password" required autocomplete="current-password">
              </div>
              @error('password')
                  <p class="help is-danger" role="alert">
                      {{ $message }}
                  </p>
              @enderror
          </div>

          <div class="field">
              <div class="control">
                  <label class="checkbox">
                      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      {{ __('Remember Me') }}
                  </label>
              </div>
          </div>

          <hr>

          <div class="field is-grouped">
              <div class="control">
                  <button type="submit" class="button is-primary">
                      {{ __('Login') }}
                  </button>
              </div>

              @if (Route::has('password.request'))
                  <div class="control">
                      <a class="button is-text" href="{{ route('password.request') }}">
                          {{ __('Forgot Your Password?') }}
                      </a>
                  </div>
              @endif
          </div>
      </form>
      {{-- </div> --}}
    {{-- </div> --}}
  {{-- </div> --}}
              </div></div></div></section>
            </x-layouts.auth>
