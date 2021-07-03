<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Garansi;

class GaransiController extends Controller
{
	public function store(Request $request){
		$post = New Garansi();
		$post->id_pesanan = $request->id_pesanan;
		$post->garansi = $request->garansi;
		$post->save();

		return redirect('https://api.whatsapp.com/send?phone=+6282247100895&text=Halo admin, Saya mau mengajukan garansi');
	}

	public function edit(Request $request, $id){
		$post = Garansi::find($id);
		$post->id_pesanan = $request->id_pesanan;
		$post->garansi = $request->garansi;
		$post->save();

		return redirect('https://api.whatsapp.com/send?phone=+6282247100895&text=Halo admin, Saya mau mengajukan garansi');
	}

	public function delete($id){
		$post = Garansi::find($id);
		$post->delete();

		return redirect()->back();
	}
}
