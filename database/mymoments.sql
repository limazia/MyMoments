# Host: localhost  (Version 5.5.5-10.4.13-MariaDB)
# Date: 2022-09-28 04:48:41
# Generator: MySQL-Front 6.0  (Build 2.20)

#
# Structure for table "users"
#

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "users"
#

#
# Structure for table "moments"
#

CREATE TABLE `moments` (
  `moment_id` varchar(255) NOT NULL,
  `moment_label` varchar(255) NOT NULL,
  `moment_description` varchar(255) DEFAULT NULL,
  `moment_attachments` text DEFAULT NULL,
  `user_id` varchar(255) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`moment_id`),
  KEY `moments_user_id_foreign` (`user_id`),
  CONSTRAINT `moments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "moments"
#

#
# Structure for table "attachments"
#

CREATE TABLE `attachments` (
  `attachment_id` varchar(255) NOT NULL,
  `attachment_file` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`attachment_id`),
  KEY `attachments_user_id_foreign` (`user_id`),
  CONSTRAINT `attachments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "attachments"
#
