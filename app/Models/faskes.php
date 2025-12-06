<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class faskes extends Model
{
    use HasFactory;
    protected $table = 'faskes';
    protected $fillable = [ 'id_faskes','name_f'];
}
