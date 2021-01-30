@extends('admin/admin',['title' => 'Create Trash | Sampah Bank', 'breadcrumb' => 'Create Trash'])
@section('content')
<div class="row">
    <div class="col-md-12">
        {{ Form::open(['action'=>'Admin\TrashController@store', 'files'=>true]) }}
        <div class="card card-dark">
            <div class="card-header">
                <h3 class="card-title">Create Trash</h3>
            </div>
            <div class="card-body">
                @if(!empty($errors->all()))
                <div class="alert alert-danger">
                    {{ Html::ul($errors->all())}}
                </div>
                @endif
                <div class="form-group">
                    {{ Form::label('trash', 'Trash') }}
                    {{ Form::text('trash', '', ['class'=>'form-control', 'placeholder'=>'Trash']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('price', 'Price') }}
                    {{ Form::text('price', '', ['class'=>'form-control', 'placeholder'=>'Price']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('image', 'Image') }}
                    <div class="input-group">
                        <div class="custom-file">
                            {{ Form::file('image', ['class'=>'costum-file-input']) }}
                            {{ Form::label('image', 'Choose Image', ['class'=>'custom-file-label']) }}
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ URL::to('admin/trash') }}" class="btn btn-secondary">Back</a>
                {{ Form::submit('Create', ['class' => 'btn btn-success float-right']) }}
            </div>
        </div>
        <!-- /.card -->
        {{ Form::close() }}
    </div>
</div>
@endsection
