-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2021 a las 21:59:54
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `obregon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesorias`
--

CREATE TABLE `asesorias` (
  `id` int(11) NOT NULL,
  `portada` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `resumen` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cupos` int(11) DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `link` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `asesorias`
--

INSERT INTO `asesorias` (`id`, `portada`, `titulo`, `resumen`, `precio`, `cupos`, `descripcion`, `link`, `created_at`, `updated_at`) VALUES
(1, './img/asesorias/asesorias.jpg', 'Silenciando tu mente', 'Imagínese deslizándose hacia un estado de meditación feliz con solo presionar un botón.', 70, NULL, 'Nos veremos por una hora y media aproximadamente, (1 VEZ), donde te enseñaré todo lo que necesitas saber para llevar a cabo el método de manera segura, confiable, tranquila  y correcta.  \nNos veremos por la APP que te sea más fácil , Zoom , FaceTimeo O WhatsApp . La idea es estar online en un ambiente cómodo.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `talleresDesktop` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `talleresMobile` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `registro` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `homeDesktop` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `homeMobile` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `homeMid` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cursosDesktop` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `cursosMobile` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `blog` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `asesoriasDesktop` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `asesoriasMobile` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`id`, `talleresDesktop`, `talleresMobile`, `registro`, `homeDesktop`, `homeMobile`, `homeMid`, `cursosDesktop`, `cursosMobile`, `blog`, `asesoriasDesktop`, `asesoriasMobile`, `created_at`, `updated_at`) VALUES
(1, '/img/talleres.jpg', '/img/talleres/talleresMob.jpg', '/img/registro.jpg', '/img/bannerMain.jpg', '/img/mobile/main.jpg', '/img/mobile/main1024.jpg', '/img/bannerCursos.jpg', '/img/cursosMob.jpg', '/img/blogBAnner.jpg', '/img/asesorias.jpg', '/img/asesorias/asesoriasMob.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `portada` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `resumen` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `autor` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `banner` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `contenido` longtext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `slug` longtext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `titulo`, `portada`, `resumen`, `autor`, `banner`, `contenido`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'La Meditación como parte de tu rutina', './img/blog.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit at conubia auctor, justo integer venenatis lectus vitae ultrices taciti ante.', 'Claudia', './img/book.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit volutpat tincidunt, vulputate dictum laoreet potenti massa euismod tempus velit at in, vitae nibh diam habitasse sed nascetur cubilia donec. Fusce diam lacinia orci metus litora auctor est nascetur semper ultricies convallis, mus nam habitasse penatibus sem aliquet sociosqu accumsan himenaeos quam urna, dictum duis justo sapien sociis praesent pharetra sed quisque vel. Fames vestibulum natoque volutpat rutrum mattis tincidunt eleifend quis, dapibus per purus bibendum accumsan felis enim litora molestie, ultrices aliquam ac lacus sem fusce aliquet.', 'La-Meditación-como-parte-de-tu-rutina', NULL, NULL),
(2, '2La Meditación como parte de tu rutina', './img/blog.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit at conubia auctor, justo integer venenatis lectus vitae ultrices taciti ante.', 'Claudia', './img/book.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit volutpat tincidunt, vulputate dictum laoreet potenti massa euismod tempus velit at in, vitae nibh diam habitasse sed nascetur cubilia donec. Fusce diam lacinia orci metus litora auctor est nascetur semper ultricies convallis, mus nam habitasse penatibus sem aliquet sociosqu accumsan himenaeos quam urna, dictum duis justo sapien sociis praesent pharetra sed quisque vel. Fames vestibulum natoque volutpat rutrum mattis tincidunt eleifend quis, dapibus per purus bibendum accumsan felis enim litora molestie, ultrices aliquam ac lacus sem fusce aliquet.', 'La-Meditación-como-parte-de-tu-rutina', NULL, NULL),
(3, '3La Meditación como parte de tu rutina', './img/blog.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit at conubia auctor, justo integer venenatis lectus vitae ultrices taciti ante.', 'Claudia', './img/book.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit volutpat tincidunt, vulputate dictum laoreet potenti massa euismod tempus velit at in, vitae nibh diam habitasse sed nascetur cubilia donec. Fusce diam lacinia orci metus litora auctor est nascetur semper ultricies convallis, mus nam habitasse penatibus sem aliquet sociosqu accumsan himenaeos quam urna, dictum duis justo sapien sociis praesent pharetra sed quisque vel. Fames vestibulum natoque volutpat rutrum mattis tincidunt eleifend quis, dapibus per purus bibendum accumsan felis enim litora molestie, ultrices aliquam ac lacus sem fusce aliquet.', 'La-Meditación-como-parte-de-tu-rutina', NULL, NULL),
(4, '4La Meditación como parte de tu rutina', './img/blog.jpg', 'Resumen corto del blog', 'Gutand', './img/book.jpg', 'Lorem ipsum dolor sit amet consectetur adipiscing elit volutpat tincidunt, vulputate dictum laoreet potenti massa euismod tempus velit at in, vitae nibh diam habitasse sed nascetur cubilia donec. Fusce diam lacinia orci metus litora auctor est nascetur semper ultricies convallis, mus nam habitasse penatibus sem aliquet sociosqu accumsan himenaeos quam urna, dictum duis justo sapien sociis praesent pharetra sed quisque vel. Fames vestibulum natoque volutpat rutrum mattis tincidunt eleifend quis, dapibus per purus bibendum accumsan felis enim litora molestie, ultrices aliquam ac lacus sem fusce aliquet.', 'La-Meditación-como-parte-de-tu-rutina', NULL, '2021-03-15 21:15:26'),
(5, 'test blog slug', 'uploads/1/2021-03/blog.jpg', 'Resumen corto del blog', 'Gutand', 'uploads/1/2021-03/book.jpg', '<p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut rutrum tortor quis massa lobortis, vitae blandit ex cursus. Fusce porttitor dolor ligula, ut lacinia erat efficitur ac. Proin faucibus nisl dui, non ornare tortor dictum sed. Vivamus mollis, tortor a fermentum sodales, dui velit blandit purus, sit amet mollis diam massa nec mauris. Maecenas sed diam in odio rutrum tempor et quis tortor. Sed dolor quam, posuere at cursus in, sagittis at mauris. Fusce convallis lacus sit amet dolor efficitur, sed sodales libero ullamcorper. Duis finibus risus ut hendrerit vulputate. Aenean enim sapien, lobortis id molestie a, pulvinar vel orci. Integer a quam tempus, malesuada risus in, ornare leo. In facilisis, nibh sit amet dictum mattis, nibh nulla tristique ante, eu pretium est nisl eu lorem. Fusce pulvinar, ante a placerat tempor, odio arcu convallis magna, eu pretium sem urna ac neque. Duis mauris lacus, interdum in mauris vel, egestas congue risus. Aliquam erat volutpat. Donec sed hendrerit lacus. Phasellus sit amet augue ut elit dapibus facilisis quis eget augue.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Cras in tellus at purus efficitur placerat nec vitae enim. Fusce vel faucibus neque. Ut egestas vestibulum nunc sit amet blandit. Curabitur efficitur condimentum turpis, id porttitor velit vehicula varius. Pellentesque mollis libero lacinia est rhoncus mattis dapibus vel dolor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam dui tortor, vulputate et ipsum ac, imperdiet vestibulum arcu. Aenean tristique scelerisque nibh eget cursus. Aenean tincidunt dolor id tincidunt convallis. Cras a velit in dolor finibus sollicitudin at sed odio.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Pellentesque tempor velit vitae aliquam maximus. Ut malesuada, neque vitae posuere dignissim, nulla ante aliquam odio, eget pulvinar dolor massa sagittis sem. Nulla varius, metus ut tincidunt molestie, sapien ex dictum lorem, non gravida lacus ipsum in eros. Aliquam erat volutpat. Proin condimentum ultricies sapien in malesuada. Praesent tempor lacus non tellus hendrerit, sed dictum ligula dignissim. Praesent volutpat, dui bibendum vestibulum rhoncus, lectus libero ornare lacus, pharetra auctor odio erat vitae leo. Vestibulum lacinia orci vel elit maximus laoreet. Duis sollicitudin aliquet vestibulum. Nunc bibendum efficitur tellus eget fringilla. Nulla facilisi. Nunc interdum magna sapien, non euismod ante auctor eget.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">Ut iaculis, ligula quis aliquam posuere, tortor libero sollicitudin quam, imperdiet convallis tortor nibh sit amet sem. Suspendisse potenti. Morbi facilisis feugiat nisl ac tempor. Mauris sit amet tellus non massa lobortis euismod vel nec enim. In a eleifend ante. Aliquam vitae placerat sapien, ac laoreet nibh. Aliquam odio orci, tincidunt sed commodo in, viverra a arcu. Vestibulum sagittis tortor dui, vitae ullamcorper eros finibus at. Sed cursus neque a elit imperdiet, sit amet elementum velit suscipit. Pellentesque lorem felis, varius sit amet porta ut, rhoncus in libero. Nullam rutrum ipsum in quam lobortis condimentum at ac orci. Etiam elementum quam tortor, ultrices lobortis mauris mattis vel. Morbi interdum convallis libero, quis dapibus metus. Fusce bibendum odio eu mi auctor placerat.</p><p style=\"margin-bottom: 15px; padding: 0px; text-align: justify; font-family: &quot;Open Sans&quot;, Arial, sans-serif;\">In mattis erat sit amet enim sollicitudin, in ullamcorper tellus vehicula. Phasellus mattis fringilla massa. Vestibulum sapien nulla, varius quis erat at, condimentum auctor massa. Sed at ornare lectus. Morbi eget nunc quis dui tempus pulvinar a eu nisl. Ut aliquet, arcu sit amet malesuada ultrices, nisl erat cursus quam, ac feugiat est tortor quis risus. Nunc congue vehicula elit non maximus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean convallis ante id faucibus finibus. Morbi mollis ipsum et vehicula aliquet. Sed sodales eros a libero pulvinar ultrices. Ut nisl est, efficitur eu viverra et, porta in enim. Fusce in dictum arcu. Cras cursus ipsum non libero sollicitudin cursus. Donec convallis lobortis ullamcorper. Integer blandit rutrum euismod.</p>', 'test-blog-slug', '2021-03-16 02:56:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_apicustom`
--

CREATE TABLE `cms_apicustom` (
  `id` int(10) UNSIGNED NOT NULL,
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tabel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aksi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kolom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orderby` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_query_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sql_where` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `method_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responses` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_apikey`
--

CREATE TABLE `cms_apikey` (
  `id` int(10) UNSIGNED NOT NULL,
  `screetkey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_dashboard`
--

CREATE TABLE `cms_dashboard` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_email_queues`
--

CREATE TABLE `cms_email_queues` (
  `id` int(10) UNSIGNED NOT NULL,
  `send_at` datetime DEFAULT NULL,
  `email_recipient` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_attachments` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_email_templates`
--

CREATE TABLE `cms_email_templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cc_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_email_templates`
--

INSERT INTO `cms_email_templates` (`id`, `name`, `slug`, `subject`, `content`, `description`, `from_name`, `from_email`, `cc_email`, `created_at`, `updated_at`) VALUES
(1, 'Email Template Forgot Password Backend', 'forgot_password_backend', NULL, '<p>Hi,</p><p>Someone requested forgot password, here is your new password : </p><p>[password]</p><p><br></p><p>--</p><p>Regards,</p><p>Admin</p>', '[password]', 'System', 'system@crudbooster.com', NULL, '2021-03-15 18:32:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_logs`
--

CREATE TABLE `cms_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `useragent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_logs`
--

INSERT INTO `cms_logs` (`id`, `ipaddress`, `useragent`, `url`, `description`, `details`, `id_cms_users`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.54', 'http://127.0.0.1:8000/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP 127.0.0.1', '', 1, '2021-03-15 18:35:14', NULL),
(2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.54', 'http://127.0.0.1:8000/admin/blog/edit-save/4', 'Actualizar información  en blog', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>resumen</td><td>Lorem ipsum dolor sit amet consectetur adipiscing elit at conubia auctor, justo integer venenatis lectus vitae ultrices taciti ante.</td><td>Resumen corto del blog</td></tr><tr><td>slug</td><td>La-Meditación-como-parte-de-tu-rutina</td><td></td></tr></tbody></table>', 1, '2021-03-15 21:15:14', NULL),
(3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.54', 'http://127.0.0.1:8000/admin/blog/edit-save/4', 'Actualizar información  en blog', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>autor</td><td>Claudia</td><td>Gutand</td></tr><tr><td>slug</td><td>La-Meditación-como-parte-de-tu-rutina</td><td></td></tr></tbody></table>', 1, '2021-03-15 21:15:26', NULL),
(4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.54', 'http://127.0.0.1:8000/admin/blog/add-save', 'Añadir nueva información  en blog', '', 1, '2021-03-16 02:56:29', NULL),
(5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.54', 'http://127.0.0.1:8000/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP 127.0.0.1', '', 1, '2021-03-16 20:05:49', NULL),
(6, '127.0.0.1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_2_3 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.3 Mobile/15E148 Safari/604.1 Edg/89.0.4389.90', 'http://127.0.0.1:8000/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP 127.0.0.1', '', 1, '2021-03-18 02:38:11', NULL),
(7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', 'http://127.0.0.1:8000/admin/login', 'Ingreso de admin@crudbooster.com desde la Dirección IP 127.0.0.1', '', 1, '2021-03-26 01:55:16', NULL),
(8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', 'http://127.0.0.1:8000/admin/users/add-save', 'Añadir nueva información Admin en Gestión de usuarios', '', 1, '2021-03-26 01:57:33', NULL),
(9, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', 'http://127.0.0.1:8000/admin/menu_management/edit-save/1', 'Actualizar información Información en Gestión de Menús', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr></tbody></table>', 1, '2021-03-26 01:57:43', NULL),
(10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', 'http://127.0.0.1:8000/admin/menu_management/edit-save/2', 'Actualizar información Links Herbalife en Gestión de Menús', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>2</td><td></td></tr></tbody></table>', 1, '2021-03-26 01:57:48', NULL),
(11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', 'http://127.0.0.1:8000/admin/menu_management/edit-save/3', 'Actualizar información blog en Gestión de Menús', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>3</td><td></td></tr></tbody></table>', 1, '2021-03-26 01:57:53', NULL),
(12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36 Edg/89.0.774.57', 'http://127.0.0.1:8000/admin/menu_management/edit-save/4', 'Actualizar información Banners en Gestión de Menús', '<table class=\"table table-striped\"><thead><tr><th>Key</th><th>Old Value</th><th>New Value</th></thead><tbody><tr><td>color</td><td></td><td>normal</td></tr><tr><td>sorting</td><td>4</td><td></td></tr></tbody></table>', 1, '2021-03-26 01:57:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_menus`
--

CREATE TABLE `cms_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'url',
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_dashboard` tinyint(1) NOT NULL DEFAULT 0,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_menus`
--

INSERT INTO `cms_menus` (`id`, `name`, `type`, `path`, `color`, `icon`, `parent_id`, `is_active`, `is_dashboard`, `id_cms_privileges`, `sorting`, `created_at`, `updated_at`) VALUES
(1, 'Información', 'Route', 'AdminInfoControllerGetIndex', 'normal', 'fa fa-edit', 0, 1, 0, 1, 1, '2021-03-15 18:40:26', '2021-03-26 01:57:43'),
(2, 'Links Herbalife', 'Route', 'AdminLinksHerbalifeControllerGetIndex', 'normal', 'fa fa-chrome', 0, 1, 0, 1, 2, '2021-03-15 19:12:38', '2021-03-26 01:57:48'),
(3, 'blog', 'Route', 'AdminBlogControllerGetIndex', 'normal', 'fa fa-glass', 0, 1, 0, 1, 3, '2021-03-15 21:12:22', '2021-03-26 01:57:52'),
(4, 'Banners', 'Route', 'AdminBannersControllerGetIndex', 'normal', 'fa fa-picture-o', 0, 1, 0, 1, 4, '2021-03-18 02:38:39', '2021-03-26 01:57:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_menus_privileges`
--

CREATE TABLE `cms_menus_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_menus` int(11) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_menus_privileges`
--

INSERT INTO `cms_menus_privileges` (`id`, `id_cms_menus`, `id_cms_privileges`) VALUES
(5, 1, 2),
(6, 1, 1),
(7, 2, 2),
(8, 2, 1),
(9, 3, 2),
(10, 3, 1),
(11, 4, 2),
(12, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_moduls`
--

CREATE TABLE `cms_moduls` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_protected` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_moduls`
--

INSERT INTO `cms_moduls` (`id`, `name`, `icon`, `path`, `table_name`, `controller`, `is_protected`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Notificaciones', 'fa fa-cog', 'notifications', 'cms_notifications', 'NotificationsController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(2, 'Privilegios', 'fa fa-cog', 'privileges', 'cms_privileges', 'PrivilegesController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(3, 'Privilegios & Roles', 'fa fa-cog', 'privileges_roles', 'cms_privileges_roles', 'PrivilegesRolesController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(4, 'Gestión de usuarios', 'fa fa-users', 'users', 'cms_users', 'AdminCmsUsersController', 0, 1, '2021-03-15 18:32:34', NULL, NULL),
(5, 'Ajustes', 'fa fa-cog', 'settings', 'cms_settings', 'SettingsController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(6, 'Generador de Módulos', 'fa fa-database', 'module_generator', 'cms_moduls', 'ModulsController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(7, 'Gestión de Menús', 'fa fa-bars', 'menu_management', 'cms_menus', 'MenusController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(8, 'Plantillas de Correo', 'fa fa-envelope-o', 'email_templates', 'cms_email_templates', 'EmailTemplatesController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(9, 'Generador de Estadísticas', 'fa fa-dashboard', 'statistic_builder', 'cms_statistics', 'StatisticBuilderController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(10, 'Generador de API', 'fa fa-cloud-download', 'api_generator', '', 'ApiCustomController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(11, 'Log de Accesos (Usuarios)', 'fa fa-flag-o', 'logs', 'cms_logs', 'LogsController', 1, 1, '2021-03-15 18:32:34', NULL, NULL),
(12, 'Información', 'fa fa-edit', 'info', 'info', 'AdminInfoController', 0, 0, '2021-03-15 18:40:26', NULL, NULL),
(13, 'Links Herbalife', 'fa fa-chrome', 'links_herbalife', 'links_herbalife', 'AdminLinksHerbalifeController', 0, 0, '2021-03-15 19:12:38', NULL, NULL),
(14, 'blog', 'fa fa-glass', 'blog', 'blog', 'AdminBlogController', 0, 0, '2021-03-15 21:12:22', NULL, NULL),
(15, 'Banners', 'fa fa-picture-o', 'banners', 'banners', 'AdminBannersController', 0, 0, '2021-03-18 02:38:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_notifications`
--

CREATE TABLE `cms_notifications` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_users` int(11) DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_privileges`
--

CREATE TABLE `cms_privileges` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_superadmin` tinyint(1) DEFAULT NULL,
  `theme_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_privileges`
--

INSERT INTO `cms_privileges` (`id`, `name`, `is_superadmin`, `theme_color`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator', 1, 'skin-red', '2021-03-15 18:32:34', NULL),
(2, 'admin', 0, 'skin-green-light', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_privileges_roles`
--

CREATE TABLE `cms_privileges_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `is_create` tinyint(1) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT NULL,
  `is_edit` tinyint(1) DEFAULT NULL,
  `is_delete` tinyint(1) DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `id_cms_moduls` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_privileges_roles`
--

INSERT INTO `cms_privileges_roles` (`id`, `is_visible`, `is_create`, `is_read`, `is_edit`, `is_delete`, `id_cms_privileges`, `id_cms_moduls`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, 0, 0, 1, 1, '2021-03-15 18:32:34', NULL),
(2, 1, 1, 1, 1, 1, 1, 2, '2021-03-15 18:32:34', NULL),
(3, 0, 1, 1, 1, 1, 1, 3, '2021-03-15 18:32:34', NULL),
(4, 1, 1, 1, 1, 1, 1, 4, '2021-03-15 18:32:34', NULL),
(5, 1, 1, 1, 1, 1, 1, 5, '2021-03-15 18:32:34', NULL),
(6, 1, 1, 1, 1, 1, 1, 6, '2021-03-15 18:32:34', NULL),
(7, 1, 1, 1, 1, 1, 1, 7, '2021-03-15 18:32:34', NULL),
(8, 1, 1, 1, 1, 1, 1, 8, '2021-03-15 18:32:34', NULL),
(9, 1, 1, 1, 1, 1, 1, 9, '2021-03-15 18:32:34', NULL),
(10, 1, 1, 1, 1, 1, 1, 10, '2021-03-15 18:32:34', NULL),
(11, 1, 0, 1, 0, 1, 1, 11, '2021-03-15 18:32:34', NULL),
(12, 1, 1, 1, 1, 1, 1, 12, NULL, NULL),
(13, 1, 1, 1, 1, 1, 1, 13, NULL, NULL),
(14, 1, 1, 1, 1, 1, 1, 14, NULL, NULL),
(15, 1, 1, 1, 1, 1, 1, 15, NULL, NULL),
(16, 1, 1, 1, 1, 1, 2, 15, NULL, NULL),
(17, 1, 1, 1, 1, 1, 2, 14, NULL, NULL),
(18, 1, 1, 1, 1, 1, 2, 4, NULL, NULL),
(19, 1, 1, 1, 1, 1, 2, 12, NULL, NULL),
(20, 1, 1, 1, 1, 1, 2, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_settings`
--

CREATE TABLE `cms_settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_input_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dataenum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `helper` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `group_setting` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_settings`
--

INSERT INTO `cms_settings` (`id`, `name`, `content`, `content_input_type`, `dataenum`, `helper`, `created_at`, `updated_at`, `group_setting`, `label`) VALUES
(1, 'login_background_color', NULL, 'text', NULL, 'Input hexacode', '2021-03-15 18:32:34', NULL, 'Estilo de página de registro', 'Login Background Color'),
(2, 'login_font_color', NULL, 'text', NULL, 'Input hexacode', '2021-03-15 18:32:34', NULL, 'Estilo de página de registro', 'Login Font Color'),
(3, 'login_background_image', NULL, 'upload_image', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Estilo de página de registro', 'Login Background Image'),
(4, 'email_sender', 'support@crudbooster.com', 'text', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Correo', 'Email Sender'),
(5, 'smtp_driver', 'mail', 'select', 'smtp,mail,sendmail', NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Correo', 'Mail Driver'),
(6, 'smtp_host', '', 'text', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Correo', 'SMTP Host'),
(7, 'smtp_port', '25', 'text', NULL, 'default 25', '2021-03-15 18:32:34', NULL, 'Ajustes de Correo', 'SMTP Port'),
(8, 'smtp_username', '', 'text', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Correo', 'SMTP Username'),
(9, 'smtp_password', '', 'text', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Correo', 'SMTP Password'),
(10, 'appname', 'CRUDBooster', 'text', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Aplicaciones', 'Application Name'),
(11, 'default_paper_size', 'Legal', 'text', NULL, 'Paper size, ex : A4, Legal, etc', '2021-03-15 18:32:34', NULL, 'Ajustes de Aplicaciones', 'Default Paper Print Size'),
(12, 'logo', '', 'upload_image', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Aplicaciones', 'Logo'),
(13, 'favicon', '', 'upload_image', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Aplicaciones', 'Favicon'),
(14, 'api_debug_mode', 'true', 'select', 'true,false', NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Aplicaciones', 'API Debug Mode'),
(15, 'google_api_key', '', 'text', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Aplicaciones', 'Google API Key'),
(16, 'google_fcm_key', '', 'text', NULL, NULL, '2021-03-15 18:32:34', NULL, 'Ajustes de Aplicaciones', 'Google FCM Key');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_statistics`
--

CREATE TABLE `cms_statistics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_statistic_components`
--

CREATE TABLE `cms_statistic_components` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_cms_statistics` int(11) DEFAULT NULL,
  `componentID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_name` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sorting` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `config` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cms_users`
--

CREATE TABLE `cms_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_cms_privileges` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cms_users`
--

INSERT INTO `cms_users` (`id`, `name`, `photo`, `email`, `password`, `id_cms_privileges`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Super Admin', NULL, 'admin@crudbooster.com', '$2y$10$3vmPqbfoOrbEnT7.cJ3sgeZnO9uDoViu.WCxYVywu8.qlJDYEfELG', 1, '2021-03-15 18:32:34', NULL, 'Active'),
(2, 'Admin', 'uploads/1/2021-03/220px_user_icon_2svg.png', 'coachclaudiao@gmail.com', '$2y$10$8B3nWz7BqXLgUWdB69/5L.k01zw1d2dMU3H.xCVDIhYvNXBgvTA/e', 2, '2021-03-26 01:57:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `messague` longtext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `messague`, `created_at`, `updated_at`) VALUES
(3, 'Eugenio', 'eugenio.luna@hotmail.es', 'test!', '2021-03-20 20:34:00', '2021-03-20 20:34:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `portada` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `resumen` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cupos` int(11) DEFAULT NULL,
  `link` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `info_video` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `info_audio` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `info_adjunto` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8mb4_spanish2_ci DEFAULT 'curso',
  `status` varchar(10) COLLATE utf8mb4_spanish2_ci DEFAULT 'activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `portada`, `titulo`, `resumen`, `precio`, `cupos`, `link`, `descripcion`, `info_video`, `info_audio`, `info_adjunto`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, './img/cursos/curso1.jpg', 'Silenciando tu mente', 'Imagínese deslizándose hacia un estado de meditación feliz con solo presionar un botón. Estas 10 CLASES de meditación  están diseñadas para ayudarte a hacer exactamente eso.', 80, NULL, NULL, 'Imagínese deslizándose hacia un estado de meditación feliz con solo presionar un botón. Estas 10 CLASES de meditación  están diseñadas para ayudarte a hacer exactamente eso, aprender a meditar y hacerlo desde tu propia voz interior, en tu propio horario y espacio ¡Presiona ahora y aprende de manera sencilla e  instantánea!', '2 videos', '1 audio', '3 archivos adjuntos', 'curso', 'activo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_audio`
--

CREATE TABLE `cursos_audio` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `link` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_pdf`
--

CREATE TABLE `cursos_pdf` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `resumen` longtext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `archivo` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_video`
--

CREATE TABLE `cursos_video` (
  `id` int(11) NOT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `resumen` longtext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `link` varchar(250) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `tel` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `whatsapp` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `facebook` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `instagram` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `info`
--

INSERT INTO `info` (`id`, `tel`, `whatsapp`, `facebook`, `instagram`, `created_at`, `updated_at`) VALUES
(1, '4075437947', '4075437947', 'https://www.facebook.com/CoachClaudiaObregon', 'https://www.instagram.com/coachclaudiao/', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_asesorias`
--

CREATE TABLE `item_asesorias` (
  `id` int(11) NOT NULL,
  `item_asesoria` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `asesoria_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `item_asesorias`
--

INSERT INTO `item_asesorias` (`id`, `item_asesoria`, `asesoria_id`, `created_at`, `updated_at`) VALUES
(1, 'item1', 1, NULL, NULL),
(2, 'item2', 1, NULL, NULL),
(3, 'item3', 1, NULL, NULL),
(4, 'item4', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_cursos`
--

CREATE TABLE `item_cursos` (
  `id` int(11) NOT NULL,
  `item_curso` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `curso_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `item_cursos`
--

INSERT INTO `item_cursos` (`id`, `item_curso`, `curso_id`, `created_at`, `updated_at`) VALUES
(1, 'item1', 1, NULL, NULL),
(2, 'item2', 1, NULL, NULL),
(3, 'item3', 1, NULL, NULL),
(4, 'item4', 1, NULL, NULL),
(5, 'item5', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_talleres`
--

CREATE TABLE `item_talleres` (
  `id` int(11) NOT NULL,
  `item_taller` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `taller_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `item_talleres`
--

INSERT INTO `item_talleres` (`id`, `item_taller`, `taller_id`, `created_at`, `updated_at`) VALUES
(1, 'item1', 1, NULL, NULL),
(2, 'item2', 1, NULL, NULL),
(3, 'item3', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `links_herbalife`
--

CREATE TABLE `links_herbalife` (
  `id` int(11) NOT NULL,
  `colombia` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `eeuu` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `links_herbalife`
--

INSERT INTO `links_herbalife` (`id`, `colombia`, `eeuu`, `created_at`, `updated_at`) VALUES
(1, 'https://www.herbalife.com.co/', 'https://www.herbalife.com/', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_08_07_145904_add_table_cms_apicustom', 1),
(4, '2016_08_07_150834_add_table_cms_dashboard', 1),
(5, '2016_08_07_151210_add_table_cms_logs', 1),
(6, '2016_08_07_151211_add_details_cms_logs', 1),
(7, '2016_08_07_152014_add_table_cms_privileges', 1),
(8, '2016_08_07_152214_add_table_cms_privileges_roles', 1),
(9, '2016_08_07_152320_add_table_cms_settings', 1),
(10, '2016_08_07_152421_add_table_cms_users', 1),
(11, '2016_08_07_154624_add_table_cms_menus_privileges', 1),
(12, '2016_08_07_154624_add_table_cms_moduls', 1),
(13, '2016_08_17_225409_add_status_cms_users', 1),
(14, '2016_08_20_125418_add_table_cms_notifications', 1),
(15, '2016_09_04_033706_add_table_cms_email_queues', 1),
(16, '2016_09_16_035347_add_group_setting', 1),
(17, '2016_09_16_045425_add_label_setting', 1),
(18, '2016_09_17_104728_create_nullable_cms_apicustom', 1),
(19, '2016_10_01_141740_add_method_type_apicustom', 1),
(20, '2016_10_01_141846_add_parameters_apicustom', 1),
(21, '2016_10_01_141934_add_responses_apicustom', 1),
(22, '2016_10_01_144826_add_table_apikey', 1),
(23, '2016_11_14_141657_create_cms_menus', 1),
(24, '2016_11_15_132350_create_cms_email_templates', 1),
(25, '2016_11_15_190410_create_cms_statistics', 1),
(26, '2016_11_17_102740_create_cms_statistic_components', 1),
(27, '2017_06_06_164501_add_deleted_at_cms_moduls', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obsequios`
--

CREATE TABLE `obsequios` (
  `id` int(11) NOT NULL,
  `portada` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `resumen` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `link` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `aprende1` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `aprende2` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `aprende3` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `aprende4` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `aprende5` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `info_video` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `info_audio` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `info_adjunto` varchar(50) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `obsequios`
--

INSERT INTO `obsequios` (`id`, `portada`, `titulo`, `resumen`, `link`, `aprende1`, `aprende2`, `aprende3`, `aprende4`, `aprende5`, `descripcion`, `info_video`, `info_audio`, `info_adjunto`, `created_at`, `updated_at`) VALUES
(1, './img/cursos/obsequio.jpg', 'Desafío 21', 'Imagínese deslizándose hacia un estado de meditación feliz con solo presionar un botón.', NULL, 'Aprenderás como meditar', 'Aprenderás como meditar', 'Aprenderás como meditar', NULL, NULL, 'Imagínese deslizándose hacia un estado de meditación feliz con solo presionar un botón. Estas 10 CLASES de meditación están diseñadas para ayudarte a hacer exactamente eso, aprender a meditar y hacerlo desde tu propia voz interior, en tu propio horario y espacio ¡Presiona ahora y aprende de manera sencilla e instantánea!', '2 videos', '1 audio', '3 archivos adjuntos', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int(11) NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talleres`
--

CREATE TABLE `talleres` (
  `id` int(11) NOT NULL,
  `portada` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `titulo` varchar(150) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `resumen` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `descripcion` longtext COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cupos` int(11) DEFAULT NULL,
  `aprende1` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `aprende2` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `aprende3` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `aprende4` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `aprende5` varchar(100) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `active` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT 'si',
  `place` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT 'En espera',
  `link` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT 'En espera',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `talleres`
--

INSERT INTO `talleres` (`id`, `portada`, `titulo`, `resumen`, `descripcion`, `precio`, `cupos`, `aprende1`, `aprende2`, `aprende3`, `aprende4`, `aprende5`, `active`, `place`, `link`, `created_at`, `updated_at`) VALUES
(1, '/img/talleres/taller.jpg', 'Alimentación consciente', 'Imagínese deslizándose hacia un estado de meditación feliz con solo presionar un botón.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget egestas augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eget egestas augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.', 80, 5, 'Aprenderás como meditar ', 'Aprenderás como meditar ', 'Aprenderás como meditar ', NULL, NULL, 'si', 'En espera', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asesorias`
--
ALTER TABLE `asesorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_apikey`
--
ALTER TABLE `cms_apikey`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_logs`
--
ALTER TABLE `cms_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_menus`
--
ALTER TABLE `cms_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_moduls`
--
ALTER TABLE `cms_moduls`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_notifications`
--
ALTER TABLE `cms_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_privileges`
--
ALTER TABLE `cms_privileges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_settings`
--
ALTER TABLE `cms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_statistics`
--
ALTER TABLE `cms_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cms_users`
--
ALTER TABLE `cms_users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos_audio`
--
ALTER TABLE `cursos_audio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos_pdf`
--
ALTER TABLE `cursos_pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos_video`
--
ALTER TABLE `cursos_video`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item_asesorias`
--
ALTER TABLE `item_asesorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item_cursos`
--
ALTER TABLE `item_cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item_talleres`
--
ALTER TABLE `item_talleres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `links_herbalife`
--
ALTER TABLE `links_herbalife`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `obsequios`
--
ALTER TABLE `obsequios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `talleres`
--
ALTER TABLE `talleres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asesorias`
--
ALTER TABLE `asesorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cms_apicustom`
--
ALTER TABLE `cms_apicustom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_apikey`
--
ALTER TABLE `cms_apikey`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_dashboard`
--
ALTER TABLE `cms_dashboard`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_email_queues`
--
ALTER TABLE `cms_email_queues`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_email_templates`
--
ALTER TABLE `cms_email_templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cms_logs`
--
ALTER TABLE `cms_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cms_menus`
--
ALTER TABLE `cms_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cms_menus_privileges`
--
ALTER TABLE `cms_menus_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cms_moduls`
--
ALTER TABLE `cms_moduls`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `cms_notifications`
--
ALTER TABLE `cms_notifications`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_privileges`
--
ALTER TABLE `cms_privileges`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cms_privileges_roles`
--
ALTER TABLE `cms_privileges_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `cms_settings`
--
ALTER TABLE `cms_settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `cms_statistics`
--
ALTER TABLE `cms_statistics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_statistic_components`
--
ALTER TABLE `cms_statistic_components`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cms_users`
--
ALTER TABLE `cms_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos_audio`
--
ALTER TABLE `cursos_audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos_pdf`
--
ALTER TABLE `cursos_pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cursos_video`
--
ALTER TABLE `cursos_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `item_asesorias`
--
ALTER TABLE `item_asesorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `item_cursos`
--
ALTER TABLE `item_cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `item_talleres`
--
ALTER TABLE `item_talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `links_herbalife`
--
ALTER TABLE `links_herbalife`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `obsequios`
--
ALTER TABLE `obsequios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `talleres`
--
ALTER TABLE `talleres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
