@extends('admin.admin')
@section('content')
<div class="row">
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
</div>
@endsection