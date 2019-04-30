@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="flex align-baseline items-center">
                    <h3 class="flex-1">Добавление нового пункта приема</h3>
                    @can('show-receptions')
                        <a class="btn h-12 items-center flex btn-success"
                           href="{{ route('receptions.index') }}">
                            <i class="icon-arrow-left-circle pr-3" aria-hidden="true"></i> {{ __('pages.back') }}</a>
                    @endcan
                </div>

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <create-reception></create-reception>
                </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
