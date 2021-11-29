@extends('admin.layouts.main')
@section('title', 'Videos')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="{{ route('videos.create') }}" role="button">+ Create Video</a>
    </div>
    <div class="py-12 my-4">
        <div class="overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="example" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Genre</th>
                            <th>Durasi</th>
                            <th>Deskripsi</th>
                            <th>Format</th>
                            <th>Status</th>
                            <th>Cover</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($video) || is_object($video))
                        <?php $no=1; ?>
                            @forelse ($video as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td class="text-truncate" style="max-width: 8rem">{{$item->judul}}</td>
                                    <td>{{$item->genre}}</td>
                                    <td>{{$item->durasi}}</td>
                                    <td class="text-truncate" style="max-width: 8rem">{{$item->deskripsi}}</td>
                                    @if ($item->format == 0)
                                        <td>Kaset</td>
                                        @elseif ($item->format == 1)
                                        <td>VCD</td>
                                        @elseif ($item->format == 2)
                                        <td>Mp4</td>
                                        @elseif ($item->format == 3)
                                        <td>mkv</td>
                                    @endif
                                    @if ($item->status == 0)
                                        <td>Tidak Tersedia</td>
                                        @elseif ($item->status == 1)
                                        <td>Tersedia</td>
                                    @endif
                                    <td><img src="{{url('storage/'.$item->cover)}}" width="100px"></td>
                                    <td>
                                        <div class="d-flex justify-content-around">
                                        <form action="{{ route('videos.edit', $item->id_video) }}">
                                            <button type="submit" class="btn btn-success"><i class="far fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('videos.destroy', $item->id_video) }}" method="POST">
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
