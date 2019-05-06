@extends('front.layouts.auth')

@section('content')
    <div class="tbc">
        <div class="log-reg-block inb">
            <span class="title db alLeft">Добро пожаловать в <span class="org-name">Вторсервис</span>
            </span>
            <span class="db mess">Используйте для входа почту и пароль</span>
            <div class="indicator-box">
                <span class="indicator"></span>
                <span class="indicator active"></span>
            </div>
            <form method="POST" action="{{ route('register-back') }}">
                {{csrf_field()}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="input-box">
                    <input type="text" name="name" class="name inputbox" placeholder="Введите имя" autocomplete="off" value="{{ old('name') }}">
                    <input type="text" name="email" class="email inputbox" placeholder="Введите email" autocomplete="off" value="{{ old('email') }}">
                    <input type="password" name="password" class="password inputbox" placeholder="Введите пароль" autocomplete="off">
                    <input type="password" name="password_confirmation" class="repeat-password inputbox" placeholder="Подтвердите пароль" autocomplete="off">
                </div>

                <div class="warning-modal__btn-box clearfix">
                    <a href="{{ route('login') }}" class="reg-btn reg-btn_no-bg shadow-element fleft">Есть аккаунт</a>
                    <button type="submit" class="reg-btn reg-btn_bg  shadow-element fright">Регистрация</button>
                </div>
            </form>
        </div>
    </div>
@endsection
