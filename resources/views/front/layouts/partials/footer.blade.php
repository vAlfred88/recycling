<div id="footer">
    <div class="inner">
        <div class="fleft rL hid left_block box" style="padding-top: 0">
            <a href= {{route('front.home')}}>@svg('logo')</a>
            <p style="margin-bottom: 10px">ИНН 6745643567</p>
            <p style="margin-bottom: 10px">ОГРН 5675759949</p>
            <a href="{{ route('login') }}" class="white_button">Войти</a>
            <a href="{{ route('register') }}" class="orange_button button">Регистрация</a>
        </div>
        <nav class="fleft rL hid foot_menu box">
            <ul>
                <li><a href="{{ url('rating') }}">Ломозаготовители</a></li>
                <li><a href="{{ url('about') }}">О проекте</a></li>
            </ul>
        </nav>
        <nav class="fleft rL hid foot_menu box">
            <ul>
                <li><a href="{{ url('about') }}">Правила рейтинга</a></li>
                <li><a href="{{ url('contacts') }}">Контакты</a></li>
            </ul>
        </nav>
        <div class="rL hid copy_block">
            <a href="{{ url('about') }}">Техническая поддержка</a>
            <p>Copyright © 2018-2019 </p>
            <a class="logo_app db" href=""></a>
        </div>
    </div>
</div>
