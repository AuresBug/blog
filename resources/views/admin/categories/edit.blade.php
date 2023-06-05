@extends('adminlte::page')

@section('title', __('Edit category'))

@section('content_header')

  <div class="row">
    <div class="col-auto">
      <h1 class="m-0 text-dark">{{ __('Edit category') }}</h1>
    </div>
    @can('delete', $category)
      <div class="col-auto ml-auto">
        @include('share.buttons.destroy', ['url' => route('categories.destroy', $category)])
      </div>
    @endcan
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          {!! Form::model($category, [
              'route' => ['categories.update', $category],
              'method' => 'PUT',
              'class' => 'form-horizontal',
          ]) !!}

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
