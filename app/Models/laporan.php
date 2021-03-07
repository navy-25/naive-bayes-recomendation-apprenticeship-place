<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class laporan extends Model
{
    use HasFactory;
    protected $table = 'laporan';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'keterangan',
        'status',
    ];
}