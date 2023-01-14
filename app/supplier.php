<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class supplier extends Model
{
    /**
     * @var string
     */
    protected $table = 'supplier';

    /**
     * @var array
     */
    protected $fillable = [
        'kode_supplier', 'nama_supplier', 'telepon', 'alamat',
    ];
}