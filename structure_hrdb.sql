/*
 Navicat Premium Data Transfer

 Source Server         : 172.18.2.2 Covid_address_web
 Source Server Type    : MySQL
 Source Server Version : 80018
 Source Host           : 172.18.2.2:3306
 Source Schema         : hrdb

 Target Server Type    : MySQL
 Target Server Version : 80018
 File Encoding         : 65001

 Date: 07/12/2021 13:34:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for hr_cpa_head_file
-- ----------------------------
DROP TABLE IF EXISTS `hr_cpa_head_file`;
CREATE TABLE `hr_cpa_head_file`  (
  `id` int(11) NOT NULL,
  `h_number_id_th` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_adddress_th` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_moo_th` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_tmp_th` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_amp_th` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_chw_th` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_number_id_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_adddress_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_moo_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_tmp_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_amp_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `h_chw_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hr_cpa_leave
-- ----------------------------
DROP TABLE IF EXISTS `hr_cpa_leave`;
CREATE TABLE `hr_cpa_leave`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leave_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อแบบฟอร์ม',
  `leave_id` int(11) NULL DEFAULT NULL,
  `leave_day` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `link_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'พาร์ทหน้านั้นๆ',
  `form_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ประเภทแบบฟอร์มต่างๆ',
  `from_type_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อประเภท',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hr_cpa_leavedetail
-- ----------------------------
DROP TABLE IF EXISTS `hr_cpa_leavedetail`;
CREATE TABLE `hr_cpa_leavedetail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `start_date` datetime(0) NULL DEFAULT NULL,
  `end_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hr_cpa_mission
-- ----------------------------
DROP TABLE IF EXISTS `hr_cpa_mission`;
CREATE TABLE `hr_cpa_mission`  (
  `mission_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'รหัสกลุ่มภารกิจ',
  `mission_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ภารกิจ',
  PRIMARY KEY (`mission_id`) USING BTREE,
  UNIQUE INDEX `mission_id`(`mission_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hr_cpa_person_main
-- ----------------------------
DROP TABLE IF EXISTS `hr_cpa_person_main`;
CREATE TABLE `hr_cpa_person_main`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'นำหน้า',
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สกุล',
  `mobile_phone_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cid` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'เลขบัตร',
  `date_start_job` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'วันเริ่มงาน',
  `mission_id` int(30) NULL DEFAULT NULL COMMENT 'กลุ่มภารกิจ',
  `workgroup` int(11) NULL DEFAULT NULL COMMENT 'หน่วยงาน',
  `position_id` int(255) NULL DEFAULT NULL COMMENT 'รหัสตำแหน่ง',
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `typeposition_id` int(11) NULL DEFAULT NULL COMMENT 'ประเภทการจ้าง',
  `typeposition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthdate` date NULL DEFAULT NULL,
  `dateupdate` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `userupdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipupdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `w_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อไฟล์รูปภาพ',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mission`(`mission_id`) USING BTREE,
  INDEX `position`(`position_id`) USING BTREE,
  INDEX `job_type_fk`(`typeposition_id`) USING BTREE,
  INDEX `workgroup_fk`(`workgroup`) USING BTREE,
  CONSTRAINT `job_type_fk` FOREIGN KEY (`typeposition_id`) REFERENCES `hr_cpa_person_type` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `workgroup_fk` FOREIGN KEY (`workgroup`) REFERENCES `hr_cpa_workgroup` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1458 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hr_cpa_person_main_copy1
-- ----------------------------
DROP TABLE IF EXISTS `hr_cpa_person_main_copy1`;
CREATE TABLE `hr_cpa_person_main_copy1`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'นำหน้า',
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สกุล',
  `mobile_phone_number` int(13) NULL DEFAULT NULL,
  `cid` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'เลขบัตร',
  `date_start_job` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'วันเริ่มงาน',
  `mission_id` int(30) NULL DEFAULT NULL COMMENT 'กลุ่มภารกิจ',
  `workgroup` int(11) NULL DEFAULT NULL COMMENT 'หน่วยงาน',
  `position_id` int(255) NULL DEFAULT NULL COMMENT 'รหัสตำแหน่ง',
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `typeposition_id` int(11) NULL DEFAULT NULL COMMENT 'ประเภทการจ้าง',
  `typeposition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthdate` date NULL DEFAULT NULL,
  `dateupdate` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `userupdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipupdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `w_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อไฟล์รูปภาพ',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mission`(`mission_id`) USING BTREE,
  INDEX `position`(`position_id`) USING BTREE,
  INDEX `job_type_fk`(`typeposition_id`) USING BTREE,
  INDEX `workgroup_fk`(`workgroup`) USING BTREE,
  CONSTRAINT `hr_cpa_person_main_copy1_ibfk_1` FOREIGN KEY (`typeposition_id`) REFERENCES `hr_cpa_person_type` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `hr_cpa_person_main_copy1_ibfk_2` FOREIGN KEY (`workgroup`) REFERENCES `hr_cpa_workgroup` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 1458 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hr_cpa_person_type
-- ----------------------------
DROP TABLE IF EXISTS `hr_cpa_person_type`;
CREATE TABLE `hr_cpa_person_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `person_typecode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `person_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `person_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `person_total` decimal(4, 0) NULL DEFAULT NULL,
  `bg_color` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `img_icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hr_cpa_workgroup
-- ----------------------------
DROP TABLE IF EXISTS `hr_cpa_workgroup`;
CREATE TABLE `hr_cpa_workgroup`  (
  `id` int(11) NOT NULL,
  `workgroup` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `mission_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mission_id`(`mission_id`) USING BTREE,
  CONSTRAINT `mission_isuse` FOREIGN KEY (`mission_id`) REFERENCES `hr_cpa_mission` (`mission_id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hr_form_list
-- ----------------------------
DROP TABLE IF EXISTS `hr_form_list`;
CREATE TABLE `hr_form_list`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `insert_datetime` datetime(0) NULL DEFAULT NULL COMMENT 'วันเวลาที่ขอใบรับรอง',
  `form_id` int(50) NULL DEFAULT NULL COMMENT 'ประเภทฟอร์ม',
  `form_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อฟอร์ม',
  `user_id` int(11) NULL DEFAULT NULL COMMENT 'รหัส id ผู้ขอใบรับรอง',
  `person_main_id` int(11) NULL DEFAULT NULL COMMENT 'รหัส id บุคลากร',
  `fullname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ชื่อสกุลผู้ขอ',
  `note` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'หมายเหตุ สาเหตุการขอใบ',
  `timestamp` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0) COMMENT 'วันที่เวลาที่เกิดการแก้ไขล่าสุด',
  `user_appove_status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'id user admin ที่ทำการอนุมัติใบคำร้อง',
  `status` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'สถานะการอนุมัติใบรับรอง',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `person_isuse`(`person_main_id`) USING BTREE,
  CONSTRAINT `person_isuse` FOREIGN KEY (`person_main_id`) REFERENCES `hr_cpa_person_main` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hr_user
-- ----------------------------
DROP TABLE IF EXISTS `hr_user`;
CREATE TABLE `hr_user`  (
  `id` int(150) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `cid` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_role_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1026 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hr_user_role
-- ----------------------------
DROP TABLE IF EXISTS `hr_user_role`;
CREATE TABLE `hr_user_role`  (
  `user_role_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`user_role_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hr_user_role_list
-- ----------------------------
DROP TABLE IF EXISTS `hr_user_role_list`;
CREATE TABLE `hr_user_role_list`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NULL DEFAULT NULL COMMENT 'id user',
  `user_role_id` int(11) NULL DEFAULT NULL COMMENT 'id role',
  `insert` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `update` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `delete` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for hrd_cpa_depart
-- ----------------------------
DROP TABLE IF EXISTS `hrd_cpa_depart`;
CREATE TABLE `hrd_cpa_depart`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `depart_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `updatedate` datetime(0) NULL DEFAULT NULL,
  `userupdate` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipupdate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hrd_cpa_mission_fte
-- ----------------------------
DROP TABLE IF EXISTS `hrd_cpa_mission_fte`;
CREATE TABLE `hrd_cpa_mission_fte`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mission_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ภารกิจ',
  `mission_year` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'กรอบตามมติ อกพ ประจำปี',
  `mission_fte_l` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ค่า FTE ขั้นต่ำ',
  `mission_fte_h` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ค่า FTE ขั้นสูง',
  `dateupdate` datetime(0) NULL DEFAULT NULL COMMENT 'วันที่ทำรายการ',
  `upserupdate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้บันทึกรายการ',
  `ipupdate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ipบันทึกรายการ',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hrd_cpa_person
-- ----------------------------
DROP TABLE IF EXISTS `hrd_cpa_person`;
CREATE TABLE `hrd_cpa_person`  (
  `cid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthdate` date NULL DEFAULT NULL,
  `positon_number` int(50) NULL DEFAULT NULL,
  `position_id` int(50) NULL DEFAULT NULL,
  `sex` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `keycode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dateupdate` datetime(0) NULL DEFAULT NULL,
  `userupdate` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipupdate` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`cid`) USING BTREE,
  INDEX `position_fk`(`position_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hrd_cpa_position
-- ----------------------------
DROP TABLE IF EXISTS `hrd_cpa_position`;
CREATE TABLE `hrd_cpa_position`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 95 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hrd_cpa_position_fte
-- ----------------------------
DROP TABLE IF EXISTS `hrd_cpa_position_fte`;
CREATE TABLE `hrd_cpa_position_fte`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `position_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fte_h` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'FTE_สูง',
  `fte_l` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'FTE ต่ำ',
  `ofc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ข้าราชการ',
  `emp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ลูกจ้างประจำ',
  `gov` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'พนักงานราชการ',
  `mph` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ลูกจ้างกระทรวงสาธารณสุข',
  `tw` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ลูกจ้างชั่วคราว',
  `pw` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ลูกจ้างรายคาบ',
  `hc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'จ้างเหมา',
  `position_tatal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ทั้งหมด',
  `position_out` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'นอก',
  `position_in` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ใน',
  `position_move` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ย้าย',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 94 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hrd_cpa_position_fte_year
-- ----------------------------
DROP TABLE IF EXISTS `hrd_cpa_position_fte_year`;
CREATE TABLE `hrd_cpa_position_fte_year`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fte_year` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ปี',
  `position_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ตำแหน่ง',
  `fte_h` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ค่า FTE_สูง',
  `fte_l` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ค่า FTE ต่ำ',
  `ofc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ข้าราชการ',
  `emp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ลูกจ้างประจำ',
  `gov` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'พนักงานราชการ',
  `mph` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ลูกจ้างกระทรวงสาธารณสุข',
  `tw` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ลูกจ้างชั่วคราว',
  `pw` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ลูกจ้างรายคาบ',
  `hc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'จ้างเหมา',
  `dateupdate` datetime(0) NULL DEFAULT NULL COMMENT 'วันบันทึกข้อมูล',
  `ipupdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'IPบันทึกข้อมูล',
  `userupdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ผู้บันทึกรายการ',
  `position_tatal` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ทั้งหมด',
  `position_out` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'นอก',
  `position_in` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ใน',
  `position_move` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'ย้าย',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hrd_cpa_position_level
-- ----------------------------
DROP TABLE IF EXISTS `hrd_cpa_position_level`;
CREATE TABLE `hrd_cpa_position_level`  (
  `id` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `position_level_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for hrd_cpa_work
-- ----------------------------
DROP TABLE IF EXISTS `hrd_cpa_work`;
CREATE TABLE `hrd_cpa_work`  (
  `id` int(11) NOT NULL,
  `work_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for z_hr_cpa_person_main_copy1
-- ----------------------------
DROP TABLE IF EXISTS `z_hr_cpa_person_main_copy1`;
CREATE TABLE `z_hr_cpa_person_main_copy1`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cid` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `position` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `typeposition` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `birthdate` date NULL DEFAULT NULL,
  `workgroup` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dateupdate` datetime(0) NULL DEFAULT NULL,
  `userupdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ipupdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1617 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for z_hr_cpa_workgroup_detail
-- ----------------------------
DROP TABLE IF EXISTS `z_hr_cpa_workgroup_detail`;
CREATE TABLE `z_hr_cpa_workgroup_detail`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `workgroup` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `w_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1515 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for z_hr_cpa_workgroup_detail_copy1
-- ----------------------------
DROP TABLE IF EXISTS `z_hr_cpa_workgroup_detail_copy1`;
CREATE TABLE `z_hr_cpa_workgroup_detail_copy1`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `workgroup` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `w_ststus` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1514 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
