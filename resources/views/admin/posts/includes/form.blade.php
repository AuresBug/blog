  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', __('Title')) !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('title') }}</small>
  </div>


  <div class="form-group{{ $errors->has('excerpt') ? ' has-error' : '' }}">
    {!! Form::label('excerpt', __('Excerpt')) !!}
    {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('excerpt') }}</small>
  </div>

  <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    {!! Form::label('body', __('Body')) !!}
    {!! Form::textarea('body', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('body') }}</small>
  </div>

  <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    {!! Form::label('status', 'Input label') !!}
    {!! Form::select('status', $statuses, null, [
        'id' => 'status',
        'class' => 'form-control select2',
        'required' => 'required',
    ]) !!}
    <small class="text-danger">{{ $errors->first('status') }}</small>
  </div>
