@section('title') 
Community Center - Update Profile
@endsection 
@extends('layouts.main')
@section('style')
@endsection 
@section('content')
@include('layouts.navbar')
<div class="container xp-breadcrumbbar">
    <div class="container-fluid breadcrumb-post">
        <div>
            <h4 class="xp-page-title">Update Profile</h4>
        </div>
        <div>
            <div class="xp-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/')}}"><i class="icon-home"></i></a></li>
                    <li class="breadcrumb-item active mr-3" aria-current="page">Profile</li>
                </ol>
            </div>
        </div>
    </div>          
</div>
<!-- Start Content -->                    
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-4">
            <div class="d-flex flex-column align-items-center text-center p-3 py-md-5">
                <img class="rounded-circle mt-md-5 mb-1" src="{{url('storage/'.auth()->guard('web')->user()->foto_profil)}}" width="90" height="90">
                <span class="font-weight-bold">{{Auth::guard('web')->user()->nama}}</span>
                <span class="text-black-50">{{Auth::guard('web')->user()->email}}</span>
            </div>
        </div>
        <div class="col-md-8">
            @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <div class="py-2 shadow p-3 mb-5 bg-white rounded">
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <h6 class="text-right">Edit Profile</h6>
                </div>
                <form action="{{route('member.update', Auth::guard('web')->user()->id_member)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="date">Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{Auth::guard('web')->user()->nama}}">
                        </div>
                        <div class="col-md-6">
                            <label for="date">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{Auth::guard('web')->user()->email}}">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="date">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lahir" value="{{Auth::guard('web')->user()->tgl_lahir}}">
                        </div>
                        <div class="col-md-6">
                            <label for="date">Jenis Kelamin</label>
                            <select id="gender" class="form-control" name="jenis_kelamin" required>
                                @if (Auth::guard('web')->user()->jenis_kelamin == 'Laki-laki') 
                                    <option value="Laki-laki" selected>Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                    @elseif (Auth::guard('web')->user()->jenis_kelamin == 'Perempuan')
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan" selected>Perempuan</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="date">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Alamat" value="{{Auth::guard('web')->user()->alamat}}">
                        </div>
                        <div class="col-md-6">
                            <label for="date">Foto Profil</label>
                            <input type="file" class="form-control" name="foto_profil">
                        </div>
                    </div>
                    <div class="mt-5 text-right"><button type="submit" class="btn btn-primary">Update</button></div>
                </form>
            </div>
            <div class="py-2 shadow p-3 mb-5 bg-white rounded">
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <h6 class="text-right">Change Password</h6>
                </div>
                <form action="{{route('change.password')}}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label for="date">Current Password</label>
                            <input type="password" class="form-control" placeholder="Current Password" name="current_password">
                        </div>
                        <div class="col-md-6">
                            <label for="date">New Password</label>
                            <input type="password" class="form-control" placeholder="New Password" name="password">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-6">
                            <label for="date">Confirmation Password</label>
                            <input type="password" class="form-control" placeholder="Confirmation Password" name="confirm_password">
                        </div>
                    </div>
                    <div class="mt-5 text-right"><button type="submit" class="btn btn-primary">Change Password</button></div>
                </form>
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
