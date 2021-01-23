@extends('admin/admin')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bendahara</h3>
                <div class="card-tools">
                    <a href="{{ URL::to('/admin/bendahara/create')}}" class="btn btn-dark">
                        <i class="fa fa-plus"></i>
                        &nbsp; Add
                    </a>
                </div>
            </div>
            <div class="card-body">
                {{-- @if (alert::has('message'))
                    {{ alert::get('message') }}
                @endif --}}
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
                                        <form method="POST" action="{{ URL::to('/admin/bendahara/'.$user['id']) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="DELETE" />
                                            <div class="btn-group">
                                                <a class="btn btn-info" href="{{ URL::to('/admin/bendahara/'.$user['id']) }}"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-success" href="{{ URL::to('/admin/bendahara/'.$user['id'].'/edit') }}"><i class="fa fa-edit"></i></a>
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
</div>

@endsection