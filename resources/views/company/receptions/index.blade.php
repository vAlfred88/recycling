@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <h3 class="p-l-20 pull-left">Пункты приема</h3>
                    <div class="pull-right p-r-20">
                        <a href="{{ route('company.receptions.create') }}" class="btn btn-primary">Добавить</a>
                        <button class="btn btn-default">Открыть на сайте</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                @foreach($receptions as $reception)
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-6">
                                <p>Адрес: {{ $reception->address }}</p>
                                <hr>
                                <p>Телефон: {{ $reception->phone }}</p>
                                <hr>
                                <p>Открыто с {{ $reception->open }} до {{ $reception->close }}</p>
                            </div>
                            <div class="col-md-6">
                                <p class="text-center">Услуги</p>
                            </div>
                            <div class="col-md-12 pull-right">
                                <a href="{{ route('company.receptions.edit', $reception) }}" class="btn-primary btn">Изменить</a>
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