@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Coworking Property &raquo; Create
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('coworking_space_properties.store')}}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="nomor_cs">Nomor Coworking Space</label>
                <select id="nomor_cs" class="form-control" name="id_cs" required>
                    @if (is_array($coworking_space) || is_object($coworking_space))
                        @forelse ($coworking_space as $item)
                            <option value="{{$item->id}}">{{$item->nomor_cs}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>

            <div class="form-group">
                <label for="nomor_cs">Nama Property</label>
                <select id="nomor_cs" class="form-control" name="id_property" required>
                    @if (is_array($property) || is_object($property))
                        @forelse ($property as $item2)
                            <option value="{{$item2->id}}">{{$item2->nama_property}}</option>
                        @empty
                            <option value="-">-</option>
                        @endforelse
                    @endif
                </select>
            </div>

            <div class="float-right">
                <button type="submit" class="btn btn-primary">Create</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
