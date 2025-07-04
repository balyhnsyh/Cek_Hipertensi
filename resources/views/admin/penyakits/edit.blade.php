@extends('layouts.admin-master')

@section('topbar')
    <h1 class="h3 text-gray-800 font-weight-bold"><i class="fa-solid fa-pen mx-3"></i>Update Data Penyakit</h1>
@endsection

@section('admincontent')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action="{{ route('penyakit.update', $penyakit->id_penyakit) }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-around" style="width: 100%;">
            <div style="width: 45%">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Id Penyakit</label>
                    <input type="text" class="form-control" name="id_penyakit" aria-describedby="emailHelp" placeholder="Id Penyakit" value="{{ $penyakit->id_penyakit }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Penyakit</label>
                    <input type="text" class="form-control" name="nama_penyakit" placeholder="Nama Penyakit" value="{{ $penyakit->nama_penyakit }}" required>
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
