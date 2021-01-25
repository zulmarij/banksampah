@extends('admin/admin',['title' => "Sale | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Profit</span>
                <span class="info-box-number">Rp. {{ sum($data->revenue - ($data->trash->price * $data->weight) }}</span>

                <div class="progress">
                </div>
                    <div class="progress-bar" style="width: 70%"></div>
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
            <span class="info-box-icon"><i class="fas fa-weight"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Buy</span>
                <span class="info-box-number">{{ sum($data->price)  }}</span>

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
            <span class="info-box-icon"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Sale</span>
                <span class="info-box-number">{{ sum($data->trash->price) }}</span>

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
            <span class="info-box-icon"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Reports</span>
                <span class="info-box-number">{{ sum($data->weight) }}</span>

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
        <h3 class="card-title">Sale</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Trash</th>
                    <th>Weight</th>
                    <th>Sale</th>
                    <th>Buy</th>
                    <th>Profit</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale as $data)
                <tr>
                    <td>{{ $data->id}}</td>
                    <td>{{ $data->trash->trash}}</td>
                    <td>{{ $data->weight}}</td>
                    <td>{{ $data->price}}</td>
                    <td>{{ $data->trash->price}}</td>
                    <td> {{number_format ($data->revenue - ($data->trash->price * $data->weight), 0, ',', '.')}}</td>
                    <td>{{ $data->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Trash</th>
                    <th>Weight</th>
                    <th>Sale</th>
                    <th>Buy</th>
                    <th>Profit</th>
                    <th>Created_at</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
