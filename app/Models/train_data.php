<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class train_data extends Model
{
    use HasFactory;
    protected $table = 'train_data';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_lokasi',
        'jenis_kelamin',
        'id_kota',
        'id_program_studi',
        'id_peminatan',
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
    public static function insertData($data){

        $value = \App\Models\train_data::where('id_lokasi', $data['id_lokasi'])->get();
        if($value->count() == 0){
            \App\Models\train_data::insert($data);
        }
     }
}
