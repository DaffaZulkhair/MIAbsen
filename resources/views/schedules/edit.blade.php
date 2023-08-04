@extends('layouts.app')

@section('css_after')
    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    @php
        $isAdmin = Auth::user()->hasRole('Admin');
    @endphp
    <div class="row">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Jadwal Kuliah</h4>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('error'))
                        <span class="text-danger">{{ session('error') }}</span>
                    @endif
                    <form action="{{ route('schedule.update', Crypt::encrypt($data->id)) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <h5>Kelas : {{ $data->class }}</h5>
                            </div>
                            <br><br>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="course_id">Mata Kuliah : </label>
                                    <select class="form-control select2" name="course_id" id="course_id" required
                                        {{ $isAdmin ? '' : 'readonly' }}>
                                        @foreach ($courses as $item)
                                            <option value="{{ Crypt::encrypt($item->id) }}"
                                                {{ $item->id == $data->course_id ? 'selected' : '' }}>{{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lecturer_id">Dosen : </label>
                                    <select class="form-control select2" name="lecturer_id" id="lecturer_id" required
                                        {{ $isAdmin ? '' : 'readonly' }}>
                                        <option value="" selected>Pilih Dosen</option>
                                        @foreach ($lecturers as $item)
                                            <option value="{{ Crypt::encrypt($item->id) }}"
                                                {{ $item->id == $data->lecturer_id ? 'selected' : '' }}>
                                                {{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="date">Tanggal</label>
                                    <input type="date" class="form-control" name="date" id="date"
                                        value="{{ $data->date }}" {{ $isAdmin ? '' : 'readonly' }}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time_start">Jam Mulai</label>
                                    <input type="time" class="form-control" name="time_start" id="date"
                                        value="{{ $data->time_start }}" {{ $isAdmin ? '' : 'readonly' }}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="time_end">Jam Selesai</label>
                                    <input type="time" class="form-control" name="time_end" id="date"
                                        value="{{ $data->time_end }}" {{ $isAdmin ? '' : 'readonly' }}>
                                </div>
                            </div>
                            @if (!$isAdmin)
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="subject">Pokok Bahasan</label>
                                        <textarea name="subject" id="subject" rows="3" class="form-control">{{ old('subject', $data->subject) }}</textarea>
                                    </div>
                                </div>
                            @endif
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
