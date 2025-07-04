@extends('layouts.main')

@section('container')
    <style>
        body {
            background-image:url(/img/background.jpg);
            background-size: cover;
            backdrop-filter: brightness(20%)
        }
    </style>
    <div class="container" style="display: flex; justify-content: center;">
        <div class=""
            style="
        background-color: white;
        box-shadow: 5px 5px 20px #0008;
        width: 400px;
        min-height: 50vh;
        padding: 20px;
        border-radius: 30px;
        margin:200px 0;
    ">
            <h2>Hasil Diagnosa</h2>
            <hr />
            @if ($penyakit)
                <p>Nama Penyakit: {{ $penyakit->nama_penyakit }}</p>
                @if ($solusi)
                    <p>Solusi: {{ $solusi->nama_solusi }}</p>
                @else
                    <p>Solusi belum tersedia untuk penyakit ini.</p>
                @endif
            @else
                <p>Tidak ada diagnosa yang cocok.</p>
            @endif
            <div style="display: flex; justify-content: center; margin-top:100px;">
                <a href="/konsultasi" class="btn btn-primary">Konsultasi Kembali</a>
            </div>
        </div>
    </div>
@endsection