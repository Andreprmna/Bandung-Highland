@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Pinjam &raquo; Video
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
        <form action="{{route('pinjam_videos.store')}}" method="POST" enctype="multipart/form-data">
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
                            <option value="{{$item->id_admin}}">{{$item->nama}}</option>
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
                <label for="date_pinjam">Tanggal Pinjam</label>
                <input id="date_pinjam" class="form-control" type="date" name="tgl_pinjam" :value="old('tgl_pinjam')" required>
            </div>

            <div class="form-group">
                <label for="date_kembali">Tanggal Kembali</label>
                <input id="date_kembali" class="form-control" type="date" name="tgl_kembali" :value="old('tgl_kembali')" required>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Pinjam</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
