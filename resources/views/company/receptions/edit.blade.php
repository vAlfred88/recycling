@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Изменение пункта приема {{ $reception->id }}</h3>
                    {{--@can('show-'.str_slug('Users'))--}}
                    <a class="btn btn-success pull-right" href="{{ route('company.receptions.index') }}">
                        <i class="icon-arrow-left-circle" aria-hidden="true"></i> Назад</a>
                    {{--@endcan--}}
                    <div class="clearfix"></div>
                    <hr>

                    {!! Form::model($reception, [
                        'method' => 'PATCH',
                        'route' => ['company.receptions.update', $reception],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('company.receptions.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
