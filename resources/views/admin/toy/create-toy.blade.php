@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Toy &raquo; Create
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('toys.store')}}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="nama_toy" placeholder="Name" :value="old('name')" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis</label>
                <input id="jenis" class="form-control" type="text" name="jenis" placeholder="Jenis" :value="old('jenis')" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input id="genre" class="form-control" type="text" name="genre" placeholder="Genre" :value="old('genre')" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" :value="old('deskripsi')" required>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Create</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
