@extends('layouts.master')

@section('kelola-train-active')
    active
@endsection


@section('content')
<!-- statistik pengguna -->
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <h3 class="panel-title" style="font-family:roboto;"><b>Data Training</b> (Total : {{count($train_data)}} Data)</h3>
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:20px;padding-top:20px">
            <div class="row">
                <div class="col-md-12" style="margin-right:10px;padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-11">
                            <p style="font-family:roboto;color:##333">Train Data (Diperbarui secara otomatis)</p>
                        </div>
                    </div>
                    <table class="table table-bordered" style="font-size:10px">
                        <thead>
                            <tr>
                                
                                <th>
                                    <center>
                                        L/K
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        LK
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        KT
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        PS
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        PM
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        SIE
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        MLP
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        MLTI
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        PITI
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        KK
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        NKB
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        VVPL
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        KA
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        PAG
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        JKKG
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        KJK
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        MJ
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        PCD
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        TA
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        MP
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        PBD
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        PPF
                                    </center>
                                </th>
                                <th>
                                    <center>
                                        JKL
                                    </center>
                                </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($train_data as $x) 
                            <tr>
                               
                                <td>
                                    <center>
                                        {{$x->jenis_kelamin}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->id_lokasi}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->id_kota}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->id_program_studi}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->id_peminatan}}
                                    </center>
                                </td>

                                <td>
                                    <center>
                                        {{$x->Nilai_SIE}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_MLP}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_MLTI}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_PITI}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_KK}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_NKB}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_VVPL}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_KA}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_PAG}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_JKKG}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_KJK}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_MJ}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_PCD}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_TA}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_MP}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_PBD}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_PPF}}
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        {{$x->Nilai_JKL}}
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
<!-- 
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Train</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-auth-small" method="POST" action="/home/kelola-kota/tambahKota">
                @csrf
                <?php
                    $Peminatan = \App\Models\Peminatan::all();
                    $Program_Studi = \App\Models\Program_Studi::all();
                    $Kota = \App\Models\Kota::all();
                    $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
                    $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
                    $panjang = count($nilai);
                ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="id_lokasi" class="form-control">
                                    <option value="0">--Tempat Realisasi--</option>
                                    <option value="L">Laki Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kota/Kabupaten</label>
                                <select name="id_kota"  class="form-control">
                                    <option value="0">--Kota/Kabupaten--</option>
                                    @foreach($Kota as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control">
                                    <option value="0">--Jenis Kelamin--</option>
                                    <option value="L">Laki Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Program Studi</label>
                                <select name="id_kota"  class="form-control">
                                    <option value="0">--Program Studi--</option>
                                    @foreach($Program_Studi as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                    <option value="0">--Program Studi--</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Peminatan</label>
                                <select id="id_peminatan" name="id_peminatan"  class="form-control">
                                    <option value="0">--Peminatan--</option>
                                    @foreach($Peminatan as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <p>Data Nilai Sistem Informasi</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">SI Enterprise</label>
                                <select id="Nilai_SIE" name="Nilai_SIE"  class="form-control">
                                    <option value="0">--Nilai SI Enterprise--</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Man. Layanan Pelanggan</label>
                                <select id="Nilai_MLP" name="Nilai_MLP"  class="form-control">
                                    <option value="0">--Nilai Man. Layanan Pelanggan--</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Man. Layanan TI</label>
                                <select id="Nilai_MLTI" name="Nilai_MLTI"  class="form-control">
                                    <option value="0">--Nilai Man. Layanan TI--</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Per. Infrastruktur TI</label>
                                <select id="Nilai_PITI" name="Nilai_PITI"  class="form-control">
                                    <option value="0">--Nilai Per. Infrastruktur TI--</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <p>Data Nilai Teknik Informatika</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">SI Enterprise</label>
                                <select id="Nilai_SIE" name="Nilai_SIE"  class="form-control">
                                    <option value="0">--Nilai SI Enterprise--</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Man. Layanan Pelanggan</label>
                                <select id="Nilai_MLP" name="Nilai_MLP"  class="form-control">
                                    <option value="0">--Nilai Man. Layanan Pelanggan--</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Man. Layanan TI</label>
                                <select id="Nilai_MLTI" name="Nilai_MLTI"  class="form-control">
                                    <option value="0">--Nilai Man. Layanan TI--</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Per. Infrastruktur TI</label>
                                <select id="Nilai_PITI" name="Nilai_PITI"  class="form-control">
                                    <option value="0">--Nilai Per. Infrastruktur TI--</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
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
</div> -->
@endsection

