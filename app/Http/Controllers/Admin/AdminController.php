<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   
        $finance = Finance::latest()->first('balance');
        $data = ['finance' => $finance];
        return view('admin.admin')->with($data);
    }
}
