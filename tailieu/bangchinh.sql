/*M!999999\- enable the sandbox mode */
-- MariaDB dump 10.19  Distrib 10.6.19-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: qvc_db
-- ------------------------------------------------------
-- Server version	10.1.48-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `idv_attribute`
--

DROP TABLE IF EXISTS `idv_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_attribute` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scope` tinyint(1) NOT NULL DEFAULT '0',
  `attribute_code` varchar(30) NOT NULL DEFAULT '0',
  `filterCol` varchar(4) NOT NULL DEFAULT '0',
  `categoryId` mediumint(10) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) NOT NULL DEFAULT '0',
  `name_index` varchar(250) NOT NULL DEFAULT '0',
  `isSearch` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(250) NOT NULL DEFAULT '0',
  `isDisplay` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `isHeader` tinyint(1) NOT NULL DEFAULT '0',
  `isMulti` tinyint(1) NOT NULL DEFAULT '0',
  `in_summary` tinyint(1) NOT NULL DEFAULT '0',
  `for_product_option` tinyint(1) NOT NULL DEFAULT '0',
  `value_count` smallint(6) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `attribute_code` (`attribute_code`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_attribute_category`
--

DROP TABLE IF EXISTS `idv_attribute_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_attribute_category` (
  `attr_id` int(11) NOT NULL DEFAULT '0',
  `category_id` int(11) NOT NULL DEFAULT '0',
  `seller_id` int(11) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  KEY `category_id` (`category_id`),
  KEY `seller_id` (`seller_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_attribute_value`
--

DROP TABLE IF EXISTS `idv_attribute_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_attribute_value` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `attributeId` int(10) unsigned NOT NULL DEFAULT '0',
  `value` varchar(200) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '',
  `api_key` varchar(200) NOT NULL DEFAULT '0',
  `value_en` varchar(150) NOT NULL DEFAULT '0',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `value_sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `attributeId` (`attributeId`),
  KEY `ordering` (`ordering`),
  KEY `api_key` (`api_key`)
) ENGINE=MyISAM AUTO_INCREMENT=224 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_brand`
--

DROP TABLE IF EXISTS `idv_brand`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_brand` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `brand_index` varchar(100) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '0',
  `summary` text,
  `image` varchar(150) NOT NULL DEFAULT '0',
  `product` mediumint(9) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `letter` char(2) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `brand_page_view` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `letter` (`letter`),
  KEY `brand_index` (`brand_index`)
) ENGINE=MyISAM AUTO_INCREMENT=189 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_coupon`
--

DROP TABLE IF EXISTS `idv_coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_coupon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `code_type` enum('auto','manual') NOT NULL DEFAULT 'auto',
  `title` varchar(250) NOT NULL DEFAULT '0',
  `description` text,
  `type` enum('pro','cash','priceoff','other') NOT NULL DEFAULT 'other',
  `content` varchar(50) NOT NULL DEFAULT '0',
  `valid_order_value` double NOT NULL DEFAULT '0',
  `from_time` int(11) NOT NULL DEFAULT '0',
  `to_time` int(11) NOT NULL DEFAULT '0',
  `limit_use_per_user` mediumint(9) NOT NULL DEFAULT '1',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `total` mediumint(9) NOT NULL DEFAULT '0',
  `total_use` mediumint(9) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(50) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  `last_update_by` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `from_time` (`from_time`,`to_time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_coupon_use`
--

DROP TABLE IF EXISTS `idv_coupon_use`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_coupon_use` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL DEFAULT '0',
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `order_id` int(11) NOT NULL DEFAULT '0',
  `use_time` int(11) NOT NULL DEFAULT '0',
  `message` varchar(200) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `code` (`code`,`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_category`
--

DROP TABLE IF EXISTS `idv_seller_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catPath` varchar(250) NOT NULL DEFAULT '0',
  `childListId` text,
  `display_option` varchar(15) NOT NULL DEFAULT 'product',
  `request_path` text,
  `url` varchar(200) NOT NULL DEFAULT '0',
  `url_hash` varchar(40) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL DEFAULT '0',
  `summary` varchar(500) NOT NULL DEFAULT '0',
  `tags` text,
  `isParent` tinyint(1) NOT NULL DEFAULT '0',
  `imgUrl` varchar(150) NOT NULL DEFAULT '0',
  `img_big` varchar(150) NOT NULL DEFAULT '0',
  `image_background` varchar(150) NOT NULL DEFAULT '',
  `useImg` tinyint(1) NOT NULL DEFAULT '0',
  `toUrl` varchar(250) NOT NULL DEFAULT '0',
  `parentId` int(10) unsigned NOT NULL DEFAULT '0',
  `proCount` mediumint(9) NOT NULL DEFAULT '0',
  `attr_count` smallint(6) NOT NULL DEFAULT '0',
  `priceRange` varchar(150) NOT NULL DEFAULT '0',
  `keyword` varchar(200) NOT NULL DEFAULT '0',
  `replacewords` varchar(400) NOT NULL,
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createBy` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdateBy` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(250) NOT NULL DEFAULT '0',
  `meta_keyword` varchar(200) NOT NULL DEFAULT '0',
  `meta_description` varchar(500) NOT NULL DEFAULT '0',
  `url_canonical` varchar(250) NOT NULL DEFAULT '0',
  `live_support` text,
  `visit` mediumint(9) NOT NULL DEFAULT '0',
  `like_count` mediumint(9) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `redirect_url` varchar(200) NOT NULL DEFAULT '0',
  `template` varchar(50) NOT NULL DEFAULT '0',
  `number_display` smallint(6) NOT NULL DEFAULT '0',
  `brand_url` text,
  PRIMARY KEY (`id`),
  KEY `url_hash` (`url_hash`)
) ENGINE=MyISAM AUTO_INCREMENT=408 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_category_special`
--

DROP TABLE IF EXISTS `idv_category_special`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_category_special` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL DEFAULT '0',
  `url_hash` varchar(40) NOT NULL DEFAULT '0',
  `is_parent` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` mediumint(9) NOT NULL DEFAULT '0',
  `child_list_id` varchar(255) NOT NULL DEFAULT '0',
  `cat_path` varchar(150) NOT NULL DEFAULT '0',
  `icon_url` varchar(150) NOT NULL DEFAULT '0',
  `store_cat_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '0',
  `index_key` varchar(100) NOT NULL DEFAULT '0',
  `name_search` varchar(250) NOT NULL DEFAULT '0',
  `query_condition` text,
  `description` text,
  `product_count` mediumint(9) NOT NULL DEFAULT '0',
  `product_query_condition` text,
  `day_to_reset` tinyint(4) NOT NULL DEFAULT '5',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `home_page` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `visit` mediumint(9) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `create_by` varchar(50) NOT NULL DEFAULT '0',
  `last_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `meta_title` varchar(250) NOT NULL DEFAULT '0',
  `meta_keyword` varchar(250) NOT NULL DEFAULT '0',
  `meta_description` text,
  PRIMARY KEY (`id`),
  KEY `url_hash` (`url_hash`),
  FULLTEXT KEY `name_search` (`name_search`)
) ENGINE=MyISAM AUTO_INCREMENT=19282 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_category_special_product`
--

DROP TABLE IF EXISTS `idv_category_special_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_category_special_product` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `special_cat_id` smallint(6) NOT NULL DEFAULT '0',
  `seller_id` int(11) NOT NULL DEFAULT '0',
  `product_id` int(11) NOT NULL DEFAULT '0',
  `product_cat_id` mediumint(9) NOT NULL DEFAULT '0',
  `create_by` mediumint(9) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `price` text,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `special_cat_id` (`special_cat_id`),
  KEY `ordering` (`ordering`)
) ENGINE=MyISAM AUTO_INCREMENT=104741 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_product_attribute`
--

DROP TABLE IF EXISTS `idv_product_attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_product_attribute` (
  `pro_id` int(10) unsigned NOT NULL DEFAULT '0',
  `attr_id` int(11) NOT NULL DEFAULT '0',
  `attr_value_id` int(11) NOT NULL DEFAULT '0',
  `value_sort` int(11) NOT NULL DEFAULT '0',
  KEY `proId` (`pro_id`),
  KEY `attr_value_id` (`attr_value_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_product_category`
--

DROP TABLE IF EXISTS `idv_product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_product_category` (
  `category_id` int(11) NOT NULL DEFAULT '0',
  `pro_id` int(11) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `name_sort` varchar(10) NOT NULL DEFAULT '0',
  `brandId` mediumint(9) NOT NULL DEFAULT '0',
  `supplier_id` mediumint(9) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `quantity` mediumint(9) NOT NULL DEFAULT '0',
  `online_only` tinyint(4) NOT NULL DEFAULT '0',
  `ranking` mediumint(9) NOT NULL DEFAULT '0',
  `review_rate` smallint(6) NOT NULL DEFAULT '0',
  `hasVAT` tinyint(4) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  `visit` mediumint(9) NOT NULL DEFAULT '0',
  `from_time` int(11) NOT NULL DEFAULT '0',
  `to_time` int(11) NOT NULL DEFAULT '0',
  KEY `category_id` (`category_id`),
  KEY `pro_id` (`pro_id`),
  KEY `price` (`price`),
  KEY `brandId` (`brandId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_combo_deal`
--

DROP TABLE IF EXISTS `idv_combo_deal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_combo_deal` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '0',
  `description` text,
  `total_price` int(11) NOT NULL DEFAULT '0',
  `sale_price` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `from_time` int(11) NOT NULL DEFAULT '0',
  `to_time` int(11) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `pro_count` smallint(6) NOT NULL DEFAULT '0',
  `buy_count` mediumint(9) NOT NULL DEFAULT '0',
  `last_buy_time` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` mediumint(9) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  `last_update_by` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `last_update` (`last_update`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_combo_deal_detail`
--

DROP TABLE IF EXISTS `idv_combo_deal_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_combo_deal_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `combo_id` mediumint(9) NOT NULL DEFAULT '0',
  `pro_id` int(11) NOT NULL DEFAULT '0',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `combo_id` (`combo_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_sell_product_index`
--

DROP TABLE IF EXISTS `idv_sell_product_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_sell_product_index` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proName` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19627 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_sell_product_store`
--

DROP TABLE IF EXISTS `idv_sell_product_store`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_sell_product_store` (
    `id` int(11) unsigned NOT NULL,  *
    `realProId` int(11) NOT NULL DEFAULT '0',
    `similar_count` smallint(6) NOT NULL DEFAULT '0',
    `product_cat` varchar(100) NOT NULL DEFAULT '0',
    `request_path` text,
    `storeSKU` varchar(100) NOT NULL DEFAULT '0',
    `productModel` varchar(100) NOT NULL DEFAULT '0',
    `brandId` mediumint(9) NOT NULL DEFAULT '0',
    `proName` varchar(255) NOT NULL DEFAULT '0',
    `url` varchar(250) NOT NULL DEFAULT '0',
    `url_hash` varchar(40) NOT NULL DEFAULT '0',
    `proThum` varchar(250) NOT NULL DEFAULT '0',
    `image_count` smallint(6) NOT NULL DEFAULT '0',
    `customer_image` mediumint(9) NOT NULL DEFAULT '0',
    `proSummary` text,
    `deslen` mediumint(8) unsigned NOT NULL DEFAULT '0',
    `warranty` varchar(101) NOT NULL DEFAULT '0',
    `specialOffer` text,
    `offer_from_date` int(11) NOT NULL DEFAULT '0',
    `offer_to_date` int(11) NOT NULL DEFAULT '0',
    `promotion` text,
    `shipping` varchar(100) NOT NULL DEFAULT '0',
    `postDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    `cond` varchar(100) NOT NULL DEFAULT '0',
    `hasVAT` tinyint(1) NOT NULL DEFAULT '0',
    `visit` mediumint(9) NOT NULL DEFAULT '0',
    `like_count` mediumint(9) NOT NULL DEFAULT '0',
    `buy_count` mediumint(9) NOT NULL DEFAULT '0',
    `review_rate` smallint(6) NOT NULL DEFAULT '0',
    `review_count` mediumint(9) NOT NULL DEFAULT '0',
    `config_count` smallint(6) NOT NULL DEFAULT '0',
    `config_json` text,
    `hot_type` varchar(60) NOT NULL DEFAULT '0',
    `meta_title` varchar(250) NOT NULL DEFAULT '0',
    `meta_keyword` varchar(250) NOT NULL DEFAULT '0',
    `meta_description` text,
    `url_canonical` varchar(250) NOT NULL DEFAULT '0',
    `combo_count` mediumint(9) NOT NULL DEFAULT '0',
    `question_count` mediumint(9) NOT NULL DEFAULT '0',
    `has_video` tinyint(1) NOT NULL DEFAULT '0',
    `accessory_count` smallint(6) NOT NULL DEFAULT '0',
    `manual_url` varchar(250) NOT NULL DEFAULT '0',
    `weight` mediumint(9) NOT NULL DEFAULT '0',
    `allow_se_index` tinyint(1) NOT NULL DEFAULT '1',
    `insider_keyword` varchar(150) NOT NULL DEFAULT '0',
    `thum_poster` varchar(250) DEFAULT '0',
    `related_keywords` text,
    `accessory` varchar(250) DEFAULT '0',
    `relate_collection` varchar(150) NOT NULL DEFAULT '0',
    `image_collection` text,
    `variant_option` text,
    `lienquan` text,
    `idhnc` int(11) DEFAULT NULL,
    `pricehnc` int(11) DEFAULT '0',
    `quantityhnc` int(11) DEFAULT NULL,
    `idap` int(11) DEFAULT NULL,
    `priceap` int(11) DEFAULT NULL,
    `quantityap` int(11) DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `url_hash` (`url_hash`),
    KEY `text` (`proName`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_sell_product_price`
--

DROP TABLE IF EXISTS `idv_sell_product_price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_sell_product_price` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `brandId` mediumint(9) NOT NULL DEFAULT '0',
  `supplier_id` mediumint(9) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `price_unit` char(10) NOT NULL DEFAULT 'unit',
  `old_price` double NOT NULL DEFAULT '0',
  `market_price` double NOT NULL DEFAULT '0',
  `bulk_price` text,
  `price_usd` double NOT NULL DEFAULT '0',
  `promotion_price` double NOT NULL DEFAULT '0',
  `promotion_price_from_time` int(11) NOT NULL DEFAULT '0',
  `promotion_price_to_time` int(11) NOT NULL DEFAULT '0',
  `currency` char(4) NOT NULL DEFAULT 'vnd',
  `quantity` mediumint(9) NOT NULL DEFAULT '-1',
  `hasOffer` tinyint(1) NOT NULL DEFAULT '0',
  `isOn` tinyint(1) NOT NULL DEFAULT '1',
  `sealMaf` tinyint(1) NOT NULL DEFAULT '0',
  `wholesale` tinyint(1) NOT NULL DEFAULT '0',
  `oath` tinyint(1) NOT NULL DEFAULT '0',
  `warrantyPaper` tinyint(1) NOT NULL DEFAULT '0',
  `returnAccept` tinyint(1) NOT NULL DEFAULT '0',
  `shippingFee` mediumint(9) NOT NULL DEFAULT '0',
  `rewardPoint` smallint(6) NOT NULL DEFAULT '0',
  `couponValue` int(11) NOT NULL DEFAULT '0',
  `shipFast` tinyint(1) NOT NULL DEFAULT '0',
  `onlineOnly` tinyint(1) NOT NULL DEFAULT '0',
  `ranking` mediumint(9) NOT NULL DEFAULT '0',
  `cond` char(1) NOT NULL DEFAULT '0',
  `hasVAT` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdateBy` varchar(50) NOT NULL DEFAULT '0',
  `purchase_price` double NOT NULL DEFAULT '0',
  `from_time` int(11) NOT NULL DEFAULT '0',
  `to_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `brandId` (`brandId`),
  KEY `price` (`price`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_sell_product_filter`
--

DROP TABLE IF EXISTS `idv_sell_product_filter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_sell_product_filter` (
  `pro_id` int(11) NOT NULL DEFAULT '0',
  `attr_value_com` varchar(255) NOT NULL DEFAULT '0',
  `attr_value_com_index` varchar(35) NOT NULL DEFAULT '0',
  `attr_id` int(11) NOT NULL DEFAULT '0',
  `seller_id` int(11) NOT NULL DEFAULT '0',
  KEY `attr_value_com_index` (`attr_value_com_index`),
  KEY `pro_id` (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_sell_product_review`
--

DROP TABLE IF EXISTS `idv_sell_product_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_sell_product_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_count` mediumint(9) NOT NULL DEFAULT '0',
  `pro_id` int(11) NOT NULL DEFAULT '0',
  `pro_name` varchar(200) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_email` varchar(150) NOT NULL DEFAULT '0',
  `user_name` varchar(150) NOT NULL DEFAULT '0',
  `review_rate` smallint(6) NOT NULL DEFAULT '0',
  `review_title` varchar(250) NOT NULL DEFAULT '0',
  `review_content` text,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `post_time` int(11) NOT NULL DEFAULT '0',
  `last_update_by` varchar(50) NOT NULL DEFAULT '0',
  `last_update_time` int(11) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `people_id_vote` text,
  `people_like_count` mediumint(9) NOT NULL DEFAULT '0',
  `people_dislike_count` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pro_id` (`pro_id`),
  KEY `user_email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_sell_product_image_name`
--

DROP TABLE IF EXISTS `idv_sell_product_image_name`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_sell_product_image_name` (
  `imgId` int(11) NOT NULL AUTO_INCREMENT,
  `proId` int(11) NOT NULL DEFAULT '0',
  `imgName` varchar(250) NOT NULL DEFAULT '0',
  `imgOrder` smallint(6) NOT NULL DEFAULT '0',
  `isMain` tinyint(1) NOT NULL DEFAULT '0',
  `alt` varchar(255) NOT NULL DEFAULT '',
  `imgWidth` smallint(6) NOT NULL DEFAULT '0',
  `imgHeight` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`imgId`),
  KEY `proId` (`proId`)
) ENGINE=MyISAM AUTO_INCREMENT=34547 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_sell_product_info`
--

DROP TABLE IF EXISTS `idv_sell_product_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_sell_product_info` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `description` text,
  `deslen` mediumint(9) NOT NULL DEFAULT '0',
  `spec` text,
  `instruction` text,
  `video_code` text,
  `tags` text,
  `relate_article` varchar(250) NOT NULL DEFAULT '0',
  `relate_product` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_sell_product_accessory`
--

DROP TABLE IF EXISTS `idv_sell_product_accessory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_sell_product_accessory` (
  `proId` int(11) NOT NULL DEFAULT '0',
  `accId` int(11) NOT NULL DEFAULT '0',
  `accCatId` mediumint(9) NOT NULL DEFAULT '0',
  `ordering` tinyint(4) NOT NULL DEFAULT '0',
  `postDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `proId` (`proId`),
  KEY `accCatId` (`accCatId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_sell_product_hot`
--

DROP TABLE IF EXISTS `idv_sell_product_hot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_sell_product_hot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proId` int(11) NOT NULL DEFAULT '0',
  `hotType` varchar(20) NOT NULL DEFAULT 'hot',
  `lastUpdate` int(11) NOT NULL DEFAULT '0',
  `updateBy` mediumint(9) NOT NULL DEFAULT '0',
  `ordering` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `hotType` (`hotType`(1))
) ENGINE=MyISAM AUTO_INCREMENT=2926 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_tag`
--

DROP TABLE IF EXISTS `idv_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_name` varchar(150) NOT NULL DEFAULT '0',
  `tag_url` varchar(150) NOT NULL DEFAULT '0',
  `tag_index` varchar(50) NOT NULL DEFAULT '0',
  `visit` mediumint(9) NOT NULL DEFAULT '0',
  `request_path` varchar(255) NOT NULL DEFAULT '0',
  `meta_title` varchar(255) NOT NULL DEFAULT '0',
  `meta_description` varchar(255) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_index` (`tag_index`),
  KEY `tag_url` (`tag_url`)
) ENGINE=MyISAM AUTO_INCREMENT=4527 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_category_content`
--

DROP TABLE IF EXISTS `idv_seller_category_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_category_content` (
  `id` int(10) unsigned NOT NULL,
  `site_id` smallint(6) NOT NULL DEFAULT '0',
  `static_html` text,
  `update_time` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sellerId` (`site_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_category_feature`
--

DROP TABLE IF EXISTS `idv_seller_category_feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_category_feature` (
  `cat_id` mediumint(9) NOT NULL,
  `top_subcat` varchar(200) NOT NULL DEFAULT '0',
  `product_bestsale` varchar(250) NOT NULL DEFAULT '0',
  `product_bestsale_auto` varchar(250) NOT NULL DEFAULT '0',
  `product_bestsale_auto_time` int(11) NOT NULL DEFAULT '0',
  `product_hot` varchar(250) NOT NULL DEFAULT '0',
  `product_new` varchar(250) NOT NULL DEFAULT '0',
  `product_saleoff` varchar(250) NOT NULL DEFAULT '0',
  `top_brand` varchar(200) NOT NULL DEFAULT '0',
  `top_article` varchar(200) NOT NULL DEFAULT '0',
  `top_question` varchar(200) NOT NULL DEFAULT '0',
  `relate_category` varchar(250) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_order`
--

DROP TABLE IF EXISTS `idv_seller_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_order` (
  `orderId` int(11) NOT NULL AUTO_INCREMENT,
  `assign_to` int(11) NOT NULL DEFAULT '0',
  `assign_to_name` varchar(100) NOT NULL DEFAULT '',
  `folder` mediumint(9) NOT NULL DEFAULT '0',
  `orderKey` varchar(34) NOT NULL DEFAULT '0',
  `site_id` mediumint(9) NOT NULL DEFAULT '0',
  `buyerId` int(11) NOT NULL DEFAULT '0',
  `buyerEmail` varchar(100) NOT NULL DEFAULT '0',
  `province` mediumint(9) NOT NULL DEFAULT '0',
  `district` mediumint(9) NOT NULL DEFAULT '0',
  `buyerName` varchar(100) NOT NULL DEFAULT '-',
  `buyerInfo` text,
  `totalValue` double NOT NULL DEFAULT '0',
  `order_promotion` text,
  `shippingFee` double NOT NULL DEFAULT '0',
  `CODfee` double NOT NULL DEFAULT '0',
  `shippingNote` text,
  `shipping_address` text,
  `order_time` int(11) NOT NULL DEFAULT '0',
  `order_hour` mediumint(9) NOT NULL DEFAULT '0',
  `payMethod` varchar(10) NOT NULL DEFAULT 'wtf',
  `payStatus` tinyint(1) NOT NULL DEFAULT '0',
  `receivePayStatus` tinyint(1) NOT NULL DEFAULT '0',
  `shipStatus` tinyint(1) NOT NULL DEFAULT '0',
  `successStatus` tinyint(1) NOT NULL DEFAULT '0',
  `buyerInstruction` varchar(200) NOT NULL DEFAULT '0',
  `createBy` mediumint(9) NOT NULL DEFAULT '0',
  `updateBy` mediumint(9) NOT NULL DEFAULT '0',
  `commentOn` smallint(6) NOT NULL DEFAULT '0',
  `buyerFeedbackId` int(10) unsigned NOT NULL DEFAULT '0',
  `lastSellerUpdate` int(11) NOT NULL DEFAULT '0',
  `discount_price` int(11) NOT NULL DEFAULT '0',
  `discount_info` text,
  `admin_discount` int(11) NOT NULL DEFAULT '0',
  `admin_discount_note` varchar(255) NOT NULL DEFAULT '0',
  `admin_name` varchar(50) NOT NULL DEFAULT '',
  `status_id` smallint(6) NOT NULL DEFAULT '0',
  `system_status` varchar(20) NOT NULL DEFAULT '0',
  `status_message` varchar(150) NOT NULL DEFAULT '0',
  `status_comment` varchar(255) DEFAULT '0',
  `status_time` int(11) NOT NULL DEFAULT '0',
  `status_update_by` varchar(50) NOT NULL DEFAULT '0',
  `ship_method` smallint(6) NOT NULL DEFAULT '0',
  `admin_shipping_status` varchar(20) NOT NULL DEFAULT 'pending',
  `admin_shipping_info` text,
  `admin_shipping_comment` text,
  `admin_shipping_update_time` int(11) NOT NULL DEFAULT '0',
  `admin_shipping_update_by` varchar(100) NOT NULL DEFAULT '0',
  `admin_shipping_company` smallint(6) NOT NULL DEFAULT '0',
  `admin_shipping_fee` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orderId`),
  KEY `successStatus` (`successStatus`),
  KEY `buyerEmail` (`buyerEmail`),
  KEY `order_time` (`order_time`)
) ENGINE=MyISAM AUTO_INCREMENT=1641 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_order_detail`
--

DROP TABLE IF EXISTS `idv_seller_order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `item_type` char(10) NOT NULL DEFAULT 'pro',
  `item_id` varchar(11) NOT NULL DEFAULT '0',
  `item_name` varchar(250) NOT NULL DEFAULT '0',
  `item_information` text,
  `item_price` double NOT NULL DEFAULT '0',
  `quantity` mediumint(9) NOT NULL DEFAULT '0',
  `promotion` text,
  `item_image` varchar(150) NOT NULL DEFAULT '0',
  `item_url` varchar(250) NOT NULL DEFAULT '0',
  `total_price` double NOT NULL DEFAULT '0',
  `item_note` varchar(250) NOT NULL DEFAULT '0',
  `item_addon` text,
  `create_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1433 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_order_status`
--

DROP TABLE IF EXISTS `idv_seller_order_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_order_status` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `system_status` varchar(20) NOT NULL DEFAULT '0',
  `message` varchar(150) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_order_status_history`
--

DROP TABLE IF EXISTS `idv_seller_order_status_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_order_status_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL DEFAULT '0',
  `status_id` smallint(6) NOT NULL DEFAULT '0',
  `system_status` varchar(50) NOT NULL DEFAULT '0',
  `status_message` varchar(150) NOT NULL DEFAULT '0',
  `comment` text,
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=959 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_shipping_method`
--

DROP TABLE IF EXISTS `idv_seller_shipping_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_shipping_method` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT 'pas',
  `fee` int(11) NOT NULL DEFAULT '0',
  `title` varchar(250) NOT NULL DEFAULT '0',
  `detail` text,
  `detailHash` varchar(50) NOT NULL DEFAULT '0',
  `ordering` tinyint(2) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(50) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  `last_update_by` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_pay_method`
--

DROP TABLE IF EXISTS `idv_seller_pay_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_pay_method` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL DEFAULT 'pas',
  `title` varchar(250) NOT NULL DEFAULT '0',
  `detail` text,
  `detailHash` varchar(50) NOT NULL DEFAULT '0',
  `ordering` tinyint(2) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(50) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  `last_update_by` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_page`
--

DROP TABLE IF EXISTS `idv_seller_page`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_page` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sellerId` int(10) unsigned NOT NULL DEFAULT '0',
  `category_id` mediumint(9) NOT NULL DEFAULT '0',
  `url` varchar(200) NOT NULL DEFAULT '0',
  `request_path` varchar(250) NOT NULL DEFAULT '0',
  `url_hash` varchar(40) NOT NULL DEFAULT '0',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `title` varchar(150) NOT NULL DEFAULT '0',
  `summary` text,
  `thumnail` varchar(200) NOT NULL DEFAULT '0',
  `template_file` varchar(100) NOT NULL DEFAULT '0',
  `meta_title` varchar(250) NOT NULL DEFAULT '0',
  `meta_keyword` varchar(250) NOT NULL DEFAULT '0',
  `meta_description` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `visit` mediumint(9) NOT NULL DEFAULT '0',
  `createDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createBy` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdateBy` int(11) NOT NULL DEFAULT '0',
  `lastUpdateIP` varchar(30) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `url_hash` (`url_hash`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_page_content`
--

DROP TABLE IF EXISTS `idv_seller_page_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_page_content` (
  `id` int(10) unsigned NOT NULL,
  `summary` varchar(250) NOT NULL DEFAULT '0',
  `content` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_page_category`
--

DROP TABLE IF EXISTS `idv_seller_page_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_page_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catPath` varchar(250) NOT NULL DEFAULT '0',
  `childListId` text,
  `sellerId` int(11) NOT NULL DEFAULT '0',
  `url` varchar(200) NOT NULL DEFAULT '0',
  `request_path` varchar(250) NOT NULL DEFAULT '0',
  `url_hash` varchar(40) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `summary` varchar(250) NOT NULL DEFAULT '0',
  `isParent` tinyint(1) NOT NULL DEFAULT '0',
  `imgUrl` varchar(150) NOT NULL DEFAULT '0',
  `parentId` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `createDate` int(11) NOT NULL DEFAULT '0',
  `createBy` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` int(11) NOT NULL DEFAULT '0',
  `lastUpdateBy` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(200) NOT NULL DEFAULT '0',
  `meta_keyword` varchar(200) NOT NULL DEFAULT '0',
  `meta_description` text,
  PRIMARY KEY (`id`),
  KEY `sellerId` (`sellerId`),
  KEY `url_hash` (`url_hash`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller`
--

DROP TABLE IF EXISTS `idv_seller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller` (
  `id` int(11) unsigned NOT NULL DEFAULT '0',
  `storeName` varchar(50) NOT NULL DEFAULT '-',
  `name` varchar(250) NOT NULL DEFAULT '-',
  `domain` varchar(100) NOT NULL DEFAULT '0',
  `email` varchar(200) NOT NULL DEFAULT '0',
  `email_customer_support` varchar(250) NOT NULL DEFAULT '0',
  `phone` varchar(150) NOT NULL DEFAULT '0',
  `fax` varchar(50) NOT NULL DEFAULT '0',
  `yahooId` varchar(220) NOT NULL DEFAULT '0',
  `skypeId` varchar(30) NOT NULL DEFAULT '0',
  `rating` tinyint(2) NOT NULL DEFAULT '0',
  `reviewNumber` smallint(5) unsigned NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `ranking` mediumint(9) NOT NULL DEFAULT '0',
  `package` varchar(10) NOT NULL DEFAULT 'trial',
  `billing_cycle` enum('month','quarter','semiannual','annual') NOT NULL DEFAULT 'annual',
  `balanceAmount` int(11) NOT NULL DEFAULT '0',
  `adminName` varchar(150) NOT NULL DEFAULT '0',
  `adminYahoo` varchar(150) NOT NULL DEFAULT '0',
  `adminTel` varchar(150) NOT NULL DEFAULT '0',
  `adminEmail` varchar(150) NOT NULL DEFAULT '0',
  `exchangeRate` mediumint(9) NOT NULL DEFAULT '18400',
  `maxPriceDayUpdate` smallint(6) NOT NULL DEFAULT '0',
  `minPriceDayUpdate` smallint(6) NOT NULL DEFAULT '0',
  `totalPro` mediumint(9) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdateBy` mediumint(9) NOT NULL DEFAULT '0',
  `loginIP` varchar(30) NOT NULL DEFAULT '0',
  `meta_title` varchar(250) NOT NULL DEFAULT '0',
  `meta_keyword` varchar(250) NOT NULL DEFAULT '0',
  `meta_description` text,
  `first_join_time` int(11) NOT NULL DEFAULT '0',
  `last_service_update` int(11) NOT NULL DEFAULT '0',
  `service_date_end` int(11) NOT NULL DEFAULT '0',
  `product_limit` mediumint(9) NOT NULL DEFAULT '0',
  `storage_limit` mediumint(9) NOT NULL DEFAULT '0',
  `bandwidth_limit` mediumint(9) NOT NULL DEFAULT '0',
  `current_storage_use` mediumint(9) NOT NULL DEFAULT '0',
  `current_bandwidth_use` mediumint(9) NOT NULL DEFAULT '0',
  `current_theme` mediumint(9) NOT NULL DEFAULT '0',
  `theme_change_time` int(11) NOT NULL DEFAULT '0',
  `theme_change_by` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_info`
--

DROP TABLE IF EXISTS `idv_seller_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_info` (
  `id` int(11) NOT NULL DEFAULT '0',
  `introduction` text,
  `contactPerson` varchar(100) DEFAULT NULL,
  `contactPersonPosition` varchar(50) DEFAULT NULL,
  `contactPersonEmail` varchar(50) DEFAULT NULL,
  `contactPersonTel` varchar(30) DEFAULT NULL,
  `storeAddress` text,
  `shippingInfo` text,
  `storeStatement` text,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_review`
--

DROP TABLE IF EXISTS `idv_seller_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_review` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `replyTo` int(11) NOT NULL DEFAULT '0',
  `merchantId` int(10) unsigned NOT NULL DEFAULT '0',
  `userId` int(10) unsigned NOT NULL DEFAULT '0',
  `userName` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` text,
  `date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rate` tinyint(2) NOT NULL DEFAULT '0',
  `helpful` mediumint(9) NOT NULL DEFAULT '0',
  `unhelpful` tinyint(2) NOT NULL DEFAULT '0',
  `comeBack` tinyint(2) NOT NULL DEFAULT '0',
  `customerSupport` tinyint(2) NOT NULL DEFAULT '0',
  `productQuality` tinyint(2) NOT NULL DEFAULT '0',
  `invoiceNumber` varchar(50) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `peopleVote` text,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `merchantId` (`merchantId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_address`
--

DROP TABLE IF EXISTS `idv_seller_address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_address` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `store_erp_id` varchar(100) NOT NULL DEFAULT '0',
  `store_name` varchar(150) NOT NULL DEFAULT '0',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `provinceId` smallint(11) NOT NULL DEFAULT '0',
  `address` varchar(250) NOT NULL DEFAULT '0',
  `telephone` varchar(200) NOT NULL DEFAULT '-',
  `fax` varchar(50) NOT NULL DEFAULT '0',
  `store_image` varchar(200) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `store_erp_id` (`store_erp_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_domain`
--

DROP TABLE IF EXISTS `idv_seller_domain`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_domain` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `domain` varchar(200) NOT NULL,
  `isMain` tinyint(1) NOT NULL,
  `is_mobile` tinyint(1) NOT NULL DEFAULT '0',
  `addDate` datetime NOT NULL,
  `last_update` int(11) NOT NULL DEFAULT '0',
  `last_update_by` varchar(150) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `domain` (`domain`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_setup`
--

DROP TABLE IF EXISTS `idv_seller_setup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_setup` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page` varchar(100) NOT NULL DEFAULT '0',
  `option` varchar(100) NOT NULL DEFAULT '0',
  `value_1` text,
  `value_2` varchar(250) NOT NULL DEFAULT '0',
  `last_update` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_update_by` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `sellerId` (`page`)
) ENGINE=MyISAM AUTO_INCREMENT=2703 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_search_fulltext`
--

DROP TABLE IF EXISTS `idv_search_fulltext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_search_fulltext` (
  `pro_id` int(11) NOT NULL DEFAULT '0',
  `cat_id` mediumint(9) NOT NULL DEFAULT '0',
  `cat_name_vn` varchar(150) NOT NULL DEFAULT '0',
  `cat_name_clean` varchar(150) NOT NULL DEFAULT '0',
  `pro_name_vn` text NOT NULL,
  `pro_name_clean` text NOT NULL,
  `tags_name_clean` varchar(150) NOT NULL,
  `url_name_clean` varchar(150) NOT NULL,
  `ranking` mediumint(9) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`pro_id`),
  KEY `tags_name_clean` (`tags_name_clean`),
  FULLTEXT KEY `cat_name_vn` (`cat_name_vn`),
  FULLTEXT KEY `cat_name_clean` (`cat_name_clean`),
  FULLTEXT KEY `pro_name_vn` (`pro_name_vn`),
  FULLTEXT KEY `pro_name_clean` (`pro_name_clean`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_promotion`
--

DROP TABLE IF EXISTS `idv_promotion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_promotion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL DEFAULT '0',
  `description` text,
  `type` enum('pro','cash','priceoff','other') NOT NULL DEFAULT 'other',
  `content` varchar(50) NOT NULL DEFAULT '0',
  `from_time` int(11) NOT NULL DEFAULT '0',
  `to_time` int(11) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `pro_count` mediumint(9) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(50) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  `last_update_by` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `from_time` (`from_time`,`to_time`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_promotion_product`
--

DROP TABLE IF EXISTS `idv_promotion_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_promotion_product` (
  `promotion_id` mediumint(9) NOT NULL DEFAULT '0',
  `pro_id` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_by` mediumint(9) NOT NULL DEFAULT '0',
  KEY `promotion_id` (`promotion_id`),
  KEY `pro_id` (`pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_customer`
--

DROP TABLE IF EXISTS `idv_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL DEFAULT '0',
  `group_code` varchar(50) NOT NULL DEFAULT '0',
  `group_from_date` int(11) NOT NULL DEFAULT '0',
  `group_to_date` int(11) NOT NULL DEFAULT '0',
  `name` varchar(200) NOT NULL DEFAULT '0',
  `user_name` varchar(50) NOT NULL DEFAULT '0',
  `avatar` varchar(250) NOT NULL DEFAULT '0',
  `email` varchar(100) NOT NULL DEFAULT '0',
  `emailVerify` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(50) NOT NULL DEFAULT '0',
  `type` varchar(10) NOT NULL DEFAULT '0',
  `tel` varchar(100) NOT NULL DEFAULT '0',
  `mobile` varchar(100) NOT NULL DEFAULT '0',
  `idnumber` varchar(50) NOT NULL DEFAULT '0',
  `address` varchar(150) NOT NULL DEFAULT '0',
  `district` mediumint(9) NOT NULL DEFAULT '0',
  `district_name` varchar(100) NOT NULL DEFAULT '0',
  `province` mediumint(9) NOT NULL DEFAULT '0',
  `country` mediumint(9) NOT NULL DEFAULT '0',
  `ship_to_name` varchar(150) NOT NULL DEFAULT '0',
  `ship_to_tel` varchar(150) NOT NULL DEFAULT '0',
  `ship_to_address` varchar(250) NOT NULL DEFAULT '0',
  `ship_to_district` varchar(9) NOT NULL DEFAULT '0',
  `ship_to_province` varchar(9) NOT NULL DEFAULT '0',
  `ship_to_country` mediumint(9) NOT NULL DEFAULT '0',
  `tax_company` varchar(250) NOT NULL DEFAULT '0',
  `tax_address` varchar(250) NOT NULL DEFAULT '0',
  `tax_code` varchar(50) NOT NULL DEFAULT '0',
  `sex` varchar(10) NOT NULL DEFAULT '0',
  `birthday` varchar(10) NOT NULL DEFAULT '0',
  `birthyear` smallint(6) NOT NULL DEFAULT '0',
  `comment` text,
  `orderCount` mediumint(9) NOT NULL DEFAULT '0',
  `totalValue` int(11) NOT NULL DEFAULT '0',
  `order_count_success` mediumint(9) NOT NULL DEFAULT '0',
  `total_value_success` int(11) NOT NULL DEFAULT '0',
  `lastOrderDate` int(11) NOT NULL DEFAULT '0',
  `addDate` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` int(11) NOT NULL DEFAULT '0',
  `lastLogin` int(11) NOT NULL DEFAULT '0',
  `lastLoginIP` varchar(40) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `product_review_count` mediumint(9) NOT NULL DEFAULT '0',
  `question_ask` mediumint(9) NOT NULL DEFAULT '0',
  `question_answer` mediumint(9) NOT NULL DEFAULT '0',
  `loyalty_point` int(11) NOT NULL DEFAULT '0',
  `loyalty_level` smallint(6) NOT NULL DEFAULT '0',
  `article_comment` smallint(6) NOT NULL DEFAULT '0',
  `forum_ask` mediumint(9) NOT NULL DEFAULT '0',
  `forum_answer` mediumint(9) NOT NULL DEFAULT '0',
  `search_fulltext` text,
  PRIMARY KEY (`id`),
  KEY `email` (`email`,`password`),
  KEY `group` (`group_id`),
  KEY `group_code` (`group_code`),
  FULLTEXT KEY `search_fulltext` (`search_fulltext`),
  FULLTEXT KEY `search_fulltext_2` (`search_fulltext`)
) ENGINE=MyISAM AUTO_INCREMENT=1557 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_user_like`
--

DROP TABLE IF EXISTS `idv_user_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_user_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL DEFAULT 'pro',
  `item_id` mediumint(9) NOT NULL DEFAULT '0',
  `user_id` mediumint(9) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_customer_preference`
--

DROP TABLE IF EXISTS `idv_customer_preference`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_customer_preference` (
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `shipping_to_name` varchar(200) NOT NULL DEFAULT '0',
  `shipping_address` varchar(250) NOT NULL DEFAULT '0',
  `shipping_province` smallint(6) NOT NULL DEFAULT '0',
  `shipping_tel` varchar(100) NOT NULL DEFAULT '0',
  `shipping_other` varchar(250) NOT NULL DEFAULT '0',
  `payment_method` smallint(6) NOT NULL DEFAULT '0',
  `shipping_method` smallint(6) NOT NULL DEFAULT '0',
  `company_tax_info` text,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_customer_point`
--

DROP TABLE IF EXISTS `idv_customer_point`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_customer_point` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL DEFAULT '0',
  `point_cat` varchar(50) NOT NULL DEFAULT '0',
  `point` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `create_date` int(11) NOT NULL DEFAULT '0',
  `message` varchar(200) NOT NULL DEFAULT '0',
  `user_ip` varchar(35) NOT NULL DEFAULT '0',
  `referer_url` varchar(200) NOT NULL DEFAULT '0',
  `is_deny` tinyint(1) NOT NULL DEFAULT '0',
  `deny_explain` varchar(50) NOT NULL DEFAULT '0',
  `deny_by` varchar(20) NOT NULL DEFAULT '0',
  `deny_time` int(11) NOT NULL DEFAULT '0',
  `create_by` varchar(100) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`customer_id`),
  KEY `create_date` (`create_date`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_customer_product_image`
--

DROP TABLE IF EXISTS `idv_customer_product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_customer_product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` mediumint(9) NOT NULL DEFAULT '0',
  `customer_id` mediumint(9) NOT NULL DEFAULT '0',
  `image_file` varchar(100) NOT NULL DEFAULT '0',
  `image_name` varchar(250) NOT NULL DEFAULT '0',
  `image_taken_date` varchar(50) NOT NULL DEFAULT '0',
  `image_description` text,
  `post_time` int(11) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  `comment_count` smallint(6) NOT NULL DEFAULT '0',
  `like_count` mediumint(9) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `approved_by` varchar(100) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_news`
--

DROP TABLE IF EXISTS `idv_seller_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('article','video','photo') NOT NULL DEFAULT 'article',
  `changeCount` mediumint(9) NOT NULL DEFAULT '0',
  `sellerId` int(11) NOT NULL DEFAULT '0',
  `catId` mediumint(6) NOT NULL DEFAULT '0',
  `article_category` varchar(100) NOT NULL DEFAULT '0',
  `title` varchar(200) NOT NULL DEFAULT '0',
  `video_code` varchar(250) NOT NULL DEFAULT '0',
  `external_url` varchar(250) NOT NULL DEFAULT '0',
  `url` varchar(250) NOT NULL DEFAULT '0',
  `request_path` text,
  `url_hash` varchar(50) NOT NULL DEFAULT '0',
  `thumnail` varchar(150) NOT NULL DEFAULT '0',
  `image_background` varchar(150) NOT NULL DEFAULT '',
  `extend` text,
  `summary` text,
  `tags` text,
  `createDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createBy` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdateBy` int(11) NOT NULL DEFAULT '0',
  `lastUpdateByUser` varchar(100) NOT NULL DEFAULT '0',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `review_rate` smallint(6) NOT NULL DEFAULT '0',
  `review_count` mediumint(9) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `visit` mediumint(9) NOT NULL DEFAULT '0',
  `like_count` mediumint(9) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `album_id` mediumint(9) NOT NULL DEFAULT '0',
  `search_fulltext` text,
  `meta_title` varchar(250) NOT NULL DEFAULT '0',
  `meta_keywords` text,
  `meta_description` text,
  `url_canonical` varchar(250) NOT NULL DEFAULT '0',
  `article_time` int(11) NOT NULL DEFAULT '0',
  `article_time_set` tinyint(1) NOT NULL DEFAULT '0',
  `allow_se_index` tinyint(1) NOT NULL DEFAULT '1',
  `article_display_time` int(11) NOT NULL DEFAULT '0',
  `article_display_time_set` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ordering` (`ordering`),
  KEY `catId` (`catId`),
  FULLTEXT KEY `search_fulltext` (`search_fulltext`)
) ENGINE=MyISAM AUTO_INCREMENT=991 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_news_comment`
--

DROP TABLE IF EXISTS `idv_seller_news_comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_news_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `feedback_count` mediumint(9) NOT NULL DEFAULT '0',
  `article_id` mediumint(9) NOT NULL DEFAULT '0',
  `article_name` varchar(250) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_email` varchar(150) NOT NULL DEFAULT '0',
  `user_name` varchar(150) NOT NULL DEFAULT '0',
  `review_rate` smallint(6) NOT NULL DEFAULT '0',
  `review_title` varchar(250) NOT NULL DEFAULT '0',
  `review_content` text,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `post_time` int(11) NOT NULL DEFAULT '0',
  `last_update_time` int(11) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `people_id_vote` text,
  `people_like_count` mediumint(9) NOT NULL DEFAULT '0',
  `people_dislike_count` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pro_id` (`article_id`),
  KEY `user_email` (`user_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_news_category`
--

DROP TABLE IF EXISTS `idv_seller_news_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_news_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` enum('article','video','photo') NOT NULL DEFAULT 'article',
  `catPath` varchar(250) NOT NULL DEFAULT '0',
  `childListId` text,
  `sellerId` int(11) NOT NULL DEFAULT '0',
  `url` varchar(200) NOT NULL DEFAULT '0',
  `url_hash` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `summary` varchar(250) NOT NULL DEFAULT '0',
  `description` text,
  `isParent` tinyint(1) NOT NULL DEFAULT '0',
  `imgUrl` varchar(150) NOT NULL DEFAULT '0',
  `parentId` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `item_count` mediumint(9) NOT NULL DEFAULT '0',
  `display_option` varchar(15) NOT NULL DEFAULT 'article',
  `createDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createBy` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdateBy` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(200) NOT NULL DEFAULT '0',
  `meta_keyword` varchar(200) NOT NULL DEFAULT '0',
  `meta_description` text,
  `request_path` varchar(250) NOT NULL DEFAULT '0',
  `relate_product` text,
  PRIMARY KEY (`id`),
  KEY `sellerId` (`sellerId`),
  KEY `url` (`url`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_news_content`
--

DROP TABLE IF EXISTS `idv_seller_news_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_news_content` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  `relate_product` varchar(250) NOT NULL DEFAULT '0',
  `relate_article` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_seller_news_fulltext`
--

DROP TABLE IF EXISTS `idv_seller_news_fulltext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_seller_news_fulltext` (
  `news_id` mediumint(9) NOT NULL DEFAULT '0',
  `cat_id` mediumint(9) NOT NULL DEFAULT '0',
  `news_title` text NOT NULL,
  `news_summary` text,
  `last_update` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`news_id`),
  FULLTEXT KEY `news_title` (`news_title`),
  FULLTEXT KEY `news_summary` (`news_summary`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_ask_category`
--

DROP TABLE IF EXISTS `idv_ask_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_ask_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catPath` varchar(250) NOT NULL DEFAULT '0',
  `childListId` text,
  `display_option` varchar(15) NOT NULL DEFAULT 'product',
  `url` varchar(200) NOT NULL DEFAULT '0',
  `url_hash` varchar(40) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL DEFAULT '0',
  `summary` varchar(500) NOT NULL DEFAULT '0',
  `isParent` tinyint(1) NOT NULL DEFAULT '0',
  `imgUrl` varchar(150) NOT NULL DEFAULT '0',
  `useImg` tinyint(1) NOT NULL DEFAULT '0',
  `toUrl` varchar(250) NOT NULL DEFAULT '0',
  `parentId` int(10) unsigned NOT NULL DEFAULT '0',
  `item_count` mediumint(9) NOT NULL DEFAULT '0',
  `attr_count` smallint(6) NOT NULL DEFAULT '0',
  `priceRange` varchar(150) NOT NULL DEFAULT '0',
  `keyword` varchar(200) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `createDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createBy` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdateBy` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(250) NOT NULL DEFAULT '0',
  `meta_keyword` varchar(200) NOT NULL DEFAULT '0',
  `meta_description` varchar(500) NOT NULL DEFAULT '0',
  `visit` mediumint(9) NOT NULL DEFAULT '0',
  `like_count` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parentId` (`parentId`),
  KEY `url_hash` (`url_hash`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_ask_question`
--

DROP TABLE IF EXISTS `idv_ask_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_ask_question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` mediumint(9) NOT NULL DEFAULT '0',
  `catId` mediumint(9) NOT NULL DEFAULT '0',
  `userId` int(11) NOT NULL DEFAULT '0',
  `userName` varchar(50) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL DEFAULT '0',
  `url` varchar(150) NOT NULL DEFAULT '0',
  `content` text,
  `tag_list` varchar(200) NOT NULL DEFAULT '0',
  `relate_question_list` text,
  `update_relate_time` int(11) NOT NULL DEFAULT '0',
  `rateGood` mediumint(9) NOT NULL DEFAULT '0',
  `rateBad` mediumint(9) NOT NULL DEFAULT '0',
  `rateAvg` mediumint(9) NOT NULL DEFAULT '0',
  `views` mediumint(9) NOT NULL DEFAULT '0',
  `userSameQ` mediumint(9) NOT NULL DEFAULT '0',
  `track` mediumint(9) NOT NULL DEFAULT '0',
  `solved` tinyint(1) NOT NULL DEFAULT '0',
  `answer` mediumint(9) NOT NULL DEFAULT '0',
  `postDate` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` int(11) NOT NULL DEFAULT '0',
  `reportBad` tinyint(4) NOT NULL DEFAULT '0',
  `approve` tinyint(1) NOT NULL DEFAULT '0',
  `approveBy` int(11) NOT NULL DEFAULT '0',
  `approveTime` int(11) NOT NULL DEFAULT '0',
  `useForRank` tinyint(1) NOT NULL DEFAULT '0',
  `is_featured` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `catId` (`catId`),
  KEY `userId` (`userId`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_ask_answer`
--

DROP TABLE IF EXISTS `idv_ask_answer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_ask_answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionId` int(11) NOT NULL DEFAULT '0',
  `content` text,
  `userId` int(11) NOT NULL DEFAULT '0',
  `userName` varchar(50) NOT NULL DEFAULT '0',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `accepted` tinyint(1) NOT NULL DEFAULT '0',
  `reportBad` tinyint(4) NOT NULL DEFAULT '0',
  `rateGood` mediumint(9) NOT NULL DEFAULT '0',
  `rateBad` mediumint(9) NOT NULL DEFAULT '0',
  `rateAvg` mediumint(9) NOT NULL DEFAULT '0',
  `approve` tinyint(4) NOT NULL DEFAULT '0',
  `useForRank` tinyint(1) NOT NULL DEFAULT '0',
  `approveBy` int(11) NOT NULL DEFAULT '0',
  `approveTime` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `questionId` (`questionId`),
  KEY `userId` (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_gallery`
--

DROP TABLE IF EXISTS `idv_gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` smallint(6) NOT NULL DEFAULT '0',
  `thumnail` varchar(100) NOT NULL DEFAULT '0',
  `image_name` varchar(250) NOT NULL DEFAULT '0',
  `image_taken_date` varchar(50) NOT NULL DEFAULT '0',
  `image_description` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `ordering` mediumint(9) NOT NULL DEFAULT '0',
  `visit` mediumint(9) NOT NULL DEFAULT '0',
  `post_time` int(11) NOT NULL DEFAULT '0',
  `last_update` int(11) NOT NULL DEFAULT '0',
  `create_by` mediumint(9) NOT NULL DEFAULT '0',
  `last_update_by` mediumint(9) NOT NULL DEFAULT '0',
  `comment_count` smallint(6) NOT NULL DEFAULT '0',
  `like_count` mediumint(9) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `idv_gallery_album`
--

DROP TABLE IF EXISTS `idv_gallery_album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idv_gallery_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `catPath` varchar(250) NOT NULL DEFAULT '0',
  `childListId` text,
  `url` varchar(200) NOT NULL DEFAULT '0',
  `url_hash` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(150) NOT NULL,
  `summary` varchar(250) NOT NULL DEFAULT '0',
  `isParent` tinyint(1) NOT NULL DEFAULT '0',
  `imgUrl` varchar(150) NOT NULL DEFAULT '0',
  `parentId` int(11) NOT NULL DEFAULT '0',
  `image_count` mediumint(9) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `ordering` smallint(6) NOT NULL DEFAULT '0',
  `createDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `createBy` int(11) NOT NULL DEFAULT '0',
  `lastUpdate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `lastUpdateBy` int(11) NOT NULL DEFAULT '0',
  `meta_title` varchar(200) NOT NULL DEFAULT '0',
  `meta_keyword` varchar(200) NOT NULL DEFAULT '0',
  `meta_description` text,
  PRIMARY KEY (`id`),
  KEY `url_hash` (`url_hash`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-15  7:55:14
