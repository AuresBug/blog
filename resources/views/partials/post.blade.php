<div class="card">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img class="img-fluid rounded-left" src="https://picsum.photos/id/{{ rand(1, 1000) }}/300/200" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">
          {{ $post->excerpt }}
          <br>
          <a class="btn btn-link" href="#" role="button">{{ __('Read more...') }}</a>
        </p>

        <p class="card-text"><small class="text-muted">Last updated {{ $post->created_at->diffForHumans() }}</small></p>
      </div>
    </div>
  </div>
</div>
