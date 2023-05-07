-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2023 a las 23:58:38
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `malvadosasociados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_usuario` int(20) DEFAULT NULL,
  `id_administrador` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_usuario`, `id_administrador`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `id_ambiente` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `capacidad` int(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id_ambiente`, `nombre`, `descripcion`, `capacidad`, `ubicacion`, `tipo`) VALUES
(1, 'Auditorio', 'Auditorio ', 200, 'Edificio viejo,Planta baja', 'Auditorio'),
(2, 'Sala de Conferencias 1', '', 50, 'Edificio principal, Primer piso', 'sala de conferencia'),
(3, 'Sala de Taller', 'laboratorio', 30, 'edificio de computo, Piso 6', 'laboratorio'),
(4, 'lab2', 'piso 3', 20, 'ed', 'lab'),
(5, 'Auditorio', 'Auditorio', 200, 'Facultad de Ciencias Agrarias y Forestales, Universidad Juan Misael Saracho', 'Auditorio'),
(6, 'Auditorio', 'a', 100, 'Universidad Autónoma René Moreno', 'auditorio'),
(7, 'Campus Universitario', NULL, NULL, 'Cota Cota (ingreso calle 31 de Cota Cota)', NULL),
(8, 'Real Plaza Hotel & Convention Center', '(Ex - Radisson)', 24, 'Av. Arce 2177 - La Paz - Bolivia', NULL),
(9, 'Atrio al Monoblock Central', '', 50, 'UMSA', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(20) NOT NULL,
  `id_evento` int(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `detalle_asistencia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casual`
--

CREATE TABLE `casual` (
  `id_casual` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `fecha_reserva` datetime DEFAULT NULL,
  `id_reserva` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `casual`
--

INSERT INTO `casual` (`id_casual`, `id_usuario`, `fecha_reserva`, `id_reserva`) VALUES
(1, 4, NULL, NULL),
(2, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE `certificado` (
  `id_certificado` int(20) NOT NULL,
  `id_participante` int(20) NOT NULL,
  `id_evento` int(20) NOT NULL,
  `fecha_emision` date NOT NULL,
  `estado` varchar(20) NOT NULL,
  `carga_horaria` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(20) NOT NULL,
  `id_participante` int(20) NOT NULL,
  `id_evento` int(20) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `contenido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control`
--

CREATE TABLE `control` (
  `id_control` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `control`
--

INSERT INTO `control` (`id_control`, `id_usuario`) VALUES
(1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipamiento`
--

CREATE TABLE `equipamiento` (
  `id_equipamiento` int(11) NOT NULL,
  `id_ambiente` int(11) NOT NULL,
  `id_infraestructura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipamiento`
--

INSERT INTO `equipamiento` (`id_equipamiento`, `id_ambiente`, `id_infraestructura`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 2, 3),
(6, 2, 4),
(7, 2, 5),
(8, 3, 1),
(9, 3, 3),
(10, 4, 2),
(11, 4, 3),
(12, 4, 7),
(13, 5, 1),
(14, 5, 6),
(15, 5, 7),
(16, 6, 1),
(17, 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `id_evento` int(20) NOT NULL,
  `fechaEvento` date DEFAULT NULL,
  `nombreEvento` varchar(225) NOT NULL,
  `Duracion` int(45) NOT NULL,
  `descripcion` longtext NOT NULL,
  `imagen` varchar(200) DEFAULT NULL,
  `id_ambiente` int(11) NOT NULL,
  `gratuito` varchar(2) DEFAULT 'no',
  `costo` decimal(10,0) DEFAULT NULL,
  `fechaFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`id_evento`, `fechaEvento`, `nombreEvento`, `Duracion`, `descripcion`, `imagen`, `id_ambiente`, `gratuito`, `costo`, `fechaFin`) VALUES
(1, '2023-04-13', '1 CONGRESO NACIONAL DE COMUNICACION SOCIAL Y TURISMO', 3, 'Primer Congreso Nacional de comunicación social y turismo y no pueden perder esta oportunidad única! ?? Hemos preparado un evento lleno de aprendizaje, diversión y crecimiento personal y profesional.', 'turismo.png', 2, 'no', '200', '2023-05-15'),
(2, '2023-05-13', 'XIII CONGRESO NACIONAL DE CIENCIAS ECONOMICAS, CONTABLES, FINANCIERAS Y EMPRESARIALES ', 3, 'Nos complace anunciar el lanzamiento del Congreso Nacional de Ciencias Económicas, Contables, Financieras y Empresariales más grande de Bolivia. 🥳\r\nEste evento imperdible tendrá lugar en la chura Tarija los días 13, 14 y 15 de abril.\r\nNo pierdas la oportunidad de ser parte de esta experiencia única e inolvidable. ', 'eco.png', 1, 'no', '200', '2023-05-15'),
(3, '2023-05-13', 'IV CONGRESO NACIONAL DE CIENCIAS DE LA COMPUTACIÓN, INFORMÁTICA, SISTEMA Y TELECOMUNICACIONES', 3, 'Congreso Nacional de Ciencias de la computación-Informática-Sistemas y Telecomunicaciones y no pueden perder esta oportunidad única! 🙌🤓\r\nHemos preparado un evento lleno de aprendizaje, diversión y crecimiento personal y profesional.', 'info.png', 5, 'no', '200', '2023-05-15'),
(4, '2023-05-13', 'XL CONGRESO NACIONAL DE INGENIERÍA MECÁNICA, ELECTRÓNICA, INDUSTRIAL Y RAMAS AFINES', 3, 'XL Congreso Nacional de ingeniería mecánica, electrónica, industrial y ramas afines y no pueden perder esta oportunidad única! 🙌🤓\r\nHemos preparado un evento lleno de aprendizaje, diversión y crecimiento personal y profesional.', 'mecanica.png', 6, 'no', '200', '2023-04-15'),
(5, '2023-05-13', '3º CONGRESO NACIONAL DE PSICOLOGÍA PEDAGOGÍA Y CIENCIAS DE LA EDUCACIÓN', 3, 'Congreso Nacional de psicología, pedagogía y ciencias de la educación y no pueden perder esta oportunidad única! 🙌🤓\r\nHemos preparado un evento lleno de aprendizaje, diversión y crecimiento personal y profesional.', 'psico.png', 3, 'no', '200', '2023-05-15'),
(14, '2023-07-15', 'PRIMERA FERIA \"COSTUMBRES Y TRADICIONES PACEÑAS\"', 0, 'Primera feria \"Costumbres y Tradiciones Paceñas\", en homenaje a los 213 años del primer grito libertario de América', 'costumbre.jpg', 9, 'si', '0', '2023-07-15'),
(15, '2023-05-03', 'CONGRESO NACIONAL CRISIS CLIMÁTICA - DEL 3 AL 5 DE MAYO DE 2023', 3, '', 'climatica.jpg', 8, 'si', '0', '2023-05-05'),
(16, '2023-10-14', 'FERIA A PUERTAS ABIERTAS (SEGUNDA VERSIÓN)', 0, 'La carrera de Ingeniería Industrial y el Instituto de Investigaciones Industriales de la #UMSA invitan a la población a visitar la:', 'feria.jpg', 7, 'si', '0', '2023-10-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expositor`
--

CREATE TABLE `expositor` (
  `id_expositor` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `id_repositorio` int(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `grado` varchar(45) DEFAULT NULL,
  `mencion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `expositor`
--

INSERT INTO `expositor` (`id_expositor`, `id_usuario`, `id_repositorio`, `descripcion`, `grado`, `mencion`) VALUES
(1, 6, NULL, 'Ejerce en el banco nacional de bolivia', 'MSC. LIC.', 'ECONOMIA'),
(2, 8, NULL, NULL, 'M.Sc', ''),
(3, 9, NULL, NULL, 'Lic.', ''),
(4, 10, NULL, NULL, 'M.Sc', ''),
(5, 11, NULL, NULL, 'M.Sc', ''),
(6, 12, NULL, NULL, 'Lic.', ''),
(7, 13, NULL, NULL, 'M.Sc.', ''),
(8, 14, NULL, NULL, 'Lic.', ''),
(9, 15, NULL, NULL, 'M.Sc', ''),
(10, 17, NULL, NULL, 'Lic.', ''),
(11, 16, NULL, NULL, 'Lic.', ''),
(12, 18, NULL, NULL, 'Lic.', ''),
(13, 19, NULL, NULL, 'Lic.', ''),
(14, 20, NULL, NULL, 'M.Sc', ''),
(15, 21, NULL, NULL, 'M.Sc', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infraestructura`
--

CREATE TABLE `infraestructura` (
  `id_infraestructura` int(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `infraestructura`
--

INSERT INTO `infraestructura` (`id_infraestructura`, `nombre`, `tipo`, `estado`, `descripcion`) VALUES
(1, 'Proyector', 'visual', 'en mal estado', 'marca sony modelo VPL-DX240'),
(2, 'PC', 'Equipo de Computo', 'fuera de servicio', 'marca hp ram 8GB'),
(3, 'videocámara', 'visual', 'buen estado', 'marca canoo'),
(4, 'Atril', 'Atril', 'buen estado', 'Atril ajustable para expositores'),
(5, 'equipo de sonido', 'equipo de sonido', 'en mantenimento', 'equipo de sonido con micrófonos y altavoces '),
(6, 'micrófono', 'sonido', 'buen estado', 'micrófono portable'),
(7, 'sillas', 'mueble', 'nuevo', 'cafes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id_logs` int(20) NOT NULL,
  `fecha_ingreso` datetime NOT NULL,
  `fecha_salida` datetime NOT NULL,
  `ip_terminal` varchar(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `evento` varchar(20) NOT NULL,
  `sub_modulo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `id_repositorio` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `formato` varchar(30) NOT NULL,
  `fecha_subida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE `participante` (
  `id_participante` int(20) NOT NULL,
  `id_usuario` int(20) NOT NULL,
  `id_evento` int(20) NOT NULL,
  `fecha_participante` date NOT NULL,
  `estado_participante` varchar(45) NOT NULL,
  `codigo_qr` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `participante` (`id_participante`, `id_usuario`, `id_evento`, `fecha_participante`, `estado_participante`, `codigo_qr`) VALUES
(3, 4, 4, '2023-05-01', 'completado', ''),
(13, 4, 1, '2023-05-03', '', ''),
(14, 2, 2, '2023-05-03', '', ''),
(15, 22, 3, '2023-05-03', '', ''),
(16, 4, 16, '2023-05-04', 'completado', ''),
(17, 4, 15, '2023-05-04', 'completado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repositorio`
--

CREATE TABLE `repositorio` (
  `id_repositorio` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `row4` varchar(20) NOT NULL,
  `id_material` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitio`
--

CREATE TABLE `sitio` (
  `id_sitio` int(20) NOT NULL,
  `objetivos` text NOT NULL,
  `valores` text NOT NULL,
  `mision` text NOT NULL,
  `vision` text NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `ubicacion` text DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `faceboock` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `imagen` varchar(20) DEFAULT NULL,
  `quines somos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sitio`
--

INSERT INTO `sitio` (`id_sitio`, `objetivos`, `valores`, `mision`, `vision`, `nombre`, `ubicacion`, `telefono`, `celular`, `instagram`, `faceboock`, `twitter`, `imagen`, `quines somos`) VALUES
(1, 'Difundir y proyectar', 'Desarrollar política', 'La misión del CAETI ', 'El Centro de Altos E', 'CIITI', 'alemania', '435610', '3456878', 'https://youtu.be/xYSu1KSnxtc', 'https://youtu.be/xYSu1KSnxtc', 'https://youtu.be/xYSu1KSnxtc', 'https://youtu.be/xYS', 'El CAETI como unidad académica, abocada a contribuir al desarrollo de las TIC\'s, lleva adelante la investigación básica y aplicada en diversas áreas. Formando los recursos humanos para la investigación y transfiriendo los resultados de las investigaciones hacia la industria y a la sociedad; sustentando el progreso integral del individuo y el conocimiento para que los logros trasciendan.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE `tipo_evento` (
  `id_tipoevento` int(20) NOT NULL,
  `id_administrador` int(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(20) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apPaterno` varchar(50) NOT NULL,
  `apMaterno` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` char(60) DEFAULT NULL,
  `estado` varchar(60) DEFAULT NULL,
  `identidad` varchar(60) NOT NULL,
  `foto` varchar(200) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `fechaRegistro` date DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apPaterno`, `apMaterno`, `email`, `password`, `estado`, `identidad`, `foto`, `usuario`, `celular`, `fechaRegistro`, `token`) VALUES
(1, 'Juan ', 'Perez', 'Choque', 'juanperez@gmail.com', 'cado1356', '', '6565656', '', 'juanperez@gmail.com', '', '2023-04-02', ''),
(2, 'Pedro', 'Cortez', 'Lara', 'jcoyoq@fcpn.edu.bo', 'cabo', '', '6767676', '', 'jcoyoq@fcpn.edu.bo', '', '2023-03-25', ''),
(3, 'Sara', 'Copa', 'Flores', 'sara@gmail.com', '2468', 'activo', '8377943', 'sara.jpg', 'sara@gmail.com', '64104061', '2023-04-02', ''),
(4, 'Kamil', 'Chavez', 'Mendoza', 'kchavezm@fcpn.edu.bo', '123456', 'activo', '6106548', 'k.jpg', 'kchavezm@fcpn.edu.bo', '68090089', '2023-04-23', ''),
(5, 'DIEGO JIMMY ', 'CONDORI', 'MONTES', 'dcondorim@fcpn.edu.bo', '13579', 'caducado session', '8844965', 'diego.jpg', 'dcondorim@fcpn.edu.bo', '67318226', '2023-04-23', ''),
(6, 'Waldo', 'Caballero', 'Toledo', 'toledo@umsa.bo', '123456', 'activo', '6666666', 'toledo.jpg', 'toledo@umsa.bo', '71264934', '2023-04-23', '123456'),
(7, 'vivian', 'Tito', 'Quispe', '', NULL, NULL, '15087633', NULL, NULL, NULL, '2023-04-26', NULL),
(8, 'MARCO ANTONIO', 'LAZARTE ', 'HURTADO', 'marcolazarteurtado@gmail.com', '123456', NULL, '1234561', 'marcolazarte.jpg', 'marcolazartehurtado@gmail.com', '1234561', '2023-04-30', '1234561'),
(9, 'WILLIAM DAVID', ' RIVAS ', 'TAPIA', 'william@gmail.com', NULL, NULL, '1234562', 'williamdavid.png', 'william@gmail.com', '1234562', '2023-04-30', '1234562'),
(10, 'JAVIER ZENOBIO ', 'CALDERON ', 'GUERRA', 'calderon@gmail.com', NULL, NULL, '1234563', 'calderon.png', NULL, NULL, NULL, NULL),
(11, 'WALTER LEÓN ', 'CALVIMONTES ', 'DELGADILLO', 'calvimontes@gmail.com', NULL, NULL, '', 'walter.png', NULL, NULL, NULL, NULL),
(12, 'DORIS CINTHYA ', 'CONDE ', 'ORDOÑEZ', 'conde@gmail.com', NULL, NULL, '', 'doris.jpg', NULL, NULL, NULL, NULL),
(13, 'RIMORT EDSON ', 'CHAVEZ ', 'ARAUJO', 'cavez@gmail.com', NULL, NULL, '', 'rimort.png', NULL, NULL, NULL, NULL),
(14, 'LUCIO ', 'COPA ', 'JUANIQUINA', 'copa@gmail.com', NULL, NULL, '', 'lucio.jpg', NULL, NULL, NULL, NULL),
(15, ' JOSÉ LUIS ', 'MURILLO ', 'PACHECO', 'murillo@gmail.com', NULL, NULL, '', 'jose.png', NULL, NULL, NULL, NULL),
(16, ' LUIS DIEGO', ' MARIACA ', 'COLLAZOS', 'mariaca@gmail.com', NULL, NULL, '', 'mariaca.png', NULL, NULL, NULL, NULL),
(17, 'ZENOBIO FERNANDO ', 'QUEZADA ', 'MANZANEDA', 'quezada@gmail.com', NULL, NULL, '', 'fernando.png', NULL, NULL, NULL, NULL),
(18, 'OSCAR ', 'MAMANI ', 'CHUQUIMIA', 'mamani@gmail.com', NULL, NULL, '', 'oscar.png', NULL, NULL, NULL, NULL),
(19, 'VICTOR SANTOS ', 'SAAVEDRA ', 'CONTRERAS', 'saavedra@gmail.com', NULL, NULL, '', 'victor.png', NULL, NULL, NULL, NULL),
(20, ' IVER FERNANDO ', 'AJATA ', 'VALERIANO', 'ajata@gmail.com', NULL, NULL, '12345678', 'iver.png', NULL, NULL, NULL, NULL),
(21, ' EVELYN GLORIA ', 'MOLINA ', 'PEÑARRIETA', 'molina@gmail.com', NULL, NULL, '', 'molina.png', NULL, NULL, NULL, NULL),
(22, 'Luis David', 'Tomicha', 'Villarroel', 'ltomichav@fcpn.edu.bo', '13579', 'activo', '12636278', 'david.jpg', 'ltomichav@fcpn.edu.bo', '63559081', '2023-05-02', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`id_ambiente`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD UNIQUE KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `casual`
--
ALTER TABLE `casual`
  ADD PRIMARY KEY (`id_casual`),
  ADD UNIQUE KEY `id_reserva` (`id_reserva`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`id_certificado`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD UNIQUE KEY `id_participante` (`id_participante`),
  ADD UNIQUE KEY `id_evento` (`id_evento`);

--
-- Indices de la tabla `control`
--
ALTER TABLE `control`
  ADD PRIMARY KEY (`id_control`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `equipamiento`
--
ALTER TABLE `equipamiento`
  ADD PRIMARY KEY (`id_equipamiento`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `id_ambiente` (`id_ambiente`);

--
-- Indices de la tabla `expositor`
--
ALTER TABLE `expositor`
  ADD PRIMARY KEY (`id_expositor`),
  ADD KEY `id_repositorio` (`id_repositorio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  ADD PRIMARY KEY (`id_infraestructura`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id_logs`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_repostirorio` (`id_repositorio`);

--
-- Indices de la tabla `participante`
--
ALTER TABLE `participante`
  ADD PRIMARY KEY (`id_participante`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_evento` (`id_evento`) USING BTREE;

--
-- Indices de la tabla `repositorio`
--
ALTER TABLE `repositorio`
  ADD PRIMARY KEY (`id_repositorio`);

--
-- Indices de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  ADD PRIMARY KEY (`id_tipoevento`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `id_ambiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casual`
--
ALTER TABLE `casual`
  MODIFY `id_casual` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `certificado`
--
ALTER TABLE `certificado`
  MODIFY `id_certificado` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `control`
--
ALTER TABLE `control`
  MODIFY `id_control` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `equipamiento`
--
ALTER TABLE `equipamiento`
  MODIFY `id_equipamiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `id_evento` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `expositor`
--
ALTER TABLE `expositor`
  MODIFY `id_expositor` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `infraestructura`
--
ALTER TABLE `infraestructura`
  MODIFY `id_infraestructura` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `participante`
--
ALTER TABLE `participante`
  MODIFY `id_participante` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  MODIFY `id_tipoevento` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `casual`
--
ALTER TABLE `casual`
  ADD CONSTRAINT `casual_ibfk_1` FOREIGN KEY (`id_reserva`) REFERENCES `reserva_inscripcion` (`id_reserva`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `casual_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_participante`) REFERENCES `participante` (`id_participante`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `control`
--
ALTER TABLE `control`
  ADD CONSTRAINT `control_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`id_ambiente`) REFERENCES `ambiente` (`id_ambiente`);

--
-- Filtros para la tabla `expositor`
--
ALTER TABLE `expositor`
  ADD CONSTRAINT `expositor_ibfk_1` FOREIGN KEY (`id_repositorio`) REFERENCES `repositorio` (`id_repositorio`),
  ADD CONSTRAINT `expositor_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`id_repositorio`) REFERENCES `repositorio` (`id_repositorio`);

--
-- Filtros para la tabla `participante`
--
ALTER TABLE `participante`
  ADD CONSTRAINT `participante_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `participante_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  ADD CONSTRAINT `tipo_evento_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;