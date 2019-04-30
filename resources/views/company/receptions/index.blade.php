@extends('layouts.master')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="text-left col-lg-4 text-left">
                                Пункты приема
                            </div>
                            <div class="text-left col-lg-6 pull-right">
                                <div class="row">
                                        {{--@can('show-receptions')--}}
                                        <a href="{{ route('company.receptions.create') }}" class="button button-orange">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                            Добавить
                                        </a>
                                        <a href="{{ route('company.receptions.map') }}" class="button button-default">Показать на карте</a>
                                        <a href="#" class="button button-default">Открыть на сайте</a>
                                        {{--@endcan--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                {{--<div class="flex align-baseline items-center">--}}
                    {{--<h3 class="flex-1">Пункты приема</h3>--}}
                    {{--@can('show-receptions')--}}
                    {{--<a href="{{ route('company.receptions.create') }}" class="button button-orange">--}}
                        {{--<i class="fa fa-plus" aria-hidden="true"></i>--}}
                        {{--Добавить--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('company.receptions.map') }}" class="button button-default">Показать на карте</a>--}}
                    {{--<a href="#" class="button button-default">Открыть на сайте</a>--}}
                    {{--@endcan--}}
                {{--</div>--}}
            </div>
            <div class="col-sm-12">
                @foreach($receptions as $reception)
                    {{--<div class="white-box">--}}
                    <div class="flex align-baseline justify-center">
                        <div class="w-1/2 shadow bg-white p-10 mr-5 rounded">
                            <p class="my-5 py-5">Адрес: {{ $reception->address }}</p>
                            <p class="my-5 py-5">Телефон: {{ $reception->phone }}</p>
                            <div class="w-1/2 mx-auto">
                                @foreach($reception->periods as $period)
                                    <div class="flex align-baseline py-3">
                                        <div class="w-1/3 px-2 mx-2">
                                                <span class="bg-orange-light block text-uppercase text-center rounded text-white">
                                                    {{ $period->day }}
                                                </span>
                                        </div>
                                        <!--fixme-->
                                        <input type="text"
                                               class="border-b mx-2 align-baseline text-center border-orange-light w-1/3"
                                               value="{{$period->open}}">
                                        <input type="text"
                                               class="border-b mx-2 align-baseline text-center border-orange-light w-1/3"
                                               value="{{$period->close}}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="w-1/2 bg-white shadow p-10 ml-5 rounded">
                            <p class="text-center">Услуги</p>
                            @foreach($reception->services as $service)
                                <p class="text-center">{{ $service->name }}</p>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-full mt-10 flex flex-wrap bg-white shadow rounded">
                        @foreach($reception->users as $user)
                            <div class="w-1/5">
                                <div class="py-10">
                                    <div class="text-center">
                                        <img class="rounded-full h-24 w-auto" src="{{ $user->image }}"
                                             alt="{{ $user->name }}">
                                    </div>
                                    <div class="px-3 pt-3">
                                        <p class="text-2xl break-words text-center">{{ $user->name }}</p>
                                        <p class="text-orange-light text-base text-center py-2">{{ $user->position }}</p>
                                        <p class="text-grey-dark text-xl text-center break-words">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="w-full mt-10 flex align-baseline justify-center mb-10">
                        <a href="{{ route('company.receptions.edit', $reception) }}" class="button button-default">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            Изменить
                        </a>
                        {{--todo vue delete--}}
                        {{--<a class="button button-danger"--}}
                           {{--href="#"--}}
                           {{--onclick="return confirm('Confirm delete?');">--}}
                            {{--<i class="fa fa-trash"></i>--}}
                            {{--Удалить--}}
                        {{--</a>--}}
                        {!! Form::open(['route' => ['company.receptions.destroy', $reception],  'method' => 'DELETE']) !!}

                        {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i> ' . __('fields.delete'), ['class' => 'button button-danger', 'title' => __('fields.delete'), 'onclick'=>'return confirm("Confirm delete?")', 'type' => 'submit', 'id' => 'delete']) !!}

                        {!! Form::close() !!}
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection



@push('js')
    <script src="{{asset('plugins/components/toast-master/js/jquery.toast.js')}}"></script>

    <script src="{{asset('plugins/components/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            @if(\Session::has('message'))
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '{{session()->get('message')}}',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            @endif
        });

        $(function () {
            $('#myTable').DataTable({
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

@endpush
