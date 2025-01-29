-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jul 2019 pada 10.23
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigkdg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `tmptLhr` varchar(60) NOT NULL,
  `tglLhr` date NOT NULL,
  `alamat` varchar(10) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `log` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama`, `tmptLhr`, `tglLhr`, `alamat`, `telp`, `tanggal`, `username`, `password`, `status`, `log`) VALUES
(1, 'Muhammad Ali Syahbana', 'Kandangan', '2019-07-09', 'adadads', '087814145330', '2019-01-22', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'y'),
(2, 'adads', 'asdadasd', '2019-06-11', 'asdas', 'asadas', '2019-02-06', 'asdadasd', 'asdadad', 'Wisatawan Luar', ''),
(3, 'adasd', 'adasdads', '2019-07-09', 'asdada', 'asdada', '2019-02-05', 'asdadsad', 'asdadads', 'Wisatawan Lokal', ''),
(4, 'asdadadasd', 'adadadsad', '2019-01-15', 'asdadad', 'adadad', '2019-01-09', '', '', 'Wisatawan Lokal', ''),
(5, 'asdasdasd', 'asdasdasd', '2019-07-09', 'asdada', 'asdasdad', '2019-02-07', 'asdad', 'asdads', 'Wisatawan Luar ', ''),
(6, 'zdadasdad', 'asdasdads', '2019-05-08', 'asdadsads', 'asdasde', '2019-01-30', 'asdasd', 'asdasda', 'Wisatawan Luar', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ewisata`
--

