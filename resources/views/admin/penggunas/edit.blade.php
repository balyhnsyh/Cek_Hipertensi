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

    <form method="post" action="{{ route('pengguna.update', $pengguna->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="container d-flex flex-column justify-content-center p-5 mb-3" style="width: 40%; background-color: white; box-shadow:0px 10px 20px #0003; border-radius:35px;">

            <div class="d-flex justify-content-center mb-3">
                <img src="/storage/{{ $pengguna->pfp }}" style="width: 200px; border-radius: 15px;border: 0.5px solid #919191;object-fit: cover;">
            </div>

                <input type="file" name="pfp">
            <div class="justify-content-around" style="width: 100%">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Nama Lengkap" value="{{ $pengguna->name }}" placeholder="Masukkan Nama" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="{{ $pengguna->email }}" placeholder="Masukkan Email" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Role</label>
                    <select name="role" class="form-control" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" {{ $pengguna->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="pakar" {{ $pengguna->role == 'pakar' ? 'selected' : '' }}>Pakar</option>
                        <option value="user" {{ $pengguna->role == 'user' ? 'selected' : '' }}>User</option>
                    </select>
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
                url: '{{ route('admin.profile.upload', $pengguna->id) }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            }
        });
    </script>
@endsection
