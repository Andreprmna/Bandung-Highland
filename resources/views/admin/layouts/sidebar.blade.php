<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item {{ request()->is('/') ? 'menu-open' : ''}}">
            <a href="/cms/admin-dashboard" class="nav-link {{ request()->is('cms/admin-dashboard') ? 'active' : ''}}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Dashboard</p>
            </a>
            </li>
            <li class="nav-header">MASTER DATA</li>
            <li class="nav-item {{ request()->is('users') ? 'menu-open' : ''}}">
            <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('cms/users*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-user"></i>
                <p>Users</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-book-open"></i>
                <p>
                Buku
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview px-4">

                <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book-open"></i>
                    <p>Buku</p>
                </a>
                </li>
                
                <li class="nav-item">
                <a href="{{ route('penerbits.index') }}" class="nav-link {{ request()->is('cms/penerbits*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-upload"></i>
                    <p>Penerbit</p>
                </a>
                </li>

                <li class="nav-item">
                <a href="{{ route('pengarangs.index') }}" class="nav-link {{ request()->is('cms/pengarangs*') ? 'active' : ''}}">
                    <i class="nav-icon fa fa-pencil"></i>
                    <p>Pengarang</p>
                </a>
                </li>
            </ul>
            </li>
            
            <li class="nav-item">
            <a href="{{ route('toys.index') }}" class="nav-link {{ request()->is('cms/toys*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-gamepad"></i>
                <p>Toy</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('videos.index') }}" class="nav-link {{ request()->is('cms/videos*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-video"></i>
                <p>Video</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('audios.index') }}" class="nav-link {{ request()->is('cms/audios*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-audio-description"></i>
                <p>Audio</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('coworking_spaces.index') }}" class="nav-link {{ request()->is('cms/coworking_spaces*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-laptop-house"></i>
                <p>Coworking Space</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('properties.index') }}" class="nav-link {{ request()->is('cms/properties*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-house-damage"></i>
                <p>Property</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('coworking_space_properties.index') }}" class="nav-link {{ request()->is('cms/coworking_space_properties*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-house-damage"></i>
                <p>Coworking Property</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('atks.index') }}" class="nav-link {{ request()->is('cms/atks*') ? 'active' : ''}}">
                <i class="nav-icon fas fa-mail-bulk"></i>
                <p>Alat Tulis Kantor</p>
            </a>
            </li>
            <li class="nav-header">ACCOUNT</li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-id-card"></i>
                <p>Profile</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="{{ route('signout.admin') }}" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
            </li>
        </ul>