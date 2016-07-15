<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$login = $_POST['login'];
$senha = $_POST['senha'];

require_once '../dao/Conexao.php';
require_once '../entity/Usuario.php';
//function cadastraUsuario(){}
$conn = new Conexao();
$usuario = new Usuario();

$usuario->setNome($nome);
$usuario->setEmail($email);
$usuario->setLogin($login);
$usuario->setSenha($senha);

$conn->adicionaUsuario($usuario);