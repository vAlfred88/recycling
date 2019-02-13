<aside class="sidebar">
    <div class="scroll-sidebar">
        @role('owner')
        <div class="user-profile">
            <div class="dropdown user-pro-body ">
                <div class="profile-image">
                    <img src="{{ asset('images/metal.png') }}" alt="user-img" class="img-circle">
                    <p class="profile-text m-t-15 font-16">
                        <a href="{{ route('company') }}">{{ auth()->user()->company->name }}</a>
                    </p>
                </div>
            </div>
        </div>
        @endrole
        <nav class="sidebar-nav">
            <ul id="side-menu">
                <li class="two-column">
                    <a class="waves-effect"
                       href="{{route('home')}}">
                        {{--<i class="icon-screen-desktop fa-fw"></i>--}}
                        <span class="hide-menu">Мой кабинет</span>
                    </a>
                </li>

                @foreach($menus as $menu)
                    @include('components.sidebar.item', ['menu' => $menu])
                @endforeach

                @role('owner')
                <li class="two-column">
                    <a class="waves-effect"
                       href="{{route('company')}}"
                       aria-expanded="false">
                        {{--<i class="icon-settings fa-fw"></i>--}}
                        <span class="hide-menu">Карточка компании</span>
                    </a>
                </li>
                <li class="two-column">
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        {{--<i class="icon-docs fa-fw"></i>--}}
                        <span class="hide-menu">Цены</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="{{ route('company.receptions.index') }}"
                       aria-expanded="false">
                        <span class="hide-menu">Пункты приема</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="{{ route('employees.index') }}"
                       aria-expanded="false">
                        {{--<i class="icon-grid fa-fw"></i>--}}
                        <span class="hide-menu">Сотрудники</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        {{--<i class="icon-layers fa-fw"></i>--}}
                        <span class="hide-menu">Объявления</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        {{--<i class="icon-layers fa-fw"></i>--}}
                        <span class="hide-menu">Тендеры</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        {{--<i class="icon-layers fa-fw"></i>--}}
                        <span class="hide-menu">Аукционы</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        {{--<i class="icon-notebook fa-fw"></i>--}}
                        <span class="hide-menu">Новости</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        {{--<i class="icon-notebook fa-fw"></i>--}}
                        <span class="hide-menu">Статьи</span>
                    </a>
                </li>
                @elserole('user')
                <li>
                    <a class="waves-effect"
                       href="{{ route('profile.view') }}"
                       aria-expanded="false">
                        {{--<i class="icon-notebook fa-fw"></i>--}}
                        <span class="hide-menu">Мои данные</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        {{--<i class="icon-notebook fa-fw"></i>--}}
                        <span class="hide-menu">Мои отзывы</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        {{--<i class="icon-notebook fa-fw"></i>--}}
                        <span class="hide-menu">Сдать лом</span>
                    </a>
                </li>
                @endrole
            </ul>
        </nav>
    </div>
</aside>