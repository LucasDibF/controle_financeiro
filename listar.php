<?php
require "conexao.php";

$sql = "SELECT * FROM lancamentos ORDER BY id DESC";
$resultado = $pdo->query($sql);
$lista = $resultado->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Listar</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<?php include "cabecalho.php"; ?>

    <h2>Lançamentos</h2>
    <p><a href="cadastro.php" class="btn btn-verde">+ Novo lançamento</a></p>

    <table class="tabela">
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th>Data</th>
            <th>Acoes</th>
        </tr>
        <?php foreach ($lista as $row) { ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td>
                <?php if ($row["tipo"] == "entrada") { ?>
                    <span class="tag tag-entrada">Entrada</span>
                <?php } else { ?>
                    <span class="tag tag-saida">Saída</span>
                <?php } ?>
            </td>
            <td><?php echo $row["descricao"]; ?></td>
            <td>R$ <?php echo number_format($row["valor"], 2, ",", "."); ?></td>
            <td><?php echo $row["categoria"]; ?></td>
            <td><?php echo $row["data_lancamento"]; ?></td>
            <td class="acoes">
                <a href="editar.php?id=<?php echo $row["id"]; ?>" class="btn btn-link">Editar</a>
                <a href="excluir.php?id=<?php echo $row["id"]; ?>" class="btn btn-vermelho" onclick="return confirm('Excluir este lancamento?')">Excluir</a>
            </td>
        </tr>
        <?php } ?>
    </table>

<?php include "rodape.php"; ?>
