@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            User &raquo; {{ $item->name }} &raquo; Edit
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('users.update', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Email" value="{{old('email') ?? $item->email}}" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="name" placeholder="Name" value="{{old('name') ?? $item->name}}" required>
            </div>
            {{-- <div class="form-group">
                <label for="password">Password</label>
                <input id="password" class="form-control" type="password" name="password" placeholder="Password" required autocomplete="new-password">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Password Confirmation" required autocomplete="new-password">
            </div> --}}
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input id="dob" class="form-control" type="date" name="tgl_lahir" value="{{old('tgl_lahir') ?? $item->tgl_lahir}}" required>
            </div>
            <div class="form-group">
                <label for="gender">Address</label>
                <input id="address" class="form-control" type="text" name="alamat" placeholder="Alamat" value="{{old('alamat') ?? $item->alamat}}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control" name="jenis_kelamin" required>
                    @if ($item->jenis_kelamin == 'Male') 
                        <option value="Male" selected>Male</option>
                        <option value="Female">Female</option>
                        @elseif ($item->jenis_kelamin == 'Female')
                            <option value="Male">Male</option>
                            <option value="Female" selected>Female</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" class="form-control" name="role" required>
                    @if ($item->role == 0) 
                        <option value="0" selected>Super Admin</option>
                        <option value="1">Admin</option>
                        <option value="2">Member</option>
                        @elseif ($item->role == 1)
                            <option value="0">Super Admin</option>
                            <option value="1" selected>Admin</option>
                            <option value="2">Member</option>
                        @elseif ($item->role == 2)
                            <option value="0">Super Admin</option>
                            <option value="1">Admin</option>
                            <option value="2" selected>Member</option>
                    @endif
                </select>
            </div>
            @if ($item->role == 2) 
                <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status" required>
                    @if ($item->status == 0) 
                        <option value="0" selected>Unverified</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                        @elseif ($item->status == 1)
                            <option value="0">Unverified</option>
                            <option value="1" selected>Active</option>
                            <option value="2">Inactive</option>
                        @elseif ($item->status == 2)
                            <option value="0">Unverified</option>
                            <option value="1">Active</option>
                            <option value="2" selected>Inactive</option>
                    @endif
                    
                </select>
            </div>
                
            @endif
            <div class="form-group">
                <label for="gender">Photo Profile</label>
                <input id="profile" class="form-control" type="file" name="profile_photo_path">
            </div>             
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Update</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection