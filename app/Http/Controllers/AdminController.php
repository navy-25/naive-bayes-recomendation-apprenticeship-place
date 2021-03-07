<?php

namespace App\Http\Controllers;
use Exception;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function kelola_laporan(Request $request) {
        $cari = $request->cari;
        if($cari != null){
            $user = \App\Models\user::where('name','like',"%".$cari."%")
                ->orWhere('nim',$cari)
                ->orWhere('email','like',"%".$cari."%")
                ->orderBy('id', 'DESC')
                ->get();
        }else{
            $user = \App\Models\user::orderBy('id', 'DESC')
                ->get();
        }
        return view('admin.kelola_laporan',compact('user'));
    }
    public function edit_toLaporan($id) {
        $user = \App\Models\user::find($id);
        $laporan =  \App\Models\laporan::all();
        $magang_all =  \App\Models\magang::all();
        for ($i = 0;$i<count($magang_all);$i++){
            if($magang_all[$i]->id_users == $user->id){
                $id_magang = $magang_all[$i]->id;
            }
        }
        $data_magang =  \App\Models\magang::find($id_magang);
        return view('admin.edit_toLaporan',compact('laporan','data_magang','user'));
    }
    public function approve_laporan($id) {
        $laporan = \App\Models\laporan::find($id);        
            $data = [            
                'status' => 'A',
            ];
            $laporan->update($data);
        return redirect('/home/kelola-laporan/'.$laporan->id_user.'/edit_toLaporan')->with(['success' => 'Laporan berhasil di setujui']);
    }
    public function approve_all_laporan($id) {
        $user = \App\Models\user::find($id);
        $laporan =  \App\Models\laporan::all();
        for ($i = 0;$i<count($laporan);$i++){
            if($laporan[$i]->id_user == $user->id){
                $data_laporan = \App\Models\laporan::find($laporan[$i]->id);        
                $data = [            
                    'status' => 'A',
                ];
                $data_laporan->update($data);
            }
        }
        return redirect('/home/kelola-laporan/'. $user->id.'/edit_toLaporan')->with(['success' => 'Semua laporan berhasil di setujui']);
    }
    public function tambahProgramStudi(Request $request)
    {
        try{
            $Program_Studi = \App\Models\Program_Studi::create([        
                'nama'  => $request->nama
            ]);
            return redirect('/home/kelola-fitur')->with(['success' => 'Data berhasil ditambahkan']);
        }catch (Exception $e){
            return redirect('/home/kelola-fitur')->with(['gagal' => 'Data gagal ditambah (Data sudah ada !)']);
        }
    }
    public function updateProgramStudi(Request $request,$id)
    {
        try{
            $Program_Studi = \App\Models\Program_Studi::find($id);        
            $data = [            
                'nama' => $request->nama,
            ];
            $Program_Studi->update($data);
            return redirect('/home/kelola-fitur')->with(['success' => 'Data berhasil diperbarui']);
        }catch (Exception $e){
            return redirect('/home/kelola-fitur')->with(['gagal' => 'Data gagal diperbarui (Data sudah ada !)']);
        }
    }
    public function tambahPeminatan(Request $request)
    {
        try{
            $Peminatan = \App\Models\Peminatan::create([        
                'nama'  => $request->nama,
                'id_program_studi'  => $request->id_program_studi
            ]);
            return redirect('/home/kelola-fitur')->with(['success' => 'Data berhasil ditambahkan']);
        }catch (Exception $e){
            return redirect('/home/kelola-fitur')->with(['gagal' => 'Data gagal ditambah (Data sudah ada !)']);
        }
    }
    public function updatePeminatan(Request $request,$id)
    {
        try{
            $Peminatan = \App\Models\Peminatan::find($id);        
            $data = [            
                'nama' => $request->nama,
                'id_program_studi'  => $request->id_program_studi
            ];
            $Peminatan->update($data);
            return redirect('/home/kelola-fitur')->with(['success' => 'Data berhasil diperbarui']);
        }catch (Exception $e){
            return redirect('/home/kelola-fitur')->with(['gagal' => 'Data gagal diperbarui (Data sudah ada !)']);
        }
    }
    public function tambahKota(Request $request)
    {
        try{
            $kota = \App\Models\Kota::create([        
                'nama'  => $request->nama,
            ]);
            return redirect('/home/kelola-kota')->with(['success' => 'Data berhasil ditambahkan']);
        }catch (Exception $e){
            return redirect('/home/kelola-kota')->with(['gagal' => 'Data gagal ditambah (Data sudah ada !)']);
        }
    }
    public function updateKota(Request $request,$id)
    {
        try{
            $Kota = \App\Models\Kota::find($id);        
            $data = [            
                'nama' => $request->nama,
            ];
            $Kota->update($data);
            return redirect('/home/kelola-kota')->with(['success' => 'Data berhasil diperbarui']);
        }catch (Exception $e){
            return redirect('/home/kelola-kota')->with(['gagal' => 'Data gagal diperbarui (Data sudah ada !)']);
        }
    }
    public function tambahSI(Request $request)
    {
        try{
            $Program_Studi = \App\Models\Program_Studi::all();
            for($i = 0 ;$i < count($Program_Studi);$i++){
                if( $Program_Studi[$i]->nama == "Sistem Informasi"){
                    $id = $Program_Studi[$i]->id;
                }
            }
            $lokasi = \App\Models\lokasi::create([        
                'nama'  => $request->nama,
                'id_kota'  => $request->id_kota,
                'alamat'  => $request->alamat,
                'kuota'  => 0,
                'id_program_studi'  => $id,
                'id_peminatan'  => $request->id_peminatan,
                'Nilai_SIE'  => $request->Nilai_SIE,
                'Nilai_MLP'  => $request->Nilai_MLP,
                'Nilai_MLTI'  => $request->Nilai_MLTI,
                'Nilai_PITI'  => $request->Nilai_PITI
            ]);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('img/',$filename);
                $lokasi->foto = $request->file('foto')->getClientOriginalName();
                $lokasi->save();
            } 
            return redirect('/home/kelola-tempat-pi')->with(['success' => 'Data berhasil ditambahkan']);
        }catch (Exception $e){
            return redirect('/home/kelola-tempat-pi')->with(['gagal' => 'Data gagal ditambahkan (Data sudah ada !)']);
        }
    }
    public function updateSI(Request $request,$id)
    {
        try{
            $lokasi = \App\Models\lokasi::find($id);
            $data = [            
                'nama'  => $request->nama,
                'id_kota'  => $request->id_kota,
                'alamat'  => $request->alamat,
                'kuota'  => 0,
                'id_peminatan'  => $request->id_peminatan,
                'Nilai_SIE'  => $request->Nilai_SIE,
                'Nilai_MLP'  => $request->Nilai_MLP,
                'Nilai_MLTI'  => $request->Nilai_MLTI,
                'Nilai_PITI'  => $request->Nilai_PITI
            ];
            $lokasi->update($data);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('img/',$filename);
                $lokasi->foto = $request->file('foto')->getClientOriginalName();
                $lokasi->save();
            } 
            return redirect('/home/kelola-tempat-pi')->with(['success' => 'Data berhasil diperbarui']);
        }catch (Exception $e){
            return redirect('/home/kelola-tempat-pi')->with(['gagal' => 'Data gagal diperbarui (Data sudah ada !)']);
        }
    }
    public function tambahTI(Request $request)
    {
        try{
            $Program_Studi = \App\Models\Program_Studi::all();
            for($i = 0 ;$i < count($Program_Studi);$i++){
                if( $Program_Studi[$i]->nama == "Teknik Informatika"){
                    $id = $Program_Studi[$i]->id;
                }
            }
            $lokasi = \App\Models\lokasi::create([        
                'nama'  => $request->nama,
                'id_kota'  => $request->id_kota,
                'alamat'  => $request->alamat,
                'kuota'  => 0,
                'id_program_studi'  => $id,
                'id_peminatan'  => $request->id_peminatan,
                'Nilai_KK'  => $request->Nilai_KK,
                'Nilai_KA'  => $request->Nilai_KA,
                'Nilai_PAG'  => $request->Nilai_PAG,
                'Nilai_NKB'  => $request->Nilai_NKB,
                'Nilai_VVPL'  => $request->Nilai_VVPL,
                'Nilai_JKKG'  => $request->Nilai_JKKG
            ]);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('img/',$filename);
                $lokasi->foto = $request->file('foto')->getClientOriginalName();
                $lokasi->save();
            } 
            return redirect('/home/kelola-tempat-pi')->with(['success' => 'Data berhasil ditambahkan']);
        }catch (Exception $e){
            return redirect('/home/kelola-tempat-pi')->with(['gagal' => 'Data gagal ditambahkan (Data sudah ada !)']);
        }
    }
    public function updateTI(Request $request,$id)
    {
        try{
            $lokasi = \App\Models\lokasi::find($id);
            $data = [            
                'nama'  => $request->nama,
                'id_kota'  => $request->id_kota,
                'alamat'  => $request->alamat,
                'kuota'  => 0,
                'id_peminatan'  => $request->id_peminatan,
                'Nilai_KK'  => $request->Nilai_KK,
                'Nilai_KA'  => $request->Nilai_KA,
                'Nilai_PAG'  => $request->Nilai_PAG,
                'Nilai_NKB'  => $request->Nilai_NKB,
                'Nilai_VVPL'  => $request->Nilai_VVPL,
                'Nilai_JKKG'  => $request->Nilai_JKKG
            ];
            $lokasi->update($data);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('img/',$filename);
                $lokasi->foto = $request->file('foto')->getClientOriginalName();
                $lokasi->save();
            } 
            return redirect('/home/kelola-tempat-pi')->with(['success' => 'Data berhasil diperbarui']);
        }catch (Exception $e){
            return redirect('/home/kelola-tempat-pi')->with(['gagal' => 'Data gagal diperbarui (Data sudah ada !)']);
        }
    }
    public function tambahPTI(Request $request)
    {
        try{
            $Program_Studi = \App\Models\Program_Studi::all();
            for($i = 0 ;$i < count($Program_Studi);$i++){
                if( $Program_Studi[$i]->nama == "Pendidikan Teknologi Informasi"){
                    $id = $Program_Studi[$i]->id;
                }
            }
            $lokasi = \App\Models\lokasi::create([        
                'nama'  => $request->nama,
                'id_kota'  => $request->id_kota,
                'alamat'  => $request->alamat,
                'kuota'  => 0,
                'id_program_studi'  => $id,
                'id_peminatan'  => $request->id_peminatan,
                'Nilai_KJK'  => $request->Nilai_KJK,
                'Nilai_MJ'  => $request->Nilai_MJ,
                'Nilai_PCD'  => $request->Nilai_PCD,
                'Nilai_TA'  => $request->Nilai_TA,
                'Nilai_MP'  => $request->Nilai_MP,
                'Nilai_PBD'  => $request->Nilai_PBD
            ]);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('img/',$filename);
                $lokasi->foto = $request->file('foto')->getClientOriginalName();
                $lokasi->save();
            } 
            return redirect('/home/kelola-tempat-pi')->with(['success' => 'Data berhasil ditambahkan']);
        }catch (Exception $e){
            return redirect('/home/kelola-tempat-pi')->with(['gagal' => 'Data gagal ditambahkan (Data sudah ada !)']);
        }
    }
    public function updatePTI(Request $request,$id)
    {
        try{
            $lokasi = \App\Models\lokasi::find($id);
            $data = [            
                'nama'  => $request->nama,
                'id_kota'  => $request->id_kota,
                'alamat'  => $request->alamat,
                'kuota'  => 0,
                'id_peminatan'  => $request->id_peminatan,
                'Nilai_KJK'  => $request->Nilai_KJK,
                'Nilai_MJ'  => $request->Nilai_MJ,
                'Nilai_PCD'  => $request->Nilai_PCD,
                'Nilai_TA'  => $request->Nilai_TA,
                'Nilai_MP'  => $request->Nilai_MP,
                'Nilai_PBD'  => $request->Nilai_PBD
            ];
            $lokasi->update($data);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('img/',$filename);
                $lokasi->foto = $request->file('foto')->getClientOriginalName();
                $lokasi->save();
            } 
            return redirect('/home/kelola-tempat-pi')->with(['success' => 'Data berhasil diperbarui']);
        }catch (Exception $e){
            return redirect('/home/kelola-tempat-pi')->with(['gagal' => 'Data gagal diperbarui (Data sudah ada !)']);
        }
    }
    public function tambahMI(Request $request)
    {
        try{
            $Program_Studi = \App\Models\Program_Studi::all();
            for($i = 0 ;$i < count($Program_Studi);$i++){
                if( $Program_Studi[$i]->nama == "Manajemen Informatika"){
                    $id = $Program_Studi[$i]->id;
                }
            }
            $lokasi = \App\Models\lokasi::create([        
                'nama'  => $request->nama,
                'id_kota'  => $request->id_kota,
                'alamat'  => $request->alamat,
                'kuota'  => 0,
                'id_program_studi'  => $id,
                'Nilai_PPF'  => $request->Nilai_PPF,
                'Nilai_JKL'  => $request->Nilai_JKL,
            ]);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('img/',$filename);
                $lokasi->foto = $request->file('foto')->getClientOriginalName();
                $lokasi->save();
            } 
            return redirect('/home/kelola-tempat-pi')->with(['success' => 'Data berhasil ditambahkan']);
        }catch (Exception $e){
            return redirect('/home/kelola-tempat-pi')->with(['gagal' => 'Data gagal ditambahkan (Data sudah ada !)']);
        }
    }
    public function updateMI(Request $request,$id)
    {
        try{
            $lokasi = \App\Models\lokasi::find($id);
            $data = [            
                'nama'  => $request->nama,
                'id_kota'  => $request->id_kota,
                'alamat'  => $request->alamat,
                'kuota'  => 0,
                'Nilai_PPF'  => $request->Nilai_PPF,
                'Nilai_JKL'  => $request->Nilai_JKL,
            ];
            $lokasi->update($data);
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = $request->file('foto')->getClientOriginalName();
                $request->file('foto')->move('img/',$filename);
                $lokasi->foto = $request->file('foto')->getClientOriginalName();
                $lokasi->save();
            } 
            // dd($lokasi);
            return redirect('/home/kelola-tempat-pi')->with(['success' => 'Data berhasil diperbarui']);
        }catch (Exception $e){
            return redirect('/home/kelola-tempat-pi')->with(['gagal' => 'Data gagal diperbarui (Data sudah ada !)']);
        }
    }
}