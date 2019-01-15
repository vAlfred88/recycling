@extends('layouts.master')

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="pull-left">Rating 5</h5>
                        <h5 class="pull-right">
                            Reviews <span class="text-success">+3</span>
                            <span class="text-danger">-5</span>
                        </h5>
                    </div>
                </div>
                <div class="white-box">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="text-center">
                                <img src="{{asset('images\metal.png')}}" alt="" class="img-fluid" width="60%">
                                <h5>{{ $company->name }}</h5>
                                <span class="text-muted">{{ $company->address }}</span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h5>О компании</h5>
                            <p>{{ $company->description }}</p>
                        </div>
                        <div class="col-md-4">
                            <h5>Реквизиты компании</h5>
                            <p><a href="#" class="text-warning">{{ $company->site }}</a></p>
                            <p>{{ $company->email }}</p>
                            <p>{{ $company->phone }}</p>
                            <div class="col-md-12 col-md-offset-1">
                                <div class="row">
                                    <button class="btn btn-facebook waves-effect btn-circle waves-light"
                                            type="button">
                                        <i class="fa fa-facebook"></i>
                                    </button>
                                    <button class="btn btn-twitter waves-effect btn-circle waves-light"
                                            type="button">
                                        <i class="fa fa-twitter"></i>
                                    </button>
                                    <button class="btn btn-googleplus waves-effect btn-circle waves-light"
                                            type="button">
                                        <i class="fa fa-google-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="white-box">
                    <div class="row">
                        @foreach($users as $user)
                            <div class="col-md-3">
                                <div class=text-center>
                                    <div class="user-content">
                                        <a href="#">
                                            <img src="{{ $user->image }}"
                                                 class="thumb-lg img-circle"
                                                 alt="img"></a>
                                        <h4 class="text-dark">{{ $user->name }}</h4>
                                        <p class="text-warning">{{ $user->position }}</p>
                                        <p class="text-dark">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="text-center">
                            <button class="btn btn-default">Скрыть</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush