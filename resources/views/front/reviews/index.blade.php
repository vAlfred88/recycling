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
                        <span>ул.Тверская д. 9</span>
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
                <div class="comments-box shadow-element">
                    <div class="comments-box__header clearfix">
                        <span class="db address fleft">ул. Шебургская д. 15</span>
                        <div class="comments-indicator-box fright">
                                <span class="positive-comments">
                                    <span class="positive">5 </span>Положительный
                                </span>
                            <span class="negative-comments">
                                    <span class="negative">1 </span>Отрицательный
                                </span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    @foreach($reviews as $review)
                    <div class="comments-item">
                        <div class="comments-item__header clearfix">
                            <span class="comments-item__header__avatar db"></span>
                            <span class="comments-item__header__name rL hid db">
                                {{ $review->username }}
                            </span>
                            <span class="comments-item__header__date rL hid db">
                                {{ $review->created_at->diffForHumans() }}
                            </span>
                        </div>
                        <div class="comments-item__comment comments-item__comment_positive">
                            <p>{{ $review->body }}</p>
                        </div>
                    </div>
                    @endforeach
{{--                    <div class="comments-item">--}}
{{--                        <div class="comments-item__header clearfix">--}}
{{--                            <span class="comments-item__header__avatar db"--}}
{{--                                  style="background-image: url(images/ava-review-5.png);"></span>--}}
{{--                            <span class="comments-item__header__name rL hid db">Егор Денисов</span>--}}
{{--                            <span class="comments-item__header__date rL hid db">15.07.2018</span>--}}
{{--                        </div>--}}
{{--                        <div class="comments-item__comment comments-item__comment_negative">--}}
{{--                            <p>Прайс не соответсует данным, ужасный пункт!!!</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <form class="leave-comment shadow-element">
                    <textarea class="leave-comment__textatea textarea" placeholder="Оставить отзыв..."></textarea>
                    <div class="leave-comment__btn-box">
                        <label class="positive-radio">
                            <input type="radio" name="comment-radio" value="positive">
                            <span></span>
                        </label>
                        <label class="negative-radio">
                            <input type="radio" name="comment-radio" value="negative">
                            <span></span>
                        </label>
                        <!-- Когда пользователь не зарегистрирован, то у нижеприведенного input присутствует класс user-not-registered, по которому вызывается модальное окно -->
                        <input type="button" value="Отправить" class="user-not-registered">
                    </div>
                </form>
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
