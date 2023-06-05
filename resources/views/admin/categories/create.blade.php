@extends('adminlte::page')

@section('title', __('New category'))

@section('content_header')

  <div class="row">
    <div class="col-auto">
      <h1 class="m-0 text-dark">{{ __('New category') }}</h1>
    </div>
    {{-- <div class="col-auto ml-auto">
      <a class="btn btn-secondary" href="{{ route('categories.index') }}" category="button" data-toggle="tooltip"
        data-placement="top" title="Regresar"><i class="fas fa-chevron-left fa-fw"></i> Regresar</a>
    </div> --}}
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          {!! Form::open(['method' => 'POST', 'route' => 'categories.store', 'class' => 'form-horizontal']) !!}

          @include('admin.categories.includes.form')

          @include('share.buttons.submit_cancel', ['url' => route('categories.index')])

          {!! Form::close() !!}
        </div>
      </div>
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
