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
        $revenue = Deposit::sum('revenue');
        $weight = Deposit::sum('weight');
        $user = Deposit::count('user_id');
        $report = Deposit::count();
        $deposit = Deposit::with('user', 'trash')->get();

        return view('admin.deposit.index', compact('deposit', 'report', 'user', 'weight', 'revenue'));
    }
}
