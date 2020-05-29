-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 11 May 2020, 21:50:19
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
(12, 'Deneme User', 'deneme@email.com', '8f10d078b2799206cfe914b32cc6a5e9', 'deneme');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user_product`
--

CREATE TABLE `user_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_turkish_ci DEFAULT NULL,
  `price` int(250) NOT NULL,
  `product_description` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `product_category` varchar(255) COLLATE utf8mb4_turkish_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `product_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user_product`
--

INSERT INTO `user_product` (`id`, `user_id`, `product_name`, `price`, `product_description`, `product_category`, `publish`, `product_picture`) VALUES
(2, 2, 'Product 4', 1534, 'description 4', 'categories(or tags not determined yet ) ', 0, 0),
(3, 3, 'Product 5', 1234, 'description 5', 'categories(or tags not determined yet ) ', 0, 0),
(4, 2, 'Product 6', 134, 'description 6', 'categories(or tags not determined yet ) ', 0, 0),
(6, 1, 'p8 ', 2147483647, 'p8 değiştimi ? ', 'Kitap Dergi', 1, 0),
(8, 3, 'Product 3', 1294, 'description 3', 'categories(or tags not determined yet ) ', 0, 0),
(12, 1, 'Product 7', 12034, 'description 7', 'categories(or tags not determined yet ) ', 0, 0),
(13, 1, 'Product 8', 1996, 'description 1 ', 'categories(or tags not determined yet ) ', 0, 0),
(16, 2, 'Product 6', 134, 'description 6', 'categories(or tags not determined yet ) ', 0, 0),
(17, 3, 'Product 5', 1234, 'description 5', 'categories(or tags not determined yet ) ', 0, 0),
(18, 3, 'Product 3', 1294, 'description 3', 'categories(or tags not determined yet ) ', 0, 0),
(31, 1, 'Deneme  ürün ismi', 500, 'sil baştaaaaaan \"', 'Bahçe & Yapı Market', 1, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

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
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
