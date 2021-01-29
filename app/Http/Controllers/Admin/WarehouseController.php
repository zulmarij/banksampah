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

        $kertasTotal = Warehouse::where('trash_id', 1)->count();
        $kertasWeight = Warehouse::where('trash_id', 1)->sum('weight');

        $plastikTotal = Warehouse::where('trash_id', 2)->count();
        $plastikWeight = Warehouse::where('trash_id', 2)->sum('weight');

        $kacaTotal = Warehouse::where('trash_id', 3)->count();
        $kacaWeight = Warehouse::where('trash_id', 3)->sum('weight');

        $minyakTotal = Warehouse::where('trash_id', 4)->count();
        $minyakWeight = Warehouse::where('trash_id', 4)->sum('weight');

        $logamTotal = Warehouse::where('trash_id', 5)->count();
        $logamWeight = Warehouse::where('trash_id', 5)->sum('weight');

        $elektronikTotal = Warehouse::where('trash_id', 6)->count();
        $elektronikWeight = Warehouse::where('trash_id', 6)->sum('weight');

        $weight = Warehouse::sum('weight');
        $trash = Warehouse::distinct('trash_id')->count();
        $total = Warehouse::count();

        $warehouse = Warehouse::with('trash')->get();

        return view('admin.warehouse.index', compact('warehouse', 'total', 'trash', 'weight', 'kertasWeight', 'kertasTotal', 'plastikWeight', 'plastikTotal', 'kacaWeight', 'kacaTotal', 'minyakWeight', 'minyakTotal', 'logamWeight', 'logamTotal', 'elektronikWeight', 'elektronikTotal'));
    }
}
