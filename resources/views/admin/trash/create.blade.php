@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::open(['action'=>'Admin\TrashController@store', 'files'=>true]) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Added Trash</h3>
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
                            {{ Form::label('trash', 'Trash') }}
                            {{ Form::text('trash', '', ['class'=>'form-control', 'placeholder'=>'Enter the Trash Name']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('price', 'Price') }}
                            {{ Form::text('price', '', ['class'=>'form-control', 'placeholder'=>'Enter the Trash Price']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('image', 'image') }}
                            {{ Form::file('image', ['class'=>'form-control']) }}
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
