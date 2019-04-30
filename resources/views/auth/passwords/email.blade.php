@extends('front.layouts.auth')

@section('content')
    <div class="tbc">
        <div class="log-reg-block inb">
            <span class="title db alLeft">Добро пожаловать во <span class="org-name">Вторсервис</span>
            </span>
            <span class="db mess">Для восстановления пароля введите свой Email и вам будут высланы инструкции.</span>

            <form method="post"
                  action="{{ route('password.email') }}">
                @csrf
                <div class="input-box">
                    <input id="email" placeholder="Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                </div>

                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="warning-modal__btn-box clearfix">
                    <button class="reg-btn reg-btn_bg shadow-element fleft" type="submit">Восстановить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
