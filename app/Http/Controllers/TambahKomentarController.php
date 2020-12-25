<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class TambahKomentarController extends Controller
{
    public function tambahKomentar(Request $request, $idpost) {
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
