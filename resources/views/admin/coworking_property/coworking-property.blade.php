@extends('admin.layouts.main')
@section('title', 'Coworking Property')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="{{ route('coworking_space_properties.create') }}" role="button">+ Create Coworking Space</a>
    </div>
    <div class="py-12 my-4">
        <div class="overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="example" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nomor Coworking Space</th>
                            <th>Nama Property</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($coworking_space_properties) || is_object($coworking_space_properties))
                        <?php $no=1; ?>
                            @forelse ($coworking_space_properties as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nomor_cs}}</td>
                                    <td>{{$item->nama_property}}</td>
                                    <td>
                                        <div class="row">
                                        <form action="{{ route('coworking_space_properties.edit', $item->id) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success">Edit</button>
                                        </form>
                                        <form action="{{ route('coworking_space_properties.destroy', $item->id) }}" method="POST" class="inline-block">
                                            {!! method_field('delete') . csrf_field() !!}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="border text-center p-5">
                                        Data tidak ditemukan
                                    </td>
                                </tr>
                            @endforelse
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
        $('#example').DataTable();
    } );
    </script>
@endsection
