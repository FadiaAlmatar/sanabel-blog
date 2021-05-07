<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="title is-2">Create New Tag</div>
      {{-- <form action="/tags" method="POST" class="form"> --}}
        <form action="{{ route('tags.store') }}" method="POST" class="form">
        @csrf
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input @error('name')is-danger @enderror" name="name" type="text" value="{{ old('name') }}" placeholder="Tag Name">
          </div>
          @error('name')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label">Slug</label>
          <div class="control">
            <input class="input @error('slug')is-danger @enderror" name="slug" type="text" value="{{ old('slug') }}" placeholder="Tag Slug">
          </div>
          @error('slug')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field is-grouped">
          <div class="control">
            <button class=" is-link">Create new tag</button>
          </div>
          <div class="control">
            <button class=" is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
