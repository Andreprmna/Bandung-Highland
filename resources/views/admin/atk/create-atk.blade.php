@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Alat Tulis Kantor &raquo; Create
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('atks.store')}}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nama_atk">Nama Alat Tulis Kantor</label>
                <input id="nama_atk" class="form-control" type="text" name="nama_atk" placeholder="Nama Alat Tulis Kantor" :value="old('nama_atk')" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input id="harga" class="form-control" type="text" name="harga" placeholder="Harga" :value="old('harga')" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input id="jumlah" class="form-control" type="text" name="jumlah" placeholder="Jumlah" :value="old('jumlah')" required>
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
