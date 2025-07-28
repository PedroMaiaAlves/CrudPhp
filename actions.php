<?php
session_start(); //guarda informação entre páginas
require 'connection.php';

//is set verifica se a variável não é nula na hora de enviar
if (isset ($_POST['create_usuario'])) {
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome'])); //envia o valor para a variável nome do campo que está com o "name" = 'nome' no html
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $senha = isset($_POST['senha']) ? mysqli_real_escape_string($conexao, password_hash(trim($_POST['senha']), PASSWORD_DEFAULT)) : ''; //uso da funcao password_hash para criptografar a senha
    //utilizar a funcao passworf_verify para verificar o hash com o input do usuário
    $sql = "INSERT into usuarios (nome, email, data_nascimento, senha) VALUES ('$nome', '$email', '$data_nascimento', '$senha')";
    // instrução sql para inserção

    mysqli_query($conexao, $sql);//pega o bd através do require na variavel conexao e insere com a instrução que está na variável sql

    if(mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = 'Usuário criado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['message'] = 'Usuário não foi criado';
        header('Location: index.php');
        exit;
    }
}

if (isset ($_POST['update_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);

    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome'])); //envia o valor para a variável nome do campo que está com o "name" = 'nome' no html
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $data_nascimento = mysqli_real_escape_string($conexao, trim($_POST['data_nascimento']));
    $senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
    //utilizar a funcao passworf_verify para verificar o hash com o input do usuário
    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', data_nascimento = '$data_nascimento' ";

    if(!empty($senha)){
        $sql .= ", senha='" . password_hash($senha, PASSWORD_DEFAULT) . "'"; //adiciona a variável sql a atribuição da nova senha caso precise, por meio do concatenador de string .=
    }

    $sql .= " WHERE id = '$usuario_id'"; //adiciona ao final da query quem deve ser atualizado (fora do if pois caso a senha não mude o usuário pode mudar as outras informações)
    // instrução sql para inserção

    mysqli_query($conexao, $sql);//pega o bd através do require na variavel conexao e insere com a instrução que está na variável sql

    if(mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = 'Usuário alterado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['message'] = 'Usuário não foi alterado';
        header('Location: index.php');
        exit;
    }
}

if (isset ($_POST['userDelete'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['userDelete']);
    
    $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";
    mysqli_query($conexao, $sql);

    if(mysqli_affected_rows($conexao) > 0) {
        $_SESSION['message'] = 'Usuário deletado com sucesso';
        header('Location: index.php');
        exit;
    } else {
        $_SESSION['message'] = 'Usuário não foi deletado';
        header('Location: index.php');
        exit;
    }
}
?>