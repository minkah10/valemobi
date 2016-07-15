<?php

/**
 * Created by PhpStorm.
 * User: minkah
 * Date: 12/07/16
 * Time: 19:10
 */
class Conexao
{

    //Abre a conexão com o banco
    function openConnection()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=negociation_plataform', 'root', 'senha');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        };

        return $pdo;
    }

    //Métodos do Usuario

    function adicionaUsuario($user)
    {
        //$status = 'Disponivel';
        try {
            $conn = new Conexao();
            $stmt = $conn->openConnection()->prepare('INSERT INTO usuario VALUES (NULL ,:nome, :email, :login,
                :senha)');
            $stmt->execute(array(':nome' => $user->getNome(), ':email' => $user->getEmail(),
                ':login' => $user->getLogin(), ':senha' => $user->getSenha()));

            //echo "Usuario adicionado ".$user;

        } catch (PDOException $e) {
            echo 'Error ao adicionar ' . $e->getMessage();
        };
    }

    function excluiUsuario($id)
    {
        try {
            $conn = new Conexao();
            $stmt = $conn->openConnection()->prepare('DELETE FROM usuario WHERE id = :id');
            $stmt->execute(array(':id' => $id));

            //echo "Item: ". $id." exluido";

        } catch (PDOException $e) {
            echo 'Error ao excluir ' . $e->getMessage();
        }

    }

    function alteraUsuario($id,$nome,$email){
        try {
            $conn = new Conexao();
            $stmt = $conn->openConnection()->prepare('UPDATE usuario SET nome = :nome, email = :email, WHERE id = :id');
            $stmt->execute(array(':id' => $id, ':nome' => $nome, ':email' => $email));

            //echo "Item: ". $id." alterado";

        } catch (PDOException $e) {
            echo 'Error ao alterar ' . $e->getMessage();
        }
    }

    function validaUsuario($login, $senha){
        try {
            $conn = new Conexao();
            $sql='SELECT nome, email, login, senha FROM usuario WHERE :login = login AND :senha = senha';
            $stmt = $conn->openConnection()->query($sql);

            if ($stmt){
                $stmt->execute(array(':login'=>$login, ':senha'=>$senha));
                echo 'Foi';
            }

        }catch (PDOException $e){
            echo 'Error: '.$e;
        }
    }
}



