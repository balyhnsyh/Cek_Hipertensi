@extends('layouts.admin-master')

@section('topbar')
    <h1 class="h3 text-gray-800 font-weight-bold"><i class="fa-solid fa-pen mx-3"></i>Update Data Solusi</h1>
@endsection

@section('admincontent')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="post" action="{{ route('solusi.update', $solusi->id_solusi) }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-around" style="width: 100%;">
            <div style="width: 45%">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Id Solusi</label>
                    <input type="text" class="form-control" name="id_solusi" aria-describedby="emailHelp" placeholder="Id Solusi" value="{{ $solusi->id_solusi }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Solusi</label>
                    <input type="text" class="form-control" name="nama_solusi" placeholder="Nama Solusi" value="{{ $solusi->nama_solusi }}" required> 
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
