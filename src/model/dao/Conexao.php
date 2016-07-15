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
}



