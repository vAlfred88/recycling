<nav class="flex items-center justify-between flex-wrap bg-white p-6 h-12 shadow-lg">
    <div class="flex items-center flex-no-shrink mr-6">
        <div class="pin-l w-32">
            <a class="logo" href="{{'/'}}">
                <img src="{{ asset('images/logo.svg') }}" alt="" class="img-fluid">
            </a>
        </div>
    </div>
    <div class="block lg:hidden">

    </div>
    <div class="flex-1 lg:w-3/4 items-center">
        <ul class="list-reset flex justify-center items-center">
            <li class="mr-6">
                <a class="relative py-3 px-4 leading-normal text-grey-darkest no-underline flex items-center hover:text-grey-dark"
                   href="/">Главная</a>
            </li>
            <li class="mr-6">
                <a class="relative py-3 px-4 leading-normal text-grey-darkest no-underline flex items-center hover:text-grey-dark active"
                   href="{{ route('front.rating') }}">Рейтинг</a>
            </li>
            <li class="mr-6">
                <a class="relative py-3 px-4 leading-normal text-grey-darkest no-underline flex items-center hover:text-grey-dark"
                   href="{{ route('login') }}">Личный кабинет</a>
            </li>
        </ul>
    </div>
</nav>