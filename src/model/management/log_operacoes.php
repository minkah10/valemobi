<!doctype html>
<html>
<head>
    <title>Compra</title>
</head>
<body>
<h1>Lista de Operações</h1><br><br>
<table border="1">
    <thead>
    <tr>
        <th>
            Id da Operação
        </th>
        <th>
            Código da Mercadoria
        </th>
        <th>
            Nome da Mercadoria
        </th>
        <th>
            Tipo de Operação
        </th>
        <th>
            Quantidade Comprada/Vendida
        </th>
        <th>
            Preço Unitário
        </th>
        <th>
            Data
        </th>
    </tr>
    </thead>
    <?php
        require_once '../dao/mercadoria_dao.php';

        $result = new mercadoria_dao();
        $result->listaOperacoes();
         ?>
</table>
<form method="post" action="../forms/cadastro_mercadoria.php">
    <input type="submit" value="Voltar">
</form>
</body>
</html>
<?php
