@extends('admin.layouts.main')
@section('title', 'List Booking Coworking Space')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="{{ route('booking_coworking_spaces.create') }}" role="button">+ Booking Coworking Space</a>
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
                            <th>No Coworking Space</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($booking_coworking_space) || is_object($booking_coworking_space))
                        <?php $no=1; ?>
                            @forelse ($booking_coworking_space as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->member->nama}}</td>
                                    <td>{{$item->admin->nama}}</td>
                                    <td>{{$item->coworking_space->nomor_cs}}</td>
                                    <td>{{date("d M Y", strtotime($item->tgl_mulai))}}</td>
                                    <td>{{date("d M Y", strtotime($item->tgl_selesai))}}</td>
                                    <td>{{$item->status}}</td>
                                    <td>
                                        <div class="row">
                                        <form action="{{ route('booking_coworking_spaces.edit', $item->id_bcs) }}" class="inline-block px-2">
                                            <button type="submit" class="btn btn-success"><i class="far fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('booking_coworking_spaces.destroy', $item->id_bcs) }}" method="POST" class="inline-block">
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
