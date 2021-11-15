<div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
    <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->

<div class="site-navbar-wrap">
    <div class="site-navbar-top d-none d-lg-block">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex mr-auto">
                    <a href="#" class="d-flex align-items-center mr-4 top-nav">
                        <span class="icon-envelope mr-2"></span>
                        <span class="d-none d-md-inline-block">info@domain.com</span>
                    </a>
                    <a href="#" class="d-flex align-items-center mr-auto top-nav">
                        <span class="icon-phone mr-2"></span>
                        <span class="d-none d-md-inline-block">+1 234 4567 8910</span>
                    </a>
                </div>
                <div class="d-flex justify-content-end align-items-center">
                    <a href="#" class="p-2 pl-0 top-nav"><span class="icon-twitter"></span></a>
                    <a href="#" class="p-2 pl-0 top-nav"><span class="icon-facebook"></span></a>
                    <a href="#" class="p-2 pl-0 top-nav"><span class="icon-linkedin"></span></a>
                    {{-- <a href="#" class="p-2 pl-0"><span class="icon-instagram"></span></a> --}}
                    @guest
                    <a href="/login" class="top-nav ml-4">LOGIN</a>
                    <a href="/registration" class="nav-link top-nav">REGISTER</a>
                    @else
                        <li class="list-inline-item">
                            <div class="dropdown">
                                <a class="dropdown-toggle nav-link" href="#" role="button" id="xp-userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{url('storage/'.auth()->user()->profile_photo_path)}}" height="40" width="40" alt="user-profile" class="rounded-circle">
                                    {{-- <span class="xp-user-live"></span> --}}
                                    {{-- <img src="assets/images/ui-media/media-image-8.jpg" alt="user-profile" width="40" height="40" class="rounded-circle img-fluid"> --}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-userprofile">
                                    <a class="dropdown-item py-3 text-center font-16" href="#">Welcome, {{ auth()->user()->name }}</a>
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="{{ route('signout') }}">Logout</a>
                                </div>
                            </div>                                   
                        </li>
                    @endguest
                </div>
            </div>
        </div>
    </div>

    <div class="site-navbar site-navbar-target js-sticky-header">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="row align-items-center">
                    <div class="container-fluid">
                        <h1 class="my-0 site-logo"><a href="/">Community Center</a></h1>
                    </div>
                </div>
                <div class="">
                    <nav class="site-navigation text-right" role="navigation">
                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>
                            <ul class="site-menu main-menu js-clone-nav d-none d-lg-block">
                                <div class="res-menu">
                                    @guest
                                    <div class="row mx-0">
                                        <li><a href="{{ route('login') }}" class="nav-link">LOGIN</a></li>
                                        <li><a href="{{ route('register-user') }}" class="nav-link">REGISTER</a></li>
                                    </div>
                                    @else
                                    <li class="has-children">
                                        <a href="#" class="nav-link">
                                            <img src="assets/images/ui-media/media-image-8.jpg" alt="user-profile" width="40" height="40" class="rounded-circle img-fluid">
                                            <span class="ml-2">{{ auth()->user()->name }}</span>
                                        </a>
                                        <ul class="dropdown arrow-top">
                                        <li><a href="#" class="nav-link">Profile</a></li>
                                        <li><a href="{{ route('signout') }}" class="nav-link">Logout</a></li>
                                        </ul>
                                    </li>
                                    @endguest
                                </div>
                                <li class="{{ request()->is('/') ? 'active' : ''}}"><a href="/" class="nav-link">Beranda</a></li>
                                <li class="has-children {{ request()->is('layanan*') ? 'active' : ''}}">
                                    <a href="#" class="nav-link">Layanan</a>
                                    <ul class="dropdown arrow-top">
                                    <li class="has-children {{ request()->is('layanan/booking*') ? 'active' : ''}}">
                                        <a href="#">Booking</a>
                                        <ul class="dropdown">
                                        <li class="{{ request()->is('layanan/booking/audio') ? 'active' : ''}}"><a href="{{ route('audio.index') }}">Audio</a></li>
                                        <li class="{{ request()->is('layanan/booking/buku') ? 'active' : ''}}"><a href="{{ route('buku.index') }}">Buku</a></li>
                                        <li class="{{ request()->is('layanan/booking/coworking-space') ? 'active' : ''}}"><a href="{{ route('coworking-space.index') }}">Coworking Space</a></li>
                                        <li class="{{ request()->is('layanan/booking/toy') ? 'active' : ''}}"><a href="{{ route('toy.index') }}">Mainan</a></li>
                                        <li class="{{ request()->is('layanan/booking/video') ? 'active' : ''}}"><a href="{{ route('video.index') }}">Video</a></li>
                                        </ul>
                                    </li>
                                    </ul>
                                </li>
                                <li class="has-children {{ request()->is('about*') ? 'active' : ''}}">
                                    <a href="#" class="nav-link">Tentang Kami</a>
                                    <ul class="dropdown arrow-top">
                                    <li class="{{ request()->is('about/visi-misi') ? 'active' : ''}}"><a href="{{ route('visi-misi') }}" class="nav-link">Visi & Misi</a></li>
                                    <li class="{{ request()->is('about/contact-us') ? 'active' : ''}}"><a href="{{ route('contact-us') }}" class="nav-link">Hubungi Kami</a></li>
                                    
                                    </ul>
                                </li>
                                <li class="d-inline-block d-lg-none">
                                    <div class="d-flex justify-content-center mt-3 mb-5">
                                        <a href="#" class="p-2 pl-0"><span class="icon-envelope"></span></a>
                                        <a href="#" class="p-2 pl-0"><span class="icon-phone"></span></a>
                                        <a href="#" class="p-2 pl-0"><span class="icon-twitter"></span></a>
                                        <a href="#" class="p-2 pl-0"><span class="icon-facebook"></span></a>
                                        <a href="#" class="p-2 pl-0"><span class="icon-linkedin"></span></a>
                                        {{-- <a href="#" class="p-2 pl-0"><span class="icon-instagram"></span></a> --}}
                                    </div>
                                    </li>
                            </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>