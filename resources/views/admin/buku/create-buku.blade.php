@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Buku &raquo; Create
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('bukus.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="judul">Judul</label>
                <input id="judul" class="form-control" type="text" name="judul" placeholder="Judul" :value="old('judul')" required>
            </div>
            <div class="form-group">
                <label for="nama_pengarang">Nama Pengarang</label>
                <select id="nama_pengarang" class="form-control" name="id_pengarang" required>
                    @if (is_array($pengarang) || is_object($pengarang))
                        @forelse ($pengarang as $item)
                            <option value="{{$item->id_pengarang}}">{{$item->nama_pengarang}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="nama_penerbit">Nama Penerbit</label>
                <select id="nama_penerbit" class="form-control" name="id_penerbit" required>
                    @if (is_array($penerbit) || is_object($penerbit))
                        @forelse ($penerbit as $item)
                            <option value="{{$item->id_penerbit}}">{{$item->nama_penerbit}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="tahun_rilis">Tahun Rilis</label>
                <input id="tahun_rilis" class="form-control" type="text" name="tahun_rilis" placeholder="Tahun Rilis" :value="old('tahun_rilis')" required>
            </div>
            <div class="form-group">
                <label for="halaman">Halaman</label>
                <input id="halaman" class="form-control" type="text" name="halaman" placeholder="Halaman" :value="old('halaman')" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input id="isbn" class="form-control" type="text" name="isbn" placeholder="ISBN" :value="old('isbn')" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" :value="old('deskripsi')" required>
            </div>
            <div class="form-group">
                <label for="bentuk">Bentuk</label>
                <select id="bentuk" class="form-control" name="bentuk" required>
                    <option value="0">Fisik</option>
                    <option value="1">E-Book</option>
                </select>
            </div>
            <div class="form-group">
                <label for="sampul">Sampul</label>
                <input id="sampul" class="form-control" type="file" name="sampul">
            </div>  
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Create</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
