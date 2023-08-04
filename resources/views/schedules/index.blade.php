@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4 mt-1">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="font-weight-bold">Jadwal Kuliah</h4>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Kelola Jadwal Kuliah</h4>
                            </div>
                            @role('Admin')
                                <a class="btn btn-sm btn-outline-info" href="{{ route('schedule.create') }}"><i
                                        class="fa fa-plus"></i> Tambah Data</a>
                            @endrole
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="data-table" class="table table-striped table-bordered" width="100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Aksi</th>
                                            <th>Kelas</th>
                                            <th>Dosen</th>
                                            <th>Mata Kuliah</th>
                                            <th>Pokok Bahasan</th>
                                            <th>Tanggal</th>
                                            <th>Jam Mulai</th>
                                            <th>Jam Selesai</th>
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
                    url: "{{ route('schedule.datatable') }}"
                },
                serverSide: true,
                processing: true,
                destroy: true,
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
                        name: 'class',
                        data: 'class'
                    },

                    {
                        name: 'lecturer_name',
                        data: 'lecturer_name'
                    },
                    {
                        name: 'course_name',
                        data: 'course_name'
                    },
                    {
                        name: 'subject',
                        data: 'subject'
                    },
                    {
                        name: 'date',
                        data: 'date'
                    },
                    {
                        name: 'time_start',
                        data: 'time_start'
                    },
                    {
                        name: 'time_end',
                        data: 'time_end'
                    },

                ],
            });
        }
    </script>
@endsection
