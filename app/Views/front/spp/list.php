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
<a href="<?= base_url('home/ppdb') ?>" class="get-started-btn">PPDB</a>
<?= $this->endSection('navbar') ?>
<?= $this->section('isi') ?>
<?= form_open('home/searchspp') ?>
<div class="container">
    <br>
    <center>
        <h4>CEK SPP Siswa</h4>
        <?php
        if (session()->getFlashdata('alert')) {
            echo '<center><div class="alert alert-danger alert-dismissible col-md-6 text-center animate-box">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
            echo session()->getFlashdata('alert');
            echo '</div></center>';
        }
        ?>
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
</div>
<?= form_close() ?>
<?= $this->endSection('isi') ?>