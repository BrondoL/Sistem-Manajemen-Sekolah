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
                <li class="active"><a href="<?= base_url('home/cekspp') ?>">Cek SPP</a></li>
                <li><a href="<?= base_url('home/kelulusan') ?>">Pengumuman Kelulusan</a></li>
            </ul>
        </li>
        <li><a href="<?= base_url('#footer') ?>">Contact</a></li>
    </ul>
</nav><!-- .nav-menu -->
<a href="<?= base_url('ppdb') ?>" class="get-started-btn">PPDB</a>
<?= $this->endSection('navbar') ?>
<?= $this->section('isi') ?><br>

<?= form_open('home/searchspp') ?>
<div class="container">
    <br>
    <center>
        <h4>CEK SPP Siswa</h4>
        <small>*Masukkan NIS anda. ex : 10785</small>
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
        <h6 class="text-center">Pastikan nis anda sudah benar.</h6>
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
<?php foreach ($spp as $value) { ?>
    <center>
        <div class="card text-white bg-success mb-3" style="max-width: 25rem;">
            <div class="card-body">
                <h5 class="card-title text-center"><?= $value['nama'] ?></h5>
                <h6 class="card-title text-center"><?= $value['nama_kelas'] ?></h6>
                <table class="table text-white table-borderless">
                    <tbody>
                        <tr>
                            <th>Januari </th>
                            <td>: <?= $value['januari'] ?></td>
                        </tr>
                        <tr>
                            <th>Februari </th>
                            <td>: <?= $value['februari'] ?></td>
                        </tr>
                        <tr>
                            <th>Maret </th>
                            <td>: <?= $value['maret'] ?></td>
                        </tr>
                        <tr>
                            <th>April </th>
                            <td>: <?= $value['april'] ?></td>
                        </tr>
                        <tr>
                            <th>Mei </th>
                            <td>: <?= $value['mei'] ?></td>
                        </tr>
                        <tr>
                            <th>Juni </th>
                            <td>: <?= $value['juni'] ?></td>
                        </tr>
                        <tr>
                            <th>Juli </th>
                            <td>: <?= $value['juli'] ?></td>
                        </tr>
                        <tr>
                            <th>Agustus </th>
                            <td>: <?= $value['agustus'] ?></td>
                        </tr>
                        <tr>
                            <th>September </th>
                            <td>: <?= $value['september'] ?></td>
                        </tr>
                        <tr>
                            <th>Oktober </th>
                            <td>: <?= $value['oktober'] ?></td>
                        </tr>
                        <tr>
                            <th>November </th>
                            <td>: <?= $value['november'] ?></td>
                        </tr>
                        <tr>
                            <th>Desember </th>
                            <td>: <?= $value['desember'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </center>
<?php } ?>
<?= $this->endSection('isi') ?>