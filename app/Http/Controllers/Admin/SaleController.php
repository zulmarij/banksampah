<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        // $price = Sale::sum('price');
        // $sale = Sale::withSum('trash')->get();
        // foreach ($sale as $data) {

        // }
        $sale = Sale::with('trash')->get();

        return view('admin.sale.index', compact('sale'));
    }
}
