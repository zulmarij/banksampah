<?php

namespace App\Http\Controllers\API;

use App\Models\Sale;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use App\Models\Finance;
use Illuminate\Support\Facades\Auth;

class SaleController extends BaseController
{
    public function index()
    {
        if(Auth::user()->hasRole(['nasabah', 'pengurus1', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $sale =Sale::all();
        return $this->responseOk($sale);
    }
    public function store(Request $request)
    {
        if(Auth::user()->hasRole(['nasabah', 'pengurus1', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $validator = Validator::make($request->all(), [
            'trash_id' => 'integer|required',
            'weight' => 'integer|required',
            'price' => 'integer|required',
        ]);

        if ($validator->fails()) {
            return response($validator->errors());
        }

        $warehouse = Warehouse::where('trash_id', $request->trash_id)->firstOrFail();

        if ($warehouse->weight < request('weight')) {
            return $this->responseError('your trash is lacking', 400);
        }

       Sale::create([
            'trash_id' => $request->trash_id,
            'weight' => $request->weight,
            'price' => $request->price,
            'revenue' => $request->weight * $request->price,
        ]);

        //kurangi stok sampah berdasarkan jenis
        $warehouse->weight = $warehouse->weight - $request->weight;

        //tambah revenue ke data finance dan buat catatan pemasukan
        $revenue = Finance::latest()->first();

        $finance = Finance::create([
            'information' => "hasil penjualan ke pengepul",
            'debit' => $request->weight * $request->price,
            'credit' => 0,
            'balance' => $revenue == null ? $request->weight * $request->price : $revenue->balance + ($request->weight * $request->price)
        ]);
        try {
            $finance->save();
            $warehouse->update();
            return $this->responseOk($finance);
        } catch (\Throwable $th) {
            return $this->responseError('Failed to sell trash', 400);
        }
    }
}
