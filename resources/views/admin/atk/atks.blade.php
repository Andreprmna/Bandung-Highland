@extends('admin.layouts.main')
@section('title', 'Alat Tulis Kantor')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="{{ route('atks.create') }}" role="button">+ Create Alat Tulis Kantor</a>
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
                            <th>Status</th>
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
                                    <td>{{$item->deskripsi_atk}}</td>
                                    @if ($item->status_atk == 0)
                                        <td>Tidak Tersedia</td>
                                        @elseif ($item->status_atk == 1)
                                        <td>Tersedia</td>
                                    @endif
                                    <td>
                                        <div class="row">
                                        <form action="{{ route('atks.edit', $item->id_atk) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success"><i class="far fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('atks.destroy', $item->id_atk) }}" method="POST" class="inline-block">
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
