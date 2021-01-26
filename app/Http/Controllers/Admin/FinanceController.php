<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Finance;
use App\Models\Savings;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    public function index()
    {
        $debit = Finance::sum('debit');
        $credit = Finance::sum('credit');
        $balance = Finance::latest()->first();
        $report = Finance::count();
        $finance = Finance::orderBy('id', 'desc')->get();

        return view('admin.finance.index', compact('finance', 'report', 'balance', 'credit', 'debit'));
    }
}
