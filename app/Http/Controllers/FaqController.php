<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FaqController extends Controller
{
	//
	public function store(Request $request)
	{
		$post = new Faq();
		$post->questions = $request->questions;
		$post->answer = $request->answer;

		$post->save();

		return redirect()->back();
	}

	public function edit(Request $request, $id)
	{
		$post = Faq::find($id);
		$post->questions = $request->questions;
		$post->answer = $request->answer;

		$post->save();

		return redirect()->back();
	}

	public function delete($id)
	{
		$post = Faq::find($id);
		$post->delete();

		return redirect()->back();
	}
}
