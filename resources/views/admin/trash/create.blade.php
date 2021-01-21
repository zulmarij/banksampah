@extends('admin.admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::open(['route'=>'trash.store', 'files'=>true]) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Sampah</h3>
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
                            {{ Form::label('trash', 'Nama Sampah') }}
                            {{ Form::text('trash', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Sampah']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('price', 'Harga Sampah') }}
                            {{ Form::text('price', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Harga Sampah']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {{ Form::label('image', 'Gambar Sampah') }}
                            {{ Form::file('image', ['class'=>'form-control']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin') }}" class="btn btn-outline-info">Kembali</a>
                {{ Form::submit('Input', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection
