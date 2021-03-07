<!doctype html>
<html lang="en">

<head>
	<title>SIMPI | Sistem Informasi Manajemen Praktek Industri</title>
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
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('assets/img/favicon.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top" style="background-color:#2B333E">
			<div class="brand" style="background-color:#2B333E" >
				<a href="index.html">
                    <img src="{{asset('assets/img/logo-light.png')}}" alt="Logo SIMPi" class="img-responsive logo">
                </a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth">
                        <img src="{{asset('assets/img/bars.svg')}}" class="img-responsive logo" width="25px">
                    </button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown" >
							<a href="#" style="background-color:#2B333E;color:white"  class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('assets/img/default-user-image.png')}}" class="img-circle" alt="Avatar"> <span style="text-transform: capitalize;">{{ Auth::user()->name }}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="/home"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="lnr lnr-exit"></i> <span>Logout</span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
						<li><a href="/home" class="@yield('home-active')"><i class="lnr lnr-home"></i> <span>Profile</span></a></li>
					</ul>
					@if(Auth::user()->akses=='admin')
					<ul class="nav">
						<li><a href="/home/kelola-tempat-pi" class="@yield('kelola-tempat-active')"><i class="lnr lnr-store"></i> <span>Kelola Tempat PI</span></a></li>
					</ul>
					<ul class="nav">
						<li><a href="/home/kelola-kota" class="@yield('kelola-kota-active')"><i class="lnr lnr-apartment"></i> <span>Kelola Kota</span></a></li>
					</ul>
					<!-- <ul class="nav">
						<li><a href="/home/kelola-fitur" class="@yield('kelola-fitur-active')"><i class="lnr lnr-magic-wand"></i> <span>Kelola Jurusan</span></a></li>
					</ul> -->
					<ul class="nav">
						<li><a href="/home/kelola-laporan" class="@yield('kelola-laporan-active')"><i class="lnr lnr-book"></i> <span>Kelola Laporan</span></a></li>
					</ul>
					<ul class="nav">
						<li><a href="/home/kelola-train-data" class="@yield('kelola-train-active')"><i class="lnr lnr-sync"></i> <span>Train Data</span></a></li>
					</ul>
					<ul class="nav">
						<li><a href="/home/kelola-user" class="@yield('kelola-user-active')"><i class="lnr lnr-user"></i> <span>Kelola User</span></a></li>
					</ul>
					@endif
					@if(Auth::user()->akses=='user')
					<ul class="nav">
						<li><a href="/home/rekomendasi" class="@yield('kelola-rekom-active')"><i class="lnr lnr-map"></i> <span>Cari rekomendasi</span></a></li>
					</ul>
					<ul class="nav">
						<li><a href="/home/magang" class="@yield('kelola-magang-active')"><i class="lnr lnr-store"></i> <span>Daftar Magang</span></a></li>
					</ul>
						@if(Auth::user()->program_studi==1)
						<ul class="nav">
							<li><a href="/home/nilai-si" class="@yield('nilai-active')"><i class="lnr lnr-book"></i> <span>Masukkan Nilai</span></a></li>
						</ul>
						@elseif(Auth::user()->program_studi==2)
						<ul class="nav">
							<li><a href="/home/nilai-ti" class="@yield('nilai-ti-active')"><i class="lnr lnr-book"></i> <span>Masukkan Nilai</span></a></li>
						</ul>
						@elseif(Auth::user()->program_studi==3)
						<ul class="nav">
							<li><a href="/home/nilai-mi" class="@yield('nilai-mi-active')"><i class="lnr lnr-book"></i> <span>Masukkan Nilai</span></a></li>
						</ul>
						@elseif(Auth::user()->program_studi==4)
						<ul class="nav">
							<li><a href="/home/nilai-pti" class="@yield('nilai-pti-active')"><i class="lnr lnr-book"></i> <span>Masukkan Nilai</span></a></li>
						</ul>
						@endif
					<ul class="nav">
						<li><a href="/home/laporan" class="@yield('kelola-laporan-active')"><i class="lnr lnr-database"></i> <span>Laporan Magang</span></a></li>
					</ul>
					@endif
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content" style="padding:0px">
                @yield('content')
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<!-- <p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p> -->
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<script src="{{asset('assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
	<script src="{{asset('assets/vendor/chartist/js/chartist.min.js')}}"></script>
	<script src="{{asset('assets/scripts/klorofil-common.js')}}"></script>
</body>

</html>
