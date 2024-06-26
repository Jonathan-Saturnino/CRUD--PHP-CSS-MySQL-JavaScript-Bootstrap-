<?php
// Inclui o arquivo de conexão com o banco de dados.
require 'dbcon.php';
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Título da página -->
    <title>Detalhes do aluno</title>
</head>
<body>

    <!-- Container Bootstrap -->
    <div class="container mt-5">

        <!-- Linha Bootstrap -->
        <div class="row">
            <!-- Coluna Bootstrap -->
            <div class="col-md-12">
                <!-- Cartão Bootstrap -->
                <div class="card">
                    <!-- Cabeçalho do cartão -->
                    <div class="card-header">
                        <h4>Dados do aluno 
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
                                
                                    <!-- Exibe os dados do aluno em campos de texto somente leitura -->
                                    <div class="mb-3">
                                        <label>Nome</label>
                                        <p class="form-control">
                                            <?=$student['name'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                            <?=$student['email'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Telefone</label>
                                        <p class="form-control">
                                            <?=$student['phone'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>Curso</label>
                                        <p class="form-control">
                                            <?=$student['course'];?>
                                        </p>
                                    </div>

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
    
    <!-- JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
