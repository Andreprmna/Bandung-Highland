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
                    <li class="breadcrumb-item active mr-3" aria-current="page">Hubungi Kami</li>
                </ol>
            </div>
        </div>
    </div>          
</div>
<!-- End XP Breadcrumbbar -->
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
<div class="card-body">
                    
                </div>
<!-- End Content -->
@endsection 
@section('footer')
@include('layouts.footer')
@endsection
@section('script')
@endsection 