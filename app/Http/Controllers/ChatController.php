<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chat;

class ChatController extends Controller
{
    public function store(Request $request){
		$post = New Chat();
		$post->id_customer = $request->id_customer;
		$post->id_admin = $request->id_admin;
		$post->status = $request->status;
		$post->pesan = $request->pesan;
		$post->save();

		return redirect()->back();
	}
}
