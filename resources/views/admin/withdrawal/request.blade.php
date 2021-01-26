@extends('admin/admin',['title' => "Request | Sampah Bank"])
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Projects</h3>

        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
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
                    <td>{{ $data->account }}</td>
                    <td>{{ $data->created_at }}</td>
                    <td>
                        <form method="POST" action="{{ URL::to('/admin/withdrawal/'.$data->id) }}">
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
