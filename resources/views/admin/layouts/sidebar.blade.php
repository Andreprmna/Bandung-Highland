<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item {{ request()->is('/') ? 'menu-open' : ''}}">
            <a href="/cms/admin-dashboard" class="nav-link {{ request()->is('cms/admin-dashboard') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
            </li>
            <li class="nav-item {{ request()->is('users') ? 'menu-open' : ''}}">
            <a href="/cms/users" class="nav-link {{ request()->is('cms/users') ? 'active' : ''}}">
                <i class="nav-icon fas fa-book"></i>
                <p>Users</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Penerbit</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Pengarang</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('signout.admin') }}" class="nav-link">
                <i class="nav-icon fas fa-book"></i>
                <p>Logout</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-circle"></i>
                <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level 2</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Level 3</p>
                    </a>
                    </li>
                </ul>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Level 2</p>
                </a>
                </li>
            </ul>
            </li>
        </ul>