<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Jasa;
use App\Artikel;
use App\Faq;

class HomeController extends Controller
{
	public function home(){
		$kategoris = Kategori::limit(4)->get();
		$jasa = Jasa::limit(8)->get();
		$artikel = Artikel::limit(8)->get();

		return view('auth.home.home', compact('kategoris','jasa','artikel'));
	}

	public function kategori(){
		$kategoris = Kategori::limit(4)->get();
		$kategori = Kategori::all();
		return view('auth.home.kategori', compact('kategori','kategoris'));
	}

	public function kategori_detail($id){
		$kategoris = Kategori::limit(4)->get();
		$kategori = Kategori::where('id', $id)->get();
		$jasa = Jasa::where('id_kategori', $id)->get();

		return view('auth.home.kategori-detail', compact('kategori','jasa','kategoris'));
	}

	public function jasa_detail($id){
		$kategoris = Kategori::limit(4)->get();
		$jasa = Jasa::where('id', $id)->get();

		return view('auth.home.jasa-detail', compact('jasa','kategoris'));
	}

	public function login(){
		$kategoris = Kategori::limit(4)->get();

		return view('auth.home.login', compact('kategoris'));
	}

	public function register(){
		$kategoris = Kategori::limit(4)->get();

		return view('auth.home.register', compact('kategoris'));
	}

	public function artikel(){
		$kategoris = Kategori::limit(4)->get();
		$artikel = Artikel::all();

		return view('auth.home.artikel', compact('artikel','kategoris'));
	}

	public function faq(){
		$kategoris = Kategori::limit(4)->get();
		$faq = Faq::get();

		return view('auth.home.faq', compact('faq', 'kategoris'));
	}

	public function artikel_detail($id){
		$kategoris = Kategori::limit(4)->get();
		$artikel = Artikel::where('id', $id)->get();
		$artikels = Artikel::limit(5)->get();

		return view('auth.home.artikel-detail', compact('artikel','kategoris','artikels'));
	}
}
