@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-5">
            <h3 class="text-center">Jadwal Perkuliahan Manajemen Informatika</h3>
        </div>
        @forelse ($schedules as $item)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>{{ $item->course_name }}</h5>
                        <h6 class="text-center">Kelas: {{ $item->class }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <table align="center">
                                <tr>
                                    <th>Dosen Pengajar</th>
                                    <td>&ensp;:</td>
                                    <td>&ensp;{{ $item->lecturer_name }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>&ensp;:</td>
                                    <td>&ensp;{{ \Carbon\Carbon::parse($item->date)->translatedFormat('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Jam Mulai</th>
                                    <td>&ensp;:</td>
                                    <td>&ensp;{{ \Carbon\Carbon::parse($item->time_start)->format('H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Jam Selesai</th>
                                    <td>&ensp;:</td>
                                    <td>&ensp;{{ \Carbon\Carbon::parse($item->time_end)->format('H:i') }}</td>
                                </tr>
                            </table>
                            <div class="col-md-12 text-center mt-4">
                                @if ($item->time_start >= $time_today || $item->time_end <= $time_today)
                                    <a href="{{ route('attendance.present', Crypt::encrypt($item->id)) }}"
                                        class="btn btn-primary btn-sm">Presensi Kehadiran</a>
                                @else
                                    <span class="badge badge-success">Sudah Melakukan Presensi</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-12">
                <h4 class="text-center">Data Tidak Ada</h4>
            </div>
        @endforelse
    </div>
@endsection
