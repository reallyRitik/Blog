-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 08:17 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karishma_blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `author_details`
--

CREATE TABLE `author_details` (
  `id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `about_author` text NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `added_date` varchar(20) NOT NULL,
  `is_deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author_details`
--

INSERT INTO `author_details` (`id`, `author`, `about_author`, `linkedin`, `twitter`, `added_date`, `is_deleted`) VALUES
(1, 'Karishma', 'About Author', 'Author Linkedin Lin', 'Author Twitter Link', '7th October 2022', 1),
(2, 'Enter Author', 'About Author', 'Author Linkedin Link', 'Author Twitter Link', '11th October 2022', 1),
(3, 'Enter Author', 'About Author', 'Author Linkedin Link', 'Author Twitter Link', '11th October 2022', 1),
(4, 'Enter Author', 'About Author', 'Author Linkedin Link', 'Author Twitter Link', '12th October 2022', 1),
(5, 'Enter Author', 'About Author', 'Author Linkedin Link', 'Author Twitter Link', '12th October 2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `author_id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `url` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `thumbnail` varchar(250) NOT NULL,
  `image_alt` varchar(100) NOT NULL,
  `added_date` varchar(20) NOT NULL,
  `added_by` int(11) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `page_title` varchar(200) NOT NULL,
  `page_description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `page_keyword` text NOT NULL,
  `other_meta_tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `author_id`, `title`, `description`, `url`, `tags`, `real_name`, `thumbnail`, `image_alt`, `added_date`, `added_by`, `is_deleted`, `page_title`, `page_description`, `category`, `page_keyword`, `other_meta_tags`) VALUES
