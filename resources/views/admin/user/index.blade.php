@extends('admin/admin',['title' => "User | Sampah Bank"])
@section('content')
{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nasabah</h3>
                <div class="card-tools">
                    <a href="{{ URL::to('/admin/user/create')}}" class="btn btn-dark">
<i class="fa fa-plus"></i>
&nbsp; Add
</a>
</div>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>name</th>
                        <th>phone</th>
                        <th>email</th>
                        <th>address</th>
                        <th>photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $user['id'] }}</td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['phone'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user['address'] }}</td>
                        <td class="text-center"><img src="{{ $user['photo'] }}" width="100" /></td>
                        <td class="text-center">
                            <form method="POST" action="{{ URL::to('/admin/user/'.$user['id']) }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE" />
                                <div class="btn-group">
                                    <a class="btn btn-info" href="{{ URL::to('/admin/user/'.$user['id']) }}"><i
                                            class="fa fa-eye"></i></a>
                                    <a class="btn btn-success"
                                        href="{{ URL::to('/admin/user/'.$user['id'].'/edit') }}"><i
                                            class="fa fa-edit"></i></a>
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-eraser"></i></button>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>
</div>
</div>
</div> --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Finance</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>name</th>
                            <th>phone</th>
                            <th>email</th>
                            <th>address</th>
                            <th>role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $data)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $data['name'] }}</td>
                            <td>{{ $data['phone'] }}</td>
                            <td>{{ $data['email'] }}</td>
                            <td>{{ $data['address'] }}</td>
                            <td>
                                {{-- @if(!empty($roles))
                                @foreach ($roles as $role)
                                <span class="badge badge-success">{{ $role }}</span>
                                @endforeach
                                @endif --}}
                            </td>
                            <td>
                                <form method="POST" action="{{ URL::to('/admin/user/'.$user->id) }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <a class="btn btn-primary btn-sm" href="{{ URL::to('/admin/user/'.$user->id) }}">
                                        <i class="fas fa-eye">
                                        </i>
                                        View
                                    </a>
                                    <a class="btn btn-info btn-sm"
                                        href="{{ URL::to('/admin/user/'.$user->id.'/edit') }}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </button>
                                </form>
                            </td>
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
