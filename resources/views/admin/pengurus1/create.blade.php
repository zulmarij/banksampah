@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::open(['action'=>'Admin\Pengurus1Controller@store']) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Added Pengurus1</h3>
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
                            {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Enter the Pengurus1 Name']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Enter the Pengurus1 Email']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }}
                            {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Enter the Pengurus1 Password']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Password') }}
                            {{ Form::password('Password_confrimation', ['class'=>'form-control', 'placeholder'=>'Enter the Pengurus1 Password Again']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/pengurus1') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Input', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection
