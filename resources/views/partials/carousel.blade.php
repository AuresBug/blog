<div class="row pt-4">
  <div class="col">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">

        @for ($i = 0; $i < 3; $i++)
          <li data-target="#carouselExampleCaptions" data-slide-to="{{ $i }}"
            class=" {{ $i == 0 ? 'active' : '' }}"></li>
        @endfor
      </ol>
      <div class="carousel-inner">
        @foreach ($post_top6 as $post)
          <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <a href="{{ route('posts.public', $post) }}">
              <img src="{{ $post->image('carousel') }}" class="d-block w-100 rounded" alt="...">
              <div class="carousel-caption d-none d-md-block rounded">
                <h1 class="text-bold text-light  text-shadow ">{{ $post->title }}</h1>
                <h5 class="text-light text-shadow">{{ $post->excerpt }}</h5>
              </div>
            </a>
          </div>
        @endforeach




      </div>
      <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </button>
    </div>
  </div>
</div>
