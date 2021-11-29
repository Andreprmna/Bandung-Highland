@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Alat Tulis Kantor &raquo; {{ $item->nama_atk }} &raquo; Edit
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
        <form action="{{route('atks.update', $item->id_atk)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_atk">Nama Alat Tulis Kantor</label>
                <input id="nama_atk" class="form-control" type="text" name="nama_atk" placeholder="Nama Alat Tulis Kantor" value="{{old('nama_atk') ?? $item->nama_atk}}" required>
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input id="jumlah" class="form-control" type="text" name="jumlah" placeholder="Jumlah" value="{{old('jumlah') ?? $item->jumlah}}" required>
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input id="harga" class="form-control" type="text" name="harga" placeholder="Harga" value="{{old('harga') ?? $item->harga}}" required>
            </div>
            
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" class="form-control" type="text" name="deskripsi_atk" placeholder="Deskripsi" value="{{old('deskripsi') ?? $item->deskripsi_atk}}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status_atk" required>
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
