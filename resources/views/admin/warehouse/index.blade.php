@extends('admin/admin',['title' => 'Warehouse | Sampah Bank', 'breadcrumb' => 'Warehouse'])
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-weight"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Weight</span>
                <span class="info-box-number">{{ number_format($weight, 0, ',', '.') }} Kg</span>

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
            <span class="info-box-icon"><i class="fas fa-trash"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Trash</span>
                <span class="info-box-number">{{ $trash }}</span>

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
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-file-invoice-dollar"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Price</span>
                <span class="info-box-number">{{ $price }}</span>

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
                <span class="info-box-text">Total Warehouse</span>
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
        <h3 class="card-title">Warehouse</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Trash</th>
                    <th>Price/Kg</th>
                    <th>Weight</th>
                    <th>Total Price</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($warehouse as $data)
                <tr>
                    <td>{{ $data->id}}</td>
                    <td>{{ $data->trash->trash}}</td>
                    <td>Rp {{ number_format($data->trash->price, 0, ',', '.') }}</td>
                    <td>{{ number_format($data->weight, 0, ',', '.')}} Kg</td>
                    <td>Rp {{ number_format($data->trash->price * $data->weight, 0, ',', '.') }}</td>
                    <td>{{ $data->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
