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
                    <h3 class="box-title pull-left">Список компаний</h3>
                    @can('add-'.str_slug('Companies'))
                        <a class="btn btn-success pull-right" href="{{ route('companies.create') }}">
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
                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>
                                        @can('view-'.str_slug('Permissions'))
                                            <a href="{{ route('companies.show', $company) }}"
                                               title="{{ __('fields.more') }}">
                                                {{ $company->name }}
                                            </a>
                                        @else
                                            {{ $company->name }}
                                        @endcan
                                    </td>
                                    <td>
                                        @can('view-'.str_slug('Companies'))
                                            @if($company->owner)
                                                <a href="{{ route('users.show', $company->owner) }}"
                                                   title="{{ __('fields.more') }}">
                                                    {{ optional($company->owner)->name }}
                                                </a>
                                            @endif
                                        @else
                                            {{ optional($company->owner)->name }}
                                        @endcan
                                    </td>
                                    <td>
                                        @can('edit-'.str_slug('Companies'))
                                            <a href="{{ route('companies.edit', $company) }}"
                                               title="{{ __('fields.update') }}">
                                                <button class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil-square-o"
                                                       aria-hidden="true"></i> {{ __('fields.update') }}
                                                </button>
                                            </a>
                                        @endcan

                                        @can('delete-'.str_slug('Companies'))
                                            {!! Form::open(['route' => ['companies.destroy', $company], 'style' => 'display:inline', 'method' => 'DELETE']) !!}

                                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> ' . __('fields.delete'), ['class' => 'btn btn-danger btn-sm', 'title' => __('fields.delete'), 'onclick'=>'return confirm("Confirm delete?")', 'type' => 'submit', 'id' => 'delete']) !!}

                                            {!! Form::close() !!}
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination-wrapper">
                            {!! $companies->appends(['search' => Request::get('search')])->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush