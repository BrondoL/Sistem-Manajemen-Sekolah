<?= $this->extend('front/layout/main') ?>
<?= $this->section('navbar') ?>
<nav class="nav-menu d-none d-lg-block">
    <ul>
        <li><a href="<?= base_url() ?>">Home</a></li>
        <li><a href="<?= base_url('#visimisi') ?>">Visi Misi</a></li>
        <li class="drop-down active"><a href="#">Artikel</a>
            <ul>
                <li class="active"><a href="<?= base_url('home/berita') ?>">Berita</a></li>
                <li><a href="<?= base_url('home/gallery') ?>">Gallery</a></li>
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
<a href="<?= base_url('home/kelulusan') ?>" class="get-started-btn">Pengumuman Kelulusan</a>
<?= $this->endSection('navbar') ?>
<?= $this->section('isi') ?>
<!-- ======= Cource Details Section ======= -->
<section id="course-details" class="course-details">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-8">
                <img src="<?= base_url('img/berita/' . $berita->gambar) ?>" width="100%" class="img-fluid" alt="">
                <h3><?= $berita->judul_berita ?></h3>
                <p>
                    <?= $berita->isi ?>
                </p>
            </div>
            <div class="col-lg-4">

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Tanggal</h5>
                    <p><?= date_indo($berita->tgl_berita) ?></p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Kategori</h5>
                    <p> <?= $berita->nama_kategori ?></p>
                </div>

                <div class="course-info d-flex justify-content-between align-items-center">
                    <h5>Post By</h5>
                    <p> <?= $berita->nama ?></p>
                </div>

                <div class="text-center">
                    <h5>Bagikan Berita</h5>
                    <a href="http://www.facebook.com/sharer.php?u=<?= base_url('home/detail_berita/' . $berita->slug_berita) ?>" target="_blank" class="btn btn-primary"><i class="mdi mdi-facebook"></i> Facebook</a>
                    <a href="http://twitter.com/share?url=<?= base_url('home/detail_berita/' . $berita->slug_berita) ?>" target="_blank" class="btn btn-info"><i class="mdi mdi-twitter"></i> Twitter</a>
                    <a href="whatsapp://send?text=<?= base_url('home/detail_berita/' . $berita->slug_berita) ?>" target="_blank" data-action="share/whatsapp/share" class="btn btn-success"><i class="mdi mdi-whatsapp"></i> Whatsapp</a>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Cource Details Section -->

<!-- ======= Cource Details Tabs Section ======= -->
<section id="cource-details-tabs" class="cource-details-tabs">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-3">
                <ul class="nav nav-tabs flex-column">
                    <li class="nav-item">
                        <a class="nav-link active show" data-toggle="tab" href="#tab-1">Modi sit est</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-2">Unde praesentium sed</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-3">Pariatur explicabo vel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-4">Nostrum qui quasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#tab-5">Iusto ut expedita aut</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-9 mt-4 mt-lg-0">
                <div class="tab-content">
                    <div class="tab-pane active show" id="tab-1">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Architecto ut aperiam autem id</h3>
                                <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                                <p>Et nobis maiores eius. Voluptatibus ut enim blanditiis atque harum sint. Laborum eos ipsum ipsa odit magni. Incidunt hic ut molestiae aut qui. Est repellat minima eveniet eius et quis magni nihil. Consequatur dolorem quaerat quos qui similique accusamus nostrum rem vero</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="<?= base_url('assets/front/assets/img/course-details-tab-1.png') ?>" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-2">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Et blanditiis nemo veritatis excepturi</h3>
                                <p class="font-italic">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>
                                <p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="<?= base_url('assets/front/assets/img/course-details-tab-2.png') ?> " alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-3">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Impedit facilis occaecati odio neque aperiam sit</h3>
                                <p class="font-italic">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>
                                <p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="<?= base_url('assets/front/assets/img/course-details-tab-3.png') ?> " alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-4">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Fuga dolores inventore laboriosam ut est accusamus laboriosam dolore</h3>
                                <p class="font-italic">Totam aperiam accusamus. Repellat consequuntur iure voluptas iure porro quis delectus</p>
                                <p>Eaque consequuntur consequuntur libero expedita in voluptas. Nostrum ipsam necessitatibus aliquam fugiat debitis quis velit. Eum ex maxime error in consequatur corporis atque. Eligendi asperiores sed qui veritatis aperiam quia a laborum inventore</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="<?= base_url('assets/front/assets/img/course-details-tab-4.png') ?> " alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab-5">
                        <div class="row">
                            <div class="col-lg-8 details order-2 order-lg-1">
                                <h3>Est eveniet ipsam sindera pad rone matrelat sando reda</h3>
                                <p class="font-italic">Omnis blanditiis saepe eos autem qui sunt debitis porro quia.</p>
                                <p>Exercitationem nostrum omnis. Ut reiciendis repudiandae minus. Omnis recusandae ut non quam ut quod eius qui. Ipsum quia odit vero atque qui quibusdam amet. Occaecati sed est sint aut vitae molestiae voluptate vel</p>
                            </div>
                            <div class="col-lg-4 text-center order-1 order-lg-2">
                                <img src="<?= base_url('assets/front/assets/img/course-details-tab-5.png') ?> " alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section><!-- End Cource Details Tabs Section -->
<?= $this->endSection('isi') ?>