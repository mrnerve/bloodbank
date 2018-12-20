-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Ara 2018, 17:15:05
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.10

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
CREATE DATABASE IF NOT EXISTS `kayitbilgisi` DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci;
USE `kayitbilgisi`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

DROP TABLE IF EXISTS `duyuru`;
CREATE TABLE `duyuru` (
  `duyuru_id` int(11) NOT NULL,
  `duyuru_no` int(11) NOT NULL,
  `duyuru_icerik` varchar(255) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `duyuru`
--

INSERT INTO `duyuru` (`duyuru_id`, `duyuru_no`, `duyuru_icerik`) VALUES
(1, 1, 'Avcılar çevresi A Rh(+) kana ihtiyaç vardır.');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kayiticerik`
--

DROP TABLE IF EXISTS `kayiticerik`;
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
-- Tablo döküm verisi `kayiticerik`
--

INSERT INTO `kayiticerik` (`KullaniciNo`, `KullaniciAdi`, `KullaniciSoyadi`, `TCKimlikNo`, `Telefon`, `DogumTarihi`, `Kangrubu`, `Mail`, `sifre`, `sehir`, `semt`, `durum`, `adres`) VALUES
(1, 'gonca', 'Tahtasakal', '11111111111', '11111111111', '2018-12-14', 'A Rh (+) POZÄ°TÄ°F', 'ddaa@hotmail.com', 'asdf', 'Ankara', 'BahÃ§elievler', b'0', 'aasa'),
(2, '', '', '', '', '0000-00-00', '', '', '', '', '', b'0', ''),
(3, '', '', '', '', '0000-00-00', '', '', '', '', '', b'0', ''),
(4, '', '', '', '', '0000-00-00', '', '', '', '', '', b'0', ''),
(5, 'GHGF', 'GFHGF', '43543543543', 'FGHGF', '2018-12-13', 'A Rh (+) POZÄ°TÄ°F', 'ddddassa@hotmail.com', '123', 'Ã‡anakkale', 'EyÃ¼p', b'0', 'CFCGH'),
(6, 'aaa', 'aaaa', '11111111111', 'aa', '2018-12-16', 'A Rh (+) POZÄ°TÄ°F', 'aa@hotmail.com', '123456789', '', 'BÃ¼yÃ¼kÃ§ekmece', b'0', 'aaaa'),
(7, 'gonca', 'Tahtasakal', '12345678910', '55555555555', '2018-12-20', 'B Rh (-) NEGATÄ°F', 'gonca.tahtasakal@outlook.com', '123456', '', 'Beykoz', b'0', 'aaaa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehir`
--

DROP TABLE IF EXISTS `sehir`;
CREATE TABLE `sehir` (
  `sehir_id` int(11) NOT NULL,
  `sehir_plaka` int(11) NOT NULL,
  `sehir_ad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `semt` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyegiris`
--

DROP TABLE IF EXISTS `uyegiris`;
CREATE TABLE `uyegiris` (
  `id` int(11) NOT NULL,
  `uyetc` int(11) NOT NULL,
  `uyesifre` varchar(50) COLLATE utf8_turkish_ci NOT NULL
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
-- Tablo için indeksler `sehir`
--
ALTER TABLE `sehir`
  ADD PRIMARY KEY (`sehir_id`);

--
-- Tablo için indeksler `uyegiris`
--
ALTER TABLE `uyegiris`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `duyuru_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kayiticerik`
--
ALTER TABLE `kayiticerik`
  MODIFY `KullaniciNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `sehir`
--
ALTER TABLE `sehir`
  MODIFY `sehir_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `uyegiris`
--
ALTER TABLE `uyegiris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
