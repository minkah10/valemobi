<!doctype html>
<html>
<head>
    <title>Compra</title>
</head>
<body>
<h1>Compra de Produtos</h1><br><br>
<table border="1">
    <tr>
        <th>
            ID
        </th>

        <th>
            Nome da Mercadoria
        </th>

        <th>
            Quantidade
        </th>
        <th>
            Preço
        </th>
        <th>
            Tipo de Negócio
        </th>
        <th>
            Status
        </th>
        <th>
            Alterar
        </th>
        <th>
            Excluir
        </th>
    </tr>

    <?php
    require_once '../dao/mercadoria_dao.php';
    //require_once '../entity/Mercadoria.php';

    $result = new mercadoria_dao();
    $result->listaMercadoria();
    ?>
</table>
</body>
</html>
<?php
