<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ratting;

class RattingController extends Controller
{
    public function store(Request $request){
		$post = New Ratting();
		$post->id_customer = $request->id_customer;
		$post->id_jasa = $request->id_jasa;
		$post->id_pesanan = $request->id_pesanan;
		$post->ratting = $request->ratting;
		$post->save();

		return redirect()->back();
	}
}
