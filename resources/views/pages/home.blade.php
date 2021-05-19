{{-- <x-layouts.app> --}}
  {{-- <section class="hero is-large is-primary">
    <div class="container">
      <div class="hero-body has-text-centered">
        <p class="title">
          Sanabel Blog
        </p>
        <p class="subtitle">
          Welcome to our Blog, here you will learn about Laravel
        </p>
      </div>
    </div>
  </section> --}}
  <!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.2/css/bulma.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  </head>

  <body>
  <x-navbar />
  <x-carousel />

  <section class="section">
    <div class="container">
      <div class="title is-3 has-text-centered">
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
        Our Latest Posts
      </div>
      {{-- row --}}
      <div class="columns is-multiline">
        @foreach ($posts as $post)
        <div class="column is-4">
          <a href="{{ route('posts.show', $post) }}" style="text-decoration: none;">
            <div class="card" style="height: 100%;" id="postcard">
              <div class="card-image" id="postimage">
                <figure class="image is-4by3" >
                  <img src="{{ $post-> featured_image }}" alt="Placeholder image" >
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-4">{{ $post->title }}</p>

                  </div>
                </div>
                <div class="content">
                  <span style="color: black">{{substr($post->content,0,20)}}....</span>
                  <a href="{{ route('posts.show', $post->id) }}" style="color: blue;text-decoration: none;">read more</a>
                  <br>
                  <time datetime="2016-1-1">{{ $post->created_at }}</time>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach
        <div class="column is-12">
          {{-- <div class="field is-grouped"> --}}
          <div class="buttons is-centered">
            <a href="{{ route('posts.index') }}" style="text-decoration: none">See All Posts</a>
          </div>



        {{-- </div> --}}
      </div>
    </div>
  </section>

  <x-footer />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>


{{-- </x-layouts.app> --}}
