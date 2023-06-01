@extends('adminlte::page')

@section('title', __('New post'))

@section('content_header')

  <div class="row">
    <div class="col-auto">
      <h1 class="m-0 text-dark">{{ __('New post') }}</h1>
    </div>
    {{-- <div class="col-auto ml-auto">
      <a class="btn btn-secondary" href="{{ route('posts.index') }}" post="button" data-toggle="tooltip"
        data-placement="top" title="Regresar"><i class="fas fa-chevron-left fa-fw"></i> Regresar</a>
    </div> --}}
  </div>
@stop

@section('content')


  <div class="row">
    <div class="col-md-12">
      {!! Form::open(['method' => 'POST', 'route' => 'posts.store', 'class' => 'form-horizontal', 'files' => true]) !!}


      @include('admin.posts.includes.form')




      {!! Form::close() !!}
    </div>
  </div>

@stop

@section('plugins.duallistbox', true)


@section('adminlte_js')
  <script>
    $('.duallistbox').bootstrapDualListbox({
      nonSelectedListLabel: 'Disponibles',
      selectedListLabel: 'Activos',
      moveOnSelect: false,
    });
  </script>
@endsection
