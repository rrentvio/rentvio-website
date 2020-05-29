-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 May 2020, 01:05:15
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `rentvio`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `pic_name` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `pic_url` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `pic_name`, `pic_url`, `product_id`) VALUES
(1, 'rentvio.png', 'http://192.168.1.7/rentvio/product_images/rentvio.png', 1),
(2, 'Screenshot_4.png', 'http://[::1]/rentvio/product_images/Screenshot_4.png', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `user_name`) VALUES
(1, 'Mustafa Beyceoğlu', 'mustafa.beyceoglu@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Mbeyceoglu'),
(2, 'Berke Çakıroğlu', 'berke.cakiroglu@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Bcakiroglu'),
(3, 'Logan Gomez', 'logan.gomez@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Lgomez'),
(6, 'New User', 'new.user@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Nuser'),
(8, 'New Usertwo', 'new.usertwo@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Nusertwo'),
(12, 'Deneme User', 'deneme@email.com', '8f10d078b2799206cfe914b32cc6a5e9', 'deneme'),
(13, 'Muazzez Zehra ', 'muazzez.zehra@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Mzehre'),
(14, 'İhsan Delice', 'ihsaa.delice@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'İsyankar47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_product`
--

CREATE TABLE `user_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `price` decimal(13,2) NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `product_picture` int(11) DEFAULT NULL,
  `renter_id` int(11) DEFAULT NULL,
  `upload_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user_product`
--

INSERT INTO `user_product` (`id`, `user_id`, `product_name`, `price`, `product_description`, `product_category`, `publish`, `product_picture`, `renter_id`, `upload_date`) VALUES
(2, 2, 'Product 4', '1534.00', 'description 4', 'categories(or tags not determined yet ) ', 0, NULL, NULL, '2020-04-16'),
(3, 3, 'Product 5', '1235.00', 'description 5', 'categories(or tags not determined yet ) ', 0, NULL, NULL, '2020-03-10'),
(4, 2, 'Product 6', '134.00', 'description 6', 'categories(or tags not determined yet ) ', 0, NULL, NULL, '2020-04-04'),
(8, 3, 'Product 3', '1294.00', 'description 3', 'categories(or tags not determined yet ) ', 0, NULL, NULL, '2020-03-13'),
(12, 1, 'adasd', '1.00', 'asasdasdasd', 'Kitap Dergi', 0, NULL, NULL, '2020-04-01'),
(16, 2, 'Product 6', '134.00', 'description 6', 'categories(or tags not determined yet ) ', 0, NULL, NULL, '2020-03-14'),
(17, 3, 'Product 5', '1234.00', 'description 5', 'categories(or tags not determined yet ) ', 0, NULL, NULL, '1996-11-05'),
(18, 3, 'Product 3', '1294.00', 'description 3', 'categories(or tags not determined yet ) ', 0, NULL, NULL, '2020-03-03'),
(35, 2, 'Tarih deneme', '500.00', 'date trial', 'Kitap Dergi', 0, NULL, NULL, '2020-05-13'),
(36, 2, 'publish trial', '10.00', 'Publish trial', 'Spor Ekipmanları', 1, NULL, NULL, '2020-05-13'),
(63, 1, 'asdsad', '50.50', 'asdasd', 'Teknik Elektronik', 0, NULL, NULL, '2020-05-14'),
(67, 1, 'deneme', '50.68', 'ürün', 'Teknik Elektronik', 0, NULL, NULL, '2020-05-14'),
(68, 1, 'asdasd', '50.65', 'dasdasd', 'Fotoğraf & Kamera', 0, NULL, NULL, '2020-05-14'),
(71, 1, 'asda', '50.00', 'asdasd', 'Fotoğraf & Kamera', 0, NULL, NULL, '2020-05-14'),
(72, 2, 'a b c', '50.04', 'a b c', 'Kitap Dergi', 0, NULL, NULL, '2020-05-14'),
(74, 1, 'asdasdasdasdasda', '51.10', 'asdsadasd', 'Spor Ekipmanları', 0, NULL, NULL, '2020-05-14'),
(75, 1, 'Deneme  ürün ismi', '500.51', 'asdasdasd', 'Spor Ekipmanları', 0, NULL, NULL, '2020-05-14'),
(76, 1, 'asdasd asdasda', '99.00', 'asdasdasd', 'Kitap Dergi', 0, NULL, NULL, '2020-05-14');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user_product`
--
ALTER TABLE `user_product`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
