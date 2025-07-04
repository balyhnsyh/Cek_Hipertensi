@extends('layouts.main')

@section('container')
    <style>
        .question {
            color: #202a2d;
            font-size: 30px;
            font-weight: 700;
        }
    </style>

    <div class="container-fluid d-flex align-items-center justify-content-end px-5"
        style="background-image: url(img/background-diagnosis.jpg); min-height:50vh; width:100vw;background-size: cover; background-repeat: no-repeat; background-position:center;">
        <h1 class="me-5" style="font-size: 2rem; font-weight:700;">Konsultasi Keluhan</h1>
    </div>
    <div class="container mt-5 mb-5" style="min-height: 100vh;">
        <div class="section-header pb-0">
            <span>Data Diri</span>
            <h2>Data Diri</h2>
        </div>
        <div class="text-center mb-5" style="width:50%; margin:auto; text-align:center;">
            Perhatian!
            Bagi Pasien yang ingin melakukan konsultasi masalah keluhan yang dialami, terlebih dahulu melakukan pengisian
            data yang telah diminta, isi data sesuai prosedur dan keterangan yang ada.
        </div>
        <form action="{{ route('pasien.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div>
        </div>
          <div class="content-data p-5 rounded rounded-3"
              style="background-color: white; height:100%; width:fit-content; margin:auto; box-shadow:0 10px 20px #0007;">
              <style>
                  .content-data input {
                      width: 400px;
                  }
              </style>
              <div class="d-flex justify-content-center gap-5">
                  <div class="left">
                      <div class="mb-3">
                          <label class="form-label">Nama</label>
                          <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required value="{{ old('nama') }}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Tanggal Lahir</label>
                          <input type="date" class="form-control" name="tanggal_lahir" placeholder="Tempat Tanggal Lahir" required value="{{ old('tanggal_lahir') }}">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Jenis Kelamin</label>
                          <select name="jenis_kelamin" class="form-control" required value="{{ old('jenis_kelamin') }}">
                              <option value="">-- Pilih Jenis Kelamin --</option>
                              <option value="Laki-laki">Laki-laki</option>
                              <option value="Perempuan">Perempuan</option>
                          </select>
                      </div>
                  </div>
                  <div class="right">
                      <div class="mb-3">
                          <label class="form-label">Alamat</label>
                          <textarea class="form-control" name="alamat" placeholder="Alamat" required value="{{ old('alamat') }}" style="max-height: 125px;min-height: 125px"></textarea>
                      </div>
                      <div class="mb-3">
                          <label class="form-label">No.Telp</label>
                          <input type="text" class="form-control" name="nomor_telepon" placeholder="Nomor Telepon" required value="{{ old('nomor_telepon') }}">
                      </div>
                  </div>
              </div>
              <div class="d-flex justify-content-center mt-4">
                  <button class="btn btn-go" type="submit">
                      Kirim & Lanjut Konsultasi
                  </button>
                  <style>
                      .btn-go {
                          width: fit-content;
                          font-size: 18px;
                          font-weight: 500;
                          background-image: linear-gradient(43deg, #172d98 0%, #455edd 100%);
                          border: 0px;
                          color: white;
                          transition: all .3s;
                      }
  
                      .btn-go:hover {
                          background-image: linear-gradient(43deg, #273fb7 0%, #657efe 100%);
                          box-shadow: 3px 3px 20px #0005;
                          color: white;
                      }
  
                      .btn-go:active {
                          border: 0px;
                      }
                  </style>
              </div>
          </div>
        </form>
    </div>
@endsection
