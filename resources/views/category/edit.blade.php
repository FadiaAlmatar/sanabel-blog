<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="title is-2">Edit {{ $category->name }}</div>
      {{-- <form action="/categories/{{$category->id}}" method="POST"class="form"> --}}
        <form action="{{route('categories.update',$category) }}" method="POST"class="form" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input" name="name" type="text" placeholder="Category Name" value="{{ old('name') }}">
          </div>
          @error('icon_url')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="field">
          <label class="label">Icon (URL)</label>
          <div class="control">
            <input class="input" name="icon_url" type="text" placeholder="http://hi.com/pic.jpg" value="{{ old('icon_url') }}">
          </div>
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
            <button class="is-link">Update</button>
          </div>
          <div class="control">
            <button class="is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
