@extends('admin/admin',['title' => "Withdrawal | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-check"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Success</span>
                <span class="info-box-number">{{ $success }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    {{ $successCredit }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-primary">
            <span class="info-box-icon"><i class="fas fa-sync-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Waiting</span>
                <span class="info-box-number">{{ $waiting }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    {{ $waitingCredit }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-12">
        <div class="info-box bg-danger">
            <span class="info-box-icon"><i class="fas fa-ban"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Rejected</span>
                <span class="info-box-number">{{ $rejected }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    {{ $rejectedCredit }}
                </span>
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
                <span class="info-box-text">Total Withdraw</span>
                <span class="info-box-number">{{ $total }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                </div>
                <span class="progress-description">
                    {{ $totalCredit }}
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
        <h3 class="card-title">Withdrawal</h3>
        <div class="card-tools">
            <a href="{{ URL::to('/admin/withdrawal/withdraw')}}" class="btn btn-dark">
                <i class="fa fa-plus"></i>
                &nbsp; Withdraw
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Credit</th>
                    <th>Account</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($withdrawal as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->user->email }}</td>
                    <td>{{ $data->credit }}</td>
                    <td>{{ $data->account }}</td>
                    <td>
                        @if ($data->status == 2)
                        <span class="badge badge-success">Success</span>
                        @elseif ($data->status == 1)
                        <span class="badge badge-primary">Waiting</span>
                        @elseif ($data->status == 0)
                        <span class="badge badge-danger">Rejected</span>
                        @endif
                    </td>
                    <td>{{ $data->created_at }}</td>
                    <td class="text-right py-0 align-middle">
                        <div class="btn-group">
                            <form method="POST" action="{{ URL::to('/admin/withdrawal/'.$data->id.'/confirm') }}">
                                {{ csrf_field() }}
                                <button class="btn btn-primary btn-sm" type="submit">
                                    <i class="fas fa-check"></i>
                                </button>
                            </form>
                            <form method="POST" action="{{ URL::to('/admin/withdrawal/'.$data->id.'/reject') }}">
                                {{ csrf_field() }}
                                <button class="btn btn-danger btn-sm" type="submit">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
