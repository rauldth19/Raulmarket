-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-11-2023 a las 14:52:58
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
-- Base de datos: `raulmarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `nombrearticulo` varchar(25) NOT NULL,
  `seccion` varchar(25) NOT NULL,
  `precio` int(8) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_articulo`, `nombrearticulo`, `seccion`, `precio`, `descripcion`, `imagen`) VALUES
(15, 'Martillo', '3', 13, 'Martillo de alta calidad con mango antideslizante.', 'view/template/img/martillo.png'),
(17, 'Barra de pan', '1', 1, 'Hecha con la mejor harina esta mañana', 'view/template/img/barra de pan.png'),
(18, 'Bolsa de chuches', '1', 1, 'Escogidas por los mejores selectores de chuches.', 'view/template/img/bolsa de chuches.png'),
(19, 'Bicicleta de Montaña', '4', 246, 'Mayor estabilidad y mejor adherencia por zonas pedregosas gracias a sus ruedas de 29 pulgadas.', 'view/template/img/bici de montaña.png'),
(20, 'Alicates', '3', 2, 'Alicates de alta calidad con mango antideslizante.', 'view/template/img/alicates.png'),
(198, 'Moto', '4', 2400, 'Hazte con nuestra mejor tecnología para scooters de gran tamaño, añádele una buena pizca del espíritu aventurero de nuestra innovadora X-ADV y tendrás algo completamente nuevo.', 'view/template/img/moto.png'),
(263, 'Sudadera', '2', 45, 'La sudadera Adidas Entrada 22 es una prenda versátil ideal para aquellos días en los que hace frio o para hacer deporte.', 'view/template/img/sudadera.png'),
(282, 'Napolitana', '1', 1, 'Creada por nuestros reposteros artesanos con el mejor chocolate traído exclusivamente desde los alpes suizos.', 'view/template/img/napolitana.png'),
(283, 'Queso', '1', 7, 'Queso semicurado de Navarra', 'view/template/img/queso.png'),
(284, 'Jamón York', '1', 3, 'Jamón york cocido de la máxima calidad hecho en España', 'view/template/img/jamon-york.png'),
(285, 'Martillo de Thor', '3', 999999, 'Martillo del Dios Thor, no cualquiera puede llevárselo.', 'view/template/img/martillo-thor.png'),
(286, 'Triciclo', '4', 6, 'Triciclo de última tecnología que te llevará a cualquier parte.', 'view/template/img/triciclo.png'),
(287, 'Coche Liux Animal', '4', 42444, 'Coche eléctrico con dos niveles de potencia, dos niveles de autonomía, dos acabados, cinco plazas, materiales revolucionarios en la industria del automóvil y la última tecnología, como Android Automotive.', 'view/template/img/liux-animal.png'),
(324, 'Leche', '1', 1, 'Brick de leche de la mejor calidad', 'view/template/img/leche.jpg'),
(325, 'Chocolate', '1', 2, 'Tableta de chocolate ideal para tus postres y meriendas', 'view/template/img/tableta-chocolate-intenso-con-almendras-nestle.jpg'),
(326, 'Pasta infantil', '1', 2, 'Pasta sin gluten perfecta para los niños con alto contenido de verduras', 'view/template/img/pasta-infantil-de-mercadona.jpg'),
(327, 'Agua', '1', 1, 'Agua embotellada de origen mineral', 'view/template/img/agua.jpg'),
(328, 'Americana', '2', 44, 'Americana con corbata de color rojo, ideal para cenas de gala', 'view/template/img/americana_de_hombre_roja_tres_botones_vittorio_uniformes.jpg'),
(329, 'Camiseta Málaga', '2', 60, 'Camiseta oficial del Málaga club de fútbol de máxima calidad.', 'view/template/img/camiseta-hummel-malaga-cf-primera-equipacion-2023-2024-azure-blue-0.jpg'),
(330, 'Zapatillas Vans', '2', 67, 'Zapatillas Vans para mujer, ideales para el uso diario', 'view/template/img/vans-ward-plataforma-zapatillas-mujer-negras.jpg'),
(331, 'Zapatillas Nike ', '2', 82, 'Zapatillas Nike perfectas para hacer running por cualquier tipo de terreno', 'view/template/img/zapatilla-Nike-trailrunning-Juniper-Trail2-Imag1.jpg'),
(332, 'Camiseta Puma', '2', 24, 'Camiseta Puma 100% algodón de máxima calidad.', 'view/template/img/puma.JPG'),
(333, 'Pantalón Nike', '2', 30, 'Pantalón nike de nylon, super elástico y perfecto para hacer deporte', 'view/template/img/pantalon-largo-nike-dri-fit-academy-drill-kpz-black-white-0.jpg'),
(334, 'Collar de plata', '2', 52, 'Collar de plata de 1º ley, ideal para acompañar un buen outfit en tus momentos de moda más importantes', 'view/template/img/392666C01_RGB.jpg'),
(335, 'Pendientes de Oro', '2', 104, 'Pendientes de oro de gran calidad con un diseño creado por Paco Rabanne', 'view/template/img/eop-perla-lar.jpg3-min-scaled.jpg'),
(336, 'Tornillos', '3', 3, 'Pack de 25 tornillos M3 de máxima calidad', 'view/template/img/tornillos-m3.jpeg'),
(337, 'Destornilladores', '3', 15, 'Juego de 8 destornilladores perfecto para todo tipo de tornillos', 'view/template/img/juego-de-8-destornilladores-beta-easy.jpg'),
(338, 'Cinta métrica', '3', 2, 'Cinta métrica ideal para medir aquello que te haga falta', 'view/template/img/medid-entero.jpg'),
(339, 'Tijeras para podar', '3', 7, 'Tijeras para podar los arboles o setos de tu jardín de la manera más precisa posible', 'view/template/img/tijeras.jpg'),
(340, 'Cinta adhesiva', '3', 2, 'Cinta adheriva de la mejor calidad del mercado, puede resistir hasta varios kg de peso', 'view/template/img/cinta_adhesiva_pvc_transparente_barata_facil_cierre_cajas_envio.jpg'),
(341, 'Taladro Bosh', '3', 65, 'Taladro de la marca Bosh profesional, con el podrás realizar agujeros en cualquier superficie con el más mínimo esfuerzo', 'view/template/img/taladro-bosch-gsb-13-re-iva-incluido.png'),
(342, 'Moto vintage', '4', 5000, 'Moto vintage en perfectas condiciones de segunda mano', 'view/template/img/istockphoto-117243766-612x612.jpg'),
(343, 'Coche Volvo xc40', '4', 45000, 'Volvo de diseñado para ofrecer arranques suaves y una aceleración refinada, mejorando así tanto los trayectos urbanos como los interurbanos.', 'view/template/img/coche-aislado-sobre-fondo-blanco-volvo-xc40-coche-blanco-blanco-limpio-sobre-fondo-blanco-blanco-negro_655090-606396.avif'),
(344, 'Coche para caballos', '4', 4500, 'Carro de máxima calidad perfecto para ir con tus caballos por el pueblo', 'view/template/img/depositphotos_7113973-stock-photo-vintage-carriage-isolated-on-white.webp'),
(345, 'Moto Yamaha r6', '4', 17000, 'Basada en una de las motos WorldSSP más exitosas de todos los tiempos, la R6 RACE es la máquina de carreras definitiva.', 'view/template/img/yamaha-r6-race-2022.jpg'),
(346, 'Patinete Xiaomi', '4', 450, 'Patinete eléctrico de la marca Xiaomi con el que podrás desplazarte por toda la ciudad sin gastar apenas dinero en ello', 'view/template/img/patinete-electrico-xiaomi-scooter-4-negro-001.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `rol`, `nombre`, `usuario`, `pass`) VALUES
(16, 'Administrador', 'Raul', 'raul', '202cb962ac59075b964b07152d234b70'),
(25, 'Administrador', 'aa', 'aa', '4124bc0a9335c27f086f24ba207a4912'),
(26, 'Usuario', 'ss', 'ss', '3691308f2a4c2f6983f2880d32e29c84');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
