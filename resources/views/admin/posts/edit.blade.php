@extends('adminlte::page')

@section('title', __('Edit post'))

@section('content_header')

  <div class="row">
    <div class="col-auto">
      <h1 class="m-0 text-dark">{{ __('Edit post') }}</h1>
    </div>
    @can('delete', $post)
      <div class="col-auto ml-auto">
        @include('share.buttons.destroy', ['url' => route('posts.destroy', $post)])
      </div>
    @endcan
  </div>
@stop

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">

          {!! Form::model($post, ['route' => ['posts.update', $post], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

          @include('admin.posts.includes.form')

          @include('share.buttons.submit_cancel', ['url' => route('posts.index')])

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
