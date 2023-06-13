<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_karyawan',
        'nama_karyawan',
        'alamat',
        'email',
        'no_telp',
        'gaji',
        
    ];

}
