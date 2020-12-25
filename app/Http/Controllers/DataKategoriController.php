<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class DataKategoriController extends Controller
{
    public function dataKategori()
    {
        // SELECT * FROM Kategori
        $kategori = Kategori::all();
        
        return view('admin.data_kategori', compact('kategori'));
    }

    public function Tambahkategori(Request $request)
	{
		$request->validate([
	    'nama' => 'required'],
		);

		$kategori = new Kategori();
		$kategori->nama = $request->nama;
		$kategori->save();

		return redirect('admin/data_kategori');
	}

	public function tampilEditKategori($idkategori)
	{
		$kategori = Kategori::find($idkategori);
		return view('admin.edit_kategori', compact('kategori'));
	}

	public function editKategori(Request $request, $idkategori)
	{
		$kategori = Kategori::find($idkategori);
	    $kategori->nama =$request->nama;

		$kategori->save();
		return redirect('/admin/data_kategori');
	}

	public function hapusKategori($idkategori) {
    	$kategori = Kategori::find($idkategori);
    	if ($kategori) {
    		$kategori->delete();
    	}

    	return redirect('/admin/data_kategori');
    }
}
