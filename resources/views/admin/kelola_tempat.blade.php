@extends('layouts.master')

@section('kelola-tempat-active')
    active
@endsection

@section('content')
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
            <h3 class="panel-title" style="font-family:roboto;"><b>Tambah Data</b> </h3>
        </div>
        <div class="panel-body" style="padding-bottom:0px">
            <div class="row">
                <div class="col-md-2">
                    <a href="" style="margin-bottom:10px;width:100%;background-color:#1ABB9C ;color:white" class="btn"  data-toggle="modal" data-target="#tambah_si">
                        S. Informasi
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="" style="margin-bottom:10px;width:100%;background-color:#3498DB;color:white" class="btn" data-toggle="modal" data-target="#tambah_pti">
                        Pendidikan TI
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="" style="margin-bottom:10px;width:100%;background-color:#EC9126;color:white" class="btn"  data-toggle="modal" data-target="#tambah_ti">
                        Teknik Informatika
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="" style="margin-bottom:10px;width:100%;background-color:#CA2626;color:white" class="btn"  data-toggle="modal" data-target="#tambah_mi">
                        M. Informatika
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Table data -->
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <div class="row">
                <div class="col-md-8">
                    <h3 class="panel-title" style="font-family:roboto;"><b>Kelola Tempat Praktek Industri</b> </h3>
                </div>
                <div class="col-md-4">
                    <form class="form">
                        <input class="form-control inputBox searchBox" name="cari" type="search" placeholder="Search berdasarkan nama instansi" aria-label="Search">
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px">
            <div class="row">
                <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Gambar</th>
                                <th>Nama Instansi</th>
                                <th>Kota/Kabupaten</th>
                                <th>Prog. Studi</th>
                                <!-- <th>Kuota</th> -->
                                <th>
                                <center>
                                Action
                                </center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lokasi as $x) 
                            <tr>
                                <td>{{$x->id}}</td>
                                <td>
                                <img class="profile" width="100px" height="60px" src="{{$x->getFoto()}}" alt="" ></td>
                                <td>{{$x->nama}}</td>
                                <?php
                                    $kota = \App\Models\Kota::find($x->id_kota);
                                    $kota_lokasi = $kota->nama;

                                    if($x->id_peminatan!=null){
                                        $Peminatan = \App\Models\Peminatan::find($x->id_peminatan);
                                        $peminatan = $Peminatan->nama;
                                    }else{
                                        $peminatan = "Tidak ada";
                                    }

                                    $id_program_studi = \App\Models\Program_Studi::find($x->id_program_studi);
                                    $ProgramStudi = $id_program_studi->nama;
                                ?>
                                <td>{{$kota_lokasi}}</td>
                                <td>{{$ProgramStudi}} ({{$peminatan}})</td>
                                <!-- <td>Sisa {{$x->kuota}} Orang</td> -->
                                <td>
                                    <center>
                            
                                        <?php
                                            $id = $x->id;
                                            if($x->id_program_studi == 1){
                                                $link = "/home/kelola-tempat-pi/{$id}/toeditSI";
                                            }elseif($x->id_program_studi == 2){
                                                $link = "/home/kelola-tempat-pi/{$id}/toeditTI";
                                            }elseif($x->id_program_studi == 3){
                                                $link = "/home/kelola-tempat-pi/{$id}/toeditMI";
                                            }elseif($x->id_program_studi == 4){
                                                $link = "/home/kelola-tempat-pi/{$id}/toeditPTI";
                                            }
                                            // dd($link);
                                        ?>
                                        <a href="{{$link}}" style="padding-left:10px;padding-right:10px;" class="btn btn-warning">
                                            <i class="fa fa-edit" style="color:white"></i>
                                        </a>
                                        <a href="/home/kelola-tempat-pi/{{$x->id}}/hapus_tempat" style="padding-left:10px;padding-right:10px;background-color:#CA2626" class="btn "  onclick="return confirm('Hapus Pengguna ?')"  onMouseOver="this.style.background='#CE1C1C'" onMouseOut="this.style.background='#EA3333'" >
                                            <i class="fa fa-trash" style="color:white"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-9">
                            @if ($lokasi->lastPage() > 1)
                                <ul class="pagination" style="margin-top:0px">
                                    <li class="{{ ($lokasi->currentPage() == 1) ? ' disabled' : '' }} page-item">
                                        <a class=" page-link " href="{{ $lokasi->url(1) }}" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    @for ($i = 1; $i <= $lokasi->lastPage(); $i++)
                                        <li class="{{ ($lokasi->currentPage() == $i) ? ' active' : '' }} page-item">
                                            <a class=" page-link " href="{{ $lokasi->url($i) }}">{{ $i }}</a>
                                        </li>
                                    @endfor
                                    <li class="{{ ($lokasi->currentPage() == $lokasi->lastPage()) ? ' disabled' : '' }} page-item">
                                        <a href="{{ $lokasi->url($lokasi->currentPage()+1) }}" class="page-link" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <?php
                                $jumlah_entri = $lokasi->total()/$lokasi->perPage();
                                $jumlah_entri = intval($jumlah_entri)+1;
                            ?>
                            <p align="right">Showing {{ $lokasi->currentPage() }} to {{$jumlah_entri}} of {{$jumlah_entri}} entries</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- created SI -->
