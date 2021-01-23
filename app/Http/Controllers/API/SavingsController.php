<?php

namespace App\Http\Controllers\API;
use App\Models\Savings;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;

class SavingsController extends BaseController
{
    public function index()
    {
        if(Auth::user()->hasRole(['pengurus2', 'pengurus1', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $data = Savings::where('user_id', Auth::id())->get();

        if ($data == '[]') return $this->sendResponse();

        foreach ($data as $key => $value) {
            # code...
            $data[$key]->balance = number_format($data[$key]->balance, 0, ',', '.');
        }

        return $this->responseOk($data, 200, 'Data loaded successfully', );
    }

    public function show()
    {
        if(Auth::user()->hasRole(['pengurus2', 'pengurus1', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $data = Savings::where('user_id', Auth::id())->latest()->first();

        if (!$data) return $this->sendResponse();

        return $this->responseOk(number_format($data->balance, 0, ',', '.'), 200, 'Data loaded successfully');
    }

    public static function add($data)
    {
        $last = Savings::where('user_id', $data['user_id'])->latest()->first();

        Savings::create([
            'user_id'       => $data['user_id'],
            'information'    => 'Trash sales',
            'trash_id'  => $data['trash_id'],
            'weight'         => $data['weight'],
            'debit'         => $data['revenue'],
            'credit'        => 0,
            'balance'         => $last == null ? 0 + $data['revenue'] : $last->balance + $data['revenue']
        ]);
    }

    public function withdraw()
    {
        if(Auth::user()->hasRole(['pengurus2', 'pengurus1', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        request()->validate([
            'name'      => 'required',
            'account'  => 'required',
            'nominal'   => 'required',
        ]);

        $data = Savings::where('user_id', Auth::id())->latest()->first();

        if ($data == null or request('nominal') > $data->balance) {
            return $this->responseError('Selling Trash First', 400);
        }

        Savings::create([
            'user_id'       => Auth::id(),
            'information'    => 'Withdraw Balance',
            'trash_id'  => null,
            'weight'         => null,
            'debit'         => null,
            'credit'        => request('nominal'),
            'balance'         => $data->balance - request('nominal')
        ]);

        Withdrawal::create([
            'user_id'       => Auth::id(),
            'name'          => request('name'),
            'account'      => request('account'),
            'credit'        => request('nominal'),
            'information'    => 'Withdraw Balance',
            'status'        => 1,
        ]);

        return $this->responseOk(request('nominal'), 200, 'The request is being processed, waiting for the balance to be sent');
    }

    public function history()
    {
        if(Auth::user()->hasRole(['pengurus2', 'pengurus1', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        
        $history = Withdrawal::where('user_id', Auth::id())->get();

        return $this->responseOk($history, 200, 'History was successfully displayed');
    }
}
