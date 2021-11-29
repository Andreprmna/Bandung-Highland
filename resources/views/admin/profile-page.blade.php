@extends('admin.layouts.main')
@section('title', 'Update')

@section('content')
<div class="container-fluid">
    <div class="bg-dark py-2 px-2 text-white">
        <span>User Profile</span>
    </div>
    <div class="py-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admins.update', Auth::guard('admin')->user()->id_admin)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Email" value="{{old('email') ?? Auth::guard('admin')->user()->email}}" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="nama" placeholder="Name" value="{{old('nama') ?? Auth::guard('admin')->user()->nama}}" required>
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input id="dob" class="form-control" type="date" name="tgl_lahir" value="{{old('tgl_lahir') ?? Auth::guard('admin')->user()->tgl_lahir}}" required>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input id="address" class="form-control" type="text" name="alamat" placeholder="Alamat" value="{{old('alamat') ?? Auth::guard('admin')->user()->alamat}}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control" name="jenis_kelamin" required>
                    @if (Auth::guard('admin')->user()->jenis_kelamin == 'Laki-laki') 
                        <option value="Laki-laki" selected>Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        @elseif (Auth::guard('admin')->user()->jenis_kelamin == 'Perempuan')
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan" selected>Perempuan</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Photo Profile</label>
                <input id="profile" class="form-control" type="file" name="foto_profil">
            </div>             
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Update</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
</div>

<div class="container-fluid">
    <div class="bg-dark py-2 px-2 text-white">
        <span>Change Password</span>
    </div>
    <div class="py-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('admin.password')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="password">Current Password</label>
                <input id="password" class="form-control" type="password" name="current_password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <label for="password">New Password</label>
                <input id="password" class="form-control" type="password" name="password" placeholder="New Password" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input id="password_confirmation" class="form-control" type="password" name="confirm_password" placeholder="Password Confirmation" required autocomplete="new-password">
            </div>

            <div class="float-right">
                <button type="submit" class="btn btn-primary">Change Password</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
</div>
    
@endsection
@section('script')
@endsection
