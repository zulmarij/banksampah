<?php

namespace App\Http\Controllers\Admin;

use App\Models\Trash;
use App\Models\Warehouse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $weight = Warehouse::sum('weight');

        $total = Warehouse::count();
        $totalPrice = 0;
        $warehouse = Warehouse::with('trash')->get();
        foreach ($warehouse as $price) {
            $totalPrice += $price->trash->price * $price->weight;
        }
        $data = $totalPrice;
        return view('admin.warehouse.index', compact('warehouse', 'total', 'weight', 'data'));
    }
}
