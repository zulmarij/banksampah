<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = User::role('admin')->count();
        $bendahara = User::role('bendahara')->count();
        $pengurus2 = User::role('pengurus2')->count();
        $pengurus1 = User::role('pengurus1')->count();
        $nasabah = User::role('nasabah')->count();
        $total = User::count();
        $user = User::orderBy('id', 'DESC')->get();

        return view('admin.user.index', compact('user', 'total', 'nasabah', 'pengurus1', 'pengurus2', 'bendahara', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Role::pluck('name', 'name')->all();
        return view('admin.user.create', compact('role'));
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
            'role' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/user/create')
                ->withErrors($validator);
        } else {
            $user = new User();

            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->save();
            $user->assignRole(request('role'));

            alert::success('message', 'User Created');
            return redirect('admin/user');
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
        $role = Role::pluck('name','name')->all();
        $userrole = $user->role;

        return view('admin.user.edit', compact('user', 'role', 'userrole'));
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
            return redirect('admin/user/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            $user = User::find($id);

            $user->name = request('name');
            $user->email = request('email');
            $user->phone = request('phone');
            $user->address = request('address');

            if (!$request->file('photo')) {
                $user->photo = request('photoPath');
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
            $user->syncRoles(request('role')) ?? $user->getRoleNames();

            alert::success('message', 'User Updated');
            return redirect('admin/user');
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
        if ($user->hasRole('admin')) {
            alert::error('message', 'Admin User Cannot Be Deleted');
        } else {
            $user->delete();
            alert::success('message', 'User Removed');
        }
        return back();
    }
}
