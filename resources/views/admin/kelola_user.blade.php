@extends('layouts.master')

@section('kelola-user-active')
    active
@endsection


@section('content')
<!-- statistik pengguna -->
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <i class="fa fa-check-circle" style="margin-right:10px"></i>{{$message}}
                </div>
            @else
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <i class="fa fa-warning" style="margin-right:10px"></i>Hati - hati! Merubah nama atau urutan akan berpengaruh terhadap profile user dan perhitungan sistem
                </div>
            @endif
            <div class="row">
                <div class="col-md-8">
                    <h3 class="panel-title" style="font-family:roboto;"><b>Kelola User</b> </h3>
                </div>
                <div class="col-md-4">
                    <form class="form">
                        <input class="form-control inputBox searchBox" name="cari" type="search" placeholder="Search" aria-label="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:20px;padding-top:20px">
            <div class="row">
                <div class="col-md-12" style="margin-right:10px;padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-12">
                            <p style="font-family:roboto;color:##333">Data User</p>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:10px" >id</th>
                                <th>Nama User</th>
                                <th>NIM</th>
                                <!-- <th>Email</th> -->
                                <th>Program Studi</th>
                                <th>Magang</th>
                                <th>
                                    <center>
                                    Action
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($user as $x) 
                            <?php
                                $PS = \App\Models\Program_Studi::find($x->program_studi);
                                $prog = $PS->nama;
                                if($x->peminatan!=0){
                                    $PM = \App\Models\Peminatan::find($x->peminatan);
                                    $pem = $PM->nama;
                                }else{
                                    $pem = "Tidak Ada Peminatan";
                                }
                            ?>
                            <tr>
                                @if($x->akses != 'admin' )
                                <td>{{$x->id}}</td>
                                <td>{{$x->name}}</td>
                                <td>{{$x->nim}}</td>
                                <!-- <td>{{$x->email}}</td> -->
                                <td>{{$prog}}</td>
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
                                        @if($x->status=="Sudah")
                                            <a href="/home/kelola-user/{{$x->id}}/ganti_status" style="background-color:#EC9126;padding-left:10px;padding-right:10px" class="btn " >
                                                <i class="fa fa-user-times" style="color:white"></i>
                                            </a>
                                       
                                        @endif
                                        <a href="/home/kelola-user/{{$x->id}}/hapus_user" style="padding-left:10px;padding-right:10px;background-color:#CA2626" class="btn "  onclick="return confirm('Hapus User ?')"  onMouseOver="this.style.background='#CE1C1C'" onMouseOut="this.style.background='#EA3333'" >
                                            <i class="fa fa-trash" style="color:white"></i>
                                        </a>
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

