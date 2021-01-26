@extends('admin/admin',['title' => "Request | Sampah Bank"])
@section('content')
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Nominal</th>
                    <th>Account</th>
                    <th>Created_at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($request as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->user->email }}</td>
                    <td>{{ $data->credit }}</td>
                    <td>{{ $data->account }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>
                        <form action="{{ URL::to('/admin/withdrawal/'.$data->id) }}" method="POST">
                            <a class="btn btn-primary btn-sm"
                            href="{{ URL::to('/admin/withdrawal/'.$data->id.'/confirm') }}">
                            <i class="fas fa-check"></i>
                                Confirm
                            </a>
                            <a class="btn btn-danger btn-sm"
                                href="{{ URL::to('/admin/withdrawal/'.$data->id.'/reject') }}">
                                <i class="fas fa-ban"></i>
                                Reject
                            </a>
                            {{ csrf_field() }}
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
