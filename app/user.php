<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    /**
     * @var string
     */
    protected $table = 'user';

    /**
     * @var array
     */
    protected $fillable = [
        'username', 'password', 'nama_user', 'hak_akses',
    ];
}