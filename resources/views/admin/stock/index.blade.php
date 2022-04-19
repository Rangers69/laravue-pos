@extends('layouts.admin')
@section('header','Stock')

@section('css')
    <!-- dataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
<div id="controller">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Add New Stock</a>
                    <div class="col-md-2 float-md-right">
                            <select name="type" class="form-control">
                                <option value="99">Type</option>
                                <option value="in">In</option>
                                <option value="out">Out</option>
                            </select>
                        </div>
                        <div class="col-md-2 float-md-right">
                            <div class='input-group date' id='datetimepicker'>
                                <input type='date' class="form-control" name="date">
                                <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Purchase Order</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Description</th>
                                <th>Supplier</th>
                                <th>Qty</th>
                                <th>Created At</th>
                                <th class="text-center" style="width: 150px">Action</th>
                            </tr>
                        </thead>
                        
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <div class="modal fade" id="modal-default">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event,data.id)">
                        <div class="modal-header">
                            <h4 class="modal-title">Stock</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group" v-if="editStatus == false">
                                <label>Purchase Order</label>
                                <input type="text" class="form-control" name="purchase_order" value="{{$nomor}}" readonly required>
                            </div>
                            <div class="form-group">
                                <label>Item</label>
                                <select name="item_id" class="form-control">
                                <option value="">--Select--</option>
                                @foreach($items as $item)
                                <option :selected="data.item_id == {{$item->id}}" value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                            <label>Type</label>
                                <select name="type" class="form-control">
                                <option value="">--Select--</option>
                                <option value="in">In</option>
                                <option value="out">Out</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" :value="data.description"  required>
                            </div>
                            <div class="form-group">
                                <label>Supplier</label>
                                <select name="supplier_id" class="form-control">
                                <option value="">--Select--</option>
                                @foreach($suppliers as $supplier)
                                <option :selected="data.supplier_id == {{$supplier->id}}" value="{{$supplier->id}}">{{$supplier->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Qty</label>
                                <input type="text" class="form-control" name="qty" :value="data.qty"  required>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</div>
@endsection


@section('js')
<!-- DataTables  & Plugins -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script type="text/javascript">
     var actionUrl = '{{ url('stocks') }}';
    var apiUrl  = '{{url('api/stocks')}}';

    var columns = [
        {data:'DT_RowIndex',class:'text-center',orderable:true},
        {data:'purchase_order',class:'text-center',orderable:true},
        {data:'name_item',class:'text-center',orderable:true},
        {data:'type',class:'text-center',orderable:true},
        {data:'description',class:'text-center',orderable:true},
        {data:'supplier',class:'text-center',orderable:true},
        {data:'qty',class:'text-center',orderable:true},
        {data:'date',class:'text-center',orderable:true},
        {render: function(index,row,data,meta) {
            return `<a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event,${meta.row})">
                Edit</a> 
                <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event,${data.id})">
                Delete</a>`;
        }, orderable:false, width:'200px', class:'text-center'},
    ];
</script>
<script src="{{asset('js/data.js')}}"></script>
<script>
    $('select[name=type]').on('change', function() {
        type = $('select[name=type]').val()
        if (type == 99) {
            controller.table.ajax.url(apiUrl).load()
        } else {
            controller.table.ajax.url(apiUrl + '?type=' + type).load()
        }
    })

    $('input[name=date]').on('change', function() {
    created_at = $('input[name=date]').val()
    controller.table.ajax.url(apiUrl + '?created_at=' + created_at).load()
    })

</script>
@endsection