<?php

require_once '../dao/Conexao.php';
require_once '../entity/Mercadoria.php';

$m = new mercadoria_dao();
$m->listaDiponiveis();

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
            $result = $conn->openConnection()->query($sql);

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
            $stmt = $conn->openConnection()->prepare($sql);
            $stmt->execute(array());
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
//            $qtd = 'SELECT qtd FROM mercadoria WHERE qtd > 0';
            /*if ($result['qtd'] < 0){

            };*/
        } catch (PDOException $e) {
            echo 'Error ' . $e;
        }
    }

    /**
     * 1.Faz uma Query que retorne todas as mercadorias
     * 2.Utilize um foreach com $row como chave para pegar os atributos da linha
     *
     */
    function carregaDados($cod_mercadoria)
    {
        try {

            $pdo = new Conexao();
            $mercadoria = new Mercadoria();
            $conn = $pdo->openConnection();
            $sql = 'SELECT * FROM mercadoria WHERE cod_mercadoria = :cod_mercadoria';
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(':cod_mercadoria' => $cod_mercadoria));
            $row = $stmt->fetch(PDO::FETCH_ASSOC);


            $mercadoria->setStatusMercadoria($row['cod_mercadoria']);
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
    function executaCompra($cod_mercadoria, $qtd_comprada)
    {
        require_once '../entity/Mercadoria.php';

        $mercadoria = $this->carregaDados($cod_mercadoria);
        $qtd_existente = $mercadoria->getQtd();


        $pdo = new Conexao();
        $conn = $pdo->openConnection();
        $sql = 'UPDATE mercadoria SET qtd = :qtd WHERE cod_mercadoria = :cod_mercadoria';
        $qtd_total = ($qtd_existente + $qtd_comprada);
        $stmt = $conn->prepare($sql);
        $stmt->execute(array(':qtd' => $qtd_total, ':cod_mercadoria' => $cod_mercadoria));

        $mercadoria->setQtd(($qtd_total));


        return 'Quantidade solicitada insdisponivel, digite um valor menor';
    }

    function executaVenda($cod_mercadoria, $qtd_vendida)
    {
        require_once '../entity/Mercadoria.php';

        $mercadoria = $this->carregaDados($cod_mercadoria);
        $qtd_existente = $mercadoria->getQtd();


        $pdo = new Conexao();
        $conn = $pdo->openConnection();
        $sql = 'UPDATE mercadoria SET qtd = :qtd WHERE cod_mercadoria = :cod_mercadoria';
        if (!($qtd_existente < $qtd_vendida) && ($qtd_existente !== 0)) {
            $qtd_total = ($qtd_existente - $qtd_vendida);
            $stmt = $conn->prepare($sql);
            $stmt->execute(array(':qtd' => $qtd_total, ':cod_mercadoria' => $cod_mercadoria));

            $mercadoria->setQtd(($qtd_total));
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
