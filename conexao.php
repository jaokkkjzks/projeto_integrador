<?php 
if (!isset($_SESSION)) {
    session_start();
}

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bd ="crud1"; 

$conexao = mysqli_connect($servidor, $usuario, $senha, $bd);

if (!$conexao) {
    echo"Erro ao conectar com o banco de dados: <br>";
}

?>