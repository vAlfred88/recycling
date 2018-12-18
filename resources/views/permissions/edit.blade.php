@extends('layouts.master')

@push('css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Редактирование #{{ $permission->name }}</h3>
                    @can('view-'.str_slug('Permission'))
                        <a class="btn btn-success pull-right" href="{{ route('permissions.index') }}">
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

                    {!! Form::model($permission, [route('permissions.update'), 'method' => 'put', 'class' => 'form-horizontal']) !!}

                    @include ('permissions.form', ['submitButtonText' => __('fields.update')])

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

    <script>
      $(document).ready(function () {
        $('#roles').select2()
      })
    </script>
@endpush
