
@extends('layouts.master')

@section('kelola-rekom-active')
    active
@endsection

<?php
    $nilai = \App\Models\Nilai::all();
    for($i=0;$i<count($nilai);$i++){
        if ($nilai[$i]->id_user == Auth::user()->id){
            $id = $nilai[$i]->id;
        }
    }
    $nilai = \App\Models\Nilai::find($id);
    if ($nilai->Nilai_SIE == null AND $nilai->Nilai_MLP == null AND $nilai->Nilai_MLTI == null AND $nilai->Nilai_PITI == null AND $nilai->Nilai_KK == null AND $nilai->Nilai_NKB == null AND $nilai->Nilai_VVPL == null AND $nilai->Nilai_KA == null AND $nilai->Nilai_PAG == null AND $nilai->Nilai_JKKG == null AND $nilai->Nilai_KJK == null AND $nilai->Nilai_MJ == null AND $nilai->Nilai_PCD == null AND $nilai->Nilai_TA == null AND $nilai->Nilai_MP == null AND $nilai->Nilai_PBD == null AND $nilai->Nilai_PPF == null AND $nilai->Nilai_JKL == null){
       $status = "Nilai Kosong";
    }else{
        $status = "Nilai Tidak Kosong";
    }
    // print("Hasil Rekomendasi : <br>");
    // for($i=0;$i<count($id_lokasi_hasil_prediksi);$i++){
    //     if($akurasi_hasil_prediksi[$i] >= 0.5){
    //         print("(".$id_lokasi_hasil_prediksi[$i].")".$nama_lokasi_hasil_prediksi[$i]." = ".$akurasi_hasil_prediksi[$i]."<br>");
    //     }
    // }

    // print("<br><br>Rekomendasi Lainya : <br>");
    // for($i=0;$i<count($id_lokasi_hasil_prediksi);$i++){
    //     if($akurasi_hasil_prediksi[$i] <= 0.5){
    //         print("(".$id_lokasi_hasil_prediksi[$i].")".$nama_lokasi_hasil_prediksi[$i]." = ".$akurasi_hasil_prediksi[$i]."<br>");
    //     }
    // }
    // dd($id_lokasi_hasil_prediksi[0]);
?>
@section('content')
@if($status == "Nilai Tidak Kosong")
<?php
    // dd($test);
    $magang_all =  \App\Models\magang::all();
    for ($i = 0;$i<count($magang_all);$i++){
        if($magang_all[$i]->id_users == Auth::user()->id){
            $id_magang = $magang_all[$i]->id;
            $data_magang = \App\Models\magang::find($id_magang);
            $status_magang = "Aktif";
        }else{
            $status_magang = "NonAktif";
        }
    }
    if(count($magang_all)==0){
        $status_magang = "NonAktif";
    }
    $nilai =  \App\Models\nilai::all();
    $id_nilai = 0;
    if(count($nilai) != 0){
        for ($i = 0;$i<count($nilai);$i++){
            if($nilai[$i]->id_user == Auth::user()->id){
                $id_nilai = $nilai[$i]->id;
            }
        }
    }
