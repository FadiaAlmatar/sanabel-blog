<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="title is-2">Create New Category</div>
      {{-- <form action="/categories" method="POST" class="form"> --}}
        <form action="{{ route('categories.store') }}" method="POST" class="form" enctype="multipart/form-data">
        @csrf
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input @error('name')is-danger @enderror" name="name" type="text" value="{{ old('name') }}" placeholder="Category Name">
          </div>
          @error('name')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field">
          <label class="label">Icon (URL)</label>
          <div class="control">
            <input class="input @error('icon_url')is-danger @enderror" name="icon_url" type="text" value="{{ old('icon_url') }}" placeholder="http://hi.com/pic.jpg">
          </div>
          @error('icon_url')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label">Icon (upload)</label>
          <div class="file">
            <label class="file-label">
              <input class="file-input" type="file" name="icon_upload" accept="image/*">
              <span class="file-cta">
                <span class="file-icon">
                  <i class="fas fa-upload"></i>
                </span>
                <span class="file-label">
                  Choose an icon…
                </span>
              </span>
            </label>
          </div>
          @error('icon_upload')
          <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button class="is-link">Create</button>
          </div>
          <div class="control">
            <button class=" is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
