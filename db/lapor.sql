/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : lapor

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 22/06/2023 22:24:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for auth_activation_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_activation_attempts`;
CREATE TABLE `auth_activation_attempts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_activation_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for auth_groups
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups`;
CREATE TABLE `auth_groups`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_groups
-- ----------------------------
INSERT INTO `auth_groups` VALUES (1, 'admin', 'role-admin');
INSERT INTO `auth_groups` VALUES (2, 'user', 'role-user');
INSERT INTO `auth_groups` VALUES (63, 'agroindustri', 'Agroindustri');
INSERT INTO `auth_groups` VALUES (64, 'manajemen-informatika', 'Manajemen Informatika');
INSERT INTO `auth_groups` VALUES (65, 'keperawatan', 'Keperawatan');
INSERT INTO `auth_groups` VALUES (66, 'pemeliharaan-mesin', 'Pemeliharaan Mesin');
INSERT INTO `auth_groups` VALUES (69, 'w-agroindustri', 'Wakil');
INSERT INTO `auth_groups` VALUES (70, 'w-manajemen-informatika', 'wakil');
INSERT INTO `auth_groups` VALUES (71, 'w-keperawatan', 'Wakil');
INSERT INTO `auth_groups` VALUES (72, 'w-pemeliharaan-mesin', 'wakil');
INSERT INTO `auth_groups` VALUES (73, 'a-keuangan', 'Akademik Keuangan');
INSERT INTO `auth_groups` VALUES (74, 'a-kemahasiswaan', 'Akademik Kemahasiswaan');
INSERT INTO `auth_groups` VALUES (75, 'a-umum', 'Akademik Umum');
INSERT INTO `auth_groups` VALUES (76, 'upt-tik', 'UPT TIK');
INSERT INTO `auth_groups` VALUES (77, 'w-a-keuangan', 'wakil');
INSERT INTO `auth_groups` VALUES (78, 'w-a-kemahasiswaan', 'wakil');
INSERT INTO `auth_groups` VALUES (79, 'w-a-umum', 'wakil');
INSERT INTO `auth_groups` VALUES (80, 'w-upt-tik', 'wakil');

-- ----------------------------
-- Table structure for auth_groups_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_permissions`;
CREATE TABLE `auth_groups_permissions`  (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  INDEX `auth_groups_permissions_permission_id_foreign`(`permission_id`) USING BTREE,
  INDEX `group_id_permission_id`(`group_id`, `permission_id`) USING BTREE,
  CONSTRAINT `auth_groups_permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `auth_groups_permissions_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_groups_permissions
-- ----------------------------
INSERT INTO `auth_groups_permissions` VALUES (1, 1);
INSERT INTO `auth_groups_permissions` VALUES (2, 2);
INSERT INTO `auth_groups_permissions` VALUES (63, 18);
INSERT INTO `auth_groups_permissions` VALUES (64, 18);
INSERT INTO `auth_groups_permissions` VALUES (65, 18);
INSERT INTO `auth_groups_permissions` VALUES (66, 18);
INSERT INTO `auth_groups_permissions` VALUES (69, 20);
INSERT INTO `auth_groups_permissions` VALUES (70, 20);
INSERT INTO `auth_groups_permissions` VALUES (71, 20);
INSERT INTO `auth_groups_permissions` VALUES (72, 20);
INSERT INTO `auth_groups_permissions` VALUES (73, 18);
INSERT INTO `auth_groups_permissions` VALUES (74, 18);
INSERT INTO `auth_groups_permissions` VALUES (75, 18);
INSERT INTO `auth_groups_permissions` VALUES (76, 18);
INSERT INTO `auth_groups_permissions` VALUES (77, 20);
INSERT INTO `auth_groups_permissions` VALUES (78, 20);
INSERT INTO `auth_groups_permissions` VALUES (79, 20);
INSERT INTO `auth_groups_permissions` VALUES (80, 20);

-- ----------------------------
-- Table structure for auth_groups_users
-- ----------------------------
DROP TABLE IF EXISTS `auth_groups_users`;
CREATE TABLE `auth_groups_users`  (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  INDEX `auth_groups_users_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `group_id_user_id`(`group_id`, `user_id`) USING BTREE,
  CONSTRAINT `auth_groups_users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `auth_groups_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_groups_users
-- ----------------------------
INSERT INTO `auth_groups_users` VALUES (1, 1);
INSERT INTO `auth_groups_users` VALUES (2, 76);
INSERT INTO `auth_groups_users` VALUES (2, 91);
INSERT INTO `auth_groups_users` VALUES (2, 92);
INSERT INTO `auth_groups_users` VALUES (2, 93);
INSERT INTO `auth_groups_users` VALUES (2, 94);
INSERT INTO `auth_groups_users` VALUES (63, 87);
INSERT INTO `auth_groups_users` VALUES (64, 88);
INSERT INTO `auth_groups_users` VALUES (65, 89);
INSERT INTO `auth_groups_users` VALUES (66, 90);
INSERT INTO `auth_groups_users` VALUES (69, 95);
INSERT INTO `auth_groups_users` VALUES (70, 96);
INSERT INTO `auth_groups_users` VALUES (71, 97);
INSERT INTO `auth_groups_users` VALUES (72, 98);
INSERT INTO `auth_groups_users` VALUES (73, 100);
INSERT INTO `auth_groups_users` VALUES (74, 99);
INSERT INTO `auth_groups_users` VALUES (75, 101);
INSERT INTO `auth_groups_users` VALUES (76, 102);
INSERT INTO `auth_groups_users` VALUES (77, 106);
INSERT INTO `auth_groups_users` VALUES (78, 105);
INSERT INTO `auth_groups_users` VALUES (79, 104);
INSERT INTO `auth_groups_users` VALUES (80, 103);

-- ----------------------------
-- Table structure for auth_logins
-- ----------------------------
DROP TABLE IF EXISTS `auth_logins`;
CREATE TABLE `auth_logins`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_id` int(11) UNSIGNED NULL DEFAULT NULL,
  `date` datetime(0) NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `email`(`email`) USING BTREE,
  INDEX `user_id`(`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_logins
-- ----------------------------
INSERT INTO `auth_logins` VALUES (1, '::1; Chrome', 'admin@admin.com', 1, '2023-06-04 14:47:11', 1);
INSERT INTO `auth_logins` VALUES (2, '::1; Chrome', 'user@user.com', 76, '2023-06-04 15:09:59', 1);
INSERT INTO `auth_logins` VALUES (3, '::1; Chrome', 'admin@admin.com', 1, '2023-06-04 15:10:18', 1);
INSERT INTO `auth_logins` VALUES (4, '::1; Chrome', 'admin@admin.com', 1, '2023-06-04 15:11:50', 1);
INSERT INTO `auth_logins` VALUES (5, '::1; Chrome', 'admin@admin.com', 1, '2023-06-04 15:14:13', 1);
INSERT INTO `auth_logins` VALUES (6, '::1; Chrome', 'admin@admin.com', 1, '2023-06-04 15:15:16', 1);
INSERT INTO `auth_logins` VALUES (7, '::1; Chrome', 'admin@admin.com', 1, '2023-06-05 20:17:43', 1);
INSERT INTO `auth_logins` VALUES (8, '::1; Chrome', 'admin@admin.com', 1, '2023-06-05 20:29:18', 1);
INSERT INTO `auth_logins` VALUES (9, '::1; Chrome', 'admin@admin.com', 1, '2023-06-06 23:36:10', 1);
INSERT INTO `auth_logins` VALUES (10, '::1; Chrome', 'admin@admin.com', 1, '2023-06-07 20:03:25', 1);
INSERT INTO `auth_logins` VALUES (11, '::1; Chrome', 'admin@admin.com', 1, '2023-06-07 20:10:25', 1);
INSERT INTO `auth_logins` VALUES (12, '::1; Chrome', 'user@user.com', NULL, '2023-06-07 20:12:40', 0);
INSERT INTO `auth_logins` VALUES (13, '::1; Chrome', 'admin@admin.com', 1, '2023-06-07 20:12:43', 1);
INSERT INTO `auth_logins` VALUES (14, '::1; Chrome', 'admin@admin.com', 1, '2023-06-07 21:52:07', 1);
INSERT INTO `auth_logins` VALUES (15, '::1; Chrome', 'admin@admin.com', 1, '2023-06-08 21:17:31', 1);
INSERT INTO `auth_logins` VALUES (16, '::1; Chrome', 'admin@admin.com', 1, '2023-06-12 23:24:48', 1);
INSERT INTO `auth_logins` VALUES (17, '::1; Chrome', 'admin@admin.com', 1, '2023-06-13 20:27:06', 1);
INSERT INTO `auth_logins` VALUES (18, '::1; Chrome', 'user@user.com1', NULL, '2023-06-13 20:33:32', 0);
INSERT INTO `auth_logins` VALUES (19, '::1; Chrome', 'user@user.com1', NULL, '2023-06-13 20:33:41', 0);
INSERT INTO `auth_logins` VALUES (20, '::1; Chrome', 'admin@admin.com', 1, '2023-06-13 20:33:46', 1);
INSERT INTO `auth_logins` VALUES (21, '::1; Chrome', 'user@tes.com1', 86, '2023-06-13 20:34:09', 0);
INSERT INTO `auth_logins` VALUES (22, '::1; Chrome', 'admin@admin.com', 1, '2023-06-13 20:34:19', 1);
INSERT INTO `auth_logins` VALUES (23, '::1; Chrome', 'user@tes.com1', 86, '2023-06-13 20:34:51', 1);
INSERT INTO `auth_logins` VALUES (24, '::1; Chrome', 'admin@admin.com', 1, '2023-06-13 20:35:06', 1);
INSERT INTO `auth_logins` VALUES (25, '::1; Chrome', 'admin@admin.com', 1, '2023-06-13 21:24:57', 1);
INSERT INTO `auth_logins` VALUES (26, '::1; Chrome', 'admin@admin.com', NULL, '2023-06-13 22:32:47', 0);
INSERT INTO `auth_logins` VALUES (27, '::1; Chrome', 'admin@admin.com', NULL, '2023-06-13 22:33:31', 0);
INSERT INTO `auth_logins` VALUES (28, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-13 22:33:35', 1);
INSERT INTO `auth_logins` VALUES (29, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-13 22:33:35', 1);
INSERT INTO `auth_logins` VALUES (30, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-14 23:25:34', 1);
INSERT INTO `auth_logins` VALUES (31, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-15 21:23:35', 1);
INSERT INTO `auth_logins` VALUES (32, '::1; Chrome', 'admin1@admin.com', 87, '2023-06-15 21:52:18', 1);
INSERT INTO `auth_logins` VALUES (33, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-15 23:00:34', 1);
INSERT INTO `auth_logins` VALUES (34, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-15 23:07:50', 1);
INSERT INTO `auth_logins` VALUES (35, '::1; Chrome', 'user1@user.com', 91, '2023-06-15 23:08:11', 1);
INSERT INTO `auth_logins` VALUES (36, '::1; Chrome', 'admin@admin.com', NULL, '2023-06-15 23:08:36', 0);
INSERT INTO `auth_logins` VALUES (37, '::1; Chrome', 'admin1@admin.com', 87, '2023-06-15 23:08:45', 1);
INSERT INTO `auth_logins` VALUES (38, '::1; Chrome', 'admin1@admin.com', 87, '2023-06-18 18:02:25', 1);
INSERT INTO `auth_logins` VALUES (39, '::1; Chrome', 'admin1@admin.com', 87, '2023-06-18 18:44:29', 1);
INSERT INTO `auth_logins` VALUES (40, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-18 19:22:27', 1);
INSERT INTO `auth_logins` VALUES (41, '::1; Chrome', 'admin1@admin.com', 87, '2023-06-18 21:21:03', 1);
INSERT INTO `auth_logins` VALUES (42, '::1; Chrome', 'admin1@admin.com', 87, '2023-06-18 22:24:28', 1);
INSERT INTO `auth_logins` VALUES (43, '::1; Chrome', 'user1', NULL, '2023-06-18 22:25:14', 0);
INSERT INTO `auth_logins` VALUES (44, '::1; Chrome', 'user1@user.com', 91, '2023-06-18 22:25:23', 1);
INSERT INTO `auth_logins` VALUES (45, '::1; Chrome', 'admin1@admin.com', 87, '2023-06-18 22:26:37', 1);
INSERT INTO `auth_logins` VALUES (46, '::1; Chrome', 'user1@user.com', 91, '2023-06-18 22:27:04', 1);
INSERT INTO `auth_logins` VALUES (47, '::1; Chrome', 'admin1@admin.com', 87, '2023-06-18 22:30:14', 1);
INSERT INTO `auth_logins` VALUES (48, '::1; Chrome', 'admin3@admin.com', 89, '2023-06-18 22:31:03', 1);
INSERT INTO `auth_logins` VALUES (49, '::1; Chrome', 'admin2@admin.com', 88, '2023-06-18 22:31:18', 1);
INSERT INTO `auth_logins` VALUES (50, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-18 22:52:53', 1);
INSERT INTO `auth_logins` VALUES (51, '::1; Chrome', 'admin1@admin.com', 87, '2023-06-21 22:24:36', 1);
INSERT INTO `auth_logins` VALUES (52, '::1; Chrome', 'admin4@admin.com', 90, '2023-06-21 22:25:24', 1);
INSERT INTO `auth_logins` VALUES (53, '::1; Chrome', 'admin3@admin.com', 89, '2023-06-21 22:27:14', 1);
INSERT INTO `auth_logins` VALUES (54, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-21 22:29:30', 1);
INSERT INTO `auth_logins` VALUES (55, '::1; Chrome', 'admin3@admin.com', 89, '2023-06-21 22:30:32', 1);
INSERT INTO `auth_logins` VALUES (56, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-22 21:39:12', 1);
INSERT INTO `auth_logins` VALUES (57, '::1; Chrome', 'w-admin1@admin.com', 95, '2023-06-22 21:49:59', 1);
INSERT INTO `auth_logins` VALUES (58, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-22 21:50:36', 1);
INSERT INTO `auth_logins` VALUES (59, '::1; Chrome', 'w-admin1@admin.com', 95, '2023-06-22 21:51:37', 1);
INSERT INTO `auth_logins` VALUES (60, '::1; Chrome', 'w-admin1@admin.com', 95, '2023-06-22 21:52:16', 1);
INSERT INTO `auth_logins` VALUES (61, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-22 21:52:30', 1);
INSERT INTO `auth_logins` VALUES (62, '::1; Chrome', 'w-admin1@admin.com', 95, '2023-06-22 21:52:54', 1);
INSERT INTO `auth_logins` VALUES (63, '::1; Chrome', 'w-admin2@admin.com', 96, '2023-06-22 21:53:11', 1);
INSERT INTO `auth_logins` VALUES (64, '::1; Chrome', 'w-admin1@admin.com', 95, '2023-06-22 21:53:30', 1);
INSERT INTO `auth_logins` VALUES (65, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-22 21:53:43', 1);
INSERT INTO `auth_logins` VALUES (66, '::1; Chrome', 'admin8@admin.com', 102, '2023-06-22 22:10:53', 1);
INSERT INTO `auth_logins` VALUES (67, '::1; Chrome', 'superadmin@admin.com', 1, '2023-06-22 22:11:15', 1);
INSERT INTO `auth_logins` VALUES (68, '::1; Chrome', 'admin8@admin.com', 102, '2023-06-22 22:13:38', 1);
INSERT INTO `auth_logins` VALUES (69, '::1; Chrome', 'admin7@admin.com', 101, '2023-06-22 22:15:19', 1);
INSERT INTO `auth_logins` VALUES (70, '::1; Chrome', 'admin6@admin.com', 99, '2023-06-22 22:19:12', 1);
INSERT INTO `auth_logins` VALUES (71, '::1; Chrome', 'admin6@admin.com', 99, '2023-06-22 22:19:12', 1);
INSERT INTO `auth_logins` VALUES (72, '::1; Chrome', 'w-admin7@admin.com', 104, '2023-06-22 22:19:42', 1);
INSERT INTO `auth_logins` VALUES (73, '::1; Chrome', 'admin7@admin.com', 101, '2023-06-22 22:22:13', 1);
INSERT INTO `auth_logins` VALUES (74, '::1; Chrome', 'admin7@admin.com', 101, '2023-06-22 22:22:13', 1);
INSERT INTO `auth_logins` VALUES (75, '::1; Chrome', 'admin7@admin.com', 101, '2023-06-22 22:23:26', 1);

-- ----------------------------
-- Table structure for auth_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_permissions`;
CREATE TABLE `auth_permissions`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_permissions
-- ----------------------------
INSERT INTO `auth_permissions` VALUES (1, 'manage-all', 'role-admin');
INSERT INTO `auth_permissions` VALUES (2, 'manage-user', 'role-user');
INSERT INTO `auth_permissions` VALUES (18, 'admin-jurusan', 'Admin Jurusan');
INSERT INTO `auth_permissions` VALUES (20, 'w-admin-jurusan', 'Wakil');

-- ----------------------------
-- Table structure for auth_reset_attempts
-- ----------------------------
DROP TABLE IF EXISTS `auth_reset_attempts`;
CREATE TABLE `auth_reset_attempts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_reset_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for auth_tokens
-- ----------------------------
DROP TABLE IF EXISTS `auth_tokens`;
CREATE TABLE `auth_tokens`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `hashedValidator` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime(0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `auth_tokens_user_id_foreign`(`user_id`) USING BTREE,
  INDEX `selector`(`selector`) USING BTREE,
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for auth_users_permissions
-- ----------------------------
DROP TABLE IF EXISTS `auth_users_permissions`;
CREATE TABLE `auth_users_permissions`  (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  INDEX `auth_users_permissions_permission_id_foreign`(`permission_id`) USING BTREE,
  INDEX `user_id_permission_id`(`user_id`, `permission_id`) USING BTREE,
  CONSTRAINT `auth_users_permissions_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `auth_users_permissions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of auth_users_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for tbjurusan
-- ----------------------------
DROP TABLE IF EXISTS `tbjurusan`;
CREATE TABLE `tbjurusan`  (
  `kode` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jurusan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbjurusan
-- ----------------------------
INSERT INTO `tbjurusan` VALUES ('J1', 'Agroindustri\n');
INSERT INTO `tbjurusan` VALUES ('J2', 'Manajemen Informatika');
INSERT INTO `tbjurusan` VALUES ('J3', 'Keperawatan');
INSERT INTO `tbjurusan` VALUES ('J4', 'Pemeliharaan Mesin');
INSERT INTO `tbjurusan` VALUES ('J5', 'Akademik Keuangan');
INSERT INTO `tbjurusan` VALUES ('J6', 'Akademik Kemahasiswaan');
INSERT INTO `tbjurusan` VALUES ('J7', 'Akademik Umum');
INSERT INTO `tbjurusan` VALUES ('J8', 'UPT TIK');

-- ----------------------------
-- Table structure for tbreport
-- ----------------------------
DROP TABLE IF EXISTS `tbreport`;
CREATE TABLE `tbreport`  (
  `noref` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_id` int(100) NOT NULL COMMENT 'pengirim\r\n',
  `judul` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `jenis` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tujuan` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT 'kode jurusan',
  `tgl` date NULL DEFAULT NULL,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `sts` int(2) NULL DEFAULT NULL,
  `anonim` int(2) NULL DEFAULT NULL COMMENT '1=anonim',
  `inputby` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `editby` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deleteby` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`noref`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbreport
-- ----------------------------
INSERT INTO `tbreport` VALUES ('2023060002', 0, 'tes', 'tes', 'Aspirasi', 'J7', '2023-06-19', 'tes', '2023060002.jpeg', 1, 1, '2023-06-22 22:15:12', NULL, NULL);

-- ----------------------------
-- Table structure for tbreport_d
-- ----------------------------
DROP TABLE IF EXISTS `tbreport_d`;
CREATE TABLE `tbreport_d`  (
  `noref` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `urut` int(2) NOT NULL,
  `tgl` datetime(0) NOT NULL,
  `user_id` int(255) NULL DEFAULT NULL COMMENT 'pengirim',
  `isi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `inputby` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`noref`, `urut`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbreport_d
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `reset_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `reset_at` datetime(0) NULL DEFAULT NULL,
  `reset_expires` datetime(0) NULL DEFAULT NULL,
  `activate_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `deleted_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE,
  UNIQUE INDEX `username`(`username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 107 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'superadmin@admin.com', 'administrator', '1662023046_9015dc727a4e62cf0013.png', '$2y$10$ixsPGTyTO7K4.e64/IVRs.anE2sVvzoMWFZvd47iDZZyvkYhUJ0xa', NULL, NULL, NULL, 'b1ccea41f785adb7d8aa788e138989cf', NULL, NULL, 1, 0, '2022-08-11 01:08:52', '2023-06-13 22:31:27', NULL);
INSERT INTO `users` VALUES (76, 'user@user.com', 'user', 'default.png', '$2y$10$jAvk0RkmKq2pW8qa5NMcduxaxsH28wUCQIlFZtHA38Vqt45J9RbCy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-04 15:09:30', '2023-06-04 15:09:30', NULL);
INSERT INTO `users` VALUES (87, 'admin1@admin.com', 'Admin Agroindustri', 'default.png', '$2y$10$qA5lsMrxu/j6hV/.I98HeOwkcYd2BBuvq3yvbOyp4FlZ5DodnSymK', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-13 22:29:01', '2023-06-13 22:29:01', NULL);
INSERT INTO `users` VALUES (88, 'admin2@admin.com', 'Admin Manajemen Informatika', 'default.png', '$2y$10$3gibLVAoXVqNRDr/71HCtecRbmBHxEH6IoAcY4DiQw4IQi/NjXrYq', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-13 22:29:37', '2023-06-13 22:29:37', NULL);
INSERT INTO `users` VALUES (89, 'admin3@admin.com', 'Admin Keperawatan', 'default.png', '$2y$10$ywVjpe6Q23445b/QHheFteZYtld2oBMjiToIHYbiJ9bX19cd7a7lu', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-13 22:30:19', '2023-06-13 22:30:19', NULL);
INSERT INTO `users` VALUES (90, 'admin4@admin.com', 'Admin PemeliharaanMesin', 'default.png', '$2y$10$Jpva97zSr7HAGqYusXOubuPyhXCsvpB1gtZeWRs1ANUzJxZCGTOlO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-13 22:31:11', '2023-06-13 22:31:11', NULL);
INSERT INTO `users` VALUES (91, 'user1@user.com', 'User Agroindustri', 'default.png', '$2y$10$Bm7XF3y1EbmMx3iV3lVvYeqXfEJn/hdz1F/Gg7V/hWUmyrB.PlIge', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-13 22:35:14', '2023-06-13 22:35:14', NULL);
INSERT INTO `users` VALUES (92, 'user2@user.com', 'User Manajemen Informatika', 'default.png', '$2y$10$JoxY1ooki/kSp2HCEZ/fd.I7XVpmNvKX6L3UVCY6nGG6r5qg.KSIa', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-13 22:35:42', '2023-06-13 22:35:42', NULL);
INSERT INTO `users` VALUES (93, 'user3@user.com', 'User Keperawatan', 'default.png', '$2y$10$IFVfBzUuEmmii52AuG9PFuH.84rn3/fmMi2S.mEu4QGJHDwA6YsOy', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-13 22:36:05', '2023-06-13 22:36:05', NULL);
INSERT INTO `users` VALUES (94, 'user4@user.com', 'User PemeliharaanMesin', 'default.png', '$2y$10$d.VPmrzN1cEiGuTjKiseUeuh7iuMYMVxOCwQmtLtL.JkrYmoBLjyG', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-13 22:36:33', '2023-06-13 22:36:33', NULL);
INSERT INTO `users` VALUES (95, 'w-admin1@admin.com', 'wakil admin argo', 'default.png', '$2y$10$u0MF1GX26K44XV5b6g0fMuQqpC94/TDshzzAC/2vn.4LJv0oVdfKC', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 21:48:22', '2023-06-22 21:48:22', NULL);
INSERT INTO `users` VALUES (96, 'w-admin2@admin.com', 'wakil admin mi', 'default.png', '$2y$10$427dRebJZd0PKFxWzC/knO2X9UC6HXbjZ4s4kLqNOBC6S0VXBYOi.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 21:48:48', '2023-06-22 21:48:48', NULL);
INSERT INTO `users` VALUES (97, 'w-admin3@admin.com', 'wakil admin keperawatan', 'default.png', '$2y$10$hAM5Rb7/hbVQbAFfztCGr.bEPuolmSz2wdB1EpAr0u6INN3vDMp2C', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 21:49:12', '2023-06-22 21:49:12', NULL);
INSERT INTO `users` VALUES (98, 'w-admin4@admin.com', 'wakil admin pemeliharaan mesin', 'default.png', '$2y$10$7Vx8vb9hBlJaPrkohBMTu.EFA1nNARykQ90vx0Fehm6g8SONZDIZO', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 21:49:36', '2023-06-22 21:49:36', NULL);
INSERT INTO `users` VALUES (99, 'admin6@admin.com', 'admin a kemahasiswaan', 'default.png', '$2y$10$K6K5OnePQwHIVRJVNlyBOuWgEhbpKW6Nuj6qLSQnwijk1rboEkWi2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 22:02:24', '2023-06-22 22:04:44', NULL);
INSERT INTO `users` VALUES (100, 'admin5@admin.com', 'admin a keuangan', 'default.png', '$2y$10$QSbvCHnmGuOshh8XCTVXeeMjW1zyLApsQ4epXL4lQkHLOwIHwTdgS', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 22:03:51', '2023-06-22 22:04:34', NULL);
INSERT INTO `users` VALUES (101, 'admin7@admin.com', 'admin a umum', 'default.png', '$2y$10$vFc7VfrNqP/FqmCQ0PPp2O1YUZw29tjhUaVI.0tej9O2rggy6WK3.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 22:05:12', '2023-06-22 22:05:12', NULL);
INSERT INTO `users` VALUES (102, 'admin8@admin.com', 'admin upt tik', 'default.png', '$2y$10$2uqfT7OJ3W/2xrXlGlw6HeAcOelKWl6FpMo4DY2A778emUh6VEQ1K', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 22:05:32', '2023-06-22 22:05:32', NULL);
INSERT INTO `users` VALUES (103, 'w-admin8@admin.com', 'w admin upt tik', 'default.png', '$2y$10$CY9xpduwmZK8yz7hMFRhVe2ATcASMi5XOLFuh10vGxFdWwlYifTzm', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 22:05:50', '2023-06-22 22:05:50', NULL);
INSERT INTO `users` VALUES (104, 'w-admin7@admin.com', 'w admin umum', 'default.png', '$2y$10$K59on6pY54ebdHaQviIOkuSHr6eOXqqbkWZtTp0f6AR1j3fmLCyE.', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 22:06:19', '2023-06-22 22:06:19', NULL);
INSERT INTO `users` VALUES (105, 'w-admin6@admin.com', 'w a kemahasiswaan', 'default.png', '$2y$10$UKAgjK2I1Lx3lIitEuOQjO6nwtqPGc5/RRZtXI2XTJ9vlet2Afrie', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 22:07:05', '2023-06-22 22:07:05', NULL);
INSERT INTO `users` VALUES (106, 'w-admin5@admin.com', 'w a keuangan', 'default.png', '$2y$10$cocCBVz0ouC3pir79ntZKOKPlgsuSiFsOU7.PSGsfyUAobMje9co2', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2023-06-22 22:07:20', '2023-06-22 22:07:20', NULL);

SET FOREIGN_KEY_CHECKS = 1;
