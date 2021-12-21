--
-- Database: goodgames
--

-- --------------------------------------------------------
CREATE DATABASE goodgames;
USE goodgames;

--
-- Estrutura da tabela tb_console
--

CREATE TABLE tb_console (
  idcons int identity(1,1) primary key,
  desccons varchar(30) NOT NULL,
  tpmidiacons varchar(30) NOT NULL,
  fabricantecons varchar(30) NOT NULL
)

--
-- Extraindo dados da tabela tb_console
--

INSERT INTO tb_console (desccons, tpmidiacons, fabricantecons) VALUES
('Play Station', 'CD Rom', 'Sony'),
('Play Station 2', 'DVD Rom', 'Sony'),
('Play Station 3', 'Blu Ray', 'Sony'),
('Nintendo 64', 'Cartucho', 'Nintendo'),
('Wii', 'DVD Rom', 'Nintendo'),
('X-Box 360', 'DVD Rom', 'Microsoft'),
('X-Box One', 'Blu Ray', 'Microsoft');

-- --------------------------------------------------------

--
-- Estrutura da tabela tb_jogo
--

CREATE TABLE tb_jogo (
  idjogo int identity(1,1) primary key,
  titulojogo varchar(30) NOT NULL,
  resumojogo text,
  valorjogo decimal(5,2) NOT NULL,
  fk_softhouse int NOT NULL,
  fk_console int NOT NULL,
  foreign key (fk_softhouse) references tb_softhouse(idsh),
  foreign key (fk_console) references tb_console(idcons)
)

--
-- Extraindo dados da tabela tb_jogo
--

INSERT INTO tb_jogo (titulojogo, resumojogo, valorjogo, fk_softhouse, fk_console) VALUES
( 'GTA', 'Mate tudo que se move', '45.28', 5, 3),
( 'GTA', 'Mate tudo que se move', '35.28', 5, 6),
( 'Monkey Island', 'Encontre o tesouro', '22.50', 6, 6),
( 'Donkey Kong', 'Pule igual macaco', '99.25', 10, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela tb_softhouse
--

CREATE TABLE tb_softhouse (
  idsh int identity(1,1) primary key,
  descsh varchar(30) NOT NULL
)

--
-- Extraindo dados da tabela tb_softhouse
--

INSERT INTO tb_softhouse (descsh) VALUES
('Sony'),
('Nintendo'),
('Microsoft'),
('EA Games'),
('RockStar'),
('Lucas Arts'),
('Square Enix'),
('SEGA'),
('Ubisoft'),
('Rare');
