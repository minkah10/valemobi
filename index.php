<!doctype html>
<html>
<head>
    <title>Bem Vindo!</title>
</head>
<body>
<h1>Cadastro de Usuario</h1><br/>
<form method="post" action="src/model/forms/crud_usuario.php">
    Nome:<input type="text" name="nome"><br><br>
    Email:<input type="text" name="email"><br><br>
    Login:<input type="text" name="login"><br><br>
    Senha:<input type="password" name="senha"><br><br>
    <button type="submit" name="submit">Cadastrar</button>
</form>
</body>
</html>
<?php
/*require_once 'src/model/dao/Conexao.php';
require_once 'src/model/entity/Usuario.php';

$c = new Conexao();
$user = new Usuario();
function cadastraUsuario( ){

}

$user->setNome('Alberto');
$user->setEmail('al@al.com');
$user->setLogin('al1');
$user->setSenha('123');

$c->adicionaUsuario($user);*/

?>