@extends('layouts.master')

@section('home-active')
    active
@endsection

@section('content')
<!-- statistik pengguna -->
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <h3 class="panel-title" style="font-family:roboto;"><b>Statistik Pengguna</b> </h3>
        </div>
        <div class="panel-body" style="padding-bottom:0px">
            <div class="row">
                <div class="col-md-3">
                    <div class="metric" style="background-color:#3498DB;border-radius: 20px 20px 20px 20px;">
                        <span class="icon" style="background-color:#3498DB">
                            <img src="{{asset('assets/img/Frame1.svg')}}" width="40px" class="img-responsive logo">
                        </span>
                        <p style="color:white">
                        <?php
                            $total = count($user)-1;
                        ?>
                            <span class="number"><b> {{$total}}</b></span>
                            <span class="title">Total Pengguna</span>
                        </p>
                    </div>
                </div>
                <?php
                    $user =  \App\Models\User::all();
                    $magang_all =  \App\Models\magang::all();
                    $sudah_magang = [];
                    $belum_magang = [];
                    for ($i = 0;$i<count($user);$i++){
                        if($user[$i]->akses != 'admin'){
                            if($user[$i]->status == 'Sudah'){
                                $sudah_magang[$i] = 1;
                            }elseif($user[$i]->status == 'Belom'){
                                $belum_magang[$i] = 1;
                            }
                        }
                    }
                    if(count($magang_all)==0){
                        $status = "Non Aktif";
                        $pemagang = 0;
                        $nonmagang = count($user)-1;
                    }else{
                        $pemagang = array_sum($sudah_magang);
                        $nonmagang = array_sum($belum_magang);
                    }
                ?>
                <div class="col-md-3">
                    <div class="metric" style="background-color:#CA2626;border-radius: 20px 20px 20px 20px;">
                        <span class="icon" style="background-color:#CA2626">
                            <img src="{{asset('assets/img/Group.svg')}}" width="40px" class="img-responsive logo">
                        </span>
                        <p style="color:white">
                            <span class="number"> <b> {{$nonmagang}}</b></span>
                            <span class="title">Belum Daftar PI</span>
                        </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="metric" style="background-color:#EC9126;border-radius: 20px 20px 20px 20px;">
                        <span class="icon" style="background-color:#EC9126">
                            <img src="{{asset('assets/img/Vector.svg')}}"  width="40px" class="img-responsive logo">
                        </span>
                        <p style="color:white">
                            <span class="number"><b>  {{$pemagang}}</b></span>
                            <span class="title">Terdaftar PI</span>
                        </p>
                    </div>
                </div>
                @if(Auth::user()->akses!='admin')
                    @if(Auth::user()->status=='Sudah')
                    <div class="col-md-3">
                        <div class="metric" style="background-color:#1ABB9C;border-radius: 20px 20px 20px 20px;">
                            <span class="icon" style="background-color:#1ABB9C">
                                <img src="{{asset('assets/img/Frame.svg')}}"  width="40px" class="img-responsive logo">
                            </span>
                            <p style="color:white">
                                <span class="title">Status User</span>
                                <span class="number"><b>Magang</b> </span>
                            </p>
                        </div>
                    </div>
                    @elseif(Auth::user()->status=='Belom')
                    <div class="col-md-3">
                        <div class="metric" style="background-color:#979797;border-radius: 20px 20px 20px 20px;">
                            <span class="icon" style="background-color:#979797">
                                <!-- <img src="{{asset('assets/img/Frame.svg')}}"  width="40px" class="img-responsive logo"> -->
                                <h2 style="font-size:50px;margin:auto;color:white">
                                    <b>
                                        X
                                    </b>
                                </h2>
                            </span>
                            <p style="color:white">
                                <span class="title">Status User</span>
                                <span class="number"><b>Belum PI</b> </span>
                            </p>
                        </div>
                    </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
