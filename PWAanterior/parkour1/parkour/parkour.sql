-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-04-2021 a las 07:01:06
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;

--
-- Base de datos: `parkour`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `idequipo` bigint(20) PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `lugar` varchar(250) NOT NULL,
  `paginaweb` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`nombre`, `lugar`, `paginaweb`) VALUES
('Programacion en desarrollo web','Neuquén','http://127.0.0.1/pwa/parkour/'),
('Escuela integral de parkour', 'Ciudad Autónoma de Buenos Aires', 'https://parkourintegral.com/'),
('Club Andino Villa La Angostura', 'Villa la angostura', 'https://www.facebook.com/watch/Club-Andino-Villa-La-Angostura-134010936629558/'),
('Tempest Academy', 'California', 'https://www.tempestacademy.com/'),
('Redbull', 'Austria', 'https://www.redbull.com/'),
('JLM Urban Sport', 'Reino Unido', 'https://parkouragency.co.uk/'),
('Storror', 'Reino Unido', 'https://www.storror.com/');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traceur`
--

CREATE TABLE `traceur` (
  `idtraceur` bigint(20) PRIMARY KEY AUTO_INCREMENT,
  `idgrupo` bigint(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `pais` varchar(150) NOT NULL,
  `fechanacimiento` date NOT NULL,
  `biografia` varchar(500) NOT NULL,
  FOREIGN KEY (idgrupo) REFERENCES equipo(idequipo) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

--
-- Volcado de datos para la tabla `traceur`
--

INSERT INTO `traceur` (`idgrupo`, `nombre`, `apellido`, `pais`, `fechanacimiento`, `biografia`) VALUES
(1,'admin','admin','Argentina','0000-00-00','Estudiante de TUDW'),
(4, 'Erik', 'Mukhametshin', 'Uzbekistán', '1990-04-02', 'Freerunner profesional, atleta de parkour y doble que es conocido por publicar una variedad de su trabajo en sus más de 330.000 seguidores en Instagram y más de 60.000 suscriptores en YouTube. Comenzó a entrenar en Judo a los 3 años. Luego comenzó a entrenar en parkour y continuó sobresaliendo. Después de ver la película YAMAKASI, decidió seguir una carrera como corredor libre.'),
(5, 'Tommaso', 'Di Dominic', 'Australia', '1992-05-14', ' Frecuentemente muestra sus habilidades como corredor libre en Instagram, donde ha conseguido más de 1.3 millones de seguidores. Antes de ser corredor libre, estaba involucrado en el ballet y en el patinaje artístico. Trabajó como recolector de basura antes de cumplir su sueño de convertirse en atleta profesional.'),
(6, 'Joseph', 'Henderson', 'Gran Bretaña', '1996-01-01', 'Uno de los corredores libres más rápidos del mundo. Conocido como \"el campeón del pueblo\" del parkour. Estrellas, modelos y actos en campañas publicitarias para clientes de alto perfil como Just Eat, Abbott y BBC One. Ganador del Campeonato de Parkour de Velocidad de América del Norte de 2016. Podio colocado en múltiples competiciones de prestigio a nivel mundial. Realizado en festivales y eventos corporativos en vivo en todo el Reino Unido y en todo el mundo.'),
(5, 'Krystian', 'Kowalewski', 'Polonia', '1998-08-25', '¡Hola! Mi nombre es Krystian Kowalewski de Nidzica en Polonia. Nací el 25/08/1998. Mi aventura con Parkour y Freerunning comenzó en octubre de 2011. Al principio, comencé a entrenar solo en el campo o en un pueblo cercano. En 2014, fui a mis primeras competencias BC3RUN CHALLENGE 2 y gané el premio al mejor junior;) en noviembre de 2014 fui invitado a Gdansk KS Movement Academy como invitado especial. En 2015 obtuve el 2do lugar en BC3RUN CHALLENGE 3: D'),
(4, 'Dimitris', 'Kyrsanidis', 'Grecia', '1995-05-27', 'Corredor de estilo libre profesional y atleta de parkour con victorias en el Red Bull Art of Motion del 2014 y del 2015. Obtuvo un patrocinio con Red Bull y Tempest. Previo a eso fue patrocinado por Krap y fue un embajador para Team JiYo. Comenzó a entrenar como corredor de estilo libre desde el 2007 cuando tenía 12 años.'),
(5, 'Pavel', 'Petkuns', 'Letonia', '1992-09-29', 'Artista dew parkour conocido por su trabajo como uno de los atletas patrocinados por Red Bull en su deporte. Se convirtió en la primera persona en ganar tres campeonatos consecutivos Art of Motion Freerunning de Red Bull. En el proceso de convertirse en el primer campeón en tres oportunidades de Art of Motion, también se convirtió en el primer atleta de habla rusa en ganar la competencia.'),
(5, 'Alexander', 'Titarenko', 'Ucrania', '1994-07-05', '\"Me puse en camino con la esperanza de pasar la clasificación y, de repente, todo el mundo me felicitó por conseguir la victoria general\", dice Titarenko sobre ese logro que acapara los titulares. Su estilo confiado y exuberante ha seguido sirviéndole bien desde esa gran victoria, con Titarenko impresionando en las competiciones de parkour en todo el mundo. Esté atento a que gane más elogios muy pronto, y mírelo haciendo lo suyo en la ciudad ucraniana de Chernivtsi aquí mismo.'),
(7, 'Callum', 'Powell', 'Inglaterra', '1991-08-08', 'Atleta inglés de parkour que saltó a la fama publicando videos y contenido de parkour en su cuenta de Instagram callumstorror. Ha conseguido más de 240.000 seguidores en la plataforma para compartir fotos y videos. En 2016 se incorporó al equipo de parkour profesional ETRE-FORT. También ha sido miembro de StorrorBlog .'),
(4, 'Nate', 'Weston', 'Estados Unidos', '1999-06-11', '¡Hola, mi nombre es Nate! Tengo 22 años y soy un atleta profesional de parkour con base en Missoula MT. Estoy dentro con el grupo tempest y el joven mas popular en free running y parkour'),
(2, 'Brodie', 'Pawson', 'Australia', '1994-08-16', 'Atleta profesional de parkour que compitió en la temporada inaugural de Australian Ninja Warrior junto a su hermano gemelo  Dylan Pawson. Creció viendo el programa deportivo japonés Sasuke, la serie que inspiró a Australian Ninja Warrior. u cuenta de Instagram homónima está llena de videos de él mismo corriendo libremente. La cuenta obtuvo 480.000 seguidores.'),
(3, 'Joaquin', 'Barbeito', 'Argentina', '1993-03-15', 'Joaquin es un residente de villa la angostura hace aproximadamente 4 años, anteriormente de la ciudad de Neuquén en donde realizo sus estudios de profesorado de educación física en ifes, practicante del deporte desde los 13 años y hoy en la actualidad es profesor de la escuela de parkour en el club andino de villa la angostura');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `idimagen` bigint(20) PRIMARY KEY AUTO_INCREMENT,
  `idtraceur` bigint(20)NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `img` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `nivel` int(1) NOT NULL,
  FOREIGN KEY (idtraceur) REFERENCES traceur(idtraceur) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`idtraceur`, `nombre`, `img`, `descripcion`, `nivel`) VALUES
(8, 'backflip', 'backflip-rio.jpg', 'Es una vuelta hacia atras, logramos altura y giramos el cuerpo hacia atras levantando las rodillas', 3),
(3, 'backflip', 'backflip.jpg', 'Es una vuelta hacia atras, logramos altura y giramos el cuerpo hacia atras levantando las rodillas', 3),
(3, 'pasavalla', 'pasavalla.jpg', 'Cuando nos acercamos al banco para saltar, apoyamos primero la mano habil y levantamos las piernas con la cadera', 1),
(3, 'reverso', 'reverso.jpg', 'El reverso es el principal salto para ir perdiendo el miedo al salto en movimiento, si bien es basico pero su practica nos ayuda a llevarlo a otros saltos en movimientos, conocer el cuerpo en el salto es muy importante', 1),
(1, 'reverso', 'dan.jpg', 'power move dan edwardes es similar al pasavalla, apoyamos la mano y luego damos la espalda consiguiendo altura y damos la espalda', 2),
(1,'perfil', 'danperfil.jpg', 'es la foto de dan edwardes de perfil', 0),
(2, 'double kong', 'doublekong.jpg', 'double kong, es poder realizar en un salto el kong apoyando al principio del banco y luego al final, dando el impulso en el primer kong, estiramos los brazos para realizar el segundo kong y pasamos las piernas entre los brazos', 3),
(6, 'human flag', 'flag.jpg', 'human flag, necesita mucha fuerza de brazos incluyendo el conocimiento de nuestro cuerpo para sostenerlo mientras nos agarramos de un poste y mantenemos el cuerpo de manera lateral', 3),
(6, 'salto brazo', 'saltobrazo.jpg', 'una de las primeras practicas influye la fuerza de los brazo para poder subir a un paredon sin necesidad de salta de manera previa, nos acercamos y enganchamos al paredon y luego subimos, o puede ser que salte de manera previa por la distancia, no po', 2),
(1, 'salto brazo', 'fondo.jpg', 'el salto brazo, es para engancharnos en el paredon al cual vamos a escalar, esta imagen es usada en el fondo de la pagina', 2),
(1, 'historia', 'historia.jpg', 'Esta imagen es utilizada para la descripcion de la historia del parkour, en donde fue basado el parkour', 0),
(12, 'salto recepcion', 'recepcion.jpg', 'siempre que saltamos de una altura no podemos perder de vista la manera en realizar la recepcion, siempre debemos tener cuidado en la manera de caer e ir puliendo la tecnica en cada salto', 1),
(9, 'run', 'run.jpg', 'Despues de los entrenamientos cotidianos podemos mejorar nuestra distancia en cada salto que realizamos, para esto debemos trabajar las piernas y realizarnos pruebas para conocernos', 1),
(9, 'gato', 'gato.jpg', 'es un nombre asociado al kong, puede llegar a haber variedad en los saltos como no, pero \"teoricamente\" son distintos ya que es mas frontan y el kong puede ser mas libre en su salto', 2),
(9, 'libre', 'free.jpg', 'Siempre en un recorrido libre vamos variando no solo con los saltos sino mutamos las maneras de realizarlos o simplemente creamos saltos comodos sin necesidad de cumplir un salto en especifico \"aunque mayormente tienen sus nombre pero no son reconoci', 2),
(10, 'kong', 'kong-largo.jpg', 'este kong es doble tambien pero logra una mayor distancia, no es distinto a otros pero se aprecia la distancia entre bancos y la tecnica se puede apreciar mucho mejor', 3),
(10, 'sideflip', 'sideflip-alto.jpg', 'el sideflip en este caso logre una precision impecable, donde su salto esta en altura y arriba de unos caños finos, la vuelta con caida de precision son caracteristicas que destacan en este caso a Nate Weston', 3),
(5, 'kong', 'kong.jpg', 'el salto kong puede ser utilizado en diversos entornos, no necesariamente debemos conseguir altura para realizarlo, en este caso es entre casas que se utiliza el kong y aun asi es mas dificil si el nivel del piso es inferior al que se venia corriendo', 3),
(7, 'pasavalla', 'pasavallas.jpg', 'el pasavallas es uno de los primeros movimientos en podes aprender, mas basico y mas utilizados para completar un circuito, nos ayuda a recuperar energias por lo simple', 1),
(7, 'precision', 'precision.jpg', 'Para realizar con tranquilidad los circuitos, debemos trabajar mucho en la precision ya que la misma fatiga nos la puede quitar y facilita a lastimarnos por confianza en cansancio, uno de los saltos mas trabajados', 1),
(4, 'rompemuñecas', 'rompe.jpg', 'rompe muñecas, su nombre no es en vano, los malos movimientos o inseguros a realizar el salto nos puede dejar secuelas graves, parece facil pero debemos entrenar las muñecas para esperar el peso de nuestro cuerpo en movimiento', 3),
(11, 'run', 'run-alto.jpg', 'a comparacion del otro run, este es realizado sobre altura, corre una distancia de 50m entre las columnas visibles', 3),
(11, 'saltobrazo', 'saltobrazo-alto.jpg', 'este salto de brazo es desde una larga distancia para poder llegar al paredón y luego ejerce la fuerza necesaria de brazos para subir', 2),
(3, 'sideflip', 'sideflip.jpg', 'Realiza sideflip que es la acrobacia de medialuna con altura, similar a la vuelta frontal pero es una medialuna el cual al mismo tiempo salta la reja y logra buscar precisión en la caída.', 3),
(1, 'siluetas', 'siluetas.jpg', 'son unas simples silutas de parkour', 0),
(1, 'yamakasi', 'yamakasi.jpg', 'es la foto que representa al primer grupo de parkour autollamados \"yamakasi\", ademas se encuentra una pelicula sobre ellos y aun hay grupos que forman parte hoy en dia', 4);