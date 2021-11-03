@section('title') 
Community Center - Visi - Misi
@endsection 
@extends('layouts.main')
@section('style')
@endsection 
@section('content')
@include('layouts.navbar')
<!-- Start Content -->                  
<!-- Start XP Breadcrumbbar -->                    
<div class="container xp-breadcrumbbar">
    <div class="container-fluid breadcrumb-post">
        <div>
            <h4 class="xp-page-title">Tentang Kami</h4>
        </div>
        <div>
            <div class="xp-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">About</a></li>
                    <li class="breadcrumb-item active mr-3" aria-current="page">Visi - Misi</li>
                </ol>
            </div>
        </div>
    </div>          
</div>
<!-- End XP Breadcrumbbar -->
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
    </div>
</div>
<div class="card-body">
                    
                </div>
<!-- End Content -->
@endsection 
@section('footer')
@include('layouts.footer')
@endsection
@section('script')
@endsection 