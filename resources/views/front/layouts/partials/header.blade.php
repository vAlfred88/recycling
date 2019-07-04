<header id="header" class="rL">
    <div class="inner">
        <a href="{{route('front.home')}}" class="db logo abs"></a>
        @if(auth()->check())
            <div class="reg-user-block fright">
                <a href="{{ route('home') }}">
                    <span class="reg-user-block__avatar"
                          style="background-image: url({{ auth()->user()->image }})"></span>
                </a>
            </div>
        @else
            <div class="fright buttons_block">
                <a href="{{ route('login') }}" class="white_button">Войти</a>
                <a href="{{ route('register') }}" class="orange_button button">Регистрация</a>
            </div>
        @endif
        <nav class="main_menu fright rL">
            <div class="db cp menu btn11 mobile-menu-trigger" id="burger" onclick="toggleMenu()">
                <div class="icon-left"></div>
                <div class="icon-right"></div>
            </div>
            <div class="main_menu__container" id="main_menu">
                <ul>
                    <li class="{{ request()->is('/') ? 'active' : ''}}">
                        <a href="{{ route('front.home') }}">Главная</a>
                    </li>
                    <li class="{{ request()->is('rating') ? 'active' : ''}}">
                        <a href="{{ route('front.rating') }}">Ломозаготовители</a>
                    </li>
                    <li class="{{ request()->is('about') ? 'active' : ''}}">
                        <a href="{{ route('front.about') }}">О проекте</a>
                    </li>
                    <li class="{{ request()->is('contacts') ? 'active' : ''}}">
                        <a href="{{ route('front.contacts') }}">Контакты</a>
                    </li>
                </ul>
                <city-select></city-select>
            </div>
        </nav>
        <div class="clear"></div>
    </div>
</header>
