/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 5.6.12-log : Database - ebose_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ebose_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `onlineGrosery`;

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(44) NOT NULL,
  `pid` varchar(44) NOT NULL,
  `qty` varchar(44) NOT NULL,
  `total` varchar(44) NOT NULL,
  `status` varchar(44) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `cart` */

insert  into `cart`(`cid`,`uid`,`pid`,`qty`,`total`,`status`) values 
(1,'1','1','4','1596','Delivered'),
(2,'1','3','4','600','Delivered'),
(3,'2','4','10','100','Pending'),
(4,'2','3','3','450','Pending'),
(5,'1','1','3','1197','Delivered'),
(6,'1','4','10','100','Delivered'),
(7,'1','6','4','140','Delivered'),
(8,'1','3','4','600','Delivered'),
(9,'1','6','10','350','Delivered'),
(10,'1','3','10','1500','Delivered'),
(11,'1','6','16','560','Delivered');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(44) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`cid`,`category`) values 
(1,'Veg'),
(2,'Non Veg'),
(3,'Ice Cream'),
(4,'Sweets');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(44) NOT NULL,
  `uname` varchar(44) NOT NULL,
  `psw` varchar(44) NOT NULL,
  `type` varchar(44) NOT NULL,
  `status` varchar(44) NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`lid`,`uid`,`uname`,`psw`,`type`,`status`) values 
(1,'0','admin@gmail.com','admin','admin','Approved'),
(2,'1','tom@gmail.com','tom123','user','Approved'),
(3,'2','bibi@gmail.com','bib123','user','Approved'),
(4,'3','jeena@gmail.com','jeena123','user','Approved'),
(5,'4','jintu@gmail.com','jintu','user','Approved');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `pname` varchar(44) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `cat` varchar(44) NOT NULL,
  `price` varchar(40) NOT NULL,
  `stock` varchar(40) NOT NULL,
  `pimg` varchar(40) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`pid`,`pname`,`desc`,`cat`,`price`,`stock`,`pimg`) values 
(1,'Pizza','Pizza is an Italian dish consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients, which is then baked at a high temperature, traditionally in a wood-fired oven.','Non Veg','399','18','images/pizza.jpg'),
(3,'Cheeseburger','A cheeseburger is a hamburger topped with cheese. Traditionally, the slice of cheese is placed on top of the meat patty. The cheese is usually added to the cooking hamburger patty shortly before serving, which allows the cheese to melt. ','Non Veg','150','6','images/cheeseburger.jpg'),
(4,'laddu','Laddu or laddoo, also called avinsh, is a sphere-shaped sweet originating from the Indian subcontinent. Laddus are primarily made from flour, fat and sugar. Laddus are often made of gram flour but can also be made with semolina.','Veg','10','5','images/laddu.jpg'),
(6,'Pottato Chips','A potato chip is a thin slice of potato that has been either deep fried or baked until crunchy. They are commonly served as a snack, side dish, or appetizer.','Veg','35','20','images/chips.jpg');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(44) NOT NULL,
  `address` varchar(100) NOT NULL,
  `place` varchar(44) NOT NULL,
  `age` varchar(44) NOT NULL,
  `gender` varchar(44) NOT NULL,
  `phone` varchar(44) NOT NULL,
  `email` varchar(44) NOT NULL,
  `img` longblob NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`uid`,`name`,`address`,`place`,`age`,`gender`,`phone`,`email`,`img`) values 
(1,'Tom','Kuttamassery, Thottumugham, Kerala 683105','Aluva','24','male','9587646738','tom@gmail.com','images/c1.jpg'),
(2,'Bibi','Thottakkattukara, Aluva, Kerala','Aluva','29','female','9946038887','bibi@gmail.com','images/testi3.jpg'),
(3,'Jeena','PNRA-101, Padivattom, Edappally, Kochi, Kerala 682024','Edappally','28','female','9888474974','jeena@gmail.com','images/testi2.jpg'),
(4,'Jintu','PNRA-101, Padivattom, Edappally, Kochi, Kerala 682024','Edappally','28','male','9487489384','jintu@gmail.com','images/c4.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
