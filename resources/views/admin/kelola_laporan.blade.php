@extends('layouts.master')

@section('kelola-laporan-active')
    active
@endsection


@section('content')
<!-- statistik pengguna -->
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="panel-title" style="font-family:roboto;"><b>Kelola Laporan Magang</b> </h3>
                </div>
                <div class="col-md-4">
                    <form class="form">
                        <input class="form-control inputBox searchBox" name="cari" type="search" placeholder="Search Nama/NIM" aria-label="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:20px;padding-top:20px">
            <div class="row">
                <div class="col-md-12" style="margin-right:10px;padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-12">
                            <p style="font-family:roboto;color:##333">Data Mahasiswa Magang</p>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:10px" >id</th>
                                <th>Nama User</th>
                                <th>NIM</th>
                                <th>Tempat Magang</th>
                                <th>Kota</th>
                                <th>Status</th>
                                <th>
                                    <center>
                                    Action
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $x) 
                                    @if($x->status == "Sudah")
                                    @if($x->akses != 'admin' )
                                        <?php
                                            $magang =  \App\Models\magang::all();
                                            for ($i = 0;$i<count($magang);$i++){
                                                if($magang[$i]->id_users == $x->id){
                                                    $id_magang = $magang[$i]->id;
                                                }
                                            }
                                            $magang =  \App\Models\magang::find($id_magang);

                                            $laporan =  \App\Models\laporan::all();
                                            $status_approve = 'Approve';
                                            for ($i = 0;$i<count($laporan);$i++){
                                                if($laporan[$i]->id_user == $x->id){
                                                    if($laporan[$i]->status == 'NA'){
                                                        $status_approve = 'NA';
                                                    }
                                                }
                                            }
                                        ?>
                                        <tr>
                                    <td>{{$x->id}}</td>
                                    <td>{{$x->name}}</td>
                                    <td>{{$x->nim}}</td>
                                    <td>{{$magang->lokasi}}</td>
                                    <td>{{$magang->kota}}</td>
                                    <td>
                                        <center>
                                            @if($x->status=="Sudah")
                                                <i class="fa fa-check"></i>
                                            @else
                                                <i class="fa fa-ban"></i>
                                            @endif
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <a href="/home/kelola-laporan/{{$x->id}}/edit_toLaporan" style="padding-left:10px;padding-right:10px;" class="btn btn-warning">
                                                <i class="fa fa-edit" style="color:white"></i>
                                            </a>
                                        </center>
                                    </td>
                                    @endif
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

