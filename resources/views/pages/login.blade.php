{{-- <x-layouts.app>
  <section class="section" id="create" >
    <div class="container" id="createpost">
  <div class="title is-2 ">Log in</div>
      <form action="#" method="GET" class="form" >
        @csrf
        <div class="field">
          <label class="label">Email</label>
          <div class="control">
            <input class="input @error('email')is-danger @enderror is-normal" name="email" type="text" value="{{ old('email') }}" placeholder="Enter Email">
          </div>
          @error('email')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label">Password</label>
          <div class="control">
            <input class="input @error('password')is-danger @enderror is-normal" name="password" type="text" value="{{ old('password') }}" placeholder="Enter Password">
          </div>
          @error('password')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class=" is-link">Log in</button>
          </div>
        </div>
      </form>
    </div>
  </section>
</x-layouts.app> --}}
