<aside class="sidebar">
    <div class="scroll-sidebar">
        @if(session()->get('theme-layout') != 'fix-header')
            <div class="user-profile">
                <div class="dropdown user-pro-body ">
                    <div class="profile-image">
                        <img src="{{asset('plugins/images/users/hanna.jpg')}}" alt="user-img" class="img-circle">
                        <a href="javascript:void(0);" class="dropdown-toggle u-dropdown text-blue"
                           data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="badge badge-danger">
                                <i class="fa fa-angle-down"></i>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated flipInY">
                            <li><a href="javascript:void(0);"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-inbox"></i> Inbox</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="javascript:void(0);"><i class="fa fa-cog"></i> Account Settings</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href=""><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                    <p class="profile-text m-t-15 font-16"><a href="javascript:void(0);"> Hanna Gover</a></p>
                </div>
            </div>
        @endif
        <nav class="sidebar-nav">
            <ul id="side-menu">
                <li class="two-column">
                    <a class="waves-effect active"
                       href="javascript:void(0);"
                       aria-expanded="false">
                        <i class="icon-screen-desktop fa-fw"></i>
                        <span class="hide-menu">Моя компания</span>
                    </a>
                    {{--<ul aria-expanded="false" class="collapse">--}}
                    {{--<li><a href="{{asset('bootstrap-ui')}}">Bootstrap UI</a></li>--}}
                    {{--</ul>--}}
                </li>
                <li class="two-column">
                    <a class="waves-effect"
                       href="javascript:void(0);"
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