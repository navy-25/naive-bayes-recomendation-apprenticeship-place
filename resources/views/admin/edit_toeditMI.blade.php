@extends('layouts.master')

@section('kelola-tempat-active')
    active
@endsection


@section('content')
<!-- statistik pengguna -->
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <h3 class="panel-title" style="font-family:roboto;"><b>Ubah Data</b> </h3>
        </div>
        <div class="panel-body" style="padding-bottom:0px">
            <form class="form-auth-small" method="POST" action="/home/kelola-tempat-pi/{{$lokasi->id}}/updateMI"  enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                <?php
                    $Kota = \App\Models\Kota::all();
                    $label_nilai = ['A','A-','B+','B','B-','C+','C','D','E'];
                    $nilai = [4,3.75,3.5,3,2.75,2.5,2,1,0];
                    $panjang = count($nilai);
                ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Nama Instansi</label>
                            <input id="nama" value="{{$lokasi->nama}}" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama" placeholder="Nama Instansi">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nama Kota</label>
                            <select id="id_kota" name="id_kota"  class="form-control">
                            <?php
                                $PS = \App\Models\Program_Studi::find($lokasi->id_program_studi);     
                                $K = \App\Models\Kota::find($lokasi->id_kota);        

                                $Nilai_PPF = $lokasi->Nilai_PPF;
                                $Nilai_JKL = $lokasi->Nilai_JKL;
                            
                                for($i=0;$i<count($nilai);$i++){
                                    if($Nilai_PPF==$nilai[$i]){
                                        $index1 = $i;
                                    }
                                    if($Nilai_JKL==$nilai[$i]){
                                        $index2 = $i;
                                    }
                                }
                            ?>
                                <option value="{{$lokasi->id_kota}}">{{$K->nama}}</option>
                                @foreach($Kota as $p)
                                    <option value="{{$p->id}}">{{$p->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <input id="alamat" value="{{$lokasi->alamat}}" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"  required autocomplete="alamat" placeholder="Alamat">
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Jumlah Kuota</label>
                                <input id="kuota" value="{{$lokasi->kuota}}" type="text" class="form-control @error('kuota') is-invalid @enderror" name="kuota"  required autocomplete="kuota" placeholder="Jumlah Kuota">
                                @error('kuota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Prak Pemrograman Fremework</label>
                                <select id="Nilai_PPF" name="Nilai_PPF"  class="form-control">
                                    <option value="{{$Nilai_PPF}}">{{$label_nilai[$index1]}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jaringan Komputer Lanjut</label>
                                <select id="Nilai_JKL" name="Nilai_JKL"  class="form-control">
                                    <option value="{{$Nilai_JKL}}">{{$label_nilai[$index2]}}</option>
                                    @for ($i = 0; $i < $panjang; $i++)
                                        <option value="{{$nilai[$i]}}">{{$label_nilai[$i]}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <label for="exampleFormControlFile1">Foto Instansi</label>
                    <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <a href="/home/kelola-tempat-pi" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn" style="background-color:#1ABB9C;color:white; margin:bottom:20px">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

