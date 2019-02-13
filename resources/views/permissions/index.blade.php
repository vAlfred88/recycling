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
                    <h3 class="box-title pull-left">{{ __('permissions.permission') }}</h3>
                    @can('add-'.str_slug('Permissions'))
                        <a class="btn btn-success pull-right" href="{{ route('permissions.create') }}">
                            <i class="icon-plus"></i> {{ __('permissions.create') }}
                        </a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('fields.name') }}</th>
                                <th>{{ __('fields.label') }}</th>
                                <th>{{ __('fields.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $loop->iteration or $permission->id }}</td>
                                    <td>
                                        @can('view-'.str_slug('Permissions'))
                                            <a href="{{ route('permissions.show', $permission) }}"
                                               title="{{ __('fields.more') }}">
                                                {{ $permission->name }}
                                            </a>
                                        @else
                                            {{ $permission->name }}
                                        @endcan
                                    </td>
                                    <td>
                                        @can('view-'.str_slug('Permissions'))
                                            <a href="{{ route('permissions.show', $permission) }}"
                                               title="{{ __('fields.more') }}">
                                                {{ $permission->label }}
                                            </a>
                                        @else
                                            {{ $permission->label }}
                                        @endcan
                                    </td>
                                    <td>
                                        @can('edit-'.str_slug('Permissions'))
                                            <a href="{{ route('permissions.edit', $permission) }}"
                                               title="{{ __('fields.update') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o"
                                                       aria-hidden="true"></i> {{ __('fields.update') }}
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Permissions'))
                                            {!! Form::open(['route' => ['permissions.destroy', $permission], 'style' => 'display:inline', 'method' => 'DELETE']) !!}

                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ' . __('fields.delete'), ['class' => 'btn btn-danger btn-sm', 'title' => __('fields.delete'), 'onclick'=>'return confirm("Confirm delete?")', 'type' => 'submit', 'id' => 'delete']) !!}

                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {!! $permissions->appends(['search' => Request::get('search')])->render() !!}
                        </div>
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
                'aoColumnDefs': [
                    {
                        'bSortable': false,
                        'aTargets': [-1] /* 1st one, start by the right */
                    }],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json"
                }
            })

        })
    </script>

@endpush
