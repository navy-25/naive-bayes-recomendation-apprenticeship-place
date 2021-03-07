@extends('layouts.master')

@section('nilai-mi-active')
    active
@endsection


@section('content')
<?php
    $Peminatan = \App\Models\Peminatan::all();
    $Kota = \App\Models\Kota::all();
    $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
    $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
    $panjang = count($nilai);
    if($nilai_baru->Nilai_PPF==null){
        $data1 = "Kosong";
    }else{
        $data1 = $nilai_baru->Nilai_PPF;
    }
    if($nilai_baru->Nilai_JKL==null){
        $data2 = "Kosong";
    }else{
        $data2 = $nilai_baru->Nilai_JKL;
    }

    $Nilai_PPF = $nilai_baru->Nilai_PPF;
    $Nilai_JKL = $nilai_baru->Nilai_JKL;
    
    for($i=0;$i<count($nilai);$i++){
        if($Nilai_PPF==$nilai[$i]){
            $data1 = $label_nilai[$i];
        }
        if($Nilai_JKL==$nilai[$i]){
            $data2 = $label_nilai[$i];
        }
    }
?>
<div class="container-fluid">
    <div class="panel panel-headline" style="background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            @if($data1 == "Kosong" or $data2 == "Kosong")
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="fa fa-times-circle" style="margin-right:10px"></i> Lengkapi terlebih dahulu nilai mata kuliah anda !
            </div>
            @endif
            @if($data1 == "E" AND $data2 == "E")
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
                    <form class="form-auth-small" method="POST" action="/home/nilai-mi/{{$nilai_baru->id}}/tambahNilai_MI" >
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Prak Pemrograman Fremework</label>
                                <select id="Nilai_PPF" name="Nilai_PPF"  class="form-control">
                                    <option value="{{$Nilai_PPF}}">{{$data1}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Jaringan Komputer Lanjut</label>
                                <select id="Nilai_JKL" name="Nilai_JKL"  class="form-control">
                                    <option value="{{$Nilai_JKL}}">{{$data2}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
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
