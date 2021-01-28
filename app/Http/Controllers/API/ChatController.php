<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Pusher\Pusher;
use App\Models\Chat;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;

class ChatController extends BaseController
{
    public function index()
    {
        if(Auth::user()->hasRole(['pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $my_id = Auth::user()->id;

        $from = User::select('users.id', 'users.name', 'users.photo')->distinct()
            ->join('chats', 'users.id', '=', 'chats.to')
            ->where('users.id', '!=', $my_id)
            ->where('chats.from', '=', $my_id)->get()->toArray();

        $to = User::select('users.id', 'users.name', 'users.photo')->distinct()
            ->join('chats', 'users.id', '=', 'chats.from')
            ->where('users.id', '!=', $my_id)
            ->where('chats.to', '=', $my_id)->get()->toArray();

        $data = array_unique(array_merge($from, $to), SORT_REGULAR);
        $users = array_values($data);
        return $this->responseOk($users);
    }

    public function getChat($user_id)
    {
        if(Auth::user()->hasRole(['pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $my_id = Auth::id();

        // update status terbaca dari user yang mengirim pesan
        Chat::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // ambil pesanya dari user yang di select
        $messages = Chat::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return $this->responseOk($messages);
    }

    public function sendChat(Request $request, $id)
    {
        if(Auth::user()->hasRole(['pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $from = Auth::id();
        $to = $id;
        $message = $request->message;

        $data = new Chat();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0;
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );

        $pusher = new Pusher(
            'ea9cc38ebb4b891afb5b',
            '858e6bc31a28a06e1073',
            '1131752', $options
        );

        $pusher->trigger('my-channel', 'my-event', $data);
        return $this->responseOk($data);
    }

    public function destroy($id)
    {
        if(Auth::user()->hasRole(['pengurus2', 'bendahara', 'admin'])) return $this->responseError('YOU DO NOT HAVE ACCESS HERE', 403);
        $user = Auth::id();
        $Message = Chat::find($id);
        $all = Chat::where('message', $Message->message)->where('created_at', $Message->creted_at);
        if ($Message->from != $user) {
            return $this->responseError('Not your message', 422);
        }
        if ($Message) {
            $Message->delete();
            $all->delete();
            return $this->responseOk($Message, 200, 'Message deleted successfully');
        }
        return $this->sendResponse('Failed to delete message', 400);
    }
}
