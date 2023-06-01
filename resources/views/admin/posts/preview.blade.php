@extends('adminlte::page')

@section('title', $post->title)

@section('content_header')


  @if ($post->status == \App\Enums\EnumPostStatuses::DRAFT->value)
    @include('admin.posts.includes.preview-only')
  @endif

  <div class="row">
    <div class="col-auto">

      <h1 class="m-0 text-dark">{{ $post->title }} </h1>
      <h5 class="small"> {{ $post->owner->name }}</h5>
    </div>
    @can('update', $post)
      <div class="col-auto ">
        @include('share.buttons.edit', ['url' => route('posts.edit', $post)])
      </div>
    @endcan


  </div>
@stop

@section('content')

  {{-- Posts --}}
  <div class="row pt-4 ">
    <div class="col-md-9">
      <div class="card">
        <img class="card-img-top img-fluid rounded-top" src="{{ $post->image() }}"
          alt="">
        <div class="card-body">

          <p class="card-text">{{ $post->body }}</p>
        </div>
      </div>
    </div>

    {{-- right column --}}

    {{-- <div class="col-md-3">
      <div class="row">
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item active">Active item</li>
            <li class="list-group-item">Item</li>
            <li class="list-group-item disabled">Disabled item</li>
          </ul>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col">
          <div class="card">
            <img class="card-img-top img-fluid rounded-top" src="https://picsum.photos/id/{{ rand(1, 1000) }}/300/200"
              alt="">
            <div class="card-body">
              <h4 class="card-title">Title</h4>
              <p class="card-text">Text</p>
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  </div>

@stop
