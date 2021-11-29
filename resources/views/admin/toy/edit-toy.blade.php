@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Toy &raquo; {{ $item->nama_toy }} &raquo; Edit
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
        <form action="{{route('toys.update', $item->id_toy)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="nama_toy" placeholder="Name" value="{{old('nama_toy') ?? $item->nama_toy}}" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <input id="jenis" class="form-control" type="text" name="jenis" placeholder="Jenis" value="{{old('jenis') ?? $item->jenis}}" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input id="genre" class="form-control" type="text" name="genre" placeholder="Genre" value="{{old('genre') ?? $item->genre}}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" value="{{old('deskripsi') ?? $item->deskripsi}}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status" required>
                        <option value="1" @if ($item->status == 1) selected @endif>Tersedia</option>
                        <option value="0" @if ($item->status == 0) selected @endif>Tidak Tersedia</option>
                </select>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Update</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
