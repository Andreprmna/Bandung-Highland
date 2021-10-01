@section('title') 
Neon - Login
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
                                <form method="POST" action="{{ route('login.custom') }}">
                                    @csrf

                                    <div class="text-center mb-3">
                                        <h4 class="text-black">Sign In !</h4>
                                    </div>                                        
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-6">
                                            <div class="custom-control custom-checkbox">
                                              <input type="checkbox" class="custom-control-input" id="rememberme">
                                              <label class="custom-control-label" for="rememberme">Remember Me</label>
                                            </div>                                
                                        </div>
                                        <div class="form-group col-6 text-right">
                                          <label class="forgot-psw"> 
                                            <a id="forgot-psw" href="{{url('/page-forgotpsw')}}">Forgot Password?</a>
                                          </label>
                                        </div>
                                    </div>                          
                                  <button type="submit" class="btn btn-primary btn-rounded btn-lg btn-block">Sign In</button>
                                </form>
                            </div>
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