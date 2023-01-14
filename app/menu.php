<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu extends Model
{
    /**
     * @var string
     */
    protected $table = 'menu';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_menu', 'kategori', 'nama_menu', 'harga', 'stok',
    ];
}