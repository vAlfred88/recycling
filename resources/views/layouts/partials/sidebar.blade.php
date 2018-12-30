<aside class="sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="side-menu">
                <li class="two-column">
                    <a class="waves-effect"
                       href="{{route('company.home')}}">
                        <i class="icon-screen-desktop fa-fw"></i>
                        <span class="hide-menu">Мой кабинет</span>
                    </a>
                    {{--<ul aria-expanded="false" class="collapse">--}}
                    {{--<li><a href="{{asset('bootstrap-ui')}}">Bootstrap UI</a></li>--}}
                    {{--</ul>--}}
                </li>

                @foreach($menus as $menu)
                    @include('components.sidebar.item', ['menu' => $menu])
                @endforeach

                <li class="two-column">
                    <a class="waves-effect"
                       href="{{route('companies.index')}}"
                       aria-expanded="false">
                        <i class="icon-settings fa-fw"></i>
                        <span class="hide-menu">Карточка компании</span>
                    </a>
                </li>
                <li class="two-column">
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        <i class="icon-docs fa-fw"></i>
                        <span class="hide-menu">Цены</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        <i class="icon-notebook fa-fw"></i>
                        <span class="hide-menu">Пункты приема</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        <i class="icon-grid fa-fw"></i>
                        <span class="hide-menu">Сотрудники</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        <i class="icon-layers fa-fw"></i>
                        <span class="hide-menu">Объявления</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        <i class="icon-layers fa-fw"></i>
                        <span class="hide-menu">Тендеры</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        <i class="icon-layers fa-fw"></i>
                        <span class="hide-menu">Аукционы</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        <i class="icon-notebook fa-fw"></i>
                        <span class="hide-menu">Новости</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        <i class="icon-notebook fa-fw"></i>
                        <span class="hide-menu">Статьи</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>