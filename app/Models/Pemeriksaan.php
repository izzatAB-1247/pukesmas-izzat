<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    protected $table = 'pemeriksaans';

    protected $fillable = [
        'id_pemeriksaan',
        'no_rm',
        'nip',
        'id_faskes',
        'tanggal',
        'keluhan',
        'hasil',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'no_rm', 'no_rm');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'nip', 'nip');
    }

    public function faskes()
    {
        return $this->belongsTo(Faskes::class, 'id_faskes', 'id_faskes');
    }
}
