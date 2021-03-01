<?= $this->extend('front/layout/main') ?>
<?= $this->section('navbar') ?>
<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li><a href="<?= base_url() ?>">Home</a></li>
        <li><a href="<?= base_url('#visimisi') ?>">Visi Misi</a></li>
        <li class="drop-down active"><a href="#">Artikel</a>
            <ul>
                <li><a href="<?= base_url('home/berita') ?>">Berita</a></li>
                <li class="active"><a href="<?= base_url('home/gallery') ?>">Gallery</a></li>
            </ul>
        </li>
        <li class="drop-down"><a href="#">Tenaga Pendidik</a>
            <ul>
                <li><a href="<?= base_url('home/staf') ?>">Staf</a></li>
                <li><a href="<?= base_url('home/guru') ?>">Guru</a></li>
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
<div class="events">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Gallery</h2>
        </div>
        <div class="row">
            <?php
            foreach ($list_gallery as $data) :
            ?>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div class="card">
                        <div class="card-img">
                            <a href="<?= base_url('home/detail_gallery/' . $data['gallery_id']) ?>">
                                <img src="<?= base_url('img/sampul/thumb/' . 'thumb_' . $data['sampul']) ?>" alt="...">
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="<?= base_url('home/detail_gallery/' . $data['gallery_id']) ?>"><?= $data['nama_gallery'] ?></a></h5>
                            <p class="font-italic text-center"><?= date_indo($data['tgl_gallery']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <?= $pager->links('gallery', 'custom_pagination'); ?>
    </div>
</div>
<?= $this->endSection('isi') ?>