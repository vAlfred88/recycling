@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left">{{ __('roles.role') }} {{ $role->name }}</h3>
                    @can('view-'.str_slug('Roles'))
                        <a class="btn btn-success pull-right" href="{{ route('roles.index') }}">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    @endcan
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $role->id }}</td>
                            </tr>
                            <tr>
                                <th>{{ __('roles.name') }}</th>
                                <td> {{ $role->name }} </td>
                            </tr>
                            <tr>
                                <th>{{ __('roles.label') }}</th>
                                <td> {{ $role->label }} </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

