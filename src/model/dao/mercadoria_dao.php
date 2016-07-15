<?php

require_once '../dao/Conexao.php';
require_once '../entity/Mercadoria.php';

class mercadoria_dao

{
    /**
     * @param $mercadoria
     */
    function adicionaMercadoria($mercadoria)
    {
        try {
            $conn = new Conexao();
            $stmt = $conn->openConnection()->prepare('INSERT INTO mercadoria VALUES (NULL, :nome_mercadoria, :qtd,
                :preco, :tipo_negocio, :status_mercadoria)');

            $stmt->execute(array(':nome_mercadoria' => $mercadoria->getNomeMercadoria(),
                ':qtd' => $mercadoria->getQtd(),
                ':preco' => $mercadoria->getPreco(),
                ':tipo_negocio' => $mercadoria->getTipoNegocio(),
                ':status_mercadoria' => $mercadoria->getStatusMercadoria()));

            //echo "Usuario adicionado ".$user;

        } catch (PDOException $e) {
            echo 'Error ao adicionar ' . $e->getMessage();
        };

    }

    function listaMercadoria()
    {
        try {
            $conn = new Conexao();
            $mercadoria = new Mercadoria();
            $sql = 'SELECT * FROM mercadoria';
            //$stmt = $conn->openConnection()->prepare('SELECT * FROM mercadoria');
            $result = $conn->openConnection()->query($sql);
            /*$result = $stmt->execute(array($mercadoria->getNomeMercadoria(), $mercadoria->getQtd(), $mercadoria->getPreco(),
                $mercadoria->getTipoNegocio()));*/

            foreach ($result as $row) {
                print "<tr>
                         <td>" .
                    $row['cod_mercadoria'] .
                    "<td>" .
                    $row['nome_mercadoria'] .
                    "</td>" .
                    "<td>" .
                    $row['qtd'] .
                    "</td>" .
                    "<td>" .
                    $row['preco'] .
                    "</td>" .
                    "<td>" .
                    $row['tipo_negocio'] .
                    "</td>" .
                    "<td>" .
                    $row['status_mercadoria'] .
                    "</td>" .
                    "</tr>";
            }

        } catch (PDOException $e) {
            echo 'Error ' . $e;
        }

    }

    function listaDiponiveis()
    {
        try {
            $conn = new Conexao();
            //$mercadoria = new Mercadoria();
            $sql = 'SELECT * FROM mercadoria WHERE status_mercadoria = "Disponivel" ';
            $result = $conn->openConnection()->query($sql);

//            $qtd = 'SELECT qtd FROM mercadoria WHERE qtd > 0';
            /*if ($result['qtd'] < 0){

            };*/

            foreach ($result as $row) {
                print "<tr>
                           <td>" .
                    $row['cod_mercadoria'] .
                    "<td>" .
                    $row['nome_mercadoria'] .
                    "</td>" .
                    "<td>" .
                    $row['qtd'] .
                    "</td>" .
                    "<td>" .
                    $row['preco'] .
                    "</td>" .
                    "<td>" .
                    $row['tipo_negocio'] .
                    "</td>" .
                    "<td>
                        <select name='status_mercadoria[]'>
                        <option value='Disponivel'>Disponivel</option>
                        <option value='Indisponivel'>Idisponivel</option>
                        </select>
                    
                    " .
                    //$row['status_mercadoria'].
                    "</td>" .
                    "<td>
                    <input type=\"button\" name=\"compra\" action=" ./*Insira metódo aqui*/
                    com . "\ value=\"Comprar\"><g/td>" .
                    "</tr>";
            }

        } catch (PDOException $e) {
            echo 'Error ' . $e;
        }
    }

    /**
     * 1.Faz uma Query que retorne todas as mercadorias
     * 2.Utilize um foreach com $row como chave para pegar os atributos da linha
     *
     */
    function carregaDados()
    {
        try {

            $cod_mercadoria = 1;

            $pdo = new Conexao();
            $mercadoria = new Mercadoria();
            $conn = $pdo->openConnection();
            $sql = 'SELECT * FROM mercadoria WHERE cod_mercadoria = :cod_mercadoria';
            $stmt = $conn->prepare($sql);
            $row = $stmt->execute(array(':cod_mercadoria' => $cod_mercadoria));

            $mercadoria->setCodMercadoria($row['cod_mercadoria']);
            $mercadoria->setNomeMercadoria($row['nome_mercadoria']);
            $mercadoria->setQtd($row['qtd']);
            $mercadoria->setPreco($row['preco']);
            $mercadoria->setTipoNegocio($row['tipo_negocio']);
            $mercadoria->setStatusMercadoria($row['status_mercadoria']);


            return $mercadoria;

        } catch (PDOException $e) {
            echo 'Error ' . $e;
        }
    }

    /**
     * 1.Cria o carrega dados - ok
     * 2.Soma pega a QTD_MERCADORIA e subtri pela QTD_SOLICITADA
     * 3.Se for maior que a existente, retone uma msg de ERROR
     */
    function compraMercadoria($mercadoria, $qtd_comprada)
    {
        require_once '../entity/Mercadoria.php';

        $qtd_existente = $mercadoria->getQtd();
        if ($qtd_existente > 0 and $qtd_comprada < $qtd_existente) {
            return $mercadoria->setQtd(($qtd_existente - $qtd_comprada));
        }

        return 'Quantidade solicitada insdisponivel, digite um valor menor';
    }

    /* function excluiUsuario($id)
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

     function alteraLivro($id, $nome, $email)
     {
         try {
             $conn = new Conexao();
             $stmt = $conn->openConnection()->prepare('UPDATE usuario SET nome = :nome, email = :email, WHERE id = :id');
             $stmt->execute(array(':id' => $id, ':nome' => $nome, ':email' => $email));

             //echo "Item: ". $id." alterado";

         } catch (PDOException $e) {
             echo 'Error ao alterar ' . $e->getMessage();
         }
     }*/
}
