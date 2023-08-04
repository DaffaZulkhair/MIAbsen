@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-5 mt-2">
            <h3 class="text-center">Data Kehadiran Mahasiswa</h3>
        </div>
        <div class="col-md-12 mt-3 mb-3">
            <a href="{{ route('attendance.index') }}" class="btn btn-warning">Kembali</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h5>{{ $data->schedule->course_name }}</h5>
                    <h6 class="text-center">Kelas: {{ $data->schedule->class }}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table align="center">
                            <tr>
                                <th>Dosen Pengajar</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->schedule->lecturer_name }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->schedule->date }}</td>
                            </tr>
                            <tr>
                                <th>Jam Mulai</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->schedule->time_start }}</td>
                            </tr>
                            <tr>
                                <th>Jam Selesai</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->schedule->time_end }}</td>
                            </tr>
                            <tr>
                                <th>Nama Mahasiswa</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->student_name }}</td>
                            </tr>
                            <tr>
                                <th>Status Kehadiran</th>
                                <td>&ensp;:</td>
                                <td>&ensp;{{ $data->status }}</td>
                            </tr>

                            @if ($data->status == App\Models\Attendance::STATUS_SICK || $data->status == App\Models\Attendance::STATUS_PERMIT)
                                <tr>
                                    <th>Lampiran File</th>
                                    <td>&ensp;:</td>
                                    <td>&ensp; <a href="{{ asset('assets/files/' . $data->file) }}"
                                            class="btn btn-primary">Lihat
                                            Lampiran</a></td>
                                </tr>
                                <tr>
                                    <th>Alasan Izin/Sakit</th>
                                    <td>&ensp;:</td>
                                    <td>&ensp;{{ $data->reason }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">LOKASI PRESENSI</h4>
                </div>
                <div class="card-body">
                    @if (!empty($data->latitude))
                        <iframe
                            src="https://maps.google.com/maps?q=+{{ $data['latitude'] }}+,+{{ $data['longitude'] }}+&hl=en&z=14&amp;output=embed"
                            width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                    @else
                        <h5 class="text-center">Tidak Ada Lokasi</h5>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
