@extends('front.layouts.main')

@section('content')
    <div class="inner">
        <h1 class="great-title">Инофрмационный портал для участников рынка оборота вторичного сырья. Индексы биржевых
            цен на металлы.</h1>
        <h2 class="title">В тренде</h2>
        <div class="metall-trend-box rL ">
            <div class="row rL clearfix">
                <div class="metall-trend-wrap">
                    <div class="metall-trend-item shadow-element clearfix">
                        <div class="metall-trend-item__header clearfix">
                            <span class="metall-trend-item__price db fright">8,26 $</span>
                            <span class="metall-trend-item__title db">
                                    Алюминий
                                </span>
                        </div>
                        <div class="index fright growth">7483</div>
                        <div class="schedule" style="background-image: url(images/schedule-1.png)"></div>
                    </div>
                </div>
                <div class="metall-trend-wrap">
                    <div class="metall-trend-item shadow-element clearfix">
                        <div class="metall-trend-item__header clearfix">
                            <span class="metall-trend-item__price db fright">7,26 $</span>
                            <span class="metall-trend-item__title db">
                                    Цинк
                                </span>
                        </div>
                        <div class="index fright growth">6293</div>
                        <div class="schedule" style="background-image: url(images/schedule-1.png)"></div>
                    </div>
                </div>
                <div class="metall-trend-wrap">
                    <div class="metall-trend-item shadow-element clearfix">
                        <div class="metall-trend-item__header clearfix">
                            <span class="metall-trend-item__price db fright">5,06 $</span>
                            <span class="metall-trend-item__title db">
                                    Медь
                                </span>
                        </div>
                        <div class="index fright falling">8236</div>
                        <div class="schedule" style="background-image: url(images/schedule-1.png)"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column-container tb">
            <div class="left-column tbc">
                <span class="column-title">ТОП-10 ломозаготовителей</span>
                <div class="table-container shadow-element">
                    <div class="table-overflow-x">
                        <table class="company-table ">
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
                        </table>
                    </div>
                    <a class="btn">Все ломозаготовители</a>
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
