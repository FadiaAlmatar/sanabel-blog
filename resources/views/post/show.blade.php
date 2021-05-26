 <x-layouts.app>
<section class="hero is-success is-medium">
  <div class="hero-body" style="background-color: #eb640a;">
    <div class="container has-text-centered" >
      <p class="title">
        <h1 style="color:black;">{{$post->title}}</h1>
        <h3 style="color:black;">{{$post->category->name}}</h3>
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
         @auth <li><a href="{{ route('posts.edit', $post) }}"style="text-decoration:none; color:#eb640a;"><b>Edit</b></a></li>
          <li><a href="{{ route('posts.delete', $post->id) }}" style="text-decoration:none; color:#eb640a;"><b>Delete</b></a></li>
          <li><a href="{{ route('posts.create') }}"style="text-decoration:none; color:#eb640a;"><b>Create New Post</b></a></li>@endauth
          <li><a href="{{ route('categories.show', $post->category) }}"style="text-decoration:none; color:#eb640a;"><b>Show related Posts</b></a></li>
        </ul>
      </div>
    </nav>
  </div>
</section>
<section class="section">
  <div class="container">
      <figure class="myimage">
      <img src="{{ $post->featured_image }}">
    </figure>
    <div class="content mycontent">
      <ul style="list-style-type: none" class="tag-list">
        @foreach ($post->tags as $tag)
          <li><a href="{{route('tags.show',$tag)}}" style="text-decoration:none; color:blue"><b>#{{$tag->name}} &nbsp;</b></a></li>
        @endforeach
      </ul>
      {{-- {{ $post->content }} --}}
       <div class="content" id="content">
      {!! $post->content !!}
    </div>
    </div>
    {{-- <div class="content" id="content">
      {!! $post->content !!}
    </div> --}}
  </div>
</section>
<section class="section">
  <div class="container">
        <div class="field">
          <p class="control">
            <textarea  cols="70" rows="3" placeholder="Add a comment..."></textarea>
          </p>
        </div>
        <div class="field">
          <p class="control">
            <button >Post comment</button>
          </p>
        </div>
  </div>

</section>
</x-layouts>
