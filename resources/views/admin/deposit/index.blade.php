@extends('admin/admin',['title' => "Deposit | Sampah Bank"])
@section('content')
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
