<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\API\BaseController;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PickupController extends BaseController
{
    public function index()
    {
        if(Auth::user()->hasRole(['nasabah', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $request = Pickup::with('user')->where('status', 0)->get();
        return $this->responseOk($request, 200, 'list of pickup request');
    }

    public function done()
    {
        if(Auth::user()->hasRole(['nasabah', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $request = Pickup::with('user')->where('status', 1)->get();
        return $this->responseOk($request, 200, 'list of pickups that have been taken');
    }

    public function rejection()
    {
        if(Auth::user()->hasRole(['nasabah', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $request = Pickup::with('user')->where('status', 2)->get();
        return $this->responseOk($request, 200, 'list of pickups that has been rejected');
    }

    public function reject(Pickup $pickup)
    {
        if(Auth::user()->hasRole(['nasabah', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $pickup->update([
            'status'    => 2
        ]);

        return $this->responseOk($pickup, 200, 'pickup request was rejected');
    }

    public function confirmation(Pickup $pickup)
    {
        if(Auth::user()->hasRole(['nasabah', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $pickup->update([
            'status'    => 1
        ]);

        return $this->responseOk($pickup, 200, 'trash was successfully retrieved');
    }

    public function request()
    {
        if(Auth::user()->hasRole(['pengurus1', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $request = Pickup::where('user_id', Auth::id())->latest()->get();
        return $this->responseOk($request, 200, 'list of pickup request');
    }

    public function delete(Pickup $pickup)
    {
        if(Auth::user()->hasRole(['pengurus1', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $pickup->delete();

        return $this->responseOk('pickup request was deleted', 200);
    }
}
