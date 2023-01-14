<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class menu_bahan extends Model
{
    /**
     * @var string
     */
    protected $table = 'menu_bahan';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_menu', 'kode_bahan', 'jumlah',
    ];
}