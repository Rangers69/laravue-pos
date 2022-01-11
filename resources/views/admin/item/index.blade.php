@extends('layouts.admin')
@section('header','Items')

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
                    <a href="#" @click="addData()" class="btn btn-sm btn-primary pull-right">Create New Items</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-hover table-striped table-bordered" id="dataTable">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Barcode</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Unit</th>
                                <th>Price</th>
                                <th>Stock</th>
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
                            <h4 class="modal-title">Items</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                            <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" class="form-control" name="barcode" :value="data.barcode" required>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name" :value="data.name" required>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="categorie_id" class="form-control">
                                <option value="">--Select--</option>
                                
                                </select>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Unit</label>
                                <select name="unit_id" class="form-control">
                                <option value="">--Select--</option>
                                
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" class="form-control" name="price" :value="data.price" required>
                            </div>
                            <div class="form-group">
                                <label>Stock</label>
                                <input type="text" class="form-control" name="stock" :value="data.stock" required>
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
     var actionUrl = '{{ url('items') }}';
    var apiUrl  = '{{url('api/items')}}';

    var columns = [
        {data:'DT_RowIndex',class:'text-center',orderable:true},
        {data:'barcode',class:'text-center',orderable:true},
        {data:'name',class:'text-center',orderable:true},
        {data:'categorie_id',class:'text-center',orderable:true},
        {data:'unit_id',class:'text-center',orderable:true},
        {data:'price',class:'text-center',orderable:true},
        {data:'stock',class:'text-center',orderable:true},
        {render: function(index,row,data,meta) {
            return `<a href="#" class="btn btn-warning btn-sm" onclick="controller.editData(event,${meta.row})">
                Edit</a> 
                <a href="#" class="btn btn-danger btn-sm" onclick="controller.deleteData(event,${data.id})">
                Delete</a>`;
        }, orderable:false, width:'200px', class:'text-center'},
    ];
</script>
<script src="{{asset('js/data.js')}}"></script>
@endsection