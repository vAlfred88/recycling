@extends('front.layouts.master')

@push('css')
    <link href="{{asset('plugins/components/datatables/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
@endpush

@section('content')
    <div class="flex items-center">
        <div class="md:w-full lg:w-1/2 md:mx-auto">
            <div class="shadow">
                <div class="font-medium text-lg text-grey-darkest text-center bg-white p-3 mt-5">
                    Компании
                </div>
                <div class="bg-white p-3 rounded-b">
                    <table class="table-fixed" id="myTable">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('fields.name') }}</th>
                            <th>{{ __('fields.label') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <a href="{{ route('front.companies.show', $company) }}">{{ $company->name }}</a>
                                </td>
                                <td>{{ $company->owner->name ?? '' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{asset('plugins/components/jquery/dist/jquery.min.js')}}"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $(function () {
                $('#myTable').DataTable();
            });
        });
    </script>
@endpush
