@extends('admin/admin')
@section('content')
<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-3">
        <div aria-label="breadcrumb">
            <ol class="breadcrumb">
                <i class="fas fa-home breadcrumb-item mt-0_5"></i>
                <li class="breadcrumb-item"> <a class="text-decoration-none" href="route('home')}}"> Home </a> </li>
                <li class="breadcrumb-item active" aria-current="page"> Keuangan </li>
            </ol>
        </div>

        <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="window.print()"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">KEUANGAN PERUSAHAAN </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Keterangan</th>
                            <th>debit</th>
                            <th>Kredit</th>
                            <th>Saldo</th>
                            <th>Dibuat</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Keterangan</th>
                            <th>debit</th>
                            <th>Kredit</th>
                            <th>Saldo</th>
                            <th>Dibuat</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {{-- @foreach ($keuangan as $value) --}}
                        <tr>
                            <td>$value->id}}</td>
                            <td>$value->keterangan}}</td>
                            <td>number_format ($value->debit, 0, ',', '.')}}</td>
                            <td>number_format ($value->kredit, 0, ',', '.')}}</td>
                            <td>number_format ($value->saldo, 0, ',', '.')}}</td>
                            <td>$value->created_at}}</td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="far fa-bookmark"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Income</span>
                <span class="info-box-number">Rp. {{ number_format($debit, 0, ',', '.') }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="far fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Spending</span>
                <span class="info-box-number">Rp. {{ number_format($credit, 0, ',', '.') }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Balance</span>
                <span class="info-box-number">Rp. {{ $balance }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-comments"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Comments</span>
                <span class="info-box-number">41,410</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
@endsection
