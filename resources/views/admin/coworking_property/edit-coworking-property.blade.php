@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Coworking Property Edit
        </h1>
    </div><!-- /.col -->
    
    </div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
    <div class="px-4">
        <form action="{{route('coworking_space_properties.update', $item->id_csp)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nomor_cs">Nomor Coworking Space</label>
                <select id="nomor_cs" class="form-control" name="id_cs" required>
                    
                    @forelse ($coworking_space as $item2)
                        <option value="{{$item2->id_cs}}" @if ($item->id_cs == $item2->id_cs) selected @endif>{{$item2->nomor_cs}}</option>
                    @empty
                        <option value="-">-</option>
                    @endforelse
                </select>
            </div>

            <div class="form-group">
                <label for="nama_property">Nama Property</label>
                <select id="nama_property" class="form-control" name="id_property" required> 
                    @forelse ($property as $item3)
                        <option value="{{$item3->id_property}}" @if ($item->id_property == $item3->id_property) selected @endif>{{$item3->nama_property}}</option> 
                    @empty
                        <option value="-">-</option>
                    @endforelse
                </select>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Update</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
