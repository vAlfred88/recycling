@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Создание новой компании</h3>
                    @can('create', \App\Company::class)
                        <a class="btn btn-success pull-right" href="{{ route('companies.index') }}">
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

                    {!! Form::open(['route' => 'companies.store', 'method' => 'POST', 'class' => 'form-horizontal']) !!}

                    @include ('companies.form', ['submitButtonText' => __('fields.create')])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
