{{-- <x-layouts.app>
  <h2 class="title is-2">{{ $tag->name }}</h2>
  <ul>
    @foreach ($tag->posts as $post)
      <li>{{ $post->title }}</li>
    @endforeach
  </ul>
</x-layouts.app> --}}


{{-- <x-layouts.app>
  <h2 class="title is-2">{{ $category->name }}</h2>
  <ul>
    @foreach ($category->posts as $post)
      <li>{{ $post->title }}</li>
    @endforeach
  </ul>
</x-layouts.app> --}}
<x-layouts.app>
  <section class="hero is-success is-medium">
    <div class="hero-body" style="background-color: #eb640a;">
      <div class="container has-text-centered" >
        <p class="title">
          <h1 style="color:black;">{{$tag->name}}</h1>
          <h4 style="color:black;">{{$tag->slug}}</h4>
          @if (Session::get('success'))
          <div class="notification is-primary is-light">
            <button class="delete"></button>
            {{ Session::get('success') }}
          </div>
          @endif

          @if (Session::get('danger'))
          <div class="notification is-danger is-light">
            <button class="delete"></button>
            {{ Session::get('danger') }}
          </div>
          @endif
        </p>
      </div>
    </div>
    <div class="hero-foot" style="background-color:black;">
      <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
          <ul>
             @auth<li><a href="{{ route('tags.edit', $tag) }}"style="text-decoration:none; color:#eb640a;"><b>Edit</b></a></li>
            <li><a href="{{ route('tags.destroy', $tag->id) }}" style="text-decoration:none; color:#eb640a;"><b>Delete</b></a></li>
            <li><a href="{{ route('tags.create') }}"style="text-decoration:none; color:#eb640a;"><b>Create New Tag</b></a></li>@endauth
            <li><a href="{{ route('tags.index') }}"style="text-decoration:none; color:#eb640a;"><b>All Tags</b></a></li>
           </ul>
        </div>
      </nav>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <p class="content">
        <h3>Related Posts</h3>
        <ul>
          @foreach ($tag->posts as $post)
            <li><a href="{{route('posts.show',$post)}}" style="text-decoration:none; color:black"><b>{{ $post->title }}</b></a></li>
          @endforeach
        </ol>
      </p>
    </div>
  </section>
  </x-layouts>
