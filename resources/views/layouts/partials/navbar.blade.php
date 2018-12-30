<style>
    .navbar-header .right-sidebar .rpanel-title {
        background: linear-gradient(to right, #ffc05c 1%, #ff9b00 100%)
    }

    .top-left-part {
        width: 265px;
        float: left;
        background: rgb(255, 255, 255);
    }

    .logo {
        padding: 0 10px;
    }

    .logo img {
        width: 100%;
        max-width: 300px;
        height: 60px;
        padding: 10px 0;
    }
</style>
<nav class="navbar navbar-yellow navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle font-20 hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
           data-target=".navbar-collapse">
            <i class="fa fa-bars"></i>
        </a>
        <div class="top-left-part logo">
            <a class="logo" href="{{'/'}}">
                <img src="{{asset('images/logo.svg')}}" alt="" class="img-fluid">
            </a>
        </div>
        {{--<ul class="nav navbar-top-links navbar-left hidden-xs">--}}
        {{--@if(session()->get('theme-layout') != 'fix-header')--}}
        {{--<li class="sidebar-toggle ">--}}
        {{--<a href="javascript:void(0)"--}}
        {{--class="sidebartoggler font-20 waves-effect waves-light"><i class="icon-arrow-left-circle"></i></a>--}}
        {{--</li>--}}
        {{--@endif--}}

        {{--<li>--}}
        {{--<form role="search" class="app-search hidden-xs">--}}
        {{--<i class="icon-magnifier"></i>--}}
        {{--<input type="text" placeholder="Search..." class="form-control">--}}
        {{--</form>--}}
        {{--</li>--}}
        {{--</ul>--}}
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a href="javascript:void(0)">
                    <span class="p-r-5">{{ auth()->user()->name }}</span>
                    <img src="{{ asset('plugins/images/users/jeffery.jpg') }}" alt="user-img" class="img-circle"
                         height="50px">
                </a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light font-20"
                   href="{{ route('profile.view') }}">
                    <i class="icon-settings"></i>
                </a>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle waves-effect waves-light font-20"
                   href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="icon-logout"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
