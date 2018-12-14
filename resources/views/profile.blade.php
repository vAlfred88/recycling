@extends('layouts.master')
@push('css')
@endpush

@section('content')
    <div class="container-fluid">
        <!-- /.row -->
        <!-- .row -->
        <div class="row">
            <div class="col-md-6">
                <div class="white-box">
                    <div class="user-bg"> <img width="100%" alt="user" src="{{asset('plugins/images/large/img1.jpg')}}">
                        <div class="overlay-box">
                            <div class="user-content">
                                <a href="javascript:void(0)"><img src="{{asset('plugins/images/users/1.jpg')}}" class="thumb-lg img-circle" alt="img"></a>
                                <h4 class="text-white">User Name</h4>
                                <h5 class="text-white">info@myadmin.com</h5> </div>
                        </div>
                    </div>
                    {{--<div class="user-btm-box">--}}
                        {{--<div class="col-md-4 col-sm-4 text-center">--}}
                            {{--<p class="text-purple"><i class="ti-facebook"></i></p>--}}
                            {{--<h1>258</h1> </div>--}}
                        {{--<div class="col-md-4 col-sm-4 text-center">--}}
                            {{--<p class="text-blue"><i class="ti-twitter"></i></p>--}}
                            {{--<h1>125</h1> </div>--}}
                        {{--<div class="col-md-4 col-sm-4 text-center">--}}
                            {{--<p class="text-danger"><i class="ti-dribbble"></i></p>--}}
                            {{--<h1>556</h1> </div>--}}
                    {{--</div>--}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="white-box">
                    <div>
                        <form class="form-horizontal form-material">
                            <div class="form-group">
                                <label class="col-md-12">Имя</label>
                                <div class="col-md-12">
                                    <input type="text"
                                           placeholder="Johnathan Doe"
                                           class="form-control form-control-line"></div>
                            </div>
                            <div class="form-group">
                                <label for="example-email" class="col-md-12">Email</label>
                                <div class="col-md-12">
                                    <input type="email"
                                           placeholder="johnathan@admin.com"
                                           class="form-control form-control-line"
                                           name="example-email"
                                           id="example-email"></div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Пароль</label>
                                <div class="col-md-12">
                                    <input type="password" value="password" class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Телефон</label>
                                <div class="col-md-12">
                                    <input type="text"
                                           placeholder="123 456 7890"
                                           class="form-control form-control-line"></div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
        @include('layouts.partials.right-sidebar')
    </div>
@endsection

@push('js')
@endpush