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
            <?= form_open('pengumuman/update', ['class' => 'formedit']) ?>
            <?= csrf_field(); ?>
            <div class="modal-body">
                <input type="hidden" class="form-control" id="pengumuman_id" value="<?= $pengumuman_id ?>" name="pengumuman_id" readonly>
                <div class="form-group">
                    <label>Judul Pengumuman</label>
                    <input type="text" class="form-control" id="judul_pengumuman" value="<?= $judul_pengumuman ?>" name="judul_pengumuman">
                    <div class="invalid-feedback errorJudul">
                    </div>
                </div>

                <div class="form-group">
                    <label>Isi</label>
                    <textarea type="text" class="form-control" id="isi_pengumuman" name="isi_pengumuman"><?= $isi_pengumuman ?></textarea>
                    <div class="invalid-feedback errorIsi">
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
        $('textarea#isi_pengumuman').summernote({
            height: 250,
            minHeight: null,
            maxHeight: null,
            focus: true
        });
        $('.formedit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: {
                    pengumuman_id: $('input#pengumuman_id').val(),
                    judul_pengumuman: $('input#judul_pengumuman').val(),
                    isi_pengumuman: $('textarea#isi_pengumuman').val(),
                    tanggal: date,
                },
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
                        if (response.error.judul_pengumuman) {
                            $('#judul_pengumuman').addClass('is-invalid');
                            $('.errorJudul').html(response.error.judul_pengumuman);
                        } else {
                            $('#judul_pengumuman').removeClass('is-invalid');
                            $('.errorJudul').html('');
                        }

                        if (response.error.isi_pengumuman) {
                            $('#isi_pengumuman').addClass('is-invalid');
                            $('.errorIsi').html(response.error.isi_pengumuman);
                        } else {
                            $('#isi_pengumuman').removeClass('is-invalid');
                            $('.errorIsi').html('');
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
                        listpengumuman();
                    }
                }
            });
        })
    });
</script>