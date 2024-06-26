<?php
// Inicia a sessão PHP para permitir o uso de variáveis de sessão.
session_start();
// Inclui o arquivo 'dbcon.php', que contém a configuração de conexão com o banco de dados.
require 'dbcon.php';

// Verifica se o formulário para excluir um aluno foi submetido.
if(isset($_POST['delete_student']))
{
    // Obtém o ID do aluno a ser excluído e protege contra injeção de SQL.
    $student_id = mysqli_real_escape_string($con, $_POST['delete_student']);

    // Cria a consulta SQL para excluir o aluno com o ID correspondente.
    $query = "DELETE FROM students WHERE id='$student_id' ";
    // Executa a consulta SQL.
    $query_run = mysqli_query($con, $query);

    // Verifica se a consulta foi bem-sucedida.
    if($query_run)
    {
        // Define uma mensagem de sucesso na sessão.
        $_SESSION['message'] = "Aluno excluído com sucesso";
    }
    else
    {
        // Define uma mensagem de erro na sessão.
        $_SESSION['message'] = "Não foi possível excluir o aluno";
    }

    // Redireciona para a página index.php.
    header("Location: index.php");
    exit; // Termina o script.
}

// Verifica se o formulário para atualizar um aluno foi submetido.
if(isset($_POST['update_student']))
{
    // Obtém o ID do aluno a ser atualizado e protege contra injeção de SQL.
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);

    // Obtém os dados atualizados do aluno e protege contra injeção de SQL.
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    // Verifica se todos os campos obrigatórios foram preenchidos.
    if(empty($name) || empty($email) || empty($phone) || empty($course)) {
        // Define uma mensagem de erro na sessão.
        $_SESSION['message'] = "Todos os campos são obrigatórios";
        // Redireciona de volta para a página de edição do aluno.
        header("Location: student-edit.php?id=$student_id");
        exit; // Termina o script.
    }

    // Cria a consulta SQL para atualizar os dados do aluno com o ID correspondente.
    $query = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id='$student_id' ";
    // Executa a consulta SQL.
    $query_run = mysqli_query($con, $query);

    // Verifica se a consulta foi bem-sucedida.
    if($query_run)
    {
        // Define uma mensagem de sucesso na sessão.
        $_SESSION['message'] = "Aluno atualizado com sucesso";
    }
    else
    {
        // Define uma mensagem de erro na sessão.
        $_SESSION['message'] = "Aluno não atualizado";
    }

    // Redireciona para a página index.php.
    header("Location: index.php");
    exit; // Termina o script.
}

// Verifica se o formulário para salvar um novo aluno foi submetido.
if(isset($_POST['save_student']))
{
    // Obtém os dados do novo aluno e protege contra injeção de SQL.
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $course = mysqli_real_escape_string($con, $_POST['course']);

    // Verifica se todos os campos obrigatórios foram preenchidos.
    if(empty($name) || empty($email) || empty($phone) || empty($course)) {
        // Define uma mensagem de erro na sessão.
        $_SESSION['message'] = "Todos os campos são obrigatórios";
        // Redireciona de volta para a página de criação de aluno.
        header("Location: student-create.php");
        exit; // Termina o script.
    }

    // Cria a consulta SQL para inserir um novo aluno no banco de dados.
    $query = "INSERT INTO students (name,email,phone,course) VALUES ('$name','$email','$phone','$course')";

    // Executa a consulta SQL.
    $query_run = mysqli_query($con, $query);
    // Verifica se a consulta foi bem-sucedida.
    if($query_run)
    {
        // Define uma mensagem de sucesso na sessão.
        $_SESSION['message'] = "Aluno cadastrado com sucesso!";
    }
    else
    {
        // Define uma mensagem de erro na sessão.
        $_SESSION['message'] = "Erro ao cadastrar aluno: " . mysqli_error($con);
    }

    // Redireciona para a página student-create.php.
    header("Location: student-create.php");
    exit; // Termina o script.
}
?>
