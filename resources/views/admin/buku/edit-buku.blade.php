@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Buku &raquo; {{ $item->name }} &raquo; Edit
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('bukus.update', $item->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="judul">Judul</label>
                <input id="judul" class="form-control" type="text" name="judul" placeholder="Judul" value="{{old('judul') ?? $item->judul}}" required>
            </div>
            <div class="form-group">
                <label for="nama_pengarang">Nama Pengarang</label>
                <select id="nama_pengarang" class="form-control" name="id_pengarang" required>
                    @forelse ($pengarang as $item2)
                        <option value="{{$item2->id}}" @if ($item->id_pengarang == $item2->id) selected @endif>{{$item2->nama_pengarang}}</option>
                    @empty
                        <option value="-">-</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="nama_penerbit">Nama Penerbit</label>
                <select id="nama_penerbit" class="form-control" name="id_penerbit" required>
                    @forelse ($penerbit as $item3)
                        <option value="{{$item3->id}}" @if ($item->id_penerbit == $item3->id) selected @endif>{{$item3->nama_penerbit}}</option>
                    @empty
                        <option value="-">-</option>
                    @endforelse
                </select>
            </div>
            <div class="form-group">
                <label for="tahun_rilis">Tahun Rilis</label>
                <input id="tahun_rilis" class="form-control" type="text" name="tahun_rilis" placeholder="Tahun Rilis" value="{{old('tahun_rilis') ?? $item->tahun_rilis}}" required>
            </div>
            <div class="form-group">
                <label for="halaman">Halaman</label>
                <input id="halaman" class="form-control" type="text" name="halaman" placeholder="Halaman" value="{{old('halaman') ?? $item->halaman}}" required>
            </div>
            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input id="isbn" class="form-control" type="text" name="isbn" placeholder="ISBN" value="{{old('isbn') ?? $item->isbn}}" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <input id="deskripsi" class="form-control" type="text" name="deskripsi" placeholder="Deskripsi" value="{{old('deskripsi') ?? $item->deskripsi}}" required>
            </div>
            <div class="form-group">
                <label for="bentuk">Bentuk</label>
                <select id="bentuk" class="form-control" name="bentuk" required>
                    @if ($item->bentuk == 0)
                        <option value="0" selected>Fisik</option>
                        <option value="1">E-Book</option>
                        @elseif ($item->bentuk == 1)
                            <option value="0">Fisik</option>
                            <option value="1" selected>E-Book</option>
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="sampul">Sampul</label>
                <input id="sampul" class="form-control" type="file" name="sampul">
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Update</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
