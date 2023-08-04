@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4 mt-1">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="font-weight-bold">Mata Kuliah</h4>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Kelola Mata Kuliah</h4>
                            </div>
                            @role('Admin')
                                <a class="btn btn-sm btn-outline-info" href="{{ route('course.create') }}"><i
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
                                            <th>Program Studi</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>SKS</th>
                                            <th>Total Jam</th>
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
                    url: "{{ route('course.datatable') }}",

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
                        name: 'study_program',
                        data: 'study_program'
                    },
                    {
                        name: 'code',
                        data: 'code'
                    },
                    {
                        name: 'name',
                        data: 'name'
                    },
                    {
                        name: 'sks',
                        data: 'sks'
                    },
                    {
                        name: 'total_hour',
                        data: 'total_hour'
                    },
                ],
            });
        }
    </script>
@endsection
