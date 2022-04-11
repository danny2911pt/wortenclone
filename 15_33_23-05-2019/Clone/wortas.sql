-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2019 at 11:52 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `artigos`
--

CREATE TABLE `artigos` (
  `art_id` int(11) NOT NULL,
  `art_img` varchar(50) NOT NULL,
  `art_nome` varchar(50) NOT NULL,
  `art_promoline` varchar(50) NOT NULL,
  `art_descricao` text NOT NULL,
  `art_infoadicional` varchar(50) NOT NULL,
  `art_preco` decimal(10,2) NOT NULL,
  `art_precopromo` decimal(10,2) NOT NULL,
  `art_destaque` int(11) NOT NULL,
  `art_categoria` int(11) NOT NULL,
  `art_views` int(11) NOT NULL,
  `art_promo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artigos`
--

INSERT INTO `artigos` (`art_id`, `art_img`, `art_nome`, `art_promoline`, `art_descricao`, `art_infoadicional`, `art_preco`, `art_precopromo`, `art_destaque`, `art_categoria`, `art_views`, `art_promo`) VALUES
(1, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 1, 1, 1, 0),
(2, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 1, 2, 31, 1),
(3, 'demo-prd.jpg', 'NomeArtigo', '10% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 1, 1, 48, 1),
(4, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 1, 2, 4, 0),
(5, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 0, 1, 0, 0),
(6, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 1, 2, 1, 0),
(7, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 0, 1, 83, 1),
(8, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 0, 2, 25, 1),
(9, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 0, 1, 0, 0),
(10, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 0, 2, 0, 1),
(11, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 0, 2, 2, 0),
(12, 'demo-prd.jpg', 'NomeArtigo', '30% Desconto', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod', 'Lorem ipsum dolor sit amet, consectetur adipisicin', '350.00', '449.00', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `log_email` varchar(50) NOT NULL,
  `log_senha` varchar(50) NOT NULL,
  `log_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_login`, `log_email`, `log_senha`, `log_tipo`) VALUES
(1, 'omeuemail@mail.com', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `news_id` int(11) NOT NULL,
  `news_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`news_id`, `news_email`) VALUES
(1, 'zemaria@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cart`
--

CREATE TABLE `tb_cart` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `cart_status` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `meiopagamento` varchar(10) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cart`
--

INSERT INTO `tb_cart` (`id`, `cart_id`, `cart_status`, `id_login`, `meiopagamento`, `data`) VALUES
(1, '452983de581956b7e1a950fc68949dca9f6368981261b78893c972f4fa351af6', 1, 1, 'MB', '0000-00-00'),
(17, '45c6f355f20c7b3b6270a7513f5fdf536ddb3c42018bffde5cbb015c7f01b1b4', 1, 1, 'TRF', '0000-00-00'),
(18, '45ac702e43e65bd45592705b778228494f16dfce96b5c1f77280af77c3313a22', 1, 1, 'BTC', '0000-00-00'),
(19, '2e67544eef42ba6ac4390326226164d7ee0589732fd799db326618deedb279c8', 1, 1, 'BTC', '0000-00-00'),
(20, '212ac7db095e291408af8465b83957f261e55b64cc083ac6e8aa9196cefd277c', 1, 1, 'TRF', '2019-03-28'),
(21, '92aab53e6c7b57935388c20b7f8d892e3bfa2f556217a92c7cc8d4dcf72c4da2', 1, 1, 'MB', '2019-03-28'),
(22, '2a77efcfaec50fa4b1a0cd0fde28efb6e6705a71331ef17a20b4926da1d6d2f1', 0, 1, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cartitens`
--

CREATE TABLE `tb_cartitens` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(100) NOT NULL,
  `art_id` int(11) NOT NULL,
  `qta` int(11) NOT NULL,
  `preco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cartitens`
--

INSERT INTO `tb_cartitens` (`id`, `cart_id`, `art_id`, `qta`, `preco`) VALUES
(5, 'ea783d19a4c866d8a93dc656bba65dcd99946787a6eb4eb0ca26657fcbe36dab', 2, 3, ''),
(6, 'ea783d19a4c866d8a93dc656bba65dcd99946787a6eb4eb0ca26657fcbe36dab', 3, 8, ''),
(7, 'ea783d19a4c866d8a93dc656bba65dcd99946787a6eb4eb0ca26657fcbe36dab', 7, 19, ''),
(8, 'ea783d19a4c866d8a93dc656bba65dcd99946787a6eb4eb0ca26657fcbe36dab', 8, 3, ''),
(9, 'ea783d19a4c866d8a93dc656bba65dcd99946787a6eb4eb0ca26657fcbe36dab', 4, 1, ''),
(10, '1b9e3565bed570f479ac98d631a0a65c866c00763b2fc1e92714a8c028b3a1a9', 7, 1, ''),
(11, '1b9e3565bed570f479ac98d631a0a65c866c00763b2fc1e92714a8c028b3a1a9', 8, 1, ''),
(12, '1b9e3565bed570f479ac98d631a0a65c866c00763b2fc1e92714a8c028b3a1a9', 3, 6, ''),
(13, '1b9e3565bed570f479ac98d631a0a65c866c00763b2fc1e92714a8c028b3a1a9', 2, 1, ''),
(15, '452983de581956b7e1a950fc68949dca9f6368981261b78893c972f4fa351af6', 3, 5, ''),
(26, 'e27412a1399b5869edba5bc372efb892c2bc2e910762f7868c97b4b84bc9aa27', 7, 1, ''),
(27, '452983de581956b7e1a950fc68949dca9f6368981261b78893c972f4fa351af6', 3, 1, ''),
(28, '45c6f355f20c7b3b6270a7513f5fdf536ddb3c42018bffde5cbb015c7f01b1b4', 2, 1, ''),
(30, '45ac702e43e65bd45592705b778228494f16dfce96b5c1f77280af77c3313a22', 2, 1, ''),
(32, '2e67544eef42ba6ac4390326226164d7ee0589732fd799db326618deedb279c8', 2, 1, ''),
(33, '212ac7db095e291408af8465b83957f261e55b64cc083ac6e8aa9196cefd277c', 3, 1, '350.00'),
(34, '92aab53e6c7b57935388c20b7f8d892e3bfa2f556217a92c7cc8d4dcf72c4da2', 2, 4, '350.00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cartp`
--

CREATE TABLE `tb_cartp` (
  `id` int(11) NOT NULL,
  `cart_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cartp`
--

INSERT INTO `tb_cartp` (`id`, `cart_id`) VALUES
(10, '0a513b7215c7767c3014d1b99a2bf6c32aaef169ecbcec38ab3744cd7d129b5a'),
(8, '1b9e3565bed570f479ac98d631a0a65c866c00763b2fc1e92714a8c028b3a1a9'),
(13, '2a66f35d22dfcfcbbbd903c9e741222343838e120a4e9c9a76ba019d8ca88e06'),
(11, '513b77e42bed12ebb33c9f06e4e2af7b17bc563ea85d3627662541d1d0f65117'),
(4, '67bcbb08e98e88455616330fccfd9ff5d72c732eaae4bcc23224fa590ff152b1'),
(12, 'e27412a1399b5869edba5bc372efb892c2bc2e910762f7868c97b4b84bc9aa27'),
(6, 'ea783d19a4c866d8a93dc656bba65dcd99946787a6eb4eb0ca26657fcbe36dab');

-- --------------------------------------------------------

--
-- Table structure for table `utilizadores`
--

CREATE TABLE `utilizadores` (
  `id_utilizador` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `u_nome` varchar(50) NOT NULL,
  `u_morada` varchar(100) NOT NULL,
  `u_cp` varchar(8) NOT NULL,
  `u_localidade` varchar(50) NOT NULL,
  `u_datanas` date NOT NULL,
  `u_nif` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilizadores`
--

INSERT INTO `utilizadores` (`id_utilizador`, `id_login`, `u_nome`, `u_morada`, `u_cp`, `u_localidade`, `u_datanas`, `u_nif`) VALUES
(1, 1, 'Alfredo', 'rua do Alfredo', '1500', 'Lisboa', '1987-12-31', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artigos`
--
ALTER TABLE `artigos`
  ADD PRIMARY KEY (`art_id`);

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
-- AUTO_INCREMENT for table `artigos`
--
ALTER TABLE `artigos`
  MODIFY `art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_cartitens`
--
ALTER TABLE `tb_cartitens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tb_cartp`
--
ALTER TABLE `tb_cartp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `id_utilizador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
