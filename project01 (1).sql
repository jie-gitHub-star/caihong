-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2019-06-30 11:09:10
-- 服务器版本： 5.7.24
-- PHP 版本： 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `project01`
--

-- --------------------------------------------------------

--
-- 表的结构 `friendlink`
--

DROP TABLE IF EXISTS `friendlink`;
CREATE TABLE IF NOT EXISTS `friendlink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `link` varchar(60) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `friendlink`
--

INSERT INTO `friendlink` (`id`, `name`, `link`) VALUES
(1, '百度', 'www.baidu.com'),
(3, '淘宝', 'www.taobao.com'),
(4, 'asd', 'www.asd.com'),
(5, '1', 'www.sdod.cn');

-- --------------------------------------------------------

--
-- 表的结构 `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '商品名称',
  `typeid` int(11) NOT NULL COMMENT '分类id',
  `price` decimal(8,2) NOT NULL COMMENT '商品价格',
  `store` int(11) NOT NULL COMMENT '商品库存',
  `pic` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '商品图片',
  `company` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '商品厂家',
  `status` enum('0','1') COLLATE utf8mb4_bin NOT NULL COMMENT '商品状态; 0=下架; 1=上架;',
  `descr` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '商品描述',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `goods`
--

INSERT INTO `goods` (`id`, `name`, `typeid`, `price`, `store`, `pic`, `company`, `status`, `descr`) VALUES
(2, '毕文锐', 33, '10.00', 100000, '20190511171352_152.jpg', '读取文多千万', '1', '二娃个如果突然红太阳花个佛挡杀佛三双打分而给他人具有统计暗室逢灯'),
(3, 'wzblog', 31, '10000.00', 10000, '20190429215915_963.jpg', '读取文多千万', '1', '房管局人头狗我二哥人头狗仍如果五花肉通过二内容还让他二'),
(4, '陈光星', 46, '10000.00', 10000, '20190502162626_560.jpg', '读取文多千万', '1', '会计师多行v科技峰会告诉大家法律框架热力裤关雎尔oil东方国际老K二进'),
(5, '萌妹子', 33, '10000.00', 10000, '20190428104044_300.jpg', '读取文多千万', '0', 'ad变化是否为了符合惊恐万分开发部科技文化氛围'),
(6, '隔壁武广', 31, '1234.00', 111, '20190511114814_230.jpg', 'asdasdas', '0', '啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊啊'),
(7, '天湖', 44, '9999.00', 999, '20190511114758_795.png', '封建社会', '1', '哈哈哈哈哈哈哈哈哈哈或或或或或或或'),
(10, '北海大虾', 41, '99.00', 111, '20190511114031_821.png', '王金泽', '1', '吃鸡亡者');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` varchar(60) COLLATE utf8mb4_bin NOT NULL COMMENT '订单id',
  `uid` int(11) NOT NULL COMMENT '用户id',
  `status` enum('0','1','2') COLLATE utf8mb4_bin NOT NULL DEFAULT '0' COMMENT '订单状态: 0=代发货;1=待收货;2=已完成;',
  `is_pay` enum('0','1') COLLATE utf8mb4_bin NOT NULL DEFAULT '0' COMMENT '订单是否被支付',
  `total` float(8,2) NOT NULL COMMENT '订单总价',
  `username` varchar(25) COLLATE utf8mb4_bin NOT NULL COMMENT '收件人姓名',
  `tel` char(11) COLLATE utf8mb4_bin NOT NULL COMMENT '收件人手机号码',
  `address` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '收货地址',
  `addtime` timestamp NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `oid` (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`id`, `oid`, `uid`, `status`, `is_pay`, `total`, `username`, `tel`, `address`, `addtime`) VALUES
(6, '201905095cd30d3613bd31557335350', 11, '1', '0', 10030.00, 'testA12', '13535346332', '11111111111111111111111111111111111111', '2019-05-08 17:09:10'),
(8, '201905095cd3f2bd3df731557394109', 11, '1', '0', 20.00, 'testA36', '13535346332', '11111111111111111111111111111111111111', '2019-05-09 09:28:29'),
(10, '201905115cd6884187a571557563457', 11, '0', '1', 10.00, '志杰', '13535346332', '11111111111111111111111111111111111111', '2019-05-11 08:30:57'),
(11, '201905115cd693956cc201557566357', 14, '2', '1', 10000.00, '志杰', '13535346332', '11111111111111111111111111111111111111', '2019-05-11 09:19:17'),
(12, '201906075cfa5236c9c8b1559908918', 2, '2', '1', 10.00, '志杰', '13535346332', '11111111111111111111111111111111111111', '2019-06-07 12:01:58');

-- --------------------------------------------------------

--
-- 表的结构 `order_infos`
--

DROP TABLE IF EXISTS `order_infos`;
CREATE TABLE IF NOT EXISTS `order_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oid` varchar(60) COLLATE utf8mb4_bin NOT NULL COMMENT '订单id',
  `gid` int(11) NOT NULL COMMENT '商品id',
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '商品名称',
  `price` float(8,2) NOT NULL COMMENT '商品单价',
  `num` int(11) NOT NULL COMMENT '购买数量',
  `total` float(8,2) NOT NULL COMMENT '商品小计',
  `addtime` timestamp NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `order_infos`
--

INSERT INTO `order_infos` (`id`, `oid`, `gid`, `name`, `price`, `num`, `total`, `addtime`) VALUES
(6, '201905095cd30d3613bd31557335350', 2, '毕文锐', 10.00, 3, 30.00, '2019-05-08 17:09:10'),
(7, '201905095cd30d3613bd31557335350', 3, 'wzblog', 10000.00, 1, 10000.00, '2019-05-08 17:09:10'),
(8, '201905095cd3f2bd3df731557394109', 2, '毕文锐', 10.00, 2, 20.00, '2019-05-09 09:28:29'),
(9, '201905115cd6730de7bae1557558029', 4, '陈光星', 10000.00, 1, 10000.00, '2019-05-11 07:00:29'),
(10, '201905115cd6884187a571557563457', 2, '毕文锐', 10.00, 1, 10.00, '2019-05-11 08:30:57'),
(11, '201905115cd693956cc201557566357', 4, '陈光星', 10000.00, 1, 10000.00, '2019-05-11 09:19:17'),
(12, '201906075cfa5236c9c8b1559908918', 2, '毕文锐', 10.00, 1, 10.00, '2019-06-07 12:01:58');

-- --------------------------------------------------------

--
-- 表的结构 `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '分类名称',
  `pid` int(11) NOT NULL COMMENT '父级id',
  `path` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '路径',
  `display` enum('0','1') COLLATE utf8mb4_bin NOT NULL DEFAULT '0' COMMENT '是否显示分类; 0=不显示; 1=显示;',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `types`