<div class="modal inmodal fade" id="tambah_si" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center>
                    <h4 class="modal-title"><b>Tambah Lokasi Praktik Industri <br> Sistem Informasi</b> </h4>
                </center>
            </div>
            <div class="modal-body">
                <form class="form-auth-small" method="POST" action="/home/kelola-tempat-pi/tambahSI" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <?php
                        $Peminatan = \App\Models\Peminatan::all();
                        $Kota = \App\Models\Kota::all();
                        $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
                        $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
                        $panjang = count($nilai);
                    ?>
                    <p>Masukkan Data Instansi </p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama" placeholder="Nama Instansi">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id="id_kota" name="id_kota"  class="form-control">
                                    <option value="">--Kota/Kabupaten--</option>
                                    @foreach($Kota as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  required autocomplete="alamat" placeholder="Alamat">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                            <input id="kuota" type="text" class="form-control @error('kuota') is-invalid @enderror" name="kuota"  required autocomplete="kuota" placeholder="Jumlah Kuota">
                            @error('kuota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                        <div class="form-group">
                            <select id="id_peminatan" name="id_peminatan"  class="form-control">
                                <option value="">--Peminatan--</option>
                                @foreach($Peminatan as $p)
                                    <option value="{{$p->id}}">{{$p->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <p>Masukkan Nilai Persyaratan </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_SIE" name="Nilai_SIE"  class="form-control">
                                        <option value="">--Nilai SI Enterprise--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_MLP" name="Nilai_MLP"  class="form-control">
                                        <option value="">--Nilai Man. Layanan Pelanggan--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_MLTI" name="Nilai_MLTI"  class="form-control">
                                        <option value="">--Nilai Man. Layanan TI--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_PITI" name="Nilai_PITI"  class="form-control">
                                        <option value="">--Nilai Per. Infrastruktur TI--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="exampleFormControlFile1">Foto Instansi</label>
                        <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
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
</div>
<!-- created TI -->
<div class="modal inmodal fade" id="tambah_ti" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center>
                    <h4 class="modal-title"><b>Tambah Lokasi Praktik Industri <br> Teknik Informatika</b> </h4>
                </center>
            </div>
            <div class="modal-body">
                <form class="form-auth-small" method="POST" action="/home/kelola-tempat-pi/tambahTI" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <?php
                        $Peminatan = \App\Models\Peminatan::all();
                        $Kota = \App\Models\Kota::all();
                        $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
                        $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
                        $panjang = count($nilai);
                    ?>
                    <p>Masukkan Data Instansi </p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama" placeholder="Nama Instansi">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id="id_kota" name="id_kota"  class="form-control">
                                    <option value="">--Kota/Kabupaten--</option>
                                    @foreach($Kota as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  required autocomplete="alamat" placeholder="Alamat">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                            <input id="kuota" type="text" class="form-control @error('kuota') is-invalid @enderror" name="kuota"  required autocomplete="kuota" placeholder="Jumlah Kuota">
                            @error('kuota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                        <div class="form-group">
                            <select id="id_peminatan" name="id_peminatan"  class="form-control">
                                <option value="">--Peminatan--</option>
                                @foreach($Peminatan as $p)
                                    <option value="{{$p->id}}">{{$p->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <p>Masukkan Nilai Persyaratan </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_KK" name="Nilai_KK"  class="form-control">
                                        <option value="">--Kecerdasan Komputasional--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_NKB" name="Nilai_NKB"  class="form-control">
                                        <option value="">--Jaringan Nirkabel dan Komputasi Bergerak--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_VVPL" name="Nilai_VVPL"  class="form-control">
                                        <option value="">--Verifikasi dan Validasi Perangkat Lunak--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_KA" name="Nilai_KA"  class="form-control">
                                        <option value="">--Komputasi Awan--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_PAG" name="Nilai_PAG"  class="form-control">
                                        <option value="">--Pemrograman Animasi dan Game--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_JKKG" name="Nilai_JKKG"  class="form-control">
                                        <option value="">--Jaringan Nirkabel dan Komputasi Gerak--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="exampleFormControlFile1">Foto Instansi</label>
                        <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
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
</div>
<!-- created PTI -->
<div class="modal inmodal fade" id="tambah_pti" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center>
                    <h4 class="modal-title"><b>Tambah Lokasi Praktik Industri <br> Pendidikan Teknologi Informasi</b> </h4>
                </center>
            </div>
            <div class="modal-body">
                <form class="form-auth-small" method="POST" action="/home/kelola-tempat-pi/tambahPTI" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <?php
                        $Peminatan = \App\Models\Peminatan::all();
                        $Kota = \App\Models\Kota::all();
                        $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
                        $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
                        $panjang = count($nilai);
                    ?>
                    <p>Masukkan Data Instansi </p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama" placeholder="Nama Instansi">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id="id_kota" name="id_kota"  class="form-control">
                                    <option value="">--Kota/Kabupaten--</option>
                                    @foreach($Kota as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  required autocomplete="alamat" placeholder="Alamat">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                            <input id="kuota" type="text" class="form-control @error('kuota') is-invalid @enderror" name="kuota"  required autocomplete="kuota" placeholder="Jumlah Kuota">
                            @error('kuota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                        <div class="form-group">
                            <select id="id_peminatan" name="id_peminatan"  class="form-control">
                                <option value="">--Peminatan--</option>
                                @foreach($Peminatan as $p)
                                    <option value="{{$p->id}}">{{$p->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <p>Masukkan Nilai Persyaratan </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_KJK" name="Nilai_KJK"  class="form-control">
                                        <option value="">--Keamanan Jaringan Komputer--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_MJ" name="Nilai_MJ"  class="form-control">
                                        <option value="">--Manajemen Jaringan--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_PCD" name="Nilai_PCD"  class="form-control">
                                        <option value="">--Pengolahan Citra Digital--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_TA" name="Nilai_TA"  class="form-control">
                                        <option value="">-Teknik Animasi--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_MP" name="Nilai_MP"  class="form-control">
                                        <option value="">--Manajemen Proyek--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_PBD" name="Nilai_PBD"  class="form-control">
                                        <option value="">--Pemrograman Basis Data--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="exampleFormControlFile1">Foto Instansi</label>
                        <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
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
</div>
<!-- created MI -->
<div class="modal inmodal fade" id="tambah_mi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <center>
                    <h4 class="modal-title"><b>Tambah Lokasi Praktik Industri <br> Manajemen Informasi</b> </h4>
                </center>
            </div>
            <div class="modal-body">
                <form class="form-auth-small" method="POST" action="/home/kelola-tempat-pi/tambahMI" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                    <?php
                        $Peminatan = \App\Models\Peminatan::all();
                        $Kota = \App\Models\Kota::all();
                        $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
                        $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
                        $panjang = count($nilai);
                    ?>
                    <p>Masukkan Data Instansi </p>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama" placeholder="Nama Instansi">
                                @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <select id="id_kota" name="id_kota"  class="form-control">
                                    <option value="">--Kota/Kabupaten--</option>
                                    @foreach($Kota as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  required autocomplete="alamat" placeholder="Alamat">
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- <div class="form-group">
                            <input id="kuota" type="text" class="form-control @error('kuota') is-invalid @enderror" name="kuota"  required autocomplete="kuota" placeholder="Jumlah Kuota">
                            @error('kuota')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> -->
                        <p>Masukkan Nilai Persyaratan </p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_PPF" name="Nilai_PPF"  class="form-control">
                                        <option value="">--Prak Pemrograman Fremework--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <select id="Nilai_JKL" name="Nilai_JKL"  class="form-control">
                                        <option value="">--Jaringan Komputer Lanjut--</option>
                                        @for ($i = 0; $i < $panjang; $i++)
                                            <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <label for="exampleFormControlFile1">Foto Instansi</label>
                        <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
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
</div>
@endsection

