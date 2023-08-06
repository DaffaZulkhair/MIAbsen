@extends('layouts.app')

@section('css_after')
    {{-- Select 2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4 mt-1">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="font-weight-bold">Presensi</h4>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                @role('Mahasiswa')
                                    <h4 class="card-title">Data Kehadiran</h4>
                                @endrole
                                @hasanyrole('Admin|Dosen|Pimpinan')
                                    <h4 class="card-title">Kelola Presensi</h4>
                                @endhasanyrole

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Nama</th>
                                            <th>Dosen</th>
                                            <th>Mata Kuliah</th>
                                            <th>Status</th>
                                            <th>Tanggal</th>
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
        });

        let data_table = "";

        function getDatatable() {
            data_table = $("#data-table").DataTable({
                ajax: {
                    url: "{{ route('attendance.datatable') }}"
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
                        name: 'student_name',
                        data: 'student_name'
                    },
                    {
                        name: 'schedule_lecturer_name',
                        data: 'schedule_lecturer_name'
                    },
                    {
                        name: 'schedule_course_name',
                        data: 'schedule_course_name'
                    },
                    {
                        name: 'status',
                        data: 'status'
                    },
                    {
                        name: 'created_at',
                        data: 'created_at'
                    },
                ],
            });
        }
    </script>
@endsection
