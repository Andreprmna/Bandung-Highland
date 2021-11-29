@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Penerbit &raquo; {{ $item->nama_penerbit }} &raquo; Edit
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
        <form action="{{route('penerbits.update', $item->id_penerbit)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="nama_penerbit" placeholder="Name" value="{{old('name') ?? $item->nama_penerbit}}" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" class="form-control" name="status" required>
                        <option value="1" @if ($item->status == 1) selected @endif>Active</option>
                        <option value="0" @if ($item->status == 0) selected @endif>Inactive</option>
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
