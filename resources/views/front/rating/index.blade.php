@extends('front.layouts.main')

@section('content')
    <div class="inner">
        <div class="column-container tb">
            <div class="left-column tbc">
                <company-filter></company-filter>
                <company-list></company-list>
            </div>
            <div class="right-column tbc">
                <metals-list></metals-list>
                <div class="rating-banner">
                    <div class="rating-banner_header">
                        <span class="db">В рейтинге уже </span>
                        <span class="quantity db">250</span>
                        <span class="db">ломозаготовителей</span>
                    </div>
                    <span class="main-text">
                            Стань членом крупнейшего сообщества
                        </span>
                    <a href="{{ route('register') }}#company" class="btn db">Зарегистрироваться</a>
                </div>
            </div>
        </div>
    </div>
    <div class="over-footer clearfix">
        <div class="inner">
            <a class="btn fright">О портале Вторсервис</a>
            <a class="btn fright">Как считается Рейтинг?</a>
        </div>
    </div>
@endsection