CREATE TABLE `ewisata` (
  `idWt` int(15) NOT NULL,
  `jns` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `ket` varchar(400) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `lat` varchar(300) NOT NULL,
  `lng` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ewisata`
--

INSERT INTO `ewisata` (`idWt`, `jns`, `nama`, `alamat`, `ket`, `harga`, `foto`, `lat`, `lng`) VALUES
(1, 'Wisata', 'Haratai Loksado', 'Desa Haratai, Kecamatan Loksado, Kabupaten Hulu Sungai Selatan, Provinsi Kalimantan Selatan.', 'Air Terjun Haratai yang terletak di Desa Haratai memiliki ketinggian sekitar 20 meter dan mempunyai tiga tingkatan. Debit airnya cukup besar dan arus deras sehingga sulit sekali berenang di sekitar air terjun. Di bawah air terjunnya, terdapat telaga yang dapat digunakan untuk mandi atau sekadar berendam.', '300000', '1207201920542101072019202941tes.PNG.jpg', '-2.736171348019141', '115.56674198393159'),
(2, 'Wisata', 'Kolam Air Panas Tanuhi', 'Jl. Haur Banyu Rt01 Rw 05 Kecamatan Loksado Kabupaten Hulu Sungai Selatan', 'Merupakan Kolam Air Panas Alami Dari alam yang ada pada Kabupaten Hulu Sungai Selatan', '400000', '17072019104337wisata-pemandian-air-panas-tanuhi-loksado.png', '-2.829280076253525', '115.29447914306388'),
(3, 'Penginapan', 'Wisma Duta Amawang', 'Jl. Bukhari Rt 01 Rw 01 Tibung Raya Kecamatan Kandangan Kab Hulu SUngai Selatan', 'Merupakan Penginapan yang tersedia di daerah kandangan yang sering disewa oleh beberapa wisatawan ', '100000 - 250000', '1707201910470020160314_152755.png', '-2.7895025031162106', '115.22100807372351'),
(4, 'Rumah Makan', 'Warung Ketupat Kandangan ', 'Jl. Parincahan Muka Rt 01 Rw 01 Kec Kandangan Kab HSS', 'Merupakan Rumah makan masakan khas ketupat kandangan yang ramai dikunjungi pelanggan', '100000 - 250000', '1707201910571115298232523121508532717.png', '-2.7805866548937814', '115.31027198974232'),
(5, 'Wisata', 'Bukit Batu Baduduk', 'Desa Sungai Durian, Gumbil, kecamatan Telaga Langsat, Kabupaten Hulu Sungai Selatan (HSS)', 'Panorama Bukit yang merupakaan rangkaian dari pegunungan Meratus ini sudah tidak diragukan lagi. Segala sesuatu di sana masih sangat asri dan terjaga dengan baik. Dari kaki gunungnya saja, keindahan dan kesejukannya sudah mulai terasa.', '500000', '16072019114619Bukit Batu Baduduk.png', '-2.729788216757825', '115.35454066450524'),
(6, 'Wisata', 'Bukit Tatapan', 'Desa Halunuk Kec Lumpangi Kab Hulu Sungai Selatan', 'Gunung yang beraada dalam hutan yang dipenuhi perjalanan yang sangan menyenangkan dan dapat bertemu beberapa air terjun sebelum mencapai bukit', '400000', '16072019115342tatapan.png', '-2.8222493488421065', '115.40494319248899'),
(7, 'Wisata', 'Balanting Paring', 'Loksado Kec. Loksado Kab. Hulu Sungai Selatan', 'Di antara sekian banyak objek wisata yang ada di tanah Loksado, ada satu hal yang menjadi tujuan wisata utama para wisatawan. Yaitu menantang adrenalin, menyusuri sungai dengan menggunakan Bamboo Rafting. Masyarakat lokal menyebutnya sebagai Balanting Paring. Sungai Amandit memiliki aliran air yang lumayan deras dan batu-batuan yang menantang untuk Anda takhlukkan.', '600000', '16072019115708balanting-paring.png', '-2.7806654348167683', '115.5130742861258'),
(8, 'Wisata', 'Air Terjun Rampah Menjangan', 'Kampung Loa Panggang, desa Lok Lahung, Kecamatan Loksado, Kandangan, Kabupaten Hulu Sungai Selatan.', 'Air Terjun Rampah Menjangan merupakan air terjun yang sangat terkenal di kalangan traveler, air terjun ini pernah di siarkan dalam acara Televisi Swasta. Air Terjun Rampah Menjangan memiliki ketinggian sekitar 30 meter dan terletak di pedalaman hutan meratus', '700000', '16072019115937rampah menjangan.png', '-2.784379352554282', '115.55460847235742'),
(9, 'Wisata', 'Air Terjun Haratai 2', 'Desa Haratai, Kecamatan Loksado, Kabupaten Hulu Sungai Selatan', 'Air Terjun Haratai terletak di Desa Haratai, Kecamatan Loksado, Kabupaten Hulu Sungai Selatan, Provinsi Kalimantan Selatan, bertingkat tiga dengan ketinggian masing-masing kurang lebih 13 meter', '500000', '16072019120358552a0fae6ea8347d658b4567.png', '-2.7603998301280654', '115.54429746776617'),
(11, 'Wisata', 'Air Terjun Riam Hanai', 'Desa Loklahung, Kecamatan Loksado, Kandangan, Kabupaten Hulu Sungai Selatan', 'Air Terjun Riam Hanai merupakan air terjun yang masuk dalam kawasan Balai Adat Malaris. Air terjun ini tingginya mencapai 4 meter dan mempunyai palung yg dalam di bagian bawah. Air terjun ini bentuknya terlihat berkelok dari kejauhan dan letaknya agak sedikit terlindung dinding batu. Jalan untuk menuju air terjun ini relatif mudah karna dapat mennggunakan kendaraan roda dua dan dilanjutkan berjala', '700000', '16072019120744IMG-20141113-02201.png', '-2.7818642628581927', '115.55010048274164'),
(12, 'Wisata', 'Riam Barajang', 'desa Loklahung, Kecamatan Loksado, Kandangan, Kabupaten Hulu Sungai Selatan.', 'Air Terjun Riam Barajang merupakan air terjun yang masuk dalam kawasan Balai Adat Malaris. Air Terjun Riam Barajang merupakan sebuah air yg mengalir di bebatuan seperti bekas bendungan dan bagian bawahnya tidak terlalu dalam. Air terjun ini tingginya memang tak seberapa, namun debit airnya lumayan deras seperti sebuah seluncuran.', '400000', '16072019121345barajang.png', '-2.7765257889008126', '115.54810339331198'),
(13, 'Wisata', 'Kalang Hadangan', 'Desa Pandak Daun, Kecamatan Daha Utara, Kabupaten Hulu sungai Selatan.', 'Kalang Hadangan berasal dari bahasa Banjar, Kalang berarti Kandang sedangkan Hadangan adalah Kerbau. Kandang Kerbau ini lebih familiar dengan sebutan Kalang Hadangan, Unik nya Kalang Hadangan yang ada di Nagara ini terletak di tengah-tengah perairan bukan di daratan yang kering. Kerbau yang di ternakkan disini pun tidak sembarang Kerbau', '200000', '16072019121807kalang hadangan.png', '-2.5421404424263443', '115.05861430268942'),
(14, 'Penginapan', 'Wisma Duta Kandangan', 'Jalan Pemuda No.9, Kandangan, Kandangan Kota, Kandangan, Kandangan Kota, Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71217, Indonesia', 'Penginapan yang berada di pusat kota kandangan', '150000 - 350000', '17072019105751wisma duta 3.png', '-2.7849525309073186', '115.2653897976345'),
(15, 'Penginapan', 'Penginapan Famili Wisma', 'Tanuhi Hulu Banyu RT.02/01 Kec. Loksado â€“ Telp. +62-82155399468', 'Penginapan yang terletak pada wisata pemandian air panas tanuhi', '250.000 â€“ 275.000', '16072019122637Penginapan di Tanuhi.png', '-2.791300163243392', '115.45132688504702'),
(16, 'Penginapan', 'Wisma Loksado', 'Jl. Desa Loksado RT.02 Kec. Loksado â€“ Telp. +62-8125118233', 'Wisma Yang terletak pada desa loksado agar wisatawan dapat lebih detak menuju tempat wisata yang di ingin kan', '220.000 â€“ 250.000', '16072019122918wisma loksado.png', '-2.7944475299540272', '115.49797928715304'),
(17, 'Penginapan', 'Mahligai Antaludin', 'Jl. Jend Sudirman No. 99 Kandangan â€“ Telp. +62-517-5547340', 'Penginapan yang terletak di dekat terminal kota kandangan', '200000 - 300000', '16072019123421mahligai antaludin.png', '-2.7937666362517604', '115.26282015160365'),
(18, 'Rumah Makan', 'Warung Ketupat Kandangan Kaganangan', 'Kandangan Barat, Kandangan, Kabupaten Hulu Sungai Selatan, Kalimantan Selatan 71217', 'Salah satu Warung ketupat kandangan yang paling laris di kota kandangan dan yang paling di minati oleh masyarakat sekitar', '10000 - 30000', '16072019195341ketupat kaganangan.png', '-2.778977106947039', '115.25494110817846'),
(19, 'Rumah Makan', 'Warung Katupat Mayang Marias', 'Kandangan Barat, Kandangan, Kabupaten Hulu Sungai Selatan Kalimantan Selatan', 'Warung Ketupat Kandangan yang dekat jalan tol kandangan dan banyak di singgahi penumpang taksi atau orang mudik', '15000 - 25000', '16072019195945Mayang marias.png', '-2.7865820545937794', '115.26041617839564'),
(20, 'Rumah Makan', 'R Coffee Kandangan', 'Tibung Raya, Kandangan, Hulu Sungai Selatan, Kalimantan Selatan', 'Salah satu cafe yang sering di kunjuni oleh pemuda daerah untuk ngumpul santai atau melakukan berbagai kegiatan semacamnya', '15000 - 30000', '16072019200240r coffee.png', '-2.7927214787591765', '115.2632189559261'),
(21, 'Rumah Makan', 'Rumah Makan Sate Abadi', 'Gambah Dalam, Kandangan, Hulu Sungai Selatan, Kalimantan Selatan', 'Rumah makan sate bakar di kandangan kabupaten Hulu Sungai Selatan', '12000 - 20000', '16072019200449rm sate abadi.png', '-2.7541560134440743', '115.26117265590068'),
(22, 'Rumah Makan', 'Warung Katupat Haji Irus', 'Hamalau, Sungai Raya, Hulu Sungai Selatan, Kalimantan Selatan', 'Warung ketupat dekat dengan bundaran pertama dari banjarmasin menuju kota kandangan. dekat dengan bundaran tugu ketupat kandangan', '15000 - 30000', '16072019200722haji irus.png', '-2.806325861057786', '115.25928254096982');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `idKat` char(20) NOT NULL,
  `kategori` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `noId` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `isMainMenu` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`noId`, `menu`, `link`, `icon`, `isMainMenu`, `role`) VALUES
(1, 'Dashboard', 'admin', 'icon-air-play', '0', ''),
(5, 'Tempat Wisata', 'admin/wisata', 'icon-map', '0', ''),
(6, 'Penginapan', 'admin/penginapan', 'icon-shop2', '0', ''),
(7, 'Rumah Makan', 'admin/rmakan', 'icon-coffee', '0', ''),
(8, 'Data Pengunjung', 'admin/pengunjung', 'icon-eye3', '0', ''),
(9, 'Kontak Penting', 'admin/kontak', 'icon-mobile', '0', ''),
(10, 'Maps', 'admin/maps', 'icon-map-pin', '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penginapan`
--

CREATE TABLE `penginapan` (
  `idWt` int(15) NOT NULL,
  `jns` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `lng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penginapan`
--

INSERT INTO `penginapan` (`idWt`, `jns`, `nama`, `alamat`, `ket`, `harga`, `foto`, `lat`, `lng`) VALUES
(1, 'Penginapan', 'asdads', 'asdads', 'asdads', '10000', '25062019012212logobaru.jpg', '-2.7853875046395444', '115.2697599047836');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rmakan`
--

CREATE TABLE `rmakan` (
  `idWt` int(15) NOT NULL,
  `jns` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `lat` varchar(30) NOT NULL,
  `lng` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rmakan`
--

INSERT INTO `rmakan` (`idWt`, `jns`, `nama`, `alamat`, `ket`, `foto`, `lat`, `lng`) VALUES
(1, 'Penginapan', 'rizal', 'asdadadadadads', 'asdadadasd', '25062019012809p.jpg', '-2.774414105105606', '115.31233192626769');

-- --------------------------------------------------------

--
-- Struktur dari tabel `telpon`
--

CREATE TABLE `telpon` (
  `idTelp` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `telp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `telpon`
--

INSERT INTO `telpon` (`idTelp`, `nama`, `telp`) VALUES
(1, 'BPK Al Zam- zami', '085213410911');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `idWt` int(15) NOT NULL,
  `jns` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `ket` varchar(300) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `gbr` varchar(200) NOT NULL,
  `lat` varchar(300) NOT NULL,
  `lng` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`idWt`, `jns`, `nama`, `alamat`, `ket`, `harga`, `gbr`, `lat`, `lng`) VALUES
(1, '', 'Rumah Ali', 'Jl. Haur Banyu Rt01 Rw 01 Kecamatan Loksado Kabupaten Hulu Sungai Selatan', 'Tempat Wisata Yang Merupakan Air terjun ', '0', '', '-2.7853875046395444', '115.26701332274581'),
(2, '', 'asdasd', 'asdasdsd', 'adas', '', '01072019202505TEXTUNISKA.PNG', '-2.8059623528529585', '115.30271888915115');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ewisata`
--
ALTER TABLE `ewisata`
  ADD PRIMARY KEY (`idWt`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idKat`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`noId`);

--
-- Indeks untuk tabel `penginapan`
--
ALTER TABLE `penginapan`
  ADD PRIMARY KEY (`idWt`);

--
-- Indeks untuk tabel `rmakan`
--
ALTER TABLE `rmakan`
  ADD PRIMARY KEY (`idWt`);

--
-- Indeks untuk tabel `telpon`
--
ALTER TABLE `telpon`
  ADD PRIMARY KEY (`idTelp`);

--
-- Indeks untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`idWt`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `telpon`
--
ALTER TABLE `telpon`
  MODIFY `idTelp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
