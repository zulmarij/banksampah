@extends('admin/admin',['title' => 'Savings | Sampah Bank', 'breadcrumb' => 'Savings'])
@section('content')
<div class="row">
    <div class="col-lg-6 col-6">
        <!-- small card -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $user }}</h3>

                <p>Total User</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a> --}}
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <!-- small card -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $total }}</h3>

                <p>Total Savings</p>
            </div>
            <div class="icon">
                <i class="fas fa-credit-card"></i>
            </div>
            {{-- <a href="#" class="small-box-footer">
            More info <i class="fas fa-arrow-circle-right"></i>
          </a> --}}
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Savings</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Balance</th>
                    <th>Debit</th>
                    <th>Credit</th>
                    <th>Information</th>
                    <th>Created_at</th>
                </tr>
            </thead>
            <tbody>
                @foreach($savings as $data)
                <tr>
                    <td>{{ $data->user->id}}</td>
                    <td>{{ $data->user->name}}</td>
                    <td>{{ $data->user->email}}</td>
                    <td>Rp {{ number_format($data->balance, 0, ',', '.')}}</td>
                    <td>Rp {{ number_format($data->debit, 0, ',', '.')}}</td>
                    <td>Rp {{ number_format($data->credit, 0, ',', '.')}}</td>
                    <td>{{ $data->information}}</td>
                    <td>{{ $data->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection
