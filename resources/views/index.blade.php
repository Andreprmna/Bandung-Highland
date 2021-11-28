@section('title') 
Community Center - Home
@endsection 
@extends('layouts.main')
@section('style')
@endsection 
@section('content')
@include('layouts.navbar')
<!-- Start Content -->                    
<div class="bg-transparent spacer"></div>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
        <img class="d-block w-100 img-fluid" src="https://cdn3.photoblogstop.com/wp-content/uploads/2012/07/Sierra_HDR_Panorama_DFX8048_2280x819_Q40_wm_mini.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="https://images.unsplash.com/photo-1513735539099-cf6e5d559d82?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cGFub3JhbWF8ZW58MHx8MHx8&ixlib=rb-1.2.1&w=1000&q=80" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="https://cloudflare1.360gigapixels.com/pano/misha/01715841_14k_Llanthony_07.jpgLEFT/equirect_crop_3_1/6.jpg" alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<div class="container my-5 welcome">
    <div class="text-center">
        <h1>Selamat Datang</h1>
    </div>
    <div class="my-4 welcome-intro">
        <video class="video-fluid" width="600" controls>
            <source src="https://mdbootstrap.com/img/video/Sail-Away.mp4" type="video/mp4" />
        </video>
        <p class="">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, culpa.</p>
        <p class="my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ad debitis cum voluptate obcaecati, velit numquam tenetur error ex corporis? Nulla tempora porro accusantium laudantium explicabo nemo obcaecati ratione. Ratione. Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum, ipsa Lorem ipsum dolor sit amet consectetur, adipisicing elit. Facilis, nihil!</p>
        
        <hr>
    </div>
</div>
<div class="container my-5 service">
    <div class="">
        <h3>Layanan Kami</h3>
    </div>
    <div class="my-4 service-intro">
        <div class="row">                   
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-audio-description fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="my-1 font-20">Booking Audio</h3>
                            <p class="mb-3 mt-3 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam commodi minima quis ad nostrum rem soluta ducimus, reiciendis eligendi, aliquid corrupti ea nisi alias labore expedita aspernatur.
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('audio.index') }}"><button type="button" class="btn btn-primary my-3">See More</button></a>
                    <hr class="service-hr">
                </div>
            </div>
            <!-- End XP Col -->
            <!-- Start XP Col -->
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-book-open fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="my-1 font-20">Booking Buku</h3>
                            <p class="mb-3 mt-3 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore praesentium magni reprehenderit facilis, molestias exercitationem minus suscipit aliquam corrupti deserunt alias.
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('buku.index') }}"><button type="button" class="btn btn-primary my-3">See More</button></a>
                    <hr class="service-hr">
                </div>
            </div>
            <!-- End XP Col -->
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-laptop-house fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="my-1 font-20">Booking Coworking Space</h3>
                            <p class="mb-3 mt-3 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam voluptatem, minima commodi tempora quia necessitatibus consequatur, doloremque magnam voluptatum dicta ipsum architecto Eaque?
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('coworking-space.index') }}"><button type="button" class="btn btn-primary my-3">See More</button></a>
                    <hr class="service-hr">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-gamepad fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="my-1 font-20">Booking Mainan</h3>
                            <p class="mb-3 mt-3 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cumque eum saepe fugit dolores at ullam veritatis quisquam modi odit? Corrupti quod quaerat animi veritatis nemo officia?
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('toy.index') }}"><button type="button" class="btn btn-primary my-3">See More</button></a>
                    <hr class="service-hr">
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
        <div class="col-md-6 col-lg-6 col-xl-6">
            <div class="card-body">
                <div class="row">
                    <span class="service-icon"><i class="nav-icon fas fa-video fa-2x"></i></span>
                    <div class="col text-left">
                        <h3 class="my-1 font-20">Booking Video</h3>
                        <p class="mb-3 mt-3 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cumque eum saepe fugit dolores at ullam veritatis quisquam modi odit? Corrupti quod quaerat animi veritatis nemo officia?
                        </p>
                    </div>
                </div>
                <a href="{{ route('video.index') }}"><button type="button" class="btn btn-primary my-3">See More</button></a>
                <hr class="service-hr">
            </div>
        </div>
        </div>
    </div>
    <hr>
