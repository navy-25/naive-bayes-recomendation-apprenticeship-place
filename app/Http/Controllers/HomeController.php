<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $user = \App\Models\User::all();
        $user_login = \App\Models\User::find(Auth::user()->id);
        return view('profile.home',compact('user','user_login'));
    }
    public function laporan() {
        $laporan = \App\Models\laporan::where('id_user',Auth::user()->id)->get();
        $magang_all =  \App\Models\magang::all();
        for ($i = 0;$i<count($magang_all);$i++){
            if($magang_all[$i]->id_users == Auth::user()->id){
                $id_magang = $magang_all[$i]->id;
                $data_magang = \App\Models\magang::find($id_magang);
                $status_magang = "Aktif";
                return view('user.laporan.index',compact('laporan','data_magang','status_magang'));
            }
        }
        $status_magang = "NonAktif";
        return view('user.laporan.index',compact('laporan','status_magang'));
    }
    public function magang() {
        $magang = \App\Models\magang::all();
        $user_login = \App\Models\User::find(Auth::user()->id);
        return view('user.magang.index',compact('magang','user_login'));
    }
    public function list_tempat_magang(Request $request)
    {
        $cari = $request->cari;
        if($cari != null){
            $tempat_magang = \App\Models\lokasi::where('nama','like',"%".$cari."%")
                ->orWhere('alamat','like',"%".$cari."%")
                ->get();
        }else{
            $tempat_magang = \App\Models\lokasi::all();
        }
        return  view('user.magang.list_tempat',compact('tempat_magang'));
    }
    public function nilai_si() {
        $nilai = \App\Models\nilai::all();
        $user_login = \App\Models\User::find(Auth::user()->id);
        $PS = \App\Models\Program_Studi::find(Auth::user()->program_studi);
        $PS_user = $PS->id;
        $panjang = count($nilai);
        // dd($PS_user);
        if($panjang==0){
            $nilai_baru = \App\Models\nilai::create([        
                'id_user'  => Auth::user()->id,
            ]);
            if($PS_user == 1){
                return view('user.magang.nilaiSI',compact('user_login','nilai_baru'));
            }elseif($PS_user == 2){
                return view('user.magang.nilaiTI',compact('user_login','nilai_baru'));
            }elseif($PS_user == 3){
                return view('user.magang.nilaiMI',compact('user_login','nilai_baru'));
            }elseif($PS_user == 4){
                return view('user.magang.nilaiPTI',compact('user_login','nilai_baru'));
            }
        }else{
            for($i=0;$i<count($nilai);$i++){
                if($nilai[$i]->id_user==Auth::user()->id){
                    $id_user = $nilai[$i]->id;
                    $nilai_baru = \App\Models\nilai::find($id_user);
                    if($PS_user == 1){
                        return view('user.magang.nilaiSI',compact('user_login','nilai_baru'));
                    }elseif($PS_user == 2){
                        return view('user.magang.nilaiTI',compact('user_login','nilai_baru'));
                    }elseif($PS_user == 3){
                        return view('user.magang.nilaiMI',compact('user_login','nilai_baru'));
                    }elseif($PS_user == 4){
                        return view('user.magang.nilaiPTI',compact('user_login','nilai_baru'));
                    }
                }
            }
            $nilai_baru = \App\Models\nilai::create([        
                'id_user'  => Auth::user()->id,
            ]);
            if($PS_user == 1){
                return view('user.magang.nilaiSI',compact('user_login','nilai_baru'));
            }elseif($PS_user == 2){
                return view('user.magang.nilaiTI',compact('user_login','nilai_baru'));
            }elseif($PS_user == 3){
                return view('user.magang.nilaiMI',compact('user_login','nilai_baru'));
            }elseif($PS_user == 4){
                return view('user.magang.nilaiPTI',compact('user_login','nilai_baru'));
            }
        }
    }

    public function kelola_train_data() {
        // auto import SI
        $filepath = "dataset/Prodi SI.csv";
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;
        $filedata = fgetcsv($file,",");
        
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata );
            for ($c=0; $c < $num; $c++) {
               $importData_arr[$i][] = $filedata [$c];
               
            }
            $i++;
        }
        fclose($file);
        // dd($importData_arr);
        foreach($importData_arr as $importData){
            $insertData = array(
                'id_lokasi'  => $importData[7],
                'jenis_kelamin'  => $importData[0],
                'id_kota'  => $importData[8],
                'id_program_studi'  => $importData[1],
                'id_peminatan'  => $importData[2],
                'Nilai_SIE'  => $importData[3],
                'Nilai_MLP'  => $importData[4],
                'Nilai_MLTI'  => $importData[5],
                'Nilai_PITI'  => $importData[6],
                'Nilai_KK'  => "",
                'Nilai_KA'  => "",
                'Nilai_PAG'  => "",
                'Nilai_NKB'  => "",
                'Nilai_VVPL'  => "",
                'Nilai_JKKG'  =>"",
                'Nilai_KJK'  => "",
                'Nilai_MJ'  => "",
                'Nilai_PCD'  => "",
                'Nilai_TA'  =>"",
                'Nilai_MP'  => "",
                'Nilai_PBD'  =>"",
                'Nilai_PPF'  => "",
                'Nilai_JKL'  => "");
                \App\Models\train_data::insertData($insertData);
        }
        // auto import MI
        $filepath = "dataset/Prodi MI.csv";
        $file = fopen($filepath,"r");
        $importData_arr = array();
        $i = 0;
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            $num = count($filedata );
           
            for ($c=0; $c < $num; $c++) {
               $importData_arr[$i][] = $filedata [$c];
            }
            $i++;
        }
        // dd($importData_arr);
        fclose($file);
        foreach($importData_arr as $importData){
            $insertData = array(
                'id_lokasi'  => $importData[5],
                'jenis_kelamin'  => $importData[0],
                'id_kota'  => $importData[6],
                'id_program_studi'  => $importData[1],
                'id_peminatan'  => $importData[2],
                'Nilai_SIE'  => "",
                'Nilai_MLP'  => "",
                'Nilai_MLTI'  => "",
                'Nilai_PITI'  => "",
                'Nilai_KK'  => "",
                'Nilai_KA'  => "",
                'Nilai_PAG'  => "",
                'Nilai_NKB'  => "",
                'Nilai_VVPL'  => "",
                'Nilai_JKKG'  =>"",
                'Nilai_KJK'  => "",
                'Nilai_MJ'  => "",
                'Nilai_PCD'  => "",
                'Nilai_TA'  =>"",
                'Nilai_MP'  => "",
                'Nilai_PBD'  =>"",
                'Nilai_PPF'  => $importData[3],
                'Nilai_JKL'  => $importData[4]);
                \App\Models\train_data::insertData($insertData);
        }
         // auto import PTI
         $filepath = "dataset/Prodi PTI.csv";
         $file = fopen($filepath,"r");
         $importData_arr = array();
         $i = 0;
         while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($filedata);
            
             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
             }
             $i++;
         }
        //  dd($importData_arr);
         fclose($file);
         foreach($importData_arr as $importData){
             $insertData = array(
                 'id_lokasi'  => $importData[9],
                 'jenis_kelamin'  => $importData[0],
                 'id_kota'  => $importData[10],
                 'id_program_studi'  => $importData[1],
                 'id_peminatan'  => $importData[2],
                 'Nilai_SIE'  => "",
                 'Nilai_MLP'  => "",
                 'Nilai_MLTI'  => "",
                 'Nilai_PITI'  => "",
                 'Nilai_KK'  => "",
                 'Nilai_KA'  => "",
                 'Nilai_PAG'  => "",
                 'Nilai_NKB'  => "",
                 'Nilai_VVPL'  => "",
                 'Nilai_JKKG'  =>"",
                 'Nilai_KJK'  => $importData[3],
                 'Nilai_MJ'  => $importData[4],
                 'Nilai_PCD'  => $importData[5],
                 'Nilai_TA'  => $importData[6],
                 'Nilai_MP'  => $importData[7],
                 'Nilai_PBD'  => $importData[8],
                 'Nilai_PPF'  => "",
                 'Nilai_JKL'  => "");
                 \App\Models\train_data::insertData($insertData);
         }
         // auto import TI
         $filepath = "dataset/Prodi TI.csv";
         $file = fopen($filepath,"r");
         $importData_arr = array();
         $i = 0;
         while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
             $num = count($filedata);
            
             for ($c=0; $c < $num; $c++) {
                $importData_arr[$i][] = $filedata [$c];
             }
             $i++;
         }
        //  dd($importData_arr);
         fclose($file);
         foreach($importData_arr as $importData){
             $insertData = array(
                 'id_lokasi'  => $importData[9],
                 'jenis_kelamin'  => $importData[0],
                 'id_kota'  => $importData[10],
                 'id_program_studi'  => $importData[1],
                 'id_peminatan'  => $importData[2],
                 'Nilai_SIE'  => "",
                 'Nilai_MLP'  => "",
                 'Nilai_MLTI'  => "",
                 'Nilai_PITI'  => "",
                 'Nilai_KK'  => $importData[3],
                 'Nilai_KA'  => $importData[4],
                 'Nilai_PAG'  => $importData[5],
                 'Nilai_NKB'  => $importData[6],
                 'Nilai_VVPL'  =>$importData[7],
                 'Nilai_JKKG'  =>$importData[8],
                 'Nilai_KJK'  => "",
                 'Nilai_MJ'  =>"",
                 'Nilai_PCD'  => "",
                 'Nilai_TA'  =>"",
                 'Nilai_MP'  => "",
                 'Nilai_PBD'  =>"",
                 'Nilai_PPF'  => "",
                 'Nilai_JKL'  => "");
                 \App\Models\train_data::insertData($insertData);
         }
        $train_data = \App\Models\train_data::orderBy('id', 'DESC')->get();
        return view('admin.kelola_train_data',compact('train_data'));
    }
    public function kelola_user(Request $request) {
        $cari = $request->cari;
        if($cari != null){
            $user = \App\Models\user::where('name','like',"%".$cari."%")
                ->orWhere('nim',$cari)
                ->orderBy('id', 'DESC')
                ->get();
        }else{
            $user = \App\Models\user::orderBy('id', 'DESC')
                ->get();
        }
        return view('admin.kelola_user',compact('user'));
    }
    
    public function hapus_user($id)
    {
        $a = \App\Models\user::find($id);
        $a->delete($a);
        return redirect('/home/kelola-user')->with(['success' => 'Data berhasil dihapus']);
    }
    public function ganti_status($id)
    {
        $user = \App\Models\user::find($id);
        
        if($user->status == "Belom"){
            $data = [            
                'status'  => "Sudah",
            ];
        }elseif($user->status == "Sudah"){
            $data = [            
                'status'  => "Belom",
            ];
        }
        $magang = \App\Models\magang::all();
        for ($i = 0;$i<count($magang);$i++){
            if($magang[$i]->id_users == $user->id){
                $id_magang = $magang[$i]->id;
            }
        }
        $magang = \App\Models\magang::find($id_magang);
        $magang->delete($magang);

        $user->update($data);
        return redirect('/home/kelola-user')->with(['success' => 'Data berhasil dihapus']);
    }
    public function kelola_tempat(Request $request) {
        $cari = $request->cari;
        if($cari != null){
            $lokasi = \App\Models\lokasi::where('nama','like',"%".$cari."%")
                ->orderBy('id', 'DESC')
                ->paginate(10);
        }else{
            $lokasi = \App\Models\lokasi::orderBy('id', 'DESC')
                ->paginate(10);
        }
        return view('admin.kelola_tempat',compact('lokasi'));
    }
    public function hapus_tempat($id)
    {
        $a = \App\Models\lokasi::find($id);
        $a->delete($a);
        return redirect('/home/kelola-tempat-pi')->with(['success' => 'Data berhasil dihapus']);
    }
    public function toeditSI($id) {
        $lokasi = \App\Models\lokasi::find($id);
        return view('admin.edit_toeditSI',compact('lokasi'));
    }
    public function toeditTI($id) {
        $lokasi = \App\Models\lokasi::find($id);
        return view('admin.edit_toeditTI',compact('lokasi'));
    }
    public function toeditPTI($id) {
        $lokasi = \App\Models\lokasi::find($id);
        return view('admin.edit_toeditPTI',compact('lokasi'));
    }
    public function toeditMI($id) {
        $lokasi = \App\Models\lokasi::find($id);
        return view('admin.edit_toeditMI',compact('lokasi'));
    }

    public function kelola_fitur() {
        $Program_Studi = \App\Models\Program_Studi::all();
        $Peminatan = \App\Models\Peminatan::all(); 
        return view('admin.kelola_fitur',compact('Program_Studi','Peminatan'));
    }
    public function toeditProStud($id) {
        $Program_Studi = \App\Models\Program_Studi::find($id);
        return view('admin.edit_progstud',compact('Program_Studi'));
    }
    public function toeditPeminatan($id) {
        $Program_Studi = \App\Models\Program_Studi::all();
        $Peminatan = \App\Models\Peminatan::find($id);
        return view('admin.edit_peminatan',compact('Program_Studi','Peminatan'));
    }

    public function kelola_kota() {
        $kota = \App\Models\Kota::all(); 
        return view('admin.kelola_kota',compact('kota'));
    }
    public function toeditKota($id) {
        $Program_Studi = \App\Models\Program_Studi::all();
        $Peminatan = \App\Models\Peminatan::all(); 
        $Kota = \App\Models\Kota::find($id);
        return view('admin.edit_kota',compact('Kota','Program_Studi','Peminatan'));
    }
}
