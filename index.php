<?php
    // Inicia a sessão PHP para permitir o uso de variáveis de sessão.
    session_start();
    // Inclui o arquivo 'dbcon.php', que contém a configuração de conexão com o banco de dados.
    require 'dbcon.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Define a codificação de caracteres do documento como UTF-8. -->
    <meta charset="utf-8">
    <!-- Define a viewport para dispositivos móveis. -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Inclui o arquivo CSS do Bootstrap para estilização. -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Define o título da página como "Paper 5º Semestre - CRUD PHP, MySQL, Bootstrap". -->
    <title>Paper 5º Semestre - CRUD PHP, MySQL, Bootstrap</title>
</head>
<body>
    <!-- Cria um contêiner Bootstrap com margem superior de tamanho médio. -->
    <div class="container mt-4">

        <!-- Inclui o arquivo 'message.php', que provavelmente contém mensagens de feedback para o usuário. -->
        <?php include('message.php'); ?>

        <!-- Cria uma linha da grade do Bootstrap. -->
        <div class="row">
            <!-- Cria uma coluna de tamanho 12 na grade do Bootstrap. -->
            <div class="col-md-12">
                <!-- Cria um cartão Bootstrap. -->
                <div class="card">
                    <!-- Cabeçalho do cartão. -->
                    <div class="card-header">
                        <!-- Título do cabeçalho do cartão. -->
                        <h4>Detalhes do aluno
                            <!-- Link para a página de criação de aluno. -->
                            <a href="student-create.php" class="btn btn-primary float-end">Adicionar Aluno</a>
                        </h4>
                    </div>
                    <!-- Corpo do cartão. -->
                    <div class="card-body">
                        <!-- Tabela Bootstrap para exibir os detalhes dos alunos. -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <!-- Cabeçalhos das colunas da tabela. -->
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Telefone</th>
                                    <th>Curso</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    // Consulta SQL para selecionar todos os alunos.
                                    $query = "SELECT * FROM students";
                                    // Executa a consulta SQL no banco de dados.
                                    $query_run = mysqli_query($con, $query);

                                    // Verifica se há alunos cadastrados.
                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        // Loop através dos resultados da consulta.
                                        foreach($query_run as $student)
                                        {
                                            ?>
                                            <!-- Exibe uma linha na tabela para cada aluno. -->
                                            <tr>
                                                <!-- Exibe o ID do aluno. -->
                                                <td><?= $student['id']; ?></td>
                                                <!-- Exibe o nome do aluno. -->
                                                <td><?= $student['name']; ?></td>
                                                <!-- Exibe o email do aluno. -->
                                                <td><?= $student['email']; ?></td>
                                                <!-- Exibe o telefone do aluno. -->
                                                <td><?= $student['phone']; ?></td>
                                                <!-- Exibe o curso do aluno. -->
                                                <td><?= $student['course']; ?></td>
                                                <!-- Coluna de ação com links para visualizar, editar e excluir o aluno. -->
                                                <td>
                                                    <!-- Link para visualizar detalhes do aluno. -->
                                                    <a href="student-view.php?id=<?= $student['id']; ?>" class="btn btn-info btn-sm">Visualizar</a>
                                                    <!-- Link para editar detalhes do aluno. -->
                                                    <a href="student-edit.php?id=<?= $student['id']; ?>" class="btn btn-success btn-sm">Editar</a>
                                                    <!-- Formulário para excluir o aluno. -->
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <!-- Botão para enviar o formulário para excluir o aluno. -->
                                                        <button type="submit" name="delete_student" value="<?=$student['id'];?>" class="btn btn-danger btn-sm">Deletar</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        // Mensagem exibida quando não há alunos cadastrados.
                                        echo "<h5> Nenhum aluno cadastrado </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Inclui o arquivo JavaScript do Bootstrap para interatividade. -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
