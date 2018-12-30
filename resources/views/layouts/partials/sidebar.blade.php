<aside class="sidebar">
    <div class="scroll-sidebar">
        @if(session()->get('theme-layout') != 'fix-header')
            <div class="user-profile">
                <div class="dropdown user-pro-body ">
                    <div class="profile-image">
                        <img src="{{asset('plugins/images/users/jeffery.jpg')}}" alt="user-img" class="img-circle">
                        <p class="profile-text m-t-15 font-16">
                            <a href="javascript:void(0);">{{ $user->name }}</a>
                        </p>
                        <nav class="sidebar-nav">
                            <ul id="side-menu">
                                <li class="two-column">
                                    <a href="{{route('profile.view')}}">
                                        <i class="fa fa-user"></i>
                                        <span class="hide-menu">Профиль</span>
                                    </a>
                                </li>
                                <li class="two-column">
                                    <a class="dropdown-item"
                                       href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>
                                        <span class="hide-menu">Выйти</span>
                                        <form id="logout-form"
                                              action="{{ route('logout') }}"
                                              method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        @endif
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