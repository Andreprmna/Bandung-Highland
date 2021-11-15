@section('title') 
Community Center - Coworking Space
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
            <h4 class="xp-page-title">Layanan</h4>
        </div>
        <div>
            <div class="xp-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Layanan</a></li>
                    <li class="breadcrumb-item"><a href="#">Booking</a></li>
                    <li class="breadcrumb-item active mr-3" aria-current="page">Coworking Space</li>
                </ol>
            </div>
            <div class="searchBar pt-3 pr-lg-3">
                <input id="searchQueryInput" type="text" name="searchQueryInput" placeholder="Search" value="" />
                <button id="searchQuerySubmit" type="submit" name="searchQuerySubmit">
                <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="#666666" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" />
                </svg>
            </button>
        </div>
        </div>
    </div>          
</div>
<!-- End XP Breadcrumbbar -->
<!-- Start List Card -->
<div class="container my-3 pb-5">
    @if (is_array($coworking_space) || is_object($coworking_space))
        @forelse ($coworking_space as $item)
            <div class="d-block d-lg-flex py-3">
                <a href="{{ route('coworking-space.show', $item->id_cs) }}" class="text-black">
                    <div class="d-block">
                        <h5 class="mt-0">{{$item->nomor_cs}}</h5>
                        <div class="desc text-justify">
                            <p>{{$item->deskripsi_cs}}</p>
                        </div>
                        <span class="px-0"><p>Daya Tampung: {{$item->daya_tampung}}</p></span>
                        <span class="px-0"><p>Status: {{$item->status}}</p></span>
                    </div>
                </a>
            </div>
            <hr class="service-hr">
        @empty
            Data tidak ditemukan
        @endforelse
    @endif
    <div class="d-flex justify-content-center mt-5">
        {{ $coworking_space->links() }}
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