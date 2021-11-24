@extends('admin.layouts.main')
@section('title', 'Property')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="{{ route('properties.create') }}" role="button">+ Create Property</a>
    </div>
    <div class="py-12 my-4">
        <div class="overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="example" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Property</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($properties) || is_object($properties))
                        <?php $no=1; ?>
                            @forelse ($properties as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_property}}</td>
                                    @if ($item->status == 0)
                                        <td>Tidak Tersedia</td>
                                        @elseif ($item->status == 1)
                                        <td>Tersedia</td>
                                    @endif
                                    <td>
                                        <div class="row">
                                        <form action="{{ route('properties.edit', $item->id_property) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success"><i class="far fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('properties.destroy', $item->id_property) }}" method="POST" class="inline-block">
                                            {!! method_field('delete') . csrf_field() !!}
                                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
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
