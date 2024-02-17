-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2024-01-15 02:39:30
-- 伺服器版本： 10.4.28-MariaDB
-- PHP 版本： 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `db20`
--

-- --------------------------------------------------------

--
-- 資料表結構 `movie`
--

CREATE TABLE `movie` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `level` int(1) UNSIGNED NOT NULL,
  `length` int(3) UNSIGNED NOT NULL,
  `ondate` date NOT NULL,
  `publish` text NOT NULL,
  `director` text NOT NULL,
  `trailer` text NOT NULL,
  `poster` text NOT NULL,
  `intro` text NOT NULL,
  `sh` int(1) UNSIGNED NOT NULL,
  `rank` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `movie`
--

INSERT INTO `movie` (`id`, `name`, `level`, `length`, `ondate`, `publish`, `director`, `trailer`, `poster`, `intro`, `sh`, `rank`) VALUES
(1, '飛鴨向前衝 Migration', 4, 360, '2024-01-11', 'abc', 'kevin', '03B04v.mp4', '03A11.jpg', '《小小兵》、《神偷奶爸》的照明娛樂將推出喜劇動畫片《飛鴨向前衝》，藉由一個搞笑的鴨子家庭的冒險旅程講述我們應該克服自己內心的恐懼，打開心房接納這個世界以及各種可能性。', 1, 1),
(2, '功夫熊貓4 Kung Fu Panda 4', 1, 123, '2024-01-10', 'abc', 'kevin', '03B01v.mp4', '03A14.jpg', '跟隨阿波在古代中國展開一場令人驚奇的冒險，而他對功夫的熱愛與極佳的好胃口從未改變。', 1, 4),
(3, '蜘蛛夫人 Madame Web', 4, 260, '2024-01-11', '讚讚發行公司', '厲害的導演', '03B01v.mp4', '03A12.jpg', '蜘蛛人番外篇，劇情聚焦在一個名為韋伯夫人的千里眼突變體上。', 1, 2),
(4, '沙丘：第二部 Dune: Part Two', 4, 260, '2024-01-09', '讚讚發行公司', '厲害的導演', '03B01v.mp4', '03A13.jpg', '影片將探索保羅亞崔迪的偉大神祕之旅，他和荃妮以及弗瑞曼人聯手，對毀滅他家族的陰謀者展開報復。保羅必須在他畢生摯愛與已知宇宙命運之間做抉擇，並且努力阻止只有他能預見的可怕未來。', 1, 3),
(5, '院線片01GHOSTBUSTERS：冰天凍地 Ghostbusters: Frozen Empire', 1, 260, '2024-01-14', '讚讚發行公司', '厲害的導演', '03B01v.mp4', '03A15.jpg', '這是關於…', 1, 5),
(6, '光之美少女電影 ALL STARS F PreCure All Stars F', 1, 260, '2024-01-18', '讚讚發行公司', '厲害的導演', '03B01v.mp4', '03A17.jpg', '《光之美少女》系列 20 周年紀念最新劇場版作品《光之美少女電影 ALL STARS F》，集結第1代至第20代總共有77位主角，大陣仗齊聚！此次光之美少女們將在電影中共同展開前所未有的戰鬥！', 1, 6),
(7, '妖怪森林 LUDA', 1, 260, '2024-01-11', '讚讚發行公司', '厲害的導演', '03B01v.mp4', '03A18.jpg', '金獎導演王世偉歷時十年製作的動畫電影，許多靈感取自台灣妖怪傳說的角色與地景，小女孩闖進森林撞見魔神仔 台灣妖怪活靈活現驚艷眾人....', 1, 7),
(8, '機密特務: 阿蓋爾', 4, 260, '2024-01-11', '讚讚發行公司', '厲害的導演', '03B01v.mp4', '03A10.jpg', '《金牌特務》導演馬修范恩執導，《不可能的任務:全面瓦解》亨利卡維爾、《侏羅紀世界》布萊絲達拉斯霍華主演，世界上最偉大的間諜，被捲入一場環遊世界的冒險。', 1, 8),
(10, '哥吉拉與金剛：新帝國 Godzilla x Kong: The New Empire', 1, 0, '2024-01-10', 'aaa', 'aaa', '03B02v.mp4', '03A16.jpg', '史詩級的戰鬥仍持續進行中！傳奇影業的怪獸宇宙系列繼《哥吉拉大戰金剛》的爆炸性對決後，再度推出全新冒險故事；全能的金剛和駭人的哥吉拉即將聯手對抗隱藏在我們世界中未被發現的巨大威脅。', 1, 9);

-- --------------------------------------------------------

--
-- 資料表結構 `poster`
--

CREATE TABLE `poster` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `img` text NOT NULL,
  `sh` int(1) NOT NULL,
  `rank` int(10) NOT NULL,
  `ani` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 傾印資料表的資料 `poster`
--

INSERT INTO `poster` (`id`, `name`, `img`, `sh`, `rank`, `ani`) VALUES
(1, 'ABC', '03A01.jpg', 1, 1, 1),
(2, 'DEF', '03A02.jpg', 1, 3, 1),
(3, '預告片03', '03A03.jpg', 1, 0, 2),
(11, 'ABC', '03A01.jpg', 1, 1, 1),
(12, 'DEF', '03A02.jpg', 1, 3, 1),
(13, '預告片03', '03A03.jpg', 1, 0, 2),
(14, 'ABC', '03A01.jpg', 1, 1, 1),
(15, 'DEF', '03A02.jpg', 1, 3, 1),
(16, '預告片03', '03A03.jpg', 1, 0, 2),
(17, 'ABC', '03A01.jpg', 1, 1, 1),
(18, 'DEF', '03A02.jpg', 1, 3, 1),
(19, '預告片03', '03A03.jpg', 1, 0, 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
