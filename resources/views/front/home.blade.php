@extends('front.layouts.master')

@push('css')

@endpush

@section('content')
    <div class="flex items-center">
        <div class="md:w-full xl:w-3/4 md:mx-auto pt-32 px-10">
            <div class="shadow-lg bg-white rounded">
                <div class="w-full p-10">
                    <div class="w-1/2 mx-auto">
                        <img src="{{asset('images/logo.png')}}" alt="">
                    </div>

                    <ul class="list-reset flex justify-center items-center pt-16">
                        <li class="mr-6">
                            <a href="{{ route('login') }}"
                               class="bg-orange-light hover:bg-orange text-white font-bold py-2 px-4 rounded no-underline">
                                Войти
                            </a>
                        </li>
                        <li class="mr-6">
                            <a href="{{ route('register') }}"
                               class="bg-orange-light hover:bg-orange text-white font-bold py-2 px-4 rounded no-underline">
                                Регистрация
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush