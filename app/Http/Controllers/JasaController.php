<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jasa;
use Auth;

class JasaController extends Controller
{
	public function store(Request $request){
		$post = New Jasa();
		$post->id_mitra = $request->id_mitra;
		$post->nama = $request->nama;
		$post->id_kategori = $request->id_kategori;
		$post->deskripsi = $request->deskripsi;
		$post->harga = $request->harga;
		$post->ratting = 0;

		$gambar = $request->file('gambar');
		$nama_gambar = time() . '_' . '.' . $gambar->getClientOriginalExtension();
		$tujuan_upload 	= 'img/jasa';
		$gambar->move($tujuan_upload,$nama_gambar);
		$post->gambar ='/'.$tujuan_upload.'/'.$nama_gambar;

		$post->save();

		return redirect()->back();
	}

	public function edit(Request $request, $id){
		$post = Jasa::find($id);
		$post->id_mitra = $request->id_mitra;
		$post->nama = $request->nama;
		$post->id_kategori = $request->id_kategori;
		$post->deskripsi = $request->deskripsi;
		$post->harga = $request->harga;
		$post->ratting = $post->ratting;

		$gambar = $request->file('gambar');
		$nama_gambar = time() . '_' . '.' . $gambar->getClientOriginalExtension();
		$tujuan_upload 	= 'img/jasa';
		$gambar->move($tujuan_upload,$nama_gambar);
		$post->gambar ='/'.$tujuan_upload.'/'.$nama_gambar;

		$post->save();

		return redirect()->back();
	}

	public function delete($id){
		$post = Jasa::find($id);
		$post->delete();

		return redirect()->back();
	}
}
