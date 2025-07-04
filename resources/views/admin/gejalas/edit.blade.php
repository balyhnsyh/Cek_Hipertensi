@extends('layouts.admin-master')

@section('topbar')
    <h1 class="h3 text-gray-800 font-weight-bold"><i class="fa-solid fa-pen mx-3"></i>Update Data Gejala</h1>
@endsection

@section('admincontent')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action="{{ route('gejala.update', $gejala->id_gejala) }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-around" style="width: 100%;">
            <div style="width: 45%">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Id Gejala</label>
                    <input type="text" class="form-control" name="id_gejala" aria-describedby="emailHelp" placeholder="Id Gejala" value="{{ $gejala->id_gejala }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Gejala</label>
                    <input type="text" class="form-control" name="nama_gejala" placeholder="Nama Gejala" value="{{ $gejala->nama_gejala }}" required>
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
