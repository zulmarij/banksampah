@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['action'=>'Admin\UserController@store']) }}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add User</h3>
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
                    {{ Form::select('role[]', $role, null, ['class'=>'form-control custom-select','placeholder'=>'Select Role']) }}
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

{{-- <div class="row">
    <div class="col-12">
        {{ Form::open(['action'=>'Admin\NasabahController@store']) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Added Nasabah</h3>
            </div>
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Enter the Nasabah Name']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Enter the Nasabah Email']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter the Nasabah Password']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Password') }}
                            {{ Form::password('Password_confrimation', ['class'=>'form-control', 'placeholder'=>'Enter the Nasabah Password Again']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('role', 'Role') }}
                            {{ Form::text('role', '', ['class'=>'form-control', 'placeholder'=>'Enter the Nasabah Role']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/nasabah') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Input', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div> --}}
@endsection
