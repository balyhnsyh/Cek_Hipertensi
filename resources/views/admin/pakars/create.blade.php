@extends('layouts.admin-master')

@section('topbar')
    <h1 class="h3 text-gray-800 font-weight-bold"><i class="fa-solid fa-plus mx-3"></i>Tambah Data Pakar</h1>
@endsection

@section('admincontent')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif


    <form method="post" action="{{ route('pakar.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama</label>
            <input type="text" class="form-control" name="nama" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Alamat</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">TTL</label>
            <input type="text" class="form-control" name="ttl" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Umur</label>
            <input type="text" class="form-control" name="umur">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" name="profesi" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tempat Kerja</label>
            <input type="text" class="form-control" name="tmp_krj">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">No. Telp</label>
            <input type="text" class="form-control" name="no_telp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="text" class="form-control" name="email">
        </div>
        <button type="submit" class="btn btn-primary btn-icon-split">
            <span class="icon text-white-50">
                <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah Data</span>
        </button>
    </form>
@endsection
