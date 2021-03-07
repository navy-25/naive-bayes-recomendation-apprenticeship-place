@extends('layouts.master')

@section('nilai-ti-active')
    active
@endsection


@section('content')
<?php
    $Peminatan = \App\Models\Peminatan::all();
    $Kota = \App\Models\Kota::all();
    $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
    $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
    $panjang = count($nilai);
    if($nilai_baru->Nilai_KK==null){
        $data1 = "Kosong";
    }else{
        $data1 = $nilai_baru->Nilai_KK;
    }
    if($nilai_baru->Nilai_NKB==null){
        $data2 = "Kosong";
    }else{
        $data2 = $nilai_baru->Nilai_NKB;
    }
    if($nilai_baru->Nilai_VVPL==null){
        $data3 = "Kosong";
    }else{
        $data3 = $nilai_baru->Nilai_VVPL;
    }
    if($nilai_baru->Nilai_KA==null){
        $data4 = "Kosong";
    }else{
        $data4 = $nilai_baru->Nilai_KA;
    }
    if($nilai_baru->Nilai_PAG==null){
        $data3 = "Kosong";
    }else{
        $data3 = $nilai_baru->Nilai_PAG;
    }
    if($nilai_baru->Nilai_JKKG==null){
        $data4 = "Kosong";
    }else{
        $data4 = $nilai_baru->Nilai_JKKG;
    }

    $Nilai_KK = $nilai_baru->Nilai_KK;
    $Nilai_NKB = $nilai_baru->Nilai_NKB;
    $Nilai_VVPL = $nilai_baru->Nilai_VVPL;
    $Nilai_KA = $nilai_baru->Nilai_KA;
    $Nilai_PAG = $nilai_baru->Nilai_PAG;
    $Nilai_JKKG = $nilai_baru->Nilai_JKKG;
    for($i=0;$i<count($nilai);$i++){
        if($Nilai_KK==$nilai[$i]){
            $data1 = $label_nilai[$i];
        }
        if($Nilai_NKB==$nilai[$i]){
            $data2 = $label_nilai[$i];
        }
        if($Nilai_VVPL==$nilai[$i]){
            $data3 = $label_nilai[$i];
        }
        if($Nilai_KA==$nilai[$i]){
            $data4 = $label_nilai[$i];
        }
        if($Nilai_PAG==$nilai[$i]){
            $data5 = $label_nilai[$i];
        }
        if($Nilai_JKKG==$nilai[$i]){
            $data6 = $label_nilai[$i];
        }
    }
?>
<div class="container-fluid">
    <div class="panel panel-headline" style="background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            @if($data1 == "Kosong" AND $data2 == "Kosong" AND $data3 == "Kosong" AND $data4 == "Kosong")
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="fa fa-times-circle" style="margin-right:10px"></i> Lengkapi terlebih dahulu nilai mata kuliah anda !
            </div>
            @endif
            @if($data1 == "E" AND $data2 == "E" AND $data3 == "E" AND $data4 == "E")
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
                    <form class="form-auth-small" method="POST" action="/home/nilai-ti/{{$nilai_baru->id}}/tambahNilai_TI" >
                        @csrf
                       
                        <div class="row">
                            @if (Auth::user()->peminatan == 5) 
                            <div class="col-md-4">
                                <label for="">Kecerdasan Komputasional</label>
                                <select id="Nilai_KK" name="Nilai_KK"  class="form-control">
                                    <option value="{{$Nilai_KK}}">{{$data1}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Jaringan Nirkabel dan Komputasi Bergerak</label>
                                <select id="Nilai_NKB" name="Nilai_NKB"  class="form-control">
                                    <option value="{{$Nilai_NKB}}">{{$data2}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            @endif
                            @if (Auth::user()->peminatan == 4) 
                            <div class="col-md-4">
                                <label for="">Verifikasi dan Validasi Perangkat Lunak</label>
                                <select id="Nilai_VVPL" name="Nilai_VVPL"  class="form-control">
                                    <option value="{{$Nilai_VVPL}}">{{$data3}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Pemrograman Animasi dan Game</label>
                                <select id="Nilai_PAG" name="Nilai_PAG"  class="form-control">
                                    <option value="{{$Nilai_PAG}}">{{$data5}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            @endif
                            @if (Auth::user()->peminatan == 3)    
                            <div class="col-md-4">
                                <label for="">Komputasi Awan</label>
                                <select id="Nilai_KA" name="Nilai_KA"  class="form-control">
                                    <option value="{{$Nilai_KA}}">{{$data4}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Jaringan Nirkabel dan Komputasi Gerak</label>
                                <select id="Nilai_JKKG" name="Nilai_JKKG"  class="form-control">
                                    <option value="{{$Nilai_JKKG}}">{{$data6}}</option>
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
