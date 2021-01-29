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
        $warehouse = Warehouse::with('trash')->get();
        foreach ($warehouse as $get) {
          $price = sum($get->weight) * sum($get->trash->price);
        }
        $weight = Warehouse::sum('weight');
        $trash = Warehouse::distinct('trash_id')->count();
        // $price = $warehouse->trash->price * $warehouse->weight;
        $total = Warehouse::count();


        // $dd = dd($warehouse);
        return view('admin.warehouse.index', compact('warehouse', 'total', 'trash', 'weight', 'price'));
    }
}
