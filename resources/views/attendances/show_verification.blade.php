@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-5 mt-2">
            <h3 class="text-center">Presensi Kehadiran Mahasiswa</h3>
        </div>
        <div class="col-md-12 mt-3 mb-3">
            <a href="{{ route('attendance.verification') }}" class="btn btn-warning">Kembali</a>
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
        <div class="col-md-6">
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h5>Data Presensi - {{ $data->status }}</h5>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                    <form action="{{ route('attendance.update_verification', Crypt::encrypt($data->id)) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-2">
                                    <label>Nama Mahasiswa</label>
                                    <input type="text" class="form-control" value="{{ $data->student_name }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="type">Status Kehadiran</label>
                                    <select name="type" id="type" class="form-control" required>
                                        @foreach (App\Models\Attendance::STATUS_ADMIN_CHOICE as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $key == $data->status ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if ($data->status == App\Models\Attendance::STATUS_NOT_CONFIRMED_PERMIT)
                                <h6 class="text-center"></h6>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Lampiran File</label>
                                        <a href="{{ asset('assets/files/' . $data->file) }}" class="btn btn-primary">Lihat
                                            Lampiran</a>
                                    </div>

                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Alasan Izin/Sakit</label>
                                        <textarea name="reason" id="reason" rows="2" class="form-control" disabled>{{ $data->reason }}</textarea>
                                    </div>

                                </div>
                            @endif

                            <div class="col-md-12 text-center mt-3">
                                <button onclick="return confirm('Simpan Data?')" type="submit"
                                    class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    <script>
        function initGeolocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    $("#latitude").val(position.coords.latitude);
                    $("#longitude").val(position.coords.longitude);
                });
            } else {
                alert("Lokasi tidak dapat diperoleh.");
            }
        }

        initGeolocation();
    </script>
@endsection
