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
        <div class="card-body">
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
                    <input type="number" name="qty" id="qty" class="form-control" autocomplete="off">
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
                                <tr>
                                    <td colspan="4"><strong>Diskon:</strong></td>
                                    <?php
                                    use Illuminate\Support\Str; 
                                    if($total >= 2000000) {
                                    $discount = $total/100 * 25;
                                    $dis = "25%";
                                    } elseif ($total >=1000000) {
                                    $discount = $total/100 * 25;
                                    $dis = "15%";
                                    } else {
                                        $discount = $total/100 * 15;
                                        $dis = "15%";
                                    }

                                    $total_bayar = $total - $discount;
                                  $total_midtrans=  Str::substr($total_bayar, 0, -3);
                                    ?>
                                    <td class="text-center"><strong>{{$dis}}<br>{{"- Rp ".@format_uang($discount)}},-</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4"><strong>Total Bayar:</strong></td>
                                    <td class="text-center"><strong>Rp {{@format_uang($total_bayar)}},-</strong></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td> <button type="submit" id="pay" class="btn btn-success">Bayar</button></td>
                                </tr>
                            </div>
                        </div>
                    </tbody>
                </table>
                <div class="float-right mr-5">
                </div>
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
<!-- Key Midtrans -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-S92WPmjAuJaARJin"></script>

<?php
// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-JpF4nsP97oaxhsFzCoagiVUG';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;
$params = array(
    'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => $total_midtrans,
    )
);
$data_db=json_encode($params);
$snapToken = \Midtrans\Snap::getSnapToken($params);
?>
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

     $( "#pay" ).click(function() {
        var data = <?=$data_db?>;

        $.ajax({
             url:"{{url('/payment')}}",
             type: "POST",
             dataType: "json",
             data: {
                data: data,
                _token: '{{ csrf_token() }}'
             },
             success: function( data ) {
                console.log(data);
             },
             error: function (textStatus, errorThrown) {
                console.log(data.trxtStatus);
             }
           });

        snap.pay('<?=$snapToken?>', {
          // Optional
          onSuccess: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          // Optional
          onPending: function(result){
           console.log('Silahkan Lakukan Pembayaran');
          },
          // Optional
          onError: function(result){
            /* You may add your own js here, this is just example */ document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
        });
     

        

   });

   </script>
@endsection
