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
            Comprar
        </th>
    </tr>
    <tr>
        <?php
        require_once '../dao/mercadoria_dao.php';
        $result = new mercadoria_dao();
        $result->listaDiponiveis();
        ?>
    </tr>

</table>
</body>
</html>
<?php
