<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html"> <img alt="image" src="{{asset('assets/img/logo.png')}}" class="header-logo" /> <span
                    class="logo-name">Otika</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown active">
                <a href="index.html" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="alert-triangle"></i><span>Users</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('admin.user-list')}}">user List</a></li>

                </ul>
            </li>
        </ul>
    </aside>
</div>
