@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-4 mt-1">
            <div class="d-flex flex-wrap justify-content-between align-items-center">
                <h4 class="font-weight-bold">Beranda</h4>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-2 text-secondary">Total Profit</p>
                                    <div class="d-flex flex-wrap justify-content-start align-items-center">
                                        <h5 class="mb-0 font-weight-bold">$95,595</h5>
                                        <p class="mb-0 ml-3 text-success font-weight-bold">+3.55%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-2 text-secondary">Total Expenses</p>
                                    <div class="d-flex flex-wrap justify-content-start align-items-center">
                                        <h5 class="mb-0 font-weight-bold">$12,789</h5>
                                        <p class="mb-0 ml-3 text-success font-weight-bold">+2.67%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="">
                                    <p class="mb-2 text-secondary">New Users</p>
                                    <div class="d-flex flex-wrap justify-content-start align-items-center">
                                        <h5 class="mb-0 font-weight-bold">13,984</h5>
                                        <p class="mb-0 ml-3 text-danger font-weight-bold">-9.98%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body" style="position: relative;">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <h4 class="font-weight-bold">Sales Report</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div><svg width="24" height="24" viewBox="0 0 24 24" fill="primary"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="3" width="18" height="18" rx="2"
                                                fill="#3378FF"></rect>
                                        </svg>
                                        <span>Incomes</span>
                                    </div>
                                    <div class="ml-3"><svg width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="3" y="3" width="18" height="18" rx="2"
                                                fill="#19b3b3"></rect>
                                        </svg>
                                        <span>Expenses</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div
    </div>
@endsection
