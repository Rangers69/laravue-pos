<?php

namespace App\Http\Controllers;


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
        $all_suppliers = Supplier::count();
        $all_customers = Customer::count();

        return view('admin.dashboard', compact('all_suppliers','all_customers'));
    }
}
