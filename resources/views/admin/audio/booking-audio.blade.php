@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Booking &raquo; Audio
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
        <form action="{{route('booking_audios.store')}}" method="POST" enctype="multipart/form-data">
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
                <label for="nama_audio">Judul Audio</label>
                <select id="nama_audio" class="form-control" name="id_audio" required>
                    @if (is_array($audio) || is_object($audio))
                        @forelse ($audio as $item)
                            <option value="{{$item->id_audio}}">{{$item->judul}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>
            
            <div class="form-group">
                <label for="date_mulai">Tanggal Mulai</label>
                <input id="date_mulai" class="form-control" type="date" name="tgl_mulai" :value="old('tgl_mulai')" required>
            </div>

            <div class="form-group">
                <label for="date_selesai">Tanggal Selesai</label>
                <input id="date_selesai" class="form-control" type="date" name="tgl_selesai" :value="old('tgl_selesai')" required>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Book</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
