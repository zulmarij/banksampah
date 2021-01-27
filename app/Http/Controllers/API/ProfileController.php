<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ProfileController extends BaseController
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();

        if (empty($user)) {
            return $this->responseError('LOGIN FIRST', 403);
        }
        return $this->responseOk($user);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'   => 'string|min:5|max:50|email',
            'name'    => 'string|min:3',
            'phone'   => 'string|min:5',
            'address' => 'string|min:5|max:100'

        ]);

        if ($validator->fails()) {
            return $this->responseError('Update profile failed', 422, $validator->errors());
        }
        if ($request->photo) {
            $img = base64_encode(file_get_contents($request->photo));
            $client = new Client();
            $res = $client->request('POST', 'https://freeimage.host/api/1/upload', [
                'form_params' => [
                    'key' => '6d207e02198a847aa98d0a2a901485a5',
                    'action' => 'upload',
                    'source' => $img,
                    'format' => 'json',
                ]
            ]);
            $array = json_decode($res->getBody()->getContents());
            $image = $array->image->file->resource->chain->image;
        }

        $user = User::where('id', Auth::user()->id)->first();
        $user->email = request('email') ?? $user->email;
        $user->name = request('name') ?? $user->name;
        $user->photo = $image ?? $user->photo;
        $user->phone = request('phone') ?? $user->phone;
        $user->address = request('address') ?? $user->address;


        $user->update();
        return $this->responseOk($user, 200, 'Your profile has been updated');
    }

    public function destroy()
    {
        $id = Auth::id();
        if ($user->hasRole(['pengurus1', 'pengurus2', 'bendahara', 'admin'])) {
            return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        }else {
            $user = User::find($id)->delete();
            return $this->responseOk('Profile has been Deleted', 200);
        }
    }

    public function change(Request $request)
    {
        if (Auth::user()->hasRole(['pengurus1', 'pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $user = User::where('id', Auth::user()->id)->first();
        if (!empty($user)) {
            if (password_verify($request->password, $user->password)) {
                $user->password = $request->password_change;
                if (!empty($request->password_change)) {
                    $user->password = Hash::make($request->password_change);
                }
                $user->update();
                return $this->responseOk($user, 200, 'password changed successfully');
            } else {
                return $this->responseError('enter the password correctly', 400);
            }
        }
    }
}
