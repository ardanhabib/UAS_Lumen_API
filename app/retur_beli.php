<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class retur_beli extends Model
{
    /**
     * @var string
     */
    protected $table = 'retur_beli';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_pembelian', 'tanggal_retur', 'kode_bahan', 'jumlah_retur', 'keterangan', 'status_retur',
    ];
}