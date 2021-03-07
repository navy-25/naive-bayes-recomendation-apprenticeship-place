<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_user',
        'Nilai_SIE',
        'Nilai_MLP',
        'Nilai_MLTI',
        'Nilai_PITI',

        'Nilai_KK',
        'Nilai_NKB',
        'Nilai_VVPL',
        'Nilai_KA',
        'Nilai_PAG',
        'Nilai_JKKG',

        'Nilai_KJK',
        'Nilai_MJ',
        'Nilai_PCD',
        'Nilai_TA',
        'Nilai_MP',
        'Nilai_PBD',

        'Nilai_PPF',
        'Nilai_JKL',

    ];
}
