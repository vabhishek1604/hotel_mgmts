CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `emp_type` varchar(100) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `middle_name` varchar(200) DEFAULT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `father_name` varchar(200) DEFAULT NULL,
  `mother_name` varchar(200) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `alt_contact_no` varchar(10) DEFAULT NULL,
  `dob` date,
  `doj` date,
  `gender` varchar(100) DEFAULT NULL,
  `blood_group` varchar(200) ,
  `adhaar_card` varchar(100),
  `adhaar_photo` varchar(100),
  `state_id` varchar(100) DEFAULT NULL,
  `district` varchar(100) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `addedby` int(11) NOT NULL,
  `entrydt` datetime NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB;


create table users(
`id` int AUTO_INCREMENT primary key,
`emp_id` int(11) NOT NULL,
`comp_id` int(11) NOT NULL,
`username` varchar(100) NOT NULL,
`password` varchar(100) NOT NULL,
`activation_code` varchar(100) NOT NULL,
`forgotten_password_code` varchar(100) NOT NULL,
`forgotten_password_time` datetime NOT NULL,
`role` enum('sa', 'admin', 'user', 'member') NOT NULL,
`authKey` varchar(100) NOT NULL,
`accessToken` varchar(200) NOT NULL,
`ip_address` varchar(100) NOT NULL,
`created_on` datetime NOT NULL,
`last_login` datetime NOT NULL,
`active` int(11) NOT NULL DEFAULT '0',
`is_password_update` int(11) NOT NULL DEFAULT '0',
`is_security_update` int(11) NOT NULL DEFAULT '0',
`mobile` varchar(10) NOT NULL,
`email` varchar(100) NOT NULL
)Engine=INNODB;

create table users_logins(
id int AUTO_INCREMENT primary key,
user_id int,
log_type enum('login','logout'),
in_out timestamp,
foreign key(user_id) references users(id) on delete cascade on update cascade
)Engine=INNODB;

CREATE TABLE `groups` (
  `id` int AUTO_INCREMENT primary key NOT NULL,
  `group_name` varchar(200) NOT NULL,
  `action` varchar(200) DEFAULT NULL,
  `isactive` int NOT NULL DEFAULT 1
) ENGINE=InnoDB;


CREATE TABLE `users_groups` (
  `id` int AUTO_INCREMENT primary key,
  `user_id` int NOT NULL,
  `group_id` int NOT NULL,
   foreign key(user_id) references users(id) on delete cascade on update cascade,
   foreign key(group_id) references groups(id) on delete cascade on update cascade
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `district` (
id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
name varchar(50)unique
)Engine=INNODB;
insert into district (`name`) values('Jabalpur');
insert into district (`name`) values('Mandla');
insert into district (`name`) values('Narsingpur');

CREATE TABLE IF NOT EXISTS `action_master` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
   group_id int,
  `action_type` enum('Main Menu','Sub Menu') NOT NULL,
  `action_id` int,
  `action_name` varchar(100) NOT NULL, 
  `action_url` varchar(100) NOT NULL,  
  `remark` text DEFAULT NULL,
  `addedby` int(11) DEFAULT '0',
  `entrydt` datetime,   
   updated_by int,
   updated_at timestamp,
  `is_active` int(11)DEFAULT '1',
   foreign key(group_id) references groups(id) on delete cascade on update cascade,
   foreign key(action_id) references action_master(id) on delete cascade on update cascade
) ENGINE=InnoDB;

ALTER TABLE `employee` ADD `emp_id` VARCHAR(50) NULL AFTER `id`;