--

INSERT INTO `types` (`id`, `name`, `pid`, `path`, `display`) VALUES
(31, '衣服', 0, '0,', '0'),
(32, '男装', 31, '0,31,', '1'),
(33, '女装', 31, '0,31,', '0'),
(40, '宇宙', 0, '0,', '0'),
(41, '太阳系', 40, '0,40,', '1'),
(44, '电脑', 0, '0,', '1'),
(46, '女装', 31, '0,31,', '1'),
(47, '布吉岛星系', 40, '0,40,', '0');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) COLLATE utf8mb4_bin NOT NULL COMMENT '用户名',
  `password` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '密码',
  `level` enum('0','1','2') COLLATE utf8mb4_bin NOT NULL DEFAULT '0' COMMENT '用户等级',
  `status` enum('0','1') COLLATE utf8mb4_bin NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` timestamp NOT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `status`, `create_time`) VALUES
(1, '文卓', '$2y$10$5eS2EtQ.qe2b5cC3PhIjIejZLHlzIQeznkTUJtcoyAB7eWOwmYuYq', '1', '1', '2019-04-21 16:00:00'),
(2, '志杰', '$2y$10$5eS2EtQ.qe2b5cC3PhIjIejZLHlzIQeznkTUJtcoyAB7eWOwmYuYq', '1', '1', '2019-04-21 19:08:08'),
(5, 'testA12', '$2y$10$lUNjuMzrTaVAShhplGY9ouR3N41v7HG1d1CY7EmldANEemw95iJkm', '2', '1', '2019-04-24 16:11:50'),
(11, 'testA36', '$2y$10$VtN2L1iF4nWapLaDSM5MCehSCRw5Nfxg9GTE1I.gWT.HLtskmmULW', '1', '1', '2019-04-29 16:14:25'),
(14, '志杰1', '$2y$10$/PxX.Vo.KcOi7XcQw.sFG./xo/DZNqVqBAPNoF0d2wqy0qHtrx982', '0', '1', '2019-05-11 09:16:07');

-- --------------------------------------------------------

--
-- 表的结构 `user_infos`
--

DROP TABLE IF EXISTS `user_infos`;
CREATE TABLE IF NOT EXISTS `user_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `name` varchar(30) COLLATE utf8mb4_bin NOT NULL COMMENT '用户昵称',
  `age` tinyint(4) NOT NULL DEFAULT '0' COMMENT '用户年龄',
  `sex` enum('0','1','2') COLLATE utf8mb4_bin NOT NULL DEFAULT '2' COMMENT '性别: 0=女;1=男;2=保密',
  `phone` char(11) COLLATE utf8mb4_bin NOT NULL COMMENT '手机号',
  `email` varchar(60) COLLATE utf8mb4_bin NOT NULL COMMENT '邮箱',
  `pic` varchar(60) COLLATE utf8mb4_bin NOT NULL COMMENT '用户头像地址',
  `address` varchar(255) COLLATE utf8mb4_bin NOT NULL COMMENT '居住地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `user_infos`
--

INSERT INTO `user_infos` (`id`, `uid`, `name`, `age`, `sex`, `phone`, `email`, `pic`, `address`) VALUES
(3, 2, 'jj', 12, '2', '13319676865', '443663809@qq.com', '20190505191806_131.jpg', '今天11111111111111111111111111111111111111111111111'),
(6, 5, '橙色', 21, '2', '13535292970', '1752983361@qq.com', '20190425235242_993.jpg', 'eeeeeeewqeqweqweqweeeqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqqq'),
(9, 11, '秀尔', 18, '0', '13535292970', '1752983361@qq.com', '20190507214112_696.jpg', '圈圈圈圈群群群群群群群群群群群群群群群群群群群'),
(10, 1, '橙色', 13, '0', '13535292970', '1752983361@qq.com', '20190511171252_861.png', '少时诵诗书所所所所所所所所所所所所所所顶顶顶顶'),
(11, 14, '宇宙2222222222222', 115, '0', '13535292970', '1752983361@qq.com', '20190511171729_194.png', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
