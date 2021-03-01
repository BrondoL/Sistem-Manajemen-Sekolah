-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 14, 2021 at 01:05 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah_ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `berita_id` int(11) NOT NULL,
  `judul_berita` varchar(150) DEFAULT NULL,
  `slug_berita` varchar(150) DEFAULT NULL,
  `isi` longtext,
  `gambar` varchar(150) DEFAULT NULL,
  `tgl_berita` date DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`berita_id`, `judul_berita`, `slug_berita`, `isi`, `gambar`, `tgl_berita`, `status`, `kategori_id`, `user_id`) VALUES
(2, 'Kemendikbud Sebut Peta Jalan Pendidikan Nasional Akan Kuatkan 3 Aspek, Apa Itu?', 'Kemendikbud-Sebut-Peta-Jalan-Pendidikan-Nasional-Akan-Kuatkan-3-Aspek-Apa-Itu', '                <p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\"><span style=\"color: rgb(255, 51, 0); font-size: 14px;\">Liputan6.com, Jakarta</span> Kementerian Pendidikan dan Kebudayaan (<a href=\"https://www.liputan6.com/tag/kemendikbud\" target=\"_blank\" style=\"color: rgb(255, 51, 0);\">Kemendikbud</a>) masih terus merumuskan <a href=\"https://www.liputan6.com/tag/peta-jalan-pendidikan\" target=\"_blank\" style=\"color: rgb(255, 51, 0);\">Peta Jalan Pendidikan</a> Nasional 2020-2035 yang bakal didorong untuk menjadi peraturan presiden (Perpres).</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Direktur Dikmen Diksus Direktur Guru dan Tenaga Kependidikan Pendidikan Menengah dan Pendidikan Khusus (GTK Dikmensus) Kemendikbud, Yaswardi menuturkan bahwa peta jalan bakal menitikberatkan pada tiga aspek utama <a href=\"https://www.liputan6.com/news/read/4410367/mendikbud-harap-ada-perpres-untuk-kuatkan-peta-jalan-pendidikan\" title=\"pendidikan\" style=\"color: rgb(255, 51, 0);\">pendidikan</a>.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\"><br></p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">\"Peta jalan harus coba memperkuat tiga unsur besar ini, kurikulum sebagai <em>planning</em>, pembelajaran sebagai <em>do</em>, dan yang ketiga asesmen,\" sebut Yaswardi dalam acara Fellowship Jurnalisme Pendidikan 2021 yang dihelat oleh Gerakan Jurnalis Peduli Pendidikan, Kamis (28/1/2021).</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Dalam aspek kurikulum, maka kurikulum yang mengacu pada peta jalan <a href=\"https://www.liputan6.com/news/read/4468540/kemendikbud-targetkan-peta-jalan-pendidikan-2020-2035-rampung-mei-oktober-2021\" title=\"pendidikan\" style=\"color: rgb(255, 51, 0);\">pendidikan</a> akan menyesuaikan diri dengan tahapan kebutuhan para murid.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">\"Karena kurikulum itu disebut dengan <em>life document,</em> jadi dia adalah dokumen hidup yang fleksibel. Makanya dalam hal ini kurikulum yang hebat tetapi tidak didukung dengan profesional seorang guru, kurikulum itu nggak akan bermakna,\" tegas Yaswardi.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Sementara, pada konteks pembelajaran, peta jalan<a href=\"https://www.liputan6.com/news/read/4436580/perluas-akses-pendidikan-kemendikbud-perlonggar-pengajuan-program-indonesia-pintar\" title=\" pendidikan\" style=\"color: rgb(255, 51, 0);\"> pendidikan</a> akan menyempurnakan pembelajaran supaya sesuai dengan kebutuhan para murid.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">\"Saya sudah katakan pembelajaran hari ini dan ke depan idealnya sesuai dengan kebutuhan anak, sesuai dengan tahap perkembangan anak. Itu idealnya,\" kata dia.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Pembelajaran, lanjut Yaswardi, ke depannya bakal mengedepankan basis teknologi informasi serta tak monoton. Dalam peta jalan <a href=\"https://www.liputan6.com/global/read/4463846/inggris-jadikan-pendidikan-perempuan-sebagai-prioritas-global-2021\" title=\"pendidika\" style=\"color: rgb(255, 51, 0);\">pendidika</a>n juga bakal mendukung pembelajaran yang penuh dengan kreativitas.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">\"Di sini dua hal yang harus disiapkan, satu profesional guru itu sendiri, yang kedua adalah fasilitas pendukungnya. Jadi kalau ingin pembelajaran berkualitas, pembelajaran yang efektif harus menjadi perhatian,\" sebutnya. </p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Sementara, untuk asesmen akan diperuntukkan guna mengukur kebutuhan para murid. Asesmen nantinya akan dijadikan alat evaluasi bagi dunia<a href=\"https://www.liputan6.com/bisnis/read/4467160/dana-otsus-papua-dan-papua-barat-belum-optimal-untuk-sektor-pendidikan\" title=\" pendidikan\" style=\"color: rgb(255, 51, 0);\"> pendidikan</a>.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">\"Yang ketiga, asesmen yang memang betul-betul dibutuhkan, yang memang betul-betul mengukur apa sih yang dibutuhkan hari ini oleh anak-anak itu. Yang bisa mengantarkan anak-anak untuk mendapatkan pengetahuan, ilmu sehingga asesmen ini menunjukkan keberhasilan anak dalam proses pembelajaran,\" pungkasnya.</p>', 'ilustrasi-kemendikbud-foto-httpslpmpnttkemdikbudgoid-40.jpg', '2021-02-13', 'published', 6, 1),
(18, 'Diprediksi Makin Online, Pendidikan pada 2021 Rawan Serangan Siber', 'Diprediksi-Makin-Online-Pendidikan-pada-2021-Rawan-Serangan-Siber', '         <p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\"><span style=\"color: rgb(255, 51, 0); font-size: 14px;\">Liputan6.com, Jakarta -</span> Memasuki 2021, <a href=\"https://www.liputan6.com/tag/kaspersky\" style=\"color: rgb(255, 51, 0);\">Kaspersky</a> memprediksi <a href=\"https://www.liputan6.com/tag/pendidikan\" style=\"color: rgb(255, 51, 0);\">pendidikan</a> akan makin ke arah digital. Penggunaan metode video, <a href=\"https://www.liputan6.com/tag/media-sosial\" style=\"color: rgb(255, 51, 0);\">media sosial</a>, hingga <a href=\"https://www.liputan6.com/tag/gaming\" style=\"color: rgb(255, 51, 0);\"><em>gaming</em></a> pun diyakini akan jadi hal yang tidak terelakkan untuk mendukung proses pendidikan.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Salah satu faktor pendorongnya adalah pandemi Covid-19 yang membuat siswa tidak bisa bersekolah secara fisik. Pengajar juga menggunakan platform baru untuk menyelenggarakan kegiatan belajar mengajar, misalnya Zoom.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Meski platform-platform baru ini baik untuk mendukung berkembangnya proses pendidikan, <a href=\"https://www.liputan6.com/tekno/read/4440370/dari-bitcoin-hingga-ransomware-ini-5-prediksi-ancaman-finansial-2021\" title=\"Kaspersky\" style=\"color: rgb(255, 51, 0);\">Kaspersky</a> memprediksi akan ada ancaman baru. Berikut adalah potensi risiko yang mungkin terjadi di sektor pendidikan pada 2021:</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\"><span style=\"font-weight: 700;\">1. Pengembangan Learning Management System (LMS)</span></p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">LMS memungkinkan pengajar untuk melacak proses pembelajaran siswa, menunjukkan proses perkembangan siswa dan aspek yang membutuhkan perhatian dari pengajar. Pasar LMS yang baru diperkirakan masih akan terus berkembang.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Popularitas LMS membuat jumlah situs <em>phishing</em> terkait layanan pendidikan dan konferensi video juga akan bertambah. Tujuan penyerang adalah mencuri data pribadi atau menyebarkan <em>spam</em> di komunitas pendidikan.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Pada pertengahan 2020, <a href=\"https://www.liputan6.com/tekno/read/4437980/gim-jadi-pencarian-populer-anak-anak-di-internet\" title=\"Kaspersky\" style=\"color: rgb(255, 51, 0);\">Kaspersky</a> mendata ada sebanyak 168 ribu pengguna unik menghadapi berbagai ancaman dengan kedok platform belajar <em>online</em>. Angka ini meningkat 20,4 persen dibandingkan 2019.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">LMS membuka kemungkinan jenis serangan baru, misalnya ancaman Zoombombing. Apalagi jika sekolah terus melakukan pembelajaran jarak jauh.</p>', 'isua8w1nw3utwgsfynzk.jpg', '2021-02-13', 'published', 6, 1),
(19, 'Ruangguru Gelar Pelatihan dan Webinar Sambut Hari Guru Nasional', 'Ruangguru-Gelar-Pelatihan-dan-Webinar-Sambut-Hari-Guru-Nasional', '         <p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\"><span style=\"color: rgb(255, 51, 0); font-size: 14px;\">Liputan6.com, Jakarta -</span> <a href=\"https://www.liputan6.com/tekno/read/4407835/ruangguru-tunjuk-nicholas-saputra-jadi-duta-belajar\" title=\"Ruangguru \" style=\"color: rgb(255, 51, 0);\">Ruangguru </a>telah membuka akses pelatihan secara <em>online</em> untuk memperkaya keterampilan mengajar guru selama masa pandemi ini. Hingga sekarang, layanan pelatihan itu sudah diakses lebih dari 200 ribu guru di Indonesia.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Melalui layanan pelatihan ini, para guru mendapat berbagai materi pengayaan, seperti pembelajaran berbasis teknologi informasi, strategi pembelajaran, perencanaan kurikulum, wawasan pandidikan, hingga strategi menjadi guru yang memotivisasi dan komunikatif.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Sebagai upaya memperkuat pelatihan ini, Ruangguru juga menyelenggarakan rangkaian webinar yang bertepatan dengan dengan peringatan <a href=\"https://www.liputan6.com/citizen6/read/4417359/peringati-hari-guru-nasional-warganet-terima-kasih-banyak-guru\" title=\"Hari Guru Nasional\" style=\"color: rgb(255, 51, 0);\">Hari Guru Nasional</a>.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Webinar yang digelar mulai 18 hingga 24 November 2020 ini membahas beberapa topik, mulai dari strategi menghadapi keterbatasan selama pandemi hingga mengajar kreatif dengan metode pengajaran abad 21.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">\"Pada peringatan Hari Guru Nasional di tengah masa pandemi ini, kami memberikan pelatihan daring gratis dan rangkaian webinar dengan harapan agar para guru dapat terus semangat menjadi pengajar yang hebat demi masa depan anak bangsa,\" tutur Pendiri dan Direktur Utama Ruangguru, Belva Devara dalam keterangan resmi yang diterima, Rabu (25/11/2020).</p>', 'Kita-Tak-Menyadari-Bahwa-Ruang-Guru-Didirikan-untuk-Mengkritik-Pendidikan-di-Indonesia.jpg', '2021-02-13', 'published', 6, 1),
(20, 'Sri Mulyani Siapkan Anggaran Pendidikan Rp 550 Triliun dalam APBN 2021', 'Sri-Mulyani-Siapkan-Anggaran-Pendidikan-Rp-550-Triliun-dalam-APBN-2021', '       <p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\"><span style=\"color: rgb(255, 51, 0); font-size: 14px;\">Liputan6.com, Jakarta -</span> Menteri Keuangan (Menkeu) Sri Mulyani telah menyiapkan anggaran yang besar untuk sektor <a href=\"https://www.liputan6.com/on-off/read/4350277/26-siswa-dan-guru-dapat-dana-pendidikan-dari-produsen-alat-tulis\" title=\"pendidikan\" style=\"color: rgb(255, 51, 0);\">pendidikan</a> dalam APBN 2021. Nilai anggaran yang disiapkan mencapai Rp 550 triliun.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">“Untuk APBN tahun depan, kami tetap menyediakan anggaran yang luar biasa besar untuk bidang pendidikan, lebih dari Rp 550 triliun, di mana Rp 184,5 triliun itu adalah belanja yang dikelola oleh Kemendikbud maupun Kementerian Agama serta Kementerian lembaga lain,” kata Sri Mulyani dalam Pengumuman Seleksi Guru PPPK tahun 2021, Senin (23/11/2020).</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Selain itu, pemerintah juga masih ada dana cadangan di bendahara Umum Negara, dimana Kemendikbud memiliki anggaran lebih dari Rp 81,5 triliun dan kementerian agama Rp 55,9 triliun. Dana tersebut disiapkan untuk kegiatan Pendidikan.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Sementara Kementerian dan lembaga lain yang juga melakukan kegiatan <a href=\"https://www.liputan6.com/tag/dana-pendidikan\" style=\"color: rgb(255, 51, 0);\">pendidikan</a> mereka memiliki anggaran sekitar Rp 23,1 triliun yang dibagi kepada seluruh atau sebagian besar dari Kementerian dan Lembaga.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">“Transfer ke daerah sekali lagi juga merupakan anggaran yang terbesar untuk pendidikan. Saya mengikuti Menteri Dikbud untuk melakukan <em>redesigning</em> berbagai cara untuk mentransfer anggaran pendidikan ini sehingga benar-benar bisa di dedikasikan untuk sektor pendidikan,” ujarnya.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Dana tersebut baik untuk guru, peralatan sekolah, maupun untuk berbagai kegiatan belajar mengajar. Selain itu ada Rp 156,6 triliun anggaran yang merupakan transfer untuk gaji pendidik dan non gaji pendidik.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">Kementerian Keuangan juga melakukan transfer khusus sebesar Rp 135 triliun tahun depan untuk memberikan akses dan mutu layanan Pendidikan, juga melalui dana insentif daerah dalam rangka untuk mendukung program digitalisasi pendidikan yang dilakukan oleh Mendikbud.</p><p style=\"color: rgb(68, 68, 68); font-family: AcuminPro, arial, helvetica, sans-serif; font-size: 15px;\">“Kita juga masih punya dana Rp 6 triliun untuk otonomi khusus membantu sarana prasarana jadi anggaran <a href=\"https://www.liputan6.com/on-off/read/4350277/26-siswa-dan-guru-dapat-dana-pendidikan-dari-produsen-alat-tulis\" title=\"pendidikan\" style=\"color: rgb(255, 51, 0);\">pendidikan</a> begitu besar dan memang disalurkan melalui berbagai Channel dan program ini merupakan suatu tantangan,” jelasnya.</p>', 'sri.jpg', '2021-02-13', 'archived', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE `foto` (
  `foto_id` int(11) NOT NULL,
  `ket_foto` varchar(150) DEFAULT NULL,
  `nama_foto` varchar(150) DEFAULT NULL,
  `gallery_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto`
--

INSERT INTO `foto` (`foto_id`, `ket_foto`, `nama_foto`, `gallery_id`) VALUES
(27, 'Mikasa Ackerman', '24.jpeg', 44),
(28, 'Ereh', '23.jpg', 44),
(29, 'Satoru', 'Satoru.jpg', 45),
(30, 'Sukuna', 'EqCJ7sAUUAE_tkt.jpg', 45);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gallery_id` int(11) NOT NULL,
  `nama_gallery` varchar(150) DEFAULT NULL,
  `slug_gallery` varchar(150) DEFAULT NULL,
  `tgl_gallery` date DEFAULT NULL,
  `sampul` varchar(150) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gallery_id`, `nama_gallery`, `slug_gallery`, `tgl_gallery`, `sampul`, `user_id`) VALUES
(44, 'Shingeki no kyojin', 'Shingeki-no-kyojin', '2021-02-13', 'Shingeki-no-Kyojin-Foreshadowing-Header.jpg', 1),
(45, 'Jujutsu Kaisen', 'Jujutsu-Kaisen', '2021-02-13', 'maxresdefault.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `guru_id` int(11) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tmp_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `mapel_id` int(11) DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`guru_id`, `nip`, `nama`, `tmp_lahir`, `tgl_lahir`, `mapel_id`, `pendidikan`, `alamat`, `foto`) VALUES
(18, '11223344555', 'Mikasa Ackerman', 'Paradise', '2021-01-27', 9, 'S1', '6 Chome-10-1 Roppongi, Minato, Tokyo 106-0032', 'ec833d04025d2ca263df3b04bbc8723c.jpg'),
(19, '111223344566', 'Sasha Braus', 'Paradise', '2021-01-27', 9, 'S1', '6 Chome-10-1 Roppongi, Minato, Tokyo 106-0032', '608912d937f94921b280a6480b61140e.jpg'),
(20, '6666666666', 'Ereh', 'Paradise', '2021-01-27', 9, 'S1', '6 Chome-10-1 Roppongi, Minato, Tokyo 106-0032', 'UArRSlI.jpg'),
(21, '4141241515', 'Levi ackerman', 'Levi ackerman', '2021-02-12', 6, 'DIII', '6 Chome-10-1 Roppongi, Minato, Tokyo 106-0032', 'ev.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `slug_kategori` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama_kategori`, `slug_kategori`) VALUES
(1, 'Prestasi', 'Prestasi'),
(4, 'Pengumuman', 'Pengumuman'),
(5, 'Programming', 'Programming'),
(6, 'Pendidikan', 'Pendidikan');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas_id` int(11) NOT NULL,
  `nama_kelas` varchar(30) DEFAULT NULL,
  `guru_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas_id`, `nama_kelas`, `guru_id`) VALUES
(27, 'XII IPA 2', 18),
(28, 'XII IPS 3', 20),
(29, 'X IPA 2', 19);

-- --------------------------------------------------------

--
-- Table structure for table `kelulusan`
--

CREATE TABLE `kelulusan` (
  `kelulusan_id` int(11) NOT NULL,
  `siswa_id` int(11) DEFAULT NULL,
  `no_ujian` varchar(50) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `mapel` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelulusan`
--

INSERT INTO `kelulusan` (`kelulusan_id`, `siswa_id`, `no_ujian`, `jurusan`, `mapel`, `keterangan`) VALUES
(54, 49, '3-20-11-01-0080-0004-6', 'IPA', 'FISIKA', 'TUNDA'),
(55, 45, '3-20-11-01-0080-0001-9', 'IPS', 'EKONOMI', 'TIDAK LULUS'),
(56, 46, '3-20-11-01-0080-0001-8', 'IPS', 'SOSIOLOGI', 'LULUS');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `konfigurasi_id` int(11) NOT NULL,
  `nama_web` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `visi` text,
  `misi` text,
  `instagram` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`konfigurasi_id`, `nama_web`, `deskripsi`, `visi`, `misi`, `instagram`, `facebook`, `whatsapp`, `email`, `alamat`, `logo`, `icon`) VALUES
(1, 'SMA Jujutsu', 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', 'Lorem ipsum dolor sit amet consectetur adipiscing elit.', 'https://instagram.com', 'https://facebook.com', '082266666666', 'smajujutsu@gmail.com', '6 Chome-10-1 Roppongi, Minato, Tokyo 106- 0032', 'j.png', 'j.png');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `mapel_id` int(11) NOT NULL,
  `nama_mapel` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`mapel_id`, `nama_mapel`) VALUES
(1, 'Matematika'),
(4, 'Bahasa inggris'),
(5, 'IT Dev'),
(6, 'Akuntansi'),
(7, 'Security'),
(8, 'Agama'),
(9, 'Bahasa Jepang'),
(10, 'Bahasa German'),
(11, 'Fisika'),
(12, 'Biologi'),
(13, 'PKN');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `pengumuman_id` int(11) NOT NULL,
  `judul_pengumuman` varchar(255) DEFAULT NULL,
  `isi_pengumuman` text,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`pengumuman_id`, `judul_pengumuman`, `isi_pengumuman`, `tanggal`) VALUES
(6, 'Pengumuman Hasil SBMPTN 2020', '<p><span style=\"font-family: sans-serif; font-size: 14px;\">Cara Cek Pengumuman Hasil SBMPTN 2020 Untuk mengecek pengumuman hasil seleksi SBMPTN 2020, LTMPT sebagai lembaga penyelenggara seleksi masuk perguruan tinggi resmi di Indonesia telah menyediakan portal khusus yang bisa kamu akses nantinya. Portal tersebut dapat diakses melalui alamat https://pengumuman-sbmptn.ltmpt.ac.id.</span><br></p>', '2021-01-25');

-- --------------------------------------------------------

--
-- Table structure for table `ppdb`
--

CREATE TABLE `ppdb` (
  `ppdb_id` int(11) NOT NULL,
  `nisn` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `tmp_lahir` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `jenkel` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `asal_sekolah` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nama_ayah` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `nama_ibu` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `no_telp` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `jurusan` varchar(25) DEFAULT NULL,
  `foto_siswa` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `foto_ijazah` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `agama` varchar(25) DEFAULT NULL,
  `jenis_tinggal` varchar(25) DEFAULT NULL,
  `transportasi` varchar(10) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ppdb`
--

INSERT INTO `ppdb` (`ppdb_id`, `nisn`, `password`, `nama_lengkap`, `tgl_lahir`, `tmp_lahir`, `jenkel`, `asal_sekolah`, `nama_ayah`, `nama_ibu`, `alamat`, `no_telp`, `jurusan`, `foto_siswa`, `foto_ijazah`, `tgl_daftar`, `agama`, `jenis_tinggal`, `transportasi`, `status`) VALUES
(26, '150299', '$2y$10$VVQy3b5aiKy5MMki3BT/3O31ifK3.DwsdGL.xMMcZ5hZYskpm/Joq', 'Prayogi Muhammad', '1999-02-15', 'Palembang', 'Laki-Laki', 'Demo', 'Demo', 'Demo', 'Roppongi, Minato, Tokyo 106-0032', '082269696969', 'IPA', 'Prayogi Muhammad_150299.jpeg', 'Ijazah_150299.png', '2021-02-13', 'Islam', 'Bersama Orangtua', 'Motor', 'Lulus');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` int(11) NOT NULL,
  `nis` varchar(15) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `tmp_lahir` varchar(25) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jenkel` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`siswa_id`, `nis`, `nama`, `kelas_id`, `alamat`, `tmp_lahir`, `tgl_lahir`, `jenkel`) VALUES
(44, '10066', 'Gintoki', 27, 'Yorozuya', 'Yorozuya', '2021-01-27', 'Laki-Laki'),
(45, '10067', 'Zura', 28, 'Yorozuya', 'Yorozuya', '2021-01-27', 'Laki-Laki'),
(46, '10068', 'Takasugi', 28, 'Yorozuya', 'Yorozuya', '2021-01-27', 'Laki-Laki'),
(47, '10069', 'Shiroyasha', 28, 'Yorozuya', 'Yorozuya', '2021-01-27', 'Laki-Laki'),
(48, '10021', 'Kyuubei', 29, 'Yorozuya', 'Yorozuya', '2021-01-27', 'Perempuan'),
(49, '10070', 'Connie', 27, 'Paradise', 'Paradise', '2021-01-27', 'Laki-Laki');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `spp_id` int(11) NOT NULL,
  `januari` varchar(15) DEFAULT NULL,
  `februari` varchar(15) DEFAULT NULL,
  `maret` varchar(15) DEFAULT NULL,
  `april` varchar(15) DEFAULT NULL,
  `mei` varchar(15) DEFAULT NULL,
  `juni` varchar(15) DEFAULT NULL,
  `juli` varchar(15) DEFAULT NULL,
  `agustus` varchar(15) DEFAULT NULL,
  `september` varchar(15) DEFAULT NULL,
  `oktober` varchar(15) DEFAULT NULL,
  `november` varchar(15) DEFAULT NULL,
  `desember` varchar(15) DEFAULT NULL,
  `siswa_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`spp_id`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `siswa_id`) VALUES
(11, 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Belum Bayar', 13),
(12, 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 9),
(17, 'Lunas', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 15),
(19, 'Lunas', 'Lunas', 'Belum Bayar', 'Belum Bayar', 'Lunas', 'Belum Bayar', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 17),
(20, 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Belum Bayar', 'Lunas', 'Lunas', 'Lunas', 'Belum Bayar', 'Lunas', 'Lunas', 11),
(21, 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 44),
(22, 'Lunas', 'Lunas', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 45),
(23, 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 46),
(24, 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Lunas', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 'Belum Bayar', 47);

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `staf_id` int(11) NOT NULL,
  `nip` varchar(25) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tmp_lahir` varchar(50) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `pendidikan` varchar(15) DEFAULT NULL,
  `jabatan` varchar(35) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`staf_id`, `nip`, `nama`, `tmp_lahir`, `tgl_lahir`, `alamat`, `pendidikan`, `jabatan`, `foto`) VALUES
