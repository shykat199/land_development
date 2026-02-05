<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('admin.dashboard')}}"> <img alt="image" src="{{asset('assets/img/logo.png')}}" class="header-logo" /> <span
                    class="logo-name">Dashboard</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="dropdown active">
                <a href="{{route('admin.dashboard')}}" class="nav-link">
                    <i data-feather="monitor"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i data-feather="users"></i>
                    <span>Users</span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('admin.user-list')}}">User List</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.create-user')}}">Create User</a>
                    </li>
                </ul>
            </li>
        </ul>
    </aside>
</div>
