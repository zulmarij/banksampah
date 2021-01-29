<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Finance;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::count();
        $finance = Finance::latest()->first();
        $sale = Sale::sum('revenue');
        $deposit = Deposit::count();

        // $data = ['finance' => $finance];
        return view('admin.index', compact('finance', 'sale', 'user', 'deposit'));
    }

    public function admin()
    {
       $admin =  auth::user()->hasRole('admin');

       return view('admin.trash.index', compact('admin'));
    }
}