(26, '1122334455', 'Roronoa Zoro', 'Palembang', '2021-01-22', '6 Chome-10-1 Roppongi, Minato, Tokyo 106-0032', 'S2', 'Kepala Sekolah', '7c0f4c5a46e55ef4ac490d392d56d49f.jpg'),
(27, '1122334466', 'Vinsmoke Sanji', 'Palembang', '2021-01-24', '6 Chome-10-1 Roppongi, Minato, Tokyo 106-0032', 'S2', 'Wakil Kepala Sekolah', 'ab86b13309ad04f8b500b8f5f8330c06.jpg'),
(28, '1122334477', 'Usop', 'Palembang', '2021-01-24', '6 Chome-10-1 Roppongi, Minato, Tokyo 106-0032', 'S1', 'Sekretaris', '31cac8289922f3db2cece18fe6fbf1ff.jpg'),
(30, '1122334488', 'Franky', 'Palembang', '2021-02-13', '6 Chome-10-1 Roppongi, Minato, Tokyo 106-0032', 'S1', 'Tatausaha', '1360655_1396704698621_full.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `level` varchar(15) DEFAULT NULL,
  `active` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `nama`, `email`, `password`, `foto`, `level`, `active`) VALUES
(1, 'admin', 'Prayogi Muhammad', 'prayogimhd@gmail.com', '$2y$10$Vg5gXEchyLHVQ.QwVUC0guevOC9DRAzNyZak.TkIcaRrjjW/3ko16', 'ogik.jpeg', '2', 1),
(21, 'ereh', 'Ereh yegah', 'ereh@gmail.com', '$2y$10$gkeaheH1wKYzDxNDwpIobeiQVqvHUYRDnS07DHrhk3dE6/hukoCK.', 'UArRSlI.jpg', '1', 1),
(22, 'levi', 'Levi ackerman', 'levi@gmail.com', '$2y$10$EVjnD35x4nTSEfVU/7J0.uA0Sd9d6.RdwgTXSdxRT.LnYV6Py0WPe', 'default.png', '1', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`berita_id`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`foto_id`),
  ADD KEY `gallery_id` (`gallery_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`guru_id`),
  ADD KEY `mapel_id` (`mapel_id`),
  ADD KEY `mapel_id_2` (`mapel_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas_id`),
  ADD KEY `guru_id` (`guru_id`);

--
-- Indexes for table `kelulusan`
--
ALTER TABLE `kelulusan`
  ADD PRIMARY KEY (`kelulusan_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`konfigurasi_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`mapel_id`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`pengumuman_id`);

--
-- Indexes for table `ppdb`
--
ALTER TABLE `ppdb`
  ADD PRIMARY KEY (`ppdb_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`),
  ADD KEY `kelas_id` (`kelas_id`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`spp_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`staf_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `berita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
  MODIFY `foto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `guru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `kelas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `kelulusan`
--
ALTER TABLE `kelulusan`
  MODIFY `kelulusan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `konfigurasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `mapel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `pengumuman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ppdb`
--
ALTER TABLE `ppdb`
  MODIFY `ppdb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `spp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staf`
--
ALTER TABLE `staf`
  MODIFY `staf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
