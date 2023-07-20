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
                        <h4 class="card-title">Edit Data Dosen</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                    <form action="{{ route('lecturer.update', Crypt::encrypt($data['id'])) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="nip">NIP : </label>
                            <input type="number" class="form-control" id="nip" name="nip"
                                value="{{ old('nip', $data['nip']) }}" required>
                            @error('nip')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap : </label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $data['nip']) }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Jenis Kelamin : </label>
                            <select class="form-control" name="gender" id="gender" required>
                                <option value="" selected>Jenis Kelamin</option>
                                @foreach (App\Models\Lecturer::GENDER_CHOICE as $key => $value)
                                    <option value="{{ $key }}" {{ $key == $data['gender'] ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <a href="{{ route('lecturer.index') }}" class="btn bg-danger">Kembali</a>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_after')
@endsection
