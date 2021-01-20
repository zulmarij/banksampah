<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;
use App\Models\Deposit;
use App\Models\Pickup;
use App\Models\Trash;
use GuzzleHttp\Client;

class DepositController extends BaseController
{
    public function store($fee = 0)
    {
        if(Auth::user()->hasRole(['pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $data = request()->validate([
            'trash_id' => 'required',
            'weight'        => 'required',
        ]);

        $price = Trash::find(request('trash_id'));
        $data['revenue'] = $fee == 0 ? $price->price * $data['weight'] : $price->price * $data['weight'] - (($price->price * $data['weight']) * $fee / 100);

        $data['user_id'] = request('user_id') ?? Auth::id();

        $res = Deposit::create($data);

        if ($res) {
            WarehouseController::add($data);
            SavingsController::add($data);
            HistoryController::add($data);
        } else {
            $this->responseError('Failed to Make Request', 400);
        }

        return $this->responseOk($res, 200, 'Trash was successfully sold');
    }

    public function pickup(Client $client)
    {
        if(Auth::user()->hasRole(['pengurus1', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $data = request()->validate([
            'image'         => 'required',
            'address'       => 'required',
            'url_address'   => 'required',
            'phone'         => 'required',
            'description'   => 'required',
        ]);

        $image = base64_encode(file_get_contents(request('image')));
        $res = $client->request('POST', 'https://freeimage.host/api/1/upload', [
            'form_params' => [
                'key' => '6d207e02198a847aa98d0a2a901485a5',
                'action' => 'upload',
                'source' => $image,
                'format' => 'json'
            ]
        ]);
        $get = $res->getBody()->getContents();
        $revenue = json_decode($get);

        $data['image'] = $revenue->image->display_url;

        $data['user_id'] = Auth::id();

        $res = Pickup::create($data);

        return $this->responseOk($res, 200, 'The driver is heading to your location');
    }

    public function history()
    {
        if(Auth::user()->hasRole(['pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $data = Pickup::where('user_id', Auth::id())->orderBy('status', 'ASC')->get();

        if ($data == NULL) return $this->sendResponse();

        return $this->responseOk($data, 200, 'History Successfully loaded');
    }
}
