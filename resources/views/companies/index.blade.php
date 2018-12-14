@extends('layouts.master')

@push('css')
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
                                        <button class="btn btn-sm btn-block btn-outline btn-warning">
                                            Редактировать
                                        </button>
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
                                <div class="text-center">
                                    <img src="{{asset('images\logo.png')}}" alt="" class="img-fluid" width="100%">
                                </div>
                                <div class="panel-footer text-center">
                                    <h3>Название компании</h3>
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
                            <div class="panel-heading ">
                                <div class="row">
                                    <div class="text-left col-lg-4 text-left">
                                        О компании
                                    </div>
                                    <div class="text-left col-lg-8 text-right">
                                        <div class="col-lg-4 pull-right">
                                            <button class="btn btn-sm btn-block btn-outline btn-default">
                                                Открыть на сайте
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi consectetur dolores eos
                                facere iusto labore maiores neque quod sint ut. Autem debitis deserunt officiis! Nobis
                                omnis quae qui similique velit?
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
                                    <h5><a href="#" class="text-warning">mycompany.com</a></h5>
                                    <h5>+7 909 999 99 99</h5>
                                    <h5>company@vtroservice.ru</h5>
                                </div>
                                <div class="col-lg-4">
                                    <h5>г. Москва, тверская дом 9, офис 6</h5>
                                </div>
                                <div class="col-lg-4">
                                    <h5>ИНН 7834545455</h5>
                                    <h5>КПП 4352345345</h5>
                                    <h5>ОГРН 345346555235</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Услуги доступные в пунктах приема
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Лом цветных металлов</p>
                                <p>Черный металлолом</p>
                                <p>Демонтаж металлоконструкций</p>
                                <p>Вывоз металлолома</p>
                            </div>
                            <div class="col-lg-6">
                                <p>Лом цветных металлов</p>
                                <p>Черный металлолом</p>
                                <p>Демонтаж металлоконструкций</p>
                                <p>Вывоз металлолома</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="col-lg-4">
                            Статус публикации
                        </div>
                        <div class="col-lg-8">
                            <div class="col-lg-4 pull-right">
                                <button class="btn btn-sm btn-block btn-outline btn-default">
                                    Открыть рейтинг
                                </button>
                            </div>
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
    </div>
@endsection

@push('js')
@endpush