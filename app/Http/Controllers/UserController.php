<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use PDF;

class UserController extends Controller
{
    public function tambahNilai_SI(Request $request,$id)
    {
        $nilai = \App\Models\nilai::find($id);     
        if(Auth::user()->peminatan == 1){
            $data = [            
                'Nilai_SIE'  => $request->Nilai_SIE,
                'Nilai_MLP'  => $request->Nilai_MLP,
                'Nilai_MLTI'  => 0,
                'Nilai_PITI'  => 0,
            ];
        }else if(Auth::user()->peminatan == 2){
            $data = [            
                'Nilai_SIE'  => 0,
                'Nilai_MLP'  => 0,
                'Nilai_MLTI'  => $request->Nilai_MLTI,
                'Nilai_PITI'  => $request->Nilai_PITI
            ];
        }
        $nilai->update($data);
        return redirect('/home/nilai-si')->with(['success' => 'Nilai berhasil diperbarui']);
    }
    public function tambahNilai_TI(Request $request,$id)
    {
        $nilai = \App\Models\nilai::find($id);     
        if(Auth::user()->peminatan == 5){
            $data = [            
                'Nilai_KK'  =>$request->Nilai_KK,
                'Nilai_NKB'  => $request->Nilai_NKB,
                'Nilai_VVPL'  => 0,
                'Nilai_KA'  => 0,
                'Nilai_PAG'  => 0,
                'Nilai_JKKG'  => 0,
            ];
        }else if(Auth::user()->peminatan == 4){
            $data = [            
                'Nilai_KK'  => 0,
                'Nilai_NKB'  =>  0,
                'Nilai_VVPL'  =>$request->Nilai_VVPL,
                'Nilai_KA'  => 0,
                'Nilai_PAG'  =>$request->Nilai_PAG,
                'Nilai_JKKG'  => 0,
            ];
        }else if(Auth::user()->peminatan == 3){
            $data = [            
                'Nilai_KK'  =>0,
                'Nilai_NKB'  => 0,
                'Nilai_VVPL'  =>0,
                'Nilai_KA'  =>$request->Nilai_KA,
                'Nilai_PAG'  =>0,
                'Nilai_JKKG'  =>$request->Nilai_JKKG,
            ];
        }
        $nilai->update($data);
        return redirect('/home/nilai-ti')->with(['success' => 'Nilai berhasil diperbarui']);
    }
    public function tambahNilai_MI(Request $request,$id)
    {
        $nilai = \App\Models\nilai::find($id);     
        $this->validate($request,[
            'Nilai_PPF'  => 'required',   
            'Nilai_JKL'  => 'required',   
        ]);
        $nilai->update($request->all());
        return redirect('/home/nilai-mi')->with(['success' => 'Nilai berhasil diperbarui']);
    }
    public function tambahNilai_PTI(Request $request,$id)
    {
        $nilai = \App\Models\nilai::find($id);     
        if(Auth::user()->peminatan == 8){
            $data = [            
                'Nilai_KJK'  =>$request->Nilai_KJK,
                'Nilai_MJ'  => $request->Nilai_MJ,
                'Nilai_PCD'  => 0,
                'Nilai_TA'  => 0,
                'Nilai_MP'  => 0,
                'Nilai_PBD'  => 0,
            ];
        }else if(Auth::user()->peminatan == 7){
            $data = [            
                'Nilai_KJK'  => 0,
                'Nilai_MJ'  =>  0,
                'Nilai_PCD'  =>$request->Nilai_PCD,
                'Nilai_TA'  =>$request->Nilai_TA,
                'Nilai_MP'  => 0,
                'Nilai_PBD'  => 0,
            ];
        }else if(Auth::user()->peminatan == 6){
            $data = [            
                'Nilai_KJK'  =>0,
                'Nilai_MJ'  => 0,
                'Nilai_PCD'  =>0,
                'Nilai_TA'  =>0,
                'Nilai_MP'  =>$request->Nilai_MP,
                'Nilai_PBD'  =>$request->Nilai_PBD,
            ];
        }
        $nilai->update($data);
        return redirect('/home/nilai-pti')->with(['success' => 'Nilai berhasil diperbarui']);
    }
    public function daftarMagang(Request $request)
    {
        $magang = \App\Models\magang::create([        
            'id_users'  => Auth::user()->id,
            'lokasi'  => $request->lokasi,
            'kota'  => $request->kota,
            'alamat'  => $request->alamat,
        ]);
        $user = \App\Models\user::find(Auth::user()->id);
        $data = [            
            'status'  => "Sudah",
        ];
        $user->update($data);

        if(Auth::user()->program_studi == 1){
            $ps = "SI";
        }elseif(Auth::user()->program_studi == 2){
            $ps = "TI";
        }elseif(Auth::user()->program_studi == 3){
            $ps = "MI";
        }elseif(Auth::user()->program_studi == 4){
            $ps = "PTI";
        }

        if(Auth::user()->peminatan == 1){
            $pm = "Enterprise";
        }elseif(Auth::user()->program_studi == 2){
            $pm = "Tata Kelola TI";
        }elseif(Auth::user()->program_studi == 3){
            $pm = "Jaringan Multimedia";
        }elseif(Auth::user()->program_studi == 4){
            $pm = "Teknologi Perangkat Lunak";
        }elseif(Auth::user()->program_studi == 5){
            $pm = "Computer Science";
        }elseif(Auth::user()->program_studi == 6){
            $pm = "Teknologi Multimedia";
        }elseif(Auth::user()->program_studi == 7){
            $pm = "Rekayasa Perangkat Lunak";
        }elseif(Auth::user()->program_studi == 8){
            $pm = "Teknologi Jaringan";
        }else{
            $pm = 0;
        }

        $nilai = \App\Models\nilai::all();
        for ($i=0 ;$i < count($nilai) ; $i++){
            if ($nilai[$i]->id_user == Auth::user()->id){
                $id_nilai = $nilai[$i]->id;
                $nilai_fix = \App\Models\nilai::find($id_nilai);
            }else{

            }
        }
        // dd($nilai_fix);
        $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
        $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
        
        for($i=0;$i<count($nilai);$i++){
            if($nilai_fix->Nilai_SIE==$nilai[$i]){
                $data1 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_MLP==$nilai[$i]){
                $data2 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_MLTI==$nilai[$i]){
                $data3 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_PITI==$nilai[$i]){
                $data4 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_KK==$nilai[$i]){
                $data5 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_NKB==$nilai[$i]){
                $data6 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_VVPL==$nilai[$i]){
                $data7 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_KA==$nilai[$i]){
                $data8 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_PAG==$nilai[$i]){
                $data9 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_JKKG==$nilai[$i]){
                $data10 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_KJK==$nilai[$i]){
                $data11 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_MJ==$nilai[$i]){
                $data12 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_PCD==$nilai[$i]){
                $data13 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_TA==$nilai[$i]){
                $data14 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_MP==$nilai[$i]){
                $data15 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_PBD==$nilai[$i]){
                $data16 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_PPF==$nilai[$i]){
                $data17 = $label_nilai[$i];
            }
            if($nilai_fix->Nilai_JKL==$nilai[$i]){
                $data18 = $label_nilai[$i];
            }
        }
        if(Auth::user()->peminatan == 1){
            $Nilai_SIE = $data1;
            $Nilai_MLP = $data2;
        }else{
            $Nilai_SIE = 0;
            $Nilai_MLP = 0;
        }
        if(Auth::user()->peminatan == 2){
            $Nilai_MLTI = $data3;
            $Nilai_PITI = $data4;
        }else {
            $Nilai_MLTI = 0;
            $Nilai_PITI = 0;
        }
        if(Auth::user()->peminatan == 5){
            $Nilai_KK = $data5;
            $Nilai_NKB = $data6;
        }else {
            $Nilai_KK = 0;
            $Nilai_NKB = 0;
        }
        if(Auth::user()->peminatan == 4){
            $Nilai_VVPL = $data7;
            $Nilai_PAG = $data8;
        }else {
            $Nilai_VVPL = 0;
            $Nilai_PAG = 0;
        }
        if(Auth::user()->peminatan == 3){
            $Nilai_KA = $data9;
            $Nilai_JKKG = $data10;
        }else {
            $Nilai_KA =0;
            $Nilai_JKKG = 0;
        }if(Auth::user()->peminatan == 8){
            $Nilai_KJK = $data11;
            $Nilai_MJ= $data12;
        }else {
            $Nilai_KJK = 0;
            $Nilai_MJ= 0;
        }if(Auth::user()->peminatan == 7){
            $Nilai_PCD = $data13;
            $Nilai_TA = $data14;
        }else {
            $Nilai_PCD = 0;
            $Nilai_TA =0;
        }if(Auth::user()->peminatan == 6){
            $Nilai_MP = $data15;
            $Nilai_PBD = $data16;
        }else {
            $Nilai_MP = 0;
            $Nilai_PBD = 0;
        }if(Auth::user()->peminatan == 0){
            $Nilai_PPF = $data17;
            $Nilai_JKL = $data18;
        }else{
            $Nilai_PPF = 0;
            $Nilai_JKL = 0;
        }

        $train_data = \App\Models\train_data::create([  
            'id_lokasi'  => $request->lokasi,
            'jenis_kelamin'  =>  Auth::user()->gender,
            'id_kota'  => $request->kota,
            'id_program_studi'  => $ps,
            'id_peminatan'  => $pm,
            'Nilai_SIE' => $Nilai_SIE,
            'Nilai_MLP' => $Nilai_MLP,
            'Nilai_MLTI' => $Nilai_MLTI,
            'Nilai_PITI' => $Nilai_PITI,

            'Nilai_KK' => $Nilai_KK,
            'Nilai_NKB' => $Nilai_NKB,
            'Nilai_VVPL' => $Nilai_VVPL,
            'Nilai_KA' => $Nilai_KA,
            'Nilai_PAG' => $Nilai_PAG,
            'Nilai_JKKG' => $Nilai_JKKG,

            'Nilai_KJK' => $Nilai_KJK,
            'Nilai_MJ' => $Nilai_MJ,
            'Nilai_PCD' => $Nilai_PCD,
            'Nilai_TA' => $Nilai_TA,
            'Nilai_MP' => $Nilai_MP,
            'Nilai_PBD' => $Nilai_PBD,

            'Nilai_PPF' => $Nilai_PPF,
            'Nilai_JKL' => $Nilai_JKL,
        ]);
        return redirect('/home/laporan');
    }
    public function daftar(Request $request,$id)
    {
        $lokasi = \App\Models\lokasi::find($id);
        $kota = \App\Models\kota::find($lokasi->id_kota);

        $magang = \App\Models\magang::create([        
            'id_users'  => Auth::user()->id,
            'lokasi'  => $lokasi->nama,
            'kota'  => $kota->nama,
            'alamat'  => $lokasi->alamat,
        ]);
        $user = \App\Models\user::find(Auth::user()->id);
        $data = [            
            'status'  => "Sudah",
        ];
        $user->update($data);
        return redirect('/home/laporan');
    }
    public function tambahlaporan(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $laporan = \App\Models\laporan::create([        
            'id_user'  => Auth::user()->id,
            'keterangan'  => $request->keterangan,
            'status' => 'NA',
        ]);
        return redirect('/home/laporan');
    }
    public function hapus_laporan($id)
    {
        $laporan = \App\Models\laporan::find($id);
        $laporan->delete($laporan);
        return redirect('/home/laporan');
    }
    public function download_pdf()
    {
        $laporan = \App\Models\laporan::where('id_user',Auth::user()->id)->get();
        $magang = \App\Models\magang::all();
        for ($i=0 ;$i < count($magang) ; $i++){
            if ($magang[$i]->id_users == Auth::user()->id){
                $id_magang = $magang[$i]->id;
            }else{
            }
        }
        $user = \App\Models\user::find(Auth::user()->id);
        $magang = \App\Models\magang::find($id_magang);
        $pdf = PDF::loadview('user.laporan.cetak',compact('laporan','magang','user'))->setPaper('A4','potrait');
        return $pdf->download('laporan-magang.pdf');
    }
    public function cetak()
    {
        $laporan = \App\Models\laporan::where('id_user',Auth::user()->id)->get();
        $magang = \App\Models\magang::all();
        for ($i=0 ;$i < count($magang) ; $i++){
            if ($magang[$i]->id_users == Auth::user()->id){
                $id_magang = $magang[$i]->id;
            }else{
            }
        }
        $user = \App\Models\user::find(Auth::user()->id);
        $magang = \App\Models\magang::find($id_magang);
        return view('user.laporan.cetak',compact('laporan','magang','user'));
        return $pdf->stream();
    }
}
