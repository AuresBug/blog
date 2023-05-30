@extends('adminlte::page')



@section('css')

  <style>
    .text-shadow {
      text-shadow: 1px 1px 8px #000;
    }
  </style>
@endsection


@section('title', 'Inicio')

@section('content_header')




@stop

@section('content')

  {{-- Carousel --}}
  @include('partials.carousel')

  {{-- Cards --}}
  @include('partials.cards')


  {{-- Posts --}}
  <div class="row pt-4 ">
    <div class="col-md-9">

      @forelse ($posts as $post)
        @include('partials.post')
      @empty
        @include('partials.post-empty')
      @endforelse

    </div>


    {{-- right column --}}

    <div class="col-md-3">

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
    </div>
  </div>

@stop
