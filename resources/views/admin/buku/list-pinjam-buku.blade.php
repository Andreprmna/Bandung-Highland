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
                            <th>Tanggal Pengembalian</th>
                            <th>Denda</th>
                            <th>Status</th>
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
                                    <td>{{$item->admin->nama}}</td>
                                    <td class="text-truncate" style="max-width: 8rem">{{$item->buku->judul}}</td>
                                    <td>{{date("d M Y", strtotime($item->tgl_pinjam))}}</td>
                                    <td>{{date("d M Y", strtotime($item->tgl_kembali))}}</td>
                                    <td>
                                        @if ($item->tgl_pengembalian != null)
                                            {{date("d M Y", strtotime($item->tgl_pengembalian))}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>@if ($item->denda != null)
                                            {{$item->denda}}
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
                                        @if ($item->status != 2)
                                            <div class="text-center">
                                            <form action="{{ route('pinjam_bukus.edit', $item->id_pinjam_buku) }}" class="inline-block px-2">
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
