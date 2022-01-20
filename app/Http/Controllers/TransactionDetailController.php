<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Customer;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionDetailController extends Controller
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
    public function index(Request $request)
    {

        $orderlist = TransactionDetail::select('transaction_details.*', 'items.name','transactions.customer_id','customers.name',DB::raw('( transaction_details.qty * items.price) as total'))
        ->join('items', 'transaction_details.item_id','items.id')
        ->join('transactions', 'transaction_details.transaction_id','transactions.id')
        ->join('customers','customers.id', 'transactions.customer_id')
        ->where('transactions.id',$request->transaction_id)
        ->get();

        $items = Item::all();
        $customers = Customer::all();


        return view('admin.transactionDetail.index', compact('request','orderlist','items','customers'));
    }

    public function api(Request $request) 
    {
        $search = $request->search;

        if($search == ''){
            $items = Item::orderby('name','asc')->select('id','name','price')->limit(5)->get();
        }else{
            $items = Item::orderby('name','asc')->select('id','name','price')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($items as $item){
            $response[] = array(
                "price"=>$item->price,
                "id"=>$item->id,
                "label"=>$item->name
            );
        }

        return response()->json($response); 
        
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

        // return $request;
        $this->validate($request,[
            'transaction_id' => ['required'],
            'item_id' => ['required'],
            'qty' => ['required'],
            'total_price' => ['required'],
        ]);

        TransactionDetail::create($request->all());
        Item::where('id', $request->item_id)->decrement('stock', $request->qty);

      
        return redirect()->back()->with('success','success');
        // return redirect('transactionDetails')->with('success','success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionDetail $transactionDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionDetail  $transactionDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDetail $transactionDetail)
    {
        $transactionDetail->delete();
        return redirect()->back()->with('success','Data has been deleted');
    }
}
