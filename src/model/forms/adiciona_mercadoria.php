<?php
$nome_mercadoria = $_POST['nome_mercadoria'];
$qtd = (int)$_POST['qtd'];
$preco = (double)$_POST['preco'];
$tipo_negocio = $_POST['tipo_negocio'];
$status = 'Disponivel';

require_once '../dao/mercadoria_dao.php';
require_once '../dao/Conexao.php';

$m_dao = new mercadoria_dao();
$mercadoria = new Mercadoria();

$mercadoria->setNomeMercadoria($nome_mercadoria);
$mercadoria->setQtd($qtd);
$mercadoria->setPreco($preco);
$mercadoria->setTipoNegocio($tipo_negocio);
$mercadoria->setStatusMercadoria($status);

$m_dao->adicionaMercadoria($mercadoria);

header('Location: /index.php');