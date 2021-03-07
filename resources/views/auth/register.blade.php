<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Register | Sistem Informasi Manajemen Praktek Industri</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/linearicons/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/vendor/chartist/css/chartist-custom.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box " style="height:100%;width:100%">
					<div class="left" style="padding-left:50px;padding-right:50px">
						<div class="content">
							<div class="header">
                                <h1 style="font-family:roboto;color:black">Registrasi</h1>
                                <h1 style="margin-top:-10px;font-family:roboto;color:black;color:#18CEAB"><b>Mahasiswa </b> </h1>
                                <img src="{{asset('assets/img/Rectangle1.svg')}}" style="margin:20px"> 
							</div>
							<form class="form-auth-small" method="POST" action="{{ route('register') }}">
								@csrf
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<input id="name" type="text" placeholder="Nama Lengkap" style="border-radius:100px;"  class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
											@error('name')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
										<div class="col-md-6">
											<input id="nim" type="text" placeholder="Nomor Induk Mahasiswa (NIM)" style="border-radius:100px;"  class="form-control @error('nim') is-invalid @enderror" name="nim" value="{{ old('nim') }}">
											@error('nim')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<select id="gender" name="gender" style="border-radius:100px;" class="form-control">
												<option value="">--Jenis Kelamin--</option>
												<option value="L">Laki Laki</option>
												<option value="P">Perempuan</option>
											</select>
										</div>
										<div class="col-md-6">
											<input id="telepon" type="text" placeholder="Telepon" style="border-radius:100px;"  class="form-control @error('telepon') is-invalid @enderror" name="telepon" value="{{ old('telepon') }}">
											@error('telepon')
												<span class="invalid-feedback" role="alert">
													<strong>{{ $message }}</strong>
												</span>
											@enderror
										</div>
									</div>
								</div>
								<?php
									$Program_Studi = \App\Models\Program_Studi::all();
									$Peminatan = \App\Models\Peminatan::all();
								?>
								<div class="form-group">
									<div class="row">
										<div class="col-md-6">
											<select id="program_studi" name="program_studi"  style="border-radius:100px;"  class="form-control">
												<option value="">--Program Studi--</option>
												@foreach($Program_Studi as $p)
													<option value="{{$p->id}}">{{$p->nama}}</option>
												@endforeach
											</select>
										</div>
										<div class="col-md-6" >
											<select id="peminatan" name="peminatan" style="border-radius:100px;"  class="form-control">
												<option value="0">--Peminatan--</option>
												@foreach($Peminatan as $p)
													<option value="{{$p->id}}">{{$p->nama}}</option>
												@endforeach
												<option value="0">Tidak Ada Peminatan</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<input id="email" placeholder="Email" type="email" style="border-radius:100px;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

									@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
								<div class="form-group">
									<input id="password"  style="border-radius:100px;"  placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

									@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
                                <div class="form-group">
									<input id="password-confirm" style="border-radius:100px;" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
								</div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" style="border-radius:100px;width:100%;background-color:#18CEAB;color:white" class="btn">
                                            Daftar
                                        </button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="/home" style="border-radius:100px;width:100%;background-color:#8F8F8F;color:white" class="btn">
                                            Sudah Punya Akun
                                        </a>
                                    </div>
                                </div>
							</form>
                            <p style="margin-top:10%;font-size:10px;font-family:roboto;">Sistem Informasi Manajemen <br> Praktek Industri</p>
						</div>
					</div>
					<div class="right">
						<div class="overlay" style=";background:#2B333E;opacity: 0.8;"></div>
						<div class="content text">
							<h1 class="heading" style="font-size:50px;font-family:roboto;"><b>SIMPI</b></h1>
                            <img src="{{asset('assets/img/gradien.svg')}}" >
							<p style="margin-top:5%;font-family:roboto;">"Unggul dalam pendidikan kukuh dalam keilmuan"</p>
                            
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>
</html>
