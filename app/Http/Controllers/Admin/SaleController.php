<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // $revenue = Deposit::sum('revenue');
        $price = Sale::sum('price');
        // $user = Deposit::distinct('user_id')->count();
        // $report = Deposit::count();
        $sale = Sale::with('trash')->get();

        return view('admin.sale.index', compact('sale'));
    }
}
