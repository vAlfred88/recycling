@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="flex align-baseline items-center">
                    <h3 class="flex-1">Добавление пользователя</h3>
                    @can('show-users')
                        <a class="btn h-12 items-center flex btn-success"
                           href="{{ route('companies.index') }}">
                            <i class="icon-arrow-left-circle pr-3" aria-hidden="true"></i> {{ __('pages.back') }}</a>
                    @endcan
                </div>
                {{--<div class="clearfix"></div>--}}
                {{--<hr>--}}

                <create-user path="{{ route('users.store', [], false) }}" :extended="true"></create-user>

                {{--{!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal', 'files' => true]) !!}--}}

                {{--@include ('users.form')--}}

                {{--{!! Form::close() !!}--}}

            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