?>
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-top:20px">
            <div class="row">
                <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                        <?php
                            $gender = Auth::user()->gender;
                            if($gender == 'L'){
                                $gender = "Laki - Laki";
                            }elseif($gender == 'P'){
                                $gender = "Perempuan";
                            }
                            $program_studi = \App\Models\Program_Studi::all();
                            for($i=0;$i<count($program_studi);$i++){
                                if($program_studi[$i]->id == Auth::user()->program_studi){
                                    $nama_program_studi = $program_studi[$i]->nama;
                                }
                            }
                            $peminatan = \App\Models\Peminatan::all();
                            for($i=0;$i<count($peminatan);$i++){
                                if($peminatan[$i]->id == Auth::user()->peminatan){
                                    $nama_peminatan = $peminatan[$i]->nama;
                                }elseif(Auth::user()->peminatan == 0){
                                    $nama_peminatan ="Tidak Ada";
                                }
                            }

                            $nilai = \App\Models\nilai::all();
                            for($i=0;$i<count($nilai);$i++){
                                if($nilai[$i]->id_user == Auth::user()->id){
                                    $Nilai_SIE = $nilai[$i]->Nilai_SIE;
                                    $Nilai_MLP = $nilai[$i]->Nilai_MLP;
                                    $Nilai_MLTI = $nilai[$i]->Nilai_MLTI;
                                    $Nilai_PITI = $nilai[$i]->Nilai_PITI;
                                    $Nilai_KK = $nilai[$i]->Nilai_KK;
                                    $Nilai_NKB = $nilai[$i]->Nilai_NKB;
                                    $Nilai_VVPL = $nilai[$i]->Nilai_VVPL;
                                    $Nilai_KA = $nilai[$i]->Nilai_KA;
                                    $Nilai_PAG = $nilai[$i]->Nilai_PAG;
                                    $Nilai_JKKG = $nilai[$i]->Nilai_JKKG;
                                    $Nilai_KJK = $nilai[$i]->Nilai_KJK;
                                    $Nilai_MJ = $nilai[$i]->Nilai_MJ;
                                    $Nilai_PCD = $nilai[$i]->Nilai_PCD;
                                    $Nilai_TA = $nilai[$i]->Nilai_TA;
                                    $Nilai_MP = $nilai[$i]->Nilai_MP;
                                    $Nilai_PBD = $nilai[$i]->Nilai_PBD;
                                    $Nilai_PPF = $nilai[$i]->Nilai_PPF;
                                    $Nilai_JKL = $nilai[$i]->Nilai_JKL;
                                }
                            }
                            $Kota = \App\Models\Kota::all();

                            $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
                            $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
                            
                            for($i=0;$i<count($nilai);$i++){
                                if($Nilai_SIE==$nilai[$i]){
                                    $data1 = $label_nilai[$i];
                                }
                                if($Nilai_MLP==$nilai[$i]){
                                    $data2 = $label_nilai[$i];
                                }
                                if($Nilai_MLTI==$nilai[$i]){
                                    $data3 = $label_nilai[$i];
                                }
                                if($Nilai_PITI==$nilai[$i]){
                                    $data4 = $label_nilai[$i];
                                }
                                if($Nilai_KK==$nilai[$i]){
                                    $data5 = $label_nilai[$i];
                                }
                                if($Nilai_NKB==$nilai[$i]){
                                    $data6 = $label_nilai[$i];
                                }
                                if($Nilai_VVPL==$nilai[$i]){
                                    $data7 = $label_nilai[$i];
                                }
                                if($Nilai_KA==$nilai[$i]){
                                    $data8 = $label_nilai[$i];
                                }
                                if($Nilai_PAG==$nilai[$i]){
                                    $data9 = $label_nilai[$i];
                                }
                                if($Nilai_JKKG==$nilai[$i]){
                                    $data10 = $label_nilai[$i];
                                }
                                if($Nilai_KJK==$nilai[$i]){
                                    $data11 = $label_nilai[$i];
                                }
                                if($Nilai_MJ==$nilai[$i]){
                                    $data12 = $label_nilai[$i];
                                }
                                if($Nilai_PCD==$nilai[$i]){
                                    $data13 = $label_nilai[$i];
                                }
                                if($Nilai_TA==$nilai[$i]){
                                    $data14 = $label_nilai[$i];
                                }
                                if($Nilai_MP==$nilai[$i]){
                                    $data15 = $label_nilai[$i];
                                }
                                if($Nilai_PBD==$nilai[$i]){
                                    $data16 = $label_nilai[$i];
                                }
                                if($Nilai_PPF==$nilai[$i]){
                                    $data17 = $label_nilai[$i];
                                }
                                if($Nilai_JKL==$nilai[$i]){
                                    $data18 = $label_nilai[$i];
                                }
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-3">
                                <label for="">Jenis Kelamin</label>
                                <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$gender}}" readonly>
                            </div>
                            <div class="col-md-3">
                                <!-- <label for="">Program Studi & Peminatan</label>
                                <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$nama_program_studi}} ({{$nama_peminatan}})" readonly> -->
                                <label for="">Program Studi</label>
                                <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$nama_program_studi}}" readonly>
                            </div>
                            @if(Auth::user()->program_studi == 1)
                                @if(Auth::user()->peminatan == 1)
                                <div class="col-md-3">
                                    <label for="">Sistem Informasi Enterprise</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data1}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Manajemen Layanan Pelanggan</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data2}}" readonly>
                                </div>
                                @elseif(Auth::user()->peminatan == 2)
                                <div class="col-md-3">
                                    <label for="">Manajemen Layanan TI</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data3}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Perencanaan Infrastruktur TI</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data4}}" readonly>
                                </div>
                                @endif
                            @elseif(Auth::user()->program_studi == 2)
                                @if(Auth::user()->peminatan == 5)
                                <div class="col-md-3">
                                    <label for="">Kecerdasan Komputasional</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data5}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Jaringan Nirkabel dan Komputasi Bergerak</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data6}}" readonly>
                                </div>
                                @elseif(Auth::user()->peminatan == 4)
                                <div class="col-md-3">
                                    <label for="">Pemrograman Animasi dan Game</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data7}} " readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Verifikasi dan Validasi Perangkat Lunak</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data8}}" readonly>
                                </div>
                                @elseif(Auth::user()->peminatan == 3)
                                <div class="col-md-3">
                                    <label for="">Komputasi Awan</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data9}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Jaringan Nirkabel dan Komputasi Gerak</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data10}}" readonly>
                                </div>
                                @endif
                            @elseif(Auth::user()->program_studi == 4)
                                @if(Auth::user()->peminatan == 8)
                                <div class="col-md-3">
                                    <label for="">Keamanan Jaringan Komputer</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data11}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Manajemen Jaringan</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data12}}" readonly>
                                </div>
                                @elseif(Auth::user()->peminatan == 7)
                                <div class="col-md-3">
                                    <label for="">Pengolahan Citra Digital</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data13}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Teknik Animsasi</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data14}}" readonly>
                                </div>
                                @elseif(Auth::user()->peminatan == 6)
                                <div class="col-md-3">
                                    <label for="">Manajemen Proyek</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data15}}" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Pemrograman Basis Data</label>
                                    <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data16}}" readonly>
                                </div>
                                @endif
                            @elseif(Auth::user()->program_studi == 3)
                            <div class="col-md-3">
                                <label for="">Prak Pemrograman Fremework</label>
                                <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data17}}" readonly>
                            </div>
                            <div class="col-md-3">
                                <label for="">Jaringan Komputer Lanjut</label>
                                <input name="password" style="margin-bottom:10px;" class="form-control" value = "{{$data18}}" readonly>
                            </div>
                            @endif
                        </div>
                    <form class="form-auth-small" method="POST" action="/home/rekomendasi/filter" enctype="multipart/form-data">
                        @csrf
                        <label for="">Filter Kota/Kabupaten</label>
                        <select id="car" name="cari"  class="form-control">
                            <option value="{{$filter}}">{{$nama_kota}}</option>
                            @foreach($Kota as $p)
                                <option value="{{$p->id}}">{{$p->nama}}</option>
                            @endforeach
                        </select>
                        <div class="button" style="margin-top:15px">
                            <button type="submit" style="border-radius:100px;width:150;background-color:#1ABB9C;color:white" class="btn"><i style="margin-right:10px" class="fa fa-search"></i> Cari</button>
                            <a href="/home/rekomendasi" style="border-radius:100px;width:150;background-color:#676a6d;color:white" class="btn">
                                <i style="margin-right:10px" class="fa fa-retweet"></i> 
                                Reset Filter
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@if($status_magang=="Aktif")
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="fa fa-times-circle" style="margin-right:10px"></i> Anda sudah daftar magang, Hubungi admin untuk proses penggantian tempat magang ! 
            </div>
        </div>
    </div>
</div>
@endif
@if($status_magang == "NonAktif")
<div class="container-fluid">
    <div class="panel panel-headline" style="background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
    <?php
            $lokasi = \App\Models\lokasi::all();
            $cek_null = count($lokasi);
            if($cek_null == 0){
                $list_magang = 0;
            }else{
                $list_magang = 1;
            }
        ?>
        <div class="panel-heading" style="padding-bottom:0px">
            <h3 class="panel-title" style="font-family:roboto;"><b><i style="margin-right:10px" class="lnr lnr-license"></i>Hasil Pencarian</b> </h3>
           
            @if ($list_magang == 0)
                <div class="alert alert-danger alert-dismissible" style="margin-top:20px" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <i class="fa fa-times-circle" style="margin-right:10px"></i>Data tempat magang Kosong, Hubungi admin !
                </div>
            @endif
        </div>
       <?php
           $alert = 0;
       ?>
        @for($i =0; $i < count($id_lokasi_hasil_prediksi)-1; $i++) 
            @foreach($tempat_magang as $x) 
                @if($id_lokasi_hasil_prediksi[$i] == $x->id AND $akurasi_hasil_prediksi[$i]>=0.4)
                    <?php
                        $akurasi = number_format(($akurasi_hasil_prediksi[$i]*100)+10-($i*3),2);
                        $pm = Auth::user()->peminatan;
                        $ps = Auth::user()->program_studi;

                        // dd($filter,$x->id_kota);
                    ?>
                    @if($x->id_kota == $filter)
                        <?php
                            $alert++;
                        ?>
                        @if($x->id_program_studi == $pm AND $x->id_peminatan == $ps)
                            <form action="/home/magang/list_tempat/{{$x->id}}/daftar" method="POST">
                                @csrf
                                <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:5px;padding-top:5px">
                                    <div class="row">
                                        <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="profile" style="border-radius:5px" width="100%" height="100px" src="{{$x->getFoto()}}" alt="" ></td>
                                                </div>
                                                <div class="col-md-8">
                                                    <p style="font-size:20px;margin:0px">
                                                        <b>
                                                            {{$x->nama}}
                                                        </b>
                                                    </p>
                                                    <!-- <span style="font-size:13px" class="label label-primary">Sisa {{$x->kuota}} Orang</span> -->
                                                    <!-- <span style="font-size:13px;background-color:#1ABB9C" class="label label-primary">Acc : {{$akurasi}}%</span> -->
                                                    <p style="font-size:10;margin-top:10px">
                                                        <i style="margin-right:10px" class="fa fa-map"></i> {{$x->alamat}}
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="button" style="margin-top:15px">
                                                        <button type="submit" style="border-radius:100px;width:100%;background-color:#EC9126;color:white" class="btn">
                                                            <i style="margin-right:10px" class="fa fa-check-circle"></i> 
                                                            Pilih
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> 
                        @endif
                        @if($x->id_program_studi != $pm AND $x->id_peminatan != $ps)
                            <form action="/home/magang/list_tempat/{{$x->id}}/daftar" method="POST">
                                @csrf
                                <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:5px;padding-top:5px">
                                    <div class="row">
                                        <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="profile" style="border-radius:5px" width="100%" height="100px" src="{{$x->getFoto()}}" alt="" ></td>
                                                </div>
                                                <div class="col-md-8">
                                                    <p style="font-size:20px;margin:0px">
                                                        <b>
                                                            {{$x->nama}}
                                                        </b>
                                                    </p>
                                                    <!-- <span style="font-size:13px" class="label label-primary">Sisa {{$x->kuota}} Orang</span> -->
                                                    <!-- <span style="font-size:13px;background-color:#1ABB9C" class="label label-primary">Acc : {{$akurasi}}%</span> -->
                                                    <p style="font-size:10;margin-top:10px">
                                                        <i style="margin-right:10px" class="fa fa-map"></i> {{$x->alamat}}
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="button" style="margin-top:15px">
                                                        <button type="submit" style="border-radius:100px;width:100%;background-color:#EC9126;color:white" class="btn">
                                                            <i style="margin-right:10px" class="fa fa-check-circle"></i> 
                                                            Pilih
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endif
                @endif
            @endforeach
        @endfor
        
        @if($alert == 0)
            <div class="alert alert-danger alert-dismissible" style="margin-left:30px;margin-right:30px;" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <i class="fa fa-times-circle" style="margin-right:10px"></i>Tidak ditemukan !
            </div>
        @endif
        <div class="panel-heading" style="padding-bottom:0px">
            <h3 class="panel-title" style="font-family:roboto;"><b><i style="margin-right:10px" class="lnr lnr-bookmark"></i>Rekomendasi Kota/Kabupaten lain</b> </h3>
           
            @if ($list_magang == 0)
                <div class="alert alert-danger alert-dismissible" style="margin-top:20px" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <i class="fa fa-times-circle" style="margin-right:10px"></i>Data tempat magang Kosong, Hubungi admin !
                </div>
            @endif
        </div>
        <?php
           $alert = 0;
        ?>
        @for($i =0; $i < count($id_lokasi_hasil_prediksi)-1; $i++) 
            @foreach($tempat_magang as $x) 
                @if($id_lokasi_hasil_prediksi[$i] == $x->id AND $akurasi_hasil_prediksi[$i]>=0.2)
                    <?php
                        $akurasi = number_format(($akurasi_hasil_prediksi[$i]*100)+10-($i*3),2);
                        $pm = Auth::user()->peminatan;
                        $ps = Auth::user()->program_studi;

                    ?>
                    @if($x->id_kota != $filter)
                        <?php
                            $alert++;
                        ?>
                        @if($x->id_program_studi == $pm AND $x->id_peminatan == $ps)
                            <form action="/home/magang/list_tempat/{{$x->id}}/daftar" method="POST">
                                @csrf
                                <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:5px;padding-top:5px">
                                    <div class="row">
                                        <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="profile" style="border-radius:5px" width="100%" height="100px" src="{{$x->getFoto()}}" alt="" ></td>
                                                </div>
                                                <div class="col-md-8">
                                                    <p style="font-size:20px;margin:0px">
                                                        <b>
                                                            {{$x->nama}}
                                                        </b>
                                                    </p>
                                                    <p style="font-size:10;margin-top:10px">
                                                        <i style="margin-right:10px" class="fa fa-map"></i> {{$x->alamat}}
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="button" style="margin-top:15px">
                                                        <button type="submit" style="border-radius:100px;width:100%;background-color:#EC9126;color:white" class="btn">
                                                            <i style="margin-right:10px" class="fa fa-check-circle"></i> 
                                                            Pilih
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> 
                        @endif
                        @if($x->id_program_studi != $pm AND $x->id_peminatan != $ps)
                            <form action="/home/magang/list_tempat/{{$x->id}}/daftar" method="POST">
                                @csrf
                                <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:5px;padding-top:5px">
                                    <div class="row">
                                        <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <img class="profile" style="border-radius:5px" width="100%" height="100px" src="{{$x->getFoto()}}" alt="" ></td>
                                                </div>
                                                <div class="col-md-8">
                                                    <p style="font-size:20px;margin:0px">
                                                        <b>
                                                            {{$x->nama}}
                                                        </b>
                                                    </p>
                                                    <!-- <span style="font-size:13px" class="label label-primary">Sisa {{$x->kuota}} Orang</span> -->
                                                    <!-- <span style="font-size:13px;background-color:#1ABB9C" class="label label-primary">Acc : {{$akurasi}}%</span> -->
                                                    <p style="font-size:10;margin-top:10px">
                                                        <i style="margin-right:10px" class="fa fa-map"></i> {{$x->alamat}}
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="button" style="margin-top:15px">
                                                        <button type="submit" style="border-radius:100px;width:100%;background-color:#EC9126;color:white" class="btn">
                                                            <i style="margin-right:10px" class="fa fa-check-circle"></i> 
                                                            Pilih
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    @endif
                @endif
            @endforeach
        @endfor
        
        @if($alert == 0)
            <div class="alert alert-danger alert-dismissible" style="margin-left:30px;margin-right:30px;" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <i class="fa fa-times-circle" style="margin-right:10px"></i>Tidak ditemukan !
            </div>
        @endif
        <div class="panel-heading" style="padding-bottom:0px">
            @if ($list_magang == 0)
                <div class="alert alert-danger alert-dismissible" style="margin-top:20px" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <i class="fa fa-times-circle" style="margin-right:10px"></i>Data tempat magang Kosong, Hubungi admin !
                </div>
            @endif
        </div>
    </div>
</div>
@endif
@elseif($status == "Nilai Kosong")
<div class="container-fluid">
    <div class="alert alert-danger alert-dismissible" style="margin-top:20px" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <i class="fa fa-times-circle" style="margin-right:10px"></i>Nilai Belum dilengkapi !
        @if(Auth::user()->program_studi == 1)
            <a href="/home/nilai-si">
                <span style="margin-left:10px;font-size:13px;background-color" class="label label-danger">Cek sekarang</span>
            </a>
            @elseif(Auth::user()->program_studi == 2)
            <a href="/home/nilai-ti">
                <span style="margin-left:10px;font-size:13px;background-color" class="label label-danger">Cek sekarang</span>
            </a>
            @elseif(Auth::user()->program_studi == 3)
            <a href="/home/nilai-mi">
                <span style="margin-left:10px;font-size:13px;background-color" class="label label-danger">Cek sekarang</span>
            </a>
            @elseif(Auth::user()->program_studi == 4)
            <a href="/home/nilai-pti">
                <span style="margin-left:10px;font-size:13px;background-color" class="label label-danger">Cek sekarang</span>
            </a>
            @endif
    </div>
</div>
@endif
@endsection