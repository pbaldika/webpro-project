
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admin` (`id`, `username`, `password`, `update_date`) VALUES
(1, 'admin', 'f925916e2754e5e03f75dd58a5733251', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `pkg_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(10) DEFAULT NULL,
  `in_date` varchar(100) DEFAULT NULL,
  `out_date` varchar(100) DEFAULT NULL,
  `booking_date` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `booking` (`booking_id`, `pkg_id`, `full_name`, `email`, `phone`, `in_date`, `out_date`, `booking_date`, `status`, `udpate_date`) VALUES
(1, 1, 'Ahmad', 'ahmad@gmail.com', '0122222222', '2020-07-11', '2020-07-18', '2020-07-08 06:38:36', 1, '2021-06-17 05:14:01'),
(2, 1, 'Tanvir', 'tanvir@gmail.com', '0133333333', '2020-07-10', '2020-07-13', '2020-07-08 06:43:25', 1, '2021-06-17 05:13:54'),
(3, 1, 'Arinie', 'arinie@gmail.com', '0144444444', '2020-07-11', '2020-07-15', '2020-07-08 06:44:39', 0, '2021-06-17 05:13:22'),
(4, 1, 'Atiqah', 'atiqah@gmail.com', '0155555555', '2021-06-17', '2021-06-30', '2021-06-17 05:03:15', 0, '2021-06-17 05:08:41');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
CREATE TABLE `hotels` (
  `htl_id` int(11) NOT NULL,
  `htl_name` varchar(200) DEFAULT NULL,
  `htl_location` varchar(100) DEFAULT NULL,
  `htl_image` varchar(100) DEFAULT NULL,
  `creation_date` timestamp NULL DEFAULT current_timestamp(),
  `update_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `hotels` (`htl_id`, `htl_name`, `htl_location`, `htl_image`, `creation_date`, `update_date`) VALUES
(1, 'Central Hotel KLIA', 'KLIA Terminal 2', 'portfolio-2.jpg', '2021-07-09 06:03:00', NULL),
(2, 'Central Hotel Sepang', 'Sepang', 'portfolio-3.jpg', '2021-07-09 06:03:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `htl_id` int(11) NOT NULL,
  `pkg_id` int(11) NOT NULL,
  `pkg_name` varchar(200) DEFAULT NULL,
  `pkg_type` varchar(150) DEFAULT NULL,
  `pkg_price` int(11) DEFAULT NULL,
  `pkg_features` varchar(255) DEFAULT NULL,
  `pkg_details` mediumtext DEFAULT NULL,
  `pkg_image` varchar(100) DEFAULT NULL,
  `creation_date` timestamp NULL DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO `packages` (`htl_id`, `pkg_id`, `pkg_name`, `pkg_type`, `pkg_price`, `pkg_features`, `pkg_details`, `pkg_image`, `creation_date`, `update_date`) VALUES ('1', '1', 'Standard', 'Standard', '5000', 'Pickup and drop from airport, Free Wifi, Three meals a day, PCR test every 3 days, 24/7 medical support', 'Located in the heart of the city, the hotels this package has to offer is perfect for your basic quarantine needs. With free WiFi and three daily meals, and medical support, what more can you ask for during your quarantine.', 'Package1.jpg', NULL, NULL), ('2', '2', 'Premier', 'Premier', '7000', 'Pickup and drop from airport, free WiFi, downtown view, three meals a day, minibar, weekly laundry, PCR test every 3 days, 24/7 medical support', 'A 40sqm modern room with a view of downtown. Our Premier Room offers the most exclusive room and bathroom design with separated shower cabin and bathtub. This room also equipped with television with more than 60 channels, docking station for your devices, automatic power curtain, and to ensure your comfort, we also provide specially customized luxury linen with a Bohemian cotton bed sheet, duvet, and, pillows.', 'Package2.jpg', NULL, NULL), ('3', '3', 'Luxury', 'Luxury', '10000', 'Pickup and drop from airport , Free WiFi , Five daily meals , Dining room with a well equipped pantry , Daily laundry , Private gym , Entertainment system, Jacuzzi , PCR tests every 3 days - 24/7 medical support.', 'Inspired by the perfection of the Greek gods, the Luxury Suite is a perfect choice for those of you who always wanted to quarantine in style. This 200sqm room will certainly complete your definition of luxury. Complete with a separate bedroom and expansive entertainment area, a private gym, luxurious marble bathroom with private Jacuzzi and shower, spacious living room, daily laundry, and dining room with a well-equipped pantry, and to top it all off, the best views available,yes, a truly unprecedented luxury!', 'Package3.jpg', NULL, NULL)


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`htl_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`pkg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `htl_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;




