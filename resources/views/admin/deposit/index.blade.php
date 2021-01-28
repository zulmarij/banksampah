@extends('admin/admin',['title' => "Deposit | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-md-2">
        <!-- Widget: user widget style 2 -->
        <div class="card card-widget widget-user-2">
          <!-- Add the bg color to the header using any of the bg-* classes -->
          <div class="widget-user-header bg-warning">
            <div class="widget-user-image">
              <img class="img-circle elevation-2" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
            </div>
            <!-- /.widget-user-image -->
            <h3 class="widget-user-username">Nadia Carmichael</h3>
            <h5 class="widget-user-desc">Lead Developer</h5>
          </div>
          <div class="card-footer p-0">
            <ul class="nav flex-column">
              <li class="nav-item">
                  Weight <span class="float-right badge bg-primary">{{ $kertasWeight }}</span>
              </li>
              <li class="nav-item">
                  Revenue <span class="float-right badge bg-info">{{ $kertasRevenue }}</span>
              </li>
              <li class="nav-item">
                  User <span class="float-right badge bg-success">{{ $kertasUser }}</span>
              </li>
              <li class="nav-item">
                  Total <span class="float-right badge bg-danger">{{ $kertasTotal }}</span>
              </li>
            </ul>
          </div>
        </div>
        <!-- /.widget-user -->
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
            <tfoot>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Trash</th>
                    <th>Weight</th>
                    <th>Revenue</th>
                    <th>Created_at</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
