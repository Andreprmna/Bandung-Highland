@section('title') 
Neon - Register
@endsection
@extends('layouts.main')
@section('style')
@endsection 
<div class="xp-authenticate-bg"></div>
<!-- Start XP Container -->
<div id="xp-container" class="xp-container">
    <!-- Start Container -->
    <div class="container">
        <!-- Start XP Row -->
        <div class="row vh-100 align-items-center">
            <!-- Start XP Col -->
            <div class="col-lg-12 ">
                <!-- Start XP Auth Box -->
                <div class="xp-auth-box">
                    <div class="card">
                        <div class="card-body">
                            <div class="p-3">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="{{route('member.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="text-center mb-3">
                                        <h4 class="text-black">Create New Account</h4>
                                        <p class="text-muted">Already have an account? <a href="{{url('/page-login')}}">Sign in</a> Here</p>
                                    </div>
                                    <div class="form-group">
                                        <input id="email" class="form-control" type="email" name="email" placeholder="Email" :value="old('email')" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="name" class="form-control" type="text" name="nama" placeholder="Nama" :value="old('nama')" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="password" class="form-control" type="password" name="password" placeholder="Password" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Password Confirmation" required autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <input id="dob" class="form-control" type="date" name="tgl_lahir" :value="old('tgl_lahir')" required>
                                    </div>
                                    <div class="form-group">
                                        <select id="gender" class="form-control" name="jenis_kelamin" required>
                                            <option value="Male">Laki-laki</option>
                                            <option value="Female">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input id="address" class="form-control" type="text" name="alamat" placeholder="Alamat" :value="old('alamat')" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="profile" class="form-control" type="file" name="foto_profil">
                                    </div>                      
                                  <button type="submit" class="btn btn-primary btn-rounded btn-lg btn-block">Create an Account</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <!-- End XP Auth Box -->
            </div>
            <!-- End XP Col -->
        </div>
        <!-- End XP Row -->
    </div>
    <!-- End Container -->
</div>
<!-- End XP Container -->
@section('script')
@endsection 