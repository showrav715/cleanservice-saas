-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2023 at 01:14 AM
-- Server version: 8.0.32-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleantech_clean_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint NOT NULL,
  `header_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `experience` int DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `header_title`, `title`, `experience`, `description`, `number`, `photo`, `user_id`) VALUES
(1, 'make your area amazing', 'One Stop Commercial Cleaning Company', 55, 'Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '01700000000', '17337684321684042741.jpg', 31);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verify_token`, `phone`, `photo`, `role_id`, `role`, `status`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'adminssssss', 'admin@gmail.com', '', '09000000', '2722506111683546816.jpg', '0', 'Administrator', 1, '$2y$10$Muu9xoTvxsx6mHh3yjqLTecTKADrG7YMYmGIqWIuz.YbDoR97Cqw.', 'UiH9lwW5dlWS3Y6vqEPHr5iLGddSRbzyLKfw3Mk7nib5fP6hcwuIMv2DcYSG', NULL, '2023-05-08 05:53:36'),
(2, 'developer', 'developer@gmail.com', '', '09000000', '33Adgfsa1dfsfa.jpg', '0', 'Administrator', 1, '$2y$10$Muu9xoTvxsx6mHh3yjqLTecTKADrG7YMYmGIqWIuz.YbDoR97Cqw.', 'glpx4neO6HyZ8XIpqxdK9uiadv9acZGW6Ggbe2GnZgpNODh77oITf9WNBshY', NULL, '2021-12-08 05:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `admin_languages`
--

CREATE TABLE `admin_languages` (
  `id` int NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtl` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_languages`
--

INSERT INTO `admin_languages` (`id`, `is_default`, `language`, `file`, `rtl`) VALUES
(1, 0, 'test', '1638353833MI23H252.json', 0),
(5, 0, 'tet4', '1638353982qIEUykRT.json', 0);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int UNSIGNED NOT NULL,
  `category_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1',
  `meta_tag` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `title`, `slug`, `photo`, `description`, `source`, `views`, `status`, `meta_tag`, `meta_description`, `tags`, `created_at`, `updated_at`) VALUES
(66, 8, 'Power of Service: A Glimpse into Our Service Agency', 'power-of-service-a-glimpse-into-our-service-agency', '13730360351684295745.jpg', '<div>Introduction:</div><div>Welcome to our service agency blog! As a service agency, we are passionate about the power of service and how it impacts our clients and our agency as a whole. In this blog post, we\'ll share insights and perspectives on the importance of service and how we unleash its full potential in our agency. From our customer-centric approach to our commitment to innovation, we\'ll explore the key elements that make service a driving force in our agency\'s success.</div><div><br></div><div>Putting Customers First:</div><div>At our service agency, our customers are at the heart of everything we do. We prioritize their needs, preferences, and satisfaction in every interaction. Our customer-centric approach means that we take the time to truly understand our clients and their unique requirements. We actively listen to their feedback, concerns, and suggestions, and we tailor our services to meet their specific needs. By putting our customers first, we build trust, loyalty, and long-term relationships that are the foundation of our success.</div><div><br></div><div>Innovative Solutions:</div><div>Service is not just about meeting existing needs - it\'s also about anticipating future ones. We strive to be at the forefront of innovation, constantly seeking new and creative ways to improve our services and exceed our clients\' expectations. We invest in cutting-edge technologies, tools, and processes to streamline our service delivery, enhance efficiency, and provide innovative solutions that add value to our clients\' businesses. We embrace a culture of continuous improvement, always looking for ways to push the boundaries of what\'s possible in service delivery.</div><div><br></div><div>Empowered and Skilled Team:</div><div>Our service agency recognizes that our team is our greatest asset. We empower our team members to excel in their roles by providing them with the necessary training, resources, and support. We foster a positive and collaborative work environment that encourages creativity, initiative, and continuous learning. Our team members are highly skilled and knowledgeable in their areas of expertise, and they are dedicated to providing exceptional service to our clients. We recognize and reward their contributions, which in turn, boosts their motivation, engagement, and commitment to delivering outstanding service.</div>', NULL, 0, 1, NULL, NULL, NULL, '2023-03-12 05:28:22', '2023-05-16 21:55:45'),
(67, 9, 'Exceptional Service: Insights from a Service Agency', 'exceptional-service-insights-from-a-service-agency', '7055184211684295728.jpg', '<div>Welcome to our service agency blog! As a service agency, we understand that delivering exceptional service is the cornerstone of our success. In this blog post, we\'ll share insights and perspectives on the power of exceptional service and how it impacts our agency and the clients we serve. From building lasting relationships to exceeding expectations, we\'ll explore the key elements that make exceptional service a driving force in our agency\'s ethos.</div><div><br></div><div>Building Lasting Relationships:</div><div>At our service agency, we believe that building strong and lasting relationships is crucial to providing exceptional service. We strive to establish genuine connections with our clients, understanding their unique needs, preferences, and goals. By taking the time to actively listen and communicate effectively, we build trust and loyalty, which fosters long-term relationships. We also prioritize regular communication, maintaining open lines of dialogue with our clients to ensure their needs are met and expectations are exceeded.</div><div><br></div><div>Exceeding Expectations:</div><div>Exceptional service goes beyond meeting basic expectations - it\'s about going above and beyond to exceed them. We make it our mission to deliver service that surprises and delights our clients. This may involve anticipating their needs, providing proactive solutions, and offering personalized recommendations. We constantly seek ways to add value to our services, striving for excellence in every interaction with our clients. By exceeding expectations, we aim to create memorable experiences that leave a lasting positive impression.</div><div><br></div><div>Providing Timely and Responsive Service:</div><div>Timeliness and responsiveness are critical components of exceptional service. We understand that our clients rely on us to be prompt and responsive in addressing their needs. We strive to provide timely service, whether it\'s responding to inquiries, resolving issues, or delivering results. We understand that delays or lack of responsiveness can impact our clients\' experience and satisfaction, and we make it a priority to be prompt and proactive in our service delivery.</div><div><br></div><div>Maintaining Professionalism and Expertise:</div><div>As a service agency, professionalism and expertise are the foundation of our service offerings. We ensure that our team members are highly skilled, knowledgeable, and continuously trained to stay up-to-date with industry trends and best practices. We maintain a professional demeanor in all our interactions with clients, upholding ethical standards and treating them with respect and courtesy. Our expertise and professionalism enable us to deliver high-quality service that meets or exceeds industry standards.</div><div><br></div><div>Continuous Improvement:</div><div>Exceptional service is an ongoing journey, and we are committed to continuously improving our service offerings. We actively seek feedback from our clients, listen to their suggestions, and use them to refine and enhance our services. We also conduct regular evaluations and assessments to identify areas for improvement and implement necessary changes. Our commitment to continuous improvement ensures that our clients receive the best possible service and that we remain at the forefront of our industry.</div>', NULL, 0, 1, NULL, NULL, NULL, '2023-03-12 05:28:44', '2023-05-16 21:55:28'),
(68, 9, 'The Power of Service: Insights from a Service Agency', 'the-power-of-service-insights-from-a-service-agency', '17412878881684295715.jpg', '<div>Welcome to our service agency blog! As a service agency, we understand the importance of delivering exceptional service to our clients and customers. In this blog post, we\'ll share insights and perspectives on the power of service and how it impacts our agency and the clients we serve. From building relationships to exceeding expectations, we\'ll explore the key elements that make service a driving force in our agency\'s success.</div><div><br></div><div>Building Relationships:</div><div>At our service agency, we believe that building strong relationships is at the heart of providing exceptional service. We strive to establish genuine connections with our clients, understanding their needs, preferences, and goals. By taking the time to listen and communicate effectively, we build trust and loyalty, which fosters long-term relationships.</div>', NULL, 0, 1, NULL, NULL, NULL, '2023-03-12 05:28:59', '2023-05-16 21:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `slug`, `status`) VALUES
(8, 'Clean', 'clean', 1),
(9, 'Service', 'service', 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `photo`, `user_id`) VALUES
(5, 'Google', '562071701681280700.png', NULL),
(6, 'airbnb', '13992105251681280608.png', NULL),
(7, 'Paypal', '7706546111681280711.png', NULL),
(8, 'Amazon', '15557659161681809733.png', NULL),
(9, 'Shopify', '7012659511681809983.png', NULL),
(10, 'Slack', '12058583201681809995.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` bigint DEFAULT NULL,
  `service_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `type`, `user_id`, `service_id`, `created_at`, `updated_at`) VALUES
(9, 'showrav Hasan', 'teacher@gmail.com', '01728332009', NULL, 'sdfasd', 'get_in_touch', 31, 2, '2023-06-13 02:22:25', '2023-06-13 02:22:25'),
(10, 'showrav Hasan', 'showrabhasan715@gmail.com', '017283320', 'test', 'sdafas', 'contact', 31, NULL, '2023-06-13 02:22:44', '2023-06-13 02:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `counter_number` int NOT NULL DEFAULT '0',
  `icon` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `title`, `counter_number`, `icon`, `user_id`) VALUES
(1, 'Projects', 1102, 'fab fa-accusoft', 31),
(3, 'Customers', 210, 'fab fa-adversal', 31),
(4, 'Workers', 700, 'fab fa-algolia', 31),
(5, 'Office', 75, 'fas fa-address-book', 31);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint UNSIGNED NOT NULL,
  `default` int UNSIGNED NOT NULL DEFAULT '0' COMMENT '1 => default, 0 => not default',
  `symbol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int UNSIGNED NOT NULL DEFAULT '0' COMMENT '1 => active, 0 => inactive',
  `value` decimal(11,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `default`, `symbol`, `code`, `status`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, '$', 'USD', 1, 1.00, '2021-12-19 16:12:58', '2022-11-29 22:53:30'),
(4, 0, '€', 'EUR', 1, 0.89, '2021-12-19 16:12:58', '2022-12-06 15:31:17'),
(7, 1, '₹', 'INR', 1, 75.00, '2022-01-25 14:28:23', '2022-11-29 22:37:29'),
(8, 0, '₦', 'NGN', 1, 416.00, '2022-02-05 17:41:35', '2022-11-29 21:14:16'),
(11, 0, 'SAR', 'SAR', 1, 1.00, '2022-02-05 17:41:35', '2022-11-29 21:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint NOT NULL,
  `user_id` int DEFAULT NULL,
  `user_info` text COLLATE utf8mb4_general_ci,
  `status` varchar(111) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txn_id` varchar(222) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `method` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `currency_info` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `user_id`, `user_info`, `status`, `txn_id`, `created_at`, `updated_at`, `amount`, `method`, `currency_info`) VALUES
(7, 1, '{\"id\":1,\"name\":\"User Hasan\",\"email\":\"user@gmail.com\",\"photo\":\"TLA1588136853people.png\",\"phone\":\"17283320\",\"country\":\"Belarus\",\"city\":\"add\",\"address\":\"Tangail,Dhaka,Bangladesh\",\"zip\":\"1234\",\"status\":1,\"email_verified\":null,\"verification_link\":null,\"balance\":600,\"created_at\":null,\"updated_at\":\"2022-01-11T11:08:36.000000Z\"}', 'completed', '2813400', '2022-01-11 05:09:59', '2022-01-11 05:09:59', 100, 'flutterwave', '{\"id\":1,\"name\":\"USD\",\"sign\":\"$\",\"value\":1,\"is_default\":1}'),
(8, 1, '{\"id\":1,\"name\":\"User Hasan\",\"email\":\"user@gmail.com\",\"photo\":\"TLA1588136853people.png\",\"phone\":\"17283320\",\"country\":\"Belarus\",\"city\":\"add\",\"address\":\"Tangail,Dhaka,Bangladesh\",\"zip\":\"1234\",\"status\":1,\"email_verified\":null,\"verification_link\":null,\"balance\":700,\"created_at\":null,\"updated_at\":\"2022-01-11T11:09:59.000000Z\"}', 'completed', '955160748', '2022-01-11 21:47:57', '2022-01-11 21:47:57', 0.2747864222533, '0', '{\"id\":9,\"name\":\"NGN\",\"sign\":\"\\u20a6\",\"value\":363.919,\"is_default\":1}'),
(9, 1, '{\"id\":1,\"name\":\"User Hasan\",\"email\":\"user@gmail.com\",\"photo\":\"TLA1588136853people.png\",\"phone\":\"17283320\",\"country\":\"Belarus\",\"city\":\"add\",\"address\":\"Tangail,Dhaka,Bangladesh\",\"zip\":\"1234\",\"status\":1,\"email_verified\":null,\"verification_link\":null,\"balance\":700.27478642225,\"created_at\":null,\"updated_at\":\"2022-01-12T03:47:57.000000Z\"}', 'completed', '85656909', '2022-01-11 21:48:36', '2022-01-11 21:48:36', 0.2747864222533, '0', '{\"id\":9,\"name\":\"NGN\",\"sign\":\"\\u20a6\",\"value\":363.919,\"is_default\":1}'),
(10, 1, '{\"id\":1,\"name\":\"User Hasan\",\"email\":\"user@gmail.com\",\"photo\":\"TLA1588136853people.png\",\"phone\":\"17283320\",\"country\":\"Belarus\",\"city\":\"add\",\"address\":\"Tangail,Dhaka,Bangladesh\",\"zip\":\"1234\",\"status\":1,\"email_verified\":null,\"verification_link\":null,\"balance\":700.5495728445,\"created_at\":null,\"updated_at\":\"2022-01-12T03:48:36.000000Z\"}', 'completed', '40080298343', '2022-01-11 22:07:48', '2022-01-11 22:07:48', 100, '0', '{\"id\":1,\"name\":\"USD\",\"sign\":\"$\",\"value\":1,\"is_default\":1}'),
(11, 1, '{\"id\":1,\"name\":\"User Hasan\",\"email\":\"user@gmail.com\",\"photo\":\"TLA1588136853people.png\",\"phone\":\"17283320\",\"country\":\"Belarus\",\"city\":\"add\",\"address\":\"Tangail,Dhaka,Bangladesh\",\"zip\":\"1234\",\"status\":1,\"email_verified\":null,\"verification_link\":null,\"balance\":800.5495728445,\"created_at\":null,\"updated_at\":\"2022-01-12T04:07:48.000000Z\"}', 'completed', '2951913a35854ea6991f522b6cbe0012', '2022-01-11 23:17:43', '2022-01-11 23:17:43', 100, 'instamojo', '{\"id\":1,\"name\":\"USD\",\"sign\":\"$\",\"value\":1,\"is_default\":1}');

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` bigint NOT NULL,
  `package_order_id` bigint UNSIGNED NOT NULL,
  `domain` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL,
  `will_expire` date NOT NULL,
  `data` text COLLATE utf8mb4_general_ci NOT NULL,
  `is_trial` tinyint NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `package_order_id`, `domain`, `status`, `will_expire`, `data`, `is_trial`, `user_id`) VALUES
(4, 73, 'cleandemo.geniusocean.net', 1, '2024-06-11', '{\"id\":4,\"name\":\"Premium\",\"description\":\"Premium Package\",\"price\":12,\"days\":\"365\",\"service_limit\":5,\"blog_limit\":5,\"project_limit\":5,\"team_limit\":5,\"custom_domain\":1,\"support\":1,\"qr_code\":1,\"multiple_theme\":1,\"facebook_pixel\":1,\"google_analytics\":1,\"is_featured\":1,\"status\":1}', 0, 31);

-- --------------------------------------------------------

--
-- Table structure for table `domain_requests`
--

CREATE TABLE `domain_requests` (
  `id` bigint NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `domain_type` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `domain_requests`
--

INSERT INTO `domain_requests` (`id`, `user_id`, `domain`, `message`, `domain_type`, `status`, `created_at`, `updated_at`) VALUES
(6, 31, 'showrav123', NULL, 'Sub_domain', 1, NULL, NULL),
(7, 31, 'showrav1', NULL, 'Sub_domain', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int NOT NULL,
  `email_type` varchar(255) COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `email_subject` mediumtext COLLATE utf8mb3_unicode_ci,
  `email_body` longtext COLLATE utf8mb3_unicode_ci,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `email_type`, `email_subject`, `email_body`, `status`) VALUES
(1, 'new_order', 'Your Order Placed Successfully', '<p>Hello {customer_name},<br>Your Order Number is {order_number}<br>Your order has been placed successfully</p>', 1),
(2, 'new_registration', 'Welcome To Booking Core', '<p>Hello {customer_name},<br>You have successfully registered to {website_title}, We wish you will have a wonderful experience using our service.</p><p>Thank You<br></p>', 1),
(4, 'subscription_warning', 'Your subscrption plan will end after five days', '<p>Hello {customer_name},<br>Your subscription plan duration will end after five days. Please renew your plan otherwise all of your products will be deactivated.</p><p>Thank You<br></p>', 1),
(5, 'user_verification', 'Request for verification.', '<p>Hello {customer_name},<br>You are requested verify your account. Please send us photo of your passport.</p><p>Thank You<br></p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_general_ci,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `title`, `details`, `user_id`) VALUES
(3, 'How do you ensure the quality of your services', 'Quality is a top priority for our agency. We have established rigorous quality assurance processes that include', 31),
(5, 'What makes your agency\'s services unique?', 'Our agency prides itself on delivering exceptional and unique services that set us apart from the competition. Some factors that make our services stand out include', 31),
(6, 'How can I request a service from your agency?', 'Requesting a service from our agency is easy! You can either contact us through our website, phone, or email to inquire about our services and discuss your specific needs with our team. We will work closely with you to understand your requirements and provide you with a tailored service proposal based on your needs.', 31),
(7, 'What services does your agency provide?', 'Our agency provides a wide range of services tailored to meet the unique needs of our clients. These services may include but are not limited', 31);

-- --------------------------------------------------------

--
-- Table structure for table `generalsettings`
--

CREATE TABLE `generalsettings` (
  `id` int NOT NULL,
  `light_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `error_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `breadcumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loader` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtp_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_pass` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'theme1',
  `is_debug` tinyint NOT NULL DEFAULT '0',
  `is_disqus` tinyint NOT NULL DEFAULT '0',
  `disqus` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_tawk` tinyint NOT NULL DEFAULT '0',
  `tawk_id` varchar(222) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verify` tinyint DEFAULT '0',
  `is_cookie` tinyint NOT NULL DEFAULT '0',
  `cookie_btn_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cookie_text` text COLLATE utf8mb4_unicode_ci,
  `is_popup` tinyint NOT NULL DEFAULT '0',
  `popup_image` text COLLATE utf8mb4_unicode_ci,
  `popup_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popup_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_maintenance` tinyint DEFAULT '0',
  `maintenance` text COLLATE utf8mb4_unicode_ci,
  `menu` text COLLATE utf8mb4_unicode_ci,
  `working_hour` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_section_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_section_header_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_section_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recaptcha` tinyint NOT NULL DEFAULT '0',
  `recaptcha_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recaptcha_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_text` text COLLATE utf8mb4_unicode_ci,
  `banner_video` text COLLATE utf8mb4_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `generalsettings`
--

INSERT INTO `generalsettings` (`id`, `light_logo`, `phone`, `email`, `address`, `copyright_text`, `header_logo`, `footer_logo`, `error_banner`, `favicon`, `breadcumb`, `title`, `loader`, `smtp_host`, `mail_type`, `smtp_port`, `smtp_user`, `smtp_pass`, `mail_encryption`, `from_email`, `from_name`, `theme_color`, `theme`, `is_debug`, `is_disqus`, `disqus`, `is_tawk`, `tawk_id`, `is_verify`, `is_cookie`, `cookie_btn_text`, `cookie_text`, `is_popup`, `popup_image`, `popup_title`, `popup_url`, `is_maintenance`, `maintenance`, `menu`, `working_hour`, `header_text`, `contact_section_photo`, `contact_section_header_title`, `contact_section_title`, `faq_photo`, `counter_photo`, `recaptcha`, `recaptcha_key`, `recaptcha_secret`, `banner_photo`, `banner_title`, `banner_text`, `banner_video`) VALUES
(1, '3222453821680067362.png', '0979900000', 'support@gmail.com', '380 St, New York, USA', 'Copyright © 2023 Reserved Passion by GeniusOcean', '2721528761683546803.png', '14850944401680067380.png', 'nx0dgfsa1dfsfa.jpg', '2787839931684295803.png', '19467058841678765084.jpg', 'Creative', '1564224328loading3.gif', 'sandbox.smtp.mailtrap.io', 'php_mailer', '2525', '77c8df7c3e0779', '509dc95e1382f5', 'tls', 'geniustest11@gmail.com', 'CleanTecService', '#18E57A', 'theme3', 1, 0, 'test', 0, '6124fa49d6e7610a49b1c136/1fds73c17', 1, 1, 'dsafasdfadfa', 'asdfasdffasdf', 0, 'IMn1588136843organizer.png', 'test', 'test', 0, 'Site Down', '{\"Blog\":{\"title\":\"Blog\",\"dropdown\":\"no\",\"href\":\"http:\\/\\/localhost\\/work\\/foodpa\\/blog\",\"target\":\"self\"},\"Contact\":{\"title\":\"Contact\",\"dropdown\":\"no\",\"href\":\"http:\\/\\/localhost\\/work\\/foodpa\\/contact\",\"target\":\"self\"},\"Categories\":{\"title\":\"Categories\",\"dropdown\":\"yes\",\"href\":null,\"target\":\"self\"},\"Home\":{\"title\":\"Home\",\"dropdown\":\"no\",\"href\":\"ROUTE HERE\",\"target\":\"self\"},\"Return-Policy\":{\"title\":\"Return Policy\",\"dropdown\":\"no\",\"href\":\"http:\\/\\/localhost\\/work\\/foodpa\\/return-policy\",\"target\":\"self\"},\"test\":{\"title\":\"test\",\"dropdown\":\"no\",\"href\":\"Route Here\",\"target\":\"self\"}}', NULL, NULL, '15407574641678678201.jpg', 'Get a Free Estimate', 'Contact for Services', '16248367891678853615.png', '20556986401678853761.jpg', 1, 'xcv', 'zcvzxcv', '11290325781684296318.png', 'Start your Dream eCommerce here', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 'https://www.youtube.com/watch?v=xcJtL7QggTI&ab_channel=QuangNguyen');

-- --------------------------------------------------------

--
-- Table structure for table `hold_orders`
--

CREATE TABLE `hold_orders` (
  `id` bigint NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cart` text COLLATE utf8mb4_general_ci,
  `country` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shipping` text COLLATE utf8mb4_general_ci,
  `package` text COLLATE utf8mb4_general_ci,
  `amount` double DEFAULT '0',
  `method` varchar(111) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `callback` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `order_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txn_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `charge` double DEFAULT '0',
  `final_amo` double NOT NULL DEFAULT '0',
  `detail` text COLLATE utf8mb4_general_ci,
  `btc_amo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `btc_wallet` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `try` int NOT NULL DEFAULT '0',
  `admin_feedback` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `main_type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rtl` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `is_default`, `language`, `file`, `rtl`) VALUES
(1, 1, 'English', '163479343308Fu3jm9.json', 0),
(11, 0, 'test', '1638347401hPc8azyI.json', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(191) DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `designation`, `message`, `photo`) VALUES
(17, 'Test Productss', 'test', 'test', 'nqD1588136884bv-rm.jpg'),
(18, 'showrav Hasan', 'Designation', 'asdfasd', 'Nv41588136853people.png');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_25_053316_create_admins_table', 2),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 3),
(7, '2023_06_15_112734_create_job_batches_table', 4),
(8, '2023_06_18_062042_create_records_table', 5),
(9, '2023_06_18_062744_create_jobs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL DEFAULT '0',
  `days` varchar(10) DEFAULT NULL,
  `service_limit` int NOT NULL DEFAULT '0',
  `blog_limit` int NOT NULL,
  `project_limit` int NOT NULL,
  `team_limit` int NOT NULL,
  `custom_domain` tinyint NOT NULL DEFAULT '0',
  `support` tinyint NOT NULL DEFAULT '0',
  `qr_code` tinyint NOT NULL DEFAULT '0',
  `multiple_theme` tinyint NOT NULL DEFAULT '0',
  `facebook_pixel` tinyint NOT NULL DEFAULT '0',
  `google_analytics` tinyint NOT NULL DEFAULT '0',
  `is_featured` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `description`, `price`, `days`, `service_limit`, `blog_limit`, `project_limit`, `team_limit`, `custom_domain`, `support`, `qr_code`, `multiple_theme`, `facebook_pixel`, `google_analytics`, `is_featured`, `status`) VALUES
(6, 'Standard', 'Standard Package', 12, '365', 5, 5, 5, 5, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_orders`
--

CREATE TABLE `package_orders` (
  `id` bigint NOT NULL,
  `order_no` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `txn` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `will_expire` date NOT NULL,
  `user_id` int NOT NULL,
  `package_id` int NOT NULL,
  `method` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL,
  `payment_status` tinyint NOT NULL,
  `currency` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `package_orders`
--

INSERT INTO `package_orders` (`id`, `order_no`, `amount`, `txn`, `will_expire`, `user_id`, `package_id`, `method`, `status`, `payment_status`, `currency`, `created_at`, `updated_at`) VALUES
(73, '31ORD-1686558388', 12, 'pay_M0x5HULjzqkEcD', '2024-06-11', 31, 4, 'Razorpay', 1, 1, '{\"id\":7,\"default\":1,\"symbol\":\"\\u20b9\",\"code\":\"INR\",\"status\":1,\"value\":\"75.00\",\"created_at\":\"2022-01-25T20:28:23.000000Z\",\"updated_at\":\"2022-11-30T04:37:29.000000Z\"}', '2023-06-12 02:26:28', '2023-06-12 02:26:28');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `details`, `meta_tag`, `meta_description`) VALUES
(6, 'Terms & Condition', 'terms-condition', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Thank you for visiting our service agency website. Please review the following terms and conditions that govern your use of our website. By accessing or using our website, you agree to comply with these terms and conditions. If you do not agree with any of these terms, please do not use our website.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Intellectual Property: All content on our website, including but not limited to text, graphics, logos, images, videos, and software, is the property of our service agency or its licensors and is protected by intellectual property laws. You may not use, copy, reproduce, distribute, transmit, or modify any content on our website without our prior written consent.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Use of Website: Our website is intended for personal, non-commercial use only. You may not use our website for any illegal or unauthorized purpose. You agree not to disrupt, damage, or interfere with the functioning of our website or its associated servers or networks. You also agree not to use any automated means, such as bots or scripts, to access or use our website.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Privacy Policy: We respect your privacy and handle your personal information in accordance with our Privacy Policy, which is incorporated by reference into these terms and conditions. Please review our Privacy Policy to understand our practices regarding the collection, use, and disclosure of your personal information.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Links to Third-Party Websites: Our website may contain links to third-party websites that are not owned or controlled by our service agency. We do not endorse or assume any responsibility for the content, privacy policies, or practices of such third-party websites. You acknowledge and agree that your use of third-party websites is at your own risk and subject to their respective terms and conditions.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Disclaimer of Warranties: Our website is provided on an \"as is\" and \"as available\" basis, without any warranties or representations of any kind, whether express or implied, including but not limited to warranties of merchantability, fitness for a particular purpose, and non-infringement. We do not warrant that our website will be error-free, uninterrupted, secure, or free from viruses or other harmful components.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Limitation of Liability: To the fullest extent permitted by applicable law, our service agency and its affiliates, officers, directors, employees, and agents shall not be liable for any direct, indirect, incidental, consequential, or special damages arising out of or in connection with your use of our website, even if we have been advised of the possibility of such damages. In jurisdictions that do not allow the exclusion or limitation of liability for certain damages, our liability shall be limited to the fullest extent permitted by applicable law.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Indemnification: You agree to indemnify, defend, and hold harmless our service agency and its affiliates, officers, directors, employees, and agents from and against any and all claims, liabilities, damages, losses, costs, and expenses, including reasonable attorneys\' fees, arising out of or in connection with your use of our website or your violation of these terms and conditions.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Modifications: We reserve the right to modify, suspend, or terminate our website or these terms and conditions at any time without prior notice. Any changes to these terms and conditions will be effective immediately upon posting on our website. Your continued use of our website after any such changes constitutes your acceptance of the modified terms and conditions.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Governing Law and Jurisdiction: These terms and conditions shall be governed by and construed in accordance with the laws of [insert applicable jurisdiction]. Any dispute arising out of or in connection with these terms and conditions shall be resolved exclusively in the courts of [insert applicable jurisdiction].</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Entire Agreement: These terms and conditions constitute the entire agreement between you and our service agency regarding your use of our website, and supersede all prior or contemporaneous agreements</span></font></h2>', NULL, NULL),
(8, 'Privacy & Policy', 'privacy-policy', '<p>Thank you for visiting our service agency website. We are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, and disclose your personal information when you use our website. By accessing or using our website, you consent to the collection, use, and disclosure of your personal information as described in this Privacy Policy. If you do not agree with any part of this Privacy Policy, please do not use our website.</p><p><br></p><p>Information We Collect: We may collect personal information from you when you voluntarily provide it to us through our website, such as when you fill out a contact form, subscribe to our newsletter, or interact with our website in any other way. The personal information we may collect includes, but is not limited to, your name, email address, phone number, and any other information you choose to provide.</p><p><br></p><p>Use of Information: We may use the personal information we collect for various purposes, including to respond to your inquiries, provide you with information or services you request, send you newsletters or other communications, improve our website, and comply with legal obligations. We may also use your personal information for other purposes that are disclosed to you at the time of collection or with your consent.</p><p><br></p><p>Disclosure of Information: We may disclose your personal information to third-party service providers who assist us in operating our website and providing services to you, such as web hosting, analytics, and marketing. We may also disclose your personal information to comply with legal obligations, protect our rights or the rights of others, or enforce our website\'s terms and conditions. We do not sell, rent, or otherwise disclose your personal information to third parties for their marketing purposes without your consent.</p><p><br></p><p>Security: We take reasonable measures to protect the security of your personal information and to prevent unauthorized access, use, or disclosure. However, please note that no method of transmission over the Internet or electronic storage is 100% secure, and we cannot guarantee the absolute security of your personal information.</p><p><br></p><p>Cookies: Our website may use cookies, which are small text files that are stored on your computer or device when you access our website. Cookies may be used for various purposes, such as to analyze website traffic, personalize content, and improve your experience on our website. You may choose to disable cookies through your browser settings, but doing so may affect the functionality of our website.</p><p><br></p><p>Third-Party Websites: Our website may contain links to third-party websites that are not owned or controlled by our service agency. We are not responsible for the privacy practices or content of such third-party websites. We recommend reviewing the privacy policies of those websites before providing any personal information.</p><p><br></p><p>Children\'s Privacy: Our website is not intended for children under the age of 13. We do not knowingly collect personal information from children under the age of 13. If you are a parent or guardian and believe that your child has provided us with personal information, please contact us, and we will take appropriate steps to remove such information from our records.</p><p><br></p><p>Changes to Privacy Policy: We reserve the right to modify or update this Privacy Policy at any time without prior notice. Any changes to this Privacy Policy will be effective immediately upon posting on our website. Your continued use of our website after any such changes constitutes your acceptance of the modified Privacy Policy.</p><p><br></p><p>Contact Us: If you have any questions or concerns about this Privacy Policy or our privacy practices, please contact us using the contact information provided on our website.</p><p><br></p><p>By using our website, you acknowledge that you have read and understand this Privacy Policy, and you agree to the collection, use, and disclosure of your personal information as described herein.</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` int NOT NULL,
  `subtitle` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('manual','automatic') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'manual',
  `information` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `keyword` varchar(191) DEFAULT NULL,
  `currency_id` varchar(191) NOT NULL DEFAULT '0',
  `checkout` int NOT NULL DEFAULT '1',
  `status` int NOT NULL DEFAULT '1',
  `subscription` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `subtitle`, `title`, `details`, `name`, `type`, `information`, `keyword`, `currency_id`, `checkout`, `status`, `subscription`) VALUES
(8, NULL, NULL, '', 'Authorize.Net', 'automatic', '{\"login_id\":\"76zu9VgUSxrJ\",\"txn_key\":\"2Vj62a6skSrP5U3X\",\"text\":\"Pay Via Authorize.Net\",\"sandbox_check\":1}', 'authorize', '[\"USD\"]', 1, 1, 1),
(9, NULL, NULL, '', 'Razorpay', 'automatic', '{\"key\":\"rzp_test_xDH74d48cwl8DF\",\"secret\":\"cr0H1BiQ20hVzhpHfHuNbGri\",\"text\":\"Pay via your Razorpay account.\"}', 'razorpay', '[\"INR\"]', 1, 1, 1),
(11, NULL, NULL, '', 'Paytm', 'automatic', '{\"merchant\":\"tkogux49985047638244\",\"secret\":\"LhNGUUKE9xCQ9xY8\",\"website\":\"WEBSTAGING\",\"industry\":\"Retail\",\"text\":\"Pay via your Paytm account.\",\"sandbox_check\":1}', 'paytm', '[\"INR\"]', 1, 1, 1),
(12, NULL, NULL, '', 'Paystack', 'automatic', '{\"key\":\"pk_test_162a56d42131cbb01932ed0d2c48f9cb99d8e8e2\",\"email\":\"junnuns@gmail.com\",\"text\":\"Pay via your Paystack account.\"}', 'paystack', '[\"NGN\"]', 1, 1, 1),
(14, NULL, NULL, '', 'Stripe', 'automatic', '{\"key\":\"pk_test_UnU1Coi1p5qFGwtpjZMRMgJM\",\"secret\":\"sk_test_QQcg3vGsKRPlW6T3dXcNJsor\",\"text\":\"Pay via your Credit Card.\"}', 'stripe', '[\"USD\"]', 1, 1, 1),
(15, NULL, NULL, '', 'Paypal', 'automatic', '{\"client_id\":\"AcWYnysKa_elsQIAnlfsJXokR64Z31CeCbpis9G3msDC-BvgcbAwbacfDfEGSP-9Dp9fZaGgD05pX5Qi\",\"client_secret\":\"EGZXTq6d6vBPq8kysVx8WQA5NpavMpDzOLVOb9u75UfsJ-cFzn6aeBXIMyJW2lN1UZtJg5iDPNL9ocYE\",\"text\":\"Pay via your PayPal account.\",\"sandbox_check\":1}', 'paypal', '[\"USD\"]', 1, 1, 1),
(19, '5-6 days', 'Wire Bank', '<p>Wire bank&nbsp;</p><p>ACC NO. : 268653464646546465.</p><p>Deep branch</p>', 'Wire Bank', 'manual', NULL, 'manual', '[\"1\",\"4\",\"6\"]', 1, 1, 1),
(22, NULL, NULL, '', 'Mercadopago', 'automatic', '{\"public_key\":\"TEST-6f72a502-51c8-4e9a-8ca3-cb7fa0addad8\",\"token\":\"TEST-6068652511264159-022306-e78da379f3963916b1c7130ff2906826-529753482\",\"text\":\"Pay Via MercadoPago\",\"sandbox_check\":1}', 'mercadopago', '[\"USD\"]', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pcategories`
--

CREATE TABLE `pcategories` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pcategories`
--

INSERT INTO `pcategories` (`id`, `name`, `slug`, `status`, `user_id`) VALUES
(1, 'UI/UX Design', 'uiux-design', 1, 31),
(2, 'Web Design', 'web-design', 1, 31),
(3, 'App Design', 'app-design', 1, 31),
(4, 'Design Branding', 'design-branding', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `client` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_general_ci,
  `facebook` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `photo`, `category_id`, `client`, `date`, `details`, `facebook`, `twitter`, `linkedin`, `instagram`, `user_id`) VALUES
(1, 'Kitchen Cleaning', 'kitchen-cleaning', '12655920801684145702.jpg', 2, 'Mr. Apa', '2023-03-23', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: 400; line-height: 24px; font-size: 24px; padding: 0px; font-family: DauphinPlain; color: rgb(0, 0, 0);\"><p data-v-1a50ebdc=\"\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\">\"Personal information\" is defined to include information that whether on its own or in combination with other information may be used to readily identify or contact you such as: name, address, email address, phone number etc.</p><p data-v-1a50ebdc=\"\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\">We collect personal information from Service Professionals offering their products and services. This information is partially or completely accessible to all visitors using our website or mobile application, either directly or by submitting a request for a service. Service Professionals and customers are required to create an account to be able to access certain portions of our Website, such as to submit questions, participate in polls or surveys, to request a quote, to submit a bid in response to a quote, and request information. - Service Professionals, if and when they create and use an account with us, will be required to disclose and provide to our account information including personal contact details, bank details, personal identification details and participate in polls or surveys or feedbacks etc. Such information gathered shall be utilized to ensure greater customer satisfaction and help a customer satiate their needs.</p><p data-v-1a50ebdc=\"\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\">The type of personal information that we collect from you varies based on your particular interaction with our Website or mobile application.</p></h2>', NULL, NULL, NULL, NULL, 31),
(2, 'Furniture Cleaning', 'furniture-cleaning', '5377475741684145712.jpg', 1, 'Mr. Apa', '2023-03-25', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: 400; line-height: 24px; font-size: 24px; padding: 0px; font-family: DauphinPlain; color: rgb(0, 0, 0);\"><p data-v-1a50ebdc=\"\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\">\"Personal information\" is defined to include information that whether on its own or in combination with other information may be used to readily identify or contact you such as: name, address, email address, phone number etc.</p><p data-v-1a50ebdc=\"\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\">We collect personal information from Service Professionals offering their products and services. This information is partially or completely accessible to all visitors using our website or mobile application, either directly or by submitting a request for a service. Service Professionals and customers are required to create an account to be able to access certain portions of our Website, such as to submit questions, participate in polls or surveys, to request a quote, to submit a bid in response to a quote, and request information. - Service Professionals, if and when they create and use an account with us, will be required to disclose and provide to our account information including personal contact details, bank details, personal identification details and participate in polls or surveys or feedbacks etc. Such information gathered shall be utilized to ensure greater customer satisfaction and help a customer satiate their needs.</p><p data-v-1a50ebdc=\"\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\">The type of personal information that we collect from you varies based on your particular interaction with our Website or mobile application.</p></h2>', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.facebook.com/', 'adfadsf', 31),
(3, 'Home', 'home', '5543910651684145630.jpg', 2, 'Mr. Apa', '2023-03-23', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-weight: 400; line-height: 24px; font-size: 24px; padding: 0px; font-family: DauphinPlain; color: rgb(0, 0, 0);\"><p data-v-1a50ebdc=\"\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\">\"Personal information\" is defined to include information that whether on its own or in combination with other information may be used to readily identify or contact you such as: name, address, email address, phone number etc.</p><p data-v-1a50ebdc=\"\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\">We collect personal information from Service Professionals offering their products and services. This information is partially or completely accessible to all visitors using our website or mobile application, either directly or by submitting a request for a service. Service Professionals and customers are required to create an account to be able to access certain portions of our Website, such as to submit questions, participate in polls or surveys, to request a quote, to submit a bid in response to a quote, and request information. - Service Professionals, if and when they create and use an account with us, will be required to disclose and provide to our account information including personal contact details, bank details, personal identification details and participate in polls or surveys or feedbacks etc. Such information gathered shall be utilized to ensure greater customer satisfaction and help a customer satiate their needs.</p><p data-v-1a50ebdc=\"\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\">The type of personal information that we collect from you varies based on your particular interaction with our Website or mobile application.</p></h2>', NULL, NULL, NULL, NULL, 31),
(6, 'Car Cleaning', 'car-cleaning', '16986869131684145871.jpg', 2, 'Jhon Due', '2023-05-25', '<p>asfdsfasdf</p>', 'https://www.facebook.com/', 'https://www.twitter.com/', '#', '#', 31);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `section`) VALUES
(1, 'Writer', '[\"Services\",\"Manage Contact\",\"Blogs\",\"Manage Project\",\"Manage Pages\",\"General Settings\",\"Frontend Settings\",\"Manage Role\",\"Manage Staff\",\"Subscribers\"]');

-- --------------------------------------------------------

--
-- Table structure for table `seo_settings`
--

CREATE TABLE `seo_settings` (
  `id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_tag` text COLLATE utf8mb4_general_ci,
  `meta_description` text COLLATE utf8mb4_general_ci,
  `meta_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_analytics` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook_pixel` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seo_settings`
--

INSERT INTO `seo_settings` (`id`, `title`, `meta_tag`, `meta_description`, `meta_image`, `google_analytics`, `facebook_pixel`) VALUES
(1, 'Dashboard1', 'a,b,c,d,s', 'test description1', 'fgy1588136884bv-rm.jpg', 'test1', 'test1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `is_feature` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `photo`, `text`, `status`, `is_feature`) VALUES
(2, 'Website Design', '4399814411684295618.png', 'We offer a range of services related to graphics animations  including marketing.', 1, 1),
(3, 'UI/UX Design', '3140690971684295607.png', 'We offer a range of services related to graphics animations  including marketing.', 1, 1),
(5, 'Branding', '13448486551684295599.png', 'We offer a range of services related to graphics animations  including marketing.', 1, 1),
(7, 'Business Strategy', '20132167491684295589.png', 'What a plonker chimney pot some quid dodgy chav matic boy.', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `service_faqs`
--

CREATE TABLE `service_faqs` (
  `id` bigint NOT NULL,
  `service_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_general_ci,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_faqs`
--

INSERT INTO `service_faqs` (`id`, `service_id`, `title`, `content`, `user_id`) VALUES
(2, 3, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 31),
(3, 3, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0),
(4, 3, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0),
(5, 3, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0),
(6, 3, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0),
(7, 2, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0),
(8, 2, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0),
(9, 2, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0),
(10, 2, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0),
(11, 2, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0),
(12, 2, 'How stay calm from the first time.', 'Lorem ipsum dolor sit amet consectetur. suspendisse nulla aliquam. Risus rutrum tellus eget ultrices pretium nisi amet facilisis dummy text now.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `title` text,
  `subtitle` text,
  `price` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `title`, `subtitle`, `price`) VALUES
(1, 0, 'Free Shipping', '(10 - 12 days)', 0),
(2, 0, 'Express Shipping', '(5 - 6 days)', 10);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `btn1_text` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `btn1_link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `btn2_text` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `btn2_link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_general_ci,
  `is_banner` tinyint NOT NULL DEFAULT '0',
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `subtitle`, `photo`, `btn1_text`, `btn1_link`, `btn2_text`, `btn2_link`, `text`, `is_banner`, `user_id`) VALUES
(2, 'Professional Monthly Cleaning Service', 'Monthly Cleaning Services', '19989022721684139097.jpg', 'DISCOVER MORE', 'https://demo.royalscripts.com/clean_service/', 'OUR SERVICES', 'https://demo.royalscripts.com/clean_service/', 'Are you worried about monthly cleaning? We guarantee regular cleaning as well as cleaning your home or office. Your home and office cleaning services, floor, walls, chairs, tables.', 0, 31),
(3, 'Professional Cleaning Service for your home', 'Home Cleaning Services', '19697542061684139086.jpg', 'DISCOVER MORE', 'https://demo.royalscripts.com/clean_service/', 'OUR SERVICES', 'https://demo.royalscripts.com/clean_service/', 'Are you worried about cleaning your home? We guarantees regular cleaning as well as cleaning your sweet hom. Your home cleaning services, floor, walls, chairs, tables.', 1, 31),
(4, 'Professional Cleaning Service for your office', 'Best Cleaning Services', '5068988381684139054.jpg', 'DISCOVER MORE', 'https://demo.royalscripts.com/clean_service/', 'OUR SERVICES', 'https://demo.royalscripts.com/clean_service/', 'Are you worried about cleaning your office? We guarantees regular cleaning as well as cleaning your new or old office. Your office cleaning services, floor, walls, chairs, tables.', 0, 31);

-- --------------------------------------------------------

--
-- Table structure for table `socialsettings`
--

CREATE TABLE `socialsettings` (
  `id` int UNSIGNED NOT NULL,
  `fclient_id` text COLLATE utf8mb4_unicode_ci,
  `fclient_secret` text COLLATE utf8mb4_unicode_ci,
  `fredirect` text COLLATE utf8mb4_unicode_ci,
  `gclient_id` text COLLATE utf8mb4_unicode_ci,
  `gclient_secret` text COLLATE utf8mb4_unicode_ci,
  `gredirect` text COLLATE utf8mb4_unicode_ci,
  `website_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_icons` text COLLATE utf8mb4_unicode_ci,
  `social_urls` text COLLATE utf8mb4_unicode_ci,
  `facebook_check` tinyint NOT NULL DEFAULT '0',
  `google_check` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socialsettings`
--

INSERT INTO `socialsettings` (`id`, `fclient_id`, `fclient_secret`, `fredirect`, `gclient_id`, `gclient_secret`, `gredirect`, `website_url`, `social_icons`, `social_urls`, `facebook_check`, `google_check`) VALUES
(1, '353155922795407', '55f8379d2e9717b72f862d07e92af8ed', 'http://localhost/booking-laravel-7', '915191002660-okcvhj4qspmbcm4qgn9et4vnu5q3mdei.apps.googleusercontent.com', 'PP-ZuCXvvdIPrpUy2WEDeIck', 'http://localhost/charity/main-charity/auth/google/callback', 'http://localhost/booking-laravel-7', '[\"fab fa-font-awesome\",\"fab fa-fonticons\",\"fas fa-football-ball\"]', '[\"tttt\",\"tttt4\",\"test\"]', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `name`, `icon`, `link`, `user_id`) VALUES
(1, 'Facebook', 'fab fa-facebook-f', 'https://getbootstrap.com', 31),
(2, 'Twitter', 'fab fa-twitter', 'https://getbootstrap.com', 31),
(3, 'Instagram', 'fab fa-instagram', 'https://getbootstrap.com', 31),
(4, 'Linkedin', 'fab fa-linkedin-in', '#', 31);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `user_id`) VALUES
(45, 'showrabhasan7s5@gmail.com', NULL),
(48, 'seller123@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int DEFAULT NULL,
  `user_type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = replied. ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bio` text COLLATE utf8mb4_general_ci,
  `phone` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `progress` text COLLATE utf8mb4_general_ci,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `slug`, `designation`, `photo`, `bio`, `phone`, `email`, `address`, `website`, `facebook`, `twitter`, `linkedin`, `instagram`, `progress`, `user_id`) VALUES
(1, 'Jennifer D. Holland', 'jennifer-d-holland', 'Associate Engineer', '5597787311684139854.jpg', '<p><span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; word-spacing: 1px;\">This service will help you to clean your home and also help to remove deep stains. Our Service provider will use effective chemicals that will wash your home smoothly and neatly.&nbsp;&nbsp;</span><font color=\"#212529\" face=\"Poppins, sans-serif\"><span style=\"font-size: 16px; word-spacing: 1px;\">eople tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></font><br></p>', '01800000000', 'demo@gmail.com', 'Munshinogor,Delduar,Tangail,Dhaka,Bangladesh', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', '{\"\":null}', 31),
(2, 'Cathryn J. Maxwell', 'cathryn-j-maxwell', 'Jr. Officer', '6123134631684139840.jpg', '<p><span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; word-spacing: 1px;\">This service will help you to clean your home and also help to remove deep stains. Our Service provider will use effective chemicals that will wash your home smoothly and neatly.&nbsp;&nbsp;</span><font color=\"#212529\" face=\"Poppins, sans-serif\"><span style=\"font-size: 16px; word-spacing: 1px;\">eople tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></font><br></p>', '01720000000', 'demo@gmail.com', 'Tangail,Dhaka,Bangladesh', 'https://demo.royalscripts.com/clean_service', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://demo.royalscripts.com/clean_service', NULL, '{\"\":null}', 31),
(3, 'Nicole J. Mullins', 'nicole-j-mullins', 'Sr. Executive', '17150666971684139825.jpg', '<span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; word-spacing: 1px;\">This service will help you to clean your home and also help to remove deep stains. Our Service provider will use effective chemicals that will wash your home smoothly and neatly.&nbsp;&nbsp;</span><font color=\"#212529\" face=\"Poppins, sans-serif\"><span style=\"font-size: 16px; word-spacing: 1px;\">eople tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></font><br>', '01700000000', 'demo@gmail.com', 'Munshinogor,Delduar,Tangail,Dhaka,Bangladesh', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', '{\"Service Quality\":\"95\",\"Plumbing Service\":\"90\",\"Aircondition\":\"85\"}', 31),
(4, 'Glen S. Buck', 'glen-s-buck', 'UI Designer', '3061539521684139784.jpg', '<p><span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; word-spacing: 1px;\">This service will help you to clean your home and also help to remove deep stains. Our Service provider will use effective chemicals that will wash your home smoothly and neatly.&nbsp;&nbsp;</span><font color=\"#212529\" face=\"Poppins, sans-serif\"><span style=\"font-size: 16px; word-spacing: 1px;\">eople tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></font><br></p>', '01720000000', 'demo@gmail.com', 'Tangail,Dhaka,Bangladesh', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', '{\"Service Quality\":\"95\",\"Plumbing Service\":\"80\",\"Aircondition\":\"65\"}', 31),
(5, 'Jhon Charles', 'jhon-charles', 'Chief Executive', '10717941141684139756.jpg', '<p><span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; word-spacing: 1px;\">This service will help you to clean your home and also help to remove deep stains. Our Service provider will use effective chemicals that will wash your home smoothly and neatly.&nbsp;&nbsp;</span><font color=\"#212529\" face=\"Poppins, sans-serif\"><span style=\"font-size: 16px; word-spacing: 1px;\">eople tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></font><br></p>', '017000000000', 'demo@gmail.com', 'Munshinogor,Delduar,Tangail,Dhaka,Bangladesh', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', '{\"AC Servicing\":\"90\",\"AC Cooling problem\":\"85\"}', 31),
(6, 'Smith Jhon', 'smith-jhon', 'Web Developer', '13960703171684139715.jpg', '<p><span style=\"color: rgb(33, 37, 41); font-family: Poppins, sans-serif; font-size: 16px; word-spacing: 1px;\">This service will help you to clean your home and also help to remove deep stains. Our Service provider will use effective chemicals that will wash your home smoothly and neatly.&nbsp;&nbsp;</span><font color=\"#212529\" face=\"Poppins, sans-serif\"><span style=\"font-size: 16px; word-spacing: 1px;\">eople tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></font><br></p>', '01708302000', 'demo@gmail.com', 'Tangail,Dhaka,Bangladesh', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', 'https://demo.royalscripts.com/clean_service', '{\"TV Repair\":\"70\",\"Refrigerator Repair\":\"82\"}', 31);

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `photo`, `message`, `user_id`) VALUES
(2, 'Mr. Aashik', 'UI Designer', '12100361541684295679.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 31),
(3, 'Jhon Due', 'Creative Director', '11163081811684295673.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 31),
(4, 'Mr. Marlie', 'CEO GeniusTeam', '12483780511684295667.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.', 31);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `is_default` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `is_default`) VALUES
(1, 'Theme1', 0),
(2, 'Theme2', 0),
(3, 'Theme3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` int NOT NULL,
  `ticket_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `user_type` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `id` bigint NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `text` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id`, `title`, `photo`, `text`) VALUES
(2, 'asdfa', '4610972031679807445.png', 'dadsf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `zip` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `email_verified` tinyint(1) DEFAULT '0',
  `verification_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_code` int DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `domain_id` bigint UNSIGNED DEFAULT NULL,
  `owner_id` bigint NOT NULL DEFAULT '0',
  `is_end` tinyint NOT NULL DEFAULT '0',
  `force_login` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `photo`, `phone`, `country`, `city`, `address`, `zip`, `status`, `email_verified`, `verification_link`, `verify_code`, `password`, `role`, `domain_id`, `owner_id`, `is_end`, `force_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(31, 'showrav Hasan', 'teacher@gmail.com', NULL, '017283320', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, '$2y$10$Muu9xoTvxsx6mHh3yjqLTecTKADrG7YMYmGIqWIuz.YbDoR97Cqw.', 'seller', 4, 0, 0, 0, NULL, '2023-05-08 23:05:09', '2023-06-18 02:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_blogs`
--

CREATE TABLE `user_blogs` (
  `id` int UNSIGNED NOT NULL,
  `user_id` bigint NOT NULL,
  `category_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `views` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '1',
  `meta_tag` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_blogs`
--

INSERT INTO `user_blogs` (`id`, `user_id`, `category_id`, `title`, `slug`, `photo`, `description`, `source`, `views`, `status`, `meta_tag`, `meta_description`, `tags`, `created_at`, `updated_at`) VALUES
(66, 31, 8, 'Office AC Cooling problem Repair', 'office-ac-cooling-problem-repair', '5811642981684141331.jpg', '<p><span style=\"font-size: 16px; color: rgb(123, 125, 131); font-family: &quot;DM Sans&quot;, sans-serif;\">Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought.</span><br></p><div data-v-3f9453f1=\"\" class=\"service-overview-component\" style=\"margin: 0px 0px 20px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\"><h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 1.56; font-size: 18px; scroll-behavior: smooth; color: rgba(0, 0, 0, 0.8);\">What\'s Included?</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.5; scroll-behavior: smooth; color: rgb(56, 58, 60);\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Only service charge</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>7 Days service warranty</li></ul></div></div><div data-v-3f9453f1=\"\" class=\"service-overview-component\" style=\"margin: 0px 0px 20px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\"><h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 1.56; font-size: 18px; scroll-behavior: smooth; color: rgba(0, 0, 0, 0.8);\">What\'s Excluded?</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.5; scroll-behavior: smooth; color: rgb(56, 58, 60);\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Price of materials or parts</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Transportation cost for carrying new materials/parts</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Warranty given by manufacturer</li></ul></div></div>', NULL, 0, 1, NULL, NULL, NULL, '2023-03-12 05:28:22', '2023-05-15 03:02:11'),
(67, 31, 8, 'Home Electric Cable lines Repair', 'home-electric-cable-lines-repair', '11024986621684141354.jpg', '<p><span style=\"font-size: 16px; color: rgb(123, 125, 131); font-family: &quot;DM Sans&quot;, sans-serif;\">Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought.</span><br></p><div data-v-3f9453f1=\"\" class=\"service-overview-component\" style=\"margin: 0px 0px 20px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\"><h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 1.56; font-size: 18px; scroll-behavior: smooth; color: rgba(0, 0, 0, 0.8);\">What\'s Included?</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.5; scroll-behavior: smooth; color: rgb(56, 58, 60);\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Only service charge</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>7 Days service warranty</li></ul></div></div><div data-v-3f9453f1=\"\" class=\"service-overview-component\" style=\"margin: 0px 0px 20px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\"><h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; line-height: 1.56; font-size: 18px; scroll-behavior: smooth; color: rgba(0, 0, 0, 0.8);\">What\'s Excluded?</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 1.5; scroll-behavior: smooth; color: rgb(56, 58, 60);\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Price of materials or parts</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Transportation cost for carrying new materials/parts</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Warranty given by manufacturer</li></ul></div></div>', NULL, 0, 1, NULL, NULL, NULL, '2023-03-12 05:28:44', '2023-05-15 03:02:34'),
(68, 31, 8, 'Early Summer Deal Aircondition Services', 'early-summer-deal-aircondition-services', '9483807431684141394.jpg', '<p><span style=\"font-size: 16px; color: rgb(123, 125, 131); font-family: &quot;DM Sans&quot;, sans-serif;\">Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought.</span><br></p><div data-v-3f9453f1=\"\" class=\"service-overview-component\" style=\"margin: 0px 0px 20px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\"><h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; scroll-behavior: smooth; line-height: 1.56; font-size: 18px; color: rgba(0, 0, 0, 0.8);\">What\'s Included?</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60);\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Only service charge</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>7 Days service warranty</li></ul></div></div><div data-v-3f9453f1=\"\" class=\"service-overview-component\" style=\"margin: 0px 0px 20px; scroll-behavior: smooth; font-family: Poppins, sans-serif; color: rgb(33, 37, 41); font-size: 16px; word-spacing: 1px;\"><h4 data-v-3f9453f1=\"\" class=\"service-overview-component__title\" style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; scroll-behavior: smooth; line-height: 1.56; font-size: 18px; color: rgba(0, 0, 0, 0.8);\">What\'s Excluded?</h4><p data-v-3f9453f1=\"\" class=\"service-overview-component__info\" style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60);\"></p><div data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth;\"><ul data-v-3f9453f1=\"\" class=\"list-unordered\" style=\"margin-right: 0px; margin-left: 0px; scroll-behavior: smooth; list-style: none; padding-left: 25px;\"><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Price of materials or parts</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Transportation cost for carrying new materials/parts</li><li data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; line-height: 1.5; color: rgb(56, 58, 60); padding-bottom: 10px; padding-left: 0px; position: relative;\"><span data-v-3f9453f1=\"\" style=\"margin: 0px; scroll-behavior: smooth; position: absolute; content: &quot;&quot;; width: 5px; height: 5px; line-height: 16px; border-radius: 50%; background-image: linear-gradient(135deg, rgb(0, 0, 0) 100%, rgb(0, 0, 0) 0px, rgb(0, 0, 0) 0px); color: rgb(255, 255, 255); text-align: center; top: 10px; left: -21px;\"></span>Warranty given by manufacturer</li></ul></div></div><p><br></p>', NULL, 0, 1, NULL, NULL, NULL, '2023-03-12 05:28:59', '2023-05-15 03:03:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_blog_categories`
--

CREATE TABLE `user_blog_categories` (
  `id` bigint NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_blog_categories`
--

INSERT INTO `user_blog_categories` (`id`, `name`, `slug`, `status`, `user_id`) VALUES
(8, 'TV Repair', 'tv-repair', 1, 31);

-- --------------------------------------------------------

--
-- Table structure for table `user_contact_pages`
--

CREATE TABLE `user_contact_pages` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `email1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email2` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `map_link` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_contact_pages`
--

INSERT INTO `user_contact_pages` (`id`, `user_id`, `email1`, `email2`, `phone1`, `phone2`, `address`, `photo`, `title`, `map_link`) VALUES
(0, 0, 'Envatodemo@gmail.com', 'Envatodemo2@gmail.com', '+23 (000) 68 603', '+21 (000) 68 703', '66 broklyn golden street 600 New york. USA!', '17379546011678780860.jpg', 'Contact for Services', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d406880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd'),
(2, 31, 'Envatodemo@gmail.com', 'Envatodemo2@gmail.com', '+23 (000) 68 603', '+21 (000) 68 703', '66 broklyn golden street 600 New york. USA!', '20365342641684207456.png', 'Contact for Services', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d406880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd'),
(4, 39, 'Envatodemo@gmail.com', 'Envatodemo2@gmail.com', '+23 (000) 68 603', '+21 (000) 68 703', '66 broklyn golden street 600 New york. USA!', '17379546011678780860.jpg', 'Contact for Services', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d406880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd'),
(5, 40, 'Envatodemo@gmail.com', 'Envatodemo2@gmail.com', '+23 (000) 68 603', '+21 (000) 68 703', '66 broklyn golden street 600 New york. USA!', '17379546011678780860.jpg', 'Contact for Services', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d406880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd'),
(6, 41, 'Envatodemo@gmail.com', 'Envatodemo2@gmail.com', '+23 (000) 68 603', '+21 (000) 68 703', '66 broklyn golden street 600 New york. USA!', '17379546011678780860.jpg', 'Contact for Services', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d406880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd'),
(7, 42, 'Envatodemo@gmail.com', 'Envatodemo2@gmail.com', '+23 (000) 68 603', '+21 (000) 68 703', '66 broklyn golden street 600 New york. USA!', '17379546011678780860.jpg', 'Contact for Services', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d406880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd'),
(8, 43, 'Envatodemo@gmail.com', 'Envatodemo2@gmail.com', '+23 (000) 68 603', '+21 (000) 68 703', '66 broklyn golden street 600 New york. USA!', '17379546011678780860.jpg', 'Contact for Services', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d406880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd'),
(9, 44, 'Envatodemo@gmail.com', 'Envatodemo2@gmail.com', '+23 (000) 68 603', '+21 (000) 68 703', '66 broklyn golden street 600 New york. USA!', '17379546011678780860.jpg', 'Contact for Services', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96811.54759587669!2d-74.01263924803828!3d406880494567041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x89c25bae694479a3%3A0xb9949385da52e69e!2sBarclays%20Center!5e0!3m2!1sen!2sbd!4v1636195194646!5m2!1sen!2sbd');

-- --------------------------------------------------------

--
-- Table structure for table `user_generalsettings`
--

CREATE TABLE `user_generalsettings` (
  `id` bigint NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `footer_logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `breadcumb` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_verify` tinyint DEFAULT '0',
  `cookie` text COLLATE utf8mb4_unicode_ci,
  `contact_no` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu` text COLLATE utf8mb4_unicode_ci,
  `currency_possition` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `support_number` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_show` tinyint NOT NULL DEFAULT '1',
  `language_show` tinyint NOT NULL DEFAULT '1',
  `footer_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright_text` text COLLATE utf8mb4_unicode_ci,
  `copyright_show` tinyint DEFAULT '1',
  `order_prefix` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(122) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_pixel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_analytics` varchar(111) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_tawk` tinyint NOT NULL DEFAULT '0',
  `tawk_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disqus` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_disqus` tinyint NOT NULL DEFAULT '0',
  `is_maintenance` tinyint NOT NULL DEFAULT '0',
  `maintenance` text COLLATE utf8mb4_unicode_ci,
  `maintenance_photo` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `faq_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_section_photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_section_header_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_section_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `working_hour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `counter_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_generalsettings`
--

INSERT INTO `user_generalsettings` (`id`, `user_id`, `footer_logo`, `header_logo`, `favicon`, `breadcumb`, `title`, `theme_color`, `is_verify`, `cookie`, `contact_no`, `menu`, `currency_possition`, `support_number`, `currency_show`, `language_show`, `footer_text`, `copyright_text`, `copyright_show`, `order_prefix`, `email`, `facebook_pixel`, `google_analytics`, `is_tawk`, `tawk_id`, `disqus`, `is_disqus`, `is_maintenance`, `maintenance`, `maintenance_photo`, `faq_photo`, `contact_section_photo`, `contact_section_header_title`, `contact_section_title`, `theme`, `phone`, `address`, `working_hour`, `header_text`, `counter_photo`) VALUES
(0, 0, NULL, '', '', NULL, 'seller', '#5B53F1', 1, '', '', '', 'right', NULL, 0, 0, '', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'theme1', NULL, NULL, NULL, NULL, NULL),
(10, 31, '6188384601684144387.png', '129126701683779720.png', '19421335741683782654.png', '19312599711684144242.jpg', 'seller', '#5B53F1', 1, '{\"status\":\"1\",\"button_text\":\"ALL\",\"cookie_text\":\"gasdfa\"}', '', '', 'right', NULL, 0, 0, '', 'Copyright © 2023 Reserved Passion by GeniusOcean', 1, NULL, 'genius@gmail.com', NULL, NULL, 0, '6124fa49d6e7610a49b1c136/1fds73c17', 'test', 0, 0, 'Test', '18533339851684037505.jpg', '7699081891684124152.png', '11497633201684143749.jpg', 'Get a Free Estimate', 'Contact for Services Your team', 'theme2', '01700000000', '380 St, New York, USA', 'working hours : Mon-sat (8.00am - 6.00PM)', 'best cleaning company website forever!', '9075895111684143537.jpg'),
(23, 44, NULL, '', '', NULL, 'seller', '#5B53F1', 1, NULL, '', '', 'right', NULL, 0, 0, '', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'theme1', NULL, NULL, NULL, NULL, NULL),
(22, 43, NULL, '', '', NULL, 'seller', '#5B53F1', 1, NULL, '', '', 'right', NULL, 0, 0, '', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'theme1', NULL, NULL, NULL, NULL, NULL),
(21, 42, NULL, '', '', NULL, 'seller', '#5B53F1', 1, NULL, '', '', 'right', NULL, 0, 0, '', NULL, 1, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'theme1', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_languages`
--

CREATE TABLE `user_languages` (
  `id` int NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `language` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(10) NOT NULL,
  `file` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint NOT NULL DEFAULT '0',
  `direction` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_languages`
--

INSERT INTO `user_languages` (`id`, `is_default`, `language`, `code`, `file`, `user_id`, `direction`) VALUES
(1, 1, 'English', 'test', '31test.json', 31, 'ltr'),
(2, 0, 'Arabic', 'ttttt', '31ttttt.json', 31, 'ltr');

-- --------------------------------------------------------

--
-- Table structure for table `user_pages`
--

CREATE TABLE `user_pages` (
  `id` int NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_tag` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `user_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pages`
--

INSERT INTO `user_pages` (`id`, `title`, `slug`, `details`, `meta_tag`, `meta_description`, `user_id`) VALUES
(6, 'Terms & Condition', 'terms-condition', '<h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Thank you for visiting our service agency website. Please review the following terms and conditions that govern your use of our website. By accessing or using our website, you agree to comply with these terms and conditions. If you do not agree with any of these terms, please do not use our website.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Intellectual Property: All content on our website, including but not limited to text, graphics, logos, images, videos, and software, is the property of our service agency or its licensors and is protected by intellectual property laws. You may not use, copy, reproduce, distribute, transmit, or modify any content on our website without our prior written consent.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Use of Website: Our website is intended for personal, non-commercial use only. You may not use our website for any illegal or unauthorized purpose. You agree not to disrupt, damage, or interfere with the functioning of our website or its associated servers or networks. You also agree not to use any automated means, such as bots or scripts, to access or use our website.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Privacy Policy: We respect your privacy and handle your personal information in accordance with our Privacy Policy, which is incorporated by reference into these terms and conditions. Please review our Privacy Policy to understand our practices regarding the collection, use, and disclosure of your personal information.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Links to Third-Party Websites: Our website may contain links to third-party websites that are not owned or controlled by our service agency. We do not endorse or assume any responsibility for the content, privacy policies, or practices of such third-party websites. You acknowledge and agree that your use of third-party websites is at your own risk and subject to their respective terms and conditions.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Disclaimer of Warranties: Our website is provided on an \"as is\" and \"as available\" basis, without any warranties or representations of any kind, whether express or implied, including but not limited to warranties of merchantability, fitness for a particular purpose, and non-infringement. We do not warrant that our website will be error-free, uninterrupted, secure, or free from viruses or other harmful components.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Limitation of Liability: To the fullest extent permitted by applicable law, our service agency and its affiliates, officers, directors, employees, and agents shall not be liable for any direct, indirect, incidental, consequential, or special damages arising out of or in connection with your use of our website, even if we have been advised of the possibility of such damages. In jurisdictions that do not allow the exclusion or limitation of liability for certain damages, our liability shall be limited to the fullest extent permitted by applicable law.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Indemnification: You agree to indemnify, defend, and hold harmless our service agency and its affiliates, officers, directors, employees, and agents from and against any and all claims, liabilities, damages, losses, costs, and expenses, including reasonable attorneys\' fees, arising out of or in connection with your use of our website or your violation of these terms and conditions.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Modifications: We reserve the right to modify, suspend, or terminate our website or these terms and conditions at any time without prior notice. Any changes to these terms and conditions will be effective immediately upon posting on our website. Your continued use of our website after any such changes constitutes your acceptance of the modified terms and conditions.</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Governing Law and Jurisdiction: These terms and conditions shall be governed by and construed in accordance with the laws of [insert applicable jurisdiction]. Any dispute arising out of or in connection with these terms and conditions shall be resolved exclusively in the courts of [insert applicable jurisdiction].</span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\"><br></span></font></h2><h2 style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; padding: 0px; line-height: 24px;\"><font color=\"#000000\" face=\"DauphinPlain\"><span style=\"font-size: 24px; font-weight: 400;\">Entire Agreement: These terms and conditions constitute the entire agreement between you and our service agency regarding your use of our website, and supersede all prior or contemporaneous agreements</span></font></h2>', NULL, NULL, 0),
(8, 'Privacy & Policy', 'privacy-policy', '<p>Thank you for visiting our service agency website. We are committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, and disclose your personal information when you use our website. By accessing or using our website, you consent to the collection, use, and disclosure of your personal information as described in this Privacy Policy. If you do not agree with any part of this Privacy Policy, please do not use our website.</p><p><br></p><p>Information We Collect: We may collect personal information from you when you voluntarily provide it to us through our website, such as when you fill out a contact form, subscribe to our newsletter, or interact with our website in any other way. The personal information we may collect includes, but is not limited to, your name, email address, phone number, and any other information you choose to provide.</p><p><br></p><p>Use of Information: We may use the personal information we collect for various purposes, including to respond to your inquiries, provide you with information or services you request, send you newsletters or other communications, improve our website, and comply with legal obligations. We may also use your personal information for other purposes that are disclosed to you at the time of collection or with your consent.</p><p><br></p><p>Disclosure of Information: We may disclose your personal information to third-party service providers who assist us in operating our website and providing services to you, such as web hosting, analytics, and marketing. We may also disclose your personal information to comply with legal obligations, protect our rights or the rights of others, or enforce our website\'s terms and conditions. We do not sell, rent, or otherwise disclose your personal information to third parties for their marketing purposes without your consent.</p><p><br></p><p>Security: We take reasonable measures to protect the security of your personal information and to prevent unauthorized access, use, or disclosure. However, please note that no method of transmission over the Internet or electronic storage is 100% secure, and we cannot guarantee the absolute security of your personal information.</p><p><br></p><p>Cookies: Our website may use cookies, which are small text files that are stored on your computer or device when you access our website. Cookies may be used for various purposes, such as to analyze website traffic, personalize content, and improve your experience on our website. You may choose to disable cookies through your browser settings, but doing so may affect the functionality of our website.</p><p><br></p><p>Third-Party Websites: Our website may contain links to third-party websites that are not owned or controlled by our service agency. We are not responsible for the privacy practices or content of such third-party websites. We recommend reviewing the privacy policies of those websites before providing any personal information.</p><p><br></p><p>Children\'s Privacy: Our website is not intended for children under the age of 13. We do not knowingly collect personal information from children under the age of 13. If you are a parent or guardian and believe that your child has provided us with personal information, please contact us, and we will take appropriate steps to remove such information from our records.</p><p><br></p><p>Changes to Privacy Policy: We reserve the right to modify or update this Privacy Policy at any time without prior notice. Any changes to this Privacy Policy will be effective immediately upon posting on our website. Your continued use of our website after any such changes constitutes your acceptance of the modified Privacy Policy.</p><p><br></p><p>Contact Us: If you have any questions or concerns about this Privacy Policy or our privacy practices, please contact us using the contact information provided on our website.</p><p><br></p><p>By using our website, you acknowledge that you have read and understand this Privacy Policy, and you agree to the collection, use, and disclosure of your personal information as described herein.</p>', NULL, NULL, 0),
(9, 'Privacy Policy', 'privacy-policy', '<p style=\"font-family:Poppins, sans-serif;color:rgb(33,37,41);font-size:16px;\">\"Personal information\" is defined to include information that whether on its own or in combination with other information may be used to readily identify or contact you such as: name, address, email address, phone number etc.</p>\r\n\r\n<p style=\"font-family:Poppins, sans-serif;color:rgb(33,37,41);font-size:16px;\">We collect personal information from Service Professionals offering their products and services. This information is partially or completely accessible to all visitors using our website or mobile application, either directly or by submitting a request for a service. Service Professionals and customers are required to create an account to be able to access certain portions of our Website, such as to submit questions, participate in polls or surveys, to request a quote, to submit a bid in response to a quote, and request information. - Service Professionals, if and when they create and use an account with us, will be required to disclose and provide to our account information including personal contact details, bank details, personal identification details and participate in polls or surveys or feedbacks etc. Such information gathered shall be utilized to ensure greater customer satisfaction and help a customer satiate their needs.</p>\r\n\r\n<p style=\"font-family:Poppins, sans-serif;color:rgb(33,37,41);font-size:16px;\">The type of personal information that we collect from you varies based on your particular interaction with our Website or mobile application.</p>', NULL, NULL, 31),
(10, 'Terms of use', 'terms-of-use', '<p style=\"font-size:16px;color:rgb(33,37,41);font-family:Poppins, sans-serif;\">\"Personal information\" is defined to include information that whether on its own or in combination with other information may be used to readily identify or contact you such as: name, address, email address, phone number etc.</p>\r\n\r\n<p style=\"font-size:16px;color:rgb(33,37,41);font-family:Poppins, sans-serif;\">We collect personal information from Service Professionals offering their products and services. This information is partially or completely accessible to all visitors using our website or mobile application, either directly or by submitting a request for a service. Service Professionals and customers are required to create an account to be able to access certain portions of our Website, such as to submit questions, participate in polls or surveys, to request a quote, to submit a bid in response to a quote, and request information. - Service Professionals, if and when they create and use an account with us, will be required to disclose and provide to our account information including personal contact details, bank details, personal identification details and participate in polls or surveys or feedbacks etc. Such information gathered shall be utilized to ensure greater customer satisfaction and help a customer satiate their needs.</p>\r\n\r\n<p style=\"font-size:16px;color:rgb(33,37,41);font-family:Poppins, sans-serif;\">The type of personal information that we collect from you varies based on your particular interaction with our Website or mobile application.</p>', NULL, NULL, 31);

-- --------------------------------------------------------

--
-- Table structure for table `user_services`
--

CREATE TABLE `user_services` (
  `id` bigint NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sort_text` text COLLATE utf8mb4_general_ci,
  `photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `feature_icon` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `service_quality_text` text COLLATE utf8mb4_general_ci,
  `service_quality_photo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `service_quality_before_photo` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `is_feature` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_services`
--

INSERT INTO `user_services` (`id`, `user_id`, `category_id`, `title`, `slug`, `sort_text`, `photo`, `feature_icon`, `description`, `service_quality_text`, `service_quality_photo`, `service_quality_before_photo`, `status`, `is_feature`) VALUES
(2, 31, NULL, 'Office Floor', 'office-floor', 'Let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking', '12106041821684139494.jpg', '11865431721684139494.png', '<p><span style=\"color:rgb(123,125,131);font-family:\'DM Sans\', sans-serif;font-size:16px;\">Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></p>', 'Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '13307230371684139494.jpg', '19442596661684139494.jpg', 1, 1),
(3, 31, NULL, 'Home Combined', 'home-combined', 'Let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking', '17560459571684139557.jpg', '8472004361684139557.png', '<p><span style=\"color:rgb(123,125,131);font-family:\'DM Sans\', sans-serif;font-size:16px;\">Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></p>', 'Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '2057504621684145134.jpg', '18588871651684139557.jpg', 1, 1),
(5, 31, NULL, 'Plumbing Services', 'plumbing-services', 'Let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '57584871684139457.jpg', '1086339351684139457.png', '<p><span style=\"color:rgb(123,125,131);font-family:\'DM Sans\', sans-serif;font-size:16px;\">Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></p>', 'Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '16302463091684145125.jpg', '8083973471684139457.jpg', 1, 1),
(6, 31, NULL, 'Office AirCondition', 'office-aircondition', 'Let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '11565435011684139427.jpg', '9261992081684139427.png', '<p style=\"text-align:justify;\"><span style=\"color:rgb(123,125,131);font-family:\'DM Sans\', sans-serif;font-size:16px;\">Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span><br></p>', 'Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '5351372651684145117.jpg', '10264776051684139427.jpg', 1, 1),
(7, 31, NULL, 'Plumbing Clean', 'plumbing-clean', 'Let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '12423306221684139377.jpg', '674647761684139377.png', '<p><span style=\"color:rgb(123,125,131);font-family:\'DM Sans\', sans-serif;font-size:16px;\">Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.</span></p>', 'Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '10481076371684145109.jpg', '15196797601684139377.jpg', 1, 1),
(8, 31, NULL, 'Home Cleaning', 'home-cleaning', 'Let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '3502174151684139288.jpg', '19613119461684139288.png', '<p>Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.<br></p>', 'Cleaning or maintaining the cleanliness of our surroundings is a practice that all of us are accustomed to. But more often than not, people of our country make the mistake of taking the job of a professional cleaner into their own hands. People tend to do such a thing is because they find hiring a cleaning service company too expensive. Even if they do end up hiring a cleaning service, they tend to cheap out on this. Doing so can result in spending more money than you initially thought. So, let us find out how choosing the proper cleaning services can benefit you in more ways than you are thinking.', '17134276951684145101.jpg', '6161854991684139392.jpg', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_languages`
--
ALTER TABLE `admin_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domain_requests`
--
ALTER TABLE `domain_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalsettings`
--
ALTER TABLE `generalsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hold_orders`
--
ALTER TABLE `hold_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_orders`
--
ALTER TABLE `package_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pcategories`
--
ALTER TABLE `pcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seo_settings`
--
ALTER TABLE `seo_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_faqs`
--
ALTER TABLE `service_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socialsettings`
--
ALTER TABLE `socialsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_blogs`
--
ALTER TABLE `user_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_blog_categories`
--
ALTER TABLE `user_blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_contact_pages`
--
ALTER TABLE `user_contact_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_generalsettings`
--
ALTER TABLE `user_generalsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_languages`
--
ALTER TABLE `user_languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_pages`
--
ALTER TABLE `user_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_services`
--
ALTER TABLE `user_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_languages`
--
ALTER TABLE `admin_languages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `domain_requests`
--
ALTER TABLE `domain_requests`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `generalsettings`
--
ALTER TABLE `generalsettings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hold_orders`
--
ALTER TABLE `hold_orders`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `package_orders`
--
ALTER TABLE `package_orders`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pcategories`
--
ALTER TABLE `pcategories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seo_settings`
--
ALTER TABLE `seo_settings`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `service_faqs`
--
ALTER TABLE `service_faqs`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `socialsettings`
--
ALTER TABLE `socialsettings`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user_blogs`
--
ALTER TABLE `user_blogs`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user_blog_categories`
--
ALTER TABLE `user_blog_categories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_contact_pages`
--
ALTER TABLE `user_contact_pages`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_generalsettings`
--
ALTER TABLE `user_generalsettings`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_languages`
--
ALTER TABLE `user_languages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_pages`
--
ALTER TABLE `user_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_services`
--
ALTER TABLE `user_services`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
