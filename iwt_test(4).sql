-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2021 at 08:04 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iwt_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `A_ID` int(11) NOT NULL,
  `A_Name` varchar(255) NOT NULL,
  `A_Password` varchar(255) NOT NULL,
  `A_Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Cat_ID` int(11) NOT NULL,
  `Cat_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Cat_ID`, `Cat_Name`) VALUES
(1, 'Guitar');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(11) NOT NULL,
  `C_Name` varchar(255) NOT NULL,
  `C_Email` varchar(255) NOT NULL,
  `C_Password` varchar(255) NOT NULL,
  `C_Username` varchar(100) NOT NULL,
  `C_Num` int(11) NOT NULL,
  `C_Address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `C_Name`, `C_Email`, `C_Password`, `C_Username`, `C_Num`, `C_Address`) VALUES
(2, 'nimal', 'nimal@gmail.com', 'kamal123', 'kamal', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `P_ID` int(11) NOT NULL,
  `P_Category` varchar(100) NOT NULL,
  `P_NameShort` varchar(50) NOT NULL,
  `P_Color` varchar(30) NOT NULL,
  `P_Discription_Short` varchar(1000) NOT NULL,
  `P_Discription` varchar(1000) NOT NULL,
  `P_Price` float NOT NULL,
  `P_Pic1` varchar(255) NOT NULL,
  `P_Pic2` varchar(255) NOT NULL,
  `P_Pic3` varchar(255) NOT NULL,
  `P_Qty` int(11) NOT NULL,
  `P_BrandName` varchar(255) NOT NULL,
  `P_Weight` float NOT NULL,
  `P_WarrentyType` varchar(255) NOT NULL,
  `P_BodyMaterial` varchar(255) NOT NULL,
  `P_InTheBox` varchar(255) NOT NULL,
  `P_FreeItems` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`P_ID`, `P_Category`, `P_NameShort`, `P_Color`, `P_Discription_Short`, `P_Discription`, `P_Price`, `P_Pic1`, `P_Pic2`, `P_Pic3`, `P_Qty`, `P_BrandName`, `P_Weight`, `P_WarrentyType`, `P_BodyMaterial`, `P_InTheBox`, `P_FreeItems`) VALUES
(1, 'Guitar', 'Takamine GD11MCE', 'Black', '', 'The Takamine GD11MCE Electro Acoustic Guitar is a quality instrument that is based on the iconic dreadnought body shape. This design gives a large and resonant tone with plenty of low-end and volume for a powerful unplugged sound. The GD11MCE is constructed from solid mahogany with x-bracing, just like higher priced instruments. The mahogany provides a sweet mid-range and warm tonality that would be ideal for singer-songwriters. The single cutaway provides easy access to the whole fingerboard, and this guitar will support many different styles of playing including loud strumming, finger-picking, travis picking, flatpicking and more. With a TP-4T pickup/preamp system, the GD11MCE is ready to be plugged in and amplified for on-stage use. The preamp has a full 3-band EQ for tonal sculpting and a handy built-in tuner for practising or live tuning adjustments. Whether you\'re heading to your next gig, recording session, or simply looking for a guitar to practise with at home, the GD11MCE is ', 15000, 'imgs/dbguitar1.jpg', 'imgs/dbguitar2.jpg', 'imgs/dbguitar3.jpg', 50, 'Yamaha', 3, '2 years', 'plastic', '0', '0'),
(2, 'Drums And Percussions', 'Mapex Armory - 5 Piece', 'Blue', '', 'The Armory Series is the latest realization of the Mapex hybrid shell concept. A fusion of birch and maple delivers the ultimate tonal expression, and the SONIClear™ bearing edge allows the drumhead to sit flat, bringing out the best response by optimizing the relationship between head and shell.', 25000, 'imgs/dbdrums1.jpg', 'imgs/dbdrums2.jpg', 'imgs/dbdrums3.jpg', 255, 'Yamaha', 10, '0', '0', '0', '0'),
(3, 'Keyboard', 'Yamaha GENOS', 'White', '', 'Powered by specially developed Yamaha technology, the sonic quality of every Voice in Genos is beyond any other Digital Workstation you\'ve ever played. Everything you hear, whether it be the beautiful CFX piano, the lush Kino Strings or the punchy Revo!Drums, it just blows you away!\r\n\r\n-AEM (Articulation Element Modeling)\r\n\r\nThis technology simulates the characteristics of musical instruments. During a performance the technology sounds appropriate samples, in real time, according to what and how you play. Samples are smoothly joined and articulated—as would naturally occur on an actual acoustic instrument.\r\n\r\n-C7 Grand Piano\r\n\r\nFor the first time in any Yamaha product, the Genos features our newly sampled C7 Grand Piano Voice. It is great match with Pop/Rock/Jazz and other music.\r\n\r\n-Revo!Drum/SFX\r\n\r\nRevo!Drum Voices recreate the authentic sound of drums. Even when playing the same key multiple times, the sound is always of a different nuance, making it incredibly natural and realistic', 30000, 'imgs/dbkeyboard1.jpg', 'imgs/dbkeyboard2.jpg', 'imgs/dbkeyboard3.jpg', 100, 'Yamaha', 3, '0', '0', '0', '0'),
(4, 'Speakers', 'DBR10 Surround Sound', 'Black', '', 'Delivering an accurate, controlled performance, the Yamaha DBR10 10\" active speaker can withstand a whopping 129dB SPL. Using the latest DSP, Yamaha applied their proprietary FIR-X tuning to optimize the sound and protection algorithms of the DBR10, providing you with plenty of muscle, despite this active speaker\'s rather diminutive size. Incredibly versatile, you can use the DBR10 as a great-sounding main speaker or as a high-performance floor monitor with a quick flick of the Yamaha DBR10 10\" active speaker\'s D-Contour switch. A switchable highpass filter also makes it easy for you to add a subwoofer to your rig. Sweetwater has put together countless live systems over the past three decades, so give us a call.', 45000, 'imgs/dbspeaker1.jpg', 'imgs/dbspealer2.jpg', 'imgs/dbspeaker3.png', 45, 'Yamaha', 7, '', '', '', ''),
(5, 'Drums', 'Mapex Mars 5-Piece Rock Pack', 'Golden', 'The Mars Series Shell Pack offers 100% Birch, shallow depth shells with the new SONIClear™ bearing edge, producing a fast, clear tone with a quick rebound. The Mars Series \"Rock\" Shell Pack features sizes that can span a wide range of playing styles. This configuration offers a blend of power and versatility well-suited for the drummer needing a portable, great sounding kit.', 'The Mars Series Shell Pack offers 100% Birch, shallow depth shells with the new SONIClear™ bearing edge, producing a fast, clear tone with a quick rebound. The Mars Series \"Rock\" Shell Pack features sizes that can span a wide range of playing styles. This configuration offers a blend of power and versatility well-suited for the drummer needing a portable, great sounding kit.', 150000, 'imgs/dbdrums4.jpg', 'imgs/dbdrums5.jpg', 'imgs/dbdrums6.jpg', 20, 'Yamaha', 12, '', 'Iron', '', ''),
(6, 'Guitar', 'Takamine GN93CE NAT', 'Black', 'If you\'re looking for a well balanced guitar with striking looks and good performance features this is ideal. The NEX bodyshape gives a versatile tone ideal for jazz chords, runs and strumming. With a solid Spruce top, Rosewood sides and a beautiful three piece Rosewood/quilt Maple back this guitar stands out from the crowd.\r\n\r\nThe slim Mahogany neck and 12\" bound Rosewood fingerboard offer great feel and playability. The onboard Takamine TK-40D preamp system gives you a built in tuner with three band EQ and gain controls, mid contour switch, notch filter and EQ bypass switch for ultimate versatility and great stage performances.\r\nOther premium features include Maple body, neck and headstock binding; dark wood rosette and body purfling; synthetic bone nut and split bridge saddle; Rosewood headcap; abalone dot inlays; gold die-cast tuners with black buttons; and a beautiful gloss finish.', 'If you\'re looking for a well balanced guitar with striking looks and good performance features this is ideal. The NEX bodyshape gives a versatile tone ideal for jazz chords, runs and strumming. With a solid Spruce top, Rosewood sides and a beautiful three piece Rosewood/quilt Maple back this guitar stands out from the crowd.\r\n\r\nThe slim Mahogany neck and 12\" bound Rosewood fingerboard offer great feel and playability. The onboard Takamine TK-40D preamp system gives you a built in tuner with three band EQ and gain controls, mid contour switch, notch filter and EQ bypass switch for ultimate versatility and great stage performances.\r\nOther premium features include Maple body, neck and headstock binding; dark wood rosette and body purfling; synthetic bone nut and split bridge saddle; Rosewood headcap; abalone dot inlays; gold die-cast tuners with black buttons; and a beautiful gloss finish.', 98000, 'imgs/dbguitar4.jpg', 'imgs/dbguitar5.jpg', 'imgs/dbguitar6.jpg', 15, 'Yamaha', 3.5, '', 'Plastic', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shiping`
--

