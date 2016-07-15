
<?php

require_once '../entity/Usuario.php';
require_once '../dao/Conexao.php';

session_start();

$login = $_POST['login'];
$senha = $_POST['senha'];

$conn = new Conexao();

$_SESSION['login'] = $login;
$_SESSION['senha'] = $senha;

//$result = $conn->validaUsuario($login, $senha);


