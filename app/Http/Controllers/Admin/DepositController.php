<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Trash;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $kertasTotal = Deposit::where('trash_id', 1)->count();
        $kertasWeight = Deposit::where('trash_id', 1)->sum('weight');
        $kertasRevenue = Deposit::where('trash_id', 1)->sum('revenue');
        $kertasUser = Deposit::distinct('user_id')->where('trash_id', 1)->count();

        $plastikTotal = Deposit::where('trash_id', 2)->count();
        $plastikWeight = Deposit::where('trash_id', 2)->sum('weight');
        $plastikRevenue = Deposit::where('trash_id', 2)->sum('revenue');
        $plastikUser = Deposit::distinct('user_id')->where('trash_id', 2)->count();

        $kacaTotal = Deposit::where('trash_id', 3)->count();
        $kacaWeight = Deposit::where('trash_id', 3)->sum('weight');
        $kacaRevenue = Deposit::where('trash_id', 3)->sum('revenue');
        $kacaUser = Deposit::distinct('user_id')->where('trash_id', 3)->count();

        $minyakTotal = Deposit::where('trash_id', 4)->count();
        $minyakWeight = Deposit::where('trash_id', 4)->sum('weight');
        $minyakRevenue = Deposit::where('trash_id', 4)->sum('revenue');
        $minyakUser = Deposit::distinct('user_id')->where('trash_id', 4)->count();

        $logamTotal = Deposit::where('trash_id', 5)->count();
        $logamWeight = Deposit::where('trash_id', 5)->sum('weight');
        $logamRevenue = Deposit::where('trash_id', 5)->sum('revenue');
        $logamUser = Deposit::distinct('user_id')->where('trash_id', 5)->count();

        $elektronikTotal = Deposit::where('trash_id', 6)->count();
        $elektronikWeight = Deposit::where('trash_id', 6)->sum('weight');
        $elektronikRevenue = Deposit::where('trash_id', 6)->sum('revenue');
        $elektronikUser = Deposit::distinct('user_id')->where('trash_id', 6)->count();

        $revenue = Deposit::sum('revenue');
        $weight = Deposit::sum('weight');
        $user = Deposit::distinct('user_id')->count();
        $total = Deposit::count();

        $deposit = Deposit::with('user', 'trash')->get();

        return view('admin.deposit.index', compact('deposit', 'total', 'user', 'weight', 'revenue'));
    }
}
