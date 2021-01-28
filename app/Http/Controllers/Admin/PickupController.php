<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pickup;
use Illuminate\Http\Request;

class PickupController extends Controller
{
    public function index()
    {
        $user = Pickup::distinct('user_id')->count();
        $total = Pickup::count();
        $pickup = Pickup::orderBy('id', 'DESC')->get();

        return view('admin.pickup.index', compact('pickup', 'total', 'user'));
    }
}
