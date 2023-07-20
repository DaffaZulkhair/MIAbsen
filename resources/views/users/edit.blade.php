@extends('layouts.app')

@section('css_after')
    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Edit User</h4>
            </div>
        </div>

        {{-- Error Message --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="card-body">
            <form action="{{ route('user.update', Crypt::encrypt($user['id'])) }}" method="post">
                @csrf
                @method('put')
                <h5>Peran : </h5>
                @foreach ($user->getRoleNames() as $item)
                    <span class="badge bg-primary">{{ $item }}</span>
                @endforeach
                <br><br>
                <div class="form-group">
                    <label for="name">Nama Lengkap </label>
                    <input type="text" name="name" class="form-control" id="name"
                        value="{{ old('name', $user['name']) }}" placeholder="Masukkan Nama Lengkap" required>
                </div>
                <div class="form-group">
                    <label for="name">Username </label>
                    <input type="text" name="username" class="form-control" id="username"
                        value="{{ old('username', $user['username']) }}" placeholder="Masukkan Username" required>
                </div>
                <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" name="email" class="form-control" id="email"
                        value="{{ old('email', $user['email']) }}" placeholder="Email..." required>
                </div>
                <hr>
                <p>*Isi jika ingin mengganti password</p>
                <div class="form-group">
                    <label for="password">Password </label>
                    <input type="password" name="password" class="form-control" id="password" value="{{ old('password') }}"
                        placeholder="Password..." required>
                </div>
                <div class="form-group">
                    <label for="confirm-password">Konfirmasi Password </label>
                    <input type="password" name="confirm-password" class="form-control" id="confirm-password"
                        value="{{ old('confirm-password') }}" placeholder="Konfirmasi Password..." required>
                </div>
                <div class="form-group">
                    <label for="file">Masukkan Foto</label>
                    <div class="custom-file">
                        <input type="file" name="photo" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Pilih File</label>
                    </div>
                </div>
                <a href="{{ route('user.index') }}" class="btn btn-warning">Kembali</a>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
            </form>
        </div>
    </div>
@endsection

@section('js_after')
    {{-- Select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".select_role").select2();
        });
    </script>
@endsection
