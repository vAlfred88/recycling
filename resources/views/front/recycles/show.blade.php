@extends('front.layouts.master')

@push('css')

@endpush

@section('content')
    <div class="flex items-center">
        <div class="md:w-full xl:w-3/4 md:mx-auto pt-10 px-10">
            <div class="mt-5 align-baseline flex">
                <div class="flex-1 text-left text-orange-light inline">5 место в рейтинге</div>
                <div class="flex-1 text-right">Отзывы
                    <span class="text-green">+5</span>
                    <span class="text-red">-3</span>
                </div>
            </div>
            <div class="shadow-lg bg-white">
                <div class="flex mt-1 py-10">
                    <div class="w-1/3 pl-5">
                        <div class="overflow-hidden">
                            <img class="w-full px-10 pt-5" src="{{ asset('images/metal.png') }}"
                                 alt="{{ $company->name }}">
                            <div class="px-6 py-4">
                                <div class="text-base mb-2 text-center">{{ $company->name }}</div>
                                <p class="text-grey-darker text-center text-base">
                                    {{ $company->address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3 px-5">
                        <div class="text-base mb-2 text-center">О компании</div>
                        <p class="text-grey-darker text-base">{{ $company->description }}</p>
                    </div>
                    <div class="w-1/3 pr-5">
                        <div class="text-base mb-2 text-center">Реквизиты компании</div>
                        <p class="text-orange-light text-base pt-2">{{ $company->site }}</p>
                        <p class="text-grey-darker text-base pt-2">{{ $company->phone }}</p>
                        <p class="text-grey-darker text-base pt-2">{{ $company->email }}</p>
                        <div class="w-full pt-5">
                            <button class="rounded-full bg-blue-dark h-8 w-8 m-1 p-1">
                                <i class="fab fa-facebook-f text-white"></i>
                            </button>
                            <button class="rounded-full bg-blue-dark h-8 w-8 m-1 p-1">
                                <i class="fab fa-vk text-white"></i>
                            </button>
                            <button class="rounded-full bg-blue-light h-8 w-8 m-1 p-1">
                                <i class="fab fa-twitter text-white"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex items-center">
        <div class="md:w-full xl:w-3/4 md:mx-auto pt-10 px-10">
            <div class="mt-5">
                <div class="shadow-lg w-full bg-white">
                    <div class="flex-wrap flex m-1 px-10 pt-5 align-baseline">
                        @foreach($users as $user)
                            <div class="py-10 w-1/4 flex-col">
                                <div class="w-1/2 mx-auto">
                                    <img class="rounded-full h-24 w-full" src="{{ $user->image }}"
                                         alt="{{ $user->name }}">
                                </div>
                                <div class="px-3 pt-3">
                                    <p class="text-base text-center">{{ $user->name }}</p>
                                    <p class="text-orange-light text-center py-2">{{ $user->position }}</p>
                                    <p class="text-grey-dark text-center break-words">{{ $user->email }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush