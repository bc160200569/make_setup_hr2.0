<nav class="pcoded-navbar menupos-fixed menu-light ">
    <div class="navbar-wrapper  ">
        <div class="navbar-content scroll-div " >

            <ul class="nav pcoded-inner-navbar ">
                <!--<li class="nav-item pcoded-menu-caption"><label>Navigation</label></li>-->
                {{--<li class="nav-item pcoded-hasmenu active pcoded-trigger">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span
                            class="pcoded-mtext">Dashboard</span></a>
                    <ul class="pcoded-submenu">
                        <li class="active"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li><a href="#">Stats</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span
                            class="pcoded-mtext">User</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="#">Profile</a></li>
                        <li><a href="{{route('users.index')}}">User List</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                        <span class="pcoded-mtext">Settings</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('roles.index')}}">Roles</a></li>
                        <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('logout')}}" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-power"></i></span>
                        <span class="pcoded-mtext">Logout</span>
                    </a>
                </li>--}}
{{-- 
                   @php
                    
                    $navbar = navbar();
                    $i=1;
                @endphp
                @foreach($navbar as $nav)
                    @if($nav->sub_nav === 0)
                        @if($nav->is_show === 1)
                            <li class="nav-item pcoded-hasmenu">
                                <a href="{{route('roles.index')}}" class="nav-link ">
                                    <span class="pcoded-micon"><i class="{{ $nav->icon }}"></i></span>
                                    <span class="pcoded-mtext">{{ $nav->name }}</span>
                                </a>
                            </li>
                        @endif
                    @else
                        @if($nav->is_show === 1)
                            <li>
                                <a href="#submenu{{ $i }}" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                    <i class="fs-4 bi-grid"></i> <span class="ms-0 d-none d-sm-inline" style="color:white ;"><i class="{{ $nav->icon }}" style="margin-right: 10px; color:white"></i>{{ $nav->name}}<i class="fa fa-caret-down" aria-hidden="true" style="margin-left: 10px;"></i></span>
                                </a>
                                <ul class="collapse nav flex-column ms-0" id="submenu{{$i}}" data-bs-parent="#menu" style="background-color: #363434; width: 185px; padding-left: 23px;">
                                    @php
                                    $subnav = subnav($nav->id);
                                    dd($subnav);
                                    @endphp
                                    @foreach($role_has_sub_navigation as $sub_nav)
                                        @foreach($subnav as $sub)
                                            @if($sub->id === $sub_nav->sub_navigation_id)
                                                @if($sub->is_show === 1)
                                                <li class="w-100">
                                                    <a href="{{ url(''.$sub->route) }}" class="nav-link px-0"> <span class="d-none d-sm-inline" style="color:white ;">{{ $sub->name }}</span></a>
                                                </li>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endif
                @endforeach 
                --}}
                {{--<li class="nav-item pcoded-hasmenu">
                    <a href="#" class="nav-link ">
                        <span class="pcoded-micon"><i class="feather icon-settings"></i></span>
                        <span class="pcoded-mtext">Settings</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li><a href="{{route('roles.index')}}">Roles</a></li>
                        <li><a href="{{route('permissions.index')}}">Permissions</a></li>
                    </ul>
                </li>--}}
                @php
                    $navbar = navbar();
                @endphp
                @foreach($navbar as $nav)
                    @if($nav->sub_nav === 0)
                        @if($nav->is_show === 1)
                            <li class="nav-item">
                                <a href="{{ url(''.$nav->route) }}" class="nav-link ">
                                    <span class="pcoded-micon"><i class="{{ $nav->icon }}"></i></span>
                                    <span class="pcoded-mtext">{{ $nav->name }}</span>
                                </a>
                            </li>
                        @endif
                    @else
                        @if($nav->is_show === 1)
                            <li class="nav-item pcoded-hasmenu">
                                <a href="#" class="nav-link ">
                                    <span class="pcoded-micon"><i class="{{ $nav->icon }}"></i></span>
                                    <span class="pcoded-mtext">{{ $nav->name }}</span>
                                </a>
                                @php
                                    $subnav = subnav($nav->id);
                                @endphp
                                @foreach($subnav as $sub)
                                    @if($sub->is_show === 1)
                                    <ul class="pcoded-submenu">
                                        <li><a href="{{ url(''.$sub->route) }}">{{ $sub->name }}</a></li>
                                    </ul>
                                    @endif
                                @endforeach
                            </li>
                        @endif
                    @endif
                @endforeach

            </ul>

            {{--<div class="card text-center">
                <div class="card-block">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true"></button>
                    <i class="feather icon-sunset f-40"></i>
                    <h6 class="mt-3">Help?</h6>
                    <p>Please contact us on our email for need any support</p>
                    <a href="#" target="_blank" class="btn btn-primary btn-sm text-white m-0">Support</a>
                </div>
            </div>--}}

        </div>
    </div>
</nav>