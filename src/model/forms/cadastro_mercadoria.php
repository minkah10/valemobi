<!doctype html>
<html>
<head>
    <title>Cadastro de Mercadoria</title>
</head>
<body>
<h1 align="center">Cadastro de Mercadoria</h1><br/>

<form method="post" action="adiciona_mercadoria.php">
    Nome da Mercadoria:<input type="text" name="nome_mercadoria"><br><br>
    Quantidade:<input type="number" min="1" name="qtd"><br><br>
    Preço:<input type="number" step="0.01" min="0.01" name="preco"><br><br>
    Tipo de Negócio:
    <input type="radio" name="tipo_negocio" value="Compra">Compra
    <input type="radio" name="tipo_negocio" value="Venda">Venda<br><br>
    <button type="submit" name="submit">Cadastrar</button>
</form>
<br>
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
            Operação
        </th>
        <th>
            Qtd da Operação
        </th>
        <th>
            Finalizar
        </th>
    </tr>
    <?php require_once '../dao/mercadoria_dao.php'; ?>
    <?php $lista = new mercadoria_dao();
    $result = $lista->listaDiponiveis();
    foreach ($result as $row) {
        $id = $row['cod_mercadoria'];
        ?>

        <?php print "<tr>
                  <td>" . $row['cod_mercadoria'] . "
                  <td>" . $row['nome_mercadoria'] . "</td>" .
            "<td>" . $row['qtd'] . "</td>" .
            "<td>" . $row['preco'] . "</td>" .
            "<td>" . $row['tipo_negocio'] . "</td>" .
            "<form method=\"post\" action=\"functions.php\">
            <td>
                <select name='operacao'>
                    <option value='Compra'>Comprar</option>
                    <option value='Venda'>Vender</option>
                </select></td>
             <input type='hidden' name='cod_mercadoria' value='".$row['cod_mercadoria']."'>
             <input type='hidden' name='tipo_negocio' value='".$row['tipo_negocio']."'>
             <td>
                <input type='number' min='1' name='qtd_operacao'>
             </td>
             <td><input type=\"submit\" name=\"ok\" value=\"OK\"></td>
             </form> 
                    </tr>";
    } ?>
</table>
</body>
</html>