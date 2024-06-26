<?php
    // Verifica se a variável de sessão 'message' está definida.
    if(isset($_SESSION['message'])) :
?>

    <!-- Abre a tag HTML para exibir uma div de alerta Bootstrap. -->
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <!-- Exibe o texto da mensagem armazenada na variável de sessão 'message'. -->
        <strong>Ei!</strong> <?= $_SESSION['message']; ?>
        <!-- Botão de fechar o alerta. -->
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php 
    // Remove a variável de sessão 'message' para que ela não seja exibida novamente.
    unset($_SESSION['message']);
    // Termina a estrutura condicional.
    endif;
?>
