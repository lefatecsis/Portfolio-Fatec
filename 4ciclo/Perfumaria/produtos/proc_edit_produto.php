<?php
session_start();
include_once("../dbs/conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_STRING);


$result_produto = "UPDATE produtos SET nome='$nome', descricao='$descricao', valor='$valor', estoque='$estoque' WHERE id='$id'";
$resultado_produto = mysqli_query($conn, $result_produto);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto editado com sucesso</p>";
	header("Location: listar_produto.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Produto não foi editado com sucesso</p>";
	header("Location: editar.php?id=$id");
}