<!-- profile -->
<div class="container-fluid">
    <div class="panel panel-headline" style="background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <h3 class="panel-title" style="font-family:roboto;"><b>Profil Pengguna</b> </h3>
        </div>
        <div class="panel-body" style="padding-left:40px;padding-right:40px;padding-bottom:20px;padding-top:20px">
            <div class="row">
                <div class="col-md-7" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;margin-bottom:20px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                    <p style="color:#D7D7D7">Informasi Dasar</p>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control" name="name" placeholder="Username" type="text" value="{{$user_login->name}}" readonly>
                            </div>
                        </div>
                        @if(Auth::user()->akses!='admin')
                        <div class="col-md-6">
                            <label for="">Nomor Induk Mahasiswa  (NIM)</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                <input class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa" value="{{$user_login->nim}}" type="text"  readonly>
                            </div>
                        </div>
                        @endif
                        @if(Auth::user()->akses=='admin')
                        <div class="col-md-6">
                            <label for="">Status</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                <input class="form-control" name="akses" value="Admin" readonly>
                            </div>
                        </div>
                        @endif
                    </div>
                    <?php
                        $g = $user_login->gender;
                        if($g == "L"){
                            $gender ="Laki Laki";
                        }else{
                            $gender = "Laki Laki";
                        }
                        $Program_Studi = \App\Models\Program_Studi::all();
                        $p = $user_login->program_studi;
                        $panjang = count($Program_Studi);
                        for($i = 0; $i < $panjang; $i++){
                            $id = $Program_Studi[$i]->id;
                            $nama = $Program_Studi[$i]->nama;
                            if($p == $id){
                                $pg = $nama;
                            }
                        }

                        $Peminatan = \App\Models\Peminatan::all();
                        $pem = $user_login->peminatan;
                        $panjang = count($Peminatan);
                        for($i = 0; $i < $panjang; $i++){
                            $id = $Peminatan[$i]->id;
                            $nama = $Peminatan[$i]->nama;
                            if($pem == $id){
                                $pm = $nama;
                            }
                        }
                        if($pem == 0){
                            $pm = 'Tidak Ada Peminatan';
                        }
                     
                    ?>
                    @if(Auth::user()->akses!='admin')
                    <div class="row" style="margin-top:10px">
                        <div class="col-md-6">
                            <label for="">Jenis Kelamin</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-venus"></i></span>
                                <select name="gender" class="form-control" readonly>
                                    <option value="{{$g}}">{{$gender}}</option>
                                    <option value="L">Laki Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Program Studi</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-book"></i></span>
                                <select name="program_studi" class="form-control" readonly>
                                    <option value="{{$p}}">{{$pg}}</option>
                                    @foreach($Program_Studi as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px">
                        <div class="col-md-6">
                            <label for="">Peminatan</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-black-tie"></i></span>
                                <select name="peminatan" class="form-control" readonly>
                                    <option value="{{$pem}}">{{$pm}}</option>
                                    @foreach($Peminatan as $p)
                                        <option value="{{$p->id}}">{{$p->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Telepon</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                                <input name="telepon" class="form-control" placeholder="Telepon" type="text" value="{{$user_login->telepon}}" readonly>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="garis" style="margin-top:15px;border-width: 1px;border-bottom-style: solid;border-color:#D7D7D7">
                    </div>
                    <p style="margin-top:10px;color:#D7D7D7">Emaill & Password</p>
                    <div class="row" style="margin-top:10px">
                        <div class="col-md-6">
                            <label for="">Email</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="email" class="form-control" placeholder="Username" value="{{$user_login->email}}" type="email" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Password</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input name="password" class="form-control" placeholder="Password" value="aksdjkasdjkasd"  type="password"  readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    .header{
                        /* position: absolute; */
                        z-index: 1;
                    }
                    .profile{
                        /* position: absolute; */
                        z-index: 2;
                        top: -100px;
                    }
                </style>
                <div class="col-md-5">
                    <div class="row" style="border-radius: 15px 15px 15px 15px;margin-left:5px;margin-right:5px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)">
                        <div class="profile-header">
                            <div class="overlay"></div>
                            <div class="profile-main">
                                <img src="assets/img/default-user-image.png" style="margin-top:35px;margin-bottom:35px" width="150px" height="150px" class="img-circle" alt="Avatar">
                            </div>
                        </div>
                        <center>
                            <h3 style="text-transform: capitalize;"><b> {{ Auth::user()->name }} </b></h3>
                            @if(Auth::user()->akses!='admin')
                                <h5>{{$user_login->nim}}</h5>
                            @elseif(Auth::user()->akses=='admin')
                                <h5>Admin</h5>
                            @endif
                            <br>
                            <h6>Fakultas Teknik <br>Universitas Negeri Surabaya </h6>
                            <br>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
