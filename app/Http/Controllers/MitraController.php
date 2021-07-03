<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mitra;
use App\Jasa;
use App\Kategori;
use App\Pesanan;
use App\Tracking;
use Auth;

class MitraController extends Controller
{
	public function dashboard(){
		return view('auth.mitra.dashboard');
	}

	public function jasa(){
		$jasa = Jasa::where('id_mitra', Auth::guard('mitra')->user()->id)->get();
		$kategori = Kategori::all();

		return view('auth.mitra.jasa', compact('jasa','kategori'));
	}

	public function pesanan(){
		$jasa = Jasa::where('id_mitra', Auth::guard('mitra')->user()->id)->get();

		$jasas = [];

		foreach ($jasa as $key) {
			$jasas[] = [$key->id];	
		};

		$pesanans = [];

		$pesanan = Pesanan::whereIn('id_jasa', $jasas)->get();

		foreach ($pesanan as $key) {
			$pesanans[] = [$key->id];	
		};

		$tracking = Tracking::whereIn('id_pesanan', $pesanans)->get();

		return view('auth.mitra.pesanan', compact('pesanan','tracking'));
	}

    // ACTION
	public function store(Request $request){
		$post = New Mitra();
		$post->username = $request->username;
		$post->password = Hash::make($request->password);
		$post->nama = $request->nama;
		$post->notelp = $request->notelp;
		$post->rating = $request->rating;
		$post->descPerform = $request->descPerform;

		$post->save();

		return redirect()->back();
	}

	public function edit(Request $request, $id){
		$post = Mitra::find($id);
		$post->username = $request->username;
		$post->password = Hash::make($request->password);
		$post->nama = $request->nama;
		$post->notelp = $request->notelp;
		$post->rating = $request->rating;
		$post->descPerform = $request->descPerform;

		$post->save();

		return redirect()->back();
	}

	public function delete($id){
		$post = Mitra::find($id);
		$post->delete();

		return redirect()->back();
	}
}
