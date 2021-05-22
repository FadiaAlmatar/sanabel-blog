<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-4">
          <div class="card">
            <div class="card-header">
              <div class="card-header-title">
                {{ $title }}
              </div>
            </div>
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
