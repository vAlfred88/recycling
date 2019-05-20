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
                    <h3 class="box-title pull-left">Редактирование сотрудника</h3>
                    {{--@can('show-'.str_slug('Users'))--}}
                        <a class="btn btn-success pull-right" href="{{ route('employees.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    {{--@endcan--}}
                    <div class="clearfix"></div>
                    <hr>

                    <edit-user user-id="{{$user->id}}" path="{{ route('api.users.update', $user, false) }}"></edit-user>

                    {{--{!! Form::model($user, [--}}
                        {{--'method' => 'PATCH',--}}
                        {{--'route' => ['employees.update', $user],--}}
                        {{--'class' => 'form-horizontal',--}}
                        {{--'files' => true--}}
                    {{--]) !!}--}}

                    {{--@include ('employees.form', ['submitButtonText' => 'Update'])--}}

                    {{--{!! Form::close() !!}--}}

                </div>
            </div>
        </div>
    </div>
@endsection
