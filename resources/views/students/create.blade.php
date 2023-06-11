@extends('layouts.app')

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
                    <form>
                        <div class="form-group">
                            <label for="nim">NIM : </label>
                            <input type="number" class="form-control" id="nim" name="nim"
                                value="{{ old('nim') }}" required>
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nim">Nama Lengkap : </label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="{{ old('nim') }}" required>
                            @error('nim')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nim">Kelas : </label>
                            <input type="text" class="form-control" id="nim" name="nim"
                                value="{{ old('nim') }}" required>
                            @error('nim')
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
