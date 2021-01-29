@extends('admin/admin',['title' => 'User | Sampah Bank', 'judul' => 'User', 'breadcrumb' => 'User'])
@section('content')
<div class="row">
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-danger"><i class="far fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Admin</span>
                <span class="info-box-number">{{ $admin }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="far fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Bendahara</span>
                <span class="info-box-number">{{ $bendahara }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-primary"><i class="far fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pengurus2</span>
                <span class="info-box-number">{{ $pengurus2 }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-secondary"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pengurus1</span>
                <span class="info-box-number">{{ $pengurus1 }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-success"><i class="far fa-user"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Nasabah</span>
                <span class="info-box-number">{{ $nasabah }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-2 col-sm-6 col-12">
        <div class="info-box">
            <span class="info-box-icon bg-dark"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Users</span>
                <span class="info-box-number">{{ $total }}</span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">User</h3>
                <div class="card-tools">
                    <a href="{{ URL::to('/admin/user/create')}}" class="btn btn-dark">
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
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Role</th>
                            @hasrole('admin')
                            <th>Action</th>
                            @endhasrole
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $key => $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->phone }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->address }}</td>
                            <td class="text-center py-0 align-middle">
                                @if(!empty($data->getRoleNames()))
                                @foreach($data->getRoleNames() as $role)
                                @if ($role == 'admin')
                                <span class="badge badge-danger">{{ $role }}</span>
                                @elseif ($role == 'bendahara')
                                <span class="badge badge-warning">{{ $role }}</span>
                                @elseif ($role == 'pengurus2')
                                <span class="badge badge-primary">{{ $role }}</span>
                                @elseif ($role == 'pengurus1')
                                <span class="badge badge-secondary">{{ $role }}</span>
                                @elseif ($role == 'nasabah')
                                <span class="badge badge-success">{{ $role }}</span>
                                @endif
                                @endforeach
                                @endif
                            </td>
                            @hasrole('admin')
                            <td class="text-center py-0 align-middle">
                                <form method="POST" action="{{ URL::to('/admin/user/'.$data->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <div class="btn-group">
                                        {{-- <a class="btn btn-primary btn-sm"
                                            href="{{ URL::to('/admin/user/'.$data->id) }}">
                                            <i class="fas fa-eye">
                                            </i>
                                        </a> --}}
                                        <a class="btn btn-warning btn-sm"
                                            href="{{ URL::to('/admin/user/'.$data->id.'/edit') }}">
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
                            @endhasrole
                        </tr>
                        @endforeach
                    </tbody>
                    {{-- <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Debit</th>
                            <th>Credit</th>
                            <th>Balance</th>
                            <th>Information</th>
                            <th>Created_at</th>
                        </tr>
                    </tfoot> --}}
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection
