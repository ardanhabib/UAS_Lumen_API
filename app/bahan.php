<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bahan extends Model
{
    /**
     * @var string
     */
    protected $table = 'bahan';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_bahan', 'nama_bahan', 'minimum', 'stok', 'satuan', 'kode_supplier', 'berat', 'satuan_berat',
    ];
}