@extends('front.layouts.main')

@section('content')
    <div class="inner">
        <h1 class="great-title">Информационный портал для участников рынка оборота вторичного сырья. Индексы биржевых
            цен на металлы.</h1>
        <h2 class="title">В тренде</h2>
        <div class="metall-trend-box rL ">
            <div class="row rL clearfix">
                <al-chart metal="Aluminium" name="al">Алюминий</al-chart>
                <al-chart metal="Zinc" name="zn">Цинк</al-chart>
                <al-chart metal="Copper" name="cp">Медь</al-chart>
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
                                        <a href="{{ route('front.recycles.show', $company) }}">
                                            <span class="text-box inb rL">
                                                <span class="company-name">{{ $company->name }}</span>
                                                <span
                                                    class="company-location">{{ str_limit($company->description, 30) }}</span>
                                                <span class="company-logo abs"
                                                      style="background-image: url({{asset($company->logo)}}"></span>
                                            </span>
                                        </a>
                                    </td>
                                    <td>12.5</td>
                                    <td>{{ $company->positiveReviews }}<span class=“slash”> / </span><span class=“fraction” style="color: red">{{ $company->negativeReviews }}</span></td>
                                    <td>{{ $company->receptions_count }}</td>
                                    <td>3</td>
                                    <td><span class="rating-growth">34.2</span></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <a class="btn" href={{route('front.rating')}}>Все ломозаготовители</a>
            </div>
            <div class="right-column tbc">
                <metals-list></metals-list>
            </div>
        </div>
    </div>
    <div class="over-footer clearfix">
        <div class="inner">
            <a href="{{ url('about') }}" class="btn fright">О портале Вторсервис</a>
            <a href="{{ url('about') }}" class="btn fright">Как считается Рейтинг?</a>
        </div>
    </div>
@endsection
