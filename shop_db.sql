-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2024 at 12:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Admin ID` int(100) NOT NULL,
  `Admin Name` varchar(20) NOT NULL,
  `Admin Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Admin ID`, `Admin Name`, `Admin Password`) VALUES
(1234, 'Zisan', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(2, 0, 'Zelan', 'ze@gmail.com', '0170000000', 'I&#39;m experiencing significant issues with my laptop purchased from your store. Urgently seeking your expertise to resolve this matter.'),
(3, 0, 'Arik', 'a@gmail.com', '0180000000', 'As an avid gamer, I am in the market for a high-performance GPU to enhance my computing experience. Could you please provide information on the models you have in stock, along with their prices? Additionally, if there are any upcoming restocks or pre-order options available, I would greatly appreciate being informed.');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int(100) NOT NULL,
  `placed_on` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(7, 1, 'Zisan', '0170000000', 'z@gmail.com', 'cash on delivery', 'flat no. xxxx, xxxx, Dhaka, Dhaka, Bangladesh - 0000', 'ASUS ProArt Studiobook 16 OLED H5600QM Ryzen 7 5800H RTX 3060 6GB Graphics 16 OLED Laptop (275000 x 1) - ', 275000, '2024-05-12', 'Completed'),
(8, 1, 'Arik', '0180000000', 'a@gmail.com', 'paypal', 'flat no. yyyy, yyyy, Narshindi, Dhaka, Bangladesh - 1111', 'Asus ROG Ally RC71L AMD Ryzen Z1 Extreme Gaming Console (84900 x 1) - Asus TUF Gaming A15 FA506NF Ryzen 5 7535HS RTX 2050 4GB Graphics 15.6 FHD Gaming Laptop (106000 x 1) - ', 190900, '2024-05-12', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `details` varchar(500) NOT NULL,
  `price` int(10) NOT NULL,
  `image_01` varchar(100) NOT NULL,
  `image_02` varchar(100) NOT NULL,
  `image_03` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `details`, `price`, `image_01`, `image_02`, `image_03`) VALUES
(1, 'AFOX Radeon RX 550 4GB GDDR5 Dual Fan Graphics Card', 'The AFOX Radeon RX 550 4GB GDDR5 Dual Fan Graphics Card brings energy-saving solutions of Radeon Chill, native support for crucial next-generation API features, and the latest display technologies, like HDR and Radeon FreeSync 2. It features PCI Express 3.0 bus standard. This ensures your GPU stays cool. Radeon Chill dynamically regulates the framerate based on your in-game movements.', 16200, 'AFOX Radeon RX 550 4GB GDDR5 Dual Fan Graphics Card.webp', 'AFOX Radeon RX 550 4GB GDDR5 Dual Fan Graphics Card.webp', 'AFOX Radeon RX 550 4GB GDDR5 Dual Fan Graphics Card.webp'),
(2, 'ASUS ProArt Studiobook 16 OLED H5600QM Ryzen 7 5800H RTX 3060 6GB Graphics 16 OLED Laptop', 'The ASUS ProArt Studiobook 16 OLED H5600QM laptop is equipped with a Ryzen 7 5800H processor (3.2GHz to 4.4GHz, 8 Cores, 16 Threads) and 16GB of DDR4 RAM. It includes a 1TB SSD. This laptop is equipped with a GeForce RTX 3060 6GB GDDR6 GPU and a 16.0-inch 4K (3840 x 2400) OLED 16:10 aspect ratio. The ASUS ProArt Studiobook 16 OLED H5600QM is powered by the Windows 11 operating system.', 275000, 'ASUS ProArt Studiobook 16 OLED H5600QM Ryzen 7 5800H RTX 3060 6GB Graphics 16 OLED Laptop.jpg', 'ASUS ProArt Studiobook 16 OLED H5600QM Ryzen 7 5800H RTX 3060 6GB Graphics 16 OLED Laptop.jpg', 'ASUS ProArt Studiobook 16 OLED H5600QM Ryzen 7 5800H RTX 3060 6GB Graphics 16 OLED Laptop.jpg'),
(3, 'Asus ROG Ally RC71L AMD Ryzen Z1 Extreme Gaming Console', 'The Asus ROG Ally RC71L, a cutting-edge AMD Ryzen Z1 Extreme Gaming Console designed to deliver an unparalleled gaming experience. Equipped with top-of-the-line hardware and innovative features, this gaming console is a powerhouse built for gaming enthusiasts. At the heart of the ROG Ally RC71L lies the AMD Ryzen Z1 Extreme 8 Core - 16 Thread Processor, running at a base clock speed of 3.3 GHz, but capable of reaching an impressive maximum turbo frequency of 5.1 GHz. With 16 MB of Smart Cache an', 84900, 'Asus ROG Ally RC71L AMD Ryzen Z1 Extreme Gaming Console.jpg', 'Asus ROG Ally RC71L AMD Ryzen Z1 Extreme Gaming Console.jpg', 'Asus ROG Ally RC71L AMD Ryzen Z1 Extreme Gaming Console.jpg'),
(4, 'Asus TUF Gaming A15 FA506NF Ryzen 5 7535HS RTX 2050 4GB Graphics 15.6 FHD Gaming Laptop', 'The Asus TUF Gaming A15 FA506NF is a modern gaming laptop with outstanding performance and dependability for serious gamers. This laptop, the AMD Ryzen 5 7535HS, has six cores and a clock speed of 3.3GHz (clocked at 4.55GHz), so it can easily handle intense gaming demands. Its spacious 512GB SSD and 8GB of DDR4 RAM provide seamless multitasking and rapid start-up times. This laptop is equipped with an NVIDIA GeForce RTX 2050 4GB GDDR6 graphics card. This powerful GPU allows for smooth gameplay e', 106000, 'Asus TUF Gaming A15 FA506NF Ryzen 5 7535HS RTX 2050 4GB Graphics 15.6 FHD Gaming Laptop.jpg', 'Asus TUF Gaming A15 FA506NF Ryzen 5 7535HS RTX 2050 4GB Graphics 15.6 FHD Gaming Laptop.jpg', 'Asus TUF Gaming A15 FA506NF Ryzen 5 7535HS RTX 2050 4GB Graphics 15.6 FHD Gaming Laptop.jpg'),
(5, 'Gamdias CHIONE P3-240U ARGB 240mm AIO Liquid CPU Cooler', 'The Gamdias CHIONE P3-240U ARGB 240mm AIO Liquid CPU Cooler is the ultimate in cooling technology, providing a plethora of configurable options along with outstanding performance. The PS LCD Screen, which enables users to display customized material including pictures and animations in png, gif, and jpg formats, is one of its most notable features. In addition to effectively assisting with motherboard cooling, the micro-embedded fan also adds a touch of style.', 16600, 'Gamdias CHIONE P3-240U ARGB 240mm AIO Liquid CPU Cooler.jpg', 'Gamdias CHIONE P3-240U ARGB 240mm AIO Liquid CPU Cooler.jpg', 'Gamdias CHIONE P3-240U ARGB 240mm AIO Liquid CPU Cooler.jpg'),
(6, 'HP Pro 240 G9 Core i3 12th Gen All-in-One Desktop PC', 'The HP Pro 240 G9 Core i3 12th Gen All-in-One Desktop PC is the epitome of efficiency and versatility in the world of computing. Designed to meet the demands of both home and office users, this sleek and compact all-in-one desktop offers a seamless computing experience with its powerful hardware and impressive features. This all-in-one PC is the Intel Core i3-1215U processor, boasting 10M Cache and a turbo clock speed of up to 4.40 GHz. This 12th-generation Intel processor ensures lightning-fast', 74500, 'HP Pro 240 G9 Core i3 12th Gen All-in-One Desktop PC.jpg', 'HP Pro 240 G9 Core i3 12th Gen All-in-One Desktop PC.jpg', 'HP Pro 240 G9 Core i3 12th Gen All-in-One Desktop PC.jpg'),
(7, 'Intel Core i3-12100 12th Gen Budget Desktop PC', 'The Intel Core i3-12100 12th Gen Budget Desktop PC is a well-built device that appeals to customers looking for a system that strikes a compromise between price and functionality.', 25899, 'Intel Core i3-12100 12th Gen Budget Desktop PC.jpg', 'Intel Core i3-12100 12th Gen Budget Desktop PC.jpg', 'Intel Core i3-12100 12th Gen Budget Desktop PC.jpg'),
(8, 'MSI PRO H610M-E DDR4 mATX Motherboard', 'The MSI PRO H610M-E DDR4 12th Gen, 13th Gen & 14th Gen mATX Motherboard is a high-performance motherboard for the LGA 1700 socket that supports 12th/13th Gen Intel Core, Pentium Gold, and Celeron CPUs. This motherboard includes DDR4 memory compatibility, which can run at up to 3200(MAX) MHz. It also has Core Boost technology, a premium layout, and a digital power architecture, which improves performance and enables additional cores. Memory Boost technology, which produces pure data signals, ensu', 10000, 'MSI PRO H610M-E DDR4 mATX Motherboard.jpg', 'MSI PRO H610M-E DDR4 mATX Motherboard.jpg', 'MSI PRO H610M-E DDR4 mATX Motherboard.jpg'),
(9, 'MSI PRO MP251 24.5 100Hz FHD Monitor', 'The MSI PRO MP251 24.5\" 100Hz FHD Monitor is a powerful monitor that may meet both your personal and professional demands. It has a 24.5\" IPS panel with a 1920x1080 full HD resolution, which offers breathtaking clarity and color accuracy. For gaming, video editing, and multimedia, MSI PRO MP251 24.5\" 100Hz FHD Monitor has a 100 Hz refresh rate and a 1ms (MPRT) / 4ms (GTG) reaction time that guarantees seamless motion.', 17800, 'MSI PRO MP251 24.5 100Hz FHD Monitor.jpg', 'MSI PRO MP251 24.5 100Hz FHD Monitor.jpg', 'MSI PRO MP251 24.5 100Hz FHD Monitor.jpg'),
(10, 'OVO J-618 W RGB Mini-Tower mATX Gaming Casing', 'The OVO J-618 W RGB Mini-Tower mATX Gaming Casing is an excellent choice for gaming enthusiasts because it supports Micro-ATX, ITX, and Mini-ITX motherboards, allowing for a wide range of build options. Its eye-catching RGB lighting enhances the gaming experience with brilliant, customizable lighting that fits any configuration. Two 120mm RGB fans that are pre-installed on this OVO J-618 W RGB Mini-Tower mATX Gaming Casing provide efficient cooling while also adding a stylish touch.', 1600, 'OVO J-618 W RGB Mini-Tower mATX Gaming Casing.jpg', 'OVO J-618 W RGB Mini-Tower mATX Gaming Casing.jpg', 'OVO J-618 W RGB Mini-Tower mATX Gaming Casing.jpg'),
(11, 'PNY XLR8 8GB DDR4 3200MHz Desktop Gaming RAM', 'PNY XLR8 Desktop Gaming RAM offers 6GB DDR4 3200MHz CL16 frequency speed, aggressive speed, low latency, and overclocking capabilities. It supports XMP 2.0 for easy overlocking and runs at top speed. The RAM is engineered with heat spreaders for a cool gaming experience. It features top-tier components, Intel XMP compatibility, and stylish heat spreaders. The RAM is rigorously engineered and tested for peak performance in challenging gaming environments.', 2400, 'PNY XLR8 8GB DDR4 3200MHz Desktop Gaming RAM.jpg', 'PNY XLR8 8GB DDR4 3200MHz Desktop Gaming RAM.jpg', 'PNY XLR8 8GB DDR4 3200MHz Desktop Gaming RAM.jpg'),
(12, 'Power Train PT-P200B 200W Power Supply', 'The POWER TRAIN PT-P200B is a reliable and efficient power supply with a sleek SGCC 0.5MM design and 200W power output. It operates at 220V and comes with multiple connectors for compatibility with various devices. The PT-P200B features a 12CM temperature control fan for optimal performance and prevents overheating. Its robust construction and efficient cooling mechanism make it a reliable choice for powering electronic devices.', 1350, 'Power Train PT-P200B 200W Power Supply.jpg', 'Power Train PT-P200B 200W Power Supply.jpg', 'Power Train PT-P200B 200W Power Supply.jpg'),
(13, 'Sapphire NITRO+ AMD Radeon RX 6950 XT PURE 16GB GDDR6 Gaming Graphics Card', 'The Sapphire NITRO+ AMD Radeon RX 6950 XT PURE is a 16GB GDDR6 gaming graphics card with a One Click TOXIC Boost Beyond 2435 MHz, Boost Clock up to 2368 MHz, and Game Clock up to 2162 MHz. It features 5120 stream processors and RDNA 2 Gaming Architecture with Ray Accelerator: 80. The card offers powerful 4K gaming performance and innovative overclocking solutions. It allows easy switching between dual BIOS modes using TriXX software. The card features a built-in ARGB and ARGB fan, with options f', 97900, 'Sapphire NITRO+ AMD Radeon RX 6950 XT PURE 16GB GDDR6 Gaming Graphics Card.jpg', 'Sapphire NITRO+ AMD Radeon RX 6950 XT PURE 16GB GDDR6 Gaming Graphics Card.jpg', 'Sapphire NITRO+ AMD Radeon RX 6950 XT PURE 16GB GDDR6 Gaming Graphics Card.jpg'),
(14, 'TwinMOS 4GB 3200MHz DDR4 U-DIMM Desktop RAM', 'The TwinMOS 4GB 3200MHz DDR4 U-DIMM RAM has a 4GB of DDR4 memory capacity. This RAM is a single-channel RAM with a CAS Latency of CL22. It has XMP support and the required voltage for the RAM is 1.2V. The TwinMOS 4GB 3200MHz DDR4 U-DIMM RAM has a frequency speed of 3200MHz.', 2000, 'TwinMOS 4GB 3200MHz DDR4 U-DIMM Desktop RAM.jpg', 'TwinMOS 4GB 3200MHz DDR4 U-DIMM Desktop RAM.jpg', 'TwinMOS 4GB 3200MHz DDR4 U-DIMM Desktop RAM.jpg'),
(15, 'Value-Top V500W Mini Tower Micro ATX Gaming Casing', 'The Value-Top V500W Micro ATX Gaming Casing is a Mini Tower casing made from A grade SPCC material with a 0.6mm thickness. It supports ATX power supply units and Micro ATX/ITX motherboards, offering versatile compatibility for various hardware configurations. The casing features an RGB rear 120mm fan for effective heat dispersion and can be modified with additional fan positions for improved performance. The casing also offers two HDD and two SSD drive bays, allowing for efficient storage manage', 2300, 'Value-Top V500W Mini Tower Micro ATX Gaming Casing.jpg', 'Value-Top V500W Mini Tower Micro ATX Gaming Casing.jpg', 'Value-Top V500W Mini Tower Micro ATX Gaming Casing.jpg'),
(16, 'Xigmatek AIR-KILLER PRO ARCTIC ARGB CPU Air Cooler', 'The Xigmatek AIR-KILLER PRO ARCTIC is an air cooler with an ultra-efficient thermal heat pipe and patented Xigmatek H.D.T. Technology. It offers high-performance heat dissipation and airflow, features a colorful ARGB LED Top Cover and X22A Fan, and comes with a Mini ARGB LED Controller. It has a long-life hydraulic bearing and MTTF of up to 50,000 hours, supports the latest 12th Gen Intel Core desktop processor family, and is compatible with various sockets. It comes with a 1-year warranty.', 3900, 'Xigmatek AIR-KILLER PRO ARCTIC ARGB CPU Air Cooler.jpg', 'Xigmatek AIR-KILLER PRO ARCTIC ARGB CPU Air Cooler.jpg', 'Xigmatek AIR-KILLER PRO ARCTIC ARGB CPU Air Cooler.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(2, 'Arik', 'a@gmail.com', '2345'),
(3, 'Zelan', 'ze@gmail.com', '1111'),
(4, 'Yasin', 'y@gmail.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `pid` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Admin ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Admin ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1237;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
