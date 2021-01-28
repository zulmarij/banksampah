@extends('admin/admin',['title' => "Withdraw | Sampah Bank"])
@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['action'=>'Admin\WithdrawalController@withdraw']) }}
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Withdraw</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('nominal', 'Nominal') }}
                    {{ Form::text('nominal', '', ['class'=>'form-control', 'placeholder'=>'Nominal']) }}
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ URL::to('admin/withdrawal') }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Withdraw', ['class' => 'btn btn-primary float-right']) }}
            </div>
        </div>
        <!-- /.card -->
        {{ Form::close() }}
    </div>
</div>
@endsection
