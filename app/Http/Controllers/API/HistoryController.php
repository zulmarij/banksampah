<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryController extends BaseController
{
    public function index()
    {
        if(Auth::user()->hasRole(['pengurus1', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $request = History::where('user_id', Auth::id())->latest()->get();
        return $this->responseOk($request, 200, 'list of history');
    }

    public static function add($data)
    {
        History::create([
            'user_id'       => $data['user_id'],
            'trash_id'  => $data['trash_id'],
            'weight'         => $data['weight'],
            'revenue'         => $data['revenue'],
        ]);
    }
}
