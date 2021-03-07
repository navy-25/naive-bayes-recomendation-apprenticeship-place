@extends('layouts.master')

@section('kelola-laporan-active')
    active
@endsection


@section('content')
<div class="container-fluid">
    <div class="panel panel-headline" style="background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-body" style="padding-left:40px;padding-right:40px">
            <div class="row"> 
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <i class="fa fa-check-circle" style="margin-right:10px"></i>{{$message}}
                    </div>
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Nama Mahasiswa</label>
                        <input class="form-control" value="{{$user->name}}" placeholder="Nama Tempat Magang" type="text" readonly>
                    </div>
                    <div class="col-md-2">
                        <label for="">NIM</label>
                        <input class="form-control" value="{{$user->nim}}" placeholder="Lokasi Kota/Kabupaten" type="text" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="">Nama Instansi</label>
                        <input class="form-control" value="{{$data_magang->lokasi}}, {{$data_magang->kota}}" placeholder="Nama Tempat Magang" type="text" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-heading" style="padding-bottom:0px">
            <div class="row">
                <div class="col-md-9">
                    <h3 class="panel-title" style="font-family:roboto;"><b>Approve Laporan Harian</b> </h3>
                </div>
                <div class="col-md-3">
                    <a href="/home/kelola-laporan/{{$user->id}}/edit_toLaporan/approve_all_laporan" style="color:white;width:100%;background-color:#1ABB9C" class="btn">
                        <i class="fa fa-check" style="margin-right:10px;color:white"></i>Approve Semua Laporan
                    </a>
                </div>
            </div>
            
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px;">
            <div class="row">
                <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:10px" >No</th>
                                <th>Keterangan</th>
                                <th>Tanggal</th>
                                <th>
                                    <center>
                                        Approval
                                    </center>
                                </th>
                                <th>
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
                                @if($x->id_user == $user->id)
                                <td>{{$no++}}</td>
                                <td>{{$x->keterangan}}</td>
                                <td>{{$x->created_at}}</td>
                                <td>
                                    <center>
                                        @if($x->status == 'NA')
                                            <i class="fa fa-times-circle" ></i>
                                        @else
                                            <i class="fa fa-check-circle" ></i>
                                        @endif
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        @if($x->status == 'NA')
                                            <a href="/home/kelola-laporan/{{$x->id}}/edit_toLaporan/approve_laporan" style="padding-left:10px;padding-right:10px;background-color:#1ABB9C" class="btn">
                                                <i class="fa fa-check" style="color:white"></i>
                                            </a>
                                        @endif
                                    </center>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
