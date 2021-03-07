<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminatan extends Model
{
    use HasFactory;
    protected $table = 'Peminatan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'id_program_studi'
    ];
}
