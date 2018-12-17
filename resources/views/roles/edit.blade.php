@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit Role #{{ $role->id }}</h3>
                    @can('view-'.str_slug('Role'))
                        <a class="btn btn-success pull-right" href="{{ route('roles.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
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

                    {{ html()->modelForm($role, route('roles.update', $role))->class('form-horizontal')->attributes(['files' => true])->open() }}

                    @include ('roles.form', ['submitButtonText' => 'Update'])

                    {{ html()->form()->close() }}

                </div>
            </div>
        </div>
    </div>
@endsection
