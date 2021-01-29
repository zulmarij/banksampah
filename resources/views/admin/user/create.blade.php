@extends('admin/admin',['title' => 'Create User | Sampah Bank', 'breadcrumb' => 'Create User'])
@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['action'=>'Admin\UserController@store', 'files'=>true]) }}
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create User</h3>
            </div>
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Name']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Password') }}
                    {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', 'Password Confirmation') }}
                    {{ Form::password('Password_confrimation', ['class'=>'form-control', 'placeholder'=>'Password Confirmation']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('role', 'Role') }}
                    {{-- {{ Form::select('role[]', $role,[], array('class' => 'form-control','multiple')) }} --}}
                    {{ Form::select('role[]', $role, [], ['class'=>'form-control custom-select','placeholder'=>'Select Role']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('photo', 'Photo') }}
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::file('photo', ['class'=>'costum-file-input']) }}
                            {{ Form::label('photo', 'Choose Photo', ['class'=>'custom-file-label']) }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ URL::to('admin/user') }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Create', ['class' => 'btn btn-success float-right']) }}
            </div>
        </div>
        <!-- /.card -->
        {{ Form::close() }}
    </div>
</div>
@endsection
