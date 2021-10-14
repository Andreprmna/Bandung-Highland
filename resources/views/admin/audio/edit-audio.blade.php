@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Audio &raquo; {{ $item->name }} &raquo; Edit
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('audios.update', $item->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input id="judul" class="form-control" type="text" name="judul" placeholder="Judul" value="{{old('judul') ?? $item->judul}}" required>
            </div>
            <div class="form-group">
                <label for="pengisi_suara">Pengisi Suara</label>
                <input id="pengisi_suara" class="form-control" type="text" name="pengisi_suara" placeholder="Pengisi Suara" value="{{old('pengisi_suara') ?? $item->pengisi_suara}}" required>
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
                <label for="format">Format</label>
                <select id="format" class="form-control" name="format" required>
                    @if ($item->format == 0) 
                        <option value="0" selected>Kaset</option>
                        <option value="1">VCD</option>
                        <option value="2">Mp3</option>
                        @elseif ($item->format == 1)
                            <option value="0">Kaset</option>
                            <option value="1" selected>VCD</option>
                            <option value="2">Mp3</option>
                        @elseif ($item->role == 2)
                            <option value="0">Kaset</option>
                            <option value="1">VCD</option>
                            <option value="2" selected>Mp3</option>
                    @endif
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
