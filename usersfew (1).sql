-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 07 มี.ค. 2022 เมื่อ 04:31 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.21-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projec34_p3db`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `usersfew`
--

CREATE TABLE `usersfew` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `std_id` varchar(255) NOT NULL,
  `titlename` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gen` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `birthday` varchar(255) NOT NULL,
  `age` int(10) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `usersfew`
--

INSERT INTO `usersfew` (`id`, `username`, `password`, `email`, `std_id`, `titlename`, `firstname`, `lastname`, `address`, `gen`, `job`, `img`, `birthday`, `age`, `urole`, `create_at`) VALUES
(1, 'admin', '123456', 'tzgame0456@gmail.com', '63301280003', 'นาย', 'admin', 'account', 'los santos', '1', 'master', '751776872.jpg', '2001-11-01', 25, 'admin', '2022-02-18 10:58:56'),
(2, 'user', '123456', 'lnwzajunkzii@gmail.com', '63301280017', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', 'สระบุรี', '5', 'boss', '31982103.jpg', '2001-06-20', 0, 'user', '2022-02-18 11:00:31'),
(3, 'aotza0123', '123456', 'aot.za0123@gmail.com', '63301280004', 'นาย', 'ชยากร', 'อยู่คงพันธ์', '110 หมู่1 ต.ไก่ อ.หมู จ.ลพบุรี 15000', '17', 'นักศึกษา', '41.jpg', '2001-08-23', 0, 'user', '2022-02-23 05:47:50'),
(4, 'dasdas', 'dasdas', 'dasdas@gmail.com', '63301280010', 'นาย', 'สามารถ', 'เก่งกาจ', 'สิงบุรี', '10', 'นักศึกษา', '1.4.jpg', '2022-02-02', 0, 'user', '2022-02-23 09:33:57'),
(7, 'qwer', 'qwerqwer', 'jakkritzxqweza0456@gmail.com', '63301280045', 'นาย', 'ปาวี', 'ซาเวีย', 'ลพบุรี', '20', 'ภารโรง', '10889.jpg', '2022-02-09', 0, 'user', '2022-02-24 19:42:07'),
(9, 'asdasdasd', 'asdasdasd', 'tzgame0asd456@gmail.com', '63301280055', 'นาย', 'พี่เทพasdasd', 'นายาว', 'กรุงเทพ', '10', 'เสมียร', '1331135578.jpg', '2022-03-02', 0, 'user', '2022-02-24 20:31:58'),
(10, 'asdasdasd', 'asdasdasd', 'tzgameasdasd0456@gmail.com', '63301280011', 'นาย', 'อดัม', 'เเพทริค', 'กรุงเทพ', '17', 'ทหาร', '2b1d1ec5b66f181e008c6bd87c74a5ca_cover.jpg', '2022-02-17', 0, 'user', '2022-02-24 20:37:53'),
(15, 'x', '123456', 'x@gmail.com', '5232', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', 'x', '21', 'นักศึกษา', '1.4.jpg', '2022-02-15', 12, 'user', '2022-02-27 05:58:27'),
(16, 'c', '123456', 'c@gmail.com', '63301', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', 'c', '10', 'c', '270837152_587419885681229_8867089672615510272_n.jpg', '2022-02-14', 23, 'user', '2022-02-27 06:01:34'),
(18, 'e', '123456', 'e@gmail.com', '63301280003', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', '10', 'e', '', '2022-01-30', 23, 'user', '2022-02-27 06:48:05'),
(19, 'ffff', '123456', 'tzgamefff0456@gmail.com', '63301280003', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', '17', 'จอมมาร', 'Array', '2022-02-24', 12, 'user', '2022-02-27 07:31:00'),
(20, 'asfaf', '123456', 'tzgamfase0456@gmail.com', '63301280003', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', '17', 'airplant', '1799034980.jpg', '2022-02-17', 27, 'user', '2022-02-27 07:35:06'),
(21, 'asdasdasdasd', 'asdasdasdasd', 'lnwzajunkzii@gmail.com', '63301280123', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', 'los santos', '5', 'boss', '', '2022-02-15', 12, 'user', '2022-02-27 07:49:22'),
(22, 'users', '123456', 'lnwzajunkasdsazii@gmail.com', '63301280123', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', 'los santos', '2', 'boss', '1035124041.jpg', '2022-02-04', 35, 'user', '2022-02-27 08:54:49'),
(23, 'rrr', '123456', 'tzgamrrre0456@gmail.com', '63301280003', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', '17', 'boss', '885852579.jpg', '2022-01-31', 22, 'user', '2022-02-27 13:23:37'),
(24, '11111', '11111', '1111@gmail.com', '111111111', 'นาย', '11111', '11111', '11111', '11', '111111', '1420338827.jpg', '2022-02-02', 111, 'user', '2022-02-28 02:41:42'),
(25, '123456', '123456', 'tzgame0451234566@gmail.com', '123456', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', '5', '123456', '984613983.png', '2022-03-23', 123456, 'user', '2022-03-02 08:50:24'),
(26, 'asd123', 'asd123', 'tzgame045asd6@gmail.com', '123', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', '123', '123', '711422937.png', '2022-03-08', 12, 'user', '2022-03-02 08:51:27'),
(27, 'asdasd123', 'asdasd123', 'tzgame0456asd123@gmail.com', '63301280003', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', '17', 'airplant', '325947188.png', '2022-03-08', 111, 'user', '2022-03-02 12:57:26'),
(28, 'user123', '123456', 'user123@gmail.com', '55663020201', 'นาย', 'สมพร', 'ปากเบย', '167 หมู่2', '08', 'ข้าราชการ', '1727778532.jpg', '2022-03-09', 30, 'user', '2022-03-06 07:05:51'),
(29, 'usera', '123456', 'usera@gmail.com', '63301280005', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', '10', 'พนักงาน', '507520168.jpg', '2022-03-16', 23, 'user', '2022-03-06 13:54:53'),
(30, 'aaaaa', 'aaaaa', 'admiaaaaan@gmail.com', 'aa', 'นาง', 'aaaaa', 'aaaaa', 'aaaaa', 'a', 'a', '1303097477.png', '2022-02-27', 0, 'user', '2022-03-07 03:02:56'),
(31, 'ddddd', 'ddddd', 'ddddd@gmail.com', 'd', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', 'd', 'd', '1165207854.jpg', '2022-03-15', 0, 'user', '2022-03-07 03:56:53'),
(32, 'ddddd', 'ddddd', 'ddddd@tmail.com', 'd', 'นาย', 'จักรกฤษณ์', 'คุ้มภัย', '167 หมู่2', 'd', 'd', '970461358.jpg', '2022-03-15', 0, 'user', '2022-03-07 03:57:08'),
(33, 'sssss', 'sssss', 'sssssss@gmail.com', 's', 'นาย', 's', 's', 's', 's', 's', '1160726976.jpg', '20001-01-11', 12, 'user', '2022-03-07 04:45:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usersfew`
--
ALTER TABLE `usersfew`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usersfew`
--
ALTER TABLE `usersfew`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
