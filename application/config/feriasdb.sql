-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 03-08-2020 a las 22:45:47
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id6865294_feriasdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `feria` int(11) NOT NULL,
  `stand` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_carrito` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `carrito`
--
DELIMITER $$
CREATE TRIGGER `actualizar` BEFORE UPDATE ON `carrito` FOR EACH ROW BEGIN

-- declaración de variable
DECLARE v_actualizar int;
-- calculos
SET v_actualizar = NEW.cantidad_carrito - OLD.cantidad_carrito;
-- actualizamos el total factura
UPDATE productos
SET cantidad = cantidad - v_actualizar
WHERE id_producto = NEW.id_producto;

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `res_cantidad` AFTER INSERT ON `carrito` FOR EACH ROW UPDATE productos SET cantidad = cantidad-
NEW.cantidad_carrito WHERE id_producto = NEW.id_producto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ferias`
--

CREATE TABLE `ferias` (
  `id_feria` int(11) NOT NULL,
  `estado` char(15) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_feria` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `usuario_enc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ferias`
--

INSERT INTO `ferias` (`id_feria`, `estado`, `nombre_feria`, `fecha`, `lugar`, `descripcion`, `usuario_enc`) VALUES
(1, 'finalizada', 'Feria gastronomica', '2020-07-04', 'Sena Centro', '...', 6),
(2, 'en curso', 'Artesanias', '2020-08-04', 'Sena octava', '...', 6),
(3, 'creada', 'Feria emopresarial', '2020-09-16', 'Sena centro', '...', 6),
(4, 'creada', 'Feria emprendimiento', '2020-08-28', 'Sena centro', '...', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id_gasto` int(11) NOT NULL,
  `feria` int(3) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `stand` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id_gasto`, `feria`, `descripcion`, `stand`, `total`) VALUES
(1, 1, 'Empaques de paletas', 3, 5000),
(2, 1, 'Servilletas', 2, 4000),
(3, 1, 'Bolsas', 2, 2000),
(4, 2, 'Tragetas presentacion', 5, 8000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `stand` int(11) NOT NULL,
  `nombre_producto` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `iva` int(3) NOT NULL,
  `descuento` int(2) NOT NULL,
  `precio_total` int(11) NOT NULL,
  `img` varchar(20) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `estado_producto` varchar(15) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `stand`, `nombre_producto`, `cantidad`, `precio`, `iva`, `descuento`, `precio_total`, `img`, `estado_producto`) VALUES
(1, 1, 'Mozzarella', 0, 6210, 10, 5, 6900, 'producto1.jpg', 'activo'),
(2, 1, 'Cheddar', 0, 6000, 0, 0, 6000, 'producto2.jpg', 'activo'),
(3, 1, 'Parmesano', 0, 4500, 0, 3, 4500, 'producto3.jpg', 'activo'),
(4, 2, 'Pastel de chocolate', 2, 200, 0, 0, 200, 'producto4.jpg', 'activo'),
(5, 2, 'Dona', 3, 2000, 0, 0, 2000, 'producto5.jpg', 'activo'),
(6, 2, 'Cupcake', 3, 1500, 0, 0, 1500, 'producto6.jpg', 'activo'),
(7, 3, 'Gusanos de goma', 30, 500, 0, 0, 500, 'producto7.jpg', 'activo'),
(8, 3, 'Paleta de dulce', 12, 1500, 0, 0, 1500, 'producto8.jpg', 'activo'),
(9, 4, 'Manillas', 6, 2000, 0, 0, 2000, 'producto9.jpg', 'activo'),
(10, 4, 'Manillas', 6, 1500, 0, 0, 1500, 'producto10.jpg', 'activo'),
(11, 5, 'Tazon', 9, 50000, 0, 0, 50000, 'producto11.jpg', 'activo'),
(12, 5, 'Mascaras', 8, 50000, 0, 5, 50000, 'producto12.jpg', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stands`
--

CREATE TABLE `stands` (
  `id_stand` int(11) NOT NULL,
  `feria` int(11) NOT NULL,
  `usuario_enc` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `slogan` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado_stand` char(9) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `stands`
--

INSERT INTO `stands` (`id_stand`, `feria`, `usuario_enc`, `nombre`, `slogan`, `estado_stand`) VALUES
(1, 1, 8, 'Quesos', '', 'activo'),
(2, 1, 9, 'Pasteleria', '', 'activo'),
(3, 1, 10, 'Dulceria', '', 'activo'),
(4, 2, 9, 'Manillas', '', 'activo'),
(5, 2, 10, 'Estatuas', '', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `tipo_usuario` char(9) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` char(9) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre_usuario` varchar(30) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` char(18) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `password` text COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `tipo_usuario`, `estado`, `nombre_usuario`, `email`, `telefono`, `password`) VALUES
(1, 'admin', 'Activo', 'Admin', 'admin@mail.com', '3003003030', '67cc0e2156bb0f1b36b8683f7ccc248219cfe76a576ac82d54135c3836e56bad37c20463bc7b5b442d77d1db30e5fb0c782c8be764b3bf1d150940da18667df6UeoQPFO0GnZ66awxsOsbd/ws5KQmrRIiIyMKmqZoiIk='),
(6, 'userferia', 'Activo', 'Userferia', 'userferia@mail.com', '3003003030', '96694a90e3cd1bbe66e4cb713657eb4dc7e075164188c057ebad7daf9369f2f0e13cc1d9c1d49f791193dbf56bf51782eaab594dda744dbc8f947dd11c9ed5f2I6PBFErUXSdB8ukmEipAox1UBoK6wCP8XKFd7lqdtgU='),
(7, 'userferia', 'Activo', 'Userferia02', 'userferia02@gmailc.om', '3003003030', 'aef9e2e5deb455ea798c48d1daf6d392db0db8f36999df0a2e92cf7204882843eb786cbfdf9dd10d0bf3588822e6a75e6a32da9c65626595d519418fe7defe01TCczwU/k+TaCxUrVFGPIIPK1WUV1nqUDYLqn68rf7aQ='),
(8, 'userstand', 'Activo', 'Userstand01', 'userstand01@mail.com', '00', '008c069133de853593ae232891bd9d4ce8d6c9c1c7d733203aef0b5aee428f638adabbae4e49aa909158e3af7b8240cd7b75d66a18198fb68161c1eac2edd0197iOB+Ya5y2Q/WfbfZL30ys8u0v/zxGrVOZWms1hou8E='),
(9, 'userstand', 'Activo', 'Userstand', 'userstand@mail.com', '00', 'af1c7b0883f2eae89bb2ff9ee6f7c898ff8b949671a7f294fc3b5b8c44a37cdd92f4c27da7eb6711c47f81aa549d7d4368686afbefad10a4d4f11533878b6611Zq/gv4L2oKeRRW8pgy27Kv3taWs4QOyYsa0uy4KbyJw='),
(10, 'userstand', 'Activo', 'Userstand03', 'userstand03@mail.com', '00', '86da8718aed1920b432faad803f041c07f4f97c6c61ba8ed70d5294f57f3992ceea74cc5fa72ad2f812e50a059d80dca115854118a54de53e64a341ebb4891a5zzgGD93x9FtHhNbaUzMwmRD31MFT+b4s4RHMzvSg32c=');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `feria` int(11) NOT NULL,
  `stand` int(11) NOT NULL,
  `producto` int(11) NOT NULL,
  `precio_producto_v` int(11) NOT NULL,
  `cantidad_venta` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `feria`, `stand`, `producto`, `precio_producto_v`, `cantidad_venta`, `total`) VALUES
