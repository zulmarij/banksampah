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
        $warehouses = Warehouse::with(['trash'])->orderBy('id', 'ASC')->get();
        $data = ['warehouses' => $warehouses];
        return view('admin.index')->with($data);
    }

    public function get()
    {
        $warehouse = Trash::all();

        return $this->sendResponse($warehouse, 200, 'warehouse loaded successfully');
    }

    public function show($id)
    {
        $warehouse = Warehouse::findOrFail($id);

        return $this->sendResponse($warehouse, 200, 'warehouse loaded successfully');
    }
}
