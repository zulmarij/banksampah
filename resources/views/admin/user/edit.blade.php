@extends('admin/admin',['title' => "Edit User | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-12">
        <!-- Widget: user widget style 1 -->
        {{ Form::model($user,['action'=>['Admin\UserController@update',$user->id],'files'=>true,'method'=>'PUT']) }}
        <div class="card">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="card-header">
                <h3 class="card-title">Update User</h3>
            </div>
            <!-- /.row -->
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="d-flex justify-content-center">
                    <img class="img-circle elevation-2" src="{{$user->photo}}" alt="User" height="256" width="256">
                </div>
                <div class="form-group">
                    {{ Form::label('photo', 'Photo') }}
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::hidden('photoPath',$user->photo)}}
                            {{ Form::file('photo', ['class'=>'costum-file-input']) }}
                            {{ Form::label('photo', 'Choose Photo', ['class'=>'custom-file-label']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', $user->email, ['class'=>'form-control', 'placeholder'=>'Email']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('phone', 'Phone') }}
                    {{ Form::text('phone', $user->phone, ['class'=>'form-control', 'placeholder'=>'Phone']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', $user->address, ['class'=>'form-control', 'placeholder'=>'Address']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('role', 'Role') }}
                    {{-- {{ Form::select('role[]', $role,[], array('class' => 'form-control','multiple')) }} --}}
                    {{ Form::select('role[]', $role, $userrole, ['class'=>'form-control custom-select']) }}
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/user') }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Update', ['class' => 'btn btn-success float-right']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
