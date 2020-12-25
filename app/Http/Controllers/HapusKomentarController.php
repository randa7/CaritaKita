<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class HapusKomentarController extends Controller
{
    public function hapusKomentar($idkomentar) {
    	$komentar = Komentar::find($idkomentar);
    	if ($komentar) {
    		$komentar->delete();
        }
        return back();
    }
}
