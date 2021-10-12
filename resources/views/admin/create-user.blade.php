@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            User &raquo; Create
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Email" :value="old('email')" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="name" placeholder="Name" :value="old('name')" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Password Confirmation" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input id="dob" class="form-control" type="date" name="tgl_lahir" :value="old('tgl_lahir')" required>
            </div>
            <div class="form-group">
                <label for="gender">Address</label>
                <input id="address" class="form-control" type="text" name="alamat" placeholder="Alamat" :value="old('alamat')" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control" name="jenis_kelamin" required>
                    <option value="Male">Laki-laki</option>
                    <option value="Female">Wanita</option>
                </select>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" class="form-control" name="role" required>
                    <option value="0">Super Admin</option>
                    <option value="1">Admin</option>
                    <option value="2">Member</option>
                </select>
            </div>
            <div class="form-group">
                <label for="gender">Photo Profile</label>
                <input id="profile" class="form-control" type="file" name="profile_photo_path">
            </div>             
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Create</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
