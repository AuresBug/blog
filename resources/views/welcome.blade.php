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



  {{-- Cards --}}
  @include('partials.cards')

  {{-- Nav --}}
  @include('partials.navs')




  {{-- Carousel --}}
  @include('partials.carousel')


  {{-- Posts --}}
  <div class="row pt-4 ">
    <div class="col-12 ">

      {{-- <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 "> --}}
      @forelse ($posts as $post)
        @include('partials.post')
      @empty
        @include('partials.post-empty')
      @endforelse
      {{-- </div> --}}
      {{ $posts->links() }}

    </div>


    {{-- right column --}}
    {{--

    <div class="col-xl-3  d-none d-xl-block">
      <div class="row sticky-top">
        <div class="col">

          <div class="row ">
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
    </div>


    --}}
    {{-- End right column --}}


  </div>

@stop
