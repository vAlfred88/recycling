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
                    <h3 class="box-title pull-left">Редактирование компании {{ $company->name }}</h3>
                    @role('admin')
                        @can('show-companies')
                            <a class="btn btn-success pull-right" href="{{ route('companies.index') }}">
                                <i class="icon-arrow-left-circle" aria-hidden="true"></i> {{ __('pages.back') }}</a>
                        @endcan
                    @endrole
                    @hasanyrole('owner|employee')
                        @can('show-companies')
                            <a class="btn btn-success pull-right" href="{{ route('company') }}">
                                <i class="icon-arrow-left-circle" aria-hidden="true"></i> {{ __('pages.back') }}</a>
                        @endcan
                    @endhasanyrole
                    <div class="clearfix"></div>
                    <hr>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <edit-company company-id="{{ $company->id }}"></edit-company>

                    {{--{!! Form::model($company, ['route' => ['companies.update', $company], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}--}}

                    {{--@include ('companies.form', ['submitButtonText' => __('fields.update')])--}}

                    {{--{!! Form::close() !!}--}}
                </div>
            </div>
        </div>
    </div>
@endsection
