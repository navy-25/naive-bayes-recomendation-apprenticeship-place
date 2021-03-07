

<a class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#modal-add">
    <i class="fa fa-plus"></i>Tambah
</a>
<!-- MODAL -->
<div class="modal inmodal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xs">
        <form name="frm_add" id="frm_add" class="form-horizontal">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h5 class="modal-title"><b>Tambah Data Lokasi </b> </h5>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12" style="padding-top:10px;padding-bottom:10px;border-radius: 15px 15px 15px 15px;background-color:white;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.08)" >
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Nama Instansi</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input class="form-control" placeholder="Nama Instansi" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Kabupaten/Kota</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                        <select class="form-control">
                                            <option value="">--Pilih Kota/Kabupaten--</option>
                                            <option value="Surabaya">Surabaya</option>
                                            <option value="Gresik">Gresik</option>
                                            <option value="Mojokerto">Mojokerto</option>
                                            <option value="Sidoarjo">Sidoarjo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px">
                                <div class="col-md-6">
                                    <label for="">Alamat</label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input class="form-control" placeholder="Alamat Lengkap" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Foto Lokasi</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file">
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:10px">
                                <div class="col-md-6">
                                    <label for="Program Studi"></label>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                        <input class="form-control" placeholder="Alamat Lengkap" type="text">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Peminatan</label>
                                    <div class="input-group">
                                        <input class="form-control" type="file">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
    