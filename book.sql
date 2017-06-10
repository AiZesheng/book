/*
 Navicat MySQL Data Transfer

 Source Server         : 2016
 Source Server Version : 50718
 Source Host           : localhost
 Source Database       : book

 Target Server Version : 50718
 File Encoding         : utf-8

 Date: 06/10/2017 22:48:43 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `manager_book`
-- ----------------------------
DROP TABLE IF EXISTS `manager_book`;
CREATE TABLE `manager_book` (
  `manager_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '操作时间'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `t_book`
-- ----------------------------
DROP TABLE IF EXISTS `t_book`;
CREATE TABLE `t_book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图书id',
  `book_name` varchar(30) NOT NULL COMMENT '书籍名称',
  `book_price` varchar(10) NOT NULL COMMENT '图书价格',
  `book_img` varchar(50) NOT NULL COMMENT '书籍图片',
  `book_stock` int(11) NOT NULL COMMENT '库存',
  `book_sales` int(11) NOT NULL COMMENT '月销量',
  `book_type` varchar(10) NOT NULL COMMENT '书籍类别',
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_book`
-- ----------------------------
BEGIN;
INSERT INTO `t_book` VALUES ('1', '2016考研英语历年真题全解:提高版(2006-2015)/', '23.40', 'http://localhost/book_php/img/01.jpg', '400', '20', '外语'), ('2', '2017考研政治 大纲解析考点精编', '30.20', 'http://localhost/book_php/img/02.jpg', '200', '31', '文学'), ('3', '越努力,越幸运:世界顶级学府的精英培养课 - 苏晓夏【167', '32.30', 'http://localhost/book_php/img/03.jpg', '193', '45', '小说'), ('4', '现货正版 黄仁宇作品系列/中国大历史+万历十五年（共2册）黄', '36.80', 'http://localhost/book_php/img/04.jpg', '299', '50', '历史'), ('5', '唐诗三百首完整版300首 注音版幼儿早教国学启蒙 少儿童文学', '14.80', 'http://localhost/book_php/img/05.jpg', '234', '20', '少儿'), ('6', '现货【赠送马云寄语笔记本】正版 马云 未来已来 马云书籍畅销', '27.00', 'http://localhost/book_php/img/06.jpg', '345', '34', '经济管理');
COMMIT;

-- ----------------------------
--  Table structure for `t_manager`
-- ----------------------------
DROP TABLE IF EXISTS `t_manager`;
CREATE TABLE `t_manager` (
  `manager_id` int(11) NOT NULL COMMENT '管理员id',
  `manager_username` varchar(20) NOT NULL COMMENT '管理员用户名',
  `manager_password` varchar(20) NOT NULL COMMENT '管理员密码',
  PRIMARY KEY (`manager_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_manager`
-- ----------------------------
BEGIN;
INSERT INTO `t_manager` VALUES ('1', 'admin', 'admin');
COMMIT;

-- ----------------------------
--  Table structure for `t_order`
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单',
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '购买时间',
  `book_num` int(4) NOT NULL COMMENT '购买数量',
  `order_total_price` float NOT NULL COMMENT '总价',
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=123459 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_order`
-- ----------------------------
BEGIN;
INSERT INTO `t_order` VALUES ('123456', '2017-05-30 00:22:39', '4', '30', '3', '1'), ('123457', '2017-06-10 17:23:51', '1', '36.8', '1', '4'), ('123458', '2017-06-10 22:37:07', '3', '36', '1', '9');
COMMIT;

-- ----------------------------
--  Table structure for `t_shoppingcar`
-- ----------------------------
DROP TABLE IF EXISTS `t_shoppingcar`;
CREATE TABLE `t_shoppingcar` (
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_shoppingcar`
-- ----------------------------
BEGIN;
INSERT INTO `t_shoppingcar` VALUES ('3', '1'), ('3', '2'), ('3', '3'), ('1', '4'), ('1', '3'), ('1', '5'), ('1', '9');
COMMIT;

-- ----------------------------
--  Table structure for `t_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(20) NOT NULL COMMENT '用户名',
  `password` varchar(20) NOT NULL COMMENT '密码',
  `nickname` varchar(20) NOT NULL COMMENT '昵称',
  `address` varchar(50) NOT NULL COMMENT '地址',
  `VIP_level` varchar(10) NOT NULL DEFAULT 'VIP1' COMMENT '会员等级',
  `gender` varchar(10) NOT NULL DEFAULT '男' COMMENT '性别',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `t_user`
-- ----------------------------
BEGIN;
INSERT INTO `t_user` VALUES ('1', '20145946', '20145946', 'node', '', 'VIP1', '男'), ('2', '20140001', '20140001', '哈哈', '', 'VIP1', '女'), ('3', 'a', 'a', 'user2', '', 'VIP1', '女'), ('13', 'aaaaa', 'aaaaa', 'user1', '', 'VIP1', '女');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
