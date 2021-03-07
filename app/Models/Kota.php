<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'Kota';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
    ];
}
