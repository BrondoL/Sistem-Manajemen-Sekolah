<?= $this->extend('front/layout/main') ?>
<?= $this->section('navbar') ?>
<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li><a href="<?= base_url() ?>">Home</a></li>
        <li><a href="<?= base_url('#visimisi') ?>">Visi Misi</a></li>
        <li class="drop-down"><a href="#">Artikel</a>
            <ul>
                <li><a href="<?= base_url('home/berita') ?>">Berita</a></li>
                <li><a href="<?= base_url('home/gallery') ?>">Gallery</a></li>
            </ul>
        </li>
        <li class="drop-down"><a href="#">Tenaga Pendidik</a>
            <ul>
                <li><a href="<?= base_url('home/staf') ?>">Staf</a></li>
                <li><a href="<?= base_url('home/guru') ?>">Guru</a></li>
            </ul>
        </li>
        <li class="drop-down active"><a href="#">Siswa</a>
            <ul>
                <li><a href="<?= base_url('home/cekspp') ?>">Cek SPP</a></li>
                <li class="active"><a href="<?= base_url('home/kelulusan') ?>">Pengumuman Kelulusan</a></li>
            </ul>
        </li>
        <li><a href="<?= base_url('#footer') ?>">Contact</a></li>
    </ul>
</nav><!-- .nav-menu -->
<a href="<?= base_url('ppdb') ?>" class="get-started-btn">PPDB</a>
<?= $this->endSection('navbar') ?>
<?= $this->section('isi') ?><br>

<?= form_open('home/searchkelulusan') ?>
<div class="container">
    <br>
    <center>
        <h4><?= $title ?></h4>
        <small>*Masukkan No. ujian anda | ex : 3-20-11-01-0080-0001-8</small>
        <br>
        <div class="col-md-6 col-md-offset-3 animate-box">
            <div class="form-group input-group">
                <input type="text" class="form-control" name="keyword" onkeypress="return numberOnly(event)" minlength="5" required>
                <span class="input-group-btn">
                    <button class="btn btn-success" type="submit" name="search_submit"><i class="mdi mdi-account-search"></i>
                    </button>
                </span>
            </div>
        </div>
        <h6 class="text-center">Pastikan No. ujian anda sudah benar.</h6>
        <br>
    </center>
    <?= form_close() ?>
</div>
<hr>
<style>
    .table-borderless>tbody>tr>td,
    .table-borderless>tbody>tr>th,
    .table-borderless>tfoot>tr>td,
    .table-borderless>tfoot>tr>th,
    .table-borderless>thead>tr>td,
    .table-borderless>thead>tr>th {
        border: none;
    }
</style>
<?php foreach ($kelulusan as $value) { ?>
    <?php if ($value['keterangan'] == 'LULUS') { ?>
        <center>
            <div class="card text-white bg-success mb-3 animate-box" style="max-width: 25rem;">
                <div class="card-header bg-success">SELAMAT ANDA DINYATAKAN LULUS!</div>
                <div class="card-body">
                    <h5 class="card-title text-center"><?= $value['nama'] ?></h5>
                    <h6 class="card-title text-center"><?= $value['nama_kelas'] ?></h6>
                    <table class="table text-white table-borderless">
                        <tbody>
                            <tr>
                                <th>Nis </th>
                                <td>: <?= $value['nis'] ?></td>
                            </tr>
                            <tr>
                                <th>Nomor Ujian </th>
                                <td>: <?= $value['no_ujian'] ?></td>
                            </tr>
                            <tr>
                                <th>Jurusan </th>
                                <td>: <?= $value['jurusan'] ?></td>
                            </tr>
                            <tr>
                                <th>Mapel </th>
                                <td>: <?= $value['mapel'] ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </center>
    <?php } elseif ($value['keterangan'] == 'TUNDA') { ?>
        <center>
            <div class="alert alert-warning alert-dismissible fade show col-lg-4" role="alert">
                <i class="mdi mdi-account-multiple-outline"></i>
                <strong>Maaf!, <?= $value['nama'] ?></strong><br> Kelulusan anda ditunda.
            </div>
        </center>
    <?php } else { ?>
        <center>
            <div class="alert alert-danger alert-dismissible fade show col-lg-4" role="alert">
                <i class="mdi mdi-account-multiple-outline"></i>
                <strong>Maaf!, <?= $value['nama'] ?></strong><br> Anda dinyatakan tidak lulus.
            </div>
        </center>
    <?php }
    ?>
<?php } ?>
<?= $this->endSection('isi') ?>