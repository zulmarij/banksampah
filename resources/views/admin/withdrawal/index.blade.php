@extends('admin/admin',['title' => "Withdrawal | Sampah Bank"])
@section('content')
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
                    <th>Nominal</th>
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
                    <td>
                        <form method="POST" action="{{ URL::to('/admin/withdrawal/'.$data->id.'/confirm') }}">
                            {{ csrf_field() }}
                            <button class="btn btn-primary btn-sm" type="submit">
                                <i class="fas fa-check"></i>
                                Confirm
                            </button>
                        </form>
                        <form method="POST" action="{{ URL::to('/admin/withdrawal/'.$data->id.'/reject') }}">
                            {{ csrf_field() }}
                            <button class="btn btn-danger btn-sm" type="submit">
                                <i class="fas fa-ban"></i>
                                Reject
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
