<?php
require "conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM lancamentos WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);
$lancamento = $stmt->fetch();

if (isset($_POST["salvar"])) {
    $tipo = $_POST["tipo"];
    $descricao = $_POST["descricao"];
    $valor = $_POST["valor"];
    $categoria = $_POST["categoria"];
    $data = $_POST["data_lancamento"];
    $observacao = $_POST["observacao"];

    $sql = "UPDATE lancamentos SET tipo=?, descricao=?, valor=?, categoria=?, data_lancamento=?, observacao=? WHERE id=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$tipo, $descricao, $valor, $categoria, $data, $observacao, $id]);

    header("Location: listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
<?php include "cabecalho.php"; ?>

    <h2>Editar lançamento</h2>

    <form method="post" class="formulario">
        <div class="campo">
            <label>Tipo</label>
            <select name="tipo">
                <option value="entrada" <?php if ($lancamento["tipo"] == "entrada") echo "selected"; ?>>Entrada</option>
                <option value="saida" <?php if ($lancamento["tipo"] == "saida") echo "selected"; ?>>Saída</option>
            </select>
        </div>

        <div class="campo">
            <label>Descricao</label>
            <input type="text" name="descricao" value="<?php echo $lancamento["descricao"]; ?>">
        </div>

        <div class="campo">
            <label>Valor (R$)</label>
            <input type="number" name="valor" step="0.01" value="<?php echo $lancamento["valor"]; ?>">
        </div>

        <div class="campo">
            <label>Categoria</label>
            <input type="text" name="categoria" value="<?php echo $lancamento["categoria"]; ?>">
        </div>

        <div class="campo">
            <label>Data</label>
            <input type="date" name="data_lancamento" value="<?php echo $lancamento["data_lancamento"]; ?>">
        </div>

        <div class="campo">
            <label>Observacao</label>
            <input type="text" name="observacao" value="<?php echo $lancamento["observacao"]; ?>">
        </div>

        <button type="submit" name="salvar" class="btn">Salvar alterações</button>
    </form>

    <p class="links"><a href="listar.php">Voltar para listagem</a></p>

<?php include "rodape.php"; ?>
