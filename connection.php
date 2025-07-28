<?php
define('HOST', '127.0.0.1');
define('USER', 'root');
define('PASSWORD', '1234');
define('DB', 'crudphp');

//Criação de constantes do BD com o método define ('nome', 'valor')

$conexao = mysqli_connect(HOST, USER, PASSWORD, DB) or die ('Não foi possível conectar')

//Crio uma variavel conexao que chama o método mysqli_connect que conecta no BD usando os valores passados como parâmetro
//Or die interrompe caso de algum erro
?>