@extends('front.layouts.master')

@push('css')

@endpush

@section('content')
    <div class="flex items-center">
        <div class="md:w-full xl:w-3/4 md:mx-auto pt-10 px-10">
            <div class="shadow-lg">
                <div class="font-medium text-lg text-grey-darkest text-center bg-white p-3 mt-5">
                    Компании
                </div>
                <div class="bg-white p-3">
                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="border-b-2 text-left">
                            <th>#</th>
                            <th>{{ __('fields.name') }}</th>
                            <th>{{ __('fields.label') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                            <tr class="h-10 border-b-2 border-grey-lighter">
                                <td class="text-left">{{ $loop->iteration }}</td>
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

@endpush
