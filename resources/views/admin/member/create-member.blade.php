@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Member &raquo; Create
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('members.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Email" :value="old('email')" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="nama" placeholder="Name" :value="old('nama')" required>
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
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="profile">Photo Profile</label>
                <input id="profile" class="form-control" type="file" name="foto_profil">
            </div>             
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Create</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
