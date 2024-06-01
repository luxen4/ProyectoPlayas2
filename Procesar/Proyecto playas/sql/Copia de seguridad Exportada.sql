-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: fdb30.awardspace.net
-- Tiempo de generación: 22-09-2021 a las 16:23:12
-- Versión del servidor: 5.7.20-log
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `3714088_proyectoplayas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AGENCIABUSES`
--

CREATE TABLE `AGENCIABUSES` (
  `cod_AgenciaBuses` int(11) NOT NULL,
  `fecha_incripcion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(30) NOT NULL,
  `nif` varchar(10) NOT NULL,
  `direccion` varchar(70) NOT NULL,
  `cp` varchar(6) NOT NULL,
  `localidad` varchar(20) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `comunidad` varchar(20) NOT NULL,
  `pais` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '-NO TIENE-',
  `telefono_Reserva` varchar(15) NOT NULL,
  `telefono_Agencia` varchar(15) NOT NULL,
  `horario_Agencia` varchar(80) NOT NULL DEFAULT '10:00 a 13:00 y 17:00 a 20:00',
  `pago_Online` varchar(15) NOT NULL,
  `numero_Cuenta` varchar(64) NOT NULL,
  `username` varchar(20) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `roll` varchar(70) NOT NULL DEFAULT 'agenciabuses'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AGENCIABUSES`
--

INSERT INTO `AGENCIABUSES` (`cod_AgenciaBuses`, `fecha_incripcion`, `nombre`, `nif`, `direccion`, `cp`, `localidad`, `provincia`, `comunidad`, `pais`, `email`, `telefono_Reserva`, `telefono_Agencia`, `horario_Agencia`, `pago_Online`, `numero_Cuenta`, `username`, `contrasena`, `roll`) VALUES
(1, '2021-09-14 22:08:32', 'Yanguas', 'A48265169', 'C/ Marques de Covarrubias 5', '26003', 'Alberite', 'La Rioja', 'La Rioja', 'España', 'yanguas@yanguas.com', '637117965', '941-20-20-20', '10:15:00 a 13:30:00 y 17:30:00 a 20:30:00', 'SI', 'ES650123456789', 'yanguas21', '$2y$10$91YosuvjXJim4.6eZcQccehkPJVKVNKjLbiJ9SJaGBoyUrThGNGDW', 'agenciabuses'),
(2, '2021-09-14 22:08:32', 'Autobuses Riojacar', 'A234567891', 'Calle la Nevera, 12', '26006', 'Logroño', 'La Rioja', 'La Rioja', 'España', 'riojacar@riojacar.com', '941 50 02 00', '941 50 02 00', '10:00:00 a 13:00:00 y 17:00:00 a 20:00:00', 'SI', 'ES65123456789', 'riojacar21', '$2y$10$FyUtPdH/FpUDdtmEfg697emLusRh8l9wdRmdc9uEbYDd1aKbUazVi', 'agenciabuses'),
(3, '2021-09-14 22:08:32', 'Victor Bayo', 'B40156598', 'C/ Mayor, nº 10', '40551', 'Campo de San Pedro', 'Segovia', 'Castilla y León', 'España', 'victorbayo@victorbayo.com', '921 55 60 35', '921 55 63 36', ' 10:00 a 13:00 ; 17:00 a 19:00', 'SI', 'ES65412569863', 'victorbayo21', '$2y$10$WzAOf40fn03oxdAJ8cjUpuYWMo7zFgJfR.1Fm4j4ZMzlraNgeXZAG', 'agenciabuses'),
(4, '2021-09-14 22:08:32', 'Autobuses Jimenez', 'A48265190', 'C/ Santa María 8', '26006', 'Logroño', 'La Rioja', 'La Rioja', 'España', 'jimenez@jimenez.com', '941 20 27 77', '941 20 27 77', '10:00:00 a 13:00:00 y 17:00:00 a 20:00:00', 'SI', 'ES65234567890', 'jimenez21', '$2y$10$YEqrNDwx800/PG7gxhS2iOtcNgwtE09c2B1Mxn4aJg60bBJuAkfuS', 'agenciabuses'),
(5, '2021-09-14 22:08:32', 'Logrobus', 'A00125478', 'Calle Rodejón, 24', '26006', 'Logroño', 'La Rioja', 'La Rioja', 'España', 'logrobus@logrobus.com', '609411262', ' 941 26 33 51', '10:00 a 13:00 y 17:00 a 20:00', 'SI', 'ES65547896258', 'logrobus21', '$2y$10$3mPHpqDtmAvs3mvZaWmgxuVna4yM9LTKKZXcXFuN8TbVGwvnaALsy', 'agenciabuses');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AGENCIAVIAJES`
--

CREATE TABLE `AGENCIAVIAJES` (
  `cod_AgenciaViajes` int(11) NOT NULL,
  `fecha_Inscripcion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(90) NOT NULL,
  `nif` varchar(100) NOT NULL,
  `direcion` varchar(70) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `localidad` varchar(40) NOT NULL,
  `provincia` varchar(20) NOT NULL,
  `comunidad` varchar(20) NOT NULL,
  `pais` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL DEFAULT '-NO TIENE-',
  `telefono_Reserva` varchar(15) NOT NULL DEFAULT 'NO',
  `telefono_Agencia` varchar(15) NOT NULL DEFAULT 'NO',
  `horario_Agencia` varchar(80) NOT NULL DEFAULT '10:00 a 13:00 y 17:00 a 20:00',
  `lugar_SalidaPredeterminado` varchar(100) NOT NULL DEFAULT 'Estación de autobuses (Logroño)',
  `cod_CompaniaBusHabitual` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `pago_Online` varchar(15) NOT NULL DEFAULT 'NO',
  `num_CuentaPagosOnline` varchar(35) DEFAULT NULL,
  `roll` varchar(70) NOT NULL DEFAULT 'agenciaviajes'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AGENCIAVIAJES`
--

INSERT INTO `AGENCIAVIAJES` (`cod_AgenciaViajes`, `fecha_Inscripcion`, `nombre`, `nif`, `direcion`, `cp`, `localidad`, `provincia`, `comunidad`, `pais`, `email`, `telefono_Reserva`, `telefono_Agencia`, `horario_Agencia`, `lugar_SalidaPredeterminado`, `cod_CompaniaBusHabitual`, `username`, `contrasena`, `pago_Online`, `num_CuentaPagosOnline`, `roll`) VALUES
(1, '2021-09-14 17:27:40', 'Gran Reserva', 'A48265169', 'C/ Vara de Rey 42', '26003', 'Logroño', 'La Rioja', 'La Rioja', 'España', 'yanguas@yanguas.com', '602263181', '602263181', '09:30:00 a 13:00:00 y 17:15:00 a 19:45:00', 'Estación de autobuses (Logroño)', 1, 'reser21', '$2y$10$T.k.0Xfk3If3FPDJZnlKl.D6ByRd2..N4X2tHgKO.kYNa2iModk1O', 'SI', 'ES650123456789', 'agenciaviajes'),
(2, '2021-09-14 17:27:40', 'GO TRAVELL', 'B26562918', 'C/ Avenida de la Solidaridad 9', '26003', 'Logroño', 'La Rioja', 'La Rioja', 'España', 'gotravell@gotravell.com', '653107390', '643674634', '10:00 a 13:00 y 17:00 a 20:00', 'C/ Avenida de la Solidaridad 9', 2, 'gotravell21', '$2y$10$rwK1HGaQotvT0dkt9G3Fhu/4.55cZ2WEOxY.UP1VwCT/7RWnjpNkC', 'SI', 'ES65987654321', 'agenciaviajes'),
(3, '2021-09-14 17:27:40', 'ROTUPRINT', 'R2600077H', 'Padre Claret, 1 bajo', '26004', 'Logroño', 'La Rioja', 'La Rioja', 'España', 'rotuprint@rotuprintrioja.com.', '941235217', '941235217', '10:15:00 a 13:15:00 y 17:00:00 a 20:00:00', 'Varias Paradas', 3, 'rotu21', '$2y$10$eO.U2FPgNtbGBgnRvvvsY.tpFGDoXCOmxZJXBAp0gAG5EqlsiDsbq', 'SI', 'ES65987654321', 'agenciaviajes'),
(4, '2021-09-14 17:27:40', 'Azul Marino', 'B95860615', 'C/Gran Vía, 45 entrada por, Calle Lardero', '26002', 'Logroño', 'La Rioja', 'La Rioja', 'España', 'azulmarino@azulmarino.com', '941 899 200', '941 899 200', '10:00 a 13:00 y 17:00 a 20:00', 'Estación de autobuses (Logroño)', 4, 'azulmarino21', '$2y$10$B.aNV5BQo8K7BwtQLs0lXuzLbjrmLkQ6j6A/rzSXTCHmi1YjQ373q', 'NO', 'NO', 'agenciaviajes'),
(5, '2021-09-14 17:27:40', 'Zafiro Tours', 'A03357340', 'Cl. Río Miño, nº 1', '26140', 'Lardero', 'La Rioja', 'La Rioja', 'España', 'saltoangel@zafirotours.es', '941 21 65 12', '941 21 65 12', 'Iglesia de Lardero', 'Estación de autobuses (Logroño)', 4, 'zafiro21', '$2y$10$99PP47nOJr.RFed4ZO5NIepk5rpKYQTupLdAzYFguUWYBE43/oNxC', 'SI', 'ES65987654321', 'agenciaviajes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AGENCIAVIAJESCLIENTE`
--

CREATE TABLE `AGENCIAVIAJESCLIENTE` (
  `cod_AgenciaViajesCliente` int(11) NOT NULL,
  `cod_AgenciaViajes` int(11) NOT NULL,
  `cod_Cliente` int(11) NOT NULL,
  `fecha_Inscripcion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `AGENCIAVIAJESCLIENTE`
--

INSERT INTO `AGENCIAVIAJESCLIENTE` (`cod_AgenciaViajesCliente`, `cod_AgenciaViajes`, `cod_Cliente`, `fecha_Inscripcion`) VALUES
(8, 2, 6, '2021-09-07 22:57:23'),
(6, 2, 5, '2021-09-07 08:56:35'),
(7, 3, 5, '2021-09-07 09:19:15'),
(5, 1, 5, '2021-09-07 08:51:27'),
(9, 3, 6, '2021-09-07 22:57:23'),
(10, 4, 2, '2021-09-09 19:46:39'),
(11, 5, 2, '2021-09-12 07:00:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `AGENCIAVIAJESDESTINO`
--

CREATE TABLE `AGENCIAVIAJESDESTINO` (
  `cod_AgenciaViajesDestino` int(11) NOT NULL,
  `cod_AgenciaViajes` int(11) NOT NULL,
  `cod_Destino` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BUS`
--

CREATE TABLE `BUS` (
  `cod_Bus` int(11) NOT NULL,
  `tipo_Bus` enum('Grande','Mediano','Pequeño','Minibus') NOT NULL DEFAULT 'Grande',
  `plazas` smallint(6) NOT NULL,
  `matricula` varchar(15) NOT NULL,
  `ano_Matriculacion` int(11) NOT NULL,
  `cod_AgenciaBuses` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `BUS`
--

INSERT INTO `BUS` (`cod_Bus`, `tipo_Bus`, `plazas`, `matricula`, `ano_Matriculacion`, `cod_AgenciaBuses`) VALUES
(1, 'Grande', 54, '0001 ABC', 2001, 1),
(5, 'Grande', 54, '0005 ABC', 2005, 2),
(6, 'Mediano', 35, '0006 ABC', 2006, 2),
(7, 'Pequeño', 25, '0007 ABC', 2006, 4),
(8, 'Minibus', 19, '0008 ABC', 2006, 2),
(9, 'Grande', 54, '0013 ABC', 2008, 3),
(10, 'Mediano', 35, '0014 ABC', 2007, 3),
(11, 'Pequeño', 25, '0015 ABC', 2010, 3),
(12, 'Minibus', 19, '0016 ABC', 2015, 3),
(13, 'Grande', 54, '0009 ABC', 2005, 4),
(14, 'Mediano', 35, '0010 ABC', 2006, 4),
(15, 'Pequeño', 25, '0011 ABC', 2006, 4),
(16, 'Minibus', 19, '0012 ABC', 2008, 4),
(17, 'Grande', 54, '0017 ABC', 2007, 5),
(18, 'Mediano', 35, '0018 ABC', 2009, 5),
(19, 'Pequeño', 25, '0019 ABC', 2012, 5),
(20, 'Minibus', 19, '0020 ABC', 2004, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLIENTE`
--

CREATE TABLE `CLIENTE` (
  `cod_Cliente` int(11) NOT NULL,
  `fecha_inscripcion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nif` varchar(15) NOT NULL,
  `TlfnoParticular` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fNacimiento` date NOT NULL,
  `sexo` varchar(7) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `localidad` varchar(50) NOT NULL,
  `provincia` varchar(15) NOT NULL,
  `comunidad` varchar(15) NOT NULL,
  `pais` varchar(10) NOT NULL,
  `contrasena` varchar(70) NOT NULL,
  `roll` varchar(70) NOT NULL DEFAULT 'cliente'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `CLIENTE`
--

INSERT INTO `CLIENTE` (`cod_Cliente`, `fecha_inscripcion`, `username`, `nombre`, `apellidos`, `nif`, `TlfnoParticular`, `email`, `fNacimiento`, `sexo`, `calle`, `cp`, `localidad`, `provincia`, `comunidad`, `pais`, `contrasena`, `roll`) VALUES
(1, '2021-09-09 07:38:17', 'adri82', 'Adrián', 'Laya García', '16606852R', '637117965', 'superlaya50@gmail.com', '1982-06-17', 'H', 'Obispo Blanco Nájera 7, 5ºA', '26004', 'Logroño', 'La Rioja', 'La Rioja', 'España', '$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m', 'admin'),
(2, '2021-09-09 07:38:17', 'edu82', 'Eduardo', 'Hormilla Urraca', '00000000A', '637117965', 'medico50@medico.com', '1982-01-01', 'H', 'Obispo Blanco Nájera 7, 3ºD', '26004', 'Logroño', 'La Rioja', 'La Rioja', 'España', '$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m', 'cliente'),
(3, '2021-09-09 07:38:17', 'dayanna82', 'Dayanna', 'Syrbley Carrero', '01234567R', '123456789', 'dayanna50@dayanna50.com', '2021-07-19', 'H', 'C/ Venezuela 8 5ºA', '44003', 'Navarrete', 'La Rioja', 'La Rioja', 'España', '$2y$10$OF92TCIRXBH1giDrajCFou.muTfFstu7GA/qxVfxvi1RF.aWGq4ma', 'cliente'),
(4, '2021-09-09 07:38:17', 'biri82', 'Diego', 'Birigay', '01234567R', '123456789', 'biri21@biri21.com', '2000-01-01', 'H', 'C/ Madre de dios 8 5ºA', '26003', 'Logroño', 'La Rioja', 'La Rioja', 'España', '$2y$10$S7yWJPYZ0JviOB/NJaQW9.whGVigbK/yZn3DKFE27vDLBFSZEhw2m', 'cliente'),
(5, '2021-09-15 21:18:40', 'fsdsdfs', 'Dasdasd', 'Asadasd Aasdasd', 'sdfsdf', 'sdfsdf', 'sdfsdfsd', '2021-10-06', 'H', 'sdfsdf', 'sdfsd', ' sdfsdfssdf    ', 'sdfsdf', 'sdfsdf', 'sdfsdfsd', '$2y$10$oaGBDu.Bd1niRZhEIVUlJeIl5a/4rw1rFJTKeOe05ahEGp7r5Q0JC', 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DESTINO`
--

CREATE TABLE `DESTINO` (
  `cod_Destino` int(11) NOT NULL,
  `nombre_Lugar` varchar(50) NOT NULL,
  `prov_Depart` varchar(50) NOT NULL,
  `com_Reg` varchar(50) NOT NULL,
  `pais` enum('España','Francia','Portugal') NOT NULL DEFAULT 'España',
  `dia_Semana` varchar(15) NOT NULL,
  `fecha_Viaje` varchar(15) NOT NULL,
  `cod_AgenciaOferta` int(11) NOT NULL,
  `kilometrosIdaVuelta` int(11) NOT NULL,
  `euros` decimal(19,4) DEFAULT '12.0000',
  `cod_Bus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `DESTINO`
--

INSERT INTO `DESTINO` (`cod_Destino`, `nombre_Lugar`, `prov_Depart`, `com_Reg`, `pais`, `dia_Semana`, `fecha_Viaje`, `cod_AgenciaOferta`, `kilometrosIdaVuelta`, `euros`, `cod_Bus`) VALUES
(1, 'Nalda', 'Guipuzkoa', 'Aquitania', 'Francia', 'Viernes', '2021-09-24', 1, 14, 13.5000, 0),
(2, 'Zarautz', 'Guipuzkoa', 'País Vasco', 'España', 'Domingo', '2021-09-12', 1, 174, 12.0000, 2),
(3, 'Castro Urdiales', 'Cantabria', 'Cantabria', 'España', 'Sabado', '2021-09-18', 1, 118, 12.0000, 2),
(4, 'Fuenterrabía', 'Bizkaia', 'País Vasco', 'España', 'Domingo', '2021-09-19', 1, 183, 12.0000, 3),
(5, 'Laredo', 'Cantabria', 'Cantabria', 'España', 'Sabado', '2021-09-25', 1, 132, 12.0000, 3),
(6, 'San Sebastián', 'Guipúzcoaa', 'País Vasco', 'España', 'Domingo', '2021-09-26', 1, 102, 12.0000, 4),
(7, 'Hendaya', 'Pirineos Atlanticos', 'N. Aquitania', 'Francia', 'Martes', '2021-09-28', 2, 174, 12.0000, 5),
(8, 'San Juán de Luz', 'Pirineos Atlanticos', 'Nueva Aquitania', 'Francia', 'Miercoles', '2021-09-29', 2, 193, 12.0000, 6),
(9, 'Laredo', 'Cantabria', 'Cantabria', 'España', 'Martes', '2021-10-05', 3, 132, 14.0000, 9),
(10, 'Santander', 'Guipuzkoa', 'País Vasco', 'España', 'Domingo', '2021-10-05', 3, 157, 14.0000, 10),
(11, 'Castro Urdiales', 'Cantabria', 'Cantabria', 'España', 'Lunes', '2021-10-06', 3, 118, 14.0000, 10),
(12, 'Fuenterrabía', 'Bizkaia', 'País Vasco', 'España', 'Miercoles', '2021-10-08', 3, 183, 14.0000, 11),
(13, 'Noja', 'Cantabria', 'Cantabria', 'España', 'Viernes', '2021-10-10', 3, 174, 14.0000, 12),
(14, 'San Juán de Luz', 'Pirineos Atlanticos', 'N. Aquitania', 'Francia', 'Martes', '2021-09-14', 4, 193, 14.0000, 13),
(15, 'Laredo', 'Cantabria', 'Cantabria', 'España', 'Jueves', '2021-09-16', 4, 132, 14.0000, 14),
(16, 'Zarautz', 'Guipuzkoa', 'País Vasco', 'España', 'Sabado', '2021-09-25', 4, 174, 14.0000, 15),
(17, 'Fuenterrabía', 'Bizkaia', 'País Vasco', 'España', 'Miercoles', '2021-09-29', 4, 183, 14.0000, 16),
(20, 'Alberite', 'Aquitania', 'Pais Vasco', 'Francia', 'sábado', '2021-09-25', 1, 12, 12.5000, 0),
(19, 'Alberite', 'Aquitania', 'Aquitania', 'Francia', 'Domingo', '2021-09-19', 5, 16, 15.0000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VIAJAR`
--

CREATE TABLE `VIAJAR` (
  `cod_Viajar` int(11) NOT NULL,
  `cod_Destino` int(11) NOT NULL,
  `cod_Cliente` int(11) NOT NULL,
  `cod_Bus` int(11) NOT NULL,
  `plaza_Bus` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `VIAJAR`
--

INSERT INTO `VIAJAR` (`cod_Viajar`, `cod_Destino`, `cod_Cliente`, `cod_Bus`, `plaza_Bus`) VALUES
(1, 7, 6, 1, 52),
(2, 28, 6, 1, 45),
(4, 23, 6, 1, 5),
(8, 2, 2, 1, 10),
(7, 3, 2, 1, 53),
(9, 2, 3, 1, 26),
(10, 15, 5, 1, 21),
(11, 16, 2, 1, 45),
(14, 16, 3, 1, 18),
(15, 7, 3, 1, 50),
(16, 11, 2, 1, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `AGENCIABUSES`
--
ALTER TABLE `AGENCIABUSES`
  ADD PRIMARY KEY (`cod_AgenciaBuses`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indices de la tabla `AGENCIAVIAJES`
--
ALTER TABLE `AGENCIAVIAJES`
  ADD PRIMARY KEY (`cod_AgenciaViajes`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contrasena` (`contrasena`),
  ADD KEY `cod_CompaniaBusHabitual` (`cod_CompaniaBusHabitual`);

--
-- Indices de la tabla `AGENCIAVIAJESCLIENTE`
--
ALTER TABLE `AGENCIAVIAJESCLIENTE`
  ADD PRIMARY KEY (`cod_AgenciaViajesCliente`),
  ADD UNIQUE KEY `cod_AgenciaViajes` (`cod_AgenciaViajes`,`cod_Cliente`),
  ADD KEY `cod_Cliente` (`cod_Cliente`);

--
-- Indices de la tabla `AGENCIAVIAJESDESTINO`
--
ALTER TABLE `AGENCIAVIAJESDESTINO`
  ADD PRIMARY KEY (`cod_AgenciaViajesDestino`),
  ADD KEY `cod_AgenciaViajes` (`cod_AgenciaViajes`),
  ADD KEY `cod_Destino` (`cod_Destino`);

--
-- Indices de la tabla `BUS`
--
ALTER TABLE `BUS`
  ADD PRIMARY KEY (`cod_Bus`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `cod_AgenciaBuses` (`cod_AgenciaBuses`);

--
-- Indices de la tabla `CLIENTE`
--
ALTER TABLE `CLIENTE`
  ADD PRIMARY KEY (`cod_Cliente`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `DESTINO`
--
ALTER TABLE `DESTINO`
  ADD PRIMARY KEY (`cod_Destino`),
  ADD KEY `cod_AgenciaOferta` (`cod_AgenciaOferta`),
  ADD KEY `cod_Bus` (`cod_Bus`);

--
-- Indices de la tabla `VIAJAR`
--
ALTER TABLE `VIAJAR`
  ADD PRIMARY KEY (`cod_Viajar`),
  ADD UNIQUE KEY `cod_Destino` (`cod_Destino`,`cod_Cliente`,`cod_Bus`),
  ADD KEY `cod_Cliente` (`cod_Cliente`),
  ADD KEY `cod_Bus` (`cod_Bus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `AGENCIABUSES`
--
ALTER TABLE `AGENCIABUSES`
  MODIFY `cod_AgenciaBuses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `AGENCIAVIAJES`
--
ALTER TABLE `AGENCIAVIAJES`
  MODIFY `cod_AgenciaViajes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `AGENCIAVIAJESCLIENTE`
--
ALTER TABLE `AGENCIAVIAJESCLIENTE`
  MODIFY `cod_AgenciaViajesCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `AGENCIAVIAJESDESTINO`
--
ALTER TABLE `AGENCIAVIAJESDESTINO`
  MODIFY `cod_AgenciaViajesDestino` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `BUS`
--
ALTER TABLE `BUS`
  MODIFY `cod_Bus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `CLIENTE`
--
ALTER TABLE `CLIENTE`
  MODIFY `cod_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `DESTINO`
--
ALTER TABLE `DESTINO`
  MODIFY `cod_Destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `VIAJAR`
--
ALTER TABLE `VIAJAR`
  MODIFY `cod_Viajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
