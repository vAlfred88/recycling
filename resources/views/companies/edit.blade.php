@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ __('company.edit') }} {{ $company->name }}</h3>
                    @can('update', $company)
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

                    {!! Form::model($company, ['route' => ['companies.update', $company], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

                    @include ('companies.form', ['submitButtonText' => __('fields.update')])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
