<header id="header" class="rL">
    <div class="inner">
        <div class="reg-user-block fright">
            <span class="reg-user-block__avatar" style="background-image: url(images/ava-review-3.png)"></span>
        </div>
        <nav class="main_menu fright rL">
            <div class="db cp menu btn11 mobile-menu-trigger">
                <div class="icon-left"></div>
                <div class="icon-right"></div>
            </div>
            <div class="main_menu__container">
                <ul>
                    <li class="{{ request()->is('/') ? 'active' : ''}}"><a href="">Главная</a></li>
                    <li class="{{ request()->is('/rating') ? 'active' : ''}}"><a href="">Ломозаготовители</a></li>
                    <li><a href="">О проекте</a></li>
                    <li><a href="">Контакты</a></li>
                </ul>
                <div class="city">
                    <select class="region">
                        <option value="Moscow">Санкт-Петербург</option>
                        <option value="Saint-Petersburg">Москва</option>
                        <option value="Yekaterinburg">Екатеринбург</option>
                        <option value="Krasnoyarsk">Красноярск</option>
                    </select>
                </div>
            </div>
        </nav>
        <div class="clear"></div>
    </div>
</header>
