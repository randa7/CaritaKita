<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $table = 'komentar';

    protected $primaryKey = 'idkomentar';

    public $timestamps = false;

    public function penulis()
    {
        return $this->belongsTo(Penulis::class, 'idpenulis', 'idpenulis');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'idpost', 'idpost');
    }
}
