<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $primaryKey = 'idpost';

    public $timestamps = false;

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'idpenulis', 'idpenulis');
    }

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class, 'idkategori', 'idkategori');
	}

    public function komentar()
    {
        return $this->hasMany(Komentar::class, 'idpost', 'idpost');
    }
}
