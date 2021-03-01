<!-- Modal -->
<div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('guru/update', ['class' => 'formguru']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">

                    <input type="hidden" class="form-control" id="guru_id" value="<?= $guru_id ?>" name="guru_id" readonly>

                    <label for="" class="col-sm-4 col-form-label">Nip</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nip" value="<?= $nip ?>" name=" nip">
                        <div class="invalid-feedback errorNip">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="nama" value="<?= $nama ?>" name="nama">
                        <div class="invalid-feedback errorNama">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="tmp_lahir" value="<?= $tmp_lahir ?>" name="tmp_lahir">
                        <div class="invalid-feedback errorTmp_lahir">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="tgl_lahir" value="<?= $tgl_lahir ?>" name="tgl_lahir">
                        <div class="invalid-feedback errorTgl_lahir">

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nama Mapel</label>
                    <div class="col-sm-8">
                        <select name="mapel_id" id="mapel_id" class="js-example-basic-single">
                            <?php foreach ($mapel as $key => $data) { ?>
                                <option value="<?= $data['mapel_id'] ?>" <?php if ($data['mapel_id'] == $mapel_id) echo "selected"; ?>><?= $data['nama_mapel'] ?></option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback errorMapel">

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Pendidikan</label>
                    <div class="col-sm-8">
                        <select name="pendidikan" id="pendidikan" class="form-control">
                            <option value="SMA/SMK" <?php if ($pendidikan == 'SMA/SMK') echo "selected"; ?>>SMA/SMK</option>
                            <option value="DIII" <?php if ($pendidikan == 'DIII') echo "selected"; ?>>DIII</option>
                            <option value="S1" <?php if ($pendidikan == 'S1') echo "selected"; ?>>S1</option>
                            <option value="S2" <?php if ($pendidikan == 'S2') echo "selected"; ?>>S2</option>
                            <option value="S3" <?php if ($pendidikan == 'S3') echo "selected"; ?>>S3</option>

                        </select>
                        <div class="invalid-feedback errorPendidikan">

                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="alamat" value="<?= $alamat ?>" name="alamat">
                        <div class="invalid-feedback errorAlamat">

                        </div>
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
        $('.js-example-basic-single').select2({
            theme: "bootstrap4"
        });
        $('.formguru').submit(function(e) {
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
                    if (response.error) {
                        if (response.error.nip) {
                            $('#nip').addClass('is-invalid');
                            $('.errorNip').html(response.error.nip);
                        } else {
                            $('#nip').removeClass('is-invalid');
                            $('.errorNip').html('');
                        }

                        if (response.error.nama) {
                            $('#nama').addClass('is-invalid');
                            $('.errorNama').html(response.error.nama);
                        } else {
                            $('#nama').removeClass('is-invalid');
                            $('.errorNama').html('');
                        }

                        if (response.error.tmp_lahir) {
                            $('#tmp_lahir').addClass('is-invalid');
                            $('.errorTmp_lahir').html(response.error.tmp_lahir);
                        } else {
                            $('#tmp_lahir').removeClass('is-invalid');
                            $('.errorTmp_lahir').html('');
                        }

                        if (response.error.tgl_lahir) {
                            $('#tgl_lahir').addClass('is-invalid');
                            $('.errorTgl_lahir').html(response.error.tgl_lahir);
                        } else {
                            $('#tgl_lahir').removeClass('is-invalid');
                            $('.errorTgl_lahir').html('');
                        }

                        if (response.error.mapel_id) {
                            $('#mapel_id').addClass('is-invalid');
                            $('.errorMapel').html(response.error.mapel_id);
                        } else {
                            $('#mapel_id').removeClass('is-invalid');
                            $('.errorMapel').html('');
                        }

                        if (response.error.pendidikan) {
                            $('#pendidikan').addClass('is-invalid');
                            $('.errorPendidikan').html(response.error.pendidikan);
                        } else {
                            $('#pendidikan').removeClass('is-invalid');
                            $('.errorPendidikan').html('');
                        }

                        if (response.error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.errorAlamat').html(response.error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('.errorAlamat').html('');
                        }

                    } else {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.sukses,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#modaledit').modal('hide');
                        listguru();
                    }
                }
            });
        })
    });
</script>