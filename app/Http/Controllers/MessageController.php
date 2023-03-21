<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageResponse;
use App\Notifications\MessageSent;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){


        $users = User::where('id', '<>', auth()->user()->id)->get();

        $usuarios = auth()->user()->getRoleNames();

        foreach($usuarios as $roleName){
            if($roleName == 'Administrador'){
                $messages = Message::orderBy('id','desc')->get();
            }else{
                $messages = Message::where('from_user_id', auth()->user()->id)
                ->orderBy('id', 'desc')->get();
            }
        }
        return view('messages.index', compact('messages', 'users'));
    }

    public function show($message){
        $messages = Message::find($message);
        return view('messages.show', compact('messages'));
    }

    public function store(Request $request){

        $request->validate([
            'subject' => 'required',
            'body' => 'required',
            'to_user_id' => 'required|exists:users,id',
        ]);

        $message = Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'from_user_id' => auth()->user()->id,
            'to_user_id' => $request->to_user_id,
        ]);

        $user = User::find($request->to_user_id);
        $user->notify(new MessageSent($message));

        session()->flash('success', 'Mensaje enviado.');
        return redirect()->back();
    }

    public function sendMessage(Request $request){

        $request->validate([
            'subject' => 'required',
            'body' => 'required',
            'to_user_id' => 'required|exists:users,id',
        ]);

        $message = Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'from_user_id' => auth()->user()->id,
            'to_user_id' => $request->to_user_id,
        ]);

        $user = User::find($request->to_user_id);
        $user->notify(new MessageResponse($message));

        session()->flash('success', 'Mensaje enviado.');
        return redirect()->back();
    }



    public function destroy($id){
        $message = Message::find($id);

        $message->delete();
        session()->flash('success', 'Mensaje eliminado correctamente.');
        return redirect()->back();

    }
}
