@extends('admin/admin',['title' => "Warehouse | Sampah Bank"])
@section('content')
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
