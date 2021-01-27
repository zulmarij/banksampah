@extends('admin/admin',['title' => "Edit User | Sampah Bank"])
@section('content')
{{-- <div class="row">
    <div class="col-12">
        {{ Form::model($user,['action'=>['Admin\NasabahController@update',$user['id']],'files'=>true,'method'=>'PUT']) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Change Nasabah Data</h3>
            </div>
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <center> {{ Form::label('photo', 'Photo') }}</center>
                <div class="row justify-content-md-center">
                    <div class="col-md-auto" style="text-align:center">
                        <img src="{{ $user['photo'] }}" height="256" width="256" />
                        {{ Form::hidden('photoPath',$user['photo'])}}
                        {{ Form::file('photo', ['class'=>'form-control']) }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', $user['name'], ['class'=>'form-control', 'placeholder'=>'Enter The Nasabah Name']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', $user['email'], ['class'=>'form-control', 'placeholder'=>'Enter the Nasabah Email']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone') }}
                            {{ Form::text('phone', $user['phone'], ['class'=>'form-control', 'placeholder'=>'Enter The Nasabah Phone']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('address', 'Address') }}
                            {{ Form::text('address', $user['address'], ['class'=>'form-control', 'placeholder'=>'Enter The Nasabah Address']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {{ Form::label('role', 'Role') }}
                            {{ Form::text('role', $role)}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/nasabah') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Edit', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div> --}}
<div class="row">
    <div class="col-12">
        <!-- Widget: user widget style 1 -->
        {{ Form::model($user,['action'=>['Admin\UserController@update',$user->id],'files'=>true,'method'=>'PUT']) }}
        <div class="card">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="card-header">
                <h3 class="card-title">Update User</h3>
            </div>
            <div class="widget-user-image">
                <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg" alt="User Avatar">
                {{ Form::hidden('photoPath',$user->photo)}}
                {{ Form::file('photo', ['class'=>'form-control', 'src'=>$user->photo]) }}
            </div>
            {{-- <div class="card-footer">
            <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">3,200</h5>
                        <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header">13,000</h5>
                        <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header">35</h5>
                        <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div> --}}
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
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
                    {{ Form::select('role[]', $role, $userrole, ['class'=>'form-control custom-select','placeholder'=>'Select Role']) }}
                </div>
            </div>
        </div>
        {{ Form::close() }}
        <!-- /.widget-user -->
    </div>
</div>
@endsection
