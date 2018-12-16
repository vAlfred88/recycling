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
                    {{--<div class="user-btm-box">--}}
                    {{--<div class="col-md-4 col-sm-4 text-center">--}}
                    {{--<p class="text-purple"><i class="ti-facebook"></i></p>--}}
                    {{--<h1>258</h1> </div>--}}
                    {{--<div class="col-md-4 col-sm-4 text-center">--}}
                    {{--<p class="text-blue"><i class="ti-twitter"></i></p>--}}
                    {{--<h1>125</h1> </div>--}}
                    {{--<div class="col-md-4 col-sm-4 text-center">--}}
                    {{--<p class="text-danger"><i class="ti-dribbble"></i></p>--}}
                    {{--<h1>556</h1> </div>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="white-box">
                    <div>
                        {{ html()->modelForm($user, 'PUT', route('profile.update'))->class('form-horizontal form-material')->open() }}
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            {{ html()->label('Имя', 'name')->class('col-md-12') }}
                            <div class="col-md-12">
                                {{ html()->input('text', 'name')->placeholder('Иванов Иван')->class('form-control form-control-line') }}
                                @if($errors->has('name'))
                                    <span class="help-block">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            {{ html()->label('Email', 'email')->class('col-md-12') }}
                            <div class="col-md-12">
                                {{ html()->input('text', 'email')->placeholder('example@mail.com')->class('form-control form-control-line') }}
                                @if($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            {{ html()->label('Пароль', 'password')->class('col-md-12') }}
                            <div class="col-md-12">
                                {{ html()->password('email')->class('form-control form-control-line') }}
                                @if($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                            {{ html()->label('Телефон', 'phone')->class('col-md-12') }}
                            <div class="col-md-12">
                                {{ html()->input('text', 'phone')->placeholder('+7 123 456 78 90')->class('form-control form-control-line') }}
                                @if($errors->has('phone'))
                                    <span class="help-block">{{ $errors->first('phone') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                            {{ html()->label('Должность', 'position')->class('col-md-12') }}
                            <div class="col-md-12">
                                {{ html()->input('text', 'position')->placeholder('Администратор')->class('form-control form-control-line') }}
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
                        {{html()->form()->close()}}
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