@role('admin')
    <li class="two-column">
        <a class="waves-effect"
           href="{{url($menu->url)}}"
           aria-expanded="false">
            <span class="hide-menu">{{$menu->label}}</span>
        </a>
    </li>
@endrole
