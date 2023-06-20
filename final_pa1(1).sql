-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 19 Jun 2023 pada 15.13
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_pa1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id`, `judul`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Panda handstand? Di Siantar Zoo', '1686928147.crdownload', '<p>Saksikan antaraksi dari panda yang imut ini, bisa handstan lo. Silahkan berkunjung ke sianatar Zoo, ada paket special orang siantar loh setiap harinya.</p>', '2023-06-16 08:09:07', '2023-06-17 06:44:58'),
(2, 'Pernikahan di Siantar Zoo', '1686928383.jpeg', 'Pernihakan di Sz ini sangat romantis dan sungguh ta joi meje ej ijkwmw k w jowwj n wjor wjw  jeqoqe jef e jo jdebn. rwfntwht nthgmgm tntwgn wb fbbfbnthtt', '2023-06-16 08:13:03', '2023-06-16 08:13:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mamalia', '2023-06-16 07:54:34', '2023-06-16 07:54:34'),
(2, 'Melata', '2023-06-16 07:54:41', '2023-06-16 07:54:41'),
(5, 'Amfibi', '2023-06-16 07:55:33', '2023-06-16 07:55:33'),
(8, 'Unggas', '2023-06-19 02:46:57', '2023-06-19 02:46:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id`, `name`, `kategori_id`, `gambar`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Ular', 2, '1686927525.jpg', '<p>\"Ular\" adalah sejenis reptil bersisik yang termasuk dalam ordo Squamata. Mereka memiliki tubuh yang panjang dan licin, dengan tidak adanya kaki atau kaki belakang yang sangat pendek pada beberapa spesies. Ular dikenal karena kemampuan mereka dalam merayap dan melingkarkan tubuh mereka saat bergerak. Mereka adalah hewan karnivora dan sebagian besar ular memangsa hewan lain, seperti mamalia kecil, burung, dan reptil lainnya. Beberapa spesies ular juga dapat mematuk dan mematikan mangsa mereka dengan menggunakan bisa yang dihasilkan oleh kelenjar bisa di giginya.</p><p>Ular memiliki peran yang penting dalam ekosistem karena mereka membantu mengendalikan populasi hewan pengerat dan serangga. Meskipun ada beberapa spesies ular yang berbisa dan berpotensi berbahaya bagi manusia, sebagian besar ular tidak berbahaya jika tidak terganggu. Banyak jenis ular yang memiliki peranan dalam budaya dan mitologi di berbagai masyarakat di seluruh dunia, kadang-kadang dianggap sebagai simbol kebijaksanaan atau kekuatan.</p><p>Harap diingat bahwa ular adalah hewan yang kompleks dan bervariasi, ada ribuan spesies ular yang berbeda dengan berbagai perilaku dan sifat yang berbeda pula.</p>', '2023-06-16 07:58:45', '2023-06-19 02:45:59'),
(2, 'Cendrawasih', 8, '1686927630.jpg', '<p>\"Cendrawasih\" adalah sejenis burung yang terkenal karena keindahan bulu-bulunya yang cerah dan unik. Mereka termasuk dalam famili Paradisaeidae, yang terdiri dari sekitar 40 spesies yang ditemukan di wilayah Papua, Indonesia, dan beberapa pulau terdekat di Pasifik.</p><p>Burung cendrawasih memiliki berbagai bentuk, ukuran, dan warna bulu yang menakjubkan. Bulu-bulu jantan cendrawasih sering kali sangat mencolok dengan warna-warna yang cerah, berpola rumit, dan seringkali memiliki hiasan seperti ekor yang panjang atau rumbai. Bulu-bulu ini digunakan oleh jantan dalam upaya atraksi kawin untuk memikat betina. Betina cendrawasih biasanya memiliki penampilan yang lebih sederhana dan cenderung kurang mencolok.</p><p>Cendrawasih hidup di berbagai habitat, termasuk hutan-hutan basah tropis, pegunungan, dan daerah terbuka. Mereka adalah burung pemakan buah, serangga, dan nektar bunga.</p>', '2023-06-16 08:00:30', '2023-06-19 02:47:20'),
(3, 'Kangguru', 1, '1686927712.jpg', '<p>\"Kanguru\" adalah sejenis mamalia marsupial yang berasal dari Australia. Mereka dikenal karena memiliki tubuh yang kuat, ekor panjang, dan kaki belakang yang besar. Kanguru juga memiliki kantung di perut betina tempat mereka menyimpan dan merawat anak-anaknya setelah dilahirkan.</p><p>Kanguru memiliki adaptasi khusus yang memungkinkan mereka untuk melompat dengan cepat dan jauh. Kaki belakang yang kuat dan panjang serta kaki depan yang pendek memungkinkan mereka untuk melompat dengan kecepatan hingga 55 km/jam dan melompat sejauh 9 meter dalam satu lompatan. Mereka menggunakan ekor mereka sebagai keseimbangan saat melompat.</p><p>Ada beberapa spesies kanguru, termasuk kanguru merah (red kangaroo), kanguru abu-abu timur (eastern grey kangaroo), dan kanguru betina (wallaby). Kanguru merah adalah spesies kanguru terbesar dan dapat tumbuh hingga mencapai tinggi sekitar 1,5 meter dan berat hingga 90 kilogram. Kanguru lainnya memiliki ukuran yang lebih kecil, tergantung pada spesiesnya.</p><p>Kanguru adalah hewan herbivora dan makanan utama mereka adalah rumput dan tanaman rendah lainnya. Mereka memiliki sistem pencernaan khusus yang memungkinkan mereka mencerna serat kasar dengan efisien.</p><p>Kanguru memiliki peran penting dalam ekosistem Australia sebagai herbivora pemakan rumput yang membantu mengontrol pertumbuhan vegetasi. Mereka juga merupakan simbol kebanggaan nasional Australia dan menjadi objek wisata yang populer.</p><p>Penting untuk diingat bahwa kanguru adalah hewan liar dan sebaiknya dihormati dari jarak yang aman. Jika berinteraksi dengan kanguru, penting untuk mengikuti panduan dan aturan setempat untuk memastikan keselamatan Anda dan kesejahteraan hewan tersebut.</p>', '2023-06-16 08:01:52', '2023-06-19 02:52:15'),
(4, 'Salamander', 5, '1686927816.crdownload', '<p>\"Salamander\" adalah sejenis amfibi bersirip ekor yang termasuk dalam ordo Caudata. Mereka ditemukan di berbagai wilayah di seluruh dunia, kecuali di Australia dan Antarktika. Salamander memiliki tubuh yang panjang, berbentuk seperti cacing, dengan empat kaki dan ekor yang terlihat mirip dengan kadal.</p><p>Salamander hidup di berbagai habitat, termasuk hutan hujan, hutan berdaun lebar, dan daerah pegunungan. Beberapa spesies salamander hidup di air tawar, seperti danau, sungai, atau kolam, sementara yang lain hidup di darat, di bawah batu-batu, dalam dedaunan busuk, atau di bawah kayu yang membusuk. Beberapa salamander bahkan memiliki kemampuan untuk hidup di lingkungan yang cukup kering.</p><p>Salamander umumnya memiliki kulit yang lembab dan tidak bersisik. Beberapa spesies salamander memiliki kemampuan untuk mengalami metamorfosis, dimana mereka mengalami perubahan dari tahap larva (biasanya dengan bentuk katak) menjadi dewasa. Namun, tidak semua salamander mengalami metamorfosis, beberapa spesies tetap mempertahankan bentuk larva mereka sepanjang hidupnya.</p><p>Salamander adalah hewan karnivora, dan sebagian besar memakan serangga, cacing, laba-laba, dan invertebrata kecil lainnya. Beberapa spesies salamander memiliki kemampuan untuk melepaskan racun atau zat berbau tidak sedap untuk melindungi diri dari predator.</p><p>Salamander memiliki peran penting dalam ekosistem sebagai pemangsa dan juga sebagai makanan bagi hewan lain. Beberapa spesies salamander juga digunakan dalam penelitian ilmiah karena kemampuan mereka untuk meregenerasi anggota tubuh yang hilang, seperti ekor atau anggota tubuh lainnya.</p><p>Perlu dicatat bahwa salamander adalah hewan yang rentan terhadap perubahan lingkungan dan perusakan habitat. Beberapa spesies salamander terancam kepunahan akibat hilangnya habitat, polusi, dan perubahan iklim. Upaya konservasi dan perlindungan habitat penting untuk melindungi salamander dan keanekaragaman hayati lainnya.</p>', '2023-06-16 08:03:36', '2023-06-19 02:53:19'),
(10, 'Panda', 1, '1687169013.jpg', '<p>\"Panda\" merujuk pada dua spesies beruang yang terkenal, yaitu panda raksasa (Ailuropoda melanoleuca) dan panda kecil (Ailurus fulgens).</p><p>1. Panda Raksasa: Panda raksasa adalah spesies beruang yang ditemukan di pegunungan China tengah. Mereka memiliki bulu berwarna hitam dan putih yang khas, dengan pola yang mirip seperti \"topeng\". Panda raksasa merupakan hewan herbivora yang makanannya utamanya terdiri dari bambu. Mereka memiliki peran penting dalam mempertahankan ekosistem hutan bambu. Panda raksasa terancam punah dan merupakan salah satu hewan yang dilindungi.</p><p>2. Panda Kecil (Red Panda): Panda kecil, juga dikenal sebagai panda merah, adalah spesies mamalia yang lebih kecil dan berkerabat dengan rakun daripada beruang. Mereka memiliki bulu merah coklat dengan ekor tebal yang panjang. Panda kecil hidup di daerah Himalaya dan beberapa bagian Asia tenggara. Mereka juga herbivora dan makanannya terdiri dari bambu, buah, serangga, dan tunas pohon. Panda kecil juga dianggap sebagai spesies yang rentan terancam karena hilangnya habitat dan perburuan ilegal.</p><p>Keduanya, panda raksasa dan panda kecil, memiliki daya tarik yang besar dan menjadi simbol kekhasan dan konservasi satwa liar. Mereka populer di seluruh dunia dan sering kali menjadi daya tarik utama dalam upaya konservasi dan pelestarian alam.</p>', '2023-06-19 03:03:33', '2023-06-19 03:03:33'),
(12, 'horas', 1, '1687180034.jpg', '<p>usah gilak kayaknya</p>', '2023-06-19 06:07:14', '2023-06-19 06:07:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_13_030224_create_kategori_table', 1),
(6, '2023_06_13_085729_create_konten_table', 1),
(7, '2023_06_14_013225_create_tickets_table', 1),
(8, '2023_06_14_034237_create_orders_table', 1),
(9, '2023_06_14_091034_add_user_id_to_orders_table', 1),
(10, '2023_06_15_072036_create_berita_table', 1),
(11, '2023_06_16_021149_create_saran_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` bigint(10) NOT NULL,
  `waktu_berkunjung` date NOT NULL,
  `gambar_bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `ticket_id`, `nama`, `jumlah`, `harga`, `waktu_berkunjung`, `gambar_bukti_pembayaran`, `nomor_telepon`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(6, 1, 'Jiso', 1, 30000, '2023-06-29', 'bukti_pembayaran/qFHRe5mMUTAbnU2gKUW5RbMIEjvGqG19YhIyuHqd.jpg', '123456789123', 'approved', '2023-06-17 22:05:36', '2023-06-17 22:06:48', 2),
(7, 1, 'Citra', 3, 90000, '2023-06-19', 'bukti_pembayaran/lwtN9pCOgRAAgughNIOoZPtEpmvN2dSJJGIaRImR.jpg', '124', 'rejected', '2023-06-18 09:38:18', '2023-06-19 01:14:27', 5),
(8, 1, 'jimin', 2, 60000, '2023-06-22', 'bukti_pembayaran/ahk4Jr8PHtVXQXaAdy6owFs92U2jvVTNY1gxXbVb.jpg', '098765', 'rejected', '2023-06-18 18:32:56', '2023-06-18 18:42:43', 2),
(9, 2, 'atha', 2, 40000, '2023-07-07', 'bukti_pembayaran/ciIRU6uOrwWYB81slaRtmmdLd9f4Nmj6LkotAK2F.jpg', '123456', 'pending', '2023-06-19 01:15:19', '2023-06-19 01:15:19', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `isi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`id`, `user_id`, `isi`, `image`, `created_at`, `updated_at`) VALUES
(2, 2, 'Banyak jalan berlubang.', 'saran/H3NqjbfNgLfj5Nc9Adycvd1V8qr8VI6Xn8raBGIZ.jpg', '2023-06-16 08:17:28', '2023-06-16 08:17:28'),
(5, 7, '<p>semoga semakin bersih</p>', 'saran/J3At7bEFWTaAk4vF1jZtgPm72L8x8FUrQqjTJQMQ.jpg', '2023-06-17 06:30:12', '2023-06-17 06:30:12'),
(7, 7, '<p>hai</p><p>hai</p>', 'saran/jOeXSxurOtO7OxxP2t39SfLbP3dbyi0cqABZkROl.jpg', '2023-06-17 06:33:18', '2023-06-17 06:33:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(8,2) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `nama`, `harga`, `jumlah_stok`, `created_at`, `updated_at`) VALUES
(1, 'Umum', '30000.00', 74, '2023-06-16 08:04:07', '2023-06-18 18:42:35'),
(2, 'Pelajar', '20000.00', 34, '2023-06-16 08:04:28', '2023-06-17 08:28:49'),
(3, 'Special', '100000.00', 20, '2023-06-16 08:04:57', '2023-06-16 08:04:57'),
(4, 'Orang Siantar', '15000.00', 15, '2023-06-16 08:05:15', '2023-06-16 08:05:15'),
(5, 'HUT SZ ke 13', '10000.00', 13, '2023-06-16 08:19:42', '2023-06-16 08:19:42'),
(6, 'Natal Era + Topi Natal', '35000.00', 150, '2023-06-16 08:20:24', '2023-06-16 08:26:25'),
(7, 'VIP', '500000.00', 30, '2023-06-16 18:50:04', '2023-06-16 18:50:21'),
(8, 'Bussiness', '350000.00', 30, '2023-06-16 18:51:05', '2023-06-16 18:51:05'),
(9, 'Wisatawan Tetap', '10000.00', 50, '2023-06-16 18:52:03', '2023-06-16 18:52:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','wisatawan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wisatawan',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Siantar Zoo', 'admin', 'adminsz@gmail.com', NULL, '$2y$10$USX4JhLKtNqW2.P7C8QE7OmKn0wfoi66f3DpaPY5Fq.SShMtbaYle', NULL, '2023-06-16 07:52:26', '2023-06-16 07:52:26'),
(2, 'Mananda Tambun', 'wisatawan', 'manandatambun@gmail.com', NULL, '$2y$10$cxG8yTYpv2uEXs/JQlBlW.kj3H1Nxp27m/EiVWbvMygsB0LCl6YMe', NULL, '2023-06-16 07:52:44', '2023-06-16 07:52:44'),
(3, 'Sabar Martua Tamba', 'wisatawan', 'sabarmartuatamba@gmail.com', NULL, '$2y$10$PO7hyxbWkC.4brVasbgfJeRSrhRIuYBhvBvpXaGhEYLvCGh7BQFMu', NULL, '2023-06-16 21:42:24', '2023-06-16 21:42:24'),
(4, 'Aqustin Angel Tambunan', 'wisatawan', 'Aqustinangel@gmail.com', NULL, '$2y$10$NlNsGcs8r12Yv4yszA1XeO3kX9lxI4lsckGeEqHgZf.n8h9orxjTe', NULL, '2023-06-16 23:40:31', '2023-06-16 23:40:31'),
(5, 'Citra Nainggolan', 'wisatawan', 'citranainggolanjr@gmail.com', NULL, '$2y$10$aBj8da5YrjVFMJKINz842eMVjp8Lu7PTsu9lU8SEtDEK284Yg.9E6', NULL, '2023-06-16 23:41:28', '2023-06-16 23:41:28'),
(6, 'Maranatha Siahaan', 'wisatawan', 'athasiahaan@gmail.com', NULL, '$2y$10$/MLU0A2PWlr6x/OvQyjevuFFiek7LprQfIfKrCVJz3VkVhJwgGuNi', NULL, '2023-06-16 23:42:03', '2023-06-16 23:42:03'),
(7, 'maranatha', 'wisatawan', 'maranatha@gmail.com', NULL, '$2y$10$zNifykjnQ2Bl.7acWoxzbeczEptr4waBbosLjg0rHCXYKhJONsTse', NULL, '2023-06-17 06:20:46', '2023-06-17 06:20:46'),
(8, 'Dian Stg', 'wisatawan', 'dianstg@gmail.com', NULL, '$2y$10$2OMbRNwvYjPwO6mH/7zkv.74kO2PYg.o3IP9bi3MosPXPO7GjI2Pe', NULL, '2023-06-18 01:22:10', '2023-06-18 01:22:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konten_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ticket_id_foreign` (`ticket_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `saran_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `konten`
--
ALTER TABLE `konten`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD CONSTRAINT `konten_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD CONSTRAINT `saran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
