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
                            <th>Deskripsi</th>
                            <th>Bentuk</th>
                            <th>Status</th>
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
                                    <td class="text-truncate" style="max-width: 8rem">{{$item->judul}}</td>
                                    <td class="text-truncate" style="max-width: 8rem">{{$item->pengarang->nama_pengarang}}</td>
                                    <td class="text-truncate" style="max-width: 8rem">{{$item->penerbit->nama_penerbit}}</td>
                                    <td class="text-truncate" style="max-width: 8rem">{{$item->deskripsi}}</td>
                                    @if ($item->bentuk == 0)
                                        <td>Fisik</td>
                                        @elseif ($item->bentuk == 1)
                                        <td>E-Book</td>
                                    @endif
                                    @if ($item->status == 0)
                                        <td>Tidak Tersedia</td>
                                        @elseif ($item->status == 1)
                                        <td>Tersedia</td>
                                    @endif
                                    <td><img src="{{url('storage/'.$item->sampul)}}" width="100px"></td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                        <form action="{{ route('bukus.edit', $item->id_buku) }}">
                                            <button type="submit" class="btn btn-primary"><i class="far fa-eye"></i></button>
                                        </form>
                                        <form action="{{ route('bukus.edit', $item->id_buku) }}">
                                            <button type="submit" class="btn btn-success"><i class="far fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('bukus.destroy', $item->id_buku) }}" method="POST">
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
