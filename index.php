<?php
session_start();
require 'connection.php';
?>

<!--Inclui o conteudo do arquivo connection atraves do 'require'-->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud de Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>
    <div class="container mt-4">
        <?php
        include('message.php');
        ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Lista de usuários
                        <a href="userCreate.php" class="btn btn-primary float-end">Adicionar novo usuário</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Data de nascimento</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = 'SELECT * FROM usuarios';  //Consulta para trazer todos os usuários
                                $usuarios = mysqli_query($conexao, $sql); //executa a consulta e insere na variável usuários
                                //var_dump($usuarios); verificar se fez a consulta certa 
                                if (mysqli_num_rows($usuarios) > 0){
                                    foreach($usuarios as $usuario) { // Caso haja usuários executa o if
                                ?>
                                <tr>
                                    <td><?=$usuario['id']?></td> <!--Atalho para inserção através do = -->
                                    <td><?=$usuario['nome']?></td>
                                    <td><?=$usuario['email']?></td>
                                    <td><?=date('d/m/Y', strtotime($usuario['data_nascimento']))?></td>
                                    <!--Uso da funcao date do php para transformar em dd/mm/YYYY passando como paramentro o tipo da data e o valor em inteiro strtotime-->
                                    <td>
                                        <a href="userView.php?id=<?=$usuario['id']?>" class="btn btn-secondary btn-sm"><span class="bi-eye-fill"></span>&nbsp;Visualizar</a> 
                                        <a href="userUpdate.php?id=<?=$usuario['id']?>" class="btn btn-success btn-sm"><span class="bi-pencil-fill"></span>&nbsp;Editar</a>
                                        <form action="actions.php" method="POST" class="d-inline">
                                            <button onClick="return confirm('Tem certeza que deseja excluir este usuário?')"
                                            type="submit"
                                            name="userDelete"
                                            value="<?=$usuario['id']?>"
                                            class="btn btn-danger btn-sm"><span class="bi-trash3-fill"></span>&nbsp;Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                }
                                }else { //Caso não haja usuários printa na tela
                                    echo '<h5>Nenhum usuário encontrado</h5>';
                                }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>

