@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Lihat Mahasiswa</h4>
            </div>
        </div>

        <div class="card-body">
            <div class="profile-card rounded">
                <img src="{{ asset('assets/images/' . $data['photo']) }}" alt="{{ $data['name'] }}"
                    class="avatar-100 rounded d-block mx-auto img-fluid mb-3">
            </div>
            <hr>
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
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('student.index') }}" class="btn btn-warning">Kembali</a>
        </div>
    </div>
@endsection
