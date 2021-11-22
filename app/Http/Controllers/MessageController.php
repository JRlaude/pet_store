<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('message.index');
    }
    public function create()
    {
        return view('message.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();
        return redirect('/message')->with('success', 'Message Sent');
    }
    public function show($id)
    {
        $message = Message::find($id);
        return view('message.show')->with('message', $message);
    }
    public function edit($id)
    {
        $message = Message::find($id);
        return view('message.edit')->with('message', $message);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $message = Message::find($id);
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();
        return redirect('/message')->with('success', 'Message Updated');
    }
    public function destroy($id)
    {
        $message = Message::find($id);
        $message->delete();
        return redirect('/message')->with('success', 'Message Removed');
    }
    
    public function getMessages()
    {
        $messages = Message::all();
        return response()->json($messages);
    }
    public function getMessage($id)
    {
        $message = Message::find($id);
        return response()->json($message);
    }
    public function deleteMessage($id)
    {
        $message = Message::find($id);
        $message->delete();
        return response()->json($message);
    }
    public function updateMessage(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $message = Message::find($id);
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();
        return response()->json($message);
    }
    public function createMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->message = $request->input('message');
        $message->save();
        return response()->json($message);
    }
    public function getMessagesByUser($id)
    {
        $messages = Message::where('user_id', $id)->get();
        return response()->json($messages);
    }
    public function getMessagesByEmail($email)
    {
        $messages = Message::where('email', $email)->get();
        return response()->json($messages);
    } 

}
