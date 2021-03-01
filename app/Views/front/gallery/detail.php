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
<a href="<?= base_url('home/ppdb') ?>" class="get-started-btn">PPDB</a>
<?= $this->endSection('navbar') ?>
<?= $this->section('isi') ?>
<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-8">
                <h3><?= $gallery->nama_gallery ?></h3><br>
                <div id="gallery" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="<?= base_url('img/sampul/thumb/' . 'thumb_' . $gallery->sampul) ?>" alt="..." class="d-block img-fluid mx-auto">
                            <div class="carousel-caption d-none d-md-block">
                                <h4>List Foto - Gallery <?= $gallery->nama_gallery ?> </h4>
                            </div>
                        </div>
                        <?php
                        foreach ($list_foto as $data) :
                        ?>
                            <div class="carousel-item">
                                <img src="<?= base_url('img/foto/thumb/' . 'thumb_' . $data['nama_foto']) ?>" alt="..." width="100%" class="d-block img-fluid mx-auto">
                                <div class="carousel-caption d-none d-md-block">
                                    <h4><?= $data['ket_foto'] ?> </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="col-lg-4">

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Tanggal</h5>
                    <p><?= date_indo($gallery->tgl_gallery) ?></p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Post By</h5>
                    <p> <?= $gallery->nama ?></p>
                </div>

                <div class="text-center">
                    <h5>Bagikan Gallery</h5>
                    <a href="http://www.facebook.com/sharer.php?u=<?= base_url('home/detail_gallery/' . $gallery->gallery_id) ?>" target="_blank" class="btn btn-primary"><i class="mdi mdi-facebook"></i> Facebook</a>
                    <a href="http://twitter.com/share?url=<?= base_url('home/detail_gallery/' . $gallery->gallery_id) ?>" target="_blank" class="btn btn-info"><i class="mdi mdi-twitter"></i> Twitter</a>
                    <a href="whatsapp://send?text=<?= base_url('home/detail_gallery/' . $gallery->gallery_id) ?>" target="_blank" data-action="share/whatsapp/share" class="btn btn-success"><i class="mdi mdi-whatsapp"></i> Whatsapp</a>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Cource Details Section -->

<?= $this->endSection('isi') ?>