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
                    <form action="{{ route('student.store') }}" method="POST">
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
                            <label for="nim">Tanggal Lahir : </label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="{{ old('nim') }}" required>
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nim">Tempat Lahir : </label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="{{ old('nim') }}" required>
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nim">Program Studi : </label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option style="font-color:darkgreen" selected>Pilih Program Studi</option>
                                @foreach (App\Models\Student::STUDY_PROGRAM_CHOICE as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nim">No. Handphone : </label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="{{ old('nim') }}" required>
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nim">No. Handphone Orang Tua : </label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="{{ old('nim') }}" required>
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat : </label>
                            <textarea class="form-control" name="address" id="address" rows="2">{{ old('address') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="nim">Agama : </label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option selected>Pilih Program Studi</option>
                                @foreach (App\Models\Student::AGAMA_CHOICE as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nim">Tahun Masuk : </label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="{{ old('nim') }}" required>
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file">Masukkan Foto</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
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
