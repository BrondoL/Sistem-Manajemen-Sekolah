<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('siswa/updateppdb', ['class' => 'formstaf']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="ppdb_id" value="<?= $ppdb_id ?>" name="ppdb_id" readonly>
                <div class="row">
                    <div class="form-group col-md-3 col-12">
                        <label>Nisn</label>
                        <input type="text" class="form-control" id="nisn" value="<?= $nisn ?>" name="nisn" readonly>
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" value="<?= $jurusan ?>" name="jurusan" readonly>
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>Agama</label>
                        <input type="text" class="form-control" id="agama" value="<?= $agama ?>" name="agama" readonly>

                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>Jenis Kelamin</label>
                        <input type="text" class="form-control" id="jenkel" value="<?= $jenkel ?>" name="jenkel" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" value="<?= $nama_lengkap ?>" name="nama_lengkap" readonly>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="<?= $alamat ?>" name="alamat" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 col-12">
                        <label>Tanggal Lahir</label>
                        <input type="text" class="form-control" id="tgl_lahir" value="<?= $tgl_lahir ?>" name="tgl_lahir" readonly>
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" id="tmp_lahir" value="<?= $tmp_lahir ?>" name="tmp_lahir" readonly>
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>Asal Sekolah</label>
                        <input type="text" class="form-control" id="asal_sekolah" value="<?= $asal_sekolah ?>" name="asal_sekolah" readonly>

                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>Transportasi</label>
                        <input type="text" class="form-control" id="transportasi" value="<?= $transportasi ?>" name="transportasi" readonly>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-3 col-12">
                        <label>Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" value="<?= $nama_ayah ?>" name="nama_ayah" readonly>
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" value="<?= $nama_ibu ?>" name="nama_ibu" readonly>
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>Jenis Tinggal</label>
                        <input type="text" class="form-control" id="jenis_tinggal" value="<?= $jenis_tinggal ?>" name="jenis_tinggal" readonly>

                    </div>
                    <div class="form-group col-md-3 col-12">
                        <label>No Telp/Whatsapp</label>
                        <input type="text" class="form-control" id="no_telp" value="<?= $no_telp ?>" name="no_telp" readonly>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group col-md-3 col-12">
                        <center>
                            <a href="<?= site_url('img/ppdb/' . $foto_siswa) ?>" target="_BLANK">
                                <img width="150px" height="170px" src="<?= site_url('img/ppdb/' . $foto_siswa) ?>" alt="Foto Peserta PPDB">
                            </a>
                        </center>
                    </div>
                    <div class="form-group col-md-3 col-12">
                        <center>
                            <a href="<?= site_url('img/ppdb/ijazah/' . $foto_ijazah) ?>" target="_BLANK">
                                <img width="150px" height="170px" src="<?= site_url('img/ppdb/ijazah/'  . $foto_ijazah) ?>" alt="Scan Ijazah">
                            </a>
                        </center>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Proses" <?php if ($status == 'Proses') echo "selected"; ?>>Proses</option>
                            <option value="Lulus" <?php if ($status == 'Lulus') echo "selected"; ?>>Lulus</option>
                            <option value="Gagal" <?php if ($status == 'Gagal') echo "selected"; ?>>Tidak Lulus</option>
                        </select>
                        <small>*Klik foto untuk melihat detail.</small>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btnsimpan"><i class="fa fa-share-square"></i> Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.formstaf').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.btnsimpan').attr('disable', 'disable');
                    $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
                },
                complete: function() {
                    $('.btnsimpan').removeAttr('disable', 'disable');
                    $('.btnsimpan').html('<i class="fa fa-share-square"></i>  Simpan');
                },
                success: function(response) {
                    Swal.fire({
                        title: "Berhasil!",
                        text: response.sukses,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#modaledit').modal('hide');
                    listppdb();
                }
            });
        })
    });
</script>