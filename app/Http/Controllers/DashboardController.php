<?php

namespace App\Http\Controllers;


use App\Models\Transaction;
use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $all_categories = Category::count();
        $all_suppliers = Supplier::count();
        $all_customers = Customer::count();
        $all_items = Item::count();

        $label_donut = Category::orderBy('category_id')->join('items', 'items.category_id', 'categories.id')->groupBy('categories.name')->pluck('categories.name');
        $data_donut = Item::select(DB::raw("COUNT(category_id) as total"))->groupBy('category_id')->orderBy('category_id')->pluck('total');

        $label_bar = ['Transactions'];
        $data_bar = [];

        foreach ($label_bar as $key => $value) {
            $data_bar[$key]['label'] = $label_bar[$key];
            $data_bar[$key]['backgroundColor'] = 'rgba(60, 141, 138, 0.9)';
            $data_month = [];

            foreach (range(1, 12) as $month) {
                $data_month[] = Transaction::select(DB::raw("COUNT(*) as total"))->whereMonth('created_at', $month)->first()->total;
            }

            $data_bar[$key]['data'] = $data_month;
        }
        // return $data_month;

        return view('admin.dashboard', compact('all_suppliers','all_customers','all_items','all_categories','label_donut','data_donut','data_bar'));
    }
}
