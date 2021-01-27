@extends('admin/admin',['title' => "Trash | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Trash</h3>
                <div class="card-tools">
                    <a href="{{ URL::to('/admin/trash/create')}}" class="btn btn-dark">
                        <i class="fa fa-plus"></i>
                        &nbsp; Add
                    </a>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Trash</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trash as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->trash }}</td>
                            <td>{{ $data->price }}</td>
                            <td><img src="{{ $trash['image'] }}" width="64" height="64" /></td>
                            <td>
                                <form method="POST" action="{{ URL::to('/admin/trash/'.$data->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <div class="btn-group">
                                        <a class="btn btn-primary btn-sm"
                                            href="{{ URL::to('/admin/trash/'.$data->id) }}">
                                            <i class="fas fa-eye">
                                            </i>
                                        </a>
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ URL::to('/admin/trash/'.$data->id.'/edit') }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
