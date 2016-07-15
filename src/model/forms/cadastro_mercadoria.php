<!doctype html>
<html>
<head>
    <title>Cadastro de Mercadoria</title>
</head>
<body>
<h1 align="center">Cadastro de Mercadoria</h1><br/>

<form method="post" action="../../controller/MercadoriaController.php">
    Nome da Mercadoria:<input type="text" name="nome_mercadoria"><br><br>
    Quantidade:<input type="number" min="1" name="qtd"><br><br>
    Preço:<input type="number" step="0.01" min="0.01" name="preco"><br><br>
    Tipo de Negócio:
    <input type="radio" name="tipo_negocio" value="Compra">Compra
    <input type="radio" name="tipo_negocio" value="Venda">Venda<br><br>
    <button type="submit" name="submit">Cadastrar</button>
</form><br>

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
