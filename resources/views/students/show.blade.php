@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Lihat Mahasiswa</h4>
            </div>
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Mahasiswa</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>NIM</label>
                                    <input type="text" class="form-control" value="{{ $data['nim'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="{{ $data['name'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Kelas</label>
                                    <input type="text" class="form-control" value="{{ $data['class'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Jenis Kelamin</label>
                                    <input type="text" class="form-control" value="{{ $data['gender'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" class="form-control" value="{{ $data['birth_date'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" value="{{ $data['birth_place'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Program Studi</label>
                                    <input type="text" class="form-control" value="{{ $data['study_program'] }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Nomor Handphone</label>
                                    <input type="text" class="form-control" value="{{ $data['phone_number'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Nomor Handphone Orangtua</label>
                                    <input type="text" class="form-control" value="{{ $data['parent_phone_number'] }}"
                                        readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="{{ $data['address'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Agama</label>
                                    <input type="text" class="form-control" value="{{ $data['religion'] }}" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-2">
                                    <label>Tahun Masuk</label>
                                    <input type="text" class="form-control" value="{{ $data['entry_year'] }}" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('student.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
@endsection
