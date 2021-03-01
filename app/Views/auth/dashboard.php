<?= $this->extend('auth/layout/script') ?>

<?= $this->section('judul') ?>
<div class="col-sm-6">
    <h4 class="page-title">Dashboard</h4>
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
    <?php if (session()->get('level') == 1) { ?>
        <strong>Selamat datang!</strong> Anda login sebagai author.
    <?php } ?>
    <?php if (session()->get('level') == 2) { ?>
        <strong>Selamat datang!</strong> Anda login sebagai admin.
    <?php } ?>
</div>
<div class="row">
    <?php if (session()->get('level') == 2) { ?>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-account-star-outline bg-primary  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Staf</h5>
                    </div>
                    <h3 class="mt-4"><?= $staf['staf_id'] ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-account-group bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Guru</h5>
                    </div>
                    <h3 class="mt-4"><?= $guru['guru_id'] ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-account-badge-horizontal bg-secondary text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Siswa</h5>
                    </div>
                    <h3 class="mt-4"><?= $siswa['siswa_id'] ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-menu-open bg-info text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Kelas</h5>
                    </div>
                    <h3 class="mt-4"><?= $kelas['kelas_id'] ?></h3>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-bullhorn-outline bg-primary text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Kelulusan</h5>
                    </div>
                    <h3 class="mt-4"><?= $kelulusan['kelulusan_id'] ?></h3>
                </div>
            </div>
        </div>

    <?php } ?>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-4">
                <div class="mini-stat-icon float-right">
                    <i class="mdi mdi-folder-image bg-danger text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Gallery</h5>
                </div>
                <h3 class="mt-4"><?= $gallery['gallery_id'] ?></h3>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-4">
                <div class="mini-stat-icon float-right">
                    <i class="mdi mdi-newspaper bg-warning text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Berita</h5>
                </div>
                <h3 class="mt-4"><?= $berita['berita_id'] ?></h3>
            </div>
        </div>
    </div>


    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-4">
                <div class="mini-stat-icon float-right">
                    <i class="mdi mdi-bullhorn-outline bg-secondary text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Pengumuman</h5>
                </div>
                <h3 class="mt-4"><?= $pengumuman['pengumuman_id'] ?></h3>
            </div>
        </div>
    </div>
    <?php if (session()->get('level') == 1) { ?>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-account-group bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Peserta PPDB</h5>
                    </div>
                    <h3 class="mt-4"><?= $ppdb['ppdb_id'] ?></h3>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<?= $this->endSection('isi') ?>