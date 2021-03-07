@extends('layouts.master')

@section('kelola-laporan-active')
    active
@endsection


@section('content')
@if($status_magang=="Aktif")
<div class="container-fluid">
    <div class="panel panel-headline" style="background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
                <h3 class="panel-title" style="font-family:roboto;"><b>Tempat Magang</b> </h3>
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px">
            <div class="row"> 
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Nama Instansi</label>
                        <input class="form-control" value="{{$data_magang->lokasi}}" placeholder="Nama Tempat Magang" type="text" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="">Kota/Kabupaten</label>
                        <input class="form-control" value="{{$data_magang->kota}}" placeholder="Lokasi Kota/Kabupaten" type="text" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="">Alamat</label>
                        <input class="form-control" value="{{$data_magang->alamat}}" placeholder="Nama Tempat Magang" type="text" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-heading" style="padding-bottom:0px">
            <h3 class="panel-title" style="font-family:roboto;"><b>Laporan Harian</b> </h3>
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px;">
            <div class="row">
                <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                    <div class="button" style="margin-bottom:15px">
                    <div class="row">
                        <div class="col-md-2">
                            <a  href="" style="width:100%;border-radius:5px;background-color:#3498DB;color:white" class="btn" data-toggle="modal" data-target="#tambah">
                                <i style="margin-right:10px" class="fa fa-plus"></i> 
                                Tambah
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a  href="/home/laporan/download_pdf"  style="width:100%;border-radius:5px;background-color:#1ABB9C;color:white" class="btn">
                                <i style="margin-right:10px" class="fa fa-arrow-down"></i> 
                               Download
                            </a>
                        </div>
                        <div class="col-md-2">
                            <a  href="/home/laporan/cetak"  target="_blank" style="width:100%;border-radius:5px;background-color:#E78F27;color:white" class="btn">
                                <i style="margin-right:10px" class="fa fa-print"></i> 
                               Cetak
                            </a>
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-2">
                        </div>
                    </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:10px" >No</th>
                                <th>Keterangan</th>
                                <th style="width:20%">Tanggal</th>
                                <th style="width:10%">
                                    <center>
                                        Approval
                                    </center>
                                </th>
                                <th style="width:10%">
                                    <center>
                                    Action
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $no = 1
                        ?>
                            @foreach($laporan as $x) 
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$x->keterangan}}</td>
                                <?php
                                    $hari = $x->created_at->format('l');
                                    if($hari == "Monday"){
                                        $hari = "Senin";
                                    }elseif($hari == "Tuesday"){
                                        $hari = "Selasa";
                                    }elseif($hari == "Wednesday"){
                                        $hari = "Rabu";
                                    }elseif($hari == "Thursday"){
                                        $hari = "Kamis";
                                    }elseif($hari == "Friday"){
                                        $hari = "Jum'at";
                                    }elseif($hari == "Saturday"){
                                        $hari = "Sabtu";
                                    }elseif($hari == "Sunday"){
                                        $hari = "Minggu";
                                    }
                                ?>
                                <td style="width:20%">{{$hari}}, {{$x->created_at->format('d M Y ')}}</td>
                                <td style="width:10%"> 
                                    <center>
                                        @if($x->status == 'NA')
                                            <i class="fa fa-times-circle" ></i>
                                        @else
                                            <i class="fa fa-check-circle" ></i>
                                        @endif
                                    </center>
                                </td>
                                <td style="width:10%">
                                    <center>
                                        <a href="/home/laporan/{{$x->id}}/hapus_laporan" style="padding-left:10px;padding-right:10px;background-color:#CA2626" class="btn "  onclick="return confirm('Hapus Laporan ?')"  onMouseOver="this.style.background='#CE1C1C'" onMouseOut="this.style.background='#EA3333'" >
                                            <i class="fa fa-trash" style="color:white"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@elseif($status_magang=="NonAktif")
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                <i class="fa fa-times-circle" style="margin-right:10px"></i> Silahkan daftar magang terlebih dahulu !
            </div>
        </div>
    </div>
</div>
@endif
@endsection
<!-- Modal laporan tambah-->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-auth-small" method="POST" action="/home/laporan/tambah">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" required autocomplete="keterangan" placeholder="Keterangan" autofocus>
                        @error('keterangan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn" style="background-color:#1ABB9C;color:white">
                        Tambah
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>