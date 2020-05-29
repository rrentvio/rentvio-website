-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 May 2020, 12:01:29
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
(1, 'Screenshot_132.png', 'http://localhost/rentvio/product_images/Screenshot_132.png', 1),
(2, 'Screenshot_413.png', 'http://localhost/rentvio/product_images/Screenshot_413.png', 1),
(3, 'Screenshot_324.png', 'http://localhost/rentvio/product_images/Screenshot_324.png', 2),
(4, 'Screenshot_223.png', 'http://localhost/rentvio/product_images/Screenshot_223.png', 3),
(5, 'Screenshot_133.png', 'http://localhost/rentvio/product_images/Screenshot_133.png', 3),
(7, 'Screenshot_414.png', 'http://localhost/rentvio/product_images/Screenshot_414.png', 4),
(8, 'Screenshot_72.png', 'http://localhost/rentvio/product_images/Screenshot_72.png', 4),
(9, 'Screenshot_134.png', 'http://localhost/rentvio/product_images/Screenshot_134.png', 4),
(10, 'Screenshot_224.png', 'http://localhost/rentvio/product_images/Screenshot_224.png', 4),
(11, 'Screenshot_325.png', 'http://localhost/rentvio/product_images/Screenshot_325.png', 4),
(12, 'Screenshot_511.png', 'http://localhost/rentvio/product_images/Screenshot_511.png', 4);

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
  `renter_id` int(11) DEFAULT NULL,
  `upload_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user_product`
--

INSERT INTO `user_product` (`id`, `user_id`, `product_name`, `price`, `product_description`, `product_category`, `publish`, `renter_id`, `upload_date`) VALUES
(1, 1, '3d printing Service', '25.00', 'Service Description', 'Teknik Elektronik', 0, NULL, '2020-05-19'),
(2, 1, 'Tent', '14.99', 'Tent Description', 'Spor Ekipmanları', 0, NULL, '2020-05-19'),
(3, 1, 'Soldering Iron', '4.20', 'Soldering Iron Description', 'Teknik Elektronik', 0, NULL, '2020-05-19'),
(4, 1, 'Professional Camera', '5.50', 'Camera Description', 'Fotoğraf & Kamera', 0, NULL, '2020-05-19');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
