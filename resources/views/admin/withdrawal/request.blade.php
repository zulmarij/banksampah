@extends('admin/admin',['title' => "Request | Sampah Bank"])
@section('content')
{{-- <div class="card">
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
<td class="project-actions text-right">
    <a class="btn btn-primary btn-sm" href="#">
        <i class="fas fa-folder">
        </i>
        View
    </a>
    <a class="btn btn-info btn-sm" href="#">
        <i class="fas fa-pencil-alt">
        </i>
        Edit
    </a>
    <a class="btn btn-danger btn-sm" href="#">
        <i class="fas fa-trash">
        </i>
        Delete
    </a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<!-- /.card-body -->
</div> --}}
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
                    <th style="width: 1%">
                        #
                    </th>
                    <th style="width: 20%">
                        Project Name
                    </th>
                    <th style="width: 30%">
                        Team Members
                    </th>
                    <th>
                        Project Progress
                    </th>
                    <th style="width: 8%" class="text-center">
                        Status
                    </th>
                    <th style="width: 20%">
                    </th>
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
                    <td class="project-actions text-right">
                        <a class="btn btn-primary btn-sm" href="#">
                            <i class="fas fa-folder">
                            </i>
                            View
                        </a>
                        <a class="btn btn-info btn-sm" href="#">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Edit
                        </a>
                        <a class="btn btn-danger btn-sm" href="#">
                            <i class="fas fa-trash">
                            </i>
                            Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
