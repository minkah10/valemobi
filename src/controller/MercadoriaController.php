<?php

$nome_mercadoria = $_POST['nome_mercadoria'];
$qtd = (int)$_POST['qtd'];
$preco = (double)$_POST['preco'];
$tipo_negocio = $_POST['tipo_negocio'];

require_once '../dao/mercadoria_dao.php';
require_once '../entity/Mercadoria.php';
require_once '../model/forms/crud_mercadoria.php';

