@extends('layouts.master')

@section('kelola-kota-active')
    active
@endsection


@section('content')
<!-- statistik pengguna -->
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <i class="fa fa-times-circle" style="margin-right:10px"></i>{{$message}}
                </div>
            @elseif ($message = Session::get('success'))
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
            <h3 class="panel-title" style="font-family:roboto;"><b>Kelola Kota/Kabupaten</b> </h3>
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:20px;padding-top:20px">
            <div class="row">
                <div class="col-md-12" style="margin-right:10px;padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                    <div class="row" style="margin-bottom:10px">
                        <div class="col-md-11">
                            <p style="font-family:roboto;;color:##333">Data Kota</p>
                        </div>
                        <div class="col-md-1">
                            <a type="button" class="btn" style="padding-left:10px;padding-right:10px;margin-bottom:10px;background-color:#1ABB9C ;color:white" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-square"></i>
                            </a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width:10px" >id</th>
                                <th>Nama Kota/Kabupaten</th>
                                <th>
                                    <center>
                                    Action
                                    </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kota as $x) 
                            <tr>
                                <td>{{$x->id}}</td>
                                <td>{{$x->nama}}</td>
                                <td>
                                    <center>
                                        <a href="/home/kelola-kota/{{$x->id}}/toeditKota" style="padding-left:10px;padding-right:10px;" class="btn btn-warning" >
                                            <i class="fa fa-edit" style="color:white"></i>
                                        </a>
                                        <?php
                                            $id_kota = $x->id;
                                            $nama_kota = $x->nama;
                                        ?>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-auth-small" method="POST" action="/home/kelola-kota/tambahKota">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" placeholder="Nama Kota/kabupaten" autofocus>
                        @error('nama')
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
@endsection

