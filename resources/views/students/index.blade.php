@extends('layouts.app')

@section('css_after')
    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4 mt-1">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="font-weight-bold">Mahasiswa</h4>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Kelola Mahasiswa</h4>
                            </div>
                            <a class="btn btn-sm btn-outline-info" href="{{ route('student.create') }}"><i
                                    class="fa fa-plus"></i> Tambah Data</a>
                        </div>
                        <div class="row m-2">
                            <div class="col-md-6">
                                <h6 class="mb-2">Filter Kelas</h6>
                                <select class="form-control select2" id="filter_class">
                                    <option value="">Semua Kelas</option>
                                    @foreach (App\Models\Student::CLASS_CHOICE as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <h6 class="mb-2">Filter Semester</h6>
                                <select class="form-control select2" id="filter_semester">
                                    <option value="">Semua Semester</option>
                                    @foreach (App\Models\Student::SEMESTER_CHOICE as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>NIM</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Program Studi</th>
                                            <th>Diinput pada</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
            getDatatable();
            filter();
            $(".select2").select2({
                width: '100%',
                theme: 'classic'
            });
        });

        let data_table = "";

        function getDatatable() {
            data_table = $("#data-table").DataTable({
                ajax: {
                    url: "{{ route('student.datatable') }}",
                    data: {
                        class: $("#filter_class").val(),
                        semester: $("#filter_semester").val(),
                    }
                },
                serverSide: true,
                processing: true,
                destroy: true,
                order: [
                    [6, 'desc']
                ],
                columns: [{
                        "data": null,
                        "sortable": false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        name: 'action',
                        data: 'action'
                    },
                    {
                        name: 'nim',
                        data: 'nim'
                    },
                    {
                        name: 'name',
                        data: 'name'
                    },
                    {
                        name: 'class',
                        data: 'class'
                    },
                    {
                        name: 'study_program',
                        data: 'study_program'
                    },
                    {
                        name: 'created_at',
                        data: 'created_at'
                    },
                ],
            });
        }

        function filter() {
            $("#filter_semester").change(() => {
                getDatatable();
            })

            $("#filter_class").change(() => {
                getDatatable();
            })
        }
    </script>
@endsection
