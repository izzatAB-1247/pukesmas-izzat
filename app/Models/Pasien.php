<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasiens';

    protected $fillable = [
        'no_rm',
        'nama',
        'alamat',
        'jk',
        'tanggal_lahir',
        'no_telepon',
        'penyakit',
        'faskes_id', // WAJIB ditambahkan
    ];

    // Relasi ke tabel Faskes
    public function faskes()
    {
        return $this->belongsTo(Faskes::class, 'faskes_id');
    }
}
