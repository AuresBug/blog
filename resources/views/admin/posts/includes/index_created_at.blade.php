<div class="row justify-content-end">
  <div class="col">
    <a class="btn btn-link" href="{{ route('posts.show', $post) }}" post="button">{{ $post->created_at->diffForHumans() }}
    </a>
  </div>
</div>
