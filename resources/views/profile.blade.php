@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-md-6">
                <div class="white-box">
                    <div class=text-center>
                        <div class="user-content">
                            <a href="#">
                                <img src="{{asset('plugins/images/users/jeffery.jpg')}}"
                                     class="thumb-lg img-circle"
                                     alt="img"></a>
                            <h4 class="text-dark">{{ $user->name }}</h4>
                            <h5 class="text-dark">{{ $user->email }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="white-box">
                    <div>
                        {!! Form::model($user, ['route' => 'profile.update', 'method' => 'put', 'class' => 'form-horizontal form-material']) !!}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {!! Form::label('name', 'Имя' ,['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                {!! Form::text('name', null, ['placeholder' => 'Иватон Иван', 'class' => 'form-control form-inline']) !!}
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {!! Form::label('email', 'Email', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control form-inline']) !!}
                                @if($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            {!! Form::label('password', 'Password', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control form-inline']) !!}
                                @if($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            {!! Form::label('phone', 'Phone', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                {!! Form::text('phone', null, ['placeholder' => 'Phone', 'class' => 'form-control form-inline']) !!}
                                @if($errors->has('phone'))
                                    <span class="help-block">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                            {!! Form::label('position', 'Position', ['class' => 'col-md-12']) !!}
                            <div class="col-md-12">
                                {!! Form::text('position', null, ['placeholder' => 'Position', 'class' => 'form-control form-inline']) !!}
                                @if($errors->has('position'))
                                    <span class="help-block">{{ $errors->first('position') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button class="btn btn-success">Обновить</button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
@endpush