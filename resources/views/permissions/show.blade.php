@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">Permission {{ $permission->id }}</h3>
                    @can('view-'.str_slug('Permissions'))
                        <a class="btn btn-success pull-right" href="{{ route('permissions.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $permission->id }}</td>
                            </tr>
                            <tr>
                                <th> Name</th>
                                <td> {{ $permission->name }} </td>
                            </tr>
                            <tr>
                                <th> Label</th>
                                <td> {{ $permission->label }} </td>
                            </tr>
                            <tr>
                                <th> Roles</th>
                                <td>
                                    @foreach($permission->roles as $role)
                                        <span class="label label-warning">{{ $role->label }}</span>
                                    @endforeach
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

