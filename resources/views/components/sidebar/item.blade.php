@canany([$menu->getPermissionName('view')])
    <li class="two-column">
        <a class="waves-effect"
           href="{{url($menu->url)}}"
           aria-expanded="false">
            <i class="icon-settings fa-fw"></i>
            <span class="hide-menu">{{$menu->label}}</span>
        </a>
    </li>
@endcanany
