@extends('layouts.dashboard')

@section('title', 'Pengguna')

@section('style')
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <p class="card-title font-weight-bold">Pengguna</p>
                    <a href="{{ route('dashboard.user.create') }}?app=dashboard" class="btn btn-primary" id="btn-create">Tambah</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link user-tab active" id="admin-tab" data-toggle="tab" data-app="dashboard" href="#admin" aria-controls="admin" role="tab" aria-selected="true">
                                        <i class="bx bx-user align-middle"></i>
                                        <span class="align-middle">Admin</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link user-tab" id="karyawan-tab" data-toggle="tab" data-app="mobile" href="#karyawan" aria-controls="karyawan" role="tab" aria-selected="false">
                                        <i class="bx bx-user align-middle"></i>
                                        <span class="align-middle">Karyawan</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="admin" aria-labelledby="admin-tab" role="tabpanel">
                                    <table class="table datatable table-responsive" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">No</th>
                                                <th style="width: 15%">Nama</th>
                                                <th>Username</th>
                                                <th class="text-center text-nowrap" style="width: 1%">Jenis Kelamin</th>
                                                <th class="text-center" style="width: 1%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admins as $admin)
                                                <tr>
                                                    <td></td>
                                                    <td class="text-nowrap">{{ $admin->nama }}</td>
                                                    <td>{{ $admin->username }}</td>
                                                    <td class="text-center text-nowrap text-capitalize">{{ $admin->jenis_kelamin }}</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('dashboard.user.edit', $admin->id) }}" class="btn btn-secondary">Edit</a>
                                                            <button class="btn btn-danger btn-delete" value="{{ $admin->id }}" >Hapus</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="karyawan" aria-labelledby="karyawan-tab" role="tabpanel">
                                    <table class="table datatable table-responsive" style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 5%">No</th>
                                                <th style="width: 15%">Nama</th>
                                                <th>Username</th>
                                                <th class="text-center text-nowrap" style="width: 1%">Jenis Kelamin</th>
                                                <th class="text-center" style="width: 1%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($karyawans as $karyawan)
                                                <tr>
                                                    <td></td>
                                                    <td class="text-nowrap">{{ $karyawan->nama }}</td>
                                                    <td>{{ $karyawan->username }}</td>
                                                    <td class="text-center text-nowrap text-capitalize">{{ $karyawan->jenis_kelamin }}</td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('dashboard.user.edit', $karyawan->id) }}" class="btn btn-secondary">Edit</a>
                                                            <button class="btn btn-danger btn-delete" value="{{ $karyawan->id }}" >Hapus</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="" method="post" id="delete-form" class="d-none">
        @csrf
        @method("DELETE")
        <button type="submit" id="hidden-delete-button">Delete</button>
    </form>
@endsection

@section('script')
    <script>
        $('.btn-delete').on('click', function () {
            let id = $(this).val();
            $("#delete-form").prop("action", "{{ route('dashboard.user.index') }}/" + id);

            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus data!',
                confirmButtonClass: 'btn btn-primary',
                cancelButtonText: 'Batal',
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
            }).then(function (result) {
                if (result.isConfirmed) {
                    $("#hidden-delete-button").click();
                }
            });
        });

        $(document).on("click", ".user-tab", function()
        {
            var userApp = $(this).data("app");
            $("#btn-create").prop("href", "{{ route('dashboard.user.create') }}?app=" + userApp);
        });
    </script>
@endsection
