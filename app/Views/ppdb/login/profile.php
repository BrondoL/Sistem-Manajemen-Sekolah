<?= $this->extend('ppdb/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title">Profile</h4>
</div>
<div class="col-sm-6">
    <ol class="breadcrumb float-right">
        <div id="clock"></div>
    </ol>
</div>
<script type="text/javascript">
    function showTime() {
        var a_p = "";
        var today = new Date();
        var curr_hour = today.getHours();
        var curr_minute = today.getMinutes();
        var curr_second = today.getSeconds();
        if (curr_hour < 12) {
            a_p = "AM";
        } else {
            a_p = "PM";
        }
        if (curr_hour == 0) {
            curr_hour = 12;
        }
        if (curr_hour > 12) {
            curr_hour = curr_hour - 12;
        }
        curr_hour = checkTime(curr_hour);
        curr_minute = checkTime(curr_minute);
        curr_second = checkTime(curr_second);
        document.getElementById('clock').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
    setInterval(showTime, 500);
</script>
<?= $this->endSection('judul') ?>

<?= $this->section('isi') ?>
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> <i class="mdi mdi-account-multiple-outline"></i>
    <strong>Selamat datang!</strong> <?= esc($nama_lengkap) ?>.
</div>

<div class="viewmodal">
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card mb-4">
            <?= form_open('ppdb/editprofile', ['class' => 'formedit']) ?>
            <div class="card-body">
                <?php
                if ($status == 'Proses') { ?>
                    <div class="alert alert-secondary" role="alert">
                        Data kamu sedang <strong>diproses</strong>, nantikan pengumumannya ya!
                    </div>
                <?php } elseif ($status == 'Lulus') { ?>
                    <div class="alert alert-success" role="alert">
                        Selamat kamu <strong>Lulus</strong> seleksi, silahkan <a href="cetak" target="_blank"><i>cetak data</i></a> !
                        <br> <small>*Jangan lupa bawa hasil cetak ke sekolah !</small>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-danger" role="alert">
                        Maaf kamu <strong>Tidak Lulus</strong> seleksi!
                    </div>
                <?php }
                ?>
                <i class="mdi mdi-circle-edit-outline"></i> Biodata <br>
                <small>*Mohon cek kembali data & pastikan sudah benar.</small><br>
                <small>*Silahkan upload foto & scan ijazahnya ya!.</small>
                <input type="hidden" class="form-control" id="ppdb_id" value="<?= $ppdb_id ?>" name="ppdb_id" readonly>
                <hr>
                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-badge"></i>
                            Nisn
                        </label>
                        <input type="text" id="nisn" name="nisn" value="<?= esc($nisn) ?>" class="form-control" readonly>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-alpha-j-circle-outline"></i>
                            Jurusan
                        </label>
                        <input type="text" id="jurusan" name="jurusan" value="<?= esc($jurusan) ?>" class="form-control" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-tooltip-account"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" id="nama_lengkap" name="nama_lengkap" value="<?= esc($nama_lengkap) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-multiple-outline"></i>
                            Jenis Kelamin
                        </label>
                        <select name="jenkel" id="jenkel" class="form-control">
                            <option value="Laki-Laki" <?php if ($jenkel == 'Laki-Laki') echo "selected"; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php if ($jenkel == 'Perempuan') echo "selected"; ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-google-maps"></i>
                            Alamat
                        </label>
                        <textarea type="text" id="alamat" name="alamat" class="form-control"><?= esc($alamat) ?></textarea>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-map-marker-radius"></i>
                            Jenis Tinggal
                        </label>
                        <select name="jenis_tinggal" id="jenis_tinggal" class="form-control">
                            <option value="Bersama Orangtua" <?php if ($jenis_tinggal == 'Bersama Orangtua') echo "selected"; ?>>Bersama Orangtua</option>
                            <option value="Bersama Saudara" <?php if ($jenis_tinggal == 'Bersama Saudara') echo "selected"; ?>>Bersama Saudara</option>
                            <option value="Kos" <?php if ($jenis_tinggal == 'Kos') echo "selected"; ?>>Kos</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-shield-check-outline"></i>
                            Agama
                        </label>
                        <select name="agama" id="agama" class="form-control">
                            <option value="Islam" <?php if ($agama == 'Islam') echo "selected"; ?>>Islam</option>
                            <option value="Kristen Protestan" <?php if ($agama == 'Kristen Protestan') echo "selected"; ?>>Kristen Protestan</option>
                            <option value="Katolik" <?php if ($agama == 'Katolik') echo "selected"; ?>>Katolik</option>
                            <option value="Hindu" <?php if ($agama == 'Hindu') echo "selected"; ?>>Hindu</option>
                            <option value="Buddha" <?php if ($agama == 'Buddha') echo "selected"; ?>>Buddha</option>
                            <option value="Kong Hu Cu" <?php if ($agama == 'Kong Hu Cu') echo "selected"; ?>>Kong Hu Cu</option>
                        </select>
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-train-car"></i>
                            Transportasi ke Sekolah
                        </label>
                        <select name="transportasi" id="transportasi" class="form-control">
                            <option value="Mobil" <?php if ($transportasi == 'Mobil') echo "selected"; ?>>Mobil</option>
                            <option value="Motor" <?php if ($transportasi == 'Motor') echo "selected"; ?>>Motor</option>
                            <option value="Jalan Kaki" <?php if ($transportasi == 'Jalan Kaki') echo "selected"; ?>>Jalan Kaki</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-office-building"></i>
                            Asal Sekolah
                        </label>
                        <input type="text" id="asal_sekolah" name="asal_sekolah" value="<?= esc($asal_sekolah) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-whatsapp"></i>
                            No Telp
                        </label>
                        <input type="text" id="no_telp" name="no_telp" value="<?= esc($no_telp) ?>" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-timetable"></i>
                            Tanggal Lahir
                        </label>
                        <input type="date" id="tgl_lahir" name="tgl_lahir" value="<?= esc($tgl_lahir) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-hospital-building"></i>
                            Tempat Lahir
                        </label>
                        <input type="text" id="tmp_lahir" name="tmp_lahir" value="<?= esc($tmp_lahir) ?>" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-heart-outline"></i>
                            Nama Ayah
                        </label>
                        <input type="text" id="nama_ayah" name="nama_ayah" value="<?= esc($nama_ayah) ?>" class="form-control">
                    </div>

                    <div class="form-group col-md-6 col-12">
                        <label> <i class="mdi mdi-account-heart-outline"></i>
                            Nama Ibu
                        </label>
                        <input type="text" id="nama_ibu" name="nama_ibu" value="<?= esc($nama_ibu) ?>" class="form-control">
                    </div>
                </div>
                <button class="btn btn-primary btnsimpan"><i class="mdi mdi-content-save-all"></i> Update</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-body">
                <i class="mdi mdi-account-convert"></i> Foto <br>
                <small>*Klik foto untuk mengganti foto.</small>
                <hr>
                <div class="form-group text-center">
                    <img class="img-thumbnail" onclick="fotosiswa('<?= $ppdb_id ?>')" src="<?= site_url('img/ppdb/' . $foto_siswa) ?>" width="65%" alt="Foto Peserta PPDB">
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <i class="mdi mdi-wallpaper"></i> Scan Ijazah <br>
                <small>*Klik foto untuk meng-upload scan ijazah.</small>
                <hr>
                <div class="form-group text-center">
                    <img class="img-thumbnail" onclick="fotoijazah('<?= $ppdb_id ?>')" src="<?= site_url('img/ppdb/ijazah/'  . $foto_ijazah) ?>" width="65%" alt="Scan Ijazah">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('.formedit').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: {
                ppdb_id: $('input#ppdb_id').val(),
                nisn: $('input#nisn').val(),
                jurusan: $('input#jurusan').val(),
                nama_lengkap: $('input#nama_lengkap').val(),
                jenkel: $('select#jenkel').val(),
                alamat: $('textarea#alamat').val(),
                asal_sekolah: $('input#asal_sekolah').val(),
                no_telp: $('input#no_telp').val(),
                jenis_tinggal: $('select#jenis_tinggal').val(),
                agama: $('select#agama').val(),
                transportasi: $('select#transportasi').val(),
                tgl_lahir: $('input#tgl_lahir').val(),
                tmp_lahir: $('input#tmp_lahir').val(),
                nama_ayah: $('input#nama_ayah').val(),
                nama_ibu: $('input#nama_ibu').val(),
            },
            dataType: "json",
            beforeSend: function() {
                $('.btnsimpan').attr('disable', 'disable');
                $('.btnsimpan').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> <i>Loading...</i>');
            },
            complete: function() {
                $('.btnsimpan').removeAttr('disable', 'disable');
                $('.btnsimpan').html('<i class="mdi mdi-content-save-all"></i> Update');
            },
            success: function(response) {
                if (response.error) {
                    if (response.error.nisn) {
                        $('#nisn').addClass('is-invalid');
                        $('.errorNisn').html(response.error.nisn);
                    } else {
                        $('#nisn').removeClass('is-invalid');
                        $('.errorNisn').html('');
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

    function fotosiswa(ppdb_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('ppdb/formuploadfoto') ?>",
            data: {
                ppdb_id: ppdb_id
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

    function fotoijazah(ppdb_id) {
        $.ajax({
            type: "post",
            url: "<?= site_url('ppdb/formuploadijazah') ?>",
            data: {
                ppdb_id: ppdb_id
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