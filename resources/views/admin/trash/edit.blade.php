@extends('admin/admin',['title' => 'Edit Trash | Sampah Bank', 'breadcrumb' => 'Edit Trash'])
@section('content')
<div class="row">
    <div class="col-12">
        <!-- Widget: trash widget style 1 -->
        {{ Form::model($trash,['action'=>['Admin\TrashController@update',$trash->id],'files'=>true,'method'=>'PUT']) }}
        <div class="card">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="card-header">
                <h3 class="card-title">Edit Trash</h3>
            </div>
            <!-- /.row -->
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="d-flex justify-content-center">
                    <img class="img-circle elevation-2" src="{{$trash->image}}" alt="User" height="256" width="256">
                </div>
                <div class="form-group">
                    {{ Form::label('image', 'Image') }}
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::hidden('imagePath',$trash->image)}}
                            {{ Form::file('image', ['class'=>'costum-file-input']) }}
                            {{ Form::label('image', 'Choose Photo', ['class'=>'custom-file-label']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{ Form::label('trash', 'Trash') }}
                    {{ Form::text('trash', $trash->trash, ['class'=>'form-control', 'placeholder'=>'Trash']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('price', 'Price') }}
                    {{ Form::text('price', $trash->price, ['class'=>'form-control', 'placeholder'=>'Price']) }}
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/trash') }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Edit', ['class' => 'btn btn-warning float-right']) }}
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@endsection
