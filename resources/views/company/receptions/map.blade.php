@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="flex align-baseline items-center">
                    <h3 class="flex-1">Пункты приема</h3>
                    {{--@can('show-receptions')--}}
                    <a href="{{ route('company.receptions.create') }}" class="button button-orange">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Добавить
                    </a>
                    <a href="{{ route('company.receptions.index') }}" class="button button-default">Показать списком</a>
                    <a href="#" class="button button-default">Открыть на сайте</a>
                    {{--@endcan--}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="w-full bg-white shadow mt-15 rounded">
                    <receptions-map></receptions-map>
                </div>
            </div>
        </div>
    </div>
@endsection