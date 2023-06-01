{{-- Card horizontal --}}

<div class="card">
  <div class="row no-gutters">
    <div class="col-md-4 order-md-last">
      <img class="img-fluid" src="https://picsum.photos/id/{{ rand(1, 1000) }}/640/480" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">
          {{ $post->excerpt }}
          <br>
          <a class="btn btn-link" href="{{ route('posts.public', $post) }}" role="button">{{ __('Read more...') }}</a>
        </p>
        <p class="card-text"><small class="text-muted">Last updated {{ $post->created_at->diffForHumans() }}</small></p>
      </div>
    </div>
  </div>
</div>



{{-- Card Columns --}}
{{--
<div class="col mb-4 ">
  <div class="card h-100">
    <img class="img-fluid rounded-top" src="https://picsum.photos/id/{{ rand(1, 1000) }}/300/200" alt="...">
    <div class="card-body">
      <h5 class="card-title">{{ $post->title }}</h5>
      <p class="card-text">
        {{ $post->excerpt }}
        <br>
        <a class="btn btn-link" href="{{ route('posts.public', $post) }}" role="button">{{ __('Read more...') }}</a>
      </p>
    </div>
    <div class="card-footer text-muted">
      <p class="card-text"><small class="text-muted">Last updated {{ $post->created_at->diffForHumans() }}</small>
      </p>
    </div>
  </div>
</div> --}}
