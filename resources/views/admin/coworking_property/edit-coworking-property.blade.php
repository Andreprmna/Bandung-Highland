@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Coworking Property &raquo; {{ $item->name }} &raquo; Edit
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('coworking_space_properties.update', $item->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nomor_cs">Nomor CS</label>
                <input id="nomor_cs" class="form-control" type="text" name="nomor_cs" placeholder="Nomor CS" value="{{old('nomor_cs') ?? $item->nomor_cs}}" required>
            </div>
            <div class="form-group">
                <label for="daya_tampung">Daya Tampung</label>
                <input id="daya_tampung" class="form-control" type="text" name="daya_tampung" placeholder="Daya Tampung" value="{{old('daya_tampung') ?? $item->daya_tampung}}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" class="form-control" type="text" name="deskripsi_cs" placeholder="Deskripsi" value="{{old('deskripsi') ?? $item->deskripsi_cs}}" required>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Update</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
