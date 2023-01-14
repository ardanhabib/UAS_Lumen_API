<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengeluaran extends Model
{
    /**
     * @var string
     */
    protected $table = 'pengeluaran';

    /**
     * @var array
     */
    protected $fillable = [
        'no_pengeluaran', 'tgl_pengeluaran', 'jam_pengeluaran', 'nama_user', 'jenis_pengeluaran', 'jumlah_pengeluaran', 'keterangan',
    ];
}