@extends('front.layouts.main')

@section('content')
    <div class="inner">
        <div class="column-container tb">
            <div class="left-column tbc">
                <company-filter></company-filter>
                {{--                @include('front.partials.filter')--}}
                <company-list></company-list>
            </div>
            <div class="right-column tbc">
                <span class="column-title">Другие металлы</span>
                <div class="metall-table-container shadow-element">
                    <table class="metall-table">
                        <tr class="tr">
                            <th><span>Металл</span></th>
                            <th><span>Курс</span></th>
                        </tr>
                        <tr>
                            <td>Алюминий</td>
                            <td>
                                    <span class="rate inb growth">
                                        <span class="price">8,26 $</span><br>
                                        <span class="percent">4,05 %</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Олово</td>
                            <td>
                                    <span class="rate inb falling">
                                        <span class="price">6,78 $</span><br>
                                        <span class="percent">0,05 %</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Цинк</td>
                            <td>
                                    <span class="rate inb growth">
                                        <span class="price">6,78 $</span><br>
                                        <span class="percent">0,05 %</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Медь</td>
                            <td>
                                    <span class="rate inb growth">
                                        <span class="price">6,78 $</span><br>
                                        <span class="percent">0,05 %</span>
                                    </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Олово</td>
                            <td>
                                    <span class="rate inb growth">
                                        <span class="price">6,78 $</span><br>
                                        <span class="percent">0,05 %</span>
                                    </span>
                            </td>
                        </tr>
                    </table>
                    <div class="link-box">
                        Данные предоставлены сервисом <a href="www.lme.com">www.lme.com</a>
                    </div>
                </div>
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
