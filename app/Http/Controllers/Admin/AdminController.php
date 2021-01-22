<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Finance;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   
        $user = User::count();
        $finance = Finance::latest()->first('balance');
        $sale = Sale::sum('revenue');
        $deposit = Deposit::count();

        // $data = ['finance' => $finance];
        return view('admin.admin', compact('finance', 'sale', 'user', 'deposit'));
    }
}
