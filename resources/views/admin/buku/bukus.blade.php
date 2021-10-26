@extends('admin.layouts.main')
@section('title', 'Buku')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="{{ route('bukus.create') }}" role="button">+ Create Buku</a>
    </div>
    <div class="py-12 my-4">
        <div class="overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="example" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun Rilis</th>
                            <th>Halaman</th>
                            <th>ISBN</th>
                            <th>Deskripsi</th>
                            <th>Bentuk</th>
                            <th>Sampul</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($buku) || is_object($buku))
                        <?php $no=1; ?>
                            @forelse ($buku as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->judul}}</td>
                                    <td>{{$item->pengarang->nama_pengarang}}</td>
                                    <td>{{$item->penerbit->nama_penerbit}}</td>
                                    <td>{{$item->tahun_rilis}}</td>
                                    <td>{{$item->halaman}}</td>
                                    <td>{{$item->isbn}}</td>
                                    <td>{{$item->deskripsi}}</td>
                                    <td>{{$item->bentuk}}</td>
                                    <td><img src="{{url('storage/'.$item->sampul)}}" width="100px"></td>
                                    <td>
                                        <div class="row">
                                        <form action="{{ route('bukus.edit', $item->id_buku) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success">Edit</button>
                                        </form>
                                        <form action="{{ route('bukus.destroy', $item->id_buku) }}" method="POST" class="inline-block">
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
