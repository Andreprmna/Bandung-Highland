@section('title') 
Community Center - Audio
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
                    <li class="breadcrumb-item active mr-3" aria-current="page">Audio</li>
                </ol>
            </div>
        </div>
    </div>          
</div>
<!-- End XP Breadcrumbbar -->
<!-- Start List Card -->
<div class="container my-3 pb-5">
    <div class="media py-3">
        <img src="/storage/{{$item->cover}}" class="img-fluid mr-4 mb-4" alt="Responsive image" width="450" height="350">
        <div class="media-body">
            <h3 class="mt-0" value="">{{$item->judul}}</h3>
            <div class="d-flex justify-content-between">
                <div class="d-inline-block">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="p-0 pb-2 head-info">Pengisi Suara</td>
                                <td class="p-0 px-3">:</td>
                                <td class="p-0">{{$item->pengisi_suara}}</td>
                            </tr>
                            <tr>
                                <td class="p-0 pb-2 head-info">Genre</td>
                                <td class="p-0 px-3">:</td>
                                <td class="p-0">{{$item->genre}}</td>
                            </tr>
                            <tr>
                                <td class="p-0 pb-2 head-info">Format</td>
                                <td class="p-0 px-3">:</td>
                                @if ($item->format == 0)
                                        <td class="p-0">Kaset</td>
                                        @elseif ($item->format == 1)
                                        <td class="p-0">VCD</td>
                                        @elseif ($item->format == 2)
                                        <td class="p-0">Mp3</td>
                                    @endif
                            </tr>
                            <tr class="d-lg-none">
                                <td class="p-0 pb-2 head-info">Durasi</td>
                                <td class="p-0 px-3">:</td>
                                <td class="p-0">{{$item->durasi}}</td>
                            </tr>
                            <tr class="d-lg-none">
                                <td class="p-0 pb-2 head-info">Tahun Rilis</td>
                                <td class="p-0 px-3">:</td>
                                <td class="p-0">{{$item->tahun_rilis}}</td>
                            </tr>
                            <tr class="d-lg-none">
                                <td class="p-0 pb-2 head-info">Status</td>
                                <td class="p-0 px-3">:</td>
                                @if ($item->status == 1)
                                    <td class="p-0">Tersedia</td>
                                    @else
                                    <td class="p-0">Tidak Tersedia</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-none d-lg-block">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="p-0 pb-2 head-info">Durasi</td>
                                <td class="p-0 px-3">:</td>
                                <td class="p-0">{{$item->durasi}}</td>
                            </tr>
                            <tr>
                                <td class="p-0 pb-2 head-info">Tahun Rilis</td>
                                <td class="p-0 px-3">:</td>
                                <td class="p-0">{{$item->tahun_rilis}}</td>
                            </tr>
                            <tr>
                                <td class="p-0 pb-2 head-info">Status</td>
                                <td class="p-0 px-3">:</td>
                                @if ($item->status == 1)
                                    <td class="p-0">Tersedia</td>
                                    @else
                                    <td class="p-0">Tidak Tersedia</td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <h3>Booking</h3>
            <form action="{{route('audio.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input name="id_audio" value="{{$item->id_audio}}" hidden>
                <div class="row">
                    <div class="col">
                    <label for="date">Tanggal Mulai</label>
                    <input type="date" class="form-control" placeholder="Tanggal Mulai" name="tgl_mulai" @if ($item->status != 1) readonly @endif required>
                    </div>
                    <div class="col">
                        <label for="date">Tanggal Selesai</label>
                    <input type="date" class="form-control" placeholder="Tanggal Selesai" name="tgl_selesai" @if ($item->status != 1) readonly @endif required>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-primary" @if ($item->status != 1) disabled @endif>Book</button>    
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