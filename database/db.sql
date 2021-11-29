--
-- Database: `marketplace_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `code`, `is_default`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'English', 'en', 1, 1, NULL, NULL),
(2, 'Franch', 'fr', 0, 1, NULL, NULL),
(3, 'Arabic', 'ar', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_16_163418_create_settings_table', 1),
(5, '2021_06_16_155056_create_permissions_table', 1),
(6, '2021_06_16_155232_create_roles_table', 1),
(7, '2021_06_16_155433_create_role_user_table', 1),
(8, '2021_06_17_151400_create_permission_role_table', 1),
(9, '2021_06_21_111527_create_subscriptions_table', 1),
(10, '2021_06_21_113404_create_subscription_user_table', 1),
(11, '2021_06_22_155804_create_orders_table', 1),
(12, '2021_06_24_110600_create_comments_table', 1),
(13, '2021_07_04_000004_create_user_alerts_table', 1),
(14, '2021_07_04_000017_create_user_user_alert_pivot_table', 1),
(15, '2021_07_27_184354_create_products_table', 1),
(16, '2021_08_31_182900_create_posts_table', 1),
(17, '2021_09_24_113321_create_languages_table', 1),
(18, '2021_09_29_161312_create_payments_table', 1),
(19, '2021_10_17_170103_create_pages_table', 1),
(20, '2021_10_22_121205_create_notifications_table', 1),
(21, '2021_10_24_114357_create_contacts_table', 1),
(22, '2021_11_01_104131_create_sections_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subscription_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `payment_status` int(11) NOT NULL DEFAULT '0',
  `total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `client_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `vendor_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `method` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_received` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'user_management_access', NULL, NULL),
(2, 'permission_create', NULL, NULL),
(3, 'permission_edit', NULL, NULL),
(4, 'permission_show', NULL, NULL),
(5, 'permission_delete', NULL, NULL),
(6, 'permission_access', NULL, NULL),
(7, 'role_create', NULL, NULL),
(8, 'role_edit', NULL, NULL),
(9, 'role_show', NULL, NULL),
(10, 'role_delete', NULL, NULL),
(11, 'role_access', NULL, NULL),
(12, 'user_create', NULL, NULL),
(13, 'user_edit', NULL, NULL),
(14, 'user_show', NULL, NULL),
(15, 'user_delete', NULL, NULL),
(16, 'user_access', NULL, NULL),
(17, 'subscription_management_access', NULL, NULL),
(18, 'client_product_management', NULL, NULL),
(19, 'admin_dashboard', NULL, NULL),
(20, 'client_dashboard', NULL, NULL),
(21, 'user_alert_show', NULL, NULL),
(22, 'user_alert_edit', NULL, NULL),
(23, 'user_alert_create', NULL, NULL),
(24, 'user_alert_access', NULL, NULL),
(25, 'admin_product_delete', NULL, NULL),
(26, 'admin_settings_management', NULL, NULL),
(27, 'admin_stock_management', NULL, NULL),
(28, 'admin_payment_management', NULL, NULL),
(29, 'admin_order_management', NULL, NULL),
(30, 'client_product_management', NULL, NULL),
(31, 'admin_page_management', NULL, NULL),
(32, 'admin_user_alert_delete', NULL, NULL),
(33, 'admin_order_delete', NULL, NULL),
(34, 'admin_subscription_create', NULL, NULL),
(35, 'admin_subscription_edit', NULL, NULL),
(36, 'admin_subscription_delete', NULL, NULL),
(37, 'vendor_dashboard', NULL, NULL),
(38, 'vendor_order_management', NULL, NULL),
(39, 'vendor_product_management', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(8, 1, 8, NULL, NULL),
(9, 1, 9, NULL, NULL),
(10, 1, 10, NULL, NULL),
(11, 1, 11, NULL, NULL),
(12, 1, 12, NULL, NULL),
(13, 1, 13, NULL, NULL),
(14, 1, 14, NULL, NULL),
(15, 1, 15, NULL, NULL),
(16, 1, 16, NULL, NULL),
(17, 1, 17, NULL, NULL),
(19, 1, 19, NULL, NULL),
(20, 1, 20, NULL, NULL),
(21, 1, 21, NULL, NULL),
(22, 1, 22, NULL, NULL),
(23, 1, 23, NULL, NULL),
(24, 1, 24, NULL, NULL),
(25, 1, 25, NULL, NULL),
(26, 1, 26, NULL, NULL),
(27, 1, 27, NULL, NULL),
(28, 1, 28, NULL, NULL),
(29, 1, 29, NULL, NULL),
(30, 1, 30, NULL, NULL),
(31, 1, 31, NULL, NULL),
(32, 1, 32, NULL, NULL),
(33, 1, 33, NULL, NULL),
(34, 1, 34, NULL, NULL),
(35, 1, 35, NULL, NULL),
(36, 1, 36, NULL, NULL),
(40, 2, 37, NULL, NULL),
(41, 2, 38, NULL, NULL),
(42, 2, 39, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `seo_title` text COLLATE utf8mb4_unicode_ci,
  `seo_desc` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `wholesale_price` decimal(10,0) DEFAULT NULL,
  `category` enum('none','1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  `vendor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `image`, `price`, `wholesale_price`, `category`, `description`, `status`, `stock`, `vendor_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'cuH5NnT2IB', 'Prof. Dejon Donnelly', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(2, '6mYXx90mEE', 'Prof. Jaunita Steuber V', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(3, 'ceWmlQBQtD', 'Mossie Runte', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(4, 'KcqnlKfD6Q', 'Kelsie Beahan', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(5, 'saoe1y37B9', 'Madisyn Durgan IV', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(6, 'yAYH3LbonF', 'Carmine Fisher', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(7, 'W4ptRDubO6', 'Ms. Nedra Senger MD', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(8, 'srq0M9mguL', 'Tyshawn Botsford MD', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(9, 'OUCEoRrCdg', 'Dr. Isobel Goodwin', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(10, 'z1rDtEpxoR', 'Pascale Anderson', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(11, '8JDEV1s9aT', 'Anne Murphy', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(12, 'L57qw6lLzS', 'Angel Shanahan DVM', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(13, 'aESX96UIzm', 'Jovany Stark', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(14, 'fa6TMu9LHj', 'Verla Funk', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(15, 'of177KI9Ym', 'Dr. Reymundo Weimann', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(16, 'NBL5BD65kH', 'Noelia Hudson', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(17, 'GQH2n2KAH4', 'Mara Flatley', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(18, 'hlkMLqs4AJ', 'Oswald Lynch', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(19, 'LFeMO2tokV', 'Tracey Blick', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(20, 'en4qe3u5iA', 'Kayleigh Doyle', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(21, 'Xhq6PWgwSi', 'Ms. Belle Lowe V', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(22, 'KOTk1vqs9J', 'Kim Stracke', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(23, 'liQNdLzGqn', 'Dimitri Kautzer DDS', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(24, 'akveSrdw4s', 'Olen Hermiston', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(25, '3fPVgSIjG1', 'Baylee Rutherford', NULL, '40', '20', 'none', NULL, 1, 1, 4, NULL, '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(26, '21112452046475', 'product x ', 'VWRf0L7B5NsEhg6zlTOYRPojRbldE8yzV4fpekzl.png', '1000', '700', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:26:03', '2021-11-24 15:26:03'),
(27, 'UjQuqUHYb7', 'Lee Hagenes IV', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(28, 'N0LqGh6NVv', 'Zelda Buckridge', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(29, 'NbDvopO2vB', 'Ted O\'Kon', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(30, 'aKP0FmWHdK', 'Prudence Krajcik', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(31, '0G4TmbLTDi', 'Mabelle Torphy', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(32, 'vwkEDL0LPP', 'Albin Fisher', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(33, 'mFzfb3kjDN', 'Garett Kerluke DVM', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(34, 'Kab1RMRLwg', 'Candida Weimann MD', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(35, 'kguXZikYYA', 'Rebekah Pagac MD', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(36, 'WRpE9vWXzk', 'Juvenal Goodwin', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(37, 'ddSedmHRaN', 'Ethel Homenick', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(38, 'hsCVxB0hjw', 'Edwina Abshire', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(39, 'IqNv5dN0L9', 'Maeve Rempel', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(40, 'FTkYn1Pjzo', 'Raymundo McClure', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(41, 'TZLIxvCiy1', 'Gregoria Baumbach', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(42, 'WjP18NYITV', 'Grant Schroeder', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(43, 'Nq3JEghP7l', 'Miss Sibyl Erdman DVM', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(44, '4SLr4kqJI8', 'Emilio Kemmer', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(45, 'qxal75t0H0', 'Bridgette Hintz', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(46, '9eAGYCnR1F', 'Mitchel Marks', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(47, '3zkVD1MHOA', 'Anthony Murphy', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(48, 'R2amXKW80w', 'Holden Wolff', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(49, 'Zd5aRQYXW7', 'Mr. Christopher Roob', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(50, 'J4dXBTOWZ8', 'Caesar Treutel I', NULL, '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 15:27:18'),
(51, 'xYBMjQdFS3', 'Lizzie Walsh', '94jsYKFwJEpflsOMTpgcOdhU2xbeq7sbKzH4L4vl.png', '40', '20', 'none', NULL, 1, 1, 3, NULL, '2021-11-24 15:27:18', '2021-11-24 16:49:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', NULL, NULL),
(2, 'VENDOR', NULL, NULL),
(3, 'CLIENT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 2, 4, NULL, NULL),
(5, 3, 5, NULL, NULL),
(6, 3, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured_title` text COLLATE utf8mb4_unicode_ci,
  `label` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `bg_color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` enum('none','1','2','3','4') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'none',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `image`, `featured_title`, `label`, `link`, `description`, `status`, `bg_color`, `position`, `created_at`, `updated_at`) VALUES
