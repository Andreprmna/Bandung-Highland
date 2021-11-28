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

            <li class="nav-item {{ request()->is('admins') ? 'menu-open' : ''}}">
                    <a href="{{ route('admins.index') }}" class="nav-link {{ request()->is('cms/admins*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Admin</p>
                    </a>
            </li>

            <li class="nav-item @if (request()->is('cms/atks*') || request()->is('cms/point_of_sells*'))
                    menu-is-opening menu-open
                @endif">
                <a href="#" class="nav-link @if (request()->is('cms/atks*') || request()->is('cms/point_of_sells*'))
                    active
                @endif">
                    <i class="nav-icon fas fa-mail-bulk"></i>
                    <p>
                    Alat Tulis Kantor
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                    <a href="{{ route('atks.index') }}" class="nav-link {{ request()->is('cms/atks*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-mail-bulk"></i>
                        <p>Manage Alat Tulis Kantor</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('point_of_sells.index') }}" class="nav-link {{ request()->is('cms/point_of_sells*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>Beli Alat Tulis Kantor</p>
                    </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if (request()->is('cms/audios*') || request()->is('cms/pinjam_audios*') || request()->is('cms/booking_audios*'))
                    menu-is-opening menu-open
                @endif">
                <a href="#" class="nav-link @if (request()->is('cms/audios*') || request()->is('cms/pinjam_audios*') || request()->is('cms/booking_audios*'))
                    active
                @endif">
                    <i class="nav-icon fas fa-audio-description"></i>
                    <p>
                    Audio
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                    <a href="{{ route('audios.index') }}" class="nav-link {{ request()->is('cms/audios*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-audio-description"></i>
                        <p>Manage Audio</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('pinjam_audios.index') }}" class="nav-link {{ request()->is('cms/pinjam_audios*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Pinjam Audio</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('booking_audios.index') }}" class="nav-link {{ request()->is('cms/booking_audios*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Booking Audio</p>
                    </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if (request()->is('cms/bukus*') || request()->is('cms/penerbits*') || request()->is('cms/pengarangs*') || request()->is('cms/pinjam_bukus*') || request()->is('cms/booking_bukus*'))
                    menu-is-opening menu-open
                @endif">
                <a href="#" class="nav-link @if (request()->is('cms/bukus*') || request()->is('cms/penerbits*') || request()->is('cms/pengarangs*') || request()->is('cms/pinjam_bukus*') || request()->is('cms/booking_bukus*'))
                    active
                @endif">
                    <i class="nav-icon fas fa-book-open"></i>
                    <p>
                    Buku
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                    <a href="{{ route('bukus.index') }}" class="nav-link {{ request()->is('cms/bukus*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book-open"></i>
                        <p>Manage Buku</p>
                    </a>
                    </li>
                    
                    <li class="nav-item">
                    <a href="{{ route('pengarangs.index') }}" class="nav-link {{ request()->is('cms/pengarangs*') ? 'active' : ''}}">
                        <i class="nav-icon fa fa-pencil"></i>
                        <p>Manage Pengarang</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('penerbits.index') }}" class="nav-link {{ request()->is('cms/penerbits*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>Manage Penerbit</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('pinjam_bukus.index') }}" class="nav-link {{ request()->is('cms/pinjam_bukus*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Pinjam Buku</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('booking_bukus.index') }}" class="nav-link {{ request()->is('cms/booking_bukus*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Booking Buku</p>
                    </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if (request()->is('cms/coworking_spaces*') || request()->is('cms/properties*') || request()->is('cms/coworking_space_properties*') || request()->is('cms/booking_coworking_spaces*'))
                    menu-is-opening menu-open
                @endif">
                <a href="#" class="nav-link @if (request()->is('cms/coworking_spaces*') || request()->is('cms/properties*') || request()->is('cms/coworking_space_properties*') || request()->is('cms/booking_coworking_spaces*'))
                    active
                @endif">
                    <i class="nav-icon fas fa-laptop-house"></i>
                    <p>
                    Coworking Space
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                    <a href="{{ route('coworking_spaces.index') }}" class="nav-link {{ request()->is('cms/coworking_spaces*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-laptop-house"></i>
                        <p>Manage Coworking Space</p>
                    </a>
                    </li>
                    
                    <li class="nav-item">
                    <a href="{{ route('properties.index') }}" class="nav-link {{ request()->is('cms/properties*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-house-damage"></i>
                        <p>Manage Property</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('coworking_space_properties.index') }}" class="nav-link {{ request()->is('cms/coworking_space_properties*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-box-open"></i>
                        <p>Manage Coworking Property</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('booking_coworking_spaces.index') }}" class="nav-link {{ request()->is('cms/booking_coworking_spaces*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Booking Coworking Space</p>
                    </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ request()->is('members') ? 'menu-open' : ''}}">
                <a href="{{ route('members.index') }}" class="nav-link {{ request()->is('cms/members*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>Member</p>
                </a>
            </li>

            <li class="nav-item @if (request()->is('cms/toys*') || request()->is('cms/pinjam_toys*') || request()->is('cms/booking_toys*'))
                    menu-is-opening menu-open
                @endif">
                <a href="#" class="nav-link @if (request()->is('cms/toys*') || request()->is('cms/pinjam_toys*') || request()->is('cms/booking_toys*'))
                    active
                @endif">
                    <i class="nav-icon fas fa-gamepad"></i>
                    <p>
                    Toy
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                    <a href="{{ route('toys.index') }}" class="nav-link {{ request()->is('cms/toys*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-gamepad"></i>
                        <p>Manage Toy</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('pinjam_toys.index') }}" class="nav-link {{ request()->is('cms/pinjam_toys*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Pinjam Toy</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('booking_toys.index') }}" class="nav-link {{ request()->is('cms/booking_toys*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Booking Toy</p>
                    </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item @if (request()->is('cms/videos*') || request()->is('cms/pinjam_videos*') || request()->is('cms/booking_videos*'))
                    menu-is-opening menu-open
                @endif">
                <a href="#" class="nav-link @if (request()->is('cms/videos*') || request()->is('cms/pinjam_videos*') || request()->is('cms/booking_videos*'))
                    active
                @endif">
                    <i class="nav-icon fas fa-video"></i>
                    <p>
                    Video
                    <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    </li>
                    <li class="nav-item">
                    <a href="{{ route('videos.index') }}" class="nav-link {{ request()->is('cms/videos*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-video"></i>
                        <p>Manage Video</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('pinjam_videos.index') }}" class="nav-link {{ request()->is('cms/pinjam_videos*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>Pinjam Video</p>
                    </a>
                    </li>

                    <li class="nav-item">
                    <a href="{{ route('booking_videos.index') }}" class="nav-link {{ request()->is('cms/booking_videos*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-calendar-alt"></i>
                        <p>Booking Video</p>
                    </a>
                    </li>

                </ul>
            </li>

            

            <li class="nav-header">ACCOUNT</li>
            <li class="nav-item">
            <a href="{{ route('admin.profile') }}" class="nav-link">
                <i class="nav-icon fas fa-id-card-alt"></i>
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