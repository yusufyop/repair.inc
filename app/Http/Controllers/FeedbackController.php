<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Feedback;

class FeedbackController extends Controller
{
	public function store(Request $request){
		$post = New Feedback();
		$post->id_pesanan = $request->id_pesanan;
		$post->feedback = $request->feedback;
		$post->save();

		return redirect()->back();
	}

	public function edit(Request $request, $id){
		$post = Feedback::find($id);
		$post->id_pesanan = $request->id_pesanan;
		$post->feedback = $request->feedback;
		$post->save();

		return redirect()->back();
	}

	public function delete($id){
		$post = Feedback::find($id);
		$post->delete();

		return redirect()->back();
	}
}
