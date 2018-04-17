CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(100) DEFAULT NULL,
  `location` varchar(200) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `sticky_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `message` longtext,
  `color` int(2) DEFAULT NULL,
  `_left` varchar(10) DEFAULT NULL,
  `_top` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
);