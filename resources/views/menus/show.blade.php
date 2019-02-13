@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Меню</h3>
                    @can('view-'.str_slug('Menus'))
                        <a class="btn btn-success pull-right" href="{{ route('menus.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Назад</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $menu->id }}</td>
                            </tr>
                            <tr>
                                <th>Имя</th>
                                <td> {{ $menu->name }} </td>
                            </tr>
                            <tr>
                                <th>Название</th>
                                <td> {{ $menu->label }} </td>
                            </tr>
                            <tr>
                                <th>Иконка</th>
                                <td> {{ $menu->icon }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

