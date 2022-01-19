@extends('layouts.admin')
@section('header','Transaction')


@section('css')
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
@endsection

@section('content')
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Customer Order</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form class="form-horizontal" action="{{ url('transactions') }}" method="post">
    @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Kasir</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="inputEmail3" value="{{ auth()->user()->name }}" readonly>
                </div>
            </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Customer</label>
                    <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="customer"
                        placeholder="Masukan nama Customer" autocomplete="off">
                        <input type="hidden" name="customer_id" id="customer_id">
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
@endsection


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script type="text/javascript">

   // CSRF Token
   $(document).ready(function(){

     $("#customer").autocomplete({
        source: function( request, response ) {
           // Fetch data
           $.ajax({
             url:"{{url('api/transactions')}}",
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
          $('#customer').val(ui.item.label); // display the selected text
          $('#customer_id').val(ui.item.id);
          return false;
        }
     });

   });
   </script>
@endsection
