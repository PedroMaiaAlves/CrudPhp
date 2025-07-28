<?php
require 'connection.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Visualização de usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php include('navbar.php'); ?>

    <div class="container mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Visualizar usuário
                        <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) /*$_GET['id']) pega o id passado pela URL e o isset verifica se este valor foi enviado*/{
                        $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']); //pega o valor enviado pela url e limpa de sql injection e salva no usuário id 
                        $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'"; //pega o usuário com o id passado pela url que agora está salvo na variável usuario id
                        $query = mysqli_query($conexao, $sql); //faço a consulta

                        if (mysqli_num_rows($query) > 0){ //caso a consulta retorne uma linha > 0 ou seja usuário existe, eu crio uma variável usuário com suas informações e printo elas
                            $usuario = mysqli_fetch_array($query) //recebe o valor da query
                    ?>
                        <div class="mb-3">
                            <label>Nome</label>
                            <p class="form-control">
                                <?=$usuario['nome']?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <p class="form-control">
                                <?=$usuario['email']?>
                            </p>
                        </div>
                        <div class="mb-3">
                            <label>Data de nascimento</label>
                            <p class="form-control">
                                <?=date('d/m/Y', strtotime($usuario['data_nascimento']))?>
                            </p>
                        </div>
                        <?php
                        } else { //caso não exista, retorno esta linha
                            echo "<h5>Usuário não encontrado</h5>";
                        }
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>

