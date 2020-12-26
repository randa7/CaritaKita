<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Kategori;
use App\Models\Komentar;

class HomeController extends Controller
{
    public function lihat()
    {
        // SELECT * FROM post
        $post = Post::all();
        $kategori = Kategori::all();

        $post = $post->reverse();

        return view('home', compact('post', 'kategori'));
    }

    public function sortKategori($idkategori)
    {
        $kategoriDipilih = Kategori::find($idkategori);
        $post = $kategoriDipilih->post;
        $kategori = Kategori::all();

        return view('home', compact('post', 'kategori', 'kategoriDipilih'));
    }

    public function detail($idpost)
    {
        $post = Post::find($idpost);

        return view('detailpost', compact('post'));
    }

    public function searching(Request $request)
    {

        $post = Post::where('judul', 'like', '%' . $request->pencarian . '%')->get();

        return view('pencarian', compact('post'));
    }

    public function tambahKomentar(Request $request, $idpost)
    {
        $request->validate([
            'isi' => ['required'],
        ]);

        $komentar = new Komentar();
        $komentar->isi = $request->isi;
        $komentar->idpenulis = auth()->user()->penulis->idpenulis;
        $komentar->idpost = $idpost;
        $komentar->tgl_update = new \DateTime();
        $komentar->save();

        return back();
    }
}
