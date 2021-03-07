@extends('layouts.master')

@section('kelola-rekom-active')
    active
@endsection


@section('content')
<div class="container-fluid">
    <div class="alert alert-danger alert-dismissible" style="margin-top:20px" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <i class="fa fa-times-circle" style="margin-right:10px"></i>Nilai Belum dilengkapi !
        @if(Auth::user()->program_studi == 1)
            <a href="/home/nilai-si">
                <span style="margin-left:10px;font-size:13px;background-color" class="label label-danger">Cek sekarang</span>
            </a>
            @elseif(Auth::user()->program_studi == 2)
            <a href="/home/nilai-ti">
                <span style="margin-left:10px;font-size:13px;background-color" class="label label-danger">Cek sekarang</span>
            </a>
            @elseif(Auth::user()->program_studi == 3)
            <a href="/home/nilai-mi">
                <span style="margin-left:10px;font-size:13px;background-color" class="label label-danger">Cek sekarang</span>
            </a>
            @elseif(Auth::user()->program_studi == 4)
            <a href="/home/nilai-pti">
                <span style="margin-left:10px;font-size:13px;background-color" class="label label-danger">Cek sekarang</span>
            </a>
            @endif
    </div>
</div>
@endsection