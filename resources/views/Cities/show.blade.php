@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Просмотр места</h3>
                    @can('view-services')
                        <a class="btn btn-success pull-right" href="{{ route('places.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Назад</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $place->id }}</td>
                            </tr>
                            <tr>
                                <th>Город</th>
                                <td> {{ $place->city }} </td>
                            </tr>
                            <tr>
                                <th>Адрес</th>
                                <td> {{ $place->address }} </td>
                            </tr>
                            <tr>
                                <th>Широта</th>
                                <td> {{ $place->lat }} </td>
                            </tr>
                            <tr>
                                <th>Долгота</th>
                                <td> {{ $place->lng }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="box-title pull-left">Привязанные компании</h3>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $place->addressable->id }}</td>
                            </tr>
                            <tr>
                                <th>Название</th>
                                <td> {{ $place->addressable->name }} </td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td> {{ $place->addressable->email }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
