<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Sale;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   
        $month = date('m');

        $finance = Finance::latest()->first();
        $sale = Sale::whereMonth('created_at', $month)->sum('revenue');

        // $data = ['finance' => $finance];
        return view('admin.admin', compact('finance', 'sale'));
    }
}
