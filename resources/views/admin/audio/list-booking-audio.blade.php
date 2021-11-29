@extends('admin.layouts.main')
@section('title', 'List Booking Audio')

@section('content')
    <div class="d-flex justify-content-between">
        <div class="px-4 py-10">
            <a class="btn btn-success" href="{{ route('booking_audios.create') }}" role="button">+ Booking Audio</a>
        </div>
        <div class="px-4 py-10">
            <a class="btn btn-success" href="{{ route('export.booking.audio') }}" role="button">Export</a>
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
                            <th>Judul Audio</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($booking_audio) || is_object($booking_audio))
                        <?php $no=1; ?>
                            @forelse ($booking_audio as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->member->nama}}</td>
                                    <td>@if ($item->id_admin != null)
                                            {{$item->admin->nama}}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>{{$item->audio->judul}}</td>
                                    <td>{{date("d M Y", strtotime($item->tgl_mulai))}}</td>
                                    <td>{{date("d M Y", strtotime($item->tgl_selesai))}}</td>
                                    <td>
                                        @if ($item->status == 2)
                                            Verifying
                                        @elseif ($item->status == 1)
                                            Active
                                        @elseif ($item->status == 0)
                                            Booked
                                        @endif
                                    </td>
                                    @if ($item->status == 2)
                                    <td>
                                        <div class="row">
                                            <form action="{{route('booking_audios.update', $item->id_booking_audio)}}" method="POST" enctype="multipart/form-data" class="inline-block px-2">
                                                {!! method_field('put') . csrf_field() !!}
                                                <button type="submit" class="btn btn-success"><i class="far fa-check-circle"></i></button>
                                            </form>
                                            <form action="{{ route('booking_audios.destroy', $item->id_booking_audio) }}" method="POST" class="inline-block">
                                                {!! method_field('delete') . csrf_field() !!}
                                                <button type="submit" class="btn btn-danger"><i class="far fa-times-circle"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                    @elseif ($item->status == 1)
                                    <td>
                                        <div class="text-center">
                                            <form action="{{ route('booking_audios.edit', $item->id_booking_audio) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success"><i class="far fa-edit"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                    @elseif ($item->status == 0)
                                    <td class="text-center">-</td>
                                    @endif
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
