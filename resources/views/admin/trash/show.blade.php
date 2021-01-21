@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Trash Details</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ $trash['image'] }}"
                                height="200" width="100%"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                             
                            <div class="form-group">
                                <label for="trash">Trash</label>
                                <input id="trash" type="text" value="{{ $trash['trash'] }}" class="form-control" disabled />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input id="price" type="text" value="{{ $trash['price'] }}" class="form-control" disabled />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection