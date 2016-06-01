-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2016 a las 17:19:31
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `siot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id_empresa` int(10) UNSIGNED NOT NULL,
  `razon_social` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rif` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text CHARACTER SET utf8,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contacto` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `activo` tinyint(3) UNSIGNED DEFAULT '1' COMMENT '1=Activo, 0=Desactivado',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `razon_social`, `rif`, `direccion`, `telefono`, `contacto`, `correo`, `activo`, `fecha_registro`) VALUES
(1, 'VENEZOLANA DE ALIMENTOS LA CASA S.A.', 'G-20008504-5', 'Av. Sucre, entre la Policía Nacional Bolivariana y Calle Mauri, Centro de Acopio Catia, Parroquia Sucre, Municipio Libertador. Caracas – Venezuela', '(0212)8700710', 'RICARDO VILLAMIZAR', 'r.villamizar@venalcasa.gob.ve', 1, '2016-03-24 17:45:11'),
(2, 'ARROZ DEL ALBA S.A.', 'G-20008205-4', 'BARINAS, AVENIDA CUATRICENTENARIA. EDIFICIO MPPAT. PLANTA BAJA. OFICINA S/N.', '(0251)2372535/4857', 'CAROL FIGUEREDO', '', 1, '2016-03-24 21:57:32'),
(3, 'LEGUMINOSAS DEL ALBA S.A.', 'G-20008249-6', 'CORREDOR AGROINDUSTRIAL BELISA I, EDIF. UNIDAD DE PRODUCCION SOCIALISTA, PB, LOCAL Nº 1, ZONA INDUSTRIALL, SAN FELIPE, EDO. YARACUY.', '(0254)8860035', 'RICARDO VILLAMIZAR', 'R.VILLAMIZAR@VENALCASA.GOB.VE', 0, '2016-03-25 00:00:21'),
(4, 'AZUCARERA LA MONTAÑA', 'v-152341j', 'prueba', '1234656', '123456', 'prueba@gmail.com', 1, '2016-05-29 22:50:56'),
(999, 'TODAS', '', ' ', '0212-0000000', 'CGONCALVES', '', 1, '2016-03-28 02:35:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL COMMENT 'Identificador de la tabla Estado',
  `estado` varchar(100) NOT NULL COMMENT 'Indica el nombre del estado almacenado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Entidad que contiene informacion sobre estados. Desarrollado por Jose Rodriguez <josearodrigueze@gmail.com> @josearodrigueze';

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'DTTO. CAPITAL'),
(2, 'ANZOATEGUI'),
(3, 'APURE'),
(4, 'ARAGUA'),
(5, 'BARINAS'),
(6, 'BOLIVAR'),
(7, 'CARABOBO'),
(8, 'COJEDES'),
(9, 'FALCON'),
(10, 'GUARICO'),
(11, 'LARA'),
(12, 'MERIDA'),
(13, 'MIRANDA'),
(14, 'MONAGAS'),
(15, 'NUEVA ESPARTA'),
(16, 'PORTUGUESA'),
(17, 'SUCRE'),
(18, 'TACHIRA'),
(19, 'TRUJILLO'),
(20, 'YARACUY'),
(21, 'ZULIA'),
(22, 'AMAZONAS'),
(23, 'DELTA AMACURO'),
(24, 'VARGAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gerencia`
--

CREATE TABLE `gerencia` (
  `id_gerencia` int(10) UNSIGNED NOT NULL,
  `sede_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `nombre_gerencia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `gerente` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ubicacion` longtext COLLATE utf8_spanish_ci,
  `activo` tinyint(3) UNSIGNED DEFAULT '1' COMMENT '1=Activo, 0=Desactivado',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(10) UNSIGNED NOT NULL,
  `nombre_marca` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `nombre_marca`) VALUES
(1, 'VENALCASA'),
(2, 'DOÑA EMILIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida`
--

CREATE TABLE `medida` (
  `id_medida` int(10) UNSIGNED NOT NULL,
  `nombre_medida` varchar(100) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `abv_medida` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `medida`
--

INSERT INTO `medida` (`id_medida`, `nombre_medida`, `abv_medida`) VALUES
(1, 'LITRO', 'LT'),
(2, 'KILOGRAMOS', 'KG'),
(3, 'BULTO', 'BULTO'),
(4, 'CAJA', 'CAJA'),
(5, 'UND.', 'UND.'),
(6, 'GRAMOS', 'GR.'),
(7, 'MILILITROS', 'ML.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL COMMENT 'Identificador de Munucipio',
  `municipio` varchar(100) NOT NULL,
  `estado_id` int(11) NOT NULL COMMENT 'Identificador del estado al que pertenece la parroquia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Entidad que contiene la informacion de municipios. Desarrollado por Jose Rodriguez <josearodrigueze@gmail.com> @josearodrigueze';

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `municipio`, `estado_id`) VALUES
(1, 'LIBERTADOR', 1),
(2, 'ANACO', 2),
(3, 'ARAGUA', 2),
(4, 'BOLIVAR', 2),
(5, 'BRUZUAL', 2),
(6, 'CAJIGAL', 2),
(7, 'FREITES', 2),
(8, 'INDEPENDENCIA', 2),
(9, 'LIBERTAD', 2),
(10, 'MIRANDA', 2),
(11, 'MONAGAS', 2),
(12, 'PEÑALVER', 2),
(13, 'SIMON RODRIGUEZ', 2),
(14, 'SOTILLO', 2),
(15, 'GUANIPA', 2),
(16, 'GUANTA', 2),
(17, 'PIRITU', 2),
(18, 'M.L/DIEGO BAUTISTA U', 2),
(19, 'CARVAJAL', 2),
(20, 'SANTA ANA', 2),
(21, 'MC GREGOR', 2),
(22, 'S JUAN CAPISTRANO', 2),
(23, 'ACHAGUAS', 3),
(24, 'MUÑOZ', 3),
(25, 'PAEZ', 3),
(26, 'PEDRO CAMEJO', 3),
(27, 'ROMULO GALLEGOS', 3),
(28, 'SAN FERNANDO', 3),
(29, 'BIRUACA', 3),
(30, 'GIRARDOT', 4),
(31, 'SANTIAGO MARIÑO', 4),
(32, 'JOSE FELIX RIVAS', 4),
(33, 'SAN CASIMIRO', 4),
(34, 'SAN SEBASTIAN', 4),
(35, 'SUCRE', 4),
(36, 'URDANETA', 4),
(37, 'ZAMORA', 4),
(38, 'LIBERTADOR', 4),
(39, 'JOSE ANGEL LAMAS', 4),
(40, 'BOLIVAR', 4),
(41, 'SANTOS MICHELENA', 4),
(42, 'MARIO B IRAGORRY', 4),
(43, 'TOVAR', 4),
(44, 'CAMATAGUA', 4),
(45, 'JOSE R REVENGA', 4),
(46, 'FRANCISCO LINARES A.', 4),
(47, 'M.OCUMARE D LA COSTA', 4),
(48, 'ARISMENDI', 5),
(49, 'BARINAS', 5),
(50, 'BOLIVAR', 5),
(51, 'EZEQUIEL ZAMORA', 5),
(52, 'OBISPOS', 5),
(53, 'PEDRAZA', 5),
(54, 'ROJAS', 5),
(55, 'SOSA', 5),
(56, 'ALBERTO ARVELO T', 5),
(57, 'A JOSE DE SUCRE', 5),
(58, 'CRUZ PAREDES', 5),
(59, 'ANDRES E. BLANCO', 5),
(60, 'CARONI', 6),
(61, 'CEDEÑO', 6),
(62, 'HERES', 6),
(63, 'PIAR', 6),
(64, 'ROSCIO', 6),
(65, 'SUCRE', 6),
(66, 'SIFONTES', 6),
(67, 'RAUL LEONI', 6),
(68, 'GRAN SABANA', 6),
(69, 'EL CALLAO', 6),
(70, 'PADRE PEDRO CHIEN', 6),
(71, 'BEJUMA', 7),
(72, 'CARLOS ARVELO', 7),
(73, 'DIEGO IBARRA', 7),
(74, 'GUACARA', 7),
(75, 'MONTALBAN', 7),
(76, 'JUAN JOSE MORA', 7),
(77, 'PUERTO CABELLO', 7),
(78, 'SAN JOAQUIN', 7),
(79, 'VALENCIA', 7),
(80, 'MIRANDA', 7),
(81, 'LOS GUAYOS', 7),
(82, 'NAGUANAGUA', 7),
(83, 'SAN DIEGO', 7),
(84, 'LIBERTADOR', 7),
(85, 'ANZOATEGUI', 8),
(86, 'FALCON', 8),
(87, 'GIRARDOT', 8),
(88, 'MP PAO SN J BAUTISTA', 8),
(89, 'RICAURTE', 8),
(90, 'SAN CARLOS', 8),
(91, 'TINACO', 8),
(92, 'LIMA BLANCO', 8),
(93, 'ROMULO GALLEGOS', 8),
(94, 'ACOSTA', 9),
(95, 'BOLIVAR', 9),
(96, 'BUCHIVACOA', 9),
(97, 'CARIRUBANA', 9),
(98, 'COLINA', 9),
(99, 'DEMOCRACIA', 9),
(100, 'FALCON', 9),
(101, 'FEDERACION', 9),
(102, 'MAUROA', 9),
(103, 'MIRANDA', 9),
(104, 'PETIT', 9),
(105, 'SILVA', 9),
(106, 'ZAMORA', 9),
(107, 'DABAJURO', 9),
(108, 'MONS. ITURRIZA', 9),
(109, 'LOS TAQUES', 9),
(110, 'PIRITU', 9),
(111, 'UNION', 9),
(112, 'SAN FRANCISCO', 9),
(113, 'JACURA', 9),
(114, 'CACIQUE MANAURE', 9),
(115, 'PALMA SOLA', 9),
(116, 'SUCRE', 9),
(117, 'URUMACO', 9),
(118, 'TOCOPERO', 9),
(119, 'INFANTE', 10),
(120, 'MELLADO', 10),
(121, 'MIRANDA', 10),
(122, 'MONAGAS', 10),
(123, 'RIBAS', 10),
(124, 'ROSCIO', 10),
(125, 'ZARAZA', 10),
(126, 'CAMAGUAN', 10),
(127, 'S JOSE DE GUARIBE', 10),
(128, 'LAS MERCEDES', 10),
(129, 'EL SOCORRO', 10),
(130, 'ORTIZ', 10),
(131, 'S MARIA DE IPIRE', 10),
(132, 'CHAGUARAMAS', 10),
(133, 'SAN GERONIMO DE G', 10),
(134, 'CRESPO', 11),
(135, 'IRIBARREN', 11),
(136, 'JIMENEZ', 11),
(137, 'MORAN', 11),
(138, 'PALAVECINO', 11),
(139, 'TORRES', 11),
(140, 'URDANETA', 11),
(141, 'ANDRES E BLANCO', 11),
(142, 'SIMON PLANAS', 11),
(143, 'ALBERTO ADRIANI', 12),
(144, 'ANDRES BELLO', 12),
(145, 'ARZOBISPO CHACON', 12),
(146, 'CAMPO ELIAS', 12),
(147, 'GUARAQUE', 12),
(148, 'JULIO CESAR SALAS', 12),
(149, 'JUSTO BRICEÑO', 12),
(150, 'LIBERTADOR', 12),
(151, 'SANTOS MARQUINA', 12),
(152, 'MIRANDA', 12),
(153, 'ANTONIO PINTO S.', 12),
(154, 'OB. RAMOS DE LORA', 12),
(155, 'CARACCIOLO PARRA', 12),
(156, 'CARDENAL QUINTERO', 12),
(157, 'PUEBLO LLANO', 12),
(158, 'RANGEL', 12),
(159, 'RIVAS DAVILA', 12),
(160, 'SUCRE', 12),
(161, 'TOVAR', 12),
(162, 'TULIO F CORDERO', 12),
(163, 'PADRE NOGUERA', 12),
(164, 'ARICAGUA', 12),
(165, 'ZEA', 12),
(166, 'ACEVEDO', 13),
(167, 'BRION', 13),
(168, 'GUAICAIPURO', 13),
(169, 'INDEPENDENCIA', 13),
(170, 'LANDER', 13),
(171, 'PAEZ', 13),
(172, 'PAZ CASTILLO', 13),
(173, 'PLAZA', 13),
(174, 'SUCRE', 13),
(175, 'URDANETA', 13),
(176, 'ZAMORA', 13),
(177, 'CRISTOBAL ROJAS', 13),
(178, 'LOS SALIAS', 13),
(179, 'ANDRES BELLO', 13),
(180, 'SIMON BOLIVAR', 13),
(181, 'BARUTA', 13),
(182, 'CARRIZAL', 13),
(183, 'CHACAO', 13),
(184, 'EL HATILLO', 13),
(185, 'BUROZ', 13),
(186, 'PEDRO GUAL', 13),
(187, 'ACOSTA', 14),
(188, 'BOLIVAR', 14),
(189, 'CARIPE', 14),
(190, 'CEDEÑO', 14),
(191, 'EZEQUIEL ZAMORA', 14),
(192, 'LIBERTADOR', 14),
(193, 'MATURIN', 14),
(194, 'PIAR', 14),
(195, 'PUNCERES', 14),
(196, 'SOTILLO', 14),
(197, 'AGUASAY', 14),
(198, 'SANTA BARBARA', 14),
(199, 'URACOA', 14),
(200, 'ARISMENDI', 15),
(201, 'DIAZ', 15),
(202, 'GOMEZ', 15),
(203, 'MANEIRO', 15),
(204, 'MARCANO', 15),
(205, 'MARIÑO', 15),
(206, 'PENIN. DE MACANAO', 15),
(207, 'VILLALBA(I.COCHE)', 15),
(208, 'TUBORES', 15),
(209, 'ANTOLIN DEL CAMPO', 15),
(210, 'GARCIA', 15),
(211, 'ARAURE', 16),
(212, 'ESTELLER', 16),
(213, 'GUANARE', 16),
(214, 'GUANARITO', 16),
(215, 'OSPINO', 16),
(216, 'PAEZ', 16),
(217, 'SUCRE', 16),
(218, 'TUREN', 16),
(219, 'M.JOSE V DE UNDA', 16),
(220, 'AGUA BLANCA', 16),
(221, 'PAPELON', 16),
(222, 'GENARO BOCONOITO', 16),
(223, 'S RAFAEL DE ONOTO', 16),
(224, 'SANTA ROSALIA', 16),
(225, 'ARISMENDI', 17),
(226, 'BENITEZ', 17),
(227, 'BERMUDEZ', 17),
(228, 'CAJIGAL', 17),
(229, 'MARIÑO', 17),
(230, 'MEJIA', 17),
(231, 'MONTES', 17),
(232, 'RIBERO', 17),
(233, 'SUCRE', 17),
(234, 'VALDEZ', 17),
(235, 'ANDRES E BLANCO', 17),
(236, 'LIBERTADOR', 17),
(237, 'ANDRES MATA', 17),
(238, 'BOLIVAR', 17),
(239, 'CRUZ S ACOSTA', 17),
(240, 'AYACUCHO', 18),
(241, 'BOLIVAR', 18),
(242, 'INDEPENDENCIA', 18),
(243, 'CARDENAS', 18),
(244, 'JAUREGUI', 18),
(245, 'JUNIN', 18),
(246, 'LOBATERA', 18),
(247, 'SAN CRISTOBAL', 18),
(248, 'URIBANTE', 18),
(249, 'CORDOBA', 18),
(250, 'GARCIA DE HEVIA', 18),
(251, 'GUASIMOS', 18),
(252, 'MICHELENA', 18),
(253, 'LIBERTADOR', 18),
(254, 'PANAMERICANO', 18),
(255, 'PEDRO MARIA UREÑA', 18),
(256, 'SUCRE', 18),
(257, 'ANDRES BELLO', 18),
(258, 'FERNANDEZ FEO', 18),
(259, 'LIBERTAD', 18),
(260, 'SAMUEL MALDONADO', 18),
(261, 'SEBORUCO', 18),
(262, 'ANTONIO ROMULO C', 18),
(263, 'FCO DE MIRANDA', 18),
(264, 'JOSE MARIA VARGA', 18),
(265, 'RAFAEL URDANETA', 18),
(266, 'SIMON RODRIGUEZ', 18),
(267, 'TORBES', 18),
(268, 'SAN JUDAS TADEO', 18),
(269, 'RAFAEL RANGEL', 19),
(270, 'BOCONO', 19),
(271, 'CARACHE', 19),
(272, 'ESCUQUE', 19),
(273, 'TRUJILLO', 19),
(274, 'URDANETA', 19),
(275, 'VALERA', 19),
(276, 'CANDELARIA', 19),
(277, 'MIRANDA', 19),
(278, 'MONTE CARMELO', 19),
(279, 'MOTATAN', 19),
(280, 'PAMPAN', 19),
(281, 'S RAFAEL CARVAJAL', 19),
(282, 'SUCRE', 19),
(283, 'ANDRES BELLO', 19),
(284, 'BOLIVAR', 19),
(285, 'JOSE F M CAÑIZAL', 19),
(286, 'JUAN V CAMPO ELI', 19),
(287, 'LA CEIBA', 19),
(288, 'PAMPANITO', 19),
(289, 'BOLIVAR', 20),
(290, 'BRUZUAL', 20),
(291, 'NIRGUA', 20),
(292, 'SAN FELIPE', 20),
(293, 'SUCRE', 20),
(294, 'URACHICHE', 20),
(295, 'PEÑA', 20),
(296, 'JOSE ANTONIO PAEZ', 20),
(297, 'LA TRINIDAD', 20),
(298, 'COCOROTE', 20),
(299, 'INDEPENDENCIA', 20),
(300, 'ARISTIDES BASTID', 20),
(301, 'MANUEL MONGE', 20),
(302, 'VEROES', 20),
(303, 'BARALT', 21),
(304, 'SANTA RITA', 21),
(305, 'COLON', 21),
(306, 'MARA', 21),
(307, 'MARACAIBO', 21),
(308, 'MIRANDA', 21),
(309, 'PAEZ', 21),
(310, 'MACHIQUES DE P', 21),
(311, 'SUCRE', 21),
(312, 'LA CAÑADA DE U.', 21),
(313, 'LAGUNILLAS', 21),
(314, 'CATATUMBO', 21),
(315, 'M/ROSARIO DE PERIJA', 21),
(316, 'CABIMAS', 21),
(317, 'VALMORE RODRIGUEZ', 21),
(318, 'JESUS E LOSSADA', 21),
(319, 'ALMIRANTE P', 21),
(320, 'SAN FRANCISCO', 21),
(321, 'JESUS M SEMPRUN', 21),
(322, 'FRANCISCO J PULG', 21),
(323, 'SIMON BOLIVAR', 21),
(324, 'ATURES', 22),
(325, 'ATABAPO', 22),
(326, 'MAROA', 22),
(327, 'RIO NEGRO', 22),
(328, 'AUTANA', 22),
(329, 'MANAPIARE', 22),
(330, 'ALTO ORINOCO', 22),
(331, 'TUCUPITA', 23),
(332, 'PEDERNALES', 23),
(333, 'ANTONIO DIAZ', 23),
(334, 'CASACOIMA', 23),
(335, 'VARGAS', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `NU_IdNovedad` int(11) NOT NULL,
  `NU_Cedula` int(11) NOT NULL,
  `AL_Nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `AL_Apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `AF_Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `AF_Telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `AF_Ubicacion` longtext COLLATE utf8_spanish_ci NOT NULL,
  `empresa_NU_IdEmpresa` int(11) NOT NULL,
  `AF_Novedad` longtext COLLATE utf8_spanish_ci NOT NULL,
  `FE_Registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `novedad`
--

INSERT INTO `novedad` (`NU_IdNovedad`, `NU_Cedula`, `AL_Nombre`, `AL_Apellido`, `AF_Correo`, `AF_Telefono`, `AF_Ubicacion`, `empresa_NU_IdEmpresa`, `AF_Novedad`, `FE_Registro`) VALUES
(1, 14472354, 'maneul', 'fernadn', 'cancerve@gmail.com', '56466465', 'asdfasdfdsf', 3, 'asdf asdf asdf asdfasdf', '2014-04-10 15:28:13'),
(2, 14472354, 'asdf', 'asdf', 'asdf@afd.com', 'asdf', 'asdf', 3, 'asfd', '2014-04-10 17:27:48'),
(3, 9919844, 'JULIO CESAR', 'REQUENA RENGIFO', 'j.acosta.venalcasa@gmail.com', '04165114729', 'planta chaguaramas', 3, 'al ingresar la cédula de identidad,me dice que esta registrado en la base de datos.', '2014-05-06 15:05:14'),
(4, 20261413, 'LEIDIANA ', 'LAYA', 'l.laya.venalcasa@gmail.com', '04269456767', 'planta chaguaramas', 3, 'que hice la compra pero no pude imprimir la planilla', '2014-05-07 00:55:29'),
(5, 10556130, 'JOSE', 'LAVADO', 'jg.lavado.venalcasa@gmail.com', '04169339361', 'VICEPRESIDENCIA INDUSTRIA', 3, 'PEDI RECUPERACION DE CLAVE EN VARIAS OPORTUNIDADES Y CON NINGUNA DE LAS ENVIADAS AUTOMATICAMENTE HE PODIDO ACCEDER A LA PAGINA PARA REALIZAR COMPRA DE MERCADO', '2014-05-07 03:29:29'),
(6, 4389315, 'Arlee Eduardo', 'Aponte Blanco', 'm.cancine.venalcasa@gmail.com', '0426-8479202', 'francisco de miranda', 3, 'no pued ingresar a el correo antes inscrito por no tener clave de su correo es por esto que no puede recuperar clave usuario para la compra mercado virtual', '2014-05-07 13:23:33'),
(7, 12194638, 'LUISA', 'TRIAS', 'L.TRIA.VENALCASA@GMAIL.COM', '04166077693', 'PRESIDENCIA ', 3, 'SE ME OLVIDO LA CLAVE ', '2014-05-07 18:44:19'),
(8, 17429291, 'Alejandro', 'Olivar', 'a.olivar.venalcasa@gmail.com', '04265178402', 'Consultoria Juridica', 3, 'Por favor agregarme en el sistema no puedo acceder al mismo.', '2014-05-08 01:02:47'),
(9, 15928620, 'olinto segundo', 'gonzalez flores', 'o.gonzalez.venalcasa@gmail.com', '04243141206', 'abasto valle de la pascua', 3, 'saludos el problema es que no tengo mi contraseña para ingresar ya que hize una solicitud para recuperar la misma y no llego a mi correo sino al de otro compañero de trabajo y no he podido comunicarme con el. sin mas a que hacer referencia me despido esperando su colaboracion ', '2014-05-08 01:45:21'),
(10, 13154627, 'YAMAI', 'RIVERO', 'yamairivero@hotmail.com', '04269833057', 'planta chaguaramas', 3, 'la trabajadora al ingresar sale el mensaje que no esta registrada en la base de datos', '2014-05-09 21:47:54'),
(11, 10556130, 'JOSE', 'LAVADO', 'jg.lavado.venalcasa@gmail.com', '04169339361', 'VICE PRESIDENCIA INDUSTRIA', 3, 'IMPOSIBLE ACCEDER A INTRA VENALCASA. SOLICITE NUEVA CLAVE Y NO ME PUEDO CONECTAR', '2014-05-13 17:02:37'),
(12, 19638155, 'DEIVID ', 'OLASREGUI', 'alexjoselaya14@gmail.com', '04243378077', 'altagracia de orituco estado guarico ', 3, 'necesito la contraseña y el usuario para acceder al mercado virtual. aqui les dejo un correo para que me la envíen:ALEXJOSELAYA14@GMAIL.COM ', '2014-05-16 15:57:50'),
(13, 18452692, 'Xavier ', 'Figueredo', 'xavieralvaro900@mail.com', '04261948096', 'Puerto Ordaz', 3, 'Buenas Tardes,\r\n\r\nExiste una cuenta de correo electrónico a la cual se pueda enviar un resumen curricular, por si llegase a existir en algún momento alguna oportunidad laboral, muchas gracias.\r\nSaludos.', '2014-05-18 01:50:42'),
(14, 19052431, 'ARQUIMEDES ', 'RAMOS', 'a.ramos.venalcasa@gmail.com', '04245155972', 'VICEPRESIDENCIA DE INDUSTRIAS (GERENCIA TECNICA OCCIDENTE)', 3, 'BUENOS DIAS, ES PARA SOLICITAR INFORMACION REFERENTE A, SI NUESTRA EMPRESA CANCELA ALGUNA PRIMA POR PROFESIONALIZACION, YA QUE NO SE VE REFLEJADA EN MIS RECIBOS, SOY ING. MECANICO, DE SER ASI, QUE RESQUISITOS SON NECESARIOS PARA OPTAR POR LA MISMA... SALUDOS, GRACIAS', '2014-05-23 11:48:20'),
(15, 18683244, 'GLORYMAR ESTHER', 'RODRIGUEZ ', 'gl.rodriguez.venalcasa@gmail.com', '04163152849', 'GERENCIA DE TRANSPORTE REGION CENTRO OCCIDENTE ', 3, 'SOLICITO LA MODIFICACION DE MI NOMBRE , PUESTO QUE HUBO UN ERROR DE TRNSCRIPCION AL MOMENTO DE REGISTRO EL NOMBRE CORRECTO ES GLORYMAR Y ESTA ESCRITO CON I LATINA , PARA EFECTOS DE SOLICITUD DE LA CONSTANCIA DE TRABAJO AFECTA LOS DATOS DE IDENTIFICACION ', '2014-05-23 19:32:57'),
(16, 14614658, 'ARQUIMEDES ', 'MUJICA', 'A.MUJICA.VENALCASA@GMAIL.COM', '04245011120', 'TINAQUILLO COJEDES', 3, 'NO REGISTRA LA CASA PARA PODER ELABORAR MI COMPRA PARA EL MERCADO VIRTUAL...', '2014-06-03 01:13:32'),
(17, 18909853, 'angi', 'aquino', 'j.acosta.venalcasa@gmail.com', '04165114729', 'planta chaguaramas', 3, 'buenos dias la trabajadora al ingresar su numero de cedula de inentidad, sale una notificacion que dice que la trabajadora no aparece registrada en el sistema, y esto ya es por tercera vez.', '2014-06-03 13:55:31'),
(18, 18895960, 'XIOMAIRI', 'AULAR', 'j.acosta.venalcasa@gmail.com', '04165114729', 'PLANTA CHAGUARAMAS', 3, 'NO APARECE EN SISTEMA', '2014-06-03 14:03:43'),
(19, 14043730, 'SILVIA JOSEFINA', 'MARTINEZ ROMERO', 's.martinez.venalcasa@gmail.com', '04167875105', 'san francisco', 3, 'recuperar clave', '2014-06-03 14:05:48'),
(20, 10729043, 'Alexis Jose', 'Betancourt', 'aj.betancourt.venalcasa@gmail.com', '04268262177', 'planta la veguita', 3, 'no puedo ingresar al sistema m e informa que no me encuentro registrado y al solicitar nuevamente registrarme me indica que ya existo, debido a problemas con correo electrónico solicito, ingresar este correo aj.betancourt.venalcasa@gmail.com para poder recuperar mi clave y poder realizar mi procedimiento normal', '2014-06-03 17:56:04'),
(21, 10977764, 'regulo antonio', 'cedeno', 'r.cedeno.venalcasa@gmail.com', '04142955272', 'planta procesadora de maiz chaguaramas', 3, 'entre en el sistema de mercado con mi clave realice la compra luego realice cambio de clave luego quise de nuevo entrar al sistema y ahora no puedo me dice clave invalidad  ', '2014-06-04 01:36:47'),
(22, 18839250, 'Gabriela Del Carmen', 'Tarache González', 'gaby_tarache@hotmail.com', '04121565573', 'BARINAS', 3, 'NO TENGO ACCESO A EL MERCADO VIRTUAL  MENCIONA CLAVE INVALIDA Y TRATO DE RECUPERAR Y NO ME ENVIA LA INFORMACIÓN AL CORREO. NO H PODIDO REALIZAR MI COMPRA. Y ESTOY SEGURA QUE E MI CLAVE LA CORRECTA.', '2014-06-04 13:08:39'),
(23, 14414418, 'eneida ', 'brizuela', 'e.brizuela.venalcasa@gmail.com', '04267433493', 'zamora vive', 3, 'Rincorporacion por rechazo del sistema para la compra del mercado virtual', '2014-06-04 19:16:40'),
(24, 19069464, 'ROSA', 'VIDAL', 'pr.vidal.venalcasa@gmail.com', '04169742961', 'abasto barinas ', 3, 'no puedo realizar mi compra , e realizado la opcion recuperacion de contraseña dos veces y la pagina me reporta usuario invalido, intento registreme y no puedo ', '2014-06-04 21:13:11'),
(25, 9580996, 'EUDON ', 'ISEA', 'fd.garcia.venalcasa@gmail.com', '04167776498', 'barinas', 3, 'presento diifculta para realizar mi compra la pagina me arroja usuario y contraseña incorrecta intento registrarme y la pagina me niega la posibilidad porfavor agradesco borrar registro para realizar compra .', '2014-06-04 22:07:03'),
(26, 8809663, 'LIZ MARIZOL ', 'TORREALBA', 'j.acosta.venalcasa@gmail.com', '04165114729', 'PLANTA CHAGUARAMAS', 3, 'LA TRABAJADORA NO ESTA REGISTRADA EN LA BASE DE DATOS', '2014-06-05 12:26:25'),
(27, 20042115, 'eduardo', 'villalonga', 'e.villalonga.venalcasa@gmail.com', '04169722812', 'planta batalla de taguanes', 3, '', '2014-06-05 14:45:01'),
(28, 17004242, 'elio', 'rodriguez', 'eliovenalcasa17@gmail.com', '04161197635', 'planta de harina la veguita,carretera nacional km7 al lado de los silos casa edo barinas', 3, 'solicitud el cambio de correo electrónico ya que e tenido problema para ingresar para la compra el mercado virtual y tengo que hacerlo manual para que me envíen la contraseña al nuevo correo eliovenalcasa17@gmail.com solicito la contraseña', '2014-06-05 20:55:06'),
(29, 18069965, 'eduard enrique', 'guerra arana', 'eduardguerra_venalcasa@hotmail.com', '04124066538', 'tinaquillo', 3, 'se me olvido la clave para acceder pido nueva clave y a mi correo no me llega', '2014-06-05 22:19:48'),
(30, 21302679, 'Luis ', 'Rodriguez', 'eltaltaro206@hotmail.com', '04128511168', 'Occidente', 3, 'Analista de Proyecto Región Occidente me Postule a Este Cargo, a ver si mi Sintesis Curricular Puede Ser Tomada en  Cuenta.', '2014-06-11 15:40:53'),
(31, 16400977, 'jose mauricio', 'palencia silva', 'jose1225silva@hotmail.com', '04124140728', 'valencia', 3, 'buena noche como aria para conpra leche en polvo tengo un pequeño negocio fabrico yogur y no encuentro leche para poder trabajar gracia me gustaria q me brinde su colaborasion', '2014-06-17 00:51:36'),
(32, 16400977, 'jose mauricio', 'palencia silva', 'jose1225silva@hotmail.com', '04124140728', 'valencia', 3, 'buena noche como aria para conpra leche en polvo tengo un pequeño negocio fabrico yogur y no encuentro leche para poder trabajar gracia me gustaria q me brinde su colaborasion', '2014-06-17 00:53:11'),
(33, 16400977, 'jose mauricio', 'palencia silva', 'jose1225silva@hotmail.com', '04124140728', 'valencia', 3, 'buena noche como aria para conpra leche en polvo tengo un pequeño negocio fabrico yogur y no encuentro leche para poder trabajar gracia me gustaria q me brinde su colaborasion', '2014-06-17 00:53:20'),
(34, 16647136, 'NAYDELIS', 'CARRILLO', 'N.CARRILLO.VENALCASA@GMAIL.COM', '04245206858', 'planta la veguita', 3, 'BUENAS TARDE MI NOMBRE ES NAYDELIS CARRILLO ANALISTA DE RECURSOS HUMANO DE PLANTA LA VEGUITA, POR SOLICITUD DE TODOS LOS TRABAJADORES DE LA PLANTA SOLICITAMOS  LA ACTUALIZACIÓN DE LOS SUELDO Y SALARIO EN LAS CONSTANCIA DE TRABAJO YA QUE ME HAN NOTIFICADO QUE HAN SOLICITADO LAS CONSTANCIA Y TIENE LOS SALARIOS DES ACTUALIZADO, SOLICITAMOS LA MAYOR COLABORACIÓN GRACIAS ', '2014-06-19 18:26:08'),
(35, 14043730, 'silvia josefina', 'martinez romero', 's.martinez.venalcasa@gmail.com', '04167875105', 'san francisco', 3, 'al introducir mi clave me dice: los datos introducidos no exiten en nuestra base de datos comuniquese con su jefe inmediato, ', '2014-07-03 14:19:23'),
(36, 18159747, 'ronald alexander', 'calvajal fernandez', 's.martinez.venalcasa@gmail.com', '04263986978', 'san francisco', 3, 'introdusco los datos y en lo que seleciono para hacer mis compras me dice que ya yo peseo una compra y luego le doy a mis compra y me dice que no hay registro', '2014-07-03 14:27:07'),
(37, 20225566, 'richard andrey', 'rodriguez rodriguez', 'richardrodriguez_03@hotmail.com', '04266917457', 'planta procesadora de harina de maiz leander ', 3, 'el sistema no arroja para recuperar mi clave. no envía nueva clave a correo electrónico registrado ', '2014-07-03 15:03:02'),
(38, 15290307, 'JHOAN', 'REYES', 'J.REYESVENALCASA@GMAIL.COM', '04122632011', 'CATIA', 3, 'Buenas tardes,\r\n\r\nel presente es para notificar, que no puede acseder al usuario del intarnet venalcasa, me dirijo al link de recupera clave y tambien me rechaza diciendo que no existe.\r\n saludos.', '2014-07-03 19:26:53'),
(39, 20042115, 'EDUARDO', 'VILLALONGA', 'e.villalonga.venalcasa@gmail.com', '04169722812', 'planta batalla de taguanes', 3, 'no me quiere abrir el sistema, tengo problemas para hacer mi compras en el mercado virtual', '2014-07-03 21:06:17'),
(40, 15910368, 'MARLYN', 'GERDEL', 'M.GERDEL.VENALCASA@GMAIL.COM', '04169376802', 'CATIA, INVENTARIO INSUMO, INVENTARIO', 3, 'NO APARESCO EN EL SISTEMA ', '2014-07-03 22:00:34'),
(41, 12640483, 'yasmin', 'mendez', 'y.mendez.venalcasa@gmail.com', '04167296790', 'sede gerencia de contabilidad ', 3, 'Buenos dias me sale un mensaje usuario incorrecto y clave invalida. por favor verificar ', '2014-07-04 13:47:03'),
(42, 17548047, 'LUIS', 'BELLO', 'luisalfreba.venalcasa@gmail.com', '04249456403', 'caicara', 3, 'no me habré el acceso de la pagina  del mercado  ', '2014-07-04 17:01:04'),
(43, 15904968, 'yennyfer ', 'astudillo', 'yennyfer1981@gmail.com', '04167997284', 'maturín estado monagas', 3, 'Deseo saber cual es la direccion de correo para enviar mi resumen curricular soy Abogada con experiencia en Control Fiscal (Auditoria/Control Interno) y Contrataciones públicas', '2014-07-04 17:10:27'),
(44, 15904968, 'yennyfer', 'astudillo', 'yennyfer1981@gmail.com', '0167997284', 'Maturín estado Monagas ', 3, 'RESUMEN CURRICULAR\r\n	DATOS PERSONALES	\r\n\r\nApellidos: ASTUDILLO NÚÑEZ \r\nNombres:  YENNYFER DAIRILIS\r\nNacionalidad: Venezolana\r\nEdad:  33 años\r\nC.I.: V- 15.904.968\r\nDirección: Urb. Bella Vista, Calle A, Manzana 12,  Casa Nº 6, Maturín- Edo. Monagas.	L. N: Maturín, Edo. Monagas.\r\nTeléfono:(0416)799.72.84  0291.9898500\r\nEstado Civil: Soltera\r\nE-mail: yennyfer1981@gmail.com\r\n10 años de experiencia. \r\nDcho. Administrativo, Mercantil, Laboral.  	 \r\n\r\nESTUDIOS  REALIZADOS\r\nPOST-GRADO	Universidad Santa María 	Especialización Derecho Tributario, 2do semestre\r\nUNIVERSITARIO	Universidad Gran Mariscal de Ayacucho “U.G.M.A” 2004	Abogada\r\nDIVERSIFICADO	U.E.P. Cecilio Acosta 1.999	Bachiller en Humanidades\r\nCURSOS REALIZADOS\r\nTítulo	Empresa o Instituto\r\nSeguridad Higiene y Ambiente (SHA).	Centros Educativos de Capacitación Laboral (CECAL). (Duración 400 Horas -Septiembre2011- Febrero2012).\r\nTaller de Primeros Auxilios.	Protección Civil y Administración de Desastres del Estado Monagas. (Duración 12 Horas-2011).\r\nEl Informe Definitivo… y después qué	ASOCOMEM (Duración 08 Horas-2010).\r\nTaller  de Control Fiscal Municipal	Contraloría Municipal del Municipio Acosta y Contraloría Municipal del Municipio Piar del Estado Monagas (Duración 03 Horas-2010)\r\nPrestaciones Sociales	DEMEPRO. (Duración 08 Horas-2010).\r\nContrataciones Públicas para los Consejos Comunales	Servicio Nacional de Contrataciones (SNC). (Duración 08 Horas -2010).\r\nEl Procedimiento Administrativo para la Determinación de Responsabilidades	FUNDICEM. (Duración 16 Horas-2008). \r\nEl Ejercicio de la Potestad Investigativa por parte de los Órganos de Control Fiscal	FUNDICEM. (Duración 16 Horas-2008).\r\nRedacción de Informes Técnicos y Hallazgos de Auditorías de Contratos de Obras, Servicios y Adquisición de Bienes.	FUNDICEM. (Duración 16 Horas-2008).\r\nInforme de Auditoría y los Papeles de Trabajo	FUNDICEM. (Duración 16 Horas-2008).\r\nAdministración Laboral	CEPIM. (Duración 18 Horas -2005).\r\nII Jornadas de Derecho Procesal Civil, Jurisprudencia, Normas y Procedimiento.	CEAJURIS. (Duración 16 Horas -2004).\r\nEducación, Derecho y Sociedad	Universidad Pedagógica Experimental Libertador- Extensión San Antonio (Duración 16 Horas-2003) \r\nCongreso Internacional de Derecho Agrario	Fundación de la Procuraduría General de la República Bolivariana de Venezuela. (Duración 24 horas del 06 al 08 de Diciembre del 2001)\r\nForo Libertad Personal a la Luz de la Constitución de 1.999	Universidad Gran Mariscal de Ayacucho Escuela de Derecho del Núcleo Maturín. (Duración 08 Horas -2001)\r\nI Taller Sobre la Ley Orgánica para la Protección del Niño y del Adolescente	Universidad Gran Mariscal de Ayacucho Escuela de Derecho del Núcleo Maturín. (Duración 08 Horas-2000).\r\nRECONOCIMIENTOS\r\n“III Jornada de Reto al Conocimiento de Contralorías Municipales”  2.010- Contraloría del Estado Monagas.\r\nCERTIFICACIÓN\r\nPDVSA: Certificación de Competencia PDVSA: Nº SIHAO-0004904, Área: La Seguridad, La Higiene y el Ambiente en la Industria Modulo C, Supervisorio.- 2012.\r\nEXPERIENCIA LABORAL\r\nEmpresa	Cargo	Fecha\r\nLibre Ejercicio de la Profesión 	Abogado Litigante 	(01/10/2012 – hasta la presente fecha)\r\nWILLIAM´S CONSULTORES, C.A,	Auditor Especialista	(01/04/2012 - 30/09/2012,)\r\nPlanta de Inyección de Plástico El Furrial. Parroquia El Furrial, Municipio Maturín Edo. 	Pasante SHA	19/12/2011 - 06/02/2012.\r\nContraloría Municipal del Municipio Piar del Estado Monagas.	Directora de Determinación de Responsabilidades	04/01/2010 -10/03/2011\r\nContraloría Municipal del Municipio Piar del Estado Monagas.	Directora de Control Sobre Los Organismos del Poder Público Municipal Centralizados Descentralizados	19/04/2009 - 03/01/2010\r\nContraloría Municipal del Municipio Piar del Estado Monagas.	Auditor II adscrita la Dirección de Control de Organismos Centralizados, Descentralizados y Otro Poder	12/01/2009 - 20/04/2009\r\nContraloría Municipal del Municipio Piar del Estado Monagas.	Auditor I adscrita la Dirección de Control de Organismos Centralizados, Descentralizados y Otro Poder\r\n\r\n\r\n	\r\n16/05/2008 - 11/01/2009\r\n PROGRAMA VENEHMET ejecutado por el Ministerio del Poder Popular para el Ambiente	Abogada Asesor	10/09/2007 - 14/03/2008\r\nLibre Ejercicio	Abogado Litigante	01/02/ 2006 - 09/09/ 2007\r\nEscritorio Jurídico Contable Larez, Márquez,  Medina & Asoc	Pasante II	(Periodo Académico II-2003 - 4 meses).\r\nClínicas Jurídicas UGMA	Pasantía I 	(Periodo Académico, II-2002- 1 año.)\r\nHABILIDADES Y DESTREZAS \r\n•	Manejo y dominio de Paquetes Ofimáticos: Microsoft Office Word, Excel, Power Point.\r\n•	Sólidos Conocimientos en la Redacción de Informes Técnicos de Auditorías\r\n•	Conocimientos en Derecho público, Derecho Administrativo,  Laboral, Mercantil, Corporativo.\r\n•	Sólidos Conocimientos en la Ejecución de Auditorías de Obras, Presupuestarias, Gestión y de     Personal.\r\n•	Destreza en la Supervisión y Evaluación de Desempeño del Personal.\r\n', '2014-07-04 17:13:23'),
(45, 15383937, 'MARIA DOMITILA ', 'LEON ', 'm.leon.venalcasa@gimail.coom', '04160735197', 'planta la veguita', 3, 'solicito una restucturacion de mis datos personales ya que mi registro aparece mi cédula con otro nombre y así no puedo comprar mi mercado mis datos reales son mi es maría domitila león mi cédula es 15383937 plata veguita ', '2014-07-04 20:46:43'),
(46, 13482895, 'YADELIS', ',IRABAL', 'D.LAYA.VENALCASA@GMAIL.COM', '04141466453', 'FRANCISCO DE MIRANDA', 3, 'CLAVE OLVIDADA SE NECESITA RESETEAR PARA PROCEDER A REGISTRARME NUEVAMENTE', '2014-07-05 13:17:59'),
(47, 18405610, 'MARIA ALEJANDRA ', 'CANCINE', 'M.CANCINE.VENALCASA@GMAIL.COM', '04165135466', 'FRANCISCO DE MIRANDA', 3, 'CLAVE OLVIDADA SE NECESITA RESETEAR PARA REGISTRARME NUEVAMENTE', '2014-07-05 13:20:15'),
(48, 19983533, 'simon ', 'maitan', 'Simonmaitan.2@gmail.com', '04128928010', 'ayudante general planta Aragua de Barcelona', 3, 'No se puede realizar orden de compra mercado corporativo', '2014-07-06 15:30:08'),
(49, 20369503, 'OVIDIO', 'MAYORGA', 'm.quintana.venalcasa@gmail.com', '04167776498', 'BARINAS', 3, 'problemas para registrarme\r\n', '2014-07-07 02:21:10'),
(50, 7941779, 'maria juana ', 'garcia', 'mj.garcia.venalcasa@gmail.com', '04161398901', 'planta la veguita', 3, 'no puedo ingresar al sistema ya que olvide mi clave y el correo electrónico utilizado no es el adecuado por lo tanto solicitamos que me envíen mi recuparacion de clave al correo mj.garcia.venalcasa@gmail.com', '2014-07-07 19:20:02'),
(51, 8627802, 'maría cristina ', 'rodríguez bernal', 'ma.rodriguez.venalcasa@gmail.com', '04266426949', 'generalisimo francisco de miranda calabozo edo guarico', 3, '', '2014-07-08 13:53:31'),
(52, 9369108, 'franklin ', 'altuve', 'frankinalt@hotmail.com', '04164711787', 'gerencia.', 3, 'a modo de denuncia porque no hay de otra. les explico en santa barbara de barinas se vende la bolsa de un kilo de esa leche en 230. como es posible que esto este sucediendo y quien le suministra ese producto a las bodegas de esta ciudad', '2014-07-14 20:35:55'),
(53, 20092687, 'wladimir jose', 'españa arguello', 'w.e.venalcasa@gmail.com', '04263336786', 'planta procesadora de harina de maiz precocida achaguas estado apure', 3, '', '2014-07-20 23:21:53'),
(54, 10382701, 'FRANKLIN', 'CARRILLO', 'K.CLARO.VENALCASA@GMAIL.COM', '04242659993', 'PRINCIPAL', 3, 'NO RECONOCE EL USUARIO', '2014-08-05 14:24:26'),
(55, 18040102, 'BLAS', 'MARTOS', 'ABLAS.MARTOS@GMAIL.COM', '04242659993', 'PRINCIPAL', 3, 'NO RECONOCE EL USUARIO', '2014-08-05 14:26:30'),
(56, 7941779, 'MARIA JUANA', 'GARCIA', 'm.j.garcia.venalcasa@gmail.com', 'mj.garcia.venalcasa@gmail.com', 'planta veguita', 3, 'mi nombre es maria juana garcia c.i 7941779 solicito ante este medio la limpieza de mi usuario venalcasa ya que cuando me registre por primera vez coloque un correo de otra persona y habia perdido la clave del usuario y la solicite nuevamente y no pude actualizar la clave ya que llego a ese correo y se me hizo difícil el procedimiento y solicito que me actualicen mis datos y que me llegue la información solicitada al correo actual mj.garcia.venalcasa@gmail.com', '2014-08-05 17:23:06'),
(57, 6290245, 'iraima ', 'garcia', 'ir.garcia.venalcasa@gmail.com', '0416-6321485', 'sede principal/direccion de administracion', 3, 'no puedo acceder a la pagina del mercado con mi clave', '2014-08-06 19:21:01'),
(58, 19405768, 'JOSE  GREGORIO', 'MELECIO  BLANCO', 'J.MELECIO.VENALCASA@GMAIL.COM', '04160731188', 'ACHAGUAS', 3, 'NO PUEDO ENTRAR AL SISTEMA', '2014-08-08 00:00:35'),
(59, 14476405, 'heriberto', 'girott', 'heribertojoseg2012@gmail.com', '04163834843', 'anzoategui cereales la cruz', 3, 'no puedo entrar en el portal de mi compra venalcasa.me registre hace unos dias hice mi precompra y me la pasaron inclusive por correo. ahora esta la misma pecompra pero en blanco y con mi clave y mi usuario no puedo entrar, intento volver a registrarme y dice que esta registrado ya.. necesito que sea anulado mi regitro para volver a acceder con el mismo correo con el q solicito el mercado virtual¿ \r\n', '2014-08-14 14:17:48'),
(60, 16567504, 'hector', 'colmenares', 'hector_colmenares32@hotmail.com', '04262902874', 'venarroz', 3, '', '2014-08-15 12:35:51'),
(61, 15539041, 'Bibiana ', 'Sierra', 'b.sierra.venalcasa@gmail.com', '04265527388', 'Bravo Cacique Yaracuy', 3, 'Tengo problemas con la clave y el correo, pues hubo un error de transcripción', '2014-08-20 14:13:30'),
(62, 17881494, 'Maria', 'Valera.', 'm.valera.venalcasa@.com', '04265511430', 'Guanare', 3, 'Tengo bloqueado el usuario para acceder a comprar los productos en la pagina web de miscompras.venalcasa', '2014-08-20 17:41:37'),
(63, 17048825, 'jose', 'hidalgo', 'hidalgojose2021@gmail.com', '04269187326', 'pronutricos', 3, 'buenas tardes camaradas reciban un cordial y caluroso saludo revolucionario y socialista la presente es por que me registre en compras venalcasa pero no pude activar mi cuenta por que no me llego el enlace a mi correo al  parecer escribi mal mi correo o no se cual fue mi error sera que existe la posibilidad de que me anulen el registro y volverlo a reiniciar para poderme registrar y suministrar nuevamente mis datos y el correo para poder activar mi cuenta y adquirir los productos que estan ofreciendo. espero una pronto respuesta, use este medio por que no aparece un contacto para el mismo gracias ', '2014-08-22 19:32:14'),
(64, 20118777, 'francisco', 'trocel', 'jtrocel@gmail.com', '04263049128', 'tinaquillo edo cojedes', 3, '', '2014-08-25 23:41:45'),
(65, 15191573, 'DOLORES MERCEDES', 'CASTILLO DE MENDEZ', 'DOLORES.VENALCASA@GMAIL.COM', '04268876296', 'URB. JOSE TADEO MONAGAS AV F CASA 203', 3, 'NO PUEDE ENTRAR AL SISTEMA Y EL CORREO QUE LE COLOCARON ES INCORRECTO ', '2014-08-26 18:12:49'),
(66, 17362992, 'cristian', 'venegas', 'crisvene1984@gmail.com', '04160873176', 'araure estado portuguesa', 3, 'buenos dias lo q pasa es q ayer me registre y se me olvido la clave pero puse el gmail mal y no ayo como entrar para aser la compra', '2014-08-27 13:01:42'),
(67, 17362992, 'cristian', 'venegas', 'crisvene1984@gmail.com', '04160873176', 'araure estado portuguesa', 3, 'buenos dias lo q pasa es q ayer me registre y se me olvido la clave pero puse el gmail mal y no ayo como entrar para aser la compra', '2014-08-27 13:02:39'),
(68, 17362992, 'cristianv', 'venegas', 'crisvene1984@gmail.com', '04160873176', 'araure estado ortuguesa', 3, 'buenos dias es q yo me registre ayer y se me olvido la clave y el correo lo  puse mal y no ayo como entrar para comprar yo soy de la empresa de pronutricos y tenemos chanse hasta oi para aser la compra como ago \r\n', '2014-08-27 13:22:29'),
(69, 17169545, 'CRISTIAM', 'MONSALVE', 'ELANGELCRISTY@GMAIL.COM', '04266039799', 'SOCOPO', 3, 'CAMBIO DE CORREO PARA PODER CAMBIAR LA CLAVE DE ACCESO AL MERCADO VIRTUAL ', '2014-09-01 17:44:52'),
(70, 18909853, 'ANGI YASNEIDYS ', 'AQUINO BLANCO', 'J.ACOSTA.VENALCASA@GMAIL.COM', '04165114729', 'PLANTA CHAGUARAMAS', 3, 'LA TRABAJADORA NO APARECE REGISTRADO EN LA DATA O SISTEMA.', '2014-09-02 12:17:44'),
(71, 18909853, 'ANGI ', 'AQUINO', 'J.ACOSTA.VENALÑCASA@GMAIL.COM', '04265144088', 'PLANTA CHAGUARAMAS', 3, 'LA TRABAJADORA NO APARECE NO APARECE REGISTRADA EN LA BASE DE DATOS DE VENALCASA', '2014-09-03 18:26:29'),
(72, 18909853, 'ANGI ', 'AQUINO', 'J.ACOSTA.VENALCASA@GMAIL.COM', '04265144088', 'PLANTA CHAGUARAMAS', 3, 'LA TRABAJADORA NO APARECE NO APARECE REGISTRADA EN LA BASE DE DATOS DE VENALCASA', '2014-09-03 18:26:32'),
(73, 18909853, 'ANGI ', 'AQUINO', 'J.ACOSTA.VENALCASA@GMAIL.COM', '04265144088', 'PLANTA CHAGUARAMAS', 3, 'LA TRABAJADORA NO APARECE NO APARECE REGISTRADA EN LA BASE DE DATOS DE VENALCASA', '2014-09-03 18:26:41'),
(74, 16742516, 'Ernesto ', 'Mendez Vivas', 'vivasx30@gmail.com', '04269010015', 'Planta de Pasta Turen Edo Portuguesa', 3, 'buenas tardes tengo problemas al hacer la compra del mercado corporativo ingreso mi clave y aparece el portal en blanco no me da opciones de nada', '2014-09-03 21:47:07'),
(75, 22333197, 'kelly yoheli', 'reinoso medina', 'c.gil.venalcasa@gmail.com', '04245643468', 'planta hugo hachez', 3, 'la señorita reinoso ya tiene pasado el mes con nostros y no la puedo registrar', '2014-09-04 13:19:55'),
(76, 21047463, 'marlyn ', 'crespo', 'marlync.venalcasa@gmail.com', '04125245098', 'BRAVO CACIQUE YARACUY URACHICHE', 3, 'HOLA COMO PODRIA ACCEDER A LA PAGINA SI NO ACEPTA NI MI USUARIO Y CONTRASEÑA ', '2014-09-04 15:15:56'),
(77, 12012054, 'Maria', 'Gudiño', 'La.Mariposita021272@hotmail.com', '04121531910', 'Planta Procesadora de harina de maiz Guanare', 3, '   Buenas tardes necesito un recibo de pago del mes de julio y anexo la cllave la cual es 1234 y me dice el sistema que la clave es invalida y nose porque, xque mi clave es esa 1234.', '2014-09-04 21:02:30'),
(78, 12671043, 'LISSETH', 'FARFAN', 'E.OLIVEROS.VENALCASA@GMAIL.COM', '04267155146', 'AREPERA', 3, 'NO ME  DA  ACSESO A  LA PAGINAQ DEL MERCADO', '2014-09-05 02:04:14'),
(79, 5528363, 'Luis', 'Cruz', 'cruzluis352@gmail.com', '0414-3131270', 'Auditoria Interna', 3, 'Solicito mi constancia de trabajo pero no aparezco en sistema por haber salido despues de la implementacion de Intravenalcasa.', '2014-09-09 19:49:34'),
(80, 5528363, 'Luis', 'Cruz', 'L.cruz.venalcasa@gmail.com', '04143131270', 'Auditoria', 3, 'Buenas tardes, la presente es para solicitar me sea incluido en el sistema para poder solicitar constancia de culminación por los servicios prestados.', '2014-09-09 20:12:11'),
(81, 21047463, 'marlyn ', 'crespo', 'marlync.venalcasa@gmail.com', '04125245098', 'BRAVO CACIQUE YARACUY URACHICHE', 3, 'HOLA ME INFORMARON QUE ME RECATEARON LA CLAVE Y CONTRASEÑA PERO LA INTENTO METER Y NO ME ACCEDE PARA ENTRAR ', '2014-09-10 19:29:11'),
(82, 6319323, 'Iris v ', 'Rivas o', 'irisrivas3006@hotmail.com', '04241284768', 'finanza ', 3, '\r\n  no aparece mis datos para hacer el mercado estoy en sede venalcasa pero soy de grupo pro ', '2014-09-29 20:36:50'),
(83, 12374805, 'maryury', 'escalona', 'maryuri_2012_4@hotmail.com', '04242517118', 'gato negro', 3, 'no me puedo meter a la pagina del mercado', '2014-09-29 21:14:07'),
(84, 16505202, 'CESAR ENRIQUE', 'SEIJAS', 'cesarseijas.venalcasa@gmail.com', '04128312577', 'Francisco de Miranda, Calabozo, Guarico', 3, 'Ya estoy regristrado en el mercado corporativo y me dice que el usuario y contraseña es invalido y no me da la opcion de recuperar contraseña, por favor ayudenme a resolver mi problema, gracias...', '2014-09-30 13:53:32'),
(85, 9387083, 'orlando ', 'granados platas', 'niko19crespojose@hotmail.com', '04145363031', 'barinas municipio barinas', 3, 'extravie la clave para hacer la solicitud del mercado virtual .y el correo electronico la clave tambien por agradesco su ayuda', '2014-09-30 23:19:58'),
(86, 14325273, 'Nelson Jesus', 'Sanchez Molina', 'ne.sanchez.venalcasa@gmail.com', '04167738189', 'planta leander socopo region occidente', 3, 'problemas con mi clave para acceder al sistema mercado corporativo', '2014-10-01 01:57:29'),
(87, 13590253, 'MAYERLYNG', 'FUENTES', 'M.FUENTES.VENALCASA@GMAIL.COM', '04168908467', 'CAICARA', 3, 'CAMBIO DE CORREO POR PROBLEMA DE ENVIO DE CLAVE DEL MERCADO VIRTUAL', '2014-10-01 20:15:43'),
(88, 18928620, 'JEIDERSON', 'MARQUEZ', 'N.GALICIA.VENALCASA@GMAIL.COM', '04167535801', 'PLANTA HARINA LA COLONIA', 3, 'USUARIO INVALIDO O CONTRASEÑA INCORRECTA POR FAVOR REINICIAR PARA REGISTRARME NUEVAMENTE', '2014-10-02 02:30:33'),
(89, 9387804, 'FRANK', 'BAENA', 'frank.baena.venalcasa@gmail.com', '04263292031', 'PLANTA BARINAS', 3, 'problemas con la contraseña', '2014-10-03 00:44:52'),
(90, 9387083, 'ORLANDO ', 'PLATA', 'ministyaja@hotmail.com', '04145363031', 'PLANTA BARINAS', 3, 'OLVIDE CONTRASEÑA', '2014-10-03 00:53:00'),
(91, 9387083, 'ORLANDO ', 'PLATA', 'granado.plata.venalcasa@gmail.com', '04145363031', 'PLANTA BARINAS', 3, 'OLVIDE CONTRASEÑA', '2014-10-03 01:12:28'),
(92, 7919407, 'MARILIN MERCEDES', 'ACOSTA BRANT', 'MARILIN0811@HOTMAIL.COM', '04125197738', 'BRAVO CACIQUE YARACUY URACHICHE', 3, 'TENGO LA CONTRASEÑA BLOQUEADA Y NO PUEDO ACCEDER A MI CUENTA DE MI COMPRAVENALCASA POR FAVOR NECESITO QUE ME SOLUCIONEN POR FAVOR', '2014-10-15 20:10:27'),
(93, 15400937, 'yulimar', 'paraza ', 'y.peraza.venalcasa@gmail.com', '04169582560', 'Guanare/Inspectoria Región Occidente', 3, 'Ante todo reciban un cordial saludo Revolucionario, la presente es para solicitarles rectifiquen el sueldo que percibo; ya que, en la actualidad tengo una Prima de Responsabilidad (por el cargo de Inspectora Administrativo Occidente) la cual no esta reflejada en la Constancia de Trabajo.\r\nSin mas a que hacer referencia, esperando una repuesta satisfactoria se despide.\r\n\r\nAtentamente;\r\n\r\nYulimar Peraza Sánchez. ', '2014-10-15 21:49:21'),
(94, 14325273, 'Nelson Jesus', 'Sanchez Molina', 'ne.sanchez.venalcasa@gmail.com', '04167738189', 'planta leander socopo region occidente', 3, 'olvide mi clave ', '2014-10-20 16:46:43'),
(95, 14325273, 'Nelson Jesus', 'Sanchez Molina', 'ne.sanchez.venalcasa@gmail.com', '04167738189', 'planta leander socopo region occidente', 3, 'olvide mi clave ', '2014-10-20 16:46:55'),
(96, 20270136, 'pedro pablo', 'perez hernandez', 'ppphernandez9@gmail.com', '04267766610', 'san carlos estado cojedes planta zamora vive', 3, 'el dia 7 de octubre yo me retire de la empresa pero lo cual aun no me han pagado mi liquidacion tengo una bebe recien nacida y necesito el dinero tambien yo dias atras pase un correo para que las cuotas restantes del aire que deje me fuese descontado de mi liquidacion  espero una pronta y satisfactoria respuesta de parte de ustedes ', '2014-10-24 16:26:48'),
(97, 13590253, 'mayerling veronica', 'fuentes hilarraza', 'm.fuentes.venalcasa@gmail.com', '04168908467', 'planta caicara monagas', 3, 'buenas noches no puedo realizar la compra del mercado virtual ya la contraseña se me olvido y en correo del mercado me lo abrió la persona de recurso humano de planta quisiera cambiar de correo y colocar otro ya que hora en esta solicitud del mercado no las van a recibir manual como hago para cambiar de correo necesito por favor la ayuda se lo agradesco  ', '2014-11-04 01:46:16'),
(98, 2424460, 'EDGAR', 'ESPINOZA', 'EDGARESPINOZA21@HOTMAIL.COM', '04167449790', 'TINAQUILLO EDO:COJEDES', 3, 'MI COREO SE ENCUENTRA CERRADO POR QUE LA CLAVE ESTA BLOQUEADA..', '2014-11-04 19:34:00'),
(99, 24244460, 'EDGAR', 'ESPINOZA', 'EDGARESPINOZA21@HOTMAIL.COM', '04167449790', 'TINAQUILLO EDO:COJEDES', 3, 'MI COREO SE ENCUENTRA CERRADO POR QUE LA CLAVE ESTA BLOQUEADA..', '2014-11-04 19:34:44'),
(100, 15400937, 'YULIMAR', 'PERAZA', 'Y.PERAZA.VENALCASA@GMAIL.COM', '04169582560', 'PLANTA PROCESADORA DE HARINA DE MAÍZ GUANARE', 3, 'Buenas tardes, ante todo reciban un cordial saludo la presente es para notificarles que mi prima de responsabilidad es de 15 U.T. y no 20 U.T. como se refleja en mi constancia de trabajo; es decir que no percibo los 9.067 Bs como sueldo mensual integral como lo indica en la actualidad mi constancia de trabajo, el correcto seria 7.411,00 Bs. de sueldo mensual integral.\r\n\r\nSin mas a que hacer referencia, esperando una respuesta satisfactoria, se despide de ustedes.\r\n\r\nAtentamente;\r\n\r\nYulimar Peraza\r\nC.I. 15.400.937\r\nInspector Administrativo Occidente', '2014-11-05 18:02:45'),
(101, 10782762, 'YACCELI', 'RODRIGUEZ', 'JO.MOLINA.VENALCASA@GMAIL.COM', '04164093436', 'AREPERA POMAGAS', 4, 'NO SALE EN LA BASE DE DATOS', '2014-11-05 20:39:54'),
(102, 14325273, 'Nelson Jesus', 'Sanchez Molina', 'ne.sanchez.venalcasa@gmail.com', '04167738189', 'planta leander socopo region occidente', 3, 'olvide mi clave ', '2014-11-13 02:18:10'),
(103, 16505202, 'CESAR ENRIQUE', 'SEIJAS', 'cesarseijas.venalcasa@gmail.com', '04128312577', 'FRANCISCO DE MIRANDA, CALABOZO, GUARICO', 3, 'NO PUEDO ENTRAR AL SISTEMA DE MERCADO CORPÒRATIVO, POR FAVOR RESETEARME LA CUENTA PARA INSCRIBIRME COMO NUEVO, GRACIAS...', '2014-11-15 21:26:34'),
(104, 16521356, 'Ivan', 'Marrufo', 'ivanmarruffo@gmail.com', '04169689734', 'Coro', 7, 'No puedo ingresar al sistema, la opcion de recuperar clave me indica que no estoy registrado. que puedo hacer?', '2014-11-20 19:28:17'),
(105, 11225663, 'CARMEN', 'SARABIA', 'cosarabia02@gmail.com', '04162040357', 'PANADERIA MINPPAL', 5, 'CLAVE NO PERMITE INGRESO AL SISTEMA PARA REALIZAR MERCADO CORPORATIVO', '2014-11-20 19:29:27'),
(106, 13528449, 'ELIUB', 'SOLORZANO', 'ELIUBR@HOTMAIL.COM', '04166106940', 'ADMINISTRACIÓN', 5, 'DESPUES DE REGISTRARME EN EL SISTEMA CUANDO QUISE INGRESAR PARA REALIZAR MI COMPRA ME INDICA QUE ES INVALIDO Y CUANDO TRATO DE RECUPERAR LA CONTRASEÑA ME INDICA QUE LO DATOS NO SON CORRECTO', '2014-11-20 19:33:27'),
(107, 13148962, 'nancy josefina', 'ramirez santo', 'ramirez_lomejor@hotmail.com', '04263105392', 'venalcasa', 5, '', '2014-11-21 00:12:56'),
(108, 20673268, 'juan carlos ', 'pinto hernandez', 'juanez_1990@hotmail.com', '04123753250', 'distribuidora andiavila gerencia de venta ubicacion petare', 8, 'buenas tarde ingrese al registro y me sale en la pantalla que no es valido mi usuario por favor ayudeme....', '2014-11-25 16:41:18'),
(109, 20673268, 'juan carlos ', 'pinto hernandez', 'juanez_1990@hotmail.com', '04123753250', 'distribuidora andiavila/ ventas/ petare', 8, 'me registre pero cuando voy a ingresar a la pagina me dice que los datos no son correctos, me gustaria saber como solucionar ese inconveniente.', '2014-11-25 16:51:03'),
(110, 11490032, 'MARIA', 'SANCHEZ', 'medilia59450@gmail.com', '04247704214', 'GERENCIA RECURSOS HUMANOS REGION CAPITAL', 8, 'Me registre exitosamente pero no me reconoce ni usuario ni clave y al tratar de recuperar contraseña me dice que los datos no se encuentran en la base de datos del sistema', '2014-11-25 18:39:40'),
(111, 17588230, 'derbyn', 'imbett', 'dershey_0403@hotmail.com', '04143195295', 'andicaracas', 8, 'problemas para ingresar', '2014-11-25 22:08:26'),
(112, 17588230, 'derbyn', 'imbett', 'dershey_0403@hotmail.com', '04143195295', 'andicaracas', 8, 'problema para ingresar', '2014-11-26 04:13:22'),
(113, 20673268, 'juan carlos ', 'pinto hernandez', 'juanez_1990@hotmail.com', '04123753250', 'andiavila/ventas/petare', 8, 'buenos dias el dia de ayer realize mi registro, pero cuando voy a ingresar me dice que usuario o clave invalido, pero al correo me llego una la cual es la que ingreso pero no la acepta, me gustaria como podria resolver este inconveniente.\r\n', '2014-11-26 13:54:37'),
(114, 18094828, 'Anderson', 'Gutierrez', 'awgutierrezm.1987@gmail.com', '04242430278', 'Planta Frutícola Araira', 8, 'Olvide mi clave de acceso y no puedo recuperarla. El sistema dice que mis datos no coinciden', '2014-11-26 16:57:21'),
(115, 18100603, 'Javier Ramon', 'Sarmiento Bastidas', 'j.Samiento.venalcasa@gmail.com', '04267299491', 'PLANTA PROCESADORA DE HARINA DE MAÍZ GUANARE', 3, 'Buenas Tarde Saludo Revolucionario e Institucional la presente es para notificarle mi presente conveniente con mi nombre completo el cual es Javier Ramón Sarmiento Bastidas, ya que en el sistema aparese erronio ( Javier Raman?) esperando una pronta respuesta satisfactoria se despide de ustedes Javier Sarmiento', '2014-11-28 18:29:32'),
(116, 19852485, 'katherine', 'nelsay', 'katzam1990@hotmail.com', '04141505652', 'sede central', 10, 'nombre clave o usuario no valido', '2014-12-03 13:35:09'),
(117, 14325273, 'nelson', 'sanchez molina', 'ne.sanchez.venalcasa@gmail.com', '0416-7738189', 'gerencia mantenimiento', 3, 'no permite ni registrar ni recuperar clave, por favor enviar repuesta al correo o llamar', '2014-12-03 15:05:36'),
(118, 17897030, 'mariana ', 'rojas', 'marian_rojas88@hotmail.com', '042488583', 'sede central caracas', 10, 'hola buenos dias no puedo realizar el registro en la pagina, le doy por primera vez ingreso mi cedula y me dice que los datos no existen en la base de dato y me saca del sistema, me podrian ayudar', '2014-12-03 16:20:49'),
(119, 19272705, 'ROSMARLHY', 'ESCOBAR', 'sol.escobar.g@hotmail.com', '04125988268', 'sede central Caracas', 10, 'El sistema no me permite el registro en la pagina.', '2014-12-03 16:21:02'),
(120, 17801061, 'ILEANA', 'MAGLIOCCO', 'ileana.magliocco@gmail.com', '04246092825', 'Caracas', 10, 'No me permite acceder al sistema a pesar de que estoy registrado.', '2014-12-03 16:59:45'),
(121, 19852485, 'katherine', 'zamora', 'katzam1990@hotmail.com', '04141505652', 'sede central', 10, 'usuario invalido ', '2014-12-03 17:57:40'),
(122, 8457332, 'RICARDA JOSEFINA', 'MEDINA', 'josefamedina2009@yahoo.com.ve', '0424.244.23.06', 'Sece Central', 10, 'compra de alimento', '2014-12-03 18:08:49'),
(123, 13533870, 'Maria Elena', 'Urosa Valera', 'mariaurosaevb@hotmail.com', '04241066309', 'Sede CEntral Quinta Crespo', 10, 'les escribo para informarle el problema que estoy presentando, me registre en la pagina weg intravenalcasa, al iniciar sección para realizar la compra de la cesta básica sale una ventana con la informacion (El nombre del usuario, clave o código invalido). intente registrarme de nuevo y me dice que el usuario ya existes, luego intente recuperar la contraseña a ver si eso era el error y me dice:\r\nLos datos suministrados por usted NO estan registrados en nuestra Base de Datos. Verifique haber introducido los datos correctamente y vuelva a intentarlo.\r\nEn última instancia se puede comunicar con nosotros al correo:ssrrhh@venalcasa.net.ve indicando su problema.\r\n  \r\n  ', '2014-12-03 18:22:00'),
(124, 14216944, 'adriana', 'amador', 'brigak_25@hotmail.com', '04128193619', 'Quinta crespo', 10, 'No puedo accesar a mi cuenta debido a que presenta un inconveniente con los datos suministrados ', '2014-12-03 18:50:12'),
(125, 18132297, 'YENDRY', 'MARTINEZ', 'YENDRYMARTINEZP@HOTMAIL.COM', '04164295780', 'QUINTA CRISPO', 10, 'NO PUEDO ENTAR AL SISTEMA PARA HACER LA COMPRA DE MERCAL.', '2014-12-03 19:03:01'),
(126, 5315321, 'Guillermo', 'Pulgar', 'jenniferguedez@hotmail.com', '04261110966', 'Quinta Crespa', 10, 'Aparentemente ha ocurrido un error en los datos suministrados por lo tanto no puedo acceder a mi cuenta', '2014-12-03 19:03:50'),
(127, 9356106, 'nancy ', 'quintero castro', 'rmarinaquinteroc@hotmail.com', '04269477755', 'sede', 10, 'no puedo recuperar mi clave', '2014-12-03 19:04:37'),
(128, 6440232, 'GRISEL  MARIA', 'GUANCHI  LEON', 'interactiva04@hotmail.com', '04142449062', 'UNIDAD DE  MIRANDA', 10, 'QUISIERA  SABER DE CUANDO ME VOY A REGISTRAR ESTOY BLOQUEDA DICE DIRIJASE A SU JEFE INMEDIATO', '2014-12-03 19:11:34'),
(129, 5452261, 'AURA', 'OROPEZA', 'respiro_69@hotmail.com', '04241442956', 'UNIDAD DE  MIRANDA', 10, 'QUISIERA  SABER PORQUE ME  REGISTRAR Y  DICE  DIRIJASE AL  JEFE  INMEDIATO ', '2014-12-03 19:13:43'),
(130, 5452261, 'AURA', 'OROPEZA', 'respiro_69@hotmail.com', '04241442956', 'UNIDAD DE  MIRANDA', 10, 'QUISIERA  SABER PORQUE ME  REGISTRAR Y  DICE  DIRIJASE AL  JEFE  INMEDIATO ', '2014-12-03 19:13:49'),
(131, 25674819, 'RUTH', 'MARQUEZ', 'MARQUEZRUTH7@GMAIL.COM', '04164158032', 'QUINTA CRESPO', 10, 'NO IMPRIMIO LA PLANILLA', '2014-12-03 19:20:58'),
(132, 18539061, 'Jesus Alejandro', 'Medna Moreno', 'jeu2203', '04269205203', 'Sede Principal Av Baralt', 10, 'no puedo entrar al sistema ', '2014-12-03 19:29:26'),
(133, 8457332, 'RICARDA JOSEFINA', 'MEDINA', 'josefamedina2009@yahoo.com.ve', '0424.244.23.06', 'Sece Central', 10, 'compra de productos', '2014-12-03 20:45:46'),
(134, 15911854, 'johnnathan', 'olivo', 'ambaefitness@gmail.com', '04123991550', 'quinta crespo', 10, 'me sale que no estoy registrado', '2014-12-03 21:15:46'),
(135, 18816625, 'Rafael ', 'Perez', 'ragperez@gmail.com', '04266043171', 'Sede Central', 10, 'No puedo ingresar a mi usuario Intravenalcasa, me indica que he ingresado algún dato erróneo a pesar que no es así, cuando le doy recuperar clave me indica que mis datos no están registrados en la base de datos del sistema, cuando le doy nuevamente registrarme me indica que el numero de cédula ya se encuentra registrado. Requiero asistencia', '2014-12-03 23:37:21'),
(136, 5537912, 'Maria Teresa', 'romero', 'romeromt@cantv.net', '04120908700', 'centro especialidades nutricionales hipolita bolivar', 10, 'Me registre al mediodia hoy 3 de dic recibi en eo correo romeromt@cantv.net registro exitoso y posteriormente en horas de la tarde ingrese mis datos para realizar la compra y no logro accesar... la pag m dice datos no coinciden y no m permite recupperar usuario ni clave', '2014-12-04 00:56:53'),
(137, 18002762, 'Karina', 'Martinez', 'anirak_og@hotmail.com', '04123826969', 'sede central quinta crespo', 10, 'No puedo ingresar a la intranet para efectuar compra. Me dice que usuario y/o clave incorrecta. me meto en recuperacion de clave y me dice que no se puede no se encuentra registrados esos datos.', '2014-12-04 13:24:40'),
(138, 21072332, 'LAURA', 'ROJAS', 'LAURA_66_1@HOTMAIL.COM', '04149159945', 'SEDE CENTRAL', 10, 'NO APAREZCO EN SISTEMA ', '2014-12-04 13:40:33'),
(139, 18539061, 'Jesus Alejandro ', 'Medina Moreno', 'Jeu2203@gmail.com', '04269205203', 'AV Baralt sede principal', 10, 'aparesco registrado pero a la hora de ingresar al sistema, sale un recuadro diciendo que los datos suministrados (usuario, clave, codigo de seguridad) son incorrectos, esto aque se debe. gracias espero respuesta en lo inmediato posible ya que necesito realizar la compra. gracias camaradas por brindarle bienestar a nuestro pueblo soberano\r\n', '2014-12-04 14:51:07'),
(140, 15867429, 'JAVIER', 'RUIZ', 'J.RUIZ.VENALCASA@GMAIL.COM', '04143554522', 'DIRECCION DE INGENIERIA Y SERVICIO PLANTA PASTA', 3, 'NO PUEDO INGRESAR AL SISTEMA, INTENTE RECUPERAR CLAVE Y NO ME LLEGA NINGUN CORREO', '2014-12-04 15:54:58'),
(141, 63367530, 'JUANA ', 'MARTINEZ', 'juanamartinez1306@hotmail.com', '04266104092', 'Comercializacion Almacen Caraballeda', 10, 'Buenos dias, la Sra juana no puede ingresar para hacer su compra no le premiste seder a mismo. y se encuentra regristada', '2014-12-04 16:00:39'),
(142, 18304900, 'LERIS ', 'TORRES', 'leris.torres@hotmail.com', '04168008973', 'Distrito Capital', 10, 'La pagina luego de haberme registrado exitosamente, no me permite iniciar sesión para realizar las compras. El Nº de cedula clave y código lo coloco correctamente y aun asi no me da acceso.', '2014-12-04 16:59:33'),
(143, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 17:40:08'),
(144, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 17:40:10'),
(145, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 17:40:13'),
(146, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 17:40:15'),
(147, 14350343, 'FREDERIK', 'TORO', 'ac.die.toro@gmail.com', '04169168190', 'quinta crespo', 10, 'no puedo entrar en la pagina por error de clave', '2014-12-04 19:26:33'),
(148, 19852485, 'KATHERINE', 'ZAMORA', 'katzam1990@hotmail.com', '04141505652', 'SEDE CENTRAL', 10, 'PRESENTO PROBLEMAS PARA INGRESAR A LA PAGINA', '2014-12-04 20:31:50'),
(149, 19710366, 'GABRIEL ', 'BRACAMONTE', 'GABOTE_02@HOTMAIL.COM', '04265104695', 'SEDE QUINTA CRESPO ', 10, 'YA ESTOY REGISTRADO Y NO HE PODIDO ENTRAR A COMPRAR ME DICE QUE LA CONTRASEÑA ES INCORRECTA Y LE DI A CONTRA SEÑA OLVIDADA Y NADA ', '2014-12-04 20:38:21'),
(150, 19710366, 'GABRIEL ', 'BRACAMONTE', 'GABOTE_02@HOTMAIL.COM', '04265104695', 'SEDE QUINTA CRESPO ', 10, 'YA ESTOY REGISTRADO Y NO HE PODIDO ENTRAR A COMPRAR ME DICE QUE LA CONTRASEÑA ES INCORRECTA Y LE DI A CONTRA SEÑA OLVIDADA Y NADA ', '2014-12-04 20:49:10'),
(151, 9155082, 'HERLINDA ZABALETA', 'zabaleta', 'herlindazabaleta45@gmail.com', '04143665814', 'sede central', 10, 'buenas tardes no e podido accesar al portal tengo problemas con el usuario', '2014-12-04 20:52:24'),
(152, 20283424, 'osmayra bracho', 'bracho', 'osmayrabracho@gmail.com', '04146943979', 'caracas', 10, 'no puedo accesor a comprar, que podria hacer para realizasr mis compras hoy', '2014-12-04 20:52:55'),
(153, 9155082, 'HERLINDA ZABALETA', 'zabaleta', 'herlindazabaleta45@gmail.com', '04143665814', 'sede central', 10, 'se me olvido la clave de acceso y no la puedo recuperar', '2014-12-04 21:00:41'),
(154, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:05:45'),
(155, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:41'),
(156, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:42'),
(157, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:44'),
(158, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:48'),
(159, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:51'),
(160, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:53'),
(161, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:54'),
(162, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:55'),
(163, 16430045, 'COROMOTO ARISMEDY CA', 'carmona', 'elvisgarcia518@gmail.com', '04168163745', 'central', 10, 'se me olvido la clave', '2014-12-04 21:06:55'),
(164, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:57'),
(165, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:06:59'),
(166, 18269972, 'daylis', 'ramirez', 'daylisramirez85@hotmail.com', '04266873362', 'quinta crespo', 10, '', '2014-12-04 21:07:02'),
(167, 20283424, 'OSMAYRA JENIRET BRAC', 'BRACHO LOPEZ', 'osmayrabracho@gmail.com', '04146943979', 'caracas', 10, 'no he podido realizar mis compras, por favor indicar que hacer al respecto para recupear mi clave gracias', '2014-12-04 21:30:27'),
(168, 16349910, 'CANDIMAR', 'GRANADO', 'CIGRANADO@GMAIL.COM', '04167638022', 'CORO', 7, 'nO LOGRO INGRESAR PARA HACER EL MERCADO VIRTUAL', '2014-12-05 00:39:31'),
(169, 1607231, 'rosemary', 'pinero', 'rosmi3201@gmail.com', '04143077815', 'Oficina Planificacion Organizacion y Presupuesto', 10, 'estoy intentando registrarme y el sistema da una alerta de que mis datos no existen, el INN mando una lista anexa con todas las personas que teniamos esta problematica, el d[ia de ayer nos informaron que podiamos registrarnos pero a mi me sique saliendo que mis datos no existen. por favor revisar ya que hasta la fecha no he podido realizar mis compras, gracias', '2014-12-05 12:46:12'),
(170, 24760309, 'franklin jose', 'martinez mota', 'frankmartinez323@hotmail.com', '04125756166', 'sede central quinta crespo', 10, 'problema para entrar a la pagina ', '2014-12-05 12:53:08'),
(171, 15992639, 'Adriana', 'Redondo', 'adriredondo19@gmail.com', '04124916120', 'Dirección de Investigaciones en Alimentos', 10, 'NO me puedo registrar en el sistema para realizar la compra. Por favor les agradezco su ayuda y colaboración. Gracias.', '2014-12-05 13:20:42'),
(172, 84551821, 'juan carlos', 'matamoros', 'sabra92003@yahoo.es', '04122148859', 'CEN HIPOLITA BOLIVAR EL CEMENTERIO', 10, 'en la orden de compra me salen vario perniles cuando solo pedi 2 y en vez de una pagina ,la orden agarra 2 paginas', '2014-12-05 14:14:57'),
(173, 13952104, 'Yrvyn', 'Nuñez', 'yrvynricardo@gmail.com', '04128264805', 'central', 10, 'Como hago paraeliminar una compra y crear otra? ya q me crearon una por error y aparecen mas productos de los que necesito solicitar ', '2014-12-05 18:52:42'),
(174, 19710366, 'GABRIEL', 'BRACAMONTE', 'GABOTE_02@HOTMAIL.COM', '04142895630', 'SEDE CENTRAL', 10, 'EN FECHA 04 DE DICIEMBRE PROCEDI A REGISTRARME EN EL SISTEMA CON EL DE REALIZAR MI COMPRO EN LINEA, UNA VEZ REGISTRADO EL SISTEMA NO ME PERMITIO REALIZAR LA COMPRO. HE TRATADO POR TODOS LOS MEDIOS POSIBLES DE ACCESAR NUEVAMENTE Y LOS INTENTOS HAN SIDO INFRUCTUOSO, POR LO QUE REQUIERIO DE AYUDA YA QUE LA COMPRA SE HARA EFECTIVA EL MARTES 09 DE DICIEMBRE DE 2014. AGRADEZCO LA AYUDA QUE PUEDAN BRINDARME AL RESPECTO Y CON PRONTITUD', '2014-12-05 19:32:03'),
(175, 24760309, 'FRANKLIN JOSE', 'MARTINEZ MOTA', 'frankmartinez323@hotmail.com', '04125756166', 'CENTRAL - QUINTA CRESPO', 10, 'PROBLEMAS CON USUARIO Y CONTRASEÑA, NO LA PUEDO RECUPERAR Y NO ME HA LLEGADO EL CORREO DE CONFIRMACION DE CUENTAS.', '2014-12-05 20:19:36'),
(176, 6364336, 'EVA JULIA', 'FLORES VALDEZ', 'EVAJULIAF@HOTMAIL.COM', '04161915538', 'QUINTA CRESPO', 10, 'YA REALIZE UN PEDIDO PERO QUIERO ANEXAR PERNIL QUE CUANDO HIZE LA SOLICITUD NO HABIA PERO TENGO INFORMACION QUE LLEGARON COMO HAGO PARA HACER NUEVO PEDIDIDO GRACIAS', '2014-12-05 20:40:17');
INSERT INTO `novedad` (`NU_IdNovedad`, `NU_Cedula`, `AL_Nombre`, `AL_Apellido`, `AF_Correo`, `AF_Telefono`, `AF_Ubicacion`, `empresa_NU_IdEmpresa`, `AF_Novedad`, `FE_Registro`) VALUES
(177, 13858204, 'yatsenia', 'itriago', 'yatseniai@yahoo.com', '02125502147', 'Caracas', 10, 'Me indicaron eviar mis datos al correo rrhh@venalcasa.gob.ve para el mercado corporativo y no me han dado respuesta. quisiera saber si hay otro correo para enviar mis datos nuevamente.\r\nMil gracias de antemano\r\n\r\nYatsenia Itriago\r\n', '2014-12-05 21:10:00'),
(178, 12749101, 'JUAN CARLOS', 'gutierrez escala', 'jcpolar1@hotmail.com', '04127032949- 04261060675- 02125647433', 'AV.BARAL  ESQ. El Carmen Quinta Crespo, Caracas. VENEZUELA.', 10, 'el sistema medie que no aparecen mis datos. yo me registre y no acepta mi clave dice que es invalidad, y el sistema me envió el mensaje  a mi correo diciendo que fue exitoso mi registro necesito ayuda urgente por favor gracias. ', '2014-12-06 14:38:33'),
(179, 20283424, 'osmayra jeniret ', 'bracho lopez', 'osmayrabracho@gmail.com', '04146943979', 'coordinacion de centros de cultura alimentaria y nutricional', 10, 'No pude realizar mi compra por internet, en ese caso como hago', '2014-12-06 16:34:08'),
(180, 6400506, 'Teresa Ramona ', 'castellanos ', 'teresacastellanos@Hotmail.com', '04169315294', 'av baralt esq el Carmen qta crespo caracas', 10, 'No acceso al link de compras para hacer mi pedido y q ustedes generen la orden de compra les agradezco su ayuda saludos ', '2014-12-06 20:15:46'),
(181, 18937800, 'NELSON ', 'FIGUEREDO', 'ALEJANDRO_852002@HOTMAIL.COM', '04164185797', 'GALPONES DE CASA', 3, 'NO RECONOSE EL NMRO DE CEDULA', '2014-12-08 15:07:04'),
(182, 9387083, 'orlando ', 'granados plata', 'alexyumen.venalcasa.@gmail.com', '04145363031', 'Barinas', 3, 'necesito que la clave de mi mercado virtual sea emitido a este correo ya que la clave no la recuerdo del mio', '2014-12-08 17:21:42'),
(183, 15804564, 'IRWIN', 'PIÑA', 'irwinpadilla1@hotmail.com', '0416-834-65-48', 'SEDE CENTRAL', 10, 'BUENAS TARDES POR LA PRESENTE ME DIRIJO A USTEDES CON EL FIN DE SALUDAR Y A LA VEZ SOLICITARLES QUE POR PROBLEMAS DE SALUD NO E PODIDO COMPRAR POR ESTE MEDIO Y YA ESTA CERRADO EL SISTEMA ESPERO PODER COMPRAR O ME PERMITAN EL ACCESO AL SISTEMA YA ESTOY REGISTRADO PERO NO PUEDO COMPRAR MUCHAS GRACIAS ESPERO SU PRONTA RESPUESTA YA QUE MAÑANA ES LA JORNADA PARA COMPRAR ', '2014-12-08 17:37:55'),
(184, 6400506, 'Teresa Ramona ', 'castellanos ', 'teresacastellanos@Hotmail.com', '04169315294', 'av baralt esq el Carmen qta crespo caracas', 10, 'Como hacer para accesar para llenar el pedido ', '2014-12-08 19:46:47'),
(185, 6400506, 'Teresa Ramona ', 'castellanos ', 'teresacastellanos@Hotmail.com', '04169315294', 'av baralt esq el Carmen qta crespo caracas', 10, 'Como hacer para accesar para llenar el pedido ', '2014-12-08 19:46:56'),
(186, 15383937, 'Maria Domitila', 'Leon', 'm.leon.venalcasa@gmail.com', '04160735197', 'Planta Procesadora de Harina La Veguita, Edo. Barinas', 3, 'Cuando entro al sistema me sale el nombre de otra mujer. me lo cambiaron hace poco y ahora no entro al sistema con mi cedula tampoco', '2014-12-08 23:47:22'),
(187, 13902927, 'PIÑERO NORVIT', 'PIÑERO', 'pineronorvitanabel@gmail.com', '04269233291', 'Coro estado falcon', 7, 'se realizo el registro pero ahora no quiere acceder con la clave que le coloque.. si pudiesen resetear o borrar este registro para hacerlo nuevamente. gracias y saludos', '2014-12-08 23:52:27'),
(188, 7067358, 'elizabeth', 'ortiz', 'jmorilloortiz@hotmail.com', '04164449358', 'adagro, calabozo guarico', 3, 'como hago para realizar el cambio de correo para el mercado coorporativo\r\n', '2014-12-09 00:07:20'),
(189, 13815881, 'HUMBERTO JOSE', 'MAURERA MARTINEZ', 'hj.maurera.venalcasa@gmail.com', '04165819663', 'planta juana ranirez la avanzadora caicara monagas', 3, 'no puedo acceder para realizar mi mercado ya que no me acepta la clave y la mando a recuperar pero no me llega ningún mensaje.  ', '2014-12-09 15:29:53'),
(190, 13815881, 'HUMBERTO JOSE', 'MAURERA MARTINEZ', 'hj.maurera.venalcasa@gmail.com', '04165819663', 'planta juana ranirez la avanzadora caicara monagas', 3, 'no puedo acceder para realizar mi mercado ya que no me acepta la clave y la mando a recuperar pero no me llega ningún mensaje.  ', '2014-12-09 15:29:56'),
(191, 17548047, 'luis', 'bello', 'luis.alfredo150@hotmail.com', '04249456403', 'punta de mata caicara', 3, 'eh olvidado mi clave del mercado ??', '2014-12-09 17:08:03'),
(192, 13902927, 'norvit', 'piñero', 'piñeronorvitanabel@gmail.com', '04269233291', 'zona industrial entre av 1 y av 2, santa ana de coro-falcon', 7, 'en el sistema aparezco como registrada, pero cuando ingreso/clave me dice que no estoy en el sistema, y necesito hacer el mercado virtual...gracias. ', '2014-12-09 17:29:40'),
(193, 6996034, 'MARIA LOURDES', 'MACHADO SANOJA', 'maria-sanoja@hotmail.com', '02392229298', 'CEN HIPOLITA BOLIVARES ', 10, 'CUANDO ABRE LA PAGINA DE COMPRAS ', '2014-12-09 18:09:36'),
(194, 19107223, 'patricia ', 'ojeda', 'patriciaojeda2012@gmail.com', '04145917611', 'valencia Edo. Carabobo', 9, 'Buenas tardes, la clave de acceso creada para ingresar al sistema no me permite acceder al mismo, al momento de ingresar aparece el mensaje de usuario invalido y cuando intento recuperar la clave, aparece el msj donde indican que mis datos no estan registrado en su base de datos, sin embargo aparezco registrada en el sistema. solicito el reinicio de la clave de acceso o que se me permita registrar nuevamente mis datos para poder acceder a la compra de los productos lo mas pronto posible.  ', '2014-12-09 18:59:29'),
(195, 4567462, 'LEIVA', 'CARMONA', 'Churuata_cumarebo@hotmail.com', '04164685783', 'CORO-EDO FALCON', 7, 'ME SUSCRIBÍ Y NO ME ACEPTA LA CLAVE QUIERO RECUPERARLA Y ME DICE QUE NO HAY REGISTRO DE MIS DATOS Y SI INTENTO REGISTRARME NUEVAMENTE ME DICE QUE YA ESTOY REGISTRADA. POR FAVOR AYUDENME.', '2014-12-09 19:06:40'),
(196, 4567462, 'LEIVA', 'CARMONA', 'Churuata_cumarebo@hotmail.com', '04164685783', 'CORO-EDO FALCON', 7, 'ME SUSCRIBÍ Y NO ME ACEPTA LA CLAVE QUIERO RECUPERARLA Y ME DICE QUE NO HAY REGISTRO DE MIS DATOS Y SI INTENTO REGISTRARME NUEVAMENTE ME DICE QUE YA ESTOY REGISTRADA. POR FAVOR AYUDENME.', '2014-12-09 19:06:43'),
(197, 12012054, 'Maria ', 'Gudi#0', 'La.mariposita021272@hotmail . com', '04121531910', 'Planta de Harina Guanare en silos casa dos.', 3, 'Buenas tardes! Remito que tengo un problema para comprar el mercado virtual por la razon siguiente de que el sistema me indica clave lncorrecta y no es asi, mi clave es correcta la cual se lee asi:  ( r P4 hwT )  lnformo q ayer en la noche realize las compras con esta misma clave y ahora no entiendo xque el sistema no acepta la clave.', '2014-12-09 20:58:46'),
(198, 3863367, 'Magaly del Carmen', 'Bracho Noguera', 'magalyb2412@hotmail.com', '5626273', 'ahora jubilada', 10, 'no me abre el boton de comprar, y me sale un mensaje que dice que la empresa no esta incorporada al sistema.', '2014-12-09 23:33:12'),
(199, 8628557, 'Leida Lercedes', 'Flores', 'leidamercedes67@hotmail.com', '04168012684', 'Unidad Estado Miranda (Los Teques)', 10, 'solicitud de registro', '2014-12-10 00:06:57'),
(200, 4567462, 'Leiva ', 'Carmona', 'Churuata_cumarebo@hotmail.com', '04164685783', 'Falcón/Coordinadora/Zona Industrial Coro', 7, 'no puedo realizar la compra de mercado virtual, porque el sistema no reconoce mi clave ni registrarme de nuevo. dice que ya estoy registrada, pero no recupera clave y reporta invalida. por favor le agradezco responder ya que esta al limite.', '2014-12-10 01:39:49'),
(201, 9387083, 'orlando', 'granados plata', 'plata.venalcasa.@gmail.com', '04145363031', 'barinas', 3, 'necesito la clave del mercado virtual', '2014-12-10 13:36:53'),
(202, 5617421, 'YAJAIRA JOSEFINA AVI', 'avila silva', 'belcucha64@yahoo.es', '04127280412', 'distrito capital', 10, 'que no he podido acceder a la lista de compras para el operativo av. sucre gracias', '2014-12-10 17:03:12'),
(203, 12285942, 'Rafael antonio ', 'Burgos Guevara ', 'rafaelburgos770@gmaíl.com ', '04265534502', 'urachíche estado Yaracuy ', 3, 'aparezco registrado pero no puedo solicitar mis recibos de pago ', '2014-12-10 17:11:07'),
(204, 10455942, 'CARMEN ELENA', 'MARTINEZ', 'cmartinez@cealcove.com', '04269491181', 'Corinsa/Administracion y Finanzas/Cagua', 9, 'Problemas para ingresar a la aplicaciòn, ya que no està reconociendo el usuario.', '2014-12-10 19:52:57'),
(205, 10455942, 'CARMEN ELENA', 'MARTINEZ', 'cmartinez@cealcove.com', '04269491181', 'CEALCO CAGUA ADMINISTRACION', 9, 'ayer intente registrarme para realizar la compra del mercado virtual, pero ya salgo como registrada, ahora bien, cuando coloco que se me olvido la clave y coloco mi numero de cedula y fecha  de nacimiento, me indica que no estoy registrada, yo creo  que al momento que intente registrarme ingrese algun dato incorrecto,pero no se en donde pudo ver sido.\r\n \r\nsera posible que eliminen ese registro y yo me volveria a registrar, para poder realizar mi compra.\r\n \r\nMis datos son:\r\n \r\nCarmen Elena Martinez \r\nC.I. 10.455.942.\r\nFecha de nacimiento 16-02-1969\r\nTelef. 0426-9491181\r\n', '2014-12-11 16:12:11'),
(206, 12939674, 'inna ', 'lopez', 'yacrislug@hotmail.com', '04261706033', 'av andres bello', 5, 'en los datos suministrados mi cedula es incorrecta y no me abre la pagina ', '2014-12-11 23:52:49'),
(207, 12641387, 'LOLIMAR ', 'CONTRERAS', 'lolicsosa@gmail..com', '02424-21169-71', 'MIMPPAL ANDRES BELLO', 5, 'NO ME DCE QUE EL USUARIO Y CEDULA ES INCORRECTO Y ASU VEZ ME DICE QUE NO ESTOY REGISTRADA Y POR OTRA PARTE QUE YA ESTOY REGISTRADA', '2014-12-15 16:22:33'),
(208, 12641387, 'LOLIMAR ', 'CONTRERAS', 'lolicsosa@gmail..com', '02424-21169-71', 'MIMPPAL ANDRES BELLO', 5, 'NO ME DCE QUE EL USUARIO Y CEDULA ES INCORRECTO Y ASU VEZ ME DICE QUE NO ESTOY REGISTRADA Y POR OTRA PARTE QUE YA ESTOY REGISTRADA', '2014-12-15 16:22:35'),
(209, 16095377, 'JORGE LUIS ', 'RAPOLLA FALCON', 'GIORGORAPOLLA@GMAIL.COM', '04166203648', 'MINPALL', 5, '', '2014-12-15 19:18:05'),
(210, 16095377, 'JORGE LUIS ', 'RAPOLLA FALCON', 'GIORGORAPOLLA@GMAIL.COM', '04166203648', 'MINPALL', 5, '', '2014-12-15 19:18:05'),
(211, 16095377, 'JORGE LUIS ', 'RAPOLLA FALCON', 'GIORGORAPOLLA@GMAIL.COM', '04166203648', 'MINPPAL', 5, 'NO TENGO ACCESO AL SISTEMA ME DICE QUE ME ENCUENTRO REGISTRADO Y CUANDO RECUPERO LA CONTRASEÑA ME DICE QUE NO ESTOY EN LA BASE DE DATOS', '2014-12-15 19:19:52'),
(212, 10113070, 'maria soledad', 'penagos', 'mariapenagos070@yahoo.com', '04140181641', 'caracas- la guaira', 5, 'empleado', '2014-12-16 14:36:05'),
(213, 13158996, 'HUGO ', 'ESCALONA', 'hugoescalona_141@hotmail.com', '04164204394', 'Dist. Andimilk (ARTIGAS)', 8, 'Me muestra error al ingresar, al registrarme de nuevo dice que ya lo estoy y no me da opcion para recuperar', '2014-12-16 16:19:19'),
(214, 18711782, 'DEIVIS ', 'BLANCO', 'andiavila1@gmail.com', '02122567801 ', 'LACTEOS LOS ANDES ANDIAVILA-PETARE ', 8, ' olvide mi contraseña, intente recuperarla por el modulo de olvido su contraseña y me da error. \r\n Mucho agradeceria su colaboración \r\n', '2014-12-16 16:36:16'),
(215, 9961999, 'Yohanna ', 'Aristigueta', 'chloicastillo@gmail.com', '04241252353', 'petare', 8, 'Olvido de contraseña y no puedo recuperarla', '2014-12-16 17:45:22'),
(216, 3788688, 'JOSE ANTONIO', 'LOPEZ', 'jalopez_1974@hotmail.com', '04142457225', 'CARACAS LOS ROSALES', 8, 'OLVIDE MI CLAVE', '2014-12-16 20:04:01'),
(217, 23178126, 'carlos ', 'marenco', 'mirandaclara14@gmail.com', '04169123155', 'la urdaneta', 5, 'no puedo acceder', '2014-12-16 21:43:12'),
(218, 20132432, 'DOUGLAS ', 'PINO', 'douglasgps.2@hotmail.com', '04263109813', 'AV ANDRES BELLO', 5, 'SE ME OLVIDO LA CLAVE', '2014-12-17 01:11:24'),
(219, 11225663, 'CARMEN', 'SARABIA', 'panaderiaminppal@gmail.com', '04162040357', 'MINPPAL', 5, 'LA CLAVE NO ME PERMITE EL ACCESO A LA PAGINA PARA REALIZAR EL MERCADO Y AL COLOCAR RECUPERAR CLAVE ME INDICA QUE LOS DATOS NO SE ENCUENTRAN REGISTRADO EN SISTEMA', '2014-12-17 11:29:20'),
(220, 23178126, 'Carlos ', 'Marenco', 'adalberto2706@hotmail.com', '04169123155', 'cantv', 5, 'no puedo ingresar tengo problema para el mercado', '2014-12-17 12:28:14'),
(221, 17438004, 'daxon ', 'castañeda', 'thevikindawmc@hotmail.com', '04164227278', 'andimilkca galpon 40 san martin', 8, '', '2014-12-17 13:49:41'),
(222, 13466975, 'ANA ', 'RODRIGUEZ', 'ANAKARINARODRIGUEZ23@HOTMAIL.COM', '04129525570', 'ADMINISTRACION', 8, 'Buenos dias, por  medio de la presente tengo problema para el ingreso de a la pagina para optar al mercado ya que no me he registrado y no me permite porque soy usuario registrado agradeciendo la antencion ', '2014-12-17 14:13:49'),
(223, 7957425, 'NELLY', 'BARRETO', 'nellybarretom@hotmail.com', '04142512701', 'CARACAS', 6, '', '2014-12-17 18:19:50'),
(224, 14096056, 'josman', 'higuerey', 'josmanhiguerey@hotmail.com', '04242919879', 'guiatire', 8, 'recuperar clave', '2014-12-17 18:36:24'),
(225, 13504034, 'DELIBEL', 'SANTAELLA', 'DELIBEL_SANTELLA@HOTMAIL.COM', '04163003969', 'ARAIRA', 8, 'NO RECUERDO CLAVE USUAARIO', '2014-12-17 18:46:31'),
(226, 12168033, 'hector jose', 'castillo martinez', 'hector-jcm2010@hotmail.com', '04124920083', 'cealco seguridad cagua', 9, 'mis datos estan registrado pero no puedo assesar para imprimir mi planilla .solicite el mercado completo favor revisar', '2014-12-17 22:40:21'),
(227, 20595293, 'Humberto ', 'nuñez', 'anyelic5@hotmail.com', '04143203451', 'guatire a 100 mts del llenadero de pdvsa', 8, 'no recuerdo la contraseña ', '2014-12-18 12:37:13'),
(228, 12912024, 'JULIO', 'MOLINA', 'elchino-jm@hotmail.com', '04264166377', 'Gerencia General Region Capital', 8, 'No puedo ingresar con mi clave al mercado virtual me dice que es invalida y la pagina par anosotros se cierra hoy al medio dia', '2014-12-18 14:17:51'),
(229, 20595293, 'HUMBERTO', 'NUÑEZ', 'carolina19633995@hotmail.com', '04143203451', 'guatire a 100 metros del llenadero de pdvsa', 8, 'se me olvido la contraseña', '2014-12-18 14:57:03'),
(230, 18329986, 'LUISANNYTH CAROLINA', 'GUTIERREZ NATERA', 'LUISANNYTHGMILK@GMAIL.COM', '04262149757', 'SAN MARTIN', 8, 'NO SE ME HA INCLUIDO EN LA BASE DE DATOS Y POR ENDE NO HE PODIDIO REALIZAR LA COMPRA DE LOS DOS MERCADO QUE HA REALIZADO.', '2014-12-18 15:06:27'),
(231, 17588230, 'derbyn', 'imbett', 'dershey_0403@hotmail.com', '04143195295', 'andicaracas', 8, 'problema con la clave urgente', '2014-12-18 15:36:05'),
(232, 6400506, 'teresa', 'castellanos', 'teresacastellanos@hotmail.com', '04169315294', 'av baralt esq. el Carme qta crespo', 10, 'Buenas moches mañana tengo entemdido van a vender productos cesta basica y el inn  me dijo.q cerraron los pefidos yo he estado desde hace dos semanas intentanto entrar psra llenar pedidp y no hsy manera sera q puefo ir a comprarlo a los locales fe ustedes ', '2014-12-20 02:01:14'),
(233, 21148194, 'margaret', 'olivero', 'margaretolivero@hotmail.com', '04142665574', 'sede central', 10, 'sede central', '2014-12-26 00:13:33'),
(234, 21148194, 'margaret', 'olivero', 'margaretolivero@hotmail.com', '04142665574', 'sede central', 10, 'sede central', '2014-12-26 00:15:09'),
(235, 15150604, 'JEISER', 'NAVARRO', 'JEISERNAVARRO80@GMAIL.COM', '04268120980', 'AVENIDAD ZULUAGA CALLE LOS CLAVELES PARROQUIA SAN PEDRO', 8, 'NO PUEDO ENTRAR A INTRAVENALCASA PARA HACER MIS COMPRAS EL SISTEMA ME DICE QUE MIS DATOS NO SON LOS MISMO YO QUISIERA SABER SI USTEDES ME PUEDEN RESETIAR Y QUEDAR EN BLANCO PARA PODER ENTRAR AL SISTEMA SIN NADA MAS QUE PEDIR ME DESPIDO GRACIAS Y HASTA LUEGO ESPERO SU RESPUESTA FELIZ AÑO NUEVO PARA TODO EL PERSONAL', '2015-01-02 14:41:51'),
(236, 2036055, 'RUPERTA DEL CARMEN', 'ESCALONA', 'ruper-42@hotmail.com', '04164837866', 'san bernardino', 3, 'buenas tardes, disculpe lo malo pero eh intentado meterme a la pagina y el codigo q inrodusco no me deja entrar ', '2015-01-06 22:02:38'),
(237, 14325273, 'Nelson Jesus', 'Sanchez Molina', 'ne.sanchez.venalcasa@gmail.com', '04167738189', 'planta harinera leander socopo', 3, 'no me acepta la clave para ingresar a la pagina ya tengo mas de 3 meses esperando su atención y no e recibido respuesta', '2015-01-07 17:42:07'),
(238, 18490831, 'Ezequiel ', 'Melendez', 'melendezezequiel3@gmail.com', '04120341428', 'Cagua,planta corinza Maracay', 9, 'HOLA... tengo problenas para igresar a mi cuenta, pues olvide mi contraseña y no me da la opcion de recuperar, porfavor quisiera saber q hacer, espero su respueta lo mas pronto pocible, gracias y bendiciones...', '2015-01-10 15:52:12'),
(239, 24636160, 'JEAN CARLOS', 'ESCOBAR GIL', 'yankee6762@hotmail.com', '04141078072', 'CARACAS', 6, 'HE OLVIDADO LA CONTRASEÑA, PARA INGRESAR A LA PAGINA DEL MERCADO VIRTUAL. FAVOR REINICIAR PARA GESTIONAR NUEVAMENTE. GRACIAS.', '2015-01-12 19:31:33'),
(240, 4246367, 'Reynaldo Alfredo', 'Gomez linares', 'reinaldo906@hotmail.com', '04143078612', 'cementerio', 6, 'se me olvido la clave para poder entrar y no puedo cambiarla', '2015-01-13 02:06:41'),
(241, 6120557, 'DANIRLE OLGA ', 'MALDONADO FLORES', 'danirle10@gmail.com', '04126109647', 'Distribuidora Andimilk, c.a.', 8, 'No puedo ingresar a la pagina y cuando trato de recuperar me indica que los datos estan errados y si intento registrarme de nuevo me dice que ya estoy registrada.\r\nMe urge para poder realizar mi compra mensual.\r\n\r\nGracias por su atencion.\r\n\r\nDanirle Maldonado', '2015-01-13 14:28:48'),
(242, 6719665, 'jose', 'hidalgo', 'josegre_01@hotmail.com', '04142827622', 'andivargas', 8, 'buen dia tengo problema con mi clave que no la recuerdo y me le doy a la opcion de no recordar clave y no puedo entrar a la pagina.. quisiera que me ayudaran con este problema ', '2015-01-13 15:53:04'),
(243, 16620055, 'pedro', 'perez', 'pedroeph@hotmail.com', '04141370491', 'calle lebrum petare ', 8, 'he olvidado la clave para realizar la compra del mercado virtual `por favor si pueden ayudarme a recuperar mi clave muchas gracias ', '2015-01-13 17:06:25'),
(244, 6105011, 'Lionel ', 'Fernandez', 'ferlionel@gmail.com', '04165391408', 'Unidad Distrito Capital Y Vargas', 10, 'Buenas tardes Sres por favor no recuerdo la clave de acceso y cuando le doy recuperar clave me dice que no estoy registrado gracias', '2015-01-13 19:48:21'),
(245, 14263697, 'Leonardo', 'Chirinos', 'leonardo.chior@gmail.com', '04147253745', 'Santa Ana de Coro estado Falcon', 7, 'Olvide mi contraseña para el acceso para seleccionar los alimenro del mercado virtual', '2015-01-13 20:12:52'),
(246, 13028685, 'Eliecer', 'Chirino', 'eliecerchirinobracho19@hotmail.com', '04264120292', 'Santa Ana de Coro estado Falcon', 7, 'se me olvido la contraseña para seleccionar la lista de los articulos del mercado virtual', '2015-01-13 20:23:48'),
(247, 15915852, 'katireli', 'castro', 'katireli@hotmail.com', '04267593621', 'Santa Ana de Coro estado Falcon', 7, 'solicito recuperacion de clave de acceso para realizar el mercado virtual ', '2015-01-13 20:31:35'),
(248, 15915852, 'katireli', 'castro', 'katireli@hotmail.com', '04267593621', 'Santa Ana de Coro estado Falcon', 7, '', '2015-01-13 21:08:58'),
(249, 16620055, 'PEDRO', 'PEREZ', 'pedroeph@hotmail.com', '04141370491', 'ADIAVILA', 8, 'NO PUEDO INGRESAR, YA QUE OLVIDE LA CONTRASEÑA PERO AL INTENTAR RECUPERARLA ME ENVIA UN MENSAJE DE NO REGISTRADO Y YA E REALIZADO COMPRAS ANTERIORES', '2015-01-13 22:31:32'),
(250, 15150604, 'JEISER', 'NAVARRO', 'JEISERNAVARRO80@GMAIL.COM', '04268120980', 'ANDICARACAS, VENTAS, LA BANDERA ', 8, 'Buen dia un cordial saludo me dirijo a ustedes para solicitar que  me reseten mi clave ya que se me olvido y no puedo apcesar a la pagina agradeceria que me recetiaran dicha clave ya que tengo chace hasta el viernes 16/01/2015 opara hacer mi compra ', '2015-01-14 16:14:49'),
(251, 17588230, 'derbyn ', 'imbett', 'dershey_0403@hotmail.com', '04143195295', 'andicaracas', 8, 'tengo la cuenta bloqueada no me acuerdo la clave de acceso a mi cuenta  por lo cual no puedo realizar compras le agradesco su pronta solucion gracias de antemano.', '2015-01-14 20:12:10'),
(252, 17775543, 'Glenis Sofia', 'Garcia Nobles', 'sofiag_8688@hotmail.com', '04142706213', 'Heladeria Coppelia (gradilla)', 8, 'No puedo ingresar al sistema venalcasa para realizar el mercado virtual', '2015-01-15 00:24:17'),
(253, 12181990, 'Katy ', 'Quintero', 'kaqui21@hotmail.com', '4146912861', 'coro Edo. Falcon ', 7, 'no puedo ingresar a mi usuario para cargar compra de Mercado virtual, no reconoce mi clave y cuando coloco recuperar clave me dice que no estoy registrado y cuando coloco registrarse, me dice que ya existo. necesito ayuda ', '2015-01-15 00:26:47'),
(254, 15150604, 'jeiser  ', 'navarro', 'jeisernavarro80@gmail.com', '04268120980', 'av zuloga con calle los claveles n.28 los rosales', 8, 'hla disculpa no puedo recuperar mi clave le agrasezco q si me pueden ayudar muchas gracias', '2015-01-15 15:11:21'),
(255, 16555439, 'elvin', 'gonzalez', 'elvingonzalezelvin-peluche@hotmail.es', '04147823181', 'andiavila petare la lebrum', 8, 'estoy registrado en la pagina y no puedo ingresar se me olvido la clave le di a recuperar meto los datos y me dice q no es.... gracias', '2015-01-15 22:34:42'),
(256, 15951688, 'MARIA DE LOS ANGELES', 'RODRIGUEZ BERMUDEZ', 'MARODRIGUEZ@CEALCOVE.COM', '04121995276', 'CEALCO PLANTA VALENCIA', 9, 'TENGO PROBLEMAS PARA ACCEDER A LA PAGINA SIEMPRE ME APARECE EL MENSAJE USUARIO O CLAVE INVALIDA.', '2015-01-16 13:47:26'),
(257, 17025195, 'GERMAN WLADIMIR ', 'EVIES ESTEVES ', 'GERMANWEVIESE@GMAIL.COM', '04126809096', 'CEALCO PLANTA VALENCIA', 9, 'PERDIDA DE CLAVE PARA INGRESAR A  LA PAGINA EN LINEA PARA MERCADFO EN LINEA ', '2015-01-16 13:49:38'),
(258, 20132432, 'DOUGLAS', 'PINO', 'DOUGLASGPS.2@HOTMAIL.COM', '04167151596', 'AV ANDRES BELLO EDIFICIOS LAS FUNDACIONES', 5, 'NO ME RECUERDO MI CLAVE', '2015-01-17 02:44:29'),
(259, 9063820, 'DOMINGO ALBERTO CARR', 'CARRILLO ARNAL', 'alexanderd-21@hotmail.com', '0212-352-64-60', 'CARACAS QUINTA CRESPO', 10, 'CUANDO PODRE BENEFICIARME CON ESTE IMPORTANTE SERVICIO PARA TODOS LOS TRABAJADORES Y TRABAJADORAS.', '2015-01-18 16:01:26'),
(260, 8511659, 'HERMINIO FRANCISCO', 'ESCALONA', 'HERMINIOFESCALONA@GMAIL.COM', '04127789103', 'VALENCIA EDO CARABOBO', 9, 'COMPRA', '2015-01-19 15:25:06'),
(261, 19852485, 'KATHERINE', 'ZAMORA', 'katzam1990@hotmail.com', '04141505652', 'SEDE CENTRAL', 10, 'USUARIO O CONTRASEÑA INVALIDO', '2015-01-19 16:26:31'),
(262, 9414561, 'gladys ', 'silva', 'tibisay.561@hotmail.com', '04162482612', 'esquinael carmen av. baralt', 10, 'se me olvido mi contraseña quisiera que me la reponierano dar acceso para introducir una nueva\r\n', '2015-01-19 16:26:33'),
(263, 9416306, 'pedro ', 'Lopez', 'palopezsuarez@hotmail.com', '04262516275', 'quinta crespo', 10, 'Buenas tardes mi problemas es que olvide la clave de usuario para hacer mis compras y cuando intento recuperarla el sistema me envia un mensaje diciendo que no estoy registrado por favor agradezco su prontan ayuda gracias', '2015-01-19 16:48:04'),
(264, 12579213, 'RAMON', 'COLINA', 'klyvrosa@hotmail.com', '04127596882', 'Cagua/Seguridad/Cagua', 9, 'No puedo recuperar la contraseña, ya he colocado mis datos correctamente y el sistema muestra un error\r\n', '2015-01-19 16:49:29'),
(265, 15585325, 'yelimar', 'ures', 'yelimarures|@gmail.com', '04120212397', ' sede principal Caracas Quinta crespo', 10, 'Olvide mi contraseña y al pedir recuperacion el sistema me arroja  un erro, me dice que no estoy registrada en el sistema...po favor requiero su ayuda para recuperar la clave... gracias.', '2015-01-19 16:52:54'),
(266, 12420926, 'YNES ALEXANDRA', 'PEASPAN', 'alexaynesp@gmail.com', '04243222803', 'Recursos Humanos', 9, 'Olvido de clave, le doy recuperar clave y me dice que no estoy registrada. Me registro y dice que ya estoy registrada. Como puedo solventar para poder realizar mi pedido que es del 19 al 21 de este mes. (Enero)', '2015-01-19 17:03:12'),
(267, 12096586, 'CELIA ', 'MENDOZA', 'celiaka74@hotmail.com', '04164159656', 'ADMINISTRACIÓN. OFICINA DE VIATICOS', 10, 'SE ME OLVIDO LA CLAVE Y LE DOY A RECUPERAR CLAVE Y ME DICE QUE LOS DATOS SON ERRONEOS..', '2015-01-19 17:04:21'),
(268, 9004875, 'Zuleida ', 'Canelón', 'canelazully@hotmail.com', '04164010625', 'Redes en Servicio de Alimentación', 10, 'se me olvido la clave', '2015-01-19 17:33:46'),
(269, 11938822, 'Niuman Alexis', 'Carrasquel Mejia', 'niumanc@hotmail.com', '04266053610', 'Central, Dir. Redes de Serv. Alim. Av. Baralt Esq. Carmen ', 10, 'Se me olvido la clave para entrar a la compra virtual por fa para que me indique como puedo recuperarla ya que le doy al icono de recuperar clave y me indica error en el sistema que el usuario no esta en la data gracias ', '2015-01-19 17:43:27'),
(270, 13151934, 'jose  ramon', 'tiapa', 'jramontiapa@hotmail.com', '04161461362', 'Avenia Gran Mariscal Parcela nro 1 corinsa', 9, 'recuperacion de clave mercado en linea Venalcasa\r\n', '2015-01-19 17:52:24'),
(271, 10111401, 'aisa del valle', 'aguirre marquez', 'aisaguirre07@gmail.com', '04267132622', 'sede central', 10, 'Cuando introduzco el numro de cedula para recuperar la clave me dice que los datos suministrados no se encuentran registrados a pesar de que me registre y realice la en  diciembre 2014', '2015-01-19 17:57:37'),
(272, 7959160, 'FLOR MARIANA  ', 'FUENTES GARCIA', 'marianafonts@hotmail.com', '04262043836', 'Sede Central- Quinta Crespo . Caracas', 10, 'Olvide contraseña', '2015-01-19 18:03:54'),
(273, 17166689, 'bladimir ', 'torres', 'wladimir@84t@gmail.com', '04241780007', 'sede central', 10, 'no puedo acceder dice contraseña incorrecta y cuando le doy recuperar me dice que mis datos no existen en la base de datos y cuando me registro nuevamente ..como por primera vez me dice que estoy registrado', '2015-01-19 18:34:39'),
(274, 19373800, 'CARLOS EDUARDO ', 'ZAMORA RODRIGUEZ', 'z_cr_21@hotmail.com', '04129583667', 'SEDE PRINCIPAL', 10, '', '2015-01-19 18:42:16'),
(275, 6521378, 'jazmin ', 'quijada', 'jquijadacarrero@gmail.com', '04142801153', 'presupuesto', 10, 'no puedo acceder dice contraseña incorrecta y cuando le doy recuperar me dice que mis datos no existen en la base de datos y cuando me registro nuevamente ..como por primera vez me dice que estoy registrada. Gracias por la atencion prestada\r\nAtentamente\r\nJazmin Quijada\r\nC.I. 6.521.378', '2015-01-19 18:44:38'),
(276, 14206024, 'EYLIN', 'MARTINEZ', 'eylinmartinez_25@hotmail.com', '04246781480', 'quinta crespo', 10, 'no recuerdo la clave para entrar...', '2015-01-19 18:47:17'),
(277, 19070480, 'MARCOS', 'PEREZ', 'GASTRONOMIA27@GMAIL.COM', '04129333574', 'QUINTA CREPO', 10, 'TENGO PROBLEMAS PARA ACCEDER A LA COMPRA NO ME DA LA CLAVE ME DICE INCORRECTA LE DOY A RECUPERAR Y DICE QUE NO ESTOY REGIDTRADO Y LE DOY A REGISTAR Y DICE QUE ESTOY REGISTRADO ', '2015-01-19 18:55:04'),
(278, 13151934, 'jose ramon ', 'tiapa', 'jramontiapa@gmail.com', '0411461362', 'av gran mariscar de ayacuchoparsela 1 zona industrial', 9, 'no puedo recuperar mi claves', '2015-01-19 18:55:12'),
(279, 5390605, 'luisa', 'guzman', 'laguz07@hotmail.com', '04167091182', 'central', 10, 'se me olvido la clave y es imposible recuperarla como podria recuperarla', '2015-01-19 18:55:44'),
(280, 23640903, 'yosman eduardo', 'coa velasco', 'yosman231@gmail.com', '04149238153', 'sede central , bienes nacionales , av baral esq el carmen ', 10, 'quiero rejistrame por primera vez , y no puedo por que me dice que ya estoy rejistrado ingreso en olvide contraceña y ingreso en los datos que me solicita y dice que esos datos no se han rejistrado y no entiendo', '2015-01-19 19:08:11'),
(281, 10957234, 'maribel aida', 'ramirez perez', 'mar.687@gmail.com', '0412-3744818', 'sede central recursos humanos bienesatar social', 10, 'no puedo accesar para realizar la compra por olvido de la clave, agradezco por favor ayudar a recuperarla', '2015-01-19 19:08:13'),
(282, 10631255, 'glenis', 'muñoz', 'glenissocorro@hotmail.com', '0412-2393092', 'inn quinta crespo departamento de bienes nacionales', 10, ' Buenas tardes ... olvide la clave, coloco la opcion RECUPERAR y sale que NO ESTOY REGISTRADA... entonces trato de registrame de nuevo y aparece que YA ESTOY REGISTRADA. gracias por su apoyo', '2015-01-19 19:17:29'),
(283, 19031418, 'MADORKAY', 'DURAN', 'mmduran@inn.gob.ve', '04166123778', 'Oficicna de sistema y tecnologia de informacion', 10, 'no puedo ingresar a intravenalcasa, olvide la clave y cuando intento recuperarla me dice que los datos no son correctos.\r\n\r\n\r\nagradezco su apoyo. feliz dia', '2015-01-19 19:17:31'),
(284, 6189710, 'CELIA MARGARITA ', 'MEDINAS TORRES', 'LISVANYMAYERLIN20@HOTMAIL.COM', '04266123445', 'SEDE CENTRAL', 10, 'OLVIDO DE CONTRASEÑA', '2015-01-19 19:18:03'),
(285, 4042998, 'FRANCISCO', 'VELASQUEZ', 'FRANCISCOINN@HOTMAIL.COM', '04265179590', 'CONTABILIDAD', 10, 'NO PUEDO RECUPERAR MI CLAVE ', '2015-01-19 19:22:37'),
(286, 18614738, 'Crismari', 'Chaparro', 'crismcha@hotmail.com', '04162761355', 'caracas', 10, '', '2015-01-19 19:43:53'),
(287, 13437467, 'JACLYN', 'ROJAS', 'JACLYNROJAS@GMAIL.COM', '04241133914', 'QUINTA CRESPO', 10, 'NO PUEDO INGRESAR AL SISTEMA A PESAR QUE YA ME HABIA REGISTRADO EN DICIEMBRE', '2015-01-19 19:44:15'),
(288, 18614738, 'Crismari', 'Chaparro Blanco', 'crismcha@hotmail.com', '04162761355', 'Caracas', 10, 'Buenas tardes, por medio de la presente notifico tener inconvenientes para acceder a la pag y realizar la compra de alimentos ', '2015-01-19 19:51:37'),
(289, 2718539, 'MARINO', 'LANDAETA', 'marinolan45@hotmail.com', '04167182528', 'SEDE CENTRAL ADMINISTRACION CONTROL BANCARIO', 10, 'POR FAVOR SE ME OLVIDO MI CLAVE PARA INGRESAR AL SISTEMA  VENEALCASA ME PODRIAN ENVIAR MI CLAVE A TRAVES DE MI CORREO ELECTRONICO DISCULPEN LA MOLESTIA Y MUCHAS GRACIAS.  ', '2015-01-19 20:06:37'),
(290, 5969231, 'MIRIAM', 'SANCHEZ', 'sanchez.anderson@hotmail.com', '04162025426', 'quinta crespo', 10, 'no me agarra la clave y dice que no estoy registrada espero su respuesta gracias ', '2015-01-19 20:09:42'),
(291, 6520922, 'FRANK', 'CADENAS', 'fjc147@hotmail.com', '04143303447', 'Sede Central, RRHH, Bienestar Social', 10, 'Buenas tardes, no recuerdo mi clave de acceso, intento recuperarla introduciendo mi Nº de cédula y fecha de nacimiento y el sistema me indica que los datos no estan registrados. Intento registrarme nuevamente y me indica que ya estoy registrado. Gracias por su atención.', '2015-01-19 20:12:35'),
(292, 21089415, 'GENESIS MILAGROS ', 'ROJAS MEJIAS', 'genesis-@hotmail.com', '04268045527', 'avenidad andres bello ', 5, '', '2015-01-19 20:22:46'),
(293, 13829540, 'EDELVIS ', 'SUAREZ', 'EDELVIS11@HOTMAIL.COM', '04141553066', 'COORDINACION DE INFRAESTRUCTURA', 5, 'OLVIDO DE CONTRASEÑA Y NO ME PERMITE RESTABLECERLA', '2015-01-19 20:47:06'),
(294, 14195777, 'juan jose ', 'torrealba', 'jj01101976@hotmail.com', '04128003394', 'quinta crespo   calle san juan', 10, '', '2015-01-19 20:47:16'),
(295, 14195777, 'juan jose ', 'torrealba', 'jj01101976@hotmail.com', '04128003394', 'quinta crespo   calle san juan', 10, '', '2015-01-19 20:47:20'),
(296, 14195777, 'juan jose ', 'torrealba', 'jj01101976@hotmail.com', '04128003394', 'quinta crespo   calle san juan', 10, '', '2015-01-19 20:47:21'),
(297, 13953344, 'ORLEANA', 'ECHENAGUCIA', 'OECHENAGUCIA@CEALCOVE.COM', '04169865717', 'RECURSOS HUMANOS', 9, 'NO PUEDO ACCEDER A MI PAG DE COMPRAS , NO PUEDO RECUPERAR MI CLAVE', '2015-01-19 20:48:58'),
(298, 16474284, 'douglas enrique', 'fagundez hernandez', 'fagundezdouglas@hotmail.com', '04140173620', 'central ', 10, 'no puedo acceder para poder realizar mis comprar, y no puedo recuperar mi clave', '2015-01-19 20:52:36'),
(299, 19875409, 'Josbel', 'Marcano', 'josbelmarina@gmail.com', '04249550740', 'Sede principal Caracas', 10, 'Buenas tardes, escribo porque cuando voy a ingresar no me reconoce ni el usuario ni la clave y cuando voy a hacer cambio de clave me dice que no estoy en sistema pero cuando me voy a registrar me dice que ya estoy en sistema. \r\nQuisiera en la medida de lo posible saber cómo se soluciona este caso.\r\n\r\nGracias de antemano,', '2015-01-19 21:20:41'),
(300, 6056417, 'jairo ', 'marquez', 'jahumali@hotmail.com', '04168890085', 'AV Baralt sede principal', 10, 'no puedo recuperar mi clave, aun colocando mi num de ci y mi fecha de nacimiento', '2015-01-19 21:23:59'),
(301, 13103215, 'RICHARD DANIEL', 'CABELLO HERNANDEZ', 'richard.cabello03@gmail.com', '0412 0391255', 'VALENCIA', 9, 'No puedo recuperar mi clave de acceso al mercado virtual.', '2015-01-19 22:41:05'),
(302, 12259420, 'Indira', 'Peña', 'ifpm@hotmail.es', '04242809929', 'CENHB', 10, 'OLVIDO DE CLAVE, Y NO PUEDO RECUPERAR X EL SISTEMA DICE QUE NO ESTOY REGISTRADA', '2015-01-19 23:18:52'),
(303, 11489203, 'ZULEIMA', 'MERECUANE', 'zuleimamerecuane@hotmail.com', '04167703339', 'centro de especialidades nutricionales hipolita y bolivar', 10, 'se me olvido la cleve de acceso', '2015-01-20 00:11:32'),
(304, 9417702, 'Gladied ', 'Duran Guerrero', 'gladuran@hotmail.com', '0416-9008563', 'Av. Baralt', 10, 'Ya hice una compra en el mes de Diciembre, pero para hacerla ahora, no recuerdo la clave e tratado de recordala pero nada me he metido en la opcion de recupelarla pero tampoco e podido resolver, porfavor si me ayuda a recuperla o a crear otra nueva para poder comprar gracias...', '2015-01-20 00:13:22'),
(305, 8184441, 'JOSE', 'TOVAR', 'CRISTHIANPAO@GMAIL.COM', '04266062469', 'PRINCIPAL/ SEGURIDAD/', 10, 'MUY BUENAS TARDES LA PRESENTE ES PARA INFORMARLES QUE NO PUEDO INGRESAR A MI USUARIO PARA REALIZAR COMPRAS. Y SOLICITAR EL REENVIÓ  DE MI CONTRASEÑA.', '2015-01-20 00:14:39'),
(306, 13747902, 'Dafne Marisela ', 'Barahona', 'dafbarahona@gmail.com', '04167257593', 'Redes de Alimentación', 10, 'Me niega el acceso, dice que mis usuario, contraseña o capcha son incorrectas pese a que son mis datos registrados', '2015-01-20 00:46:43'),
(307, 10180301, 'jesus alberto', 'alvarez', 'jesusalbert.a@hotmail.com', '04249373378', 'sede central', 10, 'aparece que estoy registrado y no puedo recuperar mi clave gracias.\r\n', '2015-01-20 01:06:19'),
(308, 6362091, 'jose francisco', 'navas caguama', 'jofra160@hotmail.com', '04142683012', 'av. andres bello edificio la revolucion', 5, 'no puedo ingresas a la pagina para solicitud del mercado', '2015-01-20 01:35:20'),
(309, 18400934, 'ELIS', 'MONTANER', 'ALEXMONTANER11@GMAIL.COM', '04264888608', 'SEDE CENTRAL', 10, 'BUENAS NOCHES\r\nNO PUEDO INGRESAR AL SISTEMA DE VENALCASA ME DICE QUE EL USUARIO O CONTRASEÑA ES INVALIDO; QUISE RECUPERAR LA CONTRASEÑA ME SALE QUE NO SALGO REGISTRADO EN EL SISTEMA, NECESITO QUE ME ORIENTE POR FAVOR COMO PUEDO HACER PARA PODER REALIZAR LA COMPRA...\r\nSALUDO Y GRACIAS POR LA AYUDA QUE PUEDAN BRINDAR', '2015-01-20 01:36:31'),
(310, 15818079, 'MAURIS ANTONIO ', 'CARRILLO CARRASQUEL', 'mauriscarrillo@hotmail.com', '04144639989', 'Cagua', 9, 'Olvide mi clave para entrar a mi usuario en Intravenalcasa y me dice que no estoy en la base de datos. mis datos son:\r\nCedula de Identidad 15.818.079\r\nFecha de Nacimiento 21/09/1981', '2015-01-20 02:37:42'),
(311, 6364336, 'EVA JULIA', 'FLORES VALDEZ', 'EVAJULIAF@HOTMAIL.COM', '04161915538', 'AV EL CEMENTERIO', 10, ' NO SE COMO ENTRAR EN LA PAGINA DE MI COMPRA VENALCASA', '2015-01-20 04:23:31'),
(312, 11851172, 'samuel', 'polanco', 'samueljose709@gmail.com', '04169092449', 'quinta crespo', 10, 'tengo un problema en tratar de regitrarme en el sistema ya que cuando introdusco  los datos sale que estoy regitrado como hago para resolver el problema gracias', '2015-01-20 09:59:13'),
(313, 6801132, 'Ligia Moraima', 'Guerra de Parra', '  RENEE_ ANAIS@ hot.mail.com', ' 04166881515', '     AV. .BARALT ESQUINA EL CARME EDIF.INN', 10, '  olvido de clave', '2015-01-20 11:51:22'),
(314, 5580208, 'ELDA', 'CADENAS', 'eldacadenas@hotmail.com', '04261940278', 'El Cementerio', 10, 'No puedo abrir la orden de comprar para imprimirla, agradeceria mucho su ayuda... gracias.....', '2015-01-20 12:14:40'),
(315, 9416254, 'IRMA', 'CASTRO', 'irmitaroac@hotmail.com', '04162164450', 'QUINTA CRESPO CARACAS', 10, 'NO LOGRO ACCESAR DICE QUE ALGUN DATO DE LOS SOLICITADOS ES INCORRECTO', '2015-01-20 12:19:19'),
(316, 12481813, 'ELVYS COROMOTO', 'RODRIGUEZ OROPEZA', 'erodriguez@cealcove.com', '04124969498', 'CAGUA/ADMINISTRACION/', 9, 'NO PUEDO INGRESAR ME DICE CLAVE INVALIDA CUANDO TILDO EN LINK DE OLVIDO SU CLAVE O CONTRASEÑA ME DICE QUE LOS DATOS(CEDULA, FECHA DE NACIMIENTO) NO ESTAN REGISTRADOS POR MI. SIN EMBARGO AL TRATAR DE REGISTRARME NUEVAMENTE ME DICE QUE YA ESTOY REGISTRADA.', '2015-01-20 12:33:49'),
(317, 10455942, 'CARMEN ELENA', 'MARTINEZ DE OROZCO', 'IBISLUGO@GMAIL.COM', '04269491181', 'CORINSA, ADMINISTRACION, CAGUA', 9, 'ERROR EN LA PAGINA Y NO ME DEJA RECUPERAR CLAVE ', '2015-01-20 12:34:16'),
(318, 10455942, 'CARMEN ELENA', 'MARTINEZ DE OROZCO', 'IBISLUGO27@GMAIL.COM', '04269491181', 'CORINSA, ADMINISTRACION, CAGUA', 9, 'error cuando voy a recuperar la clave \r\n', '2015-01-20 12:43:16'),
(319, 8300624, 'JULIO', 'MAIZ', 'juliojmaiz58@hotmail.com', '04141966576', 'sede', 10, 'buenos dias, olvide mi clave de acceso al sistema de compra... por favor reiniciar para volver a realizar mi registro... gracias.', '2015-01-20 13:16:24'),
(320, 17060383, 'hexons', 'gonzalez', 'hexon87@hotmail.com', '04128005436', 'sede', 10, 'buenos dias, olvide mi clave de acceso al sistema de compra... por favor reiniciar para volver a realizar el registro.. muchas gracias', '2015-01-20 13:19:35'),
(321, 4590975, 'CLAUDIO ', 'ESPINOZA', 'claudio_marulanda@hotmail.com', '04125699436', 'sede principal, caracas', 10, 'No puedo ingresar al sistema de vanalcasa para la compra ', '2015-01-20 13:29:22'),
(322, 11945049, 'ZULY', 'ALARCON', 'ALARCOZH@GMAIL.COM', '04165828192', 'AV. BARALT', 10, 'NO PUEDO INGRESAR A LAS COMPRAS', '2015-01-20 13:31:37'),
(323, 6389962, 'elizabeth', 'barnique de amaya', 'elizabeth.barnique@gmail.com', '04141061300', 'instituto nacional de nutricion', 3, 'olvido de clave', '2015-01-20 13:31:50'),
(324, 6073649, 'dilia estefano ', 'blanco chave', 'Coco11@gmail.com', '04169266847', 'sede central servicios generales', 10, 'no recuerdo mi clave, y no logro recuperarla segun el  procemiento indicado por ustedes, agradezco la atención y recuperación de la clave.', '2015-01-20 13:53:24'),
(325, 6056417, 'Jairo Humberto', 'Marquez Liendo', 'jahumali@hotmail.com', '04168890085', 'Av Baralt Edif Sede INN', 10, 'no puedo recuperar mi clave para realizar la compra', '2015-01-20 14:06:04'),
(326, 13889271, 'LUIS ALBERTO', 'URIBE GUERRA', 'LURIBE@CEALCOVE.COM', '04124460856', 'VALENCIA', 9, 'RECUPERAR CONTRASEÑA', '2015-01-20 14:08:06'),
(327, 21072332, 'LAURA', 'ROJAS', 'LAURA_66_1@HOTMAIL.COM', '04149159945', 'SEDE CENTRAL', 10, 'NO APAREZCO EN LA BASE DE DATO, NO ES POSIBLE REGISTRARME', '2015-01-20 14:10:47'),
(328, 6364336, 'EVA', 'FLORES', 'evajuliaf@hotmail.com', '04161915538', 'quinta crespo', 10, 'no puedo entrar al sistema y le doy a recuperar y me dice q no estoy regristrada y despues me voy a afiliarme y me dice que ya estoy afiliada', '2015-01-20 14:11:43'),
(329, 11160860, 'edith', 'perez', 'elwilmer2010@hotmail.com', '04141348743', 'central', 10, 'se me olvido contraseña para poder ingresar y solicitar mi compra.', '2015-01-20 14:12:05'),
(330, 15714479, 'GARVY', 'HERNANDEZ', 'garvyhernandez@hotmail.com', '04168323558', 'SEDE CENTRAL', 10, 'SE ME OLVIDO LA CONTRASEÑA PARA PODER INGRESAR AL SISTEMA Y PODER REALIZAR MI SOLICITUD DE COMPRA', '2015-01-20 14:15:00'),
(331, 16287279, 'MARIA', 'ESCALONA', 'ROBERTDAVID19042007@HOTMAIL.COM', '04242028084', 'QUINTA CRESPO', 10, 'NO ME PERMITE ENTRAR AL SISTEMA Y MARCO PARA RECUPERAR CLAVE Y DICE QUE NO ESTOY EN SISTEMA... COMO HAGO PARA RECUPERAR Y PODER ENTRAR..', '2015-01-20 14:25:29'),
(332, 16203036, 'EVERLIN', 'URBINA', 'EVELYNURBINA15@HOTMAIL.COM', '04141529356', 'QUINTA CRESPO', 10, 'BUENOS DIAS EL SISTEMA NO ME PERMITE INGRESAR CON MI CLAVE,LE DOY RECUPERAR CLAVE Y NO ME PERMITE LA SOLICITUD. AGRADEZCO SU PRONTA COLABORACION.', '2015-01-20 14:29:15'),
(333, 9417702, 'Gladied', 'Duran Guerrero', 'gladuran@hotmail.com', '0416-4292830', 'Av. Baralt', 10, 'SE ME OLVIDO LA CLAVE Y NO PUEDO RECUPERARLA NI PUEDO VOLVERME A INSCRIBIR,  ALLER LES ENVIE UN MENSAJE PERO EL NUMERO QUE COLOQUE ESTA SUSPENDIDO POR FAVOR SI SE COMUNICAN HACERLO POR ESTE QUE LES ESTOY ENVIANDO GRACIAS Y ESPERO PRONTA RESPUESTA YA QUE HAS EL VIERNES TENGO CHANCE DE COMPRAR', '2015-01-20 14:31:01'),
(334, 14988607, 'Iverson ali', 'Canelon Torres', 'iversoncanelon@gimail.com', '04265175839', 'sede central', 10, 'olvido de clave,  ', '2015-01-20 14:41:15'),
(335, 19736194, 'Claudia Patricia', 'Guevara Pulido', 'claudia_2324@hotmail.com', '04263133301', 'Quinta Crespo', 10, 'Buenos dias, tengo problemas al recuperar mi clave. Olvide la clave secreta y cuando voy a recuperarla me dice que los datos suministrados no son correctos y que no aparezco registrada. Agradezco la mayor colaboración posible para solventar dicho problema. Gracias', '2015-01-20 15:08:14'),
(336, 5009491, 'LIUBA COROMOTO', 'CARDENAS GONZALEZ', 'liuba1410@yahoo.com.mx', '04129702312', 'INN, Sede Central, Direcciòn SISVAN, Av. Baralt, Qta Crespo, Caracas.', 3, 'Según sugerencias en el formato de registro, Hice cambio de clave antes de hacer la compra el mes pasado (diciembre). Ahora al intentar la compra para el mes de enero, me dice clave errada y no me permite recuperar la clave, enviè correo a la dirección indicada pero no he recibido respuesta. gracias.', '2015-01-20 15:30:56'),
(337, 31046657, 'GAUDRIS ', 'CUTIÑO', 'gaudriscuba222@hotmail.com', '0424-2845309', 'DIRECCION DE RECURSOS HUMANOS', 10, 'NO APAREZCO REGISTRADO EN BASE DE DATOS, CUEQUEA,OPS TXT ENVIADO POR LA DIRECCION DE RECURSOS HUMANOS Y MI NUMERO DE CEDULA APARECE EN EL MISMO', '2015-01-20 15:33:21'),
(338, 13612775, 'haydy maria', 'figuera', 'haydymaria@hotmail.com', '04122006994', 'CENHB', 10, 'olvide la clave de acceso y no me reconoce el correo ni los datos registrados `para una nueva contraseña. Que puedo hacer?', '2015-01-20 15:42:50'),
(339, 6364336, 'EVA JULIA', 'FLORES VALDES', 'evajuliaf@ hotmail.com', '04161915538', 'hipolita bolivar', 10, 'recuperar clave para la compra', '2015-01-20 15:56:46'),
(340, 14666632, 'andreina', 'paulo', 'apaulo120@hotmail.com', '04169053697', 'consultoria juridica', 10, 'estoy registrada pero no puedo ingresar', '2015-01-20 16:26:54'),
(341, 15714479, 'garvy', 'hernandez', 'lenoelhernandez@gmail.com', '04168323558', 'central', 10, 'Se olvido mi contraseña', '2015-01-20 17:00:37'),
(342, 14474898, 'kervin', 'alzualde', 'elivalzualde@hotmail.com', '04125488324', 'Servicios Generales', 10, 'Imposible entrar por olvido de clave y al intentar recuerar dice que no hay datos.', '2015-01-20 18:01:17'),
(343, 4213280, 'ZULEIMA', 'LEMUS', 'ZULEIMA.LEMUS50@HOTMAIL.COM', '04149061788', 'AV. BARALT - QTA. CRESPO', 10, 'NO PUEDO RECUPERAR CLAVE PARA ENTRAR A LA COMPRA DE ALIMENTOS DE VENALCASA', '2015-01-20 18:36:32'),
(344, 5770818, 'tomasa ', 'briceño', 'sugleyvasquez@hotmail.com', '04167120431', 'sede', 10, 'no pedo comprar puesto que olvide mi clave', '2015-01-20 18:42:54'),
(345, 18809914, 'haisbely ', 'panza', 'panza.h@hotmail.com', '04125413444', 'Sede central. Quinta crespo.Edificion INN', 10, 'no recuerdo mi contraseña , podrian reenviarmela a mi correo por favor ', '2015-01-20 18:48:25'),
(346, 6360033, 'BELLA DOLORES', 'ACEVEDO RAMIREZ', 'bellaobatala@hotmail.com', '0416 4031476', 'Gerencia de Proyectos y Obras', 10, 'no puedo accesar al formulario para hacer mi solicitud de compra', '2015-01-20 18:51:47'),
(347, 6360033, 'BELLA DOLORES', 'ACEVEDO RAMIREZ', 'bellaobatala@hotmail.com', '0416 4031476', 'Gerencia de Proyectos y Obras', 10, 'no puedo accesar al formulario para hacer mi solicitud de compra', '2015-01-20 18:52:09'),
(348, 11160860, 'edith', 'perez', 'elwilmer2010@hotmail.com', '04141348743', 'central', 10, 'se me olvido contraseña para poder ingresar y solicitar mi compra.', '2015-01-20 19:22:58'),
(349, 13103215, 'Richard', 'Cabello', 'richard.cabello03@gmail.com', '04120391255', 'Planta Valencia', 9, 'olvide la clave de acceso al portal para realizar el mercado en linea y la opcion de recuperacion no me lo permite. solicito su ayuda para poder disfrutar de este beneficio. gracias.', '2015-01-20 19:47:48'),
(350, 12484902, 'marcia', 'belisario', 'marcia-099@hotmail.com', '04241203054', 'sede', 10, 'le escribo ya que se me olvido mi clave de acceso y no me permite cambio de clave como hago gracias ', '2015-01-20 19:59:20'),
(351, 4884614, 'ESTHER MARINA ', 'Carvajal', 'esthemari@hotmail.com', '04168174478', 'Av Baralt Qta. Crespo', 10, 'buenas tardes soy jubilada y estoy tratando de registrarme para poder adquirirde las compras y me dice que ya estoy registrada y no es correcto  me piden una clave que no poseo ya que no he sido registrada agradeceria una pronta solucion....', '2015-01-20 21:34:25'),
(352, 24982132, 'genesis', 'marrufo', 'genesis.marrufo.54@facebook.com', '04263109813', 'plaza venezuela', 5, '', '2015-01-20 21:49:12'),
(353, 15585325, 'YELIMAR JORGELIA URE', 'ures', 'yelimarures@gmail.com', '04120212397', 'caracas, quinta crespo', 10, 'no recuerdo mi contraseña para acceder al sistema y al pedir recuperacion de la misma no me la dan porque dice que no me encuentro registrada...', '2015-01-20 21:49:53'),
(354, 15585325, 'YELIMAR JORGELIA URE', 'ures', 'yelimarures@gmail.com', '04120212397', 'principal quinta crespo', 10, '', '2015-01-20 22:02:51'),
(355, 17971497, 'isabel', 'machado rodriguez', 'bel18_3@hotmail.com', '04168323543', 'av baralt quinta crespo', 10, 'no recuerdo mi clave y la opcion recuperar clave no funcion a dice que no estoy registrada. fecha nac 18-8-86', '2015-01-20 22:08:33'),
(356, 4590975, 'Claudio', 'Espinoza', 'claudio_marulanda@hotmail.com', '0212- 2512774', 'Sede central, Caracas', 10, 'Ya pude entrar ', '2015-01-20 22:16:22'),
(357, 21072332, 'LAURA', 'ROJAS', 'laura_66_1@hoitmail.com', '04149159945', 'estudios nutricionales', 10, 'no puedo registrarme dice que mis datos no se encuentran en la base de datos ', '2015-01-20 22:48:39'),
(358, 13686711, 'jhonny', 'montilla', 'jhonnymontillab@gmail.com', '04261170267', 'chacaito', 5, 'ninguna', '2015-01-21 00:17:37'),
(359, 13686711, 'jhonny', 'montilla', 'jhonnymontillab@gmail.com', '04261170267', 'chacaito', 5, 'no aparece el usuario para poder hacer la compra', '2015-01-21 00:22:47'),
(360, 12374293, 'luis ', 'mogollon', 'luismogollon670@hotmail.com', '04122074934', 'seguridad', 10, 'No puedo ingresar a lista de compra\r\nY no recuerdo la clave', '2015-01-21 01:15:43'),
(361, 15142135, 'Lesbia Yudith', 'Matheus', 'matheusjudith@gmail.com', '04262217399', 'Caracas', 10, 'Buenas noches tengo problemas para entrar al sistema, al introducir los datos para recuperar la clave me dice que son invalidos, lo que yo presumo es que cuando me registraron tal vez colocaron mal mi fecha de nacimiento la cual es 07/04/1978, gracias por la atencion.', '2015-01-21 01:25:42'),
(362, 12374293, 'luis ', 'mogollon', 'luismogollon670@hotmail.com', '04122074934', 'seguridad', 10, 'Olvide la clave por favor ayudenme', '2015-01-21 02:00:56'),
(363, 6364336, 'EVA JULIA FLORES VAL', 'flo', 'EVAJULIAF@HOTMAIL.COM', '04161915538', 'hipolita bolivar', 10, 'clave besecito desbloquearla y una clave nueva\r\n', '2015-01-21 02:24:01'),
(364, 2036055, 'RUPERTA ', 'ESCALONA', 'RUPER42@HOTMAIL.COM', '02125516157', 'SAN BERNARDINO', 10, '', '2015-01-21 14:30:10'),
(365, 15911, 'johnnathan', 'olivo', 'ambaefitness@gmail.com', '04123991550', 'quinta crespo', 10, 'No se puede ingresar al sistema con la contraseña y al realizar la recuperacion me dice que los datos no existen.', '2015-01-21 15:12:41'),
(366, 23152928, 'MARTHA ', 'OLARTE', 'marthysu@gmail.com', '04161741007', 'QUINTA CRESPO', 10, 'NO RECUERDO MI CLAVE. POR FAVOR ASIGNAR UNA CLAVE DE ACCESO GRACIAS.', '2015-01-21 15:28:39'),
(367, 11924475, 'Pavel Alexander', 'Marquez Serrano', 'alexander475@hotmail.com', '04242288213', 'Principal Quinta Crespo', 10, 'se me  olvido la clave de  ingreso', '2015-01-21 15:40:45'),
(368, 23152928, 'MARTHA', 'OLARTE', 'marthysu@gmail.com', '04161741007', 'QUINTA CRESPO', 10, 'gracias ya recorde mi clave', '2015-01-21 15:41:42'),
(369, 6836569, 'YAJAIRA', 'SUMOZA PINTO', 'LERIAMVI@HOTMAIL.COM', '04125530736', 'SEDE CENTRAL', 10, 'NO PUEDO RECUPERAR MI CLAVE ME DICE DATOS INVALIDOS', '2015-01-21 16:03:45'),
(370, 3158694, 'juana evangelista', 'pacheco', 'juanapacheco5@Gmail. com', '02123223394', 'A baralt', 10, 'No puedo acceder a mi cuenta necesito realizar mi compra', '2015-01-21 17:48:38'),
(371, 16908350, 'ALBERTO', 'FERNANDEZ', 'ALBERTOF229@HOTMAIL.COM', '04129993202', 'SEDE, INSPECTORIA QUINTA CRESPO', 10, 'NO LOGRO INGRESAR AL SISTEMA PARA REALIZAR LA COMPRA VIRTUAL. AL MOMENTO DE INGRESAR MIS DATOS ME ARROJA ERROR LO MISMO PASA CUANDO TRATO DE RECUPERARLOS. GRACIAS POR SU ATENCION, ESPERO SU PRONTA RESPUESTA YA QUE EL TIEMPO LIMITE PARA LA COMPRA ES HASTA EL VIERNES', '2015-01-21 18:23:43'),
(372, 5413299, 'JOSE ENRIQUE', 'VILLAVICENCIO BLANCO', 'josevillavicencio_708@hotmail.com', '04127216022 ', 'SEDE CENTRAL', 10, 'NO PUEDO RECUPERAR CLAVE', '2015-01-21 18:32:11'),
(373, 15587668, 'Eglee', 'Gil', 'eglee.gil@hotmail.com', '04123973155', 'montalban', 10, 'tengo problemas para ingresar al sistema de compras seran tan amable en ayudarme a resetear mi clave el sistema no me deja realizarlo o si se puede borrar mi registro para registrarme de nuevo gracias por su atencion y ayuda', '2015-01-21 18:51:12'),
(374, 20304179, 'GREISKY', 'DOMINGUEZ', 'KALGREYS_JG_1405@HOTMAIL.COM', '04168202875', 'PANADERIA', 5, 'OLVIDE LA CLAVE\r\n', '2015-01-21 19:06:52'),
(375, 3158694, 'juana evangelista', 'pacheco', 'juanapacheco5@Gmail. com', '02123223394', 'Av  baralt', 10, 'No puedo entrar ala página y necesito hacer mis compras', '2015-01-21 19:40:20'),
(376, 5226885, 'MARIO ', 'FLORES', 'MARIOFLORESCARTAGENA@GMAIL.COM', '04167017565', 'DTT. CAPITAL', 10, 'NO RECUERDOLACONTRASEÑA Y NO ME DA LA OPCION PARA RECUPERLA POR FAVOR ESPORO UNA BREVE RESPUESTA PARA PODER HACER MIS COMPRAS GRACIAS Y DISCULPEN LAS MOLESTIAS CAUSADAS ', '2015-01-21 23:39:08');
INSERT INTO `novedad` (`NU_IdNovedad`, `NU_Cedula`, `AL_Nombre`, `AL_Apellido`, `AF_Correo`, `AF_Telefono`, `AF_Ubicacion`, `empresa_NU_IdEmpresa`, `AF_Novedad`, `FE_Registro`) VALUES
(377, 11439325, 'FRANCISCO', 'NUÑEZ', 'franciscojose_nunez@hotmail.com', '04261847654', 'sede', 10, 'aparesco registrado en este , pero no puedo entrar al mismo , ya e comprado por este metodo pero solo tengo oportunidad hasta este dia viernes 22 de enero 2015. me aparesen mis datos como que no existieran  les agradesco la solucion de mi situacion  gracias .', '2015-01-21 23:41:00'),
(378, 17610005, 'VANNESA ', 'VIVAS', 'rolland.vivas@gmail.com', '04241029334', 'Miranda', 10, 'Buen dia, me gustaria saber si podria realizar compras a traves del sistema; pertenezco al INN MIRANDA; gracias de antemano.', '2015-01-22 00:16:03'),
(379, 10627251, 'yunetzy', 'Madrid Monagas', 'yunetzymm@hotmail.com', '04262152306', 'zona metropolitana piso4', 10, 'buenas tardes no entra mi clave para realizar las compras de alimentos', '2015-01-22 00:43:46'),
(380, 11924475, 'PAVEL ALEXANDER', 'MARQUEZ SERRANO', 'ALEXANDER475@HOTMAIL.COM', '04242288213', 'SEDE CENTRAL QTA CRESPO', 10, 'NO PUEDO INGRESAR A LA PAGINA SE ME OLVIDO MI CLAVE', '2015-01-22 14:48:16'),
(381, 17695293, 'maria', 'rodriguez ', 'maggi3060@gmail.com', '04264035751', 'sede, piso 4 oficina EVAN', 10, 'NO PUEDO REALIZAR LA COMPRA PORQUE OLVIDE LA CLAVE, ME VOY AL ENLACE DE RECUPERAR Y ME DICE QUE MIS DATOS SON INCORRECTOS', '2015-01-22 16:15:16'),
(382, 17148636, 'orlando', 'sosa', 'sosa.orlando@hotmail.com', '04266139739', 'sede central', 10, 'Muy buenos días intento entrar con mi clave:2202 y con mi cedula de identidad y me arroja un mensaje de error, el cual me dice q es invalido. Esta escrito correctamente, para que por favor me ayuden a solventar este incoveniente. Tengo chance hasta este viernes de realizar mi compra. Por favor ayudenme. Gracias ', '2015-01-22 16:18:01'),
(383, 16430045, 'coromoto', 'arismendi', 'elvisgarcia518@gmail.com', '04263060083', 'principal', 10, 'no me acuerdo la clave', '2015-01-22 16:39:36'),
(384, 10627251, 'yunetzy', 'madrid monagas', 'yunetzymm@hotmail.com', '04262152306', 'unidad zona metropolitana sisvan', 10, 'buenas tardes no puedo entrar al sistema para realizar mi compra', '2015-01-22 19:23:12'),
(385, 2668046, 'manuel', 'garcia rondon', 'mgarcia@cealcove.com', '04261453907', 'valencia', 9, 'Registrarme', '2015-01-22 20:03:08'),
(386, 11954100, 'diodan', 'davila', 'diodandavila', '04169329299', 'cede central', 10, 'conpra', '2015-01-22 20:29:06'),
(387, 6124920, 'belkis guadalupe', 'garcia silva', 'belcucha64@yahoo.es', '04126259885', 'distrito capital', 10, ' no me acepta el sistema, no tengo puedo entrar a la lista de compras, pero aparezco registrada en sistema ', '2015-01-23 00:48:32'),
(388, 3402975, 'Arevalo Jose', 'Carvajal', 'JoseArevalo64@gmail.com', '02125455803', 'Esquina el carmen quinta crespo inn', 10, '  mis compras\r\n', '2015-01-23 12:16:08'),
(389, 3402975, 'Jose Arevalo', 'Carvajal', 'Josearevalo64@gmail.com', '02125455803', '  Sede central esquina de quinta crespo', 10, '  compras', '2015-01-23 12:21:19'),
(390, 16203304, 'ENDERFER', 'GOMEZ', 'anais.maye@hotmail.com', '04242760559', 'av baralt qt crespò ', 10, 'no me quiere abrir la paguina . ni en recuperacion de clave \r\n', '2015-01-23 13:42:51'),
(391, 9526016, 'yajaira', 'saboya', 'yajairasaboya@gmail.com', '04269086834', 'avenida baralt', 10, 'Buenos dias, por favor acudo a ustedes para que me ayuden en la recuperacion de mi clave. gracias', '2015-01-23 14:00:52'),
(392, 6362545, 'gertrudis margarita', 'torrealba carrion', 'ronieltorre@hotmail.com', '04268165802', 'caracas', 10, 'se me olvido la clave', '2015-01-23 16:33:54'),
(393, 12688360, 'ERNEGLHYS CAROLINA', 'HERNANDEZ RODRIGUEZ', 'ehernandez@inn.gov.ve', '0412 2915608', 'ADMINISTRACION Y FINANZAS', 10, 'BUEN DIA, NO RECUERDO MI CLAVE, Y EL SISTEMA NO ME PERMITE RECUPERARLA,¿COMO PUEDO SOLUCIONAR ESTO PARA REALIZAR MI COMPRA?', '2015-01-23 18:41:19'),
(394, 4217396, 'JOSE ANIBAL', 'CARMONA CURBATA', 'CURBATAJOSE@HOTMAIL.COM', '04165806583', 'QUINTA CRESPO', 10, 'AL INTENTAR RECUPERAR MI CLAVE, QUE INTRODUSCO LOS DATOS ME APARECE QUE NO ESTOY REGISTRADO EN EL SISTEMA, PERO CUANDO INTENTO REGISITRARME COMO NUEVO A VER SI FUE QUE QUE BORRO EL REGISTRO ME DICE QUE YA ESTOY REGISTRADO PERO NO ME EMITE LA RECUPERACION DE MI CLAVE EN ESTE SENTIDO QUE DEBO HACER GRACIAS', '2015-01-23 20:22:35'),
(395, 17390845, 'Bethzabeth', 'Azuaje', 'bethzabyar@gmail.com', '04261357901', 'OCRI', 10, 'El sistema no me permite realizar mi compra cuando intento recuperar la clave me dice que los datos son incorrectos', '2015-01-23 20:30:32'),
(396, 4217396, 'JOSE ANIBAL', 'CARMONA CURBATA', 'CURBATAJOSE@HOTMAIL.COM', '04165806583', 'QUINTA CRESPO', 10, 'AL INTENTAR RECUPERAR MI CLAVE, QUE INTRODUSCO LOS DATOS ME APARECE QUE NO ESTOY REGISTRADO EN EL SISTEMA, PERO CUANDO INTENTO REGISITRARME COMO NUEVO A VER SI FUE QUE QUE BORRO EL REGISTRO ME DICE QUE YA ESTOY REGISTRADO PERO NO ME EMITE LA RECUPERACION DE MI CLAVE EN ESTE SENTIDO QUE DEBO HACER GRACIAS', '2015-01-23 20:32:15'),
(397, 14574984, 'CARLOS FUENTES', 'fuentes', 'fuenteslt@gmail.com', '04167267545', 'sede principal', 10, 'no me recuerdo la clave', '2015-01-23 20:47:00'),
(398, 25051222, 'Angel', 'Garcia', 'g_angel18@outlook.com', '04162196302', 'Panaderia c.c. Bicentenario', 5, 'Buenas noches disculpe la molestia, mi problema es que ingrese en la empresa el viernes 15 de enero. y aun no salgo en el sistema.', '2015-01-24 01:41:40'),
(399, 5222860, 'Jesus', 'Acuña', 'eduars.18@gmail.com', '04168301473', 'Caracas, Quinta Crespo', 10, 'No puedo acceder a mi usuario y contraseña, me dice que la clave es invalida, y cuando suministro los datos, no me quiere hacer la toma. que sucede?', '2015-01-24 02:20:28'),
(400, 19930978, 'GENESIS alexandra', 'quinto linares', 'loverlinbello@gmail', '04143124748', 'sede', 10, 'porque no salgo para la compra de venalcasa si ya estoy registrada', '2015-01-24 16:52:28'),
(401, 17159513, 'ichel', 'belisario', 'ichelbelisario@gmail.com', '04163004536', 'periodista distrito capital', 10, 'buenas noches, mi inquietud es la siguiente yo no me encontraba registrada en el sistema, la chica de recursos humanos le mandó la solicitud el viernes a ustedes para acceder, acabo de registrarme, pero no puedo comprar, quería saber como hacia porque al parecer ya hoy domingo esta cerrado lo de las compras.  gracias', '2015-01-26 00:45:33'),
(402, 6356534, 'RAQUEL', 'REYES', 'dorisqr@hotmail.es', '04125542187', 'COMEDOR CEDIS OLGA LUZARDO /ADMINISTRADORA', 10, 'Buenas tardes expongo por este medio la imposiblidad de realizar mi registro y realizar mi compra. Mucho le agradeceria su atemcion al mismo', '2015-01-27 18:22:26'),
(403, 18144986, 'Daniel', 'Becerra', 'd.becerra.venalcasa@gmail.com', '04148755475', 'Aragua de Barcelona-Edo.Anzoátegui', 3, 'He olvidado mi clave y no encuentro la forma de recuperarla. Necesito de su ayuda.', '2015-01-28 01:53:39'),
(404, 20803932, 'luis', 'quevedo', 'luis.alberto023@hotmail.com', '04148730394', 'la bandera', 8, 'no puedo abri mi cuenta por la pagina de venalcasa ', '2015-01-28 14:25:19'),
(405, 9493176, 'zulay ANTONIA', 'BENITEZ DE ESPINOZA', 'Z.benitez.venalcasa@gmail.com', '04141304728', 'catia ', 3, 'olvido de clave', '2015-01-28 22:35:23'),
(406, 12402719, 'luis', 'padron', 'maximo77@cantv.net', '04163055694', 'quista quespo', 10, 'se me olvido contraseña , y no me deja recuperarla ', '2015-01-30 23:36:29'),
(407, 5413299, 'JOSE ENRIQUE', 'VILLAVICENCIO BLANCO', 'josevillavicencio_708@hotmail.com', '04127216022 ', 'SEDE CENTRAL', 10, 'no logro recuperar clave de acceso al sistema operativo', '2015-01-31 19:30:25'),
(408, 84577514, 'Alberto Ernesto ', 'Juara Avalos', 'qbnitro69@gmail.com', '04263747269', 'Planta de Arroz, Barinas I. Barinas Edo. Barinas. Carretera Via San Silvestre', 3, 'En mi constancia de trabajo me aparece la cédula con la letra V y mi cédula es de extranjero transeúnte con letra E-84577514 y para renovar mi visa todos los años y para otros tramites legales necesito que este correctamente escrito con E, por favor resolver esa pequeña situación lo mas pronto posible para actualizar mis datos en el SAIME, gracias de antemano y llamar para darme respuesta o escribir a mi correo.', '2015-02-01 23:32:37'),
(409, 14956005, 'LIZ', 'ACHUELO', 'LACHUELO@CEALCOVE.COM', '04163390201', 'PLANTA VALENCIA', 9, 'NO PUEDO INGRESAR ME DICE CONTRASEÑA INVALIDA.. Y LE DOY RECUPERAR ES IMPOSIBLE', '2015-02-09 14:28:37'),
(410, 14225280, 'LORENA', 'UGAS', 'LOREUGAS21@GMAIL.COM', '04241103796', 'ANDIVARGAS', 8, 'NO PUEDO ENTRAR A MI USUARIO', '2015-02-09 14:55:20'),
(411, 12579213, 'RAMON', 'COLINA', 'resaa@cealcove.com', '04127596882', 'Cagua/Seguridad/Cagua', 9, 'Al tratar de ingresar para solicitar el mercado virtual, el sistema muestra un mensaje de que el usuario no existe. La vez pasada ocurrio lo mismo y se solvento creando nuevamente el usuario. Hoy estoy intentando ingresar y se repite nuevamente el problema. ', '2015-02-09 15:56:25'),
(412, 12309178, 'Yaknara', 'Salgado', 'ysalgado@cealcove.com', '02443954113', 'Cealco/Planta Corinsa/TI', 9, 'El sistema no reconoce el usuario y/o contraseña, no permite recuperar la clave ni realizar un nuevo registro; por lo tanto, no es posible ingresar a la página.\r\n\r\nGracias...', '2015-02-09 17:41:16'),
(413, 14557525, 'YOHENNY ', 'SULBARAN', 'YOHENNYSULBARAN@HOTMAIL.COM', '04262267297', 'ANDICARACAS (LA BANDERA)', 8, 'NO PUEDO ENTRAR A REALIZAR MI COMPRA MENSUAL ME DICE EL SISTEMA QUE CLAVE INVALIDA Y YO NO HE CAMBIADO DICHA CLAVE GRACIAS POR SU ATENCION  ', '2015-02-09 20:08:33'),
(414, 14298057, 'JOHAN ', 'HERNANDEZ', 'JOHAN_HERNANDEZ25@HOTMAIL.COM', '04241011632', 'ANDICARACAS (LA BANDERA)', 8, 'LES INFORMO QUE NO PUEDO REALIZAR EL MERCADO EN  LINEA  YA QUE ME DICE QUE CLAVE Y USUARIO INVALIDO GRACIAS POR SU ATENCION ', '2015-02-09 20:16:58'),
(415, 17443357, 'AYLHIN', 'VILLANUEVA', 'AVILLANUEVA@CEALCOVE.COM', '041289999624', 'CAGUA', 9, 'HOLA BUENAS TARDES LES ESCRIBO PARA SABER POR CADA MES TENGO QUE VOLVER A REGISTRARME SI YO TENGO MI CLAVE Y CADA VEZ QUE LA COLOCO ME DICE INCORRECTA Y NO HE PODIDO PEDIR EL MERCADO........      \r\n\r\nMUCHAS GRACIAS ESPERO MI RESPUESTA.\r\n\r\n  ', '2015-02-09 21:47:21'),
(416, 14956005, 'LIZ', 'ACHUELO', 'LACHUELO@CEALCOVE.COM', '04163390201', 'PLANTA VALENCIA', 9, 'POR DIOS ES IMPOSIBLE ENTRAR PARA RECUPERAR MI CLAVE ESTE SISTEMA ES SUPER COMPLICADO...', '2015-02-10 11:34:21'),
(417, 14956005, 'LIZ', 'ACHUELO', 'LACHUELO@CEALCOVE.COM', '04163390201', 'PLANTA VALENCIA', 9, 'ES IMPOSIBLE ENTRAR Y RECUPERAR LA CLAVE, ME DICE QUE INTRIDUZCA LOS DATOS CUANDO LOS COLOCO ME ARROJA QUE NO ESTOY EN LA BASE DE DATOS E INTENTO REGISTRARME NUEVAMENTE Y ME DICE QUE ESTOY REGISTRADA... DE VERDAD NO ENTINENDO\r\n', '2015-02-10 11:36:31'),
(418, 14956005, 'LIZ', 'ACHUELO', 'LACHUELO@CEALCOVE.COM', '04163390201', 'PLANTA VALENCIA', 9, 'TENGO DOS DIAS INTENTANDO RECUPERAR LA CLAVE ESO ES IMPOSIBLE...\r\nY NO HE RECIBIDO  RESPUESTA ALGUNA', '2015-02-10 11:38:04'),
(419, 12659098, 'ROLANDO RAFAEL', 'GARCIA ANTON', 'ROLANDO.GARCIA2@GMAIL.COM', '04263201129', 'ANDIMILK san martin', 8, 'no me quiere abril la pagina y estoy metiendo mi clave y nada me dice q el nombre no es correcto o clave', '2015-02-10 15:02:44'),
(420, 15931095, 'johanna ', 'garcia ', 'johannadeyanira@hotmail.com', '04142846358', 'gerencia de administracion ', 8, 'no puedo ingresar a la pagina ya que me notifica q mis datos no estan ingresados en la data ', '2015-02-10 16:44:10'),
(421, 22030897, 'ALVARO', 'RODRIGUEZ', 'daddy_alvaro1372@hotmail.com', '04143001203', 'CALLE LEBRUN DE PETARE GALPON 30-D Y 31-D. PETARE ESTADO MIRANDA TELF.02122567538/ 2568050/ 2566317', 8, 'UN SALUDO BOLIVARIANO PRIMERO QUE TODO POR MEDIO DEL PRESENTE LES HAGO SABER QUE NO PUEDO ACCEDER A MI SESIÓN PARA COMPRAR YA QUE NO RECUERDO MI CLAVE Y AL DAR A LA COPCION RECUPERAR DICE QUE MIS DATOS SON INCORRECTOS  ', '2015-02-11 20:40:57'),
(422, 6362545, 'gertrudi margarita', 'torrealba carrion ', 'jj01101976@hotmail.com', '04128003394', 'quinta crespo  cede principal direccion ejecutiva', 10, 'bueno por olvidar clave y correo  se le solicita su mayor colaboracion de verificar mi clave olvidada y sea enviada a este nuevo correo jj01101976@hotmail.com  gracias esperare rep buen dia ', '2015-02-12 12:17:50'),
(423, 12834309, 'DEIBER', 'HERNANDEZ', 'DEIBER309@HOTMAIL.COM', '04142169151', 'SAN MARTIN', 8, 'SE ME OLVIDO MI CLAVE', '2015-02-12 12:18:22'),
(424, 13067436, 'alfonso jose', 'ledezma maracay', 'ledezmam@gmail.com', '04241653177', 'paraderia venezuela', 5, 'buenas nesesito que me ingrese al sistema.muchas gracias..', '2015-02-14 20:31:50'),
(425, 17801021, 'Aimara', 'Villanueva', 'avi.villanueva@gmail.com', '04129785893', 'Educación', 10, 'Hola, no puedo recuperar mi clave. Pongo mi fecha de nacimiento y me dice que no sale registrada.', '2015-02-18 15:00:35'),
(426, 6151474, 'DELIA DELVALLE', 'RODRIGUEZ NORIEGA', 'LLELLIN_64@HOTMAIL.COM', '04123736233', 'ESQUINA EL CARMEN QUINTQ CRESPO', 10, 'SE ME OLIVIDO LA CLAVE DE COMPRAS INTRAVENALCASA', '2015-02-18 15:01:27'),
(427, 2729819, 'ANILCIA  M', 'LEGONES', 'anilego4@gmail.com', '0416-415-33-38', 'sede -Planificación y Presupuesto', 10, '\r\nBnos dias, refleja   q no estoy registrada', '2015-02-18 15:15:55'),
(428, 4424685, 'ingrid', 'pacheco', 'inpach1@yahoo.com', '04127121971', 'Central, Qta. Crespo', 10, 'Buen día, trate de entrar a la pagina para realizar pedido de mercado y no aparecen mis datos, a pesar de haberme registrado en Diciembre. Gracias', '2015-02-18 15:35:53'),
(429, 25561762, 'wisey', 'lopez', 'kridaswil2014@gmail.com', '04129930146', 'administracion y finanzas', 5, 'buenos dias, la pagina no me deja ingresar y me dice que mis datos no estan en su base de datos, y le doy para registrarme nuevamente y me sale que ya estoy registrado espero su pronta respuesta gracias. que tengan un feliz dia.', '2015-02-18 16:15:38'),
(430, 6906812, 'MARIA TERESA', 'BARRIO', 'YRRIALOPEZ67@COM', '04267157301', 'SEDE PRINCIPAL QUINTA CRESPO', 10, '  MIS COMPRAS', '2015-02-18 16:36:49'),
(431, 15314950, 'KIMBERLY', 'PACHECO', 'kimberly1009@hotmail.com', '04129600150', 'AV BARALT QUINTA CRESPO', 10, 'NO ME PERMITE ACCEDER AL SISTEMA NO ME TOMA LA CLAVE, NO PERMITE OLVIDO DE CLAVE NI RESGISTRARME NUEVAMENTE SOLO TENGO HASTA EL VIERNES PARA HACERLO GRACIAS', '2015-02-18 18:08:02'),
(432, 8300624, 'julio jose', 'maiz', 'juliojmaiz58@hotmaiz.com', '04141966576', 'unidad del distrito capital', 10, 'se me olvido la clave disculpe las molestia como hago para recuperarla', '2015-02-19 13:44:21'),
(433, 11234467, 'Icoha', 'Alvarez', 'Icoha_74@hotmail.com', '04263049154', 'Negra Hipolita', 10, 'No puedo Ingresar al sistema para realizar mi compra y ya estoy registrada', '2015-02-19 16:52:26'),
(434, 7663449, 'DORIS', 'QUIÑONES', 'dorisqr@hotmail.es', '04241185326', 'SEDE', 10, 'NO PUEDO ENTRAR PARA REALIZAR MI PEDIDO  ', '2015-02-19 18:32:20'),
(435, 20595345, 'kengly', 'sanabria', 'kengsanab@.gmailcom', '04141605042', 'areperas', 5, 'mercado\r\n', '2015-02-19 19:01:45'),
(436, 13533814, 'jose german ', 'azuaje yepez ', 'mipaderechango@hotmail.com', '04141080106', 'comedor crucesita ', 10, 'aparesco registrado con mi numero de cedula mas no asecta mi clave por favor gracias ', '2015-02-19 19:35:58'),
(437, 6977138, 'yitani', 'gonzalez', 'gonzayi@hotmail.com', '04242083920', 'negra hipolita', 10, 'no me permite el acceso para realizar la compra', '2015-02-20 01:35:57'),
(438, 4589938, 'raul', 'dominguez', 'kbzonraul45@hotmail.com', '04125863643', 'administacion', 10, 'olvide contraseña', '2015-02-20 15:03:27'),
(439, 6906812, 'Maria Teresa', 'Barrio gonzalez', 'YRIALOPEZ67@.COM', '04267157301', 'SEDE PRINCIPAL QUINTA CRESPO', 10, ' compra', '2015-02-20 15:08:33'),
(440, 18830329, 'JUAN CARLOS', 'RUIZ MELENDEZ', 'ruizjuan091986@gmail.com', '04262999687', 'Cafe Bicentenario', 5, 'no logro recuperar la clave de acceso y no puedon hacer el mercado que es hasta hoy, gracias por su ayuda', '2015-02-20 16:49:37'),
(441, 8514504, 'sonia', 'andara', 's.andara.venalcasa@gmail.com', '04245515488', 'coro ', 7, '', '2015-02-20 20:43:09'),
(442, 18708707, 'RICARDO', 'BALZA GERMAN', 'ricardobalza22@gmail.com', '04120282056', 'Panadería Venezuela Santa Rosa Cua Edo Miranda', 5, 'Por favor corregir lo antes posible mis datos en el sistema como lo es mi CI y mi fecha de nacimiento aparecen con el nombre de una compañera de labores ella se llama Mariela Ramos. Deberia ser mi nombre completo que es RICARDO BALZA GERMAN CI 18708707 Fecha de Nacimiento 22/06/1988 Gracias.', '2015-02-21 00:25:05'),
(443, 17270856, 'georyelin', 'yaquer', 'la_princesa_georyelin@hotmail.com', '04263526038', 'qta crespo', 10, 'no recuerdo mi clave y le doy opcion a recuperar y me arroja q no estoy registrada en el sistema de verdad que me urge q m solucione la recuperacion de la clave ', '2015-02-21 02:51:29'),
(444, 13747902, 'DAFNE MARISELA', 'BARAHONA FERNANDEZ', 'dafbarahona@hotmail.com', '04167257593', 'sede gestion alimentaria-restaurante venezuela nutritiva', 10, 'Buen dia necesito resolver probematica con mi usuario ya que no puedo hacer mi listado del mercado por que me dice que no existe', '2015-02-21 11:08:55'),
(445, 8627802, 'MARIA CRISTINA', 'RODRIGUEZ BERNAL', 'ma.rodriguez.venalcasa@gmail.com', '04266426949', 'CALABOZO', 3, 'AREPERA MOVIL', '2015-02-22 08:01:41'),
(446, 17270856, 'GEORYELIN', 'YAQUER', 'la_princesa_georyelin@hotmail.com', '04263526038', 'sede central qta crespo', 10, 'se me olvido mi contraseÑa y no la puedo recuperar de verdadq m urge recuperarla porque voy a perder la oportunidad de comprar por favor necesito que me ayuden a solventar mi situacion gracias ', '2015-02-22 17:05:13'),
(447, 19334673, 'FRAIMA DAYANA', 'ALBORNOZ PEÑA', 'LOKY_18_8@HOTMAIL.COM', '04149357183', 'AV BARALT ESQUINA EL CARMEN EDIF INN', 10, '', '2015-02-23 13:37:15'),
(448, 15289752, 'CARLOS JULIO ', 'PRADA MARCANO', 'CARLOSFEXTUN@HOTMAIL.COM', '04248903415', 'CUMANA EDO SUCRE', 12, 'BUENOS DIAS ME INSCRIBI Y EL SISTEMA ME RECHAZA, APARECE QUE ESTA REGISTRADO Y NO ME DA ACCESO', '2015-02-23 14:49:18'),
(449, 17270856, 'georyelin', 'yaquer', 'la_princesa_georyelin@hotmil.com', '04263526038', 'sede central qta crespo ', 10, 'se me olvido mi contraseña y no e podido recuperar la contraseña porque m dice q no estoy registrada en el sistema ya e enviado la situacion por un correo q arroja pero no m han dado respuesta y de verdad m urge recuperar la contraseña para poder beneficiarme del mercado de verdad necesito q m ayuden . sin mas nada que agregar me ddespido d ustedes espearanado su pronta respuesta', '2015-02-23 14:49:45'),
(450, 5862174, 'SILVIA VALENTINA', 'LAREZ DE FARIAS', 'MIWENDY2000@HOTMAIL.COM', '04129793296', 'SECTOR EL DIQUE CUMANA ESTADO SUCRE', 12, 'CUANDO TRATO DE INICIAR SESION NO AVANSA LA PAGINA PODRIAN AYUDARME ', '2015-02-23 15:44:44'),
(451, 5264681, 'Margarita', 'Palacios', 'mbpmlo2007@gmail.com', '04167038586', 'EDUCACION', 10, 'NO ME RECONOCE LA CLAVE', '2015-02-23 15:54:59'),
(452, 6657568, 'LERYDA ', 'CORONADA', 'JESUS_ANDRES80@HOTMAIL.COM', '04168948403', 'CUMANA EDO SUCRE', 12, 'NO ME HABRE EL SISTEMA', '2015-02-23 16:00:59'),
(453, 11832704, 'CELSO', 'VILLALBA', 'celsovillalba_2828@hotmail.com', '04248079010', 'Av. principal el dique, sector boca del rio, cumana, estado sucre.', 12, ' Estoy registrado en la pagina pero a la hora de ingresar no puedo acceder, envia mensaje que mis datos no aparecen registrados', '2015-02-23 16:08:17'),
(454, 13533814, 'jose german ', 'azuaje yepez ', 'mipaderechango@hotmail.com', '04141080106', 'comedor curcesita zona metropolitana ', 10, 'buenas tardes ingreso mi cedula y la reconose mas mi clave y fecha de nacimiento es imvalida por favor camarada diganme q devo hacer \r\n', '2015-02-23 16:54:38'),
(455, 19521293, 'francisco javier', 'grasso diaz', 'sambranogabriel@hotmail.com', '04160383938', 'Qta. crespo, ccan, capitolio restaurant venezuela nutritiva', 10, 'buen dia, quisiera recuperar la clave de la cuenta intranet de venalcasa ya que no logro recordarla y requiero el ingreso para hacer la compra del mercado de este mes. esperando una pronta respuesta me despido de ustedes.', '2015-02-24 03:01:05'),
(456, 5194586, 'Aura Margarita', 'Guevara de Carvajal', 'haylecar@hotmail.com', '3155598/04168023633', 'instituto Nacional de Nutrición ', 5, 'Buenos días.\r\nMi solicitud va dirigida a ustedes debido a que intento ingresar mis datos (cedula y clave), para poder bajar la planilla de compra Venalcasa, y el sistema no me deja entrar, y me arroja errores. Por favor amerito de su pronta solución, para poder bajar la planilla de compra. Gracias de antemano.', '2015-02-24 14:31:13'),
(457, 15106300, 'alexander', 'chirinos', 'alexanderchirinos207@hotmail.com', '04262800110', 'avda. andres bello planta baja', 5, 'no he podido ingresar al mercado virtual.', '2015-02-25 17:10:35'),
(458, 11162690, 'DEWARD', 'IBARRA', 'deporte-7@hotmail.com', '04263345929', 'av andres bello', 5, 'olvide mi clave', '2015-03-02 17:04:51'),
(459, 20676670, 'yandri jose', 'marquez navarro', 'yandry_lolo@hotmail.com ', '04241516837', 'las acacias', 11, '', '2015-03-04 16:33:58'),
(460, 6930442, 'jose argenis', 'moreno', 'argenismoreno_123@hotmail.com', '04267312502', 'esquina el carme quita crespo municipio libertador', 10, 'quiero savel para que dia esta progamado el mercado que fue supendido la semana pasada', '2015-03-05 15:35:03'),
(461, 6930442, 'jose argenis', 'moreno', 'argenismoreno_123@hotmail.com', '04267312502', 'esquina el carme quita crespo municipio libertador', 10, 'quiero savel para que dia esta progamado el mercado que fue supendido la semana pasada', '2015-03-05 15:35:55'),
(462, 13710911, 'BELLACACIA', 'BARRIOS', 'bellisimabarrios@hotmail.com', '04121844282', 'av cajigal antigua carcel viela inn anzoategui', 10, 'saber como inscribirse', '2015-03-05 16:30:53'),
(463, 21534737, 'wendy ', 'oropeza', 'w.oropeza0210@hotmail.com', '04123749085', 'comercializacion ', 10, 'No puedo ingresar al sistema, no recuerdo mi clave y el sistema no me quiere aceptar, no he podido generar la solicitud solo en el mes de diciembre, agradeceria su colaboracion ', '2015-03-06 13:33:06'),
(464, 18197569, 'arturo ', 'ruiz', 'artruiz25@hotmail.cpm', '04141656875', 'falcon', 7, 'no he pódido realizar mi compra por este medio y el sistema ya se ca ha cerrar', '2015-03-06 16:23:47'),
(465, 8627802, 'MARIA CRISTINA', 'RODRIGUEZ BERNAL', 'ma.rodriguez.venalcasa@gmail.com', '04266426949', 'CALABOZO', 3, 'SOLICITUD DE CLAVE NUEVA', '2015-03-06 23:36:52'),
(466, 25897207, 'OMAR ALEXANDER', 'BRITO SALAZAR', 'omar.britoss@hotmail.com', '04262303857', 'av.andres bello edif.la revolucion', 4, 'problemas para entrar en mi cuenta ', '2015-03-09 16:40:31'),
(467, 10377491, 'pablo gerardo', 'ramirez', 'pabloramirezgerardo@gmail.com', '04162088312', 'sucursal caracas el cementerio', 6, 'olvide mi usuario y contraseña para realizar el mercado virtual', '2015-03-09 16:54:48'),
(468, 13154627, 'yamai', 'rivero', 'yamairivero@hotmail.com', '04269833057', 'caracas', 3, 'Recuperar compra del mercado virtual', '2015-03-09 17:08:19'),
(469, 9695757, 'FELIPE ANTONIO', 'MENDOZA', 'fmendozavenalcasa29@gmail.com', '0416 1474583', 'GUACARA ESTADO CARABOBO', 3, 'RECUPERACION DE CLAVE ', '2015-03-10 00:46:42'),
(470, 10377491, 'pablo gerardo', 'ramirez', 'pabloramirezgerardo@gmail.com', '04162088312', 'sucursal caracas, el cementerio', 6, 'olvide mi usuario y mi clave de acceso para solicitar el mercado virtual', '2015-03-10 01:30:01'),
(471, 10377491, 'PABLO GERARDO', 'RAMIREZ', 'pabloramirezgerardo@gmail.com', '0416 208 83 12', 'sucursal caracas,el cementerio', 6, 'recuperar mi usuario y contraseña para hacer las compras ya solo queda un dia', '2015-03-10 18:32:35'),
(472, 18849654, 'KAREN ANAIS', 'BETANCOURT PEREZ', 'KA.BETANCOURT.VENALCASA@GMAIL.COM', '04129406330', 'ZAMORA VIVE-SAN CARLOS', 3, 'NO RECUERDO MI CONTRASEÑA, INTENTO RECUPERAR LA CONTRASEÑA Y ME DICE QUE ME LA HAN ENVIADO AL CORREO PERO AL REVISAR MI CORREO RESULTA QUE AUN NO ME HAN ENVIADO NADA...*', '2015-03-10 20:24:33'),
(473, 10988575, 'JAIRO ALEXANDER', 'RODRIGUEZ BETANCOURT', 'JA.RODRIGUEZ.VENALCASA@GMAIL.COM', '04126471629', 'ZAMORA VIVE-SAN CARLOS', 3, 'NO RECUERDO MI CONTRASEÑA, E INTENTO RECUPERARLA NUEVAMENTE Y EL SISTEMA ME EMITE UN MENSAJE QUE LA CLAVE FUE ENVIADA A MI CORREO ELECTRONICO... PERO AL REVISAR EL CORREO ME DOY CUENTA QUE NO ME HA LLEGADO NADA... ESPERO ME AYUDEN A SOLVENTAR EL INCONVENIENTE LO ANTES POSIBLE PARA PODER REALIZAR LA COMPRA DE MI MERCADO VIRTUAL...*', '2015-03-10 20:26:45'),
(474, 25161657, 'luis alberto', 'perez zabaleta', 'n.galicia.venalcasa@gmail.com', '04167535801', 'planta la colonia', 3, 'no aparece mis datos registrado para poder hacer mi compra', '2015-03-10 22:24:24'),
(475, 15340028, 'starlyn', 'silva', 'n.galicia.venalcasa@gmail.com', '04167535801', 'planta la colonia', 3, 'usuario y correo invalido no deja hacer el mercado', '2015-03-10 23:01:50'),
(476, 13540000, 'carmen yusmery', 'armada prieto', 'c.armada.venalcasa@gmail.com', '04243262987', 'calabozo planta francisco de miranda', 3, 'no me da la clave el sistema y no acepta la vieja que tenia', '2015-03-11 11:04:56'),
(477, 9695757, 'felipe antonio ', 'mendoza', 'fmendozavenalcasa29@gmail.com', '04161474583', 'abasto guacara ', 3, 'problema con la clave', '2015-03-11 15:24:29'),
(478, 11666547, 'diana d´ dayaly', 'duque de amestoy', 'dianaduq@gmail.com', '04262189295', 'panaderia venezuela  santa rosa cua', 5, 'trato de registrarme en el sistema y dice que no existo, lo he intentando varias veces', '2015-03-16 14:47:20'),
(479, 18708707, 'RICARDO', 'BALZA GERMAN', 'ricardobalza22@gmail.com', '04120282056', 'Panadería Venezuela Santa Rosa Cua Edo Miranda', 5, 'Un saludo revolucionario mi solicitud va dirigida a el departamento de informatica para que por favor se me corrijan mis datos en el sistema de compras venalcasa ya que se introdujeron de manera erronea, registraron mi num de C.I. con el de mi companera mariela ramos lo correcto es RICARDO BALZA GERMAN C.I. 18.708.707 hacer dicha corrección lo antes posible para no tener problemas en futuras solicitud de compras gracias.', '2015-03-17 15:50:32'),
(480, 24125652, 'carlos', 'tocuyo', 'carlos1995carlosgarciacarlos1995@hotmail.com', '04142571386', 'plaza venezuela/bicentenario', 8, 'senores el correo que coloque en la pagina de compra no lo pude abrir lo cual no se mi clave y les pregunto cm hago para cambiar de correo???', '2015-03-17 20:13:51'),
(481, 16620055, 'PEDRO', 'PEREZ', 'pedroeph@hotmail.com', '04141370491', 'capital', 8, 'no puedo ingresar con mi usuario', '2015-03-17 22:24:55'),
(482, 18829231, 'KARLA ANGELICA', 'MAY HERNANDEZ', 'RO-MA-Y@HOTMAIL.COM', '02127644081', 'PLaza venezuela en el vicentenario', 8, '', '2015-03-18 16:40:27'),
(483, 9996456, 'JOSE', 'HIDALGO', 'JOSEGRE_01@HOTMAIL.COM', '0414-2827622', 'ANDIVARGAS', 8, 'BLOQUEO DE CLAVE', '2015-03-19 14:17:31'),
(484, 15664464, 'ZOILA ESTHER PEREZ C', 'perez cuello ', 'alvij_pisis@hotmail.com', '04125606112', 'hipolita bolívar ', 10, 'se me olvido la clave ', '2015-03-23 22:41:06'),
(485, 22565659, 'yendry', 'jimenez', 'yender300@hotmail.com', '04241759905', 'santa rosa', 5, '', '2015-03-24 00:11:56'),
(486, 10490280, 'Romary', 'DIAZ GARCIA', 'Unidadmedicainnromary@gmail.com', '04122093082', 'SEDE CENTRAL', 10, ' COMPRA DE VENALCASA', '2015-03-24 10:23:49'),
(487, 3881423, 'Rebeca Lares ', 'Lares Avila', 'rebecalares05@hotmail.com', '04128282521', 'Dirección de Estudios Nutricionales', 10, 'No recuerdo mi clave, me meto por recuperar y no logro recuperarla porque al introducir la cedula me dice que ya estoy registrada y no tengo mas opciones', '2015-03-24 11:44:04'),
(488, 9959408, 'NORMAN', 'GUZMAN', 'normanguzman.redvzla@gmail.com', '04169344540', 'Edificio La Revolución (antes Las Fundaciones)', 5, 'El sistema no me deja entrar aunque me dice que estoy registrado y no me permite recuperar mi clave', '2015-03-24 13:14:35'),
(489, 14196088, 'Rosangela', 'Molina', 'rosangela06@hotmail.com', '0416-7230814', 'quinta crespo', 10, 'hice cambio de clave varios dias atras y ahora no me da acceso,le di clik en recuperar clave y no me sale los campos obligatorios', '2015-03-24 14:50:19'),
(490, 17119365, 'yessika', 'rodriguez', 'leonory.980@hotmail.com', '0414-3691311', 'procura y mercadeo', 5, 'olvido de contraseña ', '2015-03-24 15:08:23'),
(491, 5315321, 'guillermo', 'pulgar', 'versety26@hotmail.com', '04261110966', 'ocri', 10, 'estoy registrado pero no accedo con mi clave ', '2015-03-24 15:34:45'),
(492, 11409534, 'abraham ', 'colmenares', 'abrahancolmenares73@gmail.com', '04242811696', 'cede central', 10, 'estoytratando de entrar en la pagina para la compra de los alimentos y dice que no salgo registrado', '2015-03-24 16:23:01'),
(493, 4278142, 'GUSTAVO ENRIQUE', 'BALCAZAR', 'DRBALCAZAR6@GMAIL.COM', '04143278508', 'SEDE CENTRAL', 10, '', '2015-03-24 18:06:40'),
(494, 47534913, 'GUSTAVO E.', 'BALCAZAR', 'DRBALCAZAR6@GMAIL.COM', '04143278508', 'sede central', 10, '', '2015-03-24 18:18:09'),
(495, 4278142, 'GUSTAVO', 'BALCAZAR', 'DRBALCAZAR6@GMAIL.COM', '04143278508', 'central', 10, '', '2015-03-24 18:31:18'),
(496, 12642236, 'ERIKA', 'DIAZ', 'MPKATIUSKA@GMAIL.COM', '04126196913', 'QTA CRESPO', 3, 'NO RECUERDO MI CLAVE Y COLOCO POR ECUPERACION MI FECHA DE NACIMIENTO Y ME DICE QUE NO ESTOY REGISTRADA EN LA BASE DE DATOS', '2015-03-24 18:31:58'),
(497, 17060456, 'ismael', 'yegues', '@imaelyegues', '04142499226', 'cantv', 5, 'perdida de clave', '2015-03-24 18:33:07'),
(498, 17060456, 'ismael', 'yegues', '@imaelyegues', '04142499226', 'cantv', 5, 'perdida de clave', '2015-03-24 18:39:16'),
(499, 15040580, 'ADRIANA', 'SANZ', 'adriaxsam39@gmail.com', '04166122831', 'EDUCACIÓN', 10, 'NO PUEDO INGRESAR AL SISTEMA PARA REALIZAR EL MERCADO', '2015-03-25 14:06:59'),
(500, 9487429, 'MIGUEL', 'HERNANDEZ', 'MIGDAR5@GMAIL.COM', '04262332244', 'avda. andres bello planta baja', 5, 'NO PUEDO INGRESAR AL SISTEMA.', '2015-03-25 19:07:45'),
(501, 7957556, 'JORGE ESTEBAN', 'JIMENEZ RENGIFO', 'jorgejimenez4nsila@hotmail.com', '04266899875', 'quinta crespo', 10, 'no puedo entrar en mi compra', '2015-03-25 21:29:49'),
(502, 6231787, 'rafael ', 'garcia', 'belcucha64@yahoo.es', '04123954444', 'qta crespo', 10, 'se  me olvido la clave y cuando intento cambiarla el sistema no acepta mis datos', '2015-03-26 09:55:46'),
(503, 3186804, 'ROSA MARIA', 'LEON DE SAYAN', 'rmarialeonliv@yahoo.com', '04241645348', 'BIBLIOTECA', 10, 'EL SISTEMA NO ME RECONOCE COMO USUARIO, NO ME PERMITE REGISTRARME. HICE COMPRA EN DICIEMBRE 2014, PERO NO HICE COMPRA EN ENERO NI EN FEBRERO 2015', '2015-03-26 18:48:19'),
(504, 20098177, 'DAGNNE', 'BAPTISTA', 'DAGNNE01@GMAIL.COM', '04129203211', 'MINPPAL', 5, 'EL USUARIO NO APARECE COMO REGISTRADO LUEGO DE HABER REALIZADO 2 MERCADOS ', '2015-03-31 15:27:19'),
(505, 9695757, 'FELIPE ANTONIO', 'MENDOZA', 'fmendozavenalcasa29@gmail.com', '0416 1474583', 'GUACARA ESTADO CARABOBO', 3, 'CAMBIO DE CLAVE ', '2015-04-07 00:10:03'),
(506, 17572596, 'MARIELBIS ', 'DOMINGUEZ ', 'M.DOMINGUEZ.VENALCASA@GMAIL.COM ', '04145810104', 'GUACARA ', 3, 'NO PUEDO ENRTRAR AMI PAGINA ', '2015-04-07 13:13:45'),
(507, 23582189, 'YOIBERT ABIMELEC', 'BRITO RODRIGUEZ', '2014yoibert@gmail.com', '04264831605', 'Urb. El Dique Avenida Las Palomas Sector Boca De Rio Cumana', 12, 'olvido de contraseña ', '2015-04-07 20:51:24'),
(508, 19738028, 'andrea', 'quintana', 'quintana.andrea.22@gmail.com', '04241443468', 'sede', 3, 'no puedo recuperar mi clave del mercado', '2015-04-08 13:10:18'),
(509, 12555783, 'jose', 'diaz', 'jdiazvenalcasa0@gmail.com', '04245384699', 'barinas', 3, 'problemas con la clave de la compra del mercado virtual', '2015-04-09 12:20:18'),
(510, 11832704, 'CELSO', 'VILLALBA', 'celsovillalba_2828@hotmail.com', '04248079010', 'Av. principal el dique, sector boca del rio, cumana, estado sucre.', 12, 'OLVIDE MI CLAVE SECRETA', '2015-04-09 16:49:12'),
(511, 4314266, 'JACOBO JOSE ', 'LINARES', 'jacobojoselinares@hotmail.com', '04267729155', 'inn comercializacion galpon cagua', 10, 'no me acuerdo del correo ni de la contraseña. necesito que reseteen el correo para crear una cuenta nueva', '2015-04-13 19:06:25'),
(512, 4314266, 'JACOBO JOSE', 'LINARES', 'jacobojoselinares@hotmail.com', '04267729155', 'INN comercializacion galpon cagua', 10, 'RECUPERAR DATOS DE CORREO Y CONTRASEÑA QUE SE ME OLVIDO', '2015-04-13 19:14:12'),
(513, 17488248, 'ninoska josefina', 'zorrilla', 'ninoskajz@hotmail.com', '04122137121', 'bicentenario de plaza vanezuela', 5, '', '2015-04-15 19:01:25'),
(514, 17488248, 'ninoska josefina', 'zorrilla', 'ninoskajz@hotmail.com', '04122137121', 'bicentenario de plaza vanezuela', 5, '', '2015-04-15 19:04:50'),
(515, 15931095, 'johanna', 'garcia', 'johannadeyanira@hotmail.com', '04142846358', 'gerencia de administracion', 8, 'NO PUEDO INGRESAR A LA PAGINA YA QUE ME DICE Q NO ESTOY REGISTRADA ', '2015-04-17 15:06:14'),
(516, 12723197, 'BIANNEY', 'RODRIGUEZ', 'BIANNEY1877@HOTMAIL.COM', '04141225916', 'ANDIVARGAS', 8, 'NO APAREZCO EN EL SISTEMA', '2015-04-20 14:25:24'),
(517, 17246940, 'Carlos', 'Castillo', 'c_castillo00@hotmail.com', '04142963437', 'Cagua', 9, '', '2015-04-21 15:19:19'),
(518, 12723197, 'BIANNEY ', 'RODRIGUEZ', 'BIANNEY1877@HOTMAIL.COM', '04141225916', 'ANDIVARGAS', 8, 'BUENAS TARDES, AUN NO ESTOY REGISTRADA EN LA PAGINA Y YA EL PERSONAL DE LACTEOS LOS ANDES LOS ENVIO QUISIERA SABER QUE HA PASADO CON ESO\r\n', '2015-04-21 20:33:12'),
(519, 16850002, 'STASKY ', 'RODRIGUEZ', 'caranguren@cealcove.com', '04124448688', 'logistica cagua', 9, 'NO PUEDO REGISTRAME ME DA ESTE ERROR (Warning: Header may not contain more than a single header, new line detected in /home/venalcas/public_html/portal/IntraVenalcasa/app/controller/usuarioController.php on line 104.)\r\n', '2015-04-22 17:52:06'),
(520, 17390214, 'nelsida', 'escobar', 'adislen2005@gmail.com', '04125638630', 'principal caracas', 10, 'ya estoy regitrada pero al queren entrar al sistema no puedo que debo de hacer?', '2015-04-23 10:29:32'),
(521, 9995851, 'YURBYS MARA', 'MORALES ESPINOZA', 'yurbysmorales94@homait.com', '02123531301', 'AV. BARAT ESQUINA ELCARME', 10, 'NO ENTRO EN SISTEMA', '2015-04-24 01:41:04'),
(522, 16555866, 'elvis', 'garcia', 'elvisgarcia518@hotmail.com', '04263060083', 'central', 10, 'anteriormente realizaba compras ahora me indica que los datos no son registrados ', '2015-04-27 15:27:58'),
(523, 17116936, 'orlando jose', 'gomez garcia ', 'ojgg29@gmail.com', '0414-021-84-19', 'central', 10, 'que tal aun no aparezco en la base de datos , no puedo hacer el pedido informenme por que presento ese problema ', '2015-04-27 15:33:14'),
(524, 16895720, 'JAVIER', 'LONDOÑO', 'londono_javier@hotmail.com', '04263140451', 'Direccion de Educacion', 10, 'El mes de Marzo las compras pude realizarlas sin nigun inconveniente, el intentar hacerlas este mes, me sale un anuncio de "usuario no registrado". el mismo mensaje para recuperacion de contraseña y para registro de nuevo usuario', '2015-04-27 15:53:54'),
(525, 15049740, 'SHEILA', 'COLMENARES', 'STPCOLMENARES@GMAIL.COM', '0416 2016880', 'AV ANDRES BELLO', 5, 'Hola Buenas tardes, tengo un inconveniente con la recuperación de clave para el mercado virtual, ya que me indica que No estoy registrada en la base de datos. Intento registrarme nuevamente y me dice que ya estoy registrada...', '2015-04-27 18:27:38'),
(526, 15049740, 'SHEILA', 'COLMENARES', 'STPCOLMENARES@GMAIL.COM', '0416 2016880', 'AV ANDRES BELLO, ADMINISTRACION', 5, 'Hola Buenas tardes, tengo un inconveniente con la recuperación de clave para el mercado virtual, ya que me indica que No estoy registrada en la base de datos. Intento registrarme nuevamente y me dice que ya estoy registrada...', '2015-04-27 18:28:25'),
(527, 11411200, 'ALFONSINA', 'VERA RAMIREZ', 'ALFONSINA_VERA@HOTMAIL.COM', '0416-7135109', 'PRINCIPAL DIRECCION DE GESTION SOCIALISTA QUINTA CRESPO ', 10, 'NO APAREZCO REGISTRADA AUNQUE EL MES ANTERIOR YO HICE LA COMPRA POR ESTE SISTEMA\r\n\r\n', '2015-04-27 18:57:08'),
(528, 6050553, 'ANDRES ELOY', 'BURGOS CARRASQUERO', 'BURGOS_ANDRES@HOTMAIL.COM', '0414-3277088', 'PRINCIPA/DIRECCION DE GESTION SOCIALISTA/QUINTA CRESPO', 10, 'NO APAREZCO REGISTRADO A PESAR DE QUE EL MES ANTERIOR REALÑICE MI COMPRA POR ESTE SISTEMA', '2015-04-27 19:00:10'),
(529, 1389437, 'eliezer', 'martinez', 'eliezemartinez@hotmail.com', '04168159568', 'central quinta cerespo', 10, 'olvide clave', '2015-04-27 19:20:26'),
(530, 13289685, 'Deisy ', 'Martínez', 'deicamar@gmail.com', '04129555498', 'Sede Central, Dirección de Educación', 10, 'Ya he comprado dos veces por el sistema y esta vez me dice que mis datos no están registrados', '2015-04-28 01:12:53'),
(531, 20050960, 'antonio', 'valente', 'arquitectovalente@gmail.com', '04249167548', 'oficina de proyectos y mantenimiento', 10, 'problemas para accesar a la pagina para raealizar mis compras..', '2015-04-28 17:41:13'),
(532, 17277981, 'mayra alejandra', 'tovar carrasco', 'mayradante@gmail.com', '04245259193', 'turen, estado portugues', 3, 'En el mes de octubre sufri un accidente laboral que me produjo una lesión en el manguito rottorio de hombro izquierdo, por lo cual tuve que asistir al medico y recibir tratamiento traumatologico, pasadas las 52 semanas en que se pautó una intervención quirurgica que no se pudo realizar por cuanto el centro medico alego no disponer de la suficiente solución quirurgica 3000, tal como se expone en informe médico, se me dio una prorroga de un año por seguro social, entregando en los dias correspondientes las convalidaciones respectivas, y aun cuando hoy en dia me encuentro en invalidez debido a que no puedo ni siquiera vestirme por mi misma, se me suspendio salario y todo tipo de remuneración económica cuando más lo necesito ya que soy madre de 3 hijos dos menores de edad y no tengo los recursos para su manutencion, se e informo desde la empresa que mis prorrogas no habian sido enviadas a caracas, e incluso la misma abogda de VENALCASA en acta notifico que a mi se me pagaba el 33 por ciento del slario, lo  cual pensaba era un mercado virtual de comida que me llegaba y que en dias pasados el jefe de recursos humanos, aun en mis condiciones vino hasta mi domicilio  cobrarme los meses del presente año en que se me trajo el beneficio. les pido en justicia scialista y chavista revisen mi caso pues se esta cometiendo una injusticia con una camarada fiel al proceso revolucionario, que siempre ha querido dar lo mejor de si por su patria,mediante trabajo, y no hubiese querido jamas pasar por esta situción. mucho sabre agradecer la atención dispensada  ', '2015-04-29 03:21:18'),
(533, 6906812, 'Maria teresa ', 'Barriio', 'yrialopez67@gmail.com', 'o4267157301', 'Esquina el carme av.barat quinta crespo', 10, ' compra\r\n', '2015-04-29 10:09:15'),
(534, 13533814, 'jose ', 'azuaje', 'mipaderechango@hotmail.com', '04141080106', 'dtto. capital', 10, 'no tengo acceso a la compra cuando trato de entrar me dice que ya estoy registrado y no me acepta la clave trato de cambiar la clave y tampoco lo permite', '2015-04-29 14:58:07'),
(535, 26621348, 'gregorio', ' courtois', 'yusmerly.materan@gmeil.com', '04241473209', 'v.t.v', 5, '', '2015-04-29 15:47:03'),
(536, 17534095, 'Adriana', 'Vargas', 'adrianacva@yahoo.es', '04126034916', 'Inn Miranda', 10, 'Buenas Tardes! Es la primera vez que compro por esta via y queria saber en donde retiraria los productos que compre.\r\nGracias!', '2015-04-29 20:42:15'),
(537, 4164216, 'JUANITA', 'AREVALO', 'juanitarumualda_54@hotmail.com', '04169198162', 'felipe yeleret', 10, 'no me deja entrar al sistema', '2015-04-30 00:31:50'),
(538, 20183806, 'CARLOS JESUS ', 'GONZALEZ', 'M.CANCINE.VENALCASA@GMASIL.COM', '04266497818', 'PLANTA FRANCISCO DE MIRANDA', 3, 'NO ME QUIERE ABRIR LA PAGINA POR FAVOR RESETEARME PARA REGISTRARME DE NUEVO.. GRACIAS', '2015-04-30 01:43:23'),
(539, 13125650, 'JESUS ENRIQUE', 'CORREDOR SERRANO', 'JESUSCORREDOR@78HOTMAIL.COM', '04166075810', 'ANDI SOL', 8, 'SIEMPRE TENGO PROBLEMA PARA INGRESAR ALA PAGINA APARECE COMO QUE NO REGISTRARA ', '2015-04-30 17:05:02'),
(540, 15340028, 'Starlin José', 'Silva Cordero', 'starlinsilva_@hotmail.com', '04268529534', 'La Colonia Turen', 3, 'no puedo entrar a mi cuenta ¿que pasa con eso?', '2015-05-04 22:28:42'),
(541, 5183776, 'Gabriel Reinaldo', 'Acosta Bomport', 'acostagabriel613@gmail.com', '04142927041', 'Qta. crespo', 10, 'Se me olvido la clave\r\n', '2015-05-04 23:21:06'),
(542, 5183776, 'Gabriel Reinaldo', 'Acosta Bomport', 'acostagabriel613@gmail.com', '04142927041', 'Qta. crespo', 10, 'Se me olvido la clave\r\n', '2015-05-04 23:21:08'),
(543, 5183776, 'Gabriel Reinaldo', 'Acosta Bomport', 'acostagabriel613@gmail.com', '04142927041', 'Qta. crespo', 10, 'Se me olvido la clave\r\n', '2015-05-04 23:21:10'),
(544, 5183776, 'Gabriel Reinaldo', 'Acosta Bomport', 'acostagabriel613@gmail.com', '04142927041', 'Qta. crespo', 10, 'Se me olvido la clave\r\n', '2015-05-04 23:21:16'),
(545, 5183776, 'Gabriel Reinaldo', 'Acosta Bomport', 'acostagabriel613@gmail.com', '04142927041', 'Qta. crespo', 10, 'Se me olvido la clave\r\n', '2015-05-04 23:21:18'),
(546, 9913389, 'YAKELINE DEL VALLE', 'CAMEJO FIGUEROA', 'y.camejo.venalcasa@gmail.com', '04120931684', 'CHAGUARAMAS', 3, 'NO PUEDO ABRIR LA PAGINA PARA IMPRIMIR LA CONSTANCIA DE TRABAJO ME DICE CLAVE O USUARIO INVALIDO ', '2015-05-06 20:18:32'),
(547, 9913389, 'YAKELINE DEL VALLE', 'CAMEJO FIGUEROA', 'y.camejo.venalcasa@gmail.com', '04120931684', 'CHAGUARAMAS edo guarico', 3, 'Buenas tardes ..quiero abrir la pagina para imprimir una constancia de trabajo y no da ninguna opción sale clave o usuario invalido ', '2015-05-07 18:10:35'),
(548, 9913389, 'YAKELINE DEL VALLE', 'CAMEJO FIGUEROA', 'yakelin170@hotmail.com', '04120931684', 'CHAGUARAMAS edo guarico', 3, 'Buenas tardes como hago para recuperar mi cuenta para imprimir una constancia de trabajo q la necesito urgente \r\n', '2015-05-07 19:57:24'),
(549, 21216122, 'jesus ', 'crespo', 'marielbisg31@gmail.com', '04263661147', 'coro falcon', 7, 'no poseo la clave para la obtencion del mercado virtual', '2015-05-11 17:29:56'),
(550, 6114191, 'ANDRES', 'HERRERA', 'AEHERRERA45@GMAIL.COM', '0424 2380935', 'CEALCO', 3, 'BUENOS DIAS ME ACABO DE REGISTRAR EN LA PAGINA MAS SIN EMBARGO AL PUÑSAR ENTRE SOLO APARECE UNA PAGINA EN BLANCO. QUISIERA SABER SI EL PROCEDIMIENTO ES INCORRECTO O ES Q LA PAG TIENE ALGUN PROBLEMA', '2015-05-13 16:20:27'),
(551, 8694875, 'yulis belen ', 'milano', 'y.milano.venaqlcasa@gmail.com', '84144595975', 'calabozo edo guarico', 3, '', '2015-05-15 11:05:27'),
(552, 24125652, 'carlos javier ', 'tocuyo garcia', 'carlostocuyo1@hotmail.com', '04142571386', 'heladeria coppelia plaza venezuela', 8, 'no he podido entrar en el mercado ', '2015-05-18 18:16:22'),
(553, 11898810, 'Lilian Patricia', 'Valero Acevedo', 'colette0804@gmail.com', '04264159062', 'areperas', 10, 'el sistema no me deja entrar ya que dicen que mis datos no están registrados. y yo ya he comprado\r\n', '2015-05-26 12:38:05'),
(554, 20434187, 'LUZ ANDREINA', 'ARIAS PICON', 'luandre1991@gmail.com', '04264103998', 'distrito capital', 10, 'nuevo ingreso no permitiso al sistema ', '2015-05-28 16:27:44'),
(555, 4589938, 'raul', 'dominguez', 'kbezonraul45@hotmail.com', '04125863643', 'av baralth quinta crespo', 10, 'no puedo recuperar mi clave ', '2015-05-29 13:16:32'),
(556, 17583780, 'cesar', 'revilla', 'cesar.irevilla@gmail.com', '04149456580', 'altagracia de orituco', 3, 'Como hago para bajar la planilla del fideicomiso q apreto la opcion y no abre.', '2015-05-29 22:46:21'),
(557, 17583780, 'cesar', 'revilla', 'cesar.irevilla@gmail.com', '04149456580', 'altagracia de orituco', 3, 'Como hago para bajar la planilla del fideicomiso q apreto la opcion y no abre.', '2015-05-29 22:46:24'),
(558, 17583780, 'cesar', 'revilla', 'cesar.irevilla@gmail.com', '04149456580', 'altagracia de orituco', 3, 'Como hago para bajar la planilla del fideicomiso q apreto la opcion y no abre.', '2015-05-29 22:46:24'),
(559, 17583780, 'cesar', 'revilla', 'cesar.irevilla@gmail.com', '04149456580', 'altagracia de orituco', 3, 'Como hago para bajar la planilla del fideicomiso q apreto la opcion y no abre.', '2015-05-29 22:46:25'),
(560, 26739038, 'YONAIKER', 'APELLIDO', 'yonaiker_ORH@hotmail.com', '04120929593', 'ciuda betania', 5, 'problema con la clave', '2015-05-30 23:54:41'),
(561, 6426793, 'isaac josé', 'garcía galindo', 'joseisaac45@gmail.com', '8711085', 'imprenta', 10, '', '2015-06-02 18:23:43'),
(562, 12783606, 'LIETH COROMOTO', 'TORREALBA', 'LIETHTORREALBA@HOTMAILCOM', '04242173723', 'SEDE', 3, '', '2015-06-02 18:33:19'),
(563, 6005916, 'magali', 'abreu', 'maryuri_2012_4@hotmail.com', '04266138223', 'catia', 3, '', '2015-06-02 22:22:29'),
(564, 19313156, 'DIVANA MERCEDES MORA', 'MORA MURILLO', 'DM_173@HOTMAIL.COM', '04263151399', 'QUINTA CRESPO', 10, 'NO PUEDO RECUPERAR MI CLAVE', '2015-06-02 22:58:43'),
(565, 4164216, 'JUANITA', 'AREVALO', 'juanitarumualda_54@hotmail.com', '04169198162', 'CATIA ', 10, '', '2015-06-03 01:46:45'),
(566, 19932853, 'NESTOR', 'HERNANDES', 'NESTOR_FLACO19@HOTMAIL.COM', '04141380737', 'QUITA CRESPO', 10, '', '2015-06-03 14:59:21'),
(567, 18069965, 'EDUARD', 'GUERRA', 'ee.guerra.venalcasa@gmail.com', '04124066538', 'Abasto Fijo Guacara', 3, 'Al momento de ingresar al intra de venalcasa para generar mi mercado virtual del mes de junio, me da error, dice que los datos no existen. Trato de recuperar contraseña,ingreso Cedula de identidad y Fecha de Nacimiento y arroja un error que dice que los datos no existen en la base de dato.  Esperando contar con su apoyo;Atte;\r\n\r\nEduard', '2015-06-04 13:22:39'),
(568, 16021152, 'XIOVER', 'PEÑA', 'X.PENA.VENALCASA@GMAIL.COM', '04141413339', 'SEDE ADMINISTRATIVA', 3, 'NO PUEDO INGRESAR A MI USUARIO PARA PODER REALIZAR LA COMPRA DEL MERCADO HE SOLICITADO LA CLAVE EN VARIAS OPORTUNIDADES PARA VER SI ERA ESE EL PROBLEMA PERO AUN ASI NO PUEDO INGRESAR ', '2015-06-04 15:20:56'),
(569, 18129385, 'MARYLUZ ', 'LOPEZ', 'marylo88.maryluz@gmail.com', '04242854018', 'Avenida Baralt Quinta Crespo', 10, 'A pesar que verifica mi usuario y clave no puedo acceder al portal para el mercado virtual', '2015-06-04 18:11:08'),
(570, 20858427, 'JESUS ENRRIQUE ', 'ARAUJO RIVAS ', 'qxojesus@gmail.com', '04166709671', 'PLANTA BARINAS', 3, 'AL INGRESAR EL MI USUARIO DE VENALCASA NO ME HABRE Y LUEGO APARECE UNA VENTANA QUE DICE QUE NO ESTAN MIS DATOS EN EL SISTEMA Y NO PUEDO REALIZAR MI COMPRA VIRTUAL', '2015-06-04 19:04:01'),
(571, 20963809, 'jose', 'CRESPO', 'niko19crespojose@hotmail.com', '04161265495', 'PLANTA BARINAS', 3, ' no puedo hacer el mercado corporativo no me acepta los datos y anteriormente ya lo habia hecho ', '2015-06-04 19:18:43'),
(572, 9676730, 'Luis', 'Zapata', 'luiszapata08@gmail.com', '0243- 5510828', 'Maracay', 8, 'Buenas tardes, la presente es para solicitar informacion del beneficio del mercado virtual para los trabajadores (as), ', '2015-06-04 19:55:33'),
(573, 15340028, 'STARLIN JOSE ', 'SILVA CORDERO', 'N.GALICIA.VENALCASA@GMAIL.COM', '04167535801', 'PLANTA HARINA LA COLONIA', 3, 'EL USUARIO O CLAVE INVALIDA ', '2015-06-05 06:18:39'),
(574, 14073494, 'minerva ', 'rojas', 'mrojasbrito@gmail.com', '04263959793', 'vargas', 10, 'como se puede realizar la solicitud para las jornadas del mercado, cuales son los requisitos, con que debemos contar, es viable?, somos 45 personas en esta sede regional. ', '2015-06-09 13:50:09'),
(575, 11916141, 'Jerry', 'Santaella', 'jerttns2541@hotmail.com', '04123983977', 'caracas, Qta. crespo', 10, 'ya estoy en la nomina y no puedo registrarme para el mercado virtual', '2015-06-11 00:56:59'),
(576, 11234467, 'Icoha', 'Alvarez', 'Icoha_74@hotmail.com', '04263049154', 'Centro Clinico', 10, 'Buenas Noches quiero cambiar el nombre de la persona a quien autorizo a retirar el mercado,  pero no m da la opcion de editar para el cambio, que puedo hacer al respeto,gracias...', '2015-06-12 00:48:21'),
(577, 13232315, 'hilario', 'manzanares', 'sindicato_val@cealcove.com', '0412-4107152', 'operaciones', 9, 'recordatorio de clave.\r\n', '2015-06-16 17:59:16'),
(578, 16647136, 'naydelis ', 'carrillo', 'n.carrillo.venalcasa@gmail.com', '04245206858', 'planta la veguita', 3, 'buenas tarde la pregunta es que necesito saber por donde ahora se puede descargar los triptico del fondo autogestionado y las planilla de solicitud de prestaciones sociales ya que no se encuentra en ninguna de la opciones existente la requiero ', '2015-06-16 18:02:53'),
(579, 6119506, 'María Luz', 'Villamizar', 'maria.villamizar61@gmail.villamizar61@gmail.', '04264170033', '', 8, ' Buenas tardes trabajo para EMPRESA BOLIVARIANA DE PRODUCCIÓN SOCIAL CACAO ODERI ubicada en Barlovento caucagua municipio Acevedo Estado Miranda quisiera saber como acceder de sus productos como Mercal obrero agradezco información \r\nMaría Villamizar\r\nCoordinadora de Calidad', '2015-06-17 21:35:58'),
(580, 15749179, 'Yoni Enrrique', 'sequera figueredo', 'jonysf21@gmail.com', '04143580707', 'valencia', 9, 'no me han enviado la clave para accesar la compra. gracias\r\n', '2015-06-18 00:36:03'),
(581, 15949179, 'Yoni Enrrique', 'sequera figueredo', 'Yonisf21GMAIL.COM', 'O4143580707', 'valencia', 9, 'ME DICE QUE ESTOY REGISTRADO EN SISTEMA PERO NO ME ACEPTA LA CLAVE CODIGO. PUEDE SER MAS ESPECIFICO DONDE ESTA LA FALLA\r\n', '2015-06-18 01:02:00'),
(582, 15949179, 'Yoni Enrrique', 'sequera figueredo', 'jonysf21@gmail.com', '04143580707', 'valencia', 9, 'DESEO CAMBIAR LA CLAVE', '2015-06-18 01:04:51'),
(583, 15949179, 'Joni Enrique', 'sequera figueredo', 'Yonisf21GMAIL.COM', 'O4143580707', 'valencia', 9, 'ME DICE QUE ESTOY REGISTRADO EN SISTEMA PERO NO ME ACEPTA LA CLAVE CODIGO. PUEDE SER MAS ESPECIFICO DONDE ESTA LA FALLA\r\n', '2015-06-18 01:09:18'),
(584, 15949179, 'JONY ENRIQUE ', 'sequera figueredo', 'jonysf21@gmail.com', '04143580707', 'CEALCO VALENCIA ', 9, 'BUENAS NOCHE SALUDOS CORDIALES \r\nTENGO UN PROBLEMA AL INICIAR PARA ENTRAR AL MERCADO EN LINEA NO PERMITE ENTRAR QUE POSIBILIDAD HAY DE QUE ME AYUDEN OH ME REINICIA PARA VOLVER A REGISTRARME GRACIAS UN SALUDO REVOLUCIONARIO Y COMPATRIOTA . GRACIAS . ESPERO SU PRONTA RESPUESTAS . GRACIAS ', '2015-06-18 01:36:25');
INSERT INTO `novedad` (`NU_IdNovedad`, `NU_Cedula`, `AL_Nombre`, `AL_Apellido`, `AF_Correo`, `AF_Telefono`, `AF_Ubicacion`, `empresa_NU_IdEmpresa`, `AF_Novedad`, `FE_Registro`) VALUES
(585, 6106422, 'JOSE RICARDO', 'SANABRIA TREJO', 'JOSERICARDOSANABRIA TREJO@HOTMAIL.COM', '04267121106', 'SDAI SERVICIO AMINISTRATIVO INTEGRAL SDAI C.A', 7, '', '2015-06-29 20:08:22'),
(586, 21443548, 'Argenis', 'Montes de Oca', 'argenismontesdeoca@gmail.com', '04162858390', 'Cereales la cruz', 3, 'Ante todo un cordial saludo revolucionario, mi duda es que si yo puedo manejar mi cuenta aca en intravenalcasa.\r\ndebido que la controla es el encargado de recursos humanos.\r\ny le hice la peticion de que si yo podia manejarla y su respuesta es que iba a preguntar, pero como el no me da respuesta, quisiera saber si el trabajador que se registra aca no puede manejar su cuenta.\r\n-Solo eso-', '2015-06-29 21:57:25'),
(587, 5687163, 'Omar', 'Galaviz', 'galavizomar@hotmail.com', '04242662819', 'Imprenta (RELACIONES PÚBLICAS)', 10, 'MIS DATOS NO APARECEN REGISTRADOS EN EL SISTEMA DEL MERCADO Y HE REALIZADO LOS MERCADOS ANTERIORES', '2015-06-30 17:10:06'),
(588, 19064089, 'maria isabel', 'duran lara', 'hectorperezya@yahoo.es', '04143244694', 'quintacrespo', 10, '', '2015-06-30 18:03:45'),
(589, 17427242, 'hector miguel', 'perez herrera', 'hectorperezya@yahoo.es', '04129177560', 'quintacrespo', 10, '', '2015-06-30 18:05:32'),
(590, 25214475, 'henzzell louis', 'sanz gutierrez', 'hunter_995@hotmail.com', '04123907918', 'quintacrespo', 10, '', '2015-06-30 18:13:47'),
(591, 12562192, 'ROBERY', 'GONZALEZ', 'ROBERY.GONZALEZ@GMAIL.COM', '04265369972', 'OFICINA DE PLANIFICACION ', 10, 'NO HE PODIDO REALIZAR EL REGISTRO POR PRIMERA VEZ PARA PODER REALIZAR MERCADO YA QUE SOY EMPLEADO NUEVO A GRADESCO LA SOLUCION PRONTO GRACIAS...', '2015-06-30 18:49:48'),
(592, 25214475, 'HENZZELL LOUIS', 'SANZ GUTIERREZ', 'hunter_995@hotmail.com', '04123907918', 'QUINTACRESPO', 10, '', '2015-06-30 18:49:59'),
(593, 13834937, 'DENIS MICHEL', 'MUJICA', 'MICHEL30_DENIS@HOTMAIL.COM', '04241477511', 'QTA CRESPO', 10, 'NO APAREZCO EN EL SISTEMA', '2015-07-01 00:28:13'),
(594, 20415070, 'MARIANGEL', 'SALAS', 'msalasbaptista@gmail.com', '04140401701', 'Caracas, avenida Baralt esquina el carmen', 10, 'no me abre el sistema, meto mi cedula y mi clave y me dice que esta incorrecto', '2015-07-01 13:16:49'),
(595, 10786071, 'larry alonzo', 'aponte oviedo', 'larriaponte07@gmail.com', '04264217235', 'cede central proyecto servicio y mantenimiento ', 10, 'servicio generales', '2015-07-01 18:41:04'),
(596, 19819488, 'Jose Daniel', 'Duran Rodriguez', 'ingjoseduran284@gmail.com', '04149336080', 'Sede central, Inspectoria, Caracas Qta. Crespo Edif Instituto Nacional de Nutricion.', 10, 'El sistema no me permite entrar a realizar la compra me dice "Los datos introducidos no EXISTEN  en nuestra base de datos"', '2015-07-02 00:08:22'),
(597, 6361838, 'HECTOR ANTONIO', 'CASTRO SAAVEDRA', 'servgenerales@inn.gob.ve', '04264147973', 'SEDE CENTRAL', 10, '', '2015-07-02 13:52:18'),
(598, 10674139, 'julio', 'navarro', 'julionavarro31@hotmail.com', '04241398876', 'avenida andres bello', 5, 'no puedo igresar al sistema\r\n', '2015-07-02 16:44:33'),
(599, 15106300, 'Alexander ', 'Chirinos', 'alexanderchirinos207@hotmail.com', '04262800110', 'Edificio las fundaciones, avenidad andres bello departamento de inspección y fiscalización', 5, 'al ingresar al sistema me notifica el mismo que no aparezco registrado y cuando le doy recupera clave me notifica que ya me encuentro registrado.', '2015-07-03 21:16:54'),
(600, 12390608, 'Ernesto', 'varela', 'ernestovarela1@hotmail.com', '04162197613', 'caracas quinta crespo', 10, 'Estoy registrado y el sistema me rechasa. No puedo ingresar.', '2015-07-03 23:06:05'),
(601, 17402657, 'Eduardo', 'Martins', 'emartins.87@gmail.com', '04241714225', 'recursos humano', 10, 'Buenas mer registre desde hace unas semanas y no he podido ingresar al sistema y me dice que el usuario o la contaseña es invalida', '2015-07-07 19:42:13'),
(602, 13155149, 'alexyumen ', 'garcia  nieves', 'alexyumen.venalcasa@gmail.com', '04263772381', 'barinas', 3, 'no me abre el mercado virtual me dice q clave invalida', '2015-07-07 21:41:53'),
(603, 16127899, 'jose luis', 'gomez', 'd.torcates.venalcasa@gmail.com', '02738716634', 'veguita', 3, 'tengo problema para abrir para pedir el mercado virtual', '2015-07-08 00:53:58'),
(604, 9913389, 'YAKELINE DEL VALLE', 'CAMEJO FIGUEROA', 'y.camejo.venalcasa@gmail.com', '04120931684', 'CHAGUARAMAS', 3, 'desbloquear la clave por favor', '2015-07-08 02:17:27'),
(605, 9913389, 'YAKELINE DEL VALLE', 'CAMEJO FIGUEROA', 'y.camejo.venalcasa@gmail.com', '04120931684', 'CHAGUARAMAS', 3, '', '2015-07-08 02:26:56'),
(606, 20099876, 'Renny jose', 'Palacio Zambrano', 'rennypalacio@gmail.com', '04125087830', 'planta la veguita sabaneta estado barinas', 3, 'No puedo sacar la constancia de trabajo', '2015-07-14 01:51:20'),
(607, 20099876, 'Renny jose', 'Palacio Zambrano', 'rennypalacio.venalcasa@gmail.com', '04125087830', 'Planta la veguita sabaneta estado barinas', 3, 'No puedo sacar la condtancia de trabajo', '2015-07-14 02:11:28'),
(608, 19153169, 'jose leonardo ', 'evora perez', 'yitzabrito@hotmail.com', '04242335765', 'catia', 3, 'necesito el mercado trabajo en mampote', '2015-07-14 13:39:31'),
(609, 10303356, 'Silvia', 'Fernandez', 'conchaf695@gmail.com', '04263908703', 'Unidad de Nutricion del Estado Monagas', 10, 'Buenas noches, cual seria el procedimiento para ingresar a las compras on line, soy vocera del Eje Economico del Consejo Socialista de Trabajadores y trabajadores.', '2015-07-15 02:19:23'),
(610, 10303356, 'Silvia', 'Fernandez', 'conchaf695@gmail.com', '04263908703', 'Unidad de Nutricion del Estado Monagas', 10, 'Buenas noches, cual seria el procedimiento para ingresar a las compras on line, soy vocera del Eje Economico del Consejo Socialista de Trabajadores y trabajadores.', '2015-07-15 02:20:05'),
(611, 16127899, 'jose luis', 'gomez becerra', 'gomezjosel@hotmail.com', '02738716634- 04267716021', 'planta la veguita', 3, 'Buenas tarde la presente es con la finalidad de informar que no puedo recuperar la clave por tanto solicito cambiar el correo asignado a este gomezjosel@hotmail.com que es mi correo personal para poder recuperar mi clave ya que no pude comprar la comida del mercado corporativo el mes pasado\r\n', '2015-07-22 18:06:31'),
(612, 6976241, 'Richard', 'Aguilera', 'richard916@gmail.com', '04143272383', 'Sede central', 10, 'Buenos días, No puedo entrar a la página con mi clave y usuario y yo no lo he cambiado y me dice que es invalido, por favor si me pueden corregir ese error, gracias', '2015-07-29 11:51:31'),
(613, 15106300, 'ALEXANDER DE JESUS ', 'CHIRINOS ALVIARES ', 'ALEXANDERCHIRINOS207@HOTMAIL.COM', '04262800110', 'TORRE LA REVOLUCION AV.ANDRES BELLO, SEGUIMIENTO Y CONTROL, PISO 1', 5, 'NO HE PODIDO REALIZAR POR DOS MESES EL MERCADO OBRERO', '2015-07-29 15:44:28'),
(614, 20129640, 'Andres ', 'marrero', 'cibernauta_007@hotmail.com', '04143662491', 'USP IPOSTEL', 5, 'Perdi Mi Clave para ingresar y hacer la compra le doy a recuperar clave y me dice q no salgo registrado ', '2015-07-29 22:48:08'),
(615, 13224954, 'MARLENE COROMOTO', 'QUINTERO', 'marlenequinterooo@gmail.com', '04144582121', 'plaza de venezuela', 5, 'no puedo entraer a mi mercado venalcasa', '2015-07-30 13:35:36'),
(616, 24244460, 'EDGAR', 'ESPINOZA', 'edgarespinoza21@gotmail.com', '04263463264', 'tinaquillo', 3, 'recibo de pago de los ultimo 3 meses', '2015-07-30 16:55:29'),
(617, 19930978, 'genesis alexandra', 'quinto linares', 'loverlin.quinto@gmail.com', '04169330491', 'sede', 10, 'que no aparesco registrada y se me olvido la clave', '2015-07-30 22:54:36'),
(618, 19933029, 'Maria Carolina', 'Landaeta Zuloaga', 'mkaroland@gmail.com', '04129883318', 'Valles del Tuy ', 17, 'buenas, me registre y cree mi usuario y clave con exito, incluso me llego el correo de la clave, ahora cuando intento ingresar al sistema me dice que usuario y/o clave invalido. le doy a recuperar y coloco mis datos con mi fecha de nacimiento y me dice que los datos suministrados no estan en la base, pero al registrarme verifique y mi fecha de nacimiento era la correcta. por favor solventarme o ayudarme a corregir este problema para poder ingresar... gracias ', '2015-07-31 22:52:39'),
(619, 21581612, 'kelde luis', 'seco sifontes', 'keldeluis_92@hotmail.com', '04266378078', 'Altagracia de orituco estado Guárico', 3, '', '2015-08-03 13:42:06'),
(620, 16339651, 'MARVI ANGELICA', 'BRAVO ', 'cangelimar@yahoo.es', '04266962433', 'docente y vocera de la mesa de energia de la comunidad ', 3, 'existe necesidad de realizar ventas organizadas que ayuden el proceso en esta comunidad contamos con espacio para vender alimentos aqui hay muchos opositores que desean dañar el gobierno y el alimento no llega a los hogares ', '2015-08-08 11:26:34'),
(621, 16339651, 'MARVI ANGELICA', 'BRAVO', 'cangelimar@yahoo.es', '04266962433', 'ciudad bolivar parroquia agua salada riveras del caura ', 5, 'me aprobaron un credito por el banco del pueblo para reposteria compre un horno de dos ventanas pero no puedo arrancar por falta de harina de trigo me la venden en quincemil el saco quisiera su apoyo para afiliarme y comprar a precio justo para poder hacer panes a mi comunidad y asi ayudar contra  la guerra de la escases ', '2015-08-08 11:29:51'),
(622, 16339651, 'MARVI ANGELICA', 'BRAVO', 'cangelimar@yahoo.es', '04266962433', 'ciudad bolivar parroquia agua salada riveras del caura', 3, 'como hacer para vender sus productos de forma continua tenemos un local disponible para tal fin debemos ayudar para que la revolucion se mantenga hay que distribuir alimentos a las comunidades aqui no contamos con este servicio mi esposo y yo somos docentes podemos invertir para adquirir alimentos y venderlos semanalmente a nuestro sector la revolucion esta en peligro de seguir la escases camaradas tenemos espacio disponible', '2015-08-08 11:33:35'),
(623, 6420740, 'Gladys', 'Ortuño', 'gladisdugle@hotmail.com', '04169199238', 'STA TERESA DEL TUY', 10, 'NO ME PUEDO REGISTRAR EN VENALCASA MERCADO', '2015-08-09 03:43:52'),
(624, 6420740, 'Gladys', 'Ortuño', 'gladisdugle@hotmail.com', '04169199238', 'STA TERESA DEL TUY', 10, 'NO ME PUEDO REGISTRAR EN VENALCASA MERCADO', '2015-08-09 03:43:53'),
(625, 18542572, 'Maria Teresa', 'Romero Olivares', 'mariateresita1988@gmail.com', '04242546755', 'Estado Miranda', 17, 'por favor verificar que no estoy en el sistema de compra', '2015-08-09 13:41:59'),
(626, 8175873, 'nancy', 'gomez', 'nancyoshun@outlook.com', '04142216317', 'Los teques', 10, ' Despues que me registré no puedo acceder y realizar la compra. me aparece clave, usuario o clave invalido.Estoy segura de introducir losd atos correctos.', '2015-08-10 19:48:27'),
(627, 4878630, 'celia', 'pedron', 'legon_querales@outlook.com', '02346622297', 'escuela estadal carlos eduardo Rengifo', 10, 'no e podido hacer mi registro', '2015-08-11 20:18:47'),
(628, 6813860, 'Rosa Marbelys', 'Abello', 'rosamarbelisabello@hotmail.com', '04164262333', 'Miranda Santa Eulalia los teques', 17, 'hola saludos mi novedad es que salo registrada y para recuperar la clave dice que los datos suministrados no estan en su sistema de datos, agradezco por fav su pronta colaboracion para efectuar mi compra gracias ', '2015-08-11 22:44:03'),
(629, 4289903, 'VILMA ELISA', 'CAMACARO DE ARTEAGA', 'VILMACAMACARO.2015@GMAIL.COM', '0212-3911864', 'LOS TEQUES', 17, 'NO LOGRO INGRESAR CON LA FECHA DE NACIMIENTO', '2015-08-12 23:02:03'),
(630, 8761671, 'Yaritza del Carmen', 'Yanez de Jaspe', 'yaritzadejaspe@outlook.com', '04141101407', 'Los Teques. Miranda.', 17, 'No puedo ingresar a la pantalla principal para comprar en linea en la Mision Alimentacion Obrero.', '2015-08-13 01:29:40'),
(631, 10750303, 'gabriela', 'reyes', 'gabriela.j.reyes@gmail.com', '04128466024', 'cagua zona industrial corinsa', 9, 'no e podido entrar al sistema para realizar el mercado virtual de este mes', '2015-08-13 02:50:38'),
(632, 8761671, 'YARITZA  DEL CARMEN', 'YANET DE JASPE', 'bet25_l@hotmail.com', '04141101407', 'los teques', 17, 'coloco mis datos y el sistema me dice que no están correctos, le doy para cambiar clave igual dice datos incorrectos. si puede reiniar o algo asi para hacer las compras .. . gracias ', '2015-08-13 19:58:05'),
(633, 14396843, 'martha ramona', 'torresirino ch', 'jhonmart2011@hotmail.com', '02682523012', 'valencia', 3, 'buen dia, somos del cicpc sub delegacion coro, necesitamos realizar pedidos a su empresa para socabar la escaces en los hogares de nuestro personal', '2015-08-14 13:23:45'),
(634, 20963809, 'Jose ', 'Crespo ', 'NIKO19CRESPOJOSE@HOTMAIL.COM ', '04161265495', 'Planta barinas ', 3, 'La constancia no me sale creada ', '2015-08-14 13:47:05'),
(635, 10694521, 'jacinta ', 'romero', 'jacintaromero7@gmail.com', '04142017875', 'araira', 17, 'comprar', '2015-08-14 21:12:22'),
(636, 16236930, 'LEONEL', 'HERNANDEZ', 'll.venalcasa@gmail.com', '04143474796', 'caracas', 3, 'necesito cambiar mi correo, para lograr una constancia de trabajo..', '2015-08-17 21:28:51'),
(637, 12711042, 'Edgar alexander', 'Martinez', 'edmar0114@hotmail.com', '04262143499', 'rio chico', 16, 'Como hacer una afiliacion para los trabajadores de mpps ', '2015-08-18 20:18:35'),
(638, 13866311, 'JUAN', 'BAUTISTA', 'bautistajuancarlos@gmail.com', '04126140865', 'caracas Coord sistemas', 8, 'Olvide mi contraseña y no puedo recuperar, me da error al dar en el boton recuperar', '2015-08-18 20:26:13'),
(639, 20099876, 'renny', 'palacio', 'rennypalacio.venalcasa@gmail.com', '04166751238', 'sabanetas- barinas', 3, 'no puedo descargar mi constancia de trabajo', '2015-08-18 20:47:33'),
(640, 17558869, 'DARALBIS', 'CARIEL', 'DARALBIS', '04167159266', 'PROCURA Y MERCADEO', 5, 'OLVIDE MI CLAVE Y CUANDO INTENTO RECUPERARLA ME DICE QUE LOSDATOS SON INVALIDOS. ', '2015-08-21 17:53:32'),
(641, 20963809, 'JOSE NICANOR', 'CRESPO AZUAJE', 'niko19crespojose@hotmail.com', '04161265495', 'barinas', 3, 'buenas tardes y un saludo revolucionario de ante mano le escribo para informar un problema que se me presenta al tratar de abrir la pagina de intravenalcasa ya que no me acepta el usuario o clave y le doy en recuperar clave y tampoco se me soluciona me aparece que los datos no estan registrado por la empresa por favor le agrdesco me ayuden a solucionar el problema ya que para obtener la constancia de trabajo no puedo y la necesito para gestionar documentos por el banco y por mi casa ya que me piden la constancia de trabajo y por otar parte hacer el mrcado virtual gracias feli dia\r\n', '2015-08-22 19:52:58'),
(642, 25214475, 'henzzell louis', 'sanz gustierrez', 'hunter_995@hotmail.com', '04123907918', 'quintacrespo', 10, '', '2015-08-25 12:08:26'),
(643, 25214475, 'henzzell louis', 'sanz gustierrez', 'hunter_995@hotmail.com', '04123907918', 'quintacrespo', 10, '', '2015-08-25 12:12:35'),
(644, 25214475, 'henzzell louis', 'sanz gustierrez', 'hunter_995@hotmail.com', '04123907918', 'quintacrespo', 10, '', '2015-08-25 12:12:39'),
(645, 25214475, 'henzzell louis', 'sanz gutierrez', 'hunter_995@hotmail.com', '04123907918', 'quintacrespo', 10, '', '2015-08-25 22:17:46'),
(646, 25214475, 'henzzell louis', 'sanz Gutierrez', 'hunter_995@hotmail.com', '04123907918', 'Quintacrespo', 10, '', '2015-08-26 02:08:39'),
(647, 12642236, 'erika', 'diaz', 'mpkatiuska@gmail.com', '04126196913', 'central quinta crespo', 10, 'fui sacada del sistema arbitrariamente sin ninguna notificación. no he podido hacer mi pedido del mes. Espero una pronta respuesta. ya que el lema es inclusion no exclusion', '2015-08-26 03:47:30'),
(648, 14216944, 'adriana ', 'amador', 'brigak_25@hotmail.com', '04128193619', 'principal / relaciones publicas / piso 4 ocri', 10, 'iba a verificar si ya habian aperturado las compras y aparezco como usuario no registrado', '2015-08-26 04:34:47'),
(649, 6906812, 'MARIA TERESA ', 'BARRIO', 'YRIALOPEZ67@GMAIL.COM', '042671584766', 'QUINTA CRESPO ESQUINA EL CARMEN', 10, 'COMPRAS DE INTRAVENALCASA', '2015-08-26 10:02:56'),
(650, 13612775, 'HAYDY', 'FIGUERA', 'HAYDYMARIA@HOTMAIL.COM', '04122006994', 'SEDE', 10, 'YO ISE MI COMPRA PERO LA ORDEN NO SE GUARDO MI COMPUTADORA SE SALIO DEL SISTEMA Y NO SE COMO PUEDO HACER PARA SABER DONDE ESTA LA ORDEN DE LA COMPRA', '2015-08-26 20:14:42'),
(651, 13612775, 'HAYDY', 'FIGUERA', 'HAYDYMARIA@HOTMAIL.COM', '04122006994', 'SEDE', 10, 'YO ISE MI COMPRA PERO LA ORDEN NO SE GUARDO MI COMPUTADORA SE SALIO DEL SISTEMA Y NO SE COMO PUEDO HACER PARA SABER DONDE ESTA LA ORDEN DE LA COMPRA', '2015-08-26 20:14:43'),
(652, 17216621, 'Maria Jose', 'Martinez Hernandez', 'mjmh85@gmail.com', '04265104065', 'CCAN piso 2 ', 10, 'tengo fecha de ingreso el 15 de julio a la institucion y no puedo ingresar al sistema no aparezco registrada, en recursos humanos me dicen que ya solucionaron el problema pero no puedo ingresar', '2015-08-26 22:39:38'),
(653, 6249680, 'MAYAVEDI', 'RIVERO DIAZ', 'MAYITARIVER@GMAIL.COM', '04242025204', 'QUINTA CRESPO, ESQUINA EL CARMEN ', 10, 'NO PUEDO ENTRAR AL SISTEMA', '2015-08-26 22:59:58'),
(654, 6264182, 'judith yadira', 'rondon', 'yadi2892@hotmail.com', '04129586448', 'sede', 10, 'no puedo ingresar a la compra me indica usuario no existente', '2015-08-26 23:58:32'),
(655, 6360033, 'BELLA DOLORES', 'ACEVEDO RAMIREZ', 'bellaobatala@hotmail.com', '04266080546', 'sede central oficina de servicios y mantenimiento', 10, 'no aparece registrada, desconocemos motivo', '2015-08-27 11:59:39'),
(656, 14560488, 'maria ', 'romero', 'fernanmari@hotmail.com', '04169136929', 'av. baralt', 10, 'me dice q mi clave no es correcta ', '2015-08-27 17:41:25'),
(657, 7927184, 'maria ', 'jimenez', 'maria_migdalia09@hotmail.com', '04127009577', 'sade cental', 10, 'porque los trabajadores que nos encontramos de reposo somos sacadosdel sistema de compra  o es que el jefe de recursos humanos de la institucion le esta echando mas leña a nuestro presidente Maduro, por eso el pueblo esta insastifecho, el jefe del estado se maneja de una forma y los gusanos que lo rodean lo siguen hundiendo, son unos falsos escualidos , vestido de revolucion. son unos TRIMARDITOS. CUIDESE MINISTRO `. OSORIO que caras vemos , corazones no sabemos y en Nutricion hay escualidos para echar pa`arriba.  gracias por ver mi mensaje y ojala llegue a ustedes   ', '2015-08-27 21:49:35'),
(658, 7927184, 'maria ', 'jimenez', 'maria_migdalia09@hotmail.com', '04127009577', 'sade cental', 10, 'porque los trabajadores que nos encontramos de reposo somos sacadosdel sistema de compra  o es que el jefe de recursos humanos de la institucion le esta echando mas leña a nuestro presidente Maduro, por eso el pueblo esta insastifecho, el jefe del estado se maneja de una forma y los gusanos que lo rodean lo siguen hundiendo, son unos falsos escualidos , vestido de revolucion. son unos TRIMARDITOS. CUIDESE MINISTRO `. OSORIO que caras vemos , corazones no sabemos y en Nutricion hay escualidos para echar pa`arriba.  gracias por ver mi mensaje y ojala llegue a ustedes   ', '2015-08-27 21:51:25'),
(659, 7927184, 'maria ', 'jimenez', 'maria_migdalia09@hotmail.com', '04127009577', 'sade cental', 10, 'Porque los trabajadores que nos encontramos de reposo somos sacados del sistema de compra  o es que el jefe de recursos humanos de la institucion le esta echando mas leña a nuestro presidente Maduro, por eso el pueblo esta insatisfecho, el jefe del estado se maneja de una forma y los gusanos que lo rodean lo siguen hundiendo, son unos falsos escuálidos , vestido de revolución. son unos TRIMARDITOS. CUÍDESE MINISTRO `. OSORIO que caras vemos , corazones no sabemos y en el Instituto Nacional de Nutrición Sede Central hay escuálidos para echar pa`arriba.  gracias por ver mi mensaje y ojala llegue a usted.   ', '2015-08-27 21:56:03'),
(660, 25214475, 'henzzell', 'sanz', 'hunter_995@hotmail.com', '04123907918', 'quintacrespo', 10, '', '2015-08-28 01:33:49'),
(661, 25214475, 'henzzell', 'sanz', 'hunter_995@hotmail.com', '04123907918', 'quintacrespo', 10, '', '2015-08-28 01:33:52'),
(662, 18268007, 'JORGE LUIS', 'LEON', 'J LEON.VENALCASA@GMAIL.COM', '04249212112', 'CARRETERA NACIONAL CAICARA PUNTA DE MATA', 3, 'SE LE OLVIDO SU CLAVE', '2015-09-01 19:35:04'),
(663, 19881704, 'hector ramon', 'salas fernandez', 'elkili182@hotmail.com', '02737781062', 'planta la veguitas', 3, 'tengo problema con la constancia de trabajo , ya que me sales con errores. ', '2015-09-01 20:00:15'),
(664, 8694196, 'Eustaquia', 'Rivas', 'rakiti3@HOTMAIL.COM', '04168063468', 'Calle principal sta Eulalia cruce con cecilio acosta Nº 75-A', 17, '', '2015-09-02 23:49:06'),
(665, 6001047, 'LIDIA', 'LEON', 'LEON LIDIA58@GMAIL.COM', '0416907992', 'MUNICIPIO SUCRE', 3, 'NO APAREZCO EN REGISTRO, CUANDO YA HICE LA PRIMERA COMPRA. QUE PASA O QUE DEBO HACER', '2015-09-05 18:49:10'),
(666, 12834925, 'maria elena ', 'pacheco', 'jesusnasare22@gmail.com', '0212.885.21.81', 'caracas', 5, 'sobre los registro virtual como hacer para las compra \r\n', '2015-09-05 22:49:23'),
(667, 8205413, 'Manuel Jose', 'Armas', 'manueljarmas@hotmail.com', '04148088862', 'Barcelona Estado anzoategui', 3, 'Saludos Cordiales, mi nombre es Manuel Jose Armas, tengo una Venta de empanadas en Barcelona y quisiera ponerme en contacto con ustedes, mas especificamente con el G/D Julmer Yepez Presidente de Venalcasa ', '2015-09-06 00:18:44'),
(668, 16648181, 'JENIFERT', 'INFANTE', 'J.INFANTE.VENALCASA@ GMAIL.COM', '04263960327', 'PARROQUIA SAN FRANCISCO', 3, 'COMO HAGO PARA CONOCER EL ACUMULADO DE MIS PRESTACIONES', '2015-09-07 17:09:11'),
(669, 4878630, 'CELIA CRUZ', 'PEDRON', 'GAGC_64@HOTMAIL.COM', '02346622297', 'STA EULALIA NRO 17', 17, 'COMPRAS DE ALIMENTOS', '2015-09-08 11:26:25'),
(670, 15635802, 'wuilfre jose ', 'garcia perez', 'wuilfregarcia.venalcasa@gmail.com', '04262857835', 'planta san francisco ', 3, 'no puedo acceder a la pagina del mercado ', '2015-09-08 14:57:52'),
(671, 5003295, 'albertina', 'planchart', 'niurkag27@hotmail.com', '0426-9093934', 'santa teresa del tuy', 17, 'se me olvido la clave y no me da asceso para recuperarla para hacer mis compras el dia de hoy ya que mañana tengo que entregar la planilla\r\n', '2015-09-08 15:35:38'),
(672, 20748375, 'Gabriel', 'Ramírez', 'gaboalberto66@hotmail.com', '0414-1306350', 'Los Teques', 17, 'Estoy registrado en el sistema, pero cuando trato de inicar sesion me salta el aviso de clave incorrecta y cuando me dirijo  al gestor de recperación de clave no acepta los datos suministardos. ', '2015-09-08 16:56:36'),
(673, 20748375, 'Gabriel', 'Ramírez', 'gaboalberto66@hotmail.com', '0414-1306350', 'Los Teques', 17, 'Estoy registrado en el sistema, pero cuando trato de inicar sesion me salta el aviso de clave incorrecta y cuando me dirijo  al gestor de recperación de clave no acepta los datos suministardos. ', '2015-09-08 16:56:36'),
(674, 5003295, 'Albertina ', 'Planchart', 'niurkaG27@hotmail.com', '04169093934', 'caracas', 10, 'Orvido de clave', '2015-09-08 17:16:15'),
(675, 13895538, 'ender', 'garnica', 'endex24@hotmail.com', '04165378536', 'los tegues', 17, 'recuperación de clave...', '2015-09-08 17:58:38'),
(676, 13895538, 'ENDER', 'GARNICA', 'endex24@hotmail.com', '04165378536', 'miranda', 17, 'OLVIDE MI CLAVE DE ACCESO Y NO PUEDO RECUPARARLA YA QUE ME DICE QUE NO ESTOY REGISTRADO CON MI CEDULA NI FECHA DE NACIMEINTO CUYOS DATOS SON 13.985538 Y FECHA DE NACIMEINTO 7/03/1979. Agradezco pronta respuesta el pedido debe hacerse antes de mañana.', '2015-09-08 18:17:49'),
(677, 17921023, 'HECTOR DANIEL', 'CARDONA TREJO', 'hectorcar_11@hotmail.com', '04163297251', 'eje guarenas- guatire', 17, 'no puedo entrar a mi cuenta y trato de cambiar la clave y nada y trato de inscribirme de nuevo y dice que ya estoy registrado', '2015-09-08 19:43:27'),
(678, 6249778, 'celia', 'peralta', 'celiaperalta00@hotmail.com', '04269029007', 'cua', 10, 'no puedo ingresar a la pagina', '2015-09-09 13:23:49'),
(679, 6249778, 'celia', 'peralta', 'celiaperalta00@hotmail.com', '04269029007', 'cua', 10, 'no puedo imprimir planilla', '2015-09-09 19:54:08'),
(680, 5400939, 'nives de la caridad', 'lara de reyes', 'nievescaridad05@gmail.com', '04162136126_02392240841', 'sede los teques', 17, 'compra de productos de la cesta bsàica: aceite, arroz, cafe, carne,harina de maìz pre cosida,leche en pollo,margarina,pasta corta y larga, pollo, sal, salsa de tomate, y otros.\r\n', '2015-09-09 20:09:47'),
(681, 19762367, 'alexander jose ', 'salamanca cordero', 'alexander35s@hotmail.com', '04163164254', 'Sucre', 5, 'Buenas ... Me Dirijo Por Este Medio Para Informacion De Algun Empleo De Chofer o representante de ventas En Cumana O Viajando Saludos Tengo 23Años Lic De 4ta Y Todos Los Documentos Vigentes Y Asi Tener Una Amplia Distribucion De Sus Productos En El Edo. Sucre\r\n\r\nMi Experiencia \r\n\r\nü  Taller de Primeros Auxilios\r\n\r\nü  Curso de Refrigeración\r\n\r\nü  Curso de Instalaciones eléctricas\r\n\r\nü  Transporte De Personal Comedores Industriales  “SERCOINFAL”, En Toyota De Venezuela\r\n\r\nü  Transporte De Personal  “McDonald’s”\r\n\r\nü  Transporte De Personal  “NAVIARCA”\r\n\r\nü  Transporte De Personal Súper Mercados   “UNICASA”\r\n\r\nü  Licencia De 4to Grado , Certificado Medico Vigente', '2015-09-10 22:33:55'),
(682, 20963809, 'JOSE NICANOR', 'CRESPO AZUAJE', 'niko19crespojose@hotmail.com', '04161265495', 'barinas ESTADO BARINAS', 3, 'NECESITO CON URGENCIA LA CONSTANCIA DE TRABAJO Y NO ME LA ARROJA EL SISTEMA ME SALE ERROR...\r\n POR FAVOR SOLUCIONARME EL PROBLEMA ', '2015-09-13 17:30:44'),
(683, 6249778, 'celia ubilerma', 'peralta garcia', 'celiaperalta00@hotmail.com', '04269029007', 'cua', 17, 'necesito recuperación de clave por favor  ...', '2015-09-14 18:25:18'),
(684, 15804712, 'ines ', 'vargas', 'inesvrgs@gmail.com', '0426 6123464 / 02392484637', 'charallave ', 8, 'Buenos dias. no he logrado entrar en la pagina para realizar el mercado programado  debido a no recordar la clave  muchos le s sabre agradecer si pueden por favor enviarla a mi correo o numero de celular', '2015-09-17 02:34:25'),
(685, 19019065, 'solfrank ', 'tovar', 'solfranktovar@gmail.com', '04140183900', 'guatire sector el ingenio miranda', 8, 'no puedo recuperar mi clave', '2015-09-17 13:48:18'),
(686, 15804712, 'INES ', 'VARGAS', 'inesvrgs@gmail.com', '0239-2484637', 'region capital', 8, 'buenas tardes .\r\n\r\npor medio del presente les indico que se me olvido la clave de ingreso para realizar la compra del mercado programado  y tengo la oportunidad hasta el dia 18/09/2015 para realizarlo, ya que no recuerdo la clave y en olvido su clave no me permite recuperarla  mucho le agradeceria si pueden apoyarme  para la recuperacion de la misma \r\n', '2015-09-17 17:15:57'),
(687, 18789045, 'wuilmer jose ', 'Quintero', 'wilmerquintero4@hotmail.com', '04140890288', 'barinas, cojedes', 3, 'buenas tarde camara necesito por favor comunicarme para gestionar unos operativo a cielo abierto que realizamos el concejo municipal del municipio cajigal estado sucre y necesitamos que nos suministre leche y arroz en calidad de venta para ayudar a convatir la guerra economica le habla el concejal wuilmer quintero ', '2015-09-23 01:14:59'),
(688, 16611524, 'Norman', 'Torrres', 'norman.nets@gmail.com', '04120120603', 'Caracas', 10, 'La intranet, luego de dejarla abierta por más de media hora y refrescar el navegador sale un mensaje de que ha sido hackeada por Anonymus... tengo algunas capturas de imagen de la pantalla. Este mensaje tiene tiempo saliendo, pensé ya estaban solventando el problema, pero sigue apareciendo.\r\nSaludos. ', '2015-09-24 16:15:45'),
(689, 7594096, 'domingo alberto ', 'oviedo soterano ', 'domingoaoviedos@gmail.com', '04264560744', 'urachiche yaracuy ', 3, 'por medio del presente solicito cualquier información se me haga saber a través del correo indicado en este formulario ademas necesito me envíen la clave para entrar en esta pagina y poder realizar mis consultas me despido esperando su pronta repuesta dándole las gracias de antemano       ', '2015-09-26 00:37:17'),
(690, 8175873, 'NANCY ', 'GOMEZ', 'nancygomez926@gmail.com', '04142216317', 'LOS TEQUES', 10, 'buenas noches es para informarles que desde que me registre no he podido hacer la compra ya que cada vez que  entro en el portal me dice codigo o contraseña invalida.quisiera que me eliminaran para volveme a registrar por favor', '2015-09-28 23:15:43'),
(691, 12374805, 'maryury', 'escalona', 'maryuri_2012_4@hotmail.com', '04242517118', 'red venezuela', 3, 'para entrar a mi pejina del mercado ', '2015-09-30 00:04:19'),
(692, 12374805, 'maryury', 'escalona', 'maryuri_2012_4@hotmail.com', '04242517118', 'avenida sucre', 3, 'para entrar a mi pejina del mercado', '2015-09-30 00:10:00'),
(693, 11071348, 'LAURA ', 'TORRES', 'pueblodesarrollocomuinder@yahoo.es', '0426 2318474', 'Guanare Edo,. Portuguesa', 10, 'PARA:  PRESIDENTE DE VENELCASA\r\n\r\nReciba un saludo Revolucionario.\r\nEs para solicitarle Operativo Venelcasa para INDER solicitado desde 28-4-2015, para los trabjadores(as) de nuestro Institución el 23-9-2015 converse con el Supervisor Frank Morle , el cual me explicó que los operativos Institucionales están paralizados.   Por favor le pido lo reconsidere ya que los funcionarios (as) públicos somos pueblos que estamos en una jornada laboral y por ello necesitamos el operativo en nuestros sitios de trabajo, pido su consideración y respuesta.\r\n\r\nGracias.', '2015-09-30 14:06:14'),
(694, 8175873, 'NANCY', 'GOMEZ', 'NANCIOSHUN@OUTLOOK', '04142216317', 'LOS TEQUES', 17, 'buen dia quiero saber porque cada vez que entro a la pagina no logro iniciar la sesion de compra y meto mis datos y dice clave o usuario invalido y no e logrado registrarme por favor quiero que me borren del sistema para volverme a inscribirme gracias', '2015-10-01 16:42:58'),
(695, 13847487, 'arturo', 'garcia', 'arturo567878@gmail.com', '04123957288', 'avenida andres bello', 4, 'pastelero', '2015-10-01 20:18:48'),
(696, 6249778, 'celia', 'peralt', 'elmejor0253@hotmail.com', '04242151660', 'AV.sucre,galpones VEnalcasa,al lado de la sede el frente Francisco de Miranda A 200mts de la estacion del metro negro', 3, 'NO Puedo Acceder A Mi Cuanta Ya Que No Se Me Olvido Todos Mis Datos Y No Puedo Entrar Ya QUe No Me Llego Ningun Correo ', '2015-10-05 04:16:18'),
(697, 7594096, 'DOMINGO ALBERTO', 'OVIEDO SOTERANO', 'DOMINGOAOVIEDOS@GMAIL.COM', '04264675773', 'PLANTA EMPAQUETADORA DE GRANOS URACHICHE', 3, 'PROBLEMA DE CLAVE', '2015-10-07 20:55:05'),
(698, 23010130, 'jhonatan jose', 'fernandez briceño', 'slipknot_1329@hotmail.com', '04266655766', 'planta la veguita ', 3, 'no puedo acceder a mi usuario introduzco mi numero de cédula y dice que el numero de cédula esta mal o la clave e intento cambiar la clave y dice que los datos son incorrectos que hago ?????', '2015-10-07 23:44:46'),
(699, 19881704, 'hector ramon', 'salas fernandez', 'elkili182@hotmail.com', '02737781062', 'planta la veguitas', 3, 'buenos dias. para que porfavor me acomoden la constancia de trabajo ya que me sale con errores ', '2015-10-20 13:03:34'),
(700, 24215942, 'darwin', 'garcia', 'josegarcia2311@hotmail.com', '04143209760', 'distrito capital', 18, 'para solicitar empleo urgente lo que sea', '2015-10-21 13:39:59'),
(701, 24215942, 'darwin', 'garcia', 'josegarcia2311@hotmail.com', '04143209760', 'distrito capital', 18, 'para solicitar empleo urgente lo que sea', '2015-10-21 13:41:03'),
(702, 24215942, 'darwin', 'garcia', 'josegarcia2311@hotmail.com', '04143209760', 'distrito capital', 3, 'para solicitar empleo disponibilidad inmediata ', '2015-10-21 13:43:40'),
(703, 12393455, 'mauricio', 'acevedo', 'mauricioacevedo_17@hotmail.com', '02123416817', 'catmeca plaza venezuela', 3, 'afiliacion al programa compra corporativa', '2015-10-23 18:04:59'),
(704, 12393455, 'mauricio', 'acevedo', 'mauricioacevedo_17@hotmail.com', '02123416817', 'catmeca plaza venezuela', 3, 'afiliacion al programa compra corporativa', '2015-10-23 18:04:59'),
(705, 17900853, 'dulce', 'yepez', 'dulceyepez@yahoo.es', '04142818203', 'caracas', 3, 'Saludos Cordiales, por medio de la presente comunicación, me gustaría conocer \r\ncuales son los requisitos para organizar y ejecutar un mercado comunal en la\r\ninstitución donde laboro y en mi comunidad, en vista de lo difícil que es realizar \r\nel mercado de los productos regulados por el ejecutivo nacional, entre los que se encuentran rubros de la cesta básica y otros complementarios, así como productos del hogar y de higiene personal  (Pdmercal, Lácteos los Andes, pescadería, charcutería y hortalizas) quería preguntarles si pueden  distribuirnos también pollo y carne en vista de que el pescado es un alimento que en muchas ocasiones produce alergias en los ciudadanos y es un alimento poco consumido por nuestros niños en sus edades comprendidas desde los 6 meses en adelante para de esta manera seguir las instrucciones del Presidente de la República Bolivariana de Venezuela, el Ciudadano Nicolas Maduro Moros, con el objetivo de darle oportunidad de adquirir los alimentos a precios Justos y al mismo tiempo “incentivamos la inclusión del Poder Popular y la producción primaria desde la comunidades, acciones pensadas para salvar a nuestro pueblo de la guerra económica” tal como lo expresa Elías Jaua”, el viceministro de Políticas Alimentarias, Anibal Fuentes.\r\n\r\n\r\nAprovecho la oportunidad para sugerirles exijan a los supermercados publicos y privados que realicen una bolsa de comida que contenga todos los alimentos regulados por el ejecutivo nacional con la misma cantidad de  rubros para cada ciudadano venezolano manteniendo las capta huellas y el numero de cédula, que exijan copia de partida de nacimiento y cédula de los padres para la compra de pañales. La leche debe ser prioridad para las mujeres embarazadas y niños.\r\n\r\nSin otro particular me despido agradeciendo de antemano su pronta respuesta.\r\n', '2015-10-26 04:28:03'),
(706, 17900853, 'dulce', 'yepez', 'dulceyepez@yahoo.es', '04142818203', 'caracas', 4, 'Saludos Cordiales, por medio de la presente comunicación, me gustaría conocer \r\ncuales son los requisitos para organizar y ejecutar un mercado comunal en la\r\ninstitución donde laboro y en mi comunidad, en vista de lo difícil que es realizar \r\nel mercado de los productos regulados por el ejecutivo nacional, entre los que se encuentran rubros de la cesta básica y otros complementarios, así como productos del hogar y de higiene personal  (Pdmercal, Lácteos los Andes, pescadería, charcutería y hortalizas) quería preguntarles si pueden  distribuirnos también pollo y carne en vista de que el pescado es un alimento que en muchas ocasiones produce alergias en los ciudadanos y es un alimento poco consumido por nuestros niños en sus edades comprendidas desde los 6 meses en adelante para de esta manera seguir las instrucciones del Presidente de la República Bolivariana de Venezuela, el Ciudadano Nicolas Maduro Moros, con el objetivo de darle oportunidad de adquirir los alimentos a precios Justos y al mismo tiempo “incentivamos la inclusión del Poder Popular y la producción primaria desde la comunidades, acciones pensadas para salvar a nuestro pueblo de la guerra económica” tal como lo expresa Elías Jaua”, el viceministro de Políticas Alimentarias, Anibal Fuentes.\r\n\r\n\r\nAprovecho la oportunidad para sugerirles exijan a los supermercados publicos y privados que realicen una bolsa de comida que contenga todos los alimentos regulados por el ejecutivo nacional con la misma cantidad de  rubros para cada ciudadano venezolano manteniendo las capta huellas y el numero de cédula, que exijan copia de partida de nacimiento y cédula de los padres para la compra de pañales. La leche debe ser prioridad para las mujeres embarazadas y niños.\r\n\r\nSin otro particular me despido agradeciendo de antemano su pronta respuesta.\r\n', '2015-10-26 04:29:09'),
(707, 17900853, 'dulce', 'yepez', 'dulceyepez@yahoo.es', '04142818203', 'caracas', 5, 'Saludos Cordiales, por medio de la presente comunicación, me gustaría conocer \r\ncuales son los requisitos para organizar y ejecutar un mercado comunal en la\r\ninstitución donde laboro y en mi comunidad, en vista de lo difícil que es realizar \r\nel mercado de los productos regulados por el ejecutivo nacional, entre los que se encuentran rubros de la cesta básica y otros complementarios, así como productos del hogar y de higiene personal  (Pdmercal, Lácteos los Andes, pescadería, charcutería y hortalizas) quería preguntarles si pueden  distribuirnos también pollo y carne en vista de que el pescado es un alimento que en muchas ocasiones produce alergias en los ciudadanos y es un alimento poco consumido por nuestros niños en sus edades comprendidas desde los 6 meses en adelante para de esta manera seguir las instrucciones del Presidente de la República Bolivariana de Venezuela, el Ciudadano Nicolas Maduro Moros, con el objetivo de darle oportunidad de adquirir los alimentos a precios Justos y al mismo tiempo “incentivamos la inclusión del Poder Popular y la producción primaria desde la comunidades, acciones pensadas para salvar a nuestro pueblo de la guerra económica” tal como lo expresa Elías Jaua”, el viceministro de Políticas Alimentarias, Anibal Fuentes.\r\n\r\n\r\nAprovecho la oportunidad para sugerirles exijan a los supermercados publicos y privados que realicen una bolsa de comida que contenga todos los alimentos regulados por el ejecutivo nacional con la misma cantidad de  rubros para cada ciudadano venezolano manteniendo las capta huellas y el numero de cédula, que exijan copia de partida de nacimiento y cédula de los padres para la compra de pañales. La leche debe ser prioridad para las mujeres embarazadas y niños.\r\n\r\nSin otro particular me despido agradeciendo de antemano su pronta respuesta.\r\n', '2015-10-26 04:29:56'),
(708, 17900853, 'dulce', 'yepez', 'dulceyepez@yahoo.es', '04142818203', 'caracas', 4, 'Saludos Cordiales, por medio de la presente comunicación, me gustaría conocer \r\ncuales son los requisitos para organizar y ejecutar un mercado comunal en la\r\ninstitución donde laboro y en mi comunidad, en vista de lo difícil que es realizar \r\nel mercado de los productos regulados por el ejecutivo nacional, entre los que se encuentran rubros de la cesta básica y otros complementarios, así como productos del hogar y de higiene personal  (Pdmercal, Lácteos los Andes, pescadería, charcutería y hortalizas) quería preguntarles si pueden  distribuirnos también pollo y carne en vista de que el pescado es un alimento que en muchas ocasiones produce alergias en los ciudadanos y es un alimento poco consumido por nuestros niños en sus edades comprendidas desde los 6 meses en adelante para de esta manera seguir las instrucciones del Presidente de la República Bolivariana de Venezuela, el Ciudadano Nicolas Maduro Moros, con el objetivo de darle oportunidad de adquirir los alimentos a precios Justos y al mismo tiempo “incentivamos la inclusión del Poder Popular y la producción primaria desde la comunidades, acciones pensadas para salvar a nuestro pueblo de la guerra económica” tal como lo expresa Elías Jaua”, el viceministro de Políticas Alimentarias, Anibal Fuentes.\r\n\r\n\r\nAprovecho la oportunidad para sugerirles exijan a los supermercados publicos y privados que realicen una bolsa de comida que contenga todos los alimentos regulados por el ejecutivo nacional con la misma cantidad de  rubros para cada ciudadano venezolano manteniendo las capta huellas y el numero de cédula, que exijan copia de partida de nacimiento y cédula de los padres para la compra de pañales. La leche debe ser prioridad para las mujeres embarazadas y niños.\r\n\r\nSin otro particular me despido agradeciendo de antemano su pronta respuesta.\r\n', '2015-10-26 04:30:36'),
(709, 24244460, 'EDGAR', 'ESPINOZA', 'edgarespinoza21@hotmail.com', '04263463264', 'tinaquilo', 3, 'mi correo actual. noo puedo acceder. nesesito. ua contancia de trabajo', '2015-10-27 16:36:15'),
(710, 20499408, 'BERNARDO ANTONIO', 'PEREZ ALVAREZ  ', 'bernardoantonioperez@gmail.com', '04121558283', 'LARA TORRES', 3, 'PARA REGISTRARME Y OBTENER CLAVE', '2015-10-29 13:37:24'),
(711, 17285978, 'jean luis', 'cruz moreno', 'jeanluiscruz@hotmail.com', '0426-3112570', 'caracas', 18, 'como puedo optar para una vacante de empleo en sus sucuesales', '2015-10-29 18:51:40'),
(712, 17285978, 'jean luis', 'cruz moreno', 'jeanluiscruz@hotmail.com', '0426-3112570', 'caracas', 5, 'como puedo optar por una vacante en unas de sus sucursales  ', '2015-10-29 18:55:12'),
(713, 20858427, 'jesus', 'araujo', 'qxojesus@gmail.com', '04166709671', 'planta arrocera barinas', 3, 'no puedo recuperar mi clave de usuario venalcasa', '2015-11-10 14:02:30'),
(714, 16769810, 'Xavier ', 'Lucena', 'unter631@gmail.com', '02387626025', 'zZaraza', 3, 'Buenas noches soy revolucionario y defiendo este proceso y quisiera saber si tienen una vacante en la sede del abasto Zaraza ya que me entere que despidieron el personal de la misma, yo soy ingeniero de gas egresado de la unefa y actualmente me encuentro desempleado y me encantaria formar parte de esta prestigiosa empresa   ', '2015-11-17 02:11:24'),
(715, 17977291, 'luis', 'garcia', 'luisgarcia_18_84@hotmail.com', '04168321714', 'avenida sucre', 3, '', '2015-11-21 06:09:26'),
(716, 20963809, 'JOSE NICANOR', 'CRESPO AZUAJE', 'niko19crespojose@hotmail.com', '04262707578', 'BARINAS MUNICIPIO BARINAS ; CARRETERA VIEJA EL TOREÑO VIA SAN SILVESTRE', 3, 'BUENAS NOCHES SALUDO REVOLUCIONARIO TENGO EL AGRADO DE DIRIJIRME HACIA  USTED CON LA NOVEDAD DE QUE PRESENTO PROBLEMAS A LA HORA DE CREAR LA CONSTANCIA DE TRABAJO EL CUAL ME SALE UN TEXTO DONDE DICE ERROR Y OTRAS COSAS MAS CUANDO LE DOY CREAR DE FORMA INTEGRAL O DESGLOSADA POR FAVOR LES PIDO ME AYUDEN A SOLUCIONAR EL PROBLEMA YA QUE NECESITO LA CONSTANCIA PARA TRAMITAR DOCUMENTOS DONDE ME EXIGEN LA CONSTANCIA SIN MAS QUE HACER REFERENCIA ME DESPIDO DECEANDOLES EXITOS EN SUS LABORES BUENAS NOCHES', '2015-11-24 01:50:27'),
(717, 20539169, 'ARGENIS', 'ARANGU', 'argenisarangu90@hotmail.com', '04120587191', 'PLANTA EMPAQUETADORA DE GRANOS URACHICHE', 3, 'RECURAR CLAVE', '2015-12-02 16:01:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parroquia`
--

CREATE TABLE `parroquia` (
  `id_parroquia` int(11) NOT NULL COMMENT 'Identificador de la parroquia',
  `parroquia` varchar(100) NOT NULL COMMENT 'Nombre de la parroquia',
  `municipio_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Identificador del municipio al que pertenece la parroquia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Entidad que contiene informacion sobre parroquias. Desarrollado por Jose Rodriguez <josearodrigueze@gmail.com> @josearodrigueze';

--
-- Volcado de datos para la tabla `parroquia`
--

INSERT INTO `parroquia` (`id_parroquia`, `parroquia`, `municipio_id`) VALUES
(1, 'ALTAGRACIA', 1),
(2, 'CANDELARIA', 1),
(3, 'CATEDRAL', 1),
(4, 'LA PASTORA', 1),
(5, 'SAN AGUSTIN', 1),
(6, 'SAN JOSE', 1),
(7, 'SAN JUAN', 1),
(8, 'SANTA ROSALIA', 1),
(9, 'SANTA TERESA', 1),
(10, 'SUCRE', 1),
(11, '23 DE ENERO', 1),
(12, 'ANTIMANO', 1),
(13, 'EL RECREO', 1),
(14, 'EL VALLE', 1),
(15, 'LA VEGA', 1),
(16, 'MACARAO', 1),
(17, 'CARICUAO', 1),
(18, 'EL JUNQUITO', 1),
(19, 'COCHE', 1),
(20, 'SAN PEDRO', 1),
(21, 'SAN BERNARDINO', 1),
(22, 'EL PARAISO', 1),
(23, 'ANACO', 2),
(24, 'SAN JOAQUIN', 2),
(25, 'CM. ARAGUA DE BARCELONA', 3),
(26, 'CACHIPO', 3),
(27, 'EL CARMEN', 4),
(28, 'SAN CRISTOBAL', 4),
(29, 'BERGANTIN', 4),
(30, 'CAIGUA', 4),
(31, 'EL PILAR', 4),
(32, 'NARICUAL', 4),
(33, 'CM. CLARINES', 5),
(34, 'GUANAPE', 5),
(35, 'SABANA DE UCHIRE', 5),
(36, 'CM. ONOTO', 6),
(37, 'SAN PABLO', 6),
(38, 'CM. CANTAURA', 7),
(39, 'LIBERTADOR', 7),
(40, 'SANTA ROSA', 7),
(41, 'URICA', 7),
(42, 'CM. SOLEDAD', 8),
(43, 'MAMO', 8),
(44, 'CM. SAN MATEO', 9),
(45, 'EL CARITO', 9),
(46, 'SANTA INES', 9),
(47, 'CM. PARIAGUAN', 10),
(48, 'ATAPIRIRE', 10),
(49, 'BOCA DEL PAO', 10),
(50, 'EL PAO', 10),
(51, 'CM. MAPIRE', 11),
(52, 'PIAR', 11),
(53, 'SN DIEGO DE CABRUTICA', 11),
(54, 'SANTA CLARA', 11),
(55, 'UVERITO', 11),
(56, 'ZUATA', 11),
(57, 'CM. PUERTO PIRITU', 12),
(58, 'SAN MIGUEL', 12),
(59, 'SUCRE', 12),
(60, 'CM. EL TIGRE', 13),
(61, 'POZUELOS', 14),
(62, 'CM PTO. LA CRUZ', 14),
(63, 'CM. SAN JOSE DE GUANIPA', 15),
(64, 'GUANTA', 16),
(65, 'CHORRERON', 16),
(66, 'PIRITU', 17),
(67, 'SAN FRANCISCO', 17),
(68, 'LECHERIAS', 18),
(69, 'EL MORRO', 18),
(70, 'VALLE GUANAPE', 19),
(71, 'SANTA BARBARA', 19),
(72, 'SANTA ANA', 20),
(73, 'PUEBLO NUEVO', 20),
(74, 'EL CHAPARRO', 21),
(75, 'TOMAS ALFARO CALATRAVA', 21),
(76, 'BOCA UCHIRE', 22),
(77, 'BOCA DE CHAVEZ', 22),
(78, 'ACHAGUAS', 23),
(79, 'APURITO', 23),
(80, 'EL YAGUAL', 23),
(81, 'GUACHARA', 23),
(82, 'MUCURITAS', 23),
(83, 'QUESERAS DEL MEDIO', 23),
(84, 'BRUZUAL', 24),
(85, 'MANTECAL', 24),
(86, 'QUINTERO', 24),
(87, 'SAN VICENTE', 24),
(88, 'RINCON HONDO', 24),
(89, 'GUASDUALITO', 25),
(90, 'ARAMENDI', 25),
(91, 'EL AMPARO', 25),
(92, 'SAN CAMILO', 25),
(93, 'URDANETA', 25),
(94, 'SAN JUAN DE PAYARA', 26),
(95, 'CODAZZI', 26),
(96, 'CUNAVICHE', 26),
(97, 'ELORZA', 27),
(98, 'LA TRINIDAD', 27),
(99, 'SAN FERNANDO', 28),
(100, 'PEÑALVER', 28),
(101, 'EL RECREO', 28),
(102, 'SN RAFAEL DE ATAMAICA', 28),
(103, 'BIRUACA', 29),
(104, 'CM. LAS DELICIAS', 30),
(105, 'CHORONI', 30),
(106, 'MADRE MA DE SAN JOSE', 30),
(107, 'JOAQUIN CRESPO', 30),
(108, 'PEDRO JOSE OVALLES', 30),
(109, 'JOSE CASANOVA GODOY', 30),
(110, 'ANDRES ELOY BLANCO', 30),
(111, 'LOS TACARIGUAS', 30),
(112, 'CM. TURMERO', 31),
(113, 'SAMAN DE GUERE', 31),
(114, 'ALFREDO PACHECO M', 31),
(115, 'CHUAO', 31),
(116, 'AREVALO APONTE', 31),
(117, 'CM. LA VICTORIA', 32),
(118, 'ZUATA', 32),
(119, 'PAO DE ZARATE', 32),
(120, 'CASTOR NIEVES RIOS', 32),
(121, 'LAS GUACAMAYAS', 32),
(122, 'CM. SAN CASIMIRO', 33),
(123, 'VALLE MORIN', 33),
(124, 'GUIRIPA', 33),
(125, 'OLLAS DE CARAMACATE', 33),
(126, 'CM. SAN SEBASTIAN', 34),
(127, 'CM. CAGUA', 35),
(128, 'BELLA VISTA', 35),
(129, 'CM. BARBACOAS', 36),
(130, 'SAN FRANCISCO DE CARA', 36),
(131, 'TAGUAY', 36),
(132, 'LAS PEÑITAS', 36),
(133, 'CM. VILLA DE CURA', 37),
(134, 'MAGDALENO', 37),
(135, 'SAN FRANCISCO DE ASIS', 37),
(136, 'VALLES DE TUCUTUNEMO', 37),
(137, 'PQ AUGUSTO MIJARES', 37),
(138, 'CM. PALO NEGRO', 38),
(139, 'SAN MARTIN DE PORRES', 38),
(140, 'CM. SANTA CRUZ', 39),
(141, 'CM. SAN MATEO', 40),
(142, 'CM. LAS TEJERIAS', 41),
(143, 'TIARA', 41),
(144, 'CM. EL LIMON', 42),
(145, 'CA A DE AZUCAR', 42),
(146, 'CM. COLONIA TOVAR', 43),
(147, 'CM. CAMATAGUA', 44),
(148, 'CARMEN DE CURA', 44),
(149, 'CM. EL CONSEJO', 45),
(150, 'CM. SANTA RITA', 46),
(151, 'FRANCISCO DE MIRANDA', 46),
(152, 'MONS FELICIANO G', 46),
(153, 'OCUMARE DE LA COSTA', 47),
(154, 'ARISMENDI', 48),
(155, 'GUADARRAMA', 48),
(156, 'LA UNION', 48),
(157, 'SAN ANTONIO', 48),
(158, 'ALFREDO A LARRIVA', 49),
(159, 'BARINAS', 49),
(160, 'SAN SILVESTRE', 49),
(161, 'SANTA INES', 49),
(162, 'SANTA LUCIA', 49),
(163, 'TORUNOS', 49),
(164, 'EL CARMEN', 49),
(165, 'ROMULO BETANCOURT', 49),
(166, 'CORAZON DE JESUS', 49),
(167, 'RAMON I MENDEZ', 49),
(168, 'ALTO BARINAS', 49),
(169, 'MANUEL P FAJARDO', 49),
(170, 'JUAN A RODRIGUEZ D', 49),
(171, 'DOMINGA ORTIZ P', 49),
(172, 'ALTAMIRA', 50),
(173, 'BARINITAS', 50),
(174, 'CALDERAS', 50),
(175, 'SANTA BARBARA', 51),
(176, 'JOSE IGNACIO DEL PUMAR', 51),
(177, 'RAMON IGNACIO MENDEZ', 51),
(178, 'PEDRO BRICEÑO MENDEZ', 51),
(179, 'EL REAL', 52),
(180, 'LA LUZ', 52),
(181, 'OBISPOS', 52),
(182, 'LOS GUASIMITOS', 52),
(183, 'CIUDAD BOLIVIA', 53),
(184, 'IGNACIO BRICEÑO', 53),
(185, 'PAEZ', 53),
(186, 'JOSE FELIX RIBAS', 53),
(187, 'DOLORES', 54),
(188, 'LIBERTAD', 54),
(189, 'PALACIO FAJARDO', 54),
(190, 'SANTA ROSA', 54),
(191, 'CIUDAD DE NUTRIAS', 55),
(192, 'EL REGALO', 55),
(193, 'PUERTO DE NUTRIAS', 55),
(194, 'SANTA CATALINA', 55),
(195, 'RODRIGUEZ DOMINGUEZ', 56),
(196, 'SABANETA', 56),
(197, 'TICOPORO', 57),
(198, 'NICOLAS PULIDO', 57),
(199, 'ANDRES BELLO', 57),
(200, 'BARRANCAS', 58),
(201, 'EL SOCORRO', 58),
(202, 'MASPARRITO', 58),
(203, 'EL CANTON', 59),
(204, 'SANTA CRUZ DE GUACAS', 59),
(205, 'PUERTO VIVAS', 59),
(206, 'SIMON BOLIVAR', 60),
(207, 'ONCE DE ABRIL', 60),
(208, 'VISTA AL SOL', 60),
(209, 'CHIRICA', 60),
(210, 'DALLA COSTA', 60),
(211, 'CACHAMAY', 60),
(212, 'UNIVERSIDAD', 60),
(213, 'UNARE', 60),
(214, 'YOCOIMA', 60),
(215, 'POZO VERDE', 60),
(216, 'CM. CAICARA DEL ORINOCO', 61),
(217, 'ASCENSION FARRERAS', 61),
(218, 'ALTAGRACIA', 61),
(219, 'LA URBANA', 61),
(220, 'GUANIAMO', 61),
(221, 'PIJIGUAOS', 61),
(222, 'CATEDRAL', 62),
(223, 'AGUA SALADA', 62),
(224, 'LA SABANITA', 62),
(225, 'VISTA HERMOSA', 62),
(226, 'MARHUANTA', 62),
(227, 'JOSE ANTONIO PAEZ', 62),
(228, 'ORINOCO', 62),
(229, 'PANAPANA', 62),
(230, 'ZEA', 62),
(231, 'CM. UPATA', 63),
(232, 'ANDRES ELOY BLANCO', 63),
(233, 'PEDRO COVA', 63),
(234, 'CM. GUASIPATI', 64),
(235, 'SALOM', 64),
(236, 'CM. MARIPA', 65),
(237, 'ARIPAO', 65),
(238, 'LAS MAJADAS', 65),
(239, 'MOITACO', 65),
(240, 'GUARATARO', 65),
(241, 'CM. TUMEREMO', 66),
(242, 'DALLA COSTA', 66),
(243, 'SAN ISIDRO', 66),
(244, 'CM. CIUDAD PIAR', 67),
(245, 'SAN FRANCISCO', 67),
(246, 'BARCELONETA', 67),
(247, 'SANTA BARBARA', 67),
(248, 'CM. SANTA ELENA DE UAIREN', 68),
(249, 'IKABARU', 68),
(250, 'CM. EL CALLAO', 69),
(251, 'CM. EL PALMAR', 70),
(252, 'BEJUMA', 71),
(253, 'CANOABO', 71),
(254, 'SIMON BOLIVAR', 71),
(255, 'GUIGUE', 72),
(256, 'BELEN', 72),
(257, 'TACARIGUA', 72),
(258, 'MARIARA', 73),
(259, 'AGUAS CALIENTES', 73),
(260, 'GUACARA', 74),
(261, 'CIUDAD ALIANZA', 74),
(262, 'YAGUA', 74),
(263, 'MONTALBAN', 75),
(264, 'MORON', 76),
(265, 'URAMA', 76),
(266, 'DEMOCRACIA', 77),
(267, 'FRATERNIDAD', 77),
(268, 'GOAIGOAZA', 77),
(269, 'JUAN JOSE FLORES', 77),
(270, 'BARTOLOME SALOM', 77),
(271, 'UNION', 77),
(272, 'BORBURATA', 77),
(273, 'PATANEMO', 77),
(274, 'SAN JOAQUIN', 78),
(275, 'CANDELARIA', 79),
(276, 'CATEDRAL', 79),
(277, 'EL SOCORRO', 79),
(278, 'MIGUEL PEÑA', 79),
(279, 'SAN BLAS', 79),
(280, 'SAN JOSE', 79),
(281, 'SANTA ROSA', 79),
(282, 'RAFAEL URDANETA', 79),
(283, 'NEGRO PRIMERO', 79),
(284, 'MIRANDA', 80),
(285, 'U LOS GUAYOS', 81),
(286, 'NAGUANAGUA', 82),
(287, 'URB SAN DIEGO', 83),
(288, 'U TOCUYITO', 84),
(289, 'U INDEPENDENCIA', 84),
(290, 'COJEDES', 85),
(291, 'JUAN DE MATA SUAREZ', 85),
(292, 'TINAQUILLO', 86),
(293, 'EL BAUL', 87),
(294, 'SUCRE', 87),
(295, 'EL PAO', 88),
(296, 'LIBERTAD DE COJEDES', 89),
(297, 'EL AMPARO', 89),
(298, 'SAN CARLOS DE AUSTRIA', 90),
(299, 'JUAN ANGEL BRAVO', 90),
(300, 'MANUEL MANRIQUE', 90),
(301, 'GRL/JEFE JOSE L SILVA', 91),
(302, 'MACAPO', 92),
(303, 'LA AGUADITA', 92),
(304, 'ROMULO GALLEGOS', 93),
(305, 'SAN JUAN DE LOS CAYOS', 94),
(306, 'CAPADARE', 94),
(307, 'LA PASTORA', 94),
(308, 'LIBERTADOR', 94),
(309, 'SAN LUIS', 95),
(310, 'ARACUA', 95),
(311, 'LA PEÑA', 95),
(312, 'CAPATARIDA', 96),
(313, 'BOROJO', 96),
(314, 'SEQUE', 96),
(315, 'ZAZARIDA', 96),
(316, 'BARIRO', 96),
(317, 'GUAJIRO', 96),
(318, 'NORTE', 97),
(319, 'CARIRUBANA', 97),
(320, 'PUNTA CARDON', 97),
(321, 'SANTA ANA', 97),
(322, 'LA VELA DE CORO', 98),
(323, 'ACURIGUA', 98),
(324, 'GUAIBACOA', 98),
(325, 'MACORUCA', 98),
(326, 'LAS CALDERAS', 98),
(327, 'PEDREGAL', 99),
(328, 'AGUA CLARA', 99),
(329, 'AVARIA', 99),
(330, 'PIEDRA GRANDE', 99),
(331, 'PURURECHE', 99),
(332, 'PUEBLO NUEVO', 100),
(333, 'ADICORA', 100),
(334, 'BARAIVED', 100),
(335, 'BUENA VISTA', 100),
(336, 'JADACAQUIVA', 100),
(337, 'MORUY', 100),
(338, 'EL VINCULO', 100),
(339, 'EL HATO', 100),
(340, 'ADAURE', 100),
(341, 'CHURUGUARA', 101),
(342, 'AGUA LARGA', 101),
(343, 'INDEPENDENCIA', 101),
(344, 'MAPARARI', 101),
(345, 'EL PAUJI', 101),
(346, 'MENE DE MAUROA', 102),
(347, 'CASIGUA', 102),
(348, 'SAN FELIX', 102),
(349, 'SAN ANTONIO', 103),
(350, 'SAN GABRIEL', 103),
(351, 'SANTA ANA', 103),
(352, 'GUZMAN GUILLERMO', 103),
(353, 'MITARE', 103),
(354, 'SABANETA', 103),
(355, 'RIO SECO', 103),
(356, 'CABURE', 104),
(357, 'CURIMAGUA', 104),
(358, 'COLINA', 104),
(359, 'TUCACAS', 105),
(360, 'BOCA DE AROA', 105),
(361, 'PUERTO CUMAREBO', 106),
(362, 'LA CIENAGA', 106),
(363, 'LA SOLEDAD', 106),
(364, 'PUEBLO CUMAREBO', 106),
(365, 'ZAZARIDA', 106),
(366, 'CM. DABAJURO', 107),
(367, 'CHICHIRIVICHE', 108),
(368, 'BOCA DE TOCUYO', 108),
(369, 'TOCUYO DE LA COSTA', 108),
(370, 'LOS TAQUES', 109),
(371, 'JUDIBANA', 109),
(372, 'PIRITU', 110),
(373, 'SAN JOSE DE LA COSTA', 110),
(374, 'STA.CRUZ DE BUCARAL', 111),
(375, 'EL CHARAL', 111),
(376, 'LAS VEGAS DEL TUY', 111),
(377, 'CM. MIRIMIRE', 112),
(378, 'JACURA', 113),
(379, 'AGUA LINDA', 113),
(380, 'ARAURIMA', 113),
(381, 'CM. YARACAL', 114),
(382, 'CM. PALMA SOLA', 115),
(383, 'SUCRE', 116),
(384, 'PECAYA', 116),
(385, 'URUMACO', 117),
(386, 'BRUZUAL', 117),
(387, 'CM. TOCOPERO', 118),
(388, 'VALLE DE LA PASCUA', 119),
(389, 'ESPINO', 119),
(390, 'EL SOMBRERO', 120),
(391, 'SOSA', 120),
(392, 'CALABOZO', 121),
(393, 'EL CALVARIO', 121),
(394, 'EL RASTRO', 121),
(395, 'GUARDATINAJAS', 121),
(396, 'ALTAGRACIA DE ORITUCO', 122),
(397, 'LEZAMA', 122),
(398, 'LIBERTAD DE ORITUCO', 122),
(399, 'SAN FCO DE MACAIRA', 122),
(400, 'SAN RAFAEL DE ORITUCO', 122),
(401, 'SOUBLETTE', 122),
(402, 'PASO REAL DE MACAIRA', 122),
(403, 'TUCUPIDO', 123),
(404, 'SAN RAFAEL DE LAYA', 123),
(405, 'SAN JUAN DE LOS MORROS', 124),
(406, 'PARAPARA', 124),
(407, 'CANTAGALLO', 124),
(408, 'ZARAZA', 125),
(409, 'SAN JOSE DE UNARE', 125),
(410, 'CAMAGUAN', 126),
(411, 'PUERTO MIRANDA', 126),
(412, 'UVERITO', 126),
(413, 'SAN JOSE DE GUARIBE', 127),
(414, 'LAS MERCEDES', 128),
(415, 'STA RITA DE MANAPIRE', 128),
(416, 'CABRUTA', 128),
(417, 'EL SOCORRO', 129),
(418, 'ORTIZ', 130),
(419, 'SAN FCO. DE TIZNADOS', 130),
(420, 'SAN JOSE DE TIZNADOS', 130),
(421, 'S LORENZO DE TIZNADOS', 130),
(422, 'SANTA MARIA DE IPIRE', 131),
(423, 'ALTAMIRA', 131),
(424, 'CHAGUARAMAS', 132),
(425, 'GUAYABAL', 133),
(426, 'CAZORLA', 133),
(427, 'FREITEZ', 134),
(428, 'JOSE MARIA BLANCO', 134),
(429, 'CATEDRAL', 135),
(430, 'LA CONCEPCION', 135),
(431, 'SANTA ROSA', 135),
(432, 'UNION', 135),
(433, 'EL CUJI', 135),
(434, 'TAMACA', 135),
(435, 'JUAN DE VILLEGAS', 135),
(436, 'AGUEDO F. ALVARADO', 135),
(437, 'BUENA VISTA', 135),
(438, 'JUAREZ', 135),
(439, 'JUAN B RODRIGUEZ', 136),
(440, 'DIEGO DE LOZADA', 136),
(441, 'SAN MIGUEL', 136),
(442, 'CUARA', 136),
(443, 'PARAISO DE SAN JOSE', 136),
(444, 'TINTORERO', 136),
(445, 'JOSE BERNARDO DORANTE', 136),
(446, 'CRNEL. MARIANO PERAZA', 136),
(447, 'BOLIVAR', 137),
(448, 'ANZOATEGUI', 137),
(449, 'GUARICO', 137),
(450, 'HUMOCARO ALTO', 137),
(451, 'HUMOCARO BAJO', 137),
(452, 'MORAN', 137),
(453, 'HILARIO LUNA Y LUNA', 137),
(454, 'LA CANDELARIA', 137),
(455, 'CABUDARE', 138),
(456, 'JOSE G. BASTIDAS', 138),
(457, 'AGUA VIVA', 138),
(458, 'TRINIDAD SAMUEL', 139),
(459, 'ANTONIO DIAZ', 139),
(460, 'CAMACARO', 139),
(461, 'CASTAÑEDA', 139),
(462, 'CHIQUINQUIRA', 139),
(463, 'ESPINOZA LOS MONTEROS', 139),
(464, 'LARA', 139),
(465, 'MANUEL MORILLO', 139),
(466, 'MONTES DE OCA', 139),
(467, 'TORRES', 139),
(468, 'EL BLANCO', 139),
(469, 'MONTA A VERDE', 139),
(470, 'HERIBERTO ARROYO', 139),
(471, 'LAS MERCEDES', 139),
(472, 'CECILIO ZUBILLAGA', 139),
(473, 'REYES VARGAS', 139),
(474, 'ALTAGRACIA', 139),
(475, 'SIQUISIQUE', 140),
(476, 'SAN MIGUEL', 140),
(477, 'XAGUAS', 140),
(478, 'MOROTURO', 140),
(479, 'PIO TAMAYO', 141),
(480, 'YACAMBU', 141),
(481, 'QBDA. HONDA DE GUACHE', 141),
(482, 'SARARE', 142),
(483, 'GUSTAVO VEGAS LEON', 142),
(484, 'BURIA', 142),
(485, 'GABRIEL PICON G.', 143),
(486, 'HECTOR AMABLE MORA', 143),
(487, 'JOSE NUCETE SARDI', 143),
(488, 'PULIDO MENDEZ', 143),
(489, 'PTE. ROMULO GALLEGOS', 143),
(490, 'PRESIDENTE BETANCOURT', 143),
(491, 'PRESIDENTE PAEZ', 143),
(492, 'CM. LA AZULITA', 144),
(493, 'CM. CANAGUA', 145),
(494, 'CAPURI', 145),
(495, 'CHACANTA', 145),
(496, 'EL MOLINO', 145),
(497, 'GUAIMARAL', 145),
(498, 'MUCUTUY', 145),
(499, 'MUCUCHACHI', 145),
(500, 'ACEQUIAS', 146),
(501, 'JAJI', 146),
(502, 'LA MESA', 146),
(503, 'SAN JOSE', 146),
(504, 'MONTALBAN', 146),
(505, 'MATRIZ', 146),
(506, 'FERNANDEZ PEÑA', 146),
(507, 'CM. GUARAQUE', 147),
(508, 'MESA DE QUINTERO', 147),
(509, 'RIO NEGRO', 147),
(510, 'CM. ARAPUEY', 148),
(511, 'PALMIRA', 148),
(512, 'CM. TORONDOY', 149),
(513, 'SAN CRISTOBAL DE T', 149),
(514, 'ARIAS', 150),
(515, 'SAGRARIO', 150),
(516, 'MILLA', 150),
(517, 'EL LLANO', 150),
(518, 'JUAN RODRIGUEZ SUAREZ', 150),
(519, 'JACINTO PLAZA', 150),
(520, 'DOMINGO PEÑA', 150),
(521, 'GONZALO PICON FEBRES', 150),
(522, 'OSUNA RODRIGUEZ', 150),
(523, 'LASSO DE LA VEGA', 150),
(524, 'CARACCIOLO PARRA P', 150),
(525, 'MARIANO PICON SALAS', 150),
(526, 'ANTONIO SPINETTI DINI', 150),
(527, 'EL MORRO', 150),
(528, 'LOS NEVADOS', 150),
(529, 'CM. TABAY', 151),
(530, 'CM. TIMOTES', 152),
(531, 'ANDRES ELOY BLANCO', 152),
(532, 'PIÑANGO', 152),
(533, 'LA VENTA', 152),
(534, 'CM. STA CRUZ DE MORA', 153),
(535, 'MESA BOLIVAR', 153),
(536, 'MESA DE LAS PALMAS', 153),
(537, 'CM. STA ELENA DE ARENALES', 154),
(538, 'ELOY PAREDES', 154),
(539, 'PQ R DE ALCAZAR', 154),
(540, 'CM. TUCANI', 155),
(541, 'FLORENCIO RAMIREZ', 155),
(542, 'CM. SANTO DOMINGO', 156),
(543, 'LAS PIEDRAS', 156),
(544, 'CM. PUEBLO LLANO', 157),
(545, 'CM. MUCUCHIES', 158),
(546, 'MUCURUBA', 158),
(547, 'SAN RAFAEL', 158),
(548, 'CACUTE', 158),
(549, 'LA TOMA', 158),
(550, 'CM. BAILADORES', 159),
(551, 'GERONIMO MALDONADO', 159),
(552, 'CM. LAGUNILLAS', 160),
(553, 'CHIGUARA', 160),
(554, 'ESTANQUES', 160),
(555, 'SAN JUAN', 160),
(556, 'PUEBLO NUEVO DEL SUR', 160),
(557, 'LA TRAMPA', 160),
(558, 'EL LLANO', 161),
(559, 'TOVAR', 161),
(560, 'EL AMPARO', 161),
(561, 'SAN FRANCISCO', 161),
(562, 'CM. NUEVA BOLIVIA', 162),
(563, 'INDEPENDENCIA', 162),
(564, 'MARIA C PALACIOS', 162),
(565, 'SANTA APOLONIA', 162),
(566, 'CM. STA MARIA DE CAPARO', 163),
(567, 'CM. ARICAGUA', 164),
(568, 'SAN ANTONIO', 164),
(569, 'CM. ZEA', 165),
(570, 'CAÑO EL TIGRE', 165),
(571, 'CAUCAGUA', 166),
(572, 'ARAGUITA', 166),
(573, 'AREVALO GONZALEZ', 166),
(574, 'CAPAYA', 166),
(575, 'PANAQUIRE', 166),
(576, 'RIBAS', 166),
(577, 'EL CAFE', 166),
(578, 'MARIZAPA', 166),
(579, 'HIGUEROTE', 167),
(580, 'CURIEPE', 167),
(581, 'TACARIGUA', 167),
(582, 'LOS TEQUES', 168),
(583, 'CECILIO ACOSTA', 168),
(584, 'PARACOTOS', 168),
(585, 'SAN PEDRO', 168),
(586, 'TACATA', 168),
(587, 'EL JARILLO', 168),
(588, 'ALTAGRACIA DE LA M', 168),
(589, 'STA TERESA DEL TUY', 169),
(590, 'EL CARTANAL', 169),
(591, 'OCUMARE DEL TUY', 170),
(592, 'LA DEMOCRACIA', 170),
(593, 'SANTA BARBARA', 170),
(594, 'RIO CHICO', 171),
(595, 'EL GUAPO', 171),
(596, 'TACARIGUA DE LA LAGUNA', 171),
(597, 'PAPARO', 171),
(598, 'SN FERNANDO DEL GUAPO', 171),
(599, 'SANTA LUCIA', 172),
(600, 'GUARENAS', 173),
(601, 'PETARE', 174),
(602, 'LEONCIO MARTINEZ', 174),
(603, 'CAUCAGUITA', 174),
(604, 'FILAS DE MARICHES', 174),
(605, 'LA DOLORITA', 174),
(606, 'CUA', 175),
(607, 'NUEVA CUA', 175),
(608, 'GUATIRE', 176),
(609, 'BOLIVAR', 176),
(610, 'CHARALLAVE', 177),
(611, 'LAS BRISAS', 177),
(612, 'SAN ANTONIO LOS ALTOS', 178),
(613, 'SAN JOSE DE BARLOVENTO', 179),
(614, 'CUMBO', 179),
(615, 'SAN FCO DE YARE', 180),
(616, 'S ANTONIO DE YARE', 180),
(617, 'BARUTA', 181),
(618, 'EL CAFETAL', 181),
(619, 'LAS MINAS DE BARUTA', 181),
(620, 'CARRIZAL', 182),
(621, 'CHACAO', 183),
(622, 'EL HATILLO', 184),
(623, 'MAMPORAL', 185),
(624, 'CUPIRA', 186),
(625, 'MACHURUCUTO', 186),
(626, 'CM. SAN ANTONIO', 187),
(627, 'SAN FRANCISCO', 187),
(628, 'CM. CARIPITO', 188),
(629, 'CM. CARIPE', 189),
(630, 'TERESEN', 189),
(631, 'EL GUACHARO', 189),
(632, 'SAN AGUSTIN', 189),
(633, 'LA GUANOTA', 189),
(634, 'SABANA DE PIEDRA', 189),
(635, 'CM. CAICARA', 190),
(636, 'AREO', 190),
(637, 'SAN FELIX', 190),
(638, 'VIENTO FRESCO', 190),
(639, 'CM. PUNTA DE MATA', 191),
(640, 'EL TEJERO', 191),
(641, 'CM. TEMBLADOR', 192),
(642, 'TABASCA', 192),
(643, 'LAS ALHUACAS', 192),
(644, 'CHAGUARAMAS', 192),
(645, 'EL FURRIAL', 193),
(646, 'JUSEPIN', 193),
(647, 'EL COROZO', 193),
(648, 'SAN VICENTE', 193),
(649, 'LA PICA', 193),
(650, 'ALTO DE LOS GODOS', 193),
(651, 'BOQUERON', 193),
(652, 'LAS COCUIZAS', 193),
(653, 'SANTA CRUZ', 193),
(654, 'SAN SIMON', 193),
(655, 'CM. ARAGUA', 194),
(656, 'CHAGUARAMAL', 194),
(657, 'GUANAGUANA', 194),
(658, 'APARICIO', 194),
(659, 'TAGUAYA', 194),
(660, 'EL PINTO', 194),
(661, 'LA TOSCANA', 194),
(662, 'CM. QUIRIQUIRE', 195),
(663, 'CACHIPO', 195),
(664, 'CM. BARRANCAS', 196),
(665, 'LOS BARRANCOS DE FAJARDO', 196),
(666, 'CM. AGUASAY', 197),
(667, 'CM. SANTA BARBARA', 198),
(668, 'CM. URACOA', 199),
(669, 'CM. LA ASUNCION', 200),
(670, 'CM. SAN JUAN BAUTISTA', 201),
(671, 'ZABALA', 201),
(672, 'CM. SANTA ANA', 202),
(673, 'GUEVARA', 202),
(674, 'MATASIETE', 202),
(675, 'BOLIVAR', 202),
(676, 'SUCRE', 202),
(677, 'CM. PAMPATAR', 203),
(678, 'AGUIRRE', 203),
(679, 'CM. JUAN GRIEGO', 204),
(680, 'ADRIAN', 204),
(681, 'CM. PORLAMAR', 205),
(682, 'CM. BOCA DEL RIO', 206),
(683, 'SAN FRANCISCO', 206),
(684, 'CM. SAN PEDRO DE COCHE', 207),
(685, 'VICENTE FUENTES', 207),
(686, 'CM. PUNTA DE PIEDRAS', 208),
(687, 'LOS BARALES', 208),
(688, 'CM.LA PLAZA DE PARAGUACHI', 209),
(689, 'CM. VALLE ESP SANTO', 210),
(690, 'FRANCISCO FAJARDO', 210),
(691, 'CM. ARAURE', 211),
(692, 'RIO ACARIGUA', 211),
(693, 'CM. PIRITU', 212),
(694, 'UVERAL', 212),
(695, 'CM. GUANARE', 213),
(696, 'CORDOBA', 213),
(697, 'SAN JUAN GUANAGUANARE', 213),
(698, 'VIRGEN DE LA COROMOTO', 213),
(699, 'SAN JOSE DE LA MONTAÑA', 213),
(700, 'CM. GUANARITO', 214),
(701, 'TRINIDAD DE LA CAPILLA', 214),
(702, 'DIVINA PASTORA', 214),
(703, 'CM. OSPINO', 215),
(704, 'APARICION', 215),
(705, 'LA ESTACION', 215),
(706, 'CM. ACARIGUA', 216),
(707, 'PAYARA', 216),
(708, 'PIMPINELA', 216),
(709, 'RAMON PERAZA', 216),
(710, 'CM. BISCUCUY', 217),
(711, 'CONCEPCION', 217),
(712, 'SAN RAFAEL PALO ALZADO', 217),
(713, 'UVENCIO A VELASQUEZ', 217),
(714, 'SAN JOSE DE SAGUAZ', 217),
(715, 'VILLA ROSA', 217),
(716, 'CM. VILLA BRUZUAL', 218),
(717, 'CANELONES', 218),
(718, 'SANTA CRUZ', 218),
(719, 'SAN ISIDRO LABRADOR', 218),
(720, 'CM. CHABASQUEN', 219),
(721, 'PEÑA BLANCA', 219),
(722, 'CM. AGUA BLANCA', 220),
(723, 'CM. PAPELON', 221),
(724, 'CAÑO DELGADITO', 221),
(725, 'CM. BOCONOITO', 222),
(726, 'ANTOLIN TOVAR AQUINO', 222),
(727, 'CM. SAN RAFAEL DE ONOTO', 223),
(728, 'SANTA FE', 223),
(729, 'THERMO MORLES', 223),
(730, 'CM. EL PLAYON', 224),
(731, 'FLORIDA', 224),
(732, 'RIO CARIBE', 225),
(733, 'SAN JUAN GALDONAS', 225),
(734, 'PUERTO SANTO', 225),
(735, 'EL MORRO DE PTO SANTO', 225),
(736, 'ANTONIO JOSE DE SUCRE', 225),
(737, 'EL PILAR', 226),
(738, 'EL RINCON', 226),
(739, 'GUARAUNOS', 226),
(740, 'TUNAPUICITO', 226),
(741, 'UNION', 226),
(742, 'GRAL FCO. A VASQUEZ', 226),
(743, 'SANTA CATALINA', 227),
(744, 'SANTA ROSA', 227),
(745, 'SANTA TERESA', 227),
(746, 'BOLIVAR', 227),
(747, 'MACARAPANA', 227),
(748, 'YAGUARAPARO', 228),
(749, 'LIBERTAD', 228),
(750, 'PAUJIL', 228),
(751, 'IRAPA', 229),
(752, 'CAMPO CLARO', 229),
(753, 'SORO', 229),
(754, 'SAN ANTONIO DE IRAPA', 229),
(755, 'MARABAL', 229),
(756, 'CM. SAN ANT DEL GOLFO', 230),
(757, 'CUMANACOA', 231),
(758, 'ARENAS', 231),
(759, 'ARICAGUA', 231),
(760, 'COCOLLAR', 231),
(761, 'SAN FERNANDO', 231),
(762, 'SAN LORENZO', 231),
(763, 'CARIACO', 232),
(764, 'CATUARO', 232),
(765, 'RENDON', 232),
(766, 'SANTA CRUZ', 232),
(767, 'SANTA MARIA', 232),
(768, 'ALTAGRACIA', 233),
(769, 'AYACUCHO', 233),
(770, 'SANTA INES', 233),
(771, 'VALENTIN VALIENTE', 233),
(772, 'SAN JUAN', 233),
(773, 'GRAN MARISCAL', 233),
(774, 'RAUL LEONI', 233),
(775, 'GUIRIA', 234),
(776, 'CRISTOBAL COLON', 234),
(777, 'PUNTA DE PIEDRA', 234),
(778, 'BIDEAU', 234),
(779, 'MARIÑO', 235),
(780, 'ROMULO GALLEGOS', 235),
(781, 'TUNAPUY', 236),
(782, 'CAMPO ELIAS', 236),
(783, 'SAN JOSE DE AREOCUAR', 237),
(784, 'TAVERA ACOSTA', 237),
(785, 'CM. MARIGUITAR', 238),
(786, 'ARAYA', 239),
(787, 'MANICUARE', 239),
(788, 'CHACOPATA', 239),
(789, 'CM. COLON', 240),
(790, 'RIVAS BERTI', 240),
(791, 'SAN PEDRO DEL RIO', 240),
(792, 'CM. SAN ANT DEL TACHIRA', 241),
(793, 'PALOTAL', 241),
(794, 'JUAN VICENTE GOMEZ', 241),
(795, 'ISAIAS MEDINA ANGARIT', 241),
(796, 'CM. CAPACHO NUEVO', 242),
(797, 'JUAN GERMAN ROSCIO', 242),
(798, 'ROMAN CARDENAS', 242),
(799, 'CM. TARIBA', 243),
(800, 'LA FLORIDA', 243),
(801, 'AMENODORO RANGEL LAMU', 243),
(802, 'CM. LA GRITA', 244),
(803, 'EMILIO C. GUERRERO', 244),
(804, 'MONS. MIGUEL A SALAS', 244),
(805, 'CM. RUBIO', 245),
(806, 'BRAMON', 245),
(807, 'LA PETROLEA', 245),
(808, 'QUINIMARI', 245),
(809, 'CM. LOBATERA', 246),
(810, 'CONSTITUCION', 246),
(811, 'LA CONCORDIA', 247),
(812, 'PEDRO MARIA MORANTES', 247),
(813, 'SN JUAN BAUTISTA', 247),
(814, 'SAN SEBASTIAN', 247),
(815, 'DR. FCO. ROMERO LOBO', 247),
(816, 'CM. PREGONERO', 248),
(817, 'CARDENAS', 248),
(818, 'POTOSI', 248),
(819, 'JUAN PABLO PEÑALOZA', 248),
(820, 'CM. STA. ANA  DEL TACHIRA', 249),
(821, 'CM. LA FRIA', 250),
(822, 'BOCA DE GRITA', 250),
(823, 'JOSE ANTONIO PAEZ', 250),
(824, 'CM. PALMIRA', 251),
(825, 'CM. MICHELENA', 252),
(826, 'CM. ABEJALES', 253),
(827, 'SAN JOAQUIN DE NAVAY', 253),
(828, 'DORADAS', 253),
(829, 'EMETERIO OCHOA', 253),
(830, 'CM. COLONCITO', 254),
(831, 'LA PALMITA', 254),
(832, 'CM. UREÑA', 255),
(833, 'NUEVA ARCADIA', 255),
(834, 'CM. QUENIQUEA', 256),
(835, 'SAN PABLO', 256),
(836, 'ELEAZAR LOPEZ CONTRERA', 256),
(837, 'CM. CORDERO', 257),
(838, 'CM.SAN RAFAEL DEL PINAL', 258),
(839, 'SANTO DOMINGO', 258),
(840, 'ALBERTO ADRIANI', 258),
(841, 'CM. CAPACHO VIEJO', 259),
(842, 'CIPRIANO CASTRO', 259),
(843, 'MANUEL FELIPE RUGELES', 259),
(844, 'CM. LA TENDIDA', 260),
(845, 'BOCONO', 260),
(846, 'HERNANDEZ', 260),
(847, 'CM. SEBORUCO', 261),
(848, 'CM. LAS MESAS', 262),
(849, 'CM. SAN JOSE DE BOLIVAR', 263),
(850, 'CM. EL COBRE', 264),
(851, 'CM. DELICIAS', 265),
(852, 'CM. SAN SIMON', 266),
(853, 'CM. SAN JOSECITO', 267),
(854, 'CM. UMUQUENA', 268),
(855, 'BETIJOQUE', 269),
(856, 'JOSE G HERNANDEZ', 269),
(857, 'LA PUEBLITA', 269),
(858, 'EL CEDRO', 269),
(859, 'BOCONO', 270),
(860, 'EL CARMEN', 270),
(861, 'MOSQUEY', 270),
(862, 'AYACUCHO', 270),
(863, 'BURBUSAY', 270),
(864, 'GENERAL RIVAS', 270),
(865, 'MONSEÑOR JAUREGUI', 270),
(866, 'RAFAEL RANGEL', 270),
(867, 'SAN JOSE', 270),
(868, 'SAN MIGUEL', 270),
(869, 'GUARAMACAL', 270),
(870, 'LA VEGA DE GUARAMACAL', 270),
(871, 'CARACHE', 271),
(872, 'LA CONCEPCION', 271),
(873, 'CUICAS', 271),
(874, 'PANAMERICANA', 271),
(875, 'SANTA CRUZ', 271),
(876, 'ESCUQUE', 272),
(877, 'SABANA LIBRE', 272),
(878, 'LA UNION', 272),
(879, 'SANTA RITA', 272),
(880, 'CRISTOBAL MENDOZA', 273),
(881, 'CHIQUINQUIRA', 273),
(882, 'MATRIZ', 273),
(883, 'MONSEÑOR CARRILLO', 273),
(884, 'CRUZ CARRILLO', 273),
(885, 'ANDRES LINARES', 273),
(886, 'TRES ESQUINAS', 273),
(887, 'LA QUEBRADA', 274),
(888, 'JAJO', 274),
(889, 'LA MESA', 274),
(890, 'SANTIAGO', 274),
(891, 'CABIMBU', 274),
(892, 'TUÑAME', 274),
(893, 'MERCEDES DIAZ', 275),
(894, 'JUAN IGNACIO MONTILLA', 275),
(895, 'LA BEATRIZ', 275),
(896, 'MENDOZA', 275),
(897, 'LA PUERTA', 275),
(898, 'SAN LUIS', 275),
(899, 'CHEJENDE', 276),
(900, 'CARRILLO', 276),
(901, 'CEGARRA', 276),
(902, 'BOLIVIA', 276),
(903, 'MANUEL SALVADOR ULLOA', 276),
(904, 'SAN JOSE', 276),
(905, 'ARNOLDO GABALDON', 276),
(906, 'EL DIVIDIVE', 277),
(907, 'AGUA CALIENTE', 277),
(908, 'EL CENIZO', 277),
(909, 'AGUA SANTA', 277),
(910, 'VALERITA', 277),
(911, 'MONTE CARMELO', 278),
(912, 'BUENA VISTA', 278),
(913, 'STA MARIA DEL HORCON', 278),
(914, 'MOTATAN', 279),
(915, 'EL BAÑO', 279),
(916, 'JALISCO', 279),
(917, 'PAMPAN', 280),
(918, 'SANTA ANA', 280),
(919, 'LA PAZ', 280),
(920, 'FLOR DE PATRIA', 280),
(921, 'CARVAJAL', 281),
(922, 'ANTONIO N BRICEÑO', 281),
(923, 'CAMPO ALEGRE', 281),
(924, 'JOSE LEONARDO SUAREZ', 281),
(925, 'SABANA DE MENDOZA', 282),
(926, 'JUNIN', 282),
(927, 'VALMORE RODRIGUEZ', 282),
(928, 'EL PARAISO', 282),
(929, 'SANTA ISABEL', 283),
(930, 'ARAGUANEY', 283),
(931, 'EL JAGUITO', 283),
(932, 'LA ESPERANZA', 283),
(933, 'SABANA GRANDE', 284),
(934, 'CHEREGUE', 284),
(935, 'GRANADOS', 284),
(936, 'EL SOCORRO', 285),
(937, 'LOS CAPRICHOS', 285),
(938, 'ANTONIO JOSE DE SUCRE', 285),
(939, 'CAMPO ELIAS', 286),
(940, 'ARNOLDO GABALDON', 286),
(941, 'SANTA APOLONIA', 287),
(942, 'LA CEIBA', 287),
(943, 'EL PROGRESO', 287),
(944, 'TRES DE FEBRERO', 287),
(945, 'PAMPANITO', 288),
(946, 'PAMPANITO II', 288),
(947, 'LA CONCEPCION', 288),
(948, 'CM. AROA', 289),
(949, 'CM. CHIVACOA', 290),
(950, 'CAMPO ELIAS', 290),
(951, 'CM. NIRGUA', 291),
(952, 'SALOM', 291),
(953, 'TEMERLA', 291),
(954, 'CM. SAN FELIPE', 292),
(955, 'ALBARICO', 292),
(956, 'SAN JAVIER', 292),
(957, 'CM. GUAMA', 293),
(958, 'CM. URACHICHE', 294),
(959, 'CM. YARITAGUA', 295),
(960, 'SAN ANDRES', 295),
(961, 'CM. SABANA DE PARRA', 296),
(962, 'CM. BORAURE', 297),
(963, 'CM. COCOROTE', 298),
(964, 'CM. INDEPENDENCIA', 299),
(965, 'CM. SAN PABLO', 300),
(966, 'CM. YUMARE', 301),
(967, 'CM. FARRIAR', 302),
(968, 'EL GUAYABO', 302),
(969, 'GENERAL URDANETA', 303),
(970, 'LIBERTADOR', 303),
(971, 'MANUEL GUANIPA MATOS', 303),
(972, 'MARCELINO BRICEÑO', 303),
(973, 'SAN TIMOTEO', 303),
(974, 'PUEBLO NUEVO', 303),
(975, 'PEDRO LUCAS URRIBARRI', 304),
(976, 'SANTA RITA', 304),
(977, 'JOSE CENOVIO URRIBARR', 304),
(978, 'EL MENE', 304),
(979, 'SANTA CRUZ DEL ZULIA', 305),
(980, 'URRIBARRI', 305),
(981, 'MORALITO', 305),
(982, 'SAN CARLOS DEL ZULIA', 305),
(983, 'SANTA BARBARA', 305),
(984, 'LUIS DE VICENTE', 306),
(985, 'RICAURTE', 306),
(986, 'MONS.MARCOS SERGIO G', 306),
(987, 'SAN RAFAEL', 306),
(988, 'LAS PARCELAS', 306),
(989, 'TAMARE', 306),
(990, 'LA SIERRITA', 306),
(991, 'BOLIVAR', 307),
(992, 'COQUIVACOA', 307),
(993, 'CRISTO DE ARANZA', 307),
(994, 'CHIQUINQUIRA', 307),
(995, 'SANTA LUCIA', 307),
(996, 'OLEGARIO VILLALOBOS', 307),
(997, 'JUANA DE AVILA', 307),
(998, 'CARACCIOLO PARRA PEREZ', 307),
(999, 'IDELFONZO VASQUEZ', 307),
(1000, 'CACIQUE MARA', 307),
(1001, 'CECILIO ACOSTA', 307),
(1002, 'RAUL LEONI', 307),
(1003, 'FRANCISCO EUGENIO B', 307),
(1004, 'MANUEL DAGNINO', 307),
(1005, 'LUIS HURTADO HIGUERA', 307),
(1006, 'VENANCIO PULGAR', 307),
(1007, 'ANTONIO BORJAS ROMERO', 307),
(1008, 'SAN ISIDRO', 307),
(1009, 'FARIA', 308),
(1010, 'SAN ANTONIO', 308),
(1011, 'ANA MARIA CAMPOS', 308),
(1012, 'SAN JOSE', 308),
(1013, 'ALTAGRACIA', 308),
(1014, 'GOAJIRA', 309),
(1015, 'ELIAS SANCHEZ RUBIO', 309),
(1016, 'SINAMAICA', 309),
(1017, 'ALTA GUAJIRA', 309),
(1018, 'SAN JOSE DE PERIJA', 310),
(1019, 'BARTOLOME DE LAS CASAS', 310),
(1020, 'LIBERTAD', 310),
(1021, 'RIO NEGRO', 310),
(1022, 'GIBRALTAR', 311),
(1023, 'HERAS', 311),
(1024, 'M.ARTURO CELESTINO A', 311),
(1025, 'ROMULO GALLEGOS', 311),
(1026, 'BOBURES', 311),
(1027, 'EL BATEY', 311),
(1028, 'ANDRES BELLO (KM 48)', 312),
(1029, 'POTRERITOS', 312),
(1030, 'EL CARMELO', 312),
(1031, 'CHIQUINQUIRA', 312),
(1032, 'CONCEPCION', 312),
(1033, 'ELEAZAR LOPEZ C', 313),
(1034, 'ALONSO DE OJEDA', 313),
(1035, 'VENEZUELA', 313),
(1036, 'CAMPO LARA', 313),
(1037, 'LIBERTAD', 313),
(1038, 'UDON PEREZ', 314),
(1039, 'ENCONTRADOS', 314),
(1040, 'DONALDO GARCIA', 315),
(1041, 'SIXTO ZAMBRANO', 315),
(1042, 'EL ROSARIO', 315),
(1043, 'AMBROSIO', 316),
(1044, 'GERMAN RIOS LINARES', 316),
(1045, 'JORGE HERNANDEZ', 316),
(1046, 'LA ROSA', 316),
(1047, 'PUNTA GORDA', 316),
(1048, 'CARMEN HERRERA', 316),
(1049, 'SAN BENITO', 316),
(1050, 'ROMULO BETANCOURT', 316),
(1051, 'ARISTIDES CALVANI', 316),
(1052, 'RAUL CUENCA', 317),
(1053, 'LA VICTORIA', 317),
(1054, 'RAFAEL URDANETA', 317),
(1055, 'JOSE RAMON YEPEZ', 318),
(1056, 'LA CONCEPCION', 318),
(1057, 'SAN JOSE', 318),
(1058, 'MARIANO PARRA LEON', 318),
(1059, 'MONAGAS', 319),
(1060, 'ISLA DE TOAS', 319),
(1061, 'MARCIAL HERNANDEZ', 320),
(1062, 'FRANCISCO OCHOA', 320),
(1063, 'SAN FRANCISCO', 320),
(1064, 'EL BAJO', 320),
(1065, 'DOMITILA FLORES', 320),
(1066, 'LOS CORTIJOS', 320),
(1067, 'BARI', 321),
(1068, 'JESUS M SEMPRUN', 321),
(1069, 'SIMON RODRIGUEZ', 322),
(1070, 'CARLOS QUEVEDO', 322),
(1071, 'FRANCISCO J PULGAR', 322),
(1072, 'RAFAEL MARIA BARALT', 323),
(1073, 'MANUEL MANRIQUE', 323),
(1074, 'RAFAEL URDANETA', 323),
(1075, 'FERNANDO GIRON TOVAR', 324),
(1076, 'LUIS ALBERTO GOMEZ', 324),
(1077, 'PARHUEÑA', 324),
(1078, 'PLATANILLAL', 324),
(1079, 'CM. SAN FERNANDO DE ATABA', 325),
(1080, 'UCATA', 325),
(1081, 'YAPACANA', 325),
(1082, 'CANAME', 325),
(1083, 'CM. MAROA', 326),
(1084, 'VICTORINO', 326),
(1085, 'COMUNIDAD', 326),
(1086, 'CM. SAN CARLOS DE RIO NEG', 327),
(1087, 'SOLANO', 327),
(1088, 'COCUY', 327),
(1089, 'CM. ISLA DE RATON', 328),
(1090, 'SAMARIAPO', 328),
(1091, 'SIPAPO', 328),
(1092, 'MUNDUAPO', 328),
(1093, 'GUAYAPO', 328),
(1094, 'CM. SAN JUAN DE MANAPIARE', 329),
(1095, 'ALTO VENTUARI', 329),
(1096, 'MEDIO VENTUARI', 329),
(1097, 'BAJO VENTUARI', 329),
(1098, 'CM. LA ESMERALDA', 330),
(1099, 'HUACHAMACARE', 330),
(1100, 'MARAWAKA', 330),
(1101, 'MAVACA', 330),
(1102, 'SIERRA PARIMA', 330),
(1103, 'SAN JOSE', 331),
(1104, 'VIRGEN DEL VALLE', 331),
(1105, 'SAN RAFAEL', 331),
(1106, 'JOSE VIDAL MARCANO', 331),
(1107, 'LEONARDO RUIZ PINEDA', 331),
(1108, 'MONS. ARGIMIRO GARCIA', 331),
(1109, 'MCL.ANTONIO J DE SUCRE', 331),
(1110, 'JUAN MILLAN', 331),
(1111, 'PEDERNALES', 332),
(1112, 'LUIS B PRIETO FIGUERO', 332),
(1113, 'CURIAPO', 333),
(1114, 'SANTOS DE ABELGAS', 333),
(1115, 'MANUEL RENAUD', 333),
(1116, 'PADRE BARRAL', 333),
(1117, 'ANICETO LUGO', 333),
(1118, 'ALMIRANTE LUIS BRION', 333),
(1119, 'IMATACA', 334),
(1120, 'ROMULO GALLEGOS', 334),
(1121, 'JUAN BAUTISTA ARISMEN', 334),
(1122, 'MANUEL PIAR', 334),
(1123, '5 DE JULIO', 334),
(1124, 'CARABALLEDA', 335),
(1125, 'CARAYACA', 335),
(1126, 'CARUAO', 335),
(1127, 'CATIA LA MAR', 335),
(1128, 'LA GUAIRA', 335),
(1129, 'MACUTO', 335),
(1130, 'MAIQUETIA', 335),
(1131, 'NAIGUATA', 335),
(1132, 'EL JUNKO', 335),
(1133, 'PQ RAUL LEONI', 335),
(1134, 'PQ CARLOS SOUBLETTE', 335);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id_perfil` int(11) NOT NULL,
  `nombre_perfil` varchar(255) NOT NULL DEFAULT '',
  `activo` tinyint(3) UNSIGNED DEFAULT '1' COMMENT '1=Activo, 0=Desactivado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nombre_perfil`, `activo`) VALUES
(1, 'ADMINISTRADOR', 1),
(2, 'ADM. EMPRESA', 1),
(3, 'ANALISTA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantas`
--

CREATE TABLE `plantas` (
  `id_planta` int(11) NOT NULL,
  `nombre_planta` varchar(255) NOT NULL DEFAULT '',
  `tipo_id` int(11) NOT NULL,
  `empresa_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `estado_id` int(11) NOT NULL DEFAULT '0',
  `municipio_id` int(11) NOT NULL DEFAULT '0',
  `parroquia_id` int(11) NOT NULL DEFAULT '0',
  `descripcion` text,
  `cap_inst` int(11) DEFAULT NULL,
  `cap_ope` int(11) DEFAULT NULL,
  `cap_alm` int(11) DEFAULT NULL,
  `alm_seco` int(11) DEFAULT NULL,
  `alm_frio` int(11) DEFAULT NULL,
  `alm_silo` int(11) DEFAULT NULL,
  `cant_lineas` int(11) DEFAULT NULL,
  `estatus_lineas` tinyint(3) UNSIGNED DEFAULT '1' COMMENT '1=Activo, 0=Desactivado',
  `cant_empleados` int(11) DEFAULT NULL,
  `longitud` varchar(255) NOT NULL DEFAULT '',
  `latitud` varchar(255) NOT NULL DEFAULT '',
  `activo` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '1=Activo, 0=Desactivado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `plantas`
--

INSERT INTO `plantas` (`id_planta`, `nombre_planta`, `tipo_id`, `empresa_id`, `estado_id`, `municipio_id`, `parroquia_id`, `descripcion`, `cap_inst`, `cap_ope`, `cap_alm`, `alm_seco`, `alm_frio`, `alm_silo`, `cant_lineas`, `estatus_lineas`, `cant_empleados`, `longitud`, `latitud`, `activo`) VALUES
(1, 'CATIA', 1, 1, 1, 1, 10, 'PLANTA EMPAQUETADORA DE PRODUCTO TERMINADO', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, '', '', 1),
(2, 'UNIDAD DE PROPIEDAD SOCIAL VICTOR GREGORIO REYES ALFONZO', 1, 3, 3, 28, 99, 'PLANTA EMPAQUETADORA DE PRODUCTO TERMINADO', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, '', '', 1),
(3, 'CEREALES LA CRUZ', 2, 1, 2, 14, 61, 'PLANTA PROCESADORA DE MATERIA PRIMA', NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, '', '', 1),
(4, 'probando planta', 1, 4, 4, 3, 25, 'prueba', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `id_presentacion` int(11) NOT NULL,
  `nombre_presentacion` varchar(255) NOT NULL DEFAULT '',
  `contenido` int(10) NOT NULL DEFAULT '0',
  `medida_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`id_presentacion`, `nombre_presentacion`, `contenido`, `medida_id`) VALUES
(1, 'BULTO', 12, 2),
(2, 'CAJA 6X1KG', 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(255) NOT NULL DEFAULT '',
  `rubro_id` int(11) NOT NULL DEFAULT '0',
  `marca_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `presentacion_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `rubro_id`, `marca_id`, `presentacion_id`) VALUES
(1, 'LECHE VENALCASA', 1, 1, 1),
(2, 'LECHE COMPLETA MARCA DOÑA EMILIA', 2, 2, 2),
(5, 'HARINA LA AUTENTICA', 3, 1, 1),
(6, 'ARROZ DEL ALBA', 5, 1, 2),
(7, 'AZUCAR MI DULCE VIDA', 7, 1, 1),
(8, 'HARINA LA MAZORCA VIVA', 3, 1, 2),
(9, 'HARINA LA NIñA DOñA EMILIA MARCANO', 3, 1, 1),
(10, 'HARINA LA LEY DEL MONTE', 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_planta`
--

CREATE TABLE `producto_planta` (
  `id_producto_planta` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `planta_id` int(11) NOT NULL,
  `activo` tinyint(3) UNSIGNED DEFAULT '1' COMMENT '1=Activo, 0=Desactivado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto_planta`
--

INSERT INTO `producto_planta` (`id_producto_planta`, `producto_id`, `planta_id`, `activo`) VALUES
(1, 1, 1, 1),
(3, 2, 2, 1),
(4, 2, 3, 1),
(5, 6, 4, 1),
(6, 7, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id_reporte` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL DEFAULT '0',
  `producto_id` int(11) NOT NULL DEFAULT '0',
  `rubro_id` int(11) NOT NULL DEFAULT '0',
  `produccion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descripcion` text,
  `fecha_reporte` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reportes`
--

INSERT INTO `reportes` (`id_reporte`, `usuario_id`, `producto_id`, `rubro_id`, `produccion`, `descripcion`, `fecha_reporte`) VALUES
(7, 3, 1, 1, '12200.00', '', '2016-05-14 02:35:49'),
(8, 3, 1, 1, '18000.00', '', '2016-05-14 02:36:04'),
(9, 3, 1, 1, '8500.00', 'CHOCARON LOS CAMIONES', '2016-05-14 02:36:34'),
(10, 3, 1, 1, '22000.00', 'ACTIVIDAD PROLONGADA', '2016-05-15 01:04:27'),
(11, 3, 1, 1, '26500.00', 'LLEGADA MOMENTANEA', '2016-05-15 01:05:03'),
(12, 3, 1, 1, '2500.00', 'NINGUNA', '2016-05-19 02:10:59'),
(13, 3, 1, 1, '14000.00', 'NINGUNA', '2016-05-20 18:26:02'),
(14, 3, 1, 1, '18000.00', 'NINGUNA', '2016-05-20 19:40:49'),
(16, 3, 1, 1, '28500.00', '', '2016-05-28 00:29:57'),
(17, 3, 1, 1, '21000.00', '', '2016-05-28 00:30:18'),
(18, 3, 1, 1, '15000.00', '', '2016-05-28 00:30:32'),
(19, 3, 7, 7, '15200.00', 'prueba desde la bd', '2016-05-28 00:49:01'),
(21, 5, 2, 2, '25000.00', 'PRUEBA 1', '2016-05-30 03:23:51'),
(22, 5, 2, 2, '22000.00', 'PRUEBA 2', '2016-05-30 03:24:04'),
(23, 5, 2, 2, '18600.00', 'PRUEBA 3', '2016-05-30 03:24:18'),
(24, 5, 2, 2, '15200.00', 'PRUEBA 4', '2016-05-30 03:24:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id_rubro` int(11) NOT NULL,
  `nombre_rubro` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id_rubro`, `nombre_rubro`) VALUES
(1, 'LECHE'),
(2, 'CEREALES'),
(3, 'HARINA'),
(5, 'ARROZ'),
(7, 'AZUCAR'),
(10, 'CARAOTA'),
(11, 'PAN'),
(12, 'PAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `id_sede` int(10) UNSIGNED NOT NULL,
  `empresa_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `responsable` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ubicacion` longtext COLLATE utf8_spanish_ci,
  `activo` tinyint(3) UNSIGNED DEFAULT '1' COMMENT '1=Activo, 0=Desactivado',
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id_sede`, `empresa_id`, `nombre`, `responsable`, `ubicacion`, `activo`, `fecha_registro`) VALUES
(2, 1, '', '', '', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_planta`
--

CREATE TABLE `tipo_planta` (
  `id_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_planta`
--

INSERT INTO `tipo_planta` (`id_tipo`, `nombre_tipo`) VALUES
(1, 'EMPAQUETADORA'),
(2, 'PROCESADORA'),
(3, 'TRILLADORA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT '1',
  `empresa_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `planta_id` int(11) NOT NULL DEFAULT '0',
  `sede_id` int(11) DEFAULT NULL,
  `gerencia_id` int(11) DEFAULT NULL,
  `cedula` int(11) DEFAULT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `apellido` varchar(255) CHARACTER SET utf8 DEFAULT '',
  `usuario` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `contraseña` varchar(255) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `fecha_nac` date NOT NULL DEFAULT '0000-00-00',
  `correo` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `telefono` varchar(255) CHARACTER SET latin1 DEFAULT '',
  `activo` tinyint(1) DEFAULT '1',
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `perfil_id`, `empresa_id`, `planta_id`, `sede_id`, `gerencia_id`, `cedula`, `nombre`, `apellido`, `usuario`, `contraseña`, `fecha_nac`, `correo`, `telefono`, `activo`, `fecha_registro`) VALUES
(1, 1, 999, 0, NULL, NULL, 17143539, 'CHRISTIAN', 'GONCALVES', 'CGONCALVES', 'e10adc3949ba59abbe56e057f20f883e', '1985-07-25', 'CGONCALVES@VENALCASA.GOB.VE', '04168321007', 1, '2016-03-30 21:29:37'),
(2, 2, 1, 0, NULL, NULL, 18129798, 'FELIX', 'SILVA', 'fsilva', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 'fsilva@venalcasa.gob.ve', '', 1, '2016-03-30 21:39:35'),
(3, 3, 1, 1, NULL, NULL, 12345678, 'DANNY', 'UGAS', 'dugas', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', '', '', 1, '2016-03-31 16:47:13'),
(4, 2, 3, 0, NULL, NULL, 12761308, 'ANTONIO', 'GONCALVES', 'AGONCALVES', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 'AGONCALVES@GMAIL.COM', '04149004057', 1, '2016-04-02 05:09:07'),
(5, 3, 3, 2, NULL, NULL, 16031356, 'ALEJANDRA', 'MATA', 'AMATA', 'e10adc3949ba59abbe56e057f20f883e', '0000-00-00', 'AMATA@GMAIL.COM', '04168321007', 1, '2016-04-02 05:10:34'),
(8, 3, 3, 2, 2, NULL, 20119496, 'luis', 'barrios', 'LBARRIOS', 'd21cb5fdb304605665b9730e07f95bdb', '1992-09-22', 'luisbarrios0992@gmail.com', '04162430732', 1, '2016-05-14 02:28:59'),
(9, 1, 3, 0, NULL, NULL, NULL, '', '', '', 'D41D8CD98F00B204E9800998ECF8427E', '0000-00-00', '', '', 1, '2016-05-29 19:06:41');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `gerencia`
--
ALTER TABLE `gerencia`
  ADD PRIMARY KEY (`id_gerencia`),
  ADD KEY `sede_id` (`sede_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `medida`
--
ALTER TABLE `medida`
  ADD PRIMARY KEY (`id_medida`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`NU_IdNovedad`);

--
-- Indices de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD PRIMARY KEY (`id_parroquia`),
  ADD KEY `municipio_id` (`municipio_id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Indices de la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD PRIMARY KEY (`id_planta`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `empresa_id` (`empresa_id`),
  ADD KEY `estado_id` (`estado_id`),
  ADD KEY `municipio_id` (`municipio_id`),
  ADD KEY `parroquia_id` (`parroquia_id`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`id_presentacion`),
  ADD KEY `medida_id` (`medida_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `presentacion_id` (`presentacion_id`),
  ADD KEY `rubro_id` (`rubro_id`);

--
-- Indices de la tabla `producto_planta`
--
ALTER TABLE `producto_planta`
  ADD PRIMARY KEY (`id_producto_planta`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `planta_id` (`planta_id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id_reporte`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`id_rubro`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`id_sede`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- Indices de la tabla `tipo_planta`
--
ALTER TABLE `tipo_planta`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `perfil_id` (`perfil_id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id_empresa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tabla Estado', AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `gerencia`
--
ALTER TABLE `gerencia`
  MODIFY `id_gerencia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `medida`
--
ALTER TABLE `medida`
  MODIFY `id_medida` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de Munucipio', AUTO_INCREMENT=336;
--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `NU_IdNovedad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;
--
-- AUTO_INCREMENT de la tabla `parroquia`
--
ALTER TABLE `parroquia`
  MODIFY `id_parroquia` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la parroquia', AUTO_INCREMENT=1135;
--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `id_presentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `producto_planta`
--
ALTER TABLE `producto_planta`
  MODIFY `id_producto_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id_reporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id_rubro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `sede`
--
ALTER TABLE `sede`
  MODIFY `id_sede` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_planta`
--
ALTER TABLE `tipo_planta`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gerencia`
--
ALTER TABLE `gerencia`
  ADD CONSTRAINT `gerencia_ibfk_1` FOREIGN KEY (`sede_id`) REFERENCES `sede` (`id_sede`);

--
-- Filtros para la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD CONSTRAINT `municipio_ibfk_1` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `parroquia`
--
ALTER TABLE `parroquia`
  ADD CONSTRAINT `parroquia_ibfk_1` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id_municipio`);

--
-- Filtros para la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD CONSTRAINT `plantas_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo_planta` (`id_tipo`),
  ADD CONSTRAINT `plantas_ibfk_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`),
  ADD CONSTRAINT `plantas_ibfk_3` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `plantas_ibfk_4` FOREIGN KEY (`municipio_id`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `plantas_ibfk_5` FOREIGN KEY (`parroquia_id`) REFERENCES `parroquia` (`id_parroquia`);

--
-- Filtros para la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD CONSTRAINT `presentacion_ibfk_1` FOREIGN KEY (`medida_id`) REFERENCES `medida` (`id_medida`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id_marca`),
  ADD CONSTRAINT `productos_ibfk_3` FOREIGN KEY (`presentacion_id`) REFERENCES `presentacion` (`id_presentacion`),
  ADD CONSTRAINT `productos_ibfk_4` FOREIGN KEY (`rubro_id`) REFERENCES `rubros` (`id_rubro`);

--
-- Filtros para la tabla `producto_planta`
--
ALTER TABLE `producto_planta`
  ADD CONSTRAINT `producto_planta_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `producto_planta_ibfk_2` FOREIGN KEY (`planta_id`) REFERENCES `plantas` (`id_planta`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `sede`
--
ALTER TABLE `sede`
  ADD CONSTRAINT `sede_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id_perfil`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`empresa_id`) REFERENCES `empresa` (`id_empresa`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
