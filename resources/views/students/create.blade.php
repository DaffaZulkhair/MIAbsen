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
                        <div class="form-group">
                            <label for="user_id">Nama Akun</label>
                            <select class="form-control select_user" name="user_id" id="user_id" required>
                                <option value="" selected>Pilih Akun</option>
                                @foreach ($users as $item)
                                    <option value="{{ Crypt::encrypt($item->id) }}">{{ $item->name }}</option>
                                @endforeach
                                @error('user_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nim">NIM : </label>
                            <input type="number" class="form-control" id="nim" name="nim"
                                value="{{ old('nim') }}" required>
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap : </label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="class">Kelas : </label>
                            <input type="text" class="form-control" id="class" name="class"
                                value="{{ old('class') }}" required>
                            @error('class')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin : </label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="" selected>Jenis Kelamin</option>
                                @foreach (App\Models\Student::GENDER_CHOICE as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="birth_date">Tanggal Lahir : </label>
                            <input type="date" class="form-control" id="birth_date" name="birth_date"
                                value="{{ old('birth_date') }}" required>
                            @error('birth_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="birth_place">Tempat Lahir : </label>
                            <input type="text" class="form-control" id="birth_place" name="birth_place"
                                value="{{ old('birth_place') }}" required>
                            @error('birth_place')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="study_program">Program Studi : </label>
                            <select class="form-control" name="study_program" id="study_program" required>
                                <option style="font-color:darkgreen" selected>Pilih Program Studi</option>
                                @foreach (App\Models\Student::STUDY_PROGRAM_CHOICE as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">No. Handphone : </label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ old('phone_number') }}" required>
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="parent_phone_number">No. Handphone Orang Tua : </label>
                            <input type="text" class="form-control" id="parent_phone_number" name="parent_phone_number"
                                value="{{ old('parent_phone_number') }}" required>
                            @error('parent_phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat : </label>
                            <textarea class="form-control" name="address" id="address" rows="2">{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="religion">Agama : </label>
                            <select class="form-control" name="religion" id="religion" required>
                                <option selected>Pilih Program Studi</option>
                                @foreach (App\Models\Student::AGAMA_CHOICE as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="entry_year">Tahun Masuk : </label>
                            <input type="text" class="form-control" id="entry_year" name="entry_year"
                                value="{{ old('entry_year') }}" required>
                            @error('entry_year')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">Masukkan Foto</label>
                            <div class="custom-file">
                                <input type="file" name="photo" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Pilih File</label>
                            </div>
                        </div>
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
        $(document).ready(function() {
            $(".select_user").select2();
        });
    </script>
@endsection
