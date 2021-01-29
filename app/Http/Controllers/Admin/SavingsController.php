<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Savings;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    public function index()
    {
        $debit = Savings::sum('debit');
        $credit = Savings::sum('credit');
        $balance =Savings::latest()->first()->distinct('user_id')->sum('balance');
        $total = Savings::count();

        $savings = Savings::with('user')->get();

        return view('admin.savings.index', compact('savings', 'balance', 'credit', 'debit', 'total'));
    }
}
