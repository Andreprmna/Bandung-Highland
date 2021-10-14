@extends('admin.layouts.main')
@section('title', 'Alat Tulis Kantor')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="{{ route('atks.create') }}" role="button">+ Create Toy</a>
    </div>
    <div class="py-12 my-4">
        <div class="overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="example" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Deskripsi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($atk) || is_object($atk))
                        <?php $no=1; ?>
                            @forelse ($atk as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_atk}}</td>
                                    <td>{{$item->harga}}</td>
                                    <td>{{$item->jumlah}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td>
                                        <div class="row">
                                        <form action="{{ route('atks.edit', $item->id) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success">Edit</button>
                                        </form>
                                        <form action="{{ route('atks.destroy', $item->id) }}" method="POST" class="inline-block">
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
