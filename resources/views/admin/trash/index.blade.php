@extends('admin/admin',['title' => "Trash | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-lg-12 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $total }}</h3>

                <p>Total Trash</p>
            </div>
            <div class="icon">
                <i class="fas fa-trash-alt"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a> --}}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Trash</h3>
                @hasrole('admin')
                <div class="card-tools">
                    <a href="{{ URL::to('/admin/trash/create')}}" class="btn btn-dark">
                        <i class="fa fa-plus"></i>
                        &nbsp; Add
                    </a>
                </div>
                @endhasrole
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
                            @hasrole('admin')
                            <th>Action</th>
                            @endhasrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trash as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->trash }}</td>
                            <td>Rp {{ number_format($data->price, 0, ',', '.') }}</td>
                            <td class="text-center py-0 align-middle"><img src="{{ $data->image }}" width="64"
                                    height="64" /></td>
                            @hasrole('admin')
                            <td class="text-center py-0 align-middle">
                                <form method="POST" action="{{ URL::to('/admin/trash/'.$data->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <div class="btn-group btn-group-sm">
                                        {{-- <a class="btn btn-primary" href="{{ URL::to('/admin/trash/'.$data->id) }}">
                                        <i class="fas fa-eye">
                                        </i>
                                        </a> --}}
                                        <a class="btn btn-warning"
                                            href="{{ URL::to('/admin/trash/'.$data->id.'/edit') }}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash">
                                            </i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            @endhasrole
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
