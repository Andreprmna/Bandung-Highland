@extends('admin.layouts.main')
@section('title', 'Users')

@section('content')
    <div class="px-4 py-10">
        <a class="btn btn-success" href="/cms/create-users" role="button">+ Create User</a>
    </div>
    <div class="py-12 my-4">
        <div class="overflow-hidden shadow-xl py-6 px-4 sm:px-6 lg:px-8">
            <div class="table-responsive">
                <table class="table table-sm table-hover" id="example" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>DoB</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (is_array($user) || is_object($user))
                            @forelse ($user as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    @if ($item->role == 0)
                                        <td>Super Admin</td>
                                        @elseif ($item->role == 1)
                                        <td>Admin</td>
                                        @elseif ($item->role == 2)
                                        <td>Member</td>
                                    @endif
                                    <td>{{date('d M Y', strtotime($item->tgl_lahir))}}</td>
                                    <td>{{$item->jenis_kelamin}}</td>
                                    <td>{{$item->alamat}}</td>
                                    @if ($item->status == 0)
                                        <td>Unverified</td>
                                        @elseif ($item->status == 1)
                                        <td>Active</td>
                                        @elseif ($item->status == 2)
                                        <td>Inactive</td>
                                    @endif
                                    <td>
                                        <a href="" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                        Edit
                                        </a>
                                        <form action="{" method="POST" class="inline-block">
                                            {!! method_field('delete') . csrf_field() !!}
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                                Delete
                                            </button>
                                        </form>
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
