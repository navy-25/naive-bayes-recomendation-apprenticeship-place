<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    use HasFactory;
    protected $table = 'lokasi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama',
        'id_kota',
        'alamat',
        'kuota',
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
    public function getFoto(){
        if($this->foto != null){
            return asset('img/'.$this->foto);
        }else{
            return asset('img/noImage.jfif');
        }
    }
}
