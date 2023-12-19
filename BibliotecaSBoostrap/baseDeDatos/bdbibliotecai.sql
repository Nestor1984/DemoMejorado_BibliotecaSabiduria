-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2023 a las 08:30:25
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
-- Base de datos: `bdbibliotecai`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutor` int(11) NOT NULL,
  `nombresYApellidos` varchar(60) NOT NULL,
  `sitioWeb` varchar(45) NOT NULL,
  `nacionalidad` varchar(15) NOT NULL,
  `anioNacimiento` date NOT NULL,
  `anioFallecimiento` date DEFAULT NULL,
  `genero` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bibliotecario`
--

CREATE TABLE `bibliotecario` (
  `idBibliotecario` int(11) NOT NULL,
  `nombres` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `ci` varchar(15) DEFAULT NULL,
  `turno` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentariosvaloraciones`
--

CREATE TABLE `comentariosvaloraciones` (
  `idComentarioValoracion` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idLibro` int(11) DEFAULT NULL,
  `valoracion` varchar(20) DEFAULT NULL,
  `comentario` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `idDevolucion` int(11) NOT NULL,
  `fechaDevolucion` datetime DEFAULT NULL,
  `estado` varchar(15) DEFAULT NULL,
  `multa` decimal(3,2) DEFAULT NULL,
  `idPrestamo` int(11) DEFAULT NULL,
  `comentarios` varchar(165) DEFAULT NULL,
  `idBibliotecario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoriales`
--

CREATE TABLE `editoriales` (
  `idEditorial` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `anioFundacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejemplares`
--

CREATE TABLE `ejemplares` (
  `idEjemplar` int(11) NOT NULL,
  `idLibro` int(11) DEFAULT NULL,
  `estado` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ejemplares`
--

INSERT INTO `ejemplares` (`idEjemplar`, `idLibro`, `estado`) VALUES
(1, 1, 'Disponible'),
(2, 1, 'No disponible'),
(4, 2, 'No disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formatos`
--

CREATE TABLE `formatos` (
  `idFormatos` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `formatos`
--

INSERT INTO `formatos` (`idFormatos`, `nombre`, `descripcion`) VALUES
(1, 'Nestor', 'kqkq'),
(2, 'formato prueba', 'ehhhh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `cantidadPaginas` int(11) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `idioma` varchar(40) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `idFormato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `titulo`, `cantidadPaginas`, `fechaPublicacion`, `descripcion`, `genero`, `idioma`, `isbn`, `idFormato`) VALUES
(1, 'Como programar en Java 7a Edicion', 300, '2023-12-01', 'java', 'Infomatica', 'Espaniol', '1234', 1),
(2, 'keke', 4555, '2023-12-02', 'lalala', 'Infomatica', 'Espaniol', '‎8441532109', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_autores`
--

CREATE TABLE `libros_autores` (
  `idLibro` int(11) DEFAULT NULL,
  `idAutor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_editoriales`
--

CREATE TABLE `libros_editoriales` (
  `idLibro` int(11) DEFAULT NULL,
  `idEditorial` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `idPrestamo` int(11) NOT NULL,
  `fechaDePrestamo` datetime DEFAULT NULL,
  `plazo` date DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idBibliotecario` int(11) DEFAULT NULL,
  `idEjemplar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombres` varchar(35) NOT NULL,
  `apellidos` varchar(35) NOT NULL,
  `ci` varchar(15) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `genero` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `nombres`, `apellidos`, `ci`, `direccion`, `telefono`, `email`, `genero`) VALUES
(1, 'Juana', 'Aguilar', '1239393030', 'Alto Las Delicias', '72065804', 'nestor@gmail.com', 'O'),
(2, 'Margarita ', 'Gutierrez', '12393939', 'Villa Fatima', '61062202', 'margaU@gmail.com', 'F');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `bibliotecario`
--
ALTER TABLE `bibliotecario`
  ADD PRIMARY KEY (`idBibliotecario`);

--
-- Indices de la tabla `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  ADD PRIMARY KEY (`idComentarioValoracion`),
  ADD KEY `fk_cv_Usuarios` (`idUsuario`),
  ADD KEY `fk_cv_libro` (`idLibro`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`idDevolucion`),
  ADD KEY `fk_devolucion_bibliotecario` (`idBibliotecario`),
  ADD KEY `fk_devolucion_prestamos` (`idPrestamo`);

--
-- Indices de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  ADD PRIMARY KEY (`idEditorial`);

--
-- Indices de la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD PRIMARY KEY (`idEjemplar`),
  ADD KEY `fk_ejemplares_libros` (`idLibro`);

--
-- Indices de la tabla `formatos`
--
ALTER TABLE `formatos`
  ADD PRIMARY KEY (`idFormatos`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `fk_libros_formatos` (`idFormato`);

--
-- Indices de la tabla `libros_autores`
--
ALTER TABLE `libros_autores`
  ADD KEY `fk_librosAutores_libros` (`idLibro`),
  ADD KEY `fk_librosAutores_Autores` (`idAutor`);

--
-- Indices de la tabla `libros_editoriales`
--
ALTER TABLE `libros_editoriales`
  ADD KEY `fk_librosEditoriales_libros` (`idLibro`),
  ADD KEY `fk_librosEditoriales_editoriales` (`idEditorial`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`idPrestamo`),
  ADD KEY `fk_prestamos_visitantes` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bibliotecario`
--
ALTER TABLE `bibliotecario`
  MODIFY `idBibliotecario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  MODIFY `idComentarioValoracion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  MODIFY `idDevolucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `editoriales`
--
ALTER TABLE `editoriales`
  MODIFY `idEditorial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  MODIFY `idEjemplar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `formatos`
--
ALTER TABLE `formatos`
  MODIFY `idFormatos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `idPrestamo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentariosvaloraciones`
--
ALTER TABLE `comentariosvaloraciones`
  ADD CONSTRAINT `fk_cv_Usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`),
  ADD CONSTRAINT `fk_cv_libro` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`);

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `fk_devolucion_bibliotecario` FOREIGN KEY (`idBibliotecario`) REFERENCES `bibliotecario` (`idBibliotecario`),
  ADD CONSTRAINT `fk_devolucion_prestamos` FOREIGN KEY (`idPrestamo`) REFERENCES `prestamos` (`idPrestamo`);

--
-- Filtros para la tabla `ejemplares`
--
ALTER TABLE `ejemplares`
  ADD CONSTRAINT `fk_ejemplares_libros` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_libros_formatos` FOREIGN KEY (`idFormato`) REFERENCES `formatos` (`idFormatos`);

--
-- Filtros para la tabla `libros_autores`
--
ALTER TABLE `libros_autores`
  ADD CONSTRAINT `fk_librosAutores_Autores` FOREIGN KEY (`idAutor`) REFERENCES `autores` (`idAutor`),
  ADD CONSTRAINT `fk_librosAutores_libros` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`);

--
-- Filtros para la tabla `libros_editoriales`
--
ALTER TABLE `libros_editoriales`
  ADD CONSTRAINT `fk_librosEditoriales_editoriales` FOREIGN KEY (`idEditorial`) REFERENCES `editoriales` (`idEditorial`),
  ADD CONSTRAINT `fk_librosEditoriales_libros` FOREIGN KEY (`idLibro`) REFERENCES `libros` (`idLibro`);

--
-- Filtros para la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `fk_prestamos_visitantes` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
