@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Редактирование услуги"</h3>
                    @can('view-services')
                        <a class="btn btn-success pull-right" href="{{ route('services.index') }}">
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

                    {!! Form::model($service, [
                        'method' => 'PATCH',
                        'route' => ['services.update', $service],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('services.form', ['submitButtonText' => __('fields.update')])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
