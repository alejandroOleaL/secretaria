-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2020 a las 03:16:43
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_secretaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE IF NOT EXISTS `areas` (
  `id_area` int(11) NOT NULL,
  `nombre_area` varchar(200) NOT NULL,
  `personal_area` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `nombre_area`, `personal_area`) VALUES
(11, 'Secretaría de Contraloría y Transparencia Gubernamental', 'Lic. Mario Ramos del Carmen'),
(12, 'Unidad de Género', 'Lic. Karla Silvia Rodriguez Ramírez'),
(13, 'Delegación Administrativa', 'C.P. María del Rocío Nogueda Ulloa'),
(14, 'Unidad de Transparencia', 'Ing. Flora Avíla Adame'),
(15, 'Unidad de Informática', 'T.S. Santiago Aguilar Martínez'),
(16, 'Subsecretaría de Modernización Administrativa', ''),
(17, 'Subsecretaría de Auditoría', 'Lic. Arturo Latabán López'),
(18, 'Subsecretaría de Normatividad Jurídica', 'Lic. Efraín Ramos Ramírez'),
(19, 'Dirección General de Gestión Administrativa', ''),
(20, 'Dirección General de Transparencia', 'Lic. Mirna Ayala Acevedo'),
(21, 'Dirección General de Contraloría Social', 'Lic. Javier Galeana Cadena'),
(22, 'Dirección General de Fiscalización y Evaluación de Obra Pública', ''),
(23, 'Dirección General de Comisarios Públicos', 'Lic. Alberto Zuñiga Escamilla'),
(24, 'Dirección General de Control Gubernamental', 'L.C Lorenzo Rogelio Mastache Velasco'),
(25, 'Dirección General Jurídica', 'Lic. Arturo Cecilio Deloya Fonseca'),
(26, 'Dirección de Evaluación de la Gestión', 'Lic. Miguel Angel Mercado Durán'),
(27, 'Dirección de Desarrollo Administrativo y Mejora Continua', 'Lic. Manuel'),
(28, 'Dirección de Acceso a la Información Pública', 'Lic. Kenia F. Serna Moreno'),
(29, 'Dirección de Transparencia de la Gestión Pública', 'I.S.C Coral Almodovar'),
(30, 'Dirección de Fiscalización de Obra', 'Arq. Miguel Angel Sanchez Núñez'),
(31, 'Dirección de Fiscalización Financiera y Administrativa', 'L.C. Moises Vergara Cruz'),
(32, 'Dirección de Auditoría', 'C.P. Fernando Rivera Mendez'),
(33, 'Dirección de Auditoría de Nómina', 'Lic. Roberto Abundez Moreno'),
(34, 'Dirección Jurídica Contenciosa', 'Lic. Cipriano Ortega Sotero'),
(35, 'Dirección de Responsabilidades y Sanciones', 'Lic. Carlos Gómez Zagal'),
(36, 'Dirección de Control Jurídico-Administrativo', 'Lic. Anahí Bueno Díaz'),
(37, 'Dirección de Legislación y Consulta', 'Lic. Servando Jesús Galeana Serna'),
(38, 'Subdirección de Solventaciones de Obra', ''),
(39, 'Departamento de Auditorías Administrativas', 'Lic. Pablo Solís Solís'),
(40, 'Departamento de Mejora y Eficiencia Institucional', 'Lic. Linda Xochitl Vega'),
(41, 'Departamento de Desarrollo Organizacional', 'Lic. Susana Castillo'),
(42, 'Departamento de Normas y Mejora Regulatoría', 'Lic. Silverio'),
(43, 'Departamento de Simplificación Administrativa', ' Lic. Elizabeth'),
(44, 'Departamento de Organización Normativa y Cultura Jurídica', 'L.C. Merced del Carmen Estrada'),
(45, 'Departamento de Información y Estadística', 'C. David Alberto'),
(46, 'Departamento de Información Evaluación y Enlace Institucional', 'Lic. Jesús Hernández Alonso'),
(47, 'Departamento de Sistemas de Información Pública', 'Lic. Miguel Angel'),
(48, 'Departamento de Regulación y Control de Datos', 'L.R.P Y M.'),
(49, 'Departamento de Fomento a la Cultura de Transparencia y Combate a la Corrupción', 'Lic. Carlos Alberto'),
(50, 'Departamento de Seguimiento a las Politícas y Acciones Anticorrupción', 'Lic. Monica del Rocío Téllez Radilla'),
(51, 'Departamento de Vinculación con Municipios', 'Lic. Rosaura Ramos'),
(52, 'Departamento de Seguimiento Evaluación y Difusión', 'C.P Juan José'),
(53, 'Departamento de Pruebas de Control de Calidad de Obra', 'Ing. Constantino Catalán García'),
(54, 'Departamento de Seguimiento de Auditoría', 'Ing. Jesús Omar Mendoza Ramírez'),
(55, 'Departamento de Análisis y Evaluación de la Información Financiera de Entidades Paraestatales', 'C. Gerardo Parra'),
(56, 'Departamento de Entrega-Recepción', 'Lic. Ramón Aguilar'),
(57, 'Departamento de Auditorías Sector Central', 'Lic. Juliette Isamar'),
(58, 'Departamento de Auditorías Sector Paraestatales', 'C.P. Roberto'),
(59, 'Departamento de Auditoría Informática', 'Lic. Tania Guadalupe Guzmán'),
(60, 'Departamento de Auditoría de Nómina Sector Central', 'L.A Jacqueline'),
(61, 'Departamento de Auditoría de Nómina Sector Paraestatales', 'L.C. Alejandra'),
(62, 'Departamento de Auditoría de Nómina Magisterio', 'Lic. Guillermo'),
(63, 'Departamento de Solventaciones Financieras y Administrativas', 'C.P. José Arturo'),
(64, 'Departamento de Emisión de Resoluciones', 'Lic. Carlos Gutiérrez'),
(65, 'Departamento de Procedimientos Resoluciones', 'Lic. Carlos Gutiérrez'),
(66, 'Departamento de Procedimientos Administrativos', ''),
(67, 'Departamento de Control y Verificación de Licitaciones Públicas', 'Lic. Jesús Eliseo Sánchez Rodríguez'),
(68, 'Departamento de Responsabilidades y Situación Patrimonial', 'Lic. Arely Ascencio'),
(69, 'Departamento de Seguimiento de Quejas y Denuncias', 'Lic. Erick Hazael'),
(70, 'Comisaríos Públicos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizo_personal`
--

CREATE TABLE IF NOT EXISTS `autorizo_personal` (
  `id_autorizo` int(11) NOT NULL,
  `personal` varchar(250) NOT NULL,
  `puesto` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `bajas`
--

CREATE TABLE IF NOT EXISTS `bajas` (
  `id_baja` int(11) NOT NULL,
  `num_folio` varchar(250) NOT NULL,
  `fecha_factura` varchar(250) NOT NULL,
  `valor_adq` varchar(250) NOT NULL,
  `justificacion` mediumtext NOT NULL,
  `observaciones` varchar(250) NOT NULL,
  `id_autorizo` int(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE IF NOT EXISTS `cargos` (
  `Id_cargo` int(11) NOT NULL,
  `cargo` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`cargo`) VALUES
('');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `id_equipo` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `caracteristicas` varchar(250) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(250) NOT NULL,
  `serie` varchar(150) NOT NULL,
  `color` varchar(50) NOT NULL,
  `estado_fisico` varchar(50) NOT NULL,
  `observaciones` varchar(250) NOT NULL,
  `id_baja` int(11) NOT NULL,
  `estado_baja` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id_personal` int(11) NOT NULL,
  `nom_completo` varchar(250) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `ape_paterno` varchar(250) NOT NULL,
  `ape_materno` varchar(250) NOT NULL,
  `categoria` varchar(150) NOT NULL,
  `num_empleado` varchar(200) DEFAULT '',
  `domicilio` varchar(250) NOT NULL,
  `id_cargo` int(20) NOT NULL,
  `id_ubicacion` int(20) NOT NULL,
  `id_area` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`nom_completo`, `nombre`, `ape_paterno`, `ape_materno`, `categoria`, `num_empleado`, `domicilio`, `id_cargo`, `id_ubicacion`, `id_area`) VALUES
('', '', '', '', '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resguardos`
--

CREATE TABLE IF NOT EXISTS `resguardos` (
  `id_resguardo` int(11) NOT NULL,
  `clave_inventarial` varchar(250) NOT NULL,
  `ejercicio` varchar(20) NOT NULL,
  `num_factura` varchar(250) NOT NULL,
  `estado` int(10) NOT NULL,
  `costo_unitario` double NOT NULL,
  `iva` double NOT NULL,
  `costo_total` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `resguardos_equipos`
--

CREATE TABLE IF NOT EXISTS `resguardos_equipos` (
  `id_resguardo` int(20) NOT NULL,
  `id_equipo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `resguardos_personal`
--

CREATE TABLE IF NOT EXISTS `resguardos_personal` (
  `id_resguardo` int(20) NOT NULL,
  `id_personal` int(20) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `resguardo_autorizo`
--

CREATE TABLE IF NOT EXISTS `resguardo_autorizo` (
  `id_resguardo` int(11) NOT NULL,
  `id_autorizo` int(11) NOT NULL,
  `fecha_asig` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `ubicaciones`
--

CREATE TABLE IF NOT EXISTS `ubicaciones` (
  `id_ubicacion` int(11) NOT NULL,
  `ubicacion` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubicaciones`
--

INSERT INTO `ubicaciones` (`id_ubicacion`, `ubicacion`) VALUES
(3, 'BODEGA ALTERNA'),
(4, 'CASA ALTERNA'),
(5, 'EDIFICIO NORTE'),
(6, 'PREDIO LA CINCA'),
(7, 'TIERRA CALIENTE');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `autorizo_personal`
--
ALTER TABLE `autorizo_personal`
  ADD PRIMARY KEY (`id_autorizo`);

--
-- Indices de la tabla `bajas`
--
ALTER TABLE `bajas`
  ADD PRIMARY KEY (`id_baja`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`Id_cargo`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_ubicacion` (`id_ubicacion`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `resguardos`
--
ALTER TABLE `resguardos`
  ADD PRIMARY KEY (`id_resguardo`);

--
-- Indices de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  ADD PRIMARY KEY (`id_ubicacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT de la tabla `ubicaciones`
--
ALTER TABLE `ubicaciones`
  MODIFY `id_ubicacion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
