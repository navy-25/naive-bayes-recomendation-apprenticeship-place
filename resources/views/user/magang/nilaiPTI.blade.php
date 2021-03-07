@extends('layouts.master')

@section('nilai-pti-active')
    active
@endsection


@section('content')
<?php
    $Peminatan = \App\Models\Peminatan::all();
    $Kota = \App\Models\Kota::all();
    $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
    $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
    $panjang = count($nilai);
    if($nilai_baru->Nilai_KJK==null){
        $data1 = "Kosong";
    }else{
        $data1 = $nilai_baru->Nilai_KJK;
    }
    if($nilai_baru->Nilai_MJ==null){
        $data2 = "Kosong";
    }else{
        $data2 = $nilai_baru->Nilai_MJ;
    }
    if($nilai_baru->Nilai_PCD==null){
        $data3 = "Kosong";
    }else{
        $data3 = $nilai_baru->Nilai_PCD;
    }
    if($nilai_baru->Nilai_TA==null){
        $data4 = "Kosong";
    }else{
        $data4 = $nilai_baru->Nilai_TA;
    }
    if($nilai_baru->Nilai_MP==null){
        $data3 = "Kosong";
    }else{
        $data3 = $nilai_baru->Nilai_MP;
    }
    if($nilai_baru->Nilai_PBD==null){
        $data4 = "Kosong";
    }else{
        $data4 = $nilai_baru->Nilai_PBD;
    }

    $Nilai_KJK = $nilai_baru->Nilai_KJK;
    $Nilai_MJ = $nilai_baru->Nilai_MJ;
    $Nilai_PCD = $nilai_baru->Nilai_PCD;
    $Nilai_TA = $nilai_baru->Nilai_TA;
    $Nilai_MP = $nilai_baru->Nilai_MP;
    $Nilai_PBD = $nilai_baru->Nilai_PBD;
    for($i=0;$i<count($nilai);$i++){
        if($Nilai_KJK==$nilai[$i]){
            $data1 = $label_nilai[$i];
        }
        if($Nilai_MJ==$nilai[$i]){
            $data2 = $label_nilai[$i];
        }
        if($Nilai_PCD==$nilai[$i]){
            $data3 = $label_nilai[$i];
        }
        if($Nilai_TA==$nilai[$i]){
            $data4 = $label_nilai[$i];
        }
        if($Nilai_MP==$nilai[$i]){
            $data5 = $label_nilai[$i];
        }
        if($Nilai_PBD==$nilai[$i]){
            $data6 = $label_nilai[$i];
        }
    }
?>
<div class="container-fluid">
    <div class="panel panel-headline" style="background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            @if($data1 == "Kosong" AND $data2 == "Kosong" AND $data3 == "Kosong" AND $data4 == "Kosong" AND $data5 == "Kosong" AND $data6 == "Kosong")
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="fa fa-times-circle" style="margin-right:10px"></i> Lengkapi terlebih dahulu nilai mata kuliah anda !
            </div>
            @endif
            @if($data1 == "E" AND $data2 == "E" AND $data3 == "E" AND $data4 == "E" AND $data5 == "E" AND $data6 == "E")
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="fa fa-times-circle" style="margin-right:10px"></i> Lengkapi terlebih dahulu nilai mata kuliah anda !
            </div>
            @endif
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <i class="fa fa-check-circle" style="margin-right:10px"></i>{{$message}}
                </div>
            @endif
            <h3 class="panel-title" style="font-family:roboto;"><b>Nilai Mata Kuliah</b> </h3>
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:20px;padding-top:20px">
            <div class="row">
                <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                    <form class="form-auth-small" method="POST" action="/home/nilai-pti/{{$nilai_baru->id}}/tambahNilai_PTI" >
                        @csrf
                        
                        <div class="row">
                            @if (Auth::user()->peminatan == 8) 
                            <div class="col-md-4">
                                <label for="">Keamanan Jaringan Komputer</label>
                                <select id="Nilai_KJK" name="Nilai_KJK"  class="form-control">
                                    <option value="{{$Nilai_KJK}}">{{$data1}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Manajemen Jaringan</label>
                                <select id="Nilai_MJ" name="Nilai_MJ"  class="form-control">
                                    <option value="{{$Nilai_MJ}}">{{$data2}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            @endif
                            @if (Auth::user()->peminatan == 7) 
                            <div class="col-md-4">
                                <label for="">Pengolahan Citra Digital</label>
                                <select id="Nilai_PCD" name="Nilai_PCD"  class="form-control">
                                    <option value="{{$Nilai_PCD}}">{{$data3}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Teknik Animasi</label>
                                <select id="Nilai_TA" name="Nilai_TA"  class="form-control">
                                    <option value="{{$Nilai_TA}}">{{$data4}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            @endif
                            @if (Auth::user()->peminatan == 6)
                            <div class="col-md-4">
                                <label for="">Manajemen Proyek</label>
                                <select id="Nilai_MP" name="Nilai_MP"  class="form-control">
                                    <option value="{{$Nilai_MP}}">{{$data5}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Pemrograman Basis Data</label>
                                <select id="Nilai_PBD" name="Nilai_PBD"  class="form-control">
                                    <option value="{{$Nilai_PBD}}">{{$data6}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            @endif
                        </div>
                        
                        <div class="button" style="margin-top:15px">
                            <button type="submit" style="border-radius:100px;width:150;background-color:#E78F27;color:white" class="btn"><i style="margin-right:10px" class="fa fa-check-circle"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
