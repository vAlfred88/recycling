@extends('layouts.app')

@section('content')
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('register') }}">
                {{csrf_field()}}
                <h3 class="box-title m-b-20">Регистрация</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                               placeholder="Имя" name="name" value="{{ old('name') }}" required autofocus>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="password" type="password"
                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                               placeholder="Пароль" name="password" required>

                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               placeholder="Подтверждение пароля" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary p-t-0 text-center">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup">Я согласен с <a href="#">условиями</a></label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"
                                type="submit">Регистрация
                        </button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Уже есть аккаунт? <a href="{{route('login')}}" class="text-primary m-l-5"><b>Войти</b></a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

