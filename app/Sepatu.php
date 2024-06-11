<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sepatu extends Model
{
    protected $table = 'sepatu';

    protected $fillable = [
        'jenis',
        'merek',
        'bahan',
        'harga',
        'ukuran',
        'gambar'
    ];
}
