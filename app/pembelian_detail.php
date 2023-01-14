<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian_detail extends Model
{
    /**
     * @var string
     */
    protected $table = 'pembelian_detail';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_pembelian', 'kode_bahan', 'jumlah', 'subtotal',
    ];
}