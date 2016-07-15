<?php

$nome_mercadoria = $_POST['nome_mercadoria'];
$qtd = (int)$_POST['qtd'];
$preco = (double)$_POST['preco'];
$tipo_negocio = $_POST['tipo_negocio'];

require_once '../dao/mercadoria_dao.php';
require_once '../entity/Mercadoria.php';


//cadastra mercadoria
$conn = new mercadoria_dao();
$mercadoria = new Mercadoria();

$mercadoria->setNomeMercadoria($nome_mercadoria);
$mercadoria->setQtd($qtd);
$mercadoria->setPreco($preco);
$mercadoria->setTipoNegocio($tipo_negocio);
$mercadoria->setStatusMercadoria('Disponivel');

$conn->adicionaMercadoria($mercadoria);


header('Location: ../forms/sucess/adicionado.php');

