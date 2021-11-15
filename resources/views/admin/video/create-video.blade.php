@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Video &raquo; Create
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
        <form action="{{route('videos.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="judul">Judul</label>
                <input id="v" class="form-control" type="text" name="judul" placeholder="Judul" :value="old('judul')" required>
            </div>
            <div class="form-group">
                <label for="tahun_rilis">Tahun Rilis</label>
                <input id="tahun_rilis" class="form-control" type="text" name="tahun_rilis" placeholder="Tahun Rilis" :value="old('tahun_rilis')" required>
            </div>
            <div class="form-group">
                <label for="genre">Genre</label>
                <input id="genre" class="form-control" type="text" name="genre" placeholder="Genre" :value="old('genre')" required>
            </div>
            <div class="form-group">
                <label for="durasi">Durasi</label>
                <input id="durasi" class="form-control" type="text" name="durasi" placeholder="Durasi" :value="old('durasi')" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" :value="old('deskripsi')" required>
            </div>
            <div class="form-group">
                <label for="format">Format</label>
                <select id="format" class="form-control" name="format" required>
                    <option value="0">Kaset</option>
                    <option value="1">VCD</option>
                    <option value="2">Mp4</option>
                    <option value="3">mkv</option>
                </select>
            </div>
            <div class="form-group">
                <label for="cover">Cover</label>
                <input id="cover" class="form-control" type="file" name="cover">
            </div>  
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Create</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
