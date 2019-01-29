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
                    <h3 class="box-title pull-left">Create New User</h3>
                    @can('view-'.str_slug('Users'))
                        <a class="btn btn-success pull-right" href="{{ route('users.index') }}">
                            <i class="icon-arrow-left-circle"></i> View User</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    {{--<create-user path="{{ route('users.store', [], false) }}"></create-user>--}}

                    {!! Form::open(['route' => 'users.store', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('users.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
