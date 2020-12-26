<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\User;
use App\Models\Penulis;
use App\Exports\data_penulis;
use Maatwebsite\Excel\Facades\Excel;

class DashboardAdminController extends Controller
{
    public function tampilDashboardAdmin()
    {
        $user = auth()->user();
        $admin = $user->admin;
        $kategori = Kategori::withCount('post')->get();

        return view('admin.dashboard_admin', compact('user', 'admin', 'kategori'));
    }

    public function tampilFormEdit()
    {
        $user = auth()->user();
        $admin = $user->admin;

        return view('admin.edit_profil', compact('user', 'admin'));
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'nama' => ['required', 'max:30'],
            'email' => ['required', 'email'],
            'password' => ['nullable'],
        ]);

        $user = auth()->user();
        $admin = $user->admin;
        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $admin->save();
        $user->save();
        return back();
    }

    public function dataPenulis()
    {
        // SELECT * FROM Penulis
        $penulis = Penulis::all();

        return view('admin.data_penulis', compact('penulis'));
    }

    public function export()
	{
		return Excel::download(new data_penulis, 'datapenulis.xlsx');
	}


    public function tampilEditPassword($idpenulis)
    {
        $penulis = Penulis::find($idpenulis);
        return view('admin.edit_penulis', compact('penulis'));
    }

    public function editPassword(Request $request, $idpenulis)
    {
        $penulis = Penulis::find($idpenulis);
        $user = $penulis->user;
        $user->password = Hash::make($request->password);

        $user->save();
        return redirect('/admin/data_penulis');
    }

    public function linkStorage()
    {
        Artisan::call('storage:link');

        return back()->with('status', 'Storage linked');
    }
    
}
