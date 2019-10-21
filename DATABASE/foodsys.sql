create database foodsys
use food

/* if this code doesnt run plz exceute above code at first the the other*/


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


--
-- Database: `foodsys`
--

-- --------------------------------------------------------



CREATE TABLE IF NOT EXISTS `category` (
`categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;



INSERT INTO `category` (`categoryid`, `catname`) VALUES
(4, 'BREAKFAST'),
(5, 'LUNCH'),
(6, 'DINNER'),
(7, 'BEVERAGES');


CREATE TABLE IF NOT EXISTS `product` (
`productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--


INSERT INTO `product` (`productid`, `categoryid`, `productname`, `price`, `photo`) VALUES
(14, 4, 'Pancake Tacos with Cheese and ', 400, 'upload/pancake_breakfast_tacos400_1539096003.jpg'),
(15, 4, 'Egg Baked In Tomatoes', 310, 'upload/eggs_in_tomatoes_1539095833.jpeg'),
(16, 5, 'Beef & Broccoli Stir-Fry', 360, 'upload/brocollibeef_1539096616_1539097842.jpg'),
(17, 5, 'Spaghetti', 400, 'upload/spagetti_1539097965.png'),
(18, 7, 'Mojito', 200, 'upload/http _cdn.cnn.com_cnnnext_dam_assets_170224172523-mojito_1539097580.jpg'),
(19, 7, 'Sex On The Beach', 250, 'upload/http _cdn.cnn.com_cnnnext_dam_assets_170227111426-sex-on-the-beach-cocktail_1539097662.jpg'),
(20, 6, 'Slow Cooker Orange Chicken ', 450, 'upload/slow-cooker-chicken-recipes-orange-1533576720_1539097827.jpg'),
(21, 4, 'Eggs in a Basket', 375, 'upload/egg_in_a_hole_recipe400_1539096098.jpg'),
(22, 4, 'Full English Breakfast', 600, 'upload/1145_1539096763.jpg'),
(23, 7, 'Coca-Cola', 80, 'upload/cocacola_1539097796.jpg');

-- --------------------------------------------------------


CREATE TABLE IF NOT EXISTS `purchase` (
`purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `total` double  DEFAULT '0'NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--

--

INSERT INTO `purchase` (`purchaseid`, `customer`, `total`, `date_purchase`) VALUES
(8, 'Neovic', 600, '2017-12-06 15:29:00'),
(9, 'demo', 450, '2018-10-09 20:19:43');

-- --------------------------------------------------------

--
--
--

CREATE TABLE IF NOT EXISTS `purchase_detail` (
`pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(13, 8, 15, 2),
(14, 8, 17, 2),
(15, 8, 18, 2),
(16, 9, 15, 3);

--

--
ALTER TABLE `category`
 ADD PRIMARY KEY (`categoryid`);

--

--
ALTER TABLE `product`
 ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`purchaseid`);

--
--
ALTER TABLE `purchase_detail`
 ADD PRIMARY KEY (`pdid`);

--
--
--

--
--
--
ALTER TABLE `category`
MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--

--
ALTER TABLE `product`
MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;

--
ALTER TABLE `purchase`
MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--

--
ALTER TABLE `purchase_detail`
MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;


 CREATE TABLE IF NOT EXISTS users ( 
 userid INT(5) NOT NULL AUTO_INCREMENT , 
 firstname VARCHAR( 50 ) NOT NULL , 
 lastname VARCHAR( 32 ) NOT NULL , 
 tell VARCHAR( 50 ) NOT NULL , 
 address VARCHAR( 50 ) NOT NULL , 
 pass VARCHAR( 50 ) NOT NULL , 
 PRIMARY KEY ( userid )
 )