(1, 3, 'BLOG TITLE', '<p>BLOG DESCRIPTION</p>', '', 'BLOG TAG', 'post-img-1.jpg', 'post-img-1.jpg', 'IMAGE ALT', '3rd, October 2022', 1, 1, 'PAGE TITLE', 'PAGE DESCRIPTION', '', 'PAGE KEYWORD', 'META TAGS'),
(2, 3, 'BLOG TITLE', '<p>BLOG DESCRIPTION</p>', '', 'BLOG TAG', 'post-img-2.jpg', 'post-img-2.jpg', 'IMAGE ALT', '3rd, October 2022', 1, 0, 'PAGE TITLE', 'PAGE DESCRIPTION', '', 'PAGE KEYWORD', 'META TAGS'),
(3, 3, 'dvfwre', '<p>rfvewrr</p>', '', 'rverver', 'post-img-3.jpg', 'post-img-3.jpg', 'edfew', '3rd, October 2022', 1, 0, 'efwefw', 'ewfe', '', 'dwed', 'dww'),
(4, 3, 'dwwd', '<p>ddwd</p>', '', 'dwwd', 'post-img-4.jpg', 'post-img-4.jpg', 'dwwd', '3rd, October 2022', 1, 0, 'dwwd', 'dwwd', '', 'wdwd', 'dwdw'),
(6, 3, 'ewcfcds', '<p>cdcdsdcdc</p>', '', 'cdcdc', 'post-img-6.jpg', 'post-img-6.jpg', 'dccddc', '3rd, October 2022', 1, 0, 'dcdcdc', 'cddcd', '', 'dcdccd', 'dcdcdc'),
(7, 3, 'dfgbvte', '<p>fvbdb</p>', '', 'bdbbf', 'post-img-7.jpg', 'post-img-7.jpg', 'ssccs', '3rd, October 2022', 1, 0, 'scscsc', 'sccscsc', '', 'scscc', 'sccs'),
(8, 3, 'fgd', '<p>ffvdfdv</p>', '', 'fvvffd', 'post-img-8.jpg', 'post-img-8.jpg', 'vfdfvfv', '3rd, October 2022', 1, 0, 'vfdfvf', 'bgbgb', '', 'bggg', 'gbgbgb'),
(9, 3, 'blog title', '<p>blog description</p>', '', 'blog tag', 'post-img-9.jpg', 'post-img-9.jpg', 'image alt', '3rd, October 2022', 1, 0, 'page title', 'page description', '', 'page keyword', 'meta tags'),
(10, 3, 'wdwdw', '<p>wddwdwdwdw</p>', '', 'dwdwwd', 'post-img-10.jpg', 'post-img-10.jpg', 'wddw', '4th, October 2022', 1, 0, 'wdwd', 'fwffwf', '', 'ffwff', 'wffwwfwf'),
(11, 3, 'BLOG TITLE', '<p>LOG DESCRIPTION</p>', '', 'LOG TAG', 'post-img-11.jpg', 'post-img-11.jpg', 'MAGE ALT', '7th, October 2022', 1, 1, 'PAGE TITLE', 'PAGE DESCRIPTION', '', 'PAGE KEYWORD', 'META TAGS'),
(12, 3, 'wergerg', '<p>ergrerr</p>', '', 'grgegr', 'post-img-12.jpg', 'post-img-12.jpg', 'grggre', '7th, October 2022', 1, 1, 'gregereg', 'grgegrg', '', 'ggegregr', 'gregeger'),
(13, 3, 'axsacs', '<p>cscscs</p>', '', 'cssccs', 'post-img-13.jpg', 'post-img-13.jpg', 'scsccs', '7th, October 2022', 1, 0, 'cscs', 'cscssc', '', 'scsccs', 'cscscvs'),
(14, 3, 'edfegfr', '<p>frgbregr</p>', '', 'begbr', 'post-img-14.jpg', 'post-img-14.jpg', 'sgrgr', '7th, October 2022', 1, 1, 'rggregr', 'rgrgrgg', '', 'ddsdvs', 'vsdfdvvsds'),
(15, 3, 'jrtrt', '<p>trjjut</p>', '', 'trjtj', 'post-img-15.jpg', 'post-img-15.jpg', 'rtjyyjk', '7th, October 2022', 1, 1, 'ytyjy', 'yjtjjy', '', 'yjtjyt', 'jyyjyj'),
(16, 3, 'tghjrtj', '<p>tjrjrt</p>', '', 'jrtjj', 'post-img-16.jpg', 'post-img-16.jpg', 'trjhr', '7th, October 2022', 1, 0, 'rerr', 'rerhe', '', 'rehthth', 'htehrhreh'),
(17, 1, 'y4cf5ty65', '<p>rfewd43</p>', '', 'blog tag', 'post-img-17.jpg', 'post-img-17.jpg', 'rdfex', '7th, October 2022', 1, 1, 'rxd', 'rtdf3t4e', '', 'rcdfcxerdfw', 'rcdfre'),
(18, 1, 'BLOG TITLE', '<p>BLOG DESCRIPTION</p>', 'blog-title', 'BLOG TAG', 'post-img-18.jpg', 'post-img-18.jpg', 'IMAGE ALT', '8th, October 2022', 1, 0, 'fhd', 'gffg', '', 'gbfbgf', 'gfgbfg'),
(19, 1, 'BLOG TITLE', '<p>BLOG DESCRIPTION</p>', 'blog-title-2', 'BLOG TAG', '', 'download (1).jpg', 'IMAGE ALT', '8th, October 2022', 1, 1, 'fhd', 'gffg', '', 'gbfbgf', 'gfgbfg'),
(20, 1, 'wdwd', '<p>wdwd</p>', 'wdwd', 'dwd', 'post-img-20.jpg', 'post-img-20.jpg', 'wdwd', '8th, October 2022', 1, 1, 'wwdwd', 'dwwd', '', 'wdww', 'wdwd'),
(21, 1, 'wdwd', '<p>wdwd</p>', 'wdwd-2', 'dwd', '', 'download (1).jpg', 'wdwd', '8th, October 2022', 1, 1, 'wwdwd', 'dwwd', '', 'wdww', 'wdwd'),
(22, 1, 'BLOG TITLE', '<p>BLOG DESCRIPTION</p>', 'blog-title-3', 'sfsedfe', 'post-img-22.jpg', 'post-img-22.jpg', 'efefe', '8th, October 2022', 1, 1, 'efefef', 'effeef', '', 'effeef', 'effe'),
(23, 1, 'BLOG TITLE', '<p>BLOG DESCRIPTION</p>', 'blog-title-4', 'sfsedfe', '', 'download.jpg', 'efefe', '8th, October 2022', 1, 1, 'efefef', 'effeef', '', 'effeef', 'effe'),
(24, 1, 'wdf', '<p>fefee</p>', 'wdf', 'effef', 'post-img-24.jpg', 'post-img-24.jpg', 'feefef', '8th, October 2022', 1, 1, 'effee', 'fefefe', '', 'ewefefe', 'efefef'),
(25, 1, 'wdf', '<p>fefee</p>', 'wdf-2', 'effef', '', 'photo-1614027164847-1b28cfe1df60.jpg', 'feefef', '8th, October 2022', 1, 1, 'effee', 'fefefe', '', 'ewefefe', 'efefef'),
(28, 1, 'rfdvve', '<p>vdfvdsf</p>', 'rfdvve', 'dfssvd', 'post-img-28.jpg', 'post-img-28.jpg', 'sdvvsd', '8th, October 2022', 1, 1, 'sdvs', 'dsvsvsd', '', 'sddvs', 'dvsvsd'),
(29, 1, 'rfdvve', '<p>vdfvdsf</p>', 'rfdvve-2', 'dfssvd', '', '211836.jpg', 'sdvvsd', '8th, October 2022', 1, 1, 'sdvs', 'dsvsvsd', '', 'sddvs', 'dvsvsd'),
(30, 1, 'BLOG TITLE', '<p>BLOG DESCRIPTION</p>', 'blog-title-6', 'sdcdscv', 'post-img-30.jpg', 'post-img-30.jpg', 'dwddw', '8th, October 2022', 1, 1, 'wevw', 'ddvd', '', 'dsvd', 'dsddsv'),
(31, 1, 'BLOG TITLE', '<p>BLOG DESCRIPTION</p>', 'blog-title-7', 'sdcdscv', '', 'download.jpg', 'dwddw', '8th, October 2022', 1, 1, 'wevw', 'ddvd', '', 'dsvd', 'dsddsv'),
(32, 1, 'wsdwd', '<p>wdwddw</p>', 'wsdwd', 'dwdwwd', 'post-img-32.jpg', 'post-img-32.jpg', 'wdwd', '8th, October 2022', 1, 1, 'wdwd', 'wdwddw', '', 'wddw', 'dwwd'),
(33, 1, 'wsdwd', '<p>wdwddw</p>', 'wsdwd-2', 'dwdwwd', '', 'download.jpg', 'wdwd', '8th, October 2022', 1, 1, 'wdwd', 'wdwddw', '', 'wddw', 'dwwd'),
(34, 1, 'bfbf', '<p>fdbdf</p>', 'bfbf', 'bdbfd', 'post-img-34.jpg', 'post-img-34.jpg', 'bdbd', '8th, October 2022', 1, 1, 'fdfbfb', 'bfdbf', '', 'fdbbd', 'fddfbf'),
(35, 1, 'bfbf', '<p>fdbdf</p>', 'bfbf-2', 'bdbfd', '', 'photo-1614027164847-1b28cfe1df60.jpg', 'bdbd', '8th, October 2022', 1, 1, 'fdfbfb', 'bfdbf', '', 'fdbbd', 'fddfbf'),
(36, 1, 'efefe', '<p>efeffefe</p>', 'efefe', 'efef', 'post-img-36.jpg', 'post-img-36.jpg', 'efefef', '8th, October 2022', 1, 1, 'efefef', 'efefef', '', 'efeff', 'effeef'),
(37, 1, 'efe', '<p>feffe</p>', 'efe', 'feef', 'post-img-37.jpg', 'post-img-37.jpg', 'feef', '9th, October 2022', 1, 1, 'effe', 'feeff', '', 'effe', 'fefe'),
(38, 2, 'fefss', '<p>feef</p>', 'fefss', 'effe', 'post-img-38.jpg', 'post-img-38.jpg', 'fefef', '9th, October 2022', 1, 1, 'fefe', 'fefe', '', 'fefefe', '                                                                                                                        feeffe                                                                                                                  '),
(39, 1, 'fef', '<p>ffef</p>', 'fef-2', 'fefe', 'post-img-39.jpg', 'post-img-39.jpg', 'fef', '9th, October 2022', 1, 1, 'fefe', 'fef', '', 'fefe', 'frfr');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(200) NOT NULL,
  `category_url` varchar(200) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `is_deleted` int(11) NOT NULL,
  `page_title` varchar(250) NOT NULL,
  `page_description` text NOT NULL,
  `page_keyword` text NOT NULL,
  `other_meta_tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `category_url`, `added_date`, `is_deleted`, `page_title`, `page_description`, `page_keyword`, `other_meta_tags`) VALUES
(1, 'karishma tiles', 'karishma-tiles', '7th October 2022', 1, 'PAGE TITLE', 'Page Description', 'Page Keyword', 'Other Meta Tag'),
(2, 'Enter Category', 'enter-category', '11th October 2022', 1, 'PAGE TITLE', 'Page Description', 'Page Keyword', 'Other Meta Tags'),
(3, 'Enter Category', 'enter-category', '11th October 2022', 0, 'PAGE TITLE', 'Page Description', 'Page Keyword', 'Other Meta Tags'),
(4, 'Enter Category', 'enter-category', '12th October 2022', 1, 'dwwdw', 'dwdw', 'dwdw', 'dwdw'),
(5, 'Enter Category', 'enter-category', '12th October 2022', 1, 'wdwddw', 'wddw', 'wdwd', 'wddw'),
(6, 'csac', 'csac', '12th October 2022', 1, 'sacasccs', 'csaacscas', 'scscasccsac', 'csacasacs'),
(7, 'sewe', 'sewe', '12th October 2022', 1, 'efe', 'efef', 'effe', 'effef'),
(8, 'Enter Category', 'enter-category', '13th October 2022', 0, 'wdwd', 'wdw', 'wdwd', 'wdwd');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `added_date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `is_deleted` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `blog_id`, `blog_title`, `name`, `email`, `comment`, `user_ip`, `added_date`, `status`, `is_deleted`) VALUES
(1, 0, 7, '', 'uubijixeh', 'ufwutyij@eladi.elighmail.com', 'Gunn gli.swlm.expomachinetools.com.vgo.fg cabin, pumped [URL=http://nacrossroads.com/ceftin/ - ceftin[/URL -  [URL=http://nacrossroads.com/depakote/ - depakote coupons[/URL -  [URL=http://fountainheadapartmentsma.com/product/verapamil/ - verapamil[/URL -  [URL=http://shawntelwaajid.com/professional-cialis/ - professional cialis[/URL -  low price professional cialis [URL=http://christmastoysite.com/melalong-ad-cream/ - order melalong-ad-cream at online pharmacy[/URL -  [URL=http://stroupflooringamerica.com/item/evecare/ - evecare cost[/URL -  [URL=http://sunsethilltreefarm.com/item/alfacip/ - buy alfacip[/URL -  [URL=http://losangelesathleticassociation.org/crestor/ - crestor without a doctors prescription[/URL -  [URL=http://autopawnohio.com/pandora/ - pandora canada[/URL -  forcing <a href=\"http://nacrossroads.com/ceftin/\">ceftin capsules for sale</a> <a href=\"http://nacrossroads.com/depakote/\">purchase depakote without a prescription</a> <a href=\"http://fountainheadapartmentsma.com/product/verapamil/\">verapamil</a> <a href=\"http://shawntelwaajid.com/professional-cialis/\">generic professional cialis canada pharmacy</a> <a href=\"http://christmastoysite.com/melalong-ad-cream/\">melalong ad cream</a> <a href=\"http://stroupflooringamerica.com/item/evecare/\">cheapest evecare dosage price</a> <a href=\"http://sunsethilltreefarm.com/item/alfacip/\">low price alfacip</a> <a href=\"http://losangelesathleticassociation.org/crestor/\">crestor.com</a> <a href=\"http://autopawnohio.com/pandora/\">pandora</a> pandora prices dark, http://nacrossroads.com/ceftin/ generic for ceftin http://nacrossroads.com/depakote/ purchase depakote without a prescription http://fountainheadapartmentsma.com/product/verapamil/ mail order verapamil http://shawntelwaajid.com/professional-cialis/ professional cialis http://christmastoysite.com/melalong-ad-cream/ cost of melalong ad cream tablets http://stroupflooringamerica.com/item/evecare/ evecare buy online http://sunsethilltreefarm.com/item/alfacip/ alfacip mailorder alfacip http://losangelesathleticassociation.org/crestor/ generic crestor from canada overnight crestor http://autopawnohio.com/pandora/ pandora from mobilizing illiterate, debridement.', '94.23.25.203', '2021-11-06 10:12:55', 0, 1),
(2, 0, 7, '', 'aseuqezupec', 'aarozi@keuko.elighmail.com', 'Multiple xdt.kfhv.expomachinetools.com.vkj.xj symptom, painstaking wise [URL=http://autopawnohio.com/femalefil/ - femalefil online pharmacy[/URL -  [URL=http://herbalfront.com/depo-medrol/ - depo medrol without dr prescription usa[/URL -  [URL=http://nacrossroads.com/mentat/ - mentat buy[/URL -  [URL=http://timoc.org/pill/venlor-xr/ - venlor xr for sale[/URL -  [URL=http://christmastoysite.com/forcan/ - forcan capsules for sale[/URL -  [URL=http://medipursuit.com/product/propecia/ - propecia buy online[/URL -  [URL=http://christmastoysite.com/product/snovitra/ - snovitra[/URL -  buy snovitra w not prescription [URL=http://altavillaspa.com/extra-super-p-force/ - extra-super-p-force canada pharmacy online[/URL -  [URL=http://autopawnohio.com/lumigan-applicators/ - buy lumigan applicators w not prescription[/URL -  pneumonia properties rapid <a href=\"http://autopawnohio.com/femalefil/\">femalefil</a> <a href=\"http://herbalfront.com/depo-medrol/\">depo medrol generic</a> <a href=\"http://nacrossroads.com/mentat/\">mentat to buy</a> <a href=\"http://timoc.org/pill/venlor-xr/\">venlor xr</a> <a href=\"http://christmastoysite.com/forcan/\">forcan without an rx</a> <a href=\"http://medipursuit.com/product/propecia/\">propecia best price</a> <a href=\"http://christmastoysite.com/product/snovitra/\">snovitra</a> <a href=\"http://altavillaspa.com/extra-super-p-force/\">take extra-super-p-force</a> <a href=\"http://autopawnohio.com/lumigan-applicators/\">lumigan applicators walmart price</a> arch making, improve, http://autopawnohio.com/femalefil/ cheapest generic femalefil canadian pharmacy http://herbalfront.com/depo-medrol/ depo medrol http://nacrossroads.com/mentat/ mentat http://timoc.org/pill/venlor-xr/ venlor xr for sale http://christmastoysite.com/forcan/ forcan http://medipursuit.com/product/propecia/ propecia buy online http://christmastoysite.com/product/snovitra/ buy snovitra w not prescription http://altavillaspa.com/extra-super-p-force/ extra super p force to buy http://autopawnohio.com/lumigan-applicators/ lumigan applicators held, form.', '94.23.61.200', '2021-11-06 10:16:46', 0, 1),
(56, 0, 0, 'blog title', 'Name', 'Email', 'Comment', '', '13th October 2022', 0, 0),
(57, 0, 0, 'blog title', 'dfew', 'efwef', 'efwfe', '', '13th October 2022', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `media_title` varchar(255) DEFAULT NULL,
  `media_description` varchar(255) NOT NULL,
  `media_url` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `added_date` varchar(20) DEFAULT NULL,
  `added_by` varchar(20) NOT NULL,
  `is_deleted` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `media_title`, `media_description`, `media_url`, `thumbnail`, `added_date`, `added_by`, `is_deleted`) VALUES
(6, 'MEDIA TITLE', 'Media Description', 'Media URl', '', '13th, October 2022', '1', '0'),
(7, 'Media Title', 'Media Description', 'Media URL', '', '13th, October 2022', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `social_link`
--

CREATE TABLE `social_link` (
  `id` int(11) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `linkedin` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `added_date` varchar(20) NOT NULL,
  `is_deleted` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_link`
--

INSERT INTO `social_link` (`id`, `facebook`, `linkedin`, `twitter`, `added_date`, `is_deleted`) VALUES
(1, 'Facebook', 'Linkedin', 'Twitter', '10th October 2022', 1),
(9, 'Facebook', 'Linkedin', 'Twitter', '13th October 2022', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `last_active` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `last_active`) VALUES
(1, 'admin', '', 'e10adc3949ba59abbe56e057f20f883e', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author_details`
--
ALTER TABLE `author_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_link`
--
ALTER TABLE `social_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author_details`
--
ALTER TABLE `author_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social_link`
--
ALTER TABLE `social_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
