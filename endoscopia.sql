-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2023 a las 20:48:25
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
-- Base de datos: `endoscopia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `procedimiento` varchar(100) NOT NULL,
  `prioridad` varchar(20) NOT NULL,
  `medico_endo` varchar(50) NOT NULL,
  `estatus_solicitud` varchar(20) NOT NULL,
  `fecha_programada` date NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`procedimiento`, `prioridad`, `medico_endo`, `estatus_solicitud`, `fecha_programada`, `id_paciente`) VALUES
('Cápsula Endoscópica', 'Alta', 'Medicina interna', 'Programada', '2023-12-31', 1),
('0', '0', '0', '0', '0000-00-00', 2),
('0', '0', '0', '0', '0000-00-00', 3),
('Cápsula Endoscópica', 'Alta', 'Medicina interna', 'Programada', '2023-12-31', 4),
('Cápsula Endoscópica', 'Alta', 'Medicina interna', 'Programada', '2023-12-31', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hospitalizacion`
--

CREATE TABLE `hospitalizacion` (
  `diagnostico` varchar(100) NOT NULL,
  `cama` int(11) NOT NULL,
  `dias_eih` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hospitalizacion`
--

INSERT INTO `hospitalizacion` (`diagnostico`, `cama`, `dias_eih`, `id_paciente`) VALUES
('Angioectasia Vascular', 1, 1, 1),
('0', 0, 0, 2),
('0', 0, 0, 3),
('Angioectasia Vascular', 1, 1, 4),
('Tumor De Colon', 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorio`
--

CREATE TABLE `laboratorio` (
  `hb` int(11) NOT NULL,
  `hcto` int(11) NOT NULL,
  `plaquetas` int(11) NOT NULL,
  `inr` int(11) NOT NULL,
  `cultivo` varchar(5) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `laboratorio`
--

INSERT INTO `laboratorio` (`hb`, `hcto`, `plaquetas`, `inr`, `cultivo`, `id_paciente`) VALUES
(1, 1, 1, 1, 'Si', 1),
(0, 0, 0, 0, '0', 2),
(0, 0, 0, 0, '0', 3),
(1, 1, 1, 1, 'Si', 4),
(1, 1, 1, 1, 'Si', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `Pinza_Biopsia` tinyint(1) NOT NULL,
  `Kit_Ligadura_microtech` tinyint(1) NOT NULL,
  `Aguja_Escleroterapia` tinyint(1) NOT NULL,
  `Argon_Plasma` tinyint(1) NOT NULL,
  `Sonda_FiAPC` tinyint(1) NOT NULL,
  `Protesis_Esofagica_Wallflex` tinyint(1) NOT NULL,
  `Sistema_Ovesco` tinyint(1) NOT NULL,
  `Guia_Hidrofilica` tinyint(1) NOT NULL,
  `Kit_Gastrotomia_Endoscopica_Pull` tinyint(1) NOT NULL,
  `Hemoclips` tinyint(1) NOT NULL,
  `Ovesco` tinyint(1) NOT NULL,
  `Kit_Ligadura` tinyint(1) NOT NULL,
  `Sonda_de_Gastrotomia` tinyint(1) NOT NULL,
  `Asa_de_Polipectomia` tinyint(1) NOT NULL,
  `Balon_Cre` tinyint(1) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materiales`
--

INSERT INTO `materiales` (`Pinza_Biopsia`, `Kit_Ligadura_microtech`, `Aguja_Escleroterapia`, `Argon_Plasma`, `Sonda_FiAPC`, `Protesis_Esofagica_Wallflex`, `Sistema_Ovesco`, `Guia_Hidrofilica`, `Kit_Gastrotomia_Endoscopica_Pull`, `Hemoclips`, `Ovesco`, `Kit_Ligadura`, `Sonda_de_Gastrotomia`, `Asa_de_Polipectomia`, `Balon_Cre`, `id_paciente`) VALUES
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1),
(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2),
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 3),
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 4),
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `nombre_paciente` varchar(50) DEFAULT NULL,
  `curp` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `fecha_registro`, `nombre_paciente`, `curp`, `fecha_nacimiento`, `edad`, `sexo`) VALUES
(1, '2023-09-25', 'e', '2002-05-14', '0000-00-00', 21, 'Hombre'),
(2, '2023-09-25', 'e', '2003-05-14', '0000-00-00', 20, 'Hombre'),
(3, '2023-09-25', 'e', '2004-05-14', '0000-00-00', 19, 'Hombre'),
(4, '2023-09-25', 'ejemplo', '1996-11-20', '0000-00-00', 26, 'Hombre'),
(5, '2023-09-25', 'ejemplo', 'FACS020411MDFLMLA1', '2002-04-11', 21, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento`
--

CREATE TABLE `seguimiento` (
  `fecha_pre_programada` date NOT NULL,
  `fecha_estudio` date NOT NULL,
  `defuncion` varchar(7) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seguimiento`
--

INSERT INTO `seguimiento` (`fecha_pre_programada`, `fecha_estudio`, `defuncion`, `id_paciente`) VALUES
('2023-09-25', '2023-09-25', 'Si', 1),
('0000-00-00', '0000-00-00', '0', 2),
('0000-00-00', '0000-00-00', '0', 3),
('2023-09-25', '2023-09-25', 'Si', 4),
('2023-09-25', '2023-09-25', 'Si', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD KEY `id_paciente` (`id_paciente`) USING BTREE;

--
-- Indices de la tabla `hospitalizacion`
--
ALTER TABLE `hospitalizacion`
  ADD KEY `id_paciente` (`id_paciente`) USING BTREE;

--
-- Indices de la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD KEY `id_paciente` (`id_paciente`) USING BTREE;

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `curp` (`curp`);

--
-- Indices de la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD KEY `id_paciente` (`id_paciente`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD CONSTRAINT `id_pacient` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `hospitalizacion`
--
ALTER TABLE `hospitalizacion`
  ADD CONSTRAINT `id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `laboratorio`
--
ALTER TABLE `laboratorio`
  ADD CONSTRAINT `id_pacientes` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `seguimiento`
--
ALTER TABLE `seguimiento`
  ADD CONSTRAINT `id_pacien` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
