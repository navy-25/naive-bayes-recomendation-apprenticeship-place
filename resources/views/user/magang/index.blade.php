@extends('layouts.master')

@section('kelola-magang-active')
    active
@endsection


@section('content')
<?php
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
@if($id_nilai == 0)
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="fa fa-warning" style="margin-right:10px"></i>Cek kelengkapan nilai terlebih dahulu, sebelum mendaftarkan diri sebagai peserta magang !
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
    </div>
</div>
@else
    @if($status_magang == "NonAktif")
    <div class="container-fluid">
        <div class="panel panel-headline" style="background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
            <div class="panel-heading" style="padding-bottom:0px">
                <h3 class="panel-title" style="font-family:roboto;"><b>Daftar Magang</b> </h3>
            </div>
            <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:20px;padding-top:20px">
                <div class="row">
                    <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                        <form class="form-auth-small" method="POST" action="/home/magang/daftarMagang" >
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nama Instansi</label>
                                    <input class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" placeholder="Nama Tempat Magang" type="text" required autocomplete="lokasi">
                                    @error('lokasi')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="">Kota/Kabupaten</label>
                                    <input class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota" placeholder="Lokasi Kota/Kabupaten" type="text" required autocomplete="kota">
                                    @error('kota')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px">
                                <div class="col-md-12">
                                    <label for="">Alamat</label>
                                    <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" placeholder="Alamat Tempat Magang" type="text" required autocomplete="alamat">
                                    @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="button" style="margin-top:15px">
                                        <button readonly type="submit" style="width:100%;border-radius:100px;width:150;background-color:#1ABB9C;color:white" class="btn">
                                        <i style="margin-right:10px" class="fa fa-check-circle"></i> 
                                        Daftar Magang</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                    <a  href="/home/magang/list_tempat" style="width:100%;margin-top:15px;border-radius:100px;background-color:#979797;color:white" class="btn">
                                        <i style="margin-right:10px" class="fa fa-industry"></i> 
                                        Lihat Semua Lokasi
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    @endif
@endif
@endsection