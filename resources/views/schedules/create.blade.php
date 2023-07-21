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
                        <h4 class="card-title">Tambah Jadwal Kuliah</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                    <form action="{{ route('schedule.store') }}" method="POST">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="class">Kelas : </label>
                                    <select name="class" id="class" class="form-control select2" required>
                                        <option value="">Pilih Kelas</option>
                                        @foreach (App\Models\Student::CLASS_CHOICE as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('class')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="semester">Semester : </label>
                                    <select name="semester" id="semester" class="form-control select2" required>
                                        <option value="">Pilih Semester</option>
                                        @foreach (App\Models\Student::SEMESTER_CHOICE as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('semester')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="course_id">Mata Kuliah : </label>
                                    <select class="form-control select2" name="course_id" id="course_id" required>
                                        <option value="" selected>Pilih Mata Kuliah</option>
                                        @foreach ($courses as $item)
                                            <option value="{{ Crypt::encrypt($item->id) }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lecturer_id">Dosen : </label>
                                    <select class="form-control select2" name="lecturer_id" id="lecturer_id" required>
                                        <option value="" selected>Pilih Dosen</option>
                                        @foreach ($lecturers as $item)
                                            <option value="{{ Crypt::encrypt($item->id) }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <input type="date" class="form-control" name="date" id="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time_start">Jam Mulai</label>
                                    <input type="time" class="form-control" name="time_start" id="date">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time_end">Jam Selesai</label>
                                    <input type="time" class="form-control" name="time_end" id="date">
                                </div>
                            </div>
                        </div>
                        <br>
                        <a href="{{ route('schedule.index') }}" class="btn bg-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
    {{-- Select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(".select2").select2({
            width: '100%',
            theme: 'classic'
        });
    </script>
@endsection
