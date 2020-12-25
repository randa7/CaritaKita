<?php

namespace App\Exports;

use App\Models\Penulis;
use Maatwebsite\Excel\Concerns\FromCollection;

class data_penulis implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Penulis::all();
    }
}
