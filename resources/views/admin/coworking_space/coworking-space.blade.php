@extends('admin.layouts.main')
@section('title', 'Coworking Space')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="{{ route('coworking_spaces.create') }}" role="button">+ Create Coworking Space</a>
    </div>
    <div class="py-12 my-4">
        <div class="overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="example" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Nomor CS</th>
                            <th>Daya Tampung</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($coworking_space) || is_object($coworking_space))
                        <?php $no=1; ?>
                            @forelse ($coworking_space as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nomor_cs}}</td>
                                    <td>{{$item->daya_tampung}}</td>
                                    <td>{{$item->deskripsi_cs}}</td>
                                    @if ($item->status == 0)
                                        <td>Tidak Tersedia</td>
                                        @elseif ($item->status == 1)
                                        <td>Tersedia</td>
                                    @endif
                                    <td>
                                        <div class="row">
                                        <form action="{{ route('coworking_spaces.edit', $item->id_cs) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success"><i class="far fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('coworking_spaces.destroy', $item->id_cs) }}" method="POST" class="inline-block">
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
