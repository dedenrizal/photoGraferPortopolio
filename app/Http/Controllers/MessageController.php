<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MessageController extends Controller
{
    public function index(){
        $messages = Message::all();
        return view('dashpesan',compact('messages'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'message' => 'required|string',
        ]);

        Message::create([
            'name' => $request->name, 
            'email' => $request->email, 
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Message sent successfully!');
    }


    public function destroy($id){
        try{
            $message = Message::findOrFail($id);
            $message->delete();
            return redirect()->route('dashpesan')->with('success','your message is compepletely send');
        }
        catch (ModelNotFoundException $e){
            return redirect()->route('dashpesan')->with('error','the text is not found');
            
        }catch (\Exception $e){
            return redirect()->route('dashpesan')->with('error', 'An error occurred while deleting the message.');
        }


    }
}

