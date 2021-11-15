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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                <select id="nama_atk" class="form-control select" name="id_atk" required>
                    @if (is_array($atk) || is_object($atk))
                        @forelse ($atk as $item)
                            <option value="{{$item->id_atk}}" data-price="{{$item->harga}}">{{$item->nama_atk}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="jumlah_pos">Jumlah</label>
                        <input id="jumlah" class="form-control" type="text" name="jumlah_pos" placeholder="Jumlah" :value="old('jumlah_pos')" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input id="harga" class="form-control" type="text" name="harga" placeholder="Harga" value="500" readonly="true">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input id="total" class="form-control" type="text" name="total_harga" placeholder="Total Harga" :value="old('total_harga')" readonly="true" required>
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

@section('script')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#jumlah, #harga").keyup(function() {
                var harga  = $("#harga").val();
                var jumlah = $("#jumlah").val();

                var total = parseInt(harga) * parseInt(jumlah);
                $("#total").val(total);
            });
        });

        $(".select").change(function () {
            newPrice = $(this).children(':selected').data('price');
            
            $('#harga').val(newPrice);
            $('#jumlah').val("");
            $('#total').val("");
        });
    </script>
@endsection
