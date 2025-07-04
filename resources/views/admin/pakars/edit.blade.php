@extends('layouts.admin-master')

@section('topbar')
    <h1 class="h3 text-gray-800 font-weight-bold"><i class="fa-solid fa-pen mx-3"></i>Update Data Pakar</h1>
@endsection

@section('admincontent')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action="{{ route('pakar.update', $pakar->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-around" style="width: 100%;">
            <div style="width: 45%">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama Lengkap" value="{{ $pakar->nama }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="{{ $pakar->alamat }}" placeholder="Masukkan Alamat" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">TTL</label>
                    <input type="text" class="form-control" name="ttl" aria-describedby="emailHelp" placeholder="Masukkan Tempat Tanggal Lahir" value="{{ $pakar->ttl }}"required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Umur</label>
                    <input type="text" class="form-control" name="umur" value="{{ $pakar->umur }}" placeholder="Masukkan Umur" required>
                </div>
            </div>
            <div style="width: 45%;">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Profesi</label>
                    <input type="text" class="form-control" name="profesi" aria-describedby="emailHelp" placeholder="Masukkan Profesi" value="{{ $pakar->profesi }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Tempat Kerja</label>
                    <input type="text" class="form-control" name="tmp_krj" value="{{ $pakar->tmp_krj }}" placeholder="Masukkan Tempat Kerja" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">No. Telp</label>
                    <input type="text" class="form-control" name="no_telp" value="{{ $pakar->no_telp }}" placeholder="Masukkan Nomer Telepon" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $pakar->email }}" placeholder="Masukkan Email" required>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Update Data</span>
                    </button>
                </div>
            </div>
        </div>
        


    </form>
@endsection
