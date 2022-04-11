-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 23, 2019 at 04:31 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wortas`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_login`
--

CREATE TABLE `ad_login` (
  `id` int(11) NOT NULL,
  `ad_mail` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL,
  `ad_pass` varchar(255) COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `ad_login`
--

INSERT INTO `ad_login` (`id`, `ad_mail`, `ad_pass`) VALUES
(1, 'admin@admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `artigos`
--

CREATE TABLE `artigos` (
  `art_id` int(11) NOT NULL,
  `art_img` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `art_nome` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `art_promoline` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `art_descricao` longtext COLLATE utf32_unicode_ci NOT NULL,
  `art_infoadicional` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `art_preco` decimal(10,2) NOT NULL,
  `art_precopromo` decimal(10,2) NOT NULL,
  `art_destaque` int(11) NOT NULL,
  `art_views` int(11) NOT NULL,
  `art_promo` int(11) NOT NULL,
  `art_categoria` int(11) DEFAULT NULL,
  `art_vendas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `artigos`
--

INSERT INTO `artigos` (`art_id`, `art_img`, `art_nome`, `art_promoline`, `art_descricao`, `art_infoadicional`, `art_preco`, `art_precopromo`, `art_destaque`, `art_views`, `art_promo`, `art_categoria`, `art_vendas`) VALUES
(1, 'anjo.jpg', 'Fábio', 'asdasd', 'asdasdasd', 'asdasd', '100.00', '50.00', 1, 4, 1, 2, 0),
(2, 'lanterna.jpg', 'Lanterna', 'asdasd', 'asdasdasd', 'asdasdasd', '545.00', '4.00', 1, 4, 1, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) COLLATE utf32_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id`, `descricao`) VALUES
(2, 'Electrodomestico');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `log_email` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `log_senha` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `log_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `log_email`, `log_senha`, `log_tipo`) VALUES
(1, 'email@email.com', 'password', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `news_id` int(11) NOT NULL,
  `news_email` varchar(50) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `cart_status` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `meiopagamento` varchar(10) COLLATE utf32_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `pendente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id`, `cart_id`, `cart_status`, `id_login`, `meiopagamento`, `data`, `pendente`) VALUES
(4, 'e4225b140ba912818248d5ae99dba9ec41f048049afcd15bc265250be7b5a208', 1, 1, 'MB', '2019-05-23', 2),
(5, '56dbd943ea80cb6a424980aaf300192538f74d43aa5bb9751a9d099427b699aa', 1, 1, 'MB', '2019-05-23', 0),
(6, 'ccb260389cb9579720ae85f2e7163952cf5f0b1fd61aa525ddebe5e591a9e93a', 0, 1, '', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cartitens`
--

CREATE TABLE `tb_cartitens` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `art_id` int(11) NOT NULL,
  `qta` int(11) NOT NULL,
  `preco` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tb_cartitens`
--

INSERT INTO `tb_cartitens` (`id`, `cart_id`, `art_id`, `qta`, `preco`) VALUES
(3, 'e4225b140ba912818248d5ae99dba9ec41f048049afcd15bc265250be7b5a208', 1, 1, '100.00'),
(4, '56dbd943ea80cb6a424980aaf300192538f74d43aa5bb9751a9d099427b699aa', 2, 1, '545.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cartp`
--

CREATE TABLE `tb_cartp` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(100) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `tb_cartp`
--

INSERT INTO `tb_cartp` (`id`, `cart_id`) VALUES
(2, '7439c2a79099b594a25092d7f17136b44ffb55764d12c00498b161586361b33e');

-- --------------------------------------------------------

--
-- Table structure for table `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_utilizador` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `u_nome` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `u_morada` varchar(100) COLLATE utf32_unicode_ci NOT NULL,
  `u_cp` varchar(8) COLLATE utf32_unicode_ci NOT NULL,
  `u_localidade` varchar(50) COLLATE utf32_unicode_ci NOT NULL,
  `u_datanas` date NOT NULL,
  `u_nif` varchar(10) COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_unicode_ci;

--
-- Dumping data for table `utilizadores`
--

INSERT INTO `utilizadores` (`id_utilizador`, `id_login`, `u_nome`, `u_morada`, `u_cp`, `u_localidade`, `u_datanas`, `u_nif`) VALUES
(1, 1, 'Francelina', 'Morada', '1234-567', 'Localidade', '0000-00-00', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_login`
--
ALTER TABLE `ad_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tb_cart`
--
ALTER TABLE `tb_cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cart_id` (`cart_id`);

--
-- Indexes for table `tb_cartitens`
--
ALTER TABLE `tb_cartitens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cartp`
--
ALTER TABLE `tb_cartp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cart_id` (`cart_id`);

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`id_utilizador`),
  ADD UNIQUE KEY `id_login` (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_login`
--
ALTER TABLE `ad_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `artigos`
--
ALTER TABLE `artigos`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_cart`
--
ALTER TABLE `tb_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_cartitens`
--
ALTER TABLE `tb_cartitens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_cartp`
--
ALTER TABLE `tb_cartp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
