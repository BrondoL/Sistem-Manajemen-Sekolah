<?= $this->extend('auth/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title"><?= $title ?></h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <li class="breadcrumb-item"><a href="javascript:void(0);">Konfigurasi</a></li>
        <li class="breadcrumb-item active">Website</li>
    </ol>
</div>
<?= $this->endSection('judul') ?>
<?= $this->section('isi') ?>
<div class="viewmodal">
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <?= form_open('konfigurasi/submit', ['class' => 'formtambah']) ?>
            <div class="card-body">
                <i class="mdi mdi-circle-edit-outline"></i> Konfigurasi Website
                <hr>
                <input type="hidden" class="form-control" id="konfigurasi_id" value="<?= $konfigurasi_id ?>" name="konfigurasi_id" readonly>
                <div class="form-group">
                    <label> <i class="mdi mdi-text-shadow"></i>
                        Judul Halaman Website
                    </label>
                    <input type="text" id="nama_web" value="<?= esc($nama_web) ?>" name="nama_web" class="form-control">
                    <div class="invalid-feedback errorNama">
                    </div>
                </div>

                <div class="form-group">
                    <label> <i class=" mdi mdi-playlist-star"></i>
                        Deskripsi
                    </label>
                    <textarea type="text" id="deskripsi" name="deskripsi" class="form-control"><?= esc($deskripsi) ?></textarea>
                </div>

                <div class="form-group">
                    <label> <i class="mdi mdi-chevron-triple-up"></i>
                        Visi
                    </label>
                    <input type="text" id="visi" name="visi" value="<?= esc($visi) ?>" class="form-control">
                </div>

                <div class="form-group">
                    <label> <i class="mdi mdi-chevron-triple-up"></i>
                        Misi
                    </label>
                    <input type="text" id="misi" name="misi" value="<?= esc($misi) ?>" class="form-control">
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-instagram"></i>
                            Instagram
                        </label>
                        <input type="text" id="instagram" name="instagram" value="<?= esc($instagram) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-facebook"></i>
                            Facebook
                        </label>
                        <input type="text" id="facebook" name="facebook" value="<?= esc($facebook) ?>" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-whatsapp"></i>
                            Whatsapp
                        </label>
                        <input type="text" id="whatsapp" name="whatsapp" value="<?= esc($whatsapp) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-email"></i>
                            Email
                        </label>
                        <input type="text" id="email" name="email" value="<?= esc($email) ?>" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label> <i class="mdi mdi-office-building"></i>
                        Alamat
                    </label>
                    <input type="text" id="alamat" name="alamat" value="<?= esc($alamat) ?>" class="form-control">
                </div>

                <button class="btn btn-primary btnsimpan"><i class="fa fa-paper-plane"></i> Update</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body">
                <i class="mdi mdi-image-filter-hdr"></i> Logo Website <br>
                <small>*Klik foto untuk mengganti foto.</small>
                <hr>
                <div class="form-group text-center">
                    <img class="img-thumbnail logoweb" onclick="logo('<?= $konfigurasi_id ?>')" src="<?= site_url('img/konfigurasi/logo/' . $logo) ?>" width="200px" alt="Foto">
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <i class="mdi mdi-image-filter-vintage"></i> Icon Website <br>
                <small>*Klik foto untuk mengganti foto.</small>
                <hr>
                <div class="form-group text-center">
                    <img class="img-thumbnail" onclick="icon('<?= $konfigurasi_id ?>')" src="<?= site_url('img/konfigurasi/icon/'  . $icon) ?>" width="60%" alt="Foto">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.formtambah').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: {
                konfigurasi_id: $('input#konfigurasi_id').val(),
                nama_web: $('input#nama_web').val(),
                deskripsi: $('textarea#deskripsi').val(),
                visi: $('input#visi').val(),
                misi: $('input#misi').val(),
                instagram: $('input#instagram').val(),
                facebook: $('input#facebook').val(),
                whatsapp: $('input#whatsapp').val(),
                email: $('input#email').val(),
                alamat: $('input#alamat').val(),

            },
            dataType: "json",
            beforeSend: function() {
                $('.btnsimpan').attr('disable', 'disable');
                $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
            },
            complete: function() {
                $('.btnsimpan').removeAttr('disable', 'disable');
                $('.btnsimpan').html('<i class="fa fa-paper-plane"></i> Update');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nama_web) {
                        $('#nama_web').addClass('is-invalid');
                        $('.errorNama').html(response.error.nama_web);
                    } else {
                        $('#nama_web').removeClass('is-invalid');
                        $('.errorNama').html('');
                    }
                } else {
                    Swal.fire({
                        title: "Berhasil!",
                        text: response.sukses,
                        icon: "success",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    })

    function logo(konfigurasi_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('konfigurasi/formuploadlogo') ?>",
            data: {
                konfigurasi_id: konfigurasi_id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalupload').modal('show');

                }
            }
        });
    }

    function icon(konfigurasi_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('konfigurasi/formuploadicon') ?>",
            data: {
                konfigurasi_id: konfigurasi_id
            },
            dataType: "json",
            success: function(response) {
                if (response.sukses) {
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalupload').modal('show');

                }
            }
        });
    }
</script>
<?= $this->endSection('isi') ?>