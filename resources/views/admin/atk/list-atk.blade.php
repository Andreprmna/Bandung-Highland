@extends('admin.layouts.main')
@section('title', 'List Transaksi Alat Tulis Kantor')

@section('content')
    <div class="d-flex justify-content-between">
        <div class="px-4 py-10">
            <a class="btn btn-success" href="{{ route('point_of_sells.create') }}" role="button">+ Beli Alat Tulis Kantor</a>
        </div>
        <div class="px-4 py-10">
            <a class="btn btn-success" href="{{ route('export.pos') }}" role="button">Export</a>
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
                            <th>Nama ATK</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Tanggal</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($point_of_sell) || is_object($point_of_sell))
                        <?php $no=1; ?>
                            @forelse ($point_of_sell as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->member->nama}}</td>
                                    <td>{{$item->admin->nama}}</td>
                                    <td>{{$item->atk->nama_atk}}</td>
                                    <td>{{$item->jumlah_pos}}</td>
                                    <td>{{$item->total_harga}}</td>
                                    <td>{{date("d M Y", strtotime($item->tgl_pos))}}</td>
                                    {{-- <td>
                                        <div class="row">
                                        <form action="{{ route('point_of_sells.edit', $item->id_pos) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success">Edit</button>
                                        </form>
                                        <form action="{{ route('point_of_sells.destroy', $item->id_pos) }}" method="POST" class="inline-block">
                                            {!! method_field('delete') . csrf_field() !!}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        </div>
                                    </td> --}}
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
