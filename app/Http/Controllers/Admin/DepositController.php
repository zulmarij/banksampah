<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $deposit = Deposit::with('user', 'trash')->get();

        return view('admin.deposit.index', compact('deposit'));
    }
}
