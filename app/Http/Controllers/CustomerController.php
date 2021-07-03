<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Customer;
use App\Kategori;
use App\Pesanan;
use App\Tracking;
use App\Garansi;
use App\Feedback;

use Auth;

class CustomerController extends Controller
{
	public function dashboard(){

		return view('auth.customer.dashboard');
	}

	public function order(){
		$kategoris = Kategori::limit(4)->get();
		$pesanan = Pesanan::where('id_customer', Auth::guard('customer')->user()->id)->get();

		return view('auth.customer.order', compact('kategoris','pesanan'));
	}

	public function pembayaran($id){
		$kategoris = Kategori::limit(4)->get();
		$pesanan = Pesanan::where('id', $id)->get();

		return view('auth.customer.pembayaran', compact('kategoris','pesanan'));
	}

	
	public function proses($id){
		$kategoris = Kategori::limit(4)->get();
		$pesanan = Pesanan::where('id', $id)->get();
		$tracking = Tracking::where('id_pesanan', $id)->get();
		$garansi = Garansi::where('id_pesanan', $id)->get();
		$feedback = Feedback::where('id_pesanan', $id)->get();

		$selesai_tes = Tracking::where('id_pesanan', $id)->where('status', 'Selesai')->count();
		$garansi_tes = Garansi::where('id_pesanan', $id)->count();
		$feedback_tes = Feedback::where('id_pesanan', $id)->count();

		return view('auth.customer.proses', compact('kategoris','pesanan','tracking','garansi','feedback','selesai_tes','garansi_tes','feedback_tes'));
	}

    // ACTION
	public function delete($id){
		$post = Customer::find($id);
		$post->delete();

		return redirect()->back();
	}

	public function edit(Request $request, $id){
		$post = Customer::find($id);

		$post->username = $request->username;
		$post->password = Hash::make($request->password);
		$post->email = $request->email;
		$post->notelp = $request->notelp;
		$post->alamat = $request->alamat;

		$post->save();

		return redirect()->back();
	}
	public function profile($id){
		$kategoris = Kategori::limit(4)->get();
		$data = Customer::find($id);

		return view('auth.customer.profile', compact('kategoris', 'data'));
	}

	public function profileEdit($id){
		$kategoris = Kategori::limit(4)->get();
		$data = Customer::find($id);

		return view('auth.customer.profile-edit', compact('kategoris', 'data'));
	}

	public function profileData($id,Request $request)
	{
		$post = Customer::find($id);

		$post->username = $request->username;
		if(is_null($request->password) == false){
			$post->password = Hash::make($request->password);
		}
		$post->email = $request->email;
		$post->notelp = $request->notelp;
		$post->alamat = $request->alamat;

		$post->save();

		return redirect()->route('home');
	}
}
