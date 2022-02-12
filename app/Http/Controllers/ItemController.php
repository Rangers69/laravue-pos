<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Unit;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
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
        $categories = Category::all();
        $units = Unit::all();

        $now = Carbon::now();
        $thBln = $now->year.$now->month;
        
        $cek = Item::count();
        if ($cek == 0) {
            $urut = 1001;
            $nomor = 'PI'.$thBln.$urut;
        }else {
            $ambil = Item::all()->last();
            $urut = (int)substr($ambil->barcode, -4) + 1;
            $nomor = 'PI'.$thBln.$urut;
        }

        return view('admin.item.index', compact('categories','units','nomor'));
    }

    public function api() 
    {
        $items = Item::all();

        return json_encode($items);

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
            'barcode' => ['required'],
            'name' => ['required'],
            'category_id' => ['required'],
            'unit_id' => ['required'],
            'price' => ['required'],
            'stock' => ['required']
        ]);

        Item::create($request->all());
        return redirect('items')->with('success','success create new item');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $this->validate($request,[
            'barcode' => ['required'],
            'name' => ['required'],
            'category_id' => ['required'],
            'unit_id' => ['required'],
            'price' => ['required'],
            'stock' => ['required']
        ]);

        $item->update($request->all());

        return redirect('items')->with('success','Item updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
    }
}
