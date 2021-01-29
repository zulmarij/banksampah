<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Savings;
use Illuminate\Http\Request;

class SavingsController extends Controller
{
    public function index()
    {
        $user = Savings::distinct('user_id')->count();
        $total = Savings::count();

        $savings = Savings::with('user')->orderBy('id', 'DESC')->get();

        return view('admin.savings.index', compact('savings', 'total', 'user'));
    }
}
