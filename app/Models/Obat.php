<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    protected $table = 'obats';
    protected $fillable = [
        'kode_obat',
        'nama_obat',
        'jenis_obat',
        'dosis',
    ];
}
