@extends('admin/admin',['title' => "Savings | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-wallet"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Balance</span>
                <span class="info-box-number">Rp {{ number_format($balance, 0, ',', '.') }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                {{-- <span class="progress-description">
                    70% Increase in 30 Days
                </span> --}}
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Debit</span>
                <span class="info-box-number">Rp {{ number_format($debit, 0, ',', '.') }}</span>

                <div class="progress">
                </div>
                    <div class="progress-bar" style="width: 70%"></div>
                {{-- <span class="progress-description">
                    70% Increase in 30 Days
                </span> --}}
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-hand-holding-usd"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Credit</span>
                <span class="info-box-number">Rp {{ number_format($credit, 0, ',', '.') }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                {{-- <span class="progress-description">
                    70% Increase in 30 Days
                </span> --}}
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Savings</span>
                <span class="info-box-number">{{ $total }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                {{-- <span class="progress-description">
                    70% Increase in 30 Days
                </span> --}}
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Savings</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Information</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($savings as $data)
                <tr>
                    <td>{{ $data->user->id}}</td>
                    <td>{{ $data->user->name}}</td>
                    <td>{{ $data->user->email}}</td>
                    <td>Rp {{ number_format($data->balance, 0, ',', '.')}}</td>
                    <td>Rp {{ number_format($data->debit, 0, ',', '.')}}</td>
                    <td>Rp {{ number_format($data->credit, 0, ',', '.')}}</td>
                    <td>{{ $data->information}}</td>
                    <td>{{ $data->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
