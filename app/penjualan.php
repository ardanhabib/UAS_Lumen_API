<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    /**
     * @var string
     */
    protected $table = 'penjualan';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_penjualan', 'tanggal_penjualan', 'nama_kasir', 'nama_konsumen', 'no_meja', 'total', 'bayar',
    ];
}