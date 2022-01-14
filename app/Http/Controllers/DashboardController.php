<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Customer;
use Illuminate\Http\Request;

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

        return view('admin.dashboard', compact('all_suppliers','all_customers','all_items','all_categories'));
    }
}
