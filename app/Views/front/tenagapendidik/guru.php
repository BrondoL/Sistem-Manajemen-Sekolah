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
        <li class="drop-down active"><a href="#">Tenaga Pendidik</a>
            <ul>
                <li><a href="<?= base_url('home/staf') ?>">Staf</a></li>
                <li class="active"><a href="<?= base_url('home/guru') ?>">Guru</a></li>
            </ul>
        </li>
        <li class="drop-down"><a href="#">Siswa</a>
            <ul>
                <li><a href="<?= base_url('home/cekspp') ?>">Cek SPP</a></li>
                <li><a href="<?= base_url('home/kelulusan') ?>">Pengumuman Kelulusan</a></li>
            </ul>
        </li>
        <li><a href="<?= base_url('#footer') ?>">Contact</a></li>
    </ul>
</nav><!-- .nav-menu -->
<a href="<?= base_url('ppdb') ?>" class="get-started-btn">PPDB</a>
<?= $this->endSection('navbar') ?>
<?= $this->section('isi') ?>
<br>
<div class="trainers">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Guru</h2>
        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php
            foreach ($list_guru as $data) :
            ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="<?= base_url('img/guru/thumb/' . 'thumb_' . $data['foto']) ?>" width="100%" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4><?= $data['nama'] ?></h4>
                            <h6><?= $data['nip'] ?></h6>
                            <span><?= $data['nama_mapel'] ?></span>
                            <p>
                                <?= $data['alamat'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $pager->links('guru', 'custom_pagination'); ?>
    </div>
</div>
<?= $this->endSection('isi') ?>