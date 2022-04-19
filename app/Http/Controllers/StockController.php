<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\Item;
use Carbon\Carbon;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $now = Carbon::now();
        $thBln = $now->year.$now->month;
        
        $cek = Stock::count();
        if ($cek == 0) {
            $urut = 1001;
            $nomor = 'PO'.$thBln.$urut;
        }else {
            $ambil = Stock::all()->last();
            $urut = (int)substr($ambil->purchase_order, -4) + 1;
            $nomor = 'PO'.$thBln.$urut;
        }

        $stocks = Stock::all();
        $suppliers = Supplier::all();
        $items = Item::all();
        return view('admin.stock.index',compact('items','suppliers','stocks','nomor'));
    }

    public function api(Request $request) 
    {

        $stocks = Stock::select('stocks.*', 'items.name as name_item','suppliers.name')
                        ->join('items', 'stocks.item_id','items.id')
                        ->join('suppliers', 'stocks.supplier_id','suppliers.id')
                        ->get();

        if ($request->type == 'in' || $request->type == 'out'){
            $stocks = $stocks->where('type', $request->type);
        }

        if ($request->created_at){
            $stocks = $stocks->where('created_at', $request->created_at);
        }


        $datatables = datatables()->of($stocks)
        ->addColumn('item', function($stock){
            return ($stock->barcode);
        })
        ->addColumn('supplier', function($supplier){
            if($supplier->name == NULL){
                return '---';
            } else {
            return ($supplier->name);
            }
        })
        ->addColumn('name', function($item){
            return ($item->name_item);
        })
        ->addColumn('date', function($stock){
            return convertDate($stock->created_at);
        })
        ->addIndexColumn();

        return $datatables->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'item_id' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
            'supplier_id' => ['nullable'],
            'qty' => ['required'],
            'purchase_order' => ['required']
        ]);
        Stock::create($request->all());

        if($request->type == 'in'){
            Item::where('id', $request->item_id)->increment('stock', $request->qty);
            
        } else {
            Item::where('id', $request->item_id)->decrement('stock', $request->qty);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $this->validate($request,[
            'item_id' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
            'supplier_id' => ['nullable'],
            'qty' => ['required']
        ]);

        $stock->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {

        if($stock->type == 'in'){
            $stock->delete();
            Item::where('id', $stock->item_id)->decrement('stock', $stock->qty);
            
        } else {
            $stock->delete();
            Item::where('id', $stock->item_id)->increment('stock', $stock->qty);
        }
    }
}
