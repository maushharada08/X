<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use Illuminate\Http\Request;

class ChatRoomsController extends Controller
{
    public function index(){
        return view('messages.index');
    }
}
