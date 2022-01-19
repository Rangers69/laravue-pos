@extends('layouts.admin')
@section('header','Transaction')

@section('content')
<div class="row">
    <div class="col-lg-12">
    @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
            @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Customer Order</h3>
                <a href="{{url('transactions/create')}}" class="btn btn-primary float-right">Add</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 20%">Name</th>
                            <th style="width: 20%">Date</th>
                            <th style="width: 25%">Action</th>
                        </tr>
                    </thead>
                    @foreach($transactions as $key => $transaction)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$transaction->name}}</td>
                        <td>{{$transaction->created_at}}</td>
                        <td>
                            <div class="row justify-content-center">
                            <a href="{{ url('transactionDetails?transaction_id='.$transaction->id )}}" class="btn btn-warning btn-sm">List Order</a>
                                &nbsp;
                                <form action="{{ url('transactions', ['id' => $transaction->id]) }}" method="post">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Delete"
                                        onclick="return confirm('Are you sure?')">
                                    @method('delete')
                                    @csrf
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</div>
<!-- /.card -->
</div>
@endsection