CREATE TABLE `shiping` (
  `S_ID` varchar(255) NOT NULL,
  `F_Name` varchar(255) NOT NULL,
  `L_Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Country` varchar(255) NOT NULL,
  `Postal_Code` int(11) NOT NULL,
  `Province` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Adrress_Line_1` varchar(255) NOT NULL,
  `Adrress_Line_2` varchar(255) NOT NULL,
  `Contact_number` varchar(255) NOT NULL,
  `Amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shiping`
--

INSERT INTO `shiping` (`S_ID`, `F_Name`, `L_Name`, `Email`, `Country`, `Postal_Code`, `Province`, `City`, `Adrress_Line_1`, `Adrress_Line_2`, `Contact_number`, `Amount`) VALUES
('60b4e49691839', 'nimal', 'flamel', 'nimal@gmail.com', 'Sri Lanka', 0, 'Western Province', 'Galle', 'kaduruduwa', 'Godakanda', '+94123456789', 190000),
('60b4e4d7204b2', 'nimal', 'flamel', 'nimal@gmail.com', 'Sri Lanka', 0, 'Western Province', 'Galle', 'kaduruduwa', 'Godakanda', '+94123456789', 0),
('60b4e731c3390', 'nimal', '', 'nimal@gmail.com', 'Sri Lanka', 0, 'Western Province', 'Galle', 'kaduruduwa', '', '+94123456789', 40000),
('60b4e7420543d', 'nimal', '', 'nimal@gmail.com', 'Sri Lanka', 0, 'Western Province', 'Galle', 'kaduruduwa', '', '+94123456789', 0),
('60b4e76876668', 'nimal', '', 'nimal@gmail.com', 'Sri Lanka', 0, 'Western Province', 'Galle', 'kaduruduwa', '', '+94123456789', 40000),
('60b4e830233e3', 'kamal', '', 'kamal@gmail.com', 'Sri Lanka', 0, 'Western Province', 'Galle', 'kaduruduwa', '', '+94987654321', 0),
('60b4e8539fdd1', 'kamal', '', 'kamal@gmail.com', 'Sri Lanka', 0, 'Western Province', 'Galle', 'kaduruduwa', '', '+94987654321', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`A_ID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Cat_ID`),
  ADD KEY `Cat_ID` (`Cat_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`P_ID`);

--
-- Indexes for table `shiping`
--
ALTER TABLE `shiping`
  ADD PRIMARY KEY (`S_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `A_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Cat_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `P_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
