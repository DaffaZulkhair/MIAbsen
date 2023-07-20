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
                        <h4 class="card-title">Tambah Data Mahasiswa</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <span class="text-danger">{{ $message }}</span>
                    @endif
                    <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h5>Akun Mahasiswa</h5>
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
                        <h5>Data Mahasiswa</h5>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nim">NIM : </label>
                                    <input type="number" class="form-control" id="nim" name="nim"
                                        value="{{ old('nim') }}" required>
                                    @error('nim')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="student_name">Nama Lengkap : </label>
                                    <input type="text" class="form-control" id="student_name" name="student_name"
                                        value="{{ old('student_name') }}" required>
                                    @error('student_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
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
                                    <label for="gender">Jenis Kelamin : </label>
                                    <select class="form-control" name="gender" id="gender" required>
                                        <option value="" selected>Jenis Kelamin</option>
                                        @foreach (App\Models\Student::GENDER_CHOICE as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_date">Tanggal Lahir : </label>
                                    <input type="date" class="form-control" id="birth_date" name="birth_date"
                                        value="{{ old('birth_date') }}" onclick="this.showPicker()" required>
                                    @error('birth_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="birth_place">Tempat Lahir : </label>
                                    <input type="text" class="form-control" id="birth_place" name="birth_place"
                                        value="{{ old('birth_place') }}" required>
                                    @error('birth_place')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="study_program">Program Studi : </label>
                                    <select class="form-control" name="study_program" id="study_program" required>
                                        <option style="font-color:darkgreen" selected>Pilih Program Studi</option>
                                        @foreach (App\Models\Student::STUDY_PROGRAM_CHOICE as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone_number">No. Handphone : </label>
                                    <input type="number" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ old('phone_number') }}" required>
                                    @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="parent_phone_number">No. Handphone Orang Tua : </label>
                                    <input type="number" class="form-control" id="parent_phone_number"
                                        name="parent_phone_number" value="{{ old('parent_phone_number') }}" required>
                                    @error('parent_phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">Alamat : </label>
                                    <textarea class="form-control" name="address" id="address" rows="2">{{ old('address') }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="religion">Agama : </label>
                                    <select class="form-control select2" name="religion" id="religion" required>
                                        <option selected>Pilih Agama</option>
                                        @foreach (App\Models\Student::AGAMA_CHOICE as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="entry_year">Tahun Masuk : </label>
                                    <input type="number" class="form-control" id="entry_year" name="entry_year"
                                        value="{{ old('entry_year') }}" required>
                                    @error('entry_year')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <br>
                        <a href="{{ route('student.index') }}" class="btn bg-danger">Kembali</a>
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
