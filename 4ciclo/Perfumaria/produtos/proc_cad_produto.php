<?php
session_start();
include_once("../dbs/conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);
$estoque = filter_input(INPUT_POST, 'estoque', FILTER_SANITIZE_STRING);


$result_produto = "INSERT INTO produtos (nome,descricao,valor,estoque) VALUES ('$nome','$descricao','$valor','$estoque')";
$resultado_produto = mysqli_query($conn, $result_produto);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Produto cadastrado com sucesso</p>";
	header("Location: listar_produto.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Produto não foi cadastrado com sucesso</p>";
	header("Location: cadastrar_produto.php");
}
?>
