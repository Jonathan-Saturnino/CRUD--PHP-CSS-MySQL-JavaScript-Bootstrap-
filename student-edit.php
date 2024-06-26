<?php
// Inicia a sessão para permitir o uso de variáveis de sessão.
session_start();
// Inclui o arquivo de conexão com o banco de dados.
require 'dbcon.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Metadados necessários -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Inclusão do CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Título da página -->
    <title>Editar Aluno</title>
</head>
<body>
    <!-- Container Bootstrap -->
    <div class="container mt-5">
        <!-- Inclui o arquivo message.php para exibir mensagens de feedback -->
        <?php include('message.php'); ?>
        <!-- Linha Bootstrap -->
        <div class="row">
            <!-- Coluna Bootstrap -->
            <div class="col-md-12">
                <!-- Cartão Bootstrap -->
                <div class="card">
                    <!-- Cabeçalho do cartão -->
                    <div class="card-header">
                        <!-- Título do cartão -->
                        <h4>Editar aluno 
                            <!-- Botão de voltar -->
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <!-- Corpo do cartão -->
                    <div class="card-body">
                        <?php
                        // Verifica se o parâmetro 'id' foi passado via GET
                        if(isset($_GET['id']))
                        {
                            // Obtém o ID do aluno da URL e protege contra injeção de SQL
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            // Cria a consulta SQL para obter os dados do aluno com o ID correspondente
                            $query = "SELECT * FROM students WHERE id='$student_id' ";
                            // Executa a consulta SQL
                            $query_run = mysqli_query($con, $query);

                            // Verifica se há resultados
                            if(mysqli_num_rows($query_run) > 0)
                            {
                                // Obtém os dados do aluno como um array associativo
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <!-- Formulário para editar um aluno -->
                                <form action="code.php" method="POST">
                                    <!-- Campo oculto para enviar o ID do aluno -->
                                    <input type="hidden" name="student_id" value="<?= $student['id']; ?>">

                                    <!-- Campo para o nome do aluno -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nome</label>
                                        <input type="text" id="name" name="name" value="<?= $student['name']; ?>" class="form-control" required>
                                    </div>
                                    <!-- Campo para o email do aluno -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" id="email" name="email" value="<?= $student['email']; ?>" class="form-control" required>
                                    </div>
                                    <!-- Campo para o telefone do aluno -->
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Telefone</label>
                                        <input type="number" id="phone" name="phone" value="<?= $student['phone']; ?>" class="form-control" required>
                                    </div>
                                    <!-- Campo para o curso do aluno -->
                                    <div class="mb-3">
                                        <label for="course" class="form-label">Curso</label>
                                        <input type="text" id="course" name="course" value="<?= $student['course']; ?>" class="form-control" required>
                                    </div>
                                    <!-- Botão para atualizar o aluno -->
                                    <button type="submit" name="update_student" class="btn btn-primary">Atualizar Aluno</button>
                                </form>
                                <?php
                            }
                            else
                            {
                                // Se nenhum aluno for encontrado com o ID especificado, exibe uma mensagem de erro.
                                echo "<h4>Nenhum ID encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inclusão do JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
