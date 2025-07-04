@extends('layouts.profile-master')

@section('topbar')
    <h1 class="h3 text-gray-800 font-weight-bold"><i class="fa-solid fa-user mx-3"></i>Profile</h1>
@endsection

@section('thecontent')
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

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        <div class="container d-flex flex-column justify-content-center p-5 mb-3"
            style="width: 40%; background-color: white; box-shadow:0px 10px 20px #0003; border-radius:35px;">

            <div class="d-flex justify-content-center mb-3">
                <img src="{{ asset('storage/' . Auth::user()->pfp) }}"
                    style="width: 200px; height:200px; border-radius: 15px ; border: 0.5px solid #919191;object-fit: cover;">
            </div>

            <input type="file" name="pfp">

            <div class="justify-content-around" style="width: 100%">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp"
                        placeholder="Nama Lengkap" value="{{ auth()->user()->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}"
                        placeholder="Masukkan Email" required>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>

    <script src="{{ asset('Logis/assets/filepond/filepond.js') }}"></script>
    <link href="{{ asset('Logis/assets/filepond/filepond.css') }}" rel="stylesheet" />

    <script>
        const inputElement = document.querySelector('input[name="pfp"]');
        const pond = FilePond.create(inputElement);

        FilePond.setOptions({
            server: {
                process: {
                    url: '{{ route('profile.upload', ['id' => auth()->user()->id]) }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            }
        });
    </script>
@endsection
