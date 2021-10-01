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
                                <form action="{{ route('register.custom') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="text-center mb-3">
                                        <h4 class="text-black">Create New Account</h4>
                                        <p class="text-muted">Already have an account? <a href="{{url('/page-login')}}">Sign in</a> Here</p>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="name" value="{{ old('nama') }}" class="form-control" id="name" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="date" name="tgl_lahir" class="form-control" id="ttl" placeholder="Date of Birth" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="jenis_kelamin" id="gender" class="form-control">
                                            <option value="Male">Laki-laki</option>
                                            <option value="Female">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="alamat" value="{{ old('alamat') }}" class="form-control" id="address" placeholder="Alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="profile_photo_path" class="form-control" id="profile" placeholder="Photo Profile" required>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                          <input type="checkbox" class="custom-control-input" id="terms">
                                          <label class="custom-control-label" for="terms">I Agree to Terms & Conditions of Neon</label>
                                        </div> 
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