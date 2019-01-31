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
                    <h3 class="box-title pull-left">Редактирование пользователя</h3>
                    @can('show-users')
                        <a class="btn btn-success pull-right" href="{{ route('users.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Назад</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    <edit-user user-id="{{$user->id}}" path="{{ route('users.update', $user, false) }}" :extended="true"></edit-user>

                    {{--{!! Form::model($user, [--}}
                        {{--'method' => 'PATCH',--}}
                        {{--'route' => ['users.update', $user],--}}
                        {{--'class' => 'form-horizontal',--}}
                        {{--'files' => true--}}
                    {{--]) !!}--}}

                    {{--@include ('users.form', ['submitButtonText' => 'Update'])--}}

                    {{--{!! Form::close() !!}--}}

                </div>
            </div>
        </div>
    </div>
@endsection