</div>
<div class="container my-5 vimis">
    <div class="">
        <h3>Visi, Misi, dan Nilai-Nilai Utama</h3>
    </div>
    <div class="my-4 vimis-intro">
        <div class="row">                   
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-users fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="my-1 font-20">Visi</h3>
                            <p class="mb-3 mt-3 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium consequuntur ut delectus iure labore in hic voluptatibus illo facere provident quaerat, ullam aperiam voluptatem mollitia dolore, sint veniam quia facilis officiis, molestiae quas. Blanditiis pariatur ex quia et voluptas ducimus?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-book fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="my-1 font-20">Nilai-Nilai Utama</h3>
                            <div class="mb-3 mt-3 text-justify">
                                <ol>
                                    <li>Lorem ipsum dolor sit.  </li>
                                    <li>Lorem.</li>
                                    <li>Lorem, ipsum.</li>
                                    <li>Lorem, ipsum dolor.</li>
                                    <li>Lorem ipsum dolor sit amet consectetur.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End XP Col -->
            <!-- Start XP Col -->
            <!-- End XP Col -->
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-building fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="my-1 font-20">Misi</h3>
                            <div class="mb-3 mt-3 text-justify">
                                <ol>
                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Asperiores, culpa vitae!</li>
                                    <li>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Tempore et minus adipisci.</li>
                                    <li>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore itaque autem sapiente amet error totam, voluptatem veniam laboriosam numquam modi.</li>
                                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptas maxime, tempora eveniet fuga explicabo sed dignissimos adipisci eum quidem?</li>
                                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod asperiores id inventore.</li>
                                    <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</div>
<div class="container my-5 contact">
    <div class="">
        <h3>Hubungi Kami</h3>
    </div>
    <div class="my-4 vimis-intro">
        <div class="row">                   
            <div class="col-md-6 col-lg-6 col-xl-6">
                <!--Google map-->
                <hr class="service-hr">
                <div class="container-fluid">
                    <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="800" height="650" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                </div>
                <hr class="service-hr">
                <!--Google Maps-->
            </div>  
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="px-1 py-1 mr-2">
                            <span class="service-icon"><i class="nav-icon fas fa-map fa-lg"></i></span>
                        </div>
                        <div class="col text-left">
                            <span class="my-1"><strong>Alamat:</strong> Jl. Lorem ipsum dolor sit amet consectetur.</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="px-1 py-1 mr-2">
                            <span class="service-icon"><i class="nav-icon fas fa-phone-alt fa-lg"></i></span>
                        </div>
                        <div class="col text-left">
                            <span class="my-1"><strong>Phone:</strong> +6281 1234 5678, WA: +6281 1234 56789</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 py-1 mr-2">
                            <span class="service-icon"><i class="nav-icon fas fa-envelope fa-lg"></i></span>
                        </div>
                        <div class="col text-left">
                            <span class="my-1"><strong>E-mail:</strong> admin@communitycenter.com</span>
                        </div>
                    </div>
                    <div class="row py-4">
                        <h2><strong>Jam</strong> Kerja (Soft Opening)</h2>
                    </div>
                    <div class="row mb-3">
                        <div class="px-1 py-1 mr-2">
                            <i class="nav-icon far fa-clock fa-lg"></i>
                        </div>
                        <div class="col text-left">
                            <span class="my-1">Senin - Jumat: 1pm to 7pm</span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="px-1 py-1 mr-2">
                            <i class="nav-icon far fa-clock fa-lg"></i>
                        </div>
                        <div class="col text-left">
                            <span class="my-1">Sabtu: 8am to 2pm</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="px-1 py-1 mr-2">
                            <i class="nav-icon far fa-clock fa-lg"></i>
                        </div>
                        <div class="col text-left">
                            <span class="my-1">Minggu: Tutup</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Content -->
@endsection 
@section('footer')
@include('layouts.footer')
@endsection
@section('script')
@endsection 