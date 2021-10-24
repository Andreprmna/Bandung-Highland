@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Beli &raquo; Alat Tulis Kantor
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('point_of_sells.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                <label for="nama_pengarang">Nama Member</label>
                <select id="nama_pengarang" class="form-control" name="id_pengarang" required>
                    @if (is_array($pengarang) || is_object($pengarang))
                        @forelse ($pengarang as $item)
                            <option value="{{$item->id}}">{{$item->nama_pengarang}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="nama_penerbit">Nama Admin</label>
                <select id="nama_penerbit" class="form-control" name="id_penerbit" required>
                    @if (is_array($penerbit) || is_object($penerbit))
                        @forelse ($penerbit as $item)
                            <option value="{{$item->id}}">{{$item->nama_penerbit}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="nama_pengarang">Nama Alat Tulis Kantor</label>
                <select id="nama_pengarang" class="form-control" name="id_pengarang" required>
                    @if (is_array($pengarang) || is_object($pengarang))
                        @forelse ($pengarang as $item)
                            <option value="{{$item->id}}">{{$item->nama_pengarang}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_pos">Jumlah</label>
                <input id="jumlah_pos" class="form-control" type="text" name="jumlah_pos" placeholder="Jumlah" :value="old('jumlah_pos')" required>
            </div>
            <div class="form-group">
                <label for="total_harga">Total harga</label>
                <input id="total_harga" class="form-control" type="text" name="total_harga" placeholder="Total Harga" :value="old('total_harga')" required>
            </div>
            
            <div class="form-group">
                <label for="date">Tanggal</label>
                <input id="date" class="form-control" type="date" name="tgl_pos" :value="old('tanggal')" required>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Beli</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
