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
                    <h3 class="flex-1">
                        Редактирование пункта приема
                    </h3>
                    @can('show-receptions')
                        <a class="btn h-12 items-center flex btn-success"
                           href="{{ route('receptions.index') }}">
                            <i class="icon-arrow-left-circle pr-3" aria-hidden="true"></i>
                            Назад
                        </a>
                    @endcan
                </div>

                <edit-reception reception-id="{{ $reception->id }}"></edit-reception>

            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
