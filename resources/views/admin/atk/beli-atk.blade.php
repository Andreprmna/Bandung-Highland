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
                <label for="nama_member">Nama Member</label>
                <select id="nama_member" class="form-control" name="id_member" required>
                    @if (is_array($member) || is_object($member))
                        @forelse ($member as $item)
                            <option value="{{$item->id_member}}">{{$item->nama}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="nama_admin">Nama Admin</label>
                <select id="nama_admin" class="form-control" name="id_admin" required>
                    @if (is_array($user) || is_object($user))
                        @forelse ($user as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="nama_atk">Nama Alat Tulis Kantor</label>
                <select id="nama_atk" class="form-control" name="id_atk" required>
                    @if (is_array($atk) || is_object($atk))
                        @forelse ($atk as $item)
                            <option value="{{$item->id}}">{{$item->nama_atk}}</option>
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
                <label for="total_harga">Total Harga</label>
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
