<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use PDF;




class PostinganPenulisController extends Controller
{
	public function formTambah()
	{
		$kategori = Kategori::all();

		return view('penulis.tambah_postingan', compact('kategori'));
	}

	public function tambahPost(Request $request)
	{

		$request->validate([
			'judul' => ['required'],
			'kategori' => ['required'],
			'isi' => ['required'],
			'gambar' => ['required', 'image'],
		]);


		$penulis = auth()->user()->penulis;

		$post = new Post();
		$post->judul = $request->judul;
		$post->idkategori = $request->kategori;
		$post->isipost = $request->isi;
		$post->file_gambar = $request->gambar->store('public/post');
		$post->tgl_insert = new \DateTime();
		$post->tgl_update = new \DateTime();

		$post->idpenulis = auth()->user()->penulis->idpenulis;
		$post->save();

		return redirect('penulis/post')->with('success', 'Post Berhasil ditambahkan!');
	}

	public function simpanEdit(Request $request, $idpost)
	{
		//validasi
		$request->validate([
			'judul' => ['required'],
			'kategori' => ['required'],
			'isi' => ['required'],
			'gambar' => ['nullable', 'image'],
		]);

		$post = Post::find($idpost);
		$post->judul = $request->judul;
		$post->idkategori = $request->kategori;
		$post->isipost = $request->isi;
		if ($request->gambar) {
			$post->file_gambar = $request->gambar->store('public/post');
		}

		$post->tgl_update = new \DateTime();


		$post->save();

		return redirect('penulis/post')->with('success', 'Post Berhasil diedit!');
	}

	public function generatePDF($idpost)
    {


		$post = Post::find($idpost);
        $pdf = PDF::loadView('cetak', compact('post'));
        return $pdf->download('postingan.pdf');
	}
	
}
