CREATE TABLE IF NOT EXISTS `test_slider` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `slid_title` varchar(100) NOT NULL,
  `slid_desc` varchar(255)YES,
  `slid_url` varchar(255) NOT NULL,
  `slid_addedby` int(11) NOT NULL,  
  `slid_entrydt` datetime NOT NULL, 
  `slid_isactive` int(11)DEFAULT '1'
) ENGINE=InnoDB;

create table sara_images(
    id int AUTO_INCREMENT primary key,
    title varchar(200),
    description text,
    image text
)Engine=INNODB;

-- tables for CICS CMS

create table `testimonial`(
    `id` int AUTO_INCREMENT primary key,
    `name` varchar(255),
    `content` text CHARACTER SET utf8 COLLATE utf8_bin,
    `image` varchar(255) DEFAULT NULL,
)Engine=INNODB;

CREATE TABLE IF NOT EXISTS `testimonials` (
`id` int(11) primary key auto_increment,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin,
  `image` varchar(255) DEFAULT NULL,
  `isactive` int(11) DEFAULT '1'
) ENGINE=InnoDB;