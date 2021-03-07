@extends('layouts.master')

@section('kelola-magang-active')
    active
@endsection


@section('content')
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
            <div class="row">
                <div class="col-md-8">
                    <h3 class="panel-title" style="font-family:roboto;"><b>List Tempat Praktek Industri</b> </h3>
                </div>
                <div class="col-md-4">
                    <form class="form">
                        <input class="form-control inputBox searchBox" name="cari" type="search" placeholder="Cari nama instansi" aria-label="Search">
                    </form>
                </div>
            </div>
            @if ($list_magang == 0)
                <div class="alert alert-danger alert-dismissible" style="margin-top:20px" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                    <i class="fa fa-times-circle" style="margin-right:10px"></i>Data tempat magang Kosong, Hubungi admin !
                </div>
            @endif
        </div>
        @foreach($tempat_magang as $x) 
        <form action="/home/magang/list_tempat/{{$x->id}}/daftar" method="POST">
        @csrf
            <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:20px;padding-top:20px">
                <div class="row">
                    <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                        <div class="row">
                            <div class="col-md-2">
                                <img class="profile" style="border-radius:5px" width="100%" height="100px" src="{{$x->getFoto()}}" alt="" ></td>
                            </div>
                            <div class="col-md-8">
                                <p style="font-size:20px">
                                    <b>
                                        {{$x->nama}}
                                    </b>
                                    <!-- <span style="margin-left:10px;font-size:13px" class="label label-primary">Sisa {{$x->kuota}} Orang</span> -->
                                    <?php
                                        $PS = \App\Models\Program_Studi::all();
                                        $PM = \App\Models\Peminatan::all();
                                        for($i = 0; $i < count($PS); $i++){
                                            if($PS[$i]->id == $x->id_program_studi){
                                                $prog = $PS[$i]->nama;
                                            }
                                        }
                                        for($i = 0; $i < count($PM); $i++){
                                            if($PM[$i]->id == $x->id_peminatan){
                                                $pem = $PM[$i]->nama;
                                            }
                                        }
                                    ?>
                                    <span style="margin-left:10px;font-size:13px;background-color:#1ABB9C" class="label label-primary">{{$prog}}</span>
                                    <!-- <span style="margin-left:10px;font-size:13px;background-color:#E78F27" class="label label-primary">{{$pem}}</span> -->
                                </p>
                                <p style="font-size:10">
                                    Alamat <br> {{$x->alamat}}
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
        @endforeach
    </div>
</div>
@endsection