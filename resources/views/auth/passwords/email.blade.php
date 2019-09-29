@extends('front.layouts.auth')

@section('content')
    <div class="tbc">
        <div class="log-reg-block inb">
            <span class="title db alLeft">Добро пожаловать во <span class="org-name">Recycling</span>
            </span>
            <span class="db mess">Введите ваш email, вам будет послано письмо с инструкциями</span>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Адрес') }}</label>
                    <div class="input-box">

                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="reg-btn reg-btn_bg shadow-element fleft">
                                {{ __('Восстановить пароль') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
