<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CallBackController extends Controller
{
    public function index(Request $req) 
    {

        return $req->getContent();
        
    }
}