CREATE TABLE IF NOT EXISTS `project` (
  `proj_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `proj_title` varchar(255) NOT NULL, 
  `proj_slug` text NOT NULL, 
  `proj_state` varchar(100) NOT NULL,  
  `proj_city` varchar(100) NOT NULL,  
  `proj_landmark` varchar(255) DEFAULT NULL,
  `proj_address` text DEFAULT NULL,
  `proj_remark` text DEFAULT NULL,
  `proj_addedby` int(11) NOT NULL,  
  `proj_entrydt` datetime NOT NULL,     
   proj_updated_by int,
   proj_updated_at timestamp,
  `proj_isactive` int(11)DEFAULT '1'
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `project_availabilities` (
  `avail_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `avail_projid` int(11) NOT NULL,
  `avail_title` int(11) NOT NULL,
  `avail_type` enum('Apartment','Singlex','Duplex','Other') NOT NULL,
  `avail_area_in_sqft` int NOT NULL,
  `avail_qty` int NOT NULL,
  `avail_bedroom` int NOT NULL,
  `avail_bathroom` int NOT NULL,
  `avail_price` decimal(10,2) NOT NULL,
  `avail_other_features` text DEFAULT NULL COMMENT 'comma separated other features',
  `avail_prop_dec` varchar(100) DEFAULT NULL,
  `avail_slug` text DEFAULT NULL,
  `avail_addedby` int(11) NOT NULL,  
  `avail_entrydt` datetime NOT NULL, 
  `avail_isactive` int(11)DEFAULT '1',
   foreign key(avail_projid) references project(proj_id) on delete cascade on update cascade
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `project_images` (
  `pimg_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `pimg_projid` int(11) NOT NULL,
  `pimg_propid` int(11) NOT NULL,
  `pimg_type` enum('Floor Plan','Other','Main') NOT NULL,
  `pimg_url` varchar(255) NOT NULL,
  `pimg_addedby` int(11) NOT NULL,  
  `pimg_entrydt` datetime NOT NULL, 
  `pimg_isactive` int(11)DEFAULT '1',
   foreign key(pimg_projid) references project(proj_id) on delete cascade on update cascade,
   foreign key(pimg_propid) references project_availabilities(avail_id) on delete cascade on update cascade
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `amenities` (
  `am_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `am_name` varchar(255) NOT NULL,
  `am_addedby` int(11) NOT NULL,  
  `am_entrydt` datetime NOT NULL, 
  `am_isactive` int(11)DEFAULT '1'
) ENGINE=InnoDB;



CREATE TABLE IF NOT EXISTS `slider` (
  `slid_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `slid_title` varchar(100) NOT NULL,
  `slid_desc` varchar(255) NOT NULL,
  `slid_url` varchar(255) NOT NULL,
  `slid_addedby` int(11) NOT NULL,  
  `slid_entrydt` datetime NOT NULL, 
  `slid_isactive` int(11)DEFAULT '1'
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `menues` (
  `menu_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `menu_pos` varchar(10) NOT NULL,
  `menu_title` varchar(255) NOT NULL,
  `menu_level` int(11) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_linktype` enum('fixed','editable') NOT NULL,
  `menu_pageurl` varchar(255) NOT NULL,
  `menu_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB;
INSERT INTO `menues` (`menu_id`, `menu_pos`, `menu_title`, `menu_level`, `menu_parent`, `menu_order`, `menu_linktype`, `menu_pageurl`, `menu_status`) VALUES
(1, 'top', 'Home', 1, 0, 1, 'fixed', 'web/index', 1),
(2, 'top', 'About Us', 1, 0, 2, 'editable', 'web/aboutus', 1),
(3, 'top', 'Property', 1, 0, 3, 'fixed', 'web/properties', 1),
(4, 'top', 'Contact Us', 1, 0, 4, 'fixed', 'web/contactus', 1);

CREATE TABLE `page_content` (
  `cont_id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `cont_menuid` int(11) NOT NULL,
  `cont_order` int(11) NOT NULL,
  `cont_title` varchar(255) NOT NULL,
  `cont_desc` text NOT NULL,
  `cont_image` varchar(255) NOT NULL,
  `cont_entrydt` datetime NOT NULL,
  `cont_status` int(11) NOT NULL DEFAULT '1',
   foreign key(cont_menuid) references menues(menu_id) on delete cascade on update cascade
) ENGINE=InnoDB;

ALTER TABLE `company` ADD `company_favicon` TEXT NOT NULL AFTER `company_logo`;
ALTER TABLE `company`  ADD `company_facebook` VARCHAR(255) NOT NULL  AFTER `contact_number`,  ADD `company_twitter` VARCHAR(255) NOT NULL  AFTER `company_facebook`,  ADD `company_linkedin` VARCHAR(255) NOT NULL  AFTER `company_twitter`,  ADD `company_skype` VARCHAR(255) NOT NULL  AFTER `company_linkedin`;
ALTER TABLE `project` ADD `proj_type` ENUM('government','educational','residential') NOT NULL AFTER `proj_id`;

ALTER TABLE `project_availabilities` CHANGE `avail_area_in_sqft` `avail_area_in_sqft` INT(11) NULL, CHANGE `avail_qty` `avail_qty` INT(11) NULL, CHANGE `avail_bedroom` `avail_bedroom` INT(11) NULL, CHANGE `avail_bathroom` `avail_bathroom` INT(11) NULL, CHANGE `avail_price` `avail_price` DECIMAL(10,2) NULL;

CREATE TABLE IF NOT EXISTS `testimonial` (
`id` int(11) primary key auto_increment,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_bin,
  `date` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `isactive` int(11) DEFAULT '1'
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `gallery` (
`id` int(11) primary key auto_increment,
  `type` enum('Government','Educational','Residencial') NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `desc` varchar(100) DEFAULT NULL,
  `isactive` int(11) DEFAULT '1'
) ENGINE=InnoDB;

ALTER TABLE `project` ADD `proj_status` ENUM('Upcoming','Ongoing','Completed') NULL AFTER `proj_remark`;


















