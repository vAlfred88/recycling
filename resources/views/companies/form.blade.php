<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Название компании', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control form-control-line', 'placeholder' => 'Название компании']) !!}
        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Номер телефона', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', null, ['class' => 'form-control form-control-line', 'placeholder' => 'Номер телефона']) !!}
        @if($errors->has('phone'))
            <span class="help-block">{{ $errors->first('phone') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
    {!! Form::label('description', __('fields.label'), ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('description', null, ['class' => 'form-control form-control-line']) !!}
        @if($errors->has('description'))
            <span class="help-block">{{ $errors->first('description') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('site') ? 'has-error' : ''}}">
    {!! Form::label('site', 'Сайт', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('site', null, ['class' => 'form-control form-control-line', 'placeholder' => 'Сайт']) !!}
        @if($errors->has('name'))
            <span class="help-block">{{ $errors->first('site') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::email('email', null, ['class' => 'form-control form-control-line', 'placeholder' => 'Email']) !!}
        @if($errors->has('email'))
            <span class="help-block">{{ $errors->first('email') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('address', 'Адрес компании', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('address', null, ['class' => 'form-control form-control-line', 'placeholder' => 'Адрес компании']) !!}
        @if($errors->has('address'))
            <span class="help-block">{{ $errors->first('address') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('inn', 'Инн компании', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('inn', null, ['class' => 'form-control form-control-line']) !!}
        @if($errors->has('address'))
            <span class="help-block">{{ $errors->first('address') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('kpp', 'КПП компании', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('kpp', null, ['class' => 'form-control form-control-line']) !!}
        @if($errors->has('address'))
            <span class="help-block">{{ $errors->first('address') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    {!! Form::label('ogrn', 'ОГРН компании', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('ogrn', null, ['class' => 'form-control form-control-line', 'placeholder' => 'ОГРН компании']) !!}
        @if($errors->has('address'))
            <span class="help-block">{{ $errors->first('address') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('with_owner', 'Создать администратора компании', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::checkbox('with_owner', true, false, ['class' => 'form-control form-control-line']) !!}
    </div>
</div>

<div class="form-group {{ $errors->has('owner_email') ? 'has-error' : ''}}">
    {!! Form::label('owner_email', 'Email администратора', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('owner_email', null, ['class' => 'form-control form-control-line', 'placeholder' => 'Email администратора']) !!}
        @if($errors->has('address'))
            <span class="help-block">{{ $errors->first('owner_email') }}</span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('owner_name') ? 'has-error' : ''}}">
    {!! Form::label('owner_name', 'Имя администратора', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('owner_name', null, ['class' => 'form-control form-control-line', 'placeholder' => 'Имя администратора']) !!}
        @if($errors->has('address'))
            <span class="help-block">{{ $errors->first('owner_name') }}</span>
        @endif
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
