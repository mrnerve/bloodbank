-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 30 Ara 2018, 23:47:32
-- Sunucu sürümü: 10.1.33-MariaDB
-- PHP Sürümü: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kayitbilgisi`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `duyuru_id` int(11) NOT NULL,
  `duyuru_no` int(11) NOT NULL,
  `duyuru_icerik` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayiticerik`
--

CREATE TABLE `kayiticerik` (
  `KullaniciNo` int(11) NOT NULL,
  `KullaniciAdi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `KullaniciSoyadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `TCKimlikNo` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `Telefon` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `DogumTarihi` date NOT NULL,
  `Kangrubu` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `Mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_turkish_ci NOT NULL,
  `sehir` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `semt` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `durum` bit(1) NOT NULL,
  `adres` varchar(250) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`duyuru_id`);

--
-- Tablo için indeksler `kayiticerik`
--
ALTER TABLE `kayiticerik`
  ADD PRIMARY KEY (`KullaniciNo`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `duyuru_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kayiticerik`
--
ALTER TABLE `kayiticerik`
  MODIFY `KullaniciNo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
