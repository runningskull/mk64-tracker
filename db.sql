SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
CREATE DATABASE IF NOT EXISTS `mk64_tracker` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
CREATE USER 'mk64_tracker'@'localhost' IDENTIFIED BY 'mk64_pass_123';
GRANT ALL ON mk64_tracker.* TO 'mk64_tracker'@'localhost';
USE `mk64_tracker`;

CREATE TABLE IF NOT EXISTS `times` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `course_id` tinyint(2) unsigned NOT NULL,
  `race_id` tinyint(2) unsigned NOT NULL,
  `time` varchar(255) collate utf8_unicode_ci NOT NULL,
  `char` varchar(255) collate utf8_unicode_ci NOT NULL,
  `person` varchar(255) collate utf8_unicode_ci NOT NULL,
  `time_saved` timestamp NULL default CURRENT_TIMESTAMP,
  `is_course` tinyint(1) NOT NULL,
  `solid` tinyint(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=184 ;

