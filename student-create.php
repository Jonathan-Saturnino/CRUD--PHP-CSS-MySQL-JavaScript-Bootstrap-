<?php
// Inicia a sessão para permitir o uso de variáveis de sessão.
session_start();
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
    <title>Criar aluno</title>
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
                        <h4>Adicionar aluno
                            <!-- Botão de voltar -->
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <!-- Corpo do cartão -->
                    <div class="card-body">
                        <!-- Formulário para adicionar um novo aluno -->
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefone</label>
                                <input type="text" id="phone" name="phone" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="course" class="form-label">Curso</label>
                                <input type="text" id="course" name="course" class="form-control" required>
                            </div>
                            <!-- Botão para salvar o aluno -->
                            <button type="submit" name="save_student" class="btn btn-primary">Salvar Aluno</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inclusão do JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
