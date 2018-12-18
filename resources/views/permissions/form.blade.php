<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', __('fields.name'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control form-control-line', 'placeholder' => __('roles.name')]) !!}
        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('label') ? 'has-error' : ''}}">
    {!! Form::label('label', __('fields.label'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('label', null, ['class' => 'form-control form-control-line', 'placeholder' => __('roles.label')]) !!}
        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : __('fields.create'), ['class' => 'btn btn-primary']) !!}
    </div>
</div>
