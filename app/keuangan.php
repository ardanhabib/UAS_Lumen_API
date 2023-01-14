<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class keuangan extends Model
{
    /**
     * @var string
     */
    protected $table = 'keuangan';

    /**
     * @var array
     */
    protected $fillable = [
        'id', 'tanggal', 'jam', 'nama_user', 'debit', 'kredit', 'keterangan',
    ];
}