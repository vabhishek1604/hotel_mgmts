CREATE TABLE `biometric_attendance`(
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  user_id INT NOT NULL,
  type ENUM('in', 'out'),
  log_date DATETIME,
  created_date DATETIME,
  current_date DATE DEFAULT NULL,
  isUpated INT DEFAULT 0,
  created_at datetime,
  updated_by int,
  updated_at timestamp
) ENGINE = InnoDB;