@extends('front.layouts.main')

@section('content')
    <div class="inner">
        <div class="column-container tb">
            <div class="left-column tbc">
                <span class="column-title vT"><span class="inb bT filter-btn"></span>Все ломозаготовители России, участвующие в рейтинге </span>
                @include('front.partials.filter')
                <div class="table-container shadow-element">
                    <div class="table-overflow-x">
                        <table class="company-table">
                            <tr>
                                <th><span>№</span></th>
                                <th><span>Компания</span></th>
                                <th><span>Активность</span></th>
                                <th><span>Отзывы</span></th>
                                <th><span>Пункты<br> приема</span></th>
                                <th><span>Охват<br> городов</span></th>
                                <th><span>Рейтинг</span></th>
                            </tr>
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="{{ route('front.companies.show', $company) }}">
                                            <span class="text-box inb rL">
                                                <span class="company-name">{{ $company->name }}</span>
                                                <span class="company-location">{{ str_limit($company->description, 30) }}</span>
                                                <span class="company-logo abs"></span>
                                            </span>
                                        </a>
                                    </td>
                                    <td>12.5</td>
                                    <td>25</td>
                                    <td>{{ $company->receptions_count }}</td>
                                    <td>3</td>
                                    <td><span class="rating-growth">34.2</span></td>
                                </tr>
                            @endforeach
                            {{--                            <tr class="focus">--}}
                            {{--                                <td>3</td>--}}
                            {{--                                <td> --}}
                            {{--                                    <span class="text-box inb rL">--}}
                            {{--                                        <span class="company-name">Название компании</span>--}}
                            {{--                                        <span class="company-location">Название компании</span>--}}
                            {{--                                        <span class="company-logo abs"></span>--}}
                            {{--                                    </span>--}}
                            {{--                                </td>--}}
                            {{--                                <td>14.7</td>--}}
                            {{--                                <td>23</td>--}}
                            {{--                                <td>9</td>--}}
                            {{--                                <td>7</td>--}}
                            {{--                                <td><span class="rating-growth">29.9</span></td>--}}
                            {{--                            </tr>--}}
                        </table>
                    </div>
                </div>
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
                    <a class="btn db">Зарегестрироваться</a>
                </div>
            </div>
        </div>
    </div>
    <div class="over-footer clearfix">
        <div class="inner">
            <a class="btn fright">О портале Название</a>
            <a class="btn fright">Как считается Рейтинг?</a>
        </div>
    </div>
@endsection
