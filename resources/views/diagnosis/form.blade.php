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
        style="background-image: url('{{ asset('img/background-diagnosis.jpg') }}'); min-height:50vh; widht:100vh;background-size: cover; background-repeat: no-repeat; background-position:center;">
        <h1 class="me-5" style="font-size: 2rem; font-weight:700;">Konsultasi Keluhan</h1>
    </div>
    <div class="container mt-5 d-flex justify-content-center" style="min-height: 100vh;">

        <form class="appoinment-form" method="post" action="{{ route('diagnose.store') }}">
            @csrf
            <div class="row">
                <input type="hidden" name="id_pasien" value="{{ $pasien_id }}">
                <div class="section-header">
                    <span>Centang atau Silang Gejala yang Dialami Pasien</span>
                    <h2>Centang atau Silang Gejala yang Dialami Pasien</h2>
                </div>
                <hr class="mb-5">
        
                {{-- Dropdown for G01-G04 --}}
                <div class="form-group mb-5">
                    <h1 class="mb-3 questions m-0 text-center" for="gejala_g01_g04">Pilih Tekanan Darah (Opsional)</h1>
                    <select class="form-control tekdar" id="gejala_g01_g04" name="gejala_id_g01_g04"
                        style="width: 500px; margin:auto;">
                        <option value="">-- Pilih Tekanan Darah Anda --</option>
                        <option value="G01">Tekanan darah > 130/80 mmHg</option>
                        <option value="G02">Tekanan darah > 140/90 mmHg</option>
                        <option value="G03">Tekanan darah > 160/100 mmHg</option>
                        <option value="G04">Tekanan darah > 180/110 mmHg</option>
                    </select>
                    <style>
                        .tekdar {
                            box-shadow: 5px 5px 20px #0007;
                        }
        
                        .questions {
                            color: #202a2d;
                            font-size: 26px;
                            font-weight: 500;
                        }
                    </style>
                </div>
        
                <hr>
        
                @foreach ($gejala as $item)
                    @if (strpos($item->id_gejala, 'G') !== false && intval(substr($item->id_gejala, 1)) >= 5)
                        <div class="qna mb-3">
                            <div class="d-flex radio-button align-items-center">
                                <div class="d-flex justify-content-center" style="gap: 150px">
                                    <div class="checkbox-wrapper">
                                        <input name="gejala_id[{{ $item->id_gejala }}]" id="gejala_{{ $item->id_gejala }}" type="checkbox"
                                        value="{{ $item->id_gejala }}">
                                        <label for="gejala_{{ $item->id_gejala }}">
                                            <div class="tick_mark"></div>
                                        </label>
                                    </div>
                                </div>
                                <h1 class="question m-0 ms-3 text-center">{{ $item->nama_gejala }}</h1>
                            </div>
                        </div>
                        <hr>
                    @endif
                @endforeach
        
                <div class="form-group" style="margin-top: 30px;">
                    <button class="btn btn-go" type="submit">
                        Lakukan Diagnosa
                    </button>
                    <style>
                        .btn-go {
                            width: fit-content;
                            font-size: 20px;
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



<style>
    .radio-button .checkbox-wrapper * {
        -webkit-tap-highlight-color: transparent;
        outline: none;
    }

    .radio-button .checkbox-wrapper input[type="checkbox"] {
        display: none;
    }

    .radio-button .checkbox-wrapper label {
        --size: 40px;
        --shadow: calc(var(--size) * .07) calc(var(--size) * .1);
        position: relative;
        display: block;
        width: var(--size);
        height: var(--size);
        margin: 0 auto;
        background-image: linear-gradient(43deg, #0c1d4d 0%, #3a90ce 100%);
        border-radius: 50%;
        box-shadow: 0 var(--shadow) #ffbeb8;
        cursor: pointer;
        transition: 0.2s ease transform, 0.2s ease background-color,
            0.2s ease box-shadow;
        overflow: hidden;
        z-index: 1;
    }

    .radio-button .checkbox-wrapper label:before {
        content: "";
        position: absolute;
        top: 50%;
        right: 0;
        left: 0;
        width: calc(var(--size) * .7);
        height: calc(var(--size) * .7);
        margin: 0 auto;
        background-color: #fff;
        transform: translateY(-50%);
        border-radius: 50%;
        box-shadow: inset 0 var(--shadow) #ffbeb8;
        transition: 0.2s ease width, 0.2s ease height;
    }

    .radio-button .checkbox-wrapper label:hover:before {
        width: calc(var(--size) * .55);
        height: calc(var(--size) * .55);
        box-shadow: inset 0 var(--shadow) #ff9d96;
    }

    .radio-button .checkbox-wrapper label:active {
        transform: scale(0.9);
    }

    .radio-button .checkbox-wrapper .tick_mark {
        position: absolute;
        top: -1px;
        right: 0;
        left: calc(var(--size) * -.05);
        width: calc(var(--size) * .6);
        height: calc(var(--size) * .6);
        margin: 0 auto;
        margin-left: calc(var(--size) * .14);
        transform: rotateZ(-40deg);
    }

    .radio-button .checkbox-wrapper .tick_mark:before,
    .radio-button .checkbox-wrapper .tick_mark:after {
        content: "";
        position: absolute;
        background-color: #fff;
        border-radius: 2px;
        opacity: 0;
        transition: 0.2s ease transform, 0.2s ease opacity;
    }

    .radio-button .checkbox-wrapper .tick_mark:before {
        left: 0;
        bottom: 0;
        width: calc(var(--size) * .1);
        height: calc(var(--size) * .3);
        box-shadow: -2px 0 5px rgba(0, 0, 0, 0.23);
        transform: translateY(calc(var(--size) * -.68));
    }

    .radio-button .checkbox-wrapper .tick_mark:after {
        left: 0;
        bottom: 0;
        width: 100%;
        height: calc(var(--size) * .1);
        box-shadow: 0 3px 5px rgba(0, 0, 0, 0.23);
        transform: translateX(calc(var(--size) * .78));
    }

    .radio-button input[type="checkbox"]:checked+label {
        background-color: #4158D0;
        background-image: linear-gradient(43deg, #0c1d4d 0%, #3a90ce 100%);
        box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    }

    .radio-button input[type="checkbox"]:checked+label:before {
        width: 0;
        height: 0;
    }

    .radio-button input[type="checkbox"]:checked+label .tick_mark:before,
    .radio-button input[type="checkbox"]:checked+label .tick_mark:after {
        transform: translate(0);
        opacity: 1;
    }
</style>
