@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Admin &raquo; {{ $item->nama }} &raquo; Edit
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
        <form action="{{route('admins.update', $item->id_admin)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" class="form-control" type="email" name="email" placeholder="Email" value="{{old('email') ?? $item->email}}" required>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="nama" placeholder="Name" value="{{old('nama') ?? $item->nama}}" required>
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
                <label for="address">Address</label>
                <input id="address" class="form-control" type="text" name="alamat" placeholder="Alamat" value="{{old('alamat') ?? $item->alamat}}" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select id="gender" class="form-control" name="jenis_kelamin" required>
                    @if ($item->jenis_kelamin == 'Laki-laki') 
                        <option value="Laki-laki" selected>Male</option>
                        <option value="Laki-laki">Female</option>
                        @elseif ($item->jenis_kelamin == 'Wanita')
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Wanita" selected>Wanita</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" class="form-control" name="id_role" required>
                    @forelse ($role as $item2)
                        <option value="{{$item2->id_role}}" @if ($item->id_role == $item2->id_role) selected @endif>{{$item2->nama_role}}</option>
                    @empty
                        <option value="-">-</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status" required>
                        <option value="0" @if ($item->status == 0) selected @endif>Unverified</option>
                        <option value="1" @if ($item->status == 1) selected @endif>Active</option>
                        <option value="2" @if ($item->status == 2) selected @endif>Inactive</option>
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
@endsection
