-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 May 2020, 00:37:41
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
  `product_id` int(11) DEFAULT NULL,
  `rented_till` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `images`
--

INSERT INTO `images` (`id`, `pic_name`, `pic_url`, `product_id`, `rented_till`) VALUES
(6, 'Screenshot_33.png', 'http://localhost/rentvio/product_images/Screenshot_33.png', 1, NULL),
(7, 'Screenshot_13.png', 'http://localhost/rentvio/product_images/Screenshot_13.png', 2, NULL),
(8, 'Screenshot_43.png', 'http://localhost/rentvio/product_images/Screenshot_43.png', 2, NULL),
(9, 'Screenshot_2.png', 'http://localhost/rentvio/product_images/Screenshot_2.png', 3, NULL),
(10, 'Screenshot_14.png', 'http://localhost/rentvio/product_images/Screenshot_14.png', 3, NULL),
(11, 'Screenshot_34.png', 'http://localhost/rentvio/product_images/Screenshot_34.png', 3, NULL),
(12, 'Screenshot_44.png', 'http://localhost/rentvio/product_images/Screenshot_44.png', 3, NULL),
(13, 'Screenshot_5.png', 'http://localhost/rentvio/product_images/Screenshot_5.png', 3, NULL),
(14, 'Screenshot_6.png', 'http://localhost/rentvio/product_images/Screenshot_6.png', 3, NULL),
(15, 'Screenshot_7.png', 'http://localhost/rentvio/product_images/Screenshot_7.png', 3, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `user_pic` varchar(500) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `user_name`, `user_pic`, `bio`) VALUES
(1, 'Mustafa Beyceoğlu', 'mustafa.beyceoglu@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Mbeyceoglu', 'http://localhost/rentvio/assets/pictures/users/862c233656cc58840299f9b1267653a12.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo dolorum corporis ab odit consequatur ipsam. Totam, nostrum asperiores. Repellendus amet provident sequi excepturi saepe architecto consectetur aliquam ullam dolorem corrupti.'),
(2, 'Berke Çakıroğlu', 'berke.cakiroglu@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Bcakiroglu', NULL, ''),
(3, 'Logan Gomez', 'logan.gomez@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Lgomez', NULL, ''),
(6, 'New User', 'new.user@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Nuser', NULL, ''),
(8, 'New Usertwo', 'new.usertwo@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'Nusertwo', NULL, ''),
(12, 'Deneme', 'deneme@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Denemeuser', NULL, ''),
(13, 'Muazzez Zehra ', 'muazzez.zehra@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Mzehre', NULL, ''),
(14, 'İhsan Delice', 'ihsaa.delice@std.antalya.edu.tr', '81dc9bdb52d04dc20036dbd8313ed055', 'İsyankar47', NULL, '');

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
  `upload_date` date NOT NULL DEFAULT current_timestamp(),
  `rented_till` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user_product`
--

INSERT INTO `user_product` (`id`, `user_id`, `product_name`, `price`, `product_description`, `product_category`, `publish`, `renter_id`, `upload_date`, `rented_till`) VALUES
(1, 1, 'Tent', '15.00', 'tent Description', 'Spor Ekipmanları', 0, NULL, '2020-05-21', NULL),
(2, 1, '3d printing Service', '1.20', '3d printing service', 'Fotoğraf & Kamera', 0, NULL, '2020-05-21', NULL),
(3, 1, 'Professional Camera', '12.50', 'kamera', 'Fotoğraf & Kamera', 0, NULL, '2020-05-21', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
