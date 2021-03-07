@extends('layouts.master')

@section('kelola-kota-active')
    active
@endsection


@section('content')
<!-- statistik pengguna -->
<div class="container-fluid">
    <div class="panel panel-headline" style="margin-bottom:0px;background-color:#F5F5FA;box-shadow: 0 0px 0px rgba(0, 0, 0, 0.08)">
        <div class="panel-heading" style="padding-bottom:0px">
            <h3 class="panel-title" style="font-family:roboto;"><b>Ubah Kota</b> </h3>
        </div>
        <div class="panel-body" style="padding-bottom:0px">
            <form class="form-auth-small" method="POST" action="/home/kelola-kota/{{$Kota->id}}/updateKota">
                @csrf
                <div class="form-group">
                    <input id="nama"  value="{{$Kota->nama}}" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" required autocomplete="nama" placeholder="Nama Program Studi" autofocus>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <a href="/home/kelola-kota" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn"  style=" margin:bottom:20px;background-color:#1ABB9C;color:white">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

