<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {

        $kertasTotal = Sale::where('trash_id', 1)->count();
        $kertasWeight = Sale::where('trash_id', 1)->sum('weight');
        $kertasRevenue = Sale::where('trash_id', 1)->sum('revenue');
        $kertasTrash = Sale::distinct('trash_id')->where('trash_id', 1)->count();

        $plastikTotal = Sale::where('trash_id', 2)->count();
        $plastikWeight = Sale::where('trash_id', 2)->sum('weight');
        $plastikRevenue = Sale::where('trash_id', 2)->sum('revenue');
        $plastikTrash = Sale::distinct('trash_id')->where('trash_id', 2)->count();

        $kacaTotal = Sale::where('trash_id', 3)->count();
        $kacaWeight = Sale::where('trash_id', 3)->sum('weight');
        $kacaRevenue = Sale::where('trash_id', 3)->sum('revenue');
        $kacaTrash = Sale::distinct('trash_id')->where('trash_id', 3)->count();

        $minyakTotal = Sale::where('trash_id', 4)->count();
        $minyakWeight = Sale::where('trash_id', 4)->sum('weight');
        $minyakRevenue = Sale::where('trash_id', 4)->sum('revenue');
        $minyakTrash = Sale::distinct('trash_id')->where('trash_id', 4)->count();

        $logamTotal = Sale::where('trash_id', 5)->count();
        $logamWeight = Sale::where('trash_id', 5)->sum('weight');
        $logamRevenue = Sale::where('trash_id', 5)->sum('revenue');
        $logamTrash = Sale::distinct('trash_id')->where('trash_id', 5)->count();

        $elektronikTotal = Sale::where('trash_id', 6)->count();
        $elektronikWeight = Sale::where('trash_id', 6)->sum('weight');
        $elektronikRevenue = Sale::where('trash_id', 6)->sum('revenue');
        $elektronikTrash = Sale::distinct('trash_id')->where('trash_id', 6)->count();

        $revenue = Sale::sum('revenue');
        $weight = Sale::sum('weight');
        $trash = Sale::distinct('trash_id')->count();
        $total = Sale::count();

        $sale = Sale::with('trash')->get();

        return view('admin.sale.index', compact('sale', 'total', 'trash', 'weight', 'revenue', 'kertasWeight', 'kertasRevenue', 'kertasTrash', 'kertasTotal', 'plastikWeight', 'plastikRevenue', 'plastikTrash', 'plastikTotal', 'kacaWeight', 'kacaRevenue', 'kacaTrash', 'kacaTotal', 'minyakWeight', 'minyakRevenue', 'minyakTrash', 'minyakTotal', 'logamWeight', 'logamRevenue', 'logamTrash', 'logamTotal', 'elektronikWeight', 'elektronikRevenue', 'elektronikTrash', 'elektronikTotal'));
    }
}
