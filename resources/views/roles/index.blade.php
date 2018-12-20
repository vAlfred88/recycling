@extends('layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}"
          rel="stylesheet"
          type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css"
          rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('plugins/components/sweetalert/sweetalert.css') }}"
          rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ __('roles.roles') }}</h3>
                    @can('add-roles')
                        <a class="btn btn-success pull-right" href="{{ route('roles.create') }}">
                            <i class="icon-plus"></i> {{ __('roles.create') }}
                        </a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-responsive table-hover no-footer" id="myTable">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ __('fields.name') }}</th>
                                <th>{{ __('fields.label') }}</th>
                                <th>{{ __('fields.actions') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $loop->iteration or $role->id }}</td>
                                    <td>
                                        @can('view-roles')
                                            <a href="{{ route('roles.show', $role) }}"
                                               title="{{ __('fields.more') }}">
                                                {{ $role->name }}
                                            </a>
                                        @else
                                            {{ $role->name }}
                                        @endcan

                                    </td>
                                    <td>
                                        @can('view-roles')
                                            <a href="{{ route('roles.show', $role) }}"
                                               title="{{ __('fields.more') }}">
                                                {{ $role->label }}
                                            </a>
                                        @else
                                            {{ $role->label }}
                                        @endcan
                                    </td>
                                    <td>
                                        @can('edit-roles')
                                            <a href="{{ route('roles.edit', $role) }}"
                                               title="{{ __('fields.edit') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o"
                                                       aria-hidden="true"> </i> {{ __('fields.edit') }}
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-roles')
                                            {!! Form::open(['route' => ['roles.destroy', $role], 'style' => 'display:inline', 'method' => 'DELETE']) !!}

                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ' . __('fields.delete'), ['class' => 'btn btn-danger btn-sm', 'title' => __('fields.delete'), 'onclick'=>'return confirm("Confirm delete?")', 'type' => 'submit', 'id' => 'delete']) !!}

                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {!! $roles->appends(['search' => Request::get('search')])->render() !!}
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

    {{--todo: Add vue component to delete button, with sweet alert--}}
    <script src="{{asset('plugins/components/sweetalert/sweetalert.min.js')}}"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
      $(document).ready(function () {

          @if(session()->has('message'))
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
          'language': {
            'url': '//cdn.datatables.net/plug-ins/1.10.19/i18n/Russian.json'
          }
        })

      })
    </script>

@endpush