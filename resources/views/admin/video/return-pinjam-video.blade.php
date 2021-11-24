@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Pengembalian Video
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
        <form action="{{route('pinjam_videos.update', $item->id_pinjam_video)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="date_return">Tanggal Pengembalian</label>
                <input id="date_return" class="form-control" type="date" name="tgl_pengembalian" value="{{old('tgl_pengembalian') ?? $item->tgl_pengembalian}}" required>
            </div>

            <div class="form-group">
                <label for="denda">Denda</label>
                <input id="denda" class="form-control" type="text" name="denda" value="{{old('denda') ?? $item->denda}}" required>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Update</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
