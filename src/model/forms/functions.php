<?php

require_once '../dao/mercadoria_dao.php';
require_once '../entity/Mercadoria.php';

//function comprarMercadoria(){
$operacao = $_POST['operacao'];
$qtd_operacao = $_POST['qtd_operacao'];
$cod_mercadoria = $_POST['cod_mercadoria'];
$tipo_negocio = $_POST['tipo_negocio'];

$mercadoria = new mercadoria_dao();
//$conn =

try {
    if (isset($operacao) and isset($qtd_operacao)) {
        switch ($operacao) {
            case 'Compra':
                if (isset($tipo_negocio) and $tipo_negocio ==='Compra'){
                $qtd_comprada = $qtd_operacao;
                $conn = new mercadoria_dao();
                $conn->executaCompra($cod_mercadoria, $qtd_comprada);
                }
                "<h1>Produto não disponivel para compra</h1>";
                break;
            case 'Venda':
                if (isset($tipo_negocio) and $tipo_negocio ==='Venda'){
                    $qtd_vendida = $qtd_operacao;
                    $conn = new mercadoria_dao();
                    $conn->executaVenda($cod_mercadoria, $qtd_vendida);
                }
                "<h1>Produto não disponivel para compra</h1>";
                break;
        }
        header('Location: ../forms/cadastro_mercadoria.php');
    }

} catch (Exception $e) {
    echo 'Error' . $e;
    //  }


}
