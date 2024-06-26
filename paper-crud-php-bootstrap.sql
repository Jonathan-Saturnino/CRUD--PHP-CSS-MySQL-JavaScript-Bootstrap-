

-- Configurações de SQL
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

-- Configurações de conjunto de caracteres
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Banco de dados: `paper-crud-php-bootstrap`

-- Estrutura da tabela `students`
CREATE TABLE `students` (
  `id` int(6) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `course` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Extraindo dados da tabela `students`
INSERT INTO `students` (`id`, `name`, `email`, `phone`, `course`) VALUES
(1, 'Jônathan Saturnino da Silva', 'saturnino@gmail.com', '31992342453', 'Analise e Desenvolvimento de Sistemas');

-- Índices para tabelas despejadas
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de tabelas despejadas
ALTER TABLE `students`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Finaliza transação
COMMIT;

-- Restaura configurações originais de conjunto de caracteres
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
