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
        <img class="d-block w-100 img-fluid" src="https://www.ngopibareng.id/images/uploads/2021/2021-06-19/view-gunung-semeru-jadi-daya-tarik-pengunjung--thumbnail-393.webp" alt="First slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="https://www.ngopibareng.id/images/uploads/2021/2021-06-19/view-gunung-semeru-jadi-daya-tarik-pengunjung--thumbnail-393.webp" alt="Second slide">
        </div>
        <div class="carousel-item">
        <img class="d-block w-100 img-fluid" src="https://www.ngopibareng.id/images/uploads/2021/2021-06-19/view-gunung-semeru-jadi-daya-tarik-pengunjung--thumbnail-393.webp" alt="Third slide">
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
    <div class="mx-3">
        <h2><strong>Selamat</strong> Datang</h2>
    </div>
    <div class="my-4 welcome-intro">
        <p class="mx-3">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Facilis, culpa.</p>
        <p class="mx-5 my-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum ad debitis cum voluptate obcaecati, velit numquam tenetur error ex corporis? Nulla tempora porro accusantium laudantium explicabo nemo obcaecati ratione. Ratione.</p>
        <button type="button" class="btn btn-primary my-3">See More</button>
        <hr class="mx-3">
    </div>
</div>
<div class="container my-5 service">
    <div class="mx-3">
        <h2><strong>Layanan</strong> Kami</h2>
    </div>
    <div class="my-4 mx-5 service-intro">
        <div class="row">                   
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-users fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="mx-3 my-1 font-20"><strong>Kursus</strong></h3>
                            <p class="mb-3 mt-3 mx-3 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam commodi minima quis ad nostrum rem soluta ducimus, reiciendis eligendi, aliquid corrupti ea nisi alias labore expedita aspernatur.
                            </p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary my-3">See More</button>
                    <hr class="service-hr">
                </div>
            </div>
            <!-- End XP Col -->
            <!-- Start XP Col -->
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-book fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="mx-3 my-1 font-20"><strong>Perpustakaan</strong></h3>
                            <p class="mb-3 mt-3 mx-3 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore praesentium magni reprehenderit facilis, molestias exercitationem minus suscipit aliquam corrupti deserunt alias.
                            </p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary my-3">See More</button>
                    <hr class="service-hr">
                </div>
            </div>
            <!-- End XP Col -->
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-building fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="mx-3 my-1 font-20"><strong>Ruang Belajar</strong></h3>
                            <p class="mb-3 mt-3 mx-3 text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aliquam voluptatem, minima commodi tempora quia necessitatibus consequatur, doloremque magnam voluptatum dicta ipsum architecto Eaque?
                            </p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary my-3">See More</button>
                    <hr class="service-hr">
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-user-plus fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="mx-3 my-1 font-20"><strong>Pelatihan Guru</strong></h3>
                            <p class="mb-3 mt-3 mx-3 text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore cumque eum saepe fugit dolores at ullam veritatis quisquam modi odit? Corrupti quod quaerat animi veritatis nemo officia?
                            </p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary my-3">See More</button>
                    <hr class="service-hr">
                </div>
            </div>
        </div>
    </div>
    <hr class="mx-3">
</div>
<div class="container my-5 vimis">
    <div class="mx-3">
        <h2><strong>Visi, Misi,</strong> dan Nilai-Nilai Utama</h2>
    </div>
    <div class="my-4 mx-5 vimis-intro">
        <div class="row">                   
            <div class="col-md-6 col-lg-6 col-xl-6">
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-users fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="mx-3 my-1 font-20"><strong>Visi</strong></h3>
                            <p class="mb-3 mt-3 mx-3 text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium consequuntur ut delectus iure labore in hic voluptatibus illo facere provident quaerat, ullam aperiam voluptatem mollitia dolore, sint veniam quia facilis officiis, molestiae quas. Blanditiis pariatur ex quia et voluptas ducimus?
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <span class="service-icon"><i class="nav-icon fas fa-book fa-2x"></i></span>
                        <div class="col text-left">
                            <h3 class="mx-3 my-1 font-20"><strong>Nilai-Nilai Utama</strong></h3>
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
                            <h3 class="mx-3 my-1 font-20"><strong>Misi</strong></h3>
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
        <hr class="mx-3">
    </div>
</div>
<div class="container my-5 contact">
    <div class="mx-3">
        <h2><strong>Hubungi</strong> Kami</h2>
    </div>
    <div class="my-4 mx-5 vimis-intro">
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