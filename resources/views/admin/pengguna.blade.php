@extends('layouts.admin-master')

@section('topbar')
    <h1 class="h3 text-gray-800 font-weight-bold"><i class="fa-solid fa-user-gear"></i> Data Pengguna</h1>
@endsection

@section('admincontent')
    @if (session('status'))
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('status') }}
        </div>

        <script>
            $(document).ready(function() {
                setTimeout(function() {
                    $('.alert').alert('close');
                }, 2500);
            });
        </script>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#exampleModal">
                <span class="icon text-white-50 d-flex align-items-center">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah Data</span>
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Profile Picture</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($pengguna as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->role }}</td>
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <img src="/storage/{{ $row->pfp }}" style="width: 100px">
                                    </div>
                                </td>
                                <td class="aksi">
                                    <div class="d-flex">
                                        <a href="{{ route('pengguna.edit', ['id' => $row->id]) }}"
                                            class="mx-1 btn btn-warning btn-circle">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <button class="mx-1 btn btn-danger btn-circle btn-delete" data-toggle="modal"
                                            data-target="#confirmDeleteModal" data-id="{{ $row->id }}"><i
                                                class="fas fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


<div class="modal fade @if ($errors->any()) show @endif" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true"
    @if ($errors->any()) style="display: block;" @endif>
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add User Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('pengguna.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                    @endif
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input required type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama" required>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input required type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan Email" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" class="form-control" required value="{{ old('role') }}">
                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="pakar">Pakar</option>
                            <option value="user">User</option>
                        </select>
                        @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input required type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50 d-flex align-items-center">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Data</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Konfirmasi Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="{{ route('pengguna.destroy', ['id' => '__id__']) }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Script to close modal on validation error
    $(document).ready(function() {
        @if ($errors->any())
            $('#exampleModal').modal('show');
        @endif

        // Close modal manually
        $('#exampleModal').on('hidden.bs.modal', function (e) {
            // Clear any existing errors
            $('.alert.alert-danger').remove();
        });
    });
</script>

<script>
    $(document).ready(function() {
        let deleteId;

        $('.btn-delete').on('click', function(e) {
            e.preventDefault();
            deleteId = $(this).data('id');
            $('#confirmDeleteModal').modal('show');
        });

        $('#confirmDeleteModal').on('shown.bs.modal', function() {
            $('#deleteForm').attr('action', '{{ route('pengguna.destroy', ['id' => '__id__']) }}'.replace('__id__', deleteId));
        });
    });
</script>
