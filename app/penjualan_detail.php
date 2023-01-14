<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penjualan_detail extends Model
{
    /**
     * @var string
     */
    protected $table = 'penjualan_detail';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_penjualan', 'kode_menu', 'jumlah', 'subtotal',
    ];
}