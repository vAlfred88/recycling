@extends('front.layouts.auth')

@section('content')
    <div class="tbc">
        <div class="log-reg-block inb">
            <span class="title db alLeft">Добро пожаловать во <span class="org-name">Recycling</span>
            </span>
            <span class="db mess">Используйте для входа почту и пароль</span>
            <div class="indicator-box">
                <span class="indicator active"></span>
                <span class="indicator"></span>
            </div>
            <form method="post"
                  action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="input-box">
                    <input type="text" name="email" class="email inputbox" placeholder="Введите email" autocomplete="off">
                    <input type="password" name="password" class="password inputbox" placeholder="Введите пароль" autocomplete="off">
                </div>
                <div class="help-box clearfix">
                    <a href="{{ route('password.request') }}" class="link-forgot">Забыли пароль?</a>
                    <label class="check">
                        <input type="checkbox" name="remember">
                        <span></span>
                        <i>Запомнить меня</i>
                    </label>
                </div>
                <div class="warning-modal__btn-box clearfix">
                    <button class="reg-btn reg-btn_bg shadow-element fleft">Войти</button>
                    <a href="{{ route('register') }}" class="reg-btn reg-btn_no-bg shadow-element fright">Создать аккаунт</a>
                </div>
            </form>
        </div>
    </div>
@endsection
