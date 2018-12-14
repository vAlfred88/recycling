@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Моя компания</div>
                    <div class="panel-body">Основная информация о компании</div>
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="text-center">
                                    <img src="{{asset('images\logo.png')}}" alt="" class="img-fluid" width="100%">
                                </div>
                            </div>
                            <div class="clo-lg-9">
                                <h4>Описание компании
                                    <small>
                                        <br>Email: company@vtroservice.ru
                                        <br>Телефон: +7 909 999 99 99
                                    </small>
                                </h4>
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
                        Услуги в карточке компании
                    </div>
                    <div class="panel-body">
                        <p>Лом цветных металлов</p>
                        <p>Черный металлолом</p>
                        <p>Демонтаж металлоконструкций</p>
                        <p>Вывоз металлолома</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Статус публикации</div>
                    <div class="panel-body">
                        <div class="progress progress-lg">
                            <div class="progress-bar progress-bar-success" style="width: 75%;" role="progressbar">
                                Анкета заполнена на 75%
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 text-left">
                                <a href="#" >Снять компанию с публикации</a>
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