<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenicatable;

class Petugas extends Authenicatable
{
    use HasFactory;
    
    protected $primaryKey = 'id_petugas';
    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level'
    ];
}
