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
                    <h3 class="flex-1">Изменение пользователя</h3>
                    @can('show-users')
                        <a class="btn h-12 items-center flex btn-success"
                           href="{{ route('users.index') }}">
                            <i class="icon-arrow-left-circle pr-3" aria-hidden="true"></i> {{ __('pages.back') }}</a>
                    @endcan
                </div>

                <edit-user user-id="{{$user->id}}"
                           path="{{ route('users.update', $user) }}">
                </edit-user>

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
@endsection
