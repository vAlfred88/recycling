@extends('layouts.master')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Create New User</h3>
                    {{--@can('show-'.str_slug('Users'))--}}
                        <a class="btn btn-success pull-right" href="{{ route('employees.index') }}">
                            <i class="icon-arrow-left-circle"></i> View User</a>
                    {{--@endcan--}}
                    <div class="clearfix"></div>
                    <hr>

                    {!! Form::open(['route' => 'employees.store', 'class' => 'form-horizontal', 'files' => true]) !!}

                    @include ('employees.form')

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
