@extends('layouts.app')

@section('css_after')
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
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Kelola Mahasiswa</h4>
                            </div>
                            <a class="text-end btn btn-sm btn-outline-info" href="{{ route('student.create') }}"><i
                                    class="fa fa-plus"></i> Tambah Data</a>
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
    <script>
        $(document).ready(function() {
            getDatatable();
        });

        let data_table = "";

        function getDatatable() {
            data_table = $("#data-table").DataTable({
                ajax: "{{ route('student.datatable') }}",
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
    </script>
@endsection
