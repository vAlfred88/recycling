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
                <div class="row">
                    <h3 class="p-l-20 pull-left">Пункты приема</h3>
                    <div class="pull-right p-r-20">
                        <a href="{{ route('company.receptions.create') }}" class="btn btn-warning">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                            Добавить
                        </a>
                        <button class="btn btn-default">Открыть на сайте</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                @foreach($receptions as $reception)
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-6 border-r">
                                <p class="my-5 py-5">Адрес: {{ $reception->address }}</p>
                                <p class="border-t my-5 py-5 border-b">Телефон: {{ $reception->phone }}</p>
                                @foreach($reception->periods as $period)
                                    <p class="">
                                        <span>{{ $period->day }}</span>
                                        Открыто с {{ $period->open }} до {{ $period->close }}
                                    </p>
                                @endforeach
                            </div>
                            <div class="col-md-6">
                                <p class="text-center">Услуги</p>
                                @foreach($reception->services as $service)
                                    <p class="text-center">{{ $service->name }}</p>
                                @endforeach
                            </div>
                            <div class="col-md-12 mt-5 flex flex-wrap border-t">
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
                            <div class="col-md-12 pull-right">
                                <a href="{{ route('company.receptions.edit', $reception) }}" class="btn-warning btn">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    Изменить
                                </a>
                                {!! Form::open([
                                                   'method'=>'DELETE',
                                                   'route' => ['company.receptions.destroy', $reception],
                                                   'style' => 'display:inline'
                                               ]) !!}
                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                        'type' => 'submit',
                                        'class' => 'btn btn-danger',
                                        'title' => 'Delete User',
                                        'onclick'=>'return confirm("Confirm delete?")'
                                )) !!}
                            </div>
                        </div>
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