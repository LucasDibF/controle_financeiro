<?php
require "conexao.php";

$mensagem = "";

if (isset($_POST["salvar"])) {
    $tipo = $_POST["tipo"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $categoria = $_POST["categoria"];
    $data = $_POST["data_lancamento"];
    $observacao = $_POST["observacao"];

    $sql = "INSERT INTO lancamentos (tipo, descricao, valor, categoria, data_lancamento, observacao)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tipo, $descricao, $valor, $categoria, $data, $observacao]);

    $mensagem = "Cadastrado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<?php include "cabecalho.php"; ?>

    <h2>Cadastrar lancamento</h2>

    <?php if ($mensagem != "") { ?>
        <p class="mensagem"><?php echo $mensagem; ?></p>
    <?php } ?>

    <form method="post" class="formulario">
        <div class="campo">
            <label>Tipo</label>
            <select name="tipo" required>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>
        </div>

        <div class="campo">
            <label>Descrição</label>
            <input type="text" name="descricao" required>
        </div>

        <div class="campo">
            <label>Valor (R$)</label>
            <input type="number" name="valor" step="0.01" required>
        </div>

        <div class="campo">
            <label>Categoria</label>
            <input type="text" name="categoria" required>
        </div>

        <div class="campo">
            <label>Data</label>
            <input type="date" name="data_lancamento" required>
        </div>

        <div class="campo">
            <label>Observação</label>
            <input type="text" name="observacao">
        </div>

        <button type="submit" name="salvar" class="btn btn-verde">Salvar alterações</button>
    </form>

<?php include "rodape.php"; ?>
