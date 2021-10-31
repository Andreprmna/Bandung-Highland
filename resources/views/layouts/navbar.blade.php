<div class="xp-rightbar">
    <!-- XP Search Modal -->
    <div class="modal fade xpSearchModal" id="xpSearchModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="xp-searchbar">
                        <form>
                            <div class="input-group">
                                <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn" type="submit" id="button-addon2">GO</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start XP Headerbar -->
    <div class="xp-headerbar">
        <!-- Start XP Topbar -->
        <div class="xp-topbar">
            <!-- Start XP Row -->
            <div class="row">
                <!-- Start XP Col -->
                <div class="col-2 col-md-2 col-lg-2 align-self-center">
                    <!-- Start XP Logobar -->
                    <div class="xp-logobar">
                        <a href="{{url('/')}}" class="xp-small-logo"><img src="assets/images/mobile-logo.svg" class="img-fluid" alt="logo"></a>
                        <a href="{{url('/')}}" class="xp-main-logo"><img src="assets/images/logo.svg" class="img-fluid" alt="logo"></a>
                    </div>                        
                    <!-- End XP Logobar -->
                </div> 
                <!-- End XP Col -->
                <!-- Start XP Col -->
                <div class="col-10 col-md-10 col-lg-10">
                    <div class="xp-profilebar text-right">
                        <ul class="list-inline mb-0 mt-2">
                            <li class="list-inline-item">                                        
                                <div class="xp-search">
                                    <a href="#" class="text-white" data-toggle="modal" data-target="#xpSearchModal"><i class="icon-magnifier"></i></a>
                                </div>
                            </li>
                            
                            @guest
                            <li class="list-inline-item">
                                <a href="{{ route('login') }}"><span class="text-white">Login</span></a>          
                            </li>
                            <li class="list-inline-item mr-0">
                                <a href="{{ route('register-user') }}" class="text-white">Register</a>        
                            </li>
                            @else
                            <li class="list-inline-item mr-0">
                                <div class="dropdown xp-userprofile">
                                    <a class="dropdown-toggle " href="#" role="button" id="xp-userprofile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{-- <img src="{{url('storage/'.auth()->user()->profile_photo_path)}}" alt="user-profile" class="rounded-circle">
                                        <span class="xp-user-live"></span> --}}
                                        <img src="assets/images/ui-media/media-image-8.jpg" alt="user-profile" class="rounded-circle img-fluid"><span class="xp-social-profile-live"></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="xp-userprofile">
                                        <a class="dropdown-item py-3 text-white text-center font-16" href="#">Welcome, {{ auth()->user()->name }}</a>
                                        <a class="dropdown-item" href="#"><i class="icon-user text-primary mr-2"></i> Profile</a>
                                        <a class="dropdown-item" href="{{ route('signout') }}"><i class="icon-power text-danger mr-2"></i> Logout</a>
                                    </div>
                                </div>                                   
                            </li>
                            @endguest
                            <li class="list-inline-item xp-horizontal-menu-toggle">
                                <button type="button" class="navbar-toggle bg-transparent" data-toggle="collapse" data-target="#navbar-menu">
                                    <i class="icon-menu font-20 text-white"></i>
                                </button>                                   
                            </li>
                        </ul>
                    </div>
                </div> 
                <!-- End XP Col -->
            </div> 
            <!-- End XP Row -->
        </div>
        <!-- End XP Topbar -->
        <!-- Start XP Menubar -->                    
        <div class="xp-menubar text-left">
            <!-- Start XP Nav -->
            <nav class="xp-horizontal-nav xp-mobile-navbar xp-fixed-navbar">
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="xp-horizontal-menu">
                        <li class="scroll"><a href="{{url('/')}}"></i><span>Beranda</span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Layanan</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Khusus</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/email-inbox')}}">Profil Pengajar</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url('/components-ratings')}}">Ruang Belajar</a></li>
                                <li><a href="{{url('/components-range-slider')}}">Perpustakaan</a></li>
                                <li><a href="{{url('/components-switchery')}}">Pelatihan Guru</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span>Tentang Kami</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Pendidikan Klasik</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{url('/email-inbox')}}">Apa itu Pendidikan Klasik?</a></li>
                                        <li><a href="{{url('/email-open')}}">7 Karakteristik Pendidikan Klasik</a></li>
                                        <li><a href="{{url('/email-compose')}}">Novem Artes Humanitatis</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url('/components-ratings')}}">Visi, Misi, & Nilai-Nilai Utama</a></li>
                                <li><a href="{{url('/components-range-slider')}}">Arti dan Moto SWH</a></li>
                                <li><a href="{{url('/components-switchery')}}">Hubungi Kami</a></li>
                            </ul>
                        </li>
                        <li class="scroll"><a href="{{url('/events')}}"><span>Artikel</span></a></li>
                        <li class="scroll"><a href="{{url('/events')}}"><span>Testimonial</span></a></li>
                        <li class="scroll"><a href="{{url('/events')}}"><span>Lowongan Kerja</span></a></li>
                    </ul>
                </div>
            </nav>
            <!-- End XP Nav -->
        </div>
        <!-- End XP Menubar -->
    </div>
    <!-- End XP Headerbar -->
    @yield('rightbar-content')
    
</div>