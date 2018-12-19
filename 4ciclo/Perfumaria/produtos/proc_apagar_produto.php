<?php
session_start();
include_once("../dbs/conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$result_produto = "DELETE FROM produtos WHERE id='$id'";
	$resultado_produto = mysqli_query($conn, $result_produto);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>produto apagado com sucesso</p>";
		header("Location: listar_produto.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o produto não foi apagado com sucesso</p>";
		header("Location: listar_produto.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um produto</p>";
	header("Location: listar_produto.php");
}
