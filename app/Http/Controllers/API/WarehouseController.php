<?php

namespace App\Http\Controllers\API;
use App\Models\Trash;
use App\Models\Warehouse;
use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;

class WarehouseController extends BaseController
{
    public function index()
    {
        $data = Warehouse::with(['trash'])->orderBy('id', 'ASC')->get();

        return $this->sendResponse($data, 200, 'warehouse loaded successfully');
    }

    public function get()
    {
        $data = Trash::all();

        return $this->sendResponse($data, 200, 'warehouse loaded successfully');
    }

    public function show($id)
    {
        $data = Warehouse::findOrFail($id);

        return $this->sendResponse($data, 200, 'warehouse loaded successfully');
    }

    public static function add($data)
    {
        $warehouse = Warehouse::find($data['trash_id']);

        $warehouse->update([
            'weight' => $warehouse->weight += $data['weight']
        ]);
    }
}
