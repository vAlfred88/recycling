@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Просмотр услуги</h3>
                    @can('view-services')
                        <a class="btn btn-success pull-right" href="{{ route('services.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Назад</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $service->id }}</td>
                            </tr>
                            <tr>
                                <th>Название</th>
                                <td> {{ $service->name }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