(1, 1, 3, 7, 500, 5, 2500),
(2, 1, 3, 8, 1500, 2, 3000),
(3, 1, 3, 7, 500, 3, 1500),
(4, 1, 3, 7, 500, 8, 4000),
(5, 1, 3, 8, 1500, 5, 7500),
(6, 1, 3, 7, 500, 4, 2000),
(7, 1, 3, 8, 1500, 1, 1500),
(8, 1, 2, 4, 200, 2, 400),
(9, 1, 2, 5, 2000, 2, 4000),
(10, 1, 2, 6, 1500, 1, 1500),
(11, 1, 2, 5, 2000, 5, 10000),
(12, 1, 2, 6, 1500, 3, 4500),
(13, 1, 2, 4, 200, 3, 600),
(14, 1, 2, 6, 1500, 1, 1500),
(15, 1, 2, 4, 200, 3, 600),
(16, 1, 2, 6, 1500, 2, 3000),
(17, 1, 1, 1, 6555, 4, 26220),
(18, 1, 1, 2, 6000, 3, 18000),
(19, 1, 1, 3, 4365, 3, 13095),
(20, 1, 1, 2, 6000, 4, 24000),
(21, 1, 1, 3, 4365, 2, 8730),
(22, 1, 1, 1, 6555, 4, 26220),
(23, 1, 1, 2, 6000, 3, 18000),
(24, 1, 1, 3, 4365, 3, 13095),
(25, 1, 1, 1, 6555, 7, 45885),
(26, 1, 1, 1, 6555, 1, 6555),
(27, 1, 1, 2, 6000, 2, 12000),
(28, 1, 1, 3, 4365, 3, 13095),
(29, 2, 4, 9, 2000, 1, 2000),
(30, 2, 4, 10, 1500, 2, 3000),
(31, 2, 4, 10, 1500, 3, 4500),
(32, 2, 4, 10, 1500, 1, 1500),
(33, 2, 4, 9, 2000, 3, 6000),
(34, 2, 5, 11, 50000, 1, 50000),
(35, 2, 5, 12, 50000, 1, 50000),
(36, 2, 5, 12, 47500, 1, 47500);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`);

--
-- Indices de la tabla `ferias`
--
ALTER TABLE `ferias`
  ADD PRIMARY KEY (`id_feria`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `stands`
--
ALTER TABLE `stands`
  ADD PRIMARY KEY (`id_stand`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `ferias`
--
ALTER TABLE `ferias`
  MODIFY `id_feria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `stands`
--
ALTER TABLE `stands`
  MODIFY `id_stand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
