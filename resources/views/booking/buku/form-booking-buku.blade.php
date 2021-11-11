@section('title') 
Community Center - Buku
@endsection 
@extends('layouts.main')
@section('style')
@endsection 
@section('content')
@include('layouts.navbar')
<!-- Start Content -->
<!-- Start XP Breadcrumbbar -->                    
<div class="xp-breadcrumbbar">
    <div class="container container-fluid breadcrumb-post">
        <div>
            <h4 class="xp-page-title">Layanan</h4>
        </div>
        <div>
            <div class="xp-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Layanan</a></li>
                    <li class="breadcrumb-item"><a href="#">Booking</a></li>
                    <li class="breadcrumb-item active mr-3" aria-current="page">Buku</li>
                </ol>
            </div>
        </div>
    </div>          
</div>
<!-- End XP Breadcrumbbar -->
<!-- Start List Card -->
<div class="container my-3 pb-5">
    <div class="media py-3">
        <img src="/storage/{{$item->sampul}}" class="img-fluid mr-4 mb-4" alt="Responsive image" width="450" height="350">
        <div class="media-body">
            <h3 class="mt-0">{{$item->judul}}</h3>
            <div class="desc text-justify">
                <p>{{$item->deskripsi}}</p>
            </div>
            <div class="d-flex justify-content-between">
                <div class="d-inline-block">
                    <span class="px-0"><p>Pengarang: {{$item->pengarang->nama_pengarang}}</p></span>
                    <span class="px-0"><p>Penerbit: {{$item->penerbit->nama_penerbit}}</p></span>
                    <span class="px-0"><p>Bentuk: {{$item->bentuk}}</p></span>
                    <span class="px-0"><p>Kondisi: {{$item->kondisi}}</p></span>
                </div>
                <div class="d-inline-block text-right">
                    <span class="px-0"><p>ISBN: {{$item->isbn}}</p></span>
                    <span class="px-0"><p>Halaman: {{$item->halaman}}</p></span>
                    <span class="px-0"><p>Tahun Terbit: {{$item->tahun_rilis}}</p></span>
                    <span class="px-0"><p>Status: {{$item->status}}</p></span>
                </div>
            </div>
            <h3>Booking</h3>
            <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                    <label for="date">Tanggal Mulai</label>
                    <input type="date" class="form-control" placeholder="Tanggal Mulai" name="tgl_mulai">
                    </div>
                    <div class="col">
                        <label for="date">Tanggal Selesai</label>
                    <input type="date" class="form-control" placeholder="Tanggal Selesai" name="tgl_selesai">
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary">Book</button>    
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End List Card -->
<!-- End Content -->
@endsection 
@section('footer')
@include('layouts.footer')
@endsection
@section('script')
@endsection 