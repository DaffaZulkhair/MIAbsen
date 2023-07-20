@extends('layouts.app')

@section('css_after')
    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah Data Dosen</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                    <form action="{{ route('lecturer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5>Akun Dosen</h5>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap </label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="{{ old('name') }}" placeholder="Masukkan Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username </label>
                                    <input type="text" name="username" class="form-control" id="username"
                                        value="{{ old('username') }}" placeholder="Masukkan Username" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email </label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        value="{{ old('email') }}" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password </label>
                                    <input type="password" name="password" class="form-control" id="password"
                                        value="{{ old('password') }}" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirm-password">Konfirmasi Password </label>
                                    <input type="password" name="confirm-password" class="form-control"
                                        id="confirm-password" value="{{ old('confirm-password') }}"
                                        placeholder="Konfirmasi Password..." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="file">Masukkan Foto</label>
                                    <div class="custom-file">
                                        <input type="file" name="photo" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Pilih File</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Data Dosen</h5>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nip">NIP : </label>
                                    <input type="number" class="form-control" id="nip" name="nip"
                                        value="{{ old('nip') }}" required>
                                    @error('nip')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap : </label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin : </label>
                                    <select class="form-control" name="gender" id="gender" required>
                                        <option value="" selected>Jenis Kelamin</option>
                                        @foreach (App\Models\Lecturer::GENDER_CHOICE as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <a href="{{ route('lecturer.index') }}" class="btn bg-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
@endsection
