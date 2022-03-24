/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MariaDB
 Source Server Version : 100316
 Source Host           : 192.168.64.2:3306
 Source Schema         : shopdb

 Target Server Type    : MariaDB
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 13/03/2022 10:59:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of admin
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES (1, 'admin', 'ca94fefd1e34ead58feb6cc68b5a264e', 'admin');
COMMIT;

-- ----------------------------
-- Table structure for brands
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `cat_status` int(11) DEFAULT 1,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of brands
-- ----------------------------
BEGIN;
INSERT INTO `brands` VALUES (1, 'Prada', '03.png', 1);
INSERT INTO `brands` VALUES (2, 'Armani', '01.png', 1);
INSERT INTO `brands` VALUES (3, 'Hermes', '02.png', 1);
INSERT INTO `brands` VALUES (4, 'Zarra', '04.png', 1);
INSERT INTO `brands` VALUES (10, 'test', '5b430038-1bf9-4e13-b0b7-5311bd560ce3.jpg', 1);
COMMIT;

-- ----------------------------
-- Table structure for color_options
-- ----------------------------
DROP TABLE IF EXISTS `color_options`;
CREATE TABLE `color_options` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name_geo` varchar(255) DEFAULT NULL,
  `color_name_eng` varchar(255) DEFAULT NULL,
  `color_name_rus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`color_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of color_options
-- ----------------------------
BEGIN;
INSERT INTO `color_options` VALUES (1, 'ლურჯი', 'BLUE', 'синий');
INSERT INTO `color_options` VALUES (2, 'წითელი', 'RED', 'красный');
INSERT INTO `color_options` VALUES (5, 'მწვანე', 'GREEN', 'зеленый');
INSERT INTO `color_options` VALUES (6, 'ყვითელი', 'YELOW', 'желтый');
COMMIT;

-- ----------------------------
-- Table structure for combo_list
-- ----------------------------
DROP TABLE IF EXISTS `combo_list`;
CREATE TABLE `combo_list` (
  `combo_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `combo_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`combo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of combo_list
-- ----------------------------
BEGIN;
INSERT INTO `combo_list` VALUES (3, 87, '1ad331bc-355a-43cb-ae9d-dea633ffd645');
INSERT INTO `combo_list` VALUES (8, 92, '1ad331bc-355a-43cb-ae9d-dea633ffd645');
INSERT INTO `combo_list` VALUES (9, 93, '1ad331bc-355a-43cb-ae9d-dea633ffd645');
INSERT INTO `combo_list` VALUES (10, 94, '1ad331bc-355a-43cb-ae9d-dea633ffd645');
COMMIT;

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `fb` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of contact
-- ----------------------------
BEGIN;
INSERT INTO `contact` VALUES (1, 'Tbilisi, Rustavelis 42', '+995 577 211 625', 'contact@dressio.ge', 'http://fb.com/dreesio.ge', 'https://twitter.com/dressio.ge', 'https://www.instagram.com/dressio.ge/', 'https://youtube.com/dressio.ge');
COMMIT;

-- ----------------------------
-- Table structure for cupons
-- ----------------------------
DROP TABLE IF EXISTS `cupons`;
CREATE TABLE `cupons` (
  `cupon_id` int(11) NOT NULL AUTO_INCREMENT,
  `cupon_code` varchar(255) DEFAULT NULL,
  `cupon_amount` float DEFAULT NULL,
  PRIMARY KEY (`cupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cupons
-- ----------------------------
BEGIN;
INSERT INTO `cupons` VALUES (1, 'zxccxz', 30);
COMMIT;

-- ----------------------------
-- Table structure for header
-- ----------------------------
DROP TABLE IF EXISTS `header`;
CREATE TABLE `header` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header_photo` varchar(255) DEFAULT NULL,
  `header_text_geo` text DEFAULT NULL,
  `header_text_eng` text DEFAULT NULL,
  `header_text_rus` text DEFAULT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of header
-- ----------------------------
BEGIN;
INSERT INTO `header` VALUES (1, 'main.jpg', '<h1><span>სათევზაო </span> აღჭურვილობა</h1>\r\n            <em>შეუკვეთეთ ონლაინ</em>', NULL, NULL, 'logo-shop-red.png');
COMMIT;

-- ----------------------------
-- Table structure for info
-- ----------------------------
DROP TABLE IF EXISTS `info`;
CREATE TABLE `info` (
  `info_id` int(11) NOT NULL AUTO_INCREMENT,
  `info_cat_id` int(11) DEFAULT NULL,
  `info_name_geo` varchar(255) DEFAULT NULL,
  `info_name_eng` varchar(255) DEFAULT NULL,
  `info_name_rus` varchar(255) DEFAULT NULL,
  `info_desc_geo` text DEFAULT NULL,
  `info_desc_eng` text DEFAULT NULL,
  `info_desc_rus` text DEFAULT NULL,
  `info_full_geo` text DEFAULT NULL,
  `info_full_eng` text DEFAULT NULL,
  `info_full_rus` text DEFAULT NULL,
  `info_date` datetime DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`info_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of info
-- ----------------------------
BEGIN;
INSERT INTO `info` VALUES (1, 2, 'How we use your information', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. </p>\r\n', NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. </p>\r\n', NULL, NULL, '2018-07-26 13:58:00', NULL);
COMMIT;

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `trans_id` int(11) DEFAULT NULL,
  `html_code` text DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`invoice_id`) USING BTREE,
  UNIQUE KEY `trans_id` (`trans_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of invoices
-- ----------------------------
BEGIN;
INSERT INTO `invoices` VALUES (1, 1, NULL, '<p>empty invoice</p>', 10, '0', '2022-02-15 23:31:49');
INSERT INTO `invoices` VALUES (2, 2, NULL, '<p>empty invoice</p>', NULL, NULL, NULL);
INSERT INTO `invoices` VALUES (3, 3, NULL, '<p>empty invoice</p>', NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `user_status` int(11) DEFAULT 1,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE KEY `email` (`email`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of members
-- ----------------------------
BEGIN;
INSERT INTO `members` VALUES (1, 'archil.odishelidze@gmail.com', 'ca94fefd1e34ead58feb6cc68b5a264e', 'Archil', 'Odishelidze', '577211625', 1);
INSERT INTO `members` VALUES (8, 'odishelidze.achi@gmail.com', 'f5d1278e8109edd94e1e4197e04873b9', 'Archilai', 'Odishelaize', '+995577211625', 1);
INSERT INTO `members` VALUES (11, 'mamukia@gmail.com', 'f5d1278e8109edd94e1e4197e04873b9', 'mamuka', 'quteiseli', '577234432', 0);
COMMIT;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `variation_id` int(11) DEFAULT NULL,
  `product_name_geo` varchar(255) DEFAULT NULL,
  `product_name_eng` varchar(255) DEFAULT NULL,
  `product_name_rus` varchar(255) DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_sale` float DEFAULT NULL,
  `shipping_company_id` int(11) DEFAULT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `cupon_code` varchar(255) DEFAULT NULL,
  `tracking_code` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `color_name_geo` varchar(255) DEFAULT NULL,
  `color_name_eng` varchar(255) DEFAULT NULL,
  `color_name_rus` varchar(255) DEFAULT NULL,
  `size_name` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `payment_hash` varchar(255) DEFAULT NULL,
  `payment_status` int(11) DEFAULT 0,
  PRIMARY KEY (`order_id`) USING BTREE,
  KEY `order_code` (`order_code`,`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of orders
-- ----------------------------
BEGIN;
INSERT INTO `orders` VALUES (10, 1, 86, 16, 'ჯინსი', 'jeans', 'джинсы', 507, 12, 123123, 'fdfaa511-36ca-48dc-a0ac-abb269b0825d', 1, '123321', 'abc123zxc', '2022-02-28 19:03:47', 'ლურჯი', 'BLUE', 'синий', 'XL', 1, 'product-1.jpg', NULL, 0);
INSERT INTO `orders` VALUES (11, 1, 86, 19, 'ჯინსი', 'jeans', 'джинсы', 507, 12, 123123, 'fdfaa511-36ca-48dc-a0ac-abb269b0825d', 1, '123321', 'abc123zxc', '2022-02-28 19:03:47', 'წითელი', 'RED', 'красный', 'M', 1, 'product-1.jpg', NULL, 0);
INSERT INTO `orders` VALUES (12, 1, 86, 16, 'ჯინსი', 'jeans', 'джинсы', 507, 12, 123123, 'b9ff7c61-6398-4371-aea8-63d4fbec4cbe', 1, '123321', 'abc123zxc', '2022-03-05 17:57:41', 'ლურჯი', 'BLUE', 'синий', 'XL', 1, 'product-1.jpg', NULL, 0);
INSERT INTO `orders` VALUES (13, 1, 86, 16, 'ჯინსი', 'jeans', 'джинсы', 507, 12, 123123, '3f63386d-c6b0-4a75-9ff0-1801e0f1d8ac', 1, '123321', 'abc123zxc', '2022-03-05 18:00:51', 'ლურჯი', 'BLUE', 'синий', 'XL', 1, 'product-1.jpg', NULL, 0);
INSERT INTO `orders` VALUES (16, 1, 86, 16, 'ჯინსი', 'jeans', 'джинсы', 507, 12, 123123, '273bc967-5405-44c8-99be-65d1e1765f2f', 1, '123321', 'abc123zxc', '2022-03-10 12:36:39', 'ლურჯი', 'BLUE', 'синий', 'XL', 1, 'product-1.jpg', '8999e6bc35e21f89d9e7c5a1fea4a896203f4275', 0);
COMMIT;

-- ----------------------------
-- Table structure for payments
-- ----------------------------
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `pay_order_id` varchar(255) DEFAULT NULL,
  `payment_hash` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `payment_date` datetime DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of payments
-- ----------------------------
BEGIN;
INSERT INTO `payments` VALUES (1, '7d7c5ede3d0d33b736b0f69a5368b3c451159c5e', '443aa290e60652dfc718c88b809daca09e43a488', 1, 250, 0, '2022-03-05 17:36:50');
INSERT INTO `payments` VALUES (2, '7d64340539b99660d2d9b9edaec76b46d3ae8d76', '1e09800791f9e235ab111c5c996239ba81b2f748', 1, 250, 0, '2022-03-05 17:38:20');
INSERT INTO `payments` VALUES (3, '038ce24c814781caa85da14501ed9b15c661b5e1', 'ad738d4d35facca7597b013f6b0bf972dd0f7c46', 1, 250, 0, '2022-03-05 17:57:41');
INSERT INTO `payments` VALUES (4, '38857f75448a254274fab3af5b788244b4af0f5d', '0568868e9dce60b87b1b6d7eefa64c12bf4cd7fd', 1, 250, 0, '2022-03-05 18:00:51');
INSERT INTO `payments` VALUES (5, '7989e245c83aa71c9c5544f509d1cbf74d4025ea', '7b030803ac66ca0bef5bf405d6faede73d518cce', 1, 250, 0, '2022-03-05 18:02:44');
INSERT INTO `payments` VALUES (6, '6e5d0ac96661edc1ac8aa2b21a542656272da5b8', '437b20d6fda585b7df7a9c30bd0718aa516a26cd', 1, 250, 0, '2022-03-05 18:18:31');
INSERT INTO `payments` VALUES (7, 'fea2179fce5f74608fb4f7035245c00ebea08359', '00117717e772577f5f9e7dab00d7780b0497b4ca', 1, 250, 0, '2022-03-05 20:11:54');
INSERT INTO `payments` VALUES (8, '3dd29aab6851ec254d0f7aa815c5acaf4d405156', 'f90c77289e25619d139e891109d6982be91e5de6', 1, 250, 0, '2022-03-06 20:39:15');
INSERT INTO `payments` VALUES (9, '87c27930832548f31d76b83ee3927dca859364ab', 'bfb969c54e2a569c98887fb6bf9406cfc33a13ab', 1, 250, 0, '2022-03-07 10:56:30');
INSERT INTO `payments` VALUES (10, '3037ab09866e7ea2101303c74f51015c837c595e', 'a97713e2b7c4fb6871bc03ccbd8b9c862f843c36', 1, 250, 0, '2022-03-07 13:02:42');
INSERT INTO `payments` VALUES (11, '3859343089e9348f31548ef31b838e1cc2e14bcf', '983808844593cac042189aa5fe7bde0bac714ebf', 1, 250, 0, '2022-03-09 22:47:42');
INSERT INTO `payments` VALUES (12, 'ea9fd64d00e06db1f32059be81d8aabb62c07687', '983808844593cac042189aa5fe7bde0bac714ebf', 1, 250, 0, '2022-03-09 22:47:42');
INSERT INTO `payments` VALUES (13, 'f7550927b573c863c1de554feef1f0e096859907', 'a1ef93c0f6409605209cbeca7a0f205aef3b5bb9', 1, 250, 0, '2022-03-09 22:54:47');
INSERT INTO `payments` VALUES (14, '3de5cbca03101f147a3cc54eab5506ec8e69579c', '2b22baa833ed2c8ef68656f7d113afcdfe265b89', 1, 250, 0, '2022-03-09 22:56:19');
INSERT INTO `payments` VALUES (15, 'ff5903c48b12fed827602b3370dfe7b18115e279', '766592a024fb36f6fbfabcaea6d9b348ecd950f7', 1, 250, 0, '2022-03-09 22:58:28');
INSERT INTO `payments` VALUES (16, '11f78cbd2ffd4b242016a6c731985c85637a6181', '766592a024fb36f6fbfabcaea6d9b348ecd950f7', 1, 250, 0, '2022-03-09 22:58:28');
INSERT INTO `payments` VALUES (17, 'd1a350910cb47f240bc61e8811f7f4cee0e70ecf', '7a3e51a0980f572d24d938f2e9d82bf01c98fc83', 1, 495, 0, '2022-03-10 12:34:50');
INSERT INTO `payments` VALUES (18, 'b0efc931f3a8ac02b66fe250ff0c7da60cedd960', '8c8ebaea58aad82bc2d25c1611d4963e2303d939', 1, 495, 0, '2022-03-10 12:35:59');
INSERT INTO `payments` VALUES (19, '03b834d2ad5582828cdf864ce8d8cc5e8254f3f0', '8999e6bc35e21f89d9e7c5a1fea4a896203f4275', 1, 495, 0, '2022-03-10 12:36:39');
COMMIT;

-- ----------------------------
-- Table structure for post_cat
-- ----------------------------
DROP TABLE IF EXISTS `post_cat`;
CREATE TABLE `post_cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name_geo` varchar(255) DEFAULT NULL,
  `cat_name_eng` varchar(255) DEFAULT NULL,
  `cat_name_rus` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of post_cat
-- ----------------------------
BEGIN;
INSERT INTO `post_cat` VALUES (1, 'მთავარი', 'Home', 'Main');
INSERT INTO `post_cat` VALUES (2, 'ჩვენს შესახებ', 'About us', 'About US');
COMMIT;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `title_geo` varchar(255) DEFAULT NULL,
  `title_rus` varchar(255) DEFAULT NULL,
  `title_eng` varchar(255) DEFAULT NULL,
  `description_geo` text DEFAULT NULL,
  `description_rus` varchar(255) DEFAULT NULL,
  `description_eng` varchar(255) DEFAULT NULL,
  `details_geo` text DEFAULT NULL,
  `details_rus` text DEFAULT NULL,
  `details_eng` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `post_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of posts
-- ----------------------------
BEGIN;
INSERT INTO `posts` VALUES (1, 1, 'Heading 1', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-1.jpg', NULL);
INSERT INTO `posts` VALUES (2, 1, 'Heading 2', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (3, 1, 'Heading 3', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-3.jpg', NULL);
INSERT INTO `posts` VALUES (5, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (6, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (7, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (8, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (9, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (10, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (11, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (12, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (13, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (14, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (15, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (16, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (17, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (18, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (19, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (20, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (21, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (22, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (23, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (24, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (25, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (26, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (27, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (28, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (29, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (30, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (31, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (32, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (33, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (34, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (35, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (36, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (37, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (38, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (39, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (40, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (41, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (42, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (43, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (44, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (45, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (46, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (47, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (48, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (49, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (50, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (51, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (52, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (53, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (54, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (55, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (56, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (57, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (58, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (59, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (60, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (61, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (62, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (63, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (64, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (65, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (66, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (67, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (68, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (69, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (70, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (71, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-1.jpg', NULL);
INSERT INTO `posts` VALUES (72, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (73, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (74, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-2.jpg', NULL);
INSERT INTO `posts` VALUES (75, 1, 'Heading 4', NULL, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt', NULL, NULL, 'Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. ', NULL, NULL, 'blog-1.jpg', NULL);
INSERT INTO `posts` VALUES (79, 2, 'test geo 123', 'test rus 123', 'test eng 123', '<p>სად დ ასდ სად სად ასდსა ასდ და სად სადს სადადს ადს ადს&nbsp;<br />\r\nდს ფფსდ სდფფსდ სდფსდფ&nbsp; ფსდფდსდფს</p>\r\n', '<p>lorem ipsum asd asd ads dsad sad asds adsa dsadas<br />\r\nsdf df sfdsfds fds gf hfghhjghjkjk sfd sdfdfs fds&nbsp; sfd</p>\r\n', '<p>lorem ipsum asd asd ads dsad sad asds adsa dsadas<br />\r\nsdf df sfdsfds fds gf hfghhjghjkjk sfd sdfdfs fds&nbsp; sfd</p>\r\n', '<p>სად დ ასდ სად სად ასდსა ასდ და სად სადს სადადს ადს ადს&nbsp;<br />\r\nდს ფფსდ სდფფსდ სდფსდფ&nbsp; ფსდფდსდფს<br />\r\nსად დ ასდ სად სად ასდსა ასდ და სად სადს სადადს ადს ადს&nbsp;<br />\r\nდს ფფსდ სდფფსდ სდფსდფ&nbsp; ფსდფდსდფს</p>\r\n\r\n<p>სად დ ასდ სად სად ასდსა ასდ და სად სადს სადადს ადს ადს&nbsp;<br />\r\nდს ფფსდ სდფფსდ სდფსდფ&nbsp; ფსდფდსდფს<br />\r\nსად დ ასდ სად სად ასდსა ასდ და სად სადს სადადს ადს ადს&nbsp;<br />\r\nდს ფფსდ სდფფსდ სდფსდფ&nbsp; ფსდფდსდფს</p>\r\n', '<p>lorem ipsum asd asd ads dsad sad asds adsa dsadas<br />\r\nsdf df sfdsfds fds gf hfghhjghjkjk sfd sdfdfs fds&nbsp; sfd<br />\r\nlorem ipsum asd asd ads dsad sad asds adsa dsadas<br />\r\n​​​​​​​sdf df sfdsfds fds gf hfghhjghjkjk sfd sdfdfs fds&nbsp; sfd</p>\r\n\r\n<p>lorem ipsum asd asd ads dsad sad asds adsa dsadas<br />\r\n​​​​​​​sdf df sfdsfds fds gf hfghhjghjkjk sfd sdfdfs fds&nbsp; sfd<br />\r\n​​​​​​​</p>\r\n', '<p>lorem ipsum asd asd ads dsad sad asds adsa dsadas<br />\r\nsdf df sfdsfds fds gf hfghhjghjkjk sfd sdfdfs fds&nbsp; sfd<br />\r\nlorem ipsum asd asd ads dsad sad asds adsa dsadas<br />\r\n​​​​​​​sdf df sfdsfds fds gf hfghhjghjkjk sfd sdfdfs fds&nbsp; sfd</p>\r\n\r\n<p>lorem ipsum asd asd ads dsad sad asds adsa dsadas<br />\r\n​​​​​​​sdf df sfdsfds fds gf hfghhjghjkjk sfd sdfdfs fds&nbsp; sfd<br />\r\nlorem ipsum asd asd ads dsad sad asds adsa dsadas<br />\r\n​​​​​​​sdf df sfdsfds fds gf hfghhjghjkjk sfd sdfdfs fds&nbsp; sfd</p>\r\n', 'e35a366a-980a-45a0-86fb-1825a43e93a9.jpg', '2022-03-02 14:21:20');
COMMIT;

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name_geo` varchar(255) DEFAULT NULL,
  `product_name_eng` varchar(255) DEFAULT NULL,
  `product_name_rus` varchar(255) DEFAULT NULL,
  `product_desc_geo` varchar(255) DEFAULT NULL,
  `product_desc_eng` varchar(255) DEFAULT NULL,
  `product_desc_rus` varchar(255) DEFAULT NULL,
  `product_full_geo` text DEFAULT NULL,
  `product_full_eng` text DEFAULT NULL,
  `product_full_rus` text DEFAULT NULL,
  `product_price` float DEFAULT NULL,
  `product_sale` float DEFAULT 0,
  `shipping_cost` float DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `views` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `product_status` int(11) DEFAULT 1,
  PRIMARY KEY (`product_id`) USING BTREE,
  KEY `product_id` (`product_id`,`cat_id`,`product_name_geo`,`product_name_eng`,`product_name_rus`,`product_price`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of product
-- ----------------------------
BEGIN;
INSERT INTO `product` VALUES (86, 11, 1, 'ჯინსი', 'jeans', 'джинсы', '<p>geo test ,1c ,2 ,3</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', '<p>test full, geo</p>\r\n', '<p>test full eng</p>\r\n', '<p>test full rus</p>\r\n', 507, 12, NULL, 1.5, 0, 1, 1);
INSERT INTO `product` VALUES (87, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 300, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (88, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 0);
INSERT INTO `product` VALUES (89, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (90, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (91, 11, 2, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (92, 11, 2, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (93, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (94, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (95, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (96, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', '', '', '', 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (97, 7, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (98, 5, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (99, 5, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (100, 6, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (101, 5, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (102, 4, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (103, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (104, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (105, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (106, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (107, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (108, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (109, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (110, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (111, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (112, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (113, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (114, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (115, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (116, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (117, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (118, 11, 1, 'ჯინსი', 'jeans', 'jeans', '<p>geo test</p>\r\n', '<p>eng test</p>\r\n', '<p>rus test</p>\r\n', NULL, NULL, NULL, 507, 5, NULL, NULL, 0, 1, 1);
INSERT INTO `product` VALUES (120, 11, 2, 'ვავალი', 'sharvali', 'джинсы', '<p>სადასდასდ ასდ ასდ ასად სდა ადსსადდას დასადსადს&nbsp;</p>\r\n', '<p>asdasd sad asd asdd asd as adsdas d asds adsa d asads&nbsp;</p>\r\n', '<p>asdasd sad asd asdd asd as adsdas d asds adsa d asads&nbsp;</p>\r\n', '<p>სადასდასდ ასდ ასდ ასად სდა ადსსადდას დასადსადს&nbsp;სადასდასდ ასდ ასდ ასად სდა ადსსადდას დასადსადს&nbsp;<br />\r\nსადასდასდ ასდ ასდ ასად სდა ადსსადდას დასადსადს&nbsp;</p>\r\n', '<p>asdasd sad asd asdd asd as adsdas d asds adsa d asads&nbsp;asdasd sad asd asdd asd as adsdas d asds adsa d asads&nbsp;</p>\r\n', '<p>asdasd sad asd asdd asd as adsdas d asds adsa d asads&nbsp;asdasd sad asd asdd asd as adsdas d asds adsa d asads&nbsp;</p>\r\n', 120, 15, NULL, NULL, 0, 1, 0);
COMMIT;

-- ----------------------------
-- Table structure for product_cat
-- ----------------------------
DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE `product_cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_parent_id` int(11) DEFAULT 0,
  `cat_name_geo` varchar(255) DEFAULT NULL,
  `cat_name_eng` varchar(255) DEFAULT NULL,
  `cat_name_rus` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `cat_status` int(11) DEFAULT 1,
  PRIMARY KEY (`cat_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of product_cat
-- ----------------------------
BEGIN;
INSERT INTO `product_cat` VALUES (1, 0, 'ტოპები', 'TOPS', 'ТОПЫ', 'a08213fb-c98b-4824-8d93-dc43ad2fb1c6.png', 1);
INSERT INTO `product_cat` VALUES (5, 0, 'BOTTOMS', 'BOTTOMS', 'BOTTOMS', '749e0075-1f69-4e49-b2af-4fbaaf9a1004.jpeg', 1);
INSERT INTO `product_cat` VALUES (6, 0, 'SETS', NULL, NULL, 'fetured-item-3.png', 1);
INSERT INTO `product_cat` VALUES (7, 0, 'PAJAMS', NULL, NULL, 'fetured-item-4.png', 1);
INSERT INTO `product_cat` VALUES (8, 0, 'SHOES', NULL, NULL, 'fetured-item-5.png', 1);
INSERT INTO `product_cat` VALUES (9, 0, 'MULTIPCK', NULL, NULL, 'fetured-item-6.png', 1);
INSERT INTO `product_cat` VALUES (11, 1, 'Baby Boy', NULL, NULL, NULL, 0);
INSERT INTO `product_cat` VALUES (24, 1, 'Toddler Girl', '', '', NULL, 1);
INSERT INTO `product_cat` VALUES (25, 1, 'Toddler Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (110, 1, 'Baby Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (111, 1, 'Kid Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (112, 1, 'Kid Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (113, 5, 'Baby Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (114, 5, 'Toddler Girl', '', '', NULL, 1);
INSERT INTO `product_cat` VALUES (115, 5, 'Toddler Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (116, 5, 'Baby Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (117, 5, 'Kid Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (118, 5, 'Kid Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (119, 6, 'Baby Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (120, 6, 'Toddler Girl', '', '', NULL, 1);
INSERT INTO `product_cat` VALUES (121, 6, 'Toddler Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (122, 6, 'Baby Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (123, 6, 'Kid Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (124, 6, 'Kid Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (125, 8, 'Baby Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (126, 8, 'Toddler Girl', '', '', NULL, 1);
INSERT INTO `product_cat` VALUES (127, 8, 'Toddler Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (128, 8, 'Baby Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (129, 8, 'Kid Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (130, 8, 'Kid Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (131, 9, 'Baby Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (132, 9, 'Toddler Girl', '', '', NULL, 1);
INSERT INTO `product_cat` VALUES (133, 9, 'Toddler Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (134, 9, 'Baby Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (135, 9, 'Kid Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (136, 9, 'Kid Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (137, 7, 'Baby Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (138, 7, 'Toddler Girl', '', '', NULL, 1);
INSERT INTO `product_cat` VALUES (139, 7, 'Toddler Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (140, 7, 'Baby Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (141, 7, 'Kid Girl', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (142, 7, 'Kid Boy', NULL, NULL, NULL, 1);
INSERT INTO `product_cat` VALUES (145, 11, 'ჯინსები', 'Jeans', 'jeans', '', 1);
COMMIT;

-- ----------------------------
-- Table structure for product_photos
-- ----------------------------
DROP TABLE IF EXISTS `product_photos`;
CREATE TABLE `product_photos` (
  `photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`photo_id`) USING BTREE,
  KEY `product_id` (`product_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of product_photos
-- ----------------------------
BEGIN;
INSERT INTO `product_photos` VALUES (1, 86, 1, 'product-1.jpg');
INSERT INTO `product_photos` VALUES (54, 87, 1, 'product-2.jpg');
INSERT INTO `product_photos` VALUES (55, 88, NULL, 'product-3.jpg');
INSERT INTO `product_photos` VALUES (56, 89, NULL, 'product-4.jpg');
INSERT INTO `product_photos` VALUES (57, 90, NULL, 'product-5.jpg');
INSERT INTO `product_photos` VALUES (58, 91, NULL, 'product-6.jpg');
INSERT INTO `product_photos` VALUES (59, 92, NULL, 'product-7.jpg');
INSERT INTO `product_photos` VALUES (60, 93, NULL, 'product-8.jpg');
INSERT INTO `product_photos` VALUES (61, 94, NULL, 'product-2.jpg');
INSERT INTO `product_photos` VALUES (62, 95, NULL, 'product-1.jpg');
INSERT INTO `product_photos` VALUES (63, 96, NULL, 'product-4.jpg');
INSERT INTO `product_photos` VALUES (74, 97, NULL, 'product-5.jpg');
INSERT INTO `product_photos` VALUES (75, 98, NULL, 'product-3.jpg');
INSERT INTO `product_photos` VALUES (76, 99, NULL, 'product-7.jpg');
INSERT INTO `product_photos` VALUES (77, 100, NULL, 'product-8.jpg');
INSERT INTO `product_photos` VALUES (78, 86, NULL, 'product-2.jpg');
INSERT INTO `product_photos` VALUES (79, 86, NULL, 'product-3.jpg');
INSERT INTO `product_photos` VALUES (80, 86, NULL, 'product-4.jpg');
INSERT INTO `product_photos` VALUES (81, 86, NULL, 'product-5.jpg');
INSERT INTO `product_photos` VALUES (82, 86, 2, 'product-2.jpg');
INSERT INTO `product_photos` VALUES (83, 86, 3, 'product-3.jpg');
INSERT INTO `product_photos` VALUES (84, 86, 4, 'product-4.jpg');
INSERT INTO `product_photos` VALUES (85, 86, 4, 'product-5.jpg');
INSERT INTO `product_photos` VALUES (86, 86, 4, 'product-6.jpg');
INSERT INTO `product_photos` VALUES (87, 86, 1, 'product-7.jpg');
INSERT INTO `product_photos` VALUES (88, 86, 1, 'product-8.jpg');
INSERT INTO `product_photos` VALUES (89, 86, 1, 'product-3.jpg');
INSERT INTO `product_photos` VALUES (175, 120, 5, '267249709_334079344952296_4922177309081925926_n.1645877107.jpg');
COMMIT;

-- ----------------------------
-- Table structure for shipping_address
-- ----------------------------
DROP TABLE IF EXISTS `shipping_address`;
CREATE TABLE `shipping_address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `post_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`address_id`) USING BTREE,
  KEY `user_id` (`user_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of shipping_address
-- ----------------------------
BEGIN;
INSERT INTO `shipping_address` VALUES (1, 1, 'Tbilisi', 'kipianis 7', '6111', '577211625', 'Archil', 'Odishelidze', 'archil.odishelidze@gmail.com');
COMMIT;

-- ----------------------------
-- Table structure for shipping_company
-- ----------------------------
DROP TABLE IF EXISTS `shipping_company`;
CREATE TABLE `shipping_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shipping_company
-- ----------------------------
BEGIN;
INSERT INTO `shipping_company` VALUES (1, 'DHL', NULL, 5);
COMMIT;

-- ----------------------------
-- Table structure for shopping_cart
-- ----------------------------
DROP TABLE IF EXISTS `shopping_cart`;
CREATE TABLE `shopping_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `data` text DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of shopping_cart
-- ----------------------------
BEGIN;
INSERT INTO `shopping_cart` VALUES (120, 1, '');
COMMIT;

-- ----------------------------
-- Table structure for size_options
-- ----------------------------
DROP TABLE IF EXISTS `size_options`;
CREATE TABLE `size_options` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT,
  `size_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of size_options
-- ----------------------------
BEGIN;
INSERT INTO `size_options` VALUES (1, 'S');
INSERT INTO `size_options` VALUES (2, 'M');
INSERT INTO `size_options` VALUES (4, 'XL');
COMMIT;

-- ----------------------------
-- Table structure for variations
-- ----------------------------
DROP TABLE IF EXISTS `variations`;
CREATE TABLE `variations` (
  `variation_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `sku` int(11) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`variation_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of variations
-- ----------------------------
BEGIN;
INSERT INTO `variations` VALUES (4, 87, 10, 1, 1, 'ABC-abc-4234');
INSERT INTO `variations` VALUES (5, 87, 7, 2, 1, 'ABC-abc-5234');
INSERT INTO `variations` VALUES (6, 87, 5, 2, 4, 'ABC-abc-6234');
INSERT INTO `variations` VALUES (7, 88, 10, 1, 1, 'ABC-abc-7234');
INSERT INTO `variations` VALUES (8, 88, 7, 2, 1, 'ABC-abc-8234');
INSERT INTO `variations` VALUES (9, 88, 5, 2, 4, 'ABC-abc-9234');
INSERT INTO `variations` VALUES (15, 86, 10, 1, 1, 'ABC-abc-1111');
INSERT INTO `variations` VALUES (16, 86, 14, 1, 4, 'ABC-abc-2222');
INSERT INTO `variations` VALUES (18, 86, 17, 5, 4, 'ABC-abc-5555');
INSERT INTO `variations` VALUES (19, 86, 16, 2, 2, 'ABC-abc-6666');
INSERT INTO `variations` VALUES (20, 86, 17, 2, 4, 'ABC-abc-7777');
INSERT INTO `variations` VALUES (21, 119, 10, 2, 1, 'ABC-abc-9099');
INSERT INTO `variations` VALUES (23, 120, 3, 5, 2, 'ABC-zzz1111');
COMMIT;

-- ----------------------------
-- Table structure for wishlist
-- ----------------------------
DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `data` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of wishlist
-- ----------------------------
BEGIN;
INSERT INTO `wishlist` VALUES (1, 1, '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
