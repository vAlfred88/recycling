<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Адрес', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('address', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Телефон', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('open') ? 'has-error' : ''}}">
    {!! Form::label('open', 'Работает с', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::time('open', null, ['class' => 'form-control', 'min'=>'9:00', 'max'=>'18:00',]) !!}
        <p class="help-block">Например: 9:00</p>
        {!! $errors->first('open', '<p class="help-block">:message</p>') !!}
    </div>
</div>


<div class="form-group {{ $errors->has('close') ? 'has-error' : ''}}">
    {!! Form::label('close', 'Работает до', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::time('close', null, ['class' => 'form-control', 'min'=>'9:00', 'max'=>'18:00',]) !!}
        <p class="help-block">Например: 18:00</p>
        {!! $errors->first('close', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
