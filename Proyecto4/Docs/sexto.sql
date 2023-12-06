-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2023 a las 00:13:11
-- Versión del servidor: 10.4.24-MariaDB-log
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sexto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `codproveedor` int(11) NOT NULL,
  `nomPro` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contacto` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`codproveedor`, `nomPro`, `contacto`, `telefono`, `direccion`) VALUES
(1, 'Open Services', '965432143', 9645132, 'Lima'),
(3, 'Lineo', '25804', 9865412, 'Lima'),
(7, 'CDN Comidas Congeladas S.A', '132543567543', 992886417, 'Guayaquil'),
(8, 'Embutidos SARA L.a', '1243456765434', 997668423, 'Manabi, Manta');

--
-- Disparadores `proveedor`
--
DELIMITER $$
CREATE TRIGGER `historial_proveedor` AFTER INSERT ON `proveedor` FOR EACH ROW insert into historial (accion) VALUES (concat('se ingreso un nuevo proveedor: '
' NOMBRE: ', NEW.proveedor ,                 
' RUC: ', NEW.contacto,
' TELEFONO: ', NEW.telefono,
' DIRECCION: ', NEW.direccion            ))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historial_proveedor_act` AFTER UPDATE ON `proveedor` FOR EACH ROW insert into historial (accion) VALUES (concat('se cambiaron los datos del proveedor: ', OLD.proveedor ,
' por NOMBRE: ', NEW.proveedor ,                 
' RUC: ', NEW.contacto,
' TELEFONO: ', NEW.telefono,
' DIRECCION: ', NEW.direccion            ))
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `historial_proveedor_elim` AFTER DELETE ON `proveedor` FOR EACH ROW insert into historial (accion) VALUES (concat('se elimino al proveedor: ', OLD.proveedor ,
' de ' , OLD.direccion,                 
' de la base de datos '            ))
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(17) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contrasenia` text NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Contrasenia`, `Rol`) VALUES
(1, '1314250729', 'JUAN', 'MARTINEZ', '0961528728', 'jc.martineztoala@gmail.com', '1234', 'admin'),
(2, '1310566771', 'felipe ', 'menendez', '0993445687', 'felipe@gmail.com', '1234', 'Vendedor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`codproveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `codproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
