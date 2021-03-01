<!-- Modal -->
<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= $title ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('pengumuman/simpankelulusan', ['class' => 'formtambah']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nis</label>
                    <div class="col-sm-8">
                        <select name="siswa_id" id="siswa_id" class="js-example-basic-single">
                            <option Disabled=true Selected=true> </option>
                            <?php foreach ($siswa as $key => $data) { ?>
                                <option value="<?= $data['siswa_id'] ?>"><?= $data['nis'] ?> (<?= $data['nama'] ?> | <?= $data['nama_kelas'] ?>)</option>
                            <?php } ?>
                        </select>
                        <div class="invalid-feedback errorSiswa">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Nomor Ujian</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="no_ujian" name="no_ujian">
                        <div class="invalid-feedback errorNoujian">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Jurusan</label>
                    <div class="col-sm-8">
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option Disabled=true Selected=true>Pilih</option>
                            <option value="IPA">IPA</option>
                            <option value="IPS">IPS</option>
                        </select>
                        <div class="invalid-feedback errorJurusan">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Mapel</label>
                    <div class="col-sm-8">
                        <select name="mapel" id="mapel" class="form-control">
                            <option Disabled=true Selected=true>Pilih</option>
                            <option value="SOSIOLOGI">SOSIOLOGI</option>
                            <option value="EKONOMI">EKONOMI</option>
                            <option value="GEOGRAFI">GEOGRAFI</option>
                            <option value="FISIKA">FISIKA</option>
                            <option value="KIMIA">KIMIA</option>
                            <option value="BIOLOGI">BIOLOGI</option>
                        </select>
                        <div class="invalid-feedback errorMapel">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-4 col-form-label">Keterangan</label>
                    <div class="col-sm-8">
                        <select name="keterangan" id="keterangan" class="form-control">
                            <option Disabled=true Selected=true>Pilih</option>
                            <option value="LULUS">LULUS</option>
                            <option value="TIDAK LULUS">TIDAK LULUS</option>
                            <option value="TUNDA">TUNDA</option>
                        </select>
                        <div class="invalid-feedback errorKeterangan">
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
        $('.formtambah').submit(function(e) {
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
                        if (response.error.siswa_id) {
                            $('#siswa_id').addClass('is-invalid');
                            $('.errorSiswa').html(response.error.siswa_id);
                        } else {
                            $('#siswa_id').removeClass('is-invalid');
                            $('.errorSiswa').html('');
                        }

                        if (response.error.no_ujian) {
                            $('#no_ujian').addClass('is-invalid');
                            $('.errorNoujian').html(response.error.no_ujian);
                        } else {
                            $('#no_ujian').removeClass('is-invalid');
                            $('.errorNoujian').html('');
                        }

                        if (response.error.jurusan) {
                            $('#jurusan').addClass('is-invalid');
                            $('.errorJurusan').html(response.error.jurusan);
                        } else {
                            $('#jurusan').removeClass('is-invalid');
                            $('.errorJurusan').html('');
                        }

                        if (response.error.mapel) {
                            $('#mapel').addClass('is-invalid');
                            $('.errorMapel').html(response.error.mapel);
                        } else {
                            $('#mapel').removeClass('is-invalid');
                            $('.errorMapel').html('');
                        }

                        if (response.error.keterangan) {
                            $('#keterangan').addClass('is-invalid');
                            $('.errorKeterangan').html(response.error.keterangan);
                        } else {
                            $('#keterangan').removeClass('is-invalid');
                            $('.errorKeterangan').html('');
                        }

                    } else {
                        Swal.fire({
                            title: "Berhasil!",
                            text: response.sukses,
                            icon: "success",
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#modaltambah').modal('hide');
                        listkelulusan();
                    }
                }
            });
        })
    });
</script>