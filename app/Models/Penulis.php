<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    use HasFactory;

    protected $table = 'penulis';

    protected $primaryKey = 'idpenulis';

    protected $fillable = ['alamat', 'kota', 'no_telp'];

    public $timestamps = false;

    public function post()
    {
        return $this->hasMany(Post::class, 'idpenulis', 'idpenulis');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
