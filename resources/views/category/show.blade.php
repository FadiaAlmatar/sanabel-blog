
<x-layouts.app>
  <section class="hero is-success is-medium">
    <div class="hero-body" style="background-color: #eb640a;">
      <div class="container has-text-centered" >
        <p class="title">
          <h1 style="color:black;">{{$category->name}}</h1>
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
           @auth <li><a href="{{ route('categories.edit', $category) }}"style="text-decoration:none; color:#eb640a;"><b>Edit</b></a></li>
            <li><a href="{{ route('categories.destroy', $category->id) }}" style="text-decoration:none; color:#eb640a;"><b>Delete</b></a></li>
            <li><a href="{{ route('categories.create') }}"style="text-decoration:none; color:#eb640a;"><b>Create New Category</b></a></li>@endauth
            <li><a href="{{ route('categories.index') }}"style="text-decoration:none; color:#eb640a;"><b>All Categories</b></a></li>
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
          @foreach ($category->posts as $post)
            <li><a href="{{route('posts.show',$post)}}" style="text-decoration:none; color:black"><b>{{ $post->title }}</b></a></li>
          @endforeach
        </ul>
      </p>
    </div>
  </section>
  </x-layouts>
