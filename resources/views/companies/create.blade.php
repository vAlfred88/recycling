@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{--<div class="white-box">--}}
                <div class="flex align-baseline items-center">
                    <h3 class="flex-1">Создание новой компании</h3>
                    @can('create', \App\Company::class)
                        <a class="btn h-12 items-center flex btn-success"
                           href="{{ route('companies.index') }}">
                            <i class="icon-arrow-left-circle pr-3" aria-hidden="true"></i> {{ __('pages.back') }}</a>
                    @endcan
                </div>
                {{--<div class="clearfix"></div>--}}
                {{--<hr>--}}

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <company-form></company-form>

                {{--{!! Form::open(['route' => 'companies.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}--}}

                {{--@include ('companies.form', ['submitButtonText' => __('fields.create')])--}}

                {{--{!! Form::close() !!}--}}
            </div>
            {{--</div>--}}
        </div>
    </div>
@endsection
