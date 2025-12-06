<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
  use HasFactory;
  protected $fillable = ['nip', 'nama', 'alamat', 'jk', 'spesialis'];
  protected $table = 'dokter';
  public $timestamps = false;
  
}
