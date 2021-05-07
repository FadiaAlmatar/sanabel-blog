<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="title is-2">Edit {{ $post->title }}</div>
      <form action="{{route('posts.update',$post->id) }}" method="POST" class="form">
        {{-- <form action="/posts/{{ $post->id }}" method="POST" class="form"> --}}
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="field">
          <label class="label">Title</label>
          <div class="control">
            <input class="input @error('title')is-danger @enderror is-normal" name="title" type="text" placeholder="Post Title" value="{{ old('title') }}">
          </div>
          @error('title')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>


        <div class="field">
          <label class="label">Featured Image (URL)</label>
          <div class="control">
            <input class="input @error('featured_image')is-danger @enderror" name="featured_image" type="text" placeholder="http://hi.com/pic.jpg" value="{{ old('featured_image') }}">
          </div>
          @error('featured_image')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
        </div>

        <div class="field">
          <label class="label">Content</label>
          <div class="control">
            <textarea class="textarea @error('content')is-danger @enderror is-small" name="content" placeholder="Post Content">{{ old('content') }}</textarea>
          </div>
          @error('content')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
        </div>
        <div class="field">
          <label class="label">Category</label>
          <div class="control" id="category">
            <div class="select @error('category_id')is-danger @enderror">
              <select name="category_id" value="{{ old('category_id') }}">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('category_id')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label">Tags</label>
          <div class="control" id="tag">
            <div class="select is-multiple @error('tags')is-danger @enderror">
              <select name="tags[]" value="{{ old('tags') }}" multiple>
                @foreach ($tags as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('tags')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button class=" is-link">Update</button>
          </div>
          <div class="control">
            <button class="is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
