@extends('front.layouts.main')

@push('css')
    <style>
        .logo-lg {
            width: auto;
            height: 100px;
            margin-bottom: 11px;
        }
    </style>
@endpush

@section('content')
    <main id="main" class="join-site" style="margin-top: -1px">
        <div class="company-box ">
            <div class="inner">
                <div class="container rL clearfix">
                    <div class="company-box__elem company-box__elem_left fleft">
                        <div class="company-box__elem__img-box">
                            {{ svg_image('logo', 'logo-lg') }}
                        <div class="company-box__elem__img-box" style="height: auto">
                            <img src="{{ asset('images/logo.png') }}" alt="Логотип компании">
                        </div>
                        {{--                        <span class="company-box__elem__title">Вторсервис</span>--}}
                        <span class="company-box__elem__text">
                            Вторсервис - площадка объединяющая участников рынка переработки вторсырья
                        </span>
                        <a class="btn" href={{route('front.about')}}>Подробнее</a>

                    </div>
                    <div class="white-line hide"></div>
                    <div class="company-box__elem company-box__elem_rigth fright">
                        <div class="company-box__elem__img-box">
                            <img src="{{asset('img/rating-icon.png')}}" alt="Иконка рейтинга">
                        </div>
                        <span class="company-box__elem__title">Рейтинг</span>
                        <span class="company-box__elem__text">
                            Мы обьеденили всех ломозаготовителей, чтобы сделать самый достоверный рейтинг
                        </span>
                        <a class="btn" href="{{ route('front.rating') }}">Смотреть</a>
                    </div>
                    <div class="white-line_vertical"></div>

                </div>
            </div>
        </div>
        <div class="inner">
            <h2 class="great-title great-title_first">
                Выберите аккуант частного лица, если хотите работать на себя
            </h2>
            <input type="text" class=" db">
            <div class="bizznes-block bizznes-block_individual rL shadow-element clearfix">
                <div class="bizznes-block__left-block fleft">
                    <div class="title">Физическое лицо</div>
                    <ul>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="inb icon feedback-icon"></span>
                            </span>
                            <div class="text-cell tbc">
                                Оставляйте отзывы о компаниях и получайте бонусы
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('person_register') }}" class="btn">Регистрация</a>
                </div>
                <div class="bizznes-block__right-block fright">
                    <div class="title">Скоро</div>
                    <ul>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="icon hammer"></span>
                            </span>
                            <span class="itext-cell tbc">
                                Участвуйте в торговой площадке, тендерах и аукционах
                            </span>
                        </li>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="icon bonus"></span>
                            </span>
                            <span class="itext-cell tbc">
                                Оформите карту и получайте на нее бонусы
                            </span>
                        </li>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="icon rating"></span>
                            </span>
                            <span class="itext-cell tbc">
                                Повышайте свой рейтинг и учавствуйте в конкурсах
                            </span>
                        </li>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="icon calc"></span>
                            </span>
                            <span class="itext-cell tbc">
                                Ломокалькулятор
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <h2 class="great-title great-title_first">
                Получите преимущества для компаний - ломозаготовителей
            </h2>
            <div class="bizznes-block bizznes-block_company rL shadow-element clearfix">
                <div class="bizznes-block__left-block fleft">
                    <div class="title">Ломозаготовители</div>
                    <ul>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="inb icon man-icon"></span>
                            </span>
                            <div class="text-cell tbc">
                                Создайте и наполните профиль компании
                            </div>
                        </li>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="inb icon rating-icon"></span>
                            </span>
                            <div class="text-cell tbc">
                                Участвуйте в рейтинге для повышения интереса к компании
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('company_register') }}" class="btn">Регистрация</a>
                </div>
                <div class="bizznes-block__right-block fright">
                    <div class="title">Скоро</div>
                    <ul>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="icon circl"></span>
                            </span>
                            <span class="itext-cell tbc">
                                Проводите аналитические и статистические исследования
                            </span>
                        </li>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="icon megafon"></span>
                            </span>
                            <span class="itext-cell tbc">
                                Рекламируйте свою компанию с помощью услуг платформы
                            </span>
                        </li>
                        <li class="tb">
                            <span class="icon-cell tbc">
                                <span class="icon handshake"></span>
                            </span>
                            <span class="itext-cell tbc">
                                Сотрудничайте с другими представителями отрасли
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
