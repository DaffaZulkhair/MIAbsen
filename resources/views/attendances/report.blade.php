@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4 mt-1">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="font-weight-bold">Kehadiran</h4>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Data Kehadiran</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kelas</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Dosen Pengajar</th>
                                            <th>Mata Kuliah</th>
                                            <th>Total Jam</th>
                                            <th>Skor Kehadiran</th>
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
    <script>
        $(document).ready(function() {
            getDatatable();
        });

        let data_table = "";

        function getDatatable() {
            data_table = $("#data-table").DataTable({
                ajax: {
                    url: "{{ route('attendance.datatable_report') }}"
                },
                serverSide: true,
                processing: true,
                destroy: true,
                dom: 'Blfrtip',
                buttons: [{
                    extend: 'excel',
                }, ],
                columns: [{
                        "data": null,
                        "sortable": false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {
                        name: 'student_class',
                        data: 'student_class',
                    },
                    {
                        name: 'student_nim',
                        data: 'student_nim',
                        searchable: false,

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
                        name: 'total_hour',
                        data: 'total_hour'
                    },
                    {
                        name: 'score_hour',
                        data: 'score_hour'
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
