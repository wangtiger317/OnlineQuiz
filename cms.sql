/*
SQLyog Professional v12.09 (64 bit)
MySQL - 10.3.16-MariaDB : Database - cms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cms` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cms`;

/*Table structure for table `absence` */

DROP TABLE IF EXISTS `absence`;

CREATE TABLE `absence` (
  `id` int(121) NOT NULL AUTO_INCREMENT,
  `student_id` int(121) NOT NULL,
  `subject_id` int(121) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `NIM` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendance_time` time DEFAULT NULL,
  `score` float DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`users_id`),
  CONSTRAINT `absence_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `absence` */

insert  into `absence`(`id`,`student_id`,`subject_id`,`subject`,`NIM`,`name`,`gender`,`day`,`date`,`attendance_time`,`score`) values (1,25,1,'Physics','7','michel','female','Monday','2019-10-04','08:00:00',100),(2,26,1,'Physics','8','jacky','male','Tuesday','2019-10-05','09:00:00',90),(3,23,5,'Maths','6','soni','female','Tuesday','2019-10-06','08:00:00',75),(4,22,2,'Chemistry','5','susanna','female','Wednesday','2019-10-07','09:00:00',40),(5,13,4,'Algebra','1','sandy','male','Wednesday','2019-10-07','09:00:00',80),(6,14,5,'Maths','2','sue','female','Thursday','2019-10-08','11:00:00',67),(7,15,2,'Chemistry','3','piter','male','Thursday','2019-10-08','10:00:00',80),(8,16,4,'Algebra','4','eduardo','male','Friday','2019-10-09','09:00:00',90),(9,25,1,'Physics','7','michel','female','Saturday','2019-10-18','07:00:00',100),(10,25,1,'Physics','7','michel','female','Monday','2019-10-21','01:04:33',100);

/*Table structure for table `permission` */

DROP TABLE IF EXISTS `permission`;

CREATE TABLE `permission` (
  `id` int(122) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(250) DEFAULT NULL,
  `data` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `permission` */

insert  into `permission`(`id`,`user_type`,`data`) values (1,'Member','{\"users\":{\"own_create\":\"1\",\"own_read\":\"1\",\"own_update\":\"1\",\"own_delete\":\"1\"}}'),(2,'admin','{\"users\":{\"own_create\":\"1\",\"own_read\":\"1\",\"own_update\":\"1\",\"own_delete\":\"1\",\"all_create\":\"1\",\"all_read\":\"1\",\"all_update\":\"1\",\"all_delete\":\"1\"}}');

/*Table structure for table `quiz` */

DROP TABLE IF EXISTS `quiz`;

CREATE TABLE `quiz` (
  `id` int(121) NOT NULL AUTO_INCREMENT,
  `subject_id` int(121) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `timelimit` int(121) DEFAULT NULL,
  `quiz_code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `question` varchar(255) DEFAULT NULL,
  `answer_1` varchar(255) DEFAULT NULL,
  `answer_2` varchar(255) DEFAULT NULL,
  `answer_3` varchar(255) DEFAULT NULL,
  `answer_4` varchar(255) DEFAULT NULL,
  `correct_answer` varchar(255) DEFAULT NULL,
  `correct_answer_id` varchar(255) DEFAULT NULL,
  `question_image` varchar(255) DEFAULT NULL,
  `score_weight` int(121) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `quiz` */

insert  into `quiz`(`id`,`subject_id`,`subject`,`timelimit`,`quiz_code`,`image`,`description`,`title`,`question`,`answer_1`,`answer_2`,`answer_3`,`answer_4`,`correct_answer`,`correct_answer_id`,`question_image`,`score_weight`) values (1,1,'Physics',20,'12345678','uploads/1.jpg','Newton\'s Law','About Newton\'s Law','question20','OK','NO','TRUE','FALSE','OK','1',NULL,100),(2,1,'Physics',10,'LOlFE52QXy','uploads/2.jpg','Gravity Law','About Gravity Law','question10','1','True','3','4','True','2',NULL,100),(3,2,'Chemistry',15,'123456','uploads/3.jpg','Dalton\'s Law','About Chemists','question15','That\'s it','2','3','4','That\'s it','1',NULL,100),(4,4,'Algebra',10,'123','uploads/4.jpg','Main Principle','About Matrix','question10','Brave','2','3','4','Brave','1',NULL,100),(5,5,'Maths',5,'12','uploads/5.jpg','Gauss Principle','Polygon','question5','Right','2','3','4','Right','1',NULL,100),(6,1,'Physics',5,'Abbj7hpfyc','uploads/por4.jpg','About the Earth','Our Planet Earth','What is the age of the Earth?','1','4600 million years','3','4','4600 million years','2','uploads/first.jpg',50),(8,1,'Physics',5,'cNbGwa5xXB','uploads/slider (2).jpg','aaa','pre test','2 + 2','4','5','6','7','4','1','uploads/por7.jpg',50),(9,1,'Physics',5,'cNbGwa5xXB','uploads/slider (2).jpg','aaa','pre test','3 + 3','4','5','6','7','6','3','uploads/first.jpg',50),(10,1,'Physics',5,'Abbj7hpfyc','uploads/por4.jpg','About the Earth','Our Planet Earth','What is the planet?','1','It\'s 222','3','4','It\'s 222','2','uploads/slider (8).jpg',50),(11,1,'Physics',5,'w8qFe1Gedn','uploads/11.jpg','this is a test','success','55','1','2','3','4','2','2','uploads/business_man1.jpg',50),(12,1,'Physics',15,'w8qFe1Gedn','uploads/11.jpg','this is a test','success','66','1','2','3','4','3','3','uploads/business_man1.jpg',50),(13,1,'Physics',5,'jBeeLMkEiT','uploads/first.jpg','This is a pre-test','This is a pre-test','7 - 7','7','14','21','0','0','4','uploads/second.jpg',50),(14,1,'Physics',10,'jBeeLMkEiT','uploads/first.jpg','This is a pre-test','This is a pre-test','9 * 9','18','27','81','0','81','3','uploads/third.jpg',50);

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id` int(122) unsigned NOT NULL AUTO_INCREMENT,
  `keys` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `setting` */

insert  into `setting`(`id`,`keys`,`value`) values (1,'website','If-Quiz management system'),(2,'logo','logo.png'),(3,'favicon','favicon.ico'),(4,'SMTP_EMAIL',''),(5,'HOST',''),(6,'PORT',''),(7,'SMTP_SECURE',''),(8,'SMTP_PASSWORD',''),(9,'mail_setting','simple_mail'),(10,'company_name','Company Name'),(11,'crud_list','users,User'),(12,'EMAIL',''),(13,'UserModules','yes'),(14,'register_allowed','1'),(15,'email_invitation','1'),(16,'admin_approval','0'),(17,'user_type','[\"Member\"]');

/*Table structure for table `subjects` */

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(121) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `subjects` */

insert  into `subjects`(`id`,`subject`) values (1,'Physics'),(2,'Chemistry'),(3,'Sport'),(4,'Algebra'),(5,'Maths');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `users_id` int(121) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `is_deleted` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `NIP` varchar(255) DEFAULT NULL,
  `Gender` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`users_id`,`user_id`,`status`,`is_deleted`,`name`,`NIP`,`Gender`,`password`,`email`,`subject`,`user_type`) values (1,'1','active','0','admin',NULL,NULL,'$2y$10$08X24G5Lp9lszOXwtyKA3uA2epem0ynNf9DUr.RE2USz/YeqmOPXC','ptfe0310@outlook.com',NULL,'admin'),(10,NULL,'active','0','Marry','3','female','$2y$10$Y6L9kd5fVa4drj.0vXY22Oy8HP8TA8iK3y7x9hFxgbEWOe8bfMUBq','Marry@example.com','Geometry','Teacher'),(11,NULL,'active','0','Anna','4','female','$2y$10$y28wSQIoqA0FXFZZWgogNuWWyUB2NS/jHtreQjNJWvo2XgEIZDGRO','Anna@example.com','Physics','Teacher'),(12,NULL,'active','0','super','5','male','$2y$10$ABOHr7sZiSLknOJkZqIUoeRwIoYoykNn2x02HZDEoC.Su0F/EWYGu','super@example.com','Maths','Teacher'),(13,NULL,'active','0','sandy','1','male','$2y$10$Kc0ynMP4U4B1FoCSGVl9E.0m8bkOPJUcCgIV2/6jbp8f87EAiTKh6','sandy@example.com',NULL,'Student'),(14,NULL,'active','0','sue','2','female','$2y$10$rpo0QigjpwW83ZguzPQsTe.KccjHWQMW6Z5k33.n6.jY4WiiF0MsW','sue@example.com',NULL,'Student'),(15,NULL,'active','0','piter','3','male','$2y$10$mWvTCJ6i.ktRdX0STiW.mOlAwafXvdz138ppEFhPR5WIPSyyp9iAO','piter@example.com',NULL,'Student'),(16,NULL,'active','0','eduardo','4','male','$2y$10$xqp2y23u.7ouEJFfZuE5cOP9XzNNEqFoJ/MK8EwAz6HMg1Xr5ZvY.','eduardo@example.com',NULL,'Student'),(21,NULL,'active','0','David','6','male','$2y$10$Ea.hEawgVWdBLIWPlWG1iOCGBmK5ZiqGeVoexpvZb5yh7wDuA2gCi','David@example.com','Physics','Teacher'),(22,NULL,'active','0','susanna','5','female','$2y$10$Q104VpFZtqOew4FlaujVre63ijy4RGF.K4vvjQcUkpxU9CR1zELRy','susanna@example.com',NULL,'Student'),(23,NULL,'active','0','soni','6','female','$2y$10$0xVYqjeIarbv.vxZplXR9.ROyqD5M8b8fdnEryaODl1P3V1LKzb42','soni@example.com',NULL,'Student'),(24,NULL,'active','0','kitty','7','female','$2y$10$aa1Se69qLW/A/0mcyTqSUewl6G9cEUVgCFDsC7yAJDdu0sPrm0fYC','kitty@example.com','Chemistry','Teacher'),(25,NULL,'active','0','michel','7','female','$2y$10$mSW.RGrQJfe8cncdaEcoo.OdURqj7g95iIdrVh1BL/vMJc8ONbHjO','michel@example.com',NULL,'Student'),(26,NULL,'active','0','jacky','8','male','$2y$10$YrzjJJqxUrmEAuCh6Q9wwOSY0rxI6.rEXWNO5mCMNyti4YoYsnKpm','jacky@example.com',NULL,'Student'),(27,NULL,'active','0','kiara','8','female','$2y$10$b7f5N9AVsz3Dby3gMiYgbOQMVHC3BBOGt/QqDjM.OHaz4kubHlGoi','kiara@example.com','Maths','Teacher'),(28,NULL,'active','0','smith','9','male','$2y$10$WSjVRukiG/xCpeiYFw7ULeUGqoOyqU0Mu7k0dgCsd14PU4cZkMpry','smith@example.com',NULL,'Student'),(29,NULL,'active','0','sarah','9','female','$2y$10$aXrS2CMBa6uEpeetlDnqUuVGj6VsWJu6GxZJYDUnYar9UYNZg32z2','sarah@example.com','Sport','Teacher');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
