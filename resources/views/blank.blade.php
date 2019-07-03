@extends('front.layouts.main')

@push('css')
    <style>
        .logo-lg {
            width: auto;
            height: 66px;
        }
    </style>
@endpush

@section('content')
    <h1 class="great-title" style="margin-top: 50px;margin-bottom: 50px">Инофрмационный портал для участников рынка оборота вторичного сырья. Индексы биржевых цен на металлы.</h1>
    <main id="main" class="join-site" style="margin-top: -1px">

        <div class="company-box ">
            <div class="inner">
                <div class="container rL clearfix">
                    <div class="company-box__elem company-box__elem_left fleft">
                        <div class="company-box__elem__img-box" style="height: auto">
                            {{ svg_image('logo', 'logo-lg') }}
                        </div>
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
                        <span class="company-box__elem__text">
                            Рейтинг - Мы обьеденили всех ломозаготовителей, чтобы сделать самый достоверный рейтинг
                        </span>
                        <a class="btn" href="{{ route('front.rating') }}">Смотреть</a>
                    </div>
                    <div class="white-line_vertical"></div>

                </div>
            </div>
        </div>
        <h2 class="title">Пустая страница</h2>
    </main>
@endsection
