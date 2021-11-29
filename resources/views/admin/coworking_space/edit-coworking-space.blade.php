@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Coworking Space &raquo; {{ $item->nomor_cs }} &raquo; Edit
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
        <form action="{{route('coworking_spaces.update', $item->id_cs)}}" method="POST">
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
