@extends('admin.layouts.main')
@section('title', 'List Pinjam Buku')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="{{ route('pinjam_bukus.create') }}" role="button">+ Pinjam Buku</a>
    </div>
    <div class="py-12 my-4">
        <div class="overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="example" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nama Member</th>
                            <th>Nama Admin</th>
                            <th>Judul Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($pinjam_buku) || is_object($pinjam_buku))
                        <?php $no=1; ?>
                            @forelse ($pinjam_buku as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->member->nama}}</td>
                                    <td>{{$item->admin->name}}</td>
                                    <td>{{$item->buku->judul}}</td>
                                    <td>{{$item->tgl_pinjam}}</td>
                                    <td>{{$item->tgl_kembali}}</td>
                                    <td>
                                        <div class="row">
                                        <form action="{{ route('pinjam_bukus.edit', $item->id_pinjam_buku) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success">Edit</button>
                                        </form>
                                        <form action="{{ route('pinjam_bukus.destroy', $item->id_pinjam_buku) }}" method="POST" class="inline-block">
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
