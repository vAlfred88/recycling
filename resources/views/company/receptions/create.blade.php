@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Новый пункт приема</h3>
                    @can('show-companies')
                    <a class="btn btn-success pull-right" href="{{ route('company.receptions.index') }}">
                        <i class="icon-arrow-left-circle"></i> Назад</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    {!! Form::open(['route' => 'company.receptions.store', 'class' => 'form-horizontal', 'files' => true]) !!}

                    <google-map></google-map>

                    {{--@include ('company::receptions.form')--}}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
