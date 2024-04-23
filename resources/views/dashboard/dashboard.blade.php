@extends('layouts.app')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3"><strong>Penjualan</strong> Dashboard</h1>

        <div class="row">
            <div class="col-xl-12">
                <div class="w-100">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total Penjualan Hari ini</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="truck"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">Rp. 2.382</h1>
                                    <div class="mb-0">
                                        {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span> --}}
                                        {{-- <span class="text-muted">Since last week</span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total Penjualan Bulan Ini</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="users"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">Rp. 14.212</h1>
                                    <div class="mb-0">
                                        {{-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span> --}}
                                        {{-- <span class="text-muted">Since last week</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total Piutang</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="dollar-sign"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">Rp. 21.300</h1>
                                    <div class="mb-0">
                                        {{-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span> --}}
                                        {{-- <span class="text-muted">Since last week</span> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col mt-0">
                                            <h5 class="card-title">Total Pengeluaran Bulan Ini</h5>
                                        </div>

                                        <div class="col-auto">
                                            <div class="stat text-primary">
                                                <i class="align-middle" data-feather="shopping-cart"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <h1 class="mt-1 mb-3">Rp. 64</h1>
                                    <div class="mb-0">
                                        {{-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span> --}}
                                        {{-- <span class="text-muted">Since last week</span> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card flex-fill">
                    <div class="card-header">

                        <h5 class="card-title mb-0">Monitoring Stock Barang</h5>
                    </div>
                    <table class="table table-hover my-0 table-responsive">
                        <thead>
                            <tr>
                                <th>Kode Barang Barcode</th>
                                <th class="d-none d-xl-table-cell">Nama Barang</th>
                                <th class="d-none d-xl-table-cell">Total Stock</th>
                                <th>Status</th>
                                {{-- <th class="d-none d-md-table-cell">Assignee</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SNK90098949040</td>
                                <td class="d-none d-xl-table-cell">Snack RIngan Sabena</td>
                                <td class="d-none d-xl-table-cell">4 Dus</td>
                                <td><span class="badge bg-warning">Stock Kurang</span></td>
                            </tr>
                            <tr>
                                <td>MNM004949940</td>
                                <td class="d-none d-xl-table-cell">Cocacola</td>
                                <td class="d-none d-xl-table-cell">0 karat</td>
                                <td><span class="badge bg-danger">Stock Habis</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection