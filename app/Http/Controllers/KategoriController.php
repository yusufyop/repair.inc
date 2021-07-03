<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;

class KategoriController extends Controller
{
	public function store(Request $request){
		$post = New Kategori();
		$post->nama = $request->nama;

		$gambar = $request->file('gambar');
		$nama_gambar = time() . '_' . '.' . $gambar->getClientOriginalExtension();
		$tujuan_upload 	= 'img/kategori';
		$gambar->move($tujuan_upload,$nama_gambar);
		$post->gambar ='/'.$tujuan_upload.'/'.$nama_gambar;

		$post->save();

		return redirect()->back();
	}

	public function edit(Request $request, $id){
		$post = Kategori::find($id);
		$post->nama = $request->nama;

		$gambar = $request->file('gambar');
		$nama_gambar = time() . '_' . '.' . $gambar->getClientOriginalExtension();
		$tujuan_upload 	= 'img/kategori';
		$gambar->move($tujuan_upload,$nama_gambar);
		$post->gambar ='/'.$tujuan_upload.'/'.$nama_gambar;

		$post->save();

		return redirect()->back();
	}

	public function delete($id){
		$post = Kategori::find($id);
		$post->delete();

		return redirect()->back();
	}
}
