@extends('admin/admin',['title' => "Withdraw | Sampah Bank"])
@section('content')
{{ Form::open(['action'=>'Admin\WithdrawalController@getWithdraw']) }}
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Withdraw</h3>
    </div>
    <div class="card-body">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            {{ Form::label('email', 'Email') }}
            {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) }}
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dollar-sign"></i></span>
            </div>
            {{ Form::label('nominal', 'Nominal') }}
            {{ Form::text('nominal', '', ['class'=>'form-control', 'placeholder'=>'Nominal']) }}
        </div>
        <!-- /.row -->
    </div>
    <div class="card-footer">
        <a href="{{ URL::to('admin/withdrawal') }}" class="btn btn-outline-info">Back</a>
        {{ Form::submit('Input', ['class' => 'btn btn-primary pull-right']) }}
    </div>
    <! -- /.card-body -->
</div>
{{ Form::close() }}
@endsection
