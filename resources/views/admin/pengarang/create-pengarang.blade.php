@extends('admin.layouts.main')

@section('content')
<div class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0">
            Pengarang &raquo; Create
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
        <form action="{{route('pengarangs.store')}}" method="POST">
            @csrf
            
            <div class="form-group">
                <label for="name">Name</label>
                <input id="name" class="form-control" type="text" name="nama_pengarang" placeholder="Name" :value="old('name')" required>
            </div>
                      
            <div class="float-right">
                <button type="submit" class="btn btn-primary">Create</button>    
            </div>
            <br>        
            <br>    
            
        </form>
    </div>
@endsection
