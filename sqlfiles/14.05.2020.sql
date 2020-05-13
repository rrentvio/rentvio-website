-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 May 2020, 00:02:41
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
  `product_picture` int(11) NOT NULL,
  `renter_id` int(11) DEFAULT NULL,
  `upload_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user_product`
--

INSERT INTO `user_product` (`id`, `user_id`, `product_name`, `price`, `product_description`, `product_category`, `publish`, `product_picture`, `renter_id`, `upload_date`) VALUES
(2, 2, 'Product 4', 1534, 'description 4', 'categories(or tags not determined yet ) ', 0, 0, NULL, '2020-04-16'),
(3, 3, 'Product 5', 1234, 'description 5', 'categories(or tags not determined yet ) ', 0, 0, NULL, '2020-03-10'),
(4, 2, 'Product 6', 134, 'description 6', 'categories(or tags not determined yet ) ', 0, 0, NULL, '2020-04-04'),
(6, 1, 'p8', 2147483647, 'p8 değiştimi ?', 'Kitap Dergi', 0, 0, NULL, '2020-04-07'),
(8, 3, 'Product 3', 1294, 'description 3', 'categories(or tags not determined yet ) ', 0, 0, NULL, '2020-03-13'),
(12, 1, 'Product 7', 12034, 'description 7', 'categories(or tags not determined yet ) ', 0, 0, NULL, '2020-04-01'),
(13, 1, 'Product 8', 1996, 'description 1 ', 'categories(or tags not determined yet ) ', 0, 0, NULL, '2020-03-26'),
(16, 2, 'Product 6', 134, 'description 6', 'categories(or tags not determined yet ) ', 0, 0, NULL, '2020-03-14'),
(17, 3, 'Product 5', 1234, 'description 5', 'categories(or tags not determined yet ) ', 0, 0, NULL, '1996-11-05'),
(18, 3, 'Product 3', 1294, 'description 3', 'categories(or tags not determined yet ) ', 0, 0, NULL, '2020-03-03'),
(34, 1, 'ekleme ', 50, 'ekleme deneme ', 'Spor Ekipmanları', 0, 0, NULL, '2020-05-01'),
(35, 2, 'Tarih deneme', 500, 'date trial', 'Kitap Dergi', 0, 0, NULL, '2020-05-13'),
(36, 2, 'publish trial', 10, 'Publish trial', 'Spor Ekipmanları', 1, 0, NULL, '2020-05-13'),
(46, 1, '', 0, '', 'Fotoğraf & Kamera', 0, 0, NULL, '2020-05-14'),
(47, 1, '', 0, '', 'Fotoğraf & Kamera', 0, 0, NULL, '2020-05-14'),
(48, 1, '', 0, '', 'Fotoğraf & Kamera', 0, 0, NULL, '2020-05-14'),
(49, 1, '', 0, '', 'Fotoğraf & Kamera', 0, 0, NULL, '2020-05-14'),
(50, 1, '', 0, '', 'Fotoğraf & Kamera', 0, 0, NULL, '2020-05-14');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `user_product`
--
ALTER TABLE `user_product`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `user_product`
--
ALTER TABLE `user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
