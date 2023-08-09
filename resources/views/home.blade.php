@extends('layouts.app')

@section('content')
    @hasanyrole('Admin|Pimpinan')
        <div class="row">
            <div class="col-md-12 mb-4 mt-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="font-weight-bold">Beranda</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">

                                <div class="text-center">
                                    <p class="mb-2 text-secondary">Mahasiswa</p>

                                    <h5 class="mb-0 font-weight-bold">{{ $totalStudent }}</h5>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">

                                <div class="text-center">
                                    <p class="mb-2 text-secondary">Dosen</p>

                                    <h5 class="mb-0 font-weight-bold">{{ $totalLecturer }}</h5>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">

                                <div class="text-center">
                                    <p class="mb-2 text-secondary">Kehadiran</p>

                                    <h5 class="mb-0 font-weight-bold">{{ $totalAttendance }}</h5>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="mb-2 text-secondary">Jadwal Kuliah</p>

                                    <h5 class="mb-0 font-weight-bold">{{ $totalSchedule }}</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endhasanyrole

    @role('Dosen')
        <div class="row">
            <div class="col-md-12 mb-4 mt-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="font-weight-bold">Beranda</h4>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">

                                <div class="text-center">
                                    <p class="mb-2 text-secondary">Mahasiswa</p>

                                    <h5 class="mb-0 font-weight-bold">{{ $totalStudent }}</h5>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">

                                <div class="text-center">
                                    <p class="mb-2 text-secondary">Kehadiran</p>

                                    <h5 class="mb-0 font-weight-bold">{{ $totalAttendance }}</h5>


                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <p class="mb-2 text-secondary">Jadwal Kuliah</p>

                                    <h5 class="mb-0 font-weight-bold">{{ $totalSchedule }}</h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole

    @role('Mahasiswa')
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data Mahasiswa</h4>
                </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <div class="card">
                        <div class="card-header text-center">
                            <img src="{{ asset('assets/files/' . Auth::user()->photo) }}" alt="Photo" class="img-thumbnail"
                                width="200">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>NIM</label>
                                        <input type="text" class="form-control" value="{{ $student['nim'] }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" value="{{ $student['name'] }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Kelas</label>
                                        <input type="text" class="form-control" value="{{ $student['class'] }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Jenis Kelamin</label>
                                        <input type="text" class="form-control" value="{{ $student['gender'] }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" class="form-control" value="{{ $student['birth_date'] }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" value="{{ $student['birth_place'] }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Program Studi</label>
                                        <input type="text" class="form-control" value="{{ $student['study_program'] }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Nomor Handphone</label>
                                        <input type="text" class="form-control" value="{{ $student['phone_number'] }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Nomor Handphone Orangtua</label>
                                        <input type="text" class="form-control"
                                            value="{{ $student['parent_phone_number'] }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control" value="{{ $student['address'] }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Agama</label>
                                        <input type="text" class="form-control" value="{{ $student['religion'] }}"
                                            readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Tahun Masuk</label>
                                        <input type="text" class="form-control" value="{{ $student['entry_year'] }}"
                                            readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endrole
@endsection
