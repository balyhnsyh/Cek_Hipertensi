@extends('layouts.admin-master')

@section('topbar')
    <h1 class="h3 text-gray-800 font-weight-bold"><i class="fa-solid fa-book-skull"></i> Data Penyakit</h1>
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
                            <th>Id Penyakit</th>
                            <th>Nama Penyakit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach ($penyakit as $row)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $row->id_penyakit }}</td>
                                <td>{{ $row->nama_penyakit }}</td>
                                <td class="aksi">
                                    <div class="d-flex">
                                        <a href="{{ route('penyakit.edit', ['id' => $row->id]) }}"
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
                <h5 class="modal-title" id="exampleModalLabel">Add Penyakit Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('penyakit.store') }}" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->has('id_penyakit'))
                        <div class="alert alert-danger">{{ $errors->first('id_penyakit') }}</div>
                    @endif
                    <div class="mb-3">
                        <label for="id_penyakit" class="form-label">Id Penyakit</label>
                        <input required type="text" class="form-control" name="id_penyakit"
                            value="{{ old('id_penyakit') }}" placeholder="Masukkan Id Penyakit" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                        <input required type="text" class="form-control" name="nama_penyakit"
                            value="{{ old('nama_penyakit') }}" placeholder="Masukkan Nama Penyakit" required>
                        @error('nama_penyakit')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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
                <form id="deleteForm" method="POST" action="{{ route('penyakit.destroy', ['id' => '__id__']) }}">
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
            $('#deleteForm').attr('action', '{{ route('penyakit.destroy', ['id' => '__id__']) }}'.replace('__id__', deleteId));
        });
    });
</script>
