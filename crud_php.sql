-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Fev-2021 às 17:13
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud_php`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `site_depoiments`
--

CREATE TABLE `site_depoiments` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `office` varchar(200) NOT NULL,
  `depoiment` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_changer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `site_depoiments`
--

INSERT INTO `site_depoiments` (`id`, `name`, `office`, `depoiment`, `img`, `id_changer`) VALUES
(7, 'Satisth Patel', 'Founder e CEO, Huddle', ' Essa empresa é incrível. Cumpre o que promete. ', '16129697446023f7103a91a.jpeg', '4'),
(9, 'Mariana Borges', 'Sócio', ' Ótima empresa. ', '1612977462602415364db16.jpeg', '3'),
(10, 'Brendo Henrique', 'Founder e CTO, Huddle', '     Ótima empresa!!!  \r\nEu gostei muito de trabalhar com vocês!   ', '1613664539602e911b989ab.gif', '2'),
(11, 'Beth Ramon', 'Recruiter', ' Ótima empresa, quando tem problemas eles resolvem muito rápido.', '1613417651602accb3f0be2.jpeg', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.offices`
--

CREATE TABLE `tb_admin.offices` (
  `id` int(11) NOT NULL,
  `numberOffice` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.offices`
--

INSERT INTO `tb_admin.offices` (`id`, `numberOffice`, `name`) VALUES
(1, 1, 'Administrador'),
(2, 2, 'Sub-administrador'),
(3, 3, 'Normal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.online`
--

CREATE TABLE `tb_admin.online` (
  `id` int(11) NOT NULL,
  `ip` varchar(255) CHARACTER SET latin1 NOT NULL,
  `last_action` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.online`
--

INSERT INTO `tb_admin.online` (`id`, `ip`, `last_action`, `token`) VALUES
(3494, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3495, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3497, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3498, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3499, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3500, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3501, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3502, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3503, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3504, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3505, '192.168.0.106', '2021-02-18 13:10:56', '602e90d52ec98'),
(3506, '192.168.0.106', '2021-02-18 13:12:17', '602e91b549175'),
(3507, '192.168.0.106', '2021-02-18 13:12:17', '602e91b549175'),
(3508, '192.168.0.106', '2021-02-18 13:12:17', '602e91b549175'),
(3509, '192.168.0.106', '2021-02-18 13:12:17', '602e91b549175'),
(3510, '192.168.0.106', '2021-02-18 13:12:17', '602e91b549175'),
(3511, '192.168.0.106', '2021-02-18 13:12:26', '602e91e5369b7');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.usuarios`
--

CREATE TABLE `tb_admin.usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `img` varchar(255) NOT NULL,
  `office` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.usuarios`
--

INSERT INTO `tb_admin.usuarios` (`id`, `user`, `password`, `name`, `img`, `office`) VALUES
(1, 'admin', 'bruno', 'Bruno Souza', '161194452860145250be712.jpeg', 1),
(2, 'brendosouza', 'brendo', 'Brendo Henrique Santos Souza', '1611933656601427d8b8173.gif', 3),
(3, 'victoriaramos', 'victoria', 'Victória Ramos', '161193076560141c8d22fc1.gif', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin.visitas`
--

CREATE TABLE `tb_admin.visitas` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin.visitas`
--

INSERT INTO `tb_admin.visitas` (`id`, `ip`, `day`) VALUES
(1, '192.168.0.106', '2021-01-21'),
(8, '192.168.0.106', '2021-01-21'),
(9, '192.168.0.106', '2021-01-21'),
(10, '192.168.0.106', '2021-01-21'),
(11, '192.168.0.106', '2021-01-21'),
(12, '192.168.0.106', '2021-01-21'),
(13, '172.192.1.192', '2021-01-19'),
(14, '172.192.1.001', '2021-01-11'),
(15, '192.168.0.100', '2021-01-21'),
(16, '192.168.0.100', '2021-01-21'),
(17, '192.168.0.106', '2021-01-22'),
(18, '192.168.0.106', '2021-01-22'),
(19, '192.168.0.106', '2021-01-22'),
(20, '192.168.0.106', '2021-01-23'),
(21, '192.168.0.106', '2021-01-23'),
(22, '192.168.0.106', '2021-01-23'),
(23, '192.168.0.106', '2021-01-23'),
(24, '192.168.0.106', '2021-01-25'),
(25, '192.168.0.106', '2021-01-25'),
(26, '::1', '2021-01-26'),
(27, '::1', '2021-01-26'),
(28, '192.168.0.106', '2021-01-26'),
(29, '192.168.0.106', '2021-01-26'),
(30, '192.168.0.106', '2021-01-26'),
(31, '192.168.0.106', '2021-01-26'),
(32, '192.168.0.106', '2021-01-26'),
(33, '192.168.0.106', '2021-01-26'),
(34, '192.168.0.106', '2021-01-26'),
(35, '192.168.0.106', '2021-01-26'),
(36, '192.168.0.106', '2021-01-27'),
(37, '192.168.0.106', '2021-01-28'),
(38, '192.168.0.106', '2021-01-28'),
(39, '192.168.0.106', '2021-01-29'),
(40, '192.168.0.106', '2021-01-29'),
(41, '192.168.0.106', '2021-01-31'),
(42, '192.168.0.106', '2021-02-01'),
(43, '192.168.0.106', '2021-02-01'),
(44, '192.168.0.106', '2021-02-01'),
(45, '192.168.0.106', '2021-02-01'),
(46, '192.168.0.106', '2021-02-01'),
(47, '192.168.0.106', '2021-02-01'),
(48, '192.168.0.106', '2021-02-01'),
(49, '192.168.0.106', '2021-02-02'),
(50, '192.168.0.106', '2021-02-02'),
(51, '192.168.0.106', '2021-02-02'),
(52, '192.168.0.106', '2021-02-02'),
(53, '192.168.0.106', '2021-02-02'),
(54, '192.168.0.106', '2021-02-02'),
(55, '192.168.0.106', '2021-02-02'),
(56, '192.168.0.106', '2021-02-03'),
(57, '192.168.0.106', '2021-02-03'),
(58, '192.168.0.106', '2021-02-03'),
(59, '::1', '2021-02-04'),
(60, '192.168.0.106', '2021-02-04'),
(61, '192.168.0.106', '2021-02-04'),
(62, '192.168.0.106', '2021-02-04'),
(63, '192.168.0.106', '2021-02-04'),
(64, '192.168.0.106', '2021-02-04'),
(65, '192.168.0.106', '2021-02-04'),
(66, '192.168.0.106', '2021-02-05'),
(67, '192.168.0.106', '2021-02-05'),
(68, '192.168.0.100', '2021-02-05'),
(69, '192.168.0.106', '2021-02-08'),
(70, '192.168.0.106', '2021-02-10'),
(71, '192.168.0.106', '2021-02-11'),
(72, '192.168.0.106', '2021-02-12'),
(73, '192.168.0.106', '2021-02-12'),
(74, '192.168.0.106', '2021-02-12'),
(75, '192.168.0.106', '2021-02-15'),
(76, '192.168.0.106', '2021-02-16'),
(77, '192.168.0.100', '2021-02-16'),
(78, '192.168.0.106', '2021-02-16'),
(79, '192.168.0.106', '2021-02-16'),
(80, '192.168.0.106', '2021-02-16'),
(81, '::1', '2021-02-16'),
(82, '192.168.0.106', '2021-02-16'),
(83, '192.168.0.106', '2021-02-16'),
(84, '::1', '2021-02-16'),
(85, '192.168.0.106', '2021-02-16'),
(86, '192.168.0.106', '2021-02-16'),
(87, '192.168.0.106', '2021-02-16'),
(88, '192.168.0.106', '2021-02-16'),
(89, '192.168.0.106', '2021-02-16'),
(90, '192.168.0.106', '2021-02-16'),
(91, '192.168.0.106', '2021-02-17'),
(92, '::1', '2021-02-17'),
(93, '192.168.0.106', '2021-02-17'),
(94, '192.168.0.106', '2021-02-17'),
(95, '192.168.0.106', '2021-02-17'),
(96, '192.168.0.106', '2021-02-17'),
(97, '192.168.0.106', '2021-02-17'),
(98, '192.168.0.106', '2021-02-17'),
(99, '192.168.0.106', '2021-02-17'),
(100, '192.168.0.106', '2021-02-17'),
(101, '192.168.0.106', '2021-02-17'),
(102, '192.168.0.106', '2021-02-17'),
(103, '192.168.0.106', '2021-02-17'),
(104, '192.168.0.106', '2021-02-18'),
(105, '192.168.0.106', '2021-02-18'),
(106, '192.168.0.106', '2021-02-18'),
(107, '192.168.0.106', '2021-02-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.contact`
--

CREATE TABLE `tb_site.contact` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `body` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.contact`
--

INSERT INTO `tb_site.contact` (`id`, `name`, `email`, `body`, `date`) VALUES
(3, 'Lucas Silva', 'luquinhas078@hotmail.com', 'Olá, eu sou um motorista particular. Fiquei sabendo que vocês estão precisando de um. ENtrar em contato por favor, meu número é 9129012901', '2021-01-23'),
(7, 'Jonatas Souza', 'jonatasjsouza@gmail.com', 'Olá, eu sou um torneiro mecânico. <p>\r\nVel donec mauris eu quam euismod praesent nunc diam auctor, hendrerit molestie quam massa torquent dui mollis eget sem, sed curabitur interdum etiam interdum turpis porta semper. \r\nut cubilia aliquam pharetra suscipit dolor arcu sollicitudin, hac cras iaculis vivamus sem fusce, nostra phasellus mattis sagittis metus blandit. \r\npellentesque tempus magna ligula tempus praesent quam duis aenean ligula, venenatis donec sem fusce etiam mattis non elementum et purus, luctus malesuada aliquam euismod dolor fringilla a scelerisque. \r\nsociosqu primis lacinia egestas porttitor eget non, metus pulvinar ultricies aenean nam venenatis, curae nec fermentum faucibus lectus. \r\n</p>\r\n<p>\r\nVehicula praesent semper pellentesque ad sagittis odio euismod class rutrum senectus himenaeos accumsan morbi, vivamus ullamcorper velit mauris et aliquam quisque maecenas litora phasellus turpis. \r\ntincidunt purus eu adipiscing pellentesque vulputate ante tortor, nisi fames eros justo venenatis tellus adipiscing sodales, imperdiet eros sollicitudin elementum accumsan elit. \r\nadipiscing dapibus inceptos mollis placerat elit elementum nam, augue metus at aenean semper sociosqu scelerisque cras, posuere augue laoreet libero integer tincidunt. \r\nvarius tempus laoreet massa lacinia himenaeos vel urna commodo, quis lobortis ac integer erat donec nostra leo ultricies, neque pulvinar adipiscing duis sem faucibus aliquam. \r\n</p>\r\n<p>\r\nClass auctor ultricies cubilia pharetra interdum suspendisse hendrerit, eros rutrum lacinia donec vulputate tortor, nec aenean etiam senectus sit quam. \r\nsed aliquet arcu tempus torquent luctus euismod rutrum massa risus nibh rhoncus dictumst, nec diam vitae tortor vestibulum suscipit interdum amet ultrices nunc convallis vel, conubia consectetur odio aptent potenti mi donec neque duis nec sit. \r\nnon porta conubia pulvinar phasellus quisque pretium placerat phasellus donec, curabitur quam odio eleifend etiam purus quisque aptent, dictum urna orci in ultricies rutrum duis integer. \r\nerat laoreet inceptos convallis consequat nisi cursus, curabitur nibh urna ut est, eget proin quis ut semper. \r\n</p>\r\n<p>\r\nJusto massa ultricies integer aptent tempor euismod neque id, metus porttitor etiam in consectetur eu felis iaculis consectetur, habitant duis sem velit senectus nulla at. \r\net malesuada fusce dictumst placerat fringilla curabitur ullamcorper, nullam etiam fames vitae gravida nostra metus, varius potenti conubia blandit mi congue. \r\nnisl sapien mauris inceptos et gravida integer per nisi, laoreet sodales platea quisque aliquet curabitur et nulla et, mattis habitant dictumst platea cras curabitur per. \r\nhabitasse senectus amet curabitur porttitor adipiscing platea nisi at sodales fames conubia, ipsum metus risus commodo sem consectetur volutpat et nullam viverra. \r\n</p>\r\n<p>\r\nMollis auctor pulvinar velit class accumsan facilisis, fringilla ad justo quisque phasellus, curae scelerisque viverra vivamus vehicula. \r\naccumsan primis blandit interdum suscipit pellentesque lacinia himenaeos posuere ullamcorper augue est augue conubia himenaeos donec, fermentum ornare tortor enim rhoncus nulla dui cras conubia mollis vehicula aliquet netus quam. \r\netiam maecenas condimentum dictumst potenti inceptos ut sit turpis, magna commodo id quisque vel venenatis placerat erat aliquet, gravida pulvinar volutpat inceptos accumsan ullamcorper nisl. \r\nsagittis duis justo ante ultrices aliquet nullam interdum lobortis sit adipiscing vestibulum, consequat porta nullam etiam egestas malesuada aenean ultricies aliquam enim. \r\n</p>\r\n<p>\r\nOdio lacus quisque aliquam vehicula consequat nisi leo libero risus etiam venenatis, vulputate ante inceptos cursus urna tempus justo nullam sem eleifend, bibendum eu hac lacinia sociosqu curabitur turpis vel placerat quis. \r\nlaoreet consequat laoreet habitasse ut viverra non donec, nulla class a auctor aenean nam torquent, eu congue dolor quisque elementum luctus. \r\nprimis eleifend a odio cursus ligula nec bibendum ultrices, per sodales litora ligula nisl lacinia ut adipiscing aenean, arcu quam ut aliquam feugiat habitasse et. \r\nvenenatis est suspendisse rhoncus consectetur mauris venenatis tortor porttitor, lobortis interdum senectus per inceptos hendrerit eleifend iaculis risus, iaculis interdum senectus conubia rutrum cras dapibus. \r\n</p>\r\n<p>\r\nAptent ante proin iaculis quisque cursus vehicula, posuere vitae per sollicitudin condimentum aliquam, donec platea aenean sem mi. \r\narcu nisi blandit consequat duis inceptos ligula laoreet diam morbi mollis lacus, mi bibendum imperdiet habitant morbi condimentum morbi mauris mattis aliquam. \r\ntorquent neque lacus praesent magna adipiscing per varius nisl primis, netus suscipit aenean pretium rutrum duis fames inceptos, tristique dictum dolor donec duis metus condimentum neque. \r\na molestie hendrerit donec in duis nostra sed risus leo phasellus a sagittis consectetur mattis senectus potenti, non venenatis aptent hendrerit facilisis phasellus libero luctus tempor condimentum viverra ipsum senectus porttitor. \r\n</p>\r\n<p>\r\nEleifend nec iaculis scelerisque habitant orci tempus tempor, nec donec ornare cras cursus facilisis imperdiet, eleifend auctor nam dictum dictumst ornare, risus auctor dolor cursus enim duis. \r\nlorem condimentum sit tortor nunc litora aliquet quisque vulputate vel, placerat urna cursus suscipit vitae senectus tempus eget curabitur dictum, diam blandit inceptos vestibulum erat sit tortor dui. \r\ndolor quam non faucibus viverra, nunc nulla tempor orci euismod, ut sodales sapien. \r\naliquam consectetur odio lobortis felis eget maecenas eu feugiat netus, condimentum auctor etiam inceptos habitant lacus class eget. \r\npotenti sagittis lorem ante sociosqu felis risus porttitor ligula, curae nunc leo auctor litora tempus morbi massa sapien, blandit sagittis congue dolor tristique mattis aenean. \r\n</p>\r\n<p>\r\nHabitant urna curae lobortis dictumst senectus adipiscing ultrices aliquam quam laoreet, mollis et inceptos arcu sit erat pharetra elit curae, nulla congue dolor pellentesque cursus ipsum magna rhoncus metus. \r\net libero tempus lorem netus non sollicitudin scelerisque habitant etiam augue netus ante, dapibus aliquam donec elementum erat pulvinar senectus dictumst tellus dapibus sociosqu. \r\nnullam lectus aliquam scelerisque taciti phasellus taciti eu senectus aenean, velit donec praesent volutpat arcu sociosqu dolor euismod vivamus per, dapibus arcu nisl taciti curae venenatis ornare pellentesque. \r\nfringilla velit commodo semper id fringilla vestibulum sollicitudin senectus platea, interdum iaculis nullam vitae curabitur hendrerit quam tempor, accumsan etiam felis purus phasellus fusce libero congue. \r\n</p>\r\n<p>\r\nDolor ornare enim gravida curae pellentesque ultricies eros nibh, malesuada blandit sagittis conubia libero tellus nisl pretium, fermentum blandit ullamcorper aliquam sagittis maecenas taciti. \r\nquisque id euismod nisi nibh ut hac pretium habitasse, viverra sagittis mi torquent potenti tempus et pharetra, phasellus neque egestas est tristique eros leo. \r\nposuere condimentum elit posuere iaculis facilisis curabitur cursus ut nostra, auctor pulvinar phasellus arcu dapibus himenaeos felis porta quisque sit, accumsan hendrerit tincidunt faucibus sem purus class sed. \r\nluctus imperdiet tempus erat conubia habitant platea orci faucibus quisque, fames nam fringilla curabitur fames leo porta aliquam, sem per est egestas gravida metus nulla urna. \r\n</p>\r\n<p>\r\nDonec mauris ipsum scelerisque amet, dictum torquent. \r\n</p>', '2021-01-23'),
(9, 'Brendo Henrique', 'brendo@gmail.com', 'Oi eu sou o Brendo e vou acabar com você!!!!!!!!!! </br>\r\n<strong>Vocês estão entendendo????</strong>', '2021-01-24'),
(22, 'Bruno Souza', 'brunoluz858@gmail.com', 'Olá!', '2021-01-28'),
(23, 'Midorya', 'lenadrinhopvp@gmail.com', 'Olá\r\n', '2021-01-29'),
(26, 'Satisth Patel', 'oi@oi.com', 'Teste\r\n', '2021-02-05');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_site.email`
--

CREATE TABLE `tb_site.email` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_site.email`
--

INSERT INTO `tb_site.email` (`id`, `email`, `date`) VALUES
(1, 'brunoluz858@gmail.com', '2021-01-22'),
(2, 'brunoluz858@gmail.com', '2021-01-22'),
(3, 'jonatasjsouza@gmail.com', '2021-01-24'),
(4, 'brendo@gmail.com', '2021-02-04');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `site_depoiments`
--
ALTER TABLE `site_depoiments`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.offices`
--
ALTER TABLE `tb_admin.offices`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.contact`
--
ALTER TABLE `tb_site.contact`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tb_site.email`
--
ALTER TABLE `tb_site.email`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `site_depoiments`
--
ALTER TABLE `site_depoiments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `tb_admin.offices`
--
ALTER TABLE `tb_admin.offices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_admin.online`
--
ALTER TABLE `tb_admin.online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3512;

--
-- AUTO_INCREMENT de tabela `tb_admin.usuarios`
--
ALTER TABLE `tb_admin.usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_admin.visitas`
--
ALTER TABLE `tb_admin.visitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de tabela `tb_site.contact`
--
ALTER TABLE `tb_site.contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tb_site.email`
--
ALTER TABLE `tb_site.email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
