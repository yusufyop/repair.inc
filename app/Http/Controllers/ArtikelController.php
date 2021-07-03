<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;

class ArtikelController extends Controller
{
	public function store(Request $request){
		$post = New Artikel();
		$post->judul = $request->judul;
		$post->artikel = $request->artikel;

		$gambar = $request->file('gambar');
		$nama_gambar = time() . '_' . '.' . $gambar->getClientOriginalExtension();
		$tujuan_upload 	= 'img/ahli';
		$gambar->move($tujuan_upload,$nama_gambar);
		$post->gambar ='/'.$tujuan_upload.'/'.$nama_gambar;

		$post->save();

		return redirect()->back();
	}

	public function edit(Request $request, $id){
		$post = Artikel::find($id);
		$post->judul = $request->judul;
		$post->artikel = $request->artikel;

		$gambar = $request->file('gambar');
		$nama_gambar = time() . '_' . '.' . $gambar->getClientOriginalExtension();
		$tujuan_upload 	= 'img/ahli';
		$gambar->move($tujuan_upload,$nama_gambar);
		$post->gambar ='/'.$tujuan_upload.'/'.$nama_gambar;

		$post->save();

		return redirect()->back();
	}

	public function delete($id){
		$post = Artikel::find($id);
		$post->delete();

		return redirect()->back();
	}
}
