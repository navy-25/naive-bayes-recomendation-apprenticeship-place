<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fieg\Bayes\Classifier;
use Fieg\Bayes\Tokenizer\WhitespaceAndPunctuationTokenizer;
use Auth;

class RekomendasiController extends Controller
{
    public function index(Request $request) {
        $tokenizer = new WhitespaceAndPunctuationTokenizer();
        $classifier = new Classifier($tokenizer);
        
        $train_data = \App\Models\train_data::all();
        // trainng data
        $cari = $request->cari;
        if($cari != 0 or $cari != null){
            for($i = 0; $i<count($train_data)-1;$i++){
                $y = $train_data[$i]->id_lokasi;
                $x1 = $train_data[$i]->id_kota;
                $x2 = $train_data[$i]->jenis_kelamin;
                $x4 = $train_data[$i]->id_program_studi;
                $x5 = $train_data[$i]->id_peminatan;
                $x6 = $train_data[$i]->Nilai_SIE;
                $x7 = $train_data[$i]->Nilai_MLP;
                $x8 = $train_data[$i]->Nilai_MLTI;
                $x9 = $train_data[$i]->Nilai_PITI;
                $x10 = $train_data[$i]->Nilai_KK;
                $x11 = $train_data[$i]->Nilai_NKB;
                $x12 = $train_data[$i]->Nilai_VVPL;
                $x13 = $train_data[$i]->Nilai_KA;
                $x14 = $train_data[$i]->Nilai_PAG;
                $x15 = $train_data[$i]->Nilai_JKKG;
                $x16 = $train_data[$i]->Nilai_KJK;
                $x17 =  $train_data[$i]->Nilai_MJ;
                $x18 =  $train_data[$i]->Nilai_PCD;
                $x19 =  $train_data[$i]->Nilai_TA;
                $x20 =  $train_data[$i]->Nilai_MP;
                $x21 =  $train_data[$i]->Nilai_PBD;
                $x22 = $train_data[$i]->Nilai_PPF;
                $x23 = $train_data[$i]->Nilai_JKL;
                $x = $x1.",".$x2.",".$x4.",".$x5.",".$x6.",".$x7.",".$x8.",".$x9.",".$x10.",".$x11.",".$x12.",".$x13.",".$x14.",".$x15.",".$x16.",".$x17.",".$x18.",".$x19.",".$x20.",".$x21.",".$x22.",".$x23;
                $classifier->train($y, $x);
            }
        }else{
            for($i = 0; $i<count($train_data)-1;$i++){
                $y = $train_data[$i]->id_lokasi;
                $x2 = $train_data[$i]->jenis_kelamin;
                $x4 = $train_data[$i]->id_program_studi;
                $x5 = $train_data[$i]->id_peminatan;
                $x6 = $train_data[$i]->Nilai_SIE;
                $x7 = $train_data[$i]->Nilai_MLP;
                $x8 = $train_data[$i]->Nilai_MLTI;
                $x9 = $train_data[$i]->Nilai_PITI;
                $x10 = $train_data[$i]->Nilai_KK;
                $x11 = $train_data[$i]->Nilai_NKB;
                $x12 = $train_data[$i]->Nilai_VVPL;
                $x13 = $train_data[$i]->Nilai_KA;
                $x14 = $train_data[$i]->Nilai_PAG;
                $x15 = $train_data[$i]->Nilai_JKKG;
                $x16 = $train_data[$i]->Nilai_KJK;
                $x17 =  $train_data[$i]->Nilai_MJ;
                $x18 =  $train_data[$i]->Nilai_PCD;
                $x19 =  $train_data[$i]->Nilai_TA;
                $x20 =  $train_data[$i]->Nilai_MP;
                $x21 =  $train_data[$i]->Nilai_PBD;
                $x22 = $train_data[$i]->Nilai_PPF;
                $x23 = $train_data[$i]->Nilai_JKL;
                $x = $x2.",".$x4.",".$x5.",".$x6.",".$x7.",".$x8.",".$x9.",".$x10.",".$x11.",".$x12.",".$x13.",".$x14.",".$x15.",".$x16.",".$x17.",".$x18.",".$x19.",".$x20.",".$x21.",".$x22.",".$x23;
                $classifier->train($y, $x);
            }
        }
        // preparation data test
        $user = \App\Models\user::find(Auth::user()->id);
        $ps = $user->program_studi;
        if($ps == 1){
            $program_studi = "SI";
        }elseif($ps == 2){
            $program_studi = "TI";
        }elseif($ps == 3){
            $program_studi = "MI";
        }elseif($ps == 4){
            $program_studi = "PTI";
        }else{
            $program_studi = "Kosong";
        }
        $data_nilai = \App\Models\nilai::all();
        $panjang = count($data_nilai);
        $id_nilai = 0;
        for($i=0 ; $i < $panjang ; $i++){
            if($user->id == $data_nilai[$i]->id_user){
                $id_nilai = $data_nilai[$i]->id;
            }
        }
        // cek input nilai 
        if($id_nilai == 0){
            return view('user.rekomendasi.errorNilai');
        }
        $nilai_user = \App\Models\nilai::find($id_nilai);
        $nilai = [];
        array_push($nilai,$nilai_user->Nilai_SIE);
        array_push($nilai,$nilai_user->Nilai_MLP);
        array_push($nilai,$nilai_user->Nilai_MLTI);
        array_push($nilai,$nilai_user->Nilai_PITI);
        array_push($nilai,$nilai_user->Nilai_KK);
        array_push($nilai,$nilai_user->Nilai_NKB);
        array_push($nilai,$nilai_user->Nilai_VVPL);
        array_push($nilai,$nilai_user->Nilai_KA);
        array_push($nilai,$nilai_user->Nilai_PAG);
        array_push($nilai,$nilai_user->Nilai_JKKG);
        array_push($nilai,$nilai_user->Nilai_KJK);
        array_push($nilai,$nilai_user->Nilai_MJ);
        array_push($nilai,$nilai_user->Nilai_PCD);
        array_push($nilai,$nilai_user->Nilai_TA);
        array_push($nilai,$nilai_user->Nilai_MP);
        array_push($nilai,$nilai_user->Nilai_PBD);
        array_push($nilai,$nilai_user->Nilai_PPF);
        array_push($nilai,$nilai_user->Nilai_JKL);
        $nilai_user = [];
        foreach($nilai as $n){
            if ($n ==null){
                $n = 0;
            }
            array_push($nilai_user,$n);
        }
        $a = $nilai_user[0].",".$nilai_user[1].",".$nilai_user[2].",".$nilai_user[3].",".$nilai_user[4].",".$nilai_user[5].",".$nilai_user[6].",".$nilai_user[7].",".$nilai_user[8].",".$nilai_user[9].",".$nilai_user[10];
        $b = $nilai_user[11].",".$nilai_user[12].",".$nilai_user[13].",".$nilai_user[14].",".$nilai_user[15].",".$nilai_user[16].",".$nilai_user[17];
        $nilai_test = $a.",".$b;

        $kota = \App\Models\kota::all();
        if($cari != 0 or $cari != null){
            for($i=0;$i<count($kota);$i++){
                if($kota[$i]->id == $cari){
                    $test = $kota[$i]->nama.",".$user->gender.",".$program_studi.",".$nilai_test;
                }
            }
        }else{
            $test = $user->gender.",".$program_studi.",".$nilai_test;
        }
        // mulai memprediksi
        $result = $classifier->classify($test);
       
        // keeping data hasil prediksi
        $lokasi = \App\Models\lokasi::all();
        $prediksi_lokasi = [];
        $akurasi_prediksi = [];
        
        foreach ($result as $i => $value) {
            array_push($prediksi_lokasi,$i);
            array_push($akurasi_prediksi,$value);
        }

        $id_lokasi_hasil_prediksi = [];
        $nama_lokasi_hasil_prediksi = [];
        $akurasi_hasil_prediksi = [];
        for($i=0;$i<count($prediksi_lokasi);$i++){
            for($k=0;$k<count($lokasi);$k++){
                if($prediksi_lokasi[$i] == $lokasi[$k]->nama){
                    array_push($id_lokasi_hasil_prediksi,$lokasi[$k]->id);
                    array_push($nama_lokasi_hasil_prediksi,$lokasi[$k]->nama);
                    array_push($akurasi_hasil_prediksi,$akurasi_prediksi[$i]);
                }
            }
        }
        $tempat_magang = \App\Models\lokasi::all();
        $kota = \App\Models\kota::all();
        $cari = $request->cari;
        if($cari != 0 or $cari != null){
            for($i=0;$i<count($kota);$i++){
                if($kota[$i]->id == $cari){
                    $filter = $kota[$i]->id;
                    $nama_kota = $kota[$i]->nama;
                    return  view('user.rekomendasi.filter',compact('nama_kota','filter','id_lokasi_hasil_prediksi','nama_lokasi_hasil_prediksi','akurasi_hasil_prediksi','tempat_magang'));
                }
            }
        }
        return  view('user.rekomendasi.index',compact('id_lokasi_hasil_prediksi','nama_lokasi_hasil_prediksi','akurasi_hasil_prediksi','tempat_magang'));
    }
}
