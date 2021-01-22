@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::open(['route'=>'nasabah.store']) }}
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
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('name', 'Name') }}
                            {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Enter the Nasabah Name']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Enter the Nasabah Email']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('password', 'Password') }P
                            {{ Form::password('Password', ['class'=>'form-control', 'placeholder'=>'Enter the Nasabah Password']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Input', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection
