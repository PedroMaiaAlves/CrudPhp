<?php
    if (isset($_SESSION['message'])):
    //verifico se a variavel message está setada e se estiver setada mostro a mensagem
?>

<div class="alert alert-warning alert-dismissible fase show" role="alert">
    <?= $_SESSION['message']; ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close"></button>
</div>

<?php
    unset($_SESSION['message']);
    endif
    //Tiro o valor da variavel mensagem e encerro o if
?>