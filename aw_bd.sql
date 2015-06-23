-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2015 a las 20:26:07
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aw_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
`id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `texto` varchar(2500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_comment`, `id_user`, `fecha`, `texto`) VALUES
(1, 4, '2015-06-23 19:37:53', '¡Me encanta esta serie!'),
(2, 2, '2015-06-23 19:46:57', 'Estos llaveros son preciosos, los recomiendo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_content`
--

CREATE TABLE IF NOT EXISTS `comments_content` (
  `id_content` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments_content`
--

INSERT INTO `comments_content` (`id_content`, `id_comment`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments_merchandising`
--

CREATE TABLE IF NOT EXISTS `comments_merchandising` (
  `id_comment` int(11) NOT NULL,
  `id_merchansing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comments_merchandising`
--

INSERT INTO `comments_merchandising` (`id_comment`, `id_merchansing`) VALUES
(2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE IF NOT EXISTS `content` (
`id_content` int(11) NOT NULL,
  `tipo` int(3) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `caratula` varchar(50) NOT NULL,
  `sinopsis` varchar(2500) NOT NULL,
  `descripcion` varchar(2500) NOT NULL,
  `fechaestreno` date DEFAULT NULL,
  `director` varchar(100) NOT NULL,
  `duracion` int(11) NOT NULL,
  `valoracionpagina` int(11) NOT NULL,
  `publicado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `content`
--

INSERT INTO `content` (`id_content`, `tipo`, `titulo`, `caratula`, `sinopsis`, `descripcion`, `fechaestreno`, `director`, `duracion`, `valoracionpagina`, `publicado`) VALUES
(1, 1, 'TrueBlood', 'img/series/TrueBlood.jpeg', 'True Blood es una serie de televisión original de HBO creada por Alan Ball basada en la franquiciaThe Southern Vampire Mysteries de Charlaine Harris Su argumento se centra en un conservador pueblo de Luisiana llamado Bon Temps y en cómo su gente debe adaptarse y enfrentarse a los cambios que se han producido en la sociedad desde que los vampiros salieron a la luz pública y en especial en cómo las criaturas de la noche y su mundo afectan a la vida de una camarera con poderes telepáticos llamadaSookie Stackhouse', 'Suspense', '2008-01-01', 'Alan Ball', 200, 4, 0),
(2, 1, 'Homeland', 'img/series/Homeland.jpeg', 'Homeland es una serie de drama thriller desarrollada para la television estadounidense por Howard Gordon y Alex Gansa basada en la serie israelí Hatufim  creada por Gideon Raff La serie estadounidense está protagonizada por Claire Danes como Carrie Mathison una agente de la Agencia Central de Inteligencia que ha llegado a creer que un marine estadounidense que fue hecho prisionero de guerra de AlQaeda se convirtio en el enemigo y ahora representa un riesgo significativo para la seguridad nacional', 'Suspense', '2008-01-01', 'Howard Gordon', 50, 2, 0),
(3, 1, 'The Strain', 'img/series/The Strain.jpg', 'Un avion de la aerolinea ficticia Regis Air International aterriza en el Aeropuerto Internacional JFK en Nueva York procedente de Berlin Se detiene inerte en la pista de aterrizaje y su interior esta lleno de cadaveres palidos Un extraño ataud lleno de tierra es hallado en el compartimento de equipaje Asi se produce la llegada de Jusef Sardu un vampiro conocido como El Amo  El Dr Goodweatherinvestiga lo que a primera vista parece ser un virus que causo la muerte de los pasajeros del avion ', 'Terror', '2014-01-01', 'Guillermo Del Toro ', 45, 4, 0),
(4, 1, 'Juego de tronos', 'img/series/Juego de tronos.jpg', 'La historia se desarrolla en un mundo ficticio de caracter medieval  Hay tres lineas argumentales en la serie  la crónica de la guerra civil dinastica por el control de Poniente entre varias familias nobles  la creciente amenaza de los Otros  apenas contenida por un inmenso muro de hielo que protege el Norte de Poniente  y el viaje de Daenerys Targaryen  la hija exiliada del rey que fue asesinado en una guerra civil anterior  que pretende regresar a Poniente para reclamar sus derechos  Tras un largo verano  el invierno se acerca a los Siete Reinos  Lord Eddard  Stark  señor de Invernalia  deja sus dominios para unirse a la corte de su amigo el rey Robert Baratheon  Stark es la Mano del Rey e intenta desentrañar una maraña de intrigas que pondra en peligro su vida y la de todos los suyos  Mientras tanto diversas facciones conspiran con un solo objetivo  apoderarse del trono', 'Fantástico', '2011-01-01', 'David Benioff', 55, 2, 0),
(5, 1, 'The Walking Dead', 'img/series/The Walking Dead.jpg', 'Tras un apocalipsis zombie  un grupo de supervivientes  dirigidos por el policía Rick Grimes  recorre los Estados Unidos para ponerse a salvo  Aunque el leit motiv de la serie  cuyo episodio piloto fue dirigido y escrito por Frank Darabont  sea el apocalipsis zombie  la narración se centra más en las relaciones entre los personajes  su evolución y comportamiento en las situaciones críticas  Entre ellos destaca el ayudante del sheriff de un pueblo de Georgia que entró en coma durante la catástrofe ', 'Fantástico', '2010-01-01', 'Robert Kirkman ', 45, 3, 0),
(6, 1, 'House of Cards', 'img/series/House of Cards.jpg', 'El implacable y manipulador congresista Francis Underwood  Kevin Spacey   con la complicidad de su calculadora mujer  Robin Wright   maneja con gran destreza los hilos de poder en Washington  Su intención es ocupar la Secretaría de Estado del nuevo gobierno  Sabe muy bien que los medios de comunicación son vitales para conseguir su propósito  por lo que decide convertirse en la garganta profunda de la joven y ambiciosa periodista Zoe Barnes  Kate Mara   a la que ofrece exclusivas para desestabilizar y hundir a sus adversarios políticos ', 'Fantástico', '2013-01-01', 'Beau Willimon ', 50, 2, 0),
(7, 1, 'The Big Bang Theory', 'img/series/The Big Bang Theory.jpg', ' Leonard  Johnny Galecki  y Sheldon  Jim Parsons  son dos cerebros privilegiados que comparten piso  Aunque los dos  doctores en Física  son capaces de calcular las probabilidades de existencia de otros mundos  no saben cómo relacionarse con los demás  especialmente con las chicas  Penny  Kaley Cuoco   una vecina recién llegada  es el polo opuesto a los dos amigos  de modo que su llegada altera la tranquila vida sentimental de Leonard y el desorden obsesivo compulsivo de Sheldon ', 'Comedia', '2007-01-01', 'Chuck Lorre ', 20, 3, 0),
(8, 1, 'Modern Family', 'img/series/Modern Family.jpg', 'Aclamada serie  es la sitcom mas premiada en los últimos años  que narra el día a día de una gran familias compuesta por Jay Pritchett  Ed ONeill  y su joven mujer Gloria Delgado  Sofia Vergara   madre de Manny  Rico Rodriguez   y al mismo tiempo muestra la vida de las dos familias compuestas por sus hijos ya adultos el abogado gay Mitchell  Jesse Tyler  ', 'Comedia', '2009-01-01', 'Steven Levitan ', 20, 4, 0),
(9, 1, 'La cupula', 'img/series/La cupula.jpg', 'Un tranquilo día de otoño la pequeña ciudad de Chesters Mill queda inexplicable y repentinamente aislada del resto del mundo por un campo de fuerza invisible Los aviones se estrellan y caen del cielo consumiéndose entre llamas la gente corre sin rumbo por el pueblo y los coches estallan al chocar contra un muro invisible', 'Suspense', '2013-01-01', 'Brian K Vaughan ', 60, 2, 0),
(10, 1, 'American Horror Story', 'img/series/American Horror Story.jpg', '  Coven cuenta la historia secreta de las brujas y la brujería en América  Muchos años han pasado desde los días turbulentos de los juicios a las brujas de Salem y las que lograron escapar ahora están en peligro de extinción  Misteriosos ataques han ido en aumento en contra de su clase y se están enviando las chicas más jóvenes a una escuela especial en Nueva Orleans para aprender a protegerse a sí mismas  Envuelto en el torbellino está la nueva llegada  Zoe  Farmiga   que está escondiendo un secreto terrible por su cuenta  Alarmada por las recientes agresiones  Fiona  Lange   la Suprema bruja que lleva largo tiempo ausente  regresa sorpresivamente a la ciudad  decidida a proteger el Coven y empeñada en destruir a quien sea que se interponga en su camino', 'Terror', '2013-01-01', 'Ryan Murphy ', 40, 1, 0),
(11, 1, 'Resurrection', 'img/series/Resurrection.jpg', 'Las vidas de los habitantes de Arcadia en el estado de Missouri cambian para siempre cuando sus fallecidos seres queridos regresan como no muertos', 'Fantástico', '2014-01-01', 'Daniel Attias', 43, 1, 0),
(12, 1, 'El mentalista', 'img/series/El mentalista.jpg', 'Patrick Jane es un hombre que trabaja como médium televisivo hasta que sufre un duro golpe cuando su mujer e hija son asesinadas  A partir de entonces  decide usar sus habilidades para ayudar a resolver casos de asesinato  trabajando como detective en el Departamento de Investigación de Crímenes de California  El agente Jane será capaz de ver aquello que los demás no pueden y sus poderes de observación y deducción le darán excelentes resultados   ', 'Suspense', '2008-01-01', 'Bruno Heller ', 43, 3, 0),
(13, 1, 'New Girl', 'img/series/New Girl.jpg', 'Jess  es una chica adorable que acaba de romper con su novio así que en un cambio de rumbo decide irse a compartir piso con tres atractivos chicos en busca de una nueva y diferente vida', 'Comedia', '2011-01-01', 'Elizabeth Meriwether', 43, 3, 0),
(15, 2, 'La isla minima', 'img/peliculas/La isla minima.png', 'Dos policías  ideológicamente opuestos  son enviados desde Madrid a un remoto pueblo del sur  situado en las marismas del Guadalquivir  para investigar la desaparición de dos chicas adolescentes  En una comunidad anclada en el pasado  tendrán que enfrentarse no sólo a un cruel asesino  sino también a sus propios fantasmas  ', 'Suspense', '2014-03-24', 'Alberto Rodríguez', 105, 3, 0),
(16, 2, 'Boyhood', 'img/peliculas/Boyhood.png', 'Es la historia de Mason  Ellar Coltrane  desde los seis años y durante una década poblada de cambios mudanzas y controversias  relaciones que se tambalean  bodas  diferentes colegios  primeros amores  también desilusiones  momentos maravillosos  de miedo y de una constante mezcla de desgarro y sorpresa  Un viaje íntimo y épico por la euforia de la niñez  los sísmicos cambios de una familia moderna y el paso del tiempo', 'Drama', '2014-09-23', 'Richard Linklater', 159, 5, 0),
(20, 1, 'El francotirador', 'img/series/El francotirador.jpg', 'Autobiografía del marine SEAL Chris Kyle  un tejano que batió el récord de muertes como francotirador del ejército norteamericano  Kyle fue enviado a Irak con la misión de proteger a sus compañeros  Su puntería y precisión milimétrica salvó incontables vidas en el campo de batalla  por lo que se ganó el apodo de  Leyenda  pero la noticia de sus hazañas llegó hasta las filas enemigas  Se puso precio a su cabeza y se convirtió en objetivo de los insurgentes  En Irak  Chris participó en cuatro peligrosas misiones  aplicando el principal lema de los marines  no dejar a ningún hombre atrás  mientras en casa le esperaban su mujer Taya  Sienna Miller  y sus dos hijos pequeños ', 'Bélico', '2014-01-01', 'Clint Eastwood', 120, 3, 0),
(21, 2, 'Relatos salvajes', 'img/peliculas/Relatos salvajes.jpg', 'La película consta de seis episodios que alternan la intriga, la comedia y la violencia. Sus personajes se verán empujados hacia el abismo y hacia el innegable placer de perder el control, cruzando la delgada línea que separa la civilización de la barbarie', 'Comedia', '2014-02-12', 'Damián Szifrón', 105, 2, 0),
(22, 2, 'Interstellar', 'img/peliculas/Interstellar.jpg', 'Al ver que la vida en la Tierra está llegando a su fin un grupo de exploradores liderados por el piloto Cooper  y la científica Amelia  se embarca en la que puede ser la misión más importante de la historia de la humanidad y emprenden un viaje más allá de nuestra galaxia en el que descubrirán si las estrellas pueden albergar el futuro de la raza humana', 'Ciencia ficción', '2014-02-12', 'Christopher Nolan', 140, 3, 0),
(23, 2, 'Dracula', 'img/peliculas/Dracula.jpg', 'Una historia original sobre Vlad Tepes o Vlad el Empalador el príncipe rumano en el que se inspiró Bram Stoker para escribir su célebre novela y crear al vampiro más famoso de todos los tiempos La película narra la trágica vida de Vlad qué dilemas tuvo que afrontar y cómo se convirtió en un vampiro ', 'Terror', '2013-01-01', 'Gary Shore', 92, 1, 0),
(24, 2, 'Annabelle', 'img/peliculas/Annabelle.jpg', 'John Form encuentra el regalo perfecto para su mujer embarazada Mia una preciosa e inusual muñeca vintage que lleva un vestido de novia blanco inmaculado Sin embargo la alegría de Mia al recibir a Annabelle no dura mucho Durante una espantosa noche la pareja ve como miembros de una secta satánica invaden su hogar y los atacan brutalmente No sólo dejan sangre derramada y terror tras su visita los miembros de la secta conjuran a un ente de tal maldad que nada de lo que han hecho se compara al siniestro camino a la maldición que ahora es Annabelle', 'Terror', '2014-02-12', 'John R Leonetti', 105, 3, 0),
(25, 2, 'El numero ', 'img/peliculas/El numero .jpg', 'Un hombre vive obsesionado con un libro que parece describir detalles de su vida íntima El hombre empieza a sentirse amenazado y se vuelve paranoico debido a un número que se repite una y otra vez en el libro', 'Thriller', '2007-04-24', 'Joel Schumacher', 104, 4, 0),
(26, 2, 'Intocable', 'img/peliculas/Intocable.jpg', 'Philippe  un aristócrata millonario que se ha quedado tetrapléjico a causa de un accidente de parapente  contrata como cuidador a domicilio a Driss  un inmigrante de un barrio marginal recién salido de la cárcel  Aunque  a primera vista  no parece la persona más indicada  los dos acaban logrando que convivan Vivaldi y Earth Wind and Fire  la elocuencia y la hilaridad  los trajes de etiqueta y el chándal  Dos mundos enfrentados que  poco a poco  congenian hasta forjar una amistad tan disparatada  divertida y sólida como inesperada  una relación única en su especie de la que saltan chispas ', 'Comedia', '2011-09-12', 'Olivier Nakache', 109, 3, 0),
(27, 2, 'Star wars', 'img/peliculas/Star wars.jpg', 'La saga de la guerra de las galaxias vuelve de nuevo con Star Wars El despertar de la fuerza la primera entrega de la tercera trilogía de la franquicia No sabemos si podremos disfrutar de los mismos personajes o los cambiarán lo que sí conocemos es que contaremos con la presencia de Harrison Ford haciendo de Han Solo En Star Wars VI pudimos ver como Luke Skywalker y sus amigos viajaban a Tatooine a salvar a Han Solo de las garras de Jabba el hutt', 'Fantástico', '1999-02-12', 'George Lucas', 120, 5, 0),
(28, 2, 'Los gremlins', 'img/peliculas/Los gremlins.jpg', 'La historia es narrada en forma de cuento con moraleja por el padre de un adolescente al que regalan por Navidad una extraña mascota llamada Gizmo La criatura pertenece a una especie animal que bajo determinadas circunstancias se transforma en un pequeño monstruo muy destructivo Por lo tanto la mascota exige de su cuidador una gran responsabilidad moraleja final de la historia', 'Terror Comedia', '1987-02-12', 'Joe Dante', 186, 3, 0),
(30, 2, 'Gru Mi villano favorito', 'img/peliculas/Gru Mi villano favorito.jpg', 'Ahora que el incansable y emprendedor Gru ha dejado atrás una vida dedicada a las fechorías para criar a Margo Edith y Agnes dispone de mucho tiempo libre para disfrutarlo con ellas el Dr Nefario y los minions Pero justo cuando empieza a adaptarse a su papel de hombre de familia una organización mundial ultrasecreta dedicada a la lucha contra el mal llama a su puerta Junto con su nueva compañera de aventuras Lucy Wilde Gru tendrá que descubrir quién es el responsable de un espectacular y malévolo plan y llevarlo ante la justicia Y es que hace falta echar mano del mayor ex villano del mundo para atrapar a quien aspira a ocupar ese lugar', 'Comedia Infantil', '2014-02-12', 'Pierre Coffin', 120, 4, 0),
(31, 2, 'Los vengadores', 'img/peliculas/Los vengadores.jpg', 'Cuando un enemigo inesperado surge como una gran amenaza para la seguridad mundial Nick Fury director de la Agencia SHIELD decide reclutar a un equipo para salvar al mundo de un desastre casi seguro Adaptación del cómic de Marvel Los Vengadores el legendario grupo de superhéroes formado por Ironman Hulk Thor y el Capitán América entre otros', 'Acción', '2012-04-24', 'Joss Whedon', 135, 3, 0),
(32, 2, 'Los cazafantasmas', 'img/peliculas/Los cazafantasmas.jpg', 'A los doctores Venkman Stantz y Spengler expertos en parapsicología no les conceden una beca de investigación que habían solicitado Al encontrarse sin trabajo deciden fundar la empresa Los Cazafantasmas dedicada a limpiar Nueva York de ectoplasmas El aumento repentino de apariciones espectrales en la ciudad será el presagio de la llegada de un peligroso y poderoso demonio', 'Aventura', '1984-02-12', 'Ivan Reitman', 120, 2, 0),
(33, 2, 'Mickey Mouse Get a Horse', 'img/peliculas/Mickey Mouse Get a Horse.jpg', 'Mickey su chica favorita Minnie Mouse y sus amigos el caballo Horace y la vaca Clarabella disfrutan de un viaje en carreta hasta que aparece el malvado Pete pata Palo', 'Infantil', '2013-02-12', 'Lauren MacMullan', 7, 4, 0),
(34, 3, 'Assasins Creed II', 'img/videojuegos/Assasins Creed II.jpg', 'está ambientada en el Renacimiento italiano y está pensada como la primera parte de una trilogía Continúa la historia de Desmond Miles quien después de haber sido forzado a revivir los recuerdos genéticos de su antepasado Altair', 'Secuela de la saga Assasins Creed', '2013-12-02', 'Patrice Désilets', 10, 2, 0),
(35, 3, 'Moto GP', 'img/videojuegos/Moto GP.jpg', 'Moto GP vuelve más grande y mejorado que nunca Nuevas características como la total personalización de moto piloto y equipo modos de carrera mejorados y nuevos modos de juego serán el cóctel perfecto que harán revolucionar la experiencia de la conducción sobre dos ruedas Siente la pasión del motociclismo y del Campeonato de MotoGP', 'Conducción', '2015-01-01', 'Milestone', 1, 1, 0),
(36, 3, 'Call of Duty', 'img/videojuegos/Call of Duty.jpg', 'Call of Duty es  una  serie  de  videojuegos  en  primera  persona de  estilo  bélico', 'Primera entrega del COD', '2003-01-01', 'Milestone', 1, 1, 0),
(37, 3, 'Fifa', 'img/videojuegos/Fifa.jpg', 'Simulación de deportes más concretamente de fútbol', 'Entrega del 2015 de FIFA', '2015-01-01', 'EA Sports', 1, 3, 0),
(38, 3, 'FarCry ', 'img/videojuegos/FarCry.jpg', 'Juego de acción FPS de mundo abierto.', 'Entrega 4 de la saga FarCry', '2014-01-01', 'Ubisoft', 1, 4, 0),
(39, 3, 'Just Dance', 'img/videojuegos/Just Dance.jpg', 'Juego de baile', 'Es el sexto juego de las series de Just Dance', '2014-01-01', 'Ubisoft', 1, 3, 0),
(40, 3, 'Dragon Age Inquisition', 'img/videojuegos/Dragon Age Inquisition.jpg', 'Juego de progresión ambientado en la saga Dragon Age.', 'Tercer Juego de la Saga Dragon Age de EA games.', '2015-01-01', 'EA Sports', 1, 5, 0),
(41, 3, 'Mortal Kombat', 'img/videojuegos/Mortal Kombat.jpg', 'Disfruta de la nueva generación de la franquicia de lucha numero uno', 'Mortal Kombat X reúne un aspecto cinematográfico y una mecánica de juego nunca vistos', '2015-04-13', 'Warner Bros', 1, 5, 0),
(42, 3, 'GTA', 'img/videojuegos/GTA.png', 'Juego de mundo abierto donde la libertad lo es todo.', 'En esta saga GTA intenta profundizar mucho más en sus antigua metodología mostrada en el San Andreas.', '2015-05-14', 'Rockstar North ', 1, 5, 0),
(43, 3, 'Bloodborne', 'img/videojuegos/Bloodborne.jpg', 'Videojuego exclusivo para playstation de los creadores de Demons Souls El título nos traslada al siglo XIX a una especie de oscuro y tétrico Londres victoriano donde encontraremos todos los ingredientes de la saga Souls exploración un online distintivo y unos enfrentamientos a vida o muerte', 'La gran diferencia es que Bloodborne se orienta al combate ofensivo arrebatándonos el escudo de entre las manos y obligándonos a atacar con las numerosas armas de fuego y nuevos movimientos', '2015-03-25', 'FromSoftware', 40, 3, 0),
(44, 3, 'Dark Souls', 'img/videojuegos/Dark Souls.jpg', 'Segunda parte de Dark Souls el RPG de From Software que sigue las bases impuestas por su inolvidable título original', 'En esta ocasión con una versión para consolas de nueva generación Uno de los juegos más desafiantes y adictivos que podemos encontrar dentro del ActionRPG que en esta edición trae consigo nuevos contenidos como eventos ingame para expandir la historia o NPCs extra', '2015-04-07', 'FromSoftware', 80, 4, 0),
(45, 3, 'Resident Evil Revelations', 'img/videojuegos/Resident Evil Revelations.jpg', 'Resident Evil Revelations vuelve a la carga con esta segunda entrega cargada de acción aventura y aroma clásico y que se distribuye tanto en formato físico en versión completa como en una edición digital que se puede adquirir en episodios', 'El juego tiene lugar entre los hechos sucedidos en Resident Evil y gira en torno a dos protagonistas principales Claire Redfield y Moira Burton hija de Barry Burton', '2015-02-25', 'Capcom', 15, 2, 0),
(46, 3, 'Los Sims', 'img/videojuegos/Los Sims.jpg', 'Cuarta entrega de esta popular serie de simuladores sociales', 'tendremos que lidiar con los problemas domésticos de una familia de sims mientras se relacionan con sus vecinos progresan en sus profesiones y amplían sus pertenencias materiales', '2014-08-04', 'EA', 1, 5, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_merchandising`
--

CREATE TABLE IF NOT EXISTS `content_merchandising` (
  `id_content` int(11) NOT NULL,
  `id_merchandising` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `content_merchandising`
--

INSERT INTO `content_merchandising` (`id_content`, `id_merchandising`) VALUES
(30, 1),
(27, 2),
(27, 5),
(28, 6),
(33, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content_ratings`
--

CREATE TABLE IF NOT EXISTS `content_ratings` (
`id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_content` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `details_order`
--

CREATE TABLE IF NOT EXISTS `details_order` (
`id_detorder` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_merchandising` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id_amigo1` int(11) NOT NULL,
  `id_amigo2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `friends`
--

INSERT INTO `friends` (`id_amigo1`, `id_amigo2`) VALUES
(5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `merchandising`
--

CREATE TABLE IF NOT EXISTS `merchandising` (
`id_merchandising` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `foto1` varchar(125) NOT NULL,
  `foto2` varchar(125) NOT NULL,
  `descripcion` varchar(2500) NOT NULL,
  `unidades` int(11) NOT NULL,
  `proveedor` varchar(75) NOT NULL,
  `precio` float NOT NULL DEFAULT '0',
  `valoracion` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `merchandising`
--

INSERT INTO `merchandising` (`id_merchandising`, `nombre`, `foto1`, `foto2`, `descripcion`, `unidades`, `proveedor`, `precio`, `valoracion`) VALUES
(1, 'Llavero minion', 'img/mercha/Llavero minion1.jpg', 'img/mercha/Llavero minion2.jpg', 'LLevalos contigo ya sea para ir al trabajo o al colegio o sácale una sonrisa a quien se los regales', 11, 'GAME', 4.95, 4),
(2, 'Reloj despertador Star wars', 'img/mercha/Reloj despertador Star wars1.jpg', 'img/mercha/Reloj despertador Star wars2.jpg', 'Reloj despertador del famoso robot de star wars.', 20, 'GAME', 39.99, 4),
(5, 'Chewbacca', 'img/mercha/Chewbacca1.jpg', 'img/mercha/Chewbacca2.jpg', 'Peluche de Chewbacca', 4, 'GAME', 10.95, 5),
(6, 'Taza de gremlins', 'img/mercha/Taza de gremlins1.jpg', 'img/mercha/Taza de gremlins2.jpg', 'Magnifica taza de gremlins', 10, 'GAME', 14.95, 4),
(7, 'Peluche disney', 'img/mercha/Peluche disney1.jpg', 'img/mercha/Peluche disney2.jpg', 'Magnifico peluche disney', 40, 'FNAC', 5.95, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `merchandising_ratings`
--

CREATE TABLE IF NOT EXISTS `merchandising_ratings` (
`id_rating` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_merchandising` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `precio` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `descripcion` varchar(2500) NOT NULL,
  `foto` varchar(50) NOT NULL DEFAULT 'img/perfil.jpg',
  `rol` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `nombre`, `apellidos`, `email`, `descripcion`, `foto`, `rol`) VALUES
(1, 'administrador', '$2y$10$mAt8/h/GxNryntBY/ApRkuVszHSesIM/qyhkytdxstcm4ejpfctA.', 'Administrador', 'Administrador', 'administrador@gmail.com', 'Este es el primer administrador', 'img/users/administrador.jpg', 2),
(2, 'laura01', '$2y$10$.5OOPrpNvxW/giAiiLsv/OcYg8vzM88PnzGJcE3adCuo4eO934whu', 'Laura', 'Perez Molina', 'laurap04@ucm.es', 'Este es un tipo de usuario con único rol de registrado', 'img/users/laura01.jpg', 1),
(3, 'administrador2', '$2y$10$slUYJt5hLIHBQWQuHWjev.Zo20BxOqmbQbaZe4OdwG7.GJPle2LYO', 'AdministradorDos', 'AdministradorDos', 'administrador2@gmail.com', 'Este es otro ejemplo de administrador', 'img/users/administrador2.jpg', 1),
(4, 'usuarioregistrado', '$2y$10$WnScTnWeWogBfqg2EAExCeBXP.CLwr0sQMaX4iT5FE6Nan8GLNMjm', 'Usuario', 'Registrado', 'usuario@gmail.com', 'Este es un usuario registrado', 'img/users/usuarioregistrado.jpg', 1),
(5, 'carlos1', '$2y$10$BU23cw3CynA0IdeFOMlMdOTgouq5vKSEOJxwhZu2ZR6BaJ9njg7ia', 'Carlos', 'Lopez', 'carlos@gmail.com', 'Estudiante de ingeniería informática¡Me encantan las películas! Enamorado de las buenas series.', 'img/users/carlos1.jpg', 1),
(6, 'christian1', '$2y$10$/QJIWGXdPJRTa9xBXiQ0HebCfggQsVhBJgobuPiGtyp02Gu/NG65K', 'Christian', 'Gonzalez', 'christian@gmail.com', 'Me encanta esta página!', 'img/users/christian1.jpg', 1),
(7, 'javi01', '$2y$10$7tJrKRa2ThgS8O3TtGiuiOegLc1FcXG5Rcw2kLPDMjyy9okRj7Z1a', 'Javier', 'Villarreal', 'javi@gmail.com', 'Me encanta este sitio web, arriba W&C', 'img/users/javi01.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id_comment`), ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `comments_content`
--
ALTER TABLE `comments_content`
 ADD PRIMARY KEY (`id_content`,`id_comment`), ADD KEY `id_comment` (`id_comment`);

--
-- Indices de la tabla `comments_merchandising`
--
ALTER TABLE `comments_merchandising`
 ADD PRIMARY KEY (`id_comment`,`id_merchansing`), ADD KEY `id_merchansing` (`id_merchansing`);

--
-- Indices de la tabla `content`
--
ALTER TABLE `content`
 ADD PRIMARY KEY (`id_content`), ADD UNIQUE KEY `titulo` (`titulo`);

--
-- Indices de la tabla `content_merchandising`
--
ALTER TABLE `content_merchandising`
 ADD PRIMARY KEY (`id_content`,`id_merchandising`), ADD KEY `id_content` (`id_content`,`id_merchandising`), ADD KEY `id_merchandising` (`id_merchandising`);

--
-- Indices de la tabla `content_ratings`
--
ALTER TABLE `content_ratings`
 ADD PRIMARY KEY (`id_rating`), ADD KEY `id_user` (`id_user`,`id_content`), ADD KEY `id_content` (`id_content`);

--
-- Indices de la tabla `details_order`
--
ALTER TABLE `details_order`
 ADD PRIMARY KEY (`id_detorder`,`id_order`), ADD KEY `id_merchandising` (`id_merchandising`), ADD KEY `id_merchandising_2` (`id_merchandising`), ADD KEY `id_merchandising_3` (`id_merchandising`), ADD KEY `id_merchandising_4` (`id_merchandising`), ADD KEY `id_order` (`id_order`);

--
-- Indices de la tabla `friends`
--
ALTER TABLE `friends`
 ADD PRIMARY KEY (`id_amigo1`,`id_amigo2`), ADD UNIQUE KEY `id_amigo2` (`id_amigo2`), ADD KEY `id_amigo1` (`id_amigo1`);

--
-- Indices de la tabla `merchandising`
--
ALTER TABLE `merchandising`
 ADD PRIMARY KEY (`id_merchandising`), ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `merchandising_ratings`
--
ALTER TABLE `merchandising_ratings`
 ADD PRIMARY KEY (`id_rating`), ADD KEY `id_user` (`id_user`,`id_merchandising`), ADD KEY `id_merchandising` (`id_merchandising`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id_order`,`id_user`), ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id_user`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username_2` (`username`), ADD UNIQUE KEY `username_3` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `content`
--
ALTER TABLE `content`
MODIFY `id_content` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT de la tabla `content_ratings`
--
ALTER TABLE `content_ratings`
MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `details_order`
--
ALTER TABLE `details_order`
MODIFY `id_detorder` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `merchandising`
--
ALTER TABLE `merchandising`
MODIFY `id_merchandising` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `merchandising_ratings`
--
ALTER TABLE `merchandising_ratings`
MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comments`
--
ALTER TABLE `comments`
ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comments_content`
--
ALTER TABLE `comments_content`
ADD CONSTRAINT `comments_content_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`) ON DELETE CASCADE,
ADD CONSTRAINT `comments_content_ibfk_2` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id_comment`) ON DELETE CASCADE;

--
-- Filtros para la tabla `comments_merchandising`
--
ALTER TABLE `comments_merchandising`
ADD CONSTRAINT `comments_merchandising_ibfk_1` FOREIGN KEY (`id_comment`) REFERENCES `comments` (`id_comment`) ON DELETE CASCADE,
ADD CONSTRAINT `comments_merchandising_ibfk_2` FOREIGN KEY (`id_merchansing`) REFERENCES `merchandising` (`id_merchandising`) ON DELETE CASCADE;

--
-- Filtros para la tabla `content_merchandising`
--
ALTER TABLE `content_merchandising`
ADD CONSTRAINT `content_merchandising_ibfk_1` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`) ON DELETE CASCADE,
ADD CONSTRAINT `content_merchandising_ibfk_2` FOREIGN KEY (`id_merchandising`) REFERENCES `merchandising` (`id_merchandising`) ON DELETE CASCADE;

--
-- Filtros para la tabla `content_ratings`
--
ALTER TABLE `content_ratings`
ADD CONSTRAINT `content_ratings_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
ADD CONSTRAINT `content_ratings_ibfk_2` FOREIGN KEY (`id_content`) REFERENCES `content` (`id_content`) ON DELETE CASCADE;

--
-- Filtros para la tabla `details_order`
--
ALTER TABLE `details_order`
ADD CONSTRAINT `details_order_ibfk_2` FOREIGN KEY (`id_merchandising`) REFERENCES `merchandising` (`id_merchandising`) ON DELETE CASCADE,
ADD CONSTRAINT `details_order_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE;

--
-- Filtros para la tabla `friends`
--
ALTER TABLE `friends`
ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`id_amigo1`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`id_amigo2`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

--
-- Filtros para la tabla `merchandising_ratings`
--
ALTER TABLE `merchandising_ratings`
ADD CONSTRAINT `merchandising_ratings_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE,
ADD CONSTRAINT `merchandising_ratings_ibfk_2` FOREIGN KEY (`id_merchandising`) REFERENCES `merchandising` (`id_merchandising`) ON DELETE CASCADE;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
