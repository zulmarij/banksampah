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

        $warehouse = Warehouse::with('trash')->get();
        foreach ($warehouse as $price) {
        // $data = $price->trash->price;
            $data = $price->weight;
        }
        // $totalPrice = $price * $weight;
        return view('admin.warehouse.index', compact('warehouse', 'total', 'trash', 'weight', 'data'));
    }
}
