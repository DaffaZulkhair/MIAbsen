@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Data Kelas</h4>
                    </div>
                    <div class="header-action">
                        <i data-toggle="collapse" data-target="#datatable-1" aria-expanded="false">

                        </i>
                        <div class="float-right ">
                            <a class="btn btn-sm bg-primary" href="{{ route('student.create') }}"><span
                                    class="pl-1">Tambah
                                    Data</span>
                            </a>
                        </div>
                    </div>

                    {{-- Ikak Tambah Data --}}

                </div>
                <div class="card-body">
                    <div class="collapse" id="datatable-1">
                        <div class="card">
                            <kbd class="bg-dark">
                                <pre id="bootstrap-datatables" class="text-white"><code>

                                                    </div>
                                                </div>
                                                {{-- <p>
                                                Images in Bootstrap are made responsive with
                                                <code>.img-fluid</code>. <code>max-width: 100%;</code> and
                                                <code>height: auto;</code> are applied to the image so that
                                                it scales with the parent element.
                                            </p> --}}
                                                <div class="table-responsive">
                                                    <table id="datatable-1" class="table data-table table-striped table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Name</th>
                                                                <th>Position</th>
                                                                <th>Office</th>
                                                                <th>Age</th>
                                                                <th>Start date</th>
                                                                <th class="text-right">Salary</th>
                                                            </tr>
                                                        </thead>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>


                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
@endsection
