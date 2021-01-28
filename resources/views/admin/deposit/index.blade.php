@extends('admin/admin',['title' => "Deposit | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="card card-success collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Kertas</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Weight <span class="float-right badge bg-primary">{{ $kertasWeight }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Revenue <span class="float-right badge bg-primary">{{ $kertasRevenue }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            User <span class="float-right badge bg-primary">{{ $kertasUser }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Total <span class="float-right badge bg-primary">{{ $kertasTotal }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-3">
        <div class="card card-warning collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Plastik</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Weight <span class="float-right badge bg-primary">{{ $plastikWeight }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Revenue <span class="float-right badge bg-primary">{{ $plastikRevenue }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            User <span class="float-right badge bg-primary">{{ $plastikUser }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Total <span class="float-right badge bg-primary">{{ $plastikTotal }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-3">
        <div class="card card-danger collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Kaca</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Weight <span class="float-right badge bg-primary">{{ $kacaWeight }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Revenue <span class="float-right badge bg-primary">{{ $kacaRevenue }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            User <span class="float-right badge bg-primary">{{ $kacaUser }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Total <span class="float-right badge bg-primary">{{ $kacaTotal }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <div class="card card-primary collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Minyak</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Weight <span class="float-right badge bg-primary">{{ $minyakWeight }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Revenue <span class="float-right badge bg-primary">{{ $minyakRevenue }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            User <span class="float-right badge bg-primary">{{ $minyakUser }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Total <span class="float-right badge bg-primary">{{ $minyakTotal }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-3">
        <div class="card card-secondary collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Logam</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Weight <span class="float-right badge bg-primary">{{ $logamWeight }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Revenue <span class="float-right badge bg-primary">{{ $logamRevenue }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            User <span class="float-right badge bg-primary">{{ $logamUser }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Total <span class="float-right badge bg-primary">{{ $logamTotal }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-md-3">
        <div class="card card-dark collapsed-card">
            <div class="card-header">
                <h3 class="card-title">Elektronik</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Weight <span class="float-right badge bg-primary">{{ $elektronikWeight }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Revenue <span class="float-right badge bg-primary">{{ $elektronikRevenue }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            User <span class="float-right badge bg-primary">{{ $elektronikUser }}</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            Total <span class="float-right badge bg-primary">{{ $elektronikTotal }}</span>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-dollar-sign"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Revenue</span>
                <span class="info-box-number">Rp. {{ number_format($revenue, 0, ',', '.') }}</span>

                <div class="progress">
                </div>
                <div class="progress-bar" style="width: 70%"></div>
                <span class="progress-description">
                    70% Increase in 30 Days
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>*
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-weight"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Weight</span>
                <span class="info-box-number">{{ $weight  }}</span>

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
                <span class="info-box-text">User</span>
                <span class="info-box-number">{{ $user }}</span>

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
                <span class="info-box-number">{{ $total }}</span>

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
        <h3 class="card-title">Deposit</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Trash</th>
                    <th>Weight</th>
                    <th>Revenue</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($deposit as $data)
                <tr>
                    <td>{{ $data->user->id}}</td>
                    <td>{{ $data->user->name}}</td>
                    <td>{{ $data->user->email}}</td>
                    <td>{{ $data->trash->trash}}</td>
                    <td>{{ $data->weight}}</td>
                    <td>{{ number_format ($data->revenue, 0, ',', '.')}}</td>
                    <td>{{ $data->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
