@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/owl.carousel/owl.carousel.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/components/owl.carousel/owl.theme.default.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    @can('update.profile')
                        <div class="panel-heading">Мой кабинет</div>
                        <div class="panel-wrapper p-b-10 collapse in">
                            <div id="owl-demo" class="owl-carousel owl-theme">
                                <div class="item">
                                    <img src="{{asset('/images/company.png')}}"
                                         alt="Owl Image">
                                </div>
                            </div>
                        </div>
                    @endcan
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title text-center">Просмотров</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash"></div>
                                </li>
                                <li class="text-right">
                                    <i class="ti-arrow-up text-success"></i>
                                    <span class="counter text-success">8659</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title text-center">Отзывов</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash2"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-purple"></i>
                                    <span
                                            class="counter text-purple">7469
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title text-center">Место</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash3" class="active"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-up text-info"></i>
                                    <span class="counter text-info">6011</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-3 col-xs-12">
                        <div class="white-box analytics-info">
                            <h3 class="box-title text-center">Рейтинг</h3>
                            <ul class="list-inline two-part">
                                <li>
                                    <div id="sparklinedash4"></div>
                                </li>
                                <li class="text-right"><i class="ti-arrow-down text-danger"></i>
                                    <span
                                            class="text-danger">18%
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="panel panel-default" style="height: 330px">
                    <div class="panel-heading text-center">
                        Тендеры
                    </div>
                    <div class="col-lg-6">
                        <div class="panel-body">
                            <div class="panel-body">
                                <div class="text-center">
                                    <img src="{{asset('images/handshake.png')}}"
                                         alt=""
                                         class="img-fluid d-block">
                                </div>
                            </div>
                            <div class="text-center">
                                Создавайте тендеры и участвуйте в других
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="panel-body">
                            <ul class="list-inline">
                                <li>
                                    <h5>Реализация лома электродвигателей</h5>
                                    <ul class="list-inline">
                                        <li class="text-muted">Город: Москва</li>
                                        <li class="text-muted">Цена от: 100 000 руб.</li>
                                    </ul>
                                </li>
                                <li>
                                    <h5>Реализация лома электродвигателей</h5>
                                    <ul class="list-inline">
                                        <li class="text-muted">Город: Москва</li>
                                        <li class="text-muted">Цена от: 100 000 руб.</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="panel panel-default" style="height: 330px">
                    <div class="panel-heading text-center">
                        Личная страница
                    </div>
                    <div class="panel-body">
                        <div class="text-center">
                            <img src="{{asset('images/enterprise.png')}}" alt="">
                        </div>
                    </div>
                    <div class="panel-footer text-center">
                        Профиль компании со всей информацией с возможностью рекламы
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Проведение исследований
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="text-center">
                                    <img src="{{asset('images/research.png')}}" alt="">
                                </div>
                            </div>
                            <div class="col-lg-9 text-left">
                                <h4>ЛомСервис предлагает следующие виды проведения исследования и составления
                                    отчетов:</h4>
                                <h5>Автоматический отчет на основе базы сервиса</h5>
                                <p class="text-muted">Включает в себя данные по клиентам, обороту лома и тд</p>
                                <p class="text-muted">Цена: 2 000 руб&</p>
                                <h5>Исследование от специалистов ЛомСервис</h5>
                                <p class="text-muted">По запросу</p>
                                <p class="text-muted">Цена: зависит от требований.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('layouts.partials.right-sidebar')
    </div>

@endsection

@push('js')
    <script src="{{asset('plugins/components/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('plugins/components/owl.carousel/owl.custom.js')}}"></script>
    <script src="{{asset('plugins/components/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{asset('plugins/components/sparkline/jquery.charts-sparkline.js')}}"></script>
@endpush