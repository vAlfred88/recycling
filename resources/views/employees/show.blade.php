@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">User {{ $user->id }}</h3>
                    {{--@can('view-'.str_slug('Users'))--}}
                        <a class="btn btn-success pull-right" href="{{ route('employees.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    {{--@endcan--}}
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th> Name</th>
                                <td> {{ $user->name }} </td>
                            </tr>
                            <tr>
                                <th> Email</th>
                                <td> {{ $user->email }} </td>
                            </tr>
                            <tr>
                                <th> Roles</th>
                                <td>
                                    @foreach($user->roles as $role)
                                        <span class="label label-success">{{ $role->label }}</span>
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

