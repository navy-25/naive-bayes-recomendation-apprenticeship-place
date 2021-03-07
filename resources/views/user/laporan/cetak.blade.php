<!DOCTYPE html>
<html>
<head>
	<title >Laporan Praktek Industri</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th,body,pre{
			font-size: 10pt;
			font-family: "Times New Roman";
		}
		body{
			padding:10px
		}
		
	</style>
	<center>
		<h5>REKAPITULASI KEGIATAN <BR> PRAKTIK KERJA KERJA INDUSTRI</BR></h5>
	</center>
	<br>
	<?php
			$PS = \App\Models\Program_Studi::all();
			$PM = \App\Models\Peminatan::all();
			for($i = 0; $i < count($PS); $i++){
				if($PS[$i]->id == $user->program_studi){
					$prog = $PS[$i]->nama;
				}
			}
			// dd($user->peminatan);
			for($i = 0; $i < count($PM); $i++){
				if($PM[$i]->id == $user->peminatan){
					$pem = $PM[$i]->nama;
				}elseif($user->peminatan == 0){
					$pem = "Tidak Ada";
				}
			}
		?>
	<table>
		<thead>
			<tr>
				<td>Nama Lengkap</td>
                <td>: {{$user->name}}</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Program Studi/NI</td>
				<td>: S1 - {{$prog}} ({{$pem}}) / {{$user->nim}}</td>
				
			</tr>
			<tr>
				<td>Tempat Praktik Industri</td>
				<td>: {{$magang->lokasi}}</td>
			</tr>
			<tr>
				<td>Bidang Pekerjaan</td>
				<td>: </td>
			</tr>
			<tr>
				<td>Catatan Kegiatan</td>
				<td>: Minggu ke I/II/III/IV/V/VI/VII*) </td>
			</tr>
		</tbody>
	</table>
	<br>
	<table class='table table-bordered'>
		<thead>
			<tr>
                <th style="width:30%">
				<center>
				Hari / Tanggal
				</center>
				</th>
				<th>
				<center>
				Uraian Kegiatan
				</center>
				</th>
				<th style="width:20%">
				<center>
				Paraf Pembimbing <br> Industri
				</center>
				</th>
			</tr>
		</thead>
		<tbody>
			@foreach($laporan as $p)
			<tr>
				<?php
					$hari = $p->created_at->format('l');
					if($hari == "Monday"){
						$hari = "Senin";
					}elseif($hari == "Tuesday"){
						$hari = "Selasa";
					}elseif($hari == "Wednesday"){
						$hari = "Rabu";
					}elseif($hari == "Thursday"){
						$hari = "Kamis";
					}elseif($hari == "Friday"){
						$hari = "Jum'at";
					}elseif($hari == "Saturday"){
						$hari = "Sabtu";
					}elseif($hari == "Sunday"){
						$hari = "Minggu";
					}
				?>
				<td style="width:20%">{{$hari}}, {{$p->created_at->format('d M Y')}}</td>
				<td>{{$p->keterangan}}</td>
				<td style="width:20%"></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<p>*) lingkari yang sesuai</p>
	<p style="margin-left:70%">Surabaya, <br> Pembimbing Industri, <br> <br> <br> <br> <br> Agung Tri Utomo</p>
</body>	
</html>