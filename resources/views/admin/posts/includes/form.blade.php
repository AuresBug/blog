<div class="row">
  <div class="col-md-9">
    <div class="card">

      <div class="card-body">

        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
          {!! Form::label('title', __('Title')) !!}
          {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
          <small class="text-danger">{{ $errors->first('title') }}</small>
        </div>





        <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
          {!! Form::label('excerpt', __('Excerpt')) !!}
          {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'required' => 'required', 'rows' => 3]) !!}
          <small class="text-danger">{{ $errors->first('excerpt') }}</small>
        </div>

        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
          {!! Form::label('body', __('Body')) !!}
          {!! Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) !!}
          <small class="text-danger">{{ $errors->first('body') }}</small>
        </div>

      </div>
    </div>
  </div>


  <div class="col-md-3">
    <div class="card ">
      <img class="card-img-top img-fluid rounded-top"
        src="{{ isset($post) ? $post->image() : asset('https://picsum.photos/id/' . rand(1, 1000) . '/1920/1080') }}"
        alt="">




      <div class="card-body">
        <div class="custom-file form-group{{ $errors->has('image') ? ' has-error' : '' }} ">
          <input name='image' type="file" class="custom-file-input" id="customFileLangHTML">
          <label class="custom-file-label" for="customFileLangHTML"
            data-browse="{{ __('Browser') }}">{{ __('Select file') }}</label>
          <p class="help-block">Help block text</p>
          <small class="text-danger">{{ $errors->first('image') }}</small>
        </div>

        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }} mt-4">
          {!! Form::label('status', 'Status') !!}
          {!! Form::select('status', $statuses, null, [
              'id' => 'status',
              'class' => 'form-control select2',
              'required' => 'required',
          ]) !!}
          <small class="text-danger">{{ $errors->first('status') }}</small>
        </div>


        @include('share.buttons.submit_cancel', ['url' => route('posts.index')])

      </div>
    </div>
  </div>
</div>
