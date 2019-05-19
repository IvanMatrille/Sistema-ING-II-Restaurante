-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2019 a las 23:44:04
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `facturacionrestaurantedb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) NOT NULL,
  `Cedula` varchar(18) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Direccion` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id`, `Nombre`, `Apellido`, `Cedula`, `Telefono`, `Email`, `Direccion`) VALUES
(12, 'Henry Javier', 'Liriano German', '402-2334422', '809', 'henryliriano5059@gmail.com', 'Monte Adentro, Salcedo'),
(3, 'Henry', 'German', '409', '800', 'he@gmail.com', 'MA, Salcedo'),
(18, 'Amaro', 'Petronic', '2323', '8095206644', 'ass@gmail.com', 'hhj'),
(17, 'Randy', 'Perez', '2323', '788', 'ass@gmail.com', 'hhj'),
(16, 'Randy', 'Perez', '2323', '788', 'ass@gmail.com', 'hhj'),
(4, 'Ivan', 'De Jesus', '404', '809', 'ivan@gmail.com', 'SFM'),
(19, 'Carlos', 'Ortega', '4556', '809', 'ass@gmail.com', 'hhj'),
(2, 'Javier', 'Liriano', '402', '6643', 'he@gmail.com', 'MA, Salcedo'),
(13, 'DaSD', 'UUI', '4556', '990', 'henryliriano5059@gmail.com', 'Monte Adentro, Salcedo'),
(15, 'Henry Javier', 'JHH', '402-2334422-0', '990', 'henryliriano5059@gmail.com', 'Monte Adentro, Salcedo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallespedido`
--

CREATE TABLE `detallespedido` (
  `Id` int(11) NOT NULL,
  `IdMesa` int(11) NOT NULL,
  `IdMesero` int(11) NOT NULL,
  `IdPlato` int(11) NOT NULL,
  `Cantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`Id`, `Descripcion`) VALUES
(1, 'Buffet'),
(2, '#2'),
(3, 'Bocadillo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Estado` varchar(20) DEFAULT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`Id`, `Descripcion`, `Estado`, `Fecha`, `Hora`) VALUES
(4, '3 vasos de sopa de letra', 'Pendiente', '2019-05-16', '21:52:08'),
(5, '2 rebanada de pizza', 'Activo', '2019-05-16', '21:52:13'),
(6, '5 botellas de champania', 'Activo', '2019-05-17', '21:52:19'),
(7, 'Pizza italiana vegetariana', 'Pendiente', '2019-05-18', '21:23:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `Id` int(11) NOT NULL,
  `nombre_permiso` varchar(100) DEFAULT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `Id` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`Id`, `Descripcion`, `Precio`) VALUES
(1, 'Arroz con papa a la crema', '150'),
(2, 'Ensalada a la crema', '80');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Referencia` varchar(100) NOT NULL,
  `CantidadInicial` int(11) NOT NULL DEFAULT '0',
  `Categoria` varchar(100) NOT NULL,
  `Ubicacion` varchar(100) NOT NULL,
  `ITBIS` double NOT NULL,
  `Precio` double NOT NULL,
  `Costo` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id`, `Nombre`, `Referencia`, `CantidadInicial`, `Categoria`, `Ubicacion`, `ITBIS`, `Precio`, `Costo`) VALUES
(1, 'Arroz con habichuela', 'Mesa', 1, 'Armuerzo', 'Mesa 4', 12, 115, '94'),
(23, 'Moro de habicuela', 'Mesa', 1, 'Desalluno', 'Mesa', 4, 199, '76'),
(24, 'DaSD', 'Mesa', 1, 'Armuerzo', 'Mesa', 66, 99, '88');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `Id` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdMesa` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`Id`, `IdCliente`, `IdMesa`, `Fecha`, `Hora`) VALUES
(4, 12, 3, '2019-05-18', '2 pm'),
(12, 17, 2, '2019-05-18', '2 pm'),
(14, 12, 2, '2019-05-19', '1 pm'),
(10, 17, 3, '2019-05-18', '3 pm'),
(11, 12, 3, '2019-05-18', '3 am');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolusuario`
--

CREATE TABLE `rolusuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rolusuario`
--

INSERT INTO `rolusuario` (`Id`, `Nombre`) VALUES
(1, 'Administrador'),
(2, 'Cajero'),
(3, 'Mesero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `NombreUsuario` varchar(100) NOT NULL,
  `IdRolUsuario` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id`, `Nombre`, `Apellido`, `NombreUsuario`, `IdRolUsuario`, `Password`) VALUES
(1, 'sadfasdf', 'asdfasdf', 'asdfasdf', 0, 'Cajero'),
(2, 'randy', 'pena', 'rpj92', 0, ''),
(3, 'randy', 'pena', 'rpj92', 0, 'LLUEVEpordentro1'),
(4, 'randy', 'pena', 'rpj92', 0, 'LLUEVEpor1'),
(5, 'dsafadsf', 'asdfasdf', 'asdfasdf', 0, 'asdfasdf'),
(6, 'errwertert', 'ewrtwertewrrt', 'wertwert', 0, 'wertwertewrt'),
(7, 'errwertert', 'ewrtwertewrrt', 'wertwert', 0, 'wertwertewrt'),
(8, 'errwertert', 'ewrtwertewrrt', 'wertwert', 0, 'wertwertewrt'),
(9, 'jose andres', 'jimenez', 'jimenez', 0, 'lalalla'),
(10, 'junio', 'amaro', 'amaro', 0, '124'),
(11, '7', 'errwertert', 'ewrtwertewrrt', 0, 'sdfasdfasdf'),
(12, 'sadfasdf', 'asdfasdf', 'sadfasdfsadf,', 0, 'safddffgasdfdsf'),
(13, 'Ramon', 'Sanchez', 'SSystem', 2, '1608'),
(14, 'Henry Javier', 'Liriano German', 'henry5059', 3, '1608');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `rolusuario`
--
ALTER TABLE `rolusuario`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `rolusuario`
--
ALTER TABLE `rolusuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
