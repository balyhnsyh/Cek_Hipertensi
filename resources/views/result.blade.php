@extends('layouts.main')

@section('container')
    <div class="container mt-5">
        <h2>Hasil Diagnosa</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Pasien</th>
                    <th>ID Penyakit</th>
                    <th>Nama Penyakit</th>
                    <th>ID Gejala</th>
                    <th>Nama Gejala</th>
                    <th>ID Solusi</th>
                    <th>Nama Solusi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($diagnosas as $diagnosis)
                    <tr>
                        <td>{{ $diagnosis->id_pasien }}</td>
                        <td>{{ $diagnosis->id_penyakit }}</td>
                        <td>{{ $diagnosis->nama_penyakit }}</td>
                        <td>{{ $diagnosis->id_gejala }}</td>
                        <td>{{ $diagnosis->nama_gejala }}</td>
                        <td>{{ $diagnosis->id_solusi }}</td>
                        <td>{{ $diagnosis->nama_solusi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
