@extends('front.layouts.master')

@push('css')

@endpush

@section('content')
    <div class="flex items-center">
        <div class="md:w-full xl:w-3/4 md:mx-auto px-10">
            <div class="mt-5 align-baseline flex">
                <div class="flex-1 text-left text-orange-light inline">5 место в рейтинге</div>
                <div class="flex-1 text-right">Отзывы
                    <span class="text-green">+5</span>
                    <span class="text-red">-3</span>
                </div>
            </div>
            <div class="shadow-lg">
                <div class="flex mt-1 py-10">
                    <div class="w-1/3">
                        <div class="overflow-hidden">
                            <img class="w-full px-10 pt-5" src="{{ asset('images/metal.png') }}"
                                 alt="{{ $company->name }}">
                            <div class="px-6 py-4">
                                <div class="text-base mb-2 text-center">{{ $company->name }}</div>
                                <p class="text-grey-darker text-base">
                                    {{ $company->address }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-1/3 pt-5">
                        <div class="text-base mb-2 text-center">О компании</div>
                        <p class="text-grey-darker text-base">{{ $company->description }}</p>
                    </div>
                    <div class="w-1/3 pt-5">
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
        <div class="md:w-full xl:w-3/4 md:mx-auto px-10">
            <div class="mt-5 align-baseline flex">
                <div class="shadow-lg w-full">
                    <div class="w-1/3">
                        @foreach($users as $user)
                            <div class="py-10">
                                <div class="w-1/2 mx-auto">
                                    <img class="rounded-full" src="{{ $user->image }}" alt="{{ $user->name }}">
                                </div>
                                <div class="text-base text-center">{{ $user->name }}</div>
                                <p class="text-orange-light text-center">{{ $user->position }}</p>
                                <p class="text-grey-dark text-center">{{ $user->email }}</p>
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