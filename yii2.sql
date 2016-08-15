/*
SQLyog Professional v12.09 (64 bit)
MySQL - 5.6.17 : Database - yii2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`yii2` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `yii2`;

/*Table structure for table `account` */

DROP TABLE IF EXISTS `account`;

CREATE TABLE `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(32) NOT NULL COMMENT '用户名',
  `auth_key` varchar(32) DEFAULT NULL COMMENT 'key',
  `password_hash` varchar(255) NOT NULL COMMENT '用户密码',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '重置密码token',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `status` smallint(6) NOT NULL DEFAULT '1' COMMENT '状态',
  `created` int(11) NOT NULL COMMENT '创建时间',
  `updated` int(11) NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `account` */

insert  into `account`(`id`,`username`,`auth_key`,`password_hash`,`password_reset_token`,`email`,`status`,`created`,`updated`) values (2,'admin','fbea2a16dc275697a7e85ddded018dcf','fbea2a16dc275697a7e85ddded018dcf','fbea2a16dc275697a7e85ddded018dcf','yexiao2015@gmial.com',1,1470907295,1471230592),(3,'kevin',NULL,'95aaddeabd2c33b23a33abfa96ea2dbb',NULL,'kevin@gmail.com',1,1471227894,1471230948),(4,'michael',NULL,'b7b53ee6f95f848a9a814bd2db399e16',NULL,'michael@gmial.com',1,1471228163,1471230504);

/*Table structure for table `auth_assignment` */

DROP TABLE IF EXISTS `auth_assignment`;

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_assignment` */

insert  into `auth_assignment`(`item_name`,`user_id`,`created_at`) values ('super','2',1470907831);

/*Table structure for table `auth_item` */

DROP TABLE IF EXISTS `auth_item`;

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item` */

insert  into `auth_item`(`name`,`type`,`description`,`rule_name`,`data`,`created_at`,`updated_at`) values ('/super/*',2,NULL,NULL,NULL,1470729571,1470729571),('/super/account/*',2,NULL,NULL,NULL,1470970220,1470970220),('/super/account/create',2,NULL,NULL,NULL,1470970219,1470970219),('/super/account/delete',2,NULL,NULL,NULL,1470970220,1470970220),('/super/account/error',2,NULL,NULL,NULL,1470970220,1470970220),('/super/account/index',2,NULL,NULL,NULL,1470970219,1470970219),('/super/account/success',2,NULL,NULL,NULL,1470970220,1470970220),('/super/account/update',2,NULL,NULL,NULL,1470970219,1470970219),('/super/account/view',2,NULL,NULL,NULL,1470970219,1470970219),('/super/admin/*',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/assignment/*',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/assignment/assign',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/assignment/index',2,NULL,NULL,NULL,1470729569,1470729569),('/super/admin/assignment/revoke',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/assignment/view',2,NULL,NULL,NULL,1470729569,1470729569),('/super/admin/default/*',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/default/index',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/menu/*',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/menu/create',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/menu/delete',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/menu/index',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/menu/update',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/menu/view',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/permission/*',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/permission/assign',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/permission/create',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/permission/delete',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/permission/index',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/permission/remove',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/permission/update',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/permission/view',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/role/*',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/role/assign',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/role/create',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/role/delete',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/role/index',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/role/remove',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/role/update',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/role/view',2,NULL,NULL,NULL,1470729570,1470729570),('/super/admin/route/*',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/route/assign',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/route/create',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/route/index',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/route/refresh',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/route/remove',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/rule/*',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/rule/create',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/rule/delete',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/rule/index',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/rule/update',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/rule/view',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/*',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/activate',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/change-password',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/delete',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/index',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/login',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/logout',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/request-password-reset',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/reset-password',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/signup',2,NULL,NULL,NULL,1470729571,1470729571),('/super/admin/user/view',2,NULL,NULL,NULL,1470729571,1470729571),('/super/default/*',2,NULL,NULL,NULL,1470729571,1470729571),('/super/default/error',2,NULL,NULL,NULL,1470971084,1470971084),('/super/default/index',2,NULL,NULL,NULL,1470729571,1470729571),('/super/default/success',2,NULL,NULL,NULL,1470971084,1470971084),('/super/super/*',2,NULL,NULL,NULL,1470904617,1470904617),('/super/super/error',2,NULL,NULL,NULL,1470904617,1470904617),('/super/super/success',2,NULL,NULL,NULL,1470906677,1470906677),('super',1,'超级管理员',NULL,NULL,1470729624,1470729624);

/*Table structure for table `auth_item_child` */

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_item_child` */

insert  into `auth_item_child`(`parent`,`child`) values ('super','/super/*'),('super','/super/account/*'),('super','/super/account/create'),('super','/super/account/delete'),('super','/super/account/error'),('super','/super/account/index'),('super','/super/account/success'),('super','/super/account/update'),('super','/super/account/view'),('super','/super/admin/*'),('super','/super/admin/assignment/*'),('super','/super/admin/assignment/assign'),('super','/super/admin/assignment/index'),('super','/super/admin/assignment/revoke'),('super','/super/admin/assignment/view'),('super','/super/admin/default/*'),('super','/super/admin/default/index'),('super','/super/admin/menu/*'),('super','/super/admin/menu/create'),('super','/super/admin/menu/delete'),('super','/super/admin/menu/index'),('super','/super/admin/menu/update'),('super','/super/admin/menu/view'),('super','/super/admin/permission/*'),('super','/super/admin/permission/assign'),('super','/super/admin/permission/create'),('super','/super/admin/permission/delete'),('super','/super/admin/permission/index'),('super','/super/admin/permission/remove'),('super','/super/admin/permission/update'),('super','/super/admin/permission/view'),('super','/super/admin/role/*'),('super','/super/admin/role/assign'),('super','/super/admin/role/create'),('super','/super/admin/role/delete'),('super','/super/admin/role/index'),('super','/super/admin/role/remove'),('super','/super/admin/role/update'),('super','/super/admin/role/view'),('super','/super/admin/route/*'),('super','/super/admin/route/assign'),('super','/super/admin/route/create'),('super','/super/admin/route/index'),('super','/super/admin/route/refresh'),('super','/super/admin/route/remove'),('super','/super/admin/rule/*'),('super','/super/admin/rule/create'),('super','/super/admin/rule/delete'),('super','/super/admin/rule/index'),('super','/super/admin/rule/update'),('super','/super/admin/rule/view'),('super','/super/admin/user/*'),('super','/super/admin/user/activate'),('super','/super/admin/user/change-password'),('super','/super/admin/user/delete'),('super','/super/admin/user/index'),('super','/super/admin/user/login'),('super','/super/admin/user/logout'),('super','/super/admin/user/request-password-reset'),('super','/super/admin/user/reset-password'),('super','/super/admin/user/signup'),('super','/super/admin/user/view'),('super','/super/default/*'),('super','/super/default/error'),('super','/super/default/index'),('super','/super/default/success'),('super','/super/super/*'),('super','/super/super/error'),('super','/super/super/success');

/*Table structure for table `auth_rule` */

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `auth_rule` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `menu` */

insert  into `menu`(`id`,`name`,`parent`,`route`,`order`,`data`) values (1,'超级管理中心',NULL,NULL,1,'超级管理员使用'),(2,'运营中心',NULL,NULL,2,'运营管理人员使用'),(3,'管理后台',NULL,NULL,3,'保留数据'),(4,'开发后台',NULL,NULL,4,'保留数据'),(5,'权限管理',1,NULL,1,'<a href=\"{url}\"><i class=\"fa fa-lock fa-fw\"></i><span class=\"menu-title\">{label}</span><span class=\"fa arrow\"></span></a>'),(6,'权限分配',5,'/super/admin/assignment/index',2,'<a href=\"{url}\"><i class=\"fa fa-unlock\"></i><span class=\"submenu-title\">{label}</span></a>'),(7,'角色管理',5,'/super/admin/role/index',3,'<a href=\"{url}\"><i class=\"fa fa-user-md\"></i><span class=\"submenu-title\">{label}</span></a>'),(8,'路由管理',5,'/super/admin/route/index',4,'<a href=\"{url}\"><i class=\"fa fa-fighter-jet\"></i><span class=\"submenu-title\">{label}</span></a>'),(9,'菜单管理',5,'/super/admin/menu/index',5,'<a href=\"{url}\"><i class=\"fa fa-bars\"></i><span class=\"submenu-title\">{label}</span></a>'),(10,'账户管理',5,'/super/account/index',6,'<a href=\"{url}\"><i class=\"fa fa-user\"></i><span class=\"submenu-title\">{label}</span></a>'),(11,'订单管理',5,NULL,7,'<a href=\"{url}\"><i class=\"fa fa-user\"></i><span class=\"submenu-title\">{label}</span></a>');

/*Table structure for table `migration` */

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `migration` */

insert  into `migration`(`version`,`apply_time`) values ('m000000_000000_base',1470726150),('m140506_102106_rbac_init',1470726184),('m140602_111327_create_menu_table',1470726157),('m160312_050000_create_user',1470726158);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
