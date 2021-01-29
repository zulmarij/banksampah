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
        $price =
        $total = Warehouse::count();

        $warehouse = Warehouse::with('trash')->get();

        $dd = dd($warehouse);
        return view('admin.warehouse.index', compact('warehouse', 'total', 'trash', 'weight', 'dd'));
    }
}
