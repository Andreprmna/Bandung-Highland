@extends('admin.layouts.main')
@section('title', 'List Pinjam Toy')

@section('content')
    <div class="d-flex justify-content-between">
        <div class="px-4 py-10">
            <a class="btn btn-success" href="{{ route('pinjam_toys.create') }}" role="button">+ Pinjam Toy</a>
        </div>
        <div class="px-4 py-10">
            <a class="btn btn-success" href="{{ route('export.pinjam.toy') }}" role="button">Export</a>
        </div>
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
                            <th>Judul Toy</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($pinjam_toy) || is_object($pinjam_toy))
                        <?php $no=1; ?>
                            @forelse ($pinjam_toy as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->member->nama}}</td>
                                    <td>{{$item->admin->nama}}</td>
                                    <td>{{$item->toy->nama_toy}}</td>
                                    <td>{{date("d M Y", strtotime($item->tgl_pinjam))}}</td>
                                    <td>
                                        @if ($item->tgl_pengembalian != null)
                                            {{date("d M Y", strtotime($item->tgl_pengembalian))}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->status == 1)
                                            Active
                                        @else
                                            Returned
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if ($item->status != 0)
                                            <div class="text-center">
                                            <form action="{{ route('pinjam_toys.edit', $item->id_pinjam_toy) }}" class="inline-block px-2">
                                                <button type="submit" class="btn btn-success"><i class="far fa-edit"></i></button>
                                            </form>
                                            </div>
                                        @else
                                            -
                                        @endif
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
