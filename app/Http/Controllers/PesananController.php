<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Pesanan;
use App\Pembayaran;
use App\Tracking;
use Auth;

class PesananController extends Controller
{
	public function store(Request $request){
		// PESANAN
		$pesanan = New Pesanan();
		$pesanan->id_jasa = $request->id_jasa;
		$pesanan->id_customer = Auth::guard('customer')->user()->id;
		$pesanan->status = 'Belum disetujui';
		$pesanan->save();

		// PEMBAYARAN
		$pembayaran = New Pembayaran();
		$pembayaran->id_pesanan = $pesanan->id;
		$pembayaran->kode_invoice = Str::random(10);
		$pembayaran->gambar = null;
		$pembayaran->status = 'Belum dibayar';
		$pembayaran->save();

		// TRACKING
		$tracking = New Tracking();
		$tracking->id_pesanan = $pesanan->id;
		$tracking->status = 'Order';
		$tracking->save();

		return redirect()->intended('/customer/pembayaran'.'/'.$pesanan->id);
	}

	public function setujui($id){
		$pesanan = Pesanan::find($id);
		$pesanan->status = 'Belum diproses';
		$pesanan->save();

		return redirect()->back();
	}

	public function tolak($id){
		$pesanan = Pesanan::find($id);
		$pesanan->status = 'Ditolak';
		$pesanan->save();

		return redirect()->back();
	}

	public function kirim_bukti(Request $request, $id){
		$pembayaran = Pembayaran::find($id);

		$pembayaran->id_pesanan = $pembayaran->id_pesanan;
		$pembayaran->kode_invoice = $pembayaran->kode_invoice;
		
		$gambar = $request->file('gambar');
		$nama_gambar = time() . '_' . '.' . $gambar->getClientOriginalExtension();
		$tujuan_upload 	= 'img/pembayaran';
		$gambar->move($tujuan_upload,$nama_gambar);
		$pembayaran->gambar ='/'.$tujuan_upload.'/'.$nama_gambar;

		$pembayaran->status = 'Proses Verifikasi';
		$pembayaran->save();

		$tracking = New Tracking();
		$tracking->id_pesanan = $pembayaran->id_pesanan;
		$tracking->status = 'Pembayaran';
		$tracking->save();

		return redirect()->intended('/customer/order');
	}

	public function konfirmasi_bayar(Request $request){
		$pembayaran = Pembayaran::find($request->id);
		$pembayaran->id_pesanan = $pembayaran->id_pesanan;
		$pembayaran->kode_invoice = $pembayaran->kode_invoice;
		$pembayaran->status = 'Terbayar';
		$pembayaran->save();

		$pesanan = Pesanan::find($pembayaran->id_pesanan);
		$pesanan->status = 'Sedang diproses';
		$pesanan->save();

		$tracking = New Tracking();
		$tracking->id_pesanan = $pembayaran->id_pesanan;
		$tracking->status = 'Proses';
		$tracking->save();

		return redirect()->back();
	}

	public function konfirmasi_selesai($id){
		$tracking = New Tracking();
		$tracking->id_pesanan = $id;
		$tracking->status = 'Selesai';
		$tracking->save();

		$pesanan = Pesanan::find($id);
		$pesanan->status = 'Selesai';
		$pesanan->save();

		return redirect()->back();
	}
}
