@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::model($trash,['route'=>['trash/update',$trash['id']], 'files'=>true,'method'=>'PUT']) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Change Trash Data</h3>
            </div>
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <img src="{{ $trash['image'] }}" width="100%" height="200">
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('trash', 'Trash') }}
                            {{ Form::text('trash', $trash['trash'], ['class'=>'form-control', 'placeholder'=>'Enter The Trash Name']) }}
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('price', 'Price') }}
                            {{ Form::text('price', $trash['price'], ['class'=>'form-control', 'placeholder'=>'Enter the Trash Price']) }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        {{ Form::hidden('imagePath',$trash['image'])}}
                        {{ Form::label('image', 'Image') }}
                        {{ Form::file('imageFile', ['class'=>'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/trash') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Edit', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection
