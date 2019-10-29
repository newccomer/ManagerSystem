/*
Navicat MySQL Data Transfer

Source Server         : ftest
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : realrbac

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2019-10-29 10:31:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for nc_auth
-- ----------------------------
DROP TABLE IF EXISTS `nc_auth`;
CREATE TABLE `nc_auth` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `a_name` varchar(32) NOT NULL DEFAULT '' COMMENT '权限名',
  `a_pid` int(11) NOT NULL DEFAULT '0' COMMENT '权限的父id',
  `a_controller` varchar(32) NOT NULL DEFAULT '' COMMENT '权限控制器',
  `a_action` varchar(32) NOT NULL DEFAULT '' COMMENT '权限操作方法',
  `a_ca` varchar(60) NOT NULL DEFAULT '' COMMENT '控制器-方法',
  `is_show` int(1) NOT NULL DEFAULT '0' COMMENT '是否在页面显示，1是0否',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nc_auth
-- ----------------------------
INSERT INTO `nc_auth` VALUES ('1', '物品管理', '0', 'Goods', '#', 'Goods-#', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('2', '分类管理', '0', 'Category', '#', 'Category-#', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('3', '用户管理', '0', 'User', '#', 'User-#', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('4', '角色管理', '0', 'Role', '#', 'Role-#', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('5', '权限管理', '0', 'Auth', '#', 'Auth-#', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('25', '物品列表', '1', 'Goods', 'showlist', 'Goods-showlist', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('26', '添加物品', '1', 'Goods', 'add', 'Goods-add', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('27', '修改物品', '1', 'Goods', 'update', 'Goods-update', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('28', '删除物品', '1', 'Goods', 'delete', 'Goods-delete', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('29', '分类列表', '2', 'Category', 'showlist', 'Category-showlist', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('30', '添加分类', '2', 'Category', 'add', 'Category-add', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('31', '修改分类', '2', 'Category', 'update', 'Category-update', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('32', '删除分类', '2', 'Category', 'delete', 'Category-delete', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('33', '用户列表', '3', 'User', 'showlist', 'User-showlist', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('34', '添加用户', '3', 'User', 'add', 'User-add', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('35', '修改用户', '3', 'User', 'update', 'User-update', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('36', '删除用户', '3', 'User', 'delete', 'User-delete', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('37', '角色列表', '4', 'Role', 'showlist', 'Role-showlist', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('38', '添加角色', '4', 'Role', 'add', 'Role-add', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('39', '修改角色', '4', 'Role', 'update', 'Role-update', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('40', '删除角色', '4', 'Role', 'delete', 'Role-delete', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('41', '权限列表', '5', 'Auth', 'showlist', 'Auth-showlist', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('42', '添加权限', '5', 'Auth', 'add', 'Auth-add', '1', '0', '0');
INSERT INTO `nc_auth` VALUES ('43', '修改权限', '5', 'Auth', 'update', 'Auth-update', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('44', '删除权限', '5', 'Auth', 'delete', 'Auth-delete', '0', '0', '0');
INSERT INTO `nc_auth` VALUES ('48', '驱蚊器', '1', 'swdwd', 'wdawd', '', '1', '0', '0');

-- ----------------------------
-- Table structure for nc_role
-- ----------------------------
DROP TABLE IF EXISTS `nc_role`;
CREATE TABLE `nc_role` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `r_name` varchar(32) NOT NULL DEFAULT '' COMMENT '角色名',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nc_role
-- ----------------------------
INSERT INTO `nc_role` VALUES ('1', '超级管理员', '0', '0');
INSERT INTO `nc_role` VALUES ('2', '添置管理员', '0', '0');
INSERT INTO `nc_role` VALUES ('3', '删减管理员', '0', '0');
INSERT INTO `nc_role` VALUES ('4', '巡查员', '0', '0');
INSERT INTO `nc_role` VALUES ('5', '人才', '0', '0');

-- ----------------------------
-- Table structure for nc_role_auth
-- ----------------------------
DROP TABLE IF EXISTS `nc_role_auth`;
CREATE TABLE `nc_role_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `r_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  `a_id` int(11) NOT NULL DEFAULT '0' COMMENT '权限id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nc_role_auth
-- ----------------------------
INSERT INTO `nc_role_auth` VALUES ('1', '1', '1');
INSERT INTO `nc_role_auth` VALUES ('2', '1', '2');
INSERT INTO `nc_role_auth` VALUES ('3', '1', '3');
INSERT INTO `nc_role_auth` VALUES ('4', '1', '4');
INSERT INTO `nc_role_auth` VALUES ('5', '1', '5');
INSERT INTO `nc_role_auth` VALUES ('7', '2', '1');
INSERT INTO `nc_role_auth` VALUES ('8', '2', '2');
INSERT INTO `nc_role_auth` VALUES ('9', '2', '26');
INSERT INTO `nc_role_auth` VALUES ('10', '2', '29');
INSERT INTO `nc_role_auth` VALUES ('11', '3', '1');
INSERT INTO `nc_role_auth` VALUES ('12', '3', '2');
INSERT INTO `nc_role_auth` VALUES ('16', '3', '4');
INSERT INTO `nc_role_auth` VALUES ('20', '4', '5');
INSERT INTO `nc_role_auth` VALUES ('46', '4', '3');
INSERT INTO `nc_role_auth` VALUES ('53', '4', '4');
INSERT INTO `nc_role_auth` VALUES ('54', '5', '1');
INSERT INTO `nc_role_auth` VALUES ('55', '5', '2');
INSERT INTO `nc_role_auth` VALUES ('56', '5', '3');
INSERT INTO `nc_role_auth` VALUES ('57', '5', '4');
INSERT INTO `nc_role_auth` VALUES ('58', '5', '5');

-- ----------------------------
-- Table structure for nc_user
-- ----------------------------
DROP TABLE IF EXISTS `nc_user`;
CREATE TABLE `nc_user` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `u_name` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `u_password` varchar(32) NOT NULL DEFAULT '' COMMENT '用户密码',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nc_user
-- ----------------------------
INSERT INTO `nc_user` VALUES ('1', '刘维聪', '123456', '0', '0');
INSERT INTO `nc_user` VALUES ('2', 'lll', '246810', '0', '0');
INSERT INTO `nc_user` VALUES ('3', '122', '111111', '0', '0');
INSERT INTO `nc_user` VALUES ('4', 'admin', 'newc', '0', '0');
INSERT INTO `nc_user` VALUES ('7', 'qw', 'fddfddf', '0', '0');

-- ----------------------------
-- Table structure for nc_user_role
-- ----------------------------
DROP TABLE IF EXISTS `nc_user_role`;
CREATE TABLE `nc_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `u_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户名',
  `r_id` int(11) NOT NULL DEFAULT '0' COMMENT '角色id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of nc_user_role
-- ----------------------------
INSERT INTO `nc_user_role` VALUES ('1', '1', '4');
INSERT INTO `nc_user_role` VALUES ('2', '2', '4');
INSERT INTO `nc_user_role` VALUES ('3', '3', '2');
INSERT INTO `nc_user_role` VALUES ('4', '4', '1');
INSERT INTO `nc_user_role` VALUES ('5', '5', '1');
INSERT INTO `nc_user_role` VALUES ('6', '6', '2');
INSERT INTO `nc_user_role` VALUES ('11', '7', '5');
