@extends('front.layouts.main')

@section('content')
    <div class="inner">
        <h1 class="page-name">Отзывы компании</h1>
        <div class="tb w100 comments-table">
            <div class="tbc left-cell">
                <form class="control-box shadow-element">
                    <div class="select-box">
                        <select class="region">
                            <option value="Saint-Petersburg">Москва</option>
                            <option value="Moscow">Санкт-Петербург</option>
                            <option value="Yekaterinburg">Екатеринбург</option>
                            <option value="Krasnoyarsk">Красноярск</option>
                        </select>
                    </div>
                    <label class="checkbox-btn db all-reviews">
                        <input type="checkbox">
                        <span>Все отзывы</span>
                    </label>

                    <span class="cuption db">Офис</span>
                    <label class="checkbox-btn db office">
                        <input type="checkbox">
                        <span>{{ $company->address }}</span>
                    </label>

                    <span class="cuption db">Пункты приема</span>
                    <label class="checkbox-btn db reception-point">
                        <input type="checkbox">
                        <span>ул. Гагарина д. 53</span>
                    </label><label class="checkbox-btn db reception-point">
                        <input type="checkbox">
                        <span>ул. Покровская д. 23</span>
                    </label><label class="checkbox-btn db reception-point">
                        <input type="checkbox">
                        <span>ул. Шебургская д. 15</span>
                    </label>
                </form>
            </div>
            <div class="tbc right-cell">
                <review-list :company="{{ $company }}"></review-list>
                <review-create company-id="{{ $company->id }}"
                               login-url="{{ route('login') }}"
                               register-url="{{ route('register') }}"
                               auth="{{ auth()->check() }}"></review-create>
            </div>
        </div>
    </div>
    <!-- modal-->
    <div class="g-hidden">
        <div class="b-modal" id="w-modal">
            <div class="warning-modal">
                <div class="b-modal_close arcticmodal-close"></div>
                <span class="warning-modal__message_top">
                        Что-бы отставить отзыв, вы должны быть аторизованным!
                    </span>
                <div class="warning-modal__btn-box clearfix">
                    <a class="reg-btn reg-btn_bg shadow-element fleft">Войти</a>
                    <a class="reg-btn reg-btn_no-bg shadow-element fright">Регистрация</a>
                </div>
                <div class="grey-line"></div>
                <span class="warning-modal__message_bottom">
                        Пока никто не оставил отзыв. Ваш отзыв может стать первым.
                    </span>
            </div>
        </div>
    </div>
@endsection
