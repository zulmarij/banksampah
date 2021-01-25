<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Sale;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class BendaharaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role('bendahara')->latest()->get();

        return view('admin.bendahara.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bendahara.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:5',
        ]);

        if ($validator->fails()) {
            return redirect('admin/bendahara/create')
                ->withErrors($validator);
        } else {
            $user = new User();

            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->save();
            $user->assignRole('bendahara');

            alert::success('message', 'Success Create Nasabah');
            return redirect('admin/bendahara');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.bendahara.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email'   => 'string|min:5|max:50|email',
            'name'    => 'string|min:3',
            'phone'   => 'string|min:5',
            'address' => 'string|min:5|max:100'
        ]);

        if ($validator->fails()) {
            return redirect('admin/bendahara/'.$id.'/edit')
                ->withErrors($validator);
        } else {
            $user = User::find($id);

            $user->name = request('name');
            $user->email = request('email');
            $user->phone = request('phone');
            $user->address = request('address');

            if (!$request->file('photo')) {
                $photo = request('photoPath');
            } else {
                $image = base64_encode(file_get_contents(request('photo')));
                $client = new Client();
                $res = $client->request('POST', 'https://freeimage.host/api/1/upload', [
                    'form_params' => [
                        'key' => '6d207e02198a847aa98d0a2a901485a5',
                        'action' => 'upload',
                        'source' => $image,
                        'format' => 'json'
                    ]
                ]);

                $get = $res->getBody()->getContents();
                $data  = json_decode($get);
                $user->photo = $data->image->display_url;
            }

            $user->save();

            alert::success('message', 'User Data Changed Successfully');
            return redirect('admin/bendahara');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        alert::success('message', 'User Removed');
        return redirect('admin/bendahara');
    }

    public function saldo($id)
    {
        $penarikan = Penarikan::where('user id', $id)->get();
        $Saldo = Tabungan::where('user id', $id)->latest()->first('saldo');
        $tabungan = Tabungan::where('user id', $id)->get();

        // return view('', compact('Saldo','penarikan');
    }
}
