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
                    <h3 class="flex-1">Редактирование компании <b>{{ $company->name }}</b></h3>
                    @role('admin')
                    @can('show-companies')
                        <a class="btn h-12 items-center flex btn-warning" href="{{ route('companies.index') }}">
                            <i class="icon-arrow-left-circle pr-3" aria-hidden="true"></i> {{ __('pages.back') }}</a>
                    @endcan
                    @endrole
                    @hasanyrole('owner|employee')
                    @can('show-companies')
                        <a class="btn h-12 items-center flex btn-warning" href="{{ route('company') }}">
                            <i class="icon-arrow-left-circle pr-3" aria-hidden="true"></i> {{ __('pages.back') }}</a>
                    @endcan
                    @endhasanyrole
                </div>

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <edit-company company-id="{{ $company->id }}"></edit-company>
            </div>
        </div>
    </div>
@endsection
