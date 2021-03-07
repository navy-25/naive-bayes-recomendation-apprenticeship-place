<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class magang extends Model
{
    use HasFactory;
    protected $table = 'magang';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_users',
        'lokasi',
        'kota',
        'alamat',
    ];
}
