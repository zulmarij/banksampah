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
        $trash = Warehouse::distinct('trash_id')->count();

        $total = Warehouse::count();
        $price = 0;
        $warehouse = Warehouse::with('trash')->get();
        foreach ($warehouse as $w) {
        $price+=$w->trash->price*$w->weight;
            // $totalWeight = $w->weight;
        }
        $data = $price;
        return view('admin.warehouse.index', compact('warehouse', 'total', 'trash', 'weight', 'data'));
    }
}
