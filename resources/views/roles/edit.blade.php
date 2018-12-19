@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ __('roles.edit') }} {{ $role->name }}</h3>
                    @can('view-roles')
                        <a class="btn btn-success pull-right" href="{{ route('roles.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> {{ __('pages.back') }}</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>

                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                    @include ('roles.form', ['submitButtonText' => __('fields.update')])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
