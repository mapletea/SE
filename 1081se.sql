-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.1.40-MariaDB
-- PHP 版本： 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `1081se`
--

-- --------------------------------------------------------

--
-- 資料表結構 `orderitem`
--

CREATE TABLE `orderitem` (
  `serno` int(11) NOT NULL,
  `ordID` int(11) NOT NULL,
  `prdID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `orderitem`
--

INSERT INTO `orderitem` (`serno`, `ordID`, `prdID`, `quantity`) VALUES
(11, 2, 1, 2),
(12, 2, 2, 1),
(13, 3, 1, 1),
(14, 3, 5, 1),
(15, 3, 7, 1),
(16, 4, 1, 1),
(17, 4, 7, 1),
(18, 5, 2, 1),
(19, 7, 1, 1);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `prdID` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `detail` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`prdID`, `name`, `price`, `detail`) VALUES
(1, 'iPhone 15', 90000, 'This is a fake phone. Don\'t bu'),
(2, 'Water', 90, 'Pure water from Puli'),
(5, 'watch', 12000, 'a new watch'),
(7, 'gifts', 500, '神秘的禮物');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `ID` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `badguy` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`ID`, `password`, `name`, `role`, `badguy`) VALUES
('11111', '123', 'zzz', 1, 0),
('admin', '123', '管理員', 9, 0),
('jc', '123', 'ann', 1, 6),
('logistic', '123', 'logistic', 0, 0),
('papa', '123', 'ann', 1, 0),
('user', '123', '客戶', 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `userorder`
--

CREATE TABLE `userorder` (
  `ordID` int(11) NOT NULL,
  `uID` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `orderDate` date NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `userorder`
--

INSERT INTO `userorder` (`ordID`, `uID`, `orderDate`, `address`, `status`) VALUES
(1, 'jc', '2019-12-25', 'taichung', 3),
(2, 'jc', '2020-01-08', 'tw', 4),
(3, 'user', '2020-01-08', 'taipei', 1),
(4, 'jc', '2020-01-08', 'taipei', 1),
(5, 'jc', '2020-01-08', 'taichung', 1),
(6, 'jc', '2020-01-08', 'taichung', 1),
(7, 'jc', '0000-00-00', '', 0);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `orderitem`
--
ALTER TABLE `orderitem`
  ADD PRIMARY KEY (`serno`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prdID`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- 資料表索引 `userorder`
--
ALTER TABLE `userorder`
  ADD PRIMARY KEY (`ordID`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `orderitem`
--
ALTER TABLE `orderitem`
  MODIFY `serno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `prdID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動增長(AUTO_INCREMENT) `userorder`
--
ALTER TABLE `userorder`
  MODIFY `ordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
