@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-5 mt-2">
            <h3 class="text-center">Presensi Kehadiran Mahasiswa</h3>
        </div>
        <div class="col-md-12 mt-3 mb-3">
            <a href="{{ route('attendance.create') }}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>{{ $data->course_name }}</h5>
                    <h6 class="text-center">Kelas: {{ $data->class }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table align="center">
                            <tr>
                                <th>Dosen Pengajar</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->lecturer_name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->date }}</td>
                            </tr>
                            <tr>
                                <th>Jam Mulai</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->time_start }}</td>
                            </tr>
                            <tr>
                                <th>Jam Selesai</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->time_end }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Data Presensi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('attendance.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="type">Status Kehadiran</label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="" selected>Status Kehadiran</option>
                                        @foreach (App\Models\Attendance::STATUS_CHOICE as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <h6 class="text-muted">*Isi jika kehadiran izin/sakit</h6>
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Lampiran File</label>
                                    <input type="file" name="file" class="form-control">
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Alasan Izin/Sakit</label>
                                    <textarea name="reason" id="reason" rows="2" class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="col-md-12 text-center mt-3">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
