<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Message;
use App\Notifications\MessageSent;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{

	   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $users = User::where('id','!=',auth()->id())->get();
        return view('mensajes.create',compact('users'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'recipient_id'=>'required|exists:users,id',
            'body'=> 'required'
        ]);
        $message = Message::create([
            'sender_id'=> auth()->id(),
            'recipient_id'=> request('recipient_id'),
            'body' => request('body')
        ]);
        $recipient = User::find(request('recipient_id'));
        $recipient->notify(new MessageSent($message));
        
        return redirect()->back()->withInfo('Notificacion enviada correctamente');
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('mensajes.show',compact('message'));
    }
}