(1, 'This is the first section', '', 'headline', 'click here', '#', '1', 1, '#ffff', 'none', NULL, NULL),
(2, 'This is the first section', '', 'headline', 'click here', '#', '1', 1, '#ffff', '1', NULL, NULL),
(3, 'This is the first section', '', 'headline', 'click here', '#', '1', 1, '#ffff', '2', NULL, NULL),
(4, 'This is the first section', '', 'headline', 'click here', '#', '1', 1, '#ffff', '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'company_name', 'Delivery Application', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(2, 'site_title', 'Delivery', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(3, 'company_email_address', 'admin@admin.com', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(4, 'company_phone', '+9999999999999', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(5, 'company_address', 'Street , City, Zip, Country', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(6, 'currency_code', 'MAD', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(7, 'currency_symbol', 'DH', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(8, 'site_logo', '', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(9, 'site_favicon', '', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(10, 'page_status', '1', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(11, 'footer_copyright_text', '', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(12, 'seo_meta_title', 'delivery management', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(13, 'seo_meta_description', 'delivery management', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(14, 'social_facebook', '#', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(15, 'social_twitter', '#', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(16, 'social_instagram', '#', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(17, 'social_linkedin', '#', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(18, 'social_whatsapp', '#', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(19, 'head_tags', '', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(20, 'body_tags', '', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(21, 'orderTracking', '1', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(22, 'enableSMS', '1', '2021-11-24 15:01:19', '2021-11-24 15:01:19'),
(23, 'enableRegistrationTerms', '1', '2021-11-24 15:01:19', '2021-11-24 15:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `name`, `details`, `created_at`, `updated_at`) VALUES
(1, 'Monthly', 'some description', NULL, NULL),
(2, 'Yearly', 'some description', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_user`
--

CREATE TABLE `subscription_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_user`
--

INSERT INTO `subscription_user` (`id`, `subscription_id`, `user_id`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '10.00', NULL, NULL),
(2, 2, 3, '10.00', NULL, NULL),
(3, 1, 4, '10.00', NULL, NULL),
(4, 2, 4, '10.00', NULL, NULL),
(5, 1, 5, '15.00', NULL, NULL),
(6, 2, 5, '15.00', NULL, NULL),
(7, 1, 6, '15.00', NULL, NULL),
(8, 2, 6, '15.00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci,
  `banner_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `whatsapp_number` text COLLATE utf8mb4_unicode_ci,
  `telegram_link` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `company_name`, `banner_image`, `address`, `whatsapp_number`, `telegram_link`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin 1', 'admin1@admin.com', '0600000000', 'KitKat', NULL, 'Casablanca , Morocco', NULL, NULL, 1, NULL, '$2y$10$o6K66VClWf1w1P5daU4Nne6qRzoJmZxMM7lgsBOJ.1Js/aYK.8REG', NULL, '2021-11-24 15:01:19', NULL),
(2, 'Admin 2', 'admin2@admin.com', '0600000000', 'hotech', NULL, 'Casablanca , Morocco', NULL, NULL, 1, NULL, '$2y$10$iCfJU.3L29VlZ2hN1kSomO2ERgdsJvs6k59vyCsu0MajV/NxtdEqO', NULL, '2021-11-24 15:01:19', NULL),
(3, 'Vendor 1', 'vendor1@vendor.com', '0600000000', 'Smartech', 'LA89lixB8GxDikXkZF4sDfk08m0sOmX58Epxspx6.jpg', 'Casablanca , Morocco', '0600000000', '0600000000', 1, NULL, '$2y$10$RYcfrYp6Qep3NDeri4PLpeTaZJ2hgCsEPZSW0XUvrIoCtbGyJJ7V.', NULL, '2021-11-24 15:01:19', '2021-11-24 16:31:48'),
(4, 'Vendor 2', 'vendor2@vendor.com', '0600000000', 'Gotech', NULL, 'Casablanca , Morocco', NULL, NULL, 1, NULL, '$2y$10$uvYauE9nbPdXuizhjco.TucZjLyw2B945SIsbGLCfhyTRV2uf8u8e', NULL, '2021-11-24 15:01:19', NULL),
(5, 'Client 1', 'client1@client.com', '0600000000', 'HichamTech', NULL, 'Casablanca , Morocco', NULL, NULL, 1, NULL, '$2y$10$EiM5zGWPMwjK4oZ51T911OsY.5ubbgaackeFVedI1pJvjjFOgItKK', NULL, '2021-11-24 15:01:19', NULL),
(6, 'Client 2', 'client2@client.com', '0600000000', 'StoreIno', NULL, 'Casablanca , Morocco', NULL, NULL, 1, NULL, '$2y$10$8YQW3OP4ZILmKeEUnsJTa.4K8D4ZYbi7w064aAwFV/NXJ6YR.S292', NULL, '2021-11-24 15:01:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_user_alert`
--

CREATE TABLE `user_user_alert` (
  `user_alert_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seen_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_order_id_foreign` (`order_id`),
  ADD KEY `comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_admin_id_foreign` (`admin_id`),
  ADD KEY `orders_client_id_foreign` (`client_id`),
  ADD KEY `orders_vendor_id_foreign` (`vendor_id`),
  ADD KEY `orders_subscription_id_foreign` (`subscription_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_code_unique` (`code`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`),
  ADD KEY `products_vendor_id_foreign` (`vendor_id`),
  ADD KEY `products_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_user`
--
ALTER TABLE `subscription_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscription_user_subscription_id_foreign` (`subscription_id`),
  ADD KEY `subscription_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD KEY `user_alert_id_fk_4313631` (`user_alert_id`),
  ADD KEY `user_id_fk_4313631` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscription_user`
--
ALTER TABLE `subscription_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_vendor_id_foreign` FOREIGN KEY (`vendor_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_user`
--
ALTER TABLE `subscription_user`
  ADD CONSTRAINT `subscription_user_subscription_id_foreign` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscription_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_user_alert`
--
ALTER TABLE `user_user_alert`
  ADD CONSTRAINT `user_alert_id_fk_4313631` FOREIGN KEY (`user_alert_id`) REFERENCES `user_alerts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_id_fk_4313631` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
