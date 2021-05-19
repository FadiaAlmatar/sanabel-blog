<x-layouts.app>
  <section class="section is-large">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-4">
          <div class="card">
            <p class="title is-4 p-3">{{ $title }}</p>
            <div class="card-content">
              <div class="content">
                {{ $slot }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</x-layouts.app>
