<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\Kategori;

class DashboardPenulisController extends Controller
{
    public function index()
    {
        $totalTampilan = auth()->user()->penulis->post()->sum('tampilan');
        $totalPost = auth()->user()->penulis->post()->count();
        return view('penulis.dashboard_penulis', compact('totalTampilan', 'totalPost'));
    }

    public function tampilFormEdit()
    {
        $user = auth()->user();
        $penulis = $user->penulis;

        return view('penulis.edit_profil', compact('user', 'penulis'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'max:30'],
            'no_telp' => ['required', 'max:12'],
            'email' => ['required', 'email'],
            'password' => ['nullable'],
        ]);

        $user = auth()->user();
        $penulis = $user->penulis;
        $user->nama = $request->nama;
        $penulis->no_telp = $request->no_telp;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $penulis->alamat = $request->alamat;
        $penulis->kota = $request->kota;

        $penulis->save();
        $user->save();
        return back();
    }

    public function daftarPostingan()
    {
        $post = auth()->user()->penulis->post;

        return view('penulis.daftar_postingan', compact('post'));
    }

    public function hapus($idpost)
    {
        $post = Post::find($idpost);
        if ($post) {
            $post->delete();
        }

        return redirect('/penulis/post');
    }

    public function edit($idpost)
    {
        $post = Post::find($idpost);
        $kategori = Kategori::all();

        return view('penulis.edit_postingan', compact('post', 'kategori'));
    }
}
