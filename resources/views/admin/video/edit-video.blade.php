@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Video &raquo; {{ $item->judul }} &raquo; Edit
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
        <form action="{{route('videos.update', $item->id_video)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input id="v" class="form-control" type="text" name="judul" placeholder="Judul" value="{{old('judul') ?? $item->judul}}" required>
            </div>
            <div class="form-group">
                <label for="tahun_rilis">Tahun Rilis</label>
                <input id="tahun_rilis" class="form-control" type="text" name="tahun_rilis" placeholder="Tahun Rilis" value="{{old('tahun_rilis') ?? $item->tahun_rilis}}" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input id="genre" class="form-control" type="text" name="genre" placeholder="Genre" value="{{old('genre') ?? $item->genre}}" required>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi</label>
                <input id="durasi" class="form-control" type="text" name="durasi" placeholder="Durasi" value="{{old('durasi') ?? $item->durasi}}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" value="{{old('deskripsi') ?? $item->deskripsi}}" required>
            </div>
            <div class="form-group">
                <label for="format">Format</label>
                <select id="format" class="form-control" name="format" required>
                    @if ($item->format == 0) 
                        <option value="0" selected>Kaset</option>
                        <option value="1">VCD</option>
                        <option value="2">Mp4</option>
                        <option value="3">mkv</option>
                        @elseif ($item->format == 1)
                            <option value="0">Kaset</option>
                            <option value="1" selected>VCD</option>
                            <option value="2">Mp4</option>
                            <option value="3">mkv</option>
                        @elseif ($item->format == 2)
                            <option value="0">Kaset</option>
                            <option value="1">VCD</option>
                            <option value="2" selected>Mp4</option>
                            <option value="3">mkv</option>
                        @elseif ($item->format == 3)
                            <option value="0">Kaset</option>
                            <option value="1">VCD</option>
                            <option value="2">Mp4</option>
                            <option value="3" selected>mkv</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status" required>
                        <option value="1" @if ($item->status == 1) selected @endif>Tersedia</option>
                        <option value="0" @if ($item->status == 0) selected @endif>Tidak Tersedia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cover">Cover</label>
                <input id="cover" class="form-control" type="file" name="cover">
            </div> 
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Update</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
