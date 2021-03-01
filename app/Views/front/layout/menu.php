<?= $this->extend('front/layout/main') ?>
<?= $this->section('navbar') ?>
<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li class="active"><a href="#hero">Home</a></li>
        <li><a href="#visimisi">Visi Misi</a></li>
        <li class="drop-down"><a href="#">Artikel</a>
            <ul>
                <li><a href="#berita">Berita</a></li>
                <li><a href="#gallery">Gallery</a></li>
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
        <li><a href="#footer">Contact</a></li>
    </ul>
</nav><!-- .nav-menu -->
<a href="<?= base_url('ppdb') ?>" class="get-started-btn">PPDB</a>
<?= $this->endSection('navbar') ?>
<?= $this->section('isi') ?>

<!-- ======= Counts Section ======= -->
<section id="counts" class="counts section-bg">
    <div class="container">

        <div class="row counters">

            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?= $staf['staf_id'] ?></span>
                <p>Staf</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?= $guru['guru_id'] ?></span>
                <p>Guru</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?= $kelas['kelas_id'] ?></span>
                <p>Kelas</p>
            </div>

            <div class="col-lg-3 col-6 text-center">
                <span data-toggle="counter-up"><?= $siswa['siswa_id'] ?></span>
                <p>Siswa</p>
            </div>

        </div>

    </div>
</section>
<!-- ======= About Section ======= -->
<section id="visimisi" class="about">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Visi & Misi</h2>
        </div>

        <div class="row">

            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                <h5>Visi</h5>
                <p class="font-italic">
                    <?= $konfigurasi['visi'] ?>
                </p>
                <h5>Misi</h5>
                <p class="font-italic">
                    <?= $konfigurasi['misi'] ?>
                </p>
            </div>
        </div>

    </div>
</section><!-- End About Section -->


<section id="staf" class="trainers">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Staf</h2>
        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php
            foreach ($list_staf as $data) :
            ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <img src="<?= base_url('img/staf/thumb/' . 'thumb_' . $data['foto']) ?>" width="100%" class="img-fluid" alt="">
                        <div class="member-content">
                            <h4><?= $data['nama'] ?></h4>
                            <h6><?= $data['nip'] ?></h6>
                            <span><?= $data['jabatan'] ?></span>
                            <p>
                                <?= $data['alamat'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <br>
        <a href="<?= base_url('home/staf') ?>" class="btn btn-success">Lihat selengkapnya <i class="mdi mdi-sort-variant"></i> </a>
    </div>
</section>

<section id="berita" class="courses">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Berita</h2>
        </div>
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            <?php
            foreach ($berita as $data) :
            ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="course-item">
                        <a href="<?= base_url('home/detail_berita/' . $data['slug_berita']) ?>">
                            <img src="<?= base_url('img/berita/thumb/' . 'thumb_' . $data['gambar']) ?>" width="100%" class="img-fluid" alt="...">
                        </a>
                        <div class="course-content">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><?= $data['nama_kategori'] ?></h4>
                            </div>
                            <h6><?= date_indo($data['tgl_berita']) ?></h6>
                            <h3><a href="<?= base_url('home/detail_berita/' . $data['slug_berita']) ?>"><?= $data['judul_berita'] ?></a></h3>
                            <p> <?= substr(strip_tags($data['isi']), 0, 150) ?>...</p>
                            <div class="trainer d-flex justify-content-between align-items-center">
                                <div class="trainer-profile d-flex align-items-center">
                                    <img src="<?= base_url('img/user/thumb/' . 'thumb_' . $data['foto']) ?>" class="img-fluid" alt="">
                                    <span><?= $data['nama'] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Course Item-->
            <?php endforeach; ?>
        </div>
        <br>
        <a href="<?= base_url('home/berita') ?>" class="btn btn-success">Lihat selengkapnya <i class="mdi mdi-sort-variant"></i> </a>
    </div>
</section>

<!-- ======= Events Section ======= -->

<section id="gallery" class="events">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Gallery</h2>
        </div>
        <div class="row">
            <?php
            foreach ($gallery as $data) :
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
        <a href="<?= base_url('home/gallery') ?>" class="btn btn-success">Lihat selengkapnya <i class="mdi mdi-sort-variant"></i> </a>
    </div>
</section><!-- End Events Section -->


<?= $this->endSection('isi') ?>