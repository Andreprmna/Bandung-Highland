@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Booking &raquo; Video
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('booking_videos.store')}}" method="POST" enctype="multipart/form-data">
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
                <label for="nama_video">Judul Video</label>
                <select id="nama_video" class="form-control" name="id_video" required>
                    @if (is_array($video) || is_object($video))
                        @forelse ($video as $item)
                            <option value="{{$item->id_video}}">{{$item->judul}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            
            <div class="form-group">
                <label for="date_mulai">Tanggal Mulai</label>
                <input id="date_mulai" class="form-control" type="date" name="waktu_mulai" :value="old('tgl_mulai')" required>
            </div>

            <div class="form-group">
                <label for="date_selesai">Tanggal Selesai</label>
                <input id="date_selesai" class="form-control" type="date" name="waktu_selesai" :value="old('tgl_selesai')" required>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Book</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
