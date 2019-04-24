@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="text-left col-lg-4 text-left">
                                Моя компания
                            </div>
                            <div class="text-left col-lg-8 pull-right">
                                <div class="row">
                                    <div class="col-lg-8 text-right">
                                        <span class="text-muted text-lowercase"
                                              style="font-size: 1.25rem">
                                            зарегистрирована с 21 декаюря 2018
                                        </span>
                                    </div>
                                    <div class="col-lg-4 pull-right">
                                        <a href="{{ route('companies.edit', $company) }}"
                                           class="btn btn-sm btn-block btn-outline btn-warning">
                                            Редактировать
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="text-center flex mx-auto w-full">
                                    <img src="{{asset($company->logo)}}" alt="" class="img-fluid w-auto mx-auto" width="200px" height="200px">
                                </div>
                                <div class="panel-footer text-center">
                                    <p class="text-3xl mb-5">{{ optional($company)->name }}</p>
                                    <div class="row">
                                        <button class="btn btn-facebook waves-effect btn-circle waves-light"
                                                type="button">
                                            <i class="fa fa-facebook"></i>
                                        </button>
                                        <button class="btn btn-twitter waves-effect btn-circle waves-light"
                                                type="button">
                                            <i class="fa fa-twitter"></i>
                                        </button>
                                        <button class="btn btn-googleplus waves-effect btn-circle waves-light"
                                                type="button">
                                            <i class="fa fa-google-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="col-lg-8">
                                    Статус публикации
                                </div>
                                <div class="col-lg-4 pull-right">
                                    <a href="{{ route('front.rating') }}"
                                       class="btn btn-sm btn-block btn-outline btn-default">
                                        Открыть рейтинг
                                    </a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <h5>Вы находитесь на 12м месте в рейтинге ломозаготовителей</h5>
                                <div class="progress progress-lg">
                                    <div class="progress-bar progress-bar-warning active progress-bar-striped"
                                         style="width: 75%;"
                                         role="progressbar">
                                        <span class="text-dark">Анкета заполнена на 75%</span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 text-left">
                                        <a href="#">Снять компанию с публикации</a>
                                    </div>
                                    <div class="col-lg-8 text-right">
                                        <i class="icon-bulb"></i>
                                        <span>Внимание, компания не будет доступна в поиске и в рейтинге</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                <div class="row">
                                    <div class="text-left col-lg-4 text-left">
                                        О компании
                                    </div>
                                    <div class="text-left col-lg-8 text-right">
                                        <div class="col-lg-5 pull-right">
                                            <button class="btn btn-sm btn-block btn-outline btn-default">
                                                Открыть на сайте
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                {{ optional($company)->description }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Реквизиты компании
                            </div>
                            <div class="panel-body text-left">
                                <div class="col-lg-4">
                                    <h5><a href="#" class="text-warning">{{ optional($company)->site }}</a></h5>
                                    <h5>{{ optional($company)->phone }}</h5>
                                    <h5>{{ optional($company)->email }}</h5>
                                </div>
                                <div class="col-lg-4">
                                    <h5>{{ optional($company)->address }}</h5>
                                </div>
                                <div class="col-lg-4">
                                    <h5>ИНН {{ optional($company)->inn }}</h5>
                                    <h5>КПП {{ optional($company)->kpp }}</h5>
                                    <h5>ОГРН {{ optional($company)->ogrn }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--<div class="row">--}}
        {{--<div class="col-lg-12">--}}
        {{--<div class="panel panel-default">--}}
        {{--<div class="panel-heading">--}}
        {{--<div class="col-lg-5">--}}
        {{--Услуги доступные в пунктах приема--}}
        {{--</div>--}}
        {{--<div class="col-lg-">--}}
        {{--<div class="col-lg-4 pull-right">--}}
        {{--<button class="btn btn-sm btn-block btn-outline btn-default">--}}
        {{--Открыть пункты приема--}}
        {{--</button>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="panel-body">--}}
        {{--<div class="row">--}}
        {{--<div class="col-lg-6">--}}
        {{--<p>Лом цветных металлов</p>--}}
        {{--<p>Черный металлолом</p>--}}
        {{--<p>Демонтаж металлоконструкций</p>--}}
        {{--<p>Вывоз металлолома</p>--}}
        {{--</div>--}}
        {{--<div class="col-lg-6">--}}
        {{--<p>Лом цветных металлов</p>--}}
        {{--<p>Черный металлолом</p>--}}
        {{--<p>Демонтаж металлоконструкций</p>--}}
        {{--<p>Вывоз металлолома</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="row">
            <div class="col-lg-12">

            </div>
        </div>
    </div>
@endsection

@push('js')
@endpush
