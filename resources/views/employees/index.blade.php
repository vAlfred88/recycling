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
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Сотрудники</h3>
                    @can('create-users')
                        <a class="btn btn-success pull-right" href="{{ route('employees.create') }}">
                            <i class="icon-plus"></i> Новый сотрудник
                        </a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-borderless" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>
                                        <a href="{{ route('employees.show', $user) }}">
                                            {{ $user->name }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('employees.show', $user) }}">
                                            {{ $user->email }}
                                        </a>
                                    </td>
                                    <td>
                                        @foreach($user->roles as $role)
                                            <span class="label label-success">
                                                {{ $role->label }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td>
                                        @can('update-users')
                                            @if(!$user->hasRole('owner'))
                                                <a href="{{ route('employees.edit', $user) }}"
                                                   title="Edit User">
                                                    <button class="btn btn-primary btn-sm">
                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"> </i>
                                                    </button>
                                                </a>
                                            @endif
                                        @endcan

                                        @can('delete-users')
                                            @if(!$user->hasRole('owner'))
                                                {!! Form::open([
                                                       'method'=>'DELETE',
                                                       'route' => ['employees.destroy', $user],
                                                       'style' => 'display:inline'
                                                   ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete User',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            @endif
                                        @endcan
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--<div class="pagination-wrapper"> {!! $users->appends(['search' => request()->get('search')])->render() !!} </div>--}}
                    </div>

                </div>
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