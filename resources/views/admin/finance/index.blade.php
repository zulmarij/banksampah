@extends('admin/admin')
@section('content')

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
                <span class="info-box-number">Rp. {{ number_format($balance['balance'], 0, ',', '.') }}</span>

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
                <span class="info-box-text">Total Financial Reports</span>
                <span class="info-box-number">{{ $finance }}</span>

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

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Finance</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Balance</th>
                    <th>Information</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
            @foreach($finance as $data)
                
            @endforeach
                <tr>
                    <td>{{ $data->id}}</td>
                    <td>{{ number_format ($data->debit, 0, ',', '.')}}</td>
                    <td>{{ number_format ($data->credit, 0, ',', '.')}}</td>
                    <td>{{ number_format ($data->balance, 0, ',', '.')}}</td>
                    <td>{{ $data->Information}}</td>
                    <td>{{ $data->created_at}}</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
