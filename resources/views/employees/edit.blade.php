@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Edit User #{{ $user->id }}</h3>
                    {{--@can('show-'.str_slug('Users'))--}}
                        <a class="btn btn-success pull-right" href="{{ route('employees.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    {{--@endcan--}}
                    <div class="clearfix"></div>
                    <hr>

                    {!! Form::model($user, [
                        'method' => 'PATCH',
                        'route' => ['employees.update', $user],
                        'class' => 'form-horizontal',
                        'files' => true
                    ]) !!}

                    @include ('employees.form', ['submitButtonText' => 'Update'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection
