<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    /**
     * @var string
     */
    protected $table = 'pembelian';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_pembelian', 'tanggal_pembelian', 'kode_supplier', 'total', 'status_beli',
    ];
}