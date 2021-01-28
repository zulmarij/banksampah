<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;

class TrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total = Trash::count();
        $trash = Trash::orderBy('id', 'DESC')->get();

        return view('admin.trash.index', compact('trash', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.trash.create');
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
            'trash' => 'required',
            'price' => 'required|integer',
            'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/trash/create')
                ->withErrors($validator);
        } else {
            $trash = new Trash();

            $trash->trash = request('trash');
            $trash->price = request('price');
            $image = base64_encode(file_get_contents(request('image')));
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
            $trash->image = $data->image->display_url;
            $trash->save();

            alert::success('message', 'Success Create Trash');
            return redirect('admin/trash');
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
        $trash = Trash::find($id);

        return view('admin.trash.show', compact('trash'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trash = Trash::find($id);

        return view('admin.trash.edit', compact('trash'));
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
            'trash' => 'required',
            'price' => 'required|integer',
            // 'image' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/trash/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            $trash = Trash::find($id);

            $trash->trash = request('trash');
            $trash->price = request('price');

            if (!$request->file('image')) {
                $image = request('imagePath');
            } else {
                $image = base64_encode(file_get_contents(request('image')));
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
                $trash->image = $data->image->display_url;
            }

            $trash->save();
            alert::success('message', 'Trash Updated');
            return redirect('admin/trash');
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
        $trash = Trash::find($id);
        $trash->delete();

        alert::success('message', 'Trash Removed');
        return redirect('admin/trash');
    }
}
