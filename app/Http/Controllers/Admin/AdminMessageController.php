<?php

namespace App\Http\Controllers\Admin;

use App\Message as Message;
use Illuminate\Http\Request;
use App\Mail\ReplyToMessageMail as ReplyToMessageMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminMessageController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth:admin');
    }

    public function listmessage(){
        $messages = Message::orderBy('replied')->orderBy('created_at', 'DESC')->get();

        return view('functionalities.messages.listmessages', ["messages"=>$messages]);
    }

    public function createreply($id){
        $message = Message::find($id);
        return view('functionalities.messages.createreply', ["message"=>$message]);
    }

    public function reply(Request $request, $id){
        $message = Message::find($id);

        $data['receiver'] = $message->name;
        $email = $message->email;
        $data['subject'] = $request->input('subject');
        $data['message'] = $request->input('message');

        Mail::to($email)->send(new ReplyToMessageMail($data));

        $message->replied = true;

        $message->save();

        return redirect('/admin/messages')->with('success', 'Mail Sent');

    }
}
