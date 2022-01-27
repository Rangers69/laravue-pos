@extends('layouts.admin')
@section('header','List Order')

@section('css')
 <!-- CSS -->
 <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Add Item</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{ url('transactionDetails') }}" method="post">
        @csrf
        <div class="card-body" id="hitung">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Produk</label>
                <div class="col-sm-10">
                    <input type="hidden"  name="transaction_id" value="{{$request->transaction_id}}">
                <input type="text" name="name" class="form-control" id="product"
				placeholder="Masukan nama barang" autocomplete="off">
                <input type="hidden" name="item_id" id="item_id">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Qty</label>
                <div class="col-sm-10">
                    <input type="text" name="qty" id="qty" class="form-control" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" id="price" name="total_price" class="form-control" autocomplete="off">
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
        <!-- /.card-footer -->
    </form>
</div>
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
                <h3 class="card-title">List Order</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 20%">Customer</th>
                            <th style="width: 20%">Items</th>
                            <th style="width: 20%">Qty</th>
                            <th style="width: 20%">Price</th>
                            <th style="width: 25%">Action</th>
                        </tr>
                    </thead>
                    
                    @foreach($orderlist as $key => $order) 
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$order->customer->name}}</td>
                        <td>{{$order->item->name}}</td>
                        <td>{{$order->qty}}</td>
                        <td>Rp {{ @format_uang($order->total)}}</td>
                        <td>
                            <div class="row justify-content-center">
                                <!-- <a href="" class="btn btn-warning btn-sm">Detail</a> -->
                                &nbsp;
                                <form action="{{ url('transactionDetails', ['id' => $order->id]) }}" method="post">
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
                        <div class="col-lg">
                            <div class="row">
                                <tr>
                                    <td colspan="4"><strong>Total:</strong></td>
                                    <td class="text-center"><strong>Rp {{@format_uang($total)}},-</strong></td>
                                    <td></td>
                                </tr>
                            </div>
                        </div>
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


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


<script type="text/javascript">

   // CSRF Token
   $(document).ready(function(){

     $("#product").autocomplete({
        source: function( request, response ) {
           // Fetch data
           $.ajax({
             url:"{{url('api/transactionDetails')}}",
             type: 'get',
             dataType: "json",
             data: {
                search: request.term
             },
             success: function( data ) {
                response( data );
             }
           });
        },
        select: function (event, ui) {
          // Set selection
          $('#product').val(ui.item.label); // display the selected text
          $('#price').val(ui.item.price); // save selected id to input
          $('#item_id').val(ui.item.id); // save selected id to input
          return false;
        }
     });

   });

   </script>
@endsection
