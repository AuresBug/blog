@extends('adminlte::page')

@section('title', __('My Posts'))

@section('content_header')
  <div class="row">
    <div class="col-auto">

      <h1 class="m-0 text-dark">{{ __('My Posts') }} </h1>
    </div>
    @can('posts.create')
      <div class="col-auto ">
        @include('share.buttons.create', ['url' => route('posts.create')])
      </div>
    @endcan
  </div>
@stop

@section('content')


  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-sm" id="posts-table">
            <thead>
              <tr>
                {{-- <th>&nbsp;</th> --}}
                <th>{{ __('Title') }}</th>
                <th>{{ __('Status') }}</th>
                <th>{{ __('Created at') }}</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
@stop


@section('js')
  @include('share.datatable', [
      'element_id' => 'posts-table',
      'url' => route('posts.getIndexTable'),
      'fields' => [
          ['name' => 'title'],
          ['name' => 'status'],
          ['name' => 'created_at'],
          [
              'name' => 'action',
              'orderable' => false,
              'searchable' => false,
          ],
      ],
  ])
@endsection
