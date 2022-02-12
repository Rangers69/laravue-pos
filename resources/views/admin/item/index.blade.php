@extends('layouts.admin')
@section('header','Item')

@section('content')
<div id="controller">

    <div class="row">
        <div class="col-md-5 offset-md-3">
            <div class="input-group mb-3">
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <input type="text" class="form-control" autocompelet="off" placeholder="Search from title"
                    v-model="search">
            </div>
        </div>


        <div class="col-md-2">
            <button class="btn btn-primary" @click="addData()">Create New Item</button>
        </div>
    </div>
    <hr>

    <!-- panel data item -->
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12" v-for="item in filteredList">
            <div class="info-box" v-on:click="editData(item)">
                <div class="info-box-content">
                    <span class="info-box-text h3">@{{ item.name}} (@{{item.stock}})</span>
                    <span class="info-box-number">Rp.@{{ numberWithTitik(item.price) }},-<small></small> </span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" :action="actionUrl" autocomplete="off" @submit="submitForm($event, item.id)">
                    <div class="modal-header">
                        <h4 class="modal-title">Item</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @csrf
                        <input type="hidden" name="_method" value="PUT" v-if="editStatus">
                        <input type="hidden" class="form-control" v-if="editStatus" name="barcode" :value="item.barcode" readonly required>

                        <div class="form-group" v-if="editStatus == false">
                            <label>Barcode</label>
                            <input type="text" class="form-control" name="barcode" value="{{$nomor}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" :value="item.name" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Select--</option>
                                @foreach($categories as $category)
                                <option :selected="item.category_id == {{$category->id}}" value="{{$category->id}}">
                                    {{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Unit</label>
                            <select name="unit_id" class="form-control">
                                <option value="">--Select--</option>
                                @foreach($units as $unit)
                                <option :selected="item.unit_id == {{$unit->id}}" value="{{$unit->id}}">{{$unit->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price" :value="item.price" required>
                        </div>
                        <div class="form-group">
                            <label>Stock</label>
                            <input type="number" class="form-control" name="stock" :value="item.stock" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" v-if="editStatus"
                            v-on:click="deleteData(item.id)">Delete</button>
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
<script type="text/javascript">
    var actionUrl = '{{ url('items')}}';
    var apiUrl = '{{ url('api/items')}}';

    var app = new Vue({
        el: '#controller',
        data: {
            items: [],
            search: '',
            actionUrl,
            apiUrl,
            item: {},
            editStatus: false
        },
        mounted: function () {
            this.get_items();
        },
        methods: {
            get_items() {
                const _this = this;
                $.ajax({
                    url: apiUrl,
                    method: 'GET',
                    success: function (data) {
                        _this.items = JSON.parse(data);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            },
            addData() {
                this.item = {};
                this.editStatus = false;
                $('#modal-default').modal();
            },
            editData(item) {
                this.item = item;
                this.editStatus = true;
                $('#modal-default').modal();
            },
            deleteData(id) {
                this.actionUrl = '{{ url('items') }}' + '/' + id;
                if (confirm("Are you sure?")) {
                    axios.post(this.actionUrl, {_method: 'DELETE'}).then(response => { 
                      location.reload();
                    });
                }
            },
            submitForm(event, id) {
                event.preventDefault();
                const _this = this;
                var actionUrl = !this.editStatus ? this.actionUrl : this.actionUrl+'/'+id;

                axios.post(actionUrl, new FormData($(event.target)[0])).then(response => {
                    location.reload();
                })
            },
            numberWithTitik(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
        },
        computed: {
            filteredList() {
                return this.items.filter(item => {
                    return item.name.toLowerCase().includes(this.search.toLowerCase());
                })
            }
        }
    });

</script>
@endsection
