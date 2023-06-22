-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 6 月 22 日 11:02
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `sfa_01`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `tel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `company`
--

INSERT INTO `company` (`id`, `name`, `address`, `tel`) VALUES
(1, 'A商事', '東京都港区', '000-111-1111'),
(2, ' B商事', '大阪府', '000-123-3456'),
(3, ' C商事', '広島市', '000-222-3333'),
(4, ' D商事', '広島市', '082-333-3456'),
(5, 'E商事', '福山市', '082-222-2222'),
(6, 'F工業', '尾道市', '082-333-3333'),
(7, 'G建設', '呉市', '0823-11-1111');

-- --------------------------------------------------------

--
-- テーブルの構造 `contact_table`
--

CREATE TABLE `contact_table` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `company` text DEFAULT NULL,
  `contact_day` date NOT NULL,
  `contact_person` text NOT NULL,
  `customer_person` text NOT NULL,
  `contact` varchar(128) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `contact_table`
--

INSERT INTO `contact_table` (`id`, `company_id`, `company`, `contact_day`, `contact_person`, `customer_person`, `contact`, `created_at`) VALUES
(1, 1, 'A商事', '2023-06-19', '秋山', 'A社長', '新工場建設', '2023-06-19 21:16:37'),
(2, 2, 'B商事', '2023-06-10', '菊池', ' B常務', '事業承継対策を検討', '2023-06-19 21:18:52'),
(3, 3, 'C商事', '2023-06-15', '田中', ' C常務', '私募債発行の提案', '2023-06-19 21:20:36'),
(4, 4, 'D商事', '2023-06-18', '秋山', 'A社長', '三菱UFJ銀行からの肩代わり', '2023-06-19 23:04:37'),
(5, 5, 'E商事', '2023-06-18', '秋山', 'D社長', '事業性評価結果のフィードバック', '2023-06-19 23:06:37'),
(6, 6, 'F工業', '2023-06-23', '新井', 'F専務', 'テスト', '2023-06-22 09:31:38'),
(9, 7, 'G建設', '2023-06-23', '秋山', 'G常務', '長期運転資金１００百万円', '2023-06-22 09:33:22');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
