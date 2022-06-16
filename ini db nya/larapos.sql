-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2022 pada 12.18
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `larapos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Shoes', '2022-02-10 19:26:38', '2022-02-10 19:27:17'),
(2, 'Watch', '2022-02-10 19:26:45', '2022-02-10 19:27:46'),
(3, 'Shirt', '2022-02-10 19:28:27', '2022-02-10 19:28:27'),
(4, 'Pants', '2022-02-10 19:29:12', '2022-02-10 19:29:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Agi', '087829604960', '24470 Orion IslandsWaylonton, NM 36042', '2022-02-10 18:45:13', '2022-02-10 21:35:16'),
(2, 'Anang', '087859005136', '822 Mark Trafficway Suite 985West Sabrinamouth, OK 59278', '2022-02-10 18:45:13', '2022-02-10 21:35:27'),
(3, 'Rudi', '087838724468', '7823 Abigayle Skyway Suite 790South Hillard, TX 67224-0053', '2022-02-10 18:45:13', '2022-02-10 21:35:37'),
(4, 'Ridho', '087818892323', '31286 Ashly Canyon Apt. 776Caryhaven, KS 12838', '2022-02-10 18:45:13', '2022-02-10 21:35:45'),
(5, 'Maxime Block', '08787465566', '3116 Estefania Parks Suite 634\nLake Gregory, NE 55515', '2022-02-10 18:45:13', '2022-02-10 18:45:13'),
(6, 'Dr. Marlene Kerluke', '087888289814', '47346 Kenyatta Park\nBergstrommouth, IN 34364-7575', '2022-02-10 18:45:13', '2022-02-10 18:45:13'),
(7, 'Tracey Pfannerstill', '087822339646', '803 Trevor Knolls\nVerlaville, OH 97896', '2022-02-10 18:45:13', '2022-02-10 18:45:13'),
(8, 'Otho Torp', '087853384189', '9437 Funk Rapids Suite 058\nLake Immanuel, WA 41150-3366', '2022-02-10 18:45:13', '2022-02-10 18:45:13'),
(9, 'Miss Vida Renner', '087891948762', '7465 Nelson Turnpike Suite 755\nWest Elaina, NJ 38185-3538', '2022-02-10 18:45:14', '2022-02-10 18:45:14'),
(10, 'Werner Fahey', '087894387991', '91421 Wunsch Springs\nSouth Adrain, NY 60461', '2022-02-10 18:45:14', '2022-02-10 18:45:14'),
(11, 'Alexandro Kessler', '087884531924', '2633 Rosa Mountain\nMonahanhaven, ME 56819-5108', '2022-02-10 18:45:14', '2022-02-10 18:45:14'),
(12, 'Morris Spinka IV', '087867179280', '322 Parker Island\nLake Cathryn, WA 12763', '2022-02-10 18:45:14', '2022-02-10 18:45:14'),
(13, 'Gerard Fahey', '087897104724', '1533 Glover Islands Suite 892\nMonahanchester, NV 03464', '2022-02-10 18:45:14', '2022-02-10 18:45:14'),
(14, 'Silas Mayer', '087885659599', '36719 Skye Motorway Suite 202\nWest Evert, VA 70865-5893', '2022-02-10 18:45:14', '2022-02-10 18:45:14'),
(15, 'Ms. Madonna Friesen Jr.', '087881008963', '873 Haley Tunnel\nEast Angela, CT 60528', '2022-02-10 18:45:14', '2022-02-10 18:45:14');

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
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `unit_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'PI202221001', 'Vans Slip On', 1, 1, 130000, 33, '2022-02-10 19:31:28', '2022-02-16 03:21:34'),
(2, 'PI202221002', 'MANGO Logo', 3, 1, 45999, 21, '2022-02-10 19:58:52', '2022-02-16 02:12:31'),
(3, 'PI202221003', 'Casio G-Shock', 2, 1, 149999, 23, '2022-02-10 21:28:42', '2022-02-16 03:31:08'),
(4, 'PI202221004', 'Chinos', 4, 1, 99999, 9, '2022-02-11 19:48:30', '2022-02-11 19:55:36'),
(8, 'PI202221005', 'Diadora Sneakers', 1, 1, 139999, 1, '2022-02-11 20:22:33', '2022-02-16 04:11:31');

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
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_08_19_000000_create_failed_jobs_table', 1),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(17, '2021_01_11_062305_create_categories_table', 1),
(18, '2022_01_06_061410_create_suppliers_table', 1),
(19, '2022_01_06_061603_create_customers_table', 1),
(20, '2022_01_06_062304_create_units_table', 1),
(21, '2022_01_06_062319_create_items_table', 1),
(22, '2022_01_06_062452_create_stocks_table', 1),
(23, '2022_01_06_063508_create_transactions_table', 1),
(24, '2022_01_06_063559_create_transaction_details_table', 1),
(25, '2022_02_16_094635_add_sales_order', 2),
(26, '2022_02_16_100759_add_purchase_order', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purchase_order` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `stocks`
--

INSERT INTO `stocks` (`id`, `item_id`, `type`, `description`, `supplier_id`, `qty`, `created_at`, `updated_at`, `purchase_order`) VALUES
(1, 1, 'in', 'pkwkkw', 1, 12, '2022-02-16 03:12:53', '2022-02-16 03:12:53', 'PO202221001'),
(2, 1, 'in', 'a;knad', 1, 12, '2022-02-16 03:21:34', '2022-02-16 03:21:34', 'PO202221');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'PT Cahaya Bintang', 'odie46@yahoo.com', '087814219984', '12767 Kraig Hollow Apt. 368Schillermouth, TN 59088', '2022-02-10 18:45:08', '2022-02-10 21:34:27'),
(2, 'PT Rembulan Terang', 'furman95@cronin.org', '087821502344', '178 Mohamed AvenueEast Jaquelinfurt, IA 13817', '2022-02-10 18:45:08', '2022-02-10 21:34:45'),
(3, 'Emelie Bartoletti', 'toby26@schmeler.info', '087884963381', '6041 Hand Street Suite 919\nWest Hayley, OR 54244', '2022-02-10 18:45:08', '2022-02-10 18:45:08'),
(4, 'Nona Armstrong', 'pbradtke@yahoo.com', '087810512641', '5249 Leffler Union Suite 852\nMurrayfurt, ME 60796-1605', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(5, 'Merle Yundt I', 'monica.mcclure@hotmail.com', '087830298796', '8835 Adrien View\nIsraelport, TN 63881-4381', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(6, 'Brisa Pollich', 'norbert73@torphy.com', '087846888184', '104 Ryan Parkways Suite 681\nHicklemouth, KS 88434', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(7, 'Victoria Lemke II', 'marty41@jacobson.com', '087866720521', '1502 Volkman Points Suite 773\nFilomenaside, PA 81096-6285', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(8, 'Chad Beahan', 'dangelo.kulas@yahoo.com', '087825073442', '14290 Clay Stream Apt. 046\nNorth Beaulah, HI 69740', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(9, 'Prof. Deon Botsford', 'elvera.bergnaum@yahoo.com', '087832383928', '9364 Harvey Orchard\nWest Madalinetown, RI 84358-3505', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(10, 'Lance Hettinger', 'sammy35@abshire.net', '087831279914', '868 Theron Burgs Suite 914\nSouth Carter, AK 69466', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(11, 'Arlie Collins', 'qgislason@yahoo.com', '087876773627', '223 Haag Locks Suite 924\nOlsonfurt, HI 70516-7162', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(12, 'Noe Daniel', 'lillian21@blanda.com', '08781898217', '83309 Gerlach Island\nGarnetfort, MS 66205', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(13, 'Milo Collier', 'beryl.pagac@sporer.com', '087896049719', '269 Jalon Parks\nJoanyberg, NC 09632-7512', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(14, 'Adele King', 'dena39@gmail.com', '087844939732', '406 Raynor Hollow Suite 543\nShayneview, KS 87106-7409', '2022-02-10 18:45:09', '2022-02-10 18:45:09'),
(15, 'PT Bahagia Selalu', 'ygislason@yahoo.com', '087848998938', '44108 Klein MountainsEllsworthchester, OR 08033', '2022-02-10 18:45:09', '2022-02-10 21:31:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sales_order` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `customer_id`, `created_at`, `updated_at`, `sales_order`) VALUES
(1, 1, '2022-02-16 02:50:23', '2022-02-16 02:50:23', 'SO202221001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `item_id`, `qty`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 149999, '2022-02-16 03:29:35', '2022-02-16 03:29:35'),
(2, 1, 3, 2, 149999, '2022-02-16 03:31:08', '2022-02-16 03:31:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Pcs', '2022-02-10 19:30:02', '2022-02-10 19:30:02'),
(2, 'Lusin', '2022-02-10 19:30:11', '2022-02-10 19:30:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Widodo', 'ahmadwidodo89@gmail.com', NULL, '$2y$10$lJmR77SifblL.ETdjqPHLeOpORvxyhqIQoqSj89U0RASTp6Yea/ri', NULL, '2022-02-10 18:46:14', '2022-02-10 18:46:14');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_category_id_foreign` (`category_id`),
  ADD KEY `items_unit_id_foreign` (`unit_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_item_id_foreign` (`item_id`),
  ADD KEY `stocks_supplier_id_foreign` (`supplier_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_customer_id_foreign` (`customer_id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_item_id_foreign` (`item_id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`);

--
-- Indeks untuk tabel `units`
--
ALTER TABLE `units`
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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `items_unit_id_foreign` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
