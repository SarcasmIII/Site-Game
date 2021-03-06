-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 27 2019 г., 15:33
-- Версия сервера: 5.6.43
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gameguide2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `game`
--

CREATE TABLE `game` (
  `game_id` int(128) NOT NULL,
  `game_name` varchar(128) NOT NULL,
  `game_slug` varchar(128) NOT NULL,
  `game_image` varchar(256) NOT NULL,
  `game_description` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `game`
--

INSERT INTO `game` (`game_id`, `game_name`, `game_slug`, `game_image`, `game_description`) VALUES
(1, 'Mobile Legends: Bang Bang', 'mobile-legends-bang-bang', 'image/logo-ml2.png', 'многопользовательская мобильная игра в жанре multiplayer online battle arena (MOBA), разработанная и изданная Shanghai Moonton Technology. Игра стала популярной в Юго-Восточной Азии.'),
(2, 'League of Legends', 'league-of-legends', 'image/logo-lol.png', 'ролевая видеоигра с элементами стратегии в реальном времени (MOBA), разработанная и выпущенная компанией Riot Games 27 октября 2009 года для платформ Microsoft Windows и Apple Macintosh. Игра распространяется по модели free-to-play. Ежемесячная аудитория игры составляет 100 млн игроков по всему миру (сентябрь 2016).'),
(3, 'Defense of the Ancients', 'defense-of-the-ancients', 'image/logo-dota.png', 'компьютерная многопользовательская командная игра в жанре multiplayer online battle arena, разработанная корпорацией Valve. Игра является продолжением DotA — пользовательской карты-модификации для игры Warcraft III: Reign of Chaos и дополнения к ней Warcraft III: The Frozen Throne. Игра изображает сражение на карте особого вида; в каждом матче участвуют две команды по пять игроков, управляющих «героями» — персонажами с различными наборами способностей.');

-- --------------------------------------------------------

--
-- Структура таблицы `heroes`
--

CREATE TABLE `heroes` (
  `hero_id` int(10) UNSIGNED NOT NULL,
  `hero_name` varchar(128) DEFAULT NULL,
  `game_name` varchar(128) DEFAULT NULL,
  `hero_image` varchar(256) DEFAULT NULL,
  `hero_description` varchar(512) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `heroes`
--

INSERT INTO `heroes` (`hero_id`, `hero_name`, `game_name`, `hero_image`, `hero_description`) VALUES
(1, 'Линг', 'Mobile Legends: Bang Bang', 'image/ling/hero.jpg', 'Late-game персонаж. Большое количество эскейпов, самое быстрое передвижение по карте и бурст урон делают его одним из самых сильных и страшных убийц.'),
(2, 'Икс.Борг', 'Mobile Legends: Bang Bang', 'image/xborg/hero.jpg', 'Сильный герой-боец в любой стадии игры. Он уникален своим пассивным щитом и постоянным чистым уроном.'),
(3, 'Грейнджер', 'Mobile Legends: Bang Bang', 'image/granger/hero.jpg', 'Стрелок, который основной урон наносит своими скиллами. А также имеет очень дальний урон с ультимативной способности.'),
(4, 'Лилия', 'Mobile Legends: Bang Bang', 'image/lylia/hero.jpg', 'Сильный маг с АОЕ нарастающим уроном.'),
(5, 'Рафаэль', 'Mobile Legends: Bang Bang', 'image/rafaela/hero.jpg', 'Хорошая поддержка в трипл мид. Имеет как хил и ускорение для союзных персонажей, так и замедление со станом для вражеских героев.'),
(6, 'Грок', 'Mobile Legends: Bang Bang', 'image/grock/hero.jpg', 'Танк с сильнейшим уроном в игре. Имеет и подбрасывание и анти-контроль.'),
(7, 'Windranger', 'Defense of the Ancients', 'image/hero.jpg', 'герой с дальним типом атаки, основной характеристикой которого является интеллект. Она имеет четыре способности, каждая из которых является активной');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_name` varchar(128) NOT NULL,
  `game_name` varchar(128) NOT NULL,
  `post_image` varchar(256) NOT NULL,
  `post_text` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`post_id`, `post_name`, `game_name`, `post_image`, `post_text`) VALUES
(1, 'Ling', 'Mobile Legends: Bang Bang', 'image/ling/hero.jpeg', 'At the top of the mountains enshrouded by the clouds, lies the entrance to the Hidden Land of the Dragon - the \"Sky Arch\". Beside the Sky Arch stood many assassins in black. The cyan embroidery etched on their clothes identified them to being part of the most mysterious assassin faction of the Cadia Riverlands, the \"Finch\". Legends say, it\'s impossible to escape the claws of the Finch. After a while, a man landed beside the Sky Arch. With his lithe footwork, he didn\'t create any ripples on the lake of the clouds. The man was the Finch\'s best assassin known as the \"Cyan Finch\". Without hesitation, he swung his Defiant Sword, generating great energy and opening the Sky Arch. The assassins behind him dashed across the arch and entered the Hidden Land of the Dragon. As a perfect assassin, Cyan Finch couldn\'t tolerate failure. This was the same. However, the Hidden Land had many occult traps and enchantments to resist invaders, which made the assassins to lose their wings and fall from the sky. Even so, those traps could not stop the Cyan Finch at all. His light feet glided over the perils and past into the Hidden Land.'),
(2, 'Masha', 'Mobile Legends: Bang Bang', 'image/Masha/hero.jpeg', 'There was a land in the far north called Nost Gal, where it was winter snow all year round. It was also known as the land closest to the Frozen Sea. In Nost Gal\'s long history was a mythical Bear.\r\n\r\nIn the early days of Nost Gal, there were thousands of bears that lived and fought with the people of Nost Gal. With the help of the bears, they were able to survive in the world full of ice and snow. Then, there was a young Masha, who was a descendant of famous hunters in Nost Gal. She had a special ability to talk with the bears. She thought that the spirit of bears - to forever fight without giving up - was the spirit of Nost Gal.\r\n\r\nSoon, people in Nost Gal discovered the ancient \"Beast Power\" of the Bear, which was believed to have helped these bears protect themselves and live long. In order to get and harness this power, people of Nost Gal began to kill bears and consequently started a war with the bears. The Bear King found that the bears were no longer respected by the people of Nost Gal. He led his bears to resist and even attacked Nost Gal. The friendship between Nost Gal and the bears was totally broken. Masha knew how important the bears were to the people of Nost Gal. She started to rescue these bears by herself and helped them return to their Bear King. This enraged the people of Nost Gal. They not only decided to continue slaughtering the bears but also to arrest Masha. However, the Bear King knew everything the Nost Gal people did and decided to punish the Nost Gal people by releasing the ancient power of Bear to transform those people who attacked the bears into a \"Human-Bear Hybrid\".\r\n\r\nMasha watched her people die. She decided to stop the bear invasion after escaping from Nost Gal. She intended to solve the conflict between Nost Gal and the bears. However, she was too weak to fight against the Bear King. Many bears followed their Bear king and attacked Masha. No matter how many times she was knocked down, Masha stood up and tried to find a way to defeat the Bear King. She used her special ability to communicate with the bears and let the bears fight against each other. When the chance came, Masha gave a final blow and defeated the Bear King.\r\n\r\nMasha could have defeated the Bear King, but the power of the Bear King was about to hit those innocent bears. She chose to protect the innocent. She was hit by the Bear King and fell down on the ground. The Bear King stopped his attack when he saw Masha getting hurt and finally forgave the Nost Gal people. He healed Masha with an ancient power, which also gave her 3 lives. The Bear King promised to Masha that there would be no war between the bears and Nost Gal. Masha became the only power of the bears with which she would continue to use to protect Nost Gal The Nost Gal people and the bears lived in harmony.');

-- --------------------------------------------------------

--
-- Структура таблицы `skills`
--

CREATE TABLE `skills` (
  `X` int(11) NOT NULL,
  `hero_id` int(11) NOT NULL,
  `skill_name` varchar(128) NOT NULL,
  `skill_image` varchar(256) NOT NULL,
  `skill_description` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `skills`
--

INSERT INTO `skills` (`X`, `hero_id`, `skill_name`, `skill_image`, `skill_description`) VALUES
(1, 1, 'Ходок в облаках', 'image/ling/skill01.png', 'Превосходный навык лёгкости Линга помогает ему перемещаться по стенам в погоне за врагами. Отдыхая на стене, Линг восстанавливает дополнительно 2 Очка Лёгкости в секунду. Каждый раз, нанося урон врагам, он восстанавливает дополнительно 5 Очков Лёгкости.\r\n\r\nНавык Лёгкости Линга наделяет его 20% Шансом Критического Удара, но снижает Критический Урон на 40%.'),
(2, 1, 'Повадки Зяблика', 'image/ling/skill02.png', 'Пассивный: Навсегда увеличивает Критический Шанс на 5%.\r\n\r\nАктивный: Линг использует свой Цигун (навык лёгкости), прыгая к выбранной стене, входя в состояние маскировки и восстанавливая Очки Лёгкости намного быстрее. Когда Линг получает урон, он выйдет из состояния маскировки. Если он попадет под контроль, то упадет на землю. Использование этого навыка, чтобы прыгать с одной стены на другую сбросит перезарядку Состояния Маскировки.'),
(3, 1, 'Дерзкий Клинок', 'image/ling/skill03.png', 'Линг делает рывок в определенном направлении и атакует врагов на пути, нанося n(+65% Общая Физическая Атака) Урона.\r\n\r\nЕсли Линг использует навык, находясь на стене, он устремится в определённую точку на земле нанося n(+65%Общая Физическая Атака) Урона врагам в небольшой области и замедляя их на 30% на 1.5сек. Если эта атака наносит Критический Урон, враги в области получат дополнительное замедление на 45% на 0.75сек.'),
(4, 1, 'Ураган Клинков', 'image/ling/skill04.png', 'Линг вскакивает и демонстрирует превосходное владение клинком в течении 1.5 сек., становясь неуязвимым и способным свободно перемещаться, нанося n(+120% Общая Физическая Атака) единиц Урона врагам в области и подбрасывая центрального врага в воздух на 1 сек., а такаже создавая Поле Клинков, которое длится 5 сек. На пике Поля Клинков будут 4 ока Урагана Клинков. Касаясь центра поля, Линг может сбросить перезарядку Дерзкого Клинка и восстановить 5 Очков Лёгкости.'),
(5, 2, 'Доспехи Фирага (пассивный)', 'image/xborg/skill01.png', 'Доспехи Фирага получат его Макс. ОЗ и берут на себя весь урон вместо героя. Когда у Доспехов закончатся ОЗ, Икс.Борг сделает кувырок влево, чтобы снять их. В это время он не получит урона. Затем он продолжит восстанавливать энергиюв Состоянии без Брони. Когда энергия заполнится, герой снова наденет Доспехи и восстановит их до 30% его Макс. ОЗ. Огненный урон Икс.Борга заставит врагов перегреться. От врагов с наивысшей температурой будут выпадать элементы снабжения Фирага, когда они получат урон от пламени. '),
(6, 2, 'Огненные Ракеты', 'image/xborg/skill02.png', 'Икс.Борг активирует огнемет и выпускает пламя в определенном направлении, нанося n(+50% Общая Физическая Атака) очков Физического Урона в течении 2с. Враги, чья температура достигнет предела, получат Чистый Урон и будут замедлены на 20%.\r\n\r\nБез Брони: Икс.Борг настраивает огнемет на меньший угол и большую дальность атаки, снижая урон на 60: от урона в Режиме Брони.'),
(7, 2, 'Огненный Кол', 'image/xborg/skill03.png', 'Икс.Борг выпускает 6 огненных кольев в вееобразной области, возвращая их спустя 1.7с, нанося каждым n(+20% Общая Физическая Атака) единиц Физического Урона врагам по пути и притягивая их к себе, так же возвращая части Брони Фирага.\r\n\r\nБезоружное Состояние: Икс.Борг регулирует пусковую установку, чтобы пускать колья дальше и уменшить разрыв между ними.'),
(8, 2, 'Последнее Безумие', 'image/xborg/skill04.png', 'Икс.Борг бросается вперед в указанном направлении, выпуская огонь вокруг себя, чтобы нанести n(+100% Дополнительная Физическая Атака) единиц Физического Урона и замедляя врагов на 25%. Если в это время он задевает врага, то остановится и замедлит цель на 40%. Длится 3 сек. Затем он взрывается, чтобы нанести n и 15% Чистого Урона от макс. ОЗ цели. Взрыв разрушает текущую Броню Фирага, наносит 50% урона и вводит его в Состояние Без Брони, в котором нельзя использовать навыки.'),
(9, 3, 'Каприс', 'image/granger/skill01.png', 'Грейнджер может заполнить свой пистолк до 6 пуль одновременно. Каждая 6-ая пуля наносит Критический Урон. Базовая Атака Грейнджера наносит больше урона, но он получает 50% Скорости Атаки от Снаряжения или Эмблем.'),
(10, 3, 'Рапсодия', 'image/granger/skill02.png', 'Грейнджер заполянет свой пистолет всеми пулями и выстреливает их вперед. Каждая пуля наносит врагам n(+80% Общая Физическая Атака) единиц Физического Урона.'),
(11, 3, 'Рондо', 'image/granger/skill03.png', 'Грейнджер быстро перемещается в указанном направлении и его следующие 2 Базовые Атаки наносят дополнительно 10% урона в течении 5 сек. Каждый раз когда Рапсодия попадает по врагу, перезарядка этого навыка уменьшается на 0.5 сек.'),
(12, 3, 'Смертельная Соната', 'image/granger/skill04.png', 'Грейнджер превращает свою скрипку в супер пушку и полностью заряжает её пулями. После он сразу стреляет 2 Пулями вперед. Супер Пуля игнорирует миньонов на пути и поражает только врагов. Супер Пули взорвутся при попадании в первого врага, нанося n(+100% Общая Физическая Атака) единиц Физического Урона врагам поблизости и замедляя их на 80%. Каждый раз, когда Грейнджер стреляет Супер Пулей, он может двинуться в другом направлении. '),
(13, 4, 'Рассерженный Глум (пассивный)', 'image/lylia/skill01.png', 'Лилия получает энергию от Глума, увеличивая свою скорость передвижения на 15%. Каждый раз, когда она повышает уровень Глума, она увеличивает Скорость Передвижения на дополнительные 5%.\r\nГлум будет повышать свои уровни, поглощая Теневую Энергию. До 5 раз. Чем выше его уровень, ем больше урона он может наносить.'),
(14, 4, 'Волшебная ударная вола', 'image/lylia/skill02.png', 'Лилия выпускает ударную волну впереди себя, нанося n(+100% Всей Магической Силы) единиц Магического Урона врагам на пути и замедляя их на 40%. Длится 1.3 сек.\r\nГлум прокатится по Волшебной Ударной Волне. Если Глум коснется Теневой Энергии, он поглотит ее и немедленно взорвет энергию.'),
(15, 4, 'Теневая Энергия', 'image/lylia/skill03.png', 'Лилия сгущает Теневую Энергию в выбранную область, нанося n(+50% Всей Магической Силы) единиц Магического Урона врагам поблизости и замедляя их на 80%. n(+100% Всей Магической Силы) единиц Магического Урона врагам поблизости. Каждый раз, когда Глум усиливает себя, урон, наносимый Теневой Энергией будет увеличиваться на 30%. Вплоть до 120%.\r\nЛилия была рождена чтобы иметь способность использовать Теневую Энергию.'),
(16, 4, 'Возвращение к тапкам(?)', 'image/lylia/skill04.png', 'Лилия немедленно возвращается на место, где были Черные Башмаки 4 сек. назад и суммирует максимальное количество Теневой Энергии, восстанавливая 10% от Макс. ОЗ и увеличивая свою Скорость Передвижения на 20%. Длится 2 сек.'),
(17, 5, 'Божественное Наказание (пассивный)', 'image/rafaela/skill01.png', 'Рафаэль наказывает цель, которая ее убила (цель должна находиться в пределах определенного диапазона). Она заряжает в течении 2 сек., а затем высвобождает мощную силу, нанося Чистый Урон, равный 20% максимальных ОЗ цели. Он может быть заблокирован другими вражескими героями. Навык работает только на вражеских героях.'),
(18, 5, 'Свет Возмездия', 'image/rafaela/skill02.png', 'Рафаэль использует силу Священного Света, чтобы нанести n(+120% Всей Магической Силы) единиц Магического Урона трем ближайшим врагам, раскрывая их местонахождение на короткий период времени, и уменьшает их скорость передвижения на 40% в течении 1.5 сек. Если навык попадает в ту же цель в течение следующих 5 сек., то урон от этого навыка увеличивается на 20%. Суммируется до 3 раз.'),
(19, 5, 'Святое Исцеление', 'image/rafaela/skill03.png', 'Рафаэль призывает Священный Свет, чтобы восстановить n(+50% Всей Магической Силы) единиц ОЗ для себя, а также для наиболее раненого союзника. Восстанавливает n(+25% Всей Магической Силы) ОЗ другим ближайшим союзным героям. Увеличивает скорость их передвижения на 50% в течении следующих 1 сек.'),
(20, 5, 'Святое Крещение', 'image/rafaela/skill04.png', 'Рафаэль использует силу Священного Света, чтобы наказать врагов перед собой, нанося n(+120% Всей Магической Силы) единиц Магического Урона и оглушая их на 1.5 сек., в то же время замедляя их на 40%.'),
(21, 6, 'Дар Предков (пассивный)', 'image/grock/skill01.png', 'Когда Грок находится вблизи стены или башни, его Скорость Передвижения увеличится на 10%, он также получит увеличенную на 15 (+8*Уровень Героя) единиц Физическую и Магическую защиту и увеличенное на 15(+8*Уровень Героя) единиц восстановление ОЗ.'),
(22, 6, 'Сила Природы', 'image/grock/skill02.png', 'Грок поднимает оружие, чтобы смести ближайших врагов, нанося n(+40% Дополнительная Физическая Атака) единиц Физического Урона и замедляя их на 40%. Длится 2 сек. Урон увеличивается со временем зарядки.\r\nОставайтесь возле стены во время использования навыка Сила Природы, чтобы быть невосприимчивым к Эффектам Контроля. '),
(23, 6, 'Барьер Стража', 'image/grock/skill03.png', 'Грок создает ударную волну по направлению цели, нанося n(+50% Общая Физическая Атака) единиц Физического Урона. Ударная волна становится каменной стеной, блокирующей врагов на 5 сек.'),
(24, 6, 'Дикий Разбег', 'image/grock/skill04.png', 'Грок срывается вперед, нанося n(+5% Общая Физическая Атака) единиц Физического Урона врагам на пути. Врезавшись в стену или башню нанесет n(+150% Общая Физическая Атака) единиц Физического Урона ближайшим врагам и уменьшит время восстановления этого навыка на 30%.'),
(25, 7, 'Shackleshot', 'image/skill01.png', 'Связывает цель с вражеским юнитом или деревом, находящимся позади. Если сзади цели нет дерева или юнита, то время оглушения сократится до 0.75 секунды.'),
(26, 7, 'Powershot', 'image/skill02.png', 'Windranger заряжает свой лук в течение одной секунды, чтобы произвести один мощный выстрел, урон которого увеличивается по мере зарядки. Стрела наносит урон вражеским существам и разрушает деревья на своем пути. За каждого врага, в которого попадет стрела, ее урон будет снижен на 20%.'),
(27, 7, 'Windrun', 'image/skill03.png', 'Увеличивает скорость передвижения и позволяет увернуться от всех физических атак, замедляя скорость передвижения у врагов поблизости.'),
(28, 7, 'Focus Fire', 'image/skill04.png', 'Windranger направляет ветер, повышая свою скорость атаки по одному вражескому существу или сооружению на 475, но теряя часть урона от атак. Дополнительный урон от эффектов предметов не уменьшается. Длится 20 секунд.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD UNIQUE KEY `game_slug` (`game_slug`);

--
-- Индексы таблицы `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`hero_id`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Индексы таблицы `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`X`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `heroes`
--
ALTER TABLE `heroes`
  MODIFY `hero_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `skills`
--
ALTER TABLE `skills`
  MODIFY `X` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
