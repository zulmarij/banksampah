@extends('admin/admin',['title' => "Pickup | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-lg-6 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $user }}</h3>

                <p>Total User</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a> --}}
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $total }}</h3>

                <p>Total Pickup</p>
            </div>
            <div class="icon">
                <i class="fas fa-truck"></i>
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
                <h3 class="card-title">Pickup</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Url</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pickup as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->user->name }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->address }}</td>
                            <td><a href="{{ $data->url_address }}">{{ $data->url_address }}</a></td>
                            <td class="text-center py-0 align-middle"><img src="{{ $data->image }}" width="64" height="64" /></td>
                            <td class="text-center py-0 align-middle">
                                @if ($data->status == 1)
                                <span class="badge badge-success">Success</span>
                                @elseif ($data->status == 0)
                                <span class="badge badge-primary">Waiting</span>
                                @elseif ($data->status == 2)
                                <span class="badge badge-danger">Rejected</span>
                                @endif
                            </td>
                            <td>{{ $data->description}}</td>
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
