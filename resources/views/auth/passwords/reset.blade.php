@extends('front.layouts.auth')

@section('content')

    <div class="tbc">
        <div class="log-reg-block inb">
            <span class="title db alLeft">Добро пожаловать в <span class="org-name">Вторсервис</span>
            </span>
            <span class="db mess">Восстановить пароль</span>

            <form method="POST" action="{{ route('password.request') }}">
                @csrf
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
                    <input placeholder="Email" id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                           value="{{ $email ?: old('email') }}" required autofocus>

                    <input id="password" placeholder="Password" type="password"
                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                           name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif

                    <input placeholder="Confirm Password" id="password-confirm" type="password" class="form-control"
                           name="password_confirmation" required>
                </div>

                <div class="warning-modal__btn-box clearfix">
                    <button class="reg-btn reg-btn_bg shadow-element fleft" type="submit">Восстановить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
