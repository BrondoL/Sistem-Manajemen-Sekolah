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
            <?= form_open('siswa/updatespp', ['class' => 'formspp']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="spp_id" value="<?= $spp_id ?>" name="spp_id" readonly>
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nis</label>
                    <div class="col-sm-8">
                        <select name="siswa_id" id="siswa_id" class="js-example-basic-single">
                            <?php foreach ($siswa as $key => $data) { ?>
                                <option value="<?= $data['siswa_id'] ?>" <?php if ($data['siswa_id'] == $siswa_id) echo "selected"; ?>><?= $data['nis'] ?> (<?= $data['nama'] ?> | <?= $data['nama_kelas'] ?>)</option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback errorSiswa">

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Januari</label>
                        <select name="januari" id="januari" class="form-control">
                            <option value="Lunas" <?php if ($januari == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($januari == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorJanuari">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>Februari</label>
                        <select name="februari" id="februari" class="form-control">
                            <option value="Lunas" <?php if ($februari == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($februari == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorFebruari">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Maret</label>
                        <select name="maret" id="maret" class="form-control">
                            <option value="Lunas" <?php if ($maret == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($maret == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorMaret">
                        </div>
                    </div>
                    <div class="form-group col-md-6 col-12">
                        <label>April</label>
                        <select name="april" id="april" class="form-control">
                            <option value="Lunas" <?php if ($april == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($april == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorApril">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Mei</label>
                        <select name="mei" id="mei" class="form-control">
                            <option value="Lunas" <?php if ($mei == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($mei == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorMei">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Juni</label>
                        <select name="juni" id="juni" class="form-control">
                            <option value="Lunas" <?php if ($juni == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($juni == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorJuni">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>Juli</label>
                        <select name="juli" id="juli" class="form-control">
                            <option value="Lunas" <?php if ($juli == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($juli == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorJuli">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Agustus</label>
                        <select name="agustus" id="agustus" class="form-control">
                            <option value="Lunas" <?php if ($agustus == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($agustus == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorAgustus">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>September</label>
                        <select name="september" id="september" class="form-control">
                            <option value="Lunas" <?php if ($september == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($september == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorSeptember">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Oktober</label>
                        <select name="oktober" id="oktober" class="form-control">
                            <option value="Lunas" <?php if ($oktober == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($oktober == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorOktober">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label>November</label>
                        <select name="november" id="november" class="form-control">
                            <option value="Lunas" <?php if ($november == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($november == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorNovember">
                        </div>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label>Desember</label>
                        <select name="desember" id="desember" class="form-control">
                            <option value="Lunas" <?php if ($desember == 'Lunas') echo "selected"; ?>>Lunas</option>
                            <option value="Belum Bayar" <?php if ($desember == 'Belum Bayar') echo "selected"; ?>>Belum Bayar</option>
                        </select>
                        <div class="invalid-feedback errorDesember">
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
            theme: "bootstrap4",
        }).prop('disabled', true);

        $('.formspp').submit(function(e) {
            e.preventDefault();
            $('.js-example-basic-single').select2({
                theme: "bootstrap4",
            }).prop('disabled', false);
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
                        if (response.error.siswa_id) {
                            $('#siswa_id').addClass('is-invalid');
                            $('.errorSiswa').html(response.error.siswa_id);
                        } else {
                            $('#siswa_id').removeClass('is-invalid');
                            $('.errorSiswa').html('');
                        }

                        if (response.error.januari) {
                            $('#januari').addClass('is-invalid');
                            $('.errorJanuari').html(response.error.januari);
                        } else {
                            $('#januari').removeClass('is-invalid');
                            $('.errorJanuari').html('');
                        }

                        if (response.error.februari) {
                            $('#februari').addClass('is-invalid');
                            $('.errorFebruari').html(response.error.februari);
                        } else {
                            $('#februari').removeClass('is-invalid');
                            $('.errorFebruari').html('');
                        }

                        if (response.error.maret) {
                            $('#maret').addClass('is-invalid');
                            $('.errorMaret').html(response.error.maret);
                        } else {
                            $('#maret').removeClass('is-invalid');
                            $('.errorMaret').html('');
                        }

                        if (response.error.april) {
                            $('#april').addClass('is-invalid');
                            $('.errorApril').html(response.error.april);
                        } else {
                            $('#april').removeClass('is-invalid');
                            $('.errorApril').html('');
                        }

                        if (response.error.mei) {
                            $('#mei').addClass('is-invalid');
                            $('.errorMei').html(response.error.mei);
                        } else {
                            $('#mei').removeClass('is-invalid');
                            $('.errorMei').html('');
                        }

                        if (response.error.juni) {
                            $('#juni').addClass('is-invalid');
                            $('.errorJuni').html(response.error.juni);
                        } else {
                            $('#juni').removeClass('is-invalid');
                            $('.errorJuni').html('');
                        }

                        if (response.error.juli) {
                            $('#juli').addClass('is-invalid');
                            $('.errorJuli').html(response.error.juli);
                        } else {
                            $('#juli').removeClass('is-invalid');
                            $('.errorJuli').html('');
                        }

                        if (response.error.agustus) {
                            $('#agustus').addClass('is-invalid');
                            $('.errorAgustus').html(response.error.agustus);
                        } else {
                            $('#agustus').removeClass('is-invalid');
                            $('.errorAgustus').html('');
                        }

                        if (response.error.september) {
                            $('#september').addClass('is-invalid');
                            $('.errorSeptember').html(response.error.september);
                        } else {
                            $('#september').removeClass('is-invalid');
                            $('.errorSeptember').html('');
                        }

                        if (response.error.oktober) {
                            $('#oktober').addClass('is-invalid');
                            $('.errorOktober').html(response.error.oktober);
                        } else {
                            $('#oktober').removeClass('is-invalid');
                            $('.errorOktober').html('');
                        }

                        if (response.error.november) {
                            $('#november').addClass('is-invalid');
                            $('.errorNovember').html(response.error.november);
                        } else {
                            $('#november').removeClass('is-invalid');
                            $('.errorNovember').html('');
                        }

                        if (response.error.desember) {
                            $('#desember').addClass('is-invalid');
                            $('.errorDesember').html(response.error.desember);
                        } else {
                            $('#desember').removeClass('is-invalid');
                            $('.errorDesember').html('');
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
                        listspp();
                    }
                }
            });
        })
    });
</script